-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2023 a las 20:25:16
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
-- Base de datos: `almacen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `fecha_mov` date NOT NULL,
  `cve_emp` varchar(5) NOT NULL,
  `id_pdto` varchar(4) NOT NULL,
  `cant_asig` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `cve_emp` varchar(5) NOT NULL,
  `rfc_emp` varchar(13) NOT NULL,
  `curp_emp` varchar(18) NOT NULL,
  `nom_emp` varchar(60) NOT NULL,
  `depto_emp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`cve_emp`, `rfc_emp`, `curp_emp`, `nom_emp`, `depto_emp`) VALUES
('234', 'HECM711120', 'HECMMVZNDR03', 'MARGARITA HERNANDEZ CANSECO', 'CAMPO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_pdto` varchar(4) NOT NULL,
  `desc_pdto` varchar(60) NOT NULL,
  `lote_pdto` varchar(15) NOT NULL,
  `unidad` varchar(3) NOT NULL,
  `cantidad` float NOT NULL,
  `costo` float NOT NULL,
  `fecha_mov` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_pdto`, `desc_pdto`, `lote_pdto`, `unidad`, `cantidad`, `costo`, `fecha_mov`) VALUES
('1234', 'CONECTORES RJ45', 'A1232', 'CAJ', 2, 100, '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`cve_emp`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_pdto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;