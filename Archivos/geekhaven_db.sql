-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 03:39 AM
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
  `id_usuario2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 1, 1, 35, 1, '2023-10-02 06:00:00', 1),
(2, 2, 1, 35, 1, '2022-08-18 06:00:00', 1),
(3, 13, 2, 35, 1, '2023-10-01 06:00:00', 2),
(4, 3, 2, 36, 1, '2021-09-18 06:00:00', 3),
(5, 4, 2, 36, 1, '2023-10-04 06:00:00', 3),
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
(20, 2, 1, 39, 1, '2021-11-13 06:00:00', 13);

-- --------------------------------------------------------

--
-- Table structure for table `img_prducto_prd`
--

CREATE TABLE `img_prducto_prd` (
  `id_img_prd` int(11) NOT NULL,
  `id_img` int(11) DEFAULT NULL,
  `id_productos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `img_prducto_prd`
--

INSERT INTO `img_prducto_prd` (`id_img_prd`, `id_img`, `id_productos`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 2),
(5, 5, 3),
(6, 6, 3),
(7, 7, 4),
(8, 8, 4),
(9, 9, 5),
(10, 10, 5),
(11, 11, 6),
(12, 12, 6),
(13, 13, 7),
(14, 14, 7),
(15, 15, 8),
(16, 16, 8),
(17, 17, 9),
(18, 18, 9),
(19, 19, 10),
(20, 20, 10),
(21, 21, 11),
(22, 22, 11),
(23, 23, 12),
(24, 24, 12),
(25, 25, 13);

-- --------------------------------------------------------

--
-- Table structure for table `img_producto`
--

