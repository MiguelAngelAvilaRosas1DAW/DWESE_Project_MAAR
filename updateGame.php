<?php

/* BORRADO DE UN Juego */

//Comprobamos si el usuario esta inicilizado.
require_once "libs/controlSession.php";

include_once "clases/JuegoRetro.php";

include_once "./libs/conectarBD.php";

$errorJuego = "";

if (!empty($_POST)):

    $sql = "SELECT * FROM juegosRetro WHERE titJue = :tituloJuego";
    $sql = $pdo->prepare($sql);

    $sql->bindValue(":tituloJuego", $_POST["tituloJuego"],PDO::PARAM_STR);

    //Ejecutamos la consulta.
    $sql->execute() ;

    //Si se devuelven filas, es que el usuario ya existe, por lo tanto madaremos un mensaje de error.
    if ($sql->rowCount() > 0) {
        $errorJuego = "Un juego ya tiene el titulo indicado.";
    } else {

        //Si el usuario NO existe, lo añadirmeos a la tabla de "usuarios".
        $sql = "UPDATE juegosRetro SET titJue = :tituloJuego, imgJue = :imgJuego, descJue = :descJuego, urlJue = :urlJuego WHERE idJue = :idJuego";

        $sql = $pdo->prepare($sql);

        $sql->bindValue(":idJuego", $_POST["gameSelected"], PDO::PARAM_INT);
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
    <title>Juegos Retro: Game Update</title>
</head>

<?php

    $sql = "SELECT * FROM juegosRetro";

    $query = $pdo->prepare($sql);

    $query->execute();

?>

<body>
    <form class="form__login" action="updateGame.php" method="post">
        <h2>Actualizar juego</h2>
        <select name="gameSelected" class="gameSelected" id="gameSelected">
            
            <option>Selecciona un juego</option>
            <?php
            
                while ($fila = $query->fetch(PDO::FETCH_ASSOC)){
                    $fila = new JuegoRetro($fila);
                    echo "<option value=\"{$fila->getIdJue()}\">{$fila->getTitulo()}</option>";
                }

            ?>
            
        </select>

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

                <button class="purple__button">Actualizar</button>

        </div>
        
    </form>
</body>

</html>