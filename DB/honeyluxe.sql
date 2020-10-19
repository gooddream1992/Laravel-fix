-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 04:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `honeyluxe`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `city`, `created_at`, `updated_at`) VALUES
(1, 1, 'Katal', '2020-06-20 19:44:51', '2020-06-20 19:44:51'),
(2, 2, 'Shialda', '2020-06-20 19:45:10', '2020-06-20 19:45:10'),
(3, 1, 'Gujara', '2020-06-20 19:45:24', '2020-06-20 19:45:24'),
(4, 2, 'Jungtion', '2020-06-20 19:45:36', '2020-06-20 19:45:36'),
(5, 3, 'Mirpur', '2020-06-20 19:45:54', '2020-06-20 19:45:54'),
(6, 3, 'Farmgate', '2020-06-20 19:46:04', '2020-06-20 19:46:04'),
(7, 4, 'Khalishpur', '2020-06-20 19:46:37', '2020-06-20 19:46:37'),
(8, 4, 'Bl Mart', '2020-06-20 19:46:50', '2020-06-20 19:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `created_at`, `updated_at`) VALUES
(1, 'India', '2020-06-20 19:44:22', '2020-06-20 19:44:22'),
(2, 'Bangladesh', '2020-06-20 19:44:32', '2020-06-20 19:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kolkata', '2020-06-20 19:44:39', '2020-06-20 19:44:39'),
(2, 1, 'Shiliguri', '2020-06-20 19:45:00', '2020-06-20 19:45:00'),
(3, 2, 'Dhaka', '2020-06-20 19:45:45', '2020-06-20 19:45:45'),
(4, 2, 'Khulna', '2020-06-20 19:46:21', '2020-06-20 19:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation` int(11) DEFAULT NULL,
  `serviceArea` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `nationality` int(11) DEFAULT NULL,
  `sexuality` int(11) DEFAULT NULL,
  `eyes` int(11) DEFAULT NULL,
  `bodyShape` int(11) DEFAULT NULL,
  `dress` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roleStatus` int(11) DEFAULT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suburb` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `activation`, `serviceArea`, `age`, `nationality`, `sexuality`, `eyes`, `bodyShape`, `dress`, `height`, `price`, `gender`, `phone`, `roleStatus`, `country`, `city`, `suburb`, `code`, `photo`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '012323423424', 1, NULL, NULL, NULL, 'dsfsafsf', NULL, 'admin@gmail.com', NULL, '$2y$10$Wbtj7eGNRFijxmZnQHlLOepO/i.easM3IT1vwqKcDTwp3UjQggIyG', NULL, '2020-04-01 21:39:08', '2020-04-29 22:54:05'),
(21, 'Mr. Wasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3123123', 3, NULL, NULL, NULL, 'sdasdfsada', NULL, 'wasi@gmail.com', NULL, '$2y$10$dJge6ZGasWlXTDbPEm/6PORD3cgGCzhRYNM1tAYsu6sb6ZQ7cNaDm', NULL, '2020-04-06 22:12:04', '2020-04-06 22:12:04'),
(22, 'Mr. Rana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '23123123', 3, NULL, NULL, NULL, 'efwwer', NULL, 'rana@gmail.com', NULL, '$2y$10$9JxRW8d6zcl2ckIVkQ8Df.h8/SYlxU3wRxsKXjtSPRPY9QykQRcqi', NULL, '2020-04-06 22:14:01', '2020-04-06 22:14:01'),
(23, 'gtrr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '455', 1, NULL, NULL, NULL, '5y44y', '1589341768.jpg', 'adm3r2132in@gmail.com', NULL, '$2y$10$o5WVtM8S8trDM.uJeVMEG.DhoOGb8KGvA3IGQeiWHTpNgOgeFzINu', NULL, '2020-05-12 21:49:28', '2020-05-12 21:49:28'),
(24, 'faij', 0, 1, 18, 1, 1, 1, 1, NULL, NULL, NULL, 1, '67868678678', 2, '1', '1', '1589345748.jpg', NULL, '1592544876.jpg', 'faij@gmail.com', NULL, '$2y$10$co7sOhLAy46kUGtvqRB4buyMcbk0ZKx/FkBOHt4XaqJpTuU2H7mqi', NULL, '2020-05-12 22:55:48', '2020-06-18 23:34:36'),
(25, 'ajim', 0, 1, 18, 1, 1, 1, 1, NULL, NULL, NULL, 1, '3123123123', 2, '1', '0', '1589346115.jpg', 'ssdfsd,fsdf,fsdf,fsd', '1592544886.jpg', 'ajim@gmail.com', NULL, '$2y$10$d/qjsg4tl0ZrvGB9tpkYqO3er0SK0j5bfExoaKDg1hva3LORpTR1q', NULL, '2020-05-12 23:01:55', '2020-06-18 23:34:46'),
(26, 'kajim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3213131', 3, '1', '1', '1589349062.jpg', 'dwefdwecfwecfwe', '1589349062.jpg', 'kajim@gmail.com', NULL, '$2y$10$u4CfhliVBl4YXwHYbzqt/eI8Vq7.Acr3QvGMQrhPjvG1MsFcLIzTG', NULL, '2020-05-12 23:51:02', '2020-05-12 23:51:02'),
(27, 'Wali', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '23123123', 2, 'Bangladesh', 'Dhaka', 'Mirpur', '1216', NULL, 'wa@gmail.com', NULL, '$2y$10$e7nMociJ7j81p4VuQS.VNuEBbQ95mOGgMqwDlLGpTLkxAQYDJUzn2', NULL, '2020-06-18 21:42:58', '2020-06-18 21:42:58'),
(28, 'Essita', 0, 1, 18, 1, 1, 1, 1, '2342', '5.42', 2323, 1, '32324', 2, 'fsdfdsf', 'sdfsd', 'dsfdsf', '233', '1592542989.jpg', 'esita@gmail.com', NULL, '$2y$10$BKj90tk324NgGbv0R4glLOYO9.bzbkhVEa2eX0.vuxsuo.76dGXY2', NULL, '2020-06-18 23:03:09', '2020-06-18 23:34:01'),
(29, 'Rishita', 0, 1, 18, 1, 1, 1, 1, '423', '5.5', 32423, 2, '322', 2, 'fdff', 'sdfsd', 'sdfsd', '342', '1592543298.jpg', 'rishita@gmail.com', NULL, '$2y$10$rI1zh7J/I/LEpu/P50sdN.0Uzfeq5NVuMJOarz/q5KvtmjRmCBLYm', NULL, '2020-06-18 23:08:18', '2020-06-18 23:08:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
