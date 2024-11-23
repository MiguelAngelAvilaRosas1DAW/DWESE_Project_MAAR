<?php

//Comprobamos si el usuario esta inicilizado.
require_once "./libs/controlSession.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/generalStyle.css">
    <script defer src="./assets/js/script.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <title>Pagina principal</title>
</head>

<body>

    <?php

    //Importamos el buscador y la clase Usuario, y sacamos al objeto con los datos del usuario.
    include_once "./libs/buscador.php";
    include_once "./clases/Usuario.php";

    $objetoSesion = unserialize($_SESSION["_usuario"]);

    //Establecemos un valor de busqueda predeterminado para la pagina.
    $busquedaRealizada = "";
    $errorBusqueda = true;

    //Si se ha relaizado un busqueda, el valor de esa busqueda se almacena en la varible de $busquedaRealizada.
    if (!empty($_GET)) {
        $busquedaRealizada = $_GET["busqueda"];
    }

    //Añadimos el buscador por pantalla.
    buscador("Mi biblioteca", $objetoSesion);

    ?>

    <?php

    include_once "./libs/conectarBD.php";

    //Realizamos una consulta que devuelva todos los juegos que tenga asignados el usuario.
    $sql = "SELECT * FROM juegosRetro
    JOIN juegosRetro_usuarios ON (juegosRetro_usuarios.idJue = juegosRetro.idJue)
    WHERE juegosRetro_usuarios.idUsu = :idUsuario";

    $sql = $pdo->prepare($sql);

    //Cogemos la id del usuario conectado y la sustituimos por su valor en la consulta.
    $sql->bindValue(":idUsuario", $objetoSesion->getId());

    //Ejecutamos la consulta.
    $sql->execute();

    //Si la consulta devuelve filas, muestra por pantalla las cards con información de las mismas.
    if ($sql->rowCount() > 0) {
        require_once "./clases/JuegoRetro.php";

        echo "<div id=\"mainContent\" class=\"grid2Games\">";

        //Guarda en la variable $fila una a una las columnas de la consulta.
        while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
            $juego = new JuegoRetro($fila);

            /*Si parte del nombre del titulo se encuentra en la busqueda realizada por el usuario, se muestra, y si no coincide con ninguna,
            se mostrara el error de busqueda por pantalla.*/
            if (str_contains(strtolower($juego->getTitulo()), strtolower($busquedaRealizada))) {
                echo $juego;
                echo "<div class=\"grid2Games\">";

                //Opciones para descargar el juego o borrarlo de la bilbioteca.
                echo "<a href=\"{$juego->getEnlace()}\" target=\"_blank\">
                <button class=\"purple__button\">Descargar</button>
                </a>";
                echo "<form action=\"./libs/borrarJuegos.php\" method=\"post\">
                <input type=\"number\" placeholder=\"\" name=\"idJuego\" id=\"idJuego\" value=\"{$juego->getIdJue()}\">
                <button class=\"red__button\">Borrar <i class=\"fa fa-times\" aria-hidden=\"true\"></i></button>
                </form>";
                echo "</div>";
                echo "</div>";
                $errorBusqueda = false;
            }
        }

        if ($errorBusqueda) {
            echo "<h1 class=\"mensajeErrorBusqueda error__color\">Nombre del titulo no encontrado</h1>";
        }
    } else {
        echo "<h1 class=\"mensajeErrorBusqueda neutral__color\">Biblioteca vacia</h1>";
    }
    ?>

<!--Footer con opciones para añadir juegos a la biblioteca o cerrar la sesion del usuario.-->
    <footer class="grid2 footer__buttons">
        <a href="gamePage.php">
            <button class="green__button">Añadir juegos <i class="fa fa-plus" aria-hidden="true"></i></button>
        </a>
        <a href="./libs/logout.php">
            <button class="red__button">Cerrar sesión</button>
        </a>
    </footer>
</body>

</html>