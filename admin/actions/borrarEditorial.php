<?php
require_once "../../funciones/autoload.php";
$id = $_GET["id"] ?? false;
try {
    if ($id) {
        $editorial = new Editorial();
        $editorial->setIdEditorial($id);
        $editorial->delete();
        header("Location: ../index.php?sec=adm_editorial");
    } else {
        throw new Exception("No se encontró una editorial con esa id");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}