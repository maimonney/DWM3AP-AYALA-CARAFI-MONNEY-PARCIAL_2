<?php

class Carrito{
    // Agregar
    public function add_producto(int $productoID, int $cantidad)
    {
        $producto = (new Comic())->catalogo_id($productoID);
        if ($producto) {
            session_start(); 

            $_SESSION['carrito'][$productoID] = [
                "titulo" => $producto->getTituloComic(),
                "portada" => $producto->getPortadaComic(),
                "precio" => $producto->getPrecioComic(),
                "cantidad" => $cantidad 
            ];
        }
    }

    // Eliminar
    public function daleteProducto($id)
    {
        session_start(); 

        if (isset($_SESSION["carrito"][$id])) {
            unset($_SESSION["carrito"][$id]);
        }
    }

    // Obtener el carrito
    public function get_carrito() : array
    {
        session_start(); 

        if (isset($_SESSION["carrito"])) {
            return $_SESSION["carrito"];
        }
        return [];
    }

    // Actualizar 
    public function actualizarCarrito(array $cantidades)
    {
        session_start(); 

        foreach ($cantidades as $id => $cantidad) {
            if (isset($_SESSION["carrito"][$id])) {
                $_SESSION["carrito"][$id]["cantidad"] = $cantidad;
            }
        }
    }

    // Vaciar 
    public function VaciarCarrito()
    {
        session_start(); 

        $_SESSION["carrito"] = [];
    }
}