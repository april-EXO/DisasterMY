-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 15, 2022 at 09:28 PM
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
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pendingreport`
--

INSERT INTO `pendingreport` (`id`, `type`, `latitude`, `longitude`, `location`, `date`, `time`, `message`, `created_at`, `updated_at`) VALUES
(1, 'flood', '3.04480000000000000000', '101.79280900000000000000', 'Sungai Long', '2022-08-01', '14:12:21', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'landslide', '5.47024000000000000000', '100.54161800000000000000', 'Lunas', '2022-08-02', '14:14:16', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'earthquake', '6.07505281403880500000', '116.55870795661053000000', 'gunung kinabalu', '2022-08-04', '03:55:00', NULL, '2022-08-15 10:55:30', '2022-08-15 10:55:30'),
(4, 'landslide', '3.78838073773767330000', '101.85493469238283000000', 'raub', '2022-08-02', '08:57:00', NULL, '2022-08-15 12:58:15', '2022-08-15 12:58:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
