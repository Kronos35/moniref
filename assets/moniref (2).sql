-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2017 a las 20:27:53
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
  `Modelo` varchar(45) DEFAULT NULL,
  `user_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `apliance`
--

INSERT INTO `apliance` (`idApliance`, `elecType_idElecType`, `Marca`, `Modelo`, `user_idUser`) VALUES
(1, 4, 'Planchatron', '9000', 1),
(2, 2, 'HardAlien', 'Turbo9000', 1),
(3, 1, 'UltraHD', '1080p', 1),
(4, 3, 'Refrimax', 'L14', 1),
(5, 6, 'HD', '100%', 1),
(6, 7, 'Alt', 'Futu', 1),
(7, 9, 'Otro', 'Test', 1),
(8, 8, 'Planchatron', '9081', 1),
(9, 6, 'Turbo TV', '90001', 1),
(10, 7, 'Refrimax', '2001', 1);

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

--
-- Volcado de datos para la tabla `consumptionregistry`
--

INSERT INTO `consumptionregistry` (`idConsumption`, `apliance_idApliance`, `watts`, `amps`, `volts`, `date`) VALUES
(79, 5, 1, 1, 1, '2017-11-07 09:01:15'),
(80, 6, 1, 4, 6, '2017-11-07 09:04:06'),
(81, 7, 2, 5, 2, '2017-11-07 09:04:06'),
(82, 9, 1, 1, 1, '2017-11-07 09:04:06'),
(83, 5, 2, 6, 3, '2017-11-07 09:04:06'),
(84, 5, 1, 1, 4, '2017-11-07 09:04:06'),
(85, 10, 1, 1, 1, '2017-11-07 09:04:06'),
(86, 5, 9, 7, 6, '2017-11-07 09:04:06'),
(87, 5, 7, 1, 7, '2017-11-07 09:04:06'),
(88, 5, 4, 1, 1, '2017-11-07 09:04:06'),
(89, 5, 1, 11, 7, '2017-11-07 09:04:06'),
(90, 5, 1, 1, 1, '2017-11-07 09:04:06'),
(91, 5, 8, 2, 8, '2017-11-07 09:04:06'),
(92, 5, 1, 1, 1, '2017-11-07 09:04:06'),
(93, 5, 3, 3, 9, '2017-11-07 09:04:06'),
(94, 5, 1, 1, 1, '2017-11-07 09:04:06'),
(95, 5, 2, 4, 2, '2017-11-07 09:04:06'),
(96, 5, 5, 1, 1, '2017-11-07 09:04:06'),
(97, 5, 9, 5, 4, '2017-11-07 09:04:06'),
(98, 5, 7, 1, 1, '2017-11-07 09:04:06'),
(99, 6, 3, 10, 8, '2017-11-07 09:04:06'),
(100, 5, 11, 2, 1, '2017-11-07 09:04:06'),
(101, 10, 10, 5, 7, '2017-11-07 09:04:06'),
(102, 5, 1, 9, 1, '2017-11-07 09:04:06'),
(103, 5, 2, 2, 12, '2017-11-07 09:04:06'),
(104, 5, 9, 5, 11, '2017-11-07 09:04:06'),
(105, 5, 8, 3, 1, '2017-11-07 09:04:06'),
(106, 5, 6, 2, 3, '2017-11-07 09:04:06'),
(107, 5, 1, 1, 4, '2017-11-07 09:04:06'),
(108, 5, 3, 4, 7, '2017-11-07 09:04:06'),
(109, 5, 2, 1, 6, '2017-11-07 09:04:06'),
(110, 8, 1, 1, 1, '2017-11-09 07:29:20'),
(111, 8, 10, 11, 33, '2017-11-09 07:30:13'),
(112, 8, 10, 11, 33, '2017-11-09 07:30:13'),
(113, 8, 10, 11, 33, '2017-11-09 07:30:13'),
(114, 8, 10, 11, 33, '2017-11-09 07:30:13'),
(115, 8, 10, 11, 33, '2017-11-09 07:30:13'),
(116, 8, 10, 11, 33, '2017-11-09 07:30:13'),
(117, 8, 10, 11, 33, '2017-11-09 07:30:13');

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
(1, 'Television'),
(2, 'Computadora'),
(3, 'Refrigerador'),
(4, 'Plancha'),
(5, 'TV'),
(6, 'TV'),
(7, 'TV'),
(8, 'YT'),
(9, 'YT'),
(10, 'FD'),
(11, 'GD');

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
(1844, 1, '9913');

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
(1844, 1, '2017-11-13', '2017-11-13'),
(1844, 2, '2017-11-13', '2017-11-13'),
(1844, 3, '2017-11-13', '2017-11-13'),
(1844, 4, '2017-11-13', '2017-11-13'),
(1844, 5, '2017-11-13', '2017-11-13'),
(1844, 6, '2017-11-13', '2017-11-13'),
(1844, 7, '2017-11-13', NULL),
(1844, 8, '2017-11-13', '2017-11-13'),
(1844, 9, '2017-11-13', '2017-11-13'),
(1844, 10, '2017-11-13', '2017-11-13');

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
(1, 'admin', 'admin', 'admin@gmail.com', 'pokemon', 911, 1.68);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apliance`
--
ALTER TABLE `apliance`
  ADD PRIMARY KEY (`idApliance`),
  ADD KEY `fk_electrodomestico_elecType1_idx` (`elecType_idElecType`),
  ADD KEY `fk_apliance_User1_idx` (`user_idUser`);

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
  MODIFY `idApliance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `consumptionregistry`
--
ALTER TABLE `consumptionregistry`
  MODIFY `idConsumption` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT de la tabla `electype`
--
ALTER TABLE `electype`
  MODIFY `idElecType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apliance`
--
ALTER TABLE `apliance`
  ADD CONSTRAINT `fk_apliance_User1` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_electrodomestico_elecType1` FOREIGN KEY (`elecType_idElecType`) REFERENCES `electype` (`idElecType`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consumptionregistry`
--
ALTER TABLE `consumptionregistry`
  ADD CONSTRAINT `fk_Consumos_electrodomestico1` FOREIGN KEY (`apliance_idApliance`) REFERENCES `apliance` (`idApliance`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proto`
--
ALTER TABLE `proto`
  ADD CONSTRAINT `fk_dispositivo_usuario1` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proto_has_apliance`
--
ALTER TABLE `proto_has_apliance`
  ADD CONSTRAINT `fk_Proto_has_apliance_Proto1` FOREIGN KEY (`Proto_idProto`) REFERENCES `proto` (`idProto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Proto_has_apliance_apliance1` FOREIGN KEY (`apliance_idApliance`) REFERENCES `apliance` (`idApliance`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
