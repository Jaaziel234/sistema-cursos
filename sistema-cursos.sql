-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-10-2020 a las 08:07:15
-- Versión del servidor: 10.3.23-MariaDB-0+deb10u1
-- Versión de PHP: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema-cursos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `Id` int(11) NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Contraseña` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` tinyint(2) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`Id`, `Nombres`, `Apellidos`, `Usuario`, `Contraseña`, `Estado`) VALUES
(1, 'Jose', 'Deodanes', 'admin1', 'admin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`Id`, `Nombre`) VALUES
(1, 'Computacion 1'),
(8, 'Ingeniería mecanica'),
(9, 'Licenciatura en computacion'),
(10, 'Economia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `Id` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Id_Usuario` int(11) NOT NULL,
  `Id_Curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `Id` int(11) NOT NULL,
  `Temas` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `DuracionVideo` decimal(50,0) NOT NULL,
  `Video` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `DuracionCurso` int(11) NOT NULL,
  `Precio` decimal(11,0) NOT NULL,
  `Imagen` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Docente` int(11) NOT NULL,
  `Id_Carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`Id`, `Nombre`, `Descripcion`, `Fecha`, `DuracionCurso`, `Precio`, `Imagen`, `Id_Docente`, `Id_Carrera`) VALUES
(38, 'Python3', 'Aprenderas acerca de la sintaxis de programacion de Python', '2020-10-09', 9, '15', '1602263398_fondopython.jpg', 33, 1),
(39, 'Curso de SQL sintax', 'Aprenderas acerca de la programacion de sql', '2020-10-09', 9, '8', '1602263586_FotoJet (1).jpg', 33, 1),
(40, 'Economia', 'Aprenderas las sobre los estados financieros', '2020-10-09', 8, '15', '1602263755_keyboard-933568_1280.jpg', 33, 10),
(41, 'SQL', 'hgfhgfhfg', '2020-10-10', 9, '6', '1602352720_work-731198_1280.jpg', 33, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `Id` int(11) NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Sexo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Contraseña` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` tinyint(2) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`Id`, `Nombres`, `Apellidos`, `Sexo`, `Usuario`, `Contraseña`, `Foto`, `Estado`) VALUES
(33, 'Jose', 'linares', 'M', 'admin', 'admin', '1602262774_pp.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`Id`, `Nombre`) VALUES
(1, 'Paypal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `Id` int(11) NOT NULL,
  `Tipo_Plan` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Precio` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`Id`, `Tipo_Plan`, `Descripcion`, `Precio`) VALUES
(2, 'Premium', 'Plan con limitado', '45.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema_contenido`
--

CREATE TABLE `tema_contenido` (
  `Id` int(11) NOT NULL,
  `Tema` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tema_contenido`
--

INSERT INTO `tema_contenido` (`Id`, `Tema`, `Id_Curso`) VALUES
(6, 'Video introductorio', 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Sexo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Fecha_nacimiento` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Contraseña` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Foto` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Id_Curso` int(11) DEFAULT NULL,
  `Id_Plan` int(11) DEFAULT NULL,
  `Id_Pago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventacurso`
--

CREATE TABLE `ventacurso` (
  `Id` int(11) NOT NULL,
  `Correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ClaveTransaccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `PaypalDato` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Usuario` (`Id_Usuario`),
  ADD KEY `Id_Curso` (`Id_Curso`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Curso` (`Id_Curso`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Docente` (`Id_Docente`),
  ADD KEY `Id_Carrera` (`Id_Carrera`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tema_contenido`
--
ALTER TABLE `tema_contenido`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Contenido` (`Id_Curso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Curso` (`Id_Curso`),
  ADD KEY `Id_Plan` (`Id_Plan`),
  ADD KEY `Id_Pago` (`Id_Pago`);

--
-- Indices de la tabla `ventacurso`
--
ALTER TABLE `ventacurso`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tema_contenido`
--
ALTER TABLE `tema_contenido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventacurso`
--
ALTER TABLE `ventacurso`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`Id_Curso`) REFERENCES `curso` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `contenido_ibfk_1` FOREIGN KEY (`Id_Curso`) REFERENCES `curso` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`Id_Docente`) REFERENCES `docente` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_ibfk_2` FOREIGN KEY (`Id_Carrera`) REFERENCES `carrera` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tema_contenido`
--
ALTER TABLE `tema_contenido`
  ADD CONSTRAINT `tema_contenido_ibfk_1` FOREIGN KEY (`Id_Curso`) REFERENCES `curso` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventacurso`
--
ALTER TABLE `ventacurso`
  ADD CONSTRAINT `ventacurso_ibfk_3` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
