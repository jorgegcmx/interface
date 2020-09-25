-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2020 a las 22:25:53
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sis_escolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idalumnos` int(11) NOT NULL,
  `matricula` varchar(500) DEFAULT NULL,
  `apellidosalumno` varchar(50) NOT NULL,
  `nombrealumno` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `cedulaalumno` varchar(45) DEFAULT NULL,
  `carnetconadis` varchar(45) DEFAULT NULL,
  `discapacidad` varchar(45) DEFAULT NULL,
  `porcentajediscapacidad` varchar(45) DEFAULT NULL,
  `representante` varchar(200) DEFAULT NULL,
  `cedularepresentante` varchar(45) NOT NULL,
  `domicilio` varchar(500) DEFAULT NULL,
  `tlfconvencional` varchar(45) NOT NULL,
  `tlfcelular` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `codigoluz` varchar(45) NOT NULL,
  `estatus_idestatus` int(11) NOT NULL,
  `id_tipo_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idalumnos`, `matricula`, `apellidosalumno`, `nombrealumno`, `password`, `cedulaalumno`, `carnetconadis`, `discapacidad`, `porcentajediscapacidad`, `representante`, `cedularepresentante`, `domicilio`, `tlfconvencional`, `tlfcelular`, `email`, `codigoluz`, `estatus_idestatus`, `id_tipo_alumno`) VALUES
(149, '08001421', 'Gonzalez Camacho', 'Jorge', '08001421', '1234', '123', 'Visual', '50%', 'Ana', '1234', 'Aguascalientes', '4492570329', '4492570329', 'abalanch_jagc@hotmail.com', '1234', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_tiene_grupos`
--

