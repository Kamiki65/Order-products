-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 04:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sushi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbemployee`
--

CREATE TABLE `tbemployee` (
  `employeeid` varchar(20) NOT NULL,
  `employeename` varchar(255) NOT NULL,
  `positionid` varchar(50) NOT NULL,
  `employeetel` varchar(10) NOT NULL,
  `statusid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tborddetail`
--

CREATE TABLE `tborddetail` (
  `id` int(20) NOT NULL,
  `ordid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rmid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rmprice` decimal(10,2) NOT NULL,
  `rmqty` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tborddetail`
--

INSERT INTO `tborddetail` (`id`, `ordid`, `rmid`, `rmprice`, `rmqty`) VALUES
(32, '1', '4 ', 9999999.00, 1),
(35, '2', '4 ', 9999999.00, 1),
(36, '3', '4 ', 9999999.00, 1),
(37, '3', '3 ', 1000.00, 1),
(38, '3', '2 ', 600.00, 1),
(39, '3', '1 ', 700.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbordheader`
--

CREATE TABLE `tbordheader` (
  `ordid` varchar(20) NOT NULL,
  `orddate` date NOT NULL DEFAULT current_timestamp(),
  `supplierid` varchar(20) NOT NULL,
  `shipmentid` varchar(20) NOT NULL,
  `shipmentdate` date NOT NULL DEFAULT current_timestamp(),
  `userid` varchar(20) NOT NULL,
  `statusid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbordheader`
--

INSERT INTO `tbordheader` (`ordid`, `orddate`, `supplierid`, `shipmentid`, `shipmentdate`, `userid`, `statusid`) VALUES
('1', '2024-10-27', '1', '', '2024-10-27', '1', '61'),
('2', '2024-10-27', '1', '', '0000-00-00', '1', '61'),
('3', '2024-10-27', '1', '', '2024-10-27', '1', '62');

-- --------------------------------------------------------

--
-- Table structure for table `tbposition`
--

CREATE TABLE `tbposition` (
  `positionid` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `positionname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `statusid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbposition`
--

INSERT INTO `tbposition` (`positionid`, `positionname`, `statusid`) VALUES
('1', 'ผู้จัดจำหน่าย', '10'),
('2', 'ผู้ซื้อ', '10'),
('3', 'แอดมินระบบ', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbrm`
--

CREATE TABLE `tbrm` (
  `rmid` int(20) NOT NULL,
  `rmname` varchar(255) NOT NULL,
  `rmtid` int(10) NOT NULL,
  `unitid` int(20) NOT NULL,
  `rmprice` decimal(10,2) NOT NULL,
  `rmquantity` varchar(255) NOT NULL,
  `statusid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbrm`
--

INSERT INTO `tbrm` (`rmid`, `rmname`, `rmtid`, `unitid`, `rmprice`, `rmquantity`, `statusid`) VALUES
(1, 'ชูโทโระ', 1, 1, 700.00, '22', '10'),
(2, 'ซันมะ', 1, 1, 600.00, '23', '10'),
(3, 'โทโระ', 1, 1, 1000.00, '20', '10'),
(4, 'ผลไม้สวรรค์ อมตะ', 4, 1, 9999999.00, '21', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbrmt`
--

CREATE TABLE `tbrmt` (
  `rmtid` int(20) NOT NULL,
  `rmtname` varchar(255) NOT NULL,
  `statusid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbrmt`
--

INSERT INTO `tbrmt` (`rmtid`, `rmtname`, `statusid`) VALUES
(1, 'ปลา', '10'),
(2, 'หมู', '10'),
(3, 'ไก่', '10'),
(4, 'ผล', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbstatus`
--

CREATE TABLE `tbstatus` (
  `statusid` int(10) NOT NULL,
  `statusname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbstatus`
--

INSERT INTO `tbstatus` (`statusid`, `statusname`) VALUES
(1, 'ใช้งาน'),
(9, 'ไม่ใช้งาน'),
(10, 'ปกติ'),
(61, 'รอจัดส่ง'),
(62, 'จัดส่งสำเร็จ'),
(71, 'รอสั่งซื้อ'),
(72, 'สั่งซื้อสำเร็จ'),
(81, 'รอชำระเงิน'),
(82, 'ชำระเงินเสร็จสิ้น'),
(90, 'ยกเลิก');

-- --------------------------------------------------------

--
-- Table structure for table `tbsupplier`
--

CREATE TABLE `tbsupplier` (
  `supplierid` int(20) NOT NULL,
  `suppliername` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `suppliertel` decimal(10,0) NOT NULL,
  `supplieraddress` varchar(255) NOT NULL,
  `statusid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbsupplier`
--

INSERT INTO `tbsupplier` (`supplierid`, `suppliername`, `suppliertel`, `supplieraddress`, `statusid`) VALUES
(1, 'ร้านA', 0, '', '10'),
(2, 'แบงค์', 0, '', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbsupplierdetail`
--

CREATE TABLE `tbsupplierdetail` (
  `id` int(20) NOT NULL,
  `ordid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rmid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rmprice` decimal(10,2) NOT NULL,
  `rmqty` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbsupplierrm`
--

CREATE TABLE `tbsupplierrm` (
  `id` int(20) NOT NULL,
  `rmid` varchar(20) NOT NULL,
  `supplierid` varchar(20) NOT NULL,
  `supplierprice` decimal(10,2) NOT NULL,
  `statusid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbunit`
--

CREATE TABLE `tbunit` (
  `unitid` varchar(10) NOT NULL,
  `unitname` varchar(255) NOT NULL,
  `statusid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbunit`
--

INSERT INTO `tbunit` (`unitid`, `unitname`, `statusid`) VALUES
('1', 'กรัม', '10'),
('2', 'กิโลกรัม', '10'),
('3', 'ขีด', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `userid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `userpass` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `positionid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `createdby` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `createddate` date NOT NULL DEFAULT current_timestamp(),
  `updateby` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updatedate` date NOT NULL,
  `statusid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`userid`, `username`, `userpass`, `positionid`, `createdby`, `createddate`, `updateby`, `updatedate`, `statusid`) VALUES
('1', 'ผู้จัดจำหน่าย', 'password1', '1', '', '2024-09-26', '', '0000-00-00', '10'),
('2', 'ผู้ซื้อ', 'password1', '2', '', '2024-09-26', '', '0000-00-00', '10'),
('3', 'แอดมิน', 'password1', '3', '', '2024-09-26', '', '0000-00-00', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbemployee`
--
ALTER TABLE `tbemployee`
  ADD PRIMARY KEY (`employeeid`);

--
-- Indexes for table `tborddetail`
--
ALTER TABLE `tborddetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbordheader`
--
ALTER TABLE `tbordheader`
  ADD PRIMARY KEY (`ordid`);

--
-- Indexes for table `tbposition`
--
ALTER TABLE `tbposition`
  ADD PRIMARY KEY (`positionid`);

--
-- Indexes for table `tbrm`
--
ALTER TABLE `tbrm`
  ADD PRIMARY KEY (`rmid`);

--
-- Indexes for table `tbrmt`
--
ALTER TABLE `tbrmt`
  ADD PRIMARY KEY (`rmtid`);

--
-- Indexes for table `tbstatus`
--
ALTER TABLE `tbstatus`
  ADD PRIMARY KEY (`statusid`);

--
-- Indexes for table `tbsupplier`
--
ALTER TABLE `tbsupplier`
  ADD PRIMARY KEY (`supplierid`);

--
-- Indexes for table `tbsupplierdetail`
--
ALTER TABLE `tbsupplierdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbsupplierrm`
--
ALTER TABLE `tbsupplierrm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbunit`
--
ALTER TABLE `tbunit`
  ADD PRIMARY KEY (`unitid`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tborddetail`
--
ALTER TABLE `tborddetail`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbsupplierdetail`
--
ALTER TABLE `tbsupplierdetail`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbsupplierrm`
--
ALTER TABLE `tbsupplierrm`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
