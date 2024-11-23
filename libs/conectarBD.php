<?php

include_once "../controlSession.php";

//Nos conectamos a la base de datos.
try {
    $pdo = new PDO("mysql:host=db;dbname=bdJuegosRetro;charset=utf8mb4", "root", "");
} catch (PDOException $exception) {
    $errorUsuario = "No se pudo conectar a la BD.";
}