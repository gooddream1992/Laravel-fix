-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2020 at 07:54 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.6

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
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `titleHead`, `intro`, `description`, `created_at`, `updated_at`) VALUES
(1, 'about honey Luxe', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem\r\n                                    Ipsum has been the industrys standard dummy text ever since the', '<div class=\"row\">\r\n                        <div class=\"col-lg-12\">\r\n                            <div class=\"text-content\">\r\n                                <p>Lorem Ipsum is simply dummy text of \r\nthe printing and typesetting industry. Lorem Ipsum has been the \r\nindustry\'s standard dummy text ever since the 1500s, when an unknown \r\nprinter took a galley of type and scrambled it to make a type specimen \r\nbook. It has survived not only five centuries, but also the leap into \r\nelectronic typesetting, remaining essentially unchanged. It was \r\npopularised in the 1960s with the release of Letraset sheets containing \r\nLorem Ipsum passages, and more recently with desktop publishing software\r\n like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n                                <p>Contrary to popular belief, Lorem \r\nIpsum is not simply random text. It has roots in a piece of classical \r\nLatin literature from 45 BC, making it over 2000 years old. Richard \r\nMcClintock, a Latin professor at Hampden-Sydney College in Virginia, \r\nlooked up one of the more obscure Latin words, consectetur, from a Lorem\r\n Ipsum passage, and going through the cites of the word in classical \r\nliterature, discovered the undoubtable source. Lorem Ipsum comes from \r\nsections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The \r\nExtremes of Good and Evil) by Cicero, written in 45 BC.</p> This book is\r\n a treatise on the theory of ethics, very popular during the \r\nRenaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit \r\namet..\", comes from a line in section 1.10.32.\r\n                                <p>The standard chunk of Lorem Ipsum \r\nused since the 1500s is reproduced below for those interested. Sections \r\n1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are \r\nalso reproduced in their exact original form, accompanied by English \r\nversions from the 1914 translation by H. Rackham.</p>\r\n                            </div>\r\n                        </div>\r\n                    </div>', NULL, '2020-08-28 05:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `become_escorts`
--

CREATE TABLE `become_escorts` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
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
(3, 1, 'fsdfs', 'fsdfsdf', '91597407969.png', '2020-08-14 06:26:09', '2020-08-14 06:26:09'),
(4, 1, '323sdsadsad', 'dasdasdas', '91597415848.png', '2020-08-14 08:37:28', '2020-08-14 08:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `imageurl` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `status`, `title`, `description`, `imageurl`, `created_at`, `updated_at`) VALUES
(1, 1, 'fsdfs', 'dfsdfsd 1', '91597376341.png', '2020-08-13 21:39:01', '2020-08-27 03:03:26'),
(2, 1, 'yg', 'utytu', '91597477301.png', '2020-08-13 22:03:40', '2020-08-15 01:41:41'),
(3, 1, 'fsdfs', 'fsdfsdf', '91597407969.png', '2020-08-14 06:26:09', '2020-08-14 06:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `business_etiquetes`
--

CREATE TABLE `business_etiquetes` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
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
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_question_etiquetes`
--

INSERT INTO `business_question_etiquetes` (`id`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, '<p>This is list</p>', '2020-08-13 21:39:01', '2020-08-15 00:53:09'),
(2, 1, 'utytu', '2020-08-13 22:03:40', '2020-08-13 22:03:40'),
(3, 1, 'fwerwer', '2020-08-13 22:16:33', '2020-08-13 22:16:33'),
(4, 1, NULL, '2020-08-13 22:16:50', '2020-08-15 01:07:35');

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
(11, 5, 7, 'Raychang', '2020-08-23 19:54:33', '2020-08-23 19:54:33'),
(12, 6, 8, 'Mugal', '2020-08-23 19:55:08', '2020-08-23 19:55:08'),
(15, 9, 11, 'Columbo', '2020-08-27 03:55:08', '2020-08-27 03:55:08'),
(16, 10, 12, 'Montgomery', '2020-08-27 07:04:25', '2020-08-27 07:04:25'),
(17, 11, 13, 'Hong Kong', '2020-08-27 07:23:11', '2020-08-27 07:23:11'),
(18, 5, 14, 'Jaipur', '2020-08-27 07:24:42', '2020-08-27 07:24:42'),
(19, 12, 15, 'Rome', '2020-08-27 07:32:27', '2020-08-27 07:32:27'),
(20, 10, 16, 'Juneau', '2020-08-27 07:34:51', '2020-08-27 07:34:51'),
(21, 10, 17, 'Denver', '2020-08-27 07:35:23', '2020-08-27 07:35:23'),
(22, 10, 18, 'Atlanta', '2020-08-27 07:36:00', '2020-08-27 07:36:00'),
(23, 10, 19, 'Des Moines', '2020-08-27 07:36:24', '2020-08-27 07:36:24'),
(24, 10, 20, 'Jackson', '2020-08-27 07:36:46', '2020-08-27 07:36:46'),
(25, 5, 21, 'Bhavnagar', '2020-08-27 07:37:55', '2020-08-27 07:37:55'),
(26, 5, 22, 'vadodara', '2020-08-27 07:48:58', '2020-08-27 07:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `client_relationships`
--

CREATE TABLE `client_relationships` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
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
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_relation_questions`
--

INSERT INTO `client_relation_questions` (`id`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'wasiyktyjtyjytj', '2020-08-13 21:39:01', '2020-08-15 01:25:18'),
(2, 1, 'utytu', '2020-08-13 22:03:40', '2020-08-13 22:03:40'),
(3, 1, 'fwerwer', '2020-08-13 22:16:33', '2020-08-13 22:16:33'),
(4, 10, 'asdasd', '2020-08-13 22:16:50', '2020-08-13 22:16:50'),
(5, 1, 'dgfdg', '2020-08-14 07:22:31', '2020-08-14 07:22:31'),
(6, 8, '<p>drgtret<br></p>', '2020-08-15 01:21:40', '2020-08-15 01:21:40');

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
(5, 'India', '1598613982.jpg', '2020-08-23 19:53:45', '2020-08-28 05:26:22'),
(6, 'Australia', '1598613945.jpg', '2020-08-23 19:54:50', '2020-08-28 05:25:45'),
(9, 'Sri Lanka', '1598613996.jpg', '2020-08-27 03:54:39', '2020-08-28 05:26:36'),
(10, 'America', '1598614010.jpg', '2020-08-27 07:02:23', '2020-08-28 05:26:50'),
(11, 'China', '1598614020.jpg', '2020-08-27 07:22:34', '2020-08-28 05:27:00'),
(12, 'Italy', '1598614052.jpg', '2020-08-27 07:27:36', '2020-08-28 05:27:32'),
(13, 'UK', '1598614104.jpg', '2020-08-28 05:28:24', '2020-08-28 05:28:24'),
(14, 'Argentina', '1598614116.jpg', '2020-08-28 05:28:36', '2020-08-28 05:28:36');

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
(5, 'American', 4, '2020-08-23 09:16:25', '2020-08-26 01:40:47'),
(6, 'Curvy', 2, '2020-08-23 09:29:40', '2020-08-23 09:29:40'),
(7, 'Red', 1, '2020-08-24 00:23:30', '2020-08-24 00:23:30'),
(8, 'abc', 2, '2020-08-26 01:33:13', '2020-08-26 01:33:13'),
(9, 'xyz', 2, '2020-08-26 01:35:37', '2020-08-26 01:35:37'),
(10, 'Blonde', 5, '2020-08-26 01:40:17', '2020-08-26 01:40:17'),
(11, 'Canadian', 4, '2020-08-26 01:40:28', '2020-08-26 01:40:28'),
(12, 'Australian', 4, '2020-08-27 03:39:54', '2020-08-27 03:39:54'),
(13, 'Brazilian', 4, '2020-08-27 04:20:41', '2020-08-27 04:20:41'),
(14, 'Chinese', 4, '2020-08-27 04:21:46', '2020-08-27 04:21:46'),
(15, 'English', 4, '2020-08-27 04:22:05', '2020-08-27 04:22:05'),
(16, 'German', 4, '2020-08-27 04:22:14', '2020-08-27 04:22:14'),
(17, 'Indonesian', 4, '2020-08-27 04:22:32', '2020-08-27 04:22:32'),
(18, 'Italian', 4, '2020-08-27 04:22:43', '2020-08-27 04:22:43'),
(19, 'Lebanese', 4, '2020-08-27 04:23:01', '2020-08-27 04:23:01'),
(20, 'Dutch', 4, '2020-08-27 04:23:20', '2020-08-27 04:23:20'),
(21, 'Portuguese', 4, '2020-08-27 04:23:34', '2020-08-27 04:23:34'),
(22, 'Nigerian', 4, '2020-08-27 04:26:07', '2020-08-27 04:26:07'),
(23, 'Albanian', 4, '2020-08-27 06:50:48', '2020-08-27 06:50:48'),
(24, 'Aragonese', 4, '2020-08-27 06:52:06', '2020-08-27 06:52:06'),
(25, 'Armenian', 4, '2020-08-27 06:52:45', '2020-08-27 06:52:45'),
(26, 'Russian', 4, '2020-08-27 06:53:25', '2020-08-27 06:53:25'),
(27, 'Lithuanian', 4, '2020-08-27 06:53:45', '2020-08-27 06:53:45'),
(28, 'Catalan', 4, '2020-08-27 06:55:39', '2020-08-27 06:55:39'),
(29, 'Hungarian', 4, '2020-08-27 06:56:02', '2020-08-27 06:56:02'),
(30, 'Cornish', 4, '2020-08-27 06:56:23', '2020-08-27 06:56:23'),
(31, 'Corsican', 4, '2020-08-27 06:56:38', '2020-08-27 06:56:38'),
(32, 'Estonian', 3, '2020-08-27 06:57:08', '2020-08-27 06:57:08'),
(33, 'Finnish', 4, '2020-08-27 06:57:21', '2020-08-27 06:57:21'),
(34, 'Galician', 4, '2020-08-27 06:58:21', '2020-08-27 06:58:21'),
(35, 'Greenlandic', 4, '2020-08-27 06:58:43', '2020-08-27 06:58:43'),
(36, 'Hawaiian', 4, '2020-08-27 06:58:54', '2020-08-27 06:59:05'),
(37, 'Hungarian', 4, '2020-08-27 06:59:27', '2020-08-27 06:59:27'),
(38, 'Red', 5, '2020-08-28 08:03:44', '2020-08-28 08:04:34'),
(39, 'golden g', 5, '2020-08-28 19:59:41', '2020-08-28 19:59:41'),
(40, 'blue green', 1, '2020-08-28 19:59:58', '2020-08-28 19:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
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
(3, 1, 'fsdfs', 'fsdfsdf', '91597407969.png', '2020-08-14 06:26:09', '2020-08-14 06:26:09'),
(4, 1, 'cdcd', 'dfdf', '91597408926.png', '2020-08-14 06:42:06', '2020-08-14 06:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `question` text,
  `answer` text,
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
(4, 1, 'gdg', 'dfgdgd', '2020-08-14 06:51:58', '2020-08-14 06:51:58'),
(5, 1, 'fgfty', 'rtyrt', '2020-08-14 06:52:25', '2020-08-14 06:52:25');

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
  `copyrights` text,
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
  `title` text,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `independents`
--

INSERT INTO `independents` (`id`, `icon`, `bgimage`, `topHead`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '11598608307.png', '21598608139.jpg', 'ii', 'kk', '<p>ddddddddddd<br></p>', NULL, '2020-08-28 03:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `local_resources`
--

CREATE TABLE `local_resources` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
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
(3, 1, 'fsdfs', 'fsdfsdf', '91597407969.png', '2020-08-14 06:26:09', '2020-08-14 06:26:09'),
(4, 1, 'erer', 'werwerwer', '91597414552.png', '2020-08-14 08:15:52', '2020-08-14 08:15:52');

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
  `description` text,
  `imageurl` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `our_stories`
--

INSERT INTO `our_stories` (`id`, `status`, `title`, `description`, `imageurl`, `created_at`, `updated_at`) VALUES
(1, 1, 'fsdfs', 'dfsdfsd', '91597474696.jpg', '2020-08-13 21:39:01', '2020-08-15 00:58:16'),
(2, 1, 'yg', 'utytu', '91597377820.png', '2020-08-13 22:03:40', '2020-08-13 22:03:40'),
(3, 1, 'fsdfs', 'fsdfsdf', '91597407969.png', '2020-08-14 06:26:09', '2020-08-14 06:26:09');

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
(1, 'A Platform Built for Professionals', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem\r\n                                    Ipsum has been the industrys standard dummy text ever since the', '11598611768.jpg', '21598611768.jpg', 'read real escort reviews', '11598612427.jpg', 'honey lux news & blog', '21598612427.jpg', 'escort on tour here', '31598612427.jpg', 'escort bloging corner', '41598612427.jpg', 'search escort', '51598612427.jpg', 'clients bloging corner', '61598612427.jpg', 'Business Etiquette', '71598612427.jpg', 'terms & conditions', '81598612427.jpg', 'our story & promise', '91598612427.jpg', NULL, '2020-08-28 05:00:27');

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
(1, 31, 'Sunday', '7:00 AM', '8:00 AM', '2020-08-11 10:01:09', '2020-08-11 10:01:09'),
(2, 39, 'Sunday', '1:00 AM', '1:00 AM', '2020-08-26 05:37:24', '2020-08-26 05:37:24'),
(3, 39, 'Friday', '1:00 AM', '1:00 AM', '2020-08-26 05:37:49', '2020-08-26 05:37:49'),
(4, 42, 'Friday', '4:00 AM', '14:00 PM', '2020-08-28 08:33:36', '2020-08-28 08:33:36'),
(5, 42, 'Sunday', '1:00 AM', '7:00 AM', '2020-08-28 08:41:32', '2020-08-28 08:41:32'),
(6, 42, 'Wednesday', '13:00 PM', '22:00 PM', '2020-08-28 08:41:57', '2020-08-28 08:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `profile_blogs`
--

CREATE TABLE `profile_blogs` (
  `id` int(11) NOT NULL,
  `escortId` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `title` text,
  `image` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_blogs`
--

INSERT INTO `profile_blogs` (`id`, `escortId`, `status`, `title`, `image`, `url`, `created_at`, `updated_at`) VALUES
(1, 30, 1, 'dfwsdf', '91597193570.png', 'sdfsdf', '2020-08-11 18:52:50', '2020-08-11 18:52:50'),
(2, 30, 2, 'decefrf', '91597469376.jpg', 'refefe', '2020-08-14 23:29:36', '2020-08-14 23:29:36'),
(3, 39, 2, 'Wishlist Things from Dev', '91598440529.png', 'google.com', '2020-08-26 05:45:29', '2020-08-26 05:45:29'),
(4, 31, 1, 'test from dev', '91598597292.jpg', 'google.com', '2020-08-26 05:46:30', '2020-08-28 00:48:39'),
(5, 31, 1, 'Lorem Ipsum is simply dummy text of printing and typesetting industry Lorem Ipsum has.', '91598597244.jpg', '#', '2020-08-28 00:47:24', '2020-08-28 00:47:24'),
(6, 31, 2, 'dsaaas', '91598606694.jpg', 'sadas', '2020-08-28 03:24:54', '2020-08-28 03:25:16'),
(7, 31, 2, 'ewf', '91598606753.jpg', 'asda', '2020-08-28 03:25:53', '2020-08-28 03:25:53'),
(8, 31, 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknowninter took a galley of type and scrambled it to make a type specimen book my text of the printing and typesetting industry Lorem Ipsum has been Lorem Ipsum is simply dummy text of the printing and typesetting industry', '91598607411.jpg', 'dsds', '2020-08-28 03:36:51', '2020-08-28 03:36:51'),
(9, 31, 3, 'wwwwewew', '91598607614.jpg', 'ewew', '2020-08-28 03:40:14', '2020-08-28 03:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `profile_descriptions`
--

CREATE TABLE `profile_descriptions` (
  `id` int(11) NOT NULL,
  `escortId` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_descriptions`
--

INSERT INTO `profile_descriptions` (`id`, `escortId`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 31, 1, 'test text message in my profile to check things&nbsp;', '2020-08-11 09:01:19', '2020-08-27 23:00:38'),
(2, 31, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2020-08-11 09:01:42', '2020-08-27 23:04:17'),
(3, 39, 1, '<p>This is a test text in my profile so I can check how it will work with the admin part.</p>', '2020-08-26 05:19:27', '2020-08-26 05:19:27'),
(4, 39, 1, NULL, '2020-08-26 05:20:32', '2020-08-26 05:20:32'),
(5, 39, 1, '<p>Lorem Ipsum is simply dummy text of the printing and</p><p>test message to check front part in the website</p>', '2020-08-26 05:33:42', '2020-08-26 05:33:42'),
(6, 39, 2, '<p>services offered over 50 items&nbsp;</p><p>to check front part in website</p>', '2020-08-26 05:34:28', '2020-08-26 05:34:28'),
(7, 40, 1, '<p>test text from admin to show in front part</p><p>which is not working from here and we need to fix this ASAP so we can show this to our client</p>', '2020-08-26 12:11:30', '2020-08-26 12:11:30'),
(8, 40, 2, '<p>there are 10 services which can be listed here&nbsp;</p><ul><li>test</li><li>test</li><li>test</li><li>test</li><li>test</li></ul>', '2020-08-26 12:13:38', '2020-08-26 12:13:38'),
(9, 40, 5, '<p>to show my favourite things over here lets make a list of it so we can see in the front part</p>', '2020-08-26 12:15:07', '2020-08-26 12:15:07'),
(10, 31, 3, '<p>fgegrfregerg<br></p>', '2020-08-27 23:24:57', '2020-08-27 23:24:57'),
(11, 42, 1, '<p>test message from admin to show details in front&nbsp;</p>', '2020-08-28 08:27:52', '2020-08-28 08:27:52'),
(12, 42, 1, '<p>to add more content you can type here and it will come in front side so you can check more information about the escort and from here you can modify / delete below you can see whole table of it and click on save button&nbsp;</p>', '2020-08-28 08:29:47', '2020-08-28 08:29:47');

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
(1, 30, 2, '91597120618.gif', 'dswdewqwe', '2020-08-10 22:36:58', '2020-08-10 22:36:58'),
(2, 31, 1, '91597120820.png', 'ertert', '2020-08-10 22:40:20', '2020-08-10 22:40:20'),
(3, 31, 1, '91597121405.jpg', 'rterte', '2020-08-10 22:50:05', '2020-08-10 22:50:05'),
(4, 31, 1, '91597121754.jpg', 'ertetet', '2020-08-10 22:55:54', '2020-08-10 22:55:54'),
(5, 31, 2, '91597122217.jpg', 'ewrw', '2020-08-10 23:03:37', '2020-08-10 23:03:37'),
(7, 31, 3, '91597122382.jpg', '3434', '2020-08-10 23:06:22', '2020-08-10 23:06:22'),
(9, 39, 2, '91598439058.png', 'google.com', '2020-08-26 05:20:58', '2020-08-26 05:21:28'),
(10, 39, 1, '91598439773.jpg', 'google.com', '2020-08-26 05:32:53', '2020-08-26 05:32:53'),
(11, 40, 1, '91598463592.png', 'google.com', '2020-08-26 12:09:52', '2020-08-26 12:09:52'),
(12, 40, 2, '91598463632.png', 'google.com', '2020-08-26 12:10:32', '2020-08-26 12:10:32'),
(14, 31, 4, '91598590309.jpg', 'asd', '2020-08-27 22:51:49', '2020-08-27 22:51:49'),
(15, 31, 4, '91598590335.jpg', 'https://www.youtube.com/kON1O_GsbdI', '2020-08-27 22:52:15', '2020-08-27 22:52:15'),
(16, 31, 4, '91598590371.jpg', NULL, '2020-08-27 22:52:51', '2020-08-27 22:52:51'),
(17, 31, 4, '91598590397.jpg', NULL, '2020-08-27 22:53:17', '2020-08-27 22:53:17'),
(18, 31, 2, '91598590436.jpg', NULL, '2020-08-27 22:53:56', '2020-08-27 22:53:56'),
(19, 42, 2, '91598622952.jpg', NULL, '2020-08-28 08:25:52', '2020-08-28 08:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `profile_lists`
--

CREATE TABLE `profile_lists` (
  `id` int(11) NOT NULL,
  `escortId` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_lists`
--

INSERT INTO `profile_lists` (`id`, `escortId`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 31, 2, 'sdcdscdscsdc', '2020-08-11 09:01:19', '2020-08-28 00:03:37'),
(2, 31, 2, 'cdfvcdfvdfvdf', '2020-08-11 09:01:42', '2020-08-11 09:01:42'),
(3, 31, 3, 'rterterterter', '2020-08-11 09:12:34', '2020-08-28 00:06:49'),
(4, 39, 1, '<p><span style=\"font-size: 1rem;\">services offered over 50 items&nbsp;</span></p><p>to check front part in website</p>', '2020-08-26 05:35:21', '2020-08-26 05:35:21'),
(5, 31, 4, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>', '2020-08-28 00:19:07', '2020-08-28 00:19:07'),
(6, 42, 2, '<p>more data in this section</p>', '2020-08-28 08:32:21', '2020-08-28 08:32:21'),
(7, 31, 2, '<p>11</p>', '2020-08-28 09:18:46', '2020-08-28 09:18:46');

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
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_rates`
--

INSERT INTO `profile_rates` (`id`, `escortId`, `status`, `time`, `price`, `description`, `created_at`, `updated_at`) VALUES
(3, 31, 1, '12 Hours', '3232', 'wef4ewfrefwerwerwerew', '2020-08-11 09:28:52', '2020-08-28 00:15:38'),
(4, 31, 1, '3 Hours', '500', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2020-08-26 05:36:11', '2020-08-28 00:15:54'),
(5, 31, 2, '1 Hours', '1000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2020-08-26 05:47:32', '2020-08-28 00:16:05'),
(6, 42, 2, '4 Hours', '500', NULL, '2020-08-28 08:33:05', '2020-08-28 08:33:05'),
(7, 42, 1, '3 Hours', '200', NULL, '2020-08-28 08:40:18', '2020-08-28 08:40:18'),
(8, 42, 2, '2 Hours', '1000', NULL, '2020-08-28 08:40:52', '2020-08-28 08:40:52');

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
(1, 1, 1, 'Kolkata', '2020-08-12', '2020-08-13', '2020-08-11 18:28:04', '2020-08-25 10:44:03'),
(2, 39, 2, 'Canberra', '2020-08-28', '2020-08-29', '2020-08-26 05:31:35', '2020-08-26 05:31:35'),
(3, 39, 1, 'Canberra', '2020-08-29', '2020-08-30', '2020-08-26 05:59:19', '2020-08-26 05:59:19'),
(4, 31, 1, 'Canberra', '2020-08-27', '2020-08-29', '2020-08-28 00:38:24', '2020-08-28 00:38:24'),
(5, 31, 2, 'Shiliguri', '2020-08-28', '2020-08-31', '2020-08-28 00:40:41', '2020-08-28 00:40:41'),
(6, 42, 2, 'Mississippi', '2020-08-29', '2020-08-31', '2020-08-28 08:34:15', '2020-08-28 08:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `provider_resources`
--

CREATE TABLE `provider_resources` (
  `id` int(11) NOT NULL,
  `titleHead` varchar(200) DEFAULT NULL,
  `intro` text,
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
(1, 'Service provider resources', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem\r\n                                    Ipsum has been the industrys standard dummy text ever since the', 'Stop sex trafficking', '11598609038.jpg', 'free local resources', '21598609068.jpg', 'purchase marketing material', '31598609038.jpg', 'become an escort', '41598609038.jpg', NULL, '2020-08-28 04:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_marketings`
--

CREATE TABLE `purchase_marketings` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
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
(3, 1, 'fsdfs', 'fsdfsdf', '91597407969.png', '2020-08-14 06:26:09', '2020-08-14 06:26:09'),
(4, 1, 'fsdfsd', 'dsfsdfd', '91597415179.png', '2020-08-14 08:26:19', '2020-08-14 08:26:19');

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
(9, 'covered bj', '2020-08-26 01:36:54', '2020-08-26 01:36:54'),
(10, 'Boyfriend Experience', '2020-08-26 01:37:44', '2020-08-26 01:37:44'),
(11, 'Girlfriend', '2020-08-26 01:38:01', '2020-08-26 01:38:01'),
(12, 'Pornstar Girlfriend', '2020-08-26 01:38:13', '2020-08-26 01:38:13'),
(13, 'Overnight', '2020-08-26 01:38:24', '2020-08-26 01:38:24'),
(14, 'Party Sessions', '2020-08-26 01:38:34', '2020-08-26 01:38:34'),
(15, 'Dinner Dates', '2020-08-26 01:38:44', '2020-08-26 01:38:44'),
(16, 'Couples', '2020-08-26 01:38:52', '2020-08-26 01:38:52'),
(17, 'Anal', '2020-08-26 01:39:01', '2020-08-26 01:39:01'),
(18, 'Boyfriend Experience', '2020-08-26 01:39:12', '2020-08-26 01:39:12'),
(19, 'abc-service', '2020-08-28 08:06:39', '2020-08-28 08:07:00'),
(20, 'Social Dates', '2020-08-28 20:38:26', '2020-08-28 20:38:26');

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
(6, 33, 'kk', '2020-08-24 08:42:09', '2020-08-24 08:42:09'),
(7, 30, 'ff', '2020-08-24 08:42:24', '2020-08-24 08:42:24'),
(8, 30, 'kk', '2020-08-24 08:42:24', '2020-08-24 08:42:24'),
(11, 32, 'covered bj', '2020-08-26 01:44:51', '2020-08-26 01:44:51'),
(12, 32, 'Boyfriend Experience', '2020-08-26 01:44:51', '2020-08-26 01:44:51'),
(13, 32, 'Girlfriend', '2020-08-26 01:44:51', '2020-08-26 01:44:51'),
(14, 32, 'Party Sessions', '2020-08-26 01:44:51', '2020-08-26 01:44:51'),
(15, 32, 'Dinner Dates', '2020-08-26 01:44:51', '2020-08-26 01:44:51'),
(16, 32, 'Anal', '2020-08-26 01:44:51', '2020-08-26 01:44:51'),
(17, 39, 'covered bj', '2020-08-26 02:14:55', '2020-08-26 02:14:55'),
(18, 31, 'Boyfriend Experience', '2020-08-26 02:14:55', '2020-08-27 23:39:55'),
(19, 39, 'Overnight', '2020-08-26 02:14:55', '2020-08-26 02:14:55'),
(20, 42, 'Party Sessions', '2020-08-26 02:14:55', '2020-08-28 20:39:06'),
(21, 39, 'Anal', '2020-08-26 02:14:55', '2020-08-26 02:14:55'),
(22, 31, 'Girlfriend', '2020-08-27 23:42:20', '2020-08-27 23:42:20'),
(23, 31, 'Pornstar Girlfriend', '2020-08-27 23:42:34', '2020-08-27 23:42:34'),
(24, 31, 'Overnight', '2020-08-27 23:42:34', '2020-08-27 23:42:34'),
(25, 31, 'Party Sessions', '2020-08-27 23:42:34', '2020-08-27 23:42:34'),
(26, 31, 'Dinner Dates', '2020-08-27 23:42:34', '2020-08-27 23:42:34'),
(27, 31, 'Couples', '2020-08-27 23:42:34', '2020-08-27 23:42:34'),
(28, 31, 'Anal', '2020-08-27 23:42:34', '2020-08-27 23:42:34'),
(29, 31, 'Boyfriend Experience', '2020-08-27 23:42:34', '2020-08-27 23:42:34'),
(30, 40, 'Pornstar Girlfriend', '2020-08-28 08:07:49', '2020-08-28 08:07:49'),
(31, 40, 'Overnight', '2020-08-28 08:07:49', '2020-08-28 08:07:49'),
(32, 40, 'Party Sessions', '2020-08-28 08:07:49', '2020-08-28 08:07:49'),
(33, 40, 'Boyfriend Experience', '2020-08-28 08:08:41', '2020-08-28 08:08:41'),
(34, 40, 'Girlfriend', '2020-08-28 08:08:41', '2020-08-28 08:08:41'),
(35, 40, 'Dinner Dates', '2020-08-28 08:08:41', '2020-08-28 08:08:41'),
(37, 42, 'Boyfriend Experience', '2020-08-28 08:35:36', '2020-08-28 08:35:36'),
(38, 42, 'Boyfriend Experience', '2020-08-28 08:35:36', '2020-08-28 08:35:36'),
(39, 42, 'abc-service', '2020-08-28 08:35:36', '2020-08-28 08:35:36'),
(40, 42, 'Girlfriend', '2020-08-28 08:37:31', '2020-08-28 08:37:31'),
(41, 42, 'Pornstar Girlfriend', '2020-08-28 08:37:31', '2020-08-28 08:37:31'),
(42, 42, 'Overnight', '2020-08-28 08:37:31', '2020-08-28 08:37:31'),
(43, 42, 'Dinner Dates', '2020-08-28 08:37:31', '2020-08-28 08:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `sex_traffickings`
--

CREATE TABLE `sex_traffickings` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
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
(5, 1, 'gdfgd', 'fgdfgdfg', '91597414423.png', '2020-08-14 08:13:43', '2020-08-14 08:13:43'),
(6, 1, 'sdfdsf', 'dsfsdfsdf', '91597414501.png', '2020-08-14 08:15:01', '2020-08-14 08:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `description` text,
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
(1, 1, 'dddd', NULL, '11598664328.gif', NULL, NULL, '2020-07-24 05:55:07', '2020-08-28 19:55:28'),
(2, 1, 'fdsfdsfsd', 'fsfsd', '11598372164.jpg', NULL, NULL, '2020-07-24 05:56:36', '2020-08-25 10:46:04'),
(3, 1, 'sds', 'dsdsd', '1595598253.PNG', '21598366472.jpg', NULL, '2020-07-24 07:44:13', '2020-08-25 09:11:12'),
(5, 1, 'dsds', 'dsdsdsd', '11595776856.jpg', '21595776856.jpg', '31595776856.jpg', '2020-07-26 09:20:56', '2020-07-26 09:20:56'),
(6, 1, 'test-image', 'to check working', '11598426545.png', NULL, NULL, '2020-08-26 01:51:43', '2020-08-26 01:52:25'),
(7, 2, 'escort-banner', NULL, '11598614752.jpg', '21598614752.jpg', '31598614752.jpg', '2020-08-26 01:57:37', '2020-08-28 05:39:12'),
(8, 1, 'cdscsd', 'cdscds', '11598588228.jpg', '21598588228.jpg', '31598588228.jpg', '2020-08-26 02:01:48', '2020-08-27 22:17:08'),
(9, 2, 'test-cities', NULL, '11598615965.jpg', '21598615965.jpg', '31598616001.jpg', '2020-08-26 02:04:12', '2020-08-28 06:00:01');

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
(7, 5, 'Gujrat', '2020-08-23 19:54:24', '2020-08-23 19:54:24'),
(8, 6, 'Canberra', '2020-08-23 19:54:58', '2020-08-23 19:54:58'),
(11, 9, 'ABC', '2020-08-27 03:54:57', '2020-08-27 03:54:57'),
(12, 10, 'Alabama', '2020-08-27 07:03:09', '2020-08-27 07:03:09'),
(13, 11, 'Sovereign', '2020-08-27 07:22:57', '2020-08-27 07:22:57'),
(14, 5, 'Rajasthan', '2020-08-27 07:24:09', '2020-08-27 07:24:09'),
(15, 12, 'Lazio', '2020-08-27 07:30:27', '2020-08-27 07:32:12'),
(16, 10, 'Alaska', '2020-08-27 07:34:30', '2020-08-27 07:34:30'),
(17, 10, 'Colorado', '2020-08-27 07:35:05', '2020-08-27 07:35:05'),
(18, 10, 'Georgia', '2020-08-27 07:35:52', '2020-08-27 07:35:52'),
(19, 10, 'new york', '2020-08-27 07:36:15', '2020-08-28 20:30:03'),
(20, 10, 'Mississippi', '2020-08-27 07:36:36', '2020-08-27 07:36:36'),
(21, 5, 'Gujarat', '2020-08-27 07:37:10', '2020-08-27 07:37:10'),
(22, 5, 'Gujarat', '2020-08-27 07:48:36', '2020-08-27 07:48:36'),
(23, 5, 'Paris', '2020-08-28 19:44:57', '2020-08-28 19:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
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
(5, 2, 'gergergerger', '<p>gregergerger<br></p>', '91597472288.jpg', '2020-08-15 00:18:08', '2020-08-15 00:18:08'),
(6, 1, 'gregr', '<p><b>ergtertregter</b><br></p>', '91597472528.jpg', '2020-08-15 00:22:08', '2020-08-15 00:22:08'),
(7, 1, 'rwerwer', '<p>3rew<br></p>', '91597473404.jpg', '2020-08-15 00:28:57', '2020-08-15 00:36:44');

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
(30, 'Hisika Darlin', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 18, 5, 2, 3, 8, 1, 1, ', , , , , , , , , , , , , , ', '3232', '323', 323, 1, '2121', 2, '5', '8', '8', '456', '1595597468.jpg', 'wdd@gmail.com', NULL, '$2y$10$pUuLc8pc9EzyCDZrvT1AoeIhYrsrlQkCmyJj5msSr79mRB3rIGzJ2', NULL, '2020-07-24 01:21:34', '2020-08-27 03:02:58'),
(31, 'Roses Chameli', 1, 1, 'https://www.whatsapp.com/', 'https://www.snapchat.com/', 'https://www.instagram.com/?hl=en', 'https://www.instagram.com/?hl=en', 'mailto:roses@gmail.com', 'http://alakmalak.com/', 'Straight', 4, 'Hot', 'Personality', 'Dog', 'Wine', 'Pizza', 'Agency', 18, 5, 32, 7, 6, 1, 1, ', , , , , , , , , , , , , , ', '44', '5.6\"', 345, 1, '8089788787', 2, NULL, NULL, '7', '345', '1595597497.jpg', 'roses@gmail.com', NULL, '$2y$10$jnFxXldpwpCzyZsxmeTd.OBq9Ey9vmz/EmEIYxv/t65l3U1G18Y.W', NULL, '2020-07-24 01:36:38', '2020-08-27 21:46:43'),
(32, 'DDDFF', 1, 1, 'sdfsd', 'sdfsd', 'dsfsd', 'fsdf', 'sdf', 'sdfs', 'fsdf', 1, 'fsdf', 'sdfdsf', 'fsdf', 'fsdfs', 'sfsdf', 'sdfsd', 18, 1, 1, 1, 1, NULL, NULL, NULL, '44', '44', 44, 1, '2434', 2, '1', '3', '7', '344', '1595600117.jpg', 'fff@gmail.com', NULL, '$2y$10$xoRK6uLUh8FAIObfx8xzxO0j6C1aCChFluZlGFn.gV7nOhvH1Qrdm', NULL, '2020-07-24 08:15:17', '2020-08-10 22:06:16'),
(33, 'dsfsf', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 454, 1, '343', 2, '2', '3', '7', '2333', '1595600238.jpg', 'fgf@gmail.com', NULL, '$2y$10$CKUsGdBoBIJAHqxEzKwW3eRAG5k7ZcBWDQY2i9TBht1NYsWlqaHHe', NULL, '2020-07-24 08:17:18', '2020-07-24 08:17:18'),
(34, 'hfghfh', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 5665, 1, '4545', 2, '2', '4', '8', '5444', '1595600461.jpg', 'fdgdf@gmail.com', NULL, '$2y$10$GkE85F5FvAZB4lzJQwR3w.6TCQgHXWXe37uQezuXeKfWA5oc/3WYm', NULL, '2020-07-24 08:21:01', '2020-07-24 08:21:01'),
(35, 'fdsfsdf', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 3434, 1, '3434', 2, '2', '4', '7', '444', '1595600516.jpg', 'dsfsdf@gmail.com', NULL, '$2y$10$Cd0/OlHeWwl7eGaBxv6fj.X4hw71HKKql8rTvDnlI0G.tcua/3/Ma', NULL, '2020-07-24 08:21:56', '2020-07-24 08:21:56'),
(36, 'rerwer', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, 1, 1, 1, NULL, NULL, NULL, NULL, '323', 344, 1, '4343', 2, '2', '4', '7', '345', '1595600580.jpg', 'wwd@gmail.com', NULL, '$2y$10$.c4qXeZkSxko/1wC3d66BuAixj/fWjRsoVFTYonyIgNRsXGYcgfd6', NULL, '2020-07-24 08:23:00', '2020-07-24 08:23:00'),
(37, 'rerer', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, 1, 1, 1, NULL, NULL, NULL, NULL, '346', 345, 1, '2424', 2, '2', '4', '7', '4322', '1595600607.jpg', 'yyid@gmail.com', NULL, '$2y$10$CQNHR/zfIa17cPBoNQTVC.2M2ykOFfTn4naYGtSI4iNypBgVa0cxW', NULL, '2020-07-24 08:23:27', '2020-07-24 08:23:27'),
(38, 'Riksi', 1, 1, 'df', 'dfd', 'fd', 'fd', 'removed by admin', 'fdfdfd', 'fdfd', 10, 'dd', NULL, NULL, NULL, NULL, NULL, 18, 1, 1, 1, 1, 1, 1, ', , , , , , , , , , , , , , ', NULL, NULL, NULL, 1, '323', 2, NULL, NULL, '6', '2323', '1598613383.jpg', 'riksi@fdf.df', NULL, '$2y$10$hUt6viG/oaV1XksRJIRMV.S58vO0NXaWOjDOdYNah3UY0cjn8l/Wy', NULL, '2020-08-23 09:30:27', '2020-08-28 20:36:51'),
(39, 'test dev', 1, 1, 'google.com', 'google.com', 'instagram.com', NULL, NULL, NULL, 'Straight', 4, NULL, 'ABC', 'ABC', 'Martini', 'Seafood', 'NA', 18, 11, 2, 7, 9, 1, 1, ', , , , , , , , , , , , , , ', 'Black', '180', 200, 1, '123', 2, NULL, NULL, '11', '022222', '1598613419.jpg', 'pablo@alakmalak.com', NULL, '$2y$10$zP1f5SEmnDzcd0/FiJpVU.DlfskGSMhMD7YmFovnPjjS8jg56m7zq', NULL, '2020-08-26 01:42:40', '2020-08-28 05:16:59'),
(40, 'Pablo Test', 1, 1, 'google.com', 'google.com', 'google.com', 'google.com', 'google.com', 'google.com', 'Straight', 10, NULL, NULL, NULL, 'Martini', 'Sea Food', NULL, 18, 5, 2, 7, 8, 1, 1, ', , , , , , , , , , , , , , ', 'Black', '180', 2000, 1, '1234567890', 2, NULL, NULL, '11', '123456', '1598613446.jpg', 'pablo@alakmalak.net', NULL, '$2y$10$pL1WC5lQWVc3YAdLjxJZ6.b1el0GsOQ1935Tb10bHRBvJYrIwDkTS', NULL, '2020-08-26 12:06:55', '2020-08-28 05:17:26'),
(41, 'dsdfssdf', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 18, 5, 2, 1, 6, 1, 1, ', , , , , , , , , , , , , , ', NULL, NULL, NULL, 1, '3423', 2, NULL, NULL, '20', '1232', '1598613467.jpg', '324324', NULL, '$2y$10$f1gho7cN1PeGlOBI.ab2W.JFH5wTz4GOdRgUWTbWAmRUdSWiatJhq', NULL, '2020-08-28 05:15:51', '2020-08-28 05:17:48'),
(42, 'Dev Test', 1, 2, 'google.com', 'google.com', 'google.com', 'google.com', 'test@gmail.com', 'google.com', 'Straight', 38, NULL, 'XYZ', NULL, 'Martini', 'Sea Food', NULL, 22, 15, 2, 3, 8, 2, 1, ', , , , , , , , , , , , , , ', 'Black', '180', 500, 1, '1234567890', 2, '5', '14', '18', '123456', '1598622328.jpg', 'test@gmail.com', NULL, '$2y$10$4w/fSU5gTWjQwJRpeX8DJ.w4S60sayQRmAxR5F4osJGM1L6IBgIea', NULL, '2020-08-28 08:15:28', '2020-08-28 08:15:28');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_question_etiquetes`
--
ALTER TABLE `business_question_etiquetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `escort_dropdowns`
--
ALTER TABLE `escort_dropdowns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile_blogs`
--
ALTER TABLE `profile_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profile_descriptions`
--
ALTER TABLE `profile_descriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profile_images`
--
ALTER TABLE `profile_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `profile_lists`
--
ALTER TABLE `profile_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profile_rates`
--
ALTER TABLE `profile_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profile_tours`
--
ALTER TABLE `profile_tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `service_offer_assigns`
--
ALTER TABLE `service_offer_assigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `sex_traffickings`
--
ALTER TABLE `sex_traffickings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
