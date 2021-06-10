-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 10-06-2021 a las 15:48:46
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
-- Estructura de tabla para la tabla `almacen_activo_af`
--

DROP TABLE IF EXISTS `almacen_activo_af`;
CREATE TABLE IF NOT EXISTS `almacen_activo_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_item` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` smallint(6) NOT NULL,
  `foto` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_det_ingreso` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `id_det_ingreso` (`id_det_ingreso`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_af`
--

DROP TABLE IF EXISTS `area_af`;
CREATE TABLE IF NOT EXISTS `area_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `area_af`
--

INSERT INTO `area_af` (`id`, `codigo`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'COD001', 'GERENCIA', 'AREA DE GERENCIA', 1),
(2, 'COD002', 'CONTABILIDAD', 'AREA DE CONTABILIDAD', 1),
(3, 'COD003', 'SISTEMAS', 'AREA DE SISTEMAS', 1),
(4, 'COD004', 'ALMACEN', 'AREA DE ALMACEN', 1),
(5, 'COD005', 'TESORERIA', 'AREA DE TESORERIA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

DROP TABLE IF EXISTS `asignacion`;
CREATE TABLE IF NOT EXISTS `asignacion` (
  `id_corte` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_corte`,`id_usuario`),
  KEY `id_corte` (`id_corte`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_acti_af`
--

DROP TABLE IF EXISTS `calificacion_acti_af`;
CREATE TABLE IF NOT EXISTS `calificacion_acti_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo_vida` int(11) DEFAULT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `calificacion_acti_af`
--

INSERT INTO `calificacion_acti_af` (`id`, `codigo`, `nombre`, `tiempo_vida`, `estado`) VALUES
(1, 'MAQ001', 'MAQUINARIA', 5, 1),
(2, 'TER002', 'TERRENO', 5, 1),
(3, 'MUE003', 'MUEBLES', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte_almacen_af`
--

DROP TABLE IF EXISTS `corte_almacen_af`;
CREATE TABLE IF NOT EXISTS `corte_almacen_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_corte_inv` int(11) NOT NULL,
  `codigo_item` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` decimal(15,2) NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `id_corte_inv` (`id_corte_inv`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte_inventario_af`
--

DROP TABLE IF EXISTS `corte_inventario_af`;
CREATE TABLE IF NOT EXISTS `corte_inventario_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `departamento` int(11) NOT NULL,
  `empresa` int(11) NOT NULL,
  `sucursal` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_af`
--

DROP TABLE IF EXISTS `departamento_af`;
CREATE TABLE IF NOT EXISTS `departamento_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_asig_af`
--

DROP TABLE IF EXISTS `detalle_asig_af`;
CREATE TABLE IF NOT EXISTS `detalle_asig_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `observacion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_almacen_act` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `id_almacen_act` (`id_almacen_act`),
  KEY `id_documento` (`id_documento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingr_af`
--

DROP TABLE IF EXISTS `detalle_ingr_af`;
CREATE TABLE IF NOT EXISTS `detalle_ingr_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(11) NOT NULL,
  `id_ingreso` int(11) NOT NULL,
  `det_descripcion` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` decimal(15,2) NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `id_item` (`id_item`),
  KEY `id_ingreso` (`id_ingreso`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_salida_af`
--

DROP TABLE IF EXISTS `detalle_salida_af`;
CREATE TABLE IF NOT EXISTS `detalle_salida_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_salida` int(11) NOT NULL,
  `id_almacen` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_salida` (`id_salida`),
  KEY `id_almacen` (`id_almacen`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_mante_correctivo_af`
--

DROP TABLE IF EXISTS `det_mante_correctivo_af`;
CREATE TABLE IF NOT EXISTS `det_mante_correctivo_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_alarma` date NOT NULL,
  `tiempo` int(11) NOT NULL,
  `motivo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_salida` int(11) NOT NULL,
  `id_mant_correctivo` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `id_salida` (`id_salida`),
  KEY `id_mant_correctivo` (`id_mant_correctivo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_mante_prevent_af`
--

DROP TABLE IF EXISTS `det_mante_prevent_af`;
CREATE TABLE IF NOT EXISTS `det_mante_prevent_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_alarma` date NOT NULL,
  `tiempo` int(11) NOT NULL,
  `motivo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_almacen` int(11) NOT NULL,
  `id_mant_preventivo` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `id_almacen` (`id_almacen`),
  KEY `id_mant_preventivo` (`id_mant_preventivo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_af`
--

DROP TABLE IF EXISTS `documento_af`;
CREATE TABLE IF NOT EXISTS `documento_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directorio` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `id_responsable` int(11) NOT NULL,
  `id_trabajador` int(11) DEFAULT NULL,
  `id_tipo_doc` int(11) NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `id_responsable` (`id_responsable`),
  KEY `id_tipo_doc` (`id_tipo_doc`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_af`
--

DROP TABLE IF EXISTS `empresa_af`;
CREATE TABLE IF NOT EXISTS `empresa_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nit` (`nit`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresa_af`
--

INSERT INTO `empresa_af` (`id`, `nombre`, `nit`, `descripcion`, `estado`) VALUES
(1, 'MERCANTIL SANTA CRUZ', '8214453011', 'EMPRESA DE SERVICIOS', 1),
(2, 'BANCO SOL', '8214453012', 'EMPRESA DE SERVICIOS', 1),
(3, 'BANCO UNIÓN', '8214453013', 'EMPRESA DE SERVICIOS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_af`
--

DROP TABLE IF EXISTS `ingreso_af`;
CREATE TABLE IF NOT EXISTS `ingreso_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_doc` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directorio` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_reg` date NOT NULL,
  `id_tipo_ingr` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `id_tipo_ingr` (`id_tipo_ingr`),
  KEY `id_sucursal` (`id_sucursal`),
  KEY `id_responsable` (`id_responsable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario2`
--

DROP TABLE IF EXISTS `inventario2`;
CREATE TABLE IF NOT EXISTS `inventario2` (
  `id` int(11) NOT NULL,
  `cod_item` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `cantidad` decimal(15,2) NOT NULL,
  `observacion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_bodega` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_respaldo` int(11) DEFAULT NULL,
  `id_corte` int(11) NOT NULL,
  `operador` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_corte` (`id_corte`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_fisico_af`
--

DROP TABLE IF EXISTS `inventario_fisico_af`;
CREATE TABLE IF NOT EXISTS `inventario_fisico_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_item` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_item` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `responsable` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alto` decimal(8,2) DEFAULT NULL,
  `ancho` decimal(8,2) DEFAULT NULL,
  `largo` decimal(8,2) DEFAULT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex2`
--

DROP TABLE IF EXISTS `kardex2`;
CREATE TABLE IF NOT EXISTS `kardex2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_item` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `cantidad` decimal(15,2) DEFAULT NULL,
  `observacion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_bodega` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_respaldo` int(11) DEFAULT NULL,
  `id_corte` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_item` (`cod_item`),
  KEY `id_corte` (`id_corte`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_correct_af`
--

DROP TABLE IF EXISTS `mantenimiento_correct_af`;
CREATE TABLE IF NOT EXISTS `mantenimiento_correct_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_salida` date NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_prev_af`
--

DROP TABLE IF EXISTS `mantenimiento_prev_af`;
CREATE TABLE IF NOT EXISTS `mantenimiento_prev_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_salida` date NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_af`
--

DROP TABLE IF EXISTS `marca_af`;
CREATE TABLE IF NOT EXISTS `marca_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marca_af`
--

INSERT INTO `marca_af` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'SIN MARCA', 'SIN MARCA', 1),
(2, 'SAMSUMG', 'SAMSUMG', 1),
(3, 'HUAWEI', 'HUAWEI', 1),
(4, 'TRAMONTINA', 'TRAMONTINA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(56, '2012_05_13_000000_create_empresa_af_table', 2),
(2, '2012_05_13_211816_create_sucursal_af_table', 1),
(3, '2013_05_13_211816_create_area_af_table', 1),
(4, '2013_06_13_211816_create_sector_af_table', 1),
(5, '2014_10_12_000005_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2021_05_13_211816_create_almacen_activo_af_table', 1),
(9, '2021_05_13_211816_create_asignacion_table', 1),
(10, '2021_05_13_211816_create_calificacion_acti_af_table', 1),
(11, '2021_05_13_211816_create_corte_almacen_af_table', 1),
(12, '2021_05_13_211816_create_corte_inventario_af_table', 1),
(13, '2021_05_13_211816_create_departamento_af_table', 1),
(14, '2021_05_13_211816_create_det_mante_correctivo_af_table', 1),
(15, '2021_05_13_211816_create_det_mante_prevent_af_table', 1),
(16, '2021_05_13_211816_create_detalle_asig_af_table', 1),
(17, '2021_05_13_211816_create_detalle_ingr_af_table', 1),
(18, '2021_05_13_211816_create_detalle_salida_af_table', 1),
(19, '2021_05_13_211816_create_documento_af_table', 1),
(20, '2021_05_13_211816_create_ingreso_af_table', 1),
(21, '2021_05_13_211816_create_inventario2_table', 1),
(22, '2021_05_13_211816_create_inventario_fisico_af_table', 1),
(23, '2021_05_13_211816_create_item_af_table', 1),
(24, '2021_05_13_211816_create_kardex2_table', 1),
(25, '2021_05_13_211816_create_mantenimiento_correct_af_table', 1),
(26, '2021_05_13_211816_create_mantenimiento_prev_af_table', 1),
(27, '2021_05_13_211816_create_marca_af_table', 1),
(28, '2021_05_13_211816_create_modelo_af_table', 1),
(29, '2021_05_13_211816_create_permisos_table', 1),
(30, '2021_05_13_211816_create_proveedor_af_table', 1),
(31, '2021_05_13_211816_create_responsable_af_table', 1),
(32, '2021_05_13_211816_create_salida_af_table', 1),
(33, '2021_05_13_211816_create_tipo_documento_af_table', 1),
(34, '2021_05_13_211816_create_tipo_ingreso_af_table', 1),
(35, '2021_05_13_211816_create_tipo_resp_af_table', 1),
(36, '2021_05_13_211816_create_tipo_salida_af_table', 1),
(37, '2021_05_13_211816_create_turno_af_table', 1),
(38, '2021_05_13_211817_add_foreign_keys_to_almacen_activo_af_table', 1),
(39, '2021_05_13_211817_add_foreign_keys_to_asignacion_table', 1),
(40, '2021_05_13_211817_add_foreign_keys_to_corte_almacen_af_table', 1),
(41, '2021_05_13_211817_add_foreign_keys_to_det_mante_correctivo_af_table', 1),
(42, '2021_05_13_211817_add_foreign_keys_to_det_mante_prevent_af_table', 1),
(43, '2021_05_13_211817_add_foreign_keys_to_detalle_asig_af_table', 1),
(44, '2021_05_13_211817_add_foreign_keys_to_detalle_ingr_af_table', 1),
(45, '2021_05_13_211817_add_foreign_keys_to_detalle_salida_af_table', 1),
(46, '2021_05_13_211817_add_foreign_keys_to_documento_af_table', 1),
(47, '2021_05_13_211817_add_foreign_keys_to_ingreso_af_table', 1),
(48, '2021_05_13_211817_add_foreign_keys_to_inventario2_table', 1),
(49, '2021_05_13_211817_add_foreign_keys_to_item_af_table', 1),
(50, '2021_05_13_211817_add_foreign_keys_to_kardex2_table', 1),
(51, '2021_05_13_211817_add_foreign_keys_to_responsable_af_table', 1),
(52, '2021_05_13_211817_add_foreign_keys_to_salida_af_table', 1),
(53, '2021_05_13_211817_add_foreign_keys_to_sector_af_table', 1),
(54, '2021_05_13_211817_add_foreign_keys_to_sucursal_af_table', 1),
(55, '2021_06_04_233002_add_column_documento_af', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo_af`
--

DROP TABLE IF EXISTS `modelo_af`;
CREATE TABLE IF NOT EXISTS `modelo_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modelo_af`
--

INSERT INTO `modelo_af` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'SIN MODELO', 'MOVILES', 1),
(2, 'J5', 'MOVILES', 1),
(3, 'S6', 'MOVILES', 1),
(4, 'X12', 'MOVILES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `id_tipo` int(11) NOT NULL,
  `id_funciones` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo`,`id_funciones`),
  KEY `id_tipo` (`id_tipo`),
  KEY `id_funciones` (`id_funciones`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_af`
--

DROP TABLE IF EXISTS `proveedor_af`;
CREATE TABLE IF NOT EXISTS `proveedor_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razon_social` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nit` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nit` (`nit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable_af`
--

DROP TABLE IF EXISTS `responsable_af`;
CREATE TABLE IF NOT EXISTS `responsable_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_resp` int(11) NOT NULL,
  `id_sector` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ci` (`ci`),
  KEY `tipo_resp` (`tipo_resp`),
  KEY `id_sector` (`id_sector`),
  KEY `id_turno` (`id_turno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_af`
--

DROP TABLE IF EXISTS `salida_af`;
CREATE TABLE IF NOT EXISTS `salida_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origen_suc` int(11) NOT NULL,
  `destino_suc` int(11) DEFAULT NULL,
  `descipcion` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `origen_suc` (`origen_suc`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector_af`
--

DROP TABLE IF EXISTS `sector_af`;
CREATE TABLE IF NOT EXISTS `sector_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_area` int(11) NOT NULL,
  `cod_suc` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `id_area` (`id_area`),
  KEY `cod_suc` (`cod_suc`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sector_af`
--

INSERT INTO `sector_af` (`id`, `codigo`, `id_area`, `cod_suc`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'MAN001', 1, 2, 'MANTENIMIENTO', 'SECTOR DE MANTENIMIENTO', 1),
(2, 'BAJ002', 3, 3, 'BAJAS', 'SECTOR DE BAJAS', 1),
(3, 'JEF003', 3, 1, 'JEFATURA', 'SECTOR DE JEFATURA', 1),
(4, 'SER004', 1, 1, 'SERVICIOS', 'SECTOR DE SERVICIOS', 1),
(5, 'REC005', 2, 3, 'RECLAMOS', 'SECTOR DE RECLAMOS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal_af`
--

DROP TABLE IF EXISTS `sucursal_af`;
CREATE TABLE IF NOT EXISTS `sucursal_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `id_empresa` (`id_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sucursal_af`
--

INSERT INTO `sucursal_af` (`id`, `codigo`, `descripcion`, `id_empresa`, `estado`) VALUES
(1, '00001', 'MONTERO', 1, 1),
(2, '00002', 'CENTRAL-SANTA CRUZ', 2, 1),
(3, '00003', 'NORTE-INTEGRADO', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento_af`
--

DROP TABLE IF EXISTS `tipo_documento_af`;
CREATE TABLE IF NOT EXISTS `tipo_documento_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ingreso_af`
--

DROP TABLE IF EXISTS `tipo_ingreso_af`;
CREATE TABLE IF NOT EXISTS `tipo_ingreso_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_ingreso_af`
--

INSERT INTO `tipo_ingreso_af` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'COMPRA', 'INGRESO POR COMPRA', 1),
(2, 'TRANSFERENCIA', 'INGRESO POR TRANSFERENCIA', 1),
(3, 'MANTENIMIENTO', 'INGRESO POR MANTENIMIENTO', 1),
(4, 'DONACION', 'INGRESO POR DONACION', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_resp_af`
--

DROP TABLE IF EXISTS `tipo_resp_af`;
CREATE TABLE IF NOT EXISTS `tipo_resp_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_resp_af`
--

INSERT INTO `tipo_resp_af` (`id`, `descripcion`, `estado`) VALUES
(1, 'ADMINISTRADOR', 1),
(2, 'ENCARGADO', 1),
(3, 'COLABORADOR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_salida_af`
--

DROP TABLE IF EXISTS `tipo_salida_af`;
CREATE TABLE IF NOT EXISTS `tipo_salida_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_salida_af`
--

INSERT INTO `tipo_salida_af` (`id`, `codigo`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'TRA001', 'TRANSFERENCIA', 'SALIDA POR TRANSFERENCIA', 1),
(2, 'PRE002', 'PRESTAMO', 'SALIDA POR PRESTAMO', 1),
(3, 'MAN003', 'MANTENIMIENTO', 'SALIDA POR MANTENIMIENTO', 1),
(4, 'BAJ004', 'BAJA', 'SALIDA POR BAJA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno_af`
--

DROP TABLE IF EXISTS `turno_af`;
CREATE TABLE IF NOT EXISTS `turno_af` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horario_ini` time NOT NULL,
  `horario_fin` time NOT NULL,
  `estado` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `turno_af`
--

INSERT INTO `turno_af` (`id`, `descripcion`, `horario_ini`, `horario_fin`, `estado`) VALUES
(1, '24/7', '00:00:00', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_resp` int(11) NOT NULL,
  `id_sector` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_ci_unique` (`ci`) USING HASH,
  UNIQUE KEY `users_email_unique` (`email`) USING HASH,
  KEY `tipo_resp` (`tipo_resp`),
  KEY `id_sector` (`id_sector`),
  KEY `id_turno` (`id_turno`),
  KEY `estado` (`estado`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `ci`, `telefono`, `direccion`, `tipo_resp`, `id_sector`, `id_turno`, `estado`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'JHONNIE ALFREDO', 'COLQUE MONTALVO', '8214453', '63595177', NULL, 1, 1, 1, 1, 'jac_m_91@gmail.com', NULL, '$2y$10$MgjVlZyY31IdUoKE5wBuKOqCzDq/GLnH0/WDHzDYQYsVaqbeI06nu', NULL, '2021-06-10 19:47:35', '2021-06-10 19:47:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
