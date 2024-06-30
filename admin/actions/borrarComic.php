<?php
require_once "../../funciones/autoload.php";
$id_comic = $_GET["id"] ?? false;

try {
    if ($id_comic) {
        $comic = new Comic();
        $comic->setIdComic($id_comic);
        $comic->delete();
        header("Location: ../index.php?sec=adm_comic");
    } else {
        throw new Exception("No se encontró un comic con esa id");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}