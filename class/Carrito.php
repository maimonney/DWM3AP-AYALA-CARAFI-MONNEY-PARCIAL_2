<?php

class Carrito{
    protected $id_carrito;
    protected $usuario_id;
    protected $fecha_horario;
    protected $total;

    public function insert($usuario_id, $fecha_horario, $total) {
        
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $query = "INSERT INTO `carrito` (`usuario_id`, `fecha_horario`, `total`) VALUES (:usuario_id, :fecha_horario, :total)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ':usuario_id' => $usuario_id,
            ':fecha_horario' => $fecha_horario,
            ':total' => $total,
        ]);
        $this->id_carrito = $db->lastInsertId();
    }

    public function insertarDetallesCompra(DetallesCompra $detallesCompra, $carrito_id) {
        $productos = $this->get_carrito();

        foreach ($productos as $id => $producto) {
            $detallesCompra->insert($carrito_id, $producto['id_comic'], $producto['cantidad']);
        }

        $this->VaciarCarrito();
    }

    public function getCarritosUsuario($usuarioId) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $query = "SELECT * FROM carrito WHERE usuario_id = :usuario_id";
        $stmt = $db->prepare($query);
        $stmt->execute([':usuario_id' => $usuarioId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add_producto(int $productoID, int $cantidad)
    {
        $producto = (new Comic())->catalogo_id($productoID);
        if ($producto) {
            session_start(); 

            $_SESSION['carrito'][$productoID] = [
                "id_comic" => $producto->getIdComic(),
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

    public function calcularTotal()
    {
        $total = 0;
        foreach ($_SESSION['carrito'] as $productoID => $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }
        return $total;
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

    public function finalizarCompra(){
        session_start(); 
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