-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 03:05 AM
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
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `titleHead` varchar(200) DEFAULT NULL,
  `intro` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `titleHead`, `intro`, `description`, `created_at`, `updated_at`) VALUES
(1, 'This is', 'dsfsd', 'fsdf', NULL, '2020-08-08 18:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `become_escorts`
--

CREATE TABLE `become_escorts` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `imageurl` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `become_escorts`
--

INSERT INTO `become_escorts` (`id`, `status`, `title`, `description`, `imageurl`, `created_at`, `updated_at`) VALUES
(1, 1, 'fsdfs', 'dfsdfsd', '91597376341.png', '2020-08-13 21:39:01', '2020-08-13 21:39:01'),
(2, 1, 'yg', 'utytu', '91597377820.png', '2020-08-13 22:03:40', '2020-08-13 22:03:40'),
(3, 1, 'fsdfs', 'fsdfsdf', '91597407969.png', '2020-08-14 06:26:09', '2020-08-14 06:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `imageurl` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `status`, `title`, `description`, `imageurl`, `created_at`, `updated_at`) VALUES
(1, 1, 'fsdfs', 'dfsdfsd', '91597376341.png', '2020-08-13 21:39:01', '2020-08-13 21:39:01'),
(2, 1, 'yg', 'utytu', '91597477301.png', '2020-08-13 22:03:40', '2020-08-15 01:41:41'),
(3, 1, 'fsdfs', 'fsdfsdf', '91597407969.png', '2020-08-14 06:26:09', '2020-08-14 06:26:09'),
(4, 1, 'fdf', 'sdfsfsdf', '91597416733.png', '2020-08-14 08:52:13', '2020-08-14 08:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `business_etiquetes`
--

CREATE TABLE `business_etiquetes` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `imageurl` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_etiquetes`
--

INSERT INTO `business_etiquetes` (`id`, `status`, `title`, `description`, `imageurl`, `created_at`, `updated_at`) VALUES
(1, 1, 'fsdfs', 'dfsdfsd', '91597474322.jpg', '2020-08-13 21:39:01', '2020-08-15 00:52:02'),
(2, 1, 'yg', 'utytu', '91597377820.png', '2020-08-13 22:03:40', '2020-08-13 22:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `business_question_etiquetes`
--

CREATE TABLE `business_question_etiquetes` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_question_etiquetes`
--

INSERT INTO `business_question_etiquetes` (`id`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, '<p>This is list</p>', '2020-08-13 21:39:01', '2020-08-15 00:53:09'),
(2, 1, 'utytu', '2020-08-13 22:03:40', '2020-08-13 22:03:40'),
(3, 1, 'fwerwer', '2020-08-13 22:16:33', '2020-08-13 22:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `state_id`, `city`, `created_at`, `updated_at`) VALUES
(10, 5, 6, 'Jungtion', '2020-08-23 19:54:16', '2020-08-23 19:54:16'),
(15, 5, 11, 'Maldah', '2020-08-25 08:45:59', '2020-08-25 08:45:59'),
(16, 9, 12, 'Shamai', '2020-08-25 08:46:27', '2020-08-25 08:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `client_relationships`
--

CREATE TABLE `client_relationships` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `imageurl` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_relationships`
--

INSERT INTO `client_relationships` (`id`, `status`, `title`, `description`, `imageurl`, `created_at`, `updated_at`) VALUES
(1, 1, 'fsdfs', 'dfsdfsd', '91597476304.jpg', '2020-08-13 21:39:01', '2020-08-15 01:25:04'),
(2, 1, 'yg', 'utytu', '91597377820.png', '2020-08-13 22:03:40', '2020-08-13 22:03:40'),
(3, 1, 'fsdfs', 'fsdfsdf', '91597407969.png', '2020-08-14 06:26:09', '2020-08-14 06:26:09'),
(4, 1, 'fefe', 'frete', '91597410623.png', '2020-08-14 07:10:23', '2020-08-14 07:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `client_relation_questions`
--

CREATE TABLE `client_relation_questions` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_relation_questions`
--

INSERT INTO `client_relation_questions` (`id`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'wasiyktyjtyjytj', '2020-08-13 21:39:01', '2020-08-15 01:25:18'),
(2, 1, 'utytu', '2020-08-13 22:03:40', '2020-08-13 22:03:40'),
(3, 1, 'fwerwer', '2020-08-13 22:16:33', '2020-08-13 22:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `image`, `created_at`, `updated_at`) VALUES
(5, 'India', '1598366694.jpg', '2020-08-23 19:53:45', '2020-08-25 08:44:54'),
(9, 'Astralia', NULL, '2020-08-25 08:46:11', '2020-08-25 08:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `escort_dropdowns`
--

CREATE TABLE `escort_dropdowns` (
  `id` int(11) NOT NULL,
  `dropdownTitle` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `escort_dropdowns`
--

INSERT INTO `escort_dropdowns` (`id`, `dropdownTitle`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Classic', 1, '2020-08-23 09:01:15', '2020-08-23 09:18:31'),
(2, 'Hoty', 3, '2020-08-23 09:07:08', '2020-08-23 09:18:11'),
(3, 'Blue', 1, '2020-08-23 09:08:25', '2020-08-23 09:18:03'),
(4, 'Black', 5, '2020-08-23 09:14:28', '2020-08-23 09:14:28'),
(5, 'Bangladesh', 4, '2020-08-23 09:16:25', '2020-08-23 09:16:25'),
(6, 'Curvy', 2, '2020-08-23 09:29:40', '2020-08-23 09:29:40'),
(7, 'Red', 1, '2020-08-24 00:23:30', '2020-08-24 00:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `imageurl` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `status`, `title`, `description`, `imageurl`, `created_at`, `updated_at`) VALUES
(1, 1, 'fsdfs', 'dfsdfsd', '91597475426.jpg', '2020-08-13 21:39:01', '2020-08-15 01:10:26'),
(2, 1, 'yg', 'utytu', '91597377820.png', '2020-08-13 22:03:40', '2020-08-13 22:03:40'),
(3, 1, 'fsdfs', 'fsdfsdf', '91597407969.png', '2020-08-14 06:26:09', '2020-08-14 06:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_questions`
--

INSERT INTO `faq_questions` (`id`, `status`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, 'Quest', 'Answ', '2020-08-13 21:39:01', '2020-08-15 01:10:55'),
(2, 1, 'yg', 'utytu', '2020-08-13 22:03:40', '2020-08-13 22:03:40'),
(3, 1, 'fsdfs', 'fsdfsdf', '2020-08-14 06:26:09', '2020-08-14 06:26:09'),
(4, 1, 'gdg', 'dfgdgd', '2020-08-14 06:51:58', '2020-08-14 06:51:58');

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
(10, '11595727067.gif', '21595727067.png', '41595727067.png', '#', '31595727067.png', '#', '61595727067.png', '#', '51595727067.png', '#', '71595727067.png', '#', 'HoneyLuxe', 'vdfg dfg dfg dfg df g df gdf gfddgd gdf g df gdf g d fg df g fdgfdgdfgdfgdf eetgrtgertertert', '© 2020@ All right Reserved By HoneLuxe Developed By Alakmalak', '2020-07-25 19:31:07', '2020-08-23 18:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `independents`
--

CREATE TABLE `independents` (
  `id` int(11) NOT NULL,
  `icon` varchar(200) DEFAULT NULL,
  `bgimage` varchar(200) DEFAULT NULL,
  `topHead` varchar(200) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `independents`
--

INSERT INTO `independents` (`id`, `icon`, `bgimage`, `topHead`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '11597462305.jpg', '21596812426.jpg', 'ii', 'kk', '<p>ddddddddddd<br></p>', NULL, '2020-08-14 21:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `local_resources`
--

CREATE TABLE `local_resources` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `imageurl` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `local_resources`
--

INSERT INTO `local_resources` (`id`, `status`, `title`, `description`, `imageurl`, `created_at`, `updated_at`) VALUES
(1, 1, 'fsdfs', 'dfsdfsd', '91597376341.png', '2020-08-13 21:39:01', '2020-08-13 21:39:01'),
(2, 1, 'yg', 'utytu', '91597377820.png', '2020-08-13 22:03:40', '2020-08-13 22:03:40'),
(3, 1, 'fsdfs', 'fsdfsdf', '91597407969.png', '2020-08-14 06:26:09', '2020-08-14 06:26:09');

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
-- Table structure for table `our_stories`
--

CREATE TABLE `our_stories` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `imageurl` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `our_stories`
--

INSERT INTO `our_stories` (`id`, `status`, `title`, `description`, `imageurl`, `created_at`, `updated_at`) VALUES
(1, 1, 'fsdfs', 'dfsdfsd', '91597474696.jpg', '2020-08-13 21:39:01', '2020-08-15 00:58:16'),
(2, 1, 'yg', 'utytu', '91597377820.png', '2020-08-13 22:03:40', '2020-08-13 22:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `professionals`
--

CREATE TABLE `professionals` (
  `id` int(11) NOT NULL,
  `titleHead` varchar(200) DEFAULT NULL,
  `intro` varchar(200) DEFAULT NULL,
  `bgTop` varchar(200) DEFAULT NULL,
  `bgBottom` varchar(200) DEFAULT NULL,
  `title1` varchar(200) DEFAULT NULL,
  `icon1` varchar(200) DEFAULT NULL,
  `title2` varchar(200) DEFAULT NULL,
  `icon2` varchar(200) DEFAULT NULL,
  `title3` varchar(200) DEFAULT NULL,
  `icon3` varchar(200) DEFAULT NULL,
  `title4` varchar(200) DEFAULT NULL,
  `icon4` varchar(200) DEFAULT NULL,
  `title5` varchar(200) DEFAULT NULL,
  `icon5` varchar(200) DEFAULT NULL,
  `title6` varchar(200) DEFAULT NULL,
  `icon6` varchar(200) DEFAULT NULL,
  `title7` varchar(200) DEFAULT NULL,
  `icon7` varchar(200) DEFAULT NULL,
  `title8` varchar(200) DEFAULT NULL,
  `icon8` varchar(200) DEFAULT NULL,
  `title9` varchar(200) DEFAULT NULL,
  `icon9` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professionals`
--

INSERT INTO `professionals` (`id`, `titleHead`, `intro`, `bgTop`, `bgBottom`, `title1`, `icon1`, `title2`, `icon2`, `title3`, `icon3`, `title4`, `icon4`, `title5`, `icon5`, `title6`, `icon6`, `title7`, `icon7`, `title8`, `icon8`, `title9`, `icon9`, `created_at`, `updated_at`) VALUES
(1, 'erw', 'erwe', NULL, NULL, 'rwere', 'rwerwe', 'ewrwe', 'rewr', 'rwer', 'rwer', 'werwe', 'rwerwe', 'rewrwe', '51597462321.jpg', 'rwer', 'werwer', 'werw', 'werwe', 'rwer', 'wrerew', 'werwe', '91596851225.png', NULL, '2020-08-14 21:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `profile_availabilities`
--

CREATE TABLE `profile_availabilities` (
  `id` int(11) NOT NULL,
  `escortId` int(11) DEFAULT NULL,
  `weekday` varchar(100) DEFAULT NULL,
  `fromDate` varchar(100) DEFAULT NULL,
  `untilDate` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_availabilities`
--

INSERT INTO `profile_availabilities` (`id`, `escortId`, `weekday`, `fromDate`, `untilDate`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sunday', '1:00 AM', '1:00 AM', '2020-08-11 10:01:09', '2020-08-25 09:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `profile_blogs`
--

CREATE TABLE `profile_blogs` (
  `id` int(11) NOT NULL,
  `escortId` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_blogs`
--

INSERT INTO `profile_blogs` (`id`, `escortId`, `status`, `title`, `image`, `url`, `created_at`, `updated_at`) VALUES
(1, 32, 1, 'dfwsdf', '91597193570.png', 'sdfsdf', '2020-08-11 18:52:50', '2020-08-25 10:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `profile_descriptions`
--

CREATE TABLE `profile_descriptions` (
  `id` int(11) NOT NULL,
  `escortId` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_descriptions`
--

INSERT INTO `profile_descriptions` (`id`, `escortId`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2020-08-11 09:01:19', '2020-08-25 08:53:29'),
(2, 31, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2020-08-11 09:01:42', '2020-08-23 19:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `profile_images`
--

CREATE TABLE `profile_images` (
  `id` int(11) NOT NULL,
  `escortId` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_images`
--

INSERT INTO `profile_images` (`id`, `escortId`, `status`, `image`, `url`, `created_at`, `updated_at`) VALUES
(1, 30, 2, '91597120618.gif', 'dswdewqwe', '2020-08-10 22:36:58', '2020-08-25 18:39:27'),
(3, 31, 1, '91597121405.jpg', 'rterte', '2020-08-10 22:50:05', '2020-08-10 22:50:05'),
(5, 31, 2, '91597122217.jpg', 'ewrw', '2020-08-10 23:03:37', '2020-08-10 23:03:37'),
(6, 30, 1, '91598231269.png', 'dfgdgd', '2020-08-10 23:04:00', '2020-08-23 19:07:49'),
(7, 31, 3, '91597122382.jpg', '3434', '2020-08-10 23:06:22', '2020-08-10 23:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `profile_lists`
--

CREATE TABLE `profile_lists` (
  `id` int(11) NOT NULL,
  `escortId` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_lists`
--

INSERT INTO `profile_lists` (`id`, `escortId`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 31, 1, 'sdcdscdscsdc', '2020-08-11 09:01:19', '2020-08-25 08:56:59'),
(2, 31, 2, 'cdfvcdfvdfvdf', '2020-08-11 09:01:42', '2020-08-11 09:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `profile_rates`
--

CREATE TABLE `profile_rates` (
  `id` int(11) NOT NULL,
  `escortId` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_rates`
--

INSERT INTO `profile_rates` (`id`, `escortId`, `status`, `time`, `price`, `description`, `created_at`, `updated_at`) VALUES
(3, 32, 1, '12 Hours', '3232', NULL, '2020-08-11 09:28:52', '2020-08-25 09:30:21'),
(4, 30, 1, '12 Hours', NULL, NULL, '2020-08-25 18:59:57', '2020-08-25 18:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `profile_tours`
--

CREATE TABLE `profile_tours` (
  `id` int(11) NOT NULL,
  `escortId` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `startDate` varchar(200) DEFAULT NULL,
  `endDate` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_tours`
--

INSERT INTO `profile_tours` (`id`, `escortId`, `status`, `city`, `startDate`, `endDate`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Kolkata', '2020-08-12', '2020-08-13', '2020-08-11 18:28:04', '2020-08-25 10:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `provider_resources`
--

CREATE TABLE `provider_resources` (
  `id` int(11) NOT NULL,
  `titleHead` varchar(200) DEFAULT NULL,
  `intro` text DEFAULT NULL,
  `title1` varchar(200) DEFAULT NULL,
  `icon1` varchar(200) DEFAULT NULL,
  `title2` varchar(200) DEFAULT NULL,
  `icon2` varchar(200) DEFAULT NULL,
  `title3` varchar(200) DEFAULT NULL,
  `icon3` varchar(200) DEFAULT NULL,
  `title4` varchar(200) DEFAULT NULL,
  `icon4` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provider_resources`
--

INSERT INTO `provider_resources` (`id`, `titleHead`, `intro`, `title1`, `icon1`, `title2`, `icon2`, `title3`, `icon3`, `title4`, `icon4`, `created_at`, `updated_at`) VALUES
(1, 'sdsd', 'sds', 'dsd', '11596848787.png', 'sdsd', '21596848787.png', 'sds', '31597462284.jpg', 'sds', '41596848787.png', NULL, '2020-08-14 21:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_marketings`
--

CREATE TABLE `purchase_marketings` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `imageurl` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_marketings`
--

INSERT INTO `purchase_marketings` (`id`, `status`, `title`, `description`, `imageurl`, `created_at`, `updated_at`) VALUES
(1, 1, 'fsdfs', 'dfsdfsd', '91597376341.png', '2020-08-13 21:39:01', '2020-08-13 21:39:01'),
(2, 1, 'yg', 'utytu', '91597377820.png', '2020-08-13 22:03:40', '2020-08-13 22:03:40'),
(3, 1, 'fsdfs', 'fsdfsdf', '91597407969.png', '2020-08-14 06:26:09', '2020-08-14 06:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `service_offers`
--

CREATE TABLE `service_offers` (
  `id` int(11) NOT NULL,
  `service` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_offers`
--

INSERT INTO `service_offers` (`id`, `service`, `created_at`, `updated_at`) VALUES
(1, 'ff', NULL, NULL),
(3, 'kk', NULL, NULL),
(4, 'nn', NULL, NULL),
(5, 'ggg', '2020-08-24 08:26:33', '2020-08-24 08:26:33'),
(6, 'hhhh', '2020-08-24 08:57:57', '2020-08-24 08:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `service_offer_assigns`
--

CREATE TABLE `service_offer_assigns` (
  `id` int(11) NOT NULL,
  `escortId` int(11) DEFAULT NULL,
  `service` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_offer_assigns`
--

INSERT INTO `service_offer_assigns` (`id`, `escortId`, `service`, `created_at`, `updated_at`) VALUES
(5, 30, 'ff', '2020-08-24 08:42:09', '2020-08-24 08:57:36'),
(6, 30, 'kk', '2020-08-24 08:42:09', '2020-08-25 08:43:27'),
(7, 30, 'ff', '2020-08-24 08:42:24', '2020-08-24 08:42:24'),
(8, 30, 'kk', '2020-08-24 08:42:24', '2020-08-24 08:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `sex_traffickings`
--

CREATE TABLE `sex_traffickings` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `imageurl` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sex_traffickings`
--

INSERT INTO `sex_traffickings` (`id`, `status`, `title`, `description`, `imageurl`, `created_at`, `updated_at`) VALUES
(1, 1, 'fsdfs', 'dfsdfsd', '91597477258.png', '2020-08-13 21:39:01', '2020-08-15 01:40:58'),
(2, 1, 'yg', 'utytu', '91597377820.png', '2020-08-13 22:03:40', '2020-08-13 22:03:40'),
(3, 1, 'fsdfs', 'fsdfsdf', '91597407969.png', '2020-08-14 06:26:09', '2020-08-14 06:26:09'),
(4, 1, 'rst', 'tertr', '91597413599.png', '2020-08-14 07:59:59', '2020-08-14 07:59:59'),
(5, 1, 'gdfgd', 'fgdfgdfg', '91597414423.png', '2020-08-14 08:13:43', '2020-08-14 08:13:43');

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
  `slider1` varchar(300) DEFAULT NULL,
  `slider2` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `category`, `title`, `description`, `slider`, `slider1`, `slider2`, `created_at`, `updated_at`) VALUES
(1, 1, 'dddd', NULL, '1595591707.jpg', '21598364510.jpg', NULL, '2020-07-24 05:55:07', '2020-08-25 08:08:30'),
(2, 1, 'fdsfdsfsd', 'fsfsd', '1595591796.jpg', NULL, NULL, '2020-07-24 05:56:36', '2020-07-24 05:56:36'),
(3, 1, 'sds', 'dsdsd', '1595598253.PNG', NULL, NULL, '2020-07-24 07:44:13', '2020-07-24 07:44:13'),
(5, 1, 'dsds', 'dsdsdsd', '11595776856.jpg', '21595776856.jpg', '31595776856.jpg', '2020-07-26 09:20:56', '2020-07-26 09:20:56');

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
(6, 5, 'Shiliguri', '2020-08-23 19:54:06', '2020-08-23 19:54:06'),
(11, 5, 'Gujrat', '2020-08-25 08:45:52', '2020-08-25 08:45:52'),
(12, 9, 'Canberra', '2020-08-25 08:46:21', '2020-08-25 08:46:21'),
(13, 9, 'Gata', '2020-08-25 08:47:00', '2020-08-25 08:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `imageurl` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `status`, `title`, `description`, `imageurl`, `created_at`, `updated_at`) VALUES
(1, 1, 'fsdfs', 'dfsdfsd', '91597376341.png', '2020-08-13 21:39:01', '2020-08-13 21:39:01'),
(2, 2, 'fwerfwer', '<p>werwerwe<br></p>', '91597462919.png', '2020-08-14 21:41:59', '2020-08-14 21:41:59'),
(4, 2, 'wefweew', '<p><span style=\"color: rgb(206, 0, 0); font-family: &quot;Impact&quot;;\">wefwerfwerw<span style=\"background-color: rgb(247, 247, 247);\">er <font color=\"#000000\">fewfwerf</font></span></span><br></p>', '91597472885.jpg', '2020-08-14 21:46:33', '2020-08-15 00:59:23'),
(5, 2, 'gergergerger', '<p>gregergerger<br></p>', '91597472288.jpg', '2020-08-15 00:18:08', '2020-08-15 00:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation` int(11) DEFAULT NULL,
  `serviceArea` int(11) DEFAULT NULL,
  `whatsup` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `follow_me` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_me` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `straight` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hair` int(11) DEFAULT NULL,
  `bust` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pet` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drink` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `nationality` int(11) DEFAULT NULL,
  `sexuality` int(11) DEFAULT NULL,
  `eyes` int(11) DEFAULT NULL,
  `bodyShape` int(11) DEFAULT NULL,
  `escortType` int(11) DEFAULT NULL,
  `escortTouring` int(11) DEFAULT NULL,
  `serviceOffer` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `activation`, `serviceArea`, `whatsup`, `snapchat`, `instagram`, `follow_me`, `email_me`, `website`, `straight`, `hair`, `bust`, `personal_type`, `pet`, `drink`, `food`, `service`, `age`, `nationality`, `sexuality`, `eyes`, `bodyShape`, `escortType`, `escortTouring`, `serviceOffer`, `dress`, `height`, `price`, `gender`, `phone`, `roleStatus`, `country`, `city`, `suburb`, `code`, `photo`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '012323423424', 1, '2', '3', '5', '34', NULL, 'admin@gmail.com', NULL, '$2y$10$Wbtj7eGNRFijxmZnQHlLOepO/i.easM3IT1vwqKcDTwp3UjQggIyG', NULL, '2020-04-01 21:39:08', '2020-04-29 22:54:05'),
(30, 'Hisika Darlin', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, 1, 1, 1, NULL, NULL, NULL, '3232', '323', 323, 1, '2121', 2, '1', '2', '8', '456', '1595597468.jpg', 'wdd@gmail.com', NULL, '$2y$10$y1OsSCPk/5fgVQfGk9Ri/uNsg.w7yjMtD2VfhSf/ATR2qEX3miw/y', NULL, '2020-07-24 01:21:34', '2020-08-14 20:37:30'),
(31, 'Roses Chameli', 1, 1, 'https://www.whatsapp.com/', 'https://www.snapchat.com/', 'https://www.instagram.com/?hl=en', 'https://www.instagram.com/?hl=en', 'mailto:roses@gmail.com', 'http://codecan.net/', 'Straight', 4, 'Hot', 'Personality', 'Dog', 'Wine', 'Pizza', 'Agency', 18, 2, 2, 1, 1, 1, 1, ', , , , , , , , , , , , , , ', '44', '5.6\"', 345, 1, '8089788787', 2, '5', '4', '7', '345', '1595597497.jpg', 'roses@gmail.com', NULL, '$2y$10$3OMYuauEm1X4XSyukTPrtOuaUAwjKXEbj3DD9hRpa1f0uwvPG8ERe', NULL, '2020-07-24 01:36:38', '2020-08-25 08:43:17'),
(32, 'DDDFF', 1, 1, 'sdfsd', 'sdfsd', 'dsfsd', 'fsdf', 'sdf', 'sdfs', 'fsdf', 1, 'fsdf', 'sdfdsf', 'fsdf', 'fsdfs', 'sfsdf', 'sdfsd', 18, 1, 1, 1, 1, NULL, NULL, NULL, '44', '44', 44, 1, '2434', 2, '1', '3', '7', '344', '1595600117.jpg', 'fff@gmail.com', NULL, '$2y$10$xoRK6uLUh8FAIObfx8xzxO0j6C1aCChFluZlGFn.gV7nOhvH1Qrdm', NULL, '2020-07-24 08:15:17', '2020-08-10 22:06:16'),
(33, 'dsfsf', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 454, 1, '343', 2, '2', '3', '7', '2333', '1595600238.jpg', 'fgf@gmail.com', NULL, '$2y$10$CKUsGdBoBIJAHqxEzKwW3eRAG5k7ZcBWDQY2i9TBht1NYsWlqaHHe', NULL, '2020-07-24 08:17:18', '2020-07-24 08:17:18'),
(34, 'hfghfh', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 5665, 1, '4545', 2, '2', '4', '8', '5444', '1595600461.jpg', 'fdgdf@gmail.com', NULL, '$2y$10$GkE85F5FvAZB4lzJQwR3w.6TCQgHXWXe37uQezuXeKfWA5oc/3WYm', NULL, '2020-07-24 08:21:01', '2020-07-24 08:21:01'),
(35, 'fdsfsdf', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 3434, 1, '3434', 2, '2', '4', '7', '444', '1595600516.jpg', 'dsfsdf@gmail.com', NULL, '$2y$10$Cd0/OlHeWwl7eGaBxv6fj.X4hw71HKKql8rTvDnlI0G.tcua/3/Ma', NULL, '2020-07-24 08:21:56', '2020-07-24 08:21:56'),
(36, 'rerwer', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, 1, 1, 1, NULL, NULL, NULL, NULL, '323', 344, 1, '4343', 2, '2', '4', '7', '345', '1595600580.jpg', 'wwd@gmail.com', NULL, '$2y$10$.c4qXeZkSxko/1wC3d66BuAixj/fWjRsoVFTYonyIgNRsXGYcgfd6', NULL, '2020-07-24 08:23:00', '2020-07-24 08:23:00'),
(37, 'rerer', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, 1, 1, 1, NULL, NULL, NULL, NULL, '346', 345, 1, '2424', 2, '2', '4', '7', '4322', '1595600607.jpg', 'yyid@gmail.com', NULL, '$2y$10$CQNHR/zfIa17cPBoNQTVC.2M2ykOFfTn4naYGtSI4iNypBgVa0cxW', NULL, '2020-07-24 08:23:27', '2020-07-24 08:23:27'),
(38, 'Riksi', 1, 1, 'df', 'dfd', 'fd', 'fd', NULL, 'fdfdfd', 'fdfd', 4, 'dd', NULL, NULL, NULL, NULL, NULL, 18, 1, 1, 1, 1, 1, 1, ', , Pornstar Girlfriend, , , Dinner Dates, , , Message, , , , , , ', NULL, NULL, NULL, 1, '323', 2, '1', '3', '6', '2323', '1598196709.png', 'riksi@fdf.df', NULL, '$2y$10$h4sfkEHYzxaM22ijoM02..FEtPvu/yXJRtHygylykN8P8onFkmKr2', NULL, '2020-08-23 09:30:27', '2020-08-23 09:39:39'),
(39, 'fdfdf', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 18, 5, 2, 1, 6, 1, 1, ', , , , , , , , , , , , , , ', NULL, NULL, NULL, 1, '2323', 2, '5', NULL, NULL, NULL, NULL, 'www@gfdgf.gfg', NULL, '$2y$10$Q/AGZhruRtR00RELa5cTleASP2XAS8FjmgAvow4w2jQG8/H3ho8H6', NULL, '2020-08-24 09:01:23', '2020-08-24 09:01:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `become_escorts`
--
ALTER TABLE `become_escorts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_etiquetes`
--
ALTER TABLE `business_etiquetes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_question_etiquetes`
--
ALTER TABLE `business_question_etiquetes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_relationships`
--
ALTER TABLE `client_relationships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_relation_questions`
--
ALTER TABLE `client_relation_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escort_dropdowns`
--
ALTER TABLE `escort_dropdowns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_footers`
--
ALTER TABLE `header_footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `independents`
--
ALTER TABLE `independents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `local_resources`
--
ALTER TABLE `local_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_stories`
--
ALTER TABLE `our_stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professionals`
--
ALTER TABLE `professionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_availabilities`
--
ALTER TABLE `profile_availabilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_blogs`
--
ALTER TABLE `profile_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_descriptions`
--
ALTER TABLE `profile_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_images`
--
ALTER TABLE `profile_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_lists`
--
ALTER TABLE `profile_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_rates`
--
ALTER TABLE `profile_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_tours`
--
ALTER TABLE `profile_tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider_resources`
--
ALTER TABLE `provider_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_marketings`
--
ALTER TABLE `purchase_marketings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_offers`
--
ALTER TABLE `service_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_offer_assigns`
--
ALTER TABLE `service_offer_assigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sex_traffickings`
--
ALTER TABLE `sex_traffickings`
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
-- Indexes for table `terms`
--
ALTER TABLE `terms`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `become_escorts`
--
ALTER TABLE `become_escorts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `business_etiquetes`
--
ALTER TABLE `business_etiquetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `business_question_etiquetes`
--
ALTER TABLE `business_question_etiquetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `client_relationships`
--
ALTER TABLE `client_relationships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client_relation_questions`
--
ALTER TABLE `client_relation_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `escort_dropdowns`
--
ALTER TABLE `escort_dropdowns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `header_footers`
--
ALTER TABLE `header_footers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `independents`
--
ALTER TABLE `independents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `local_resources`
--
ALTER TABLE `local_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `our_stories`
--
ALTER TABLE `our_stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professionals`
--
ALTER TABLE `professionals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_availabilities`
--
ALTER TABLE `profile_availabilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_blogs`
--
ALTER TABLE `profile_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile_descriptions`
--
ALTER TABLE `profile_descriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile_images`
--
ALTER TABLE `profile_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profile_lists`
--
ALTER TABLE `profile_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile_rates`
--
ALTER TABLE `profile_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile_tours`
--
ALTER TABLE `profile_tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `provider_resources`
--
ALTER TABLE `provider_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_marketings`
--
ALTER TABLE `purchase_marketings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_offers`
--
ALTER TABLE `service_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_offer_assigns`
--
ALTER TABLE `service_offer_assigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sex_traffickings`
--
ALTER TABLE `sex_traffickings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
