-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2021 at 04:55 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `members_status`
--

CREATE TABLE `members_status` (
  `bb2_id` int(100) NOT NULL,
  `bb2_membersphoto` varchar(255) NOT NULL,
  `bb2_batch` text NOT NULL,
  `bb2_app_id` varchar(255) NOT NULL,
  `bb2_ln` varchar(255) NOT NULL,
  `bb2_fn` varchar(255) NOT NULL,
  `bb2_mn` varchar(255) NOT NULL,
  `bb2_sfx` varchar(255) NOT NULL,
  `bb2_cn` varchar(255) NOT NULL,
  `bb2_desprov` varchar(255) NOT NULL,
  `bb2_desmunic` varchar(255) NOT NULL,
  `bb2_datebirthm` varchar(255) NOT NULL,
  `bb2_datebirthd` varchar(255) NOT NULL,
  `bb2_datebirthy` varchar(255) NOT NULL,
  `bb2_blood` varchar(255) NOT NULL,
  `bb2_civil` varchar(255) NOT NULL,
  `bb2_cper` varchar(255) NOT NULL,
  `bb2_cpernum` varchar(255) NOT NULL,
  `bb2_registered_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members_status`
--

INSERT INTO `members_status` (`bb2_id`, `bb2_membersphoto`, `bb2_batch`, `bb2_app_id`, `bb2_ln`, `bb2_fn`, `bb2_mn`, `bb2_sfx`, `bb2_cn`, `bb2_desprov`, `bb2_desmunic`, `bb2_datebirthm`, `bb2_datebirthd`, `bb2_datebirthy`, `bb2_blood`, `bb2_civil`, `bb2_cper`, `bb2_cpernum`, `bb2_registered_date`) VALUES
(137, '', '1', '123', 'asd', 'asd', 'asd', '', '12345', 'asd', 'asd', '1', '1', '1234', 'a', 'asd', 'asd', '123', '2021-11-11 04:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `nha_users`
--

CREATE TABLE `nha_users` (
  `nha_bp2_user_id` int(100) NOT NULL,
  `nha_bp2_fn` text NOT NULL,
  `nha_bp2_ln` text NOT NULL,
  `nha_bp2_mn` text DEFAULT NULL,
  `nha_bp2_sfx` text DEFAULT 'NULL',
  `nha_bp2_cn` text NOT NULL,
  `nha_bp2_email` text NOT NULL,
  `nha_bp2_password` text NOT NULL,
  `nha_bp2_cpassword` text NOT NULL,
  `nha_bp2_ln_acc_type` int(1) NOT NULL,
  `bb2_registered_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nha_users`
--

INSERT INTO `nha_users` (`nha_bp2_user_id`, `nha_bp2_fn`, `nha_bp2_ln`, `nha_bp2_mn`, `nha_bp2_sfx`, `nha_bp2_cn`, `nha_bp2_email`, `nha_bp2_password`, `nha_bp2_cpassword`, `nha_bp2_ln_acc_type`, `bb2_registered_date`) VALUES
(4, 'Marvin', 'Capangpangan', 'M.', '', '123', 'marvin.capangpangan@nha.gov.ph', 'cosdd_password', 'cosdd_password', 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members_status`
--
ALTER TABLE `members_status`
  ADD PRIMARY KEY (`bb2_id`);

--
-- Indexes for table `nha_users`
--
ALTER TABLE `nha_users`
  ADD PRIMARY KEY (`nha_bp2_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members_status`
--
ALTER TABLE `members_status`
  MODIFY `bb2_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `nha_users`
--
ALTER TABLE `nha_users`
  MODIFY `nha_bp2_user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
