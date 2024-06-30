<?php

require_once 'Conexion.php';

class Serie
{
    protected $id_serie;
    protected $nombre_serie;
    protected $descripcion_serie;
    protected $fecha_inicio_serie;
    protected $editorial_id_serie;

    public function getNombreEditorial()
    {
        return $this->nombre_editorial;
    }

    public function catalogo_serie()
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT serie.*, e.nombre_editorial
        FROM serie
          LEFT JOIN editorial e ON serie.editorial_id_serie = e.id_editorial";
        $PDOStament = $db->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStament->execute();

        $resultado = $PDOStament->fetchAll();

        return $resultado ? $resultado : [];
    }

    public function serie_id(int $id)
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM serie WHERE id_serie = :id";
        $PDOStament = $db->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStament->execute(['id' => $id]);

        $resultado = $PDOStament->fetch();

        return $resultado ? $resultado : null;
    }

    public function insert($nombre_serie, $descripcion_serie, $fecha_inicio_serie, $editorial_id_serie)
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "INSERT INTO serie (nombre_serie, descripcion_serie, fecha_inicio_serie, editorial_id_serie) VALUES (:nombre, :descripcion, :fecha, :editorial)";
        $PDOStatement = $db->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre_serie,
            'descripcion' => $descripcion_serie,
            'fecha' => $fecha_inicio_serie,
            'editorial' => $editorial_id_serie,
        ]);
    }

    public function delete()
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "DELETE FROM serie WHERE id_serie = :id";
        $PDOStatement = $db->prepare($query);
        $PDOStatement->execute(['id' => $this->id_serie]);
    }

    public function edit($nombre_serie, $descripcion_serie, $fecha_inicio_serie, $editorial_id_serie)
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "UPDATE serie SET
            nombre_serie = :nombre,
            descripcion_serie = :descripcion,
            fecha_inicio_serie = :fecha,
            editorial_id_serie = :editorial 
            WHERE id_serie = :id";

        $PDOStatement = $db->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre_serie,
            'descripcion' => $descripcion_serie,
            'fecha' => $fecha_inicio_serie,
            'editorial' => $editorial_id_serie,
            'id' => $this->id_serie,
        ]);
    }

    /**
     * Get the value of id_serie
     */
    public function getIdSerie()
    {
        return $this->id_serie;
    }

    /**
     * Set the value of id_serie
     */
    public function setIdSerie($id_serie): self
    {
        $this->id_serie = $id_serie;

        return $this;
    }

    /**
     * Get the value of nombre_serie
     */
    public function getNombreSerie()
    {
        return $this->nombre_serie;
    }

    /**
     * Set the value of nombre_serie
     */
    public function setNombreSerie($nombre_serie): self
    {
        $this->nombre_serie = $nombre_serie;

        return $this;
    }

    /**
     * Get the value of descripcion_serie
     */
    public function getDescripcionSerie()
    {
        return $this->descripcion_serie;
    }

    /**
     * Set the value of descripcion_serie
     */
    public function setDescripcionSerie($descripcion_serie): self
    {
        $this->descripcion_serie = $descripcion_serie;

        return $this;
    }

    /**
     * Get the value of fecha_inicio_serie
     */
    public function getFechaInicioSerie()
    {
        return $this->fecha_inicio_serie;
    }

    /**
     * Set the value of fecha_inicio_serie
     */
    public function setFechaInicioSerie($fecha_inicio_serie): self
    {
        $this->fecha_inicio_serie = $fecha_inicio_serie;

        return $this;
    }

    /**
     * Get the value of editorial_id_serie
     */
    public function getEditorialIdSerie()
    {
        return $this->editorial_id_serie;
    }

    /**
     * Set the value of editorial_id_serie
     */
    public function setEditorialIdSerie($editorial_id_serie): self
    {
        $this->editorial_id_serie = $editorial_id_serie;

        return $this;
    }
}

