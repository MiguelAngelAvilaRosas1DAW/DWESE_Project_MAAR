<?php

/* REGISTRO DE UN USUARIO */

//Si la sesion ya a sido inicida lleva directamente a la biblioteca del usuario.
session_start();
include_once "./clases/Usuario.php";

if (!empty($_SESSION)) {

    $objetoSesion = unserialize($_SESSION["_usuario"]);

    if ($objetoSesion->getNombre() !== "root") {
        die(header("Location: mainPage.php"));
    } else {
        die(header("Location: adminPage.php"));
    }
    
}

//Creamos una variable para indicar al usuario del error producido.
$errorUsuario = "";

if (!empty($_POST)):

    $nombreUsuario = $_POST["nombreUsuario"];
    $claveUsuario = $_POST["claveUsuario"];

    $claveUsuario = md5($claveUsuario);

    include_once "./libs/conectarBD.php";

    //Consultamos el usuario en la base de datos.
    $sql = "SELECT * FROM usuarios WHERE nomUsu = :nombreUsuario AND claveUsu = :claveUsuario";
    
    $sql = $pdo->prepare($sql);

    //Sustituimos los valores de la consulta por los pasados por el usuario.
    $sql->bindValue(":nombreUsuario", $nombreUsuario,PDO::PARAM_STR);
    $sql->bindValue(":claveUsuario", $claveUsuario,PDO::PARAM_STR);

    //Ejecutamos la consulta.
    $sql->execute() ;

    //Verificamos si se encontró el usuario.
    if ($sql->rowCount() > 0) {
        // Si el usuario existe, iniciamos sesión y redirigimos.

        $usuario = $sql->fetchObject("Usuario");
        $_SESSION["_tiempo"] = time() + 300;
        $_SESSION["_usuario"] = serialize($usuario);
        if ($usuario->getNombre() !== "root") {
            die(header("Location: mainPage.php"));
        } else {
            die(header("Location: adminPage.php"));
        }
        
    } else {
        //Si no existe el usuario, mostramos el error.
        $errorUsuario = "Usuario o contraseña incorrectos.";
    }


endif;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/generalStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="./assets/js/script.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <title>Juegos Retro: Login</title>
</head>

<body>

    <form class="form__login" action="index.php" method="post">
        <h2>Acceso biblioteca<br>RETRO</h2>

        <div class="form__label">
            <input type="text" placeholder="" name="nombreUsuario" id="nombreUsuario">
            <label>Nombre de usuario</label>
        </div><br><br>

        <div class="form__label">
            <input type="password" placeholder="" name="claveUsuario" id="claveUsuario">
            <label>Contraseña</label>
            <i class="fa fa-eye toggle-icon" id="togglePassword"></i>
        </div>
        <span><?= $errorUsuario ?></span><br><br>

        <div class="grid2">
            <a href="./newUser.php">
                <input class="green__button form__newUser" type="button" value="Crear usuario">
            </a>
            <button class="purple__button">Entrar</button>
        </div>
    </form>

</body>

</html>