-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2026 at 10:05 AM
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
-- Creation: Jan 28, 2026 at 10:27 PM
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
-- RELATIONSHIPS FOR TABLE `customers`:
--

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
-- Creation: Jan 19, 2026 at 08:18 PM
-- Last update: Feb 01, 2026 at 03:44 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `hotelBookedRooms`:
--   `bookingID`
--       `hotelBookings` -> `bookingID`
--   `roomID`
--       `rooms` -> `roomID`
--

--
-- Dumping data for table `hotelBookedRooms`
--

INSERT INTO `hotelBookedRooms` (`hotelBookedRoomID`, `bookingID`, `roomID`, `bookingStartRange`, `bookingEndRange`) VALUES
(63, 55, 68, '2026-01-31', '2026-03-13'),
(67, 57, 74, '2026-07-31', '2026-08-03'),
(68, 57, 75, '2026-07-31', '2026-08-03'),
(69, 57, 76, '2026-07-31', '2026-08-03'),
(70, 58, 77, '2026-01-28', '2026-01-31'),
(71, 58, 78, '2026-01-28', '2026-01-31'),
(72, 59, 69, '2026-02-26', '2026-02-28'),
(73, 59, 72, '2026-02-26', '2026-02-28'),
(74, 60, 73, '2026-02-06', '2026-03-07'),
(75, 61, 74, '2026-02-07', '2026-03-14'),
(76, 62, 75, '2026-01-31', '2026-03-13'),
(77, 62, 76, '2026-01-31', '2026-03-13'),
(78, 63, 69, '2026-01-30', '2026-02-06'),
(79, 64, 70, '2026-05-01', '2026-06-06'),
(80, 64, 71, '2026-05-01', '2026-06-06'),
(81, 64, 80, '2026-05-01', '2026-06-06'),
(82, 65, 68, '2026-12-30', '2027-02-13'),
(83, 65, 77, '2026-12-30', '2027-02-13'),
(85, 67, 79, '2026-02-12', '2026-03-10'),
(86, 68, 79, '2026-02-12', '2026-03-10'),
(87, 69, 79, '2026-02-12', '2026-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `hotelBookings`
--
-- Creation: Jan 29, 2026 at 07:59 AM
-- Last update: Feb 01, 2026 at 03:44 PM
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
  `loyalty` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`bookingID`),
  KEY `fk_customerIDHotel` (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `hotelBookings`:
--   `customerID`
--       `customers` -> `customerID`
--

--
-- Dumping data for table `hotelBookings`
--

INSERT INTO `hotelBookings` (`bookingID`, `customerID`, `bFirstName`, `bLastName`, `email`, `startDate`, `endDate`, `pricePayed`, `createdAt`, `visitorQTY`, `tempCheck`, `loyalty`) VALUES
(55, '8b062902-fa3d-11f0-996b-2aee09dc0910', '', '', 'ben@gmail.com', '2026-01-31', '2026-03-13', 100.00, '2026-01-28 21:59:13', 1, 'd1d7276084ee67700a82fe7d92f0d965f52a', 8),
(57, '8b062902-fa3d-11f0-996b-2aee09dc0910', '', '', 'ben@gmail.com', '2026-07-31', '2026-08-03', 300.00, '2026-01-28 22:21:48', 2, '2744c45b711419e59b7fef2104b684d717ae', 73),
(58, '8b062902-fa3d-11f0-996b-2aee09dc0910', '', '', 'ben@gmail.com', '2026-01-28', '2026-01-31', 193.10, '2026-01-28 22:33:44', 1, '58b95c0a933915a70649491faa7f330b3be2', 0),
(59, '8b062902-fa3d-11f0-996b-2aee09dc0910', '', '', 'ben@gmail.com', '2026-02-26', '2026-02-28', 195.17, '2026-01-28 22:38:38', 1, '9dcd0442b9c34192230ec17aef150cd58f0b', 0),
(60, '8b062902-fa3d-11f0-996b-2aee09dc0910', '', '', 'ben@gmail.com', '2026-02-06', '2026-03-07', 97.31, '2026-01-28 22:41:37', 1, 'eea3b835d8d5489e766b378eedef58a4ab21', 0),
(61, '8b062902-fa3d-11f0-996b-2aee09dc0910', '', '', 'ben@gmail.com', '2026-02-07', '2026-03-14', 100.00, '2026-01-29 10:33:39', 1, 'c570191496309483f62d9c460fe716bbd34c', 8),
(62, '8b062902-fa3d-11f0-996b-2aee09dc0910', '', '', 'ben@gmail.com', '2026-01-31', '2026-03-13', 192.55, '2026-01-29 10:34:15', 1, 'd63e9b1f2d0da247b020a93c042263574a43', 0),
(63, '8b062902-fa3d-11f0-996b-2aee09dc0910', '', '', 'ben@gmail.com', '2026-01-30', '2026-02-06', 100.00, '2026-01-29 14:12:15', 1, '174e1ff52bf37762c4bbfb811444d0d963ad', 8),
(64, '8b062902-fa3d-11f0-996b-2aee09dc0910', '', '', 'ben@gmail.com', '2026-05-01', '2026-06-06', 547.00, '2026-01-29 14:14:46', 1, '62c88ac8517e786f3dab4970058fa76edaf1', 244),
(65, '8b062902-fa3d-11f0-996b-2aee09dc0910', '', '', 'ben@gmail.com', '2026-12-30', '2027-02-13', 182.61, '2026-01-29 14:18:31', 2, '48894046faa2102cb154ca88456a7f31c172', 0),
(67, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', '', '', 'lwazi@gmail.com', '2026-02-12', '2026-03-10', 169.00, '2026-02-01 15:42:47', 1, '0741ccaf474a3a1da2b5f95a13480b3b5852', 23),
(68, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', '', '', 'lwazi@gmail.com', '2026-02-12', '2026-03-10', 169.00, '2026-02-01 15:43:38', 1, 'ef6fa3828699eacb64d45ab1b8eb6a8956e0', 23),
(69, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-02-12', '2026-03-10', 169.00, '2026-02-01 15:44:44', 1, 'c30f34b1e7ecf9160ad926f3d2b5b59505ee', 23);

-- --------------------------------------------------------

--
-- Table structure for table `loyalty`
--
-- Creation: Jan 29, 2026 at 08:03 AM
--

DROP TABLE IF EXISTS `loyalty`;
CREATE TABLE IF NOT EXISTS `loyalty` (
  `loyaltyID` int(11) NOT NULL AUTO_INCREMENT,
  `customerID` char(36) DEFAULT NULL,
  `used` int(11) DEFAULT NULL,
  PRIMARY KEY (`loyaltyID`),
  KEY `fk_customerIDLoyalty` (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `loyalty`:
--   `customerID`
--       `customers` -> `customerID`
--

--
-- Dumping data for table `loyalty`
--

INSERT INTO `loyalty` (`loyaltyID`, `customerID`, `used`) VALUES
(1, '8b062902-fa3d-11f0-996b-2aee09dc0910', 108),
(2, '8b062902-fa3d-11f0-996b-2aee09dc0910', 252),
(3, '8b062902-fa3d-11f0-996b-2aee09dc0910', 74),
(4, '8b062902-fa3d-11f0-996b-2aee09dc0910', 200);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--
-- Creation: Jan 21, 2026 at 04:17 PM
-- Last update: Feb 01, 2026 at 03:41 PM
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
-- RELATIONSHIPS FOR TABLE `rooms`:
--

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomID`, `roomType`, `roomAvailability`, `bookings`) VALUES
(68, 'single', 'booked', 3),
(69, 'single', 'booked', 3),
(70, 'double', 'free', 1),
(71, 'double', 'free', 1),
(72, 'single', 'booked', 3),
(73, 'single', 'booked', 3),
(74, 'single', 'booked', 3),
(75, 'single', 'free', 2),
(76, 'single', 'free', 2),
(77, 'single', 'booked', 3),
(78, 'single', 'booked', 3),
(79, 'double', 'free', 1),
(80, 'mixed', 'free', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roomTypePrices`
--
-- Creation: Jan 21, 2026 at 10:34 PM
--

DROP TABLE IF EXISTS `roomTypePrices`;
CREATE TABLE IF NOT EXISTS `roomTypePrices` (
  `roomTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `roomType` varchar(40) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  PRIMARY KEY (`roomTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `roomTypePrices`:
--

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
-- Creation: Jan 29, 2026 at 04:31 PM
-- Last update: Jan 30, 2026 at 12:48 PM
--

DROP TABLE IF EXISTS `safariTicketBookings`;
CREATE TABLE IF NOT EXISTS `safariTicketBookings` (
  `safariTicketBookingID` int(11) NOT NULL AUTO_INCREMENT,
  `customerTempID` char(36) NOT NULL,
  `ticketQty` int(3) NOT NULL,
  `pricePayed` decimal(10,2) NOT NULL,
  `dateOfVisitation` date NOT NULL,
  `purchaseDate` datetime DEFAULT current_timestamp(),
  `loyalty` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`safariTicketBookingID`),
  KEY `fk_customerTempID` (`customerTempID`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `safariTicketBookings`:
--   `customerTempID`
--       `tempCustomerSafari` -> `customerTempID`
--

--
-- Dumping data for table `safariTicketBookings`
--

INSERT INTO `safariTicketBookings` (`safariTicketBookingID`, `customerTempID`, `ticketQty`, `pricePayed`, `dateOfVisitation`, `purchaseDate`, `loyalty`) VALUES
(32, '4f2e9098-f841-11f0-996b-2aee09dc0910', 4, 107.96, '2026-01-24', '2026-01-23 09:53:03', 16),
(33, '5f44033c-f841-11f0-996b-2aee09dc0910', 21, 566.79, '2026-01-03', '2026-01-23 09:53:30', 82),
(34, '51081b36-f85b-11f0-996b-2aee09dc0910', 1, 26.99, '2026-01-25', '2026-01-23 12:59:13', 4),
(35, '7e0e78f4-f85c-11f0-996b-2aee09dc0910', 4, 107.96, '2026-01-08', '2026-01-23 13:07:38', 16),
(36, '9181482a-fb05-11f0-996b-2aee09dc0910', 5, 134.95, '2026-01-23', '2026-01-26 22:22:58', 19),
(37, 'f1d79d06-fd2f-11f0-996b-2aee09dc0910', 20, 539.80, '2026-01-31', '2026-01-29 16:31:21', 37),
(38, 'b33f9166-fd34-11f0-996b-2aee09dc0910', 20, 539.80, '2026-01-31', '2026-01-29 17:05:23', 37),
(39, '79c1fe6c-fd37-11f0-996b-2aee09dc0910', 100, 2699.00, '2026-02-07', '2026-01-29 17:25:15', 0),
(40, 'f80dc15c-fd37-11f0-996b-2aee09dc0910', 3, 75.86, '2026-01-07', '2026-01-29 17:28:47', 0),
(41, '3d29b6ce-fd38-11f0-996b-2aee09dc0910', 2, 53.98, '2026-01-29', '2026-01-29 17:30:43', 4),
(42, '92115fca-fd38-11f0-996b-2aee09dc0910', 1, 26.99, '2026-01-10', '2026-01-29 17:33:05', 2),
(43, '1976ffb0-fd39-11f0-996b-2aee09dc0910', 200, 5398.00, '2026-01-31', '2026-01-29 17:36:53', 23786),
(44, '86699592-fd39-11f0-996b-2aee09dc0910', 4, 107.96, '2026-01-28', '2026-01-29 17:39:55', 10),
(45, 'f0da713e-fd3f-11f0-996b-2aee09dc0910', 1, -1615.35, '2026-02-04', '2026-01-29 18:25:51', 0),
(46, 'c883b3c2-fdd9-11f0-a324-2aee09dc0910', 3, 80.97, '2026-03-10', '2026-01-30 12:47:06', 5),
(47, 'f969c4ea-fdd9-11f0-a324-2aee09dc0910', 4, 107.96, '2026-01-29', '2026-01-30 12:48:28', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tempCustomerSafari`
--
-- Creation: Jan 29, 2026 at 03:39 PM
-- Last update: Jan 30, 2026 at 12:48 PM
--

DROP TABLE IF EXISTS `tempCustomerSafari`;
CREATE TABLE IF NOT EXISTS `tempCustomerSafari` (
  `customerTempID` char(36) NOT NULL DEFAULT uuid(),
  `customerID` char(36) DEFAULT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `tempCheck` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`customerTempID`),
  KEY `fk_customerID` (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `tempCustomerSafari`:
--   `customerID`
--       `customers` -> `customerID`
--

--
-- Dumping data for table `tempCustomerSafari`
--

INSERT INTO `tempCustomerSafari` (`customerTempID`, `customerID`, `firstName`, `lastName`, `contact`, `tempCheck`) VALUES
('1976ffb0-fd39-11f0-996b-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', 'Aaliyah', 'Baker', 'juniou@gmial.com', '75d726de35a606e14d34af94ad0cb2d6be34b0bb7e24621bc6be6c3173f0b8113167e3ba39e0a01227c79c'),
('3d29b6ce-fd38-11f0-996b-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', 'Lwazi', 'Nyika', 'juniou@gmial.com', '760837130092fd7ab9fe25e2a862878b58e40e259ff69e013936445cfbccdd1fc0cad69e9b1ed5b3b24799'),
('432d82f2-fd2f-11f0-996b-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', 'Benjamin', 'Baker', 'martin@gmail.com', '33d2b89b991c951eada8d049da4c7c8c0f99247db41a93ea48591c0d6c7b0a2c95f04693acf11a46d490cc'),
('4f2e9098-f841-11f0-996b-2aee09dc0910', 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin', 'Juniour', 'martin@gmail.com', NULL),
('4f9a16f0-fd38-11f0-996b-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', 'Aaliyah', 'Fletcher', 'juniou@gmial.com', '27e36912171d96485e842aa6537ab9b5d182a51e5c0fa3c475d1bd291a634fb27a718808b3e7e2cb258a8b'),
('51081b36-f85b-11f0-996b-2aee09dc0910', 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Aaronn', 'Baker', 'martin@gmail.com', NULL),
('5f44033c-f841-11f0-996b-2aee09dc0910', 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Aaliyah', 'Baker', 'juniou@gmial.com', NULL),
('79c1fe6c-fd37-11f0-996b-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', 'Aaliyah', 'Bennedict', 'juniou@gmial.com', 'c3be944154912010f0e58bc675c9730301dd57095bfd61390d5da4c946ea5a2268b6783cdbbdaf2b9455c4'),
('7e0e78f4-f85c-11f0-996b-2aee09dc0910', 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Aaronn', 'Baker', 'juniou@gmial.com', NULL),
('86699592-fd39-11f0-996b-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', 'Aaliyah', 'Nyika', 'juniou@gmial.com', 'dda8ba1348da4d375236427b366459e72c5ebfe93c94ea20f3f558ea91b6b65b5c34b50263cc5db4059b2d'),
('9181482a-fb05-11f0-996b-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', 'Aaliyah', 'Nyika', 'martin@gmail.com', NULL),
('92115fca-fd38-11f0-996b-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', 'Martin', 'Baker', 'juniou@gmial.com', '5e68b379849b72af99df840be2e190fd629ef7ba8e82c68f07ba2072ca09acb51240bd6f77f157644afbbc'),
('a0a70d90-fd2f-11f0-996b-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', 'Martin Juniour', 'Sibiya ', 'juniou@gmial.com', 'c4abaa27bbc2eb05a35e993f85a6a4dc671afccb635396488e19f71de1966f503229712f97fbead32a72d7'),
('aad2c6ec-fd2f-11f0-996b-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', 'Martin Juniour', 'Sibiya ', 'juniou@gmial.com', '4cca80dccf4971646928c4fce8869af4e5383f34420470c007616321349f675671e78a07e3109827f05775'),
('b33f9166-fd34-11f0-996b-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', 'Martin Juniour', 'Fletcher', 'juniou@gmial.com', '1c6b2e32713d4eef934168f1128453d1f1e21d2ec1ebd9820dbb4d8fc871f1e703799e80583d0fd3215d00'),
('c883b3c2-fdd9-11f0-a324-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', 'Aaliyah', '', '', 'f9bf3911df0d5ff06998d3705fbc00d60568c8fd1282b48c458dfa8c8a99dad5a4c75c4bc10bd6b3119804'),
('e42eeee8-fd2f-11f0-996b-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', 'Martin Juniour', 'Fletcher', 'juniou@gmial.com', '3a6773deba47b9ae06828364d510a0adcca6beab76cbbf89ba8c49b8fce6498b76b0799e39f7b7cf363e43'),
('f0da713e-fd3f-11f0-996b-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', '1', 'Fletcher', 'martin@gmail.com', '97bd290378840d7008f6ce9ac6201d020967539266314ccd3ce501e6b19f787374d8e785cdf3d5426f903b'),
('f1d79d06-fd2f-11f0-996b-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', 'Martin Juniour', 'Fletcher', 'juniou@gmial.com', '52619b1d0d18fbecc7c1fcd68e3b66ab7a07c09a3c63f7fd7be55581146341b3c6a64d07ec6c3af68de3cf'),
('f80dc15c-fd37-11f0-996b-2aee09dc0910', '8b062902-fa3d-11f0-996b-2aee09dc0910', 'Aaronn', 'Nyika', 'martin@gmail.com', '8b0f32e912fd4e0cea59ebdbc2fc28b9c724c650c685e93ba808c7c67d8f38551af08b9d0c876df028f072'),
('f969c4ea-fdd9-11f0-a324-2aee09dc0910', 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Baker', 'martin@gmail.com', '5a609a4fc587e0a019753294841dac636260f3de80e258fb69b46c18809ad04e70607b288af9eda6cc4237');

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
-- Constraints for table `loyalty`
--
ALTER TABLE `loyalty`
  ADD CONSTRAINT `fk_customerIDLoyalty` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`) ON DELETE CASCADE;

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
