-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 03:09 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_raizen`
--

-- --------------------------------------------------------

--
-- Table structure for table `activation_code`
--

CREATE TABLE `activation_code` (
  `id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `activation_code` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activation_code`
--

INSERT INTO `activation_code` (`id`, `guest_id`, `activation_code`, `is_active`) VALUES
(1, 1, 366843, 1),
(2, 2, 928572, 1),
(3, 5, 836174, 1),
(4, 6, 971179, 1),
(5, 12, 637877, 1),
(6, 13, 418726, 1),
(7, 14, 963120, 1),
(8, 15, 226602, 1),
(9, 17, 280233, 1),
(10, 18, 236691, 1),
(11, 19, 144112, 1),
(12, 20, 250075, 1),
(13, 21, 291026, 1),
(14, 22, 618136, 1),
(15, 23, 902181, 1),
(16, 24, 515007, 1),
(17, 25, 655086, 1),
(18, 26, 717276, 1),
(19, 27, 474313, 1),
(20, 28, 983938, 1),
(21, 29, 565205, 1),
(22, 30, 231865, 1),
(23, 31, 798037, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`) VALUES
(1, 'Administrator', 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contactno` varchar(13) NOT NULL,
  `is_activated` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `address`, `email`, `contactno`, `is_activated`) VALUES
(1, 'test', 'test', 'test', 'test', 'test', '2626 Suez St. Brgy. Sta Cruz456', 'michaelababao200@gmail.com', '09052950486', 0),
(2, 'test2', 'test2', 'test2', 'test2', 'test2', '2626 Suez St. Brgy. Sta Cruz456', 'michaelababao200@gmail.com', '09052950486', 0),
(3, 'test2', 'test2', 'test2', 'test2', 'test2', '2626 Suez St. Brgy. Sta Cruz456', 'michaelababao200@gmail.com', '09052950486', 0),
(4, 'test2', 'register', 'test2', 'test2', 'test2', '2626 Suez St. Brgy. Sta Cruz456', 'michaelababao200@gmail.com', '09052950486', 0),
(5, 'test5', 'test2', 'test2', 'test2', 'test2', 'test2', 'michaelababao200@gmail.com', 'test2', 0),
(6, 'test3', 'test3', 'test3', 'test3', 'test3', '2626 Suez St. Brgy. Sta Cruz456', 'michaelababao200@gmail.com', '09052950486', 0),
(7, 'testx', 'testx', 'testx', 'testx', 'testx', 'testx', 'sample@gmail.com', '09052950486', 0),
(8, 'testx', 'testx', 'testx', 'testx', 'testx', 'testx', 'sample@gmail.com', '09052950486', 0),
(9, 'testb', 'testb', 'testb', 'testb', 'testb', 'testb', 'michaelababao200@gmail.com', '09052950486', 0),
(10, 'testb', 'testb', 'testb', 'testb', 'testb', 'testb', 'michaelababao200@gmail.com', '09052950486', 0),
(11, 'testb', 'testb', 'testb', 'testb', 'testb', 'testb', 'michaelababao200@gmail.com', '09052950486', 0),
(12, 'testk', 'testk', 'testk', 'testk', 'testk', '2626 Suez St. Brgy. Sta Cruz456', 'michaelababao200@gmail.com', '09052950486', 0),
(13, 'testa', 'testk', 'testk', 'testk', 'testk', '2626 Suez St. Brgy. Sta Cruz456', 'michaelababao200@gmail.com', '09052950486', 0),
(14, 'testn', 'testk', 'testk', 'testk', 'testk', '2626 Suez St. Brgy. Sta Cruz456', 'michaelababao200@gmail.com', '09052950486', 0),
(15, 'testv', 'testk', 'testk', 'testk', 'testk', '2626 Suez St. Brgy. Sta Cruz456', 'michaelababao200@gmail.com', '09052950486', 0),
(16, 'testv', 'testk', 'testk', 'testk', 'testk', '2626 Suez St. Brgy. Sta Cruz456', 'michaelababao200@gmail.com', '09052950486', 0),
(17, 'testj', 'testj', 'testj', 'testj', 'testj', 'testj', 'michaelababao200@gmail.com', '09052950486', 1),
(18, 'qwerty', '280233', 'qwerty', 'qwerty', 'qwerty', '2626 Suez St. Brgy. Sta Cruz456', 'sample@gmail.com', '09052950486', 1),
(19, 'testing', 'testing', 'testing', 'testing', 'testing', '2626 Suez St. Brgy. Sta Cruz', 'michaelababao200@gmail.com', '09052950486', 0),
(20, 'xxx', 'is_activated', 'xxx', 'xxx', 'xxx', '2626 Suez St. Brgy. Sta Cruz', 'michaelababao200@gmail.com', '09052950486', 0),
(21, 'xxx123', 'xxx', 'xxx', 'xxx', 'xxx', '2626 Suez St. Brgy. Sta Cruz', 'michaelababao200@gmail.com', '09052950486', 0),
(22, 'xxx12345', '12345', 'xxx', 'xxx', 'xxx', '2626 Suez St. Brgy. Sta Cruz', 'michaelababao200@gmail.com', '09052950486', 0),
(23, 'hhhhhh', 'hhhhhh', 'hhhhhh', 'hhhhhh', 'hhhhhh', 'hhhhhh', 'michaelababao200@gmail.com', '09052950486', 0),
(24, 'bbbb', 'bbbb', 'hhhhhh', 'hhhhhh', 'hhhhhh', 'hhhhhh', 'michaelababao200@gmail.com', '09052950486', 0),
(25, 'qwerty123', 'qwerty', 'hhhhhh', 'hhhhhh', 'hhhhhh', 'hhhhhh', 'michaelababao200@gmail.com', '09052950486', 0),
(26, 'qwerty12345', 'qwerty', 'hhhhhh', 'hhhhhh', 'hhhhhh', 'hhhhhh', 'michaelababao200@gmail.com', '09052950486', 0),
(27, 'qwerty123456', 'qwerty', 'hhhhhh', 'hhhhhh', 'hhhhhh', 'hhhhhh', 'michaelababao200@gmail.com', '09052950486', 0),
(28, 'qwerty1234567', 'qwerty', 'hhhhhh', 'hhhhhh', 'hhhhhh', 'hhhhhh', 'michaelababao200@gmail.com', '09052950486', 1),
(29, 'abc123', 'abc123', 'qwerty', 'qwerty', 'qwerty', '2626 Suez St. Brgy. Sta Cruz456', 'michaelababao200@gmail.com', '09052950486', 1),
(30, 'abc12345', 'abc12345', 'abc12345', 'abc12345', 'abc12345', '2626 Suez St. Brgy. Sta Cruz', 'michaelababao200@gmail.com', '09052950486', 0),
(31, 'abc123456', '123', 'abc12345', 'abc12345', 'abc12345', '2626 Suez St. Brgy. Sta Cruz', 'michaelababao200@gmail.com', '09052950486', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `tour_id` int(11) NOT NULL,
  `tour_type` varchar(50) NOT NULL,
  `price` varchar(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`tour_id`, `tour_type`, `price`, `photo`) VALUES
(1, 'Ilocos Tour', '2499', 'ilocos.png'),
(2, 'Sagada Tour', '2499', 'sagada.png'),
(3, 'Baguio Tour', '1799', 'baguio.png'),
(4, 'Buscalan Tour', '2499', 'buscalan.png'),
(5, 'Baler Tour', '2100', 'baler.png'),
(6, 'Calaguas Tour', '2800', 'calaguas.png'),
(7, 'Caramoan Tour', '3600', 'caramoan.png'),
(8, 'Bicol Tour', '3900', 'bicol.png'),
(9, 'Anawangin Tour', '2700', 'anawangin.png'),
(12, 'Bulinao Hundred Islands', '2800', 'bulinao.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `tour_no` int(5) NOT NULL,
  `extra_participant` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `days` int(2) NOT NULL,
  `checkin` date NOT NULL,
  `checkin_time` time NOT NULL,
  `checkout` date NOT NULL,
  `checkout_time` time NOT NULL,
  `bill` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activation_code`
--
ALTER TABLE `activation_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guest_id` (`guest_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activation_code`
--
ALTER TABLE `activation_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activation_code`
--
ALTER TABLE `activation_code`
  ADD CONSTRAINT `activation_code_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
