-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 04:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xx_football_03`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowed_provinces`
--

CREATE TABLE `allowed_provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `competition_id` int(10) UNSIGNED NOT NULL,
  `province_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allowed_provinces`
--

INSERT INTO `allowed_provinces` (`id`, `competition_id`, `province_id`) VALUES
(289, 118, 1),
(290, 118, 2),
(293, 119, 1),
(294, 119, 2),
(295, 120, 2),
(296, 121, 1),
(297, 121, 2),
(298, 121, 3),
(299, 121, 4);

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `max_teams` int(11) NOT NULL,
  `banner` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id`, `name`, `slug`, `max_teams`, `banner`) VALUES
(118, 'Competition A', 'competition-a', 16, 'banner-bangkok.png'),
(119, 'Competition B', 'competition-b', 2, 'banner-buriram.png'),
(120, 'Competition C', 'competition-c', 2, 'banner-khonkaen.png'),
(121, 'Competition D', 'competition-d', 2, 'banner-bangkok.png');

-- --------------------------------------------------------

--
-- Table structure for table `competition_registered_teams`
--

CREATE TABLE `competition_registered_teams` (
  `id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `competition_registered_teams`
--

INSERT INTO `competition_registered_teams` (`id`, `competition_id`, `team_id`) VALUES
(13, 118, 5),
(15, 118, 7),
(17, 118, 6),
(18, 119, 5),
(19, 119, 6),
(20, 120, 9),
(21, 120, 5),
(22, 121, 12),
(23, 121, 6);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(1, 'Bangkok'),
(2, 'Buriram'),
(3, 'Chiangrai'),
(4, 'Chonburi'),
(5, 'Khon Kaen'),
(6, 'Lampang'),
(7, 'Lamphun'),
(8, 'Nakhon Ratchasima'),
(9, 'Nong Bua Lamphu'),
(10, 'Nonthaburi'),
(11, 'Prachuap Khiri Khan'),
(12, 'Ratchaburi'),
(13, 'Sukhothai');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_name` varchar(50) NOT NULL,
  `team_province_id` int(10) UNSIGNED NOT NULL,
  `team_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `team_province_id`, `team_logo`) VALUES
(5, 'Team A', 1, 'logo-01.png'),
(6, 'Team B', 2, 'teamb.png'),
(7, 'Team C', 13, 'logo8.png'),
(8, 'Team D', 2, 'logo63.png'),
(9, 'Team E', 1, 'logo15.png'),
(10, 'Team F', 3, 'logo6.png'),
(11, 'Team G', 2, 'logo47.png'),
(12, 'Team Z', 1, 'logo52.png'),
(13, 'Team L', 10, 'logo6.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(34, 'a', '0cc175b9c0f1b6a831c399e269772661'),
(35, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowed_provinces`
--
ALTER TABLE `allowed_provinces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competition_id` (`competition_id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `competition_registered_teams`
--
ALTER TABLE `competition_registered_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competition_id` (`competition_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_province` (`team_province_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowed_provinces`
--
ALTER TABLE `allowed_provinces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `competition_registered_teams`
--
ALTER TABLE `competition_registered_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allowed_provinces`
--
ALTER TABLE `allowed_provinces`
  ADD CONSTRAINT `allowed_provinces_ibfk_1` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `allowed_provinces_ibfk_2` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`team_province_id`) REFERENCES `provinces` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
