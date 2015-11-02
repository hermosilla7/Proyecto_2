-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2015 a las 19:30:12
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'Carro portátiles', 'Carro de 25 portátiles', 'carro.jpg', '1', ''),
(2, 'Despacho', 'Despacho para entrevistas', 'despacho1.jpg', '1', ''),
(3, 'Despacho', 'Despacho con mesa redonda', 'despacho2.jpg', '0', ''),
(4, 'Aula informática', 'Aula de informática norte', 'informatica1.jpg', '1', ''),
(5, 'Aula informática', 'Aula de informática sur', 'informatica2.jpg', '1', ''),
(6, 'Móvil', 'Móvil multimedia', 'movil1.jpg', '0', ''),
(7, 'Móvil', 'Móvil multimedia', 'movil2.jpg', '0', ''),
(8, 'Portátil', 'Portátil Acer', 'portatil1.jpg', '1', ''),
(9, 'Portátil', 'Portátil Toshiba', 'portatil2.jpg', '0', ''),
(10, 'Portátil', 'Portátil Windows', 'portatil3.jpg', '1', ''),
(11, 'Proyector', 'Proyector Asus', 'proyector.jpg', '0', ''),
(12, 'Sala Reuniones', 'Sala de reuniones', 'reuniones.jpg', '1', ''),
(13, 'Aula teoria', 'Aula teoria', 'teoria1.jpg', '0', ''),
(14, 'Aula teoria', 'Aula teoria', 'teoria2.jpg', '1', ''),
(15, 'Aula teoria', 'Aula teoria', 'teoria3.jpg', '0', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_user`, `id_recurso`, `dateini`, `datefi`) VALUES
(1, 1, 1, '2015-11-03', '2015-11-03'),
(2, 1, 1, '2015-11-03', '2015-11-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rol` tinyint(4) NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `nom`, `pass`, `rol`, `img`) VALUES
(1, 'user1', 'user1', 1, '1.jpg'),
(2, 'user1', 'user1', 1, '1.jpg'),
(3, 'user2', 'user2', 0, '2.jpg'),
(4, 'user2', 'user2', 0, '2.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
