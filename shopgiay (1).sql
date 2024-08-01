-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2024 at 04:59 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopgiay`
--

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `idcv` int NOT NULL,
  `chucvu` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`idcv`, `chucvu`) VALUES
(1, 'Admin'),
(2, 'Editor');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idcomment` int NOT NULL,
  `idkh` int NOT NULL,
  `idhanghoa` int NOT NULL,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `luotthich` int NOT NULL,
  `timebl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`idcomment`, `idkh`, `idhanghoa`, `content`, `luotthich`, `timebl`) VALUES
(1, 3, 24, '  đẹp', 0, '2024-08-22 06:23:23'),
(2, 3, 22, '  thấp', 0, '2024-05-01 00:00:00'),
(3, 7, 96, '  sdad', 0, '2024-05-01 00:00:00'),
(4, 7, 96, '  sadas', 0, '2024-05-03 00:00:00'),
(5, 7, 96, '  chào\r\n', 0, '2024-05-03 00:00:00'),
(6, 7, 95, '  hú', 0, '2024-05-03 00:00:00'),
(7, 7, 95, '  hú', 0, '2024-05-03 00:00:00'),
(8, 7, 95, '  chào\r\n', 0, '2024-05-03 00:00:00'),
(9, 20, 95, '  hú cc', 1, '2024-05-03 00:00:00'),
(10, 20, 96, '  sủa ít thôi', 0, '2024-05-03 00:00:00'),
(11, 7, 96, '  aa', 0, '2024-05-03 00:00:00'),
(12, 7, 96, 'đờ cờ mờ mày, sủa cờ cờ\r\n', 0, '2024-05-03 00:00:00'),
(13, 7, 95, 'sd', 0, '2024-05-03 00:00:00'),
(14, 7, 96, 'hi', 0, '2024-05-03 00:00:00'),
(15, 7, 96, 'cc', 0, '2024-05-03 00:00:00'),
(16, 7, 96, 'hú\r\n', 0, '2024-05-03 00:00:00'),
(17, 7, 95, 'chào\r\n', 0, '2024-05-03 00:00:00'),
(18, 7, 95, 'hehe', 0, '2024-05-03 00:00:00'),
(19, 7, 96, 'đẹp\r\n', 0, '2024-05-03 00:00:00'),
(20, 7, 96, '', 0, '2024-05-03 00:00:00'),
(21, 7, 96, '', 0, '2024-05-03 00:00:00'),
(22, 7, 96, 'sda', 0, '2024-05-03 00:00:00'),
(23, 7, 96, 'đẹp', 0, '2024-05-03 00:00:00'),
(24, 7, 96, 'kkk\r\n', 0, '2024-05-03 00:00:00'),
(25, 7, 96, 'yaaaa', 0, '2024-05-03 00:00:00'),
(26, 7, 96, 'haha', 0, '2024-05-03 00:00:00'),
(27, 7, 96, 'híhis', 0, '2024-05-03 00:00:00'),
(28, 7, 96, 'đaadad', 0, '2024-05-03 00:00:00'),
(29, 7, 96, 'sdd', 0, '2024-05-03 00:00:00'),
(30, 7, 96, 'zx', 0, '2024-05-03 00:00:00'),
(31, 7, 96, '', 0, '2024-05-03 00:00:00'),
(32, 7, 96, 'đá', 0, '2024-05-03 00:00:00'),
(33, 7, 96, 'cs', 0, '2024-05-03 00:00:00'),
(34, 7, 95, 'hú', 0, '2024-05-03 00:00:00'),
(35, 7, 95, 'sdad', 0, '2024-05-03 00:00:00'),
(36, 7, 94, 'đẹp', 1, '2024-05-03 00:00:00'),
(37, 7, 94, 'đẹp\r\n', 1, '2024-05-03 00:00:00'),
(38, 7, 94, 'haa', 0, '2024-05-03 00:00:00'),
(39, 20, 93, 'ok đẹp', 3, '2024-05-03 00:00:00'),
(40, 7, 96, 'zxx', 1, '2024-05-04 00:00:00'),
(41, 7, 96, '12333s', 0, '2024-05-04 00:00:00'),
(42, 7, 96, '123', 0, '2024-05-04 00:00:00'),
(43, 7, 96, 'xzc', 0, '2024-05-04 00:00:00'),
(44, 7, 95, 'a', 0, '2024-05-06 02:07:51'),
(45, 7, 95, 'đẹp', 0, '2024-05-06 02:14:31'),
(46, 7, 95, 'hú đẹp', 0, '2024-05-06 09:16:16'),
(47, 7, 95, 'haha', 1, '2024-05-06 14:18:09'),
(48, 7, 96, 'đẹp', 1, '2024-05-06 15:50:20'),
(49, 7, 96, 'đẹp', 1, '2024-05-07 09:22:08'),
(50, 7, 96, '', 0, '2024-05-07 15:44:29'),
(51, 7, 96, '', 1, '2024-05-07 15:44:33'),
(52, 7, 96, '', 0, '2024-05-07 15:45:28'),
(53, 7, 96, '', 1, '2024-05-07 15:46:58'),
(54, 20, 93, 'quá xuất sắc', 1, '2024-05-07 17:15:00'),
(55, 20, 93, 'tuyệt', 3, '2024-05-08 10:33:58'),
(56, 7, 96, 'http://localhost:8000/php1/PHP2/PhanMinhTh%e1%ba%afng_501220709/DuAnCuoiKy/Content/imagetourdien/k.jpg', 0, '2024-06-07 15:08:09'),
(57, 21, 207, 'g', 0, '2024-06-11 16:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `cthanghoa`
--

CREATE TABLE `cthanghoa` (
  `idhanghoa` int NOT NULL,
  `idmau` int NOT NULL,
  `idsize` int NOT NULL,
  `soluongton` int NOT NULL,
  `hinh` varchar(2000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `dongia` float NOT NULL,
  `giamgia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `cthanghoa`
