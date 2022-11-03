-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 03 พ.ย. 2020 เมื่อ 12:22 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15298906_phonerental`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name_pro` varchar(250) NOT NULL,
  `detail` varchar(250) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `tbl_file`
--

INSERT INTO `tbl_file` (`id`, `image`, `name_pro`, `detail`, `price`) VALUES
(3, 'iphone.jpg', 'iphone 11', '1', '30200'),
(6, 'com_2.jpg', 'test', '4', '30200'),
(7, 'e7cca32dbf12a02339237dfb266593ee.jpg', 'test', '2', '19000'),
(10, 'ipad-pro-12-.jfif', 'iphone 5 pro', '1', '45500'),
(13, '190198819154-1-1598198678.jpg', 'iPad pro 12.9', '6', '46400'),
(25, 'iphone.jpg', 'iphone 11', '3', '30200');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `namelastname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `banknum` int(20) NOT NULL,
  `imgbank` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `namelastname`, `address`, `phone`, `email`, `bank`, `banknum`, `imgbank`, `order_status`) VALUES
(123, 'sdfsf', 'sdlkflsd', 239048, 'sdfjkl', 'dfkjgs', 2342, 'skjdfhi', 'sdfpkd'),
(193, 'กวิสรา', ' -123', 645928579, ' kuntkanit01@gmail.com', ' ewsdsd', 654321, '75,700', 'ชำระเงินเรียบร้อย'),
(195, 'สสสส', '22', 123456789, '1231@email.com', 'tmb', 58201478, '75,700', '.');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_type`
--

CREATE TABLE `tbl_type` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `tbl_type`
--

INSERT INTO `tbl_type` (`id`, `name`) VALUES
(1, 'Apple'),
(2, 'Huawei'),
(3, 'Oppo'),
(4, 'Samsung'),
(5, 'Vivo'),
(6, 'iPad/Tablet');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userlevel` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `userlevel`) VALUES
(8, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'admin', 'admin@email.com', 'a'),
(9, 'user', 'd93591bdf7860e1e4ee2fca799911215', 'user', 'user', 'user@email.com', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
