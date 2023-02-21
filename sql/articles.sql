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
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(30) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `headline`, `body`, `link`) VALUES
(7, 'Glasgow hit with heavy rain and flooding ahead of COP26 summit', 'Torrential rain in Glasgow has caused heavy flooding just days before the city hosts world leaders at the COP26 summit.', 'https://www.itv.com/news/2021-10-28/glasgow-hit-with-heavy-rain-and-flooding-ahead-of-cop26-summit'),
(8, 'Teenager arrested after death of 14-year-old boy at Glasgow train station', 'A teenager has been arrested in connection with the death of a 14-year-old boy in Glasgow.', 'https://www.itv.com/news/2021-10-18/teenager-arrested-after-14-year-old-boy-killed-at-glasgow-train-station'),
(9, 'COP26: Last minute negotiations delay final debate and signing off of climate change agreement', 'ITV News Deputy Political Editor Anushka Asthana explains why there have been delays signing off a much-anticipated new deal at COP26', 'https://www.itv.com/news/2021-11-13/third-cop26-climate-change-draft-deal-published-as-talks-run-into-overtime'),
(10, 'COP26: Suffragettes and Squid Game-inspired activists protest on summits second day', 'Modernday suffragettes, Squid Game-inspired activists and miniature Greta Thunbergs were among those campaigning for climate action during the second day of the COP26 summit in Glasgow. ', 'https://www.itv.com/news/2021-11-02/suffragettes-and-squid-game-inspired-climate-activists-protest-on-cop26-day-two'),
(11, 'Days before world leaders arrive, is Glasgow ready for COP26?', 'First Minister Nicola Sturgeon has waded in to say she refuses to let Glasgow be talked down ahead of the summit, as ITV News Scotland Correspondent Peter Smith reports', 'https://www.itv.com/news/2021-10-28/is-the-city-of-glasgow-ready-for-cop26'),
(12, 'Arrests made as Extinction Rebellion block roads and protest outside Glasgow banks', 'ITV News Scotland Correspondent Peter Smith witnessed the skirmishes between police and environmental protestors on the third day of the COP26 summit in Glasgow', 'https://www.itv.com/news/2021-11-03/cop26-extinction-rebellion-block-roads-and-protest-outside-banks-in-glasgow');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
