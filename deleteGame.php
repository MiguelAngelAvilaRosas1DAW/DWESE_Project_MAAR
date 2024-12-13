<?php

/* BORRADO DE UN Juego */

//Comprobamos si el usuario esta inicilizado.
require_once "libs/controlSession.php";

include_once "clases/JuegoRetro.php";

include_once "./libs/conectarBD.php";

$mensajeBorrado = "";

if (!empty($_POST)) {

    //Borramos de la tabla "Juegos Retro" al usuario con la ID proporcionada.
    $sql = "DELETE FROM juegosRetro WHERE idJue = :idJuego";

    $sql = $pdo->prepare($sql);

    //Cogemos la id del juego retro y la sustituimos por su valor en la consulta.
    $sql->bindValue(":idJuego", $_POST["gameSelected"], PDO::PARAM_INT);

    //Ejecutamos la consulta.
    if ($sql->execute()) {
        $mensajeBorrado = "Juego borrado exitosamente.";
    };
}

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
    <title>Juegos Retro: Game Delete</title>
</head>

<?php

    $sql = "SELECT * FROM juegosRetro";

    $query = $pdo->prepare($sql);

    $query->execute();

?>

<body>
    <form class="form__login" action="deleteGame.php" method="post">
        <h2>Borrar juego</h2>
        <select name="gameSelected" class="gameSelected" id="gameSelected">
            
            <option>Selecciona un juego</option>
            <?php
            
                while ($fila = $query->fetch(PDO::FETCH_ASSOC)){
                    $fila = new JuegoRetro($fila);
                    echo "<option value=\"{$fila->getIdJue()}\">{$fila->getTitulo()}</option>";
                }

            ?>
            
        </select>

        <br>

        <span id="query_resolucion"><?= $mensajeBorrado ?></span>

        <div class="grid2" id="buttons__root">
            
                <a href="./adminPage.php">
                    <input class="form__back" type="button" value="Volver">
                </a>

                <button class="red__button">Borrar juego</button>

        </div>
        
    </form>
</body>

</html>