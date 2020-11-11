-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2019 a las 13:45:08
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adminkey`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `cedula` int(40) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `programa` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `estado` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`cedula`, `nombre`, `apellido`, `programa`, `estado`) VALUES
(1234567, 'horacio', 'infante', 'ing sistemas ', 'sin prestamo'),
(9396647, 'ALONSO', 'GUEVARA PEREZ', 'ING.SISTEMAS', 'sin prestamo'),
(35422782, 'YEIMMY ALEJANDRA', 'CONTRERAS SUAREZ', 'ING.SISTEMAS', 'sin prestamo'),
(46677057, 'JENNY JAZMIN', 'GOMEZ MURCIA', 'CONTADURIA', 'sin prestamo'),
(51904598, 'OLGA ROCIO', 'ROJAS CASTILLO', 'ZOOTECNIA', 'sin prestamo'),
(1076648540, 'SYLVIA MAGALY', 'PAEZ OVIEDO', 'ING.SISTEMAS', 'sin prestamo'),
(1076666273, 'wilmer', 'pachon', 'ing sistemas', 'sin prestamo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_entrega`
--

CREATE TABLE `registro_entrega` (
  `nombre_sala` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `bloque` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `codigo_llave` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_docente` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido_docente` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `cedula_docente` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `programa` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `hora` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `novedades` varchar(400) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_solicitud`
--

CREATE TABLE `registro_solicitud` (
  `nombre_sala` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `bloque` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `codigo_llave` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_docente` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido_docente` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `cedula_docente` int(30) NOT NULL,
  `programa` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `hora` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `registro_solicitud`
--

INSERT INTO `registro_solicitud` (`nombre_sala`, `bloque`, `codigo_llave`, `nombre_docente`, `apellido_docente`, `cedula_docente`, `programa`, `fecha`, `hora`) VALUES
('tyu', 'erty', '234567', 'dfgh', 'fgh', 5678, 'tyui', '28-10-2019', '18:41:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `codigollave` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `bloque` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `estado` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `caracteristicas` varchar(1000) COLLATE latin1_spanish_ci NOT NULL,
  `id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`codigollave`, `bloque`, `nombre`, `estado`, `caracteristicas`, `id`) VALUES
('10000269C106', 'C-106', 'Laboratorio Gerencial y contable2', 'Activa', 'La sala cuenta con 33 equipos de computo y 1 televisor\r\n', 1),
('10000343G201', 'G-201', 'Sala General de Sistemas ', 'Activa', 'La sala cuenta con 37 equipos de computo y 1 televisor\r\n', 2),
('10000362C104', 'C-104', 'Sala de Redes', 'Activa', 'La sala cuenta con 23 equipos de computo y 1 televisor\r\n', 3),
('10000425G102', 'G-102', 'Laboratorio Gerencial y contable1', 'Activa', 'La sala cuenta con 37 equipos de computo y 1 televisor', 4),
('10000623C105', 'C-105', 'Laboratorio de Telecomunicaciones (CISCO)', 'Activa', 'La sala cuenta con 28 equipos de computo y no cuenta con televisor', 5),
('10000783G202', 'G-202', 'Sala de Telematica', 'Activa', 'La sala cuenta con 20 equipos de computo y 1 televisor\r\n', 6),
('10000872A106', 'A-106', 'Laboratorio de Electronica (TI)', 'Activa', 'La sala cuenta con 20 equipos de computo y 1 televisor\r\n', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(150) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `usuario` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(40) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `clave`) VALUES
(1, 'Universidad de Cundinamarca', 'admin', 'admin'),
(2, 'wilmer pachon', 'willy', '1234'),
(3, 'horacio', 'ch', '9e1e06ec8e02f0a0074f2fcc6b26303b');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `registro_entrega`
--
ALTER TABLE `registro_entrega`
  ADD PRIMARY KEY (`codigo_llave`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
