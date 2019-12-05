-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 05:01 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lovelydate`
--
CREATE DATABASE IF NOT EXISTS `lovelydate` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `lovelydate`;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `img_url`, `created_at`, `updated_at`) VALUES
(2, 23, '/img/users/emma.jpg', '2019-12-01 07:37:52', '2019-12-01 07:37:52'),
(3, 24, '/img/users/scarlett.jpg', '2019-12-01 08:02:09', '2019-12-01 08:02:09'),
(4, 25, '/img/users/robert.jpg', '2019-12-01 08:06:43', '2019-12-01 08:06:43'),
(5, 26, '/img/users/amber.jpg', '2019-12-01 08:10:20', '2019-12-01 08:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `hobby` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_admin`, `name`, `email`, `password`, `gender`, `dob`, `hobby`, `biography`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', '$2y$10$bs7/rRsWZvIjbrnCHJkML.KMw5T5525Q92Vqu2v5JnfnINZu.v.Wm', 'male', '2019-11-04', 'Control members.', 'Very handsome.', NULL, NULL),
(23, 0, 'Emma Watson', 'emma@gmail.com', '$2y$10$0o4O/Omt2W1WDCPKeMSmje4Gj1cV91BVmDYkNpi39bgW65matlq2S', 'female', '1990-04-15', 'Act.', 'I am Hermione Granger in Harry Potter Movie.', '2019-12-01 07:37:52', '2019-12-01 07:37:52'),
(24, 0, 'Scarlett Johansson', 'scarlett@gmail.com', '$2y$10$bZDS8XpFZ51Og6NeHPqX7eHlw/pI3rWzHYvB0ynEOeBz1Wxopk5r6', 'female', '1984-11-22', 'Act.', 'I am Black Widow in Marvel Cinematic Universe.', '2019-12-01 08:02:08', '2019-12-01 08:02:08'),
(25, 0, 'Robert Downey Jr', 'robert@gmail.com', '$2y$10$Xjf92n1mDsbodFbbVj9G3e30eDFapySNZDoHDZ/t2EkSglohjkfv2', 'male', '1965-04-04', 'Spend money.', 'I am Iron Man in Marvel Cinematic Universe.', '2019-12-01 08:06:43', '2019-12-01 08:06:43'),
(26, 0, 'Amber Heard', 'amber@gmail.com', '$2y$10$5Ly5wR9MBBtNniR.VUkETO7hzLJ9.7Dtd23Zvyv9UUImlWRuoqw6O', 'female', '1986-04-22', 'Make scandal.', 'I am beautiful and I want all of you know it.', '2019-12-01 08:10:20', '2019-12-01 08:15:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