--

INSERT INTO `cthanghoa` (`idhanghoa`, `idmau`, `idsize`, `soluongton`, `hinh`, `dongia`, `giamgia`) VALUES
(1, 1, 1, 10, '1.jpg', 500000, 300000),
(2, 2, 1, 10, '2.jpg', 700000, 0),
(3, 3, 1, 123, '3.jpg', 333333, 100000),
(4, 4, 1, 1000, '4.jpg', 500000, 300000),
(5, 5, 1, 0, '5.jpg', 500000, 300000),
(7, 7, 3, 90, '7.jpg', 500000, 450000),
(8, 8, 1, 12, '8.jpg', 500000, 0),
(9, 9, 1, 0, '9.jpg', 500000, 0),
(10, 10, 1, 12, '10.jpg', 500000, 0),
(11, 11, 1, 12, '11.jpg', 600000, 400000),
(12, 1, 1, 977, '12.jpg', 500000, 0),
(13, 12, 2, 120, '13.jpg', 333000, 0),
(14, 13, 1, 995, '14.jpg', 450000, 350000),
(15, 1, 1, 998, '15.jpg', 450000, 350000),
(16, 14, 1, 1000, '16.jpg', 650000, 0),
(17, 15, 1, 86, '17.jpg', 333000, 0),
(18, 16, 1, 1000, '18.jpg', 500000, 0),
(19, 17, 1, 1000, '19.jpg', 650000, 0),
(20, 18, 1, 87, '20.jpg', 333000, 0),
(21, 19, 1, 1000, '21.jpg', 500000, 0),
(22, 20, 1, 1000, '22.jpg', 500000, 250000),
(23, 21, 2, 123, '23.jpg', 333000, 0),
(24, 22, 2, 1000, '24.jpg', 500000, 350000),
(25, 23, 1, 977, '25.jpg', 333000, 0),
(26, 24, 1, 977, '26.jpg', 333000, 0),
(27, 25, 2, 123, '27.jpg', 333000, 0),
(28, 26, 1, 10, '28.jpg', 500000, 450000),
(29, 27, 1, 10, '29.jpg', 700000, 0),
(30, 28, 1, 123, '30.jpg', 333333, 100000),
(31, 30, 1, 1000, '31.jpg', 500000, 300000),
(32, 31, 1, 0, '32.jpg', 500000, 300000),
(33, 32, 2, 1000, '33.jpg', 333000, 0),
(34, 33, 3, 100, '34.jpg', 333000, 0),
(35, 34, 1, 12, '35.jpg', 500000, 0),
(36, 35, 1, 0, '36.jpg', 500000, 0),
(37, 36, 1, 12, '37.jpg', 500000, 0),
(38, 37, 1, 8, '38.jpg', 600000, 400000),
(39, 38, 1, 980, '39.jpg', 500000, 0),
(40, 39, 2, 121, '40.jpg', 333000, 0),
(41, 40, 1, 993, '41.jpg', 450000, 350000),
(42, 41, 1, 995, '42.jpg', 450000, 350000),
(43, 42, 1, 1000, '43.jpg', 650000, 0),
(44, 42, 1, 87, '44.jpg', 333000, 0),
(45, 43, 1, 1000, '45.jpg', 500000, 0),
(46, 44, 1, 1000, '46.jpg', 650000, 0),
(47, 45, 1, 87, '47.jpg', 333000, 0),
(48, 46, 1, 962, '48.jpg', 500000, 0),
(49, 47, 1, 999, '49.jpg', 500000, 250000),
(50, 48, 2, 123, '50.jpg', 333000, 0),
(51, 49, 1, 977, '51.jpg', 333000, 0),
(52, 50, 2, 123, '52.jpg', 333000, 0),
(53, 51, 2, 999, '53.jpg', 500000, 350000),
(54, 50, 1, 1000, '54.jpg', 500000, 0),
(55, 52, 1, 12, '55.jpg', 500000, 0),
(56, 53, 1, 97, '56.jpg', 333000, 0),
(57, 54, 3, 1000, '57.jpg', 500000, 0),
(58, 55, 2, 1000, '58.jpg', 500000, 0),
(59, 56, 3, 997, '59.jpg', 500000, 0),
(60, 57, 1, 1000, '60.jpg', 500000, 0),
(61, 53, 1, 12, '61.jpg', 500000, 0),
(62, 50, 1, 96, '62.jpg', 333000, 0),
(63, 55, 3, 992, '63.jpg', 500000, 0),
(64, 47, 2, 974, '64.jpg', 500000, 0),
(65, 58, 3, 1000, '65.jpg', 500000, 0),
(66, 59, 1, 1000, '66.jpg', 500000, 0),
(67, 60, 4, 977, '67.jpg', 333000, 0),
(68, 59, 1, 977, '68.jpg', 333000, 0),
(69, 59, 1, 100, '69.jpg', 333000, 0),
(70, 61, 2, 100, '70.jpg', 333000, 0),
(71, 62, 1, 1000, '71.jpg', 500000, 0),
(72, 1, 1, 12, '72.jpg', 500000, 0),
(73, 63, 1, 97, '73.jpg', 333000, 0),
(74, 54, 3, 998, '74.jpg', 500000, 0),
(75, 64, 2, 999, '75.jpg', 500000, 0),
(76, 65, 3, 999, '76.jpg', 500000, 0),
(77, 66, 1, 994, '77.jpg', 500000, 0),
(78, 54, 4, 973, '78.jpg', 333000, 0),
(79, 67, 1, 969, '79.jpg', 333000, 0),
(80, 62, 1, 100, '80.jpg', 333000, 0),
(81, 68, 2, 96, '81.jpg', 333000, 0),
(82, 69, 2, 97, '82.jpg', 333000, 0),
(83, 70, 1, 97, '83.jpg', 333000, 0),
(84, 71, 3, 120, '84.jpg', 333000, 0),
(85, 72, 1, 82, '85.jpg', 333000, 30000),
(86, 73, 1, 997, '86.jpg', 800000, 0),
(87, 74, 1, 85, '87.jpg', 333000, 0),
(88, 75, 3, 99, '88.jpg', 333000, 0),
(89, 73, 1, 1, '89.jpg', 333000, 150000),
(90, 76, 1, 909, '90.jpg', 800000, 0),
(91, 73, 3, 47, '91.jpg', 333333, 0),
(92, 77, 2, 82, '92.jpg', 500000, 0),
(93, 78, 1, 0, '93.jpg', 333000, 0),
(94, 79, 1, 872, '94.jpg', 333333, 0),
(95, 80, 1, 0, '95.jpg', 333000, 0),
(95, 80, 2, 0, '91.jpg', 600000, 0),
(95, 80, 4, 122, 'dac-diem-Zero-Two.png', 333000, 0),
(96, 29, 1, 60, '418139588_122120751914135392_6103359973286817017_n.jpg', 500000, 66666),
(96, 29, 2, 6, '422640952_416936007353598_4924835203240655704_n.jpg', 5550000, 66666),
(96, 29, 3, 6, '96.jpg', 500000, 66666);

