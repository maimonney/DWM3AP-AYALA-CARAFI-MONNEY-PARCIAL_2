<?php
class DetallesCompra
{
    protected $id_detalle;
    protected $carrito_id;
    protected $comic_id;
    protected $cantidad;

    public function insert($carrito_id, $comic_id, $cantidad) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $query = "INSERT INTO `carrito_detalle` (`carrito_id`, `comic_id`, `cantidad`) VALUES (:carrito_id, :comic_id, :cantidad)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ':carrito_id' => $carrito_id,
            ':comic_id' => $comic_id,
            ':cantidad' => $cantidad,
        ]);
    }

    public function getDetallesCarrito($carrito_id) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $query = "SELECT * FROM carrito_detalle WHERE carrito_id = :carrito_id";
        $stmt = $db->prepare($query);
        $stmt->execute([':carrito_id' => $carrito_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

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

}