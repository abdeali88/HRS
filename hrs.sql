-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2019 at 07:38 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `reg_no` varchar(10) NOT NULL,
  `hostel_name` varchar(30) NOT NULL,
  `address` varchar(40) NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `hostel_contact` varchar(10) DEFAULT NULL,
  `floors` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `no_of_rooms` int(11) DEFAULT NULL,
  `fees` int(11) DEFAULT NULL,
  `mess` int(11) DEFAULT NULL,
  `wifi` int(11) DEFAULT NULL,
  `gym` int(11) DEFAULT NULL,
  `bank` int(11) DEFAULT NULL,
  `medical` int(11) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `amphi` int(11) DEFAULT NULL,
  `transport` int(11) DEFAULT NULL,
  `laundry` int(11) DEFAULT NULL,
  `study` int(11) DEFAULT NULL,
  `facilities` varchar(200) DEFAULT NULL,
  `man_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`reg_no`, `hostel_name`, `address`, `city`, `zip_code`, `hostel_contact`, `floors`, `capacity`, `no_of_rooms`, `fees`, `mess`, `wifi`, `gym`, `bank`, `medical`, `telephone`, `amphi`, `transport`, `laundry`, `study`, `facilities`, `man_email`) VALUES
('4415292600', 'Ramesh Hostel', '645, Baugh-E-Burhani, 3rd Floor, 1st Mil', 'Mumbai', '400001', '9665880882', 4, 140, 70, 582245, 0, 0, 1, 1, 0, 1, 0, 1, 0, 1, '', 'mariyam.a@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `reg_no` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `reg_no`) VALUES
(1, 'img 1.jpg', '2019-10-28 00:03:45', '4415292600'),
(2, 'img 2.jpg', '2019-10-28 00:03:45', '4415292600');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `email` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `bank_name` varchar(30) DEFAULT NULL,
  `branch_name` varchar(30) DEFAULT NULL,
  `account_no` varchar(20) DEFAULT NULL,
  `ifsc_code` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`email`, `name`, `password`, `contact`, `bank_name`, `branch_name`, `account_no`, `ifsc_code`) VALUES
('mariyam.a@gmail.com', 'Mariyam Arsiwala', 'Mariyam#123', '9665880882', 'Syndicate', 'Bhiwandi', '2154666365544', 'SYNB8453212');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `e_mail` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`e_mail`, `name`, `password`) VALUES
('abdeali.a@somaiya.edu', 'Abdeali Arsiwala', 'Abdeali#123'),
('deep.bd@somaiya.edu', 'Deep Doshi', 'Deep#123'),
('mohammed.a@somaiya.edu', 'mohammed arshan', 'Mohammed#123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`reg_no`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `account_no` (`account_no`),
  ADD UNIQUE KEY `ifsc_code` (`ifsc_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`e_mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
