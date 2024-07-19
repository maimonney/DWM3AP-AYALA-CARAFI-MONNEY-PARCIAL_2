<?php
require_once "../../funciones/autoload.php";

try {
    $usuario_id = htmlspecialchars($_SESSION['login']['usuario_id']);
    $fecha_horario = date('Y-m-d H:i:s');
    $total = htmlspecialchars($_POST["total"]);

    $carrito = new Carrito();
    $carrito->insert($usuario_id, $fecha_horario, $total);

    print_r($carrito);
    $carrito_id = $carrito->getIdCarrito();
    print_r($carrito_id);

    if ($carrito_id) {
        $detallesCompra = new DetallesCompra();

        $carrito->insertarDetallesCompra($detallesCompra, $carrito_id);

        header("location: ../../index.php?sec=compraFinalizada");
        exit();
    } else {
        throw new Exception("Error al obtener el ID del carrito.");
    }
} catch (Exception $e) {
    die($e->getMessage());
}