CREATE TABLE `alumnos_tiene_grupos` (
  `iddetalle_a_g` int(11) NOT NULL,
  `alumnos_idalumnos` int(11) NOT NULL,
  `grupos_idgrupos` int(11) NOT NULL,
  `periodosescolares_idperiodos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos_tiene_grupos`
--

INSERT INTO `alumnos_tiene_grupos` (`iddetalle_a_g`, `alumnos_idalumnos`, `grupos_idgrupos`, `periodosescolares_idperiodos`) VALUES
(5, 149, 2, 3),
(8, 149, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `idcalificaciones` int(11) NOT NULL,
  `alumnos_idalumnos` int(11) NOT NULL,
  `grupos_idgrupos` int(11) NOT NULL,
  `materias_idmaterias` int(11) NOT NULL,
  `calificacion` varchar(45) DEFAULT NULL,
  `parcial` varchar(100) NOT NULL,
  `parcial_idparcial` int(11) NOT NULL,
  `ciclo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`idcalificaciones`, `alumnos_idalumnos`, `grupos_idgrupos`, `materias_idmaterias`, `calificacion`, `parcial`, `parcial_idparcial`, `ciclo`) VALUES
(13, 149, 2, 5, '9.22', 'P', 1, 3),
(14, 149, 2, 5, '10', 'P', 2, 3),
(17, 149, 2, 5, '10', 'E', 4, 3),
(18, 149, 2, 5, '9.72', 'P', 3, 3),
(19, 149, 2, 7, '8.07', 'P', 1, 3),
(20, 149, 2, 7, '8', 'P', 2, 3),
(21, 149, 2, 7, '9', 'P', 3, 3),
(22, 149, 2, 7, '10', 'E', 4, 3),
(23, 149, 2, 5, '9.22', 'P', 1, 4),
(24, 149, 2, 5, '10', 'P', 2, 4),
(25, 149, 2, 5, '10', 'E', 4, 4),
(26, 149, 2, 5, '9.72', 'P', 3, 4),
(27, 149, 2, 7, '8.07', 'P', 1, 4),
(28, 149, 2, 7, '8', 'P', 2, 4),
(29, 149, 2, 7, '9', 'P', 3, 4),
(31, 149, 2, 7, '9.67', 'E', 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `idestatus` int(11) NOT NULL,
  `estatuscol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`idestatus`, `estatuscol`) VALUES
(1, 'Alta'),
(2, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `idgrupos` int(11) NOT NULL,
  `grupo` varchar(45) DEFAULT NULL,
  `fechainicio` varchar(45) DEFAULT NULL,
  `fechatermino` varchar(45) DEFAULT NULL,
  `tipodegrupo_idtipodegrupo` int(11) NOT NULL,
  `diasdeclase` varchar(100) DEFAULT NULL,
  `totalmaterias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`idgrupos`, `grupo`, `fechainicio`, `fechatermino`, `tipodegrupo_idtipodegrupo`, `diasdeclase`, `totalmaterias`) VALUES
(2, 'Inicial', '11:43', '09:43', 1, 'LUNES A VIERNES', 5),
(3, 'Inicial', '11:43', '11:43', 2, '0', 5),
(4, 'Primero de BÃ¡sica', '11:43', '11:43', 1, '0', 3),
(5, 'Segundo de BÃ¡sica', '11:43', '11:43', 1, '0', 1),
(6, 'Tercero de BÃ¡sica', '11:43', '11:43', 1, '0', 1),
(7, 'Cuarto de BÃ¡sica', '11:43', '11:43', 1, '0', 1),
(8, 'Quinto de BÃ¡sica', '11:43', '11:43', 1, '0', 1),
(9, 'Sexto de BÃ¡sica ', '11:43', '11:43', 1, '0', 1),
(10, 'SÃ©ptimo de BÃ¡sica ', '11:43', '11:43', 1, '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `idmaterias` int(11) NOT NULL,
  `materia` varchar(45) DEFAULT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`idmaterias`, `materia`, `id_tipo`) VALUES
(5, 'MATEMATICAS', 1),
(7, 'LENGUA Y LITERATURA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcial`
--

CREATE TABLE `parcial` (
  `idparcial` int(11) NOT NULL,
  `parcialcol` varchar(45) DEFAULT NULL,
  `tipo_bloque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parcial`
--

INSERT INTO `parcial` (`idparcial`, `parcialcol`, `tipo_bloque`) VALUES
(1, 'PARCIAL 1', 1),
(2, 'PARCIAL 2', 1),
(3, 'PARCIAL 3', 1),
(4, 'PROMEDIO EXAMEN', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodosescolares`
--

CREATE TABLE `periodosescolares` (
  `idperiodos` int(11) NOT NULL,
  `periodoescolar` varchar(200) DEFAULT NULL,
  `anio` varchar(45) DEFAULT NULL,
  `stus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `periodosescolares`
--

INSERT INTO `periodosescolares` (`idperiodos`, `periodoescolar`, `anio`, `stus`) VALUES
(3, 'PRIMER QUIMESTRE', '2021', '1'),
(4, 'SEGUNDO QUIMESTRE', '2021', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `idprofesores` int(11) NOT NULL,
  `cedula` varchar(45) DEFAULT NULL,
  `nombreprofesor` varchar(45) DEFAULT NULL,
  `direccionp` varchar(45) DEFAULT NULL,
  `telefonop` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_tipo_profe` int(11) NOT NULL,
  `apellidoprofesor` varchar(100) NOT NULL,
  `emailp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`idprofesores`, `cedula`, `nombreprofesor`, `direccionp`, `telefonop`, `password`, `id_tipo_profe`, `apellidoprofesor`, `emailp`) VALUES
(3, '08001421', 'Jorge Antonio ', 'Acambarao Guanajuato', '41710005859', '08001421', 1, 'Gonzalez', 'canelojagc@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores_tiene_materias`
--

CREATE TABLE `profesores_tiene_materias` (
  `iddetalle_p_m` int(11) NOT NULL,
  `profesores_idprofesores` int(11) NOT NULL,
  `materias_idmaterias` int(11) NOT NULL,
  `grupos_idgrupos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores_tiene_materias`
--

INSERT INTO `profesores_tiene_materias` (`iddetalle_p_m`, `profesores_idprofesores`, `materias_idmaterias`, `grupos_idgrupos`) VALUES
(6, 3, 5, 2),
(8, 3, 7, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodegrupo`
--

CREATE TABLE `tipodegrupo` (
  `idtipodegrupo` int(11) NOT NULL,
  `tipodegrupo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipodegrupo`
--

INSERT INTO `tipodegrupo` (`idtipodegrupo`, `tipodegrupo`) VALUES
(1, 'Discapacidad Visual'),
(2, 'Discapacidad Auditiva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `privilegios_idprivilegios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `nombre`, `password`, `privilegios_idprivilegios`) VALUES
(1, 'chrisxelmx@gmail.com', 'scorpions.,,', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idalumnos`),
  ADD KEY `fk_alumnos_estatus1_idx` (`cedularepresentante`),
  ADD KEY `estatus_idestatus` (`estatus_idestatus`),
  ADD KEY `id_tipo_alumno` (`id_tipo_alumno`);

--
-- Indices de la tabla `alumnos_tiene_grupos`
--
ALTER TABLE `alumnos_tiene_grupos`
  ADD PRIMARY KEY (`iddetalle_a_g`),
  ADD KEY `fk_alumnos_has_grupos_grupos1_idx` (`grupos_idgrupos`),
  ADD KEY `fk_alumnos_has_grupos_alumnos1_idx` (`alumnos_idalumnos`),
  ADD KEY `fk_alumnos_tiene_grupos_periodosescolares1_idx` (`periodosescolares_idperiodos`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`idcalificaciones`),
  ADD KEY `fk_calificaciones_alumnos1_idx` (`alumnos_idalumnos`),
  ADD KEY `fk_calificaciones_materias1_idx` (`materias_idmaterias`),
  ADD KEY `fk_calificaciones_grupos1_idx` (`grupos_idgrupos`),
  ADD KEY `fk_calificaciones_parcial1_idx` (`parcial_idparcial`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`idestatus`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`idgrupos`),
  ADD KEY `fk_grupos_tipodegrupo_idx` (`tipodegrupo_idtipodegrupo`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`idmaterias`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `parcial`
--
ALTER TABLE `parcial`
  ADD PRIMARY KEY (`idparcial`);

--
-- Indices de la tabla `periodosescolares`
--
ALTER TABLE `periodosescolares`
  ADD PRIMARY KEY (`idperiodos`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`idprofesores`),
  ADD KEY `id_tipo_profe` (`id_tipo_profe`);

--
-- Indices de la tabla `profesores_tiene_materias`
--
ALTER TABLE `profesores_tiene_materias`
  ADD PRIMARY KEY (`iddetalle_p_m`),
  ADD KEY `fk_profesores_has_materias_materias1_idx` (`materias_idmaterias`),
  ADD KEY `fk_profesores_has_materias_profesores1_idx` (`profesores_idprofesores`),
  ADD KEY `fk_profesores_tiene_materias_grupos1_idx` (`grupos_idgrupos`);

--
-- Indices de la tabla `tipodegrupo`
--
ALTER TABLE `tipodegrupo`
  ADD PRIMARY KEY (`idtipodegrupo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idalumnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `alumnos_tiene_grupos`
--
ALTER TABLE `alumnos_tiene_grupos`
  MODIFY `iddetalle_a_g` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `idcalificaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `idestatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `idgrupos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `idmaterias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `parcial`
--
ALTER TABLE `parcial`
  MODIFY `idparcial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `periodosescolares`
--
ALTER TABLE `periodosescolares`
  MODIFY `idperiodos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `idprofesores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `profesores_tiene_materias`
--
ALTER TABLE `profesores_tiene_materias`
  MODIFY `iddetalle_p_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipodegrupo`
--
ALTER TABLE `tipodegrupo`
  MODIFY `idtipodegrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`estatus_idestatus`) REFERENCES `estatus` (`idestatus`),
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`id_tipo_alumno`) REFERENCES `tipodegrupo` (`idtipodegrupo`);

--
-- Filtros para la tabla `alumnos_tiene_grupos`
--
ALTER TABLE `alumnos_tiene_grupos`
  ADD CONSTRAINT `fk_alumnos_has_grupos_alumnos1` FOREIGN KEY (`alumnos_idalumnos`) REFERENCES `alumnos` (`idalumnos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumnos_has_grupos_grupos1` FOREIGN KEY (`grupos_idgrupos`) REFERENCES `grupos` (`idgrupos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumnos_tiene_grupos_periodosescolares1` FOREIGN KEY (`periodosescolares_idperiodos`) REFERENCES `periodosescolares` (`idperiodos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `fk_calificaciones_alumnos1` FOREIGN KEY (`alumnos_idalumnos`) REFERENCES `alumnos` (`idalumnos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calificaciones_grupos1` FOREIGN KEY (`grupos_idgrupos`) REFERENCES `grupos` (`idgrupos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calificaciones_materias1` FOREIGN KEY (`materias_idmaterias`) REFERENCES `materias` (`idmaterias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calificaciones_parcial1` FOREIGN KEY (`parcial_idparcial`) REFERENCES `parcial` (`idparcial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `fk_grupos_tipodegrupo` FOREIGN KEY (`tipodegrupo_idtipodegrupo`) REFERENCES `tipodegrupo` (`idtipodegrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipodegrupo` (`idtipodegrupo`);

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`id_tipo_profe`) REFERENCES `tipodegrupo` (`idtipodegrupo`);

--
-- Filtros para la tabla `profesores_tiene_materias`
--
ALTER TABLE `profesores_tiene_materias`
  ADD CONSTRAINT `fk_profesores_has_materias_materias1` FOREIGN KEY (`materias_idmaterias`) REFERENCES `materias` (`idmaterias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profesores_has_materias_profesores1` FOREIGN KEY (`profesores_idprofesores`) REFERENCES `profesores` (`idprofesores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profesores_tiene_materias_grupos1` FOREIGN KEY (`grupos_idgrupos`) REFERENCES `grupos` (`idgrupos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
