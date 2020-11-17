-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-11-2020 a las 11:45:40
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
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `ID_Pregunta` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Respuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pregunta`
--

CREATE TABLE `Pregunta` (
  `ID` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Descripcion` varchar(60000) NOT NULL,
  `ID_Usuario` int(5) NOT NULL,
  `Fecha` date NOT NULL,
  `ID_Categoria` int(11) NOT NULL,
  `Archivo` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Pregunta`
--

INSERT INTO `Pregunta` (`ID`, `Titulo`, `Descripcion`, `ID_Usuario`, `Fecha`, `ID_Categoria`, `Archivo`) VALUES
(1, 'Prueba 1', 'En un lugar de la Mancha, de cuyo nombre no quiero acordarme, no ha mucho tiempo que vivía un hidalgo de los de lanza en astillero, adarga antigua, rocín flaco y galgo corredor. Una olla de algo más vaca que carnero, salpicón las más noches, duelos y quebrantos los sábados, lantejas los viernes, algún palomino de añadidura los domingos, consumían las tres cuartas partes de su hacienda. El resto della concluían sayo de velarte, calzas de velludo para las fiestas, con sus pantuflos de lo mesmo, y los días de entresemana se honraba con su vellorí de lo más fino. Tenía en su casa una ama que pasaba de los cuarenta, y una sobrina que no llegaba a los veinte, y un mozo de campo y plaza, que así ensillaba el rocín como tomaba la podadera. Frisaba la edad de nuestro hidalgo con los cincuenta años; era de complexión recia, seco de carnes, enjuto de rostro, gran madrugador y amigo de la caza. Quieren decir que tenía el sobrenombre de Quijada, o Quesada, que en esto hay alguna diferencia en los autores que deste caso escriben; aunque, por conjeturas verosímiles, se deja entender que se llamaba Quejana. Pero esto importa poco a nuestro cuento; basta que en la narración dél no se salga un punto de la verdad.\r\n\r\nEs, pues, de saber que este sobredicho hidalgo, los ratos que estaba ocioso, que eran los más del año, se daba a leer libros de caballerías, con tanta afición y gusto, que olvidó casi de todo punto el ejercicio de la caza, y aun la administración de su hacienda. Y llegó a tanto su curiosidad y desatino en esto, que vendió muchas hanegas de tierra de sembradura para comprar libros de caballerías en que leer, y así, llevó a su casa todos cuantos pudo haber dellos; y de todos, ningunos le parecían tan bien como los que compuso el famoso Feliciano de Silva, porque la claridad de su prosa y aquellas entricadas razones suyas le parecían de perlas, y más cuando llegaba a leer aquellos requiebros y cartas de desafíos, donde en muchas partes hallaba escrito: La razón de la sinrazón que a mi razón se hace, de tal manera mi razón enflaquece, que con razón me quejo de la vuestra fermosura. Y también cuando leía: ...los altos cielos que de vuestra divinidad divinamente con las estrellas os fortifican, y os hacen merecedora del merecimiento que merece la vuestra grandeza. ', 12, '2020-11-12', 4, NULL),
(2, 'Prueba 2', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat dignissim nisl sit amet malesuada. Mauris hendrerit pretium nisl, nec efficitur velit. Praesent non dui scelerisque, auctor dolor vel, rutrum orci. Vestibulum arcu ligula, convallis a scelerisque vitae, laoreet vel ex. Praesent cursus mi id dolor sagittis, sit amet tincidunt dui fermentum. Mauris lectus tortor, pretium sit amet nunc sed, aliquam porta lacus. Nulla rhoncus massa tortor, efficitur pellentesque diam scelerisque vel. Duis ultricies ipsum vel placerat suscipit. Nunc eget magna libero. Phasellus non enim sit amet metus rhoncus aliquet. Duis consequat dictum cursus. Ut mattis, lectus sit amet posuere eleifend, dolor magna dictum lorem, quis consectetur sem magna ac massa. Quisque sem justo, sagittis in odio quis, sagittis sollicitudin dui.\r\n\r\nVivamus auctor justo ante, eu vulputate orci bibendum vitae. Donec nunc ex, facilisis in viverra id, molestie vitae dolor. Aliquam nec aliquam nulla. Nullam finibus tristique tellus in ultricies. Phasellus imperdiet volutpat enim eu eleifend. Nulla pharetra congue erat id sodales. Cras ut sem id lectus congue tincidunt quis non orci. Vestibulum urna eros, faucibus sit amet ante sit amet, feugiat vulputate nisi. Ut efficitur accumsan odio nec aliquam. Curabitur sit amet leo efficitur dolor ullamcorper pulvinar quis vitae turpis. Mauris congue mauris ut orci maximus, eget ullamcorper dolor posuere.\r\n\r\nIn faucibus vel purus nec malesuada. Nullam consectetur ante et mauris euismod, eu feugiat orci accumsan. Donec dui enim, tristique at lacus vel, varius feugiat nisi. Integer fringilla lacus et urna mattis, a aliquet nibh eleifend. Mauris in libero vel enim venenatis rhoncus. Etiam scelerisque dui a pretium ullamcorper. Cras iaculis augue sit amet tortor fringilla eleifend. Fusce lacus nisl, convallis ac condimentum quis, laoreet quis tellus. Nam et volutpat metus. Aenean sagittis, libero ut tristique aliquam, dui orci feugiat felis, sed placerat diam nisi eget diam. Vestibulum sodales scelerisque viverra. Donec rhoncus lorem a turpis interdum, ac dignissim turpis imperdiet. Nunc pretium lobortis consectetur. Nulla vehicula neque ac pharetra dapibus. Phasellus arcu leo, interdum et suscipit id, hendrerit non elit. Nam pellentesque ligula neque, et feugiat quam luctus quis. ', 12, '2020-11-01', 6, NULL);

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
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`ID`, `Nombre`, `Apellido`, `Usuario`, `Correo`, `Password`, `Imagen`) VALUES
(11, 'Pepe', 'Fernandez', 'pepito', 'pepe@ikasle.egibde.org', '5758d90ad92b9200b483e299e9b62d26', '../img/uploads/persona.jpg'),
(12, 'AdriÃ¡n', 'Pisabarro', 'apisabarro', 'adrian.pisabarro@ikasle.egibide.org', '5758d90ad92b9200b483e299e9b62d26', '../img/uploads/persona.jpg');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Likes`
--
ALTER TABLE `Likes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Pregunta`
--
ALTER TABLE `Pregunta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Respuesta`
--
ALTER TABLE `Respuesta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
