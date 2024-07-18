<?php
require_once "../../funciones/autoload.php";

$id = $_POST["id"] ?? false;
$cantidad = $_POST["cantidad"] ?? 1;

if($id){
    (new Carrito())->add_producto($id, $cantidad);
    header("location: ../../index.php?sec=carritoViews");
}