-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2023 at 08:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geekhaven`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
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
-- Table structure for table `conversaciones`
--

CREATE TABLE `conversaciones` (
  `id_conversacion` int(11) NOT NULL,
  `id_usuario1` int(11) NOT NULL,
  `id_usuario2` int(11) NOT NULL,
  `id_pub` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conversaciones`
--

INSERT INTO `conversaciones` (`id_conversacion`, `id_usuario1`, `id_usuario2`, `id_pub`) VALUES
(153, 41, 40, 20),
(155, 41, 40, 35);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_orden`
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
-- Dumping data for table `detalle_orden`
--

INSERT INTO `detalle_orden` (`id_do`, `id_producto`, `cantidad`, `id_usuario`, `estatus`, `fecha_detalle`, `id_orden`) VALUES
(3, 13, 2, 40, 2, '2023-10-07 02:15:16', 2),
(6, 5, 1, 36, 2, '2023-11-16 06:00:00', 4),
(7, 9, 1, 37, 2, '2023-12-16 07:00:00', 5),
(8, 6, 2, 37, 1, '2021-03-25 06:00:00', 5),
(9, 7, 2, 37, 2, '2023-04-13 06:00:00', 5),
(10, 8, 1, 38, 1, '2021-06-24 06:00:00', 6),
(11, 10, 1, 38, 1, '2022-04-16 06:00:00', 7),
(12, 11, 2, 39, 2, '2023-01-05 06:00:00', 8),
(13, 12, 1, 39, 1, '2022-03-11 06:00:00', 9),
(14, 1, 1, 39, 1, '2023-10-30 06:00:00', 10),
(15, 13, 2, 39, 1, '2022-01-01 06:00:00', 10),
(16, 6, 1, 39, 1, '2021-04-09 06:00:00', 11),
(17, 3, 1, 39, 1, '2021-05-06 06:00:00', 12),
(18, 8, 1, 39, 1, '2021-11-29 06:00:00', 13),
(19, 6, 1, 39, 1, '2022-07-09 06:00:00', 13),
(20, 2, 1, 39, 2, '2023-08-13 06:00:00', 13),
(54, 8, 1, 40, NULL, NULL, 26),
(56, 4, 2, 40, NULL, '2023-11-06 21:58:41', 28),
(57, 3, 1, 40, NULL, '2023-11-06 21:58:41', 28),
(59, 8, 3, 40, NULL, NULL, 30),
(60, 8, 6, 40, NULL, NULL, 31),
(61, 3, 1, 40, NULL, NULL, 32),
(62, 4, 1, 40, NULL, NULL, 32),
(63, 7, 3, 40, NULL, NULL, 33),
(64, 4, 4, 40, NULL, NULL, 34),
(65, 5, 1, 40, NULL, NULL, 35),
(68, 5, 1, 40, 1, NULL, 37),
(69, 8, 1, 40, 1, NULL, 37),
(70, 8, 1, 40, NULL, NULL, 38),
(72, 2, 2, 40, NULL, NULL, 38),
(73, 3, 1, 40, NULL, NULL, 39),
(74, 4, 2, 40, 2, '2023-11-25 01:11:21', 40),
(75, 10, 1, 40, 1, NULL, 41),
(86, 3, 1, 40, 1, NULL, 48),
(87, 3, 1, 40, 1, NULL, 49),
(88, 8, 1, 40, 1, NULL, 50),
(89, 15, 3, 40, 1, NULL, 51);

-- --------------------------------------------------------

--
-- Table structure for table `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre_imagen` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img_productos`
--

