<?php

class Editorial {
    protected $id_editorial;
    protected $nombre_editorial;
    protected $pais_origen_editorial;
    protected $fundacion_editorial;
    protected $descripcion_editorial;

    public function editorial_id(int $id)
    {
            $conexion = new Conexion();
            $db = $conexion->getConexion();
            $query = "SELECT * FROM editorial WHERE id_editorial = :id";
            $PDOStament = $db->prepare($query);
            $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStament->execute(['id' => $id]);

            $resultado = $PDOStament->fetch();

            return $resultado ? $resultado : null;
    }

    public function catalogo_editorial() {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM editorial";
        $PDOStatement = $db->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        $resultado = $PDOStatement->fetchAll();
        return $resultado ? $resultado : [];
    }

    public function insert($nombre_editorial, $pais_origen_editorial, $fundacion_editorial, $descripcion_editorial) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "INSERT INTO editorial (nombre_editorial, pais_origen_editorial, fundacion_editorial, descripcion_editorial) VALUES (:nombre, :pais_origen, :fundacion, :descripcion)";
        $PDOStatement = $db->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre_editorial,
            'pais_origen' => $pais_origen_editorial,
            'fundacion' => $fundacion_editorial,
            'descripcion' => $descripcion_editorial,
        ]);
    }

    public function delete() {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "DELETE FROM editorial WHERE id_editorial = :id";
        $PDOStatement = $db->prepare($query);
        $PDOStatement->execute(['id' => $this->id_editorial]);
    }

    public function edit($id_editorial, $nombre_editorial, $pais_origen_editorial, $fundacion_editorial, $descripcion_editorial) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "UPDATE editorial SET
            nombre_editorial = :nombre,
            pais_origen_editorial = :pais_origen,
            fundacion_editorial = :fundacion,
            descripcion_editorial = :descripcion
            WHERE id_editorial = :id";
    
        $PDOStatement = $db->prepare($query);
        $PDOStatement->execute([
            'nombre' => htmlspecialchars($nombre_editorial),
            'pais_origen' => htmlspecialchars($pais_origen_editorial),
            'fundacion' => htmlspecialchars($fundacion_editorial),
            'descripcion' => htmlspecialchars($descripcion_editorial),
            'id' => htmlspecialchars($id_editorial),
        ]);
    }
    

    /**
     * Get the value of id_editorial
     */
    public function getIdEditorial() {
        return $this->id_editorial;
    }

    /**
     * Set the value of id_editorial
     */
    public function setIdEditorial($id_editorial): self {
        $this->id_editorial = $id_editorial;
        return $this;
    }

    /**
     * Get the value of nombre_editorial
     */
    public function getNombreEditorial() {
        return $this->nombre_editorial;
    }

    /**
     * Set the value of nombre_editorial
     */
    public function setNombreEditorial($nombre_editorial): self {
        $this->nombre_editorial = $nombre_editorial;
        return $this;
    }

    /**
     * Get the value of pais_origen_editorial
     */
    public function getPaisOrigenEditorial() {
        return $this->pais_origen_editorial;
    }

    /**
     * Set the value of pais_origen_editorial
     */
    public function setPaisOrigenEditorial($pais_origen_editorial): self {
        $this->pais_origen_editorial = $pais_origen_editorial;
        return $this;
    }

    /**
     * Get the value of fundacion_editorial
     */
    public function getFundacionEditorial() {
        return $this->fundacion_editorial;
    }

    /**
     * Set the value of fundacion_editorial
     */
    public function setFundacionEditorial($fundacion_editorial): self {
        $this->fundacion_editorial = $fundacion_editorial;
        return $this;
    }

    /**
     * Get the value of descripcion_editorial
     */
    public function getDescripcionEditorial() {
        return $this->descripcion_editorial;
    }

    /**
     * Set the value of descripcion_editorial
     */
    public function setDescripcionEditorial($descripcion_editorial): self {
        $this->descripcion_editorial = $descripcion_editorial;
        return $this;
    }
}

?>
