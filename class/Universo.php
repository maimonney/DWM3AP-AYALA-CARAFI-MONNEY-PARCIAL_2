<?php

require_once 'Conexion.php';

class Universo
{
    protected $id_universo;
    protected $nombre_universo;
    protected $creacion_universo;
    protected $descripcion_universo;

    public function getId()
    {
        return $this->id_universo;
    }

    public function setId($id_universo): self
    {
        $this->id_universo = $id_universo;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre_universo;
    }

    public function setNombre($nombre_universo): self
    {
        $this->nombre_universo = $nombre_universo;
        return $this;
    }

    public function getCreacion()
    {
        return $this->creacion_universo;
    }

    public function setCreacion($creacion_universo): self
    {
        $this->creacion_universo = $creacion_universo;
        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion_universo;
    }

    public function setDescripcion($descripcion_universo): self
    {
        $this->descripcion_universo = $descripcion_universo;
        return $this;
    }

    public function universo_id(int $id)
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM universo WHERE id_universo = :id";
        $PDOStament = $db->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStament->execute(['id' => $id]);

        $resultado = $PDOStament->fetch();

        return $resultado ? $resultado : null;
    }

    public function catalogo_universo()
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM universo";
        $PDOStament = $db->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStament->execute();
        $resultado = $PDOStament->fetchAll();
        return $resultado ? $resultado : [];
    }

    public function edit($id_universo, $nombre_universo, $creacion_universo, $descripcion_universo)
{
    $conexion = new Conexion();
    $db = $conexion->getConexion();
    $query = "UPDATE universo SET
        nombre_universo = :nombre,
        creacion_universo = :creacion,
        descripcion_universo = :descripcion
        WHERE id_universo = :id";

    $PDOStatement = $db->prepare($query);
    $PDOStatement->execute([
        'nombre' => htmlspecialchars($nombre_universo),
        'creacion' => htmlspecialchars($creacion_universo),
        'descripcion' => htmlspecialchars($descripcion_universo),
        'id' => htmlspecialchars($id_universo),
    ]);
}


    public function insert()
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "INSERT INTO universo (nombre_universo, creacion_universo, descripcion_universo) VALUES (:nombre, :creacion, :descripcion)";
        $statement = $db->prepare($query);
        $statement->bindParam(':nombre', $this->nombre_universo, PDO::PARAM_STR);
        $statement->bindParam(':creacion', $this->creacion_universo, PDO::PARAM_STR);
        $statement->bindParam(':descripcion', $this->descripcion_universo, PDO::PARAM_STR);
        return $statement->execute();
    }

    public function delete()
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "DELETE FROM universo WHERE id_universo = :id";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $this->id_universo, PDO::PARAM_INT);
        return $statement->execute();
    }
}