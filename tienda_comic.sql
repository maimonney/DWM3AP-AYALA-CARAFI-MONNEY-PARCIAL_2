-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2024 a las 04:45:57
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
(3, 'Mike Mignola', 'Hellboy', '1960-09-16', 'Mike Mignola es un reconocido escritor y dibujante de cómics, conocido por crear el personaje de Hellboy. Trabajó en Dark Horse Comics, donde desarrolló la serie de cómics Hellboy, que luego se convirtió en películas y otros medios.'),
(8, 'Robert Kahn', 'Bob Kane', '1915-10-24', 'Bob Kane fue un artista de cómics estadounidense conocido principalmente por ser el co-creador de Batman, uno de los superhéroes más icónicos de todos los tiempos. Nació en Nueva York y desde joven mostró un gran talento para el dibujo.'),
(9, 'Robert Kirkman', '', '1978-11-20', 'Kirkman es conocido por su enfoque en desarrollar personajes complejos y en explorar temas profundos a través de sus historias, además de su capacidad para construir narrativas a largo plazo que mantienen a los lectores enganchados.'),
(10, 'Sam Hamm', '', '1955-11-19', 'Sam Hamm comenzó su carrera como escritor de cómics en la década de 1980, trabajando en series como &quot;Detective Comics&quot; y &quot;Batman&quot; para DC Comics.'),
(11, 'Chip Zdarsky', 'Steve Murray', '0000-00-00', 'Chip Zdarsky se ha destacado en la industria del cómic por su habilidad para combinar humor y profundidad en sus historias.'),
(12, 'fewftwe', 'hersfs', '1998-11-11', 'agaqgag');

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

