-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-07-2021 a las 22:30:51
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `unidosdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(10) NOT NULL,
  `fentrega` date NOT NULL,
  `ci` int(8) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(10) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `respentrega` varchar(50) NOT NULL,
  `observaciones` text NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sesion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `fentrega`, `ci`, `nombre`, `apellido`, `telefono`, `direccion`, `respentrega`, `observaciones`, `CREATED_AT`, `UPDATED_AT`, `sesion`) VALUES
(23, '2021-07-11', 48587557, 'Misha', 'Rodriguez', 9912345, 'chain', 'Promocion Social', 'la', '2021-07-11 14:36:51', '2021-07-14 22:13:47', 'usuario'),
(24, '2021-07-11', 48587557, 'Misha', 'chanchan', 9912345, 'chain', '', '', '2021-07-11 14:41:34', '2021-07-11 14:41:34', 'usuario'),
(26, '2021-07-11', 46004101, 'Misha', 'Perez', 9912345, 'chain', '', '', '2021-07-11 15:08:07', '2021-07-11 15:08:07', 'usuario'),
(27, '2021-07-11', 46004101, 'dario', 'asdasd', 9912345, 'Chain 2148', '', '', '2021-07-11 15:23:39', '2021-07-11 15:23:39', 'usuario'),
(28, '2021-07-11', 48507501, 'dario', 'Perez', 9912345, 'asdasd', '', '', '2021-07-11 15:40:59', '2021-07-11 15:40:59', ''),
(29, '2021-07-11', 48507501, 'dario', 'Perez', 9912345, 'asdasd', '', '', '2021-07-11 15:41:15', '2021-07-11 15:41:15', ''),
(30, '2021-07-11', 48507501, 'dario', 'Perez', 9912345, 'asdasd', '', '', '2021-07-11 15:43:32', '2021-07-11 15:43:32', ''),
(32, '2021-07-11', 48507501, 'dario', 'Perez', 9912345, 'asdasd', '', '', '2021-07-11 15:44:56', '2021-07-11 15:44:56', 'usuario'),
(33, '2021-07-11', 48507501, 'dario', 'Perez', 9912345, 'asdasd', '', '', '2021-07-11 15:46:09', '2021-07-11 15:46:09', 'usuario'),
(34, '2021-07-11', 48507501, 'dario', 'Perez', 9912345, 'asdasd', '', '', '2021-07-11 15:46:35', '2021-07-11 15:46:35', 'usuario'),
(35, '2021-07-11', 48507501, 'dario', 'Perez', 9912345, 'asdasd', '', '', '2021-07-11 15:47:23', '2021-07-11 15:47:23', 'usuario'),
(36, '2021-07-11', 46004101, 'dario', 'Perez', 9912345, 'Chain 2148', '', '', '2021-07-11 15:49:28', '2021-07-11 15:49:28', 'usuario'),
(37, '2021-07-11', 42301201, 'Misha', 'Gonzalez', 9912345, 'Chain 2148', '', '', '2021-07-11 15:54:08', '2021-07-11 15:54:08', 'usuario'),
(38, '2021-07-11', 42301201, 'Misha', 'Gonzalez', 9912345, 'Chain 2148', '', '', '2021-07-11 15:54:16', '2021-07-11 15:54:16', 'usuario'),
(39, '2021-07-11', 42301201, 'Misha', 'Gonzalez', 9912345, 'Chain 2148', '', '', '2021-07-11 15:54:31', '2021-07-11 15:54:31', 'usuario'),
(40, '2021-07-21', 48587557, 'dario', 'asdasd', 9091234, 'Chain 2148', '', '', '2021-07-11 15:57:18', '2021-07-11 15:57:18', 'usuario'),
(41, '2021-07-08', 46004120, 'dario', 'asdasd', 9091234, 'leandro gomez', '', '', '2021-07-11 16:00:34', '2021-07-11 16:00:34', 'usuario'),
(42, '2021-07-08', 46004120, 'dario', 'asdasd', 9091234, 'leandro gomez', '', '', '2021-07-11 16:00:43', '2021-07-11 16:00:43', 'usuario'),
(43, '2021-07-08', 46004120, 'dario', 'asdasd', 9091234, 'leandro gomez', '', '', '2021-07-11 16:02:38', '2021-07-11 16:02:38', 'usuario'),
(44, '2021-07-08', 46004101, 'fido', 'chanchan', 9912345, 'Chain 2148', '', '', '2021-07-11 16:05:35', '2021-07-11 16:05:35', 'usuario'),
(45, '2021-07-08', 46004101, 'fido', 'chanchan', 9912345, 'Chain 2148', '', '', '2021-07-11 16:05:41', '2021-07-11 16:05:41', 'usuario'),
(46, '2021-07-07', 48507501, 'sdasd', 'asdasd', 47256987, 'chain', '', '', '2021-07-11 16:07:46', '2021-07-11 16:07:46', 'usuario'),
(47, '2021-07-07', 48507501, 'sdasd', 'asdasd', 47256987, 'chain', '', '', '2021-07-11 16:07:52', '2021-07-11 16:07:52', 'usuario'),
(48, '2021-07-07', 48507501, 'sdasd', 'asdasd', 47256987, 'chain', '', '', '2021-07-11 16:14:07', '2021-07-11 16:14:07', 'usuario'),
(49, '2021-07-07', 48507501, 'sdasd', 'asdasd', 47256987, 'chain', '', '', '2021-07-11 16:20:10', '2021-07-11 16:20:10', 'usuario'),
(50, '2021-07-15', 46004120, 'fido', 'Perez', 9912345, 'Chain 2148', '', '', '2021-07-11 16:20:23', '2021-07-11 16:20:23', 'usuario'),
(51, '2021-07-15', 46004120, 'fido', 'Perez', 9912345, 'Chain 2148', '', '', '2021-07-11 16:23:58', '2021-07-11 16:23:58', 'usuario'),
(52, '2021-07-15', 46004120, 'fido', 'Perez', 9912345, 'Chain 2148', '', '', '2021-07-11 16:25:10', '2021-07-11 16:25:10', 'usuario'),
(53, '2021-07-15', 46004120, 'fido', 'Perez', 9912345, 'Chain 2148', '', '', '2021-07-11 16:25:47', '2021-07-11 16:25:47', 'usuario'),
(54, '2021-07-11', 46004101, 'fido', 'gonzalez', 9912345, 'Chain 2148', '', '', '2021-07-11 16:48:00', '2021-07-11 16:48:00', 'usuario'),
(55, '2021-07-11', 46004101, 'fido', 'gonzalez', 9912345, 'Chain 2148', '', '', '2021-07-11 16:48:06', '2021-07-11 16:48:06', 'usuario'),
(56, '2021-07-12', 46004101, 'Maria', 'Perez', 9091234, 'Paysandu', '', '', '2021-07-12 09:30:42', '2021-07-12 09:30:42', 'usuario'),
(57, '2021-07-13', 42301201, 'dario', 'Perez', 47256987, 'leandro gomez', '', '', '2021-07-13 10:30:26', '2021-07-13 10:30:26', 'usuario'),
(58, '2021-07-01', 42301201, 'dario', 'Perez', 9091234, 'leandro gomez', '', '', '2021-07-13 10:47:03', '2021-07-13 10:47:03', 'usuario'),
(59, '2021-07-13', 46004101, 'sdasd', 'gonzalez', 9912345, 'Chain 2148', 'dsdf', 'fddffgf', '2021-07-13 22:12:43', '2021-07-13 22:12:43', 'usuario'),
(60, '2021-07-13', 48507501, 'fido', 'asdasd', 47256987, 'asdasd', '1', 'sdfsdf', '2021-07-14 00:22:19', '2021-07-14 00:22:19', 'usuario'),
(61, '2021-07-13', 46004120, 'Misha', 'asdasdd', 9912345, 'Chain 2148', 'MIDES', 'lalalla', '2021-07-14 00:23:28', '2021-07-14 00:23:28', 'usuario'),
(62, '2021-07-13', 42301201, 'fido', 'gonzalez', 9912345, 'Paysandu', 'Promocion Social', 'Entregado en oficina', '2021-07-14 00:33:24', '2021-07-14 00:33:24', 'usuario'),
(63, '2021-07-13', 42301201, 'Cata', 'Mendez', 9091234, 'Florida 123', 'MIDES', 'Es Bonita', '2021-07-14 00:54:41', '2021-07-14 00:54:41', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ci` int(8) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipo` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `ci`, `usuario`, `password`, `tipo`) VALUES
(1, 'Dario', 46004101, 'Dario', 'dario1', 'ad'),
(3, 'usuario', 11111111, 'usuario', 'usuario1', 'us');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
