-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2021 a las 00:25:57
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `activo_fijo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `nro_doc` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_item` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `serie` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` decimal(12,2) NOT NULL,
  `cod_ubicacion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_reg` datetime NOT NULL,
  `id_ingreso` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL,
  `observacion` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operador` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen_activo_af`
--

CREATE TABLE `almacen_activo_af` (
  `id` int(11) NOT NULL,
  `codigo_item` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` smallint(6) NOT NULL,
  `foto` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_det_ingreso` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_af`
--

CREATE TABLE `area_af` (
  `id` int(11) NOT NULL,
  `codigo` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `area_af`
--

INSERT INTO `area_af` (`id`, `codigo`, `nombre`, `descripcion`, `estado`) VALUES
(1, '0000', 'Gerente', 'Encargado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id_corte` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_acti_af`
--

CREATE TABLE `calificacion_acti_af` (
  `id` int(11) NOT NULL,
  `codigo` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo_vida` int(11) DEFAULT NULL,
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `calificacion_acti_af`
--

INSERT INTO `calificacion_acti_af` (`id`, `codigo`, `nombre`, `tiempo_vida`, `estado`) VALUES
(1, '12535', 'nuevo', 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `codigo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `codigo`, `descripcion`, `estado`) VALUES
(1, '123', 'qaweqweasdasd', 2),
(2, '1', 'qaweqweasdasd', 1),
(3, '112CBBA', 'Cochabamba', 1),
(4, '123', 'kjghf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `codigo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci_nit` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razon_social` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departamento` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zona` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consolidado`
--

CREATE TABLE `consolidado` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_ini` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `tipo` smallint(6) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consolidado_salidas`
--

CREATE TABLE `consolidado_salidas` (
  `id` int(11) NOT NULL,
  `cod_item` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` decimal(12,2) NOT NULL,
  `id_consolidado` int(11) NOT NULL,
  `fecha_regi` datetime NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte`
--

CREATE TABLE `corte` (
  `id` int(11) NOT NULL,
  `nro` int(11) NOT NULL,
  `fec_inicio` date DEFAULT NULL,
  `fec_final` date DEFAULT NULL,
  `fec_creacion` datetime DEFAULT NULL,
  `fec_conciliacion` datetime DEFAULT NULL,
  `encargado` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cor_sgla` smallint(6) NOT NULL,
  `cor_kardex` smallint(6) NOT NULL,
  `tip_inventario` smallint(6) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte_almacen_af`
--

CREATE TABLE `corte_almacen_af` (
  `id` int(11) NOT NULL,
  `id_corte_inv` int(11) NOT NULL,
  `codigo_item` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` decimal(15,2) NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte_inventario_af`
--

CREATE TABLE `corte_inventario_af` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `departamento` int(11) NOT NULL,
  `empresa` int(11) NOT NULL,
  `sucursal` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte_sgla`
--

CREATE TABLE `corte_sgla` (
  `id` int(11) NOT NULL,
  `id_corte` int(11) NOT NULL,
  `cod_item` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `serie` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` decimal(15,2) NOT NULL,
  `ubicacion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_bodega` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_reg` datetime NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_af`
--

CREATE TABLE `departamento_af` (
  `id` int(11) NOT NULL,
  `codigo` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departamento_af`
--

INSERT INTO `departamento_af` (`id`, `codigo`, `nombre`, `estado`) VALUES
(1, '12', 'Santa Cruz', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despacho`
--

CREATE TABLE `despacho` (
  `id` int(11) NOT NULL,
  `fecha_desp` datetime NOT NULL,
  `tipo_dist` smallint(6) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_distribuidor` int(11) NOT NULL,
  `id_flota` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despacho_pedi`
--

CREATE TABLE `despacho_pedi` (
  `id` int(11) NOT NULL,
  `id_despacho` int(11) NOT NULL,
  `nro_docu` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL,
  `id_packing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_asig_af`
--

CREATE TABLE `detalle_asig_af` (
  `id` int(11) NOT NULL,
  `observacion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_almacen_act` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_devolucion`
--

CREATE TABLE `detalle_devolucion` (
  `id` int(11) NOT NULL,
  `nro_factura` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_item` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `serie` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` decimal(12,2) NOT NULL,
  `estado` smallint(6) NOT NULL,
  `id_devolucion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `id` int(11) NOT NULL,
  `nro_doc` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_item` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `serie` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` decimal(12,2) NOT NULL,
  `cantidad_alm` decimal(12,2) NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingr_af`
--

CREATE TABLE `detalle_ingr_af` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_ingreso` int(11) NOT NULL,
  `det_descripcion` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` decimal(15,2) NOT NULL,
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_ingr_af`
--

INSERT INTO `detalle_ingr_af` (`id`, `id_item`, `id_ingreso`, `det_descripcion`, `cantidad`, `estado`) VALUES
(4, 1, 42, 'qaweqweasdasd', '1.00', 1),
(5, 1, 43, 'qaweqweasdasd', '1.00', 1),
(6, 1, 44, 'qaweqweasdasd', '1.00', 1),
(7, 1, 45, 'qaweqweasdasd', '1.00', 1),
(8, 1, 46, 'qaweqweasdasd', '1.00', 1),
(9, 1, 47, 'qaweqweasdasd', '1.00', 1),
(10, 1, 48, 'qaweqweasdasd', '1.00', 1),
(11, 1, 49, 'qaweqweasdasd', '1.00', 1),
(12, 1, 50, 'qaweqweasdasd', '1.00', 1),
(13, 1, 51, 'qaweqweasdasd', '1.00', 1),
(14, 1, 52, 'qaweqweasdasd', '1.00', 1),
(15, 1, 53, 'qaweqweasdasd', '1.00', 1),
(16, 1, 54, 'qaweqweasdasd', '1.00', 1),
(17, 1, 55, 'qaweqweasdasd', '1.00', 1),
(18, 1, 56, 'qaweqweasdasd', '1.00', 1),
(19, 1, 57, 'qaweqweasdasd', '1.00', 1),
(20, 1, 58, 'qaweqweasdasd', '1.00', 1),
(21, 1, 59, 'qaweqweasdasd', '1.00', 1),
(22, 1, 60, 'qaweqweasdasd', '1.00', 1),
(23, 1, 61, 'qaweqweasdasd', '1.00', 1),
(24, 1, 62, 'qaweqweasdasd', '1.00', 1),
(25, 1, 63, 'qaweqweasdasd', '1.00', 1),
(26, 1, 64, 'qaweqweasdasd', '1.00', 1),
(27, 1, 65, 'qaweqweasdasd', '1.00', 1),
(28, 1, 66, 'qaweqweasdasd', '1.00', 1),
(29, 1, 67, 'qaweqweasdasd', '1.00', 1),
(30, 1, 68, 'qaweqweasdasd', '1.00', 1),
(31, 1, 69, 'qaweqweasdasd', '1.00', 1),
(32, 1, 70, 'qaweqweasdasd', '1.00', 1),
(33, 1, 71, 'qaweqweasdasd', '1.00', 1),
(34, 1, 72, 'qaweqweasdasd', '1.00', 1),
(35, 1, 73, 'qaweqweasdasd', '1.00', 1),
(36, 1, 74, 'qaweqweasdasd', '1.00', 1),
(37, 1, 74, 'asdasdasda', '1.00', 1),
(38, 1, 74, 'asdasdasda', '1.00', 1),
(39, 1, 75, 'asdasdasda', '20.00', 1),
(40, 1, 76, 'qaweqweasdasd', '1.00', 1),
(41, 1, 77, 'qaweqweasdasd', '1.00', 1),
(42, 1, 78, 'qaweqweasdasd', '1.00', 1),
(43, 1, 79, 'qaweqweasdasd', '1.00', 1),
(44, 1, 80, 'qaweqweasdasd', '1.00', 1),
(45, 1, 81, 'qaweqweasdasd', '1.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_salida`
--

CREATE TABLE `detalle_salida` (
  `id` int(11) NOT NULL,
  `nro_docu` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_item` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `serie` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` decimal(12,2) NOT NULL,
  `fecha_regi` datetime NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_salida_af`
--

CREATE TABLE `detalle_salida_af` (
  `id` int(11) NOT NULL,
  `id_salida` int(11) NOT NULL,
  `id_almacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_mante_correctivo_af`
--

CREATE TABLE `det_mante_correctivo_af` (
  `id` int(11) NOT NULL,
  `fecha_alarma` date NOT NULL,
  `tiempo` int(11) NOT NULL,
  `motivo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_salida` int(11) NOT NULL,
  `id_mant_correctivo` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_mante_prevent_af`
--

CREATE TABLE `det_mante_prevent_af` (
  `id` int(11) NOT NULL,
  `fecha_alarma` date NOT NULL,
  `tiempo` int(11) NOT NULL,
  `motivo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_almacen` int(11) NOT NULL,
  `id_mant_preventivo` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `id` int(11) NOT NULL,
  `nro_factura` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_ingreso` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_regi` datetime NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor`
--

CREATE TABLE `distribuidor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `licencia` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_af`
--

CREATE TABLE `documento_af` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directorio` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `id_responsable` int(11) NOT NULL,
  `id_tipo_doc` int(11) NOT NULL,
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razon_social` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_af`
--

CREATE TABLE `empresa_af` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresa_af`
--

INSERT INTO `empresa_af` (`id`, `nombre`, `nit`, `descripcion`, `estado`) VALUES
(1, 'adasda', 3123123, 'asdasdasda', 1),
(2, 'Sergio Andre', 131232, 'qaweqweasdasdasdasdasdqwe', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flota`
--

CREATE TABLE `flota` (
  `id` int(11) NOT NULL,
  `tipo_vehiculo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placa` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia`
--

CREATE TABLE `guia` (
  `id` int(11) NOT NULL,
  `nro_guia` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_envi` date NOT NULL,
  `id_desp_pedi` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_af`
--

CREATE TABLE `ingreso_af` (
  `id` int(11) NOT NULL,
  `numero_doc` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directorio` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_reg` date NOT NULL,
  `tipo_doc` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tipo_ingr` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ingreso_af`
--

INSERT INTO `ingreso_af` (`id`, `numero_doc`, `directorio`, `fecha_reg`, `tipo_doc`, `id_tipo_ingr`, `id_sucursal`, `id_responsable`, `estado`) VALUES
(1, '012351', NULL, '2021-05-28', '', 1, 1, 1, 1),
(2, '21578', NULL, '2021-05-29', '', 1, 1, 1, 1),
(24, '123', NULL, '2021-05-30', NULL, 1, 1, 1, 1),
(25, '15424123', NULL, '2021-05-30', NULL, 1, 1, 1, 1),
(26, '123123123', NULL, '2021-05-30', '1', 1, 1, 1, 1),
(31, '123', NULL, '2021-05-30', '1', 1, 1, 1, 1),
(41, '1231', NULL, '2021-05-30', '2', 1, 1, 1, 1),
(42, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(43, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(44, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(45, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(46, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(47, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(48, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(49, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(50, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(51, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(52, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(53, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(54, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(55, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(56, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(57, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(58, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(59, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(60, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(61, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(62, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(63, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(64, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(65, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(66, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(67, '12312312', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(68, '15424', NULL, '2021-05-31', '3', 1, 1, 1, 1),
(69, '15424', NULL, '2021-05-31', '3', 1, 1, 1, 1),
(70, '15424', NULL, '2021-05-31', '3', 1, 1, 1, 1),
(71, '15424', NULL, '2021-05-31', '3', 1, 1, 1, 1),
(72, '15424', NULL, '2021-05-31', '3', 1, 1, 1, 1),
(73, '15424', NULL, '2021-05-31', '3', 1, 1, 1, 1),
(74, '15424', NULL, '2021-05-31', '3', 1, 1, 1, 1),
(75, '123123', NULL, '2021-05-31', '1', 1, 1, 1, 1),
(76, '11111', NULL, '2021-05-31', '3', 1, 1, 1, 1),
(77, '123123', NULL, '2021-06-03', '1', 1, 1, 1, 1),
(78, '11111111', NULL, '2021-06-03', '3', 1, 1, 1, 1),
(79, '15424', NULL, '2021-06-03', '1', 1, 1, 1, 1),
(80, '15424', NULL, '2021-06-03', '1', 1, 1, 1, 1),
(81, '123123', NULL, '2021-06-03', '1', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `id_corte` int(11) NOT NULL,
  `cod_item` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `serie` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_bodega` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operador` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `id_resplado` int(11) DEFAULT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario2`
--

CREATE TABLE `inventario2` (
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
  `estado` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_fisico_af`
--

CREATE TABLE `inventario_fisico_af` (
  `id` int(11) NOT NULL,
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
  `estado` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `codigo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_fabrica` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidad_med` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `minimo` int(11) NOT NULL,
  `maximo` int(11) NOT NULL,
  `vida_util` int(11) NOT NULL,
  `tiempo_bloq` int(11) NOT NULL,
  `tiempo_aler` int(11) NOT NULL,
  `rotacion_volu` int(11) NOT NULL,
  `rotacion_venc` int(11) NOT NULL,
  `cod_sbcategoria` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rotacion` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `tipo_item` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_af`
--

CREATE TABLE `item_af` (
  `id` int(11) NOT NULL,
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
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `item_af`
--

INSERT INTO `item_af` (`id`, `codigo`, `nombre`, `alto`, `ancho`, `largo`, `color`, `lote`, `tiempo_vida`, `control_mante`, `id_clasificacion`, `id_modelo`, `id_marca`, `estado`) VALUES
(1, '123', 'mesa', '12', '12', '12', 'rojo', '1253623', 12, NULL, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE `kardex` (
  `id` int(11) NOT NULL,
  `id_corte` int(11) NOT NULL,
  `cod_item` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `serie` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_bodega` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_reg` datetime NOT NULL,
  `id_respaldo` int(11) DEFAULT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex2`
--

CREATE TABLE `kardex2` (
  `id` int(11) NOT NULL,
  `cod_item` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `cantidad` decimal(15,2) DEFAULT NULL,
  `observacion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_bodega` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_respaldo` int(11) DEFAULT NULL,
  `id_corte` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_correct_af`
--

CREATE TABLE `mantenimiento_correct_af` (
  `id` int(11) NOT NULL,
  `fecha_salida` date NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_prev_af`
--

CREATE TABLE `mantenimiento_prev_af` (
  `id` int(11) NOT NULL,
  `fecha_salida` date NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_af`
--

CREATE TABLE `marca_af` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marca_af`
--

INSERT INTO `marca_af` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'nuevo', 'nueva marca', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_properties` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `generated_conversions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsive_images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_13_211816_create_almacen_activo_af_table', 1),
(5, '2021_05_13_211816_create_almacen_table', 1),
(6, '2021_05_13_211816_create_area_af_table', 1),
(7, '2021_05_13_211816_create_asignacion_table', 1),
(8, '2021_05_13_211816_create_bodega_table', 1),
(9, '2021_05_13_211816_create_calificacion_acti_af_table', 1),
(10, '2021_05_13_211816_create_categoria_table', 1),
(11, '2021_05_13_211816_create_ciudad_table', 1),
(12, '2021_05_13_211816_create_cliente_table', 1),
(13, '2021_05_13_211816_create_consolidado_salidas_table', 1),
(14, '2021_05_13_211816_create_consolidado_table', 1),
(15, '2021_05_13_211816_create_corte_almacen_af_table', 1),
(16, '2021_05_13_211816_create_corte_inventario_af_table', 1),
(17, '2021_05_13_211816_create_corte_sgla_table', 1),
(18, '2021_05_13_211816_create_corte_table', 1),
(19, '2021_05_13_211816_create_departamento_af_table', 1),
(20, '2021_05_13_211816_create_despacho_pedi_table', 1),
(21, '2021_05_13_211816_create_despacho_table', 1),
(22, '2021_05_13_211816_create_det_mante_correctivo_af_table', 1),
(23, '2021_05_13_211816_create_det_mante_prevent_af_table', 1),
(24, '2021_05_13_211816_create_detalle_asig_af_table', 1),
(25, '2021_05_13_211816_create_detalle_devolucion_table', 1),
(26, '2021_05_13_211816_create_detalle_ingr_af_table', 1),
(27, '2021_05_13_211816_create_detalle_ingreso_table', 1),
(28, '2021_05_13_211816_create_detalle_salida_af_table', 1),
(29, '2021_05_13_211816_create_detalle_salida_table', 1),
(30, '2021_05_13_211816_create_devolucion_table', 1),
(31, '2021_05_13_211816_create_distribuidor_table', 1),
(32, '2021_05_13_211816_create_documento_af_table', 1),
(33, '2021_05_13_211816_create_empresa_af_table', 1),
(34, '2021_05_13_211816_create_empresa_table', 1),
(35, '2021_05_13_211816_create_flota_table', 1),
(36, '2021_05_13_211816_create_funciones_table', 1),
(37, '2021_05_13_211816_create_grupo_table', 1),
(38, '2021_05_13_211816_create_guia_table', 1),
(39, '2021_05_13_211816_create_ingreso_af_table', 1),
(40, '2021_05_13_211816_create_inventario2_table', 1),
(41, '2021_05_13_211816_create_inventario_fisico_af_table', 1),
(42, '2021_05_13_211816_create_inventario_table', 1),
(43, '2021_05_13_211816_create_item_af_table', 1),
(44, '2021_05_13_211816_create_item_table', 1),
(45, '2021_05_13_211816_create_kardex2_table', 1),
(46, '2021_05_13_211816_create_kardex_table', 1),
(47, '2021_05_13_211816_create_mantenimiento_correct_af_table', 1),
(48, '2021_05_13_211816_create_mantenimiento_prev_af_table', 1),
(49, '2021_05_13_211816_create_marca_af_table', 1),
(50, '2021_05_13_211816_create_media_table', 1),
(51, '2021_05_13_211816_create_modelo_af_table', 1),
(52, '2021_05_13_211816_create_movimientos_table', 1),
(53, '2021_05_13_211816_create_nota_ingreso_table', 1),
(54, '2021_05_13_211816_create_nota_salida_table', 1),
(55, '2021_05_13_211816_create_operador_movil_table', 1),
(56, '2021_05_13_211816_create_packing_not_salida_table', 1),
(57, '2021_05_13_211816_create_permisos_table', 1),
(58, '2021_05_13_211816_create_picking_consolidado_table', 1),
(59, '2021_05_13_211816_create_picking_not_salida_table', 1),
(60, '2021_05_13_211816_create_proveedor_af_table', 1),
(61, '2021_05_13_211816_create_proveedor_table', 1),
(62, '2021_05_13_211816_create_rack_table', 1),
(63, '2021_05_13_211816_create_respaldo_table', 1),
(64, '2021_05_13_211816_create_responsable_af_table', 1),
(65, '2021_05_13_211816_create_salida_af_table', 1),
(66, '2021_05_13_211816_create_sector_af_table', 1),
(67, '2021_05_13_211816_create_subcategoria_table', 1),
(68, '2021_05_13_211816_create_sucursal_af_table', 1),
(69, '2021_05_13_211816_create_sucursal_table', 1),
(70, '2021_05_13_211816_create_tem_nota_salida_table', 1),
(71, '2021_05_13_211816_create_temp_clientes_table', 1),
(72, '2021_05_13_211816_create_tipo_documento_af_table', 1),
(73, '2021_05_13_211816_create_tipo_ingreso_af_table', 1),
(74, '2021_05_13_211816_create_tipo_movimiento_table', 1),
(75, '2021_05_13_211816_create_tipo_resp_af_table', 1),
(76, '2021_05_13_211816_create_tipo_salida_af_table', 1),
(77, '2021_05_13_211816_create_turno_af_table', 1),
(78, '2021_05_13_211816_create_ubicacion_table', 1),
(79, '2021_05_13_211816_create_user_pc_table', 1),
(80, '2021_05_13_211817_add_foreign_keys_to_almacen_activo_af_table', 1),
(81, '2021_05_13_211817_add_foreign_keys_to_almacen_table', 1),
(82, '2021_05_13_211817_add_foreign_keys_to_asignacion_table', 1),
(83, '2021_05_13_211817_add_foreign_keys_to_bodega_table', 1),
(84, '2021_05_13_211817_add_foreign_keys_to_corte_almacen_af_table', 1),
(85, '2021_05_13_211817_add_foreign_keys_to_corte_sgla_table', 1),
(86, '2021_05_13_211817_add_foreign_keys_to_corte_table', 1),
(87, '2021_05_13_211817_add_foreign_keys_to_despacho_pedi_table', 1),
(88, '2021_05_13_211817_add_foreign_keys_to_despacho_table', 1),
(89, '2021_05_13_211817_add_foreign_keys_to_det_mante_correctivo_af_table', 1),
(90, '2021_05_13_211817_add_foreign_keys_to_det_mante_prevent_af_table', 1),
(91, '2021_05_13_211817_add_foreign_keys_to_detalle_asig_af_table', 1),
(92, '2021_05_13_211817_add_foreign_keys_to_detalle_devolucion_table', 1),
(93, '2021_05_13_211817_add_foreign_keys_to_detalle_ingr_af_table', 1),
(94, '2021_05_13_211817_add_foreign_keys_to_detalle_ingreso_table', 1),
(95, '2021_05_13_211817_add_foreign_keys_to_detalle_salida_af_table', 1),
(96, '2021_05_13_211817_add_foreign_keys_to_detalle_salida_table', 1),
(97, '2021_05_13_211817_add_foreign_keys_to_devolucion_table', 1),
(98, '2021_05_13_211817_add_foreign_keys_to_documento_af_table', 1),
(99, '2021_05_13_211817_add_foreign_keys_to_guia_table', 1),
(100, '2021_05_13_211817_add_foreign_keys_to_ingreso_af_table', 1),
(101, '2021_05_13_211817_add_foreign_keys_to_inventario2_table', 1),
(102, '2021_05_13_211817_add_foreign_keys_to_inventario_table', 1),
(103, '2021_05_13_211817_add_foreign_keys_to_item_af_table', 1),
(104, '2021_05_13_211817_add_foreign_keys_to_item_table', 1),
(105, '2021_05_13_211817_add_foreign_keys_to_kardex2_table', 1),
(106, '2021_05_13_211817_add_foreign_keys_to_kardex_table', 1),
(107, '2021_05_13_211817_add_foreign_keys_to_movimientos_table', 1),
(108, '2021_05_13_211817_add_foreign_keys_to_nota_ingreso_table', 1),
(109, '2021_05_13_211817_add_foreign_keys_to_packing_not_salida_table', 1),
(110, '2021_05_13_211817_add_foreign_keys_to_permisos_table', 1),
(111, '2021_05_13_211817_add_foreign_keys_to_picking_consolidado_table', 1),
(112, '2021_05_13_211817_add_foreign_keys_to_picking_not_salida_table', 1),
(113, '2021_05_13_211817_add_foreign_keys_to_rack_table', 1),
(114, '2021_05_13_211817_add_foreign_keys_to_responsable_af_table', 1),
(115, '2021_05_13_211817_add_foreign_keys_to_salida_af_table', 1),
(116, '2021_05_13_211817_add_foreign_keys_to_sector_af_table', 1),
(117, '2021_05_13_211817_add_foreign_keys_to_subcategoria_table', 1),
(118, '2021_05_13_211817_add_foreign_keys_to_sucursal_af_table', 1),
(119, '2021_05_13_211817_add_foreign_keys_to_sucursal_table', 1),
(120, '2021_05_13_211817_add_foreign_keys_to_user_pc_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo_af`
--

CREATE TABLE `modelo_af` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modelo_af`
--

INSERT INTO `modelo_af` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'nuevo', 'nuevo modelo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` int(11) NOT NULL,
  `cod_item` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `serie` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` decimal(12,2) NOT NULL,
  `id_almacen` int(11) NOT NULL,
  `ubi_origen` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubi_destino` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_regi` datetime NOT NULL,
  `tipo_movi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_ingreso`
--

CREATE TABLE `nota_ingreso` (
  `id` int(11) NOT NULL,
  `nro_doc` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_ingr` datetime NOT NULL,
  `movimiento` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suc_origen` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fec_registro` datetime NOT NULL,
  `idalmacen` int(11) NOT NULL,
  `id_origen` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_salida`
--

CREATE TABLE `nota_salida` (
  `id` int(11) NOT NULL,
  `nro_docu` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_emis` datetime NOT NULL,
  `prioridad` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programacion` smallint(6) NOT NULL,
  `cod_cliente` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_movimiento` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_consolidado` int(11) DEFAULT NULL,
  `cod_vendedor` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `estado` smallint(6) NOT NULL,
  `raz_social` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_destino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operador_movil`
--

CREATE TABLE `operador_movil` (
  `id` int(11) NOT NULL,
  `cuenta` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasenia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL,
  `idalmacen` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `packing_not_salida`
--

CREATE TABLE `packing_not_salida` (
  `id` int(11) NOT NULL,
  `nro_docu` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_item` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `serie` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` decimal(12,2) NOT NULL,
  `nro_paquete` int(11) NOT NULL,
  `tipo_paquete` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_regi` datetime NOT NULL,
  `estado` smallint(6) NOT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_tipo` int(11) NOT NULL,
  `id_funciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `picking_consolidado`
--

CREATE TABLE `picking_consolidado` (
  `id` int(11) NOT NULL,
  `cod_item` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `serie` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` decimal(12,2) NOT NULL,
  `cant_picking` decimal(12,2) NOT NULL,
  `ubicacion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_regi` datetime NOT NULL,
  `fecha_pick` datetime DEFAULT NULL,
  `id_consolidado` int(11) NOT NULL,
  `id_almacen` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `picking_not_salida`
--

CREATE TABLE `picking_not_salida` (
  `id` int(11) NOT NULL,
  `nro_docu` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_item` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `serie` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` decimal(12,2) NOT NULL,
  `cant_picking` decimal(12,2) DEFAULT NULL,
  `fecha_regi` datetime NOT NULL,
  `fecha_pick` datetime DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nit` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razon_social` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_af`
--

CREATE TABLE `proveedor_af` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razon_social` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nit` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rack`
--

CREATE TABLE `rack` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacidad_max` int(11) NOT NULL,
  `cantidad_fila` int(11) NOT NULL,
  `cantidad_colu` int(11) NOT NULL,
  `id_bodega` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respaldo`
--

CREATE TABLE `respaldo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable_af`
--

CREATE TABLE `responsable_af` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_resp` int(11) NOT NULL,
  `id_sector` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL,
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `responsable_af`
--

INSERT INTO `responsable_af` (`id`, `nombre`, `apellido`, `ci`, `telefono`, `direccion`, `tipo_resp`, `id_sector`, `id_turno`, `estado`) VALUES
(1, 'sergio', 'garcia', 8873352, 69022766, 'km9 doble via la guardia', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_af`
--

CREATE TABLE `salida_af` (
  `id` int(11) NOT NULL,
  `origen_suc` int(11) NOT NULL,
  `destino_suc` int(11) DEFAULT NULL,
  `descipcion` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector_af`
--

CREATE TABLE `sector_af` (
  `id` int(11) NOT NULL,
  `codigo` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_area` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sector_af`
--

INSERT INTO `sector_af` (`id`, `codigo`, `id_area`, `nombre`, `descripcion`, `estado`) VALUES
(1, '0', 1, 'gerente', 'gerente de sistema', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id` int(11) NOT NULL,
  `codigo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_categoria` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inventario` smallint(6) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal_af`
--

CREATE TABLE `sucursal_af` (
  `id` int(11) NOT NULL,
  `codigo` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sucursal_af`
--

INSERT INTO `sucursal_af` (`id`, `codigo`, `descripcion`, `id_empresa`, `id_departamento`, `estado`) VALUES
(1, '12', 'Nueva Sucursal', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_clientes`
--

CREATE TABLE `temp_clientes` (
  `id` int(11) NOT NULL,
  `codigo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci_nit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raz_social` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tem_nota_salida`
--

CREATE TABLE `tem_nota_salida` (
  `id` int(11) NOT NULL,
  `cod_cliente` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_vendedor` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tip_movimiento` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_documento` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `serie` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` decimal(12,2) NOT NULL,
  `ubicacion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raz_social` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento_af`
--

CREATE TABLE `tipo_documento_af` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ingreso_af`
--

CREATE TABLE `tipo_ingreso_af` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_ingreso_af`
--

INSERT INTO `tipo_ingreso_af` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Compra', 'Ingreso por Compra', 1),
(2, 'Transferencia', 'Ingreso por Transferencia', 1),
(3, 'Mantenimiento', 'Ingreso por Mantenimiento', 1),
(4, 'Donación', 'Ingreso por Donación', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimiento`
--

CREATE TABLE `tipo_movimiento` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` smallint(6) NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_resp_af`
--

CREATE TABLE `tipo_resp_af` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_resp_af`
--

INSERT INTO `tipo_resp_af` (`id`, `descripcion`, `estado`) VALUES
(1, 'Administrador', 1),
(2, 'Encargado', 1),
(3, 'Colaborador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_salida_af`
--

CREATE TABLE `tipo_salida_af` (
  `id` int(11) NOT NULL,
  `codigo` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno_af`
--

CREATE TABLE `turno_af` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horario_ini` time NOT NULL,
  `horario_fin` time NOT NULL,
  `estado` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `turno_af`
--

INSERT INTO `turno_af` (`id`, `descripcion`, `horario_ini`, `horario_fin`, `estado`) VALUES
(1, '24/7', '00:00:00', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_area` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_rack` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_colu` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_fila` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posicion` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rack` int(11) NOT NULL,
  `estado` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sergio', 'sagarcia957@gmail.com', NULL, '$2y$10$VuexkVknxPZMOh.B5aGm.OsLNol1sr0wrqx9Q.EDUICGe9hwFOOzC', NULL, '2021-05-19 00:08:28', '2021-05-19 00:08:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_pc`
--

CREATE TABLE `user_pc` (
  `id` int(11) NOT NULL,
  `cuenta` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasenia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  `id_almacen` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_ubicacion` (`cod_ubicacion`);

--
-- Indices de la tabla `almacen_activo_af`
--
ALTER TABLE `almacen_activo_af`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_det_ingreso` (`id_det_ingreso`);

--
-- Indices de la tabla `area_af`
--
ALTER TABLE `area_af`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id_corte`,`id_usuario`),
  ADD KEY `id_corte` (`id_corte`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- Indices de la tabla `calificacion_acti_af`
--
ALTER TABLE `calificacion_acti_af`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ_categoria_codigo` (`codigo`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ_cliente_codigo` (`codigo`);

--
-- Indices de la tabla `consolidado`
--
ALTER TABLE `consolidado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consolidado_salidas`
--
ALTER TABLE `consolidado_salidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `corte`
--
ALTER TABLE `corte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- Indices de la tabla `corte_almacen_af`
--
ALTER TABLE `corte_almacen_af`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_corte_inv` (`id_corte_inv`);

--
-- Indices de la tabla `corte_inventario_af`
--
ALTER TABLE `corte_inventario_af`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `corte_sgla`
--
ALTER TABLE `corte_sgla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_corte` (`id_corte`);

--
-- Indices de la tabla `departamento_af`
--
ALTER TABLE `departamento_af`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `despacho`
--
ALTER TABLE `despacho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_distribuidor` (`id_distribuidor`),
  ADD KEY `id_flota` (`id_flota`);

--
-- Indices de la tabla `despacho_pedi`
--
ALTER TABLE `despacho_pedi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_despacho` (`id_despacho`),
  ADD KEY `nro_docu` (`nro_docu`);

--
-- Indices de la tabla `detalle_asig_af`
--
ALTER TABLE `detalle_asig_af`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_almacen_act` (`id_almacen_act`),
  ADD KEY `id_documento` (`id_documento`);

--
-- Indices de la tabla `detalle_devolucion`
--
ALTER TABLE `detalle_devolucion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_devolucion` (`id_devolucion`);

--
-- Indices de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nro_doc` (`nro_doc`),
  ADD KEY `cod_item` (`cod_item`);

--
-- Indices de la tabla `detalle_ingr_af`
--
ALTER TABLE `detalle_ingr_af`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_ingreso` (`id_ingreso`);

--
-- Indices de la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nro_docu` (`nro_docu`);

--
-- Indices de la tabla `detalle_salida_af`
--
ALTER TABLE `detalle_salida_af`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_salida` (`id_salida`),
  ADD KEY `id_almacen` (`id_almacen`);

--
-- Indices de la tabla `det_mante_correctivo_af`
--
ALTER TABLE `det_mante_correctivo_af`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_salida` (`id_salida`),
  ADD KEY `id_mant_correctivo` (`id_mant_correctivo`);

--
-- Indices de la tabla `det_mante_prevent_af`
--
ALTER TABLE `det_mante_prevent_af`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_almacen` (`id_almacen`),
  ADD KEY `id_mant_preventivo` (`id_mant_preventivo`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nro_ingreso` (`nro_ingreso`);

--
-- Indices de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documento_af`
--
ALTER TABLE `documento_af`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_responsable` (`id_responsable`),
  ADD KEY `id_tipo_doc` (`id_tipo_doc`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ_empresa_nit` (`nit`);

--
-- Indices de la tabla `empresa_af`
--
ALTER TABLE `empresa_af`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nit` (`nit`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `flota`
--
ALTER TABLE `flota`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `guia`
--
ALTER TABLE `guia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_desp_pedi` (`id_desp_pedi`);

--
-- Indices de la tabla `ingreso_af`
--
ALTER TABLE `ingreso_af`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_ingr` (`id_tipo_ingr`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `id_responsable` (`id_responsable`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_corte` (`id_corte`);

--
-- Indices de la tabla `inventario2`
--
ALTER TABLE `inventario2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_corte` (`id_corte`);

--
-- Indices de la tabla `inventario_fisico_af`
--
ALTER TABLE `inventario_fisico_af`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ_item_codigo` (`codigo`),
  ADD KEY `cod_sbcategoria` (`cod_sbcategoria`);

--
-- Indices de la tabla `item_af`
--
ALTER TABLE `item_af`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_clasificacion` (`id_clasificacion`),
  ADD KEY `id_modelo` (`id_modelo`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_corte` (`id_corte`),
  ADD KEY `cod_item` (`cod_item`);

--
-- Indices de la tabla `kardex2`
--
ALTER TABLE `kardex2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_item` (`cod_item`),
  ADD KEY `id_corte` (`id_corte`);

--
-- Indices de la tabla `mantenimiento_correct_af`
--
ALTER TABLE `mantenimiento_correct_af`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mantenimiento_prev_af`
--
ALTER TABLE `mantenimiento_prev_af`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca_af`
--
ALTER TABLE `marca_af`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelo_af`
--
ALTER TABLE `modelo_af`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_almacen` (`id_almacen`);

--
-- Indices de la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ_nota_ingreso_nro_doc` (`nro_doc`),
  ADD KEY `movimiento` (`movimiento`);

--
-- Indices de la tabla `nota_salida`
--
ALTER TABLE `nota_salida`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ_nota_salida_nro_docu` (`nro_docu`);

--
-- Indices de la tabla `operador_movil`
--
ALTER TABLE `operador_movil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `packing_not_salida`
--
ALTER TABLE `packing_not_salida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nro_docu` (`nro_docu`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_tipo`,`id_funciones`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_funciones` (`id_funciones`);

--
-- Indices de la tabla `picking_consolidado`
--
ALTER TABLE `picking_consolidado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_consolidado` (`id_consolidado`),
  ADD KEY `id_almacen` (`id_almacen`);

--
-- Indices de la tabla `picking_not_salida`
--
ALTER TABLE `picking_not_salida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nro_docu` (`nro_docu`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor_af`
--
ALTER TABLE `proveedor_af`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nit` (`nit`);

--
-- Indices de la tabla `rack`
--
ALTER TABLE `rack`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bodega` (`id_bodega`);

--
-- Indices de la tabla `respaldo`
--
ALTER TABLE `respaldo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `responsable_af`
--
ALTER TABLE `responsable_af`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ci` (`ci`),
  ADD KEY `tipo_resp` (`tipo_resp`),
  ADD KEY `id_sector` (`id_sector`),
  ADD KEY `id_turno` (`id_turno`);

--
-- Indices de la tabla `salida_af`
--
ALTER TABLE `salida_af`
  ADD PRIMARY KEY (`id`),
  ADD KEY `origen_suc` (`origen_suc`);

--
-- Indices de la tabla `sector_af`
--
ALTER TABLE `sector_af`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_area` (`id_area`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ_subcategoria_codigo` (`codigo`),
  ADD KEY `cod_categoria` (`cod_categoria`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ciudad` (`id_ciudad`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `sucursal_af`
--
ALTER TABLE `sucursal_af`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `temp_clientes`
--
ALTER TABLE `temp_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tem_nota_salida`
--
ALTER TABLE `tem_nota_salida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento_af`
--
ALTER TABLE `tipo_documento_af`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_ingreso_af`
--
ALTER TABLE `tipo_ingreso_af`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ_tipo_movimiento_codigo` (`codigo`);

--
-- Indices de la tabla `tipo_resp_af`
--
ALTER TABLE `tipo_resp_af`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_salida_af`
--
ALTER TABLE `tipo_salida_af`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `turno_af`
--
ALTER TABLE `turno_af`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ_ubicacion_codigo` (`codigo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_pc`
--
ALTER TABLE `user_pc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `almacen_activo_af`
--
ALTER TABLE `almacen_activo_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `area_af`
--
ALTER TABLE `area_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bodega`
--
ALTER TABLE `bodega`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calificacion_acti_af`
--
ALTER TABLE `calificacion_acti_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consolidado`
--
ALTER TABLE `consolidado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consolidado_salidas`
--
ALTER TABLE `consolidado_salidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `corte`
--
ALTER TABLE `corte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `corte_almacen_af`
--
ALTER TABLE `corte_almacen_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `corte_inventario_af`
--
ALTER TABLE `corte_inventario_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `corte_sgla`
--
ALTER TABLE `corte_sgla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento_af`
--
ALTER TABLE `departamento_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `despacho`
--
ALTER TABLE `despacho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `despacho_pedi`
--
ALTER TABLE `despacho_pedi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_asig_af`
--
ALTER TABLE `detalle_asig_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_devolucion`
--
ALTER TABLE `detalle_devolucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_ingr_af`
--
ALTER TABLE `detalle_ingr_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_salida_af`
--
ALTER TABLE `detalle_salida_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `det_mante_correctivo_af`
--
ALTER TABLE `det_mante_correctivo_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `det_mante_prevent_af`
--
ALTER TABLE `det_mante_prevent_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documento_af`
--
ALTER TABLE `documento_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa_af`
--
ALTER TABLE `empresa_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `flota`
--
ALTER TABLE `flota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `guia`
--
ALTER TABLE `guia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingreso_af`
--
ALTER TABLE `ingreso_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_fisico_af`
--
ALTER TABLE `inventario_fisico_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `item_af`
--
ALTER TABLE `item_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `kardex2`
--
ALTER TABLE `kardex2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimiento_correct_af`
--
ALTER TABLE `mantenimiento_correct_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimiento_prev_af`
--
ALTER TABLE `mantenimiento_prev_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca_af`
--
ALTER TABLE `marca_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `modelo_af`
--
ALTER TABLE `modelo_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota_salida`
--
ALTER TABLE `nota_salida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `operador_movil`
--
ALTER TABLE `operador_movil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `packing_not_salida`
--
ALTER TABLE `packing_not_salida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `picking_consolidado`
--
ALTER TABLE `picking_consolidado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `picking_not_salida`
--
ALTER TABLE `picking_not_salida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor_af`
--
ALTER TABLE `proveedor_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rack`
--
ALTER TABLE `rack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respaldo`
--
ALTER TABLE `respaldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `responsable_af`
--
ALTER TABLE `responsable_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `salida_af`
--
ALTER TABLE `salida_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sector_af`
--
ALTER TABLE `sector_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursal_af`
--
ALTER TABLE `sucursal_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `temp_clientes`
--
ALTER TABLE `temp_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tem_nota_salida`
--
ALTER TABLE `tem_nota_salida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_documento_af`
--
ALTER TABLE `tipo_documento_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_ingreso_af`
--
ALTER TABLE `tipo_ingreso_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_resp_af`
--
ALTER TABLE `tipo_resp_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_salida_af`
--
ALTER TABLE `tipo_salida_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `turno_af`
--
ALTER TABLE `turno_af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_pc`
--
ALTER TABLE `user_pc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD CONSTRAINT `FK_almacen_ubicacion` FOREIGN KEY (`cod_ubicacion`) REFERENCES `ubicacion` (`codigo`);

--
-- Filtros para la tabla `almacen_activo_af`
--
ALTER TABLE `almacen_activo_af`
  ADD CONSTRAINT `almacen_activo_af_ibfk_1` FOREIGN KEY (`id_det_ingreso`) REFERENCES `detalle_ingr_af` (`id`);

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `FK_asignacion_corte` FOREIGN KEY (`id_corte`) REFERENCES `corte` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_asignacion_operador_movil` FOREIGN KEY (`id_usuario`) REFERENCES `operador_movil` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD CONSTRAINT `FK_bodega_sucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `corte`
--
ALTER TABLE `corte`
  ADD CONSTRAINT `FK_corte_sucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `corte_almacen_af`
--
ALTER TABLE `corte_almacen_af`
  ADD CONSTRAINT `corte_almacen_af_ibfk_1` FOREIGN KEY (`id_corte_inv`) REFERENCES `corte_inventario_af` (`id`);

--
-- Filtros para la tabla `corte_sgla`
--
ALTER TABLE `corte_sgla`
  ADD CONSTRAINT `FK_corte_sgla_corte` FOREIGN KEY (`id_corte`) REFERENCES `corte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `despacho`
--
ALTER TABLE `despacho`
  ADD CONSTRAINT `FK_despacho_distribuidor` FOREIGN KEY (`id_distribuidor`) REFERENCES `distribuidor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_despacho_flota` FOREIGN KEY (`id_flota`) REFERENCES `flota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `despacho_pedi`
--
ALTER TABLE `despacho_pedi`
  ADD CONSTRAINT `FK_despacho_pedi_despacho` FOREIGN KEY (`id_despacho`) REFERENCES `despacho` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_despacho_pedi_nota_salida` FOREIGN KEY (`nro_docu`) REFERENCES `nota_salida` (`nro_docu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_asig_af`
--
ALTER TABLE `detalle_asig_af`
  ADD CONSTRAINT `detalle_asig_af_ibfk_1` FOREIGN KEY (`id_almacen_act`) REFERENCES `almacen_activo_af` (`id`),
  ADD CONSTRAINT `detalle_asig_af_ibfk_2` FOREIGN KEY (`id_documento`) REFERENCES `documento_af` (`id`);

--
-- Filtros para la tabla `detalle_devolucion`
--
ALTER TABLE `detalle_devolucion`
  ADD CONSTRAINT `FK_detalle_devolucion_devolucion` FOREIGN KEY (`id_devolucion`) REFERENCES `devolucion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD CONSTRAINT `FK_detalle_ingreso_item` FOREIGN KEY (`cod_item`) REFERENCES `item` (`codigo`),
  ADD CONSTRAINT `FK_detalle_ingreso_nota_ingreso` FOREIGN KEY (`nro_doc`) REFERENCES `nota_ingreso` (`nro_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_ingr_af`
--
ALTER TABLE `detalle_ingr_af`
  ADD CONSTRAINT `detalle_ingr_af_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `item_af` (`id`),
  ADD CONSTRAINT `detalle_ingr_af_ibfk_2` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso_af` (`id`);

--
-- Filtros para la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  ADD CONSTRAINT `FK_detalle_salida_nota_salida` FOREIGN KEY (`nro_docu`) REFERENCES `nota_salida` (`nro_docu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_salida_af`
--
ALTER TABLE `detalle_salida_af`
  ADD CONSTRAINT `detalle_salida_af_ibfk_1` FOREIGN KEY (`id_salida`) REFERENCES `salida_af` (`id`),
  ADD CONSTRAINT `detalle_salida_af_ibfk_2` FOREIGN KEY (`id_almacen`) REFERENCES `almacen_activo_af` (`id`);

--
-- Filtros para la tabla `det_mante_correctivo_af`
--
ALTER TABLE `det_mante_correctivo_af`
  ADD CONSTRAINT `det_mante_correctivo_af_ibfk_1` FOREIGN KEY (`id_salida`) REFERENCES `salida_af` (`id`),
  ADD CONSTRAINT `det_mante_correctivo_af_ibfk_2` FOREIGN KEY (`id_mant_correctivo`) REFERENCES `mantenimiento_correct_af` (`id`);

--
-- Filtros para la tabla `det_mante_prevent_af`
--
ALTER TABLE `det_mante_prevent_af`
  ADD CONSTRAINT `det_mante_prevent_af_ibfk_1` FOREIGN KEY (`id_almacen`) REFERENCES `almacen_activo_af` (`id`),
  ADD CONSTRAINT `det_mante_prevent_af_ibfk_2` FOREIGN KEY (`id_mant_preventivo`) REFERENCES `mantenimiento_prev_af` (`id`);

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `FK_devolucion_nota_ingreso` FOREIGN KEY (`nro_ingreso`) REFERENCES `nota_ingreso` (`nro_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `documento_af`
--
ALTER TABLE `documento_af`
  ADD CONSTRAINT `documento_af_ibfk_1` FOREIGN KEY (`id_responsable`) REFERENCES `responsable_af` (`id`),
  ADD CONSTRAINT `documento_af_ibfk_2` FOREIGN KEY (`id_tipo_doc`) REFERENCES `tipo_documento_af` (`id`);

--
-- Filtros para la tabla `guia`
--
ALTER TABLE `guia`
  ADD CONSTRAINT `FK_guia_despacho_pedi` FOREIGN KEY (`id_desp_pedi`) REFERENCES `despacho_pedi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingreso_af`
--
ALTER TABLE `ingreso_af`
  ADD CONSTRAINT `ingreso_af_ibfk_1` FOREIGN KEY (`id_tipo_ingr`) REFERENCES `tipo_ingreso_af` (`id`),
  ADD CONSTRAINT `ingreso_af_ibfk_2` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal_af` (`id`),
  ADD CONSTRAINT `ingreso_af_ibfk_3` FOREIGN KEY (`id_responsable`) REFERENCES `responsable_af` (`id`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `FK_inventario_corte` FOREIGN KEY (`id_corte`) REFERENCES `corte` (`id`);

--
-- Filtros para la tabla `inventario2`
--
ALTER TABLE `inventario2`
  ADD CONSTRAINT `FK_inventario2_corte` FOREIGN KEY (`id_corte`) REFERENCES `corte` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_item_subcategoria` FOREIGN KEY (`cod_sbcategoria`) REFERENCES `subcategoria` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `item_af`
--
ALTER TABLE `item_af`
  ADD CONSTRAINT `item_af_ibfk_1` FOREIGN KEY (`id_clasificacion`) REFERENCES `calificacion_acti_af` (`id`),
  ADD CONSTRAINT `item_af_ibfk_2` FOREIGN KEY (`id_modelo`) REFERENCES `modelo_af` (`id`),
  ADD CONSTRAINT `item_af_ibfk_3` FOREIGN KEY (`id_marca`) REFERENCES `marca_af` (`id`);

--
-- Filtros para la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD CONSTRAINT `FK_kardex_corte` FOREIGN KEY (`id_corte`) REFERENCES `corte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_kardex_item` FOREIGN KEY (`cod_item`) REFERENCES `item` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `kardex2`
--
ALTER TABLE `kardex2`
  ADD CONSTRAINT `FK_kardex2_corte` FOREIGN KEY (`id_corte`) REFERENCES `corte` (`id`),
  ADD CONSTRAINT `FK_kardex2_item` FOREIGN KEY (`cod_item`) REFERENCES `item` (`codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `FK_movimientos_almacen` FOREIGN KEY (`id_almacen`) REFERENCES `almacen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  ADD CONSTRAINT `FK_nota_ingreso_tipo_movimiento` FOREIGN KEY (`movimiento`) REFERENCES `tipo_movimiento` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `packing_not_salida`
--
ALTER TABLE `packing_not_salida`
  ADD CONSTRAINT `FK_packing_pedido_nota_salida` FOREIGN KEY (`nro_docu`) REFERENCES `nota_salida` (`nro_docu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `FK_permisos_funciones` FOREIGN KEY (`id_funciones`) REFERENCES `funciones` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_permisos_grupo` FOREIGN KEY (`id_tipo`) REFERENCES `grupo` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `picking_consolidado`
--
ALTER TABLE `picking_consolidado`
  ADD CONSTRAINT `FK_picking_consolidado_almacen` FOREIGN KEY (`id_almacen`) REFERENCES `almacen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_picking_consolidado_consolidado` FOREIGN KEY (`id_consolidado`) REFERENCES `consolidado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `picking_not_salida`
--
ALTER TABLE `picking_not_salida`
  ADD CONSTRAINT `FK_picking_pedido_nota_salida` FOREIGN KEY (`nro_docu`) REFERENCES `nota_salida` (`nro_docu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rack`
--
ALTER TABLE `rack`
  ADD CONSTRAINT `FK_rack_bodega` FOREIGN KEY (`id_bodega`) REFERENCES `bodega` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `responsable_af`
--
ALTER TABLE `responsable_af`
  ADD CONSTRAINT `responsable_af_ibfk_1` FOREIGN KEY (`tipo_resp`) REFERENCES `tipo_resp_af` (`id`),
  ADD CONSTRAINT `responsable_af_ibfk_2` FOREIGN KEY (`id_sector`) REFERENCES `sector_af` (`id`),
  ADD CONSTRAINT `responsable_af_ibfk_3` FOREIGN KEY (`id_turno`) REFERENCES `turno_af` (`id`);

--
-- Filtros para la tabla `salida_af`
--
ALTER TABLE `salida_af`
  ADD CONSTRAINT `salida_af_ibfk_1` FOREIGN KEY (`origen_suc`) REFERENCES `sucursal` (`id`);

--
-- Filtros para la tabla `sector_af`
--
ALTER TABLE `sector_af`
  ADD CONSTRAINT `sector_af_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area_af` (`id`);

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `FK_subcategoria_categoria` FOREIGN KEY (`cod_categoria`) REFERENCES `categoria` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `FK_sucursal_Ciudad` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sucursal_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursal_af`
--
ALTER TABLE `sucursal_af`
  ADD CONSTRAINT `sucursal_af_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa_af` (`id`),
  ADD CONSTRAINT `sucursal_af_ibfk_2` FOREIGN KEY (`id_departamento`) REFERENCES `departamento_af` (`id`);

--
-- Filtros para la tabla `user_pc`
--
ALTER TABLE `user_pc`
  ADD CONSTRAINT `FK_user_pc_grupo` FOREIGN KEY (`tipo`) REFERENCES `grupo` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
