<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */

    require_once "./clases/Usuario.php" ;

    $usuarios = [
        new Usuario("bruce@wayne.com",     "12345678", "Bruce", "Wayne"),
        new Usuario("selina@wayne.com",    "12345678", "Selina", "Kyle"),
        new Usuario("copperpot@wayne.com", "12345678", "Oswald", "Copperpot"),
    ] ;