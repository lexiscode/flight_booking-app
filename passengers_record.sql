-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 08:09 AM
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
-- Database: `flight_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `passengers_record`
--

CREATE TABLE `passengers_record` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone_no` varchar(128) NOT NULL,
  `crew` varchar(128) NOT NULL,
  `location_to` varchar(128) NOT NULL,
  `booking_time` time NOT NULL,
  `booking_date` date NOT NULL,
  `airline` varchar(128) NOT NULL,
  `fare` varchar(128) NOT NULL,
  `seat` varchar(128) NOT NULL,
  `customer_message` text DEFAULT NULL,
  `image_file` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passengers_record`
--

INSERT INTO `passengers_record` (`id`, `customer_name`, `email`, `phone_no`, `crew`, `location_to`, `booking_time`, `booking_date`, `airline`, `fare`, `seat`, `customer_message`, `image_file`) VALUES
(1, 'Elena Victoria', 'elena@gmail.com', '0902193922', '4', 'Los Angeles LAX', '07:07:00', '2023-06-25', 'Wiz Air', 'oneWay', '3C', 'Some contents', 'elena_pics.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passengers_record`
--
ALTER TABLE `passengers_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passengers_record`
--
ALTER TABLE `passengers_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
