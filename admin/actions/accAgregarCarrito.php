<?php
require_once "../../funciones/autoload.php";

try {

    $usuario_id = htmlspecialchars($_SESSION['login']['usuario_id']);
    $fecha_horario = date('Y-m-d H:i:s');
    $total = htmlspecialchars($_POST["total"]);
    
    $carrito_id = htmlspecialchars($_POST["carrito_id"]);
    $comic_id = htmlspecialchars($_POST["comic_id"]);
    $cantidad = htmlspecialchars($_POST["cantidad"]);

    (new Carrito())->insert($usuario_id, $fecha_horario, $total);
    (new DetallesCompra())->insert($carrito_id, $comic_id, $cantidad) ;
    (new Carrito())->VaciarCarrito();

    header("location: ../../index.php?sec=compraFinalizada");
    exit();
} catch (Exception $e) {
    die($e->getMessage());
}
