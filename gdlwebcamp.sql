-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2020 at 12:13 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gdlwebcamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `editado` datetime(6) NOT NULL,
  `nivel` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `usuario`, `nombre`, `password`, `editado`, `nivel`) VALUES
(1, 'Admin', 'Douglas García', '$2y$12$SKL2/2JuDnADrOzfrfa3U./P.9ejMcPbaJy6OcYCNqKp3tuuX/OAa', '2020-10-04 11:58:33.000000', 1),
(2, 'Sofia', 'Sofía García', '$2y$12$pidsR/xiJRJyaSQ4Fu77O.U3FKejWHDhw6Qp3N5mM5XFfdkRhp3HS', '2020-10-04 11:58:33.000000', 0),
(13, 'admin3', 'admin', '$2y$12$i3JKmJKePBr9hLzQNGwac.M.GMzJTPhAXFR7dF213PkezH0i6oKsG', '2020-10-16 14:01:21.000000', NULL),
(14, 'Natalia Shaevka', 'natalia', '$2y$12$RC33LVKwkuKUeQ2glpOlnuG0vG0Bk8jl4cAkc.4NvBSvcnQjZZMai', '2020-10-29 23:51:12.000000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categoria_evento`
--

CREATE TABLE `categoria_evento` (
  `id_categoria` tinyint(10) NOT NULL,
  `cat_evento` varchar(50) NOT NULL,
  `icono` varchar(15) NOT NULL,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `cat_evento`, `icono`, `editado`) VALUES
(1, 'Seminario', 'fa-university', NULL),
(2, 'Conferencias', 'fa-comment', NULL),
(3, 'Talleres', 'fa-code', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `evento_id` tinyint(10) NOT NULL,
  `nombre_evento` varchar(60) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `id_cat_evento` tinyint(10) NOT NULL,
  `id_inv` tinyint(4) NOT NULL,
  `clave` varchar(10) DEFAULT NULL,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`, `editado`) VALUES
(2, 'Responsive Web Design', '2016-12-09', '10:00:00', 3, 1, 'taller_01', NULL),
(3, 'Flexbox', '2016-12-09', '12:00:00', 3, 2, 'taller_02', NULL),
(4, 'HTML5 y CSS3', '2016-12-09', '14:00:00', 3, 3, 'taller_03', NULL),
(5, 'Drupal', '2016-12-09', '17:00:00', 3, 4, 'taller_04', NULL),
(6, 'WordPress', '2016-12-09', '19:00:00', 3, 5, 'taller_05', NULL),
(7, 'Como ser freelancer', '2016-12-09', '10:00:00', 2, 6, 'conf_01', NULL),
(8, 'Tecnologías del Futuro', '2016-12-09', '17:00:00', 2, 1, 'conf_02', NULL),
(9, 'Seguridad en la Web', '2016-12-09', '19:00:00', 2, 2, 'conf_03', NULL),
(10, 'Diseño UI y UX para móviles', '2016-12-09', '10:00:00', 1, 6, 'sem_01', NULL),
(12, 'PHP y MySQL', '2016-12-10', '12:00:00', 3, 2, 'taller_07', NULL),
(13, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, 'taller_08', NULL),
(14, 'SEO en Google', '2016-12-10', '17:00:00', 3, 4, 'taller_09', NULL),
(15, 'De Photoshop a HTML5 y CSS3', '2016-12-10', '19:00:00', 3, 5, 'taller_10', NULL),
(16, 'PHP Intermedio y Avanzado', '2016-12-10', '21:00:00', 3, 6, 'taller_11', NULL),
(17, 'Responsive Web Design', '2016-12-09', '10:00:00', 3, 1, 'taller_01', NULL),
(18, 'Flexbox', '2016-12-09', '12:00:00', 3, 2, 'taller_02', NULL),
(19, 'HTML5 y CSS3', '2016-12-09', '14:00:00', 3, 3, 'taller_03', NULL),
(20, 'Drupal', '2016-12-09', '17:00:00', 3, 4, 'taller_04', NULL),
(21, 'WordPress', '2016-12-09', '19:00:00', 3, 5, 'taller_05', NULL),
(22, 'Como ser freelancer', '2016-12-09', '10:00:00', 2, 6, 'conf_01', NULL),
(23, 'Tecnologías del Futuro', '2016-12-09', '17:00:00', 2, 1, 'conf_02', NULL),
(24, 'Seguridad en la Web', '2016-12-09', '19:00:00', 2, 2, 'conf_03', NULL),
(25, 'Diseño UI y UX para móviles', '2016-12-09', '10:00:00', 1, 6, 'sem_01', NULL),
(26, 'AngularJS', '2016-12-10', '10:00:00', 3, 1, 'taller_06', NULL),
(27, 'PHP y MySQL', '2016-12-10', '12:00:00', 3, 2, 'taller_07', NULL),
(28, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, 'taller_08', NULL),
(29, 'SEO en Google', '2016-12-10', '17:00:00', 3, 4, 'taller_09', NULL),
(30, 'De Photoshop a HTML5 y CSS3', '2016-12-10', '19:00:00', 3, 5, 'taller_10', NULL),
(31, 'PHP Intermedio y Avanzado', '2016-12-10', '21:00:00', 3, 6, 'taller_11', NULL),
(32, 'Responsive Web Design', '2016-12-09', '10:00:00', 3, 1, 'taller_01', NULL),
(33, 'Flexbox', '2016-12-09', '12:00:00', 3, 2, 'taller_02', NULL),
(34, 'HTML5 y CSS3', '2016-12-09', '14:00:00', 3, 3, 'taller_03', NULL),
(35, 'Drupal', '2016-12-09', '17:00:00', 3, 4, 'taller_04', NULL),
(36, 'WordPress', '2016-12-09', '19:00:00', 3, 5, 'taller_05', NULL),
(37, 'Como ser freelancer', '2016-12-09', '10:00:00', 2, 6, 'conf_01', NULL),
(38, 'Tecnologías del Futuro', '2016-12-09', '17:00:00', 2, 1, 'conf_02', NULL),
(39, 'Seguridad en la Web', '2016-12-09', '19:00:00', 2, 2, 'conf_03', NULL),
(40, 'Diseño UI y UX para móviles', '2016-12-09', '10:00:00', 1, 6, 'sem_01', NULL),
(41, 'AngularJS', '2016-12-10', '10:00:00', 3, 1, 'taller_06', NULL),
(42, 'PHP y MySQL', '2016-12-10', '12:00:00', 3, 2, 'taller_07', NULL),
(43, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, 'taller_08', NULL),
(44, 'SEO en Google', '2016-12-10', '17:00:00', 3, 4, 'taller_09', NULL),
(45, 'De Photoshop a HTML5 y CSS3', '2016-12-10', '19:00:00', 3, 5, 'taller_10', NULL),
(46, 'PHP Intermedio y Avanzado', '2016-12-10', '21:00:00', 3, 6, 'taller_11', NULL),
(47, 'Como crear una tienda online', '2016-12-10', '10:00:00', 2, 6, 'conf_04', NULL),
(48, 'Los mejores lugares para encontrar trabajo', '2016-12-10', '17:00:00', 2, 1, 'conf_05', NULL),
(49, 'Pasos para crear un negocio rentable ', '2016-12-10', '19:00:00', 2, 2, 'conf_06', NULL),
(50, 'Aprende a Programar en una mañana', '2016-12-10', '10:00:00', 1, 3, 'sem_02', NULL),
(51, 'Diseño UI y UX para móviles', '2016-12-10', '17:00:00', 1, 5, 'sem_03', NULL),
(52, 'Laravel', '2016-12-11', '10:00:00', 3, 1, 'taller_12', NULL),
(53, 'Crea tu propia API', '2016-12-11', '12:00:00', 3, 2, 'taller_13', NULL),
(54, 'JavaScript y jQuery', '2016-12-11', '14:00:00', 3, 3, 'taller_14', NULL),
(55, 'Creando Plantillas para WordPress', '2016-12-11', '17:00:00', 3, 4, 'taller_15', NULL),
(56, 'Tiendas Virtuales en Magento', '2016-12-11', '19:00:00', 3, 5, 'taller_16', NULL),
(57, 'Como hacer Marketing en línea', '2016-12-11', '10:00:00', 2, 6, 'conf_07', NULL),
(58, '¿Con que lenguaje debo empezar?', '2016-12-11', '17:00:00', 2, 2, 'conf_08', NULL),
(59, 'Frameworks y librerias Open Source', '2016-12-11', '19:00:00', 2, 3, 'conf_09', NULL),
(60, 'Creando una App en Android en una mañana', '2016-12-11', '10:00:00', 1, 4, 'sem_04', NULL),
(61, 'Creando una App en iOS en una tarde', '2016-12-11', '17:00:00', 1, 1, 'sem_05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invitados`
--

CREATE TABLE `invitados` (
  `invitado_id` tinyint(10) NOT NULL,
  `nombre_invitado` varchar(30) NOT NULL,
  `apellido_invitado` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `url_imagen` varchar(50) NOT NULL,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invitados`
--

INSERT INTO `invitados` (`invitado_id`, `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`, `editado`) VALUES
(1, 'Rafael', 'Bautista', 'Mauris sed fringilla erat. Suspendisse tempus lacinia erat vel faucibus. Nulla eget venenatis diam. Morbi eu sapien nec augue eleifend accumsan. ', 'invitado1.jpg', NULL),
(2, 'Shari', 'Herrera', 'Pellentesque massa neque, faucibus non pulvinar id, aliquam vitae metus. Phasellus vel dignissim dui, quis commodo dolor. Aliquam ultricies est vel ante pharetra, in egestas tortor ornare.', 'invitado2.jpg', NULL),
(3, 'Gregorio', 'Sanchez', 'Mauris sed fringilla erat. Suspendisse tempus lacinia erat vel faucibus. Nulla eget venenatis diam. Morbi eu sapien nec augue eleifend accumsan. ', 'invitado3.jpg', NULL),
(4, 'Susana', 'Rivera', 'Pellentesque massa neque, faucibus non pulvinar id, aliquam vitae metus. Phasellus vel dignissim dui, quis commodo dolor. Aliquam ultricies est vel ante pharetra, in egestas tortor ornare.', 'invitado4.jpg', NULL),
(5, 'Harold', 'García', 'Mauris sed fringilla erat. Suspendisse tempus lacinia erat vel faucibus. Nulla eget venenatis diam. Morbi eu sapien nec augue eleifend accumsan. ', 'invitado5.jpg', NULL),
(6, 'Susan', 'Sanchez', 'Pellentesque massa neque, faucibus non pulvinar id, aliquam vitae metus. Phasellus vel dignissim dui, quis commodo dolor. Aliquam ultricies est vel ante pharetra, in egestas tortor ornare.', 'invitado6.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `regalos`
--

CREATE TABLE `regalos` (
  `ID_regalo` int(11) NOT NULL,
  `nombre_regalo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regalos`
--

INSERT INTO `regalos` (`ID_regalo`, `nombre_regalo`) VALUES
(1, 'Pulsera'),
(2, 'Etiquetas'),
(3, 'Plumas');

-- --------------------------------------------------------

--
-- Table structure for table `registrados`
--

CREATE TABLE `registrados` (
  `ID_Registrado` bigint(20) UNSIGNED NOT NULL,
  `nombre_registrado` varchar(50) NOT NULL,
  `apellido_registrado` varchar(50) NOT NULL,
  `email_registrado` varchar(100) NOT NULL,
  `fecha_registro` date NOT NULL,
  `pases_articulos` longtext NOT NULL,
  `talleres_registrados` longtext NOT NULL,
  `regalo` int(11) NOT NULL,
  `total_pagado` varchar(50) NOT NULL,
  `pagado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registrados`
--

INSERT INTO `registrados` (`ID_Registrado`, `nombre_registrado`, `apellido_registrado`, `email_registrado`, `fecha_registro`, `pases_articulos`, `talleres_registrados`, `regalo`, `total_pagado`, `pagado`) VALUES
(1, 'Douglas', 'García', 'douglas.garcia.shaevka@gmail.com', '2020-08-31', '{\"un_dia\":1,\"pase_completo\":1,\"camisas\":2,\"etiquetas\":4}', '{\"eventos\":[\"taller_01\",\"taller_02\",\"taller_03\",\"taller_04\",\"conf_04\",\"conf_05\",\"taller_12\",\"taller_13\",\"taller_14\"]}', 1, '106.6', 0),
(2, 'Alberto', 'Perez', 'aperez@gmail.com', '2020-08-31', '{\"un_dia\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"taller_01\",\"taller_02\",\"taller_03\",\"taller_04\"]}', 3, '41.3', 0),
(3, 'Juan', 'De la torre', 'jdt@gmail.com', '2020-08-31', '{\"pase_completo\":1,\"camisas\":1}', '{\"eventos\":[\"conf_01\",\"conf_02\",\"sem_02\",\"conf_08\",\"conf_09\"]}', 2, '59.3', 0),
(4, 'Sofía', 'García', 'sofia.garcia@gmail.com', '2020-09-01', '{\"pase_completo\":1,\"camisas\":1}', '{\"eventos\":[\"conf_01\",\"conf_05\",\"conf_08\"]}', 2, '59.3', 1),
(5, 'Natalia', 'Shaevka', 'shaevka@gmail.com', '2020-09-01', '{\"pase_completo\":1,\"camisas\":1}', '{\"eventos\":[\"conf_01\",\"conf_02\",\"conf_05\"]}', 2, '59.3', 1),
(6, 'Pepe', 'Martin', 'pepe@martin.es', '2020-10-26', '{\"pase_2dias\":1}', '{\"eventos\":[\"conf_01\",\"sem_01\",\"sem_02\"]}', 2, '45', 1),
(7, 'Rodrigo', 'Tutancamon', 'rodri@tutan.es', '2020-10-26', '{\"pase_2dias\":1}', '[]', 3, '45', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `categoria_evento`
--
ALTER TABLE `categoria_evento`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`evento_id`),
  ADD KEY `id_categoria_evento` (`id_cat_evento`),
  ADD KEY `int_inv` (`id_inv`);

--
-- Indexes for table `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`invitado_id`);

--
-- Indexes for table `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`ID_regalo`);

--
-- Indexes for table `registrados`
--
ALTER TABLE `registrados`
  ADD PRIMARY KEY (`ID_Registrado`),
  ADD KEY `regalo` (`regalo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categoria_evento`
--
ALTER TABLE `categoria_evento`
  MODIFY `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evento_id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `invitados`
--
ALTER TABLE `invitados`
  MODIFY `invitado_id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `regalos`
--
ALTER TABLE `regalos`
  MODIFY `ID_regalo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registrados`
--
ALTER TABLE `registrados`
  MODIFY `ID_Registrado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`invitado_id`);

--
-- Constraints for table `registrados`
--
ALTER TABLE `registrados`
  ADD CONSTRAINT `registrados_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`ID_regalo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
