-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2026 at 11:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` char(36) NOT NULL DEFAULT uuid(),
  `firstName` varchar(40) NOT NULL,
  `lastNAme` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `passcode` varchar(1024) NOT NULL,
  `postalCode` varchar(10) NOT NULL,
  `marketing` enum('yes','no') DEFAULT 'yes',
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `firstName`, `lastNAme`, `username`, `passcode`, `postalCode`, `marketing`, `dateCreated`) VALUES
('16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '$2y$10$zvblEMK3lyrgMQTYbIua4eGUnnVnfN94k/ylJc62W5e9jT8mo5KNC', 'LE10 OAS', 'yes', '2026-01-20 09:26:23'),
('e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '$2y$10$qo/Sww7DnRkkQHWuDPI.2.qnBSr3lAAb2AnbPN9S8WABJUP4deMgu', 'LE10 0AS', 'yes', '2026-01-18 18:31:26'),
('f8907e8a-f4a4-11f0-a9f9-2aee09dc0911', 'Alwande', 'Mguni', 'alwande@gmail.com', '$2y$10$4rZhv5bH2QHHGnJ9VSn7j.k4jKGY4Cp6mIIKCv3hkIOpSDr5fJbJi', 'Le10 0as', 'no', '2026-01-18 19:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `hotelbookedrooms`
--

CREATE TABLE `hotelbookedrooms` (
  `hotelBookedRoomID` int(11) NOT NULL,
  `bookingID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `bookingStartRange` date NOT NULL,
  `bookingEndRange` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotelbookedrooms`
--

INSERT INTO `hotelbookedrooms` (`hotelBookedRoomID`, `bookingID`, `roomID`, `bookingStartRange`, `bookingEndRange`) VALUES
(17, 24, 2, '2026-01-30', '2026-02-28'),
(35, 57, 2, '2026-03-05', '2026-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `hotelbookings`
--

CREATE TABLE `hotelbookings` (
  `bookingID` int(11) NOT NULL,
  `customerID` char(36) NOT NULL,
  `bFirstName` varchar(40) NOT NULL,
  `bLastName` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `pricePayed` decimal(10,2) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `visitorQTY` int(3) NOT NULL,
  `tempCheck` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotelbookings`
--

