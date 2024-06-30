<?php
class Comic
{
        public $id_comic;
        public $serie_id_comic;
        public $volumen_comic;
        public $titulo_comic;
        public $personaje_id_comic;
        public $artistas_id_comic;
        public $editorial_id_comic;
        public $portada_comic;
        public $publicacion_fecha;
        public $autor_id_comic;
        public $precio_comic;
        public $bajada;
        public $universo_id_comic;


        public function insert($serie_id_comic, $volumen_comic, $titulo_comic, $personaje_id_comic, $artistas_id_comic, $editorial_id_comic, $portada_comic, $publicacion_fecha, $autor_id_comic, $precio_comic, $bajada, $universo_id_comic)
        {
                $conexion = (new Conexion())->getConexion();
                $query = 'INSERT INTO `comic` (`id`, `serie_id_comic`, `volumen_comic`, `titulo_comic`, `personaje_id_comic`, `artistas_id_comic`, `editorial_id_comic`, `portada_comic`, `publicacion_fecha`, `autor_id_comic`, `precio_comic`, `bajada`, `universo_id_comic`) VALUES (NULL, :serie, :volumen, :titulo, :personaje, :artista, :editorial, :portada, :fecha, :autor, :precio, :bajada, :universo)';
                $PDOStament = $conexion->prepare($query);
                $PDOStament->execute([
                        'titulo' => htmlspecialchars($titulo_comic),
                        'serie' => htmlspecialchars($serie_id_comic),
                        'volumen' => htmlspecialchars($volumen_comic),
                        'personaje' => htmlspecialchars($personaje_id_comic),
                        'artista' => htmlspecialchars($artistas_id_comic),
                        'editorial' => htmlspecialchars($editorial_id_comic),
                        'portada' => htmlspecialchars($portada_comic),
                        'fecha' => htmlspecialchars($publicacion_fecha),
                        'autor' => htmlspecialchars($autor_id_comic),
                        'precio' => htmlspecialchars($precio_comic),
                        'bajada' => htmlspecialchars($bajada),
                        'universo' => htmlspecialchars($universo_id_comic),
                ]);
                return $conexion->lastInsertId();
        }

        public function getNombrePersonaje()
        {
                return $this->nombre;
        }
        public function getNombreSerie()
        {
                return $this->nombre_serie;
        }

        public function getNombreAutor()
        {
                return $this->nombre_autor;
        }

        public function getNombreUniverso()
        {
                return $this->nombre_universo;
        }
        public function getNombreArtista()
        {
                return $this->nombre_artista;
        }
        public function getNombreEditorial()
        {
                return $this->nombre_editorial;
        }

        public function catalogo_comic()
        {
                $conexion = new Conexion();
                $db = $conexion->getConexion();
                $query = "SELECT comic.*, p.nombre, s.nombre_serie, a.nombre_autor, u.nombre_universo, art.nombre_artista, e.nombre_editorial 
          FROM comic
          LEFT JOIN personaje p ON comic.personaje_id_comic = p.id
          LEFT JOIN serie s ON comic.serie_id_comic = s.id_serie
          LEFT JOIN autor a ON comic.autor_id_comic = a.id_autor
          LEFT JOIN universo u ON comic.universo_id_comic = u.id_universo
          LEFT JOIN artista art ON comic.artistas_id_comic = art.id_artista
          LEFT JOIN editorial e ON comic.editorial_id_comic = e.id_editorial";

                $PDOStament = $db->prepare($query);
                $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
                $PDOStament->execute();

                $resultado = $PDOStament->fetchAll();

                return $resultado ? $resultado : [];
        }

        public function comic_id(int $id_comic)
        {
                $conexion = new Conexion();
                $db = $conexion->getConexion();
                $query = "SELECT * FROM comic WHERE id_comic = :id_comic";
                $PDOStament = $db->prepare($query);
                $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
                $PDOStament->execute(['id_comic' => $id_comic]);

                $resultado = $PDOStament->fetch();

                return $resultado ? $resultado : null;
        }

        public function catalogo_id(int $id_comic): ?Comic
        {
                $comics = $this->catalogo_comic();

                foreach ($comics as $comic) {
                        if ($comic->id_comic == $id_comic) {
                                return $comic;
                        }
                }

                return null;
        }

        public function edit($id_comic, $serie_id_comic, $volumen_comic, $titulo_comic, $personaje_id_comic, $artistas_id_comic, $editorial_id_comic, $portada_comic, $publicacion_fecha, $autor_id_comic, $precio_comic, $bajada, $universo_id_comic)
        {
                $conexion = (new Conexion())->getConexion();
                $query = "UPDATE comic SET 
                        serie_id_comic = :serie,
                        volumen_comic = :volumen,
                        titulo_comic = :titulo,
                        personaje_id_comic = :personaje,
                        artistas_id_comic = :artista,
                        editorial_id_comic = :editorial,
                        portada_comic = :portada,
                        publicacion_fecha = :fecha,
                        autor_id_comic = :autor,
                        precio_comic = :precio,
                        bajada = :bajada,
                        universo_id_comic = :universo
                      WHERE id_comic = :id_comic";

                $PDOStament = $conexion->prepare($query);

                $PDOStament->execute([
                        'serie' => htmlspecialchars($serie_id_comic),
                        'volumen' => htmlspecialchars($volumen_comic),
                        'titulo' => htmlspecialchars($titulo_comic),
                        'personaje' => htmlspecialchars($personaje_id_comic),
                        'artista' => htmlspecialchars($artistas_id_comic),
                        'editorial' => htmlspecialchars($editorial_id_comic),
                        'portada' => htmlspecialchars($portada_comic),
                        'fecha' => htmlspecialchars($publicacion_fecha),
                        'autor' => htmlspecialchars($autor_id_comic),
                        'precio' => htmlspecialchars($precio_comic),
                        'bajada' => htmlspecialchars($bajada),
                        'universo' => htmlspecialchars($universo_id_comic),
                        'id_comic' => htmlspecialchars($id_comic)
                ]);
        }



