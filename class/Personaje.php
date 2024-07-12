<?php

class Personaje
{
        protected $id;
        protected $nombre;
        protected $alias;
        protected $descripcion;
        protected $autor_id;
        protected $poderes_habilidades;
        protected $imagen;
        protected $universo_id;
        protected $fecha_creacion;

        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
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
         * Get the value of nombre
         */
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         */
        public function setNombre($nombre): self
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of alias
         */
        public function getAlias()
        {
                return $this->alias;
        }

        /**
         * Set the value of alias
         */
        public function setAlias($alias): self
        {
                $this->alias = $alias;

                return $this;
        }

        /**
         * Get the value of descripcion
         */
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         */
        public function setDescripcion($descripcion): self
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        /**
         * Get the value of autor
         */
        public function getAutor()
        {
                return $this->autor_id;
        }

        /**
         * Set the value of autor
         */
        public function setAutor($autor_id): self
        {
                $this->autor_id = $autor_id;

                return $this;
        }

        /**
         * Get the value of poderes_habilidades
         */
        public function getPoderesHabilidades()
        {
                return $this->poderes_habilidades;
        }

        /**
         * Set the value of poderes_habilidades
         */
        public function setPoderesHabilidades($poderes_habilidades): self
        {
                $this->poderes_habilidades = $poderes_habilidades;

                return $this;
        }

        /**
         * Get the value of imagen
         */
        public function getImagen()
        {
                return $this->imagen;
        }

        /**
         * Set the value of imagen
         */
        public function setImagen($imagen): self
        {
                $this->imagen = $imagen;

                return $this;
        }
        /**
         * Get the value of universo
         */
        public function getUniverso()
        {
                return $this->universo_id;
        }

        /**
         * Set the value of universo
         */
        public function setUniverso($universo_id): self
        {
                $this->universo_id = $universo_id;

                return $this;
        }
        /**
         * Get the value of fecha_creacion
         */
        public function getCreacion()
        {
                return $this->fecha_creacion;
        }

        /**
         * Set the value of fecha_creacion
         */
        public function setCreacion($fecha_creacion): self
        {
                $this->fecha_creacion = $fecha_creacion;

                return $this;
        }

        //FUNCIONES

        public function personaje_id(int $id)
        {
                $conexion = new Conexion();
                $db = $conexion->getConexion();
                $query = "SELECT * FROM personaje WHERE id = :id";
                $PDOStament = $db->prepare($query);
                $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
                $PDOStament->execute(['id' => $id]);

                $resultado = $PDOStament->fetch();

                return $resultado ? $resultado : null;
        }

        public function catalogo_personaje()
        {
                $conexion = new Conexion();
                $db = $conexion->getConexion();
                $query = "SELECT p.*, a.nombre_autor, u.nombre_universo 
              FROM personaje p
              LEFT JOIN autor a ON p.autor_id = a.id_autor
              LEFT JOIN universo u ON p.universo_id = u.id_universo";
                $PDOStament = $db->prepare($query);
                $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
                $PDOStament->execute();

                $resultado = $PDOStament->fetchAll();

                return $resultado ? $resultado : [];
        }

        public function getNombreAutor()
        {
                return $this->nombre_autor;
        }

        public function getNombreUniverso()
        {
                return $this->nombre_universo;
        }

        public function insert(
                $nombre,
                $alias,
                $descripcion,
                $autor_id,
                $poderes_habilidades,
                $imagen,
                $universo_id,
                $fecha_creacion
        ) {
                $conexion = new Conexion();
                $db = $conexion->getConexion();

                $query = "INSERT INTO `personaje`(`nombre`, `alias`, `descripcion`, `autor_id`, `imagen`, `poderes_habilidades`, `fecha_creacion`, `universo_id`) VALUES (:nombre, :alias, :descripcion, :autor_id, :imagen, :poderes_habilidades, :fecha_creacion, :universo_id)";

                $stmt = $db->prepare($query);
                $stmt->execute([
                        'nombre' => $nombre,
                        'alias' => $alias,
                        'descripcion' => $descripcion,
                        'autor_id' => $autor_id,
                        'poderes_habilidades' => $poderes_habilidades,
                        'imagen' => $imagen,
                        'fecha_creacion' => $fecha_creacion,
                        'universo_id' => $universo_id,
                ]);
        }



        public function edit($nombre, $alias, $descripcion, $autor_id, $poderes_habilidades, $imagen, $fecha_creacion, $universo_id, $id)
        {
                $conexion = (new Conexion())->getConexion();
                $query = "UPDATE personaje SET nombre = :nombre, alias = :alias, descripcion = :descripcion, autor_id = :autor_id, poderes_habilidades = :poderes_habilidades, imagen = :imagen, fecha_creacion = :fecha_creacion, universo_id = :universo_id WHERE id = :id";

                $PDOStament = $conexion->prepare($query);

                var_dump([
                        'nombre' => $nombre,
                        'alias' => $alias,
                        'descripcion' => $descripcion,
                        'autor_id' => $autor_id,
                        'poderes_habilidades' => $poderes_habilidades,
                        'imagen' => $imagen,
                        'fecha_creacion' => $fecha_creacion,
                        'universo_id' => $universo_id,
                        'id' => $id
                ]);

                $PDOStament->execute([
                        'nombre' => htmlspecialchars($nombre),
                        'alias' => htmlspecialchars($alias),
                        'descripcion' => htmlspecialchars($descripcion),
                        'autor_id' => htmlspecialchars($autor_id),
                        'poderes_habilidades' => htmlspecialchars($poderes_habilidades),
                        'imagen' => htmlspecialchars($imagen),
                        'fecha_creacion' => htmlspecialchars($fecha_creacion),
                        'universo_id' => htmlspecialchars($universo_id),
                        'id' => htmlspecialchars($id)
                ]);
        }



        public function delete()
        {
                $conexion = new Conexion();
                $db = $conexion->getConexion();
                $query = "DELETE FROM personaje WHERE id = :id";
                $PDOStament = $db->prepare($query);
                $PDOStament->execute(['id' => $this->id]);
        }

}