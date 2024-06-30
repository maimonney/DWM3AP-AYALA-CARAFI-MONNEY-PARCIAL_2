<?php
require_once "../../funciones/autoload.php";

try {

    (new Serie())->edit(
        htmlspecialchars($_POST["nombre"]),
        htmlspecialchars($_POST["descripcion"]), 
        htmlspecialchars($_POST["fecha"]),
        htmlspecialchars($_POST["editorial"])
    );

    header("Location: ../index.php?sec=adm_serie");
} catch (Exception $e) {
    echo $e->getMessage();
}