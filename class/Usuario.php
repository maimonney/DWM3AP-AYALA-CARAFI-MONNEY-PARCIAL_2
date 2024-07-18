<?php

class Usuario
{
    protected $id;
    protected $email;
    protected $nombre_usuario;
    protected $nombre_completo;
    protected $password;
    protected $roles;

    public function getEmail()
    {
        return $this->email;
    }

    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }

    public function getNombre_completo()
    {
        return $this->nombre_completo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function catalogo_usuario()
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM usuarios";
        $statement = $db->prepare($query);
        $statement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $statement->execute();
  
        $resultado = $statement->fetchAll();
        return $resultado ? $resultado : [];
    }

    public function usuario_id(int $id) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM usuarios WHERE id = :id";
        $PDOStament = $db->prepare($query);
        $PDOStament->bindParam(':id', $id, PDO::PARAM_INT);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStament->execute();

        $resultado = $PDOStament->fetch();
        return $resultado ? $resultado : null;
    }

    public function insert($email, $nombre_usuario, $nombre_completo, $password, $roles)
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "INSERT INTO usuarios (email, nombre_usuario, nombre_completo, password, roles) VALUES (:email, :nombre_usuario, :nombre_completo, :password, :roles)";
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $statement = $db->prepare($query);
        $statement->execute([
            'email' => $email,
            'nombre_usuario' => $nombre_usuario,
            'nombre_completo' => $nombre_completo,
            'password' => $passwordHash,
            'roles' => $roles,
        ]);
    }

    public function edit($email, $nombre_usuario, $nombre_completo, $password, $roles, $id)
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "UPDATE usuarios SET
            email = :email,
            nombre_usuario = :nombre_usuario,
            nombre_completo = :nombre_completo,
            password = :password,
            roles = :roles
            WHERE id = :id";

        $PDOStatement = $db->prepare($query);
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $PDOStatement->execute([
            'email' => $email,
            'nombre_usuario' => $nombre_usuario,
            'nombre_completo' => $nombre_completo,
            'password' => $passwordHash,
            'roles' => $roles,
            'id' => $id,
        ]);
    }

    public function filtro_usuario_nombre(string $nombre_usuario): ?self
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM usuarios WHERE nombre_usuario = :nombre_usuario";
        $statement = $conexion->prepare($query);
        $statement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $statement->execute(["nombre_usuario" => $nombre_usuario]);

        $usuario = $statement->fetch();

        return $usuario ? $usuario : null;
    }


    public function delete() {
     $conexion = new Conexion();
     $db = $conexion->getConexion();
     $query = "DELETE FROM usuarios WHERE id = :id";
     // echo "<pre>";
     // echo "$query";
     // echo "</pre>";
     $statement = $db->prepare($query);
    $statement->execute([
        'id' => $this->getId()
    ]);
 }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }


    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }


    /**
     * Set the value of nombre_usuario
     */
    public function setNombreUsuario($nombre_usuario): self
    {
        $this->nombre_usuario = $nombre_usuario;

        return $this;
    }


    /**
     * Set the value of nombre_completo
     */
    public function setNombreCompleto($nombre_completo): self
    {
        $this->nombre_completo = $nombre_completo;

        return $this;
    }


    /**
     * Set the value of password
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }


    /**
     * Set the value of roles
     */
    public function setRoles($roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}