-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2017 at 10:49 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `userFullname` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userEadd` varchar(100) NOT NULL,
  `userType` enum('SYSADMIN','SUPERUSER','HR','USER') NOT NULL,
  `userStatus` enum('1','0') NOT NULL COMMENT '1 - is ACTIVE, 0 - INACTIVE',
  `userMod` varchar(50) NOT NULL,
  `userCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `emp_id`, `userFullname`, `userName`, `userPass`, `userEadd`, `userType`, `userStatus`, `userMod`, `userCreated`) VALUES
(16, '', 'jayavee', 'jay101', '123', '', 'SUPERUSER', '1', '', '2017-03-29 03:20:40'),
(17, '121212', 'randy', 'randy', '123', 'randy_inso', 'USER', '1', '', '2017-04-16 15:44:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
