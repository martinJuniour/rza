-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2026 at 03:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rza`
--
CREATE DATABASE IF NOT EXISTS `rza` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `rza`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customerID` char(36) NOT NULL DEFAULT uuid(),
  `firstName` varchar(40) NOT NULL,
  `lastNAme` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `passcode` varchar(1024) NOT NULL,
  `postalCode` varchar(10) NOT NULL,
  `marketing` enum('yes','no') DEFAULT 'yes',
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `firstName`, `lastNAme`, `username`, `passcode`, `postalCode`, `marketing`, `dateCreated`) VALUES
('12bbdc37-f153-11f0-890e-d8bbc1e9a090', 'Martin Juniour', 'Nyika', 'ben@gmail.com', '$2y$10$gmvdgAn4SmBwz0q30kCtp.H7F.S.JhRvgPM23zuME6CSCm1dfK12u', 'LE10 0AS', 'yes', '2026-01-14 14:12:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
