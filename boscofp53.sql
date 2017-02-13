----------- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2017 a las 16:43:41
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `boscofp53`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(4) NOT NULL,
  `activo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `color`, `img`, `orden`, `activo`) VALUES
(1, 'dgkgjfj,gfjg', 'travel', '', 0, ''),
(2, 'sdfsdfsdf', 'music', '', 0, ''),
(3, 'dsdfgdfgd', 'sports', '', 0, ''),
(4, 'marsal maricon ', 'mobile', 'asdfg', 1, 'true');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aprobado` tinyint(1) NOT NULL,
  `numContestado` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `idRecurso` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidadorganizativas`
--

CREATE TABLE `entidadorganizativas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `geolocalizacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficheros`
--

CREATE TABLE `ficheros` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idRecurso` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2015_10_31_162633_scaffoldinterfaces', 1),
(18, '2017_02_07_194955_create_permission_tables', 1),
(19, '2017_02_08_033558_categorias', 1),
(20, '2017_02_08_065245_categorias', 2),
(21, '2017_02_08_190737_subcategoria', 3),
(24, '2017_02_08_071703_subcategorias', 4),
(25, '2017_02_09_025728_subcategorias', 5),
(26, '2017_02_09_030152_entidadorganizativas', 6),
(27, '2017_02_09_030708_recursos', 7),
(29, '2017_02_09_033125_recursossubcategorias', 8),
(30, '2017_02_09_033951_ficheros', 9),
(31, '2017_02_09_034127_comentarios', 9),
(32, '2017_02_09_035002_tags', 10),
(33, '2017_02_09_035120_recursotags', 11),
(34, '2017_02_09_035321_banners', 12),
(35, '2017_02_09_035412_eventos', 12),
(36, '2017_02_09_035544_redsocials', 13),
(37, '2017_02_09_035636_redsocialusuarios', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fechaPost` date NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `rangoEdad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `relevancia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idEntidadOrganizativa` int(10) UNSIGNED NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursossubcategorias`
--

CREATE TABLE `recursossubcategorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `idRecursos` int(10) UNSIGNED NOT NULL,
  `idSubcategorias` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursotags`
--

