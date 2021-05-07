-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 10:19 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbg`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `gt` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `birth`, `gt`, `email`, `password`) VALUES
(1, 'Võ Ngọc Anh Khoa', '2000-01-12', 'Nam', 'vnakhoa.18it2@sict.udn.vn', '123'),
(5, 'khoa vo', '2000-01-12', 'Nam', 'anhkhoadn20@gmail.com', 'anhkhoa121');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `iddanhmuc` int(200) NOT NULL,
  `tendanhmuc` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`iddanhmuc`, `tendanhmuc`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Puma'),
(4, 'Reebok'),
(5, 'Jordan');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(200) NOT NULL,
  `idkhachhang` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tongtien` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `idkhachhang`, `trangthai`, `ngaytao`, `tongtien`) VALUES
(1, '1', 'Success', '2019-11-27 10:07:31', '4390'),
(2, '2', 'Success', '2019-11-07 00:28:03', '650');

-- --------------------------------------------------------

--
-- Table structure for table `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `id` int(11) NOT NULL,
  `idhoadon` int(11) NOT NULL,
  `masp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sl` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadonchitiet`
--

INSERT INTO `hoadonchitiet` (`id`, `idhoadon`, `masp`, `sl`) VALUES
(1, 1, '2', '6'),
(2, 1, '1', '8'),
(3, 2, '1', '1'),
(4, 2, '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `idkhachhang` int(200) NOT NULL,
  `tenkhachhang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`idkhachhang`, `tenkhachhang`, `gt`, `ngaysinh`, `email`, `diachi`, `sdt`) VALUES
(1, 'Võ Ngọc Anh Khoa', 'male', '2000-01-12', 'vnakhoa.18it2@sict.udn.vn', '16 Bình Hòa 6 Khuê Trung Cẩm Lệ Đà Nẵng', '0783494728'),
(2, 'khoa vo', 'male', '2000-01-12', 'anhkhoadn20@gmail.com', '16 Bình Hòa 6 Khuê Trung Cẩm Lệ Đà Nẵng', '0394224701');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tensp` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `gia` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `khuyenmai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sl` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `iddanhmuc` int(200) NOT NULL,
  `chitiet` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `gia`, `khuyenmai`, `sl`, `anh`, `iddanhmuc`, `chitiet`) VALUES
('1', 'NIKE ZOOM PHANTOM VENOM PRO TF-CAM – BQ7497-810', '350', '30', '50', 'grid5.jpg', 1, ''),
('10', 'Puma 1', '2200', '32%', '45', 'img_7698_grande_92f936667cc94d059ec2c42e3940cec3_large.webp', 3, ''),
('11', 'Reebok', '1210', '12%', '45', '1983744_L.jpg', 4, ''),
('12', 'Reebok 2', '2500', '22%', '50', '1782402_L.jpg', 4, ''),
('13', 'Jordan', '2200', '32%', '45', '4045308497 032.jpg', 5, ''),
('14', 'Jordan 1', '3000', '16%', '50', 'MG_5438.jpg', 5, ''),
('2', 'NIKE SUPERFLY 7 ACADEMY MDS TF- XANH THAN – BQ5435-401', '450', '10', '50', 'grid6.jpg', 1, ''),
('3', 'NIKE', '3000', '20%', '40', 'show.jpg', 1, ''),
('4', 'NIKE 2', '1500', '30%', '40', 'grid13.jpg', 1, ''),
('5', 'NIKE 21', '1000', '22%', '40', 'grid14.jpg', 1, ''),
('6', 'Adidas', '1200', '15%', '50', '5cac0c084804c-giay-da-banh-adidas-nemeziz-tango-18.3-tf-aq0621-01.jpg', 2, ''),
('7', 'Adidas 1', '1500', '16%', '50', '2000592_L.jpg', 2, ''),
('8', 'Adidas 12', '2000', '20%', '40', 'grid12.jpg', 2, ''),
('9', 'Puma', '1200', '15%', '40', 'img_6172_ea258ae445db4f44ad051fc62c85c72a_large.jpg', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`iddanhmuc`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idhoadon` (`idhoadon`),
  ADD KEY `masp` (`masp`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`idkhachhang`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `iddanhmuc` (`iddanhmuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `iddanhmuc` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `idkhachhang` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;