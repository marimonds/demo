-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2024 a las 04:44:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `weather`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clima`
--

CREATE TABLE `clima` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `max` int(11) NOT NULL,
  `min` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clima`
--

INSERT INTO `clima` (`id`, `code`, `max`, `min`) VALUES
(3, 'TLC', 17, 11),
(5, 'MTY', 35, 19),
(6, 'MEX', 19, 14),
(7, 'TAM', 32, 24),
(8, 'GDL', 29, 16),
(9, 'CJS', 34, 16),
(10, 'CUN', 31, 27),
(11, 'TIJ', 26, 16),
(12, 'HMO', 41, 22),
(13, 'CME', 29, 27),
(14, 'MID', 36, 26),
(15, 'CTM', 32, 28),
(16, 'VER', 29, 23),
(17, 'OAX', 22, 16),
(18, 'HUX', 25, 23),
(19, 'ZIH', 28, 25),
(20, 'PVR', 33, 25),
(21, 'LIM', 19, 16),
(22, 'HAV', 33, 24),
(23, 'BOG', 14, 11),
(24, 'MIA', 32, 26),
(25, 'LAX', 18, 14),
(26, 'JFK', 18, 17),
(27, 'TRC', 30, 14),
(28, 'PXM', 25, 24),
(29, 'ACA', 27, 24),
(30, 'MZT', 35, 24),
(31, 'GUA', 22, 15),
(32, 'AGU', 28, 13),
(33, 'VSA', 35, 24),
(34, 'BZE', 29, 27),
(35, 'DFW', 34, 19),
(36, 'CZM', 31, 28),
(37, 'ORD', 22, 18),
(38, 'PHX', 45, 27),
(39, 'CUU', 29, 16),
(40, 'QRO', 24, 13),
(41, 'BJX', 25, 12),
(42, 'PBC', 17, 13),
(43, 'PHL', 20, 17),
(44, 'SLP', 25, 10),
(45, 'CLT', 27, 20),
(46, 'YYZ', 22, 18),
(47, 'IAH', 36, 20),
(48, 'YVR', 15, 10),
(49, 'CDG', 16, 12),
(50, 'ZCL', 26, 9),
(59, 'AMS', 13, 9),
(60, 'ATL', 29, 19),
(61, 'CEN', 40, 23),
(62, 'MAD', 27, 16),
(63, 'SCL', 22, 12);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clima`
--
ALTER TABLE `clima`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clima`
--
ALTER TABLE `clima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
