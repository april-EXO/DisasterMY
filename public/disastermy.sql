-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 07, 2022 at 03:10 AM
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
  `location` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `approvedreport`
--

INSERT INTO `approvedreport` (`id`, `type`, `latitude`, `longitude`, `location`, `date`, `time`, `message`, `created_at`, `updated_at`) VALUES
(1, 'landslide', '4.65857491003160300000', '102.71691112986147000000', 'Kajang', '2022-09-08', '21:54:00', NULL, '2022-09-01 03:44:48', '2022-09-01 03:44:48'),
(2, 'landslide', '3.04233610000000000000', '101.78657660000000000000', 'Kajang', '2022-09-01', '13:45:00', NULL, '2022-09-06 07:43:47', '2022-09-06 07:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `disasterlist`
--

DROP TABLE IF EXISTS `disasterlist`;
CREATE TABLE IF NOT EXISTS `disasterlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `latitude` decimal(30,20) NOT NULL,
  `longitude` decimal(30,20) NOT NULL,
  `location` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disasterlist`
--

INSERT INTO `disasterlist` (`id`, `type`, `latitude`, `longitude`, `location`, `date`, `time`, `message`, `created_at`, `updated_at`) VALUES
(2, 'landslide', '5.47024000000000000000', '100.54161800000000000000', 'Lunas', '2022-08-02', '14:14:16', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `location` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` varchar(50) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pendingreport`
--

INSERT INTO `pendingreport` (`id`, `type`, `latitude`, `longitude`, `location`, `date`, `time`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'landslide', '4.65857491003160300000', '102.71691112986147000000', 'Kajang', '2022-09-08', '21:54:00', NULL, 'approved', '2022-09-01 02:54:50', '2022-09-01 03:44:48'),
(2, 'landslide', '4.69692273403416400000', '101.75589403845196000000', 'Kajang', '2022-09-15', '12:02:00', NULL, 'pending', '2022-09-01 03:02:44', '2022-09-01 03:02:44'),
(4, 'landslide', '3.04233610000000000000', '101.78657660000000000000', 'Kajang', '2022-09-05', '17:28:00', NULL, 'rejected', '2022-09-03 22:26:14', '2022-09-03 22:28:46'),
(5, 'flood', '3.04233610000000000000', '101.78657660000000000000', 'Kajang', '2022-09-01', '17:30:00', NULL, 'pending', '2022-09-03 22:27:59', '2022-09-03 22:27:59'),
(6, 'landslide', '3.04233610000000000000', '101.78657660000000000000', 'Kajang', '2022-09-01', '13:45:00', NULL, 'approved', '2022-09-06 07:43:33', '2022-09-06 07:43:47');

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

INSERT INTO `reliefwebdata` (`id`, `post_id`, `post_date`, `event_type`, `event_date`, `event_location`, `source_name`, `source_homepage`, `post_title`, `post_url`, `created_at`, `updated_at`) VALUES
(1, 3862878, '2022-07-05T05:44:49+00:00', 'Flood', '04 Jul 2022', 'Baling (Kedah) ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Baling (Kedah) (04 Jul 2022)', 'https://reliefweb.int/node/3862878', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(2, 3853662, '2022-06-06T00:30:31+00:00', 'Flood', '2 Jun 2022', 'Kuala Muda (Kedah) ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kuala Muda (Kedah) (2 Jun 2022)', 'https://reliefweb.int/node/3853662', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(3, 3851082, '2022-05-27T00:28:17+00:00', 'Flood', '25 May 2022', 'Batang Padang and Mualim (Perak) and Kuala Selangor (Selangor) ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Batang Padang and Mualim (Perak) and Kuala Selangor (Selangor) (25 May 2022)', 'https://reliefweb.int/node/3851082', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(4, 3847567, '2022-05-17T01:53:48+00:00', 'Flood', '10 May 2022', 'Pahang State (Southeastern Peninsular Malaysia) ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Pahang State (Southeastern Peninsular Malaysia) (10 May 2022)', 'https://reliefweb.int/node/3847567', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(5, 3829239, '2022-03-21T00:59:07+00:00', 'Flood', '18 Mar 2022', 'Bentong District (Pahang) ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Bentong District (Pahang) (18 Mar 2022)', 'https://reliefweb.int/node/3829239', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(6, 3826754, '2022-03-14T06:49:48+00:00', 'Landslide', '11 Mar 2022', 'Kuala Lumpur ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Landslide in Kuala Lumpur (11 Mar 2022)', 'https://reliefweb.int/node/3826754', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(7, 3825138, '2022-03-09T06:25:21+00:00', 'Flood', '7 Mar 2022', 'Kuala Lumpur, Melaka, Negeri Sembilan, and Selangor ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kuala Lumpur, Melaka, Negeri Sembilan, and Selangor (7 Mar 2022)', 'https://reliefweb.int/node/3825138', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(8, 3821727, '2022-02-28T02:31:05+00:00', 'Flood', '27 Feb 2022', 'Kelantan, Pahang, and Terengganu ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kelantan, Pahang, and Terengganu (27 Feb 2022)', 'https://reliefweb.int/node/3821727', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(9, 3818212, '2022-02-16T05:16:36+00:00', 'Flood', '15 Feb 2022', 'Raub District (Pahang) and Tongod (Sabah) ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Raub District (Pahang) and Tongod (Sabah) (15 Feb 2022)', 'https://reliefweb.int/node/3818212', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(10, 3815199, '2022-02-07T03:53:43+00:00', 'Flood', '6 Feb 2022', 'Pitas District (Sabah) ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Pitas District (Sabah) (6 Feb 2022)', 'https://reliefweb.int/node/3815199', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(11, 3805253, '2022-01-03T06:47:35+00:00', 'Flood', '31 Dec 2021', 'Selangor, Negeri Sembilan, Melaka, Johor, Pahang, Terengganu, and Sabah ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Selangor, Negeri Sembilan, Melaka, Johor, Pahang, Terengganu, and Sabah (31 Dec 2021)', 'https://reliefweb.int/node/3805253', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(12, 3802591, '2021-12-21T01:43:37+00:00', 'Flood', '20 Dec 2021', 'Peninsular Malaysia ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Peninsular Malaysia (20 Dec 2021)', 'https://reliefweb.int/node/3802591', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(13, 3802169, '2021-12-20T01:27:40+00:00', 'Flood', '19 Dec 2021', 'Kelantan, Terengganu, Pahang, Melaka, Selangor, Negeri Sembilan, Kuala Lumpur, and Perak ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kelantan, Terengganu, Pahang, Melaka, Selangor, Negeri Sembilan, Kuala Lumpur, and Perak (19 Dec 2021)', 'https://reliefweb.int/node/3802169', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(14, 3801590, '2021-12-17T06:30:36+00:00', 'Flood', '17 Dec 2021', 'Kelantan and Terengganu (TC Twentynine) ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kelantan and Terengganu (TC Twentynine) (17 Dec 2021)', 'https://reliefweb.int/node/3801590', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(15, 3799927, '2021-12-13T00:44:04+00:00', 'Flood', '11 Dec 2021', 'Kota Marudu and Pitas (Sabah) ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kota Marudu and Pitas (Sabah) (11 Dec 2021)', 'https://reliefweb.int/node/3799927', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(16, 3798506, '2021-12-08T02:29:25+00:00', 'Flood', '6 Dec 2021', 'Serawak, Kelantan, and Johor ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Serawak, Kelantan, and Johor (6 Dec 2021)', 'https://reliefweb.int/node/3798506', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(17, 3788516, '2021-11-04T00:21:45+00:00', 'Flood', '1 Nov 2021', 'Perlis, Kedah, Johor, and Melaka ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Perlis, Kedah, Johor, and Melaka (1 Nov 2021)', 'https://reliefweb.int/node/3788516', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(18, 3786952, '2021-10-29T02:15:44+00:00', 'Flood', '26 Oct 2021', 'Baling and Pendang, Kedah ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Baling and Pendang, Kedah (26 Oct 2021)', 'https://reliefweb.int/node/3786952', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(19, 3785242, '2021-10-25T01:11:29+00:00', 'Flood', '20 Oct 2021', 'Melaka, Negeri Sembilan, Perak, and Selangor State ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Melaka, Negeri Sembilan, Perak, and Selangor State (20 Oct 2021)', 'https://reliefweb.int/node/3785242', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(20, 3778906, '2021-10-01T03:07:16+00:00', 'Flood', '1 Oct 2021', 'Perak, Kedah, and Johor ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Perak, Kedah, and Johor (1 Oct 2021)', 'https://reliefweb.int/node/3778906', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(21, 3778114, '2021-09-29T07:07:40+00:00', 'Flood', '27 Sep 2021', 'Kuala Kangsar (Perak), Baling and Sik (Kedah) ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kuala Kangsar (Perak), Baling and Sik (Kedah) (27 Sep 2021)', 'https://reliefweb.int/node/3778114', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(22, 3776169, '2021-09-22T05:45:15+00:00', 'Flooding and Landslide', '20 Sep 2021', 'Selangor and Sabah ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding and Landslide in Selangor and Sabah (20 Sep 2021)', 'https://reliefweb.int/node/3776169', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(23, 3771239, '2021-09-06T03:08:30+00:00', 'Flood', '3 Sep 2021', 'Johor, Sabah, and Sarawak ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Johor, Sabah, and Sarawak (3 Sep 2021)', 'https://reliefweb.int/node/3771239', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(24, 3767218, '2021-08-22T05:55:03+00:00', 'Flood', '17 Aug 2021', 'Pulau Pinang, Perak, Selangor and Kedah States ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Pulau Pinang, Perak, Selangor and Kedah States (17 Aug 2021)', 'https://reliefweb.int/node/3767218', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(25, 3756852, '2021-07-16T03:44:52+00:00', 'Flood', '15 Jul 2021', 'Penampang (Sabah), Kuching and Limbang (Sarawak) ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Penampang (Sabah), Kuching and Limbang (Sarawak) (15 Jul 2021)', 'https://reliefweb.int/node/3756852', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(26, 3756824, '2021-07-12T00:00:00+00:00', 'Flood', '12 Jul 2021', 'Raub, Pahang ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Raub, Pahang (12 Jul 2021)', 'https://reliefweb.int/node/3756824', '2022-09-06 08:32:41', '2022-09-06 08:32:41'),
(27, 3725293, '2021-03-29T01:57:21+00:00', 'Flood', '23:10 Mar 24 2021', 'Kuantan, Pahang ', 'ASEAN Coordinating Centre for Humanitarian Assistance', 'http://www.ahacentre.org/', 'Malaysia, Flooding in Kuantan, Pahang (23:10 Mar 24 2021)', 'https://reliefweb.int/node/3725293', '2022-09-06 08:32:41', '2022-09-06 08:32:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
