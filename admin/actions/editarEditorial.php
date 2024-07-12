<?php
require_once "../../funciones/autoload.php";

try {
    $id_editorial = htmlspecialchars($_POST["id"]);
    $nombre_editorial = htmlspecialchars($_POST["nombre"]);
    $pais_origen_editorial = htmlspecialchars($_POST["pais_origen"]);
    $fundacion_editorial = htmlspecialchars($_POST["fundacion"]);
    $descripcion_editorial = htmlspecialchars($_POST["descripcion"]);

    (new Editorial())->edit($id_editorial, $nombre_editorial, $pais_origen_editorial, $fundacion_editorial, $descripcion_editorial);
    (new Alerta())->add_alerta("Se pudo editar corectamente", "success");

    header("Location: ../index.php?sec=adm_editorial");
} catch (Exception $e) {
    echo $e->getMessage();
}