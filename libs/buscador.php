<?php

    include_once "../controlSession.php";
    
    /**
     * Funcion para añadir un buscador al principio de la pagina junto con etiquetas para el borrado del usuario y la seccion de la pagina.
     * @param string $nombreTitulo
     * @param mixed $objetoSesion
     * @return void
     */
    function buscador( string $nombreTitulo, $objetoSesion) {
    ?>

    <div class="buscador">
        <h1 class="tituloSeccion"><?= $nombreTitulo ?></h1>

        <form class="form__searcher" action="gamePage.php" method="get">
            <input type="text" class="form__searcher" name="busqueda" id="busqueda" placeholder="Busca un juego...">
            <button class="buttonSearch"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>

        <div class="mensajeLogin">
            <h2>Conectado como: <?= htmlspecialchars($objetoSesion->getNombre()) ?></h2>
            <a href="deleteUser.php">
                <button>Borrar usuario</button>
            </a>
        </div>
    </div>

    <?php
    }