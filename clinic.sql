-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 10:18 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `a_date` varchar(255) NOT NULL,
  `a_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `p_id`, `a_date`, `a_time`) VALUES
(1, 2, '2021-11-01', '06:56'),
(2, 2, '2021-10-15', '00:12'),
(9, 6, '2021-11-01', '08:56'),
(10, 0, '2021-11-15', '13:11'),
(11, 0, '2021-11-10', '22:13'),
(12, 0, '2021-11-10', '22:11');

-- --------------------------------------------------------

--
-- Table structure for table `dite`
--

CREATE TABLE `dite` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `dite_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dite`
--

INSERT INTO `dite` (`id`, `p_id`, `dite_name`) VALUES
(3, 2, 'diet is the sum of food consumed by a person or other organism.[1] The word diet often implies the use of specific intake of nutrition for health or weight-management reasons (with the two often being related). Although humans are omnivores, each culture and each person holds some food preferences or some food taboos. This may be due to personal tastes or ethical reasons. Individual dietary choices may be more or less healthy.'),
(6, 6, 'this is my diet');

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `m_name` varchar(500) NOT NULL,
  `descrption` varchar(500) NOT NULL,
  `dose` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medications`
--

INSERT INTO `medications` (`id`, `p_id`, `m_name`, `descrption`, `dose`) VALUES
(2, 2, 'med 1', 'this is med 1', 'this is med 1 12e4234324'),
(4, 5, 's', 'sdfsdf', 'sdfsdaf'),
(5, 6, 'med 1111', 'med1 med1fsdf', 'med1 sdfdfs'),
(6, 6, 'med 1111', 'asdasd', 'asdasd'),
(7, 6, 'asdasd', 'asdsad', 'asdasd'),
(8, 6, 'sadasdas', 'asdasda', 'asdsadas'),
(9, 6, 'sadasdas', 'asdasdas', 'sdasdsadas'),
(10, 6, 'asdasdda', 'asdasdsa', 'asdsadas'),
(11, 11, 'med 1', 'this is med 1', 'this is med 1');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `r_num` int(14) NOT NULL,
  `cond` varchar(500) NOT NULL,
  `physician_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `fname`, `birthday`, `r_num`, `cond`, `physician_id`) VALUES
(2, 'test test test', '2021-10-15', 123, 'testttttt', 2),
(3, 'test1 test1 test1', '2021-07-14', 1234567, 'test test', 2),
(5, 'rt', '2021-10-13', 234, 'testttttt', 2),
(6, 'test test', '2021-10-13', 12345678, 'ttttttttttttttttttttttt', 1),
(8, 'farah farah', '2021-11-16', 123, 'asdsadas', 1),
(9, 'first patient', '2021-11-11', 123456, 'condition', 1),
(10, 'second patient', '2021-11-28', 1234567, 'condition', 1),
(11, '1th patient', '2021-11-16', 123, 'condition', 7);

-- --------------------------------------------------------

--
-- Table structure for table `physical_activity`
--

CREATE TABLE `physical_activity` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `activity` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `physical_activity`
--

INSERT INTO `physical_activity` (`id`, `p_id`, `activity`) VALUES
(3, 2, 'this is activity');

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `symptom` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`id`, `p_id`, `symptom`) VALUES
(1, 6, 'Fever'),
(2, 6, 'Breathing difficulties'),
(3, 6, 'efdwesfc'),
(4, 6, 'asdsad');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(7, 'farah', 'farah', 'farah@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dite`
--
ALTER TABLE `dite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medications`
--
ALTER TABLE `medications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physical_activity`
--
ALTER TABLE `physical_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dite`
--
ALTER TABLE `dite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medications`
--
ALTER TABLE `medications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `physical_activity`
--
ALTER TABLE `physical_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
