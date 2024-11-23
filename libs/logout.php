<?php

    //Destruye la sesion del usuario y lo devuelve al index.

    include_once "controlSession.php";

    $_SESSION = [];

    session_destroy();

    header("Location: http://localhost:8080/ProyectoFinal/");