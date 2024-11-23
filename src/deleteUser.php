<?php

/* BORRADO DE UN USUARIO */

//Comprobamos si el usuario esta inicilizado.
require_once "./libs/controlSession.php";

//Añadimos la clase usuario y sacamos al objeto con los datos del usuario.
include_once "./clases/Usuario.php";

$objetoSesion = unserialize($_SESSION["_usuario"]);

//Obtenemos la id del usuario y la guardamos en la variable $usuario.
$usuario = $objetoSesion->getId();

include_once "./libs/conectarBD.php";

//Borramos de la tabla "usuarios" al usuario con la ID proporcionada.
$sql = "DELETE FROM usuarios WHERE idUsu = :idUsuario";

$sql = $pdo->prepare($sql);

//Cogemos la id del usuario conectado y la sustituimos por su valor en la consulta.
$sql->bindValue(":idUsuario", $usuario, PDO::PARAM_INT);

//Ejecutamos la consulta.
$sql->execute();

//Destruimos la sesion del usuario y la redirigimos a la pagina de index.
$_SESSION = [];

session_destroy();

header("Location: http://localhost:8080/ProyectoFinal/");