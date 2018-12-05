-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2018 a las 05:56:37
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
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_hora_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `descripcion`, `fecha_hora_registro`) VALUES
(1, 'Listo ya quedó bién', '2018-11-12 00:00:00'),
(2, 'hola estoy ensayando codeigniter', '2018-11-12 00:00:00'),
(3, 'ufff que cansancio tan berraco', '2018-12-01 00:00:00'),
(4, 'estoy cansado', '2018-12-01 00:00:00'),
(6, 'uff hp casi que no ome agonía', '2018-12-07 00:00:00'),
(7, 'uff hp lo logré lo logré', '2012-12-03 00:00:00'),
(8, 'ahora si puedo entregar mi  tare del crud con codeigniter', '2018-12-03 00:00:00'),
(9, 'uff nononono nono', '2018-09-07 00:00:00'),
(10, 'uff hp lo logré lo logré que nota', '2018-09-07 00:00:00'),
(11, 'uff nononono nono que alivio ome', '2018-12-07 00:00:00'),
(13, 'casi que nó, fué duro pero lo logré', '2018-12-03 00:00:00'),
(14, 'Último registro para ensayar el Insert con codeigniter de forma tal que funcione correctamente a la perfección', '2018-12-03 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
