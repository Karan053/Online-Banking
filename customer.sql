-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 05:31 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `acc_no` bigint(16) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `IFSC` varchar(15) NOT NULL,
  `balance` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`acc_no`, `email`, `name`, `IFSC`, `balance`) VALUES
(157912038456, 'abc12@gmail.com', 'ABC', 'XYZ100', 4998),
(157912038457, 'd67ef@gmail.com', 'DEF', 'jc10005', 5784),
(157912038458, 'g23hi@gmail.com', 'GHI', 'aaa10005', 55200),
(157912038459, 'xy19z@yahoo.com', 'XYZ', '850XY5', 99990),
(157912038460, 'EFGH_75@gmail.com', 'EFGH', 'XYZ10005', 119990),
(157912038461, 'U473KH@gmail.com', 'UKH', 'XYZ10005', 12890),
(157912038462, 'K0952R@gmail.com', 'KR', 'KR0330', 120000),
(157912038463, 'idnjjk12@yahoo.com', 'IJK', '8500XY5', 167200),
(157912038464, 'MNTLGBO@yahoo.com', 'MNO', '860D8XY5', 500021),
(157912038465, 'abVMc12@yahoo.com', 'ABCDE', '85000XY5', 101003);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`acc_no`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
