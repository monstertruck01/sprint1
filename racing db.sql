-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 05:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `racing`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `complain_id` int(69) NOT NULL,
  `email` varchar(100) NOT NULL,
  `des` text NOT NULL,
  `sys_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`complain_id`, `email`, `des`, `sys_date`) VALUES
(1, 'koderrex@gmail.com', '\r\n zzzzz', '2023-06-12 21:33:08'),
(2, 'koderrex@gmail.com', '\r\n zzzzz', '2023-06-12 21:34:42'),
(3, 'codermwaka@gmail.com', '\r\n dddddddd', '2023-06-12 22:02:23'),
(4, 'dev@yahoo.com', '\r\n Not happy', '2023-06-13 05:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `forgot_password_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `forgot_password_date` datetime NOT NULL,
  `forgot_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forgot_password`
--

INSERT INTO `forgot_password` (`forgot_password_id`, `user_id`, `forgot_password_date`, `forgot_password`) VALUES
(41, 785, '2023-06-12 21:15:55', 'ouGkOMH3pY'),
(42, 785, '2023-06-12 21:17:01', 'Ti!!6!Cbvs'),
(43, 785, '2023-06-12 22:02:04', '$EsKUEblws');

-- --------------------------------------------------------

--
-- Table structure for table `races`
--

