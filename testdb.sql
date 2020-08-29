-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2018 at 06:19 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`id`, `email`, `status`) VALUES
(1, 'tove@gmail.com', 'read'),
(2, 'harish@gmail.com', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_by` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `comment_file` varchar(100) NOT NULL,
  `comment_status` varchar(100) NOT NULL,
  `comment_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_by`, `comment`, `comment_file`, `comment_status`, `comment_date`) VALUES
(37, 'chityalababloo@gmail.com', 'asdasxcas', 'beard.jpg\ncode.jpg\n', 'read', '05-08-2018 08:04:12 pm'),
(39, 'chityalababloo@gmail.com', 'wsdw', ' code.jpg', 'read', '05-08-2018 08:52:24 pm'),
(40, 'chityalababloo@gmail.com', 'qwsqwdsq', 'beard.jpg\n', 'read', '07-08-2018 09:26:18 pm');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_users`
--

CREATE TABLE `deleted_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `desig` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleted_users`
--

INSERT INTO `deleted_users` (`id`, `name`, `email`, `pwd`, `profile`, `gender`, `phone`, `desig`, `role`, `status`) VALUES
(8, 'Haley', 'haley@gmail.com', 'haleyhaley', '', 'Female', '7657674898', 'worker', 'user', 'inactive'),
(4, 'abcde', 'abcde@gmail.com', 'abcdeabcde', '', 'Male', '9898989898', 'Associate', 'user', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `desig` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pwd`, `profile`, `gender`, `phone`, `desig`, `role`, `status`) VALUES
(1, 'chityala', 'chityalababloo@gmail.com', 'BABLBABL', '', 'Male', '9898989898', 'HR', 'admin', 'active'),
(2, 'abhi', 'chityalababloo6@gmail.com', 'abhiabhi', '', 'Male', '9898278727', 'Head', 'user', 'inactive'),
(3, 'abcd', 'abcd@gmail.com', 'abcdabcd', '', 'Female', '9878789889', 'Technician', 'user', 'inactive'),
(5, 'sonu', 'sonu@gmail.com', 'sonusonu', '', 'Male', '7659998787', 'Engineer', 'user', 'inactive'),
(6, 'Hanu', 'han@hotmail.com', 'hanuhanu', '', 'Female', '2354657676', 'CEO', 'user', 'inactive'),
(7, 'abraham', 'abraham@gmail.com', 'abuabuabu', '', 'Male', '4567890987', 'Designer', 'user', 'inactive'),
(9, 'Isha', 'Isha@gmail.com', 'ishaisha', '', 'Female', '7487847876', 'Jr Engineer', 'user', 'inactive'),
(10, 'Harsha', 'harsha@gmail.com', 'harshaharsha', '', 'Male', '5498674365', 'Manager', 'user', 'inactive'),
(11, 'pawan', 'pawan@gmail.com', 'pawanpawan', '', 'Male', '9847874765', 'Technician', 'user', 'inactive'),
(12, 'Mahesh', 'mahesh@gmail.com', 'maheshmahi', '', 'Male', '8745989845', 'Analyst', 'user', 'inactive'),
(13, 'suraj', 'suraj@gmail.com', 'surajsuraj', '', 'Male', '7876779898', 'App Developer', 'user', 'inactive'),
(14, 'ajay', 'ajay@gmail.com', 'ajayajay', '', 'Male', '1234567892', 'Head', 'user', 'inactive'),
(15, 'Naveen', 'naveen@gmail.com', 'naveennav', '', 'Male', '7867463599', 'Recruiter', 'user', 'inactive'),
(16, 'yash', 'yash@gmail.com', 'yashyash', 'images/5b6ab7f91cc1e9.58972053.jpg', 'Male', '8767546534', 'Hr', 'user', 'inactive'),
(17, 'zarine', 'zarine@gmail.com', 'zarinzarin', 'images/5b6ab8cd0614f4.84539163.png', 'Female', '6565345265', 'Member', 'user', 'inactive'),
(18, 'cole', 'cole@gmail.com', 'colecole', 'images/5b6aba3f0fa4c1.40119767.png', 'Male', '7645435498', 'Head', 'user', 'inactive'),
(19, 'Tove', 'tove@gmail.com', 'tovetove', 'images/5b6abae853ece0.65382276.jpg', 'Female', '7656768798', 'scientist', 'user', 'inactive'),
(20, 'harish', 'harish@gmail.com', 'harishharish', 'harish.jpg', 'Male', '7377377377', 'DESIGNER', 'user', 'inactive'),
(21, 'Nina', 'abhi@gmail.com', 'ninanina', 'abhi.jpg', 'Female', '8735672656', 'Product Manager', 'user', 'inactive'),
(22, 'qdqwd', 'qweq@gmail.com', 'qqqqqqqqq', 'qweq.jpg', 'Female', '2332232342', 'edrwedwe', 'user', 'inactive'),
(23, 'qwedwqdewq', 'qedwqe@gmail.com', 'qwqwqwqw', 'qedwqe.jpg', 'Male', '2323232323', 'wfwfw', 'user', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
