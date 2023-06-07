-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-06-2023 a las 20:31:20
-- Versión del servidor: 8.0.29
-- Versión de PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoruben`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `CIF` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CodigoPostal` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poblacion` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Direccion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `REQ` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientes_cif_unique` (`CIF`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `CIF`, `nombre`, `provincia`, `CodigoPostal`, `poblacion`, `email`, `telefono`, `Direccion`, `REQ`, `created_at`, `updated_at`) VALUES
(1, 'B77867564', 'pedro albañil S.L', 'Murcia', '30100', 'Espinardo', '3886114@gmail.com', '4535674576', 'Calle Leon Nº 23', 1, NULL, '2023-06-07 16:04:41'),
(2, 'B45454574', 'Pedro', 'Galicia', '30500', 'Ourense', '3886114@alu.murciaeduca.es', '549498474', 'MADRID', 1, '2023-06-07 16:00:20', '2023-06-07 16:03:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle__facturas`
--

DROP TABLE IF EXISTS `detalle__facturas`;
CREATE TABLE IF NOT EXISTS `detalle__facturas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cantidad` int NOT NULL,
  `precio` double(8,2) NOT NULL,
  `producto_id` bigint UNSIGNED NOT NULL,
  `ejercicio_fact` bigint UNSIGNED NOT NULL,
  `serie_fact` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_fact` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle__facturas_producto_id_foreign` (`producto_id`),
  KEY `detalle__facturas_ejercicio_fact_serie_fact_numero_fact_foreign` (`ejercicio_fact`,`serie_fact`,`numero_fact`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle__facturas`
--

INSERT INTO `detalle__facturas` (`id`, `cantidad`, `precio`, `producto_id`, `ejercicio_fact`, `serie_fact`, `numero_fact`, `created_at`, `updated_at`) VALUES
(1, 3, 50.00, 1, 2022, '23', 785, '2023-06-07 17:03:00', '2023-06-07 17:03:00'),
(2, 1, 50.00, 1, 2022, '23', 785, '2023-06-07 17:04:35', '2023-06-07 17:04:35'),
(3, 6, 10.00, 1, 2023, '23', 333, '2023-06-07 17:52:26', '2023-06-07 17:52:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emisors`
--

DROP TABLE IF EXISTS `emisors`;
CREATE TABLE IF NOT EXISTS `emisors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `CIF` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CodigoPostal` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `poblacion` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Direccion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `emisors_cif_unique` (`CIF`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `emisors`
--

INSERT INTO `emisors` (`id`, `CIF`, `nombre`, `provincia`, `CodigoPostal`, `poblacion`, `email`, `telefono`, `Direccion`, `created_at`, `updated_at`) VALUES
(1, 'w486949494', 'EL MOSCA  S.L', 'Murcia', '30600', 'Archena', 'elmosca@email.com', '7894654654', 'Calle Leon Nº 12', '2023-06-07 16:09:18', '2023-06-07 16:18:39'),
(2, 'B45454574', 'Primafrio S.L', 'Murcia', '30600', 'Archena', '3886114@alu.murciaeduca.es', '987654123', 'Calle Leon Nº 12', '2023-06-07 18:16:59', '2023-06-07 18:16:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE IF NOT EXISTS `facturas` (
  `ejercicio` bigint UNSIGNED NOT NULL,
  `serie` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` bigint UNSIGNED NOT NULL,
  `fecha_emision` date NOT NULL,
  `IVA` int NOT NULL,
  `REQ` double(8,2) NOT NULL,
  `Observaciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enviada` tinyint(1) NOT NULL,
  `Emisor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cliente_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `emisor_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`ejercicio`,`serie`,`numero`),
  UNIQUE KEY `facturas_numero_unique` (`numero`),
  KEY `facturas_cliente_id_foreign` (`cliente_id`),
  KEY `facturas_user_id_foreign` (`user_id`),
  KEY `facturas_emisor_id_foreign` (`emisor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`ejercicio`, `serie`, `numero`, `fecha_emision`, `IVA`, `REQ`, `Observaciones`, `enviada`, `Emisor`, `cliente_id`, `user_id`, `created_at`, `updated_at`, `emisor_id`) VALUES
(2022, '23', 785, '2023-06-08', 4, 1.25, 'Segunda factura', 0, NULL, 1, 1, '2023-06-07 16:15:27', '2023-06-07 16:15:27', 1),
(2023, '23', 333, '2023-06-07', 10, 1.25, 'Segunda factura', 0, NULL, 1, 1, '2023-06-07 17:52:11', '2023-06-07 17:52:11', 1),
(2023, 'A2', 789, '2023-06-07', 4, 1.40, 'Segunda factura', 0, NULL, 1, 1, '2023-06-07 18:07:37', '2023-06-07 18:07:37', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_02_155352_create_emisors_table', 1),
(6, '2023_04_23_145122_create_clientes_table', 1),
(7, '2023_04_23_145142_create_facturas_table', 1),
(8, '2023_04_23_145557_create_productos_table', 1),
(9, '2023_04_23_155459_create_detalle__facturas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Mesa ', 50.00, 'Mesa de Programación', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ruben', '3886114@gmail.com', '2023-06-21 17:31:18', 'ruben', 'admin', NULL, NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle__facturas`
--
ALTER TABLE `detalle__facturas`
  ADD CONSTRAINT `detalle__facturas_ejercicio_fact_serie_fact_numero_fact_foreign` FOREIGN KEY (`ejercicio_fact`,`serie_fact`,`numero_fact`) REFERENCES `facturas` (`ejercicio`, `serie`, `numero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle__facturas_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `facturas_emisor_id_foreign` FOREIGN KEY (`emisor_id`) REFERENCES `emisors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `facturas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
