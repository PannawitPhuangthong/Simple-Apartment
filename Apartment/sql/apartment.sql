-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 12:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apartment`
--

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `ct_id` int(5) NOT NULL,
  `ct_date` date NOT NULL,
  `rm_deposit` int(6) NOT NULL DEFAULT 0,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `Ccm_id` int(20) NOT NULL,
  `Crm_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cm_id` int(20) NOT NULL,
  `cm_name` varchar(100) NOT NULL,
  `cm_tel` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cm_id`, `cm_name`, `cm_tel`, `address`, `password`) VALUES
(1, 'admin1', 'vv', '', 'admin1'),
(111111111, 'ฟ', '88', 'ฟหกฟหกฟหก', '1234'),
(111111116, 'ฟฟฟฟฟ', 'ฟฟฟฟฟฟ', 'ฟฟฟฟฟฟ', 'ฟฟฟฟฟฟ');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `rc_id` int(5) NOT NULL,
  `rc_date` date NOT NULL,
  `due_date` date NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `total_price` int(6) NOT NULL DEFAULT 0,
  `date_book` date NOT NULL,
  `Rcm_id` int(20) NOT NULL,
  `Rrm_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `rm_id` int(5) NOT NULL,
  `tr_id` varchar(5) NOT NULL,
  `rm_status` varchar(5) NOT NULL,
  `rm_details` text DEFAULT NULL,
  `rm_floors` varchar(20) NOT NULL,
  `rm_monthprice` int(11) NOT NULL DEFAULT 0,
  `rm_dayprice` int(11) NOT NULL DEFAULT 0,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `rm_deposit` int(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rm_id`, `tr_id`, `rm_status`, `rm_details`, `rm_floors`, `rm_monthprice`, `rm_dayprice`, `date_in`, `date_out`, `rm_deposit`) VALUES
(101, '1', 'ไม่ว่าง', 'ห้องใหญ่ๆ1ห้อง', '1', 4500, 500, '2567-07-01', '0000-00-00', 500),
(102, '2', 'ว่าง', 'ห้องเล็ก1ห้อง', '1', 4000, 500, '0000-00-00', '0000-00-00', 500),
(201, '1', 'ว่าง', 'ห้องใหญ่ๆ1ห้อง', '2', 4500, 500, '0000-00-00', '0000-00-00', 500),
(202, '2', 'ว่าง', 'ห้องเล็ก1ห้อง', '2', 4000, 500, '0000-00-00', '0000-00-00', 500),
(301, '1', 'ว่าง', 'ห้องใหญ่ๆ1ห้อง', '3', 4500, 500, '0000-00-00', '0000-00-00', 500),
(302, '2', 'ว่าง', 'ห้องเล็ก1ห้อง', '3', 4000, 500, '0000-00-00', '0000-00-00', 500);

-- --------------------------------------------------------

--
-- Table structure for table `type_room`
--

CREATE TABLE `type_room` (
  `tr_id` varchar(5) NOT NULL,
  `tr_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_room`
--

INSERT INTO `type_room` (`tr_id`, `tr_name`) VALUES
('1', 'ห้องใหญ่'),
('2', 'ห้องเล็ก');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`ct_id`),
  ADD KEY `Ccm_id` (`Ccm_id`),
  ADD KEY `Crm_id` (`Crm_id`),
  ADD KEY `rm_deposit` (`rm_deposit`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`rc_id`),
  ADD KEY `cm_id` (`Rcm_id`),
  ADD KEY `rm_id` (`Rrm_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`rm_id`),
  ADD KEY `tr_id` (`tr_id`),
  ADD KEY `idx_rm_deposit` (`rm_deposit`);

--
-- Indexes for table `type_room`
--
ALTER TABLE `type_room`
  ADD PRIMARY KEY (`tr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `ct_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cm_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111111117;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `rc_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rm_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `Ccm_id` FOREIGN KEY (`Ccm_id`) REFERENCES `customer` (`cm_id`),
  ADD CONSTRAINT `Crm_id` FOREIGN KEY (`Crm_id`) REFERENCES `rooms` (`rm_id`),
  ADD CONSTRAINT `rm_deposit` FOREIGN KEY (`rm_deposit`) REFERENCES `rooms` (`rm_deposit`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `cm_id` FOREIGN KEY (`Rcm_id`) REFERENCES `customer` (`cm_id`),
  ADD CONSTRAINT `rm_id` FOREIGN KEY (`Rrm_id`) REFERENCES `rooms` (`rm_id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `tr_id` FOREIGN KEY (`tr_id`) REFERENCES `type_room` (`tr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
