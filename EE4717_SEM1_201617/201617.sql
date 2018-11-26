-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2018 at 10:20 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `201617`
--

-- --------------------------------------------------------

--
-- Table structure for table `itb`
--

CREATE TABLE `itb` (
  `itb_id` int(100) NOT NULL,
  `rft_id` int(100) NOT NULL,
  `users_id` int(100) NOT NULL,
  `cost` float NOT NULL,
  `duration` int(100) NOT NULL,
  `warranty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itb`
--

INSERT INTO `itb` (`itb_id`, `rft_id`, `users_id`, `cost`, `duration`, `warranty`) VALUES
(8020, 9020, 3002, 30000, 364, 300),
(8021, 9020, 3002, 20, 364, 300),
(8023, 9020, 3002, 200, 364, 300);

-- --------------------------------------------------------

--
-- Table structure for table `rft`
--

CREATE TABLE `rft` (
  `rft_id` int(100) NOT NULL,
  `itb_id` int(100) NOT NULL,
  `users_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sector` varchar(100) NOT NULL,
  `scope` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rft`
--

INSERT INTO `rft` (`rft_id`, `itb_id`, `users_id`, `title`, `sector`, `scope`, `description`) VALUES
(9020, 0, 3000, 'Make US great again', 'Financial', 'Economy', 'Build a whole new different world'),
(9021, 0, 3000, 'Make SG great again', 'Financial', 'Economy', 'Build a whole new different world'),
(9022, 0, 3000, 'Resolve Hunger Issues', 'Social', 'Social', 'Hunger is a world crisis that should be resolve asap');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `pidn` int(100) NOT NULL,
  `contact_no` varchar(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `coy_name` varchar(100) NOT NULL,
  `coy_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itb`
--
ALTER TABLE `itb`
  ADD PRIMARY KEY (`itb_id`);

--
-- Indexes for table `rft`
--
ALTER TABLE `rft`
  ADD PRIMARY KEY (`rft_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itb`
--
ALTER TABLE `itb`
  MODIFY `itb_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8024;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
