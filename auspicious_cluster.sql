-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 04:50 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auspicious_cluster`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `created_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `data`, `created_on`, `status`) VALUES
(18, '{\"name\":\"two\",\"discount\":\"2\",\"edit_id\":\"18\",\"req_type\":\"update\"}', '2024-04-02 12:55:40.049641', 0),
(19, '{\"name\":\"two\",\"discount\":\"2\",\"edit_id\":\"18\",\"req_type\":\"add\"}', '2024-04-02 12:56:01.762301', 1),
(20, '{\"name\":\"three\",\"discount\":\"3\",\"req_type\":\"add\"}', '2024-04-02 12:56:52.225821', 1),
(21, '{\"name\":\"four\",\"discount\":\"4\",\"req_type\":\"add\"}', '2024-04-02 12:58:07.156672', 1),
(22, '{\"name\":\"five\",\"discount\":\"five\",\"req_type\":\"add\"}', '2024-04-02 13:02:08.664775', 1),
(23, '{\"name\":\"six\",\"discount\":\"6\",\"req_type\":\"add\"}', '2024-04-02 13:05:04.536284', 1),
(24, '{\"name\":\"seven\",\"discount\":\"7\",\"req_type\":\"add\"}', '2024-04-02 13:22:29.484058', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `id` int(11) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `created_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`id`, `data`, `created_on`, `status`) VALUES
(73, '{\"name\":\"Theena\",\"email\":\"theena@gmail.com\",\"phone\":\"9080899582\",\"dob\":\"1999-06-07\",\"gender\":\"male\",\"edit_id\":\"73\",\"req_type\":\"update\"}', '2024-04-01 10:36:46.364325', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` int(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `phone`, `email`, `status`) VALUES
(37, 'admin', 909090099, 'admin@gmail.com', 1),
(38, 'superadmin', 2147483647, 'superadmin@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
