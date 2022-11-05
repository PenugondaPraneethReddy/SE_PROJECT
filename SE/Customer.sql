-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 05:34 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `p_id` int(30) NOT NULL,
  `p_fname` varchar(30) DEFAULT NULL,
  `p_lname` varchar(30) DEFAULT NULL,
  `p_age` varchar(30) DEFAULT NULL,
  `p_contact` varchar(20) DEFAULT NULL,
  `p_gender` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `t_no` int(11) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`p_id`, `p_fname`, `p_lname`, `p_age`, `p_contact`, `p_gender`, `email`, `password`, `t_no`, `location`) VALUES
(1, 'Rahul', 'Dravid', '42', '9090909090', 'Male', 'rahul@dravid.com', '123123123', 7, 'SJT'),
(2, 'Rahul', 'Dravid', '29', '1010101010', 'Male', 'qwe@w.cc', '123123123', NULL, NULL),
(4, 'qwe', 'qwe', '19', '1010101010', 'Male', '123@123.cc', '123123123', NULL, NULL),
(5, 'abc', 'sbc', '19', '9090909090', 'Male', 'abc@g.cc', '123123123', 12951, NULL),
(6, 'sumit', 'sharma', '20', '9999999999', 'Male', 'sharma@gmail.com', '123123123', 12951, NULL),
(7, 'dhruv', 'mehta', '20', '9191919191', 'Male', 'dhruv@gmail.com', '123123123', 16205, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `t_no` decimal(5,0) NOT NULL,
  `t_name` varchar(30) DEFAULT NULL,
  `t_city` varchar(30) DEFAULT NULL,
  `t_type` varchar(30) DEFAULT NULL,
  `t_status` varchar(20) DEFAULT 'Available',
  `no_of_spots` int(11) DEFAULT NULL,
  `t_duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`t_no`, `t_name`, `t_city`, `t_type`, `t_status`, `no_of_spots`, `t_duration`) VALUES
('4971', 'Central Station', 'Mumbai', 'Express', 'Available', 550, 10),
('12284', 'Pavilion mall ', 'Mumbai', 'Regular', 'Full', 800, 5),
('12859', 'City Hall', 'Kolkata', 'VIP', 'Available', 500, 2),
('12951', 'VIT University', 'Vellore', 'Regular', 'Available', 700, 15),
('16205', 'Express Avenue', 'Chennai', 'Regular', 'Full', 475, 60);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `m_id` int(30) NOT NULL,
  `m_name` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`m_id`, `m_name`, `email`, `password`) VALUES
(1, 'Ram', 'ram@gmail.com', '123123123'),
(2, 'farul', 'farul@gmail.com', 'farul123jet'),
(3, 'sultan', '123@123.cc', 'jaydev1234');

-- --------------------------------------------------------

--
-- Table structure for table `mensh`
--

CREATE TABLE `mensh` (
  `status` varchar(20) DEFAULT 'NBooked',
  `spot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mensh`
--

INSERT INTO `mensh` (`status`, `spot_id`) VALUES
('NBooked', 1),
('NBooked', 2),
('NBooked', 3),
('NBooked', 4),
('NBooked', 5),
('NBooked', 6);

-- --------------------------------------------------------

--
-- Table structure for table `sjt`
--

CREATE TABLE `sjt` (
  `status` varchar(20) DEFAULT 'NBooked',
  `spot_id` int(11) NOT NULL,
  `p_id` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sjt`
--

INSERT INTO `sjt` (`status`, `spot_id`, `p_id`) VALUES
('NBooked', 1, NULL),
('NBooked', 2, NULL),
('NBooked', 3, NULL),
('NBooked', 4, NULL),
('Blocked', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` int(11) NOT NULL,
  `s_fname` varchar(10) DEFAULT NULL,
  `s_lname` varchar(10) DEFAULT NULL,
  `s_department` varchar(20) NOT NULL,
  `s_salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `s_no` int(11) NOT NULL,
  `s_name` varchar(20) DEFAULT NULL,
  `s_no_of_platforms` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`s_no`, `s_name`, `s_no_of_platforms`) VALUES
(1, 'borivali', '8'),
(2, 'Baroda', '6'),
(3, 'Surat', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `PNR` decimal(10,0) NOT NULL,
  `t_status` varchar(20) NOT NULL DEFAULT 'Waiting',
  `t_fare` int(11) DEFAULT NULL,
  `p_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`PNR`, `t_status`, `t_fare`, `p_id`) VALUES
('8056124359', 'Confirmed', 650, 5),
('8851599875', 'Waiting', 540, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vit_m`
--

CREATE TABLE `vit_m` (
  `status` varchar(20) DEFAULT 'NBooked',
  `spot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vit_m`
--

INSERT INTO `vit_m` (`status`, `spot_id`) VALUES
('NBooked', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_id` (`p_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`t_no`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `mensh`
--
ALTER TABLE `mensh`
  ADD PRIMARY KEY (`spot_id`);

--
-- Indexes for table `sjt`
--
ALTER TABLE `sjt`
  ADD PRIMARY KEY (`spot_id`),
  ADD UNIQUE KEY `p_id` (`p_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD UNIQUE KEY `PNR` (`PNR`);

--
-- Indexes for table `vit_m`
--
ALTER TABLE `vit_m`
  ADD PRIMARY KEY (`spot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `p_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `m_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
