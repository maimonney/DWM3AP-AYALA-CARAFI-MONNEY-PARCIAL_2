<?php
require_once "../../funciones/autoload.php";

try {
    $nombre_universo = htmlspecialchars($_POST["nombre"]);
    $creacion_universo = htmlspecialchars($_POST["fecha"]);
    $descripcion_universo = htmlspecialchars($_POST["descripcion"]);

    $universo = new Universo();
    $universo->setNombre($nombre_universo);
    $universo->setCreacion($creacion_universo);
    $universo->setDescripcion($descripcion_universo);

    $universo->insert();
    (new Alerta())->add_alerta("Se agrego corectamente", "success");

    header("Location: ../index.php?sec=adm_universo");
    exit();
} catch (Exception $e) {
    die($e->getMessage());
}
?>
