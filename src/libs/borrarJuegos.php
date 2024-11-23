<?php

/* BORRADO DE UN JUEGO */

//Comprobamos si el usuario esta inicilizado.
include_once "controlSession.php";

//Añadimos la clase usuario y sacamos al objeto con los datos del usuario.
include_once "../clases/Usuario.php";

$usuario = unserialize($_SESSION["_usuario"]);

include_once "./conectarBD.php";

//Consulta para borrar en la tabla "juegosRetro_usuarios" la relación del usuario y el juego.
$sql = "DELETE FROM juegosRetro_usuarios WHERE idUsu = :idUsuario AND idJue = :idJuego";

$sql = $pdo->prepare($sql);

//Cogemos la id del usuario conectado y la id del juego por POST y sustituimos los valores de la consulta.
$sql->bindValue("idUsuario", $usuario->getId(), PDO::PARAM_INT);

$sql->bindValue("idJuego", $_POST["idJuego"], PDO::PARAM_INT);

//Ejecutamos la consulta y devolvemos al usuario a su biblioteca.
if ($sql->execute()) {
    die(header("location: ../mainPage.php"));
}
