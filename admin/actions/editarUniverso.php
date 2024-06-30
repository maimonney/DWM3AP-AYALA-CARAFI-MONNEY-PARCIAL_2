<?php
require_once "../../funciones/autoload.php";


try {
    $nombre_universo = htmlspecialchars($_POST["nombre"]);
    $creacion_universo = htmlspecialchars($_POST["creacion"]);
    $descripcion_universo = htmlspecialchars($_POST["descripcion"]);

    (new Universo())->edit($id_universo, $nombre_universo, $creacion_universo, $descripcion_universo);

    header("Location: ../index.php?sec=adm_universo");
} catch (Exception $e) {
    echo $e->getMessage();
}