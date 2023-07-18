-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2022 at 06:41 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet-zone`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

DROP TABLE IF EXISTS `aboutus`;
CREATE TABLE IF NOT EXISTS `aboutus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `details`, `created_at`, `updated_at`) VALUES
(1, 'PET CARE WEBSITE\r\nThere are so many challenges that come with finding good services. You need to find someone both you and your pet trust.\r\nYou need them to be available on the right days at the right times, and maybe even last minute. And of course, you want them to be\r\nexperienced and great with pets. At PET CARE, these are the problems we solve for. Our goal is to make it as easy as possible for you\r\nto schedule and receive pet care with the ideal sitter for you. \r\n\r\n	', '2022-05-17 15:57:42', '2022-05-17 15:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

DROP TABLE IF EXISTS `pets`;
CREATE TABLE IF NOT EXISTS `pets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `petName` varchar(50) NOT NULL,
  `dateOfBirth` varchar(50) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `spayed` varchar(50) NOT NULL,
  `vaccinationList` text NOT NULL,
  `medicalHistory` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `userId`, `petName`, `dateOfBirth`, `breed`, `gender`, `spayed`, `vaccinationList`, `medicalHistory`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 16, 'Koaka', '2022-05-26', 'Persian', 'male', 'neutered', 'testing .... 2', 'testing ....', 'pet_222183.png', 1, '2022-05-17 16:01:02', '2022-05-17 16:01:02'),
(4, 16, 'Koaka 2', '2022-05-25', 'Persian', 'female', 'neutered', 'appointment-request.php', 'appointment-request.php', 'pet_970446.png', 1, '2022-05-17 13:11:31', '2022-05-17 13:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `petId` int NOT NULL,
  `userId` int NOT NULL,
  `service` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `status` int NOT NULL COMMENT '1=accept',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `petId`, `userId`, `service`, `date`, `time`, `details`, `status`, `created_at`, `updated_at`) VALUES
(3, 3, 16, '1', '2022-05-16', '18:14', 'Any thing we should know about?', 1, '2022-05-17 15:59:25', '2022-05-17 15:59:25'),
(4, 4, 16, '1', '2022-05-26', '18:16', 'Any thing we should know about?', 1, '2022-05-17 13:12:02', '2022-05-17 13:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `reservationId` int NOT NULL,
  `rating1` varchar(50) NOT NULL,
  `rating2` varchar(50) NOT NULL,
  `rating3` varchar(50) NOT NULL,
  `review` text NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `userId`, `reservationId`, `rating1`, `rating2`, `rating3`, `review`, `status`, `created_at`, `updated_at`) VALUES
(1, 16, 3, '10', '5', '5', 'Your note help us to improve our service', 0, '2022-05-17 15:51:57', '2022-05-17 15:51:57'),
(2, 16, 3, '5', '5', '10', 'Your note help us to improve our service', 0, '2022-05-17 15:54:12', '2022-05-17 15:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `details` longtext NOT NULL,
  `price` varchar(50) NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `details`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'cat', 'pet_12197.png', 'testing', '100', 0, '2022-05-17 04:26:53', '2022-05-17 04:26:53'),
(2, 'cat 1', 'pet_211231.png', 'testing', '100', 0, '2022-05-17 05:24:22', '2022-05-17 05:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `services_appointment`
--

DROP TABLE IF EXISTS `services_appointment`;
CREATE TABLE IF NOT EXISTS `services_appointment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_id` int NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_appointment`
--

INSERT INTO `services_appointment` (`id`, `service_id`, `date`, `time`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, '2022-05-27', '20:30', 0, '2022-05-17 05:39:25', '2022-05-17 05:39:25'),
(3, 2, '2022-05-24', '14:20', 0, '2022-05-15 17:20:43', '2022-05-15 17:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` int NOT NULL DEFAULT '0' COMMENT '0=user and 1 = admin',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'img_avatar.png',
  `password` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `first_name`, `last_name`, `email`, `image`, `password`, `phone`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'Admin', 'Admin', 'admin@gmail.com', 'img_avatar.png', '123456789', '123456789', 'male', 'Active', '2022-05-16 10:24:27', '2022-05-16 10:24:27'),
(16, 0, 'Jawad', 'Ahmad', 'mrjac1111@gmail.com', 'profile_917685.png', '123456789', '2368386588', 'Female', 'Active', '2022-05-17 08:01:29', '2022-05-17 08:01:29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
