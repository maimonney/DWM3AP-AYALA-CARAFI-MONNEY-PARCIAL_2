-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2024 a las 00:47:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_comic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE `artista` (
  `id_artista` int(11) UNSIGNED NOT NULL,
  `nombre_artista` varchar(256) NOT NULL,
  `alias_artista` varchar(256) DEFAULT NULL,
  `nacimiento_artista` date NOT NULL,
  `biografia_artista` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`id_artista`, `nombre_artista`, `alias_artista`, `nacimiento_artista`, `biografia_artista`) VALUES
(1, 'Frank Miller', 'Sin City', '1957-01-27', 'Frank Miller es un aclamado escritor y dibujante de cómics, conocido por su trabajo en Daredevil. Es famoso por sus historias oscuras y adultas, como \"The Dark Knight Returns\" y \"Sin City\".'),
(2, 'Jim Lee', NULL, '1964-08-11', 'Jim Lee es un renombrado artista y editor de cómics, conocido por su trabajo en Batman. Ha sido fundamental en la creación de historias icónicas del Caballero Oscuro y ha dejado una marca indeleble en el mundo del cómic con su estilo distintivo y su talento artístico.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) UNSIGNED NOT NULL,
  `nombre_autor` varchar(256) NOT NULL,
  `alias_autor` varchar(256) NOT NULL,
  `nacimiento_autor` date NOT NULL,
  `biografia_autor` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre_autor`, `alias_autor`, `nacimiento_autor`, `biografia_autor`) VALUES
(1, 'Stan Lee', 'The Man', '1922-12-28', 'Stan Lee fue un legendario escritor, editor y editor de cómics, reconocido por su trabajo en Marvel Comics. Co-creó muchos de los personajes más icónicos de Marvel, como Spider-Man, Iron Man, Hulk, Thor, X-Men y Fantastic Four.'),
(2, 'Frank Miller', 'Sin City', '1957-01-27', 'Frank Miller es un aclamado escritor y dibujante de cómics, conocido por su trabajo en DC Comics. Es famoso por sus historias oscuras y adultas, como \"The Dark Knight Returns\" y \"Sin City\".'),
(3, 'Mike Mignola', 'Hellboy', '1960-09-16', 'Mike Mignola es un reconocido escritor y dibujante de cómics, conocido por crear el personaje de Hellboy. Trabajó en Dark Horse Comics, donde desarrolló la serie de cómics Hellboy, que luego se convirtió en películas y otros medios.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comic`
--

CREATE TABLE `comic` (
  `id_comic` bigint(20) UNSIGNED NOT NULL,
  `serie_id_comic` int(11) UNSIGNED NOT NULL,
  `volumen_comic` float UNSIGNED NOT NULL,
  `titulo_comic` varchar(256) NOT NULL,
  `personaje_id_comic` int(11) UNSIGNED NOT NULL,
  `artistas_id_comic` int(11) UNSIGNED NOT NULL,
  `editorial_id_comic` int(11) UNSIGNED NOT NULL,
  `portada_comic` varchar(256) NOT NULL,
  `publicacion_fecha` date NOT NULL,
  `autor_id_comic` int(11) UNSIGNED NOT NULL,
  `precio_comic` float UNSIGNED NOT NULL,
  `universo_id_comic` int(11) UNSIGNED NOT NULL,
  `bajada` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comic`
--

INSERT INTO `comic` (`id_comic`, `serie_id_comic`, `volumen_comic`, `titulo_comic`, `personaje_id_comic`, `artistas_id_comic`, `editorial_id_comic`, `portada_comic`, `publicacion_fecha`, `autor_id_comic`, `precio_comic`, `universo_id_comic`, `bajada`) VALUES
(2, 1, 1, 'Iron Man: Extremis', 1, 2, 1, 'portada_ironman_extremis.jpg', '2005-11-01', 1, 12.99, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comic_x_personaje`
--

CREATE TABLE `comic_x_personaje` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_comic` int(10) UNSIGNED NOT NULL,
  `id_personaje` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id_editorial` int(11) UNSIGNED NOT NULL,
  `nombre_editorial` varchar(256) NOT NULL,
  `pais_origen_editorial` enum('Estados Unidos','Japón','Reino Unido','Francia','España','Italia','Canadá','Otros') NOT NULL,
  `fundacion_editorial` date NOT NULL,
  `descripcion_editorial` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `nombre_editorial`, `pais_origen_editorial`, `fundacion_editorial`, `descripcion_editorial`) VALUES
(1, 'Marvel Comics', 'Estados Unidos', '1939-01-01', 'Marvel Comics es una de las editoriales de cómics más importantes del mundo, conocida por su universo compartido y personajes icónicos como Spider-Man, Iron Man y The Avengers.'),
(2, 'DC Comics', 'Estados Unidos', '1934-01-01', 'DC Comics es una editorial de cómics estadounidense, famosa por sus personajes como Superman, Batman y Wonder Woman, y su universo compartido.'),
(3, 'Dark Horse Comics', 'Estados Unidos', '1986-01-01', 'Dark Horse Comics es una editorial independiente de cómics conocida por sus títulos únicos y sus adaptaciones de franquicias populares como Star Wars y Buffy the Vampire Slayer.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaje`
--

CREATE TABLE `personaje` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `alias` varchar(256) NOT NULL,
  `descripcion` varchar(256) NOT NULL,
  `autor_id` int(11) UNSIGNED NOT NULL,
  `imagen` varchar(256) NOT NULL DEFAULT 'default_image.png',
  `poderes_habilidades` varchar(256) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `universo_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personaje`
--

INSERT INTO `personaje` (`id`, `nombre`, `alias`, `descripcion`, `autor_id`, `imagen`, `poderes_habilidades`, `fecha_creacion`, `universo_id`) VALUES
(1, 'Iron Man', 'Tony Stark', 'Iron Man es un superhéroe ficticio creado por Stan Lee, Larry Lieber, Don Heck y Jack Kirby, publicado por Marvel Comics. Su verdadero nombre es Anthony Edward &amp;quot;Tony&amp;quot; Stark, un multimillonario, empresario e ingeniero brillante que sufre u', 1, '66647a7168d5b-personaje_iron_man.jpg', 'Inteligencia genial, habilidades de ingeniería avanzadas, traje de armadura con armas y dispositivos tecnológicos', '1963-03-01', 1),
(5, 'Loki', 'wererher', 'El dios nórdico del engaño y la travesura', 2, 'personaje_loki.jpg', 'Manipulación mágica, cambio de forma, teletransportación', '2024-06-02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie`
--

CREATE TABLE `serie` (
  `id_serie` int(11) UNSIGNED NOT NULL,
  `nombre_serie` varchar(256) NOT NULL,
  `descripcion_serie` text DEFAULT NULL,
  `fecha_inicio_serie` date DEFAULT NULL,
  `fecha_fin_serie` date DEFAULT NULL,
  `editorial_id_serie` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `serie`
--

INSERT INTO `serie` (`id_serie`, `nombre_serie`, `descripcion_serie`, `fecha_inicio_serie`, `fecha_fin_serie`, `editorial_id_serie`) VALUES
(1, 'The Amazing Spider-Man', 'La serie principal que sigue las aventuras de Spider-Man en el universo Marvel.', '1963-03-01', NULL, 1),
(2, 'Batman', 'La serie principal que sigue las aventuras de Batman en el universo DC Comics.', '1940-04-25', NULL, 2),
(3, 'Daredevil', 'La serie que sigue las aventuras del superhéroe Daredevil en el universo Marvel.', '1964-04-01', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universo`
--

CREATE TABLE `universo` (
  `id_universo` int(11) UNSIGNED NOT NULL,
  `nombre_universo` varchar(256) NOT NULL,
  `creacion_universo` date NOT NULL,
  `descripcion_universo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `universo`
--

INSERT INTO `universo` (`id_universo`, `nombre_universo`, `creacion_universo`, `descripcion_universo`) VALUES
(1, 'Marvel', '1939-01-01', 'Marvel Comics es una editorial estadounidense de cómics, famosa por su universo compartido con personajes icónicos como Spider-Man, Iron Man, The Avengers y X-Men. Fundada en 1939, ha tenido un gran impacto cultural a través de cómics, películas y series.'),
(2, 'DC', '1934-01-01', 'DC Comics es una editorial de cómics estadounidense, famosa por sus personajes como Superman, Batman y Wonder Woman, y su universo compartido.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`id_artista`);

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `comic`
--
ALTER TABLE `comic`
  ADD PRIMARY KEY (`id_comic`),
  ADD KEY `serie_id` (`serie_id_comic`),
  ADD KEY `personaje_id` (`personaje_id_comic`),
  ADD KEY `artistas_id` (`artistas_id_comic`),
  ADD KEY `autor_id` (`autor_id_comic`),
  ADD KEY `universo_id` (`universo_id_comic`),
  ADD KEY `fk_editorial` (`editorial_id_comic`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id_editorial`);

--
-- Indices de la tabla `personaje`
--
ALTER TABLE `personaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creador_id` (`autor_id`),
  ADD KEY `universo_id` (`universo_id`);

--
-- Indices de la tabla `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id_serie`),
  ADD KEY `editorial_id` (`editorial_id_serie`);

--
-- Indices de la tabla `universo`
--
ALTER TABLE `universo`
  ADD PRIMARY KEY (`id_universo`),
  ADD KEY `nombre` (`nombre_universo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `id_artista` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comic`
--
ALTER TABLE `comic`
  MODIFY `id_comic` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id_editorial` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personaje`
--
ALTER TABLE `personaje`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `serie`
--
ALTER TABLE `serie`
  MODIFY `id_serie` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `universo`
--
ALTER TABLE `universo`
  MODIFY `id_universo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comic`
--
ALTER TABLE `comic`
  ADD CONSTRAINT `comic_ibfk_1` FOREIGN KEY (`autor_id_comic`) REFERENCES `autor` (`id_autor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `comic_ibfk_3` FOREIGN KEY (`universo_id_comic`) REFERENCES `universo` (`id_universo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `comic_ibfk_5` FOREIGN KEY (`artistas_id_comic`) REFERENCES `artista` (`id_artista`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `comic_ibfk_6` FOREIGN KEY (`serie_id_comic`) REFERENCES `serie` (`id_serie`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `comic_ibfk_7` FOREIGN KEY (`personaje_id_comic`) REFERENCES `personaje` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_editorial` FOREIGN KEY (`editorial_id_comic`) REFERENCES `editorial` (`id_editorial`);

--
-- Filtros para la tabla `personaje`
--
ALTER TABLE `personaje`
  ADD CONSTRAINT `personaje_ibfk_4` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id_autor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `personaje_ibfk_5` FOREIGN KEY (`universo_id`) REFERENCES `universo` (`id_universo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `serie`
--
ALTER TABLE `serie`
  ADD CONSTRAINT `serie_ibfk_1` FOREIGN KEY (`editorial_id_serie`) REFERENCES `editorial` (`id_editorial`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
