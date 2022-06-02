-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 05:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_pro1`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_food`
--

CREATE TABLE `list_food` (
  `ID_market` char(2) DEFAULT NULL,
  `ID_food` char(3) NOT NULL,
  `price` float(4,2) NOT NULL,
  `name_food` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_food`
--

INSERT INTO `list_food` (`ID_market`, `ID_food`, `price`, `name_food`) VALUES
('00', '000', 30.00, 'ผัดกะเพรา');

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `ID_market` char(2) NOT NULL,
  `Name_market` varchar(50) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`ID_market`, `Name_market`, `username`, `password`) VALUES
('00', 'ไทยชนะ', 'thaiwin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `order_food`
--

CREATE TABLE `order_food` (
  `ID_market` char(2) DEFAULT NULL,
  `ID_food` char(3) DEFAULT NULL,
  `status_ID` char(1) DEFAULT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_food`
--

INSERT INTO `order_food` (`ID_market`, `ID_food`, `status_ID`, `Date`) VALUES
('00', '000', '0', '2020-01-01 10:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_ID` char(1) NOT NULL,
  `status_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_ID`, `status_name`) VALUES
('0', 'process'),
('1', 'ready'),
('3', 'cancel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_food`
--
ALTER TABLE `list_food`
  ADD PRIMARY KEY (`ID_food`),
  ADD KEY `FK_food_to_market` (`ID_market`);

--
-- Indexes for table `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`ID_market`);

--
-- Indexes for table `order_food`
--
ALTER TABLE `order_food`
  ADD KEY `FK_order_to_market` (`ID_market`),
  ADD KEY `FK_order_to_food` (`ID_food`),
  ADD KEY `FK_order_to_status` (`status_ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list_food`
--
ALTER TABLE `list_food`
  ADD CONSTRAINT `FK_food_to_market` FOREIGN KEY (`ID_market`) REFERENCES `market` (`ID_market`);

--
-- Constraints for table `order_food`
--
ALTER TABLE `order_food`
  ADD CONSTRAINT `FK_order_to_food` FOREIGN KEY (`ID_food`) REFERENCES `list_food` (`ID_food`),
  ADD CONSTRAINT `FK_order_to_market` FOREIGN KEY (`ID_market`) REFERENCES `market` (`ID_market`),
  ADD CONSTRAINT `FK_order_to_status` FOREIGN KEY (`status_ID`) REFERENCES `status` (`status_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
