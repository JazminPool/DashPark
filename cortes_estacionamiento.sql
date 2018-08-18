-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-08-2018 a las 19:10:50
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
(1, 'Gloria', 'Aguilar', 'glagular', '123'),
(2, 'Jazmin', 'Pool', 'japool', '456');

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
  `boletos_totales` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `boletos_tipos`
--

INSERT INTO `boletos_tipos` (`idboletos_tipos`, `boletos_cobrados`, `boletos_tolerancia`, `boletos_guada`, `boletos_cortesia`, `boletos_perdidos`, `boletos_totales`) VALUES
(8760, 26, 4, 0, 0, 0, 30),
(124578, 979, 979, 799, 979, 979, 4715),
(769999, 3, 2, 6, 5, 5, 21),
(770520, 10, 15, 0, 36, 0, 61),
(777777, 777, 777, 777, 777, 777, 3885),
(778449, 849, 498, 498, 498, 494, 2837),
(784555, 798, 651, 156, 654, 541, 2800),
(789789, 897, 879, 987, 899, 897, 4559),
(845784, 515, 545, 565, 546, 651, 2822);

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
(8760, 20, 0, 0),
(124578, 878, 0, 0),
(769999, 15, 0, 0),
(770520, 11, 0, 0),
(777777, 777, 0, 0),
(778449, 498, 0, 0),
(784555, 191, 0, 0),
(789789, 987, 0, 0),
(845784, 54, 0, 0);

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
(8760, 3065, 0, 0),
(769999, 25659999, 0, 0),
(770520, 96325458, 0, 0),
(777777, 77777777, 0, 0),
(778449, 98449849, 0, 0),
(789789, 78987987, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empledos_cajeros`
--

CREATE TABLE `empledos_cajeros` (
  `idempledos_cajeros` int(11) NOT NULL,
  `Nombre_cajero` varchar(45) NOT NULL,
  `apellido_matCaje` varchar(45) NOT NULL,
  `apellido_patCaje` varchar(45) NOT NULL,
  `usuario_caje` varchar(45) NOT NULL,
  `password_caje` varchar(45) NOT NULL,
  `turnos_caje_idturnos_caje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empledos_cajeros`
--

INSERT INTO `empledos_cajeros` (`idempledos_cajeros`, `Nombre_cajero`, `apellido_matCaje`, `apellido_patCaje`, `usuario_caje`, `password_caje`, `turnos_caje_idturnos_caje`) VALUES
(1, 'Juan', 'Lopez', 'Ramirez', 'juan123', '1234', 1),
(2, 'Maria', 'Sanchez', 'Rosado', 'mariro', '4321', 2),
(3, 'Pedro', 'Fernandez', 'Osalde', 'pedro321', '963', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folios_rojos`
--

CREATE TABLE `folios_rojos` (
  `idfolios_rojos` int(11) NOT NULL,
  `folio_entrada` int(6) NOT NULL,
  `folio_salida` int(6) DEFAULT NULL,
  `diferencia_folio` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `folios_rojos`
--

INSERT INTO `folios_rojos` (`idfolios_rojos`, `folio_entrada`, `folio_salida`, `diferencia_folio`) VALUES
(8760, 8760, 0, 0),
(769999, 769999, 0, 0),
(770520, 770520, 0, 0),
(777777, 777777, 0, 0),
(778449, 778449, 0, 0),
(789789, 789789, 0, 0);

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
(8760, 23265, 0, 0),
(769999, 23265, 0, 0),
(770520, 23265, 0, 0),
(777777, 23265, 0, 0),
(778449, 23265, 0, 0),
(789789, 23265, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes_cortes`
--

CREATE TABLE `reportes_cortes` (
  `idreportes_cortes` int(11) NOT NULL,
  `fecha_corte` date NOT NULL,
  `idcajeros` int(11) NOT NULL,
  `idrojos` int(11) NOT NULL,
  `id_contador` int(11) NOT NULL,
  `emisor_idfolio` int(11) NOT NULL,
  `coches_idcoches` int(11) NOT NULL,
  `boletos_idboletos` int(11) NOT NULL,
  `tarjetas_idtarjetas` int(11) NOT NULL,
  `total_salidas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reportes_cortes`
--

INSERT INTO `reportes_cortes` (`idreportes_cortes`, `fecha_corte`, `idcajeros`, `idrojos`, `id_contador`, `emisor_idfolio`, `coches_idcoches`, `boletos_idboletos`, `tarjetas_idtarjetas`, `total_salidas`) VALUES
(8760, '2018-08-18', 1, 8760, 8760, 8760, 8760, 8760, 8760, 34),
(769999, '2018-08-18', 2, 769999, 769999, 769999, 769999, 769999, 769999, 41),
(770520, '2018-08-18', 3, 770520, 770520, 770520, 770520, 770520, 770520, 93);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_cinchos`
--

CREATE TABLE `tabla_cinchos` (
  `idtablas_cinchos` int(11) NOT NULL,
  `numero_inicio` int(8) NOT NULL,
  `numero_fin` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(8760, 5, 4),
(769999, 15, 20),
(770520, 23, 32),
(777777, 777, 777),
(778449, 849, 984),
(789789, 789, 899);

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
-- Indices de la tabla `boletos_tipos`
--
ALTER TABLE `boletos_tipos`
  ADD PRIMARY KEY (`idboletos_tipos`);

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
-- Indices de la tabla `empledos_cajeros`
--
ALTER TABLE `empledos_cajeros`
  ADD PRIMARY KEY (`idempledos_cajeros`,`turnos_caje_idturnos_caje`),
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
  ADD PRIMARY KEY (`idreportes_cortes`,`idcajeros`,`idrojos`,`id_contador`,`coches_idcoches`,`boletos_idboletos`,`tarjetas_idtarjetas`),
  ADD KEY `fk_reportes_cortes_empledos_cajeros_idx` (`idcajeros`),
  ADD KEY `fk_reportes_cortes_folios_rojos1_idx` (`idrojos`),
  ADD KEY `fk_reportes_cortes_contador_est1_idx` (`id_contador`),
  ADD KEY `fk_reportes_cortes_folio_emisor1_idx` (`emisor_idfolio`),
  ADD KEY `fk_reportes_cortes_coches_dentro1_idx` (`coches_idcoches`),
  ADD KEY `fk_reportes_cortes_boletos_tipos1_idx` (`boletos_idboletos`),
  ADD KEY `fk_reportes_cortes_tarjetas_control1_idx` (`tarjetas_idtarjetas`);

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
  MODIFY `idadministrados_caje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `boletos_tipos`
--
ALTER TABLE `boletos_tipos`
  MODIFY `idboletos_tipos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=845785;
--
-- AUTO_INCREMENT de la tabla `coches_dentro`
--
ALTER TABLE `coches_dentro`
  MODIFY `idcoches_dentro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=845785;
--
-- AUTO_INCREMENT de la tabla `contador_est`
--
ALTER TABLE `contador_est`
  MODIFY `idcontador_est` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=845785;
--
-- AUTO_INCREMENT de la tabla `empledos_cajeros`
--
ALTER TABLE `empledos_cajeros`
  MODIFY `idempledos_cajeros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `folios_rojos`
--
ALTER TABLE `folios_rojos`
  MODIFY `idfolios_rojos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=845785;
--
-- AUTO_INCREMENT de la tabla `folio_emisor`
--
ALTER TABLE `folio_emisor`
  MODIFY `idfolio_emisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=845785;
--
-- AUTO_INCREMENT de la tabla `reportes_cortes`
--
ALTER TABLE `reportes_cortes`
  MODIFY `idreportes_cortes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=845785;
--
-- AUTO_INCREMENT de la tabla `tabla_cinchos`
--
ALTER TABLE `tabla_cinchos`
  MODIFY `idtablas_cinchos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tarjetas_control`
--
ALTER TABLE `tarjetas_control`
  MODIFY `idtarjetas_control` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=845785;
--
-- AUTO_INCREMENT de la tabla `turnos_caje`
--
ALTER TABLE `turnos_caje`
  MODIFY `idturnos_caje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

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
  ADD CONSTRAINT `fk_reportes_cortes_empledos_cajeros` FOREIGN KEY (`idcajeros`) REFERENCES `empledos_cajeros` (`idempledos_cajeros`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reportes_cortes_folio_emisor1` FOREIGN KEY (`emisor_idfolio`) REFERENCES `folio_emisor` (`idfolio_emisor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reportes_cortes_folios_rojos1` FOREIGN KEY (`idrojos`) REFERENCES `folios_rojos` (`idfolios_rojos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reportes_cortes_tarjetas_control1` FOREIGN KEY (`tarjetas_idtarjetas`) REFERENCES `tarjetas_control` (`idtarjetas_control`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
