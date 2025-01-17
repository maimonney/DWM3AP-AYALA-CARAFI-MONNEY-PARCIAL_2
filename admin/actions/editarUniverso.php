<?php
require_once "../../funciones/autoload.php";

try {
    $id_universo = htmlspecialchars($_POST["id"]);
    $nombre_universo = htmlspecialchars($_POST["nombre"]);
    $creacion_universo = htmlspecialchars($_POST["creacion"]);
    $descripcion_universo = htmlspecialchars($_POST["descripcion"]);

    (new Universo())->edit($id_universo, $nombre_universo, $creacion_universo, $descripcion_universo);
    (new Alerta())->add_alerta("Se pudo editar corectamente", "success");

    header("Location: ../index.php?sec=adm_universo");
} catch (Exception $e) {
    echo $e->getMessage();
}