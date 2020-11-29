-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-11-2020 a las 12:26:38
-- Versión del servidor: 5.7.32-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reto2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Respuesta`
--

CREATE TABLE `Respuesta` (
  `ID` int(11) NOT NULL,
  `Descripcion` varchar(60000) NOT NULL,
  `Fecha` date NOT NULL,
  `ID_Pregunta` int(11) NOT NULL,
  `ID_Usuario` int(5) NOT NULL,
  `Archivos` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Respuesta`
--

INSERT INTO `Respuesta` (`ID`, `Descripcion`, `Fecha`, `ID_Pregunta`, `ID_Usuario`, `Archivos`) VALUES
(1, 'asdasd\r\nassd\r\na\r\ndssa\r\nd\r\nsad\r\n', '2020-11-04', 2, 11, NULL),
(2, 'esta es otra respuesta', '2020-11-03', 1, 12, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Respuesta`
--
ALTER TABLE `Respuesta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Pregunta` (`ID_Pregunta`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Respuesta`
--
ALTER TABLE `Respuesta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Respuesta`
--
ALTER TABLE `Respuesta`
  ADD CONSTRAINT `Respuesta_ibfk_1` FOREIGN KEY (`ID_Pregunta`) REFERENCES `Pregunta` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Respuesta_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `Usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
