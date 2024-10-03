-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 08:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `martial`
--

-- --------------------------------------------------------

--
-- Table structure for table `arts`
--

CREATE TABLE `arts` (
  `artsid` int(50) NOT NULL,
  `artsname` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arts`
--

INSERT INTO `arts` (`artsid`, `artsname`, `description`, `image`) VALUES
(5, 'Karatte2', 'sample des', '1657179092.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `card_number` varchar(200) NOT NULL,
  `expiry` varchar(200) NOT NULL,
  `cvv` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `name`, `card_number`, `expiry`, `cvv`, `amount`) VALUES
(1, 'vipin', '12345', '12/2024', 123, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookid` int(50) NOT NULL,
  `fk_reg_id` int(11) NOT NULL,
  `fk_master_id` int(11) NOT NULL,
  `fk_package_id` int(11) NOT NULL,
  `booking_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookid`, `fk_reg_id`, `fk_master_id`, `fk_package_id`, `booking_date`) VALUES
(11, 10, 0, 12, '2022-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedid` int(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `sender` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedid`, `subject`, `message`, `sender`, `date`) VALUES
(2, 'asd', 'sd', 'bibinpunnacka@gmail.com', '0000-00-00'),
(3, 'as', 'as', 'bibinpunnacka@gmail.com', '2022-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `usertype`) VALUES
('admin@gmail.com', 'admin', 'admin'),
('bibinpunnacka@gmail.com', '12345', 'student'),
('rajeshshiva@gmail.com', '12345', 'master'),
('vipinpkt@gmail.com', '123456', 'student'),
('vipinpunnacka@gmail.com', '12345', 'master');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `master_id` int(20) NOT NULL,
  `fk_art_id` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `profile` text NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`master_id`, `fk_art_id`, `full_name`, `profile`, `phone`, `email`, `gender`) VALUES
(10, 5, 'VIPIN ABRAHAM', 'new profile', '94963255055', 'vipinpunnacka@gmail.com', 'Male'),
(11, 5, 'Rajesh Shiva', 'new profile', '9496325506', 'rajeshshiva@gmail.com', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packgeid` int(20) NOT NULL,
  `package_title` varchar(200) NOT NULL,
  `fk_arts_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `cost` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packgeid`, `package_title`, `fk_arts_id`, `duration`, `cost`) VALUES
(12, 'PACKAGE 1', 5, 2, '2.00'),
(13, 'PACKAGE 2', 5, 336, '4000.00');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `reg_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `doj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`reg_id`, `name`, `address`, `phoneno`, `gender`, `emailid`, `dob`, `usertype`, `doj`) VALUES
(10, 'BIBIN ABRAHAM', 'Eravuchira P.O., Thottakad, Kottayam', '9496325505', 'Male', 'bibinpunnacka@gmail.com', '1986-11-22', 'student', '2022-07-07'),
(11, 'VINU ABRAHAM', 'Eravuchira P.O., Thottakad, Kottayam', '9496325505', 'Male', 'vipinpkt@gmail.com', '2000-12-22', 'student', '2022-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `scheduling`
--

CREATE TABLE `scheduling` (
  `scheduleid` int(50) NOT NULL,
  `time_from` varchar(50) NOT NULL,
  `time_to` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `fk_package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scheduling`
--

INSERT INTO `scheduling` (`scheduleid`, `time_from`, `time_to`, `date`, `fk_package_id`) VALUES
(9, '11', '12', '2022-07-22', 12),
(10, '10', '11', '2022-07-22', 13);

-- --------------------------------------------------------

--
-- Table structure for table `studentfee`
--

CREATE TABLE `studentfee` (
  `feeid` int(11) NOT NULL,
  `fk_book_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `pay_date` date DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentfee`
--

INSERT INTO `studentfee` (`feeid`, `fk_book_id`, `amount`, `due_date`, `pay_date`, `status`) VALUES
(6, 11, 6000, '2022-07-22', NULL, 'paid'),
(7, 11, 800, '2022-07-31', '2022-07-14', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `video_tips`
--

CREATE TABLE `video_tips` (
  `tips_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `video_url` text NOT NULL,
  `fk_arts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video_tips`
--

INSERT INTO `video_tips` (`tips_id`, `title`, `description`, `video_url`, `fk_arts_id`) VALUES
(2, 'Tip1', 'sample des', 'e64AtWekQVo', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arts`
--
ALTER TABLE `arts`
  ADD PRIMARY KEY (`artsid`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`master_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packgeid`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `scheduling`
--
ALTER TABLE `scheduling`
  ADD PRIMARY KEY (`scheduleid`);

--
-- Indexes for table `studentfee`
--
ALTER TABLE `studentfee`
  ADD PRIMARY KEY (`feeid`);

--
-- Indexes for table `video_tips`
--
ALTER TABLE `video_tips`
  ADD PRIMARY KEY (`tips_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arts`
--
ALTER TABLE `arts`
  MODIFY `artsid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `master_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packgeid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `reg_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `scheduling`
--
ALTER TABLE `scheduling`
  MODIFY `scheduleid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `studentfee`
--
ALTER TABLE `studentfee`
  MODIFY `feeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `video_tips`
--
ALTER TABLE `video_tips`
  MODIFY `tips_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