INSERT INTO `comic` (`id_comic`, `serie_id_comic`, `volumen_comic`, `titulo_comic`, `personaje_id_comic`, `editorial_id_comic`, `portada_comic`, `publicacion_fecha`, `autor_id_comic`, `precio_comic`, `universo_id_comic`, `bajada`) VALUES
(17, 2, 0, 'Batman: Justicia Ciega', 51, 2, 'batman_1.jpg', '1989-10-10', 10, 40000, 2, 'Batman: Justicia Ciega, es una novela gráfica que presenta a Batman enfrentándose a un enemigo cuyo objetivo es destruir su reputación y hacer que Gotham pierda la fe en él. Batman debe luchar no solo contra villanos físicos, sino tambié'),
(20, 3, 1, 'Daredevil', 52, 1, 'daredevil_1.jpg', '1987-03-10', 11, 40000, 1, 'Despues de las severos actos y eventos de Devil´s Reign, la vida de Daredevil ha cambiado de gran manera, las cadenas que lo limitaban en su carrera como vigilante se han roto y ahora ha encontrado una nueva visión para llevar su justicia a nuevos niveles.'),
(21, 2, 11, 'Arkham Renacido', 51, 2, 'batman_2.jpg', '2018-06-05', 2, 50000, 2, 'En Arkham Renacido, Batman enfrenta una serie de desafíos intensos mientras lidia con los oscuros secretos del Asilo Arkham y las amenazas que emergen de su interior. '),
(22, 3, 1, 'Le poing rouge', 52, 1, 'daredevil_2.jpg', '2022-05-03', 10, 30000, 1, 'No tengo acceso a información específica sobre la fecha exacta de publicación para este volumen. Sería recomendable verificar en fuentes actualizadas de cómics o tiendas especializadas para obtener la fecha exacta de lanzamiento.'),
(23, 9, 1, 'Les Gardiens du Globe - Assiégés', 53, 10, 'invencible_1.jpg', '2022-10-22', 11, 20000, 6, 'Probablemente se refiere a un arco de historias en el que los Gardiens du Globe enfrentan un asedio o una amenaza que pone a prueba sus habilidades y su lealtad como equipo de superhéroes.'),
(24, 9, 13, 'Días felices', 53, 10, 'invencible_2.jpg', '2023-04-10', 11, 10000, 6, 'En este número de Invencible, el protagonista, Mark Grayson (Invencible), puede enfrentar diversos desafíos o situaciones.'),
(25, 10, 1, 'Extremis', 1, 1, 'ironman_1.webp', '1987-11-11', 1, 50000, 1, 'La historia de Extremis sigue a Tony Stark mientras se enfrenta a una nueva amenaza tecnológica que amenaza con cambiar el mundo. Stark se ve obligado a integrar un suero nanotecnológico llamado Extremis en su propio cuerpo para poder enfrentar esta nueva '),
(26, 1, 2, 'Marvel Ultimate', 49, 1, 'spider_1.jpg', '1987-11-11', 1, 20000, 1, 'La línea Ultimate está especializada en ofrecer versiones modernizadas de los personajes clásicos de Marvel.'),
(27, 1, 10, 'Ultimate Spiderman ', 49, 1, 'spider_2.jpg', '1998-03-11', 1, 40000, 1, 'Sumérgete en Ultimate Spiderman 10 La Saga Del , una obra maestra de Brian Michael Bendis, publicada por la renombrada editorial Panini Comics. ');

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
(3, 'Dark Horse Comics', 'Estados Unidos', '1986-01-01', 'Dark Horse Comics es una editorial independiente de cómics conocida por sus títulos únicos y sus adaptaciones de franquicias populares como Star Wars y Buffy the Vampire Slayer.'),
(10, 'Image Comics', 'Estados Unidos', '1992-02-01', 'Image Comics es una editorial de cómics que se distingue por su enfoque en permitir a los creadores retener los derechos de autor de sus obras, en contraste con las prácticas más tradicionales de la industria del cómic.');

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
(1, 'Tony Stark', 'Iron Man', 'Tony Stark es un multimillonario, inventor y filántropo que, tras ser secuestrado y sufrir una grave herida en el pecho, crea una armadura para escapar. A partir de entonces, utiliza diversas armaduras de alta tecnología para combatir el crimen y proteger ', 1, '668305b436d30-iron-man.png', 'Uso de armaduras avanzadas que otorgan fuerza sobrehumana, capacidad de vuelo, armas avanzadas (repulsores, misiles, láseres), habilidades tecnológicas e ingenieriles excepcionales, inteligencia superior y habilidades de combate cuerpo a cuerpo.', '1963-03-01', 1),
(49, 'Peter Parker', 'Spider-Man', 'Peter Parker, también conocido como Spider-Man, es un joven que obtiene habilidades arácnidas después de ser mordido por una araña radioactiva. Como Spider-Man, lucha contra el crimen y enfrenta numerosos desafíos personales y profesionales mientras intent', 1, '668304e7c7c00-spider-man.jpg', 'Fuerza sobrehumana, agilidad y reflejos mejorados, capacidad de adherirse a superficies, sentido arácnido (una especie de sexto sentido para el peligro), capacidad de crear y lanzar telarañas usando dispositivos que él mismo inventa', '1962-08-10', 1),
(51, 'Bruce Wayne', 'Batman', 'Bruce Wayne es un multimillonario de Gotham City que, tras presenciar el asesinato de sus padres cuando era niño, jura vengar sus muertes combatiendo el crimen. Utiliza su vasto patrimonio para desarrollar tecnología avanzada y entrenarse al máximo nivel e', 8, '668306b488266-batman.jpg', 'Inteligencia y habilidades de detective excepcionales, maestro en artes marciales y combate cuerpo a cuerpo, utilización de tecnología avanzada y gadgets (batarangs, Batmobile, etc.), gran capacidad de estrategia y planificación, condición física y habilid', '1939-03-30', 2),
(52, 'Matthew Michael Murdock', 'Daredevil', 'Matt Murdock es un abogado que, tras quedar ciego en un accidente cuando era niño, desarrolla sus otros sentidos a niveles sobrehumanos. Utiliza estas habilidades para combatir el crimen en Hell&amp;amp;#039;s Kitchen, Nueva York, bajo la identidad de Dare', 1, '6683431ba088d-daredevil.jpg', 'Sentidos sobrehumanos (vista, oído, olfato, gusto y tacto extremadamente agudos), ecolocalización (similar a un sonar), experto en artes marciales y combate cuerpo a cuerpo, gran agilidad y equilibrio, habilidades de detección y rastreo superiores', '1964-04-10', 1),
(53, 'Mark Grayson', 'Invencible', 'Mark Grayson es un adolescente cuya vida cambia cuando descubre que ha heredado los superpoderes de su padre, Omni-Man, un poderoso extraterrestre del planeta Viltrum. Adoptando la identidad de Invincible, Mark lucha contra el crimen y enfrenta desafíos pe', 9, '668309b7e8fa6-invincible.jpg', 'Fuerza sobrehumana, velocidad y agilidad mejoradas, resistencia y durabilidad excepcionales, capacidad de vuelo, factor de curación acelerado', '2003-01-22', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie`
--

CREATE TABLE `serie` (
  `id_serie` int(11) UNSIGNED NOT NULL,
  `nombre_serie` varchar(256) NOT NULL,
  `descripcion_serie` text DEFAULT NULL,
  `fecha_inicio_serie` date DEFAULT NULL,
  `editorial_id_serie` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `serie`
--

INSERT INTO `serie` (`id_serie`, `nombre_serie`, `descripcion_serie`, `fecha_inicio_serie`, `editorial_id_serie`) VALUES
(1, 'The Amazing Spider-Man', 'La serie principal que sigue las aventuras de Spider-Man en el universo Marvel.', '1963-03-01', 1),
(2, 'Batman', 'La serie principal que sigue las aventuras de Batman en el universo DC Comics.', '1940-04-25', 2),
(3, 'Daredevil', 'La serie que sigue las aventuras del superhéroe Daredevil en el universo Marvel.', '1964-04-01', 1),
(9, 'Invencible', 'Mark Grayson es un adolescente cuya vida cambia cuando descubre que ha heredado los superpoderes de su padre.', '2003-01-22', 10),
(10, 'Iron man', 'Iron Man es un personaje icónico dentro del universo de Marvel Comics y del mundo del entretenimiento en general.', '1963-05-11', 1);

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
(2, 'DC', '1934-01-01', 'DC Comics es una editorial de cómics estadounidense, famosa por sus personajes como Superman, Batman y Wonder Woman, y su universo compartido.'),
(6, 'Universo Image Comics', '1992-02-16', 'El Universo Image Comics es el escenario compartido donde se desarrollan muchas de las historias y personajes publicados por Image Comics, una editorial de cómics estadounidense fundada en 1992 por un grupo de destacados artistas: Todd McFarlane, Jim Lee, ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `roles` enum('usuario','admin','superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre_usuario`, `nombre_completo`, `password`, `roles`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'superadmin'),
(3, 'mai', '', '', 'mai', 'admin'),
(7, 'dg', '', '', '$2y$10$24YawVqJDSvISyPP9S.N3.6VadX9cohwl3WKfPAtIRS/EeB31Ak.a', 'admin'),
(8, 's', '', '', '$2y$10$RRiKkLWZN9nsML8QYZa55eRM9WDIBkU0TX6HE/thy6yuamSU/ct/m', 'admin'),
(9, 'x', '', '', '$2y$10$GQy41qe6AHLWy0QQ5Us4He2r3iCHWVFEFGzjuR7JG5YOF9CevWtqi', 'usuario');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `comic`
--
ALTER TABLE `comic`
  MODIFY `id_comic` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id_editorial` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `personaje`
--
ALTER TABLE `personaje`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `serie`
--
ALTER TABLE `serie`
  MODIFY `id_serie` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `universo`
--
ALTER TABLE `universo`
  MODIFY `id_universo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comic`
--
ALTER TABLE `comic`
  ADD CONSTRAINT `comic_ibfk_1` FOREIGN KEY (`autor_id_comic`) REFERENCES `autor` (`id_autor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `comic_ibfk_3` FOREIGN KEY (`universo_id_comic`) REFERENCES `universo` (`id_universo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `comic_ibfk_6` FOREIGN KEY (`serie_id_comic`) REFERENCES `serie` (`id_serie`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `comic_ibfk_7` FOREIGN KEY (`personaje_id_comic`) REFERENCES `personaje` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_editorial` FOREIGN KEY (`editorial_id_comic`) REFERENCES `editorial` (`id_editorial`),
  ADD CONSTRAINT `fk_serie_id` FOREIGN KEY (`serie_id_comic`) REFERENCES `serie` (`id_serie`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `personaje`
--
ALTER TABLE `personaje`
  ADD CONSTRAINT `personaje_ibfk_4` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id_autor`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `serie`
--
ALTER TABLE `serie`
  ADD CONSTRAINT `serie_ibfk_1` FOREIGN KEY (`editorial_id_serie`) REFERENCES `editorial` (`id_editorial`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
