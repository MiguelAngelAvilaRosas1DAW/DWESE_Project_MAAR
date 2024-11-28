<?php

/* INSERCIÓN DE UN USUARIO */

//Si la sesion ya a sido inicida lleva directamente a la biblioteca del usuario.
session_start();
if (!empty($_SESSION)) {
    die(header("Location: mainPage.php"));
}

$errorUsuario = "";

if (!empty($_POST)):

    $nombreUsuario = $_POST["nombreUsuario"];
    $claveUsuario = $_POST["claveUsuario"];

    $claveUsuario = md5($claveUsuario);

    include_once "./libs/conectarBD.php";

    $sql = "SELECT * FROM usuarios WHERE nomUsu = :nombreUsuario";
    $sql = $pdo->prepare($sql);

    $sql->bindValue(":nombreUsuario", $nombreUsuario,PDO::PARAM_STR);

    //Ejecutamos la consulta.
    $sql->execute() ;

    //Si se devuelven filas, es que el usuario ya existe, por lo tanto madaremos un mensaje de error.
    if ($sql->rowCount() > 0) {
        $errorUsuario = "Este usuario ya existe.";
    } else {

        //Si el usuario NO existe, lo añadirmeos a la tabla de "usuarios".
        $sql = "INSERT INTO usuarios (nomUsu, claveUsu) VALUES (:nombreUsuario, :claveUsuario)";

        $sql = $pdo->prepare($sql);

        $sql->bindValue(":nombreUsuario", $nombreUsuario,PDO::PARAM_STR);

        $sql->bindValue(":claveUsuario", $claveUsuario,PDO::PARAM_STR);
        
        if ($sql->execute()) {
            die(header("Location: index.php"));
        } else {
            // Error en la inserción
            $errorUsuario = "Error al registrar el usuario.";
        }
    }

endif;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/generalStyle.css">
    <script defer src="./assets/js/script.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <title>Juegos Retro: User Creation</title>
</head>

<body>
    <form class="form__login" action="newUser.php" method="post">
        <h2>Nuevo usuario</h2>
        <div class="form__label">
            <input type="text" placeholder="" maxlength="50" required name="nombreUsuario" id="nombreUsuario">
            <label>Nuevo nombre</label>
        </div><br><br>

        <div class="form__label">
            <input type="password" placeholder="" maxlength="50" required name="claveUsuario" id="claveUsuario">
            <label>Nueva contraseña</label>
            <i class="fa fa-eye toggle-icon" id="togglePassword"></i>
        </div>
        <span><?= $errorUsuario ?></span><br><br>
        <div class="grid2">
            <a href="./index.php">
                <input class="form__back" type="button" value="Volver">
            </a>

            <button class="green__button">Crear usuario</button>

        </div>
    </form>
</body>

</html>