-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 05:58 PM
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
-- Database: `park`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`username`, `password`) VALUES
('admin@123', 'admin'),
('sanket@123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `final`
--

CREATE TABLE `final` (
  `slotid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `car_number` varchar(20) NOT NULL,
  `entry_date` varchar(100) NOT NULL,
  `Exit Date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `final`
--

INSERT INTO `final` (`slotid`, `name`, `address`, `phone`, `email`, `vehicle_type`, `car_number`, `entry_date`, `Exit Date`) VALUES
(3, 'Sanket Walhekar', 'At-Post Kamthadi', '9665998329', 'sanketwalhekar83@gmail.com', 'Motorcycle', 'MH 12 CG 4099', '', '2023-07-07 16:46:35.735175'),
(4, 'Sanket Walhekar', 'At-Post Kamthadi', '9665998329', 'sanketwalhekar83@gmail.com', 'Motorcycle', 'MH 12 CG 4099', '2023-07-07', '2023-07-07 16:46:35.735175'),
(1, 'Sanket Walhekar', 'At-Post Kamthadi', '9665998329', 'sanketwalhekar83@gmail.com', 'Car', 'MH 12 CG 4099', '2023-07-07 15:19:46.693368', '2023-07-07 16:46:35.735175'),
(2, 'Sanket Walhekar', 'At-Post Kamthadi', '9665998329', 'sanketwalhekar83@gmail.com', 'Car', 'MH 12 CG 4099', '2023-07-07 16:16:55.149205', '2023-07-07 16:46:35.735175'),
(2, 'Sanket Walhekar', 'At-Post Kamthadi', '9665998329', 'sanketwalhekar83@gmail.com', 'Motorcycle', 'MH 12 CG 4099', '2023-07-07 20:42:07.090798', '2023-07-07 16:48:30.286499'),
(2, 'Sanket Walhekar', 'At-Post Kamthadi', '9665998329', '18project03@gmail.com', 'Car', 'MH 12 CG 4099', '2023-07-07 22:31:22.823983', '2023-07-07 17:01:59.358952'),
(10, 'Sanket Walhekar', 'At-Post Kamthadi', '9665998329', 'fw19if002@gmail.com', 'Motorcycle', 'MH 12 CG 4099', '2023-07-07 22:55:04.128449', '2023-07-07 17:27:01.031532'),
(1, 'Sanket Walhekar', 'At-Post Kamthadi', '9665998329', 'fw19if002@gmail.com', 'Motorcycle', 'MH 12 CG 4099', '2023-07-07 22:55:31.047525', '2023-07-13 15:19:32.361392'),
(3, 'Walhekar', 'At-Post Kamthadi', '9665998329', '18project03@gmail.com', 'Car', 'MH 12 CG 4099', '2023-07-07 22:59:12.398244', '2023-07-13 15:19:39.545012'),
(3, 'Sanket Walhekar', 'At-Post Kamthadi Tal-Bhor Dist-Pune', '9665998320', '18project03@gmail.com', 'Car', 'MH 12 CG 4099', '2023-07-13 21:07:21.559556', '2023-07-14 16:54:07.124109'),
(1, 'Nilesh Walhekar', 'At-Post Kamthadi', '9665998329', 'niwalhekar13@gmail.com', 'Car', 'MH 12 CG 4099u', '2023-07-15 16:11:20.066885', '2023-07-15 10:48:05.486649'),
(3, 'Sanket Walhekar', 'At-Post Kamthadi Tal-Bhor Dist-Pune', '9665998320', '18project03@gmail.com', 'Motorcycle', 'MH 12 CG 4099', '2023-07-30 13:08:01.601381', '2023-07-30 07:39:48.955094'),
(2, 'Sanket Walhekar', 'At-Post Kamthadi', '9665998329', 'sanketwalhekar83@gmail.com', 'Motorcycle', 'MH 12 CG 4099', '2023-07-30 14:59:41.986859', '2023-07-30 09:30:15.980380');

-- --------------------------------------------------------

--
-- Table structure for table `parkingslot`
--

CREATE TABLE `parkingslot` (
  `slotid` int(10) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parkingslot`
--

INSERT INTO `parkingslot` (`slotid`, `status`) VALUES
(1, 'Reserved'),
(2, 'Available'),
(3, 'Reserved'),
(4, 'Available'),
(5, 'Available'),
(6, 'Available'),
(7, 'Available'),
(8, 'Available'),
(9, 'Available'),
(10, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `otp` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `email`, `phone`, `address`, `password`, `otp`) VALUES
('Sanket Walhekar', '18project03@gmail.com', '9665998320', 'At-Post Kamthadi Tal-Bhor Dist-Pune', '1234', 539841),
('Sanket Walhekar', 'fw19if002@gmail.com', '9665998329', 'At-Post Kamthadi', '1234', 748621),
('Nilesh Walhekar', 'niwalhekar13@gmail.com', '9665998329', 'At-Post Kamthadi', '123', 602198),
('Sanket Walhekar', 'sanketwalhekar83@gmail.com', '9665998329', 'At-Post Kamthadi', '1234', 535055);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_entries`
--

CREATE TABLE `vehicle_entries` (
  `slot_id` int(10) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `Number_Plate` varchar(100) NOT NULL,
  `Date_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`username`,`password`);

--
-- Indexes for table `parkingslot`
--
ALTER TABLE `parkingslot`
  ADD PRIMARY KEY (`slotid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `vehicle_entries`
--
ALTER TABLE `vehicle_entries`
  ADD PRIMARY KEY (`slot_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
