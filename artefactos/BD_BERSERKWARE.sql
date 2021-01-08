-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2020 at 02:53 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BD_BERSERKWARE`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categoria`
--

CREATE TABLE `Categoria` (
  `ID_CATEGORIA` int(11) NOT NULL,
  `nombreComponente` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Comun`
--

CREATE TABLE `Comun` (
  `ID_USUARIO_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Log`
--

CREATE TABLE `Log` (
  `ID_LOG` int(11) NOT NULL,
  `actividad` varchar(30) NOT NULL,
  `ID_USUARIO_FK` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Marca`
--

CREATE TABLE `Marca` (
  `ID_MARCA` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `linea` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Mayorista`
--

CREATE TABLE `Mayorista` (
  `ID_USUARIO_FK` int(11) NOT NULL,
  `NIT` varchar(10) NOT NULL,
  `numTarjeta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Modelo`
--

CREATE TABLE `Modelo` (
  `ID_MODELO` int(11) NOT NULL,
  `referencia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Producto`
--

CREATE TABLE `Producto` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `numLote` varchar(10) NOT NULL,
  `numSerie` varchar(10) NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` int(100) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Pro_Cat`
--

CREATE TABLE `Pro_Cat` (
  `ID_PRODUCTO_FK` int(11) NOT NULL,
  `ID_CATEGORIA_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Pro_Mar`
--

CREATE TABLE `Pro_Mar` (
  `ID_PRODUCTO_FK` int(11) NOT NULL,
  `ID_MARCA_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Pro_Mod`
--

CREATE TABLE `Pro_Mod` (
  `ID_PRODUCTO_FK` int(11) NOT NULL,
  `ID_MODELO_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE `Usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `cc` varchar(10) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indexes for table `Comun`
--
ALTER TABLE `Comun`
  ADD UNIQUE KEY `ID_USUARIO_FK` (`ID_USUARIO_FK`);

--
-- Indexes for table `Log`
--
ALTER TABLE `Log`
  ADD PRIMARY KEY (`ID_LOG`),
  ADD KEY `usuarioFK` (`ID_USUARIO_FK`);

--
-- Indexes for table `Marca`
--
ALTER TABLE `Marca`
  ADD PRIMARY KEY (`ID_MARCA`);

--
-- Indexes for table `Mayorista`
--
ALTER TABLE `Mayorista`
  ADD UNIQUE KEY `ID_USUARIO_FK` (`ID_USUARIO_FK`);

--
-- Indexes for table `Modelo`
--
ALTER TABLE `Modelo`
  ADD PRIMARY KEY (`ID_MODELO`);

--
-- Indexes for table `Producto`
--
ALTER TABLE `Producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`);

--
-- Indexes for table `Pro_Cat`
--
ALTER TABLE `Pro_Cat`
  ADD KEY `productoFK` (`ID_PRODUCTO_FK`),
  ADD KEY `categoriaFK` (`ID_CATEGORIA_FK`);

--
-- Indexes for table `Pro_Mar`
--
ALTER TABLE `Pro_Mar`
  ADD KEY `productoFK` (`ID_PRODUCTO_FK`),
  ADD KEY `marcaFK` (`ID_MARCA_FK`);

--
-- Indexes for table `Pro_Mod`
--
ALTER TABLE `Pro_Mod`
  ADD KEY `productoFK` (`ID_PRODUCTO_FK`),
  ADD KEY `modeloFK` (`ID_MODELO_FK`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Log`
--
ALTER TABLE `Log`
  MODIFY `ID_LOG` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Marca`
--
ALTER TABLE `Marca`
  MODIFY `ID_MARCA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Modelo`
--
ALTER TABLE `Modelo`
  MODIFY `ID_MODELO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Producto`
--
ALTER TABLE `Producto`
  MODIFY `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comun`
--
ALTER TABLE `Comun`
  ADD CONSTRAINT `Comun_ibfk_1` FOREIGN KEY (`ID_USUARIO_FK`) REFERENCES `Usuario` (`ID_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Log`
--
ALTER TABLE `Log`
  ADD CONSTRAINT `Log_ibfk_1` FOREIGN KEY (`ID_USUARIO_FK`) REFERENCES `Usuario` (`ID_USUARIO`);

--
-- Constraints for table `Mayorista`
--
ALTER TABLE `Mayorista`
  ADD CONSTRAINT `Mayorista_ibfk_1` FOREIGN KEY (`ID_USUARIO_FK`) REFERENCES `Usuario` (`ID_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Pro_Cat`
--
ALTER TABLE `Pro_Cat`
  ADD CONSTRAINT `Pro_Cat_ibfk_1` FOREIGN KEY (`ID_PRODUCTO_FK`) REFERENCES `Producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `Pro_Cat_ibfk_2` FOREIGN KEY (`ID_CATEGORIA_FK`) REFERENCES `Categoria` (`ID_CATEGORIA`);

--
-- Constraints for table `Pro_Mar`
--
ALTER TABLE `Pro_Mar`
  ADD CONSTRAINT `Pro_Mar_ibfk_1` FOREIGN KEY (`ID_PRODUCTO_FK`) REFERENCES `Producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `Pro_Mar_ibfk_2` FOREIGN KEY (`ID_MARCA_FK`) REFERENCES `Marca` (`ID_MARCA`);

--
-- Constraints for table `Pro_Mod`
--
ALTER TABLE `Pro_Mod`
  ADD CONSTRAINT `Pro_Mod_ibfk_1` FOREIGN KEY (`ID_PRODUCTO_FK`) REFERENCES `Producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `Pro_Mod_ibfk_2` FOREIGN KEY (`ID_MODELO_FK`) REFERENCES `Modelo` (`ID_MODELO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
