<?php

class Carrito{

    protected $id_carrito;
    protected $usuario_id;
    protected $fecha_horario;
    protected $total;

    
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
    public function calcularTotal()
    {
        $total = 0;
        foreach ($_SESSION['carrito'] as $productoID => $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }
        return $total;
    }

    public function finalizarCompra()
    {
        try {
            $conexion = new Conexion();
            $db = $conexion->getConexion();
            $db->beginTransaction();

            $stmt = $db->prepare("INSERT INTO carrito (usuario_id, fecha_horario, total) VALUES (:usuario_id, NOW(), :total)");
            $stmt->execute([
                ':usuario_id' => $this->usuario_id,
                ':total' => $this->total
            ]);

            $carrito_id = $db->lastInsertId();

            foreach ($_SESSION['carrito'] as $productoID => $producto) {
                $detalle = new DetallesCompra($carrito_id, $productoID, $producto['cantidad']);
                $detalle->guardarDetalleCompra(); 
            }

            $db->commit();
            $_SESSION['carrito'] = [];

            return true;
        } catch (PDOException $e) {
            $db->rollback();
            echo "Error al finalizar compra: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerHistorialCompras($usuarioID) {
        try {
            $conexion = new Conexion();
            $db = $conexion->getConexion();
            
            $stmt = $db->prepare("SELECT c.id_carrito, c.fecha_horario, c.total, cd.comic_id, cd.cantidad,
                                  comic.titulo_comic, comic.portada_comic, comic.precio_comic
                                  FROM carrito c
                                  INNER JOIN carrito_detalle cd ON c.id_carrito = cd.carrito_id
                                  INNER JOIN comic ON cd.comic_id = comic.id_comic
                                  WHERE c.usuario_id = :usuario_id
                                  ORDER BY c.fecha_horario DESC");
            $stmt->execute([':usuario_id' => $usuarioID]);
            $historial = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Organizar los detalles de compra por cada compra
            $compras = [];
            foreach ($historial as $fila) {
                $id_carrito = $fila['id_carrito'];
                if (!isset($compras[$id_carrito])) {
                    $compras[$id_carrito] = [
                        'id_carrito' => $id_carrito,
                        'fecha_horario' => $fila['fecha_horario'],
                        'total' => $fila['total'],
                        'detalles' => []
                    ];
                }

                // Agregar detalles de cada compra
                $compras[$id_carrito]['detalles'][] = [
                    'comic_id' => $fila['comic_id'],
                    'titulo_comic' => $fila['titulo_comic'],
                    'portada_comic' => $fila['portada_comic'],
                    'precio_comic' => $fila['precio_comic'],
                    'cantidad' => $fila['cantidad']
                ];
            }

            return $compras;
        } catch (PDOException $e) {
            echo "Error al obtener historial de compras: " . $e->getMessage();
            return [];
        }
    }

    /**
     * Get the value of id_carrito
     */
    public function getIdCarrito()
    {
        return $this->id_carrito;
    }

    /**
     * Set the value of id_carrito
     */
    public function setIdCarrito($id_carrito): self
    {
        $this->id_carrito = $id_carrito;

        return $this;
    }

    /**
     * Get the value of usuario_id
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     */
    public function setUsuarioId($usuario_id): self
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Get the value of fecha_horario
     */
    public function getFechaHorario()
    {
        return $this->fecha_horario;
    }

    /**
     * Set the value of fecha_horario
     */
    public function setFechaHorario($fecha_horario): self
    {
        $this->fecha_horario = $fecha_horario;

        return $this;
    }

    /**
     * Get the value of total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     */
    public function setTotal($total): self
    {
        $this->total = $total;

        return $this;
    }
}