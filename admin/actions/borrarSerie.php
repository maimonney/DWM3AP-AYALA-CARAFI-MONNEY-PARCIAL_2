<?php
require_once "../../funciones/autoload.php";
$id = $_GET["id"] ?? false;
try {
    if ($id) {
        $serie = new Serie();
        $serie->setIdSerie($id);
        $serie->delete();
        header("Location: ../index.php?sec=adm_serie");
    } else {
        throw new Exception("No se encontró una serie con esa id");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}