-- --------------------------------------------------------

--
-- Table structure for table `cthoadon`
--

CREATE TABLE `cthoadon` (
  `masohd` int NOT NULL,
  `mahh` int NOT NULL,
  `soluongmua` int NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `size` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `thanhtien` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `cthoadon`
--

INSERT INTO `cthoadon` (`masohd`, `mahh`, `soluongmua`, `mausac`, `size`, `thanhtien`) VALUES
(1, 94, 1, 'Ice Cream Studio', '1/2', 333333),
(1, 84, 1, 'Chickweed Fan LV', '1/4', 333000),
(1, 78, 1, 'LC Studio', '1/5', 333000),
(2, 85, 1, 'Mi Yin Studio', '1/2', 30000),
(2, 88, 1, 'Lazy Dog Studio', '1/4', 333000),
(3, 87, 1, 'Atlas Studio', '1/2', 333000),
(4, 83, 1, 'ACY Studio', '1/2', 333000),
(5, 83, 1, 'ACY Studio', '1/2', 333000),
(6, 87, 1, 'Atlas Studio', '1/2', 333000),
(7, 38, 1, 'Huben Studio', '1/2', 400000),
(7, 88, 1, 'Lazy Dog Studio', '1/4', 333000);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mahh` int NOT NULL,
  `tenhh` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `maloai` int NOT NULL,
  `soluotxem` int NOT NULL,
  `ngaylap` date NOT NULL,
  `mota` varchar(2000) NOT NULL,
  `trangthai` int NOT NULL,
  `yeuthich` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`mahh`, `tenhh`, `maloai`, `soluotxem`, `ngaylap`, `mota`, `trangthai`, `yeuthich`) VALUES
(1, 'Kuzan Aoikiji - One Piece - Jimei Palace', 1, 2, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(2, 'Zoro - One Piece - MJ Studio', 1, 0, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(3, 'Whitebeard - One Piece - Tsume Studio', 1, 0, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(4, 'Luffy Gear 4 - One Piece - LZ Studio', 1, 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(5, 'Luffy Nika - One Piece - ZX Studio', 1, 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(7, 'Zoro - One Piece - TH Studio', 1, 2, '2024-05-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 0, 0),
(8, 'Doflamingo - One Piece - Dream Studio', 1, 1, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(9, 'Yamato - One Piece - PHOENIX Studio', 1, 13, '2020-08-07', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(10, 'Marco - One Piece - LX Studio', 1, 11, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(11, 'Sabo - One Piece - ATT Studio', 1, 7, '2023-10-30', 'đẹp', 0, 0),
(12, 'Sengoku - One Piece - Jimei Palace', 1, 2, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(13, 'Nami - One Piece - Zuoban Studio', 1, 1, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(14, 'Buggy - One Piece - 2% Studio', 1, 1, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(15, 'Whitebeard - One Piece - Jimei Palace', 1, 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 1, 0),
(16, 'Kuma - One Piece - Neijuan Studio', 1, 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 1, 0),
(17, 'Akainu - One Piece - LB Studio', 1, 2, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 1, 0),
(18, 'Yamato - One Piece - DOD Studio', 1, 2, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 1, 0),
(19, 'Nico Robin - One Piece - Sea King Studio', 1, 6, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(20, 'Roronoa Zoro - One Piece - IU Studio', 1, 1, '2020-08-07', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(21, 'Anbu Kakashi - Naruto - SNBR Studio', 2, 1, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(22, 'Deidara Akatsuki - Naruto - PickStar Studio', 2, 4, '2023-10-30', 'đẹp', 0, 0),
(23, 'Jiraiya : One Last Heartbeat - Naruto Shippuden - Tsume Art', 2, 1, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(24, 'Gaara vs Rock Lee - Naruto - Rocket Studio', 2, 0, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(25, 'Konan - Naruto - Zuoban Studio', 2, 1, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(26, 'Nagato Akatsuki - Naruto - CW Studio', 2, 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(27, 'Naruto 20th Anniversary - Naruto - KrazyArt Studio', 2, 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(28, 'Sasuke & Susanoo - Naruto - QBL Studio', 2, 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 0, 0),
(29, 'Tsunade NSFW - Naruto - GK BOX Studio', 2, 3, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 0, 0),
(30, 'Jiraiya - Naruto Shippuden - Ventus Studio', 2, 1, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(31, 'Goku & Gohan - Dragon Ball - Yunqi Studio', 3, 1, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(32, 'Frieza Form 4 - Dragon Ball - DU Studio', 3, 4, '2023-10-30', 'đẹp', 1, 0),
(33, 'Goku - Dragon Ball - Cokey Studio', 3, 1, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(34, 'Goku SSJ3 - Dragon Ball - Last Sleep Studio', 3, 0, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(35, 'Super Saiyan Rose - Dragon Ball - LK Studio', 3, 0, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(36, 'Goku MUI - Dragon Ball - QiYuan Studio', 3, 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(37, 'Goku Spirit Bomb - Dragon Ball - Hunter Studio', 3, 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 1, 0),
(38, 'Goku Universal - Dragon Ball - Huben Studio', 3, 3, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 0, 0),
(39, 'Shenron and Little Goku - Dragon Ball - MX Studio', 3, 2, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 0, 0),
(40, 'Kid Buu - Dragon Ball - RP Studio', 3, 1, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 1, 0),
(41, 'Bust Vegeta Majin Life Size - Dragon Ball - Hero Belief Studio', 3, 3, '2020-08-07', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(42, 'Super Saiyan Blue Gogeta VS Broly - Dragon Ball - KD Studio', 3, 5, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(43, 'Son Goku & Frieza - Dragon Ball - Oracle Studio & Figure Class Studio', 3, 6, '2023-10-30', 'đẹp', 0, 0),
(44, 'Son Goku & Vegeta - Dragon Ball', 3, 1, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(45, 'Broly - Dragon Ball - Fire Flight Studio', 3, 0, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(46, 'Sukuna - Jujutsu Kaisen - LingYu Studio', 4, 0, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(47, 'Jogo - Jujutsu Kaisen - Dashan Studio', 4, 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(48, 'Ryomen Sukuna - Jujutsu Kaisen - Justice Intentions', 4, 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(49, 'Nanami Kento - Jujutsu Kaisen - Fantasy Studio', 4, 4, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 0, 0),
(50, 'Itadori Yuji - Jujutsu Kaisen - Queen Studio', 4, 2, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 0, 0),
(51, 'Gojo Satoru - Jujutsu Kaisen - HHS Studio', 4, 1, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 1, 0),
(52, 'Geto Suguru - Jujutsu Kaisen - Niren Studio', 4, 1, '2020-08-07', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(53, 'Gojo Satoru Scale Figure - Jujutsu Kaisen - Mappa x Design Coco Studio', 4, 3, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(54, 'Gojo Satoru vs Toji Fushigiro - Jujutsu Kaisen - Niren Studio', 4, 4, '2023-10-30', 'đẹp', 0, 0),
(55, 'Todo Aoi NSFW - Jujutsu Kaisen - PKM Studio', 4, 2, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 1, 0),
(56, 'Tokito Muichiro - Kimetsu no Yaiba - Wisteria Studio', 5, 1, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(57, 'Mitsuri Kanroji - Kimetsu no Yaiba  - LC Studio', 5, 0, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(58, 'Inosuke - Kimetsu no Yaiba - TNT Studio', 5, 2, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(59, 'Zenitsu - Kimetsu no Yaiba - Hunter Fan Studio', 5, 3, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 1, 0),
(60, 'Kamado Tanjuro - Kimetsu no Yaiba - Cheng Studio', 5, 3, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 0, 0),
(61, 'Gyutaro - Kimetsu no Yaiba - Wisteria Studio', 5, 2, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 0, 0),
(62, 'Inosuke & Kanao - Kimetsu no Yaiba - Niren Studio', 5, 3, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(63, 'Kamado Tanjiro - Kimetsu no Yaiba - TNT Studio', 5, 5, '2020-08-07', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(64, 'Kanroji Mitsuri - Kimetsu no Yaiba - Fantasy Studio', 5, 3, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 1, 0),
(65, 'Muzan - Kimetsu no Yaiba - Magic Cube Studio', 5, 4, '2023-10-30', 'đẹp', 0, 0),
(66, 'Colossal Titan - Attack On Titan - Giant Studio', 6, 1, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 1, 0),
(67, 'Eren Founding Titan - Attack on Titan - YOLO Studio', 6, 0, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(68, 'Jaw Titan - Attack On Titan - Giant Studio', 6, 0, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(69, 'Cart Titan - Attack On Titan - Giant Studio', 6, 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 1, 0),
(70, 'Reiner & Eren - Attack on Titan - Figurama Collectors', 6, 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 1, 0),
(71, 'Levi & - Attack on Titan - Chikara Studio', 6, 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 1, 0),
(72, 'Annie & Eren - Attack on Titan - Jimei Palace Studio', 6, 2, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 0, 0),
(73, 'Levi Ackerman vs The Beast Titan - Attack On Titan - Player 1 Studio', 6, 2, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(74, 'Life Of Eren Jeager - Attack On Titan - LC Studio', 6, 3, '2020-08-07', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(75, 'Levi Ackerman vs Beast Titan - Attack On Titan - Hertz Studio', 6, 3, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(76, 'Reiner Braun & Bertholdt Hoover - Attack On Titan - Light Team Studio', 6, 5, '2023-10-30', 'đẹp', 0, 0),
(77, 'Eren Yeager - Attack On Titan - Fei Mao Ying Ri Studio', 6, 7, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(78, 'Eren & Mikasa Last Kiss - Attack on Titan - LC Studio', 6, 7, '2020-08-08', 'Eren & Mikasa Last Kiss - Attack on Titan - LC Studio', 0, 0),
(79, 'Levi Ackerman - Attack on Titan - Kitsune Statue', 6, 9, '2020-08-08', 'Levi Ackerman - Attack on Titan - Kitsune Statue', 0, 0),
(80, 'Eren Yeager Titan Ver - Attack On Titan - Chikara Studio', 6, 0, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 1, 0),
(81, 'Ayaka - Genshin Impact - miHoYo', 7, 6, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(82, 'Furina & Focalos NSFW - Genshin Impact - Hakimi Studio', 7, 10, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 0, 0),
(83, 'Eula - Genshin Impact - NSFW - ACY Studio', 7, 9, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 0, 0),
(84, 'Furina - Genshin Impact - Chickweed Fan LV', 7, 9, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 0, 0),
(85, 'Furina NSFW - Genshin Impact - Mi Yin Studio', 7, 34, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(86, 'Yae Miko NSFW - Genshin Impact - Imagination Studio', 7, 4, '2020-08-07', 'Da nhân tạo, Phù hợp đi chơi', 1, 0),
(87, 'Shenhe - Genshin Impact - Atlas Studio', 7, 22, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 0, 0),
(88, 'Shenhe - Genshin Impact - Lazy Dog Studio', 7, 92, '2023-10-30', 'đẹp', 0, 0),
(89, 'Raiden Shogun - Genshin Impact - Imagination Studio', 7, 42, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 1, 0),
(90, 'Raiden Shogun Racing Girl - Genshin Impact - Puffer Studio', 7, 80, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 1, 0),
(91, 'Hutao NSFW - Genshin Impact - Imagination Studio', 7, 96, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 0, 1),
(92, 'Zhongli - Genshin Impact - RedStone Studio', 7, 26, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 1, 0),
(93, 'Yae Miko NSFW - Genshin Impact - ABsinthe Studio', 7, 430, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 0, 1),
(94, 'Nahida - Genshin Impact - Ice Cream Studio', 7, 240, '2020-08-08', '<p>Chất liệu nh&acirc;n tạo. Ph&ugrave; hợp đi l&agrave;m, đi chơi v&agrave; đi tiệc</p>', 0, 1),
(95, 'Nahida - Genshin Impact - KOD Studio', 7, 201, '2020-08-08', '<p>- Nahida l&agrave; một trong những nh&acirc;n vật phụ đầy t&iacute;nh biểu cảm trong thế giới đầy m&ecirc; hoặc của Genshin Impact. Được tạo ra với sự tỉ mỉ v&agrave; t&igrave;nh y&ecirc;u từ KOD Studio, m&ocirc; h&igrave;nh n&agrave;y t&aacute;i hiện ch&acirc;n thực nh&acirc;n vật Nahida với mọi chi tiết đ&aacute;ng kinh ngạc.</p>\r\n<p>- Với chiều cao khoảng 40cm, Nahida đứng vững tr&ecirc;n cơ sở thiết kế độc đ&aacute;o, thể hiện sự mạnh mẽ v&agrave; nữ t&iacute;nh của nh&acirc;n vật. Từ chi tiết trang phục cho đến biểu cảm khu&ocirc;n mặt, mỗi đặc điểm của Nahida đều được t&aacute;i hiện một c&aacute;ch ho&agrave;n hảo.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"Content/imagetourdien/95.jpg\" alt=\"\" width=\"177\" height=\"236\" /></p>\r\n<p>- M&ocirc; h&igrave;nh Nahida được l&agrave;m từ chất liệu nhựa PVC cao cấp, cho độ bền v&agrave; chi tiết tuyệt vời. M&agrave;u sắc sắc n&eacute;t v&agrave; s&aacute;ng tạo của m&ocirc; h&igrave;nh n&agrave;y khiến cho n&oacute; trở th&agrave;nh một điểm nhấn tuyệt vời trong bất kỳ bộ sưu tập n&agrave;o của fan Genshin Impact.</p>\r\n<p>- Sản phẩm được sản xuất v&agrave; ph&acirc;n phối ch&iacute;nh thức bởi KOD Studio, cam kết đem đến trải nghiệm tốt nhất cho c&aacute;c fan của tr&ograve; chơi. M&ocirc; h&igrave;nh Nahida kh&ocirc;ng chỉ l&agrave; một m&oacute;n đồ trang tr&iacute;, m&agrave; c&ograve;n l&agrave; biểu tượng của sự đam m&ecirc; v&agrave; t&igrave;nh y&ecirc;u d&agrave;nh cho Genshin Impact.</p>', 0, 1),
(96, 'Six Paths of Pain - Naruto - Pickstars Studio', 2, 359, '2024-04-28', 'Da nhân tạo, Phù hợp đi chơi', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `masohd` int NOT NULL,
  `makh` int NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int NOT NULL,
  `tinhtrang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`masohd`, `makh`, `ngaydat`, `tongtien`, `tinhtrang`) VALUES
