-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2017 at 03:51 AM
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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `idnum` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `courseyear` varchar(20) NOT NULL,
  `date_started` date NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `typeofojt` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`idnum`, `name`, `courseyear`, `date_started`, `company_name`, `typeofojt`, `status`) VALUES
('2155958', 'Ismael Langit', 'BSIT-3', '2017-06-08', 'Trend Micro', 'In-house', 'Incomplete'),
('2156162', 'John Allen Basco', 'BSIT-3', '2017-06-05', 'Texas Instruments', 'Company-based', 'Complete'),
('2152176', 'Faye Cabalse', 'BSIT-4', '2017-06-20', 'IT/CS Department', 'In-house', 'Complete');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
