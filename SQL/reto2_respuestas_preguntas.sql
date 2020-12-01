-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-12-2020 a las 08:01:38
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

--
-- Volcado de datos para la tabla `Likes`
--

INSERT INTO `Likes` (`ID`, `ID_Pregunta`, `ID_Usuario`, `ID_Respuesta`) VALUES
(1, NULL, 18, 5),
(2, NULL, 18, 11),
(3, NULL, 18, 13),
(4, 3, 18, NULL),
(5, NULL, 19, 14),
(6, 7, 19, NULL),
(7, 3, 17, NULL);

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

--
-- Volcado de datos para la tabla `Pregunta`
--

INSERT INTO `Pregunta` (`ID`, `Titulo`, `Descripcion`, `ID_Usuario`, `Fecha`, `ID_Categoria`, `Archivo`) VALUES
(3, 'Nuevos conceptos de Airbus', '<p>El mantra de las emisiones Cero.</p>\r\n<p><strong>&iquest;Os subir&iacute;as a un avi&oacute;n cuyo combustible es hidr&oacute;geno? Un elemento super vol&aacute;til y altamente inflamable.</strong></p>\r\n<p><code>https://www.vadeaviones.com/2020/09/...ero-emisiones/</code></p>\r\n<p>Airbus ha desvelado tres conceptos para los primeros aviones comerciales del mundo con cero emisiones, que podr&iacute;an ponerse en servicio en 2035. Cada uno de estos conceptos representa un enfoque diferente para conseguir un vuelo con cero emisiones, y explora distintas soluciones tecnol&oacute;gicas y configuraciones aerodin&aacute;micas. El objetivo es apoyar el prop&oacute;sito de la compa&ntilde;&iacute;a de liderar la descarbonizaci&oacute;n en todo el sector de la aviaci&oacute;n.</p>\r\n<p>Los tres conceptos se basan en el hidr&oacute;geno como fuente de energ&iacute;a primaria, un combustible para la aviaci&oacute;n que Airbus considera limpio y muy prometedor, y que probablemente es la soluci&oacute;n que se implantar&aacute; en el sector aeroespacial y en otras industrias para alcanzar sus objetivos de emisiones neutras para el clima.</p>\r\n<p>Los tres conceptos, cuya denominaci&oacute;n en clave es &ldquo;ZEROe&rdquo; y de entre los que surgir&aacute; el primer avi&oacute;n comercial con cero emisiones, consisten en:</p>', 17, '2020-11-29', 5, ''),
(5, 'Como ver mapa GPS de FS2004 en tablet', '<p>Hola amigos, me gustaria saber como podria ver el GPS de los aviones de FS2004 en una tablet mientras veo el panel del avion en la pantalla principal. He visto videos de youtube donde lo hacen pero no he encontrado la forma.<br /><br />Alguiien lo ha hecho y puede ayudarme?<br /><br />gracias.</p>', 18, '2020-11-30', 2, ''),
(7, 'Cuál es el avión business que más os gusta', '<p>Lejos de los grandes reactores comerciales modificados para tal, pregunto los dise&ntilde;ados para este sector &iquest;cu&aacute;l os gusta m&aacute;s? A m&iacute; particularmente por su l&iacute;nea el Learjet 75 de Bombardier todo un cl&aacute;sico.</p>', 18, '2020-11-26', 1, '../img/files/a4994sdij9vg5n9p.cf4doao7.jpg'),
(9, 'Global AI Traffic V4 Disponible', '<p>Buenas tardes a tod@s, despu&eacute;s de muchos retrasos por diferentes motivos por fin podemos lanzar el primer Beta del tr&aacute;fico.<br /><br />Importante:<br /><br />&Eacute;sta versi&oacute;n es &uacute;nica y exclusivamente para P3Dv4.4+ ya que contiene archivos con sistema PBR<br />Estamos detectando un error y no logramos encontrar la causa, si alg&uacute;n usuario encuentra el error por favor hacerlo saber.<br />Todo el soporte se har&aacute; mediante mensajes privados en la p&aacute;gina de Facebook.<br />&Eacute;ste tr&aacute;fico es totalmente gratuito, no se permite la comercializaci&oacute;n con &eacute;l. Nuestro trabajo simplemente es la recopilaci&oacute;n y montaje de un tr&aacute;fico gratuito con material gratuito</p>', 19, '2020-11-12', 1, ''),
(10, 'Cuál de los A320 me recomendáis para Xplane11', '<p>Hola a todos, estoy en dudas de elegir un A320 ( Flight Factor, Toliss, Jardesing, FlightSimLabs) no he conseguido aclararme con algunas informaciones, que he visto en videos que circulan por la red. Por hacer una comparaci&oacute;n en Prepar3D vuelo el737-800 de PMDG, y ahora que estoy d&aacute;ndole ca&ntilde;a al X-plane 11.50, quisiera volar un A320 funcional.<br />Gracias de antemano por vuestra atenci&oacute;n<br />Saludos</p>', 19, '2020-11-01', 3, '../img/files/coefo28et134fp55g3fj2..jpg');

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

