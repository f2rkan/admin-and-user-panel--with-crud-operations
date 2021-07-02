-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 30, 2014 at 05:39 AM
-- Server version: 5.1.47-community
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usermaintenance`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE IF NOT EXISTS `userdetails` (
  `User_Id` int(11) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Address` text,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email_Id` varchar(50) DEFAULT NULL,
  KEY `User_Id` (`User_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`User_Id`, `Name`, `Address`, `City`, `State`, `Country`, `Phone`, `Email_Id`) VALUES
(13, 'aman', 'ferozepur', 'fzr', 'punjab', 'india', '8149567320', 'samandeepkaur34@gmail.com'),
(14, 'ishwar', 'fategarh sahib', 'fgs', 'punjab', 'india', '9874561230', 'ishwartiwana01@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE IF NOT EXISTS `usermaster` (
  `User_Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `User_Type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`User_Id`, `User_Name`, `Password`, `User_Type`) VALUES
(1, 'admin', 'admin', 'admin'),
(13, 'aman', '368', 'Admin'),
(14, 'ishwarjeet', '303', 'Employee');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