INSERT INTO `hotelbookings` (`bookingID`, `customerID`, `bFirstName`, `bLastName`, `email`, `startDate`, `endDate`, `pricePayed`, `createdAt`, `visitorQTY`, `tempCheck`) VALUES
(1, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '3923-07-31', '2006-07-31', '0.00', '2026-01-19 16:28:38', 0, NULL),
(2, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2006-08-24', '2004-03-21', '0.00', '2026-01-19 16:32:37', 90, NULL),
(3, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2206-07-31', '9203-08-21', '0.00', '2026-01-19 16:45:31', 123, NULL),
(4, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2206-07-31', '9203-08-21', '0.00', '2026-01-19 16:45:42', 123, NULL),
(5, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2206-07-31', '9203-08-21', '0.00', '2026-01-19 16:47:27', 123, '5885f068ef02dd3d2a3b3186ca24510a2b6667305456f7179f7dca0cca4553a047b9'),
(6, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2206-07-31', '9203-08-21', '0.00', '2026-01-19 16:50:31', 123, 'efdb1f17ff94313ca0ee4cbf290e7c2a1ce34005ad0839031cb9a6f096c093bf9ff7'),
(7, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2206-07-31', '9203-08-21', '0.00', '2026-01-19 18:37:05', 123, 'fea816bb94f094e64d9563758daacbd910e20fa9c73bf012d5cebf4ea19e433dea07'),
(8, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2004-07-31', '3222-09-12', '0.00', '2026-01-19 18:43:21', 2, 'b90cd431d87bd08e60f512d7ad8cb241b84be5ebffb45a2482367ad7d5f6ab25388d'),
(9, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2004-07-31', '3222-09-12', '0.00', '2026-01-19 18:43:37', 2, 'db783fb0c482821046307f446f1aad736883655871007cccfe7b1d2633e08d99efe6'),
(10, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2006-07-31', '9013-03-21', '0.00', '2026-01-19 18:44:17', 6, '58fc011d5f44c42e8f7fa3bdc9a165d55364529f501a784959abec3783ae35169db1'),
(11, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '3902-07-31', '2432-03-21', '0.00', '2026-01-19 18:59:45', 3, 'da710494520ac102ce3538df594dbd56cfb39f02a51739ae5c9952b59ac74cfcbf76'),
(12, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2206-07-31', '2006-07-31', '0.00', '2026-01-19 19:12:06', 5, '6a75a93d8a8d87fd2740d1400aaa99f427782c673c7bcf8d036eb828d758fa5753cd'),
(14, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2006-07-31', '2411-08-21', '0.00', '2026-01-19 19:18:44', 6, 'd7b569e3df8cd92b2921a99a24496ffcedc263540c538f0498f880a0855d0637bde9'),
(15, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '1122-12-31', '2302-11-12', '0.00', '2026-01-19 19:20:50', 10, 'e3bc17989aa9def7399fd832b214746a0ca66a36ce79c29ca18c6bd3dac800f4faa3'),
(16, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-22', '2026-01-30', '0.00', '2026-01-19 20:07:20', 1, '8fff9282569b705cffc82d692d62c8dd1e91e1f6fc965eae8c9d669f64ef1f41d0bf'),
(17, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-21', '2026-01-22', '0.00', '2026-01-19 20:26:25', 1, '2150368bb4e650e0c0ddb60d204244948ff847b192bf6e07d4d30b158af45cc37c86'),
(18, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-21', '2026-01-22', '0.00', '2026-01-19 21:28:39', 1, '4491a129730218dd3432244c6daccda2eef83ed4f35b8abcfd141ef2c983a6822491'),
(19, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-20', '2026-01-22', '0.00', '2026-01-20 06:11:58', 2, '9c13bbc21cf37b8c7d5c962654a8965f31e69cb0be7c9b4b552905cff9242190c71e'),
(20, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-20', '2026-01-22', '0.00', '2026-01-20 06:13:33', 2, 'a300914f51b99711d467304cf6ab0c4fb32f60c8ef1e7b0e703983eadbe1ec50161b'),
(21, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-21', '2026-02-21', '0.00', '2026-01-20 06:14:58', 2, 'd70f9ad6a9801c4443e57739eda80d137b68f2b0c324b71b8d5488c512647e1844ba'),
(22, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-21', '2026-02-23', '0.00', '2026-01-20 06:16:48', 2, '6feb1e5c1fefcb7517d761ef8e377f21b97484fac5120cc0f9e7baebd32660253a43'),
(23, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-21', '2026-02-22', '0.00', '2026-01-20 06:39:28', 4, 'b2db80995ae7426be4f20c0d1460bd3addb51fe8b806a35a0bfa4b89ceef60c9b03b'),
(24, 'e5e2c0d0-f49b-11f0-a9f9-2aee09dc0911', 'Martin Juniour', 'Nyika', 'lwazi@gmail.com', '2026-01-23', '2026-02-28', '0.00', '2026-01-20 06:40:59', 2, '103b28fa40ca84549c97c825d9d830219515301b77829c5c49a832a883377c906775'),
(25, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-28', '0.00', '2026-01-20 09:33:37', 1, '19e8fa7eb244e4c3ad925c0a03f45205eaf52172403fc90ed230510d08859fa59265'),
(26, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-28', '0.00', '2026-01-20 09:35:59', 1, '9ebda98d8ed79cdb3e7cbbd701f569e50bbaf793f5d68e78bb765c6fe7c30245a7d4'),
(27, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-28', '0.00', '2026-01-20 09:36:12', 1, '563dfd3259a44a2f471f6f651ddf9b7d23cfc929bd29452355b3234acee10b8b1468'),
(28, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-28', '0.00', '2026-01-20 09:42:24', 1, 'c91cb482a29a22e5533beba35139498a0a913d4863db9faeeaaaf32ecbc0bc0f1b65'),
(29, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-28', '0.00', '2026-01-20 09:42:57', 1, 'ba00b993b8a8a85053d28701eff57118e5d64f37a8cd44456b01d58ec8822a915c4c'),
(30, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-28', '0.00', '2026-01-20 09:45:23', 1, 'f35d69491efacf35501ebef1cd263dc11ff82be712b1cd6a0d47291b9527d6586236'),
(31, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-28', '0.00', '2026-01-20 09:47:06', 1, '3a7bfe1777b0daa0065bfcf1c8361107f70ebbcc2c7a513862c687757f95483d6b11'),
(32, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-28', '0.00', '2026-01-20 09:47:34', 1, '8681a4a248a7a3fb83bcb1659d24f7288f223a1ee757048325758e330f04c887620f'),
(33, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-28', '0.00', '2026-01-20 09:48:37', 1, '9115cd901de39cdb26434641d6df83beb9a9a77f239e090a38f3060f665f0849cd28'),
(34, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-28', '0.00', '2026-01-20 09:49:04', 1, 'cb9f30a0f4e3fe18a904b8758bfa3b2faaf41ed7465cee5bf29c9e6748ddda78b1be'),
(35, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-28', '0.00', '2026-01-20 09:51:19', 1, 'c9595e4b7f87457b52be70a0e93f0733a377dec8afc6db8df00eb954414a32b43a88'),
(36, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-28', '0.00', '2026-01-20 09:51:47', 1, '2391d846bd7ed638d7afe2411e2cc351dd9154c274fdd656ae9b7e9762ee38ee1e46'),
(37, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-24', '2026-02-27', '0.00', '2026-01-20 09:58:27', 1, '8422f71d0ff96fe357f5b8508a32fb3d97e4e4eeba90b4b25fbc5cfb89c87e8ac196'),
(38, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-03-01', '2026-03-03', '0.00', '2026-01-20 09:59:55', 1, 'da8b4fd8255687b10e2e83204243378c5e345464c89f9d7b3fab11e951c9f3701b39'),
(39, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-26', '0.00', '2026-01-20 10:02:25', 1, '0e1f5ea01cce2818e615c56fc54c5d542de922146b41762190f6960d77cc5c279615'),
(40, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-31', '0.00', '2026-01-20 10:02:59', 1, '527e1dc830e2b76dc6d2935b914889f375cf6c6d1c4bbeaea75845ccb691dd01f304'),
(41, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-28', '0.00', '2026-01-20 10:12:33', 1, '26a9fffa6646399ea7d82483399cd3ff7f9ddda8e68ccdd06890a75559b964fb04e3'),
(42, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-02-08', '0.00', '2026-01-20 10:13:32', 1, '3cea9a16244d965ac2e0d166404e815ffcb0064d3b79ce8c89d84ba6c5bab7b501d7'),
(43, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-02-08', '0.00', '2026-01-20 10:18:29', 1, '6ed2b322ebd7b4b7214458381d1e4dcddf52a108e75b3d91e0ae364dc9c3636c541b'),
(44, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-02-08', '0.00', '2026-01-20 10:20:01', 1, 'f94cbcbc22a5b7591513365001d0fbfedbeadab0e81f0208944e79beb24b33d775f8'),
(45, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-02-08', '0.00', '2026-01-20 10:20:20', 1, '5867d52f6fe89e4815498e73f9c5d961a59151936f9a2a7b35fdcc2c8a05f0b0bc0a'),
(46, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-02-08', '0.00', '2026-01-20 10:23:34', 1, '571c6dbc3a114cd73cc921fcca8362f243821daae1ee6f397106fcfcd6dc3be9f5c4'),
(47, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-02-08', '0.00', '2026-01-20 10:24:22', 1, 'eae6b43db550067504afe0b1de4c755c4e91396688cbe6c67c9d541b8af8327b4b09'),
(48, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-02-08', '0.00', '2026-01-20 10:25:00', 1, 'ecc95733bc3fe50f2dffd794e990d04b38d2b55eaf38c1c926a83979184e4637d1af'),
(49, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-27', '0.00', '2026-01-20 10:26:13', 1, '45ee874b292dae8dad6ebd61d712eaaec9d2900ab5145dc31604d1c3114713545540'),
(50, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-27', '0.00', '2026-01-20 10:27:49', 1, '0fd73bac7608f589b27cb27f62f116c11883ac78eb72fd0f9739bcf74c9fdaace347'),
(51, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-27', '0.00', '2026-01-20 10:33:28', 1, 'cf2bd6513a40c570433ce30f78350518dd5c7b9a3e58c3f8a79fb86374c8eb02cc06'),
(52, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-27', '0.00', '2026-01-20 10:33:35', 1, '150695fee2b2ab500d672a6a024f809d8b8ab0b984c30c454c46c822f32186367d6d'),
(53, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-23', '2026-01-27', '0.00', '2026-01-20 10:33:52', 1, '9a0ff16ef21ae34136fa5a69abb3fab6f19d84f748abf350af0c042116302144a580'),
(54, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-01-31', '2026-02-09', '0.00', '2026-01-20 10:36:03', 1, '14496737a5ad04a61a9e87f0e558f25e8c4f1bedcf23dee1f7567ee922cc94a08f50'),
(55, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-02-03', '2026-02-09', '0.00', '2026-01-20 10:36:50', 1, '44d375eb2b6426758d013333f3ff333f439444871a88ba76ab0e8c5f0fa673358c68'),
(56, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-02-03', '2026-03-01', '0.00', '2026-01-20 10:40:37', 1, '14479eb64606ffa13f668e288138ed027cea35a7611941b4fe4dc653e712832e3f52'),
(57, '16a1d261-f5e2-11f0-9d9d-7c10c98f03ff', 'Kevin', 'GAtes', '2@gmail.com', '2026-03-05', '2026-03-07', '0.00', '2026-01-20 10:41:32', 1, '21e13c7163a080e2a750fc028963cdb8b2b471eeabed5b7b4e302ea419362aa39c7c');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomID` int(11) NOT NULL,
  `roomType` enum('single','double','mixed') NOT NULL,
  `roomAvailability` enum('free','booked') DEFAULT 'free'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `safariticketbookings`
--

CREATE TABLE `safariticketbookings` (
  `safariTicketBookingID` int(11) NOT NULL,
  `customerTempID` char(36) NOT NULL,
  `ticketQty` int(3) NOT NULL,
  `pricePayed` decimal(10,2) NOT NULL,
  `dateOfVisitation` date NOT NULL,
  `purchaseDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `safariticketbookings`
--

INSERT INTO `safariticketbookings` (`safariTicketBookingID`, `customerTempID`, `ticketQty`, `pricePayed`, `dateOfVisitation`, `purchaseDate`) VALUES
(24, 'bf278eae-f4ae-11f0-a9f9-2aee09dc0911', 5, '134.95', '2026-01-23', '2026-01-18 20:46:21'),
(25, 'd3cda5e6-f4ae-11f0-a9f9-2aee09dc0911', 5, '134.95', '2026-01-23', '2026-01-18 20:46:56'),
(26, 'dde8ce34-f4ae-11f0-a9f9-2aee09dc0911', 2, '53.98', '2026-01-23', '2026-01-18 20:47:13'),
(27, 'ff846080-f4ae-11f0-a9f9-2aee09dc0911', 4, '107.96', '2026-01-23', '2026-01-18 20:48:09'),
(28, '0bc7e7cc-f4af-11f0-a9f9-2aee09dc0911', 8, '215.92', '2026-01-30', '2026-01-18 20:48:30'),
(29, '1d155636-f4af-11f0-a9f9-2aee09dc0911', 8, '215.92', '2026-01-30', '2026-01-18 20:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `tempcustomersafari`
--

CREATE TABLE `tempcustomersafari` (
  `customerTempID` char(36) NOT NULL DEFAULT uuid(),
  `customerID` char(36) DEFAULT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `contact` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempcustomersafari`
--

INSERT INTO `tempcustomersafari` (`customerTempID`, `customerID`, `firstName`, `lastName`, `contact`) VALUES
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
-- Indexes for table `hotelbookedrooms`
--
ALTER TABLE `hotelbookedrooms`
  ADD PRIMARY KEY (`hotelBookedRoomID`),
  ADD KEY `fk_bookingIDHotelRooom` (`bookingID`),
  ADD KEY `fk_roomIDIDHotelRooom` (`roomID`);

--
-- Indexes for table `hotelbookings`
--
ALTER TABLE `hotelbookings`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `fk_customerIDHotel` (`customerID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `safariticketbookings`
--
ALTER TABLE `safariticketbookings`
  ADD PRIMARY KEY (`safariTicketBookingID`),
  ADD KEY `fk_customerTempID` (`customerTempID`);

--
-- Indexes for table `tempcustomersafari`
--
ALTER TABLE `tempcustomersafari`
  ADD PRIMARY KEY (`customerTempID`),
  ADD KEY `fk_customerID` (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotelbookedrooms`
--
ALTER TABLE `hotelbookedrooms`
  MODIFY `hotelBookedRoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `hotelbookings`
--
ALTER TABLE `hotelbookings`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `safariticketbookings`
--
ALTER TABLE `safariticketbookings`
  MODIFY `safariTicketBookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotelbookedrooms`
--
ALTER TABLE `hotelbookedrooms`
  ADD CONSTRAINT `fk_bookingIDHotelRooom` FOREIGN KEY (`bookingID`) REFERENCES `hotelbookings` (`bookingID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_roomIDIDHotelRooom` FOREIGN KEY (`roomID`) REFERENCES `rooms` (`roomID`) ON DELETE CASCADE;

--
-- Constraints for table `hotelbookings`
--
ALTER TABLE `hotelbookings`
  ADD CONSTRAINT `fk_customerIDHotel` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`) ON DELETE CASCADE;

--
-- Constraints for table `safariticketbookings`
--
ALTER TABLE `safariticketbookings`
  ADD CONSTRAINT `fk_customerTempID` FOREIGN KEY (`customerTempID`) REFERENCES `tempcustomersafari` (`customerTempID`) ON DELETE CASCADE;

--
-- Constraints for table `tempcustomersafari`
--
ALTER TABLE `tempcustomersafari`
  ADD CONSTRAINT `fk_customerID` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
