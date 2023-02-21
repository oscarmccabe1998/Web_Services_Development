-- phpMyAdmin SQL Dump
-- version 5.2.0-1.el8.remi
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2022 at 12:06 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql1603127`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postcode` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `item`, `total`, `firstname`, `surname`, `email`, `mobile_number`, `address`, `postcode`) VALUES
(1, 'PRS 245 se', 73, 'Oscar', 'McCabe', 'oscar@oscar.com', '11111111111', 'test', 'test'),
(2, 'PRS 245 se', 73, 'Oscar', 'McCabe', 'oscar@oscar.com', '11111111111', 'test', 'test'),
(3, 'PRS 245 se', 73, 'Oscar', 'McCabe', 'oscar@oscar.com', '11111111111', 'test', 'test'),
(4, 'PRS 245 se', 73, 'Oscar', 'McCabe', 'oscar@oscar.com', '11111111111', 'test', 'test'),
(5, 'PRS 245 se', 73, 'Oscar', 'McCabe', 'oscar@oscar.com', '11111111111', 'test', 'test'),
(6, 'PRS 245 se', 73, 'Oscar', 'McCabe', 'oscar@oscar.com', '11111111111', '123street glasgow', 'g61432'),
(7, 'PRS 245 se', 73, 'Oscar', 'McCabe', 'oscar@oscar.com', '11111111111', '83 test street dundee', 'dd1322'),
(8, 'Fender telecaster', 98, 'Oscar', 'McCabe', 'oscar@oscar.com', '11111111111', '123street glasgow', 'g61432'),
(9, 'PRS 245 se', 73, 'Oscar', 'McCabe', 'oscar@oscar.com', '11111111111', '83 test street dundee', 'dd1322');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
