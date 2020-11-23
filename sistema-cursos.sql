-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2020 a las 19:45:44
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.29

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
  `Contraseña` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` tinyint(2) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`Id`, `Nombres`, `Apellidos`, `Usuario`, `Contraseña`, `Estado`) VALUES
(1, 'Admin', 'administrador', 'admin', '$2y$10$MrFTzEpZrijq3S6Dd/2xyO3Aisek7dMTYLCh2ZjO8VBRvZ4qUWGKW', 1),
(2, 'José', 'Rivera', 'jose', '$2y$10$Ao7ONXzrYyZeon3On5DmXOjR7KV4q64g26SK3/AJB7eWb.cPmEZOS', 1),
(3, 'Diana', 'Barillas', 'diana3', '$2y$10$KY1TAVO1gbVmInBSfeZRH.RJA0iWGm6S9CRO7XdWHVLXbQzRuo0ea', 1);

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
(12, 'Curso de PHP'),
(13, 'Licenciatura en ciencias de la computación'),
(14, 'Lic. En Trabajo Social');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `Id` int(11) NOT NULL,
  `Comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Id_Usuario` int(11) NOT NULL,
  `Id_Curso` int(11) NOT NULL,
  `Id_Video` int(11) NOT NULL
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

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`Id`, `Temas`, `Nombre`, `Descripcion`, `DuracionVideo`, `Video`, `Id_Curso`) VALUES
(38, 'Introduccion a PHP', 'gfhfhgfhfg', 'hfghgfhfghgfhgfhgfhgfh', '6', '1605026903_1.Introducción a interfaces gráficas con Tkinter   Frame  Código nativo.mp4', 48),
(39, 'Introduccion a PHP Y SQL', 'fghfghfghgfh', 'fghfghfghgfhgfh', '6', '1605026916_1.Introducción a interfaces gráficas con Tkinter   Frame  Código nativo.mp4', 48),
(40, 'Introducción a la programación ', 'Video ciclo  while y do while', 'Las estructuras repetitivas (bucles) son aquellas ', '2', '1605333756_video.mp4', 50),
(41, 'Introducción a la Internet', 'Historia del internet', 'Internet es una red de ordenadores conectados en t', '2', '1605334279_video.mp4', 51);

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
(48, 'Curso de PHP', 'PHP es un lenguaje de programación de propósito general de código del lado del servidor originalment', '2020-11-10', 9, '56', '1605026865_Foto de curso.jpg', 45, 12),
(50, 'Programacion I', 'El objetivo de la programación es la de crear software, que después será ejecutado de manera directa', '2020-11-30', 2, '15', '1605333662_PhpMyAdmin_logo.png', 46, 13),
(51, 'Internet I', 'conocimientos básicos para iniciarse en el desarrollo de aplicaciones para ambientes web, en el func', '2020-11-22', 2, '15', '1605334036_html.jpg', 46, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `Id` int(11) NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `Sexo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Contraseña` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` tinyint(2) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`Id`, `Nombres`, `Apellidos`, `Descripcion`, `Sexo`, `Email`, `Usuario`, `Contraseña`, `Foto`, `Estado`) VALUES
(45, 'Carlos', 'Rivera', '', 'M', '', 'carlos', '$2y$10$lfCZhAqUZFkVvsYkk6JimO29yiMtxeddERT6vF9e.6zFUoYcGDuFa', '1605026807_Foto de curso.jpg', 1),
(46, 'Carolina', 'Vásquez', 'Desarrollador Front-End', 'F', 'caro@gmail.com', 'caro3', '$2y$10$OphYeA.anpFrhDLvePERzOV45X1eQXBeNfSf922e0zXCFxnf4Nfla', '1605333326_Polish_20200110_120346739.jpg', 1),
(47, 'Jose', 'Deo', 'Desarrollador Back-End', 'M', 'admin@admin', 'joseadmin', '$2y$10$NI9Eu4QWYiNifvg3boso5OjSZgmOuRhqCG3nSqTHUeSIsRikJrAdK', '1606153124_Proyecto Portón Automático.png', 1);

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
(0, 'Visa'),
(1, 'PayPal');

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
(2, 'Premium', 'Plan con Ilimitado', '45.00'),
(4, 'Platino', 'Este incluye 2 cursos', '25.00');

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
(15, 'Introduccion a PHP', 48),
(16, 'Introduccion a PHP Y SQL', 48),
(17, 'Introducción a la programación ', 50),
(18, 'Introducción a la Internet', 51);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Sexo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_nacimiento` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Contraseña` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Foto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Plan` int(11) NOT NULL,
  `Id_Pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Nombres`, `Apellidos`, `Sexo`, `Fecha_nacimiento`, `Correo`, `Usuario`, `Contraseña`, `Foto`, `Id_Plan`, `Id_Pago`) VALUES
(69, 'Carlos', 'Rivas', '', '', 'jose_503@gmail.com', 'jose', '$2y$10$JyjULNxmpfGTmOukc/KoMuZyD6OLhl2k9YR4QLf1A8/LXhiO8OKIK', '', 0, 0),
(70, 'Admin', 'admin', '', '', 'admin@admin', 'admin', '$2y$10$.Ee5qxhe1phs8gnbQLTIyeHevwAA84Dn8Mk./UPRh20t.oOR152Cq', '', 0, 0);

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
  `Id_Usuario` int(11) NOT NULL,
  `Id_Curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventacurso`
--

INSERT INTO `ventacurso` (`Id`, `Correo`, `ClaveTransaccion`, `PaypalDato`, `Fecha`, `Estado`, `Id_Usuario`, `Id_Curso`) VALUES
(40, '', '', '', '2020-11-18 04:52:58', 'pagado', 69, 48),
(41, '', '', '', '2020-11-18 04:52:58', 'pagado', 69, 50),
(42, '', '', '', '2020-11-18 04:52:58', 'pagado', 69, 51),
(43, '', '', '', '2020-11-23 18:29:48', 'pagado', 69, 48),
(44, '', '', '', '2020-11-23 18:29:48', 'pagado', 69, 50),
(45, '', '', '', '2020-11-23 18:29:48', 'pagado', 69, 51);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tema_contenido`
--
ALTER TABLE `tema_contenido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `ventacurso`
--
ALTER TABLE `ventacurso`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
  ADD CONSTRAINT `curso_ibfk_2` FOREIGN KEY (`Id_Carrera`) REFERENCES `carrera` (`Id`);

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
