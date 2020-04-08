-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 10:10 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportwearshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '3',
  `status_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `first_name`, `last_name`, `email`, `password`, `role_id`, `status_id`) VALUES
(30, 'Nguyễn', 'Phú Tín', 'tintom19@gmail.com', '$2y$10$D3r6hYDNWDHNTf7CUrYIiui/W32/ufa/1a.6S.EX3iptjtUxU44BC', 1, 1),
(31, 'Ngọc', 'Trinh', 'ngoctrinh@gmail.com', '$2y$10$V5UghpsGVtPU5U9lLaTVReS7lKSlAftJ8vtZupzKF4ihhzLJ.VyW6', 3, 1),
(32, 'Phương', 'Ly', 'phuongly@gmail.com', '$2y$10$mO00u0DQwIMmt8Kpw8bhCuzpfV93nMA9c/ghHjHIi7w137LxOpoAy', 3, 1),
(33, 'Hồ', 'Hiền', 'hienho@gmail.com', '$2y$10$hmaBsBqnTG21.G1HMPj59uT.BEtROZgVZ3uLgXY1mT1u1H2Q4HOP2', 2, 1),
(34, 'Nguyễn', 'Tuấn Hưng', 'tuanhung@gmail.com', '$2y$10$XS5TF2rsz6iDrvcF75SkH.w3QHtmdqOpydxDxaF5eM1sXvIzSGOt2', 3, 1),
(35, 'Vũ', 'Phương Anh', 'junvu@gmail.com', '$2y$10$8HZsHnuymeKc/7DyvFYB0udkS10iaz3cql9TAeg7dJcuikZ8hOqHK', 3, 1),
(36, 'Minh', 'Hằng', 'minhhang@gmail.com', '$2y$10$IN1gtejM.33yuNnUXKXvP.rF8uhTPvJl9pk9wXHR7yDTWaJRQ9T56', 3, 1),
(38, 'Bảo', 'Anh', 'baoanh@gmail.com', '$2y$10$TNJyyVcYUy6mAIiAvyZT5OQgzFssVKceGj2SIab..AXoGl/wlzC22', 3, 1),
(39, 'Hương', 'Tràm', 'huongtram@gmail.com', '$2y$10$VRFlzCFN9C3sSqIt43gvcuzpscRvgg.kL2b4wRQMAlc/bxSaIyO/K', 3, 1),
(40, 'Vũ', 'Cát Tường', 'vtc@gmail.com', '$2y$10$UZsrD8ys/6zvupnBlJ1n/.tz4GL9xz3Nij772m3M/JTTxSKAusop.', 3, 1),
(41, 'Trần', 'Huyền My', 'amee@gmail.com', '$2y$10$N2WAxhvG6pOD.TWVY6o0Suy/zU06X9e1kLuM4AitrVDLZ5L0nMuyu', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `parent_id`) VALUES
(1, 'Giày', 2),
(2, 'Nam', 0),
(3, 'Nữ', 0),
(4, 'Áo', 2),
(5, 'Quần', 2),
(8, 'Giày', 3),
(9, 'Áo', 3),
(10, 'Quần', 3),
(20, 'Mũ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Nhân Viên'),
(3, 'Khách Hàng');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Đã Kích Hoạt'),
(2, 'Khóa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `fk_account_role` (`role_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `fk_account_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
