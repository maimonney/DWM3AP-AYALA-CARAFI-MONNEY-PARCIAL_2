<?php
require_once "../../funciones/autoload.php";
$id = $_GET["id"] ?? false;

try {
    if ($id) {
        $autor = new Autor();
        $autor->setId($id);
        $autor->delete();
        (new Alerta())->add_alerta("Se borro corectamente", "danger");
        header("Location: ../index.php?sec=adm_autor");
    } else {
        throw new Exception("No se encontró un autor con esa id");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}