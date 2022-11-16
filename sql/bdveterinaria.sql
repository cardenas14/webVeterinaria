-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2021 a las 21:56:20
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdveterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--


--
-- Base de datos: `bdveterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `IdCategoria` int(10) NOT NULL,
  `Nombre` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `IdEspecialidad` int(10) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_paciente`
--

CREATE TABLE `historial_paciente` (
  `IdHistorial` int(10) NOT NULL,
  `DNI` int(8) NOT NULL,
  `IdEspecilidad` int(10) NOT NULL,
  `IdEmpleado` int(10) NOT NULL,
  `Precio` double NOT NULL,
  `FechaAtencion` date NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `IdEmpleado` int(10) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Turno` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_empleado`
--

CREATE TABLE `login_empleado` (
  `IdEmpleado` int(10) NOT NULL,
  `DniEmpleado` int(8) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Edad` int(100) NOT NULL,
  `contrasennia` varchar(30) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `IdEspecialidad` int(10) NOT NULL,
  `IdRol` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_usuario`
--

CREATE TABLE `login_usuario` (
  `DNI` int(8) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Edad` int(100) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `contrasennia` varchar(50) NOT NULL,
  `Correo` varchar(40) NOT NULL,
  `IdRol` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(10) NOT NULL,
  `IdCategoria` int(10) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Precio_Venta` double NOT NULL,
  `stock` int(250) NOT NULL,
  `Imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_cita`
--

CREATE TABLE `reserva_cita` (
  `DNI` int(8) NOT NULL,
  `Turno` varchar(20) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Consulta` varchar(100) NOT NULL,
  `IdEspecialidad` int(10) NOT NULL,
  `IdEmpleado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IdRol` int(10) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitar_info`
--

CREATE TABLE `solicitar_info` (
  `IdInfo` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `DNI` int(8) NOT NULL,
  `Telefono` int(12) NOT NULL,
  `Fecha` date NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Consulta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`IdEspecialidad`);

--
-- Indices de la tabla `historial_paciente`
--
ALTER TABLE `historial_paciente`
  ADD PRIMARY KEY (`IdHistorial`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD KEY `Horarios_loginEmpleado_fk` (`IdEmpleado`);

--
-- Indices de la tabla `login_empleado`
--
ALTER TABLE `login_empleado`
  ADD PRIMARY KEY (`IdEmpleado`),
  ADD KEY `especialidad_loginEmpleado_fk` (`IdEspecialidad`),
  ADD KEY `roles_loginEmpleado_fk` (`IdRol`);

--
-- Indices de la tabla `login_usuario`
--
ALTER TABLE `login_usuario`
  ADD PRIMARY KEY (`DNI`),
  ADD KEY `loginUsuario_IdRol_fk` (`IdRol`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `producto_categoria_fk` (`IdCategoria`);

--
-- Indices de la tabla `reserva_cita`
--
ALTER TABLE `reserva_cita`
  ADD KEY `loginUsuario_reservarCita_fk` (`DNI`),
  ADD KEY `loginEmpleado_reservarCita_fk` (`IdEmpleado`),
  ADD KEY `especialidad_reservarCita_fk` (`IdEspecialidad`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `solicitar_info`
--
ALTER TABLE `solicitar_info`
  ADD PRIMARY KEY (`IdInfo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IdCategoria` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `IdEspecialidad` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_paciente`
--
ALTER TABLE `historial_paciente`
  MODIFY `IdHistorial` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login_empleado`
--
ALTER TABLE `login_empleado`
  MODIFY `IdEmpleado` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login_usuario`
--
ALTER TABLE `login_usuario`
  MODIFY `DNI` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRol` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitar_info`
--
ALTER TABLE `solicitar_info`
  MODIFY `IdInfo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `Horarios_loginEmpleado_fk` FOREIGN KEY (`IdEmpleado`) REFERENCES `login_empleado` (`IdEmpleado`);

--
-- Filtros para la tabla `login_empleado`
--
ALTER TABLE `login_empleado`
  ADD CONSTRAINT `especialidades_loginEmpleado_fk` FOREIGN KEY (`IdEspecialidad`) REFERENCES `especialidad` (`IdEspecialidad`),
  ADD CONSTRAINT `roles_loginEmpleado_fk` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`IdRol`);

--
-- Filtros para la tabla `login_usuario`
--
ALTER TABLE `login_usuario`
  ADD CONSTRAINT `loginUsuario_IdRol_fk` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`IdRol`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_categoria_fk` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`);

--
-- Filtros para la tabla `reserva_cita`
--
ALTER TABLE `reserva_cita`
  ADD CONSTRAINT `especialidad_reservarCita_fk` FOREIGN KEY (`IdEspecialidad`) REFERENCES `especialidad` (`IdEspecialidad`),
  ADD CONSTRAINT `loginEmpleado_reservarCita_fk` FOREIGN KEY (`IdEmpleado`) REFERENCES `login_empleado` (`IdEmpleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


insert into roles(idRol, Nombre) values(1 , 'Administrador');
insert into roles(idRol, Nombre)  values(2, 'Cliente');

insert into especialidad(idEspecialidad,nombre,precio) values(1 , 'Mediciana' , 45);

insert into login_empleado(dniEmpleado,Nombres,Apellidos,Usuario,Edad,Contrasennia,Correo,Sexo,IdEspecialidad,IdRol) values(77392975 , 'Maximo' ,'Asto' , 'admin' , 24 , '123456' , 'maximoasto123@gmail.com' , 'M' ,1 , 1);

select * from roles;
