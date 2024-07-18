<?php
require_once "../../funciones/autoload.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST["cantidad"])) {
    $miCarrito = new Carrito(); 

    $cantidades = $_POST["cantidad"];

    foreach ($cantidades as $id => $cantidad) {
        if ((int)$cantidad === 0) {
            $miCarrito->daleteProducto($id); 
        } else {
            $miCarrito->actualizarCarrito($cantidades);
        }
    }

    (new Alerta())->add_alerta("Carrito actualizado!", "success");
    header("Location: ../../index.php?sec=carritoViews");
    exit;
} else {
    (new Alerta())->add_alerta("Error al actualizar el carrito. No se recibieron cantidades válidas.", "danger");
    header("Location: ../../index.php?sec=carritoViews");
    exit;
}