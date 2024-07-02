<?php
require_once "../../funciones/autoload.php";

if (!empty($_POST["cantidad"])) {
    $cantidades = $_POST["cantidad"];
    (new Carrito())->actualizarCarrito($cantidades);
    (new Alerta())->add_alerta("Carrito actualizado!", "success");
    header("Location: ../../index.php?sec=carrito");
    exit; 
} else {
    (new Alerta())->add_alerta("Error al actualizar el carrito. No se recibieron cantidades válidas.", "danger");
    header("Location: ../../index.php?sec=carrito");
    exit;
}