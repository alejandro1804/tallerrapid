-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2023 a las 22:14:00
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tallerrapid`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `binnacles`
--

CREATE TABLE `binnacles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `operator_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `binnacles`
--

INSERT INTO `binnacles` (`id`, `ticket_id`, `operator_id`, `note`, `created_at`, `updated_at`) VALUES
(22, 1, 3, 'vb vb', '2023-05-29 02:20:41', '2023-05-29 02:20:41'),
(23, 1, 1, 'este espacio es para colocar comentarios sobre lo hecho en el equipo correspondiente a un ticket determinado', '2023-05-29 15:53:40', '2023-05-30 21:51:07'),
(24, 2, 2, 'esto va a demorar el importador no tiene repuesto.', '2023-06-01 22:19:08', '2023-06-01 22:19:08'),
(25, 3, 5, 'esta es para el ticket numero 4', '2023-06-01 22:20:13', '2023-06-01 22:20:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `sector_id` bigint(20) UNSIGNED NOT NULL,
  `characteristic` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `trademark` varchar(120) NOT NULL,
  `provider_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `name`, `sector_id`, `characteristic`, `note`, `trademark`, `provider_id`, `created_at`, `updated_at`) VALUES
(1, 'Amasadora n1', 1, 'asdasd', 'asdasd', 'Argental', 2, '2023-05-25 08:43:08', '2023-05-30 00:33:16'),
(2, 'Tren de laboreo', 1, 'Salen 10 piezas por minuto', 'asdasd', 'Argental', 1, '2023-05-25 23:37:14', '2023-05-30 00:49:58'),
(3, 'Balanza de precision para pesado de aditivos', 1, 'minimo 1 g  maximo 2 kg', 'es marca ohaus', 'Ishida', 5, '2023-05-26 00:46:17', '2023-05-29 02:25:23'),
(4, 'Batidora', 1, 'chica', 'qwqw', 'Philips', 2, '2023-05-29 01:31:03', '2023-05-29 02:24:09'),
(5, 'Horno de gas 1', 1, 'de bajo consumo', 'wew', 'ewew', 2, '2023-05-29 03:30:29', '2023-05-30 01:00:55'),
(8, 'Freidora para donas', 1, 'permite elaborar unas 300 donas por hora', 'esta funcionando mal el termostato', 'no suministrada', 2, '2023-05-29 05:02:59', '2023-05-29 05:04:35'),
(9, 'Amasadora N2', 1, ' sin comentarios ', ' sin comentarios ', ' no suministrada ', 2, '2023-05-30 00:34:09', '2023-05-30 00:34:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_001_create_states_table', 1),
(7, '2023_002_alter_operators_table', 2),
(8, '2023_00_create_specialties_table', 2),
(9, '2023_01_create_providers_table', 2),
(10, '2023_02_create_sectors_table', 2),
(11, '2023_04_create_items_table', 2),
(12, '2023_05_create_tickets_table', 2),
(13, '2023_06_create_parts_table', 2),
(14, '2023_08_create_binnacles_table', 2),
(15, '2024_09_create_positions_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operators`
--

CREATE TABLE `operators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(90) NOT NULL,
  `position_id` bigint(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `operators`
--

INSERT INTO `operators` (`id`, `name`, `position_id`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Carlos Martinez', 5, '099123234', 'de licencia', '2023-05-25 08:38:45', '2023-05-30 22:31:39'),
(2, 'Alejandro Perez', 6, '24002400', 'activo', '2023-05-25 23:36:10', '2023-05-30 22:31:31'),
(3, 'Alejandro Rios', 4, '24002400', 'activo', '2023-05-26 07:33:22', '2023-05-30 22:31:35'),
(5, 'Javier Pantera', 3, '12121212', 'activo', '2023-05-26 08:02:39', '2023-05-30 22:31:43'),
(9, 'Pepe Vazquez', 1, '12112212', 'activo', '2023-05-29 01:54:59', '2023-05-29 01:55:43'),
(10, 'Sergio Moourelle', 7, '23232323', 'activo', '2023-05-29 16:15:56', '2023-05-29 16:15:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parts`
--

CREATE TABLE `parts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(160) NOT NULL,
  `note` varchar(255) NOT NULL,
  `provider_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `parts`
--

INSERT INTO `parts` (`id`, `item_id`, `name`, `note`, `provider_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'correas en v  200 x 1020', 'lleva tes correas', 1, '2023-05-25 08:43:26', '2023-05-25 23:47:04'),
(2, 2, 'cinta transportadora metalica', 'es de alambre de inoxi', 1, '2023-05-25 23:37:46', '2023-05-30 00:50:39'),
(3, 1, 'Correa dentada en V 200 x20', 'lleva 3', 2, '2023-06-03 01:13:57', '2023-06-03 01:13:57'),
(4, 5, 'manguera apantallada para gas', 'se hace sobre medida', 3, '2023-06-03 08:44:54', '2023-06-03 08:44:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PINTOR', NULL, '2023-05-30 00:28:25'),
(2, 'ELECTRICISTA', NULL, '2023-05-30 00:27:57'),
(3, 'ELECTROMECANICO', NULL, '2023-05-30 00:28:01'),
(4, 'FOGUISTA', NULL, '2023-05-30 00:28:06'),
(5, 'HERRERO', NULL, '2023-05-30 00:28:10'),
(6, 'MECANICO', NULL, '2023-05-30 00:28:20'),
(7, 'JEFE DE MANTENIMIENTO', '2023-05-29 16:04:48', '2023-05-30 00:28:15'),
(8, 'TORNERO', '2023-05-30 21:45:04', '2023-05-30 21:45:04'),
(9, 'JARDINERIA Y AREAS VERDES', '2023-05-31 23:55:03', '2023-05-31 23:55:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `providers`
--

CREATE TABLE `providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `location` varchar(120) NOT NULL,
  `country` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `providers`
--

INSERT INTO `providers` (`id`, `name`, `phone`, `adress`, `location`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Fivisa', '23423423', 'Uruguay 1234', 'mvd', 'Uruguay', '2023-05-25 08:41:56', '2023-05-28 19:43:53'),
(2, 'La Casa Del Panadero', '24002400', 'Fernanndez Crespo 1234', 'MVD', 'Uruguay', '2023-05-28 19:43:19', '2023-05-29 02:11:57'),
(3, 'Bako S.a.', '12121212', 'Galicia 1234', 'Montevideo', 'Uruguay', '2023-05-29 01:38:21', '2023-05-29 02:12:02'),
(4, 'La Liga Sanitaria', '12121212', 'wdwdededde', 'md', 'uru', '2023-05-29 02:09:32', '2023-05-29 02:11:52'),
(5, 'Citek S.a.', '23232323', 'Paraguay 2323', 'MVD', 'Uruguay', '2023-05-29 02:25:02', '2023-05-29 02:25:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectors`
--

CREATE TABLE `sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sectors`
--

INSERT INTO `sectors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PANADERIA', '2023-05-25 08:41:12', '2023-05-29 02:19:42'),
(2, 'FRESCO', '2023-05-25 23:35:33', '2023-05-29 02:19:35'),
(3, 'LAVADERO DE ROPA', '2023-05-29 01:35:55', '2023-05-29 02:19:39'),
(4, 'TALLER DE MANTENIMIENTO', '2023-05-30 00:30:24', '2023-05-30 00:30:24'),
(5, 'COMEDOR', '2023-05-30 00:30:39', '2023-05-30 00:30:39'),
(6, 'SALA DE SILOS', '2023-05-30 00:31:07', '2023-05-30 00:31:07'),
(7, 'OFICINAS DE ADMINISTRACION', '2023-05-30 00:58:17', '2023-05-30 00:58:17'),
(8, 'VESTUARIO FEMENINO', '2023-05-30 00:58:39', '2023-05-30 00:59:16'),
(9, 'VESTUARIO MASCULINO', '2023-05-30 00:58:54', '2023-05-30 00:59:32'),
(10, 'RECEPCION DE PROVEEDORES', '2023-05-30 01:00:07', '2023-05-30 01:00:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ABIERTO', NULL, NULL),
(2, 'CERRADO', NULL, NULL),
(3, 'SOLICITUD', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `admission` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `flaw` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `state_id`, `admission`, `item_id`, `flaw`, `priority`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-05-29 21:57:35', 1, 'desconocido', 1, '2023-05-25 08:43:54', '2023-05-30 00:57:35'),
(2, 1, '2023-05-30 18:52:32', 2, 'no genera el bollo inicial del mismo peso', 3, '2023-05-26 00:18:53', '2023-05-30 21:52:32'),
(3, 1, '2023-05-29 21:48:53', 2, 'desconocido', 2, '2023-05-26 00:22:29', '2023-05-30 00:48:53'),
(4, 2, '2023-05-29 21:48:26', 3, 'le entro agua', 2, '2023-05-26 00:47:01', '2023-05-30 00:48:26'),
(5, 2, '2023-05-29 21:48:10', 1, 'no sube el agitador al terminar', 2, '2023-05-26 04:19:59', '2023-05-30 00:48:10'),
(6, 3, '2023-05-26 08:08:45', 1, 'SIGUE FALLA', 2, '2023-05-26 08:08:45', '2023-05-26 08:08:45'),
(7, 3, '2023-05-30 18:52:25', 2, 'falla al dosificar el bollo', 3, '2023-05-26 23:34:44', '2023-05-30 21:52:25'),
(8, 3, '2023-05-30 00:34:42', 9, 'desconocido', 1, '2023-05-30 00:34:42', '2023-05-30 00:34:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'alejandro', 'alejandro1804@gmail.com', NULL, '$2y$10$dbmUJYLscsgr8mxhWvQjfeYK4IgdVcFfA2/6EJZeMdUS9A9xuJfBS', 'h6JjmzIVDXYNFBNgiuzAJj7sY6OjIWXrNIxZHw7jSDsnyHhBSVKHVN5zyzHF', '2023-05-25 08:32:51', '2023-05-25 08:32:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `binnacles`
--
ALTER TABLE `binnacles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `binnacles_ticket_id_foreign` (`ticket_id`),
  ADD KEY `binnacles_operator_id_foreign` (`operator_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_sector_id_foreign` (`sector_id`),
  ADD KEY `items_provider_id_foreign` (`provider_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operators_position_id_foreign` (`position_id`);

--
-- Indices de la tabla `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parts_item_id_foreign` (`item_id`),
  ADD KEY `parts_provider_id_foreign` (`provider_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_state_id_foreign` (`state_id`) USING BTREE,
  ADD KEY `tickets_item_id_foreign` (`item_id`);

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
-- AUTO_INCREMENT de la tabla `binnacles`
--
ALTER TABLE `binnacles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `operators`
--
ALTER TABLE `operators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `parts`
--
ALTER TABLE `parts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `binnacles`
--
ALTER TABLE `binnacles`
  ADD CONSTRAINT `binnacles_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`),
  ADD CONSTRAINT `binnacles_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`),
  ADD CONSTRAINT `items_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`);

--
-- Filtros para la tabla `parts`
--
ALTER TABLE `parts`
  ADD CONSTRAINT `parts_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `parts_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`);

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
