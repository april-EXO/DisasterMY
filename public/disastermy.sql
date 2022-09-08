-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 08, 2022 at 03:16 AM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disastermy`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvedreport`
--

DROP TABLE IF EXISTS `approvedreport`;
CREATE TABLE IF NOT EXISTS `approvedreport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `latitude` decimal(30,20) NOT NULL,
  `longitude` decimal(30,20) NOT NULL,
  `location` varchar(30) DEFAULT NULL,
  `locatedlatlng` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `message` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendingreport`
--

DROP TABLE IF EXISTS `pendingreport`;
CREATE TABLE IF NOT EXISTS `pendingreport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `latitude` decimal(30,20) NOT NULL,
  `longitude` decimal(30,20) NOT NULL,
  `locatedlatlng` varchar(100) NOT NULL,
  `location` varchar(30) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `message` varchar(50) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pendingreport`
--

INSERT INTO `pendingreport` (`id`, `type`, `latitude`, `longitude`, `locatedlatlng`, `location`, `date`, `time`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'flood', '3.04233610000000000000', '101.78657660000000000000', 'Cheras', NULL, '2022-09-07', NULL, NULL, 'pending', '2022-09-07 10:16:23', '2022-09-07 10:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `reliefwebdata`
--

DROP TABLE IF EXISTS `reliefwebdata`;
CREATE TABLE IF NOT EXISTS `reliefwebdata` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `post_id` int(30) NOT NULL,
  `post_date` varchar(100) NOT NULL,
  `event_type` varchar(100) NOT NULL,
  `event_date` varchar(100) NOT NULL,
  `event_location` varchar(200) NOT NULL,
  `latitude` decimal(30,20) DEFAULT NULL,
  `longitude` decimal(30,20) DEFAULT NULL,
  `source_name` varchar(500) NOT NULL,
  `source_homepage` varchar(500) NOT NULL,
  `post_title` varchar(500) NOT NULL,
  `post_url` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reliefwebdata`
--

INSERT INTO `reliefwebdata` (`id`, `post_id`, `post_date`, `event_type`, `event_date`, `event_location`, `latitude`, `longitude`, `source_name`, `source_homepage`, `post_title`, `post_url`, `created_at`, `updated_at`) VALUES
(1, 3862878, '2022-07-05T05:44:49+00:00', 'Flood', '04 Jul 2022', 'Baling (Kedah) ', '5.65029000000000000000', '100.85678000000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Baling (Kedah) (04 Jul 2022)', 'https://reliefweb.int/node/3862878', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(2, 3853662, '2022-06-06T00:30:31+00:00', 'Flood', '2 Jun 2022', 'Kuala Muda (Kedah) ', '5.58865000000000000000', '100.37260000000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kuala Muda (Kedah) (2 Jun 2022)', 'https://reliefweb.int/node/3853662', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(3, 3851082, '2022-05-27T00:28:17+00:00', 'Flood', '25 May 2022', 'Batang Padang and Mualim (Perak) and Kuala Selangor (Selangor) ', '3.72719000000000000000', '101.51903000000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Batang Padang and Mualim (Perak) and Kuala Selangor (Selangor) (25 May 2022)', 'https://reliefweb.int/node/3851082', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(4, 3847567, '2022-05-17T01:53:48+00:00', 'Flood', '10 May 2022', 'Pahang State (Southeastern Peninsular Malaysia) ', '4.09278000000000000000', '101.27771000000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Pahang State (Southeastern Peninsular Malaysia) (10 May 2022)', 'https://reliefweb.int/node/3847567', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(5, 3829239, '2022-03-21T00:59:07+00:00', 'Flood', '18 Mar 2022', 'Bentong District (Pahang) ', '3.52082000000000000000', '101.91250000000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Bentong District (Pahang) (18 Mar 2022)', 'https://reliefweb.int/node/3829239', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(6, 3826754, '2022-03-14T06:49:48+00:00', 'Landslide', '11 Mar 2022', 'Kuala Lumpur ', '3.13900300000000000000', '101.68685200000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Landslide in Kuala Lumpur (11 Mar 2022)', 'https://reliefweb.int/node/3826754', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(7, 3825138, '2022-03-09T06:25:21+00:00', 'Flood', '7 Mar 2022', 'Kuala Lumpur, Melaka, Negeri Sembilan, and Selangor ', '3.13900300000000000000', '101.68685200000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kuala Lumpur, Melaka, Negeri Sembilan, and Selangor (7 Mar 2022)', 'https://reliefweb.int/node/3825138', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(8, 3821727, '2022-02-28T02:31:05+00:00', 'Flood', '27 Feb 2022', 'Kelantan, Pahang, and Terengganu ', '5.39520000000000000000', '101.99974100000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kelantan, Pahang, and Terengganu (27 Feb 2022)', 'https://reliefweb.int/node/3821727', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(9, 3818212, '2022-02-16T05:16:36+00:00', 'Flood', '15 Feb 2022', 'Raub District (Pahang) and Tongod (Sabah) ', '3.79324000000000000000', '101.85769000000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Raub District (Pahang) and Tongod (Sabah) (15 Feb 2022)', 'https://reliefweb.int/node/3818212', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(10, 3815199, '2022-02-07T03:53:43+00:00', 'Flood', '6 Feb 2022', 'Pitas District (Sabah) ', '6.71234000000000000000', '117.03255000000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Pitas District (Sabah) (6 Feb 2022)', 'https://reliefweb.int/node/3815199', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(11, 3805253, '2022-01-03T06:47:35+00:00', 'Flood', '31 Dec 2021', 'Selangor, Negeri Sembilan, Melaka, Johor, Pahang, Terengganu, and Sabah ', '5.97884000000000000000', '116.07531700000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Selangor, Negeri Sembilan, Melaka, Johor, Pahang, Terengganu, and Sabah (31 Dec 2021)', 'https://reliefweb.int/node/3805253', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(12, 3802591, '2021-12-21T01:43:37+00:00', 'Flood', '20 Dec 2021', 'Peninsular Malaysia ', '3.83394000000000000000', '103.32984200000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Peninsular Malaysia (20 Dec 2021)', 'https://reliefweb.int/node/3802591', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(13, 3802169, '2021-12-20T01:27:40+00:00', 'Flood', '19 Dec 2021', 'Kelantan, Terengganu, Pahang, Melaka, Selangor, Negeri Sembilan, Kuala Lumpur, and Perak ', '5.39520000000000000000', '101.99974100000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kelantan, Terengganu, Pahang, Melaka, Selangor, Negeri Sembilan, Kuala Lumpur, and Perak (19 Dec 2021)', 'https://reliefweb.int/node/3802169', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(14, 3801590, '2021-12-17T06:30:36+00:00', 'Flood', '17 Dec 2021', 'Kelantan and Terengganu (TC Twentynine) ', '5.39520000000000000000', '101.99974100000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kelantan and Terengganu (TC Twentynine) (17 Dec 2021)', 'https://reliefweb.int/node/3801590', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(15, 3799927, '2021-12-13T00:44:04+00:00', 'Flood', '11 Dec 2021', 'Kota Marudu and Pitas (Sabah) ', '6.50550000000000000000', '116.74046300000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kota Marudu and Pitas (Sabah) (11 Dec 2021)', 'https://reliefweb.int/node/3799927', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(16, 3798506, '2021-12-08T02:29:25+00:00', 'Flood', '6 Dec 2021', 'Serawak, Kelantan, and Johor ', '3.21095000000000000000', '101.74918400000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Serawak, Kelantan, and Johor (6 Dec 2021)', 'https://reliefweb.int/node/3798506', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(17, 3788516, '2021-11-04T00:21:45+00:00', 'Flood', '1 Nov 2021', 'Perlis, Kedah, Johor, and Melaka ', '6.49225000000000000000', '100.24520900000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Perlis, Kedah, Johor, and Melaka (1 Nov 2021)', 'https://reliefweb.int/node/3788516', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(18, 3786952, '2021-10-29T02:15:44+00:00', 'Flood', '26 Oct 2021', 'Baling and Pendang, Kedah ', '5.65029000000000000000', '100.85678000000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Baling and Pendang, Kedah (26 Oct 2021)', 'https://reliefweb.int/node/3786952', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(19, 3785242, '2021-10-25T01:11:29+00:00', 'Flood', '20 Oct 2021', 'Melaka, Negeri Sembilan, Perak, and Selangor State ', '2.19441800000000000000', '102.24906200000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Melaka, Negeri Sembilan, Perak, and Selangor State (20 Oct 2021)', 'https://reliefweb.int/node/3785242', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(20, 3778906, '2021-10-01T03:07:16+00:00', 'Flood', '1 Oct 2021', 'Perak, Kedah, and Johor ', '4.59211300000000000000', '101.09011100000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Perak, Kedah, and Johor (1 Oct 2021)', 'https://reliefweb.int/node/3778906', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(21, 3778114, '2021-09-29T07:07:40+00:00', 'Flood', '27 Sep 2021', 'Kuala Kangsar (Perak), Baling and Sik (Kedah) ', '4.77241000000000000000', '100.94202000000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kuala Kangsar (Perak), Baling and Sik (Kedah) (27 Sep 2021)', 'https://reliefweb.int/node/3778114', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(22, 3776169, '2021-09-22T05:45:15+00:00', 'Flooding and Landslide', '20 Sep 2021', 'Selangor and Sabah ', '3.07383800000000000000', '101.51834900000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding and Landslide in Selangor and Sabah (20 Sep 2021)', 'https://reliefweb.int/node/3776169', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(23, 3771239, '2021-09-06T03:08:30+00:00', 'Flood', '3 Sep 2021', 'Johor, Sabah, and Sarawak ', '1.48536800000000000000', '103.76181800000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Johor, Sabah, and Sarawak (3 Sep 2021)', 'https://reliefweb.int/node/3771239', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(24, 3767218, '2021-08-22T05:55:03+00:00', 'Flood', '17 Aug 2021', 'Pulau Pinang, Perak, Selangor and Kedah States ', '5.35348000000000000000', '100.36287700000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Pulau Pinang, Perak, Selangor and Kedah States (17 Aug 2021)', 'https://reliefweb.int/node/3767218', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(25, 3756852, '2021-07-16T03:44:52+00:00', 'Flood', '15 Jul 2021', 'Penampang (Sabah), Kuching and Limbang (Sarawak) ', '5.85520000000000000000', '116.05226000000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Penampang (Sabah), Kuching and Limbang (Sarawak) (15 Jul 2021)', 'https://reliefweb.int/node/3756852', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(26, 3756824, '2021-07-12T00:00:00+00:00', 'Flood', '12 Jul 2021', 'Raub, Pahang ', '3.79353200000000000000', '101.85746800000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Raub, Pahang (12 Jul 2021)', 'https://reliefweb.int/node/3756824', '2022-09-07 15:42:32', '2022-09-07 15:42:32'),
(27, 3725293, '2021-03-29T01:57:21+00:00', 'Flood', '23:10 Mar 24 2021', 'Kuantan, Pahang ', '3.76338600000000000000', '103.22018400000000000000', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kuantan, Pahang (23:10 Mar 24 2021)', 'https://reliefweb.int/node/3725293', '2022-09-07 15:42:32', '2022-09-07 15:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin666@gmail.com', NULL, '$2y$10$JRXqH8QYGhXErM0V.MGcL.gG/UJB9d1hQIc4.sznFl3wLwHhZ/VPC', NULL, '2022-09-07 10:41:34', '2022-09-07 10:41:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
