-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 11:42 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL DEFAULT 'director',
  `password` varchar(200) NOT NULL,
  `dateposted` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `staff_id`, `name`, `department`, `role`, `type`, `password`, `dateposted`) VALUES
(1, 'HUM101', 'Paul Sola Moses', 'Human Anatomy', 'ICT', 'director', 'surveying', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `matric` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `year_enter` varchar(200) NOT NULL,
  `year_leave` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dateposted` varchar(100) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `matric`, `name`, `department`, `year_enter`, `year_leave`, `password`, `dateposted`, `type`) VALUES
(1, 'HAN394', 'Kayode Ayodeji', 'Human Anatomy', '2012', '2017', 'surveying', '2020-11-06', 'student'),
(2, 'STU2621', '      Kayode Dada ', '      Human Anatomy', '      1994', '   2001', ' password', '2020-11-06', 'student'),
(3, 'STU1987', 'Tunde Olumide', 'Physiology', '2001', '1994', 'password', '2020-11-06', 'student'),
(5, 'STU2298', 'Tunde Fadaunsi', 'MCB', '1993', '2001', 'password', '2020-11-06', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `webmasters`
--

CREATE TABLE `webmasters` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dateposted` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `webmasters`
--

INSERT INTO `webmasters` (`id`, `staff_id`, `type`, `department`, `name`, `role`, `password`, `dateposted`) VALUES
(2, 'ICT428', 'webmaster', 'Human Resource', 'Paul Sola Moses', 'Web developer', 'surveying', '2020-11-06'),
(12, 'ICT1947', 'webmaster', 'ICT', 'Olamide Oladele', 'Manager', 'surveying', '2020-11-06'),
(19, 'ICT667', 'webmaster', 'dsfg', 'zdfgh', '', 'sdfg', '2020-11-06'),
(20, 'ICT1199', 'webmaster', 'asdsf', 'asdf', '', 'sadf', '2020-11-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webmasters`
--
ALTER TABLE `webmasters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `webmasters`
--
ALTER TABLE `webmasters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
