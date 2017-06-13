-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2017 at 11:58 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojt2monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `companytable`
--

CREATE TABLE `companytable` (
  `cname` varchar(50) NOT NULL,
  `caddress` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companytable`
--

INSERT INTO `companytable` (`cname`, `caddress`) VALUES
('Sitel', 'Baguio City'),
('Sitel', 'Baguio City');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `idnum` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `courseyear` varchar(20) NOT NULL,
  `sample1` varchar(50) NOT NULL,
  `sample2` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`idnum`, `name`, `courseyear`, `sample1`, `sample2`, `status`) VALUES
('21541810', 'Randy Antero', 'BSIT 3', '2017-05-31', 'Sitel', 'Partial'),
('2154188', 'Nathaniel Calimlim', 'BSIT 3', '2017-05-29', 'Philippine military academy', 'Complete'),
('2154187', 'Franchesca Derije', 'BSIT 3', '2017-05-26', 'Tingkersoft', 'Partial'),
('2154186', 'Kenneth Jaramel', 'BSIT 3', '2017-05-31', 'Sitel', 'Partial'),
('21541891', 'James Abalos', 'BSIT 3', '2017-05-30', 'MOOG', 'Incomplete');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
