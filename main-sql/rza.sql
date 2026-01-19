-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2026 at 09:12 AM
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
CREATE TABLE `customers` (
  `customerID` char(36) NOT NULL DEFAULT uuid(),
  `firstName` varchar(40) NOT NULL,
  `lastNAme` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `passcode` varchar(1024) NOT NULL,
  `postalCode` varchar(10) NOT NULL,
  `marketing` enum('yes','no') DEFAULT 'yes',
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `firstName`, `lastNAme`, `username`, `passcode`, `postalCode`, `marketing`, `dateCreated`) VALUES
('e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '$2y$10$qo/Sww7DnRkkQHWuDPI.2.qnBSr3lAAb2AnbPN9S8WABJUP4deMgu', 'LE10 0AS', 'yes', '2026-01-18 18:31:26'),
('f8907e8a-f4a4-11f0-a9f9-2aee09dc0911', 'Alwande', 'Mguni', 'alwande@gmail.com', '$2y$10$4rZhv5bH2QHHGnJ9VSn7j.k4jKGY4Cp6mIIKCv3hkIOpSDr5fJbJi', 'Le10 0as', 'no', '2026-01-18 19:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `safariTicketBookings`
--

DROP TABLE IF EXISTS `safariTicketBookings`;
CREATE TABLE `safariTicketBookings` (
  `safariTicketBookingID` int(11) NOT NULL,
  `customerTempID` char(36) NOT NULL,
  `ticketQty` int(3) NOT NULL,
  `pricePayed` decimal(10,2) NOT NULL,
  `dateOfVisitation` date NOT NULL,
  `purchaseDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
CREATE TABLE `tempCustomerSafari` (
  `customerTempID` char(36) NOT NULL DEFAULT uuid(),
  `customerID` char(36) DEFAULT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `contact` varchar(40) NOT NULL
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
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `safariTicketBookings`
--
ALTER TABLE `safariTicketBookings`
  ADD PRIMARY KEY (`safariTicketBookingID`),
  ADD KEY `fk_customerTempID` (`customerTempID`);

--
-- Indexes for table `tempCustomerSafari`
--
ALTER TABLE `tempCustomerSafari`
  ADD PRIMARY KEY (`customerTempID`),
  ADD KEY `fk_customerID` (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `safariTicketBookings`
--
ALTER TABLE `safariTicketBookings`
  MODIFY `safariTicketBookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

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