        public function delete()
        {
                $conexion = new Conexion();
                $db = $conexion->getConexion();
                $query = "DELETE FROM comic WHERE id_comic = :id_comic";
                $PDOStament = $db->prepare($query);
                $PDOStament->execute(['id_comic' => $this->id_comic]);
        }


        /**
         * Get the value of id_comic
         */
        public function getIdComic()
        {
                return $this->id_comic;
        }

        /**
         * Set the value of id_comic
         */
        public function setIdComic($id_comic): self
        {
                $this->id_comic = $id_comic;

                return $this;
        }

        /**
         * Get the value of serie_id_comic
         */
        public function getSerieIdComic()
        {
                return $this->serie_id_comic;
        }

        /**
         * Set the value of serie_id_comic
         */
        public function setSerieIdComic($serie_id_comic): self
        {
                $this->serie_id_comic = $serie_id_comic;

                return $this;
        }

        /**
         * Get the value of volumen_comic
         */
        public function getVolumenComic()
        {
                return $this->volumen_comic;
        }

        /**
         * Set the value of volumen_comic
         */
        public function setVolumenComic($volumen_comic): self
        {
                $this->volumen_comic = $volumen_comic;

                return $this;
        }

        /**
         * Get the value of titulo_comic
         */
        public function getTituloComic()
        {
                return $this->titulo_comic;
        }

        /**
         * Set the value of titulo_comic
         */
        public function setTituloComic($titulo_comic): self
        {
                $this->titulo_comic = $titulo_comic;

                return $this;
        }

        /**
         * Get the value of personaje_id_comic
         */
        public function getPersonajeIdComic()
        {
                return $this->personaje_id_comic;
        }

        /**
         * Set the value of personaje_id_comic
         */
        public function setPersonajeIdComic($personaje_id_comic): self
        {
                $this->personaje_id_comic = $personaje_id_comic;

                return $this;
        }

        /**
         * Get the value of artistas_id_comic
         */
        public function getArtistasIdComic()
        {
                return $this->artistas_id_comic;
        }

        /**
         * Set the value of artistas_id_comic
         */
        public function setArtistasIdComic($artistas_id_comic): self
        {
                $this->artistas_id_comic = $artistas_id_comic;

                return $this;
        }

        /**
         * Get the value of editorial_id_comic
         */
        public function getEditorialIdComic()
        {
                return $this->editorial_id_comic;
        }

        /**
         * Set the value of editorial_id_comic
         */
        public function setEditorialIdComic($editorial_id_comic): self
        {
                $this->editorial_id_comic = $editorial_id_comic;

                return $this;
        }

        /**
         * Get the value of portada_comic
         */
        public function getPortadaComic()
        {
                return $this->portada_comic;
        }

        /**
         * Set the value of portada_comic
         */
        public function setPortadaComic($portada_comic): self
        {
                $this->portada_comic = $portada_comic;

                return $this;
        }

        /**
         * Get the value of publicacion_fecha
         */
        public function getPublicacionFecha()
        {
                return $this->publicacion_fecha;
        }

        /**
         * Set the value of publicacion_fecha
         */
        public function setPublicacionFecha($publicacion_fecha): self
        {
                $this->publicacion_fecha = $publicacion_fecha;

                return $this;
        }

        /**
         * Get the value of autor_id_comic
         */
        public function getAutorIdComic()
        {
                return $this->autor_id_comic;
        }

        /**
         * Set the value of autor_id_comic
         */
        public function setAutorIdComic($autor_id_comic): self
        {
                $this->autor_id_comic = $autor_id_comic;

                return $this;
        }

        /**
         * Get the value of precio_comic
         */
        public function getPrecioComic()
        {
                return $this->precio_comic;
        }

        /**
         * Set the value of precio_comic
         */
        public function setPrecioComic($precio_comic): self
        {
                $this->precio_comic = $precio_comic;

                return $this;
        }

        /**
         * Get the value of bajada
         */
        public function getBajada()
        {
                return $this->bajada;
        }

        /**
         * Set the value of bajada
         */
        public function setBajada($bajada): self
        {
                $this->bajada = $bajada;

                return $this;
        }

        /**
         * Get the value of universo_id_comic
         */
        public function getUniversoIdComic()
        {
                return $this->universo_id_comic;
        }

        /**
         * Set the value of universo_id_comic
         */
        public function setUniversoIdComic($universo_id_comic): self
        {
                $this->universo_id_comic = $universo_id_comic;

                return $this;
        }
}
