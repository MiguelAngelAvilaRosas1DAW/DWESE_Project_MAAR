<?php

//Destruye la sesion del usuario y lo devuelve al index.

include_once "controlSession.php";

$_SESSION = [];

session_destroy();

// Obtener el esquema (http o https)
$scheme = isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'https';
// Obtener el host (dominio o subdominio actual)
$host = $_SERVER['HTTP_HOST'];

// Construir la URL del inicio
$inicio = $scheme . "://" . $host . "/";

die(header("Location: {$inicio}"));