(1, 23, '2024-07-03', 999333, 3),
(2, 23, '2024-06-12', 443000, 3),
(3, 23, '2024-06-15', 413000, 3),
(4, 7, '2024-06-15', 413000, 3),
(5, 7, '2025-09-11', 413000, 3),
(6, 7, '2024-06-14', 413000, -1),
(7, 7, '2024-06-15', 813000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text,
  `sodienthoai` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `sodienthoai`) VALUES
(7, 'Thắng', 'tyu', '8d1ed8d27f2f95ec71e1ad750ab4597f', 'phanminhthang0709@gmail.com', 'ấp Phú Hòa, xã An Phú, huyện Tân Phú, tỉnh Nghệ An', '0355734562'),
(8, 'phan minh thắng', 'poi', '9c4173688ba8f9a28890b841a88039e3', 'haha12345@gmail.com', 'phú lơi, đồng nai, cobodya', '78963369'),
(9, 'phan minh thắng', 'mnb', '9c4173688ba8f9a28890b841a88039e3', 'q22e2@gmail.com', '123 An lạc', '23242343'),
(10, 'Ngọc', 'ngoc', '9c4173688ba8f9a28890b841a88039e3', 'ngoc@gmail.com', 'an phú an lạc c', '12345678889'),
(11, 'KIm', 'kim', '9c4173688ba8f9a28890b841a88039e3', 'kim@gmail.com', 'abc', '09876543'),
(12, 'Thúy', 'thuy', '9c4173688ba8f9a28890b841a88039e3', 'thuy@gmail.com', 'kim phủ', '1122224556'),
(13, 'hằng', 'hang', '9c4173688ba8f9a28890b841a88039e3', 'hang@gmail.com', 'acb123', '01666473434'),
(14, 'long', 'long', '9c4173688ba8f9a28890b841a88039e3', 'long@gmail.com', 'acb234', '123457878'),
(15, 'kha', 'kha', '9c4173688ba8f9a28890b841a88039e3', 'kha@gmail.com', 'kim quang', '1234567890'),
(17, 'hùng', 'hung', '9c4173688ba8f9a28890b841a88039e3', 'hungcvxcv@gmail.com', 'vũng tàu', '12345678990'),
(18, 'liễu', 'lieu', '9c4173688ba8f9a28890b841a88039e3', 'lieu@gmail.com', 'an phú uu', '1234567643'),
(20, 'kiều nguyễn', 'kieu', '9c4173688ba8f9a28890b841a88039e3', 'kieu@gmail.com', 'Nguyễn Hới', '123455'),
(21, 'Thăng ', 'thang', 'accadafe252e4a0a300a8fc334758276', 'phanminhthang0709@gmail.com', 'Nguyễn Hới', '0988898765'),
(22, 'Hậu duệ mặt trời', 'kiss', '8d1ed8d27f2f95ec71e1ad750ab4597f', 'hai123@com.com', 'Sun', '0123456789'),
(23, 'Hùng', 'kaka', '8d1ed8d27f2f95ec71e1ad750ab4597f', 'hai1666@com.com', 'xuân thanh, bình phước, long an', '0988898765');

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `maloai` int NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  `idmenu` int NOT NULL,
  `trangthai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`, `idmenu`, `trangthai`) VALUES
