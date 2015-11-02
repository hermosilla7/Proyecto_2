-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Temps de generació: 02-11-2015 a les 11:15:35
-- Versió del servidor: 5.6.26
-- Versió de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `prueba`
--
CREATE DATABASE IF NOT EXISTS `prueba` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `prueba`;

-- --------------------------------------------------------

--
-- Estructura de la taula `recurso`
--

CREATE TABLE IF NOT EXISTS `recurso` (
  `id_recurso` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `descr` varchar(30) COLLATE utf8_bin NOT NULL,
  `img` varchar(30) COLLATE utf8_bin NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Bolcant dades de la taula `recurso`
--

INSERT INTO `recurso` (`id_recurso`, `nom`, `descr`, `img`, `estado`) VALUES
(1, 'aula1', 'aula de informatica', '3.jpg', 1),
(2, 'aula1', 'aula de informatica', '3.jpg', 1),
(3, 'despacho1 ', 'despacho deldirector', '4.jpg', 0),
(4, 'aula2', 'aula de informatica2', '5.jpg', 1),
(5, 'aula2', 'aula de informatica2', '5.jpg', 1),
(6, 'movil', 'movil de la empresa', '6.jpg', 0),
(7, 'movil', 'movil de la empresa', '6.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_recurso` int(11) NOT NULL,
  `dateini` date NOT NULL,
  `datefi` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Bolcant dades de la taula `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_user`, `id_recurso`, `dateini`, `datefi`) VALUES
(1, 1, 1, '2015-11-03', '2015-11-03'),
(2, 1, 1, '2015-11-03', '2015-11-03');

-- --------------------------------------------------------

--
-- Estructura de la taula `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `pass` varchar(30) COLLATE utf8_bin NOT NULL,
  `rol` tinyint(4) NOT NULL,
  `img` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Bolcant dades de la taula `user`
--

INSERT INTO `user` (`id_user`, `nom`, `pass`, `rol`, `img`) VALUES
(1, 'user1', 'user1', 1, '1.jpg'),
(2, 'user1', 'user1', 1, '1.jpg'),
(3, 'user2', 'user2', 0, '2.jpg'),
(4, 'user2', 'user2', 0, '2.jpg');

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`id_recurso`);

--
-- Index de la taula `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Index de la taula `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `recurso`
--
ALTER TABLE `recurso`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT per la taula `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la taula `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
