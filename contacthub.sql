-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 28, 2024 at 07:08 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contacthub`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstName`, `lastName`, `email`, `phone`, `message`) VALUES
(68, 'William', 'Miller', 'william.miller@example.com', '3216540987', 'Sample message 8'),
(69, 'Sophia', 'Anderson', 'sophia.anderson@example.com', '9870123456', 'Sample message 9'),
(70, 'Daniel', 'Moore', 'daniel.moore@example.com', '6543210987', 'Sample message 10'),
(66, 'Michael', 'Brown', 'michael.brown@example.com', '7894561230', 'Sample message 6'),
(67, 'Olivia', 'Taylor', 'olivia.taylor@example.com', '4567890123', 'Sample message 7'),
(65, 'Eva', 'Davis', 'eva.davis@example.com', '1239874560', 'Sample message 5'),
(64, 'Bob', 'Williams', 'bob.williams@example.com', '4447890123', 'Sample message 4'),
(63, 'Alice', 'Johnson', 'alice.johnson@example.com', '5551234567', 'Sample message 3'),
(62, 'Jane', 'Smith', 'jane.smith@example.com', '9876543210', 'Sample message 2'),
(61, 'John', 'Doe', 'john.doe@example.com', '1234567890', 'Sample message 1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
