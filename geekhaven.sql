-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2023 a las 02:33:45
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `geekhaven`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_cat`, `nom_cat`) VALUES
(1, 'PlayStation'),
(2, 'Xbox'),
(3, 'Nintendo'),
(4, 'Comics'),
(5, 'Mangas'),
(6, 'Coleccionables'),
(7, 'Juegos De Mesa'),
(8, 'Trading Card Game'),
(9, 'Moda y Hogar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversaciones`
--

CREATE TABLE `conversaciones` (
  `id_conversacion` int(11) NOT NULL,
  `id_usuario1` int(11) NOT NULL,
  `id_usuario2` int(11) NOT NULL,
  `id_pub` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conversaciones`
--

INSERT INTO `conversaciones` (`id_conversacion`, `id_usuario1`, `id_usuario2`, `id_pub`) VALUES
(149, 41, 40, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `id_do` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `fecha_detalle` timestamp NULL DEFAULT NULL,
  `id_orden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_orden`
--

INSERT INTO `detalle_orden` (`id_do`, `id_producto`, `cantidad`, `id_usuario`, `estatus`, `fecha_detalle`, `id_orden`) VALUES
(3, 13, 2, 35, 2, '2023-11-07 02:15:16', 2),
(6, 5, 1, 36, 1, '2021-11-16 06:00:00', 4),
(7, 9, 1, 37, 1, '2022-05-16 06:00:00', 5),
(8, 6, 2, 37, 1, '2021-03-25 06:00:00', 5),
(9, 7, 2, 37, 1, '2022-01-13 06:00:00', 5),
(10, 8, 1, 38, 1, '2021-06-24 06:00:00', 6),
(11, 10, 1, 38, 1, '2022-04-16 06:00:00', 7),
(12, 11, 2, 39, 1, '2022-01-05 06:00:00', 8),
(13, 12, 1, 39, 1, '2022-03-11 06:00:00', 9),
(14, 1, 1, 39, 1, '2023-10-30 06:00:00', 10),
(15, 13, 2, 39, 1, '2022-01-01 06:00:00', 10),
(16, 6, 1, 39, 1, '2021-04-09 06:00:00', 11),
(17, 3, 1, 39, 1, '2021-05-06 06:00:00', 12),
(18, 8, 1, 39, 1, '2021-11-29 06:00:00', 13),
(19, 6, 1, 39, 1, '2022-07-09 06:00:00', 13),
(20, 2, 1, 39, 1, '2021-11-13 06:00:00', 13),
(54, 8, 1, 40, 2, NULL, 26),
(56, 4, 2, 40, 2, '2023-11-06 21:58:41', 28),
(57, 3, 1, 40, 2, '2023-11-06 21:58:41', 28),
(59, 8, 3, 40, 1, NULL, 30),
(60, 8, 6, 40, 1, NULL, 31),
(61, 3, 1, 40, 1, NULL, 32),
(62, 4, 1, 40, 1, NULL, 32),
(63, 7, 3, 40, 1, NULL, 33),
(64, 4, 4, 40, 1, NULL, 34),
(65, 5, 1, 40, 1, NULL, 35),
(68, 5, 1, 40, 1, NULL, 37),
(69, 8, 1, 40, 1, NULL, 37),
(70, 8, 1, 40, 0, NULL, 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre_imagen` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_productos`
--

CREATE TABLE `img_productos` (
  `id_img_productos` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `nombre_imagen` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_pub_trq`
--

CREATE TABLE `img_pub_trq` (
  `id` int(11) NOT NULL,
  `id_publicacion` int(11) DEFAULT NULL,
  `nombre_imagen` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `img_pub_trq`
--

INSERT INTO `img_pub_trq` (`id`, `id_publicacion`, `nombre_imagen`) VALUES
(47, 20, '1.png'),
(48, 20, '2.png'),
(49, 20, '3.png'),
(50, 20, '4.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL,
  `id_remitente` int(11) NOT NULL,
  `id_destinatario` int(11) NOT NULL,
  `id_conversacion` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `id_remitente`, `id_destinatario`, `id_conversacion`, `mensaje`, `fecha`) VALUES
(497, 41, 40, 149, 'holaaa', '2023-11-07 02:48:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id_orden` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `usr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id_orden`, `fecha`, `usr`) VALUES
(1, '2023-10-01 00:14:10', NULL),
(2, '2023-09-30 00:14:10', NULL),
(3, '2023-09-29 00:14:44', NULL),
(4, '2023-09-28 00:14:44', NULL),
(5, '2023-09-27 00:14:44', NULL),
(6, '2023-09-26 00:14:44', NULL),
(7, '2023-09-25 00:14:44', NULL),
(8, '2023-09-24 00:14:44', NULL),
(9, '2023-09-23 00:14:44', NULL),
(10, '2023-09-22 00:14:44', NULL),
(11, '2023-09-21 00:14:44', NULL),
(12, '2023-09-20 00:14:44', NULL),
(13, '2023-09-19 00:14:44', NULL),
(14, '2023-10-24 01:17:47', 40),
(15, '2023-10-24 02:24:16', 40),
(16, '2023-10-26 01:31:17', 40),
(17, '2023-10-26 01:33:00', 40),
(18, '2023-10-26 01:33:46', 40),
(19, '2023-10-26 01:36:29', 40),
(20, '2023-10-26 02:22:50', 40),
(23, '2023-11-02 04:41:07', 40),
(24, '2023-11-02 04:43:52', 40),
(25, '2023-11-02 04:47:23', 40),
(26, '2023-11-06 03:40:56', 40),
(27, '2023-11-06 03:47:07', 40),
(28, '2023-11-06 00:50:57', 40),
(29, '2023-11-06 21:59:16', 40),
(30, '2023-11-06 22:16:20', 40),
(31, '2023-11-07 02:11:46', 40),
(32, '2023-11-07 02:12:03', 40),
(33, '2023-11-07 02:12:41', 40),
(34, '2023-11-07 02:13:02', 40),
(35, '2023-11-07 02:13:30', 40),
(36, '2023-11-08 01:51:05', 40),
(37, '2023-11-08 03:05:20', 40),
(38, '2023-11-09 02:33:58', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `info` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombre`, `apellido`, `info`, `correo`) VALUES
(46, 'Diego Ivan', 'Cisneros', 'Estudiante', 'diego.cisneros.dp@gmail.com'),
(47, 'Pablo ', 'Adame', 'Fisioterapeuta', 'pablo123@gmail.com'),
(48, 'jorge', 'rodriguezz', 'Montacargas', 'jorge123123@gmail.com'),
(49, 'Regina', 'Davila', 'Capturista administrativa', 'reginadavila072@outlook.com'),
(50, 'Leonardo', 'Rodriguez', 'Jefe de Credito y Cobranza', 'cirleonardo@gmail.com'),
(52, '', '', NULL, ''),
(53, '', '', NULL, ''),
(54, '', '', NULL, ''),
(55, '', '', NULL, ''),
(56, '', '', NULL, ''),
(57, '', '', NULL, ''),
(58, '', '', NULL, ''),
(59, '', '', NULL, ''),
(60, '', '', NULL, ''),
(61, '', '', NULL, ''),
(62, '', '', NULL, ''),
(63, '', '', NULL, ''),
(67, 'angel', 'chavez', NULL, 'herbstluftwm.28@gmail.com'),
(68, '', '', NULL, ''),
(69, 'Juanito', 'Ontiveros', '¡Hola, Estoy usando GeekHaven! ', 'jkhsjkhsjs@gmail.com'),
(71, 'GeekHaven', 'Castañeda Ontiveros', '¡Hola, Estoy usando GeekHaven!', 'miguel@gmail.com'),
(72, 'Juan Angel', 'Castañeda Chávez ', '¡Hola, Estoy usando GeekHaven!', 'bspwm.28@gmail.com'),
(74, 'Diana Gabriela', 'Huerta Bailon', '¡Hola, Estoy usando GeekHaven!', 'dianagaby@gmail.com'),
(75, 'mil@gmail.com', 'Ontiveross sjkjsk', '¡Hola, Estoy usando GeekHaven!', 'angel@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nom_producto` varchar(100) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `existencia` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `universo_id` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `precio_base` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nom_producto`, `precio`, `descripcion`, `existencia`, `estado`, `id_cat`, `tipo_id`, `universo_id`, `fecha`, `precio_base`) VALUES
(1, 'Amiibo Mario Classic Color 30th Anniversary', 1002.91, '30th Super Mario', 12, 'normal', 3, 1, 8, '2023-11-09 01:02:50', 799.91),
(2, 'Comic Dc Comics Deluxe: Batman The Dark Knight Master Race', 371.35, 'DC Comics Deluxe: Batman The Dark Knight Master RaceEscritores: Frank Miller y Brian AzzarelloIlustradores: Andy Kubert, Klaus Janson, John Romita Jr., Eduardo Risso y Frank Miller Páginas: 392 Han pasado tres años desde que Batman venció a Lex Luthor y salvó al mundo de la tiranía. Tres años desde la última vez que alguien haya visto al guardián de Gotham City. Wonder Woman, Reina de las Amazonas… Hal Jordan, Green Lantern… Superman, el Hombre de Acero… todos los aliados del Caballero Oscuro se', 5, 'normal', 4, 7, 10, '2023-11-06 22:15:21', 370),
(3, 'Devir Juego De Mesa Smash Up Marvel', 999.99, '¿Qué mejor plan para una tarde de lluvia que un juego de mesa? Con el Smash Up: Marvel Base vas a crear divertidos recuerdos y pasarás momentos inolvidables junto a tus amigos y amigas. Con este pasatiempo entretenido las risas están aseguradas.', 4, 'oferta', 7, 8, 9, '2023-11-07 02:15:28', 800),
(4, 'Dragon Ball Z: Kakarot Dragon Ball Z Standard Edition Bandai Namco Xbox One Físico', 1000.99, 'Con este juego de Dragon Ball vas a disfrutar de horas de diversión y de nuevos desafíos que te permitirán mejorar como gamer.\r\nInteractúa con otros jugadores\r\nPodrás disfrutar de una experiencia inigualable, ya que te permite jugar con tus amistades y compartir momentos inolvidables.\r\nDiversión sin fronteras\r\nPodrás compartir cada juego con personas de todo el mundo, ya que es posible conectarse de manera online.', 7, 'normal', 2, 6, 2, '2023-11-07 02:15:28', 900),
(5, 'Game of Thrones Collegiate Targaryen - Sudadera raglán para jóvenes con Puntada de Funda Lana para M', 589.87, 'Warner Brothers Game of Thrones Collegiate Targaryen Junior - Sudadera raglán con punto de chamarra', 0, 'normal', 9, 9, 11, '2023-11-09 02:33:38', 500),
(6, 'Naruto Shippuden: Ultimate Ninja Storm 4 Road to Boruto Naruto Shippuden: Ultimate Ninja Storm Stand', 1089.59, 'Con este juego de Naruto vas a disfrutar de horas de diversión y de nuevos desafíos que te permitirán mejorar como gamer.\r\nInteractúa con otros jugadores\r\nPodrás disfrutar de una experiencia inigualable, ya que te permite jugar con tus amistades y compartir momentos inolvidables.Diversión sin fronteras\r\nPodrás compartir cada juego con personas de todo el mundo, ya que es posible conectarse de manera online.', 10, 'normal', 3, 6, 5, '2023-10-17 01:37:06', 1020),
(7, 'One Piece: Pirate Warriors 4 One Piece: Pirate Warriors Standard Edition Bandai Namco PS4 Físico', 987.99, 'Con este juego de One Piece vas a disfrutar de horas de diversión y de nuevos desafíos que te permitirán mejorar como gamer.\r\nInteractúa con otros jugadores\r\nPodrás disfrutar de una experiencia inigualable, ya que te permite jugar con tus amistades y compartir momentos inolvidables.\r\nDiversión sin fronteras\r\nPodrás compartir cada juego con personas de todo el mundo, ya que es posible conectarse de manera online.', 7, 'oferta', 1, 6, 4, '2023-11-07 02:12:43', 900),
(8, 'Pokémon Scarlet Standard Edition Nintendo Switch Físico', 859.88, 'Con este juego de Pokémon vas a disfrutar de horas de diversión y de nuevos desafíos que te permitirán mejorar como gamer.\r\nInteractúa con otros jugadores\r\nPodrás disfrutar de una experiencia inigualable, ya que te permite jugar con tus amistades y compartir momentos inolvidables.\r\nDiversión sin fronteras\r\nPodrás compartir cada juego con personas de todo el mundo, ya que es posible conectarse de manera online.', 2, 'oferta', 2, 6, 1, '2023-11-09 02:33:38', 850),
(9, 'Harry Potter Box Set: Books 1-7;Harry Potter', 3025.89, 'Esta caja incluye los siete fenomenales libros de Harry Potter de tapa dura de la autora de bestsellers J. K. Rowling . Los libros están alojados en una caja de trompa de colección con asas resistentes y bloqueo de privacidad . Incluye estampas decorativas en cada uno de los paquetes.', 1, 'normal', 4, 7, 12, '2023-10-17 01:37:30', 3010),
(10, 'Sudadera Con Capucha Y Diseño De My Hero Academia', 418, 'Sudadera de tela delgada de My Hero Academia de color azul', 9, 'oferta', 9, 9, 3, '2023-10-17 01:37:36', 415),
(11, 'The Legend of Zelda: Tears of the Kingdom Standard Edition Nintendo Switch Físico', 1013, 'Explora la vasta superficie y los cielos de Hyrule.Una épica aventura a través de la superficie y los cielos de Hyrule te espera en The Legend of Zelda™: Tears of the Kingdom.En esta secuela del juego The Legend of Zelda: Breath of the Wild, decidirás tu propio camino a través de los extensos paisajes de Hyrule y las islas que flotan en los vastos cielos. ¿Podrás aprovechar el poder de las nuevas habilidades de Link para luchar contra las malévolas fuerzas que amenazan al reino?\r\n', 20, 'normal', 3, 6, 7, '2023-10-17 01:37:45', 1000),
(12, 'Yu-gi-oh!, De Kazuki Takahashi. Editorial Panini, Tapa Blanda En Español, 2022', 269.99, NULL, 2, 'oferta', 5, 7, 6, '2023-10-17 01:37:53', 265),
(13, 'Control joystick inalámbrico Sony PlayStation DualSense CFI-ZCT1 cosmic red', 1121.99, 'Control preciso\r\nEste mando combina funciones revolucionarias mientras conserva precisión, comodidad y exactitud en cada movimiento. Gracias a su ergonomía especialmente pensada para la posición de tu mano, puedes pasar horas jugando con total confort.\r\n\r\nMayor comodidad y realismo\r\nTe permite jugar sin necesidad de que haya cables de por medio. Está pensado no solamente para controlar mejor tus videojuegos, sino también para aumentar su realismo y experiencia.\r\n\r\nActiva el Bluetooth\r\nCuenta con', 12, 'normal', 1, 1, 13, '2023-10-17 01:38:00', 1100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pub_trq`
--

CREATE TABLE `pub_trq` (
  `id_pub` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `id_conversacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pub_trq`
--

INSERT INTO `pub_trq` (`id_pub`, `id_usuario`, `precio`, `descripcion`, `estado`, `estatus`, `titulo`, `id_conversacion`) VALUES
(20, 40, 3200, 'Cama completamente nueva hecha de piel', 'Nuevo', 1, 'Cama matrimonial', 149);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `tipo`) VALUES
(1, 'Mandos'),
(2, 'Accesorios'),
(3, 'Figuras de accion'),
(4, 'Consolas'),
(5, 'Coleccionables'),
(6, 'Videojuegos'),
(7, 'Novelas Graficas'),
(8, 'Didacticos'),
(9, 'Prendas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universo`
--

CREATE TABLE `universo` (
  `id_universo` int(11) NOT NULL,
  `universo` varchar(50) DEFAULT NULL,
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `universo`
--

INSERT INTO `universo` (`id_universo`, `universo`, `img`) VALUES
(1, 'Pokemon', ''),
(2, 'Dragon Ball', ''),
(3, 'MY HERO ACADEMY', ''),
(4, 'ONE-PIECE', ''),
(5, 'NARUTO', ''),
(6, 'YU-GI-OH', ''),
(7, 'THE LEGEND OF ZELDA', ''),
(8, 'SUPER MARIO', ''),
(9, 'MARVEL', ''),
(10, 'DC', ''),
(11, 'Game of Thrones', ''),
(12, 'Harry Potter', ''),
(13, 'Sin universo', ''),
(25, 'asdasdasdasdasdasdasdasda', 'img_u/654d58018e97f_correccion1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `contrasena` varchar(1000) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `codigo_reset_passwd` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `reputacion` int(11) DEFAULT NULL,
  `imagen` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `telefono`, `contrasena`, `id_persona`, `codigo_reset_passwd`, `estado`, `tipo_usuario`, `reputacion`, `imagen`) VALUES
(35, '8713600176', '1111111111', 61, NULL, NULL, 1, 5, NULL),
(36, '8715364782', '2222222222', 47, NULL, NULL, 1, 4, NULL),
(37, '8713709098', '3333333333', 48, NULL, NULL, 1, 2, NULL),
(38, '8714253647', '4444444444', 49, NULL, NULL, 1, 3, NULL),
(39, '8711234567', '5555555555', 50, NULL, NULL, 1, 1, NULL),
(40, '12345', '$2y$10$n7JKTVKLGK9qbBCCuf7B8.FEtX65z8vjp3OZa1w9Vl0Q.CCo.3AxS', 69, NULL, 1, 1, NULL, 'default.jpg'),
(41, '9999999999', '$2y$10$Sy1SuICzGUUO6bdqQDFunuaIp4lZRz2jlFWFzGPronhm1CdznWcYm', 71, NULL, 1, 0, NULL, 'logo_chat.png'),
(42, '00000', '$2y$10$NnmmYJhl/rTLxKyqPC4AX.JRslU0w.S0rew5H40Kncs3mMWS9F6bS', 72, NULL, 1, 1, NULL, 'Screenshot_20230914_102424_com.android.keyguard.jpg'),
(44, '8711493511', '$2y$10$YF24JkDAMaTAPyX891U6XOlsBAETC3/X2THIKcxucR8SYRBceTjr6', 74, NULL, 1, 1, NULL, 'default.jpg'),
(45, '87887999', '$2y$10$drTBwn2XNtBqVYjsd3z5EONtv31PNni.TciFIYRalrjBS5QwKsp6q', 75, NULL, NULL, 1, NULL, 'default.jpg');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vmostrar`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vmostrar` (
`id_producto` int(11)
,`nom_producto` varchar(100)
,`precio` double
,`descripcion` varchar(500)
,`existencia` int(11)
,`estado` varchar(50)
,`id_cat` int(11)
,`tipo_id` int(11)
,`universo_id` int(11)
,`fecha` timestamp
,`precio_base` float
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vmostrar`
--
DROP TABLE IF EXISTS `vmostrar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vmostrar`  AS SELECT `productos`.`id_producto` AS `id_producto`, `productos`.`nom_producto` AS `nom_producto`, `productos`.`precio` AS `precio`, `productos`.`descripcion` AS `descripcion`, `productos`.`existencia` AS `existencia`, `productos`.`estado` AS `estado`, `productos`.`id_cat` AS `id_cat`, `productos`.`tipo_id` AS `tipo_id`, `productos`.`universo_id` AS `universo_id`, `productos`.`fecha` AS `fecha`, `productos`.`precio_base` AS `precio_base` FROM `productos` WHERE `productos`.`id_cat` = 3 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  ADD PRIMARY KEY (`id_conversacion`),
  ADD KEY `conversaciones_ibfk_1` (`id_usuario1`),
  ADD KEY `conversaciones_ibfk_2` (`id_usuario2`),
  ADD KEY `id_pub` (`id_pub`);

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id_do`),
  ADD KEY `prd_do` (`id_producto`),
  ADD KEY `do_o` (`id_orden`),
  ADD KEY `usr_do` (`id_usuario`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `img_productos`
--
ALTER TABLE `img_productos`
  ADD PRIMARY KEY (`id_img_productos`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `img_pub_trq`
--
ALTER TABLE `img_pub_trq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_publicacion` (`id_publicacion`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `mensajes_ibfk_4` (`id_conversacion`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id_orden`),
  ADD KEY `usr` (`usr`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `prd_cat` (`id_cat`),
  ADD KEY `fk_tipo_producto` (`tipo_id`),
  ADD KEY `universo_id` (`universo_id`);

--
-- Indices de la tabla `pub_trq`
--
ALTER TABLE `pub_trq`
  ADD PRIMARY KEY (`id_pub`),
  ADD KEY `usr_pub` (`id_usuario`),
  ADD KEY `id_conversacion` (`id_conversacion`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `universo`
--
ALTER TABLE `universo`
  ADD PRIMARY KEY (`id_universo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuarios_ibfk_1` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  MODIFY `id_conversacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id_do` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `img_productos`
--
ALTER TABLE `img_productos`
  MODIFY `id_img_productos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `img_pub_trq`
--
ALTER TABLE `img_pub_trq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pub_trq`
--
ALTER TABLE `pub_trq`
  MODIFY `id_pub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `universo`
--
ALTER TABLE `universo`
  MODIFY `id_universo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  ADD CONSTRAINT `conversaciones_ibfk_1` FOREIGN KEY (`id_usuario1`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `conversaciones_ibfk_2` FOREIGN KEY (`id_usuario2`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `conversaciones_ibfk_3` FOREIGN KEY (`id_pub`) REFERENCES `pub_trq` (`id_pub`);

--
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `do_o` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`id_orden`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prd_do` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usr_do` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `img_productos`
--
ALTER TABLE `img_productos`
  ADD CONSTRAINT `img_productos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `img_pub_trq`
--
ALTER TABLE `img_pub_trq`
  ADD CONSTRAINT `img_pub_trq_ibfk_1` FOREIGN KEY (`id_publicacion`) REFERENCES `pub_trq` (`id_pub`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_3` FOREIGN KEY (`id_conversacion`) REFERENCES `conversaciones` (`id_conversacion`),
  ADD CONSTRAINT `mensajes_ibfk_4` FOREIGN KEY (`id_conversacion`) REFERENCES `conversaciones` (`id_conversacion`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`usr`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_tipo_producto` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prd_cat` FOREIGN KEY (`id_cat`) REFERENCES `categorias` (`id_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`universo_id`) REFERENCES `universo` (`id_universo`);

--
-- Filtros para la tabla `pub_trq`
--
ALTER TABLE `pub_trq`
  ADD CONSTRAINT `pub_trq_ibfk_1` FOREIGN KEY (`id_conversacion`) REFERENCES `conversaciones` (`id_conversacion`),
  ADD CONSTRAINT `usr_pub` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
