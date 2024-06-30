<?php
require_once "../../funciones/autoload.php";

try {
    $nombre_serie = htmlspecialchars($_POST["nombre"]);
    $descripcion_serie = htmlspecialchars($_POST["descripcion"]);
    $fecha_inicio_serie = htmlspecialchars($_POST["fecha"]);
    $editorial_id_serie = htmlspecialchars($_POST["editorial"]);

    (new Serie())->insert($nombre_serie, $descripcion_serie, $fecha_inicio_serie, $editorial_id_serie);

    header("Location: ../index.php?sec=adm_serie");
    exit(); 
} catch (Exception $e) {
    die($e->getMessage()); 
}
