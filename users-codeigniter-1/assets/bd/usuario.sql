-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2018 a las 01:50:49
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdusuarios_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL COMMENT 'identificador de la tabla',
  `usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_hora_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `nombre`, `correo`, `clave`, `foto`, `fecha_hora_registro`) VALUES
(2, 'Olga z', 'sepulveda', 'alejo102011@hotmail.com.co', '555', 'movimiento.gif', '2018-10-30 17:26:12'),
(3, 'Héctor', 'Héctor Pavas', 'hectorpav11@gmail.com', '2020', 'caracol.gif', '2018-10-30 17:27:11'),
(4, 'Alejandra', 'Jenni', 'red@nhnd.com', '2525', 'image5.jpg', '2018-10-30 19:19:36'),
(5, 'Daniela', 'Yireth', 'danny@nhnh.com', '8888', 'fondo.gif', '2018-10-30 18:38:56'),
(6, 'ensayo', 'Ensayar', 'uno@hort.com', '6363', 'uno-gif', '2018-10-30 19:19:36'),
(7, 'Carolina', 'Acevedo', 'dianaavila1@hotmail.com', '333', 'img1.jpg', '2018-10-30 20:25:26'),
(8, 'Juliana', 'Villada', 'julixlxd@hotmail.com', '6464', 'fondo.gif', '2018-10-30 20:26:22'),
(9, 'Mrisol', 'Acuña', 'mary@sol.com', '4242', 'use.jpg', '2018-10-30 20:27:29'),
(10, 'Mónica', 'Alejandra', 'aleja102011@hotmail.com', '5151', 'img.jpg', '2018-10-30 20:28:35'),
(27, 'anita', 'Melissa', 'hola@jk.com.co', '33333', 'img1.jpg', '2018-10-30 21:34:07'),
(28, 'Yireth Yulithza', 'Mosquera Correa', 'luisfdo45@hotmail.co', '444', 'img3.jpg', '2018-10-30 21:35:33'),
(29, 'melissa', 'Melissa Walteros', 'melissawalteros20002018@gmail.com', '1718', 'fondo.gif', '2018-10-30 21:37:45'),
(30, 'otro', 'ensayo', 'cualquiera@gmail.com', '6461', 'fuente.gif', '2018-11-12 22:22:35');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla', AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
