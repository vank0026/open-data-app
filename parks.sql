-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2012 at 07:52 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vank0026`
--

-- --------------------------------------------------------

--
-- Table structure for table `parks`
--

CREATE TABLE IF NOT EXISTS `parks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `park_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `parks`
--

INSERT INTO `parks` (`id`, `park_name`, `longitude`, `latitude`, `address`) VALUES
(1, 'Andrew Haydon Park', '102', '331', '1025 Steet'),
(2, 'Brewer Park', '103', '322', '625 Avenue'),
(4, 'Britannia Park', '101', '334', '25 Drive'),
(5, 'Confederation Park', '98', '321', '445 Steet'),
(6, 'Dows Lake', '104', '325', '655 Boulevard');
