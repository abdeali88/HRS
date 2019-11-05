-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 07:40 PM
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
  `address` varchar(75) NOT NULL,
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
  `man_email` varchar(50) DEFAULT NULL,
  `rating` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`reg_no`, `hostel_name`, `address`, `city`, `zip_code`, `hostel_contact`, `floors`, `capacity`, `no_of_rooms`, `fees`, `mess`, `wifi`, `gym`, `bank`, `medical`, `telephone`, `amphi`, `transport`, `laundry`, `study`, `facilities`, `man_email`, `rating`) VALUES
('4415292600', 'Ramesh Hostel', '645, Baugh-E-Burhani, 3rd Floor, 1st Mil', 'Mumbai', '400001', '8425953953', 4, 150, 70, 65000, 0, 0, 1, 1, 0, 1, 0, 1, 0, 1, 'Close from CST station', 'mariyam.a@gmail.com', 3),
('4415292604', 'Gamma Hostel', '101, Delta, Hiranandani Garden, Hiranand', 'Mumbai', '400076', '9874568899', 3, 110, 55, 65000, 1, 0, 1, 0, 1, 1, 1, 1, 0, 0, 'Close to Powai station', 'kumari.p@gmail.com', 4),
('4563289630', 'Alpha Hostel', '83 , Kaushalya Bhawan, Chappal Market, S', 'Delhi', '110006', '9875644789', 3, 120, 60, 90000, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 'Close from Delhi Metro Station', 'ramesh.g@gmail.com', 4),
('7854123306', 'Beta Hostel', '152 , / Manorama Ganj, Dey Tower', 'Bangalore', '452001', '9301247856', 5, 160, 80, 80000, 0, 1, 1, 0, 0, 1, 0, 1, 1, 1, 'Close to Bangalore Station', 'suresh.j@gmail.com', 4),
('7896541269', 'Delta Hostel', '22nd Baker Street, Cannaught Place', 'Delhi', '110006', '9874569985', 5, 300, 90, 85000, 1, 0, 1, 0, 0, 1, 1, 0, 1, 1, 'Close to Taj Mahal', 'kaka.b@gmail.com', 0),
('8987456632', 'Theta Hostel', '22, Caravan Street, Bangalore', 'Bangalore', '602230', '8965885632', 5, 600, 200, 68000, 1, 1, 0, 1, 0, 1, 1, 0, 0, 1, 'Close to Public Library and Railway Station', 'rakesh.roshan@gmail.com', 0);

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
(1, 'img 1.jpg', '2019-11-02 00:03:45', '4415292600'),
(2, 'img 2.jpg', '2019-11-03 00:00:00', '4415292600'),
(3, 'img 3.jpg', '2019-11-03 00:00:00', '4563289630'),
(4, 'img 4.jpg', '2019-11-03 00:00:00', '4563289630'),
(5, 'img 5.jpg', '2019-11-03 00:00:00', '7854123306'),
(6, 'img 6.jpg', '2019-11-03 00:00:00', '7854123306'),
(7, 'img 7.jpg', '2019-11-03 16:38:18', '4415292604'),
(8, 'img 8.jpg', '2019-11-03 16:38:18', '4415292604'),
(12, 'img 11.jpg', '2019-11-05 11:23:47', '7896541269'),
(13, 'img 12.jpg', '2019-11-05 11:23:47', '7896541269'),
(16, 'img 9.jpg', '2019-11-05 19:36:18', '8987456632'),
(17, 'img 10.jpg', '2019-11-05 19:36:18', '8987456632');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `email` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
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
('kaka.b@gmail.com', 'Kaka Verma', 'f20ee235fb81800bfd886bc9463874a3', '9658745632', 'HDFC Bank', 'Gurgaon', '78965412365478', 'HDFC8453214'),
('kumari.p@gmail.com', 'Kumari Patla', '16f94d98505e1dafa5618ed1cff14118', '9687456321', 'SBI Bank', 'Powai', '9874564789212', 'SBIB8453217'),
('mariyam.a@gmail.com', 'Mariyam Arsiwala', '9b7ad72d6846003e636ea4cf7ab781d9', '9665880882', 'Syndicate Bank', 'Bhiwandi', '2154666365544', 'SYNB8453212'),
('rakesh.roshan@gmail.com', 'Rakesh Roshan', '1592597010e5cfce2aa86ee0e137b2c1', '9875655663', '', '', '', ''),
('ramesh.g@gmail.com', 'Ramesh Gaikwad', '6167a812b75c0fd1945dc1a7b2b0afbc', '9863524123', 'Bank of India', 'Gurgaon', '7896541239852', 'BOIB8453142'),
('suresh.j@gmail.com', 'Suresh Jha', '7eb5c3ea3d5bb990cb7ede72a5d9f7f2', '8567456321', 'Yes Bank', 'Jayanagar', '6574123025632', 'YESB0000197');