CREATE TABLE `races` (
  `race_id` int(50) NOT NULL,
  `race_tile` varchar(200) NOT NULL,
  `city` varchar(150) NOT NULL,
  `race_cat` varchar(200) NOT NULL,
  `race_des` text NOT NULL,
  `sys_date` datetime NOT NULL,
  `user_id` int(50) NOT NULL,
  `status` varchar(69) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `races`
--

INSERT INTO `races` (`race_id`, `race_tile`, `city`, `race_cat`, `race_des`, `sys_date`, `user_id`, `status`) VALUES
(7, 'race x', 'Newyork', 'November 23rd, 2023', '\r\nrace x description', '2023-06-12 04:55:32', 783, 'Rejected'),
(8, 'TX Subaru Race 2023', 'Dallas Tx', 'June 13th, 2023', '\r\nEntry Fee is £18 per class per round if pre-booked. Closing date for entries is 1 week prior to the event, or when full. Entry only accepted & confirmed when paid. Refunds only given if cancelled at least 7 days prior to meeting. \r\n\r\nAfter you have submitted this form please send a paypal payment to worksoprcc@hotmail.com for the correct amount, £18 x number entries. Please send payment by friends and family and put your name as the payment reference so we know who you are.\r\n\r\nIf the meeting is full after you have submitted your entry and paid, you will be contacted.\r\n---------------------------------------------------------------------------------\r\n\r\nRace Dates:\r\n\r\nRound 1 - Sunday 8th October 23\r\nRound 2 - Sunday 12th November 23\r\nRound 3 - Sunday 26th November 23\r\nSpecial event - Sat & Sun 13/14th January 24 (details to be confirmed for this.)\r\nRound 4 - Sunday 4th February 24\r\nRound 5 - Sunday 25th February 24\r\nRound 6 - Sunday 24th March 24', '2023-06-12 13:52:27', 783, 'Approved'),
(9, 'Lexus competition', 'Totorontop', 'November 23rd, 2023', '\r\nfor lexus cars', '2023-06-12 18:36:15', 783, 'Approved'),
(10, 'Toyoyo race', 'Toronto', 'June 13th, 2023', '\r\ntoyota', '2023-06-12 22:04:16', 783, 'Approved'),
(11, 'Sclass race', 'Alaska', '3nov,203', '\r\ndesc', '2023-06-13 05:13:06', 783, 'Not Approved');

-- --------------------------------------------------------

--
-- Table structure for table `race_app`
--

CREATE TABLE `race_app` (
  `job_app_id` int(11) NOT NULL,
  `cover` text NOT NULL,
  `cv` varchar(140) NOT NULL,
  `sys_date` varchar(20) NOT NULL,
  `status` int(30) NOT NULL,
  `race_id` int(60) NOT NULL,
  `user_id` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `race_app`
--

INSERT INTO `race_app` (`job_app_id`, `cover`, `cv`, `sys_date`, `status`, `race_id`, `user_id`) VALUES
(12, 'I want this race\r\n ', '', '2023-06-12 14:13:36', 0, 8, 784),
(13, '\r\n i want to see this race', '', '2023-06-12 14:58:41', 0, 8, 784),
(14, '\r\n ddgdggfgfgfgff', '', '2023-06-12 18:35:06', 0, 7, 784),
(15, 'I want this race\r\n ', '', '2023-06-13 05:03:10', 0, 9, 784),
(16, '\r\n good', '', '2023-06-13 05:15:36', 0, 11, 784);

-- --------------------------------------------------------

--
-- Table structure for table `raw_pass`
--

CREATE TABLE `raw_pass` (
  `raw_pass_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `raw_pass` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `raw_pass`
--

INSERT INTO `raw_pass` (`raw_pass_id`, `user_id`, `raw_pass`) VALUES
(33, 768, 'admin!#'),
(34, 769, 'jmwaka'),
(35, 770, 'Dev!#'),
(55, 781, 'jobseekers@gmail.com'),
(54, 780, 'jobseeker@gmail.com'),
(53, 779, 'emp_test@gmail.com'),
(52, 778, 'emp_test@gmail.com'),
(56, 782, 'organizer@gmail.com'),
(57, 783, 'organizer@gmail.com'),
(58, 784, 'customer@gmail.com'),
(59, 785, 'userx@gmail.com'),
(60, 786, 'organizer2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `level` varchar(11) DEFAULT NULL,
  `approved` int(4) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `com` varchar(234) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `idno` varchar(20) NOT NULL,
  `staffno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `timestamp`, `level`, `approved`, `phone`, `link`, `com`, `fname`, `mname`, `lname`, `idno`, `staffno`) VALUES
(17, 'admin', 'root@dddddd.com', '$2y$10$xF9Vs/KE5K9rLraq/yJ6kOhkYL16RrANVhx3C8ccCMV/MQXZ9wah6', '2020-09-01 20:24:28', '1497', 666, '1', '18', 'activated', 'Root', '', '', '', ''),
(770, 'dev@yahoo.com', 'dev@yahoo.com', '$2y$10$kvdhOma5ToL.6PtqdN7IGO77jhWa8ua.byWHPs59N2toXnqHEWXOu', '2023-02-27 21:13:14', '1497', 666, '0787878877', '770', 'f02bb4dfa17ca792fef2a434630182a6', 'Joseph', 'Mwaka', 'Wambua', '26947107', 'MIR666'),
(783, 'organizer@gmail.com', 'organizer@gmail.com', '$2y$10$0fejyefHNQPHK9hFl4YLW.qDdG7q4reyZweGeZIHmiTMIv6qdlkPq', '2023-06-12 04:28:49', 'organizer', 0, '', '783', '02593e749c6e77a00ef106a84f4ffd88', '', '', '', '', ''),
(784, 'customer@gmail.com', 'customer@gmail.com', '$2y$10$78wt3s6y2k5qFx/DGhOAD.IuxFIURvuU2DG.cW4xDozc6GiO.N2M6', '2023-06-12 04:36:14', 'customer', 0, '', '784', '6a8a086492253d0f5c2c0230973b1238', '', '', '', '', ''),
(785, 'userx@gmail.com', 'userx@gmail.com', '$2y$10$lrE1z3jUgGaauCj4LJA5auvXHt0jH85Me7T/rUpUw02oNhciVtFIS', '2023-06-12 21:13:23', 'organizer', 0, '', '785', 'fe27a723731535987c6f4abcc5cebbd8', '', '', '', '', ''),
(786, 'organizer2@gmail.com', 'organizer2@gmail.com', '$2y$10$./wNN4I1EqCAeye27zMTTu.92ZBU6szsBYlhGu/6fAhniSfMW2VgG', '2023-06-13 05:00:09', 'organizer', 0, '', '786', '821a7321884a496f0db261ad4fecdc8f', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_state`
--

CREATE TABLE `user_state` (
  `user_state_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `user_state` int(10) NOT NULL,
  `user_state_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_state`
--

INSERT INTO `user_state` (`user_state_id`, `user_id`, `user_state`, `user_state_date`) VALUES
(1, 751, 0, '2022-05-24 12:40:21'),
(2, 752, 0, '2022-05-24 12:41:09'),
(3, 753, 0, '2022-05-24 12:41:55'),
(4, 754, 0, '2022-06-16 03:17:25'),
(5, 755, 0, '2022-06-18 14:45:13'),
(6, 756, 0, '2022-08-22 17:35:45'),
(7, 757, 0, '2022-09-17 09:55:49'),
(8, 758, 0, '2022-10-04 08:07:40'),
(9, 759, 0, '2022-10-04 08:10:11'),
(10, 760, 0, '2022-10-04 08:11:17'),
(11, 761, 0, '2022-10-04 08:12:35'),
(12, 762, 0, '2022-10-04 08:13:35'),
(13, 763, 0, '2022-10-04 08:16:48'),
(14, 764, 0, '2022-10-04 08:18:51'),
(15, 765, 0, '2022-10-04 08:21:21'),
(16, 766, 0, '2022-10-04 08:22:15'),
(17, 767, 0, '2022-10-04 08:23:29'),
(18, 768, 0, '2022-10-04 08:24:49'),
(19, 769, 0, '2022-10-04 08:25:51'),
(20, 770, 0, '2022-10-04 08:26:41'),
(21, 771, 0, '2022-10-04 08:28:45'),
(22, 772, 0, '2022-10-04 08:29:37'),
(23, 758, 0, '2022-10-13 14:08:18'),
(24, 759, 0, '2022-10-14 10:28:38'),
(25, 760, 0, '2022-10-15 10:50:37'),
(26, 761, 0, '2022-10-17 14:22:21'),
(27, 762, 0, '2022-10-17 14:50:45'),
(28, 763, 0, '2022-10-17 14:58:03'),
(29, 764, 0, '2022-10-17 16:14:40'),
(30, 765, 0, '2022-10-18 12:35:41'),
(31, 766, 0, '2022-10-31 09:10:43'),
(32, 767, 0, '2022-10-31 11:51:14'),
(33, 768, 0, '2022-11-02 08:42:45'),
(34, 769, 0, '2023-01-26 13:03:53'),
(35, 770, 0, '2023-02-27 21:13:14'),
(36, 771, 0, '2023-02-27 21:19:34'),
(37, 772, 0, '2023-04-06 08:30:32'),
(38, 773, 0, '2023-04-17 13:19:05'),
(39, 774, 0, '2023-04-29 05:23:39'),
(40, 775, 0, '2023-05-09 16:19:37'),
(41, 776, 0, '2023-05-09 16:25:28'),
(42, 777, 0, '2023-05-25 05:06:08'),
(43, 778, 0, '2023-05-25 05:15:52'),
(44, 779, 0, '2023-05-25 06:33:50'),
(45, 780, 0, '2023-05-25 06:34:40'),
(46, 781, 0, '2023-05-25 10:08:54'),
(47, 782, 0, '2023-06-12 04:23:13'),
(48, 783, 0, '2023-06-12 04:28:49'),
(49, 784, 0, '2023-06-12 04:36:14'),
(50, 785, 0, '2023-06-12 21:13:23'),
(51, 786, 0, '2023-06-13 05:00:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`complain_id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`forgot_password_id`);

--
-- Indexes for table `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`race_id`);

--
-- Indexes for table `race_app`
--
ALTER TABLE `race_app`
  ADD PRIMARY KEY (`job_app_id`);

--
-- Indexes for table `raw_pass`
--
ALTER TABLE `raw_pass`
  ADD PRIMARY KEY (`raw_pass_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_state`
--
ALTER TABLE `user_state`
  ADD PRIMARY KEY (`user_state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `complain_id` int(69) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `forgot_password_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `races`
--
ALTER TABLE `races`
  MODIFY `race_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `race_app`
--
ALTER TABLE `race_app`
  MODIFY `job_app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `raw_pass`
--
ALTER TABLE `raw_pass`
  MODIFY `raw_pass_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=787;

--
-- AUTO_INCREMENT for table `user_state`
--
ALTER TABLE `user_state`
  MODIFY `user_state_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
