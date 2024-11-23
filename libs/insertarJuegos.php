<?php

/* INSERCIÓN DE UN JUEGO */

//Comprobamos si el usuario esta inicilizado.
include_once "controlSession.php";

//Añadimos la clase usuario y sacamos al objeto con los datos del usuario.
include_once "../clases/Usuario.php";

$usuario = unserialize($_SESSION["_usuario"]);

include_once "./conectarBD.php";

//Consulta para comprobar si la relacion entre el usuario y el juego ya a sido creada.
$sql = "SELECT * FROM juegosRetro_usuarios WHERE idUsu = :idUsuario AND idJue = :idJuego;";

$sql = $pdo->prepare($sql);

//Cogemos la id del usuario conectado y la id del juego por POST y sustituimos los valores de la consulta.
$sql->bindValue("idUsuario", $usuario->getId(), PDO::PARAM_INT);

$sql->bindValue("idJuego", $_POST["idJuego"], PDO::PARAM_INT);

//Ejecutamos la consulta
$sql->execute();

//Si el resultado de la consulta no encuentra ninguna relacion, añade la nueva, y si existe, simplemente devuelve al usuario a su biblioteca.
if (!$sql->rowCount() > 0) {

    //Consulta para añadir en la tabla juegosRetro_usuarios la relación del usuario y el juego.
    $sql = "INSERT INTO juegosRetro_usuarios(idUsu, idJue) VALUES (:idUsuario,:idJuego)";

    $sql = $pdo->prepare($sql);

    $sql->bindValue("idUsuario", $usuario->getId(), PDO::PARAM_INT);

    $sql->bindValue("idJuego", $_POST["idJuego"], PDO::PARAM_INT);

    if ($sql->execute()) {
        die(header("location: ../mainPage.php"));
    }
} else {
    die(header("location: ../mainPage.php"));
}