--
-- Volcado de datos para la tabla `Respuesta`
--

INSERT INTO `Respuesta` (`ID`, `Descripcion`, `Fecha`, `ID_Pregunta`, `ID_Usuario`, `Archivos`) VALUES
(5, '<p>ya hay coches que tienen como combustible el hidrogeno, adem&aacute;s en dos formas diferentes, la primera funciona como si de un motor de combusti&oacute;n interna convencional, y la segunta alimentando una pila de combustible para gnerar electricidad, el problema es que no es rentable producir hidrogeno y adem&aacute;s este, se obtine en muchas ocasiones de la misma gasolina, con lo cual utilizar gasolina para generar hidrogeno en pro del ecologismo.... Si los citados coches, pasan un crashtest &iquest;por que no iba a poder aplicarse en un avi&oacute;n? Y dado que el riesgo de accidente es muy inferior de un avi&oacute;n con respecto a un coche.</p>', '2020-11-29', 3, 17, ''),
(6, '<p>Bueno, los rusos ya estuvieron probando un Tu-154 propulsado por hidr&oacute;geno a finales de los 80...</p>\r\n<p>https://www.nytimes.com/1988/05/24/s...engineers.html</p>', '2020-11-29', 3, 18, ''),
(9, '<p>Los pasajeros no tienen botellas de oxigeno. Cada pasajero encima suya tiene un ``generador&acute;&acute; de oxigeno. Se trata de un cilindro con dos sustancias quimicas separadas. Las mascarillas bajan automaticamente con un sistema pneumatico (no necesita de electricidad) cuando hay una despresurizacion aunque tienen tambien un sistema electrico en algunos aviones en caso de necesitar bajarlas.<br /><br />Cuando se bajan no sale oxigeno, tienes que tirar de ellas hacia ti. Cuando tiras de ellas se rompe el ``sello&acute;&acute;, la barrera que separa a las sustancias y estas se mezclan dando lugar a una reaccion termodinamica y liberando calor y oxigeno. Incorporan ademas un ``escudo de calor&acute;&acute; (un reflector).<br /><br />Los pilotos si que tienen un sistema de oxigeno de bombonas y eso es lo que habran cortado con la radial ya que las bombonas estan en la cabina.</p>', '2020-11-30', 3, 19, '../img/files/2g.ao65ebpamatro9nfc45.png'),
(10, '<p>Gracias por la explicaci&oacute;n, no terminaba de conocer bien el sistema. Quiz&aacute; el autor donde lo le&iacute; patin&oacute; al explicarlo (lleva unos a&ntilde;os currando de TMA), porque de hecho el incendio se origina en la cabina de vuelo.<br /><br />Un saludo<br />Adri&aacute;n!</p>', '2020-11-30', 3, 17, ''),
(11, '<div>\r\n<div>\r\n<div id=\"post_message_673362\">\r\n<blockquote>Si puedes, realiza el vuelo de entrenamiento con la cessna 152. All&iacute; te explican muy bien como usar las c&aacute;maras.</blockquote>\r\n</div>\r\n</div>\r\n</div>', '2020-11-30', 5, 17, ''),
(12, '<p>Gracias Tania!</p>', '2020-11-30', 5, 18, ''),
(13, '<p>Hola a todos. He visto que el prepar3d 2.4 es una pasada y funciona casi todo de esc&aacute;ndalo. Pero hay aviones y escenarios a los que les tengo cari&ntilde;o y quiero seguir volandolos y no funcionan en p3d.<br /><br />Me gustar&iacute;a tener los dos instalados, por separado pero en un mismo disco. &iquest;Eso es posible? &iquest;Habra problemas con uno u otro? En caso afirmativo, &iquest;hay que hacer alg&uacute;n truco especial algo?<br /><br />Saludos.</p>', '2020-11-30', 5, 18, '../img/files/bepi4c53t8ajg9elae8.f8bl.jpg'),
(14, '<p>Mi propuesta:<br /><br />1.Plan A Executive: Gulfstream series 600. La elegancia extrema.<br /><br />2.Plan B Executive/Enterprise: cualquier B757 reacondicionado. La versatilidad perfecta.<br /><br />3.Plan C Family/Executive: Cirrus Vision Jet with Safe Return &amp; CAPS. La seguridad completa.</p>', '2020-11-30', 7, 19, ''),
(15, '<p>Hola por favor a&ntilde;adete</p>', '2020-11-30', 7, 17, ''),
(16, '<p>I was able to get my hands on it before the file was taken down. While it\'s a great package, there were a lot of errors with the installer so it\'s probably a good idea that it was removed. One of the fatal errors I got actually crashed my whole system and I had to do a hard reboot on my computer. I was able to install using the manual SKYAI method and edited .CFG files manually. So far the aircrafts are awesome with PBR and no system crashes yet. I guess I will have to find out as I do more flights as I\'ve only done about two quick flights. This package is definitely a lot better than any payware packages out there; I just hope that the installer gets fixed&nbsp;or&nbsp;just include instructions on how to install manually. Thank you for compiling this package!</p>', '2020-11-30', 9, 19, '../img/files/cf7ef53caojd4c1ptoc5g..jpg'),
(17, '<div>\r\n<div>\r\n<div id=\"post_message_673089\">\r\n<blockquote>FlightSimLabs es para P3D, no para XP11. Toliss no tiene A320 (Solo A319 y A321). Creo que entre JAR y FlightFactor me quedo con este &uacute;ltimo.</blockquote>\r\n</div>\r\n</div>\r\n</div>', '2020-11-30', 10, 17, ''),
(18, '<p>Yo tengo el A320 de JAR y el de flightfactor, el cual tengo muy usado ya es una maravilla.<br /><br />Sin dudarlo te recomiendo el de FF, mucho mejor que el JAR.<br /><br />Lo que si es cierto es que el FF consume m&aacute;s, el JAR es m&aacute;s liviano y amigable con PCS menos potentes.</p>', '2020-11-30', 10, 18, '');

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
(17, 'Tania', 'Garcia', 'tania.garcia', 'tania.garcia@gmail.com', '5758d90ad92b9200b483e299e9b62d26', '../img/uploads/tania.garcia'),
(18, 'Mario', 'Zatón', 'userMario', 'mario.zaton@ikasle.egibide.org', '5758d90ad92b9200b483e299e9b62d26', '../img/uploads/persona.jpg'),
(19, 'Adrián', 'Pisabarro García', 'apisabarro', 'adrian.pisabarro.garcia@gmail.com', '5758d90ad92b9200b483e299e9b62d26', '../img/uploads/persona.jpg');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Likes`
--
ALTER TABLE `Likes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `Pregunta`
--
ALTER TABLE `Pregunta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `Respuesta`
--
ALTER TABLE `Respuesta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
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
