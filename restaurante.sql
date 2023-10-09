-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 08:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurante`
--

-- --------------------------------------------------------

--
-- Table structure for table `fechas`
--

CREATE TABLE `fechas` (
  `fecha_id` int(11) NOT NULL,
  `dias` char(9) NOT NULL,
  `semanas` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fechas`
--

INSERT INTO `fechas` (`fecha_id`, `dias`, `semanas`) VALUES
(57, 'lunes', 'semana 1');

-- --------------------------------------------------------

--
-- Table structure for table `ingredientes`
--

CREATE TABLE `ingredientes` (
  `ingredientes_id` int(11) NOT NULL,
  `nombre` char(44) NOT NULL,
  `cantidad_disponible` char(33) NOT NULL,
  `estado` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredientes`
--

INSERT INTO `ingredientes` (`ingredientes_id`, `nombre`, `cantidad_disponible`, `estado`) VALUES
(7, 'leche', '15 litro(s)', 'agotado'),
(27, 'Arroz jazmín', '10 kilo(s)', 'lleno'),
(28, 'Ajonjolí', '100 gramo(s)', 'lleno'),
(29, 'Salsa de soya', '10 litro(s)', 'lleno'),
(30, 'Pasta de ajo', '50 litro(s)', 'lleno'),
(31, 'Lomo de res', '30 kilo(s)', 'lleno'),
(32, 'Cebolla larga', '20 kilo(s)', 'lleno'),
(33, 'champiñones', '100 gramo(s)', 'lleno'),
(34, 'zanahorias', '300 kilo(s)', 'lleno');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `fecha_id` int(11) DEFAULT NULL,
  `receta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `fecha_id`, `receta_id`) VALUES
(50, 57, 24);

-- --------------------------------------------------------

--
-- Table structure for table `recetas`
--

CREATE TABLE `recetas` (
  `receta_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `instrucciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recetas`
--

INSERT INTO `recetas` (`receta_id`, `nombre`, `descripcion`, `instrucciones`) VALUES
(24, 'Arroz frito japonés', 'Arroz jazmín\nPasta de ajo\nCebolla larga\nchampiñones\nzanahorias', '1) Para que quede suelto el arroz, el truco está en añadirlo en un bol con agua, debes remover hasta que el agua esté blanca. Vierte el agua y vuelve a repetir la misma operación 2-3 veces más, el agua debe quedar blanco, el arroz habrá soltado todo el almidón y nos quedará más suelto. A continuación, añade una cazuela con agua y el arroz a cocer, tapa y deja el tiempo que indique el fabricante. Cuando esté, apaga el fuego y deja en la misma olla unos 30 minutos. Retira y aclara con bastante agua, con las manos manipula para separarlo bien.\r\n2) Corta todas las verduras en trozos pequeños y coloca una sartén amplia con aceite. Añade las verduras menos los champiñones, deja que se pochen bien.\r\n3) Cuando estén a medio pochar las verduras, pica los champiñones y añade a las verduras.\r\n4) Pica el pollo en trozos pequeños y añade con las verduras que se cocine todo junto. Incorpora un poco de sal.\r\n5) Elabora una tortilla con los dos huevos y corta en tiras o en trozos pequeños.\r\n6) En una cazuela bien ancha, añade un poco de aceite de semillas, girasol o sésamo y coloca el arroz a fuego fuerte. Saltea y añade 3-4 cucharadas de soja y un poco de jengibre, remueve todo.\r\n7) Añade las verduras al arroz y la tortilla en trozos. Saltea todo a fuego fuerte unos 2-3 minutos y prueba por si debes añadir algún ingrediente más.\r\n8) Sirve el arroz japonés frito y listo para comer. Cuéntanos en los comentarios tu opinión y comparte con nosotros una fotografía del resultado final.');

-- --------------------------------------------------------

--
-- Table structure for table `solicitudesplazamercado`
--

CREATE TABLE `solicitudesplazamercado` (
  `solicitud_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre_ingrediente` char(50) NOT NULL,
  `cantidad` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solicitudesplazamercado`
--

INSERT INTO `solicitudesplazamercado` (`solicitud_id`, `fecha`, `nombre_ingrediente`, `cantidad`) VALUES
(3, '2023-10-09', 'leche', '50 l.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fechas`
--
ALTER TABLE `fechas`
  ADD PRIMARY KEY (`fecha_id`);

--
-- Indexes for table `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`ingredientes_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `fecha_id` (`fecha_id`),
  ADD KEY `receta_id` (`receta_id`);

--
-- Indexes for table `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`receta_id`);

--
-- Indexes for table `solicitudesplazamercado`
--
ALTER TABLE `solicitudesplazamercado`
  ADD PRIMARY KEY (`solicitud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fechas`
--
ALTER TABLE `fechas`
  MODIFY `fecha_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `ingredientes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `recetas`
--
ALTER TABLE `recetas`
  MODIFY `receta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `solicitudesplazamercado`
--
ALTER TABLE `solicitudesplazamercado`
  MODIFY `solicitud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`fecha_id`) REFERENCES `fechas` (`fecha_id`),
  ADD CONSTRAINT `menus_ibfk_2` FOREIGN KEY (`receta_id`) REFERENCES `recetas` (`receta_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
