-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2017 a las 01:05:13
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegiodb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idAlumno` int(9) NOT NULL,
  `Nombre` char(45) DEFAULT NULL,
  `Apellido` char(45) DEFAULT NULL,
  `FechaNac` date DEFAULT NULL,
  `LugarNac` char(35) DEFAULT NULL,
  `Sexo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargadenotas`
--

CREATE TABLE `cargadenotas` (
  `idAlumno` int(9) DEFAULT NULL,
  `AñoEscolar` year(4) DEFAULT NULL,
  `idNotasxmaterias` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `idInscripcion` int(11) NOT NULL,
  `idRepresentante` int(9) DEFAULT NULL,
  `idAlumno` int(9) DEFAULT NULL,
  `FechaInscripcion` date DEFAULT NULL,
  `TipoInscripcion` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `idMaestro` int(11) NOT NULL,
  `Nombre` char(45) DEFAULT NULL,
  `Apellido` char(45) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `Domicilio` varchar(45) DEFAULT NULL,
  `Cargo` varchar(45) DEFAULT NULL,
  `Asignatura` varchar(45) DEFAULT NULL,
  `Grado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `idMateria` int(11) NOT NULL,
  `Materia` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `idNota` int(11) NOT NULL,
  `PrimeraNota` varchar(25) DEFAULT NULL,
  `SegundaNota` varchar(25) DEFAULT NULL,
  `TerceraNota` varchar(25) DEFAULT NULL,
  `NotaFinal` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notasxmaterias`
--

CREATE TABLE `notasxmaterias` (
  `idNotasxmaterias` int(11) NOT NULL,
  `idMateria` int(11) DEFAULT NULL,
  `idNota` int(11) DEFAULT NULL,
  `idMaestro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representantes`
--

CREATE TABLE `representantes` (
  `idRepresentantes` int(9) NOT NULL,
  `Nombre` char(45) DEFAULT NULL,
  `Apellido` char(45) DEFAULT NULL,
  `FechaNac` date DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Celular` int(11) DEFAULT NULL,
  `Parentesco` varchar(25) DEFAULT NULL,
  `TelefonoEmergencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdeusuarios`
--

CREATE TABLE `tiposdeusuarios` (
  `idTipoUsuario` int(11) NOT NULL,
  `Tipo` char(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `Usuario` varchar(25) NOT NULL,
  `Contraseña` varchar(45) NOT NULL,
  `idTipoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idAlumno`);

--
-- Indices de la tabla `cargadenotas`
--
ALTER TABLE `cargadenotas`
  ADD KEY `idNotasxmaterias_idx` (`idNotasxmaterias`),
  ADD KEY `idNotaAlumno_idx` (`idAlumno`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`idInscripcion`),
  ADD KEY `idRepresentante_idx` (`idRepresentante`),
  ADD KEY `idAlumno_idx` (`idAlumno`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`idMaestro`),
  ADD KEY `idUsuario_idx` (`idUsuario`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`idMateria`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idNota`);

--
-- Indices de la tabla `notasxmaterias`
--
ALTER TABLE `notasxmaterias`
  ADD PRIMARY KEY (`idNotasxmaterias`),
  ADD KEY `idMateria_idx` (`idMateria`),
  ADD KEY `idNota_idx` (`idNota`),
  ADD KEY `idMaestro_idx` (`idMaestro`);

--
-- Indices de la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`idRepresentantes`);

--
-- Indices de la tabla `tiposdeusuarios`
--
ALTER TABLE `tiposdeusuarios`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idTipoUsuario_idx` (`idTipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `idMaestro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notasxmaterias`
--
ALTER TABLE `notasxmaterias`
  MODIFY `idNotasxmaterias` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cargadenotas`
--
ALTER TABLE `cargadenotas`
  ADD CONSTRAINT `idNotaAlumno` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idNotasxmaterias` FOREIGN KEY (`idNotasxmaterias`) REFERENCES `notasxmaterias` (`idNotasxmaterias`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `idAlumno` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idRepresentante` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notasxmaterias`
--
ALTER TABLE `notasxmaterias`
  ADD CONSTRAINT `idMaestro` FOREIGN KEY (`idMaestro`) REFERENCES `maestros` (`idMaestro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idMateria` FOREIGN KEY (`idMateria`) REFERENCES `materias` (`idMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idNota` FOREIGN KEY (`idNota`) REFERENCES `notas` (`idNota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `idTipoUsuario` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tiposdeusuarios` (`idTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
