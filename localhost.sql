-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-06-2023 a las 04:56:43
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id20861875_almacen`
--
CREATE DATABASE IF NOT EXISTS `id20861875_almacen` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id20861875_almacen`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `fecha_mov` date NOT NULL,
  `cve_emp` varchar(30) NOT NULL,
  `id_pdto` varchar(30) NOT NULL,
  `cant_asig` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `cve_emp` varchar(30) NOT NULL,
  `rfc_emp` varchar(30) NOT NULL,
  `curp_emp` varchar(30) NOT NULL,
  `nom_emp` varchar(60) NOT NULL,
  `depto_emp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`cve_emp`, `rfc_emp`, `curp_emp`, `nom_emp`, `depto_emp`) VALUES
('234', 'HECM711120', 'HECMMVZNDR03', 'MARGARITA HERNANDEZ CANSECO', 'CAMPO'),
('65058733', 'BAMI9412095K5', 'BAMI941209', 'IRVING YAHIR BASULTO MALDONADO', 'PLANTA EXTERNA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_pdto` varchar(30) NOT NULL,
  `desc_pdto` varchar(60) NOT NULL,
  `lote_pdto` varchar(30) NOT NULL,
  `unidad` varchar(30) NOT NULL,
  `cantidad` double NOT NULL,
  `costo` double NOT NULL,
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