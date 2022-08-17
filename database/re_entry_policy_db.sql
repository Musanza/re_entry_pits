-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 10:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `re_entry_policy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `commitments`
--

CREATE TABLE `commitments` (
  `id` int(5) NOT NULL,
  `sch_id` varchar(10) NOT NULL,
  `sr_no` varchar(15) NOT NULL,
  `g_status` varchar(10) NOT NULL,
  `expected_date` varchar(15) NOT NULL DEFAULT 'NA',
  `m_name` varchar(50) NOT NULL,
  `m_nrc` varchar(15) NOT NULL DEFAULT 'NA',
  `address` varchar(50) NOT NULL,
  `dob` varchar(25) NOT NULL,
  `grade` varchar(5) NOT NULL DEFAULT 'NA',
  `sch_name` varchar(50) NOT NULL DEFAULT 'NA',
  `occupation` varchar(50) NOT NULL DEFAULT 'NA',
  `date` varchar(25) NOT NULL,
  `m_father` varchar(50) NOT NULL DEFAULT 'NA',
  `m_mother` varchar(50) NOT NULL DEFAULT 'NA',
  `g_mother` varchar(50) NOT NULL DEFAULT 'NA',
  `g_mother_address` varchar(50) NOT NULL DEFAULT 'NA',
  `g_mother_occupation` varchar(50) NOT NULL DEFAULT 'NA',
  `g_father` varchar(50) NOT NULL DEFAULT 'NA',
  `g_father_address` varchar(50) NOT NULL DEFAULT 'NA',
  `g_father_occupation` varchar(50) NOT NULL DEFAULT 'NA',
  `date_transfer` varchar(15) NOT NULL DEFAULT 'NA',
  `actual_re_entry` varchar(15) NOT NULL DEFAULT 'NA',
  `transfered_sch` varchar(50) NOT NULL DEFAULT 'NA',
  `transfer_reason` text NOT NULL DEFAULT 'NA',
  `m_p_address` varchar(50) NOT NULL DEFAULT 'NA',
  `m_place_work` varchar(50) NOT NULL DEFAULT 'NA',
  `g_counselling_sessions` int(5) NOT NULL DEFAULT 0,
  `m_counselling_sessions` int(5) NOT NULL DEFAULT 0,
  `p_counselling_sessions` int(5) NOT NULL DEFAULT 0,
  `other_info` text NOT NULL DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commitments`
--

INSERT INTO `commitments` (`id`, `sch_id`, `sr_no`, `g_status`, `expected_date`, `m_name`, `m_nrc`, `address`, `dob`, `grade`, `sch_name`, `occupation`, `date`, `m_father`, `m_mother`, `g_mother`, `g_mother_address`, `g_mother_occupation`, `g_father`, `g_father_address`, `g_father_occupation`, `date_transfer`, `actual_re_entry`, `transfered_sch`, `transfer_reason`, `m_p_address`, `m_place_work`, `g_counselling_sessions`, `m_counselling_sessions`, `p_counselling_sessions`, `other_info`) VALUES
(11, 'COP_CHI', 'CN22271115', '', 'NA', 'Mark Mwansa', 'NA', 'Kasempa', '2022-07-14', '12', 'Kasempa Boys', 'Pupil', '2022-07-27', 'Peter Mwansa', 'Becky Mwansa', 'Mercy Phiri', 'Chipata', 'N/A', 'Joseph Phiri', 'Chipata', 'Accountant', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 0, 0, 2, 'None'),
(12, 'COP_CHI', 'CN22280858', '', 'NA', 'John Kazungula', 'NA', 'Urban Area', '2022-07-29', 'N/A', 'N/A', 'Programmer', '2022-08-17', 'N/A', 'N/A', 'Martha Mulupi', 'Chipata', 'N/A', 'Joseph Mulupi', 'Chipata', 'Accountant', 'NA', 'N/A', 'N/A', 'NA', 'NA', 'NA', 1, 2, 0, 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(10) NOT NULL,
  `sch_id` varchar(10) NOT NULL DEFAULT 'NW_CN',
  `sr_no` varchar(15) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `g_name` varchar(50) NOT NULL,
  `g_grade` int(5) NOT NULL,
  `g_class` varchar(5) NOT NULL,
  `date_issued` varchar(20) NOT NULL,
  `re_entry_date` varchar(20) NOT NULL,
  `manager` varchar(50) NOT NULL DEFAULT 'Headteacher'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `sch_id`, `sr_no`, `guardian`, `g_name`, `g_grade`, `g_class`, `date_issued`, `re_entry_date`, `manager`) VALUES
(4, 'COP_CHI', 'CN22040628', 'Mathias Lumbwe', 'Grace Lumbwe', 9, '9B', '04/07/2022', '2022-07-21', 'Headteacher'),
(5, 'COP_CHI', 'CN22041038', 'Mary Mwansa', 'Grade Mwenda', 8, '8C', '2022-07-04', '2022-07-31', 'Admin'),
(6, 'COP_CHI', 'CN22041012', 'Charity Vumba', 'Memory Namukoko', 12, '12A', '2022-07-04', '2023-07-31', 'Admin'),
(9, 'COP_CHI', 'CN22271115', 'Joseph Phiri', 'Joyce Phiri', 12, '12Z', '2022-07-27', '2023-01-09', 'John Kazungula'),
(10, 'COP_CHI', 'CN22280858', 'Joseph Mulupi', 'Janet Mulupi', 12, '12K', '2022-07-28', '2022-10-21', 'Gift Musanza');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(5) NOT NULL,
  `sch_id` varchar(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `district` varchar(25) NOT NULL,
  `province` varchar(25) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `sch_id`, `name`, `district`, `province`, `tel`, `type`, `address`, `date_added`) VALUES
(1, 'COP_CHI', 'Chikola Boys Secondary', 'chingola', 'copperbelt', '0969685645', 'grz', 'Chingola', '2022-07-27 20:11:57'),
(7, 'NOR_KYA', 'Kyawama Secondary', 'makonde', 'north-western', '7272', 'grz', 'Solwezi', '2022-07-28 06:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `sch_id` varchar(10) NOT NULL DEFAULT 'NW_CN',
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `sch_id`, `name`, `email`, `phone`, `password`, `role`, `date`) VALUES
(1, 'COP_CHI', 'Gift Musanza', 'admin@policy.com', '260969685645', '21232f297a57a5a743894a0e4a801fc3', 1, '2022-07-02 18:00:41'),
(2, 'COP_CHI', 'Headteacher', 'headteacher@policy.com', '2222222222', '7312555c6f7da4fc92dbb39dac06364c', 2, '2022-07-02 18:02:37'),
(3, 'COP_CHI', 'Counsellor', 'counsellor@policy.com', '0950384309', '03b8462409f387fad11237e39025e1e3', 3, '2022-07-02 18:02:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commitments`
--
ALTER TABLE `commitments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
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
-- AUTO_INCREMENT for table `commitments`
--
ALTER TABLE `commitments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
