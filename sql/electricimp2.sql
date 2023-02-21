-- phpMyAdmin SQL Dump
-- version 5.2.0-1.el8.remi
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2022 at 12:05 PM
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
-- Table structure for table `electricimp2`
--

CREATE TABLE `electricimp2` (
  `userid` varchar(255) NOT NULL,
  `deviceid` varchar(255) NOT NULL,
  `dttm` datetime DEFAULT NULL,
  `devicestate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electricimp2`
--

INSERT INTO `electricimp2` (`userid`, `deviceid`, `dttm`, `devicestate`) VALUES
('1603127', '236eb3b236a7c9ee', '2022-12-08 15:29:38', '[ {\"led\" : \"RED\" , \"state\" : \"OFF\"} , {\"led\" : \"GREEN\" , \"state\" : \"OFF\"} ]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `electricimp2`
--
ALTER TABLE `electricimp2`
  ADD PRIMARY KEY (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
