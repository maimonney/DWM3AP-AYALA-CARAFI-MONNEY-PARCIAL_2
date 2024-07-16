<?php
  class DetallesCompra{
    protected $id_detalle;
    protected $carrito_id;
    protected $comic_id;
    protected $cantidad;


    /**
     * Get the value of id_detalle
     */
    public function getIdDetalle()
    {
        return $this->id_detalle;
    }

    /**
     * Set the value of id_detalle
     */
    public function setIdDetalle($id_detalle): self
    {
        $this->id_detalle = $id_detalle;

        return $this;
    }

    /**
     * Get the value of carrito_id
     */
    public function getCarritoId()
    {
        return $this->carrito_id;
    }

    /**
     * Set the value of carrito_id
     */
    public function setCarritoId($carrito_id): self
    {
        $this->carrito_id = $carrito_id;

        return $this;
    }

    /**
     * Get the value of comic_id
     */
    public function getComicId()
    {
        return $this->comic_id;
    }

    /**
     * Set the value of comic_id
     */
    public function setComicId($comic_id): self
    {
        $this->comic_id = $comic_id;

        return $this;
    }

    /**
     * Get the value of cantidad
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     */
    public function setCantidad($cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function __construct($carrito_id, $comic_id, $cantidad) {
        $this->carrito_id = $carrito_id;
        $this->comic_id = $comic_id;
        $this->cantidad = $cantidad;
    }

    public function guardarDetalleCompra() {
        try {
            $conexion = new Conexion();
            $db = $conexion->getConexion();

            $stmt = $db->prepare("INSERT INTO carrito_detalle (carrito_id, comic_id, cantidad) VALUES (:carrito_id, :comic_id, :cantidad)");
            $stmt->execute([
                ':carrito_id' => $this->carrito_id,
                ':comic_id' => $this->comic_id,
                ':cantidad' => $this->cantidad
            ]);

            return true;
        } catch (PDOException $e) {
            echo "Error al guardar detalle de compra: " . $e->getMessage();
            return false;
        }
    }


    // public function obtenerDetallesCompra($compra_id) {
    //     try {
    //         $conexion = new Conexion();
    //         $db = $conexion->getConexion();
    //         $stmt = $this->$db->prepare("SELECT * FROM detalle_compra WHERE compra_id = :compra_id");
    //         $stmt->execute([':compra_id' => $compra_id]);
    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         echo "Error al obtener detalles de compra: " . $e->getMessage();
    //         return [];
    //     }
    // }
  }