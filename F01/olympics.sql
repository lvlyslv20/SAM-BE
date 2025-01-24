-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 04:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olympics`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities_tbl`
--

CREATE TABLE `cities_tbl` (
  `id` int(60) NOT NULL,
  `cityName` varchar(60) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `season` varchar(10) NOT NULL,
  `dateCreated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities_tbl`
--

INSERT INTO `cities_tbl` (`id`, `cityName`, `description`, `image`, `season`, `dateCreated`) VALUES
(1, 'Brisbane', '2032 Summer Olympics', 'brisbane.jpg', 'summer', '2025-01-23'),
(2, 'Salt Lake City', '2024 Winter Olympics', 'utah.avif', 'winter', '2025-01-23'),
(3, 'Los Angeles', '2028 Summer Olympics', 'la.jpeg', 'summer', '2025-01-23'),
(4, 'Paris', '2024 Summer Olympics', 'paris.webp', 'summer', '2025-01-23'),
(5, 'Tokyo', '2020 Summer Olympics', 'tokyo.webp', 'summer', '2025-01-23'),
(6, 'Rio de Janeiro', '2016 Summer Olympics', 'brazil.jpg', 'summer', '2025-01-23'),
(7, 'French Alps', '2030 Winter Olympics', 'france.jpg', 'winter', '2025-01-23'),
(8, 'Milan – Cortina d’Ampezzo', '2026 Winter Olympics', 'milan.jpg', 'winter', '2025-01-23'),
(9, 'Pyeongchang ', '2018 Winter Olympics', 'korea.webp', 'winter', '2025-01-23'),
(10, 'Vancouver', '2010 Winter Olympics', 'canada.jpeg', 'winter', '2025-01-23'),
(11, 'Turin', '2006 Winter Olympics', 'turin.webp', 'winter', '2025-01-23'),
(12, 'Sochi', '2014 Winter Olympics', 'russia.jpg', 'winter', '2025-01-23'),
(13, 'London', '2012 Summer Olympics', 'london.jpg', 'summer', '2025-01-23'),
(14, 'Athens', '2004 Summer Olympics', 'greece.jpg', 'summer', '2025-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `popular_tbl`
--

CREATE TABLE `popular_tbl` (
  `id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `popular_tbl`
--

INSERT INTO `popular_tbl` (`id`, `country`, `description`, `image_path`, `date_created`) VALUES
(1, 'Rome, Italy', 'The best Olympic Games host city for visitors', 'p1.jpeg', '2025-01-21'),
(2, 'Tokyo. Japan', 'Takes the silver medal with a score of 6.37 out of 10', 'p2.jpg', '2025-01-23'),
(3, 'Athens, Greece', 'The bronze medalist with a score of 5.89 out of 10', 'P3.jpg', '2025-01-23'),
(4, 'Beijing, China', 'Takes the fourth place on the top five podium with a score of 5.45 out of 10', 'P4.avif', '2025-01-23'),
(5, 'Sydney, Australia', 'Takes the last spot on the top five podium with a score of 5.22 out of 10', 'P5.jpg', '2025-01-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities_tbl`
--
ALTER TABLE `cities_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popular_tbl`
--
ALTER TABLE `popular_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities_tbl`
--
ALTER TABLE `cities_tbl`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `popular_tbl`
--
ALTER TABLE `popular_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
