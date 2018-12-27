-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-12-2018 a las 19:54:11
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
-- Estructura de tabla para la tabla `empledos_cajeros`
--

CREATE TABLE `empledos_cajeros` (
  `idempledos_cajeros` int(11) NOT NULL,
  `Nombre_cajero` varchar(45) NOT NULL,
  `apellido_patCaje` varchar(45) NOT NULL,
  `usuario_caje` varchar(45) NOT NULL,
  `password_caje` varchar(45) NOT NULL,
  `estatus_cajero` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empledos_cajeros`
--

INSERT INTO `empledos_cajeros` (`idempledos_cajeros`, `Nombre_cajero`, `apellido_patCaje`, `usuario_caje`, `password_caje`, `estatus_cajero`) VALUES
(1, 'Juanito', 'Ramirez', 'juan123', '1234', 1),
(8, 'Elba', 'Cin ito', 'elba', '123', 0),
(12, 'Dolores', 'Deb Arriga', 'doli', '123', 1),
(14, 'Hilario', 'Sanchez', 'hilario.sanchez', '1234', 1),
(15, 'Diana', 'Chavez', 'diana.chavez', '123', 0),
(16, 'Danitza', 'Rojas', 'danitza.rojas', '123', 1),
(17, 'Javier', 'Sabella', 'javier.sabella', '1217', 1),
(18, 'Isaac', 'Romero', 'isaac.romero', '123', 0),
(19, 'Cajero', 'Cajero', 'cajero.cajero', '123', 1),
(20, 'Francisco', 'Horta', 'franh', '123', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empledos_cajeros`
--
ALTER TABLE `empledos_cajeros`
  ADD PRIMARY KEY (`idempledos_cajeros`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empledos_cajeros`
--
ALTER TABLE `empledos_cajeros`
  MODIFY `idempledos_cajeros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
