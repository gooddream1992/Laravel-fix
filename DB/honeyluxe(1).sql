-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 04:50 PM
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
-- Table structure for table `header_footers`
--

CREATE TABLE `header_footers` (
  `id` int(11) NOT NULL,
  `headerLogo` varchar(200) DEFAULT NULL,
  `footerLogo` varchar(200) DEFAULT NULL,
  `youtube` varchar(200) DEFAULT NULL,
  `youtubeurl` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `facebookurl` varchar(200) DEFAULT NULL,
  `tweeter` varchar(200) DEFAULT NULL,
  `tweeterurl` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  `linkedinurl` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `instagramurl` varchar(200) DEFAULT NULL,
  `footerTitle` varchar(200) DEFAULT NULL,
  `footerInfo` varchar(200) DEFAULT NULL,
  `copyrights` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_footers`
--

INSERT INTO `header_footers` (`id`, `headerLogo`, `footerLogo`, `youtube`, `youtubeurl`, `facebook`, `facebookurl`, `tweeter`, `tweeterurl`, `linkedin`, `linkedinurl`, `instagram`, `instagramurl`, `footerTitle`, `footerInfo`, `copyrights`, `created_at`, `updated_at`) VALUES
(1, '1595592866.jpg', '1595592866.jpg', '1595592866.jpg', 'dfdsf', '1595592866.jpg', 'sdfdsf', '1595592866.jpg', NULL, '1595592866.png', 'fsdf', '1595592866.png', 'dsf', 'dfsd', 'fdsfsdf', 'fdsf', '2020-07-24 06:14:26', '2020-07-24 06:14:26'),
(3, '1595598610.gif', '1595598610.png', '1595598610.png', '#', '1595598610.png', '#', '1595598610.png', '#', '1595598610.png', '#', '1595598610.png', '#', 'Footer Title', 'This is a Big Escort Site Which is ...', '@ All right Reserved By HoneLuxe Developed By Code Can Soft', '2020-07-24 07:50:10', '2020-07-24 07:50:10');

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
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slider` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `category`, `title`, `description`, `slider`, `created_at`, `updated_at`) VALUES
(1, 1, 'dddd', NULL, '1595591707.jpg', '2020-07-24 05:55:07', '2020-07-24 05:55:07'),
(2, 1, 'fdsfdsfsd', 'fsfsd', '1595591796.jpg', '2020-07-24 05:56:36', '2020-07-24 05:56:36'),
(3, 1, 'sds', 'dsdsd', '1595598253.PNG', '2020-07-24 07:44:13', '2020-07-24 07:44:13'),
(4, 1, 'fgd', 'gdgdf', '1595598349.jpg', '2020-07-24 07:45:49', '2020-07-24 07:45:49');

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
(1, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '012323423424', 1, '2', '3', '5', '34', NULL, 'admin@gmail.com', NULL, '$2y$10$Wbtj7eGNRFijxmZnQHlLOepO/i.easM3IT1vwqKcDTwp3UjQggIyG', NULL, '2020-04-01 21:39:08', '2020-04-29 22:54:05'),
(30, 'DDFfdfdf', 0, 1, 18, 1, 1, 1, 1, '3232', '323', 323, 1, '2121', 2, '1', '2', '8', '456', '1595597468.jpg', 'wdd@gmail.com', NULL, '$2y$10$0mOS.ewLBmf.xvPsK6oODOkddcwRWWSRq56WwMBFZHa.431td2ohq', NULL, '2020-07-24 01:21:34', '2020-07-24 07:42:54'),
(31, 'dsfs', 1, 1, 18, 1, 1, 1, 1, '44', '44', 44, 1, 'wewe', 2, '2', '3', '5', '345', '1595597497.jpg', 'dfddf@gmail.com', NULL, '$2y$10$HaEekcY1zW110WqzL1v.X.Y/cGfXN/ABxPah2NuNkpGwp2pYUVOJ.', NULL, '2020-07-24 01:36:38', '2020-07-24 07:43:37'),
(32, 'DDDFF', 1, 2, 18, 2, 1, 1, 1, '44', '44', 44, 1, '2434', 2, '2', '3', '7', '344', '1595600117.jpg', 'fff@gmail.com', NULL, '$2y$10$qWZhwgoDFhJv/By3fodasupS4g851uyy7bq8KvSFLOGXYwU0X11J2', NULL, '2020-07-24 08:15:17', '2020-07-24 08:15:17'),
(33, 'dsfsf', 0, 1, 18, 1, 1, 1, 1, NULL, NULL, 454, 1, '343', 2, '2', '3', '7', '2333', '1595600238.jpg', 'fgf@gmail.com', NULL, '$2y$10$CKUsGdBoBIJAHqxEzKwW3eRAG5k7ZcBWDQY2i9TBht1NYsWlqaHHe', NULL, '2020-07-24 08:17:18', '2020-07-24 08:17:18'),
(34, 'hfghfh', 0, 1, 18, 1, 1, 1, 1, NULL, NULL, 5665, 1, '4545', 2, '2', '4', '8', '5444', '1595600461.jpg', 'fdgdf@gmail.com', NULL, '$2y$10$GkE85F5FvAZB4lzJQwR3w.6TCQgHXWXe37uQezuXeKfWA5oc/3WYm', NULL, '2020-07-24 08:21:01', '2020-07-24 08:21:01'),
(35, 'fdsfsdf', 1, 1, 18, 1, 1, 1, 1, NULL, NULL, 3434, 1, '3434', 2, '2', '4', '7', '444', '1595600516.jpg', 'dsfsdf@gmail.com', NULL, '$2y$10$Cd0/OlHeWwl7eGaBxv6fj.X4hw71HKKql8rTvDnlI0G.tcua/3/Ma', NULL, '2020-07-24 08:21:56', '2020-07-24 08:21:56'),
(36, 'rerwer', 1, 1, 18, 1, 1, 1, 1, NULL, '323', 344, 1, '4343', 2, '2', '4', '7', '345', '1595600580.jpg', 'wwd@gmail.com', NULL, '$2y$10$.c4qXeZkSxko/1wC3d66BuAixj/fWjRsoVFTYonyIgNRsXGYcgfd6', NULL, '2020-07-24 08:23:00', '2020-07-24 08:23:00'),
(37, 'rerer', 1, 1, 18, 1, 1, 1, 1, NULL, '346', 345, 1, '2424', 2, '2', '4', '7', '4322', '1595600607.jpg', 'yyid@gmail.com', NULL, '$2y$10$CQNHR/zfIa17cPBoNQTVC.2M2ykOFfTn4naYGtSI4iNypBgVa0cxW', NULL, '2020-07-24 08:23:27', '2020-07-24 08:23:27');

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
-- Indexes for table `header_footers`
--
ALTER TABLE `header_footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `header_footers`
--
ALTER TABLE `header_footers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
