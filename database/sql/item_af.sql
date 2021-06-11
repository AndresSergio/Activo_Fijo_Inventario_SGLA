-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 11-06-2021 a las 03:15:26
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `activo_fijocadena`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_af`
--

DROP TABLE IF EXISTS `item_af`;
CREATE TABLE IF NOT EXISTS `item_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alto` decimal(8,0) DEFAULT NULL,
  `ancho` decimal(8,0) DEFAULT NULL,
  `largo` decimal(8,0) DEFAULT NULL,
  `color` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiempo_vida` int(11) DEFAULT NULL,
  `control_mante` int(11) DEFAULT NULL,
  `id_clasificacion` int(11) NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `id_clasificacion` (`id_clasificacion`),
  KEY `id_modelo` (`id_modelo`),
  KEY `id_marca` (`id_marca`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `item_af`
--

INSERT INTO `item_af` (`id`, `codigo`, `nombre`, `alto`, `ancho`, `largo`, `color`, `lote`, `tiempo_vida`, `control_mante`, `id_clasificacion`, `id_modelo`, `id_marca`, `estado`) VALUES
(1, '1001', 'TRACTOR', '220', '180', '450', 'AMARILLO', '101', 5, 1, 1, 1, 1, 1),
(2, '1002', 'MESA REDONDA', '75', '90', '90', 'BLANCO', '101', 5, 1, 3, 1, 1, 1),
(3, '1003', 'SILLAS', '90', '85', '80', 'CAFE', '101', 5, 1, 3, 1, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
