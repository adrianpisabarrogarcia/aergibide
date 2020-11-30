-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-11-2020 a las 09:11:10
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
-- Estructura de tabla para la tabla `Categoria`
--

CREATE TABLE `Categoria` (
  `ID` int(11) NOT NULL,
  `Descripcion` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Categoria`
--

INSERT INTO `Categoria` (`ID`, `Descripcion`) VALUES
(1, 'Motor'),
(2, 'Alas'),
(3, 'Cabinas'),
(4, 'Carrocería'),
(5, 'Almacenaje'),
(6, 'Timón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Favoritos`
--

CREATE TABLE `Favoritos` (
  `ID` int(11) NOT NULL,
  `ID_Pregunta` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Likes`
--

CREATE TABLE `Likes` (
  `ID` int(11) NOT NULL,
  `ID_Pregunta` int(11) DEFAULT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Respuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pregunta`
--

CREATE TABLE `Pregunta` (
  `ID` int(11) NOT NULL,
  `Titulo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Descripcion` varchar(60000) CHARACTER SET latin1 NOT NULL,
  `ID_Usuario` int(5) NOT NULL,
  `Fecha` date NOT NULL,
  `ID_Categoria` int(11) NOT NULL,
  `Archivo` varchar(300) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
  `Archivos` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `ID` int(5) NOT NULL,
  `Nombre` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Usuario` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Password` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Imagen` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Favoritos`
--
ALTER TABLE `Favoritos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Pregunta` (`ID_Pregunta`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `Likes`
--
ALTER TABLE `Likes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Pregunta` (`ID_Pregunta`),
  ADD KEY `ID_Usuario` (`ID_Usuario`),
  ADD KEY `ID_Respuesta` (`ID_Respuesta`);

--
-- Indices de la tabla `Pregunta`
--
ALTER TABLE `Pregunta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Usuario` (`ID_Usuario`),
  ADD KEY `ID_Categoria` (`ID_Categoria`);

--
-- Indices de la tabla `Respuesta`
--
ALTER TABLE `Respuesta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Pregunta` (`ID_Pregunta`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `Favoritos`
--
ALTER TABLE `Favoritos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `Likes`
--
ALTER TABLE `Likes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `Pregunta`
--
ALTER TABLE `Pregunta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `Respuesta`
--
ALTER TABLE `Respuesta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Favoritos`
--
ALTER TABLE `Favoritos`
  ADD CONSTRAINT `Favoritos_ibfk_1` FOREIGN KEY (`ID_Pregunta`) REFERENCES `Pregunta` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Favoritos_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `Usuario` (`ID`);

--
-- Filtros para la tabla `Likes`
--
ALTER TABLE `Likes`
  ADD CONSTRAINT `Likes_ibfk_1` FOREIGN KEY (`ID_Pregunta`) REFERENCES `Pregunta` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Likes_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `Usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Likes_ibfk_3` FOREIGN KEY (`ID_Respuesta`) REFERENCES `Respuesta` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Pregunta`
--
ALTER TABLE `Pregunta`
  ADD CONSTRAINT `Pregunta_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `Usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Pregunta_ibfk_2` FOREIGN KEY (`ID_Categoria`) REFERENCES `Categoria` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Respuesta`
--
ALTER TABLE `Respuesta`
  ADD CONSTRAINT `Respuesta_ibfk_1` FOREIGN KEY (`ID_Pregunta`) REFERENCES `Pregunta` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Respuesta_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `Usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
