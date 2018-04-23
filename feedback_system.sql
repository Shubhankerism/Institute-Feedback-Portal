-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2018 at 12:23 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback system`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `year` int(4) NOT NULL,
  `course` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`year`, `course`) VALUES
(2015, 'IPG'),
(2016, 'IPG'),
(2017, 'BCS'),
(2017, 'IMT'),
(2017, 'IMG');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` int(4) NOT NULL,
  `fname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `fname`) VALUES
(1, 'FACULTY 1'),
(2, 'FACULTY 2'),
(3, 'FACULTY 3'),
(4, 'FACULTY 4'),
(5, 'FACULTY 5'),
(6, 'FACULTY 6');

-- --------------------------------------------------------

--
-- Table structure for table `fac_sub`
--

CREATE TABLE `fac_sub` (
  `f_id` int(4) NOT NULL,
  `sub_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fac_sub`
--

INSERT INTO `fac_sub` (`f_id`, `sub_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `s_id` int(4) NOT NULL,
  `sub_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`s_id`, `sub_id`) VALUES
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(12, 1),
(4, 1),
(4, 2),
(4, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `form_count`
--

CREATE TABLE `form_count` (
  `id` int(11) NOT NULL,
  `sub_id` int(4) NOT NULL,
  `count` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_count`
--

INSERT INTO `form_count` (`id`, `sub_id`, `count`) VALUES
(1, 1, 4),
(2, 2, 3),
(3, 3, 3),
(4, 4, 3),
(5, 5, 3),
(6, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `f_id` int(4) NOT NULL,
  `sub_id` int(4) NOT NULL,
  `r1` int(4) NOT NULL,
  `r2` int(4) NOT NULL,
  `r3` int(4) NOT NULL,
  `r4` int(4) NOT NULL,
  `r5` int(4) NOT NULL,
  `r6` int(4) NOT NULL,
  `r7` int(4) NOT NULL,
  `r8` int(4) NOT NULL,
  `r9` int(4) NOT NULL,
  `r10` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`f_id`, `sub_id`, `r1`, `r2`, `r3`, `r4`, `r5`, `r6`, `r7`, `r8`, `r9`, `r10`) VALUES
(1, 1, 1, 1, 2, 1, 1, 2, 2, 4, 4, 5),
(2, 2, 2, 3, 3, 2, 3, 3, 3, 4, 2, 1),
(3, 3, 1, 3, 3, 3, 3, 3, 4, 4, 4, 2),
(4, 4, 2, 3, 3, 4, 4, 4, 4, 3, 3, 3),
(4, 4, 2, 3, 3, 4, 4, 4, 4, 3, 3, 3),
(4, 4, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(5, 5, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(4, 4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(4, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3),
(4, 4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(5, 5, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(6, 6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(3, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(6, 6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(6, 6, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(1, 1, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3),
(3, 3, 3, 2, 2, 3, 3, 3, 3, 3, 3, 3),
(3, 3, 3, 2, 2, 3, 3, 3, 3, 3, 3, 3),
(3, 3, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(4, 4, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(3, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(5, 5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 6, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 3, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 1, 2, 2, 1, 4, 3, 3, 3, 3, 4, 3),
(1, 1, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5),
(2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 3, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(4, 4, 1, 2, 3, 4, 5, 4, 3, 2, 1, 2),
(5, 5, 5, 5, 4, 4, 2, 4, 3, 4, 3, 2),
(6, 6, 5, 1, 3, 4, 3, 2, 5, 4, 3, 2),
(1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(1, 1, 1, 1, 1, 2, 2, 3, 3, 3, 2, 2),
(2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3),
(3, 3, 1, 1, 2, 1, 1, 1, 1, 1, 1, 1),
(4, 4, 2, 2, 1, 4, 5, 5, 5, 5, 5, 5),
(5, 5, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2),
(6, 6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(6, 6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(6, 6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(6, 6, 1, 2, 3, 4, 5, 4, 3, 2, 1, 2),
(6, 6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(6, 6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(6, 6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(6, 6, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(6, 6, 1, 1, 2, 2, 3, 3, 4, 4, 5, 5),
(1, 1, 1, 2, 4, 5, 5, 5, 5, 5, 5, 5),
(2, 2, 1, 2, 2, 3, 4, 5, 5, 5, 5, 5),
(3, 3, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5),
(4, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3),
(5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5),
(6, 6, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5),
(6, 6, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5),
(6, 6, 4, 4, 3, 3, 4, 3, 4, 4, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem` int(1) NOT NULL,
  `sub_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem`, `sub_id`) VALUES
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(4) NOT NULL,
  `year` int(4) NOT NULL,
  `course` varchar(3) NOT NULL,
  `roll_num` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `year`, `course`, `roll_num`) VALUES
(1, 2015, 'IPG', 1),
(2, 2016, 'IPG', 1),
(3, 2017, 'BCS', 1),
(4, 2016, 'IPG', 104),
(7, 2016, 'IPG', 101),
(8, 2016, 'IPG', 70),
(9, 2016, 'IPG', 41),
(11, 2016, 'IPG', 116),
(12, 2016, 'IPG', 74);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(4) NOT NULL,
  `sname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sname`) VALUES
(1, 'CN'),
(2, 'CS'),
(3, 'COA'),
(4, 'SAD'),
(5, 'DBMS'),
(6, 'IE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `form_count`
--
ALTER TABLE `form_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `form_count`
--
ALTER TABLE `form_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
