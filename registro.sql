-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2024 a las 10:22:39
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
-- Base de datos: `phpavanzado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `email` varchar(100) NOT NULL,
  `clave` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`email`, `clave`) VALUES
('marcelo@gmail.com', '$2y$04$xHCGBkpDIAVqfDC23qeTQeoMC9bYo9s3GjV2L2.I3gxYlfNO5Vh5e'),
('marito@hotmail.com', '$2y$04$FadOP7qxoullf6g6tH8MZ.Cc/64ladaqfYNCb.Dz8hfw3UOzx5zLm'),
('mauro_lafuente@hotmail.com', '$2y$04$M2aWw8pH2w1Pl0/XoD4Nf.HnIIb762dZpEm7/fmOQpICnKw2LdaKW'),
('robertocarlo@gmail.com', '$2y$04$ElsjAbiWUeWjiAboPTwwJOvefzkKGMedN5rcd7pnFVPGPc903lr5S'),
('romii_011@hotmail.com', '$2y$04$IZ65k5eRO3QaDSp/9ZXoP.1wEhJeY7.2SlS9T7cf1lhY4JM0UOcmu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
