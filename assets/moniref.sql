-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2017 a las 16:45:07
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `moniref`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apliance`
--

CREATE TABLE `apliance` (
  `idApliance` int(11) NOT NULL,
  `elecType_idElecType` int(11) DEFAULT NULL,
  `Marca` varchar(45) DEFAULT NULL,
  `Modelo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `apliance`
--

INSERT INTO `apliance` (`idApliance`, `elecType_idElecType`, `Marca`, `Modelo`) VALUES
(1, 1, 'Samsung', '1345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumptionregistry`
--

CREATE TABLE `consumptionregistry` (
  `idConsumption` int(11) NOT NULL,
  `apliance_idApliance` int(11) NOT NULL,
  `watts` double NOT NULL,
  `amps` double NOT NULL,
  `volts` double NOT NULL,
  `date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `electype`
--

CREATE TABLE `electype` (
  `idElecType` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `electype`
--

INSERT INTO `electype` (`idElecType`, `Nombre`) VALUES
(1, 'Refrigerador'),
(2, 'Televisión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proto`
--

CREATE TABLE `proto` (
  `idProto` int(11) NOT NULL,
  `user_idUser` int(11) NOT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proto`
--

INSERT INTO `proto` (`idProto`, `user_idUser`, `password`) VALUES
(9, 1, '312314'),
(183841374, 1, '848183831'),
(2147483647, 1, '129038941839123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proto_has_apliance`
--

CREATE TABLE `proto_has_apliance` (
  `Proto_idProto` int(11) NOT NULL,
  `apliance_idApliance` int(11) NOT NULL,
  `connectionDate` date DEFAULT NULL,
  `disconnectionDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proto_has_apliance`
--

INSERT INTO `proto_has_apliance` (`Proto_idProto`, `apliance_idApliance`, `connectionDate`, `disconnectionDate`) VALUES
(9, 1, '2017-10-20', '2017-10-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `mail` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `Tarifa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUser`, `name`, `lastName`, `mail`, `password`, `phone`, `Tarifa`) VALUES
(1, 'alguien', 'alguien', 'test@gmail.com', 'test', 19203193, 1.1),
(2, 'admin', 'admin', 'admin@gmail.com', 'admin', 13914131, 1.1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apliance`
--
ALTER TABLE `apliance`
  ADD PRIMARY KEY (`idApliance`),
  ADD KEY `fk_electrodomestico_elecType1_idx` (`elecType_idElecType`);

--
-- Indices de la tabla `consumptionregistry`
--
ALTER TABLE `consumptionregistry`
  ADD PRIMARY KEY (`idConsumption`),
  ADD KEY `fk_Consumos_electrodomestico1_idx` (`apliance_idApliance`);

--
-- Indices de la tabla `electype`
--
ALTER TABLE `electype`
  ADD PRIMARY KEY (`idElecType`);

--
-- Indices de la tabla `proto`
--
ALTER TABLE `proto`
  ADD PRIMARY KEY (`idProto`),
  ADD KEY `fk_dispositivo_usuario1_idx` (`user_idUser`);

--
-- Indices de la tabla `proto_has_apliance`
--
ALTER TABLE `proto_has_apliance`
  ADD PRIMARY KEY (`Proto_idProto`,`apliance_idApliance`),
  ADD KEY `fk_Proto_has_apliance_apliance1_idx` (`apliance_idApliance`),
  ADD KEY `fk_Proto_has_apliance_Proto1_idx` (`Proto_idProto`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `mail_UNIQUE` (`mail`),
  ADD UNIQUE KEY `Phone_UNIQUE` (`phone`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apliance`
--
ALTER TABLE `apliance`
  MODIFY `idApliance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `consumptionregistry`
--
ALTER TABLE `consumptionregistry`
  MODIFY `idConsumption` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `electype`
--
ALTER TABLE `electype`
  MODIFY `idElecType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `proto_has_apliance`
--
ALTER TABLE `proto_has_apliance`
  MODIFY `Proto_idProto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apliance`
--
ALTER TABLE `apliance`
  ADD CONSTRAINT `fk_electrodomestico_elecType1` FOREIGN KEY (`elecType_idElecType`) REFERENCES `electype` (`idElecType`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `consumptionregistry`
--
ALTER TABLE `consumptionregistry`
  ADD CONSTRAINT `fk_Consumos_electrodomestico1` FOREIGN KEY (`apliance_idApliance`) REFERENCES `apliance` (`idApliance`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proto`
--
ALTER TABLE `proto`
  ADD CONSTRAINT `fk_dispositivo_usuario1` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proto_has_apliance`
--
ALTER TABLE `proto_has_apliance`
  ADD CONSTRAINT `fk_Proto_has_apliance_Proto1` FOREIGN KEY (`Proto_idProto`) REFERENCES `proto` (`idProto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Proto_has_apliance_apliance1` FOREIGN KEY (`apliance_idApliance`) REFERENCES `apliance` (`idApliance`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
