<?php

require_once "../../funciones/autoload.php";

(new DetallesCompra())->guardarDetalleCompra();
(new Carrito())->VaciarCarrito();

header("location: ../../index.php?sec=compraFinalizada");