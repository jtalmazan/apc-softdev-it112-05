-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2015 at 04:34 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `softdev_almazan_jeffbryan_ourspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `myaddress`
--

CREATE TABLE IF NOT EXISTS `myaddress` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `home_address` varchar(50) DEFAULT NULL,
  `landline` varchar(20) DEFAULT NULL,
  `cellphone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `myaddress`
--

INSERT INTO `myaddress` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `created_at`, `home_address`, `landline`, `cellphone`) VALUES
(1, 'Jeff', 'Talatagod', 'Almazan', 'M', '0000-00-00 00:00:00', 'Annex 35', '5051735', '09067554495');

-- --------------------------------------------------------

--
-- Table structure for table `mycomment`
--

CREATE TABLE IF NOT EXISTS `mycomment` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `myaddress_id` int(25) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mycomment`
--

INSERT INTO `mycomment` (`id`, `myaddress_id`, `author`, `body`, `created_at`) VALUES
(1, 1, 'Jacob Black', 'What''s up people', '0000-00-00 00:00:00.000000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
