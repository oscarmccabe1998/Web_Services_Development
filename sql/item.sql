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
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `image` varchar(36) NOT NULL,
  `description` varchar(512) NOT NULL,
  `price` float NOT NULL,
  `StockLevel` int(10) NOT NULL DEFAULT 10,
  `Rating` int(1) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `image`, `description`, `price`, `StockLevel`, `Rating`) VALUES
(1, 'PRS 245 se', 'item1.jpg', 'Korean made with dual humbucker pickups and bird inlays on the fretboard. Good condition, recently set up and re-freted', 73, 19, 5),
(3, 'Fender telecaster', 'item3.jpg', 'Japanese made, from 1992, recently replaced 2 single coil pickups, now equiped with Texas custom pickups and recently set-up with new volume control ', 98, 15, 5),
(4, 'PRS custom 24', 'item4.jpg', 'Dual humbucker setup with 24 frets and in good playable conndition. Will need audio jack input replaced as the connection can be faulty at times', 89, 10, 5),
(5, 'Martin DRS1', 'item5.jpg', 'The Road sereis brings The full volume sound of martin to a more affordable price range. This model comes equiped with a built in battert operated pick up with tone and volume control', 48, 10, 5),
(6, 'Gibbson Les Paul', 'item6.jpg', 'Vintage les pauls in great condition. Comes with the original highoutput dual humbucker set up and provides the player with ample volume and high quality tone', 78, 4, 5),
(12, 'Fender Stratocaster', 'item2.jpg', 'American Made Fender strat with three single coil pickups', 80, 10, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
