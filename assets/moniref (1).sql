-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2017 at 07:14 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moniref`
--

-- --------------------------------------------------------

--
-- Table structure for table `apliance`
--

CREATE TABLE `apliance` (
  `idApliance` int(11) NOT NULL,
  `elecType_idElecType` int(11) DEFAULT NULL,
  `Marca` varchar(45) DEFAULT NULL,
  `Modelo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apliance`
--

INSERT INTO `apliance` (`idApliance`, `elecType_idElecType`, `Marca`, `Modelo`) VALUES
(1, 1, 'Samsung', '1345'),
(2, 2, 'LG', 'x18'),
(3, 3, 'Mabe', 'ashdc'),
(4, 2, 'Sony', 'Vizio');

-- --------------------------------------------------------

--
-- Table structure for table `consumptionregistry`
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
-- Dumping data for table `consumptionregistry`
--

INSERT INTO `consumptionregistry` (`idConsumption`, `apliance_idApliance`, `watts`, `amps`, `volts`, `date`) VALUES
(1, 1, 20, 30, 10, '2017-10-30 20:37:19'),
(2, 1, 20, 5, 15, '2017-10-30 20:38:58'),
(3, 1, 3, 11, 13, '2017-10-30 20:38:58'),
(7, 2, 45, 21, 11, '2017-10-30 20:41:58'),
(8, 2, 3, 12, 1, '2017-10-30 20:41:58'),
(9, 2, 3, 12, 1, '2017-10-30 20:42:16'),
(10, 3, 45, 10, 27, '2017-10-31 20:42:16'),
(11, 2, 35, 42, 5, '2017-11-01 20:42:16'),
(12, 2, 5, 2, 4, '2017-11-02 20:42:16'),
(13, 1, 25, 39, 26, '2017-11-03 20:42:16'),
(14, 2, 6, 38, 8, '2017-11-04 20:42:16'),
(15, 1, 20, 38, 28, '2017-11-05 21:42:16'),
(16, 1, 45, 48, 8, '2017-11-06 21:42:16'),
(17, 1, 28, 24, 20, '2017-11-07 21:42:16'),
(18, 2, 87, 89, 36, '2017-10-31 00:24:13'),
(19, 2, 86, 59, 37, '2017-10-31 00:24:20'),
(20, 3, 93, 65, 40, '2017-10-31 00:24:24'),
(21, 2, 29, 1, 36, '2017-10-31 00:24:29'),
(22, 3, 47, 44, 1, '2017-10-31 00:24:33'),
(23, 2, 50, 27, 42, '2017-10-31 00:24:35'),
(24, 1, 117, 15, 45, '2017-10-31 00:24:44'),
(25, 3, 80, 41, 32, '2017-10-31 00:24:46'),
(26, 1, 96, 68, 80, '2017-10-31 00:24:49'),
(27, 1, 4, 89, 101, '2017-10-31 00:24:50'),
(28, 2, 31, 65, 74, '2017-10-31 00:24:57'),
(29, 3, 22, 86, 79, '2017-10-31 00:25:00'),
(30, 1, 116, 79, 59, '2017-10-31 00:25:02'),
(31, 1, 97, 66, 6, '2017-10-31 00:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `electype`
--

CREATE TABLE `electype` (
  `idElecType` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `electype`
--

INSERT INTO `electype` (`idElecType`, `Nombre`) VALUES
(1, 'Refrigerador'),
(2, 'Televisión'),
(3, 'Lavadora'),
(4, 'Computadora'),
(5, 'Tostador');

-- --------------------------------------------------------

--
-- Table structure for table `proto`
--

CREATE TABLE `proto` (
  `idProto` int(11) NOT NULL,
  `user_idUser` int(11) NOT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proto`
--

INSERT INTO `proto` (`idProto`, `user_idUser`, `password`) VALUES
(0, 2, '2134546476'),
(3, 3, '4654561213'),
(9, 1, '312314'),
(183841374, 1, '848183831'),
(2147483647, 1, '129038941839123');