(1, 'One Piece', 3, 0),
(2, 'Naruto', 3, 0),
(3, 'Dragon Ball', 3, 0),
(4, 'Jujustu Kaisen', 3, 0),
(5, 'Kymetsu no Yaiba', 3, 0),
(6, 'Attack on Taitan', 3, 0),
(7, 'Genshin Impact', 3, 0),
(18, 'Áo thun thun', 0, 1),
(19, 'haha', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mausac`
--

CREATE TABLE `mausac` (
  `Idmau` int NOT NULL,
  `mausac` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `trangthai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `mausac`
--

INSERT INTO `mausac` (`Idmau`, `mausac`, `trangthai`) VALUES
(1, 'Jimei Palace', 0),
(2, 'MJ Studio ', 0),
(3, 'Tsume Studio', 0),
(4, 'LZ Studio', 0),
(5, 'ZX Studio', 0),
(6, 'XG Studio', 0),
(7, 'TH Studio', 0),
(8, 'Dream Studio', 0),
(9, 'PHOENIX Studio', 0),
(10, ' LX Studio', 0),
(11, 'ATT Studio', 0),
(12, 'Zuoban Studio', 0),
(13, '2% Studio', 0),
(14, 'Neijuan Studio', 0),
(15, 'LB Studio', 0),
(16, 'DOD Studio', 0),
(17, 'Sea King Studio', 0),
(18, 'IU Studio', 0),
(19, 'SNBR Studio', 0),
(20, 'PickStar Studio', 0),
(21, ' Tsume Art', 0),
(22, 'Rocket Studio', 0),
(23, 'Zuoban Studio', 0),
(24, 'CW Studio', 0),
(25, 'KrazyArt Studio', 0),
(26, 'QBL Studio', 0),
(27, 'GK BOX Studio', 0),
(28, 'Ventus Studio', 0),
(29, 'Pickstars Studio', 0),
(30, 'Yunqi Studio', 0),
(31, 'DU Studio', 0),
(32, 'Cokey Studio', 0),
(33, 'Last Sleep Studio', 0),
(34, 'LK Studio', 0),
(35, 'QiYuan Studio', 0),
(36, 'Hunter Studio', 0),
(37, 'Huben Studio', 0),
(38, 'MX Studio', 0),
(39, 'RP Studio', 0),
(40, 'Hero Belief Studio', 0),
(41, 'KD Studio', 0),
(42, 'Oracle Studio & Figure Class Studio', 0),
(43, 'Fire Flight Studio', 0),
(44, 'LingYu Studio ', 0),
(45, 'Dashan Studio', 0),
(46, 'Justice Intentions Studio', 0),
(47, 'Fantasy Studio', 0),
(48, 'Queen Studio', 0),
(49, 'HHS Studio', 0),
(50, 'Niren Studio', 0),
(51, 'Mappa x Design Coco Studio', 0),
(52, 'PKM Studio', 0),
(53, 'Wisteria Studio', 0),
(54, 'LC Studio', 0),
(55, 'TNT Studio', 0),
(56, 'Hunter Fan Studio', 0),
(57, 'Cheng Studio', 0),
(58, 'Magic Cube Studio', 0),
(59, 'Giant Studio', 0),
(60, 'YOLO Studio', 0),
(61, 'Figurama Collectors', 0),
(62, 'Chikara Studio', 0),
(63, 'Player 1 Studio', 0),
(64, 'Hertz Studio', 0),
(65, 'Light Team Studio', 0),
(66, 'Fei Mao Ying Ri Studio', 0),
(67, 'Kitsune Statue', 0),
(68, ' MiHoYo', 0),
(69, 'Hakimi Studio', 0),
(70, 'ACY Studio', 0),
(71, 'Chickweed Fan LV', 0),
(72, 'Mi Yin Studio', 0),
(73, 'Imagination Studio', 0),
(74, 'Atlas Studio', 0),
(75, 'Lazy Dog Studio', 0),
(76, 'Puffer Studio', 0),
(77, 'RedStone Studio', 0),
(78, 'ABsinthe Studio', 0),
(79, 'Ice Cream Studio', 0),
(80, 'KOD Studio', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idnv` int NOT NULL,
  `hoten` varchar(250) NOT NULL,
  `dia` text NOT NULL,
  `username` varchar(250) NOT NULL,
  `matkhau` text NOT NULL,
  `idcv` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`idnv`, `hoten`, `dia`, `username`, `matkhau`, `idcv`) VALUES
(1, 'nguyễn hạo vy', 'hcm', 'admin', '123456', 1),
(2, 'nguyễn hạo nam', 'hcm', 'admin1', '1234567', 1),
(4, 'Lý Hải Hùng', 'Kiên Giang', 'admin2', '123123', 2),
(5, 'Kiều Trang', 'Kiên Giang', 'chang', '1234', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sizegiay`
--

CREATE TABLE `sizegiay` (
  `Idsize` int NOT NULL,
  `size` varchar(10) NOT NULL,
  `trangthai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `sizegiay`
--

INSERT INTO `sizegiay` (`Idsize`, `size`, `trangthai`) VALUES
(1, '1/2', 0),
(2, '1/3', 0),
(3, '1/4', 0),
(4, '1/5', 0),
(5, '1/6', 0),
(9, '1/9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `spthich`
--

CREATE TABLE `spthich` (
  `makh` int NOT NULL,
  `mahh` int NOT NULL,
  `yeuthich` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `spthich`
--

INSERT INTO `spthich` (`makh`, `mahh`, `yeuthich`) VALUES
(7, 94, 1),
(7, 94, 1),
(7, 95, 1),
(7, 91, 1),
(7, 93, 1);

-- --------------------------------------------------------

--
-- Table structure for table `xacnhan`
--

CREATE TABLE `xacnhan` (
  `masohd` int NOT NULL,
  `hoten` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `sodienthoai` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `diachi` varchar(2000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `thanhtoan` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ghichu` varchar(2000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phiship` int NOT NULL,
  `tinhtrang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `xacnhan`
--

INSERT INTO `xacnhan` (`masohd`, `hoten`, `sodienthoai`, `diachi`, `thanhtoan`, `ghichu`, `phiship`, `tinhtrang`) VALUES
(1, ' Hùng', '0988898765', 'xuân thanh, bình phước, long an', 'bank', '', 0, 3),
(2, ' Hùng', '0988898765', 'xuân thanh, bình phước, long an', 'bank', '', 80000, 3),
(3, ' Hùng', '0988898765', 'xuân thanh, bình phước, long an', 'bank', '', 80000, 3),
(4, ' Thắng', '0355734562', 'ấp Phú Hòa, xã An Phú, huyện Tân Phú, tỉnh Nghệ An', 'bank', '', 80000, 3),
(5, ' Thắng', '0355734562', 'ấp Phú Hòa, xã An Phú, huyện Tân Phú, tỉnh Nghệ An', 'bank', '', 80000, 3),
(6, ' Thắng', '0355734562', 'ấp Phú Hòa, xã An Phú, huyện Tân Phú, tỉnh Nghệ An', 'bank', '', 80000, -1),
(7, ' Thắng', '0355734562', 'ấp Phú Hòa, xã An Phú, huyện Tân Phú, tỉnh Nghệ An', 'cod', 'húhsu', 80000, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`idcv`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idcomment`);

--
-- Indexes for table `cthanghoa`
--
ALTER TABLE `cthanghoa`
  ADD PRIMARY KEY (`idhanghoa`,`idmau`,`idsize`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mahh`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`masohd`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Indexes for table `mausac`
--
ALTER TABLE `mausac`
  ADD PRIMARY KEY (`Idmau`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idnv`);

--
-- Indexes for table `sizegiay`
--
ALTER TABLE `sizegiay`
  ADD PRIMARY KEY (`Idsize`);

--
-- Indexes for table `xacnhan`
--
ALTER TABLE `xacnhan`
  ADD PRIMARY KEY (`masohd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `idcv` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idcomment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `mahh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `masohd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mausac`
--
ALTER TABLE `mausac`
  MODIFY `Idmau` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `idnv` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sizegiay`
--
ALTER TABLE `sizegiay`
  MODIFY `Idsize` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `xacnhan`
--
ALTER TABLE `xacnhan`
  MODIFY `masohd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
