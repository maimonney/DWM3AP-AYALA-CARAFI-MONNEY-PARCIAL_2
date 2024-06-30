<?php
require_once "../../funciones/autoload.php";

try {
    $nombre_autor = htmlspecialchars($_POST["nombre"]);
    $alias_autor = htmlspecialchars($_POST["alias_autor"]);
    $nacimiento_autor = htmlspecialchars($_POST["nacimiento"]);
    $biografia_autor = htmlspecialchars($_POST["biografia"]);

    $autor = new Autor();
    $autor->insert($nombre_autor, $alias_autor, $nacimiento_autor, $biografia_autor);

    header("Location: ../index.php?sec=adm_autor");
    exit(); 
} catch (Exception $e) {
    die($e->getMessage()); 
}