-- --------------------------------------------------------

--
-- Table structure for table `proto_has_apliance`
--

CREATE TABLE `proto_has_apliance` (
  `Proto_idProto` int(11) NOT NULL,
  `apliance_idApliance` int(11) NOT NULL,
  `connectionDate` date DEFAULT NULL,
  `disconnectionDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proto_has_apliance`
--

INSERT INTO `proto_has_apliance` (`Proto_idProto`, `apliance_idApliance`, `connectionDate`, `disconnectionDate`) VALUES
(9, 1, '2017-10-20', '2017-10-20'),
(183841374, 3, '2017-10-30', NULL),
(2147483647, 2, '2017-10-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `name`, `lastName`, `mail`, `password`, `phone`, `Tarifa`) VALUES
(1, 'alguien', 'alguien', 'test@gmail.com', 'test', 19203193, 1.1),
(2, 'admin', 'admin', 'admin@gmail.com', 'admin', 13914131, 1.1),
(3, 'test', 'test', 'tes@test.com', 'test', 1234567890, 1.20654);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apliance`
--
ALTER TABLE `apliance`
  ADD PRIMARY KEY (`idApliance`),
  ADD KEY `fk_electrodomestico_elecType1_idx` (`elecType_idElecType`);

--
-- Indexes for table `consumptionregistry`
--
ALTER TABLE `consumptionregistry`
  ADD PRIMARY KEY (`idConsumption`),
  ADD KEY `fk_Consumos_electrodomestico1_idx` (`apliance_idApliance`);

--
-- Indexes for table `electype`
--
ALTER TABLE `electype`
  ADD PRIMARY KEY (`idElecType`);

--
-- Indexes for table `proto`
--
ALTER TABLE `proto`
  ADD PRIMARY KEY (`idProto`),
  ADD KEY `fk_dispositivo_usuario1_idx` (`user_idUser`);

--
-- Indexes for table `proto_has_apliance`
--
ALTER TABLE `proto_has_apliance`
  ADD PRIMARY KEY (`Proto_idProto`,`apliance_idApliance`),
  ADD KEY `fk_Proto_has_apliance_apliance1_idx` (`apliance_idApliance`),
  ADD KEY `fk_Proto_has_apliance_Proto1_idx` (`Proto_idProto`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `mail_UNIQUE` (`mail`),
  ADD UNIQUE KEY `Phone_UNIQUE` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apliance`
--
ALTER TABLE `apliance`
  MODIFY `idApliance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `consumptionregistry`
--
ALTER TABLE `consumptionregistry`
  MODIFY `idConsumption` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `electype`
--
ALTER TABLE `electype`
  MODIFY `idElecType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `proto_has_apliance`
--
ALTER TABLE `proto_has_apliance`
  MODIFY `Proto_idProto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `apliance`
--
ALTER TABLE `apliance`
  ADD CONSTRAINT `fk_electrodomestico_elecType1` FOREIGN KEY (`elecType_idElecType`) REFERENCES `electype` (`idElecType`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `consumptionregistry`
--
ALTER TABLE `consumptionregistry`
  ADD CONSTRAINT `fk_Consumos_electrodomestico1` FOREIGN KEY (`apliance_idApliance`) REFERENCES `apliance` (`idApliance`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `proto`
--
ALTER TABLE `proto`
  ADD CONSTRAINT `fk_dispositivo_usuario1` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `proto_has_apliance`
--
ALTER TABLE `proto_has_apliance`
  ADD CONSTRAINT `fk_Proto_has_apliance_Proto1` FOREIGN KEY (`Proto_idProto`) REFERENCES `proto` (`idProto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Proto_has_apliance_apliance1` FOREIGN KEY (`apliance_idApliance`) REFERENCES `apliance` (`idApliance`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
