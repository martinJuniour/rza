-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2026 at 09:21 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelBookedRooms`
--

INSERT INTO `hotelBookedRooms` (`hotelBookedRoomID`, `bookingID`, `roomID`, `bookingStartRange`, `bookingEndRange`) VALUES
(16, 23, 2, '2026-01-21', '2026-02-22'),
(17, 24, 2, '2026-01-23', '2026-02-28');

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
  PRIMARY KEY (`bookingID`),
  KEY `fk_customerIDHotel` (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelBookings`
--

INSERT INTO `hotelBookings` (`bookingID`, `customerID`, `bFirstName`, `bLastName`, `email`, `startDate`, `endDate`, `pricePayed`, `createdAt`, `visitorQTY`, `tempCheck`) VALUES
(1, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '3923-07-31', '2006-07-31', 0.00, '2026-01-19 16:28:38', 0, NULL),
(2, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2006-08-24', '2004-03-21', 0.00, '2026-01-19 16:32:37', 90, NULL),
(3, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2206-07-31', '9203-08-21', 0.00, '2026-01-19 16:45:31', 123, NULL),
(4, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2206-07-31', '9203-08-21', 0.00, '2026-01-19 16:45:42', 123, NULL),
(5, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2206-07-31', '9203-08-21', 0.00, '2026-01-19 16:47:27', 123, '5885f068ef02dd3d2a3b3186ca24510a2b6667305456f7179f7dca0cca4553a047b9'),
(6, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2206-07-31', '9203-08-21', 0.00, '2026-01-19 16:50:31', 123, 'efdb1f17ff94313ca0ee4cbf290e7c2a1ce34005ad0839031cb9a6f096c093bf9ff7'),
(7, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2206-07-31', '9203-08-21', 0.00, '2026-01-19 18:37:05', 123, 'fea816bb94f094e64d9563758daacbd910e20fa9c73bf012d5cebf4ea19e433dea07'),
(8, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2004-07-31', '3222-09-12', 0.00, '2026-01-19 18:43:21', 2, 'b90cd431d87bd08e60f512d7ad8cb241b84be5ebffb45a2482367ad7d5f6ab25388d'),
(9, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2004-07-31', '3222-09-12', 0.00, '2026-01-19 18:43:37', 2, 'db783fb0c482821046307f446f1aad736883655871007cccfe7b1d2633e08d99efe6'),
(10, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2006-07-31', '9013-03-21', 0.00, '2026-01-19 18:44:17', 6, '58fc011d5f44c42e8f7fa3bdc9a165d55364529f501a784959abec3783ae35169db1'),
(11, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '3902-07-31', '2432-03-21', 0.00, '2026-01-19 18:59:45', 3, 'da710494520ac102ce3538df594dbd56cfb39f02a51739ae5c9952b59ac74cfcbf76'),
(12, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2206-07-31', '2006-07-31', 0.00, '2026-01-19 19:12:06', 5, '6a75a93d8a8d87fd2740d1400aaa99f427782c673c7bcf8d036eb828d758fa5753cd'),
(14, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2006-07-31', '2411-08-21', 0.00, '2026-01-19 19:18:44', 6, 'd7b569e3df8cd92b2921a99a24496ffcedc263540c538f0498f880a0855d0637bde9'),
(15, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '1122-12-31', '2302-11-12', 0.00, '2026-01-19 19:20:50', 10, 'e3bc17989aa9def7399fd832b214746a0ca66a36ce79c29ca18c6bd3dac800f4faa3'),
(16, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-22', '2026-01-30', 0.00, '2026-01-19 20:07:20', 1, '8fff9282569b705cffc82d692d62c8dd1e91e1f6fc965eae8c9d669f64ef1f41d0bf'),
(17, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-21', '2026-01-22', 0.00, '2026-01-19 20:26:25', 1, '2150368bb4e650e0c0ddb60d204244948ff847b192bf6e07d4d30b158af45cc37c86'),
(18, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-21', '2026-01-22', 0.00, '2026-01-19 21:28:39', 1, '4491a129730218dd3432244c6daccda2eef83ed4f35b8abcfd141ef2c983a6822491'),
(19, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-20', '2026-01-22', 0.00, '2026-01-20 06:11:58', 2, '9c13bbc21cf37b8c7d5c962654a8965f31e69cb0be7c9b4b552905cff9242190c71e'),
(20, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-20', '2026-01-22', 0.00, '2026-01-20 06:13:33', 2, 'a300914f51b99711d467304cf6ab0c4fb32f60c8ef1e7b0e703983eadbe1ec50161b'),
(21, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-21', '2026-02-21', 0.00, '2026-01-20 06:14:58', 2, 'd70f9ad6a9801c4443e57739eda80d137b68f2b0c324b71b8d5488c512647e1844ba'),
(22, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-21', '2026-02-23', 0.00, '2026-01-20 06:16:48', 2, '6feb1e5c1fefcb7517d761ef8e377f21b97484fac5120cc0f9e7baebd32660253a43'),
(23, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-21', '2026-02-22', 0.00, '2026-01-20 06:39:28', 4, 'b2db80995ae7426be4f20c0d1460bd3addb51fe8b806a35a0bfa4b89ceef60c9b03b'),
(24, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-23', '2026-02-28', 0.00, '2026-01-20 06:40:59', 2, '103b28fa40ca84549c97c825d9d830219515301b77829c5c49a832a883377c906775');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `roomID` int(11) NOT NULL AUTO_INCREMENT,
  `roomType` enum('single','double','mixed') NOT NULL,
  `roomAvailability` enum('free','booked') DEFAULT 'free',
  PRIMARY KEY (`roomID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomID`, `roomType`, `roomAvailability`) VALUES
(1, 'double', 'free'),
(2, 'single', 'booked'),
(3, 'single', 'free'),
(4, 'double', 'free'),
(5, 'mixed', 'free'),
(6, 'mixed', 'free'),
(7, 'double', 'free'),
(8, 'single', 'free'),
(9, 'mixed', 'free'),
(10, 'single', 'free'),
(11, 'double', 'free'),
(12, 'double', 'free'),
(13, 'mixed', 'free'),
(14, 'mixed', 'free'),
(15, 'single', 'free'),
(16, 'mixed', 'free'),
(17, 'double', 'free'),
(18, 'double', 'free'),
(19, 'double', 'free'),
(20, 'mixed', 'free');

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
  PRIMARY KEY (`safariTicketBookingID`),
  KEY `fk_customerTempID` (`customerTempID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `safariTicketBookings`
--

INSERT INTO `safariTicketBookings` (`safariTicketBookingID`, `customerTempID`, `ticketQty`, `pricePayed`, `dateOfVisitation`, `purchaseDate`) VALUES
(24, 'bf278eae-f4ae-11f0-a9f9-2aee09dc0911', 5, 134.95, '2026-01-23', '2026-01-18 20:46:21'),
(25, 'd3cda5e6-f4ae-11f0-a9f9-2aee09dc0911', 5, 134.95, '2026-01-23', '2026-01-18 20:46:56'),
(26, 'dde8ce34-f4ae-11f0-a9f9-2aee09dc0911', 2, 53.98, '2026-01-23', '2026-01-18 20:47:13'),
(27, 'ff846080-f4ae-11f0-a9f9-2aee09dc0911', 4, 107.96, '2026-01-23', '2026-01-18 20:48:09'),
(28, '0bc7e7cc-f4af-11f0-a9f9-2aee09dc0911', 8, 215.92, '2026-01-30', '2026-01-18 20:48:30'),
(29, '1d155636-f4af-11f0-a9f9-2aee09dc0911', 8, 215.92, '2026-01-30', '2026-01-18 20:48:59');

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
('0bc7e7cc-f4af-11f0-a9f9-2aee09dc0911', NULL, 'Maisie', 'MAy Mooore', 'zach@gmail.com'),
('1d155636-f4af-11f0-a9f9-2aee09dc0911', 'f8907e8a-f4a4-11f0-a9f9-2aee09dc0911', 'Maisie', 'MAy Mooore', 'zach@gmail.com'),
('bf278eae-f4ae-11f0-a9f9-2aee09dc0911', 'f8907e8a-f4a4-11f0-a9f9-2aee09dc0911', 'Martin', 'Juniour', 'martin@gmail.com'),
('d3cda5e6-f4ae-11f0-a9f9-2aee09dc0911', 'f8907e8a-f4a4-11f0-a9f9-2aee09dc0911', 'Lwazi', 'Nala', 'martin@gmail.com'),
('dde8ce34-f4ae-11f0-a9f9-2aee09dc0911', 'f8907e8a-f4a4-11f0-a9f9-2aee09dc0911', 'Nala', 'Sibiya', '1@gmail.com'),
('ff846080-f4ae-11f0-a9f9-2aee09dc0911', NULL, 'Alwande', 'Mguni', '1@gmail.com');

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
