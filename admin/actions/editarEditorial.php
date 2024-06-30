<?php
require_once "../../funciones/autoload.php";


try {


    (new Editorial())->edit(
        htmlspecialchars($_POST["nombre"]),
        htmlspecialchars($_POST["pais_origen"]),
        htmlspecialchars($_POST["fundacion"]),
        htmlspecialchars($_POST["descripcion"])
    );

    header("Location: ../index.php?sec=adm_editorial");
} catch (Exception $e) {
    echo $e->getMessage();
}