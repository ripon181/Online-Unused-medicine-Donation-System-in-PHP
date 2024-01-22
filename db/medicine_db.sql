-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 02:38 PM
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
-- Database: `medicine_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(211) NOT NULL,
  `password` varchar(211) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `donate_goods`
--

CREATE TABLE `donate_goods` (
  `id` int(11) NOT NULL,
  `goodsType` varchar(254) NOT NULL,
  `goodsQuantity` varchar(254) NOT NULL,
  `notes` varchar(254) NOT NULL,
  `status` varchar(254) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donate_goods`
--

INSERT INTO `donate_goods` (`id`, `goodsType`, `goodsQuantity`, `notes`, `status`) VALUES
(1, '', '', '', 'Accepted'),
(2, 'Sharee', '10', 'hi', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `donate_medicine`
--

CREATE TABLE `donate_medicine` (
  `id` int(11) NOT NULL,
  `medicinename` varchar(54) NOT NULL,
  `medicinecount` varchar(54) NOT NULL,
  `nearbyngo` varchar(54) NOT NULL,
  `ngo_id` varchar(254) NOT NULL,
  `purchaseddate` date NOT NULL,
  `expirydate` date NOT NULL,
  `details` longtext NOT NULL,
  `status` varchar(54) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donate_medicine`
--

INSERT INTO `donate_medicine` (`id`, `medicinename`, `medicinecount`, `nearbyngo`, `ngo_id`, `purchaseddate`, `expirydate`, `details`, `status`) VALUES
(9, 'Flexi', '10 pics', 'Adarsha Seba Sangstha', '', '2023-06-14', '2023-06-30', 'i have 10 pics Flexi and i want to donate this ', 'Accepted'),
(10, 'Geston', '8 Pics', 'A.B. Foundation', '', '2023-06-12', '2023-06-28', 'i have 8 Pics Geston and i want to donate this ', 'Accepted'),
(11, 'Flonasin', '2 pics', 'Abohalito Nari O Shishu Kallan Songsta', '', '2023-06-12', '2023-06-26', 'i have 2 pics Flonasin and i want to donate this ', 'Accepted'),
(12, 'Algin', '2 pics ', 'Adarsha Seba Sangstha', '', '2023-07-03', '2023-07-28', 'i have 10 pics Alginand i want to donate this ', 'Accepted'),
(14, 'hhh', '10', 'Abohalito Nari O Shishu Kallan Songsta', '', '2023-08-07', '2023-08-16', '10', 'Accepted'),
(15, 'demo', '10', 'A.B. Foundation', '', '2023-08-13', '2023-08-31', 'demo', 'Accepted'),
(16, 'test', '10', 'Abohalito Nari O Shishu Kallan Songsta', '<br />\n<b>Notice</b>:  Undefined variable: _SESSION in <b>C:xampphtdocsonline_unused_medicine_donationdonateMedicine.php</b> on line <b>117</b><br />\n<br />\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:xampphtdocsonline_', '2023-08-13', '2023-08-23', 'test', 'pending'),
(17, 'hi', '10', 'Abohalito Nari O Shishu Kallan Songsta', '<br />\r\n<b>Notice</b>:  Undefined index: logged_in_ngo_id in <b>C:xampphtdocsonline_unused_medicine_donationdonateMedicine.php</b> on line <b>118</b><br />\r\n', '2023-08-08', '2023-08-17', 'hi', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goods`
--

CREATE TABLE `tbl_goods` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_goods`
--

INSERT INTO `tbl_goods` (`id`, `name`) VALUES
(1, 'T-Shirt'),
(2, 'Sharee'),
(3, 'Bag'),
(4, 'Shoes'),
(5, 'Watches'),
(6, 'Shirts');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `gender` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `age` varchar(254) NOT NULL,
  `contact` varchar(254) NOT NULL,
  `address` varchar(254) NOT NULL,
  `donertype` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `conpassword` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`id`, `name`, `gender`, `email`, `age`, `contact`, `address`, `donertype`, `password`, `conpassword`) VALUES
(6, 'Rownok Ripon', 'Male', 'mail.rownok@gmail.com', '25', '01749475566', 'Elephant Road', 'Individual', '76bbaf8c1cdd3d23b27d49686437d0d3', ''),
(7, 'Sadia', 'Female', 'sadia@gmail.com', '24', '01752451201', '111/2 Bashiruddin Road', 'Care Center', 'e10adc3949ba59abbe56e057f20f883e', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_money`
--

CREATE TABLE `tbl_money` (
  `id` int(11) NOT NULL,
  `bkash_number` varchar(20) NOT NULL,
  `tnx_number` varchar(20) NOT NULL,
  `money_amount` decimal(10,2) NOT NULL,
  `submission_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(254) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_money`
--

INSERT INTO `tbl_money` (`id`, `bkash_number`, `tnx_number`, `money_amount`, `submission_time`, `status`) VALUES
(1, '01740102010', '768786', '500.00', '2023-08-14 07:36:23', 'Accepted'),
(2, '01740102010', '123', '1000.00', '2023-10-03 12:11:45', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ngo`
--

CREATE TABLE `tbl_ngo` (
  `id` int(11) NOT NULL,
  `name` varchar(54) NOT NULL,
  `location` varchar(54) NOT NULL,
  `email` varchar(54) NOT NULL,
  `password` varchar(54) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ngo`
--

INSERT INTO `tbl_ngo` (`id`, `name`, `location`, `email`, `password`) VALUES
(4, 'A.B. Foundation', 'Dhaka, Bangladesh', 'rownokdiu@gmail.com', 'f9f2bdc578f8fff5f2ab730d1ea4e75c'),
(5, 'Abalamban NGO', 'Faridpur, Bangladesh', 'abalamban@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Abohalito Nari O Shishu Kallan Songsta', 'jamalpur, Bangladesh', 'nariosishu@gmail.com', '947f3d73d25448f76f40c2353e259d78'),
(7, 'Adarsha Seba Sangstha', 'Rajshahi, Bangladesh', 'adarsha@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate_goods`
--
ALTER TABLE `donate_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate_medicine`
--
ALTER TABLE `donate_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_goods`
--
ALTER TABLE `tbl_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_money`
--
ALTER TABLE `tbl_money`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ngo`
--
ALTER TABLE `tbl_ngo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donate_goods`
--
ALTER TABLE `donate_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donate_medicine`
--
ALTER TABLE `donate_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_goods`
--
ALTER TABLE `tbl_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_money`
--
ALTER TABLE `tbl_money`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ngo`
--
ALTER TABLE `tbl_ngo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