CREATE TABLE `img_productos` (
  `id_img_productos` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `nombre_imagen` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `img_productos`
--

INSERT INTO `img_productos` (`id_img_productos`, `id_producto`, `nombre_imagen`) VALUES
(1, 1, 'amibo.jpg\r\n'),
(2, 1, 'amibo2.jpg'),
(3, 2, 'batman.jpg'),
(4, 2, 'batman2.jpg'),
(5, 13, 'ps4.jpg'),
(6, 3, 'smashup.jpg'),
(7, 4, NULL),
(8, 5, 'got.jpg'),
(10, 6, 'naruto.jpg'),
(11, 7, 'onp.jpg'),
(12, 8, 'pokemon.jpg'),
(13, 10, 'myhero.jpg'),
(14, 11, 'zelda.jpg'),
(15, 12, 'ygo.jpg'),
(16, 12, 'ygo.jpg'),
(18, 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `img_pub_trq`
--

CREATE TABLE `img_pub_trq` (
  `id` int(11) NOT NULL,
  `id_publicacion` int(11) DEFAULT NULL,
  `nombre_imagen` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `img_pub_trq`
--

INSERT INTO `img_pub_trq` (`id`, `id_publicacion`, `nombre_imagen`) VALUES
(47, 20, '1.png'),
(48, 20, '2.png'),
(49, 20, '3.png'),
(50, 20, '4.png'),
(55, 35, 'czs11w2xx333xxxa257yyfxcd5_generated.jpg'),
(56, 36, 'Screenshot_2023-11-15-09-53-58_primary.png'),
(57, 37, 'Screenshot_2023-11-15-10-01-22_1920x1080.png'),
(58, 38, 'Screenshot_2023-11-15-09-49-58_primary.png');

-- --------------------------------------------------------

--
-- Table structure for table `mensajes`
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
-- Dumping data for table `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `id_remitente`, `id_destinatario`, `id_conversacion`, `mensaje`, `fecha`) VALUES
(502, 41, 40, 153, 'holaaa', '2023-11-23 16:21:03'),
(503, 40, 41, 153, 'que onda', '2023-11-23 16:21:49'),
(505, 41, 40, 155, 'kkjkjk', '2023-11-23 16:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `orden`
--

CREATE TABLE `orden` (
  `id_orden` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `usr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orden`
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
(38, '2023-11-09 02:33:58', 40),
(39, '2023-11-20 04:38:53', 40),
(40, '2023-11-20 04:58:31', 40),
(41, '2023-11-20 04:59:38', 40),
(42, '2023-11-24 06:51:56', 40),
(43, '2023-11-24 07:38:23', 40),
(44, '2023-11-24 07:43:21', 40),
(45, '2023-11-24 07:45:35', 40),
(46, '2023-11-24 10:42:41', 40),
(47, '2023-11-25 01:03:19', 40),
(48, '2023-11-25 01:04:31', 40),
(49, '2023-11-25 01:05:39', 40),
(50, '2023-11-25 01:06:46', 40),
(51, '2023-11-26 07:14:03', 40);

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `info` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personas`
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
(69, 'Juanito', 'Ontiveros', '¡Hola, Estoy usando GeekHaven! ', 'jkhj@outlook.com'),
(71, 'GeekHaven', 'Castañeda Ontiveros', '¡Hola, Estoy usando GeekHaven!', 'miguel@gmail.com'),
(72, 'Juan Angel', 'Castañeda Chávez ', '¡Hola, Estoy usando GeekHaven!', 'bspwm.28@gmail.com'),
(74, 'Diana Gabriela', 'Huerta Bailon', '¡Hola, Estoy usando GeekHaven!', 'dianagaby@gmail.com'),
(75, 'mil@gmail.com', 'Ontiveross sjkjsk', '¡Hola, Estoy usando GeekHaven!', 'angel@gmail.com'),
(76, 'Sedona Ramirez', 'Espinoza', '¡Hola, Estoy usando GeekHaven!', 'sendona@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
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
  `precio_base` float DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nom_producto`, `precio`, `descripcion`, `existencia`, `estado`, `id_cat`, `tipo_id`, `universo_id`, `fecha`, `precio_base`, `estatus`) VALUES
(1, 'Amiibo Mario Classic Color 30th Anniversary', 1002.91, '30th Super Mario', 12, 'normal', 3, 1, 8, '2023-11-09 01:02:50', 799.91, 1),
(2, 'Comic Dc Comics Deluxe: Batman The Dark Knight Master Race', 371.35, 'DC Comics Deluxe: Batman The Dark Knight Master RaceEscritores: Frank Miller y Brian AzzarelloIlustradores: Andy Kubert, Klaus Janson, John Romita Jr., Eduardo Risso y Frank Miller Páginas: 392 Han pasado tres años desde que Batman venció a Lex Luthor y salvó al mundo de la tiranía. Tres años desde la última vez que alguien haya visto al guardián de Gotham City. Wonder Woman, Reina de las Amazonas… Hal Jordan, Green Lantern… Superman, el Hombre de Acero… todos los aliados del Caballero Oscuro se', 3, 'normal', 4, 7, 10, '2023-11-15 01:10:47', 370, 1),
(3, 'Devir Juego De Mesa Smash Up Marvel', 999.99, '¿Qué mejor plan para una tarde de lluvia que un juego de mesa? Con el Smash Up: Marvel Base vas a crear divertidos recuerdos y pasarás momentos inolvidables junto a tus amigos y amigas. Con este pasatiempo entretenido las risas están aseguradas.', 1, 'oferta', 7, 8, 9, '2023-11-25 01:05:47', 800, 1),
(4, 'Dragon Ball Z: Kakarot Dragon Ball Z Standard Edition Bandai Namco Xbox One Físico', 1000.99, 'Con este juego de Dragon Ball vas a disfrutar de horas de diversión y de nuevos desafíos que te permitirán mejorar como gamer.\r\nInteractúa con otros jugadores\r\nPodrás disfrutar de una experiencia inigualable, ya que te permite jugar con tus amistades y compartir momentos inolvidables.\r\nDiversión sin fronteras\r\nPodrás compartir cada juego con personas de todo el mundo, ya que es posible conectarse de manera online.', 5, 'normal', 2, 6, 2, '2023-11-20 04:58:41', 900, 1),
(5, 'Game of Thrones Collegiate Targaryen - Sudadera raglán para jóvenes con Puntada de Funda Lana para M', 589.87, 'Warner Brothers Game of Thrones Collegiate Targaryen Junior - Sudadera raglán con punto de chamarra', 0, 'normal', 9, 9, 11, '2023-11-09 02:33:38', 500, 1),
(6, 'Naruto Shippuden: Ultimate Ninja Storm 4 Road to Boruto Naruto Shippuden: Ultimate Ninja Storm Stand', 1089.59, 'Con este juego de Naruto vas a disfrutar de horas de diversión y de nuevos desafíos que te permitirán mejorar como gamer.\r\nInteractúa con otros jugadores\r\nPodrás disfrutar de una experiencia inigualable, ya que te permite jugar con tus amistades y compartir momentos inolvidables.Diversión sin fronteras\r\nPodrás compartir cada juego con personas de todo el mundo, ya que es posible conectarse de manera online.', 10, 'normal', 3, 6, 5, '2023-10-17 01:37:06', 1020, 1),
(7, 'One Piece: Pirate Warriors 4 One Piece: Pirate Warriors Standard Edition Bandai Namco PS4 Físico', 987.99, 'Con este juego de One Piece vas a disfrutar de horas de diversión y de nuevos desafíos que te permitirán mejorar como gamer.\r\nInteractúa con otros jugadores\r\nPodrás disfrutar de una experiencia inigualable, ya que te permite jugar con tus amistades y compartir momentos inolvidables.\r\nDiversión sin fronteras\r\nPodrás compartir cada juego con personas de todo el mundo, ya que es posible conectarse de manera online.', 7, 'oferta', 1, 6, 4, '2023-11-07 02:12:43', 900, 1),
(8, 'Pokémon Scarlet Standard Edition Nintendo Switch Físico', 859.88, 'Con este juego de Pokémon vas a disfrutar de horas de diversión y de nuevos desafíos que te permitirán mejorar como gamer.\r\nInteractúa con otros jugadores\r\nPodrás disfrutar de una experiencia inigualable, ya que te permite jugar con tus amistades y compartir momentos inolvidables.\r\nDiversión sin fronteras\r\nPodrás compartir cada juego con personas de todo el mundo, ya que es posible conectarse de manera online.', 1, 'oferta', 2, 6, 1, '2023-11-25 01:06:53', 850, 1),
(9, 'Harry Potter Box Set: Books 1-7;Harry Potter', 3025.89, 'Esta caja incluye los siete fenomenales libros de Harry Potter de tapa dura de la autora de bestsellers J. K. Rowling . Los libros están alojados en una caja de trompa de colección con asas resistentes y bloqueo de privacidad . Incluye estampas decorativas en cada uno de los paquetes.', 1, 'normal', 4, 7, 12, '2023-10-17 01:37:30', 3010, 1),
(10, 'Sudadera Con Capucha Y Diseño De My Hero Academia', 418, 'Sudadera de tela delgada de My Hero Academia de color azul', 8, 'oferta', 9, 9, 3, '2023-11-20 04:59:43', 415, 1),
(11, 'The Legend of Zelda: Tears of the Kingdom Standard Edition Nintendo Switch Físico', 1013, 'Explora la vasta superficie y los cielos de Hyrule.Una épica aventura a través de la superficie y los cielos de Hyrule te espera en The Legend of Zelda™: Tears of the Kingdom.En esta secuela del juego The Legend of Zelda: Breath of the Wild, decidirás tu propio camino a través de los extensos paisajes de Hyrule y las islas que flotan en los vastos cielos. ¿Podrás aprovechar el poder de las nuevas habilidades de Link para luchar contra las malévolas fuerzas que amenazan al reino?\r\n', 20, 'normal', 3, 6, 7, '2023-10-17 01:37:45', 1000, 1),
(12, 'Yu-gi-oh!, De Kazuki Takahashi. Editorial Panini, Tapa Blanda En Español, 2022', 269.99, NULL, 2, 'oferta', 5, 7, 6, '2023-10-17 01:37:53', 265, 1),
(13, 'Control joystick inalámbrico Sony PlayStation DualSense CFI-ZCT1 cosmic red', 1121.99, 'Control preciso\r\nEste mando combina funciones revolucionarias mientras conserva precisión, comodidad y exactitud en cada movimiento. Gracias a su ergonomía especialmente pensada para la posición de tu mano, puedes pasar horas jugando con total confort.\r\n\r\nMayor comodidad y realismo\r\nTe permite jugar sin necesidad de que haya cables de por medio. Está pensado no solamente para controlar mejor tus videojuegos, sino también para aumentar su realismo y experiencia.\r\n\r\nActiva el Bluetooth\r\nCuenta con', 12, 'normal', 1, 1, 13, '2023-10-17 01:38:00', 1100, 1),
(15, 'mnhjjhjh', 6555, 'hjghghjgh', 19, 'oferta', 1, 1, 1, '2023-11-26 07:18:19', 88, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pub_trq`
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
-- Dumping data for table `pub_trq`
--

INSERT INTO `pub_trq` (`id_pub`, `id_usuario`, `precio`, `descripcion`, `estado`, `estatus`, `titulo`, `id_conversacion`) VALUES
(20, 40, 3200, 'Cama completamente nueva hecha de piel', 'Nuevo', 0, 'Cama matrimonial', 153),
(29, 40, 22, 'kjkjkj', 'Nuevo', 0, 'kjkj', NULL),
(34, 40, 333, 'kjkjj', 'Nuevo', 0, 'kjkjkjk', NULL),
(35, 40, 8888, 'kjkjkj', 'Nuevo', 0, 'jjkjkj', 155),
(36, 46, 22, 'jkjkjk', 'Nuevo', 0, 'Producto en venta', NULL),
(37, 40, 565, 'jhjjhjh', 'Semi-usado', 0, 'jhhj', NULL),
(38, 40, 333, 'jhkjhjk', 'Nuevo', 0, 'jkhjkhjkhk', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo`
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
-- Table structure for table `universo`
--

CREATE TABLE `universo` (
  `id_universo` int(11) NOT NULL,
  `universo` varchar(50) DEFAULT NULL,
  `img` varchar(1000) NOT NULL DEFAULT 'img_u/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `universo`
--

INSERT INTO `universo` (`id_universo`, `universo`, `img`) VALUES
(1, 'Pokemon', 'img_u/6557decb303db_Pokemon-Symbol-logo.png'),
(2, 'Dragon Ball', 'img_u/654d929105f4d_dragonball-z-logo-png-transparent.png'),
(3, 'MY HERO ACADEMY', 'img_u/6554345c287e0_PHP-logo.svg.png'),
(4, 'ONE-PIECE', 'img_u/654d93ff0bea7_One-Piece-Logo.png'),
(5, 'NARUTO', 'img_u/654d92c6225d9_naruto.png'),
(6, 'YU-GI-OH', 'img_u/654d94059d65d_Yu-Gi-Oh!.png'),
(7, 'THE LEGEND OF ZELDA', 'img_u/654d92cfa83c6_zelda-logo.png'),
(8, 'SUPER MARIO', 'img_u/654d92d4041ea_Super_Mario_logo_PNG2.png'),
(9, 'MARVEL', 'img_u/654d92d940911_marvel.png'),
(10, 'DC', 'img_u/654d940cd97af_DC_Comics_logo.png'),
(11, 'Game of Thrones', 'img_u/654d941269287_Game-of-Thrones-logo.png'),
(12, 'Harry Potter', 'img_u/654d94172fe7a_Logo-Harry-potter.png'),
(13, 'Sin universo', '');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
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
-- Dumping data for table `usuarios`
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
(45, '87887999', '$2y$10$drTBwn2XNtBqVYjsd3z5EONtv31PNni.TciFIYRalrjBS5QwKsp6q', 75, NULL, NULL, 1, NULL, 'default.jpg'),
(46, '123', '$2y$10$ODQghlQ2gXRTUAzxeBitUe8.FbpfqP1Ikft0iEkDggBlaoLJgYP6K', 76, NULL, NULL, 1, NULL, 'Screenshot_2023-11-16-19-05-38_primary.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vmostrar`
-- (See below for the actual view)
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
-- Structure for view `vmostrar`
--
DROP TABLE IF EXISTS `vmostrar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vmostrar`  AS SELECT `productos`.`id_producto` AS `id_producto`, `productos`.`nom_producto` AS `nom_producto`, `productos`.`precio` AS `precio`, `productos`.`descripcion` AS `descripcion`, `productos`.`existencia` AS `existencia`, `productos`.`estado` AS `estado`, `productos`.`id_cat` AS `id_cat`, `productos`.`tipo_id` AS `tipo_id`, `productos`.`universo_id` AS `universo_id`, `productos`.`fecha` AS `fecha`, `productos`.`precio_base` AS `precio_base` FROM `productos` WHERE `productos`.`id_cat` = 3 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `conversaciones`
--
ALTER TABLE `conversaciones`
  ADD PRIMARY KEY (`id_conversacion`),
  ADD KEY `conversaciones_ibfk_1` (`id_usuario1`),
  ADD KEY `conversaciones_ibfk_2` (`id_usuario2`),
  ADD KEY `id_pub` (`id_pub`);

--
-- Indexes for table `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id_do`),
  ADD KEY `prd_do` (`id_producto`),
  ADD KEY `do_o` (`id_orden`),
  ADD KEY `usr_do` (`id_usuario`);

--
-- Indexes for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indexes for table `img_productos`
--
ALTER TABLE `img_productos`
  ADD PRIMARY KEY (`id_img_productos`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `img_pub_trq`
--
ALTER TABLE `img_pub_trq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_publicacion` (`id_publicacion`);

--
-- Indexes for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `mensajes_ibfk_4` (`id_conversacion`);

--
-- Indexes for table `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id_orden`),
  ADD KEY `usr` (`usr`);

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `prd_cat` (`id_cat`),
  ADD KEY `fk_tipo_producto` (`tipo_id`),
  ADD KEY `universo_id` (`universo_id`);

--
-- Indexes for table `pub_trq`
--
ALTER TABLE `pub_trq`
  ADD PRIMARY KEY (`id_pub`),
  ADD KEY `usr_pub` (`id_usuario`),
  ADD KEY `id_conversacion` (`id_conversacion`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indexes for table `universo`
--
ALTER TABLE `universo`
  ADD PRIMARY KEY (`id_universo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuarios_ibfk_1` (`id_persona`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `conversaciones`
--
ALTER TABLE `conversaciones`
  MODIFY `id_conversacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id_do` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `img_productos`
--
ALTER TABLE `img_productos`
  MODIFY `id_img_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `img_pub_trq`
--
ALTER TABLE `img_pub_trq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;

--
-- AUTO_INCREMENT for table `orden`
--
ALTER TABLE `orden`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pub_trq`
--
ALTER TABLE `pub_trq`
  MODIFY `id_pub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `universo`
--
ALTER TABLE `universo`
  MODIFY `id_universo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversaciones`
--
ALTER TABLE `conversaciones`
  ADD CONSTRAINT `conversaciones_ibfk_1` FOREIGN KEY (`id_usuario1`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `conversaciones_ibfk_2` FOREIGN KEY (`id_usuario2`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `conversaciones_ibfk_3` FOREIGN KEY (`id_pub`) REFERENCES `pub_trq` (`id_pub`);

--
-- Constraints for table `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `do_o` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`id_orden`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prd_do` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usr_do` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `img_productos`
--
ALTER TABLE `img_productos`
  ADD CONSTRAINT `img_productos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Constraints for table `img_pub_trq`
--
ALTER TABLE `img_pub_trq`
  ADD CONSTRAINT `img_pub_trq_ibfk_1` FOREIGN KEY (`id_publicacion`) REFERENCES `pub_trq` (`id_pub`);

--
-- Constraints for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_3` FOREIGN KEY (`id_conversacion`) REFERENCES `conversaciones` (`id_conversacion`),
  ADD CONSTRAINT `mensajes_ibfk_4` FOREIGN KEY (`id_conversacion`) REFERENCES `conversaciones` (`id_conversacion`);

--
-- Constraints for table `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`usr`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_tipo_producto` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prd_cat` FOREIGN KEY (`id_cat`) REFERENCES `categorias` (`id_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`universo_id`) REFERENCES `universo` (`id_universo`);

--
-- Constraints for table `pub_trq`
--
ALTER TABLE `pub_trq`
  ADD CONSTRAINT `pub_trq_ibfk_1` FOREIGN KEY (`id_conversacion`) REFERENCES `conversaciones` (`id_conversacion`),
  ADD CONSTRAINT `usr_pub` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
