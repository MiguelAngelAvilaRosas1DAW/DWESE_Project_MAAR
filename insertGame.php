<?php

/* INSERCIÓN DE UN JUEGO POR ADMINISTRACIÓN */

//Comprobamos si el juego esta inicilizado.
require_once "./libs/controlSession.php";

$errorJuego = "";

if (!empty($_POST)):

    include_once "./libs/conectarBD.php";

    $sql = "SELECT * FROM juegosRetro WHERE titJue = :tituloJuego";
    $sql = $pdo->prepare($sql);

    $sql->bindValue(":tituloJuego", $_POST["tituloJuego"],PDO::PARAM_STR);

    //Ejecutamos la consulta.
    $sql->execute() ;

    //Si se devuelven filas, es que el juego ya existe, por lo tanto madaremos un mensaje de error.
    if ($sql->rowCount() > 0) {
        $errorJuego = "Este juego ya existe.";
    } else {

        //Si el juego NO existe, lo añadirmeos a la tabla de "Juegos Retro".
        $sql = "INSERT INTO juegosRetro(titJue, imgJue, descJue, urlJue) VALUES (:tituloJuego,:imgJuego,:descJuego,:urlJuego)";

        $sql = $pdo->prepare($sql);

        $sql->bindValue(":tituloJuego", $_POST["tituloJuego"],PDO::PARAM_STR);
        $sql->bindValue(":imgJuego", $_POST["imgJuego"],PDO::PARAM_STR);
        $sql->bindValue(":descJuego", $_POST["descJuego"],PDO::PARAM_STR);
        $sql->bindValue(":urlJuego", $_POST["urlJuego"],PDO::PARAM_STR);
        
        if ($sql->execute()) {
            die(header("Location: adminPage.php"));
        } else {
            // Error en la inserción
            $errorJuego = "Error al registrar el juego.";
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
    <title>Juegos Retro: Game Insert</title>
</head>

<body>
    <form class="form__login" action="insertGame.php" method="post">
        <h2>Nuevo juego</h2>
        <div class="form__label">
            <input type="text" placeholder="" maxlength="100" required name="tituloJuego" id="tituloJuego">
            <label>Titulo</label>
        </div><br><br>

        <div class="form__label">
            <input type="text" placeholder="" maxlength="255" required name="descJuego" id="descJuego">
            <label>Descripción</label>
        </div><br><br>

        <div class="form__label">
            <input type="text" placeholder="" maxlength="255" required name="urlJuego" id="urlJuego">
            <label>Url descarga</label>
        </div><br><br>

        <div class="form__label">
            <input type="text" placeholder="" maxlength="255" name="imgJuego" id="imagenJuego">
            <label>Imagen</label>
        </div>
        <span><?= $errorJuego ?></span><br><br>
        <div class="grid2">
            <a href="./adminPage.php">
                <input class="form__back" type="button" value="Volver">
            </a>

            <button class="green__button">Insertar juego</button>

        </div>
    </form>
</body>

</html>