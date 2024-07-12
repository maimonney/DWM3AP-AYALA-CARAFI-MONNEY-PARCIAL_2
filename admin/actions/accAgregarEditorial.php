<?php
require_once "../../funciones/autoload.php";

try {
    $nombre_editorial = htmlspecialchars($_POST["nombre"]);
    $pais_origen_editorial = htmlspecialchars($_POST["pais_origen"]);
    $fundacion_editorial = htmlspecialchars($_POST["fundacion"]);
    $descripcion_editorial = htmlspecialchars($_POST["descripcion"]);

    (new Editorial())->insert($nombre_editorial, $pais_origen_editorial, $fundacion_editorial, $descripcion_editorial);
    (new Alerta())->add_alerta("Se agrego corectamente", "success");

    header("Location: ../index.php?sec=adm_editorial");
    exit(); 
} catch (Exception $e) {
    die($e->getMessage()); 
}
