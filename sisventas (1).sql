-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-05-2018 a las 07:04:48
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(4, 'Leche Lala', '<p>1lt, Leche condensada, pasteurizada y homogenizada,</p>', 4, 3, '2018-01-25 19:15:53', '2018-05-09 19:02:59'),
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
-- Estructura de tabla para la tabla `cot_articulo`
--

CREATE TABLE `cot_articulo` (
  `id` int(11) NOT NULL,
  `id_cotizacion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_lote` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `cot_articulo`
--

INSERT INTO `cot_articulo` (`id`, `id_cotizacion`, `cantidad`, `id_lote`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, '2018-05-09 17:31:42', '2018-05-09 17:31:42'),
(2, 4, 2, 2, '2018-05-09 20:05:14', '2018-05-09 20:05:14'),
(5, 4, 1, 2, '2018-05-09 22:13:58', '2018-05-09 22:13:58'),
(8, 3, 1, 1, '2018-05-10 17:50:21', '2018-05-10 17:50:21'),
(9, 3, 1, 2, '2018-05-10 17:50:21', '2018-05-10 17:50:21'),
(10, 3, 5, 1, '2018-05-10 17:50:57', '2018-05-10 17:50:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cot_cotizacion`
--

CREATE TABLE `cot_cotizacion` (
  `id` int(11) NOT NULL,
  `receptor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_cotizacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_emision` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tiempo_entrega` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `condicion_pago` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vigencia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `iva` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `descuento` smallint(6) NOT NULL,
  `id_userEmisor` int(11) NOT NULL,
  `nota` text COLLATE utf8_unicode_ci NOT NULL,
  `aceptada` tinyint(1) NOT NULL,
  `fecha_aceptada` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rechazada` tinyint(1) NOT NULL,
  `fecha_rechazada` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `cot_cotizacion`
--

INSERT INTO `cot_cotizacion` (`id`, `receptor`, `no_cotizacion`, `id_cliente`, `correo`, `fecha_emision`, `tiempo_entrega`, `condicion_pago`, `vigencia`, `iva`, `descuento`, `id_userEmisor`, `nota`, `aceptada`, `fecha_aceptada`, `rechazada`, `fecha_rechazada`, `created_at`, `updated_at`) VALUES
(1, 'Omar Fragoso', '2018-001', 4, 'omar@hotmail.com', '2018-05-07', '4-6', '1', '10', '2', 0, 0, '<p>Esta es la nota si</p>', 0, '', 0, '', '2018-05-07 17:46:10', '2018-05-08 20:43:38'),
(3, 'Daniel Romero', '2018-003', 6, 'daniel@rmp.mx', '2018-05-09', '10 días hábiles', '2', '5', '2', 70, 0, '<p>Esta es la nota de la cot.</p>', 0, '', 0, '', '2018-05-09 15:06:50', '2018-05-10 17:59:47'),
(4, 'Raul Flores', '2018-004', 6, 'raul@gmail.com', '2018-05-09', 'Inmediata', '1', '5', '1', 10, 0, '<p>Esta es la nota</p>', 0, '', 0, '', '2018-05-09 15:08:46', '2018-05-10 17:44:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `cantidad` decimal(10,3) NOT NULL,
  `id_lote` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tipo_comprobante` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `numero_comprobante` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `precio_compra` decimal(13,2) NOT NULL,
  `precio_venta` decimal(13,2) NOT NULL,
  `tipo_moneda` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_cambio` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`id`, `nombre`, `precio_compra`, `precio_venta`, `tipo_moneda`, `tipo_cambio`, `id_articulo`, `id_proveedor`, `created_at`, `updated_at`) VALUES
(1, 'Lote USD', '23.69', '28.30', '4', '', 4, 2, '2018-01-26 17:30:04', '2018-05-09 21:06:12'),
(2, 'Lote USD 2', '21.00', '28.00', '1', '18.525', 5, 2, '2018-02-06 16:11:28', '2018-05-09 23:02:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('milton.ortega@oday.mx', 'eb0cab6554d561c2d0955f2831167b0aa060f5386307e175283673b3acefc85e', '2018-05-18 04:24:13');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Milton', 'milton.ortega@oday.mx', '$2y$10$NIOg19M0LtyIHI0Emu19vO2VrpZiW690gLGUrViF1/LGRnPAZv1Sm', '12cbEiS4iLYS88alFmW8U0AGnQnI7bYOYaeTCo9aYguD8MfnmYtuBqYf9nma', '2018-05-18 03:54:41', '2018-05-18 05:15:10'),
(2, 'Juan Carlos', 'carlos-hdz22@hotmail.com', '$2y$10$OLqcZXhRebcl7Xwjtl8hvO0yM0Pa2Orfn53XXfZpnSQps0rkjAQ0O', 'AgIn7rAOuZZ1KyO334xyIxIx2V7MzS5264Rx8ZSStw193l5H5VrZL5AUMbFZ', '2018-05-18 05:06:08', '2018-05-18 05:10:35');

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
-- Indices de la tabla `cot_articulo`
--
ALTER TABLE `cot_articulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cotizacion` (`id_cotizacion`),
  ADD KEY `id_sp` (`id_lote`);

--
-- Indices de la tabla `cot_cotizacion`
--
ALTER TABLE `cot_cotizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_firma` (`id_userEmisor`);

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
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- AUTO_INCREMENT de la tabla `cot_articulo`
--
ALTER TABLE `cot_articulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cot_cotizacion`
--
ALTER TABLE `cot_cotizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cot_articulo`
--
ALTER TABLE `cot_articulo`
  ADD CONSTRAINT `Elimina art. agregados si se elimina su cotización` FOREIGN KEY (`id_cotizacion`) REFERENCES `cot_cotizacion` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
