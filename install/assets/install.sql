-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2020 at 08:28 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sivs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sms_status` int(11) NOT NULL DEFAULT '1',
  `day_arrival_sms` int(10) NOT NULL DEFAULT '0',
  `day_departure_sms` int(10) NOT NULL DEFAULT '0',
  `board_arrival_sms` int(10) NOT NULL DEFAULT '0',
  `board_dept_sms` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `sms_status`, `day_arrival_sms`, `day_departure_sms`, `board_arrival_sms`, `board_dept_sms`) VALUES
(1, 'admin', 'admin', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dept_id` varchar(50) NOT NULL,
  `dept_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_id`, `dept_name`) VALUES
(1, '2374', 'SLT');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `cardnum` varchar(50) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `log_date` date NOT NULL,
  `log_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `arrival` text NOT NULL,
  `departure` text NOT NULL,
  `Sender` varchar(11) NOT NULL,
  `api_username` varchar(255) NOT NULL,
  `api_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `arrival`, `departure`, `Sender`, `api_username`, `api_password`) VALUES
(1, 'Hello _PARENT_, Your child/ward _CHILD_  _TYPE_. Thanks', 'Hello _PARENT_ , Your child/ward _CHILD_   _TYPE_. Thanks', 'CompCollege', 'lewa', '11toMtom.');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `tranx_id` varchar(50) NOT NULL,
  `cardnum` varchar(50) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `item_purchased` varchar(50) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `unit_balance` varchar(50) NOT NULL,
  `log_date` date NOT NULL,
  `log_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `school_address` text,
  `school_logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_name`, `school_address`, `school_logo`) VALUES
(1, 'Randoms College ', 'Default School Address', 'uploads/school/30102019182129490icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--
-- Error reading structure for table sivs.sms: #1932 - Table 'sivs.sms' doesn't exist in engine
-- Error reading data for table sivs.sms: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `sivs`.`sms`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `other_name` varchar(255) NOT NULL,
  `cardnum` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `class` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `sch_fees_status` varchar(50) NOT NULL,
  `std_img` varchar(100) NOT NULL,
  `std_type` varchar(50) NOT NULL,
  `adm_no` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `parent` varchar(100) NOT NULL,
  `date_reg` date NOT NULL,
  `blood_grp` varchar(10) DEFAULT NULL,
  `genotype` varchar(10) DEFAULT NULL,
  `allergies` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit_ctrl`
--

CREATE TABLE `unit_ctrl` (
  `id` int(11) NOT NULL,
  `cardnum` varchar(50) NOT NULL,
  `current_bal` varchar(50) NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_ctrl`
--

INSERT INTO `unit_ctrl` (`id`, `cardnum`, `current_bal`, `updatedAt`) VALUES
(1, 'BC17441F', '140', '2020-02-21 08:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `unit_log`
--

CREATE TABLE `unit_log` (
  `id` int(11) NOT NULL,
  `cardnum` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `amount_paid` varchar(50) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_log`
--

INSERT INTO `unit_log` (`id`, `cardnum`, `unit`, `amount_paid`, `createdAt`) VALUES
(1, 'BC17441F', '200', '2000', '2020-02-05 03:05:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_ctrl`
--
ALTER TABLE `unit_ctrl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_log`
--
ALTER TABLE `unit_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_ctrl`
--
ALTER TABLE `unit_ctrl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit_log`
--
ALTER TABLE `unit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
