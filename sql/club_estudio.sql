-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2015 a las 13:36:29
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `club_estudio`
--
CREATE DATABASE IF NOT EXISTS `club_estudio` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `club_estudio`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Aula'),
(2, 'Sala'),
(3, 'Hardware y recursos'),
(4, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE IF NOT EXISTS `incidencia` (
  `id_incidencia` int(11) NOT NULL,
  `titulo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `id_recurso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`id_incidencia`, `titulo`, `descripcion`, `id_recurso`, `id_usuario`, `fecha`) VALUES
(1, '', '', 0, 2, '2015-11-04'),
(2, '', '', 0, 2, '2015-11-04'),
(3, '', '', 0, 2, '2015-11-04'),
(4, '', '', 0, 2, '2015-11-04'),
(5, '', '', 0, 2, '2015-11-04'),
(6, '', '', 0, 2, '2015-11-04'),
(7, '', '', 0, 2, '2015-11-04'),
(8, '', '', 8, 2, '2015-11-04'),
(9, '', '', 8, 2, '2015-11-04'),
(10, '', '', 1, 2, '2015-11-04'),
(11, '', '', 1, 2, '2015-11-04'),
(12, 'dfdsf', 'gdfgh', 0, 2, '2015-11-04'),
(13, 'dsfds', 'tuyg', 1, 2, '2015-11-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE IF NOT EXISTS `recurso` (
  `id_recurso` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descr` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`id_recurso`, `nombre`, `descr`, `img`, `estado`, `categoria`) VALUES
(1, 'Carro portátiles', 'Carro de 25 portátiles', 'carro.jpg', '1', '3'),
(2, 'Despacho', 'Despacho para entrevistas', 'despacho1.jpg', '1', '2'),
(3, 'Despacho', 'Despacho con mesa redonda', 'despacho2.jpg', '1', '2'),
(4, 'Aula informática', 'Aula de informática norte', 'informatica1.jpg', '1', '1'),
(5, 'Aula informática', 'Aula de informática sur', 'informatica2.jpg', '1', '1'),
(6, 'Móvil', 'Móvil multimedia', 'movil1.jpg', '1', '3'),
(7, 'Móvil', 'Móvil multimedia', 'movil2.jpg', '1', '3'),
(8, 'Portátil', 'Portátil Acer', 'portatil1.jpg', '1', '3'),
(9, 'Portátil', 'Portátil Toshiba', 'portatil2.jpg', '0', '3'),
(10, 'Portátil', 'Portátil Windows', 'portatil3.jpg', '1', '3'),
(11, 'Proyector', 'Proyector Asus', 'proyector.jpg', '0', '3'),
(12, 'Sala Reuniones', 'Sala de reuniones', 'reuniones.jpg', '1', '2'),
(13, 'Aula teoria', 'Aula teoria', 'teoria1.jpg', '0', '1'),
(14, 'Aula teoria', 'Aula teoria', 'teoria2.jpg', '1', '1'),
(15, 'Aula teoria', 'Aula teoria', 'teoria3.jpg', '0', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_recurso` int(11) NOT NULL,
  `dateini` date NOT NULL,
  `datefi` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_user`, `id_recurso`, `dateini`, `datefi`) VALUES
(1, 1, 1, '2015-11-03', '2015-11-03'),
(2, 1, 1, '2015-11-03', '2015-11-03'),
(3, 2, 3, '2015-11-03', '0000-00-00'),
(4, 2, 6, '2015-11-03', '0000-00-00'),
(5, 2, 7, '2015-11-03', '0000-00-00'),
(6, 2, 5, '2015-11-04', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rol` tinyint(4) NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `nom`, `pass`, `rol`, `img`) VALUES
(1, 'us_admin', 'admin123', 1, '1.jpg'),
(2, 'us_normal_1', 'user123', 0, '1.jpg'),
(3, 'us_normal_2', 'user456', 0, '2.jpg'),
(4, 'us_normal_3', 'user789', 0, '2.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`id_incidencia`);

--
-- Indices de la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`id_recurso`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