CREATE TABLE `img_producto` (
  `id_img` int(11) NOT NULL,
  `img_producto` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `img_producto`
--

INSERT INTO `img_producto` (`id_img`, `img_producto`) VALUES
(1, 'https://i.ebayimg.com/images/g/bxkAAOSwtA9koLPs/s-l1600.jpg'),
(2, 'https://i.ebayimg.com/images/g/bKoAAOSwAYtWN3hi/s-l1600.jpg'),
(3, 'https://http2.mlstatic.com/D_NQ_NP_765777-MLM40372248058_012020-O.webp'),
(4, 'https://http2.mlstatic.com/D_NQ_NP_856805-MLM45822606740_052021-W.jpg'),
(5, 'https://http2.mlstatic.com/D_NQ_NP_739913-MLU70831860751_082023-O.webp'),
(6, 'https://http2.mlstatic.com/D_NQ_NP_642988-MLU70799770458_082023-O.webp'),
(7, 'https://http2.mlstatic.com/D_NQ_NP_746967-MLA40861843237_022020-O.webp'),
(8, 'https://http2.mlstatic.com/D_NQ_NP_684703-MLU70017625493_062023-O.webp'),
(9, 'https://m.media-amazon.com/images/I/513cWoXOk2L._AC_SX679_.jpg'),
(10, 'https://m.media-amazon.com/images/I/513cWoXOk2L._AC_SX679_.jpg'),
(11, 'https://http2.mlstatic.com/D_NQ_NP_939303-MLA46663357848_072021-O.webp'),
(12, 'https://assets.nintendo.com/image/upload/ar_16:9,c_lpad,w_1240/b_white/f_auto/q_auto/ncom/software/switch/70010000016048/2602862595e8a25ffff70d64fc9fe3d828a3a47d02d9f9e29b3e94f40ac39c56'),
(13, 'https://http2.mlstatic.com/D_NQ_NP_710036-MLA44626667159_012021-O.webp'),
(14, 'https://http2.mlstatic.com/D_NQ_NP_821798-MLA44626667161_012021-O.webp'),
(15, 'https://http2.mlstatic.com/D_NQ_NP_941861-MLA52109298542_102022-O.webp'),
(16, 'https://http2.mlstatic.com/D_NQ_NP_649294-MLM52485830258_112022-O.webp'),
(17, 'https://m.media-amazon.com/images/I/617-6ZUjhHL._SL1200_.jpg'),
(18, 'https://m.media-amazon.com/images/I/617-6ZUjhHL._SL1200_.jpg'),
(19, 'https://http2.mlstatic.com/D_NQ_NP_741761-CBT48527722028_122021-O.webp'),
(20, 'https://http2.mlstatic.com/D_NQ_NP_802596-CBT48527722029_122021-O.webp'),
(21, 'https://http2.mlstatic.com/D_NQ_NP_850327-MLA54712581525_032023-O.webp'),
(22, 'https://http2.mlstatic.com/D_NQ_NP_743598-MLU71036962581_082023-O.webp'),
(23, 'https://http2.mlstatic.com/D_NQ_NP_703636-MLU69138837380_042023-O.webp'),
(24, 'https://http2.mlstatic.com/D_NQ_NP_971124-MLM69296048062_052023-O.webp'),
(25, 'https://http2.mlstatic.com/D_NQ_NP_2X_965579-MLA46237942573_062021-F.webp'),
(26, 'https://http2.mlstatic.com/D_NQ_NP_665357-MLA46237938567_062021-O.webp');

-- --------------------------------------------------------

--
-- Table structure for table `img_pub`
--

CREATE TABLE `img_pub` (
  `id_img` int(11) NOT NULL,
  `img_pub` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img_pub_ptrq`
--

CREATE TABLE `img_pub_ptrq` (
  `id_img_pub` int(11) NOT NULL,
  `id_img` int(11) DEFAULT NULL,
  `pub` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `orden`
--

CREATE TABLE `orden` (
  `id_orden` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orden`
--

INSERT INTO `orden` (`id_orden`, `fecha`) VALUES
(1, '2023-10-01 00:14:10'),
(2, '2023-09-30 00:14:10'),
(3, '2023-09-29 00:14:44'),
(4, '2023-09-28 00:14:44'),
(5, '2023-09-27 00:14:44'),
(6, '2023-09-26 00:14:44'),
(7, '2023-09-25 00:14:44'),
(8, '2023-09-24 00:14:44'),
(9, '2023-09-23 00:14:44'),
(10, '2023-09-22 00:14:44'),
(11, '2023-09-21 00:14:44'),
(12, '2023-09-20 00:14:44'),
(13, '2023-09-19 00:14:44');

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
(69, 'juanii', 'castañeda', '¡Hola, Estoy usando GeekHaven!', 'jkhsjkhsjs@gmail.com'),
(71, 'Juan Miguel', 'Castañeda Ontiveros', '¡Hola, Estoy usando GeekHaven!', 'miguel@gmail.com');

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
  `precio_base` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nom_producto`, `precio`, `descripcion`, `existencia`, `estado`, `id_cat`, `tipo_id`, `universo_id`, `fecha`, `precio_base`) VALUES
(1, 'Amiibo Mario Classic Color 30th Anniversary', 1085.91, '30th Super Mario Bros. Series', 1, 'normal', 3, 5, 8, '2023-10-17 01:36:11', 1000.91),
(2, 'Comic Dc Comics Deluxe: Batman The Dark Knight Master Race', 371.35, 'DC Comics Deluxe: Batman The Dark Knight Master RaceEscritores: Frank Miller y Brian AzzarelloIlustradores: Andy Kubert, Klaus Janson, John Romita Jr., Eduardo Risso y Frank Miller Páginas: 392 Han pasado tres años desde que Batman venció a Lex Luthor y salvó al mundo de la tiranía. Tres años desde la última vez que alguien haya visto al guardián de Gotham City. Wonder Woman, Reina de las Amazonas… Hal Jordan, Green Lantern… Superman, el Hombre de Acero… todos los aliados del Caballero Oscuro se', 4, 'normal', 4, 7, 10, '2023-10-17 01:36:26', 370),
(3, 'Devir Juego De Mesa Smash Up Marvel', 999.99, '¿Qué mejor plan para una tarde de lluvia que un juego de mesa? Con el Smash Up: Marvel Base vas a crear divertidos recuerdos y pasarás momentos inolvidables junto a tus amigos y amigas. Con este pasatiempo entretenido las risas están aseguradas.', 4, 'oferta', 7, 8, 9, '2023-10-17 01:36:38', 800),
(4, 'Dragon Ball Z: Kakarot Dragon Ball Z Standard Edition Bandai Namco Xbox One Físico', 1000.99, 'Con este juego de Dragon Ball vas a disfrutar de horas de diversión y de nuevos desafíos que te permitirán mejorar como gamer.\r\nInteractúa con otros jugadores\r\nPodrás disfrutar de una experiencia inigualable, ya que te permite jugar con tus amistades y compartir momentos inolvidables.\r\nDiversión sin fronteras\r\nPodrás compartir cada juego con personas de todo el mundo, ya que es posible conectarse de manera online.', 12, 'normal', 2, 6, 2, '2023-10-17 01:36:45', 900),
(5, 'Game of Thrones Collegiate Targaryen - Sudadera raglán para jóvenes con Puntada de Funda Lana para M', 589.87, 'Warner Brothers Game of Thrones Collegiate Targaryen Junior - Sudadera raglán con punto de chamarra', 2, 'normal', 9, 9, 11, '2023-10-17 01:36:53', 500),
(6, 'Naruto Shippuden: Ultimate Ninja Storm 4 Road to Boruto Naruto Shippuden: Ultimate Ninja Storm Stand', 1089.59, 'Con este juego de Naruto vas a disfrutar de horas de diversión y de nuevos desafíos que te permitirán mejorar como gamer.\r\nInteractúa con otros jugadores\r\nPodrás disfrutar de una experiencia inigualable, ya que te permite jugar con tus amistades y compartir momentos inolvidables.Diversión sin fronteras\r\nPodrás compartir cada juego con personas de todo el mundo, ya que es posible conectarse de manera online.', 10, 'normal', 3, 6, 5, '2023-10-17 01:37:06', 1020),
(7, 'One Piece: Pirate Warriors 4 One Piece: Pirate Warriors Standard Edition Bandai Namco PS4 Físico', 987.99, 'Con este juego de One Piece vas a disfrutar de horas de diversión y de nuevos desafíos que te permitirán mejorar como gamer.\r\nInteractúa con otros jugadores\r\nPodrás disfrutar de una experiencia inigualable, ya que te permite jugar con tus amistades y compartir momentos inolvidables.\r\nDiversión sin fronteras\r\nPodrás compartir cada juego con personas de todo el mundo, ya que es posible conectarse de manera online.', 7, 'oferta', 1, 6, 4, '2023-10-17 01:37:15', 900),
(8, 'Pokémon Scarlet Standard Edition Nintendo Switch Físico', 859.88, 'Con este juego de Pokémon vas a disfrutar de horas de diversión y de nuevos desafíos que te permitirán mejorar como gamer.\r\nInteractúa con otros jugadores\r\nPodrás disfrutar de una experiencia inigualable, ya que te permite jugar con tus amistades y compartir momentos inolvidables.\r\nDiversión sin fronteras\r\nPodrás compartir cada juego con personas de todo el mundo, ya que es posible conectarse de manera online.', 3, 'oferta', 2, 6, 1, '2023-10-17 01:37:21', 850),
(9, 'Harry Potter Box Set: Books 1-7;Harry Potter', 3025.89, 'Esta caja incluye los siete fenomenales libros de Harry Potter de tapa dura de la autora de bestsellers J. K. Rowling . Los libros están alojados en una caja de trompa de colección con asas resistentes y bloqueo de privacidad . Incluye estampas decorativas en cada uno de los paquetes.', 1, 'normal', 4, 7, 12, '2023-10-17 01:37:30', 3010),
(10, 'Sudadera Con Capucha Y Diseño De My Hero Academia', 418, 'Sudadera de tela delgada de My Hero Academia de color azul', 9, 'oferta', 9, 9, 3, '2023-10-17 01:37:36', 415),
(11, 'The Legend of Zelda: Tears of the Kingdom Standard Edition Nintendo Switch Físico', 1013, 'Explora la vasta superficie y los cielos de Hyrule.Una épica aventura a través de la superficie y los cielos de Hyrule te espera en The Legend of Zelda™: Tears of the Kingdom.En esta secuela del juego The Legend of Zelda: Breath of the Wild, decidirás tu propio camino a través de los extensos paisajes de Hyrule y las islas que flotan en los vastos cielos. ¿Podrás aprovechar el poder de las nuevas habilidades de Link para luchar contra las malévolas fuerzas que amenazan al reino?\r\n', 20, 'normal', 3, 6, 7, '2023-10-17 01:37:45', 1000),
(12, 'Yu-gi-oh!, De Kazuki Takahashi. Editorial Panini, Tapa Blanda En Español, 2022', 269.99, NULL, 2, 'oferta', 5, 7, 6, '2023-10-17 01:37:53', 265),
(13, 'Control joystick inalámbrico Sony PlayStation DualSense CFI-ZCT1 cosmic red', 1121.99, 'Control preciso\r\nEste mando combina funciones revolucionarias mientras conserva precisión, comodidad y exactitud en cada movimiento. Gracias a su ergonomía especialmente pensada para la posición de tu mano, puedes pasar horas jugando con total confort.\r\n\r\nMayor comodidad y realismo\r\nTe permite jugar sin necesidad de que haya cables de por medio. Está pensado no solamente para controlar mejor tus videojuegos, sino también para aumentar su realismo y experiencia.\r\n\r\nActiva el Bluetooth\r\nCuenta con', 12, 'normal', 1, 1, 13, '2023-10-17 01:38:00', 1100);

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
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `universo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `universo`
--

INSERT INTO `universo` (`id_universo`, `universo`) VALUES
(1, 'Pokemon'),
(2, 'Dragon Ball'),
(3, 'MY HERO ACADEMY'),
(4, 'ONE-PIECE'),
(5, 'NARUTO'),
(6, 'YU-GI-OH'),
(7, 'THE LEGEND OF ZELDA'),
(8, 'SUPER MARIO'),
(9, 'MARVEL'),
(10, 'DC'),
(11, 'Game of Thrones'),
(12, 'Harry Potter'),
(13, 'Sin universo');

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
(40, '12345', '$2y$10$n7JKTVKLGK9qbBCCuf7B8.FEtX65z8vjp3OZa1w9Vl0Q.CCo.3AxS', 69, NULL, NULL, 1, NULL, NULL),
(41, '9999999999', '$2y$10$Sy1SuICzGUUO6bdqQDFunuaIp4lZRz2jlFWFzGPronhm1CdznWcYm', 71, NULL, NULL, 0, NULL, 'Screenshot_20231014_164221_com.huawei.calculator.jpg');

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
  ADD KEY `conversaciones_ibfk_2` (`id_usuario2`);

--
-- Indexes for table `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id_do`),
  ADD KEY `prd_do` (`id_producto`),
  ADD KEY `do_o` (`id_orden`),
  ADD KEY `usr_do` (`id_usuario`);

--
-- Indexes for table `img_prducto_prd`
--
ALTER TABLE `img_prducto_prd`
  ADD PRIMARY KEY (`id_img_prd`),
  ADD KEY `img_prd` (`id_img`),
  ADD KEY `id_prd` (`id_productos`);

--
-- Indexes for table `img_producto`
--
ALTER TABLE `img_producto`
  ADD PRIMARY KEY (`id_img`);

--
-- Indexes for table `img_pub`
--
ALTER TABLE `img_pub`
  ADD PRIMARY KEY (`id_img`);

--
-- Indexes for table `img_pub_ptrq`
--
ALTER TABLE `img_pub_ptrq`
  ADD PRIMARY KEY (`id_img_pub`),
  ADD KEY `img_pub_ptr` (`id_img`),
  ADD KEY `pub_img_ptr` (`pub`);

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
  ADD PRIMARY KEY (`id_orden`);

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
  ADD KEY `usr_pub` (`id_usuario`);

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
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `conversaciones`
--
ALTER TABLE `conversaciones`
  MODIFY `id_conversacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id_do` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `img_prducto_prd`
--
ALTER TABLE `img_prducto_prd`
  MODIFY `id_img_prd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `img_producto`
--
ALTER TABLE `img_producto`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `img_pub`
--
ALTER TABLE `img_pub`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `img_pub_ptrq`
--
ALTER TABLE `img_pub_ptrq`
  MODIFY `id_img_pub` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `orden`
--
ALTER TABLE `orden`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pub_trq`
--
ALTER TABLE `pub_trq`
  MODIFY `id_pub` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `universo`
--
ALTER TABLE `universo`
  MODIFY `id_universo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversaciones`
--
ALTER TABLE `conversaciones`
  ADD CONSTRAINT `conversaciones_ibfk_1` FOREIGN KEY (`id_usuario1`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `conversaciones_ibfk_2` FOREIGN KEY (`id_usuario2`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `do_o` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`id_orden`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prd_do` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usr_do` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `img_prducto_prd`
--
ALTER TABLE `img_prducto_prd`
  ADD CONSTRAINT `id_prd` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `img_prd` FOREIGN KEY (`id_img`) REFERENCES `img_producto` (`id_img`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `img_pub_ptrq`
--
ALTER TABLE `img_pub_ptrq`
  ADD CONSTRAINT `img_pub_ptr` FOREIGN KEY (`id_img`) REFERENCES `img_pub` (`id_img`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pub_img_ptr` FOREIGN KEY (`pub`) REFERENCES `pub_trq` (`id_pub`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_3` FOREIGN KEY (`id_conversacion`) REFERENCES `conversaciones` (`id_conversacion`),
  ADD CONSTRAINT `mensajes_ibfk_4` FOREIGN KEY (`id_conversacion`) REFERENCES `conversaciones` (`id_conversacion`);

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
