<?php

class Autor {
    protected $id_autor;
    protected $nombre_autor;
    protected $alias_autor;
    protected $nacimiento_autor;
    protected $biografia_autor;

    public function getId() {
        return $this->id_autor;
    }

    public function setId($id): self {
        $this->id = $id;
        return $this;
    }

    public function getNombre() {
        return $this->nombre_autor;
    }

    public function setNombre($nombre_autor): self {
        $this->nombre_autor = $nombre_autor;
        return $this;
    }

    public function getAlias() {
        return $this->alias_autor;
    }

    public function setAlias($alias_autor): self {
        $this->alias_autor = $alias_autor;
        return $this;
    }

    public function getNacimiento() {
        return $this->nacimiento_autor;
    }

    public function setNacimiento($nacimiento_autor): self {
        $this->nacimiento_autor = $nacimiento_autor;
        return $this;
    }

    public function getBiografia() {
        return $this->biografia_autor;
    }

    public function setBiografia($biografia_autor): self {
        $this->biografia_autor = $biografia_autor;
        return $this;
    }

    public function autor_id(int $id) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM autor WHERE id_autor = :id";
        $PDOStament = $db->prepare($query);
        $PDOStament->bindParam(':id', $id, PDO::PARAM_INT);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStament->execute();

        $resultado = $PDOStament->fetch();
        return $resultado ? $resultado : null;
    }

    public function catalogo_autor() {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM autor";
        $PDOStament = $db->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStament->execute();

        $resultado = $PDOStament->fetchAll();
        return $resultado ? $resultado : [];
    }

  public function insert($nombre_autor, $alias_autor, $nacimiento_autor, $biografia_autor) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "INSERT INTO autor (nombre_autor, alias_autor, nacimiento_autor, biografia_autor) VALUES (:nombre, :alias, :nacimiento, :biografia)";
        $PDOStatement = $db->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre_autor,
            'alias' => $alias_autor,
            'nacimiento' => $nacimiento_autor,
            'biografia' => $biografia_autor,
        ]);
    }

    public function delete()
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "DELETE FROM autor WHERE id_autor = :id";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $this->id_autor, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function edit($nombre_autor, $alias_autor, $nacimiento_autor, $biografia_autor)
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "UPDATE autor SET
            nombre_autor = :nombre,
            alias_autor = :alias_autor,
            nacimiento_autor = :nacimiento,
            biografia_autor = :biografia 
            WHERE id_autor = :id";

        $PDOStatement = $db->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre_autor,
            'alias_autor' => $alias_autor,
            'nacimiento' => $nacimiento_autor,
            'biografia' => $biografia_autor,
            'id' => $this->id_autor,
        ]);
    }
}