-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2021 a las 01:42:31
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `impulsa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociacion`
--

CREATE TABLE `asociacion` (
  `id_asociacion` int(11) NOT NULL,
  `nombre_asoci` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(22) COLLATE utf8_spanish_ci NOT NULL,
  `fk_representante` int(11) NOT NULL,
  `fk_tesorero` int(11) NOT NULL,
  `fk_fiscal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asociacion`
--

INSERT INTO `asociacion` (`id_asociacion`, `nombre_asoci`, `nit`, `fk_representante`, `fk_tesorero`, `fk_fiscal`) VALUES
(1, 'asocampesinos1', '900565514', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fincas`
--

CREATE TABLE `fincas` (
  `id_finca` int(11) NOT NULL,
  `nombre_finca` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `area` int(11) NOT NULL,
  `fk_vereda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fincas`
--

INSERT INTO `fincas` (`id_finca`, `nombre_finca`, `area`, `fk_vereda`) VALUES
(1, 'villa linda', 1200, 6),
(3, 'La Redencion', 1300, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiscal`
--

CREATE TABLE `fiscal` (
  `id_fiscal` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `whatsapp` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fiscal`
--

INSERT INTO `fiscal` (`id_fiscal`, `nombre`, `cedula`, `telefono`, `correo`, `whatsapp`) VALUES
(1, 'Hugo Torres', '109862546', '3114700503', 'hugo@gmail.com', '3132024969');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nucleo`
--

CREATE TABLE `nucleo` (
  `id_nucleo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fk_responsable` int(11) NOT NULL,
  `fk_trillador` int(11) NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referente_subnucleo`
--

CREATE TABLE `referente_subnucleo` (
  `id_referente` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `whatsapp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_socios`
--

CREATE TABLE `registro_socios` (
  `id_socios` int(11) NOT NULL,
  `nombre_apellido` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `fk_finca` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `whatsapp` int(11) NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fk_asociacion` int(11) NOT NULL,
  `fk_nucleo` int(11) NOT NULL,
  `fk_sub_nucleo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE `representante` (
  `id_representante` int(11) NOT NULL,
  `nombre_repre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `whatsapp` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `representante`
--

INSERT INTO `representante` (`id_representante`, `nombre_repre`, `cedula`, `telefono`, `correo`, `whatsapp`) VALUES
(1, 'Andres Gomez Rubio', '1096241229', '3107698290', 'andres.gomez@unipaz.edu.co', '3167672962');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `id_responsable` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `whatsapp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `permisos` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `permisos`, `descripcion`) VALUES
(1, 'administrador', 777, 'Tiene permisos globales'),
(2, 'usuario', 775, 'leer ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subnucleo`
--

CREATE TABLE `subnucleo` (
  `id_subnucleo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fk_referente_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesorero`
--

CREATE TABLE `tesorero` (
  `id_tesorero` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `whatsapp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tesorero`
--

INSERT INTO `tesorero` (`id_tesorero`, `nombre`, `cedula`, `telefono`, `correo`, `whatsapp`) VALUES
(1, 'Amado Cipriano', 121233123, 13212312, 'todosvenimosaaprender@melo.com', 231435235),
(3, 'andre', 4, 45, 'joni@gmail.comd', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trilladores`
--

CREATE TABLE `trilladores` (
  `id_trillador` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `whatsapp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `passwork` text COLLATE utf8_spanish_ci NOT NULL,
  `rol_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `passwork`, `rol_fk`) VALUES
(1, 'joni', 'joni@gmail.com', '123', 2),
(7, 'aedw', 'joni@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vereda`
--

CREATE TABLE `vereda` (
  `id_vereda` int(11) NOT NULL,
  `nombre_vereda` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vereda`
--

INSERT INTO `vereda` (`id_vereda`, `nombre_vereda`, `descripcion`) VALUES
(5, 'La Tora', 'wilches'),
(6, 'Campo Hermoso', 'cimitarra');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asociacion`
--
ALTER TABLE `asociacion`
  ADD PRIMARY KEY (`id_asociacion`),
  ADD KEY `fk_representante` (`fk_representante`),
  ADD KEY `fk_tesorero` (`fk_tesorero`),
  ADD KEY `fk_fiscal` (`fk_fiscal`);

--
-- Indices de la tabla `fincas`
--
ALTER TABLE `fincas`
  ADD PRIMARY KEY (`id_finca`),
  ADD KEY `fk_vereda` (`fk_vereda`);

--
-- Indices de la tabla `fiscal`
--
ALTER TABLE `fiscal`
  ADD PRIMARY KEY (`id_fiscal`);

--
-- Indices de la tabla `nucleo`
--
ALTER TABLE `nucleo`
  ADD PRIMARY KEY (`id_nucleo`),
  ADD KEY `fk_responsable` (`fk_responsable`),
  ADD KEY `fk_trillador` (`fk_trillador`);

--
-- Indices de la tabla `referente_subnucleo`
--
ALTER TABLE `referente_subnucleo`
  ADD PRIMARY KEY (`id_referente`);

--
-- Indices de la tabla `registro_socios`
--
ALTER TABLE `registro_socios`
  ADD PRIMARY KEY (`id_socios`),
  ADD KEY `fk_finca` (`fk_finca`),
  ADD KEY `fk_asociacion` (`fk_asociacion`),
  ADD KEY `fk_nucleo` (`fk_nucleo`),
  ADD KEY `fk_sub_nucleo` (`fk_sub_nucleo`);

--
-- Indices de la tabla `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`id_representante`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`id_responsable`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subnucleo`
--
ALTER TABLE `subnucleo`
  ADD PRIMARY KEY (`id_subnucleo`),
  ADD KEY `fk_referente_sub` (`fk_referente_sub`);

--
-- Indices de la tabla `tesorero`
--
ALTER TABLE `tesorero`
  ADD PRIMARY KEY (`id_tesorero`);

--
-- Indices de la tabla `trilladores`
--
ALTER TABLE `trilladores`
  ADD PRIMARY KEY (`id_trillador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_fk` (`rol_fk`);

--
-- Indices de la tabla `vereda`
--
ALTER TABLE `vereda`
  ADD PRIMARY KEY (`id_vereda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asociacion`
--
ALTER TABLE `asociacion`
  MODIFY `id_asociacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fincas`
--
ALTER TABLE `fincas`
  MODIFY `id_finca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `fiscal`
--
ALTER TABLE `fiscal`
  MODIFY `id_fiscal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `nucleo`
--
ALTER TABLE `nucleo`
  MODIFY `id_nucleo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_socios`
--
ALTER TABLE `registro_socios`
  MODIFY `id_socios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `representante`
--
ALTER TABLE `representante`
  MODIFY `id_representante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id_responsable` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `subnucleo`
--
ALTER TABLE `subnucleo`
  MODIFY `id_subnucleo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tesorero`
--
ALTER TABLE `tesorero`
  MODIFY `id_tesorero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `trilladores`
--
ALTER TABLE `trilladores`
  MODIFY `id_trillador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `vereda`
--
ALTER TABLE `vereda`
  MODIFY `id_vereda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asociacion`
--
ALTER TABLE `asociacion`
  ADD CONSTRAINT `asociacion_ibfk_1` FOREIGN KEY (`fk_representante`) REFERENCES `representante` (`id_representante`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `asociacion_ibfk_2` FOREIGN KEY (`fk_fiscal`) REFERENCES `fiscal` (`id_fiscal`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `asociacion_ibfk_3` FOREIGN KEY (`fk_tesorero`) REFERENCES `tesorero` (`id_tesorero`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fincas`
--
ALTER TABLE `fincas`
  ADD CONSTRAINT `fincas_ibfk_1` FOREIGN KEY (`fk_vereda`) REFERENCES `vereda` (`id_vereda`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `nucleo`
--
ALTER TABLE `nucleo`
  ADD CONSTRAINT `nucleo_ibfk_1` FOREIGN KEY (`fk_responsable`) REFERENCES `responsable` (`id_responsable`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `nucleo_ibfk_2` FOREIGN KEY (`fk_trillador`) REFERENCES `trilladores` (`id_trillador`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_socios`
--
ALTER TABLE `registro_socios`
  ADD CONSTRAINT `registro_socios_ibfk_1` FOREIGN KEY (`fk_finca`) REFERENCES `fincas` (`id_finca`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_socios_ibfk_2` FOREIGN KEY (`fk_asociacion`) REFERENCES `asociacion` (`id_asociacion`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_socios_ibfk_3` FOREIGN KEY (`fk_nucleo`) REFERENCES `nucleo` (`id_nucleo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_socios_ibfk_4` FOREIGN KEY (`fk_sub_nucleo`) REFERENCES `subnucleo` (`id_subnucleo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `subnucleo`
--
ALTER TABLE `subnucleo`
  ADD CONSTRAINT `subnucleo_ibfk_1` FOREIGN KEY (`fk_referente_sub`) REFERENCES `referente_subnucleo` (`id_referente`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_fk`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
