<?php

class Artista
{
    protected $id_artista;
    protected $nombre_artista;
    protected $alias_artista;
    protected $nacimiento_artista;
    protected $biografia_artista;

    public function catalogo_artista()
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $query = "SELECT * FROM artista";
        $stmt = $db->prepare($query);
        $stmt->execute();

        $artistas = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $artista = new Artista();
            $artista->setIdArtista($row['id_artista']);
            $artista->setNombreArtista($row['nombre_artista']);
            $artista->setAliasArtista($row['alias_artista']);
            $artista->setNacimientoArtista($row['nacimiento_artista']);
            $artista->setBiografiaArtista($row['biografia_artista']);

            $artistas[] = $artista;
        }

        return $artistas;
    }

    public function insert(
        $nombre_artista,
        $alias_artista,
        $nacimiento_artista,
        $biografia_artista
    ) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $query = "INSERT INTO `artista` (`nombre_artista`, `alias_artista`, `nacimiento_artista`, `biografia_artista`) VALUES (:nombre, :alias, :nacimiento, :biografia)";

        $stmt = $db->prepare($query);
        $stmt->execute([
            'nombre' => $nombre_artista,
            'alias' => $alias_artista,
            'nacimiento' => $nacimiento_artista,
            'biografia' => $biografia_artista,
        ]);
    }

    public function edit()
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $query = "UPDATE artista 
                  SET nombre_artista = :nombre, alias_artista = :alias, nacimiento_artista = :nacimiento, biografia_artista = :biografia 
                  WHERE id_artista = :id";

        $stmt = $db->prepare($query);
        $stmt->execute([
            'nombre' => $this->nombre_artista,
            'alias' => $this->alias_artista,
            'nacimiento' => $this->nacimiento_artista,
            'biografia' => $this->biografia_artista,
            'id' => $this->id_artista,
        ]);
    }

    public function delete()
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $query = "DELETE FROM artista WHERE id_artista = :id";
        $stmt = $db->prepare($query);
        $stmt->execute(['id' => $this->id_artista]);
    }

    /**
     * Get the value of id_artista
     */
    public function getIdArtista()
    {
        return $this->id_artista;
    }

    /**
     * Set the value of id_artista
     */
    public function setIdArtista($id_artista): self
    {
        $this->id_artista = $id_artista;

        return $this;
    }

    /**
     * Get the value of nombre_artista
     */
    public function getNombreArtista()
    {
        return $this->nombre_artista;
    }

    /**
     * Set the value of nombre_artista
     */
    public function setNombreArtista($nombre_artista): self
    {
        $this->nombre_artista = $nombre_artista;

        return $this;
    }

    /**
     * Get the value of alias_artista
     */
    public function getAliasArtista()
    {
        return $this->alias_artista;
    }

    /**
     * Set the value of alias_artista
     */
    public function setAliasArtista($alias_artista): self
    {
        $this->alias_artista = $alias_artista;

        return $this;
    }

    /**
     * Get the value of nacimiento_artista
     */
    public function getNacimientoArtista()
    {
        return $this->nacimiento_artista;
    }

    /**
     * Set the value of nacimiento_artista
     */
    public function setNacimientoArtista($nacimiento_artista): self
    {
        $this->nacimiento_artista = $nacimiento_artista;

        return $this;
    }

    /**
     * Get the value of biografia_artista
     */
    public function getBiografiaArtista()
    {
        return $this->biografia_artista;
    }

    /**
     * Set the value of biografia_artista
     */
    public function setBiografiaArtista($biografia_artista): self
    {
        $this->biografia_artista = $biografia_artista;

        return $this;
    }
}

?>
