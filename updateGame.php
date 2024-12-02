<?php

/* BORRADO DE UN Juego */

//Comprobamos si el usuario esta inicilizado.
require_once "libs/controlSession.php";

include_once "clases/JuegoRetro.php";

include_once "./libs/conectarBD.php";

$errorJuego = "";
$idJue = 0;
$titJue = "";
$desJue = "";
$urlJue = "";
$imgJue = "";

if (!empty($_GET)) {
    
    $sql = "SELECT * FROM juegosRetro WHERE idJue = :idJuego";
    $sqlJuego = $pdo->prepare($sql);

    $sqlJuego->bindValue(":idJuego", $_GET["gameSelected"], PDO::PARAM_INT);

    //Ejecutamos la consulta.
    if($sqlJuego->execute()) {
        while ($fila = $sqlJuego->fetch(PDO::FETCH_ASSOC)) {
            $juego = new JuegoRetro($fila);
            $idJue = $juego->getIdJue();
            $titJue = $juego->getTitulo();
            $desJue = $juego->getDesc();
            $urlJue = $juego->getEnlace();
            $imgJue = $juego->getImg();
        }
    }
}

if (!empty($_POST)):

    $sql = "SELECT * FROM juegosRetro WHERE titJue = :tituloJuego";
    $sql = $pdo->prepare($sql);

    $sql->bindValue(":tituloJuego", $_POST["tituloJuego"], PDO::PARAM_STR);

    //Ejecutamos la consulta.
    $sql->execute();

    //Si se devuelven filas, es que el usuario ya existe, por lo tanto madaremos un mensaje de error.
    if ($sql->rowCount() > 0) {
        $errorJuego = "Un juego ya tiene el titulo indicado.";
    } else {

        //Si el usuario NO existe, lo añadirmeos a la tabla de "usuarios".
        $sql = "UPDATE juegosRetro SET titJue = :tituloJuego, imgJue = :imgJuego, descJue = :descJuego, urlJue = :urlJuego WHERE idJue = :idJuego";

        $sql = $pdo->prepare($sql);

        $sql->bindValue(":idJuego", $_POST["idJuego_update"], PDO::PARAM_INT);
        $sql->bindValue(":tituloJuego", $_POST["tituloJuego"], PDO::PARAM_STR);
        $sql->bindValue(":imgJuego", $_POST["imgJuego"], PDO::PARAM_STR);
        $sql->bindValue(":descJuego", $_POST["descJuego"], PDO::PARAM_STR);
        $sql->bindValue(":urlJuego", $_POST["urlJuego"], PDO::PARAM_STR);

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
    <div class="form__login">
        <h2>Actualizar juego</h2>
        <form action="updateGame.php" method="get">
            <select name="gameSelected" class="gameSelected" id="gameSelected">
                <?php
                while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
                    $fila = new JuegoRetro($fila);
                    echo "<option value=\"{$fila->getIdJue()}\">{$fila->getTitulo()}</option>";
                }

                ?>
            </select>
            <button id="cargarJuego">Cargar</button>
        </form>


        <form action="updateGame.php" method="post">

            <div>
                <input type="text" placeholder="" maxlength="100" required name="idJuego_update" id="idJuego_update" value="<?= $idJue ?>">
            </div>

            <div class="form__label">
                <input type="text" placeholder="" maxlength="100" required name="tituloJuego" id="tituloJuego" value="<?= $titJue ?>">
                <label>Titulo</label>
            </div><br><br>

            <div class="form__label">
                <input type="text" placeholder="" maxlength="255" required name="descJuego" id="descJuego" value="<?= $desJue ?>">
                <label>Descripción</label>
            </div><br><br>

            <div class="form__label">
                <input type="text" placeholder="" maxlength="255" required name="urlJuego" id="urlJuego" value="<?= $urlJue ?>">
                <label>Url descarga</label>
            </div><br><br>

            <div class="form__label">
                <input type="text" placeholder="" maxlength="255" name="imgJuego" id="imagenJuego" value="<?= $imgJue ?>">
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
    </div>
</body>

</html>