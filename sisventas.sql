-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2018 a las 23:11:22
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_presentacion` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `nombre`, `descripcion`, `id_categoria`, `id_presentacion`, `created_at`, `updated_at`) VALUES
(4, 'Leche Lala', '<p>Leche condensada</p>', 4, 3, '2018-01-25 19:15:53', '2018-01-25 19:15:53'),
(5, 'Yogurt Carranco', '<p>Yogurt En bote</p>', 4, 3, '2018-01-25 19:26:38', '2018-01-25 19:26:38'),
(6, 'Sandía', '<p>Sand&iacute;a michoacana</p>', 5, 4, '2018-01-25 19:43:28', '2018-01-25 19:43:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(4, 'Lácteos', '', '2018-01-25 18:59:54', '2018-01-25 18:59:54'),
(5, 'Frutas y verduras', '', '2018-01-25 19:27:04', '2018-01-25 19:27:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `regimen_fiscal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_documento` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `numero_documento` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `razon_social`, `regimen_fiscal`, `tipo_documento`, `numero_documento`, `direccion`, `telefono`, `correo`, `created_at`, `updated_at`) VALUES
(4, 'Eléctrica Industrial Mireles', '601 - General de Ley Personas Morales', '3', '123654789', 'Av. Villa Florencia #269 Fracc. Villa Jardín', '8224563', 'correo@hotmail.com', '2018-01-05 23:38:59', '2018-01-05 19:56:43'),
(6, 'Zoppas Industries de México', '620 - Sociedades Cooperativas de Producción que optan por diferir sus ingresos', '4', '12365478964556', 'Av. villa #456 Fracc. Lomas', '12345678', 'correo@hotmail.com', '2018-01-06 01:13:42', '2018-01-06 01:13:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `fecha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` decimal(10,3) NOT NULL,
  `id_lote` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `precio_compra` decimal(10,3) NOT NULL,
  `precio_venta` decimal(10,3) NOT NULL,
  `tipo_moneda` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_cambio` decimal(10,3) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`id`, `nombre`, `precio_compra`, `precio_venta`, `tipo_moneda`, `tipo_cambio`, `id_articulo`, `id_proveedor`, `created_at`, `updated_at`) VALUES
(1, 'Lote USD', '23.690', '25.000', '1', '18.470', 4, 2, '2018-01-26 17:30:04', '2018-02-06 14:57:32'),
(2, 'Lote USD 2', '23.000', '25.500', '1', '18.525', 5, 2, '2018-02-06 16:11:28', '2018-02-06 16:11:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(3, 'Litro', '', '2018-01-25 19:00:10', '2018-01-25 19:00:10'),
(4, 'Pieza', '', '2018-01-25 19:27:24', '2018-01-25 19:27:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_documento` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `numero_documento` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `razon_social`, `tipo_documento`, `numero_documento`, `direccion`, `telefono`, `correo`, `created_at`, `updated_at`) VALUES
(2, 'Calcio las águilas S.A. de C.V.', '2', '123654789', 'Calle las águinlas, Colonia guayabos #239', '8326548', 'correo@gmail.com', '2018-01-08 18:45:00', '2018-01-26 20:36:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_presentacion` (`id_presentacion`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lote` (`id_lote`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articulo` (`id_articulo`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
