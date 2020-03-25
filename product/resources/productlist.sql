-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 12:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE `productlist` (
  `id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `size` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`id`, `sku`, `name`, `price`, `type`, `size`, `height`, `width`, `length`, `weight`) VALUES
(47, 'KK10', 'AC DISC', 100, 'disk', 700, 0, 0, 0, 0),
(48, 'KK11', 'AC DISC', 100, 'disk', 700, 0, 0, 0, 0),
(49, 'KK12', 'AC DISC', 120, 'disk', 700, 0, 0, 0, 0),
(50, 'KK13', 'AC DISC', 100, 'disk', 700, 0, 0, 0, 0),
(51, 'KK14', 'AC DISC', 70, 'disk', 700, 0, 0, 0, 0),
(53, 'DD11', 'The Odyssey', 120, 'book', 0, 0, 0, 0, 50),
(54, 'DD12', 'The Odyssey', 120, 'book', 0, 0, 0, 0, 6),
(55, 'DD134', 'The Odyssey', 120, 'book', 0, 0, 0, 0, 5),
(56, 'FF23', 'Sofa', 500, 'furniture', 0, 5, 10, 20, 0),
(57, 'GG55', 'Table', 600, 'furniture', 0, 10, 15, 30, 0),
(58, 'KK9000', 'sofa', 120, 'furniture', 0, 10, 20, 15, 0),
(59, 'KKSS', 'chair', 120, 'furniture', 0, 2, 23, 20, 0),
(60, 'KK90004', 'The Holl Man', 50, 'book', 0, 0, 0, 0, 20),
(61, 'NN23', 'The Holl Man', 50, 'book', 0, 0, 0, 0, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku_unique` (`sku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productlist`
--
ALTER TABLE `productlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
