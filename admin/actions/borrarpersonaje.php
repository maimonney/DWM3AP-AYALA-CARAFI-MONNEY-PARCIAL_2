<?php
require_once "../../funciones/autoload.php";
$id = $_GET["id"] ?? false;
try {
    if ($id) {
        $personaje = new Personaje();
        $personaje->setId($id);
        $personaje->delete();
        header("Location: ../index.php?sec=adm_personaje");
    } else {
        throw new Exception("No se encontró un personaje con esa id");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}