-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 10:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qr_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `ID` int(11) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`ID`, `role`, `username`, `password`, `name`) VALUES
(1, 'admin', 'elias', '81dc9bdb52d04dc20036dbd8313ed055', 'Elias Abdurrahman'),
(2, 'user', 'John', 'e2fc714c4727ee9395f324cd2e7f331f', 'John Doe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sample`
--

CREATE TABLE `tbl_sample` (
  `Mixing_Phase` varchar(100) NOT NULL,
  `steps` int(15) NOT NULL,
  `Actions` varchar(15) NOT NULL,
  `Material_name` varchar(15) NOT NULL,
  `Material_Weight` decimal(10,0) NOT NULL,
  `Rotator_1` decimal(10,0) NOT NULL,
  `Rotator_2` decimal(10,0) NOT NULL,
  `Mixing_time` varchar(10) NOT NULL,
  `Pressure` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sample`
--

INSERT INTO `tbl_sample` (`Mixing_Phase`, `steps`, `Actions`, `Material_name`, `Material_Weight`, `Rotator_1`, `Rotator_2`, `Mixing_time`, `Pressure`) VALUES
('asd', 1, 's', 'swdf', 0, 0, 0, 'fq', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  ADD PRIMARY KEY (`steps`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  MODIFY `steps` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
