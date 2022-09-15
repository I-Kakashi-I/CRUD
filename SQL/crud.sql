-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 10:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `mydata`
--

CREATE TABLE `mydata` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mydata`
--

INSERT INTO `mydata` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(8, 'admin', 'admin@admin.com', '1234', 1),
(65, 'Aspen Johns', 'hyxefifomu@mailinator.com', 'Pa$$w0rd!', 3),
(59, 'Cullen Santiago', 'rozava@mailinator.com', 'Pa$$w0rd!', 2),
(54, 'Echo Riley', 'myhiqeguse@mailinator.com', 'Pa$$w0rd!', 2),
(43, 'Eden Gregory', 'nefanecofe@mailinator.com', 'Sed excepteur odit e', 2),
(44, 'Ginger Terry', 'guhutyg@mailinator.com', 'Hic beatae ipsam id ', 2),
(42, 'Gloria Duke', 'bimefoci@mailinator.com', 'Pa$$w0rd!', 2),
(69, 'Guy Green', 'vyqylaw@mailinator.com', 'Pa$$w0rd!', 3),
(63, 'Imani Frank', 'kasyt@mailinator.com', 'Pa$$w0rd!', 2),
(6, 'Kakashi', 'admin@example.com', '1234', 1),
(67, 'Kylie Berry', 'siqo@mailinator.com', 'Pa$$w0rd!', 2),
(68, 'Lee Reese', 'gerynudu@mailinator.com', 'Pa$$w0rd!', 3),
(41, 'Raya Hawkins', 'numepezemo@mailinator.com', 'Pa$$w0rd!', 2),
(40, 'Raymond Burke', 'hurutysake@mailinator.com', 'Pa$$w0rd!', 2),
(64, 'Rhea Hall', 'qaseperyde@mailinator.com', 'Pa$$w0rd!', 2),
(15, 'user', 'user@user.com', '1234', 2);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `permission`) VALUES
(1, 2, 'read'),
(4, 3, '9'),
(5, 3, '9'),
(7, 4, 'sadnsajkbdi'),
(8, 3, '9'),
(9, 3, '9'),
(11, 3, 'write'),
(12, 3, 'read');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'Super Admin'),
(4, 'test'),
(5, 'aaa'),
(6, 'testsad');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task_name` varchar(250) NOT NULL,
  `status` enum('Pending','Completed','','') NOT NULL,
  `dead_line` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `status`, `dead_line`, `user_id`) VALUES
(11, 'Ahmed Kline', 'Pending', '2022-09-14 17:06:00', 8),
(12, 'Murphy Maxwell', 'Completed', '2000-09-05 03:56:00', 8),
(13, 'Sydney Huff', 'Pending', '2013-11-14 15:55:00', 8),
(14, 'Selma Pierce', 'Pending', '2022-10-25 15:47:00', 8),
(15, 'Zena Conrad', 'Completed', '2011-06-20 21:03:00', 8),
(16, 'Grace Hendrix', 'Completed', '2019-05-14 00:14:00', 8),
(17, 'Daria Hood', 'Completed', '1979-12-24 22:04:00', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mydata`
--
ALTER TABLE `mydata`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mydata`
--
ALTER TABLE `mydata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
