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
-- Table structure for table `ShopUsers`
--

CREATE TABLE `ShopUsers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ShopUsers`
--

INSERT INTO `ShopUsers` (`id`, `firstname`, `surname`, `email`, `mobile_number`, `password`, `Admin`) VALUES
(1, 'Oscar', 'McCabe', 'oscar@oscar.com', '11111111111', '$2y$10$52tpDOGIOwlUfncj1a7re.nGBhlErRQdFbIpRhuBfaf16ppuX6N7m', 0),
(2, 'Admin', 'Admin', 'admin', '11111111111', '$2y$10$n/UF6.fty/lZmmaPALM35.f3vGbnI4ZaQV3.mi3/HMzeecySAesNK', 1),
(3, 'anothertest', 'test', 'test@test.com', '1111111111', '$2y$10$z1L50ULsbTIWNocS5Skj6eg0SQksjVjLwJKIREduxnbITQc6FWn9e', 0),
(4, 'test123', 'test123', 'test1@test.com', '1111111111', '$2y$10$NL7fOEtvziOpd6wK94tPTOA3Ze4u03poT.xp84qn0BmJY3t6Q31Ou', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ShopUsers`
--
ALTER TABLE `ShopUsers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ShopUsers`
--
ALTER TABLE `ShopUsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
