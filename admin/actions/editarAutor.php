<?php
require_once "../../funciones/autoload.php";

try {
    $id_autor = htmlspecialchars($_POST["id"]);
    $nombre_autor = htmlspecialchars($_POST["nombre_autor"]);
    $alias_autor = htmlspecialchars($_POST["alias_autor"]);
    $nacimiento_autor = htmlspecialchars($_POST["nacimiento_autor"]);
    $biografia_autor = htmlspecialchars($_POST["biografia_autor"]);

    (new Autor())->edit($id_autor, $nombre_autor, $alias_autor, $nacimiento_autor, $biografia_autor);
    (new Alerta())->add_alerta("Se pudo editar corectamente", "success");

    header("Location: ../index.php?sec=adm_autor");
} catch (Exception $e) {
    echo $e->getMessage();
}