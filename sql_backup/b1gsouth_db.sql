-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 09:00 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b1gsouth_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_b1ginfo`
--

CREATE TABLE `tbl_b1ginfo` (
  `cinfo_id` int(11) NOT NULL,
  `complete_address` text COLLATE utf8_unicode_ci NOT NULL,
  `map_link` text COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ig_page` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fb_page` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_b1ginfo`
--

INSERT INTO `tbl_b1ginfo` (`cinfo_id`, `complete_address`, `map_link`, `email_address`, `ig_page`, `fb_page`, `telephone`) VALUES
(1, 'CCF Imus Cavite Worship Center, Km. 21 Aguinaldo Highway, Tanzang Luma V Imus, Cavite, 4103', 'https://www.google.com/maps/place/Christ\'s+Commission+Fellowship+-+Imus/@14.412074,120.9392343,17z/data=!3m1!4b1!4m5!3m4!1s0x3397d300cb0a4581:0x5138b50fc0861b48!8m2!3d14.4120688!4d120.941423', 'b1gsouthluzon@gmail.com', 'https://www.instagram.com/b1g_southluzon', 'https://www.facebook.com/B1GSouthLuzon', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `info_id` int(5) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `email_address` varchar(60) NOT NULL,
  `address` text NOT NULL,
  `sat_id` int(11) NOT NULL,
  `deposit_slip_filename` varchar(52) NOT NULL,
  `deposit_slip` mediumblob NOT NULL,
  `tshirt_size` int(11) NOT NULL,
  `is_first_time` tinyint(1) NOT NULL,
  `is_part_dg` tinyint(1) NOT NULL,
  `dgroup_leader` varchar(150) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_received` tinyint(1) NOT NULL DEFAULT '0',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `date_received` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Information Table for Participants';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satellites`
--

CREATE TABLE `tbl_satellites` (
  `sat_id` int(11) NOT NULL,
  `sat_name` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for South Luzon Satellites';

--
-- Dumping data for table `tbl_satellites`
--

INSERT INTO `tbl_satellites` (`sat_id`, `sat_name`, `date_added`) VALUES
(1, '', '2018-09-01 08:22:30'),
(2, 'Imus', '2018-09-01 08:22:30'),
(3, 'General Trias', '2018-09-01 08:22:30'),
(4, 'Bacoor', '2018-09-01 08:22:30'),
(5, 'Salitran', '2018-09-01 08:22:30'),
(6, 'Salawag', '2018-09-01 08:22:30'),
(7, 'Lucena', '2018-09-01 08:22:30'),
(8, 'Lipa', '2018-09-01 08:22:30'),
(9, 'Tagaytay', '2018-09-01 08:22:30'),
(10, 'Kawit', '2018-09-01 08:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tsize`
--

CREATE TABLE `tbl_tsize` (
  `id` int(11) NOT NULL,
  `size_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `size_abbre` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_tsize`
--

INSERT INTO `tbl_tsize` (`id`, `size_name`, `size_abbre`) VALUES
(1, 'Extra Small', 'XS'),
(2, 'Small', 'S'),
(3, 'Medium', 'M'),
(4, 'Large', 'L'),
(5, 'Extra Large', 'XL'),
(6, 'Double Extra Large', 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userlogin`
--

CREATE TABLE `tbl_userlogin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logged_in` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_userlogin`
--

INSERT INTO `tbl_userlogin` (`user_id`, `username`, `password`, `full_name`, `contact_no`, `email_address`, `user_type`, `date_added`, `logged_in`) VALUES
(1, 'r_agulto', 'qwepoi@082993', 'Reander Agulto', '09366968097', 'reanderagulto29@gmail.com', 'Web Admin', '2018-09-19 15:02:11', 0),
(2, 'm_uy', 'useradmin123', 'Macey Uy', '', '', 'Admin', '2018-09-19 15:03:43', 0),
(3, 's_ong', 'useradmin123', 'Sarah Ong', ' ', '', 'Admin', '2018-09-19 15:03:43', 0),
(4, 'v_bacarisa', 'useradmin123', 'Valeen Bacarisa', '', '', 'Admin', '2018-09-19 15:03:43', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_b1ginfo`
--
ALTER TABLE `tbl_b1ginfo`
  ADD PRIMARY KEY (`cinfo_id`);

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `tbl_info_idx` (`sat_id`);

--
-- Indexes for table `tbl_satellites`
--
ALTER TABLE `tbl_satellites`
  ADD PRIMARY KEY (`sat_id`);

--
-- Indexes for table `tbl_tsize`
--
ALTER TABLE `tbl_tsize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_userlogin`
--
ALTER TABLE `tbl_userlogin`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_b1ginfo`
--
ALTER TABLE `tbl_b1ginfo`
  MODIFY `cinfo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `info_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_satellites`
--
ALTER TABLE `tbl_satellites`
  MODIFY `sat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_tsize`
--
ALTER TABLE `tbl_tsize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_userlogin`
--
ALTER TABLE `tbl_userlogin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD CONSTRAINT `tbl_info_sat_id` FOREIGN KEY (`sat_id`) REFERENCES `tbl_satellites` (`sat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
