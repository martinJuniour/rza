-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 26, 2026 at 09:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
('2f98a21e-f75b-11f0-a9f9-2aee09dc0911', 'Martin', 'Nyika', 'juniour.martiin@gmail.com', '$2y$10$yhO/bTi8tGj2qs/Nyd8l1O3Oi5TryjDvbwTa2QL1x3Ox.huoV0yl.', 'LE10 0AS', 'yes', '2026-01-22 06:25:46'),
('8b062902-fa3d-11f0-996b-2aee09dc0910', 'Benjamin', 'Score', 'ben@gmail.com', '$2y$10$DbUpQ.NuY2I7ZPO.cC5LduOtKOqmuV4dDuoWwJ1hzrRexTxEn5V8e', 'LE10 0AS', 'no', '2026-01-25 22:31:08'),
('e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '$2y$10$qo/Sww7DnRkkQHWuDPI.2.qnBSr3lAAb2AnbPN9S8WABJUP4deMgu', 'LE10 0AS', 'yes', '2026-01-18 18:31:26'),
('f8907e8a-f4a4-11f0-a9f9-2aee09dc0911', 'Alwande', 'Mguni', 'alwande@gmail.com', '$2y$10$4rZhv5bH2QHHGnJ9VSn7j.k4jKGY4Cp6mIIKCv3hkIOpSDr5fJbJi', 'Le10 0as', 'no', '2026-01-18 19:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `hotelBookedRooms`
--

DROP TABLE IF EXISTS `hotelBookedRooms`;
CREATE TABLE IF NOT EXISTS `hotelBookedRooms` (
  `hotelBookedRoomID` int(11) NOT NULL AUTO_INCREMENT,
  `bookingID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `bookingStartRange` date NOT NULL,
  `bookingEndRange` date NOT NULL,
  PRIMARY KEY (`hotelBookedRoomID`),
  KEY `fk_bookingIDHotelRooom` (`bookingID`),
  KEY `fk_roomIDIDHotelRooom` (`roomID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelBookedRooms`
--

INSERT INTO `hotelBookedRooms` (`hotelBookedRoomID`, `bookingID`, `roomID`, `bookingStartRange`, `bookingEndRange`) VALUES
(28, 35, 68, '2026-01-24', '2026-01-27'),
(29, 36, 69, '2026-01-29', '2026-02-07'),
(30, 37, 68, '2026-02-26', '2026-03-14'),
(31, 37, 69, '2026-02-26', '2026-03-14'),
(32, 37, 70, '2026-02-26', '2026-03-14'),
(33, 38, 71, '2026-01-25', '2026-01-27'),
(34, 39, 68, '2026-03-21', '2026-04-11'),
(35, 39, 70, '2026-03-21', '2026-04-11'),
(36, 39, 69, '2026-03-21', '2026-04-11'),
(37, 40, 71, '2026-06-27', '2026-07-10'),
(38, 40, 70, '2026-06-27', '2026-07-10'),
(39, 41, 71, '2026-09-19', '2026-10-11'),
(41, 43, 72, '2026-01-23', '2026-01-24'),
(42, 44, 72, '2027-03-25', '2027-03-26'),
(43, 45, 73, '2026-02-05', '2026-03-14'),
(44, 45, 74, '2026-02-05', '2026-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `hotelBookings`
--

DROP TABLE IF EXISTS `hotelBookings`;
CREATE TABLE IF NOT EXISTS `hotelBookings` (
  `bookingID` int(11) NOT NULL AUTO_INCREMENT,
  `customerID` char(36) NOT NULL,
  `bFirstName` varchar(40) NOT NULL,
  `bLastName` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `pricePayed` decimal(10,2) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `visitorQTY` int(3) NOT NULL,
  `tempCheck` varchar(100) DEFAULT NULL,
  `loyalty` decimal(10,0) GENERATED ALWAYS AS (cast(100 * `visitorQTY` / 20.8 as decimal(10,0))) STORED,
  PRIMARY KEY (`bookingID`),
  KEY `fk_customerIDHotel` (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelBookings`
--

INSERT INTO `hotelBookings` (`bookingID`, `customerID`, `bFirstName`, `bLastName`, `email`, `startDate`, `endDate`, `pricePayed`, `createdAt`, `visitorQTY`, `tempCheck`) VALUES
(35, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', '', '', 'lwazi@gmail.com', '2026-01-24', '2026-01-27', 100.00, '2026-01-22 00:11:11', 4, 'c29c389f15f5c992e49954dde2752228873e0f4d2b9f3a342aafc179666598637680'),
(36, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', '', '', 'lwazi@gmail.com', '2026-01-29', '2026-02-07', 100.00, '2026-01-22 00:15:48', 4, 'e4445a3d7901592c356dfde2357ee02bc7495b37e3e2d45c58adc7da27f909c19c4e'),
(37, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', '', '', 'lwazi@gmail.com', '2026-02-26', '2026-03-14', 369.00, '2026-01-22 00:16:48', 3, '0aefb62a9c59086384e54403f552e3bb1af7a2d01a93c882cfbb1fe2843041f5d41e'),
(38, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', '', '', 'lwazi@gmail.com', '2026-01-25', '2026-01-27', 169.00, '2026-01-22 00:17:45', 2, 'c43cc5881a297598b3851d6aa915412b55c0cc594579040944daf7688c0c8309fa8d'),
(39, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', '', '', 'lwazi@gmail.com', '2026-03-21', '2026-04-11', 369.00, '2026-01-22 00:19:23', 1, 'fd701c517423f868c5fc5c82f8634a518930cab1ca3aee1c9368657cdc1fe632d9c5'),
(40, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', '', '', 'lwazi@gmail.com', '2026-06-27', '2026-07-10', 338.00, '2026-01-22 00:21:16', 1, 'f41f64038e44168e8ab0bdcc0e849b5c1af7135a235b27dd967d654d2fc19f99f94c'),
(41, '2f98a21e-f75b-11f0-a9f9-2aee09dc0911', '', '', 'juniour.martiin@gmail.com', '2026-09-19', '2026-10-11', 169.00, '2026-01-22 06:28:41', 1, '8a777990af334c01b999099efbaa2d9966c37324560c265bc2e006471ee643ad2fff'),
(43, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', '', '', 'lwazi@gmail.com', '2026-01-23', '2026-01-24', 100.00, '2026-01-23 07:42:53', 1, '5bad966823447d14c2f1db10e39ba45716bd46ee042e87c90985b53a65faf564862f'),
(44, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', '', '', 'lwazi@gmail.com', '2027-03-25', '2027-03-26', 100.00, '2026-01-23 07:49:55', 1, 'e0af94ce3879fb19baa165edbfa08884e657'),
(45, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', '', '', 'lwazi@gmail.com', '2026-02-05', '2026-03-14', 200.00, '2026-01-25 14:43:34', 1, '430aca2ee7a923047b426a57df787e6e5fad');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `roomID` int(11) NOT NULL AUTO_INCREMENT,
  `roomType` enum('single','double','mixed') NOT NULL,
  `roomAvailability` enum('free','booked') DEFAULT 'free',
  `bookings` int(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`roomID`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomID`, `roomType`, `roomAvailability`, `bookings`) VALUES
(68, 'single', 'booked', 3),
(69, 'single', 'booked', 3),
(70, 'double', 'booked', 3),
(71, 'double', 'booked', 3),
(72, 'single', 'booked', 3),
(73, 'single', 'free', 1),
(74, 'single', 'free', 1),
(75, 'single', 'free', 0),
(76, 'single', 'free', 0),
(77, 'single', 'free', 0),
(78, 'single', 'free', 0),
(79, 'double', 'free', 0),
(80, 'mixed', 'free', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roomTypePrices`
--

DROP TABLE IF EXISTS `roomTypePrices`;
CREATE TABLE IF NOT EXISTS `roomTypePrices` (
  `roomTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `roomType` varchar(40) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  PRIMARY KEY (`roomTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomTypePrices`
--

INSERT INTO `roomTypePrices` (`roomTypeID`, `roomType`, `unitPrice`) VALUES
(1, 'single', 100.00),
(2, 'double', 169.00),
(3, 'mixed', 209.00);

-- --------------------------------------------------------

--
-- Table structure for table `safariTicketBookings`
--

DROP TABLE IF EXISTS `safariTicketBookings`;
CREATE TABLE IF NOT EXISTS `safariTicketBookings` (
  `safariTicketBookingID` int(11) NOT NULL AUTO_INCREMENT,
  `customerTempID` char(36) NOT NULL,
  `ticketQty` int(3) NOT NULL,
  `pricePayed` decimal(10,2) NOT NULL,
  `dateOfVisitation` date NOT NULL,
  `purchaseDate` datetime DEFAULT current_timestamp(),
  `loyalty` decimal(10,0) GENERATED ALWAYS AS (cast(3 * `pricePayed` / 20.8 as decimal(10,0))) STORED,
  PRIMARY KEY (`safariTicketBookingID`),
  KEY `fk_customerTempID` (`customerTempID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `safariTicketBookings`
--

INSERT INTO `safariTicketBookings` (`safariTicketBookingID`, `customerTempID`, `ticketQty`, `pricePayed`, `dateOfVisitation`, `purchaseDate`) VALUES
(32, '4f2e9098-f841-11f0-996b-2aee09dc0910', 4, 107.96, '2026-01-24', '2026-01-23 09:53:03'),
(33, '5f44033c-f841-11f0-996b-2aee09dc0910', 21, 566.79, '2026-01-03', '2026-01-23 09:53:30'),
(34, '51081b36-f85b-11f0-996b-2aee09dc0910', 1, 26.99, '2026-01-25', '2026-01-23 12:59:13'),
(35, '7e0e78f4-f85c-11f0-996b-2aee09dc0910', 4, 107.96, '2026-01-08', '2026-01-23 13:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `tempCustomerSafari`
--

DROP TABLE IF EXISTS `tempCustomerSafari`;
CREATE TABLE IF NOT EXISTS `tempCustomerSafari` (
  `customerTempID` char(36) NOT NULL DEFAULT uuid(),
  `customerID` char(36) DEFAULT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `contact` varchar(40) NOT NULL,
  PRIMARY KEY (`customerTempID`),
  KEY `fk_customerID` (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempCustomerSafari`
--

INSERT INTO `tempCustomerSafari` (`customerTempID`, `customerID`, `firstName`, `lastName`, `contact`) VALUES
('4f2e9098-f841-11f0-996b-2aee09dc0910', 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin', 'Juniour', 'martin@gmail.com'),
('51081b36-f85b-11f0-996b-2aee09dc0910', 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Aaronn', 'Baker', 'martin@gmail.com'),
('5f44033c-f841-11f0-996b-2aee09dc0910', 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Aaliyah', 'Baker', 'juniou@gmial.com'),
('7e0e78f4-f85c-11f0-996b-2aee09dc0910', 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Aaronn', 'Baker', 'juniou@gmial.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotelBookedRooms`
--
ALTER TABLE `hotelBookedRooms`
  ADD CONSTRAINT `fk_bookingIDHotelRooom` FOREIGN KEY (`bookingID`) REFERENCES `hotelBookings` (`bookingID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_roomIDIDHotelRooom` FOREIGN KEY (`roomID`) REFERENCES `rooms` (`roomID`) ON DELETE CASCADE;

--
-- Constraints for table `hotelBookings`
--
ALTER TABLE `hotelBookings`
  ADD CONSTRAINT `fk_customerIDHotel` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`) ON DELETE CASCADE;

--
-- Constraints for table `safariTicketBookings`
--
ALTER TABLE `safariTicketBookings`
  ADD CONSTRAINT `fk_customerTempID` FOREIGN KEY (`customerTempID`) REFERENCES `tempCustomerSafari` (`customerTempID`) ON DELETE CASCADE;

--
-- Constraints for table `tempCustomerSafari`
--
ALTER TABLE `tempCustomerSafari`
  ADD CONSTRAINT `fk_customerID` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
