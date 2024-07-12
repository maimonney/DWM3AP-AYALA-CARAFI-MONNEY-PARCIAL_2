<?php

require_once "../../funciones/autoload.php";

(new Carrito())->VaciarCarrito();

header("location: ../../index.php?sec=compraFinalizada");