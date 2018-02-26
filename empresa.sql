-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2018 at 12:52 AM
-- Server version: 5.7.16
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empresa`
--

-- --------------------------------------------------------

--
-- Table structure for table `conocimiento_habilidad`
--

CREATE TABLE `conocimiento_habilidad` (
  `id_conocimiento_habilidad` int(11) NOT NULL,
  `conocimiento_habilidad` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conocimiento_habilidad_hoja_vida`
--

CREATE TABLE `conocimiento_habilidad_hoja_vida` (
  `id_conocimiento_habilidad_hoja_vida` int(11) NOT NULL,
  `id_conocimiento_habilidad` int(11) NOT NULL,
  `id_hoja_vida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `experiencia`
--

CREATE TABLE `experiencia` (
  `id_experiencia` int(11) NOT NULL,
  `id_hoja_vida` int(11) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `sector_empresa` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_depto` int(11) NOT NULL,
  `funcion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `formacion`
--

CREATE TABLE `formacion` (
  `id_formacion` int(11) NOT NULL,
  `id_hoja_vida` int(11) NOT NULL,
  `centro_educativo` varchar(200) NOT NULL,
  `nivel_estudio` varchar(200) NOT NULL,
  `titulo_obtenido` varchar(300) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hoja_vida`
--

CREATE TABLE `hoja_vida` (
  `id_hoja_vida` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `cargo_hoja_vida` int(11) NOT NULL,
  `descripcion_perfil_profesional` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(200) DEFAULT NULL,
  `apellidos` varchar(200) DEFAULT NULL,
  `correo` varchar(200) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `estado_civil` int(100) DEFAULT NULL,
  `telefono1` varchar(200) DEFAULT NULL,
  `telefono2` varchar(200) DEFAULT NULL,
  `direccion` int(11) DEFAULT NULL,
  `foto` int(11) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `id_municipio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`id_persona`, `id_usuario`, `nombres`, `apellidos`, `correo`, `fecha_nacimiento`, `genero`, `estado_civil`, `telefono1`, `telefono2`, `direccion`, `foto`, `id_departamento`, `id_municipio`) VALUES
(2, 9, 'Juan Camilo', 'Cruz Franco', 'kusanagimilo@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(200) NOT NULL,
  `clave` varchar(600) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `clave`, `estado`) VALUES
(9, 'kusanagimilo@gmail.com', 'f53faf556856a1d9d43aa27954c1653975780a2eab522e22ad724fcd356398aefc6cdcac7bfe4aafaec60fadf82c59e3007c3f9be2375b3ed1eaabf9a9ed8498', 'AC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conocimiento_habilidad`
--
ALTER TABLE `conocimiento_habilidad`
  ADD PRIMARY KEY (`id_conocimiento_habilidad`);

--
-- Indexes for table `conocimiento_habilidad_hoja_vida`
--
ALTER TABLE `conocimiento_habilidad_hoja_vida`
  ADD PRIMARY KEY (`id_conocimiento_habilidad_hoja_vida`);

--
-- Indexes for table `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`id_experiencia`);

--
-- Indexes for table `formacion`
--
ALTER TABLE `formacion`
  ADD PRIMARY KEY (`id_formacion`);

--
-- Indexes for table `hoja_vida`
--
ALTER TABLE `hoja_vida`
  ADD PRIMARY KEY (`id_hoja_vida`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conocimiento_habilidad`
--
ALTER TABLE `conocimiento_habilidad`
  MODIFY `id_conocimiento_habilidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conocimiento_habilidad_hoja_vida`
--
ALTER TABLE `conocimiento_habilidad_hoja_vida`
  MODIFY `id_conocimiento_habilidad_hoja_vida` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `id_experiencia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `formacion`
--
ALTER TABLE `formacion`
  MODIFY `id_formacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hoja_vida`
--
ALTER TABLE `hoja_vida`
  MODIFY `id_hoja_vida` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
