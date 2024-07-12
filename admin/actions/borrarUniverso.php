<?php
require_once "../../funciones/autoload.php";
$id = $_GET["id"] ?? false;
try {
    if ($id) {
        $universo = new Universo();
        $universo->setId($id);
        $universo->delete();
        (new Alerta())->add_alerta("Se borro corectamente", "danger");
        header("Location: ../index.php?sec=adm_universo");
    } else {
        throw new Exception("No se encontró una universo con esa id");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}