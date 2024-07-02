<?php
require_once "../../funciones/autoload.php";

try {
    $id_serie = htmlspecialchars($_POST["id"]); 
    $nombre_serie = htmlspecialchars($_POST["nombre"]);
    $descripcion_serie = htmlspecialchars($_POST["descripcion"]);
    $fecha_inicio_serie = htmlspecialchars($_POST["fecha"]);
    $editorial_id_serie = htmlspecialchars($_POST["editorial"]);

    $serie = new Serie();
    $serie->edit($id_serie, $nombre_serie, $descripcion_serie, $fecha_inicio_serie, $editorial_id_serie);
    (new Alerta())->add_alerta("Se pudo editar corectamente", "success");

    header("Location: ../index.php?sec=adm_serie");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}