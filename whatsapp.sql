-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-01-2021 a las 14:43:42
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `whatsapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escribe`
--

CREATE TABLE `escribe` (
  `id` int(11) NOT NULL,
  `emisor` varchar(9) NOT NULL,
  `receptor` varchar(9) NOT NULL,
  `texto` varchar(500) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `adjunto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `escribe`
--

INSERT INTO `escribe` (`id`, `emisor`, `receptor`, `texto`, `fecha`, `adjunto`) VALUES
(1, '611111111', '622222222', 'hola', '2021-01-20', ''),
(2, '611111111', '622222222', 'tufyglh', '2021-01-20', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `tfno` varchar(9) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `nick` varchar(20) DEFAULT NULL,
  `conectado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`tfno`, `pass`, `estado`, `avatar`, `color`, `nick`, `conectado`) VALUES
('611111111', 'asd', 'El puto amo', 'cvbn.png', 'verde', 'Optimus Prime', 0),
('622222222', '123', 'Complaciendo a Hector...', 'Egeón_el_Hecatónquiro.jpg', 'rojo', 'Vato Loco', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `escribe`
--
ALTER TABLE `escribe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receptor` (`receptor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`tfno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `escribe`
--
ALTER TABLE `escribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `escribe`
--
ALTER TABLE `escribe`
  ADD CONSTRAINT `escribe_ibfk_1` FOREIGN KEY (`receptor`) REFERENCES `usuario` (`tfno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
