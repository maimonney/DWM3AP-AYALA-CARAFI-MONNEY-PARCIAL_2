<?php
require_once "../../funciones/autoload.php";

$id = $_GET["id"] ?? false;

if($id){
    (new Carrito())->daleteProducto($id);
    (new Alerta())->add_alerta("Producto eliminado!", "danger");
    header("location: ../../index.php?sec=carrito");
}
header("location: ../../index.php?sec=carrito");