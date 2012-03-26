-- phpMyAdmin SQL Dump
-- version 3.5.0-beta1
-- http://www.phpmyadmin.net
--
-- Host: mysql-shared-02.phpfog.com
-- Generation Time: Mar 22, 2012 at 05:23 PM
-- Server version: 5.5.12-log
-- PHP Version: 5.3.2-1ubuntu4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `opendataapp_phpfogapp_com`
--
CREATE DATABASE `opendataapp_phpfogapp_com` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `opendataapp_phpfogapp_com`;

-- --------------------------------------------------------

--
-- Table structure for table `parks`
--

CREATE TABLE IF NOT EXISTS `parks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `park_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `parks`
--

INSERT INTO `parks` (`id`, `park_name`, `longitude`, `latitude`, `address`) VALUES
(8, 'Bethany Church Community Garden', -75.7734388991705, 45.345499587655, '382 Centrepointe Dr.'),
(9, 'Bytown Urban Gardens (BUGs) CG', -75.6988143060323, 45.4050394322286, '75 Glendale Ave.'),
(10, 'Carlington Community Garden', -75.7346269034471, 45.382842490324, '900 Merivale Rd.'),
(11, 'Centretown Community Garden', -75.7016583295769, 45.415195101353, '461 Lisgar St.'),
(12, 'Chateau Donald Community Garden', -75.6577031103256, 45.4293097723174, '251 Donald St.'),
(13, 'Children''s Garden', -75.6759578122613, 45.406127619525, '321 Main St.'),
(14, 'Debra Dynes Family House Community Garden', -75.7060251774863, 45.3680604451643, '955 Debra Ave.'),
(15, 'Friendship Community Garden', -75.6361507417946, 45.4273895810549, '1240/1244 Donald St.'),
(16, 'Gloucester Allotment Gardens', -75.5676971825545, 45.420592825487, 'N/A Corner of Weir and Anderson'),
(17, 'GO-VEG (Glebe Organic Vegetable Garden) / Corpus-Christi Children''s Garden', -75.6919950762557, 45.4012929697314, '185 Fifth Ave.'),
(18, 'Go Green Community Garden', -75.6893017438533, 45.4210842738369, '110 Laurier Ave.'),
(19, 'Jardin Arrowsmith Thyme-Less Community Garden', -75.5953760439295, 45.4385515707265, '2040 Arrowsmith Drive'),
(20, 'Jardin Communautaire Orleans Community Garden', -75.4989466307579, 45.4837565286994, '3350 St Joseph Blvd.'),
(21, 'Jardin Communautaire Vanier Community Garden', -75.658575092874, 45.4437362531784, '300 des Peres Blancs.'),
(22, 'Kilborn Allotment Garden', -75.6388368817179, 45.3908440878158, '1909/1975 Kilborn Ave.'),
(23, 'Leslie Park Community Garden', -75.7878754564841, 45.3341129371286, '31 Abingdon Dr.'),
(24, 'Lowertown/Basseville Community Garden', -75.6817654861477, 45.4347668377398, '40 Cobourg st.'),
(25, 'Michele Heights Community Garden', -75.800576543261, 45.3552345931046, '2955 Michelle Dr.'),
(26, 'Nanny Goat Hill Community Garden', -75.707485107864, 45.4153043246147, '575/551 Laurier Ave. West'),
(27, 'Nepean Allotment Garden', -75.7180421437094, 45.3465105482307, '230 Viewmont'),
(28, 'Operation Go Home Community Garden', -75.6907938739199, 45.4310697631841, '179 Murray St.'),
(29, 'Ottawa East Community Garden', -75.6755847910067, 45.408059625321, '249/223/175 Main St.'),
(30, 'Rochester Heights Children''s Garden', -75.708440804817, 45.4045126456476, '299 Rochester St.'),
(31, 'Sandy Hill CG', -75.6680134788833, 45.4199458444146, '3 Hurdman Rd.'),
(32, 'Somali CG', -75.639200787966, 45.3895870241171, '1975 Kilborn Ave.'),
(33, 'Strathcona Heights Community Garden', -75.669424051288, 45.4187323045188, '3 Hurdman Rd.'),
(34, 'Sweet Willow Community Garden', -75.7134104370893, 45.4118448361988, '31 Rochester St.'),
(35, 'Van Lang CG', -75.7555660409407, 45.3956959360145, '295 Churchill Ave.'),
(36, 'Viscount Alexander CG', -75.6747042678713, 45.4202733418521, '55 Mann Ave.'),
(37, 'West Barrhaven Community Garden', -75.757698621139, 45.2710350131028, '3058 Jockvale Rd.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