-- --------------------------------------------------------

--
-- Table structure for table `student_regd`
--

CREATE TABLE `student_regd` (
  `aadhaar` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `institute` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `degree` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_no` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_regd`
--

INSERT INTO `student_regd` (`aadhaar`, `institute`, `degree`, `contact`, `course`, `year`, `address`, `email`, `reg_no`, `file_name`, `amount`, `check_in`, `check_out`) VALUES
('956502588832', 'KJSCE', 'Btech', '8242425411', 'CSE', '3', '645,Baugh-E-Burhani, 3rd Floor, 1st Millat Nagar, Bhiwandi', 'abdeali.a@somaiya.edu', '4415292600', 'img.jpg', 4583, '2019-11-03', '2019-12-21'),
('985558585858', 'KJSCE', 'Btech', '8242425444', 'CSE', '3', 'shivaji nagar no.2, dombivli ', 'deep.bd@somaiya.edu', '4415292600', 'img.jpg', 18333, '2019-11-03', '2020-03-29'),
('985632147893', 'VESIT', 'MBA', '9875655896', 'Business ', '2', 'shivaji nagar no.2, Delhi', 'darshan.c@somaiya.edu', '4563289630', 'img.jpg', 82500, '2019-12-01', '2020-10-31'),
('985655555555', 'KJSCE', 'Btech', '9875655896', 'IT', '4', 'Sivaji Park, bangalore', 'mihir.g@gmail.com', '8987456632', 'img.jpg', 136000, '2019-12-01', '2021-12-01'),
('985655656532', 'NIT Bangalore', 'Btech', '9887896556', 'IT', '1', '54, Cumen Street, bangalore', 'sardar.p@gmail.com', '8987456632', 'img.jpg', 68000, '2019-12-01', '2020-12-01'),
('987456658231', 'NMC', 'MBA', '9888965896', 'Business', '1', 'shivaji nagar no.2, Delhi', 'gaurang.a@gmail.com', '7896541269', 'img.jpg', 56666, '2019-12-16', '2020-09-05'),
('989895959696', 'IIT Bombay', 'Btech', '9895959595', 'CSE', '4', '54th, Kamli Street, bangalore', 'sahil.g@gmail.com', '4415292600', 'img.jpg', 48750, '2019-11-01', '2020-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `e_mail` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`e_mail`, `name`, `password`) VALUES
('abdeali.a@somaiya.edu', 'Abdeali Arsiwala', '80db84840fe4e5b2ee86b5105fab34c6'),
('darshan.c@somaiya.edu', 'Darshan Chheda', '327f8a0cb95fbe84c5aaec6f4ed3482c'),
('deep.bd@somaiya.edu', 'Deep Doshi', '2aa5fc6b633b15da746171760cfbfb60'),
('deep.dama@somaiya.edu', 'Deep Dama', '2aa5fc6b633b15da746171760cfbfb60'),
('gaurang.a@gmail.com', 'Gaurang Athavale', '6b143f1d08889153b6b5c1f58d112a60'),
('gaurav.b@gmail.com', 'Gaurav Bhagwanani', '31c33e2fe8ab9a09505f26ddae93f2a5'),
('mihir.g@gmail.com', 'Mihir Gada', 'b1c0a345e88fb5db2216654080a3ecce'),
('mohammed.a@somaiya.edu', 'mohammed arshan', 'd8a8652081aac72651e2a9f03cd1b322'),
('nikhil.b@gmail.com', 'Nikhil Bhardwaj', '0dff271b880081d20674fed4d45b00fc'),
('sahil.g@gmail.com', 'Sahil Gupta', '617f355763d90ebb6943fe3d7de97204'),
('sardar.p@gmail.com', 'Sardar Patel', '3756b42efe863a943ad49300a851588b'),
('sarthak.s@somaiya.edu', 'Sarthak Shah', 'b84cc21af579cad6829d72db77c634a6'),
('soham.g@gmail.com', 'soham gadhave', '5b43c51c8af9e80b7b789ab33e370eb7');

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
-- Indexes for table `student_regd`
--
ALTER TABLE `student_regd`
  ADD PRIMARY KEY (`aadhaar`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
