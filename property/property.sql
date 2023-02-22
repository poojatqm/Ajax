-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2023 at 06:46 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int NOT NULL,
  `title` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tags` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `property_status` int NOT NULL DEFAULT '0' COMMENT '0 is not delete,1 is delete',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `description`, `category_id`, `image`, `tags`, `status`, `property_status`, `created_date`, `modified_date`) VALUES
(6, 'kj', 'htgfvhhgfhf', 6, 'office-dark.jpg', 'jhgjnhgfh', 1, 1, '2023-02-10 12:34:08', '2023-02-16 18:06:12'),
(7, 'grfgvgbfvgbfvhgfhfd', 'gfdg', 6, '8.jpg', 'fcsdc', 1, 1, '2023-02-10 12:37:34', '2023-02-16 18:06:27'),
(8, 'grfgv', 'gfdghngbhfgv', 6, 'office-dark.jpg', 'fcsdc', 1, 1, '2023-02-10 12:38:01', '2023-02-16 18:06:35'),
(10, 'jfgvb', 'ghh', 11, 'ivancik.jpg', 'hgh', 1, 0, '2023-02-11 06:26:10', '2023-02-17 12:14:46'),
(11, 'yyyyyy', 'jhgyhn', 1, 'home-decor-2.jpg', 'jgyh', 1, 0, '2023-02-11 06:44:37', '2023-02-17 10:25:30'),
(12, 'ngfb', 'gfdgfgbdg', 2, 'office-dark.jpg', 'gfdgb', 1, 1, '2023-02-11 06:44:52', '2023-02-16 16:46:17'),
(13, 'grf', 'gfdg', 5, 'home-decor-2.jpg', 'fdvgd', 1, 1, '2023-02-13 03:41:55', '2023-02-16 16:46:22'),
(26, 'jhjm', 'jghn ', 8, 'home-decor-3.jpg', 'jyh', 1, 0, '2023-02-16 10:08:35', '2023-02-17 03:41:30'),
(27, 'htgfbdf', 'grfdgvdx ', 7, 'home-decor-2.jpg', 'gfdvdfs', 1, 0, '2023-02-16 10:09:06', '2023-02-16 12:04:53'),
(28, 'jghvfh', 'hfgdf', 8, 'home-decor-2.jpg', 'njgvbhngbfvh', 1, 0, '2023-02-16 10:09:23', '2023-02-16 11:36:57'),
(29, 'hgfhbfc', 'hfgfcgb', 6, 'home-decor-2.jpg', 'hgffcbf', 1, 0, '2023-02-16 10:09:41', '2023-02-16 11:36:49'),
(30, 'hfghf', 'hgfhjngh', 7, 'home-decor-3.jpg', 'jhnfghfv', 1, 0, '2023-02-16 10:10:00', '2023-02-16 11:25:55'),
(31, 'jyhj', 'jyhn', 6, 'home-decor-2.jpg', 'kuhjk', 1, 0, '2023-02-16 10:50:38', NULL),
(32, 'bhfgvbv', 'gbfvgbf', 7, 'home-decor-2.jpg', 'gfgg', 1, 0, '2023-02-16 12:32:42', NULL),
(33, 'jyhjgjyhj', 'jyhngvh', 1, 'home-decor-2.jpg', 'hgghgg', 1, 0, '2023-02-16 12:34:49', NULL),
(34, 'k,jhk', 'kmhjmhn', 6, 'home-decor-3.jpg', 'khujn', 1, 0, '2023-02-16 12:37:29', '2023-02-16 18:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `property_categories`
--

CREATE TABLE `property_categories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `property_categories`
--

INSERT INTO `property_categories` (`id`, `name`, `status`, `created_date`) VALUES
(1, 'yhnfghngvhn', 1, '2023-02-10 12:00:38'),
(6, 'hrtfghfcg', 1, '2023-02-13 09:05:03'),
(7, 'hrtfghfcg', 1, '2023-02-13 09:05:07'),
(8, 'jyhjng', 1, '2023-02-13 09:08:43'),
(9, 'hgvfbhfvgcgbdc gbxsgdfgdgv', 1, '2023-02-13 09:09:55'),
(10, 'jghng', 1, '2023-02-13 09:12:15'),
(11, 'hfgvhcf', 1, '2023-02-13 09:16:29'),
(17, 'h', 1, '2023-02-14 03:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `property_comments`
--

CREATE TABLE `property_comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `property_id` int NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(55) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_type` int DEFAULT '0',
  `status` int DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_type`, `status`, `created_date`, `modified_date`) VALUES
(1, 'mmh@gmail.com', 'Pooj@123', 0, 1, '2023-02-09 12:09:01', '2023-02-10 08:52:39'),
(18, 'ipoojaofficial34@gmail.com', '$2y$10$IpfLjwBUbVZuBrcivuqs4uPwjsxfmtawcIpbJoVe6qpaepbvz19uG', 1, 1, '2023-02-16 06:02:36', '2023-02-16 11:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contact_number` int DEFAULT NULL,
  `address` varchar(55) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `first_name`, `last_name`, `contact_number`, `address`, `image`, `created_date`, `modified_date`) VALUES
(1, 1, 'fedfnbbnvn', 'fdsf', 1234567890, 'fvds', '15.jpg', '2023-02-09 12:09:01', '2023-02-10 08:52:39'),
(16, 18, 'pooja', 'jhnygfhngfv', 1234567890, 'kjhmhb', 'meeting.jpg', '2023-02-16 06:02:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_categories`
--
ALTER TABLE `property_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_comments`
--
ALTER TABLE `property_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delete user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `property_categories`
--
ALTER TABLE `property_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `property_comments`
--
ALTER TABLE `property_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `delete user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
