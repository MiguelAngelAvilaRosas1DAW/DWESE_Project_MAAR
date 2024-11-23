<?php

/* COMPROBACION DEL LOGUEO DEL USUARIO */

session_start();

// Obtener el esquema (http o https)
$scheme = isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'https';
// Obtener el host (dominio o subdominio actual)
$host = $_SERVER['HTTP_HOST'];

// Construir la URL del inicio
$inicio = $scheme . "://" . $host . "/";

//Si el usuario no existe, o su tiempo de expiracion ha acabado, devulve al index.
if (!isset($_SESSION["_usuario"])) {
    die(header("Location: {$inicio}"));
}

if (time() >= $_SESSION["_tiempo"]) {
    session_destroy();
    die(header("Location: {$inicio}"));
}

$_SESSION["_token"] = md5(time());