CREATE TABLE `recursotags` (
  `id` int(10) UNSIGNED NOT NULL,
  `idRecursos` int(10) UNSIGNED NOT NULL,
  `idTag` int(10) UNSIGNED NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redsocials`
--

CREATE TABLE `redsocials` (
  `id` int(10) UNSIGNED NOT NULL,
  `redSocial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redsocialusuarios`
--

CREATE TABLE `redsocialusuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `idRedsocial` int(10) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'dfgsdfgsdgsdgsdf', '2017-02-10 15:49:46', '2017-02-10 15:49:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scaffoldinterfaces`
--

CREATE TABLE `scaffoldinterfaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `package` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `views` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tablename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `scaffoldinterfaces`
--

INSERT INTO `scaffoldinterfaces` (`id`, `package`, `migration`, `model`, `controller`, `views`, `tablename`, `created_at`, `updated_at`, `logo`, `color`) VALUES
(1, 'Laravel', 'C:\\xampp\\htdocs\\boscoFP53\\database/migrations/2017_02_08_065245_categorias.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Categoria.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Http/Controllers/CategoriaController.php', 'C:\\xampp\\htdocs\\boscoFP53\\resources/views/categoria', 'categorias', '2017-02-08 17:52:45', '2017-02-08 17:52:45', 'fa-square', 'bg-green'),
(4, 'Laravel', 'C:\\xampp\\htdocs\\boscoFP53\\database/migrations/2017_02_09_025728_subcategorias.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Subcategoria.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Http/Controllers/SubcategoriaController.php', 'C:\\xampp\\htdocs\\boscoFP53\\resources/views/subcategoria', 'subcategorias', '2017-02-09 13:57:29', '2017-02-09 13:57:29', 'fa-square-o', 'bg-purple'),
(5, 'Laravel', 'C:\\xampp\\htdocs\\boscoFP53\\database/migrations/2017_02_09_030152_entidadorganizativas.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Entidadorganizativa.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Http/Controllers/EntidadorganizativaController.php', 'C:\\xampp\\htdocs\\boscoFP53\\resources/views/entidadorganizativa', 'entidadorganizativas', '2017-02-09 14:01:53', '2017-02-09 14:01:53', 'fa-briefcase', 'bg-gray'),
(6, 'Laravel', 'C:\\xampp\\htdocs\\boscoFP53\\database/migrations/2017_02_09_030708_recursos.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Recurso.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Http/Controllers/RecursoController.php', 'C:\\xampp\\htdocs\\boscoFP53\\resources/views/recurso', 'recursos', '2017-02-09 14:07:09', '2017-02-09 14:07:09', 'fa-newspaper-o', 'bg-blue'),
(8, 'Laravel', 'C:\\xampp\\htdocs\\boscoFP53\\database/migrations/2017_02_09_033125_recursossubcategorias.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Recursossubcategoria.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Http/Controllers/RecursossubcategoriaController.php', 'C:\\xampp\\htdocs\\boscoFP53\\resources/views/recursossubcategoria', 'recursossubcategorias', '2017-02-09 14:31:25', '2017-02-09 14:31:25', '', ''),
(9, 'Laravel', 'C:\\xampp\\htdocs\\boscoFP53\\database/migrations/2017_02_09_033951_ficheros.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Fichero.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Http/Controllers/FicheroController.php', 'C:\\xampp\\htdocs\\boscoFP53\\resources/views/fichero', 'ficheros', '2017-02-09 14:39:52', '2017-02-09 14:39:52', 'fa-file', 'bg-red'),
(10, 'Laravel', 'C:\\xampp\\htdocs\\boscoFP53\\database/migrations/2017_02_09_034127_comentarios.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Comentario.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Http/Controllers/ComentarioController.php', 'C:\\xampp\\htdocs\\boscoFP53\\resources/views/comentario', 'comentarios', '2017-02-09 14:41:27', '2017-02-09 14:41:27', '', ''),
(11, 'Laravel', 'C:\\xampp\\htdocs\\boscoFP53\\database/migrations/2017_02_09_035002_tags.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Tag.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Http/Controllers/TagController.php', 'C:\\xampp\\htdocs\\boscoFP53\\resources/views/tag', 'tags', '2017-02-09 14:50:02', '2017-02-09 14:50:02', 'fa-hashtag', 'bg-orange'),
(12, 'Laravel', 'C:\\xampp\\htdocs\\boscoFP53\\database/migrations/2017_02_09_035120_recursotags.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Recursotag.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Http/Controllers/RecursotagController.php', 'C:\\xampp\\htdocs\\boscoFP53\\resources/views/recursotag', 'recursotags', '2017-02-09 14:51:20', '2017-02-09 14:51:20', '', ''),
(13, 'Laravel', 'C:\\xampp\\htdocs\\boscoFP53\\database/migrations/2017_02_09_035321_banners.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Banner.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Http/Controllers/BannerController.php', 'C:\\xampp\\htdocs\\boscoFP53\\resources/views/banner', 'banners', '2017-02-09 14:53:21', '2017-02-09 14:53:21', 'fa-bullhorn', 'bg-green'),
(14, 'Laravel', 'C:\\xampp\\htdocs\\boscoFP53\\database/migrations/2017_02_09_035412_eventos.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Evento.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Http/Controllers/EventoController.php', 'C:\\xampp\\htdocs\\boscoFP53\\resources/views/evento', 'eventos', '2017-02-09 14:54:13', '2017-02-09 14:54:13', 'fa-calendar', 'bg-yellow'),
(15, 'Laravel', 'C:\\xampp\\htdocs\\boscoFP53\\database/migrations/2017_02_09_035544_redsocials.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Redsocial.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Http/Controllers/RedsocialController.php', 'C:\\xampp\\htdocs\\boscoFP53\\resources/views/redsocial', 'redsocials', '2017-02-09 14:55:44', '2017-02-09 14:55:44', 'fa-twitter', 'bg-blue'),
(16, 'Laravel', 'C:\\xampp\\htdocs\\boscoFP53\\database/migrations/2017_02_09_035636_redsocialusuarios.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Redsocialusuario.php', 'C:\\xampp\\htdocs\\boscoFP53\\app/Http/Controllers/RedsocialusuarioController.php', 'C:\\xampp\\htdocs\\boscoFP53\\resources/views/redsocialusuario', 'redsocialusuarios', '2017-02-09 14:56:36', '2017-02-09 14:56:36', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `idCategoria` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'kikaso', 'grupo4s2j@gmail.com', '$2y$10$FzJy5FMXqff1Zby4lL1jhOt.DBLdfIRC86zPhJgtLKrO5VwQ4omOK', '2SqHKdN0mhYqAaSPy1a6lJn29BuaHh5VGxOtxotDFxgPKhwUG3o4hHRCnZML', '2017-02-08 17:49:52', '2017-02-10 15:38:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_has_permissions`
--

CREATE TABLE `user_has_permissions` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_has_roles`
--

CREATE TABLE `user_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentarios_idrecurso_foreign` (`idRecurso`);

--
-- Indices de la tabla `entidadorganizativas`
--
ALTER TABLE `entidadorganizativas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ficheros`
--
ALTER TABLE `ficheros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ficheros_idrecurso_foreign` (`idRecurso`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recursos_identidadorganizativa_foreign` (`idEntidadOrganizativa`);

--
-- Indices de la tabla `recursossubcategorias`
--
ALTER TABLE `recursossubcategorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recursossubcategorias_idrecursos_foreign` (`idRecursos`),
  ADD KEY `recursossubcategorias_idsubcategorias_foreign` (`idSubcategorias`);

--
-- Indices de la tabla `recursotags`
--
ALTER TABLE `recursotags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recursotags_idrecursos_foreign` (`idRecursos`),
  ADD KEY `recursotags_idtag_foreign` (`idTag`);

--
-- Indices de la tabla `redsocials`
--
ALTER TABLE `redsocials`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `redsocialusuarios`
--
ALTER TABLE `redsocialusuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redsocialusuarios_idredsocial_foreign` (`idRedsocial`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `scaffoldinterfaces`
--
ALTER TABLE `scaffoldinterfaces`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategorias_idcategoria_foreign` (`idCategoria`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `user_has_permissions_permission_id_foreign` (`permission_id`);

--
-- Indices de la tabla `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `user_has_roles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `entidadorganizativas`
--
ALTER TABLE `entidadorganizativas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ficheros`
--
ALTER TABLE `ficheros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recursossubcategorias`
--
ALTER TABLE `recursossubcategorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recursotags`
--
ALTER TABLE `recursotags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `redsocials`
--
ALTER TABLE `redsocials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `redsocialusuarios`
--
ALTER TABLE `redsocialusuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `scaffoldinterfaces`
--
ALTER TABLE `scaffoldinterfaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_idrecurso_foreign` FOREIGN KEY (`idRecurso`) REFERENCES `recursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ficheros`
--
ALTER TABLE `ficheros`
  ADD CONSTRAINT `ficheros_idrecurso_foreign` FOREIGN KEY (`idRecurso`) REFERENCES `recursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD CONSTRAINT `recursos_identidadorganizativa_foreign` FOREIGN KEY (`idEntidadOrganizativa`) REFERENCES `entidadorganizativas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recursossubcategorias`
--
ALTER TABLE `recursossubcategorias`
  ADD CONSTRAINT `recursossubcategorias_idrecursos_foreign` FOREIGN KEY (`idRecursos`) REFERENCES `recursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recursossubcategorias_idsubcategorias_foreign` FOREIGN KEY (`idSubcategorias`) REFERENCES `subcategorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recursotags`
--
ALTER TABLE `recursotags`
  ADD CONSTRAINT `recursotags_idrecursos_foreign` FOREIGN KEY (`idRecursos`) REFERENCES `recursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recursotags_idtag_foreign` FOREIGN KEY (`idTag`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `redsocialusuarios`
--
ALTER TABLE `redsocialusuarios`
  ADD CONSTRAINT `redsocialusuarios_idredsocial_foreign` FOREIGN KEY (`idRedsocial`) REFERENCES `redsocials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `subcategorias_idcategoria_foreign` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD CONSTRAINT `user_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_has_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_has_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
