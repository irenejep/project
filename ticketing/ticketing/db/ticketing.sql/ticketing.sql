-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2016 at 03:57 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(22) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `fname`, `lname`, `username`, `password`, `type`) VALUES
(12, 'dan', 'dan', 'dan', 'dan', 'Administrator'),
(13, 'accounts', 'accounts', 'accounts', 'accounts', 'Accounting'),
(8, 'Caro', 'rael', 'admin', 'admin', 'Administrator'),
(14, 'vin', 'vin', 'vin', 'vin', 'Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `name`, `email`, `phone`, `message`) VALUES
(3, 'benjamin kipruto', 'steclah@yahoo.com', 0, 'nnnn'),
(8, 'benjamin kipruto', 'gladysjerop6@gmail.com', 712333222, 'awsome');

-- --------------------------------------------------------

--
-- Table structure for table `mpesa`
--

CREATE TABLE IF NOT EXISTS `mpesa` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `paybill` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `transno` varchar(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mpesa`
--

INSERT INTO `mpesa` (`ID`, `paybill`, `phone`, `transno`, `amount`) VALUES
(4, 900800, 719619092, 'RVRE2UKVXI', 2500),
(5, 988777, 718999000, 'Y0XUK8CKEA', 800),
(6, 952122, 712334555, '358FSHR97J', 5000),
(7, 868686, 711222333, '9ZTZPSD5CY', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `sold_outs`
--

CREATE TABLE IF NOT EXISTS `sold_outs` (
  `tID` int(11) NOT NULL,
  `fname` varchar(12) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `no_of_tickets` int(11) NOT NULL,
  `mpesa_transaction_no` varchar(11) NOT NULL,
  `image` varchar(30) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`tID`),
  UNIQUE KEY `tID` (`tID`),
  UNIQUE KEY `mpesa_transaction_no` (`mpesa_transaction_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sold_outs`
--

INSERT INTO `sold_outs` (`tID`, `fname`, `lname`, `email`, `phone`, `no_of_tickets`, `mpesa_transaction_no`, `image`, `title`, `description`) VALUES
(1, 'Vincent', 'Chebon', 'gladysjerop6@gmail.com', 719619092, 1, 'RVRE2UKVXI', 'uploads/phone.png', 'Phone New', 'Venue: Safaricom Center, Time: 9:00 a.m - till late ; All are welcomed'),
(9, 'Vincent', 'Chebon', 'steclah@yahoo.com', 718999000, 2, 'Y0XUK8CKEA', 'uploads/ticket3.png', 'Hollywood bah', 'VENUE: hollywood; TIME: 9:00 - TILL DAWN'),
(10, 'Vincent', 'Chebon', 'steclah@yahoo.com', 711222333, 1, '9ZTZPSD5CY', 'uploads/ticket2.png', 'Testin Ticket', 'Venue: Mombasa Road Street Party, Time: 9:00 - till dawn');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `tID` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `total_no_of_tickets` int(11) NOT NULL,
  PRIMARY KEY (`tID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`tID`, `image`, `title`, `description`, `price`, `total_no_of_tickets`) VALUES
(1, 'uploads/phone.png', 'Phone New', 'Venue: Safaricom Center, Time: 9:00 a.m - till late ; All are welcomed', 1200, 12),
(9, 'uploads/ticket3.png', 'Hollywood bah', 'VENUE: hollywood; TIME: 9:00 - TILL DAWN', 8000, 12),
(10, 'uploads/ticket2.png', 'Testin Ticket', 'Venue: Mombasa Road Street Party, Time: 9:00 - till dawn', 1200, 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
