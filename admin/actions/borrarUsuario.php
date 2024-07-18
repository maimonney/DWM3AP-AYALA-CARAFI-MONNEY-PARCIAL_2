<?php
require_once "../../funciones/autoload.php";
$id = $_GET["id"] ?? false;

try {
    if ($id) {
        $usuario = new Usuario();
        $usuario->setId($id);
        $usuario->delete();
        (new Alerta())->add_alerta("Se borro corectamente", "danger");
        header("Location: ../index.php?sec=adm_usuarios");
    } else {
        throw new Exception("No se encontró un usuario con esa id");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}