-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2018 a las 17:40:02
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cortes_estacionamiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrados_caje`
--

CREATE TABLE `administrados_caje` (
  `idadministrados_caje` int(11) NOT NULL,
  `nombre_admin` varchar(45) NOT NULL,
  `apellido_pat_admin` varchar(45) NOT NULL,
  `usuario_admin` varchar(45) NOT NULL,
  `password_admin` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrados_caje`
--

INSERT INTO `administrados_caje` (`idadministrados_caje`, `nombre_admin`, `apellido_pat_admin`, `usuario_admin`, `password_admin`) VALUES
(2, 'Jazmin', 'Pool', 'japool', '456'),
(5, 'Gloria', 'xczx', 'Lagloria', '123'),
(7, 'Juana', '', '4543', '4534534'),
(8, 'Elba', '', 'elba', '123'),
(9, 'Esteban', 'Qui to', 'est', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletos_sobrantes`
--

CREATE TABLE `boletos_sobrantes` (
  `idboletos_sobrantes` int(11) NOT NULL,
  `inicio_sobrantes` int(3) NOT NULL,
  `fin_sobrantes` int(3) NOT NULL,
  `boletos_sobra` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletos_tipos`
--

CREATE TABLE `boletos_tipos` (
  `idboletos_tipos` int(11) NOT NULL,
  `boletos_cobrados` int(3) NOT NULL,
  `boletos_tolerancia` int(3) NOT NULL,
  `boletos_guada` int(3) NOT NULL,
  `boletos_cortesia` int(3) NOT NULL,
  `boletos_perdidos` int(3) NOT NULL,
  `boletos_totales` int(4) NOT NULL,
  `boletos_fisicos` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `boletos_tipos`
--

INSERT INTO `boletos_tipos` (`idboletos_tipos`, `boletos_cobrados`, `boletos_tolerancia`, `boletos_guada`, `boletos_cortesia`, `boletos_perdidos`, `boletos_totales`, `boletos_fisicos`) VALUES
(6047, 16, 0, 0, 5, 0, 21, 176),
(6054, 37, 27, 0, 2, 0, 66, 176),
(6148, 66, 21, 3, 0, 0, 90, 176),
(7920, 64, 0, 0, 1, 2, 67, 5),
(7958, 48, 33, 0, 2, 1, 84, 5),
(8090, 132, 45, 3, 2, 1, 183, 5),
(8289, 105, 13, 0, 1, 0, 119, 118),
(8349, 34, 34, 0, 0, 0, 68, 68),
(8442, 92, 28, 2, 0, 0, 122, 120),
(8760, 27, 4, 0, 0, 0, 30, 111),
(111111, 55, 353, 3, 3, 67, 481, NULL),
(111112, 564, 565, 66, 654, 65, 1914, NULL),
(217283, 85, 5, 0, 1, 0, 91, 175),
(217355, 47, 15, 0, 0, 0, 62, 175),
(217425, 27, 12, 0, 0, 0, 39, 175),
(219292, 9, 3, 0, 0, 0, 12, 208),
(219296, 29, 33, 1, 3, 0, 66, 208),
(219390, 72, 30, 0, 1, 0, 103, 208),
(222222, 4, 4, 24, 45, 656, 733, NULL),
(323232, 454, 545, 4, 454, 454, 1911, NULL),
(333333, 333, 3, 3, 3, 3, 345, NULL),
(444444, 444, 444, 444, 444, 444, 2220, NULL),
(543534, 453, 453, 453, 454, 545, 2358, NULL),
(666666, 666, 6, 6, 6, 66, 750, NULL),
(747474, 555, 555, 555, 555, 555, 2775, NULL),
(769999, 3, 2, 6, 5, 5, 21, 222),
(770520, 10, 15, 0, 36, 0, 61, 333),
(777777, 67, 87, 67, 67, 76, 364, NULL),
(798988, 666, 666, 666, 666, 666, 3330, NULL),
(888888, 888, 88, 88, 8, 8, 1080, NULL),
(898989, 12, 32, 95, 15, 8, 162, NULL),
(989898, 898, 989, 988, 898, 898, 4671, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambio_boletos`
--

CREATE TABLE `cambio_boletos` (
  `cinchos_idtabla` int(11) NOT NULL,
  `sobrantes_idboletos` int(11) NOT NULL,
  `cajeros_idempledos` int(11) NOT NULL,
  `idcambio_boletos` int(11) NOT NULL,
  `fecha_cambio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches_dentro`
--

CREATE TABLE `coches_dentro` (
  `idcoches_dentro` int(11) NOT NULL,
  `coches_incio` int(3) NOT NULL,
  `coches_salida` int(3) DEFAULT NULL,
  `diferencia_coches` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `coches_dentro`
--

INSERT INTO `coches_dentro` (`idcoches_dentro`, `coches_incio`, `coches_salida`, `diferencia_coches`) VALUES
(6047, 584, 570, 354),
(6054, 6, 43, 570),
(6148, 37, 14, 43),
(7920, 48, 20, 0),
(7958, 0, 56, 20),
(8090, 66, 547337, 56),
(8289, 71, 11, 0),
(8349, 10, 35, 11),
(8442, 35, 28, 35),
(8760, 18, 761228, 0),
(111111, 55, 1415, 689749),
(111112, 554, -112972, -111840),
(217283, 8, -12, 0),
(217355, 8, 13, -12),
(217425, 14, 9, 13),
(219292, 17, 6, 0),
(219296, 6, 42, 6),
(219390, 41, 43, 42),
(219500, 44, NULL, NULL),
(222222, 6, -111840, -555921),
(323232, 875, 219265, 222),
(333333, 333, 555543, -112887),
(444444, 444, -112887, 87),
(543534, 435, 444441, 219265),
(666666, 666, 0, 0),
(747474, 555, NULL, NULL),
(769999, 15, 510, 761228),
(770520, 11, -770579, 510),
(777777, 7, -555921, 65),
(798988, 666, 0, 0),
(888888, 888, -889080, 555543),
(898989, 565, 0, 0),
(989898, 989, -993489, 444441);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador_est`
--

CREATE TABLE `contador_est` (
  `idcontador_est` int(11) NOT NULL,
  `inicio_contador` int(8) NOT NULL,
  `salida_contador` int(8) DEFAULT NULL,
  `diferencia_contador` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contador_est`
--

INSERT INTO `contador_est` (`idcontador_est`, `inicio_contador`, `salida_contador`, `diferencia_contador`) VALUES
(6047, 11401, 11422, 22),
(6054, 11423, 11526, 104),
(6148, 11527, 11631, 105),
(7920, 2094, 2276, 183),
(7958, 2277, 2288, 12),
(8090, 2289, 54, -2234),
(8289, 2499, 2619, 121),
(8349, 2620, 2706, 87),
(8442, 2707, 2835, 129),
(8760, 3065, 25659998, 25656934),
(111111, 54654645, 455, -54654189),
(111112, 456, -1, -456),
(217283, 12847, 12947, 101),
(217355, 12948, 13022, 75),
(217425, 13023, 13063, 41),
(219292, 15240, 15258, 19),
(219296, 15259, 15350, 92),
(219390, 15351, 15467, 117),
(219500, 15468, NULL, NULL),
(222222, 5, 455, 451),
(323232, 78749849, 45435453, -33314395),
(333333, 33333333, 88888887, 55555555),
(444444, 44444444, 33333332, -11111111),
(543534, 45435454, 98989898, 53554445),
(666666, 66666666, NULL, NULL),
(747474, 96431055, -1, -96431055),
(769999, 25659999, 96325457, 70665459),
(770520, 96325458, -1, -96325458),
(777777, 76, 4, -71),
(798988, 67766666, NULL, NULL),
(888888, 88888888, -1, -88888888),
(898989, 5445, NULL, NULL),
(989898, 98989899, -1, -98989899);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia_siguiente`
--

CREATE TABLE `dia_siguiente` (
  `iddia_siguiente` int(11) NOT NULL,
  `fecha_siguiente` date NOT NULL,
  `folio_emisor` int(7) DEFAULT NULL,
  `folios_rojos` int(6) DEFAULT NULL,
  `contador` int(8) DEFAULT NULL,
  `coches_dentro` int(3) DEFAULT NULL,
  `resumen_dia` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dia_siguiente`
--

INSERT INTO `dia_siguiente` (`iddia_siguiente`, `fecha_siguiente`, `folio_emisor`, `folios_rojos`, `contador`, `coches_dentro`, `resumen_dia`) VALUES
(6223, '2018-10-27', 0, 6223, 11632, 20, NULL),
(8558, '2018-09-13', 9277, 8558, 2836, 37, 'No estuvo mal'),
(217458, '2018-09-18', 1037992, 217458, 13064, 9, 'todo bien'),
(219500, '2018-10-02', 1040030, 219500, 15468, 44, NULL),
(555555, '2018-08-22', 555555, 555555, 55, 55, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empledos_cajeros`
--

CREATE TABLE `empledos_cajeros` (
  `idempledos_cajeros` int(11) NOT NULL,
  `Nombre_cajero` varchar(45) NOT NULL,
  `apellido_patCaje` varchar(45) NOT NULL,
  `usuario_caje` varchar(45) NOT NULL,
  `password_caje` varchar(45) NOT NULL,
  `turnos_caje_idturnos_caje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empledos_cajeros`
--

INSERT INTO `empledos_cajeros` (`idempledos_cajeros`, `Nombre_cajero`, `apellido_patCaje`, `usuario_caje`, `password_caje`, `turnos_caje_idturnos_caje`) VALUES
(1, 'Juanito', 'Ramirez', 'juan123', '1234', 1),
(8, 'Elba', 'Cin ito', 'elba', '123', 2),
(12, 'Dolores', 'Deb Arriga', 'doli', '123', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folios_rojos`
--

CREATE TABLE `folios_rojos` (
  `idfolios_rojos` int(11) NOT NULL,
  `folio_entrada` int(6) DEFAULT NULL,
  `folio_salida` int(6) DEFAULT NULL,
  `diferencia_folio` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `folios_rojos`
--

INSERT INTO `folios_rojos` (`idfolios_rojos`, `folio_entrada`, `folio_salida`, `diferencia_folio`) VALUES
(6047, 6047, 6053, 7),
(6054, 6054, 6147, 94),
(6148, 6148, 6222, 75),
(7920, 7920, 7957, 38),
(7958, 7958, 8089, 132),
(8090, 8090, 555554, 547465),
(8289, 8289, 8348, 60),
(8349, 8349, 8441, 93),
(8442, 8442, 8557, 116),
(8760, 8760, 769998, 761239),
(111111, 111111, 111111, 1),
(111112, 111112, -1, -111112),
(217283, 217283, 217354, 72),
(217355, 217355, 217424, 70),
(217425, 217425, 217457, 33),
(219292, 219292, 219295, 4),
(219296, 219296, 219389, 94),
(219390, 219390, 219499, 110),
(219500, 219500, NULL, NULL),
(222222, 222222, 111111, -111110),
(323232, 323232, 543533, 220302),
(333333, 333333, 888887, 555555),
(444444, 444444, 333332, -111111),
(543534, 543534, 989897, 446364),
(666666, 666666, NULL, NULL),
(747474, 747474, -1, -747474),
(769999, 769999, 770519, 521),
(770520, 770520, -1, -770520),
(777777, 777777, 222221, -555555),
(798988, 798988, NULL, NULL),
(888888, 888888, -1, -888888),
(898989, 898989, NULL, NULL),
(989898, 989898, -1, -989898);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folio_emisor`
--

CREATE TABLE `folio_emisor` (
  `idfolio_emisor` int(11) NOT NULL,
  `emisor_entrada` int(7) NOT NULL,
  `emisor_salida` int(7) DEFAULT NULL,
  `diferencia_emisor` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `folio_emisor`
--

INSERT INTO `folio_emisor` (`idfolio_emisor`, `emisor_entrada`, `emisor_salida`, `diferencia_emisor`) VALUES
(6047, 1036583, 1036589, 7),
(6054, 1036590, 1036683, 94),
(6148, 1036684, -1, -1036684),
(7920, 8655, 8690, 36),
(7958, 8691, 8822, 132),
(8090, 8823, 555554, 546732),
(8289, 9022, 9081, 60),
(8349, 9082, 9174, 93),
(8442, 9175, 9276, 9242),
(8760, 23265, 23279, 15),
(111111, 1111111, 1111111, 1),
(111112, 1111112, -1, -1111112),
(217283, 1037817, 1037888, 72),
(217355, 1037889, 1037958, 70),
(217425, 1037959, 1037991, 33),
(219292, 1039822, 1039825, 4),
(219296, 1039826, 1039919, 94),
(219390, 1039920, 1040029, 110),
(219500, 140030, NULL, NULL),
(222222, 2222222, 1111111, -1111110),
(323232, 2332323, 3534542, 1202220),
(333333, 3333333, 8888887, 5555555),
(444444, 4444444, 3333332, -1111111),
(543534, 3534543, 8898988, 5364446),
(666666, 6666666, NULL, NULL),
(747474, 7474747, -1, -7474747),
(769999, 23280, 23289, 10),
(770520, 23290, -1, -23290),
(777777, 6666666, 2222221, -4444444),
(798988, 8768899, NULL, NULL),
(888888, 8888888, -1, -8888888),
(898989, 0, NULL, NULL),
(989898, 8898989, -1, -8898989);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes_cortes`
--

CREATE TABLE `reportes_cortes` (
  `idreportes_cortes` int(11) NOT NULL,
  `idcajeros` int(11) NOT NULL,
  `fecha_corte` date NOT NULL,
  `idrojos` int(11) NOT NULL,
  `id_contador` int(11) NOT NULL,
  `emisor_idfolio` int(11) NOT NULL,
  `coches_idcoches` int(11) NOT NULL,
  `boletos_idboletos` int(11) NOT NULL,
  `tarjetas_idtarjetas` int(11) NOT NULL,
  `total_salidas` int(5) DEFAULT NULL,
  `observacion_cajero` varchar(200) DEFAULT NULL,
  `efectivo_tarjeta` int(6) DEFAULT NULL,
  `inicio_corte` time DEFAULT NULL,
  `fin_corte` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reportes_cortes`
--

INSERT INTO `reportes_cortes` (`idreportes_cortes`, `idcajeros`, `fecha_corte`, `idrojos`, `id_contador`, `emisor_idfolio`, `coches_idcoches`, `boletos_idboletos`, `tarjetas_idtarjetas`, `total_salidas`, `observacion_cajero`, `efectivo_tarjeta`, `inicio_corte`, `fin_corte`) VALUES
(6047, 1, '2018-10-27', 6047, 6047, 6047, 6047, 6047, 6047, 24, '', 15, '08:08:00', '06:06:00'),
(6054, 1, '2018-10-27', 6054, 6054, 6054, 6054, 6054, 6054, 100, '', 15, '08:08:00', '06:03:00'),
(6148, 1, '2018-10-27', 6148, 6148, 6148, 6148, 6148, 6148, 106, NULL, 15, '05:05:00', '06:06:00'),
(7920, 1, '2018-08-22', 7920, 7920, 7920, 7920, 7920, 7920, 74, 'Muy bien todo', 6, '01:08:08', NULL),
(7958, 8, '2018-08-22', 7958, 7958, 7958, 7958, 7958, 7958, 110, 'Todo tranquilo por aquí', 6, NULL, NULL),
(8289, 0, '2018-09-13', 8289, 8289, 8289, 8289, 8289, 8289, 121, 'todo bien', 22459, NULL, NULL),
(8349, 0, '2018-09-13', 8349, 8349, 8349, 8349, 8349, 8349, 87, 'Jenny tiene diferencia de 1 coche', 5576, NULL, NULL),
(8442, 0, '2018-09-13', 8442, 8442, 8442, 8442, 8442, 8442, 131, 'Tommy tiene diferencia de 2 Salidas', 1305, NULL, NULL),
(8760, 0, '2018-08-18', 8760, 8760, 8760, 8760, 8760, 8760, 34, 'sds', 999, NULL, NULL),
(111112, 12, '2018-10-13', 111112, 111112, 111112, 111112, 111112, 111112, 2479, NULL, 777, '23:04:00', '23:58:00'),
(217283, 0, '2018-09-18', 217283, 217283, 217283, 217283, 217283, 217283, 99, 'turno 1', 20, NULL, NULL),
(217355, 0, '2018-09-18', 217355, 217355, 217355, 217355, 217355, 217355, 76, 'comentarios', 30, NULL, NULL),
(217425, 0, '2018-09-18', 217425, 217425, 217425, 217425, 217425, 217425, 42, 'comentarios turno 3 ', 40, NULL, NULL),
(219292, 0, '2018-10-02', 219292, 219292, 219292, 219292, 219292, 219292, 19, 'pruebas 1 ', 343, NULL, NULL),
(219296, 0, '2018-10-02', 219296, 219296, 219296, 219296, 219296, 219296, 92, 'prueba de comentarios al turno numero 2', 427, NULL, NULL),
(219390, 0, '2018-10-02', 219390, 219390, 219390, 219390, 219390, 219390, 117, 'no hay comentarios para este turno, todo salio bien c:', 1567, NULL, NULL),
(222222, 8, '2018-10-13', 222222, 222222, 222222, 222222, 222222, 222222, 737, '', 777, '08:08:00', '08:09:00'),
(323232, 1, '2018-10-20', 323232, 323232, 323232, 323232, 323232, 323232, 2456, '', NULL, '04:58:00', '07:08:00'),
(543534, 1, '2018-10-20', 543534, 543534, 543534, 543534, 543534, 543534, 2811, NULL, NULL, '04:05:00', '05:45:00'),
(769999, 0, '2018-08-18', 769999, 769999, 769999, 769999, 769999, 769999, 41, 'fdf', 66, NULL, NULL),
(770520, 0, '2018-08-18', 770520, 770520, 770520, 770520, 770520, 770520, 93, 'dfdf', 688, NULL, NULL),
(777777, 1, '2018-10-13', 777777, 777777, 777777, 777777, 777777, 777777, 440, 'hola', 777, '23:55:00', '00:05:00'),
(898989, 1, '2018-10-19', 898989, 898989, 898989, 898989, 898989, 898989, 207, NULL, NULL, '02:06:00', '23:12:00'),
(989898, 1, '2018-10-20', 989898, 989898, 989898, 989898, 989898, 989898, 5569, NULL, NULL, '05:57:00', '07:08:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_cinchos`
--

CREATE TABLE `tabla_cinchos` (
  `idtablas_cinchos` int(11) NOT NULL,
  `numero_inicio` int(8) NOT NULL,
  `numero_fin` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tabla_cinchos`
--

INSERT INTO `tabla_cinchos` (`idtablas_cinchos`, `numero_inicio`, `numero_fin`) VALUES
(6546547, 555445, 545454);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas_control`
--

CREATE TABLE `tarjetas_control` (
  `idtarjetas_control` int(11) NOT NULL,
  `entrada_tarjeta` int(3) DEFAULT NULL,
  `salidas_tarjeta` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarjetas_control`
--

INSERT INTO `tarjetas_control` (`idtarjetas_control`, `entrada_tarjeta`, `salidas_tarjeta`) VALUES
(6047, 3, 3),
(6054, 43, 34),
(6148, 8, 16),
(7920, 8, 7),
(7958, 34, 26),
(8090, 18, 29),
(8289, 1, 2),
(8349, 19, 19),
(8442, 8, 9),
(8760, 5, 4),
(111111, 35, 55),
(111112, 65, 565),
(217283, 7, 8),
(217355, 11, 14),
(217425, 4, 3),
(219292, 4, 7),
(219296, 34, 26),
(219390, 9, 14),
(222222, 1, 4),
(323232, 544, 545),
(333333, 3, 3),
(444444, 444, 444),
(543534, 453, 453),
(666666, 666, 666),
(747474, 555, 555),
(769999, 15, 20),
(770520, 23, 32),
(777777, 67, 76),
(798988, 666, 666),
(888888, 888, 888),
(898989, 25, 45),
(989898, 989, 898);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos_caje`
--

CREATE TABLE `turnos_caje` (
  `idturnos_caje` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `turnos_caje`
--

INSERT INTO `turnos_caje` (`idturnos_caje`, `descripcion`) VALUES
(1, 'Turno 1'),
(2, 'Turno 2'),
(3, 'Turno 3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrados_caje`
--
ALTER TABLE `administrados_caje`
  ADD PRIMARY KEY (`idadministrados_caje`);

--
-- Indices de la tabla `boletos_sobrantes`
--
ALTER TABLE `boletos_sobrantes`
  ADD PRIMARY KEY (`idboletos_sobrantes`);

--
-- Indices de la tabla `boletos_tipos`
--
ALTER TABLE `boletos_tipos`
  ADD PRIMARY KEY (`idboletos_tipos`);

--
-- Indices de la tabla `cambio_boletos`
--
ALTER TABLE `cambio_boletos`
  ADD PRIMARY KEY (`cinchos_idtabla`,`sobrantes_idboletos`,`cajeros_idempledos`,`idcambio_boletos`),
  ADD KEY `fk_cambio_boletos_boletos_sobrantes1_idx` (`sobrantes_idboletos`),
  ADD KEY `fk_cambio_boletos_empledos_cajeros1_idx` (`cajeros_idempledos`);

--
-- Indices de la tabla `coches_dentro`
--
ALTER TABLE `coches_dentro`
  ADD PRIMARY KEY (`idcoches_dentro`);

--
-- Indices de la tabla `contador_est`
--
ALTER TABLE `contador_est`
  ADD PRIMARY KEY (`idcontador_est`);

--
-- Indices de la tabla `dia_siguiente`
--
ALTER TABLE `dia_siguiente`
  ADD PRIMARY KEY (`iddia_siguiente`);

--
-- Indices de la tabla `empledos_cajeros`
--
ALTER TABLE `empledos_cajeros`
  ADD PRIMARY KEY (`idempledos_cajeros`),
  ADD KEY `fk_empledos_cajeros_turnos_caje1_idx` (`turnos_caje_idturnos_caje`);

--
-- Indices de la tabla `folios_rojos`
--
ALTER TABLE `folios_rojos`
  ADD PRIMARY KEY (`idfolios_rojos`);

--
-- Indices de la tabla `folio_emisor`
--
ALTER TABLE `folio_emisor`
  ADD PRIMARY KEY (`idfolio_emisor`);

--
-- Indices de la tabla `reportes_cortes`
--
ALTER TABLE `reportes_cortes`
  ADD PRIMARY KEY (`idreportes_cortes`,`idrojos`,`id_contador`,`coches_idcoches`,`boletos_idboletos`,`tarjetas_idtarjetas`),
  ADD KEY `fk_reportes_cortes_folios_rojos1_idx` (`idrojos`),
  ADD KEY `fk_reportes_cortes_contador_est1_idx` (`id_contador`),
  ADD KEY `fk_reportes_cortes_folio_emisor1_idx` (`emisor_idfolio`),
  ADD KEY `fk_reportes_cortes_coches_dentro1_idx` (`coches_idcoches`),
  ADD KEY `fk_reportes_cortes_boletos_tipos1_idx` (`boletos_idboletos`),
  ADD KEY `fk_reportes_cortes_tarjetas_control1_idx` (`tarjetas_idtarjetas`),
  ADD KEY `fk_reportes_cortes_empledos_cajeros1_idx` (`idcajeros`);

--
-- Indices de la tabla `tabla_cinchos`
--
ALTER TABLE `tabla_cinchos`
  ADD PRIMARY KEY (`idtablas_cinchos`);

--
-- Indices de la tabla `tarjetas_control`
--
ALTER TABLE `tarjetas_control`
  ADD PRIMARY KEY (`idtarjetas_control`);

--
-- Indices de la tabla `turnos_caje`
--
ALTER TABLE `turnos_caje`
  ADD PRIMARY KEY (`idturnos_caje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrados_caje`
--
ALTER TABLE `administrados_caje`
  MODIFY `idadministrados_caje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `boletos_tipos`
--
ALTER TABLE `boletos_tipos`
  MODIFY `idboletos_tipos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=989899;
--
-- AUTO_INCREMENT de la tabla `coches_dentro`
--
ALTER TABLE `coches_dentro`
  MODIFY `idcoches_dentro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=989899;
--
-- AUTO_INCREMENT de la tabla `contador_est`
--
ALTER TABLE `contador_est`
  MODIFY `idcontador_est` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=989899;
--
-- AUTO_INCREMENT de la tabla `empledos_cajeros`
--
ALTER TABLE `empledos_cajeros`
  MODIFY `idempledos_cajeros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `folios_rojos`
--
ALTER TABLE `folios_rojos`
  MODIFY `idfolios_rojos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=989899;
--
-- AUTO_INCREMENT de la tabla `folio_emisor`
--
ALTER TABLE `folio_emisor`
  MODIFY `idfolio_emisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=989899;
--
-- AUTO_INCREMENT de la tabla `reportes_cortes`
--
ALTER TABLE `reportes_cortes`
  MODIFY `idreportes_cortes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=989899;
--
-- AUTO_INCREMENT de la tabla `tabla_cinchos`
--
ALTER TABLE `tabla_cinchos`
  MODIFY `idtablas_cinchos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6546548;
--
-- AUTO_INCREMENT de la tabla `tarjetas_control`
--
ALTER TABLE `tarjetas_control`
  MODIFY `idtarjetas_control` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=989899;
--
-- AUTO_INCREMENT de la tabla `turnos_caje`
--
ALTER TABLE `turnos_caje`
  MODIFY `idturnos_caje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cambio_boletos`
--
ALTER TABLE `cambio_boletos`
  ADD CONSTRAINT `fk_cambio_boletos_boletos_sobrantes1` FOREIGN KEY (`sobrantes_idboletos`) REFERENCES `boletos_sobrantes` (`idboletos_sobrantes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cambio_boletos_empledos_cajeros1` FOREIGN KEY (`cajeros_idempledos`) REFERENCES `empledos_cajeros` (`idempledos_cajeros`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cambio_boletos_tabla_cinchos1` FOREIGN KEY (`cinchos_idtabla`) REFERENCES `tabla_cinchos` (`idtablas_cinchos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empledos_cajeros`
--
ALTER TABLE `empledos_cajeros`
  ADD CONSTRAINT `fk_empledos_cajeros_turnos_caje1` FOREIGN KEY (`turnos_caje_idturnos_caje`) REFERENCES `turnos_caje` (`idturnos_caje`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reportes_cortes`
--
ALTER TABLE `reportes_cortes`
  ADD CONSTRAINT `fk_reportes_cortes_boletos_tipos1` FOREIGN KEY (`boletos_idboletos`) REFERENCES `boletos_tipos` (`idboletos_tipos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reportes_cortes_coches_dentro1` FOREIGN KEY (`coches_idcoches`) REFERENCES `coches_dentro` (`idcoches_dentro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reportes_cortes_contador_est1` FOREIGN KEY (`id_contador`) REFERENCES `contador_est` (`idcontador_est`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reportes_cortes_empledos_cajeros1` FOREIGN KEY (`idcajeros`) REFERENCES `empledos_cajeros` (`idempledos_cajeros`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reportes_cortes_folio_emisor1` FOREIGN KEY (`emisor_idfolio`) REFERENCES `folio_emisor` (`idfolio_emisor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reportes_cortes_folios_rojos1` FOREIGN KEY (`idrojos`) REFERENCES `folios_rojos` (`idfolios_rojos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reportes_cortes_tarjetas_control1` FOREIGN KEY (`tarjetas_idtarjetas`) REFERENCES `tarjetas_control` (`idtarjetas_control`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
