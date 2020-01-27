-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2020 a las 00:26:16
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ayuntamiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_activos`
--

CREATE TABLE `cat_activos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `activa` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_activos`
--

INSERT INTO `cat_activos` (`id`, `categoria`, `activa`) VALUES
(1, 'En campo', 1),
(2, 'Suspendido', 1),
(3, 'De vacaciones', 1),
(4, 'Inactivo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_departamentos`
--

CREATE TABLE `cat_departamentos` (
  `id` int(11) NOT NULL,
  `Nombre_departamento` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_departamentos`
--

INSERT INTO `cat_departamentos` (`id`, `Nombre_departamento`, `activo`) VALUES
(1, 'Administraci?n', 1),
(2, 'Servicio Social', 1),
(3, 'Sistemas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_niveles`
--

CREATE TABLE `cat_niveles` (
  `id` int(11) NOT NULL,
  `categoria` varchar(250) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_niveles`
--

INSERT INTO `cat_niveles` (`id`, `categoria`, `activo`) VALUES
(1, 'Administrador', 1),
(2, 'Usuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Ap` varchar(50) NOT NULL,
  `Am` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `estatus` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `Nombre`, `Ap`, `Am`, `telefono`, `correo`, `direccion`, `sexo`, `estatus`, `foto`) VALUES
(1, '0', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/848.jpg'),
(2, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/524.jpg'),
(3, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/960.jpg'),
(4, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/326.jpg'),
(5, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/779.jpg'),
(6, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/945.jpg'),
(7, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/444.jpg'),
(8, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/701.jpg'),
(9, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/184.jpg'),
(10, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/740.jpg'),
(11, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/464.jpg'),
(12, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/140.jpg'),
(13, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/811.jpg'),
(14, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/188.jpg'),
(15, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/684.jpg'),
(16, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/461.jpg'),
(17, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/724.jpg'),
(18, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/746.jpg'),
(19, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/943.jpg'),
(20, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/552.jpg'),
(21, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/648.jpg'),
(22, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/407.jpg'),
(23, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/957.jpg'),
(24, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/584.jpg'),
(25, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/428.jpg'),
(26, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/659.jpg'),
(27, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/485.jpg'),
(28, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/371.jpg'),
(29, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/664.jpg'),
(30, 'Francisco', 'Flores', 'e', '554255994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/589.jpg'),
(31, 'Luis Enrique', 'Marquez', 'Lopez', '5542555994', 'luisenriqueisc@hotmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '1', 1, '../../views/imgUsers/937.jpg'),
(32, 'Luis Enrique', 'Marquez', 'Lopez', '5542555994', 'luisenriqueisc@hotmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '1', 1, '../../views/imgUsers/793.jpg'),
(33, 'Luis Enrique', 'Marquez', 'Lopez', '5542555994', 'luisenriqueisc@hotmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '1', 1, '../../views/imgUsers/757.jpg'),
(34, 'Luis Enrique', 'Marquez', 'Lopez', '5542555994', 'luisenriqueisc@hotmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '1', 1, '../../views/imgUsers/664.jpg'),
(35, 'Francisco', 'Flores', 'gkj', '55642555994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '1', 1, '../../views/imgUsers/631.jpg'),
(36, 'Francisco', 'Flores', 'w', '5542555994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '1', 1, '../../views/imgUsers/994.jpg'),
(37, 'Francisco', 'Flores', '2re', '5542555994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '1', 1, '../../views/imgUsers/393.jpg'),
(38, 'Francisco', 'Flores', 'lop', '5542555994', '12franciscofh@gmail.com', 'Llanos de Copilco\nMz 14 Lt 5', '2', 1, '../../views/imgUsers/842.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(80) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `nivel_usuario` int(10) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` text NOT NULL,
  `departamento` int(11) NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `intentos` int(11) NOT NULL,
  `fecha_ultimo_login` date NOT NULL DEFAULT current_timestamp(),
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `pass`, `nivel_usuario`, `correo`, `telefono`, `departamento`, `fecha_registro`, `intentos`, `fecha_ultimo_login`, `activo`) VALUES
(1, 'FrFle', 'FrFle827FrFleAyntL1280149371', 0, '', '0', 0, '2020-01-27', 0, '2020-01-27', 0),
(2, 'FrFle', 'FrFle504FrFleAyntL852566785', 0, '', '0', 0, '2020-01-27', 0, '2020-01-27', 0),
(3, 'LuMaLo', 'LuMaLo260LuMaLoAyntL894637582', 1, 'luisenriqueisc@hotmail.com', '2147483647', 2, '2020-01-27', 0, '2020-01-27', 1),
(4, 'FrFlgk', 'FrFlgk425FrFlgkAyntL688842148', 1, '12franciscofh@gmail.com', '2147483647', 1, '2020-01-27', 0, '2020-01-27', 1),
(5, 'FrFlw', 'FrFlw884FrFlwAyntL1513004491', 1, '12franciscofh@gmail.com', '5542555994', 2, '2020-01-27', 0, '2020-01-27', 1),
(6, 'FrFl2r', 'FrFl2r586FrFl2rAyntL1701832762', 1, '12franciscofh@gmail.com', '5542555994', 1, '2020-01-27', 0, '2020-01-27', 1),
(7, 'FrFllo', 'FrFllo599FrFlloAyntL878094765', 1, '12franciscofh@gmail.com', '5542555994', 1, '2020-01-27', 0, '2020-01-27', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_activos`
--
ALTER TABLE `cat_activos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_departamentos`
--
ALTER TABLE `cat_departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_niveles`
--
ALTER TABLE `cat_niveles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
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
-- AUTO_INCREMENT de la tabla `cat_activos`
--
ALTER TABLE `cat_activos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cat_departamentos`
--
ALTER TABLE `cat_departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cat_niveles`
--
ALTER TABLE `cat_niveles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
