-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 16, 2021 lúc 03:59 PM
-- Phiên bản máy phục vụ: 5.7.33-cll-lve
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mimitest_hta`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DLC_Chuyentien`
--

CREATE TABLE `DLC_Chuyentien` (
  `id` int(11) NOT NULL,
  `nguoichuyen` text CHARACTER SET utf8 NOT NULL,
  `nguoinhan` text CHARACTER SET utf8 NOT NULL,
  `sotien` int(11) NOT NULL,
  `noidung` text CHARACTER SET utf8 NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DLC_Dichvu`
--

CREATE TABLE `DLC_Dichvu` (
  `id` int(11) NOT NULL,
  `username` text CHARACTER SET utf8 NOT NULL,
  `nguoiban` text CHARACTER SET utf8 NOT NULL,
  `dichvu` text CHARACTER SET utf8mb4 NOT NULL,
  `trigia` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `noidung` text CHARACTER SET utf8 NOT NULL,
  `thoigianduyet` int(11) NOT NULL,
  `vangngoc` text CHARACTER SET utf8 NOT NULL,
  `server` int(11) NOT NULL,
  `taikhoan` text CHARACTER SET utf8 NOT NULL,
  `matkhau` text CHARACTER SET utf8 NOT NULL,
  `tennhanvat` text CHARACTER SET utf8 NOT NULL,
  `thoigian` int(11) NOT NULL,
  `ngay` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `nam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `DLC_Dichvu`
--

INSERT INTO `DLC_Dichvu` (`id`, `username`, `nguoiban`, `dichvu`, `trigia`, `tinhtrang`, `noidung`, `thoigianduyet`, `vangngoc`, `server`, `taikhoan`, `matkhau`, `tennhanvat`, `thoigian`, `ngay`, `thang`, `nam`) VALUES
(30, 'kingdz01', '', '1', 10000, 1, '', 1624799598, '27000000', 0, '13131', '1313', '', 1624798921, 27, 6, 2021),
(31, 'kingdz01', '', '2', 50000, 1, '', 1624799215, '275', 0, 'Fuggg', 'Hghjh', '', 1624799177, 27, 6, 2021),
(32, 'ren123', '', '1', 10000, 0, '', 0, '27000000', 0, '212121', '1221', '', 1624864869, 28, 6, 2021),
(34, 'ren123', '', '1', 10000, 0, '', 0, '650000', 0, '2221', '2212121', '', 1624932918, 29, 6, 2021),
(35, 'ren123', '', '1', 10000, 0, '', 0, '650000', 0, '1221', '2121', '', 1624933305, 29, 6, 2021),
(36, 'ren123', '', '1', 10000, 0, '', 0, '650000', 0, '212112', '11221', '', 1624933753, 29, 6, 2021),
(37, 'ren123', '', '1', 10000, 0, '', 0, '650000', 0, '21221', '22121', '', 1624933852, 29, 6, 2021),
(38, 'ren123', '', '1', 10000, 0, '', 0, '650000', 0, '212121', '2121', '', 1624940908, 29, 6, 2021),
(39, 'popapa123', '', '1', 10000, 0, '', 0, '50000000', 0, '123', '123', '', 1629090829, 16, 8, 2021),
(40, 'popapa123', '', '2', 50000, 1, '', 1629090875, '305000', 0, '123', '123', '', 1629090858, 16, 8, 2021),
(41, 'popapa123', '', '1', 100000, 1, '', 1629092242, '500000000', 0, 'acc', 'acc', '', 1629092223, 16, 8, 2021),
(42, 'popapa123', '', '2', 50000, 2, '', 1629092275, '305000', 0, 'hihi', 'hihi', '', 1629092263, 16, 8, 2021);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DLC_hopqua`
--

CREATE TABLE `DLC_hopqua` (
  `ID` int(11) NOT NULL,
  `nguoimua` text CHARACTER SET utf8 NOT NULL,
  `taikhoan` text CHARACTER SET utf8 NOT NULL,
  `matkhau` text CHARACTER SET utf8 NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DLC_Logbalance`
--

CREATE TABLE `DLC_Logbalance` (
  `id` int(11) NOT NULL,
  `username` text CHARACTER SET utf8 NOT NULL,
  `giaodich` int(11) NOT NULL,
  `sotien` text CHARACTER SET utf8 NOT NULL,
  `soducuoi` int(11) NOT NULL,
  `mota` text CHARACTER SET utf8 NOT NULL,
  `time` int(11) NOT NULL,
  `ngay` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `nam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `DLC_Logbalance`
--

INSERT INTO `DLC_Logbalance` (`id`, `username`, `giaodich`, `sotien`, `soducuoi`, `mota`, `time`, `ngay`, `thang`, `nam`) VALUES
(465, 'kingdz01', 2, '<span class=\"c-font-bold text-info\">+210,000đ</span>', 210000, 'Nạp thẻ VIETTEL 200,000đ', 1624797354, 27, 6, 2021),
(466, 'kingdz01', 2, '<span class=\"c-font-bold text-info\">+210,000đ</span>', 420000, 'Nạp thẻ VIETTEL 200,000đ', 1624797375, 27, 6, 2021),
(467, 'kingdz01', 7, '<span class=\"c-font-bold text-danger\">-10,000đ</span>', 410000, 'Mua 10,000đ Vàng', 1624798921, 27, 6, 2021),
(468, 'kingdz01', 7, '<span class=\"c-font-bold text-danger\">-50,000đ</span>', 360000, 'Mua 50,000đ Ngọc', 1624799177, 27, 6, 2021),
(469, 'kingdz01', 8, '<span class=\"c-font-bold text-danger\">-50,000đ</span>', 310000, 'Mua tài khoản game Ngọc rồng giá 50,000đ', 1624799373, 27, 6, 2021),
(470, 'kingdz01', 6, '<span class=\"c-font-bold text-info\">+20,000đ</span>', 21160, 'Thanh lý nick Ngọc Rồng giá 20,000đ', 1624863605, 28, 6, 2021),
(471, 'ren123', 7, '<span class=\"c-font-bold text-danger\">-10,000đ</span>', 1785000, 'Mua 10,000đ Vàng', 1624864869, 28, 6, 2021),
(472, 'ren123', 7, '<span class=\"c-font-bold text-danger\">-100,000đ</span>', 1665000, 'Mua 100,000đ Vàng', 1624866080, 28, 6, 2021),
(473, 'ccccc1', 6, '<span class=\"c-font-bold text-info\">+100,000đ</span>', 100000, 'Thanh lý nick Ngọc Rồng giá 100,000đ', 1624885689, 28, 6, 2021),
(474, 'kingdz01', 2, '<span class=\"c-font-bold text-info\">+1,050,000đ</span>', 1071160, 'Nạp thẻ VIETTEL 1,000,000đ', 1624888242, 28, 6, 2021),
(475, 'kingdz01', 2, '<span class=\"c-font-bold text-info\">+1,050,000đ</span>', 2121160, 'Nạp thẻ VIETTEL 1,000,000đ', 1624888259, 28, 6, 2021),
(476, 'kingdz01', 8, '<span class=\"c-font-bold text-danger\">-700,000đ</span>', 1421160, 'Mua tài khoản game Ngọc rồng giá 700,000đ', 1624888337, 28, 6, 2021),
(477, 'ren123', 7, '<span class=\"c-font-bold text-danger\">-10,000đ</span>', 981000, 'Mua 10,000đ Xu', 1624932918, 29, 6, 2021),
(478, 'ren123', 7, '<span class=\"c-font-bold text-danger\">-10,000đ</span>', 971000, 'Mua 10,000đ Xu', 1624933305, 29, 6, 2021),
(479, 'ren123', 7, '<span class=\"c-font-bold text-danger\">-10,000đ</span>', 19990000, 'Mua 10,000đ Vàng', 1625026530, 30, 6, 2021),
(480, 'ren123', 7, '<span class=\"c-font-bold text-danger\">-10,000đ</span>', 19980000, 'Mua 10,000đ Vàng', 1625026624, 30, 6, 2021),
(481, 'ren123', 7, '<span class=\"c-font-bold text-danger\">-200,000,000đ</span>', 0, 'Mua 200,000,000đ Vàng', 1625027224, 30, 6, 2021),
(482, 'ren123', 7, '<span class=\"c-font-bold text-danger\">-20,000,000đ</span>', 0, 'Mua 20,000,000đ Vàng', 1625027735, 30, 6, 2021),
(483, 'ren123', 7, '<span class=\"c-font-bold text-danger\">-20,000,000đ</span>', 50000000, 'Mua 20,000,000đ Vàng', 1625027852, 30, 6, 2021),
(484, 'kingdz01', 8, '<span class=\"c-font-bold text-danger\">-1,212đ</span>', 1419948, 'Mua tài khoản game Ngọc rồng(Random) giá 1,212đ', 1625047562, 30, 6, 2021),
(485, 'kingdz01', 8, '<span class=\"c-font-bold text-danger\">-90,000đ</span>', 1187440, 'Mua tài khoản game Ngọc rồng(Random) giá 90,000đ', 1625204089, 2, 7, 2021),
(486, 'popapa123', 8, '<span class=\"c-font-bold text-danger\">-10,000đ</span>', 9965000, 'Mua tài khoản game Ngọc rồng giá 10,000đ', 1629028277, 15, 8, 2021),
(487, 'popapa123', 8, '<span class=\"c-font-bold text-danger\">-2,000đ</span>', 9963000, 'Mua tài khoản game Ngọc rồng giá 2,000đ', 1629089055, 16, 8, 2021),
(488, 'popapa123', 8, '<span class=\"c-font-bold text-danger\">-100,000đ</span>', 9858000, 'Mua tài khoản game Ngọc rồng giá 100,000đ', 1629090567, 16, 8, 2021),
(489, 'popapa123', 8, '<span class=\"c-font-bold text-danger\">-20,000đ</span>', 9838000, 'Mua tài khoản game Ngọc rồng giá 20,000đ', 1629090685, 16, 8, 2021),
(490, 'popapa123', 6, '<span class=\"c-font-bold text-info\">+10,000đ</span>', 9848000, 'Thanh lý nick Ngọc Rồng giá 10,000đ', 1629090768, 16, 8, 2021),
(491, 'popapa123', 7, '<span class=\"c-font-bold text-danger\">-10,000đ</span>', 9838000, 'Mua 10,000đ Vàng', 1629090829, 16, 8, 2021),
(492, 'popapa123', 7, '<span class=\"c-font-bold text-danger\">-50,000đ</span>', 9788000, 'Mua 50,000đ Ngọc', 1629090859, 16, 8, 2021),
(493, 'popapa123', 8, '<span class=\"c-font-bold text-danger\">-200,000đ</span>', 9518000, 'Mua tài khoản game Ngọc rồng giá 200,000đ', 1629091957, 16, 8, 2021),
(494, 'popapa123', 8, '<span class=\"c-font-bold text-danger\">-20,000đ</span>', 9498000, 'Mua tài khoản game Ngọc rồng giá 20,000đ', 1629092053, 16, 8, 2021),
(495, 'popapa123', 6, '<span class=\"c-font-bold text-info\">+9,000đ</span>', 9507000, 'Thanh lý nick Ngọc Rồng giá 9,000đ', 1629092152, 16, 8, 2021),
(496, 'popapa123', 7, '<span class=\"c-font-bold text-danger\">-100,000đ</span>', 9407000, 'Mua 100,000đ Vàng', 1629092223, 16, 8, 2021),
(497, 'popapa123', 7, '<span class=\"c-font-bold text-danger\">-50,000đ</span>', 9357000, 'Mua 50,000đ Ngọc', 1629092263, 16, 8, 2021);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DLC_Napthe`
--

CREATE TABLE `DLC_Napthe` (
  `id` int(11) NOT NULL,
  `nguoinap` text CHARACTER SET utf8 NOT NULL,
  `serial` varchar(25) NOT NULL,
  `pin` varchar(25) NOT NULL,
  `type` text CHARACTER SET utf8 NOT NULL,
  `amount` varchar(25) NOT NULL,
  `kieunap` int(11) NOT NULL,
  `tinhtrang` text CHARACTER SET utf8 NOT NULL,
  `tinhtrangduyet` int(11) NOT NULL,
  `time` int(25) NOT NULL,
  `ngay` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `nam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `DLC_Napthe`
--

INSERT INTO `DLC_Napthe` (`id`, `nguoinap`, `serial`, `pin`, `type`, `amount`, `kieunap`, `tinhtrang`, `tinhtrangduyet`, `time`, `ngay`, `thang`, `nam`) VALUES
(256, 'kingdz01', '13443534445555', '6645555666454', 'VIETTEL', '200000', 0, '<span class=\"text-success f-700\"> Đúng mệnh giá (+100%) +210,000đ</span>', 1, 1624797300, 27, 6, 2021),
(257, 'kingdz01', '8687678688', '6645555666454', 'VIETTEL', '200000', 0, '<span class=\"text-success f-700\"> Đúng mệnh giá (+100%) +210,000đ</span>', 1, 1624797322, 27, 6, 2021),
(258, 'kingdz01', '4553456764455565', '7777644656676555', 'VIETTEL', '1000000', 0, '<span class=\"text-success f-700\"> Đúng mệnh giá (+100%) +1,050,000đ</span>', 1, 1624888208, 28, 6, 2021),
(259, 'kingdz01', '4553456764455', '7777644656676555', 'VIETTEL', '1000000', 0, '<span class=\"text-success f-700\"> Đúng mệnh giá (+100%) +1,050,000đ</span>', 1, 1624888215, 28, 6, 2021);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DLC_Nganhang`
--

CREATE TABLE `DLC_Nganhang` (
  `id` int(11) NOT NULL,
  `chubank` text CHARACTER SET utf8 NOT NULL,
  `username` text CHARACTER SET utf8 NOT NULL,
  `bankaccount` int(11) NOT NULL,
  `bankname` text CHARACTER SET utf8 NOT NULL,
  `chinhanh` text CHARACTER SET utf8 NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `DLC_Nganhang`
--

INSERT INTO `DLC_Nganhang` (`id`, `chubank`, `username`, `bankaccount`, `bankname`, `chinhanh`, `type`) VALUES
(11, '', 'ren123', 1, 'nick123', '', 1),
(12, '', 'ren123', 2, 'hihi123', '', 1),
(13, '233232', 'ren123', 8, '32323', '323', 0),
(14, '1221', 'ren123', 8, '22121', '221', 0),
(15, '22121', 'ren123', 8, '21', '2112', 0),
(16, 'O', 'kingdz01', 8, 'O', 'O', 0),
(17, '', 'huuviet29', 1, '<script>alert(\'xss\')</script>', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DLC_Nhapnick`
--

CREATE TABLE `DLC_Nhapnick` (
  `ID` int(11) NOT NULL,
  `nguoiban` text CHARACTER SET utf8 NOT NULL,
  `taikhoan` text NOT NULL,
  `matkhau` text CHARACTER SET utf8 NOT NULL,
  `server` int(11) NOT NULL,
  `loaigame` int(11) NOT NULL,
  `giatien` int(11) NOT NULL,
  `noidung` text CHARACTER SET utf8 NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `time` text NOT NULL,
  `ngay` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `nam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `DLC_Nhapnick`
--

INSERT INTO `DLC_Nhapnick` (`ID`, `nguoiban`, `taikhoan`, `matkhau`, `server`, `loaigame`, `giatien`, `noidung`, `tinhtrang`, `time`, `ngay`, `thang`, `nam`) VALUES
(14, 'ccccc1', 'cureu@yahoo.com', 'choan', 3, 0, 0, 'chó ân dz', 0, '1624885471', 28, 6, 2021),
(15, 'ccccc1', 'cureu@yahoo.com', 'choan', 3, 0, 0, 'chó ân dz', 0, '1624885473', 28, 6, 2021),
(16, 'ccccc1', 'cureu@yahoo.com', 'choan', 3, 0, 0, 'chó ân dz', 0, '1624885474', 28, 6, 2021),
(17, 'ccccc1', 'cureu@yahoo.com', 'choan', 3, 0, 100000, 'chó ân dz', 1, '1624885477', 28, 6, 2021),
(18, 'popapa123', '07708242087', 'loncac', 1, 0, 10000, 'như cc', 1, '1629090754', 16, 8, 2021),
(19, 'popapa123', '07708242087', 'loncac', 1, 0, 9000, 'nick ss đt', 1, '1629092125', 16, 8, 2021);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DLC_Nickdamua`
--

CREATE TABLE `DLC_Nickdamua` (
  `id` int(11) NOT NULL,
  `idnick` int(11) NOT NULL,
  `nguoimua` text CHARACTER SET utf8 NOT NULL,
  `loaigame` int(11) NOT NULL,
  `taikhoan` text CHARACTER SET utf8 NOT NULL,
  `matkhau` text CHARACTER SET utf8 NOT NULL,
  `server` int(11) NOT NULL,
  `trigia` int(11) NOT NULL,
  `nguoiban` text CHARACTER SET utf8 NOT NULL,
  `time` int(11) NOT NULL,
  `ngay` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `nam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `DLC_Nickdamua`
--

INSERT INTO `DLC_Nickdamua` (`id`, `idnick`, `nguoimua`, `loaigame`, `taikhoan`, `matkhau`, `server`, `trigia`, `nguoiban`, `time`, `ngay`, `thang`, `nam`) VALUES
(231, 463, 'kingdz01', 0, 'kinglaydz97@gmail.com', 'kigaugau', 3, 50000, 'kingdz01', 1624799373, 27, 6, 2021),
(232, 464, 'kingdz01', 0, 'kinglaydz97@gmail.com', 'annhan12', 3, 700000, 'kingdz01', 1624888337, 28, 6, 2021),
(233, 2, 'kingdz01', 3, '1212', '2121', 0, 1212, 'lon123', 1625047562, 30, 6, 2021),
(234, 3, 'kingdz01', 3, 'Bạn Trúng được 14tr vàng', '14.000000', 0, 90000, 'kingdz01', 1625204089, 2, 7, 2021),
(235, 465, 'popapa123', 0, '07708242087', 'loncac', 1, 10000, 'lon123', 1629028277, 15, 8, 2021),
(236, 467, 'popapa123', 0, '07708242087', 'loncac', 1, 2000, 'lon123', 1629089055, 16, 8, 2021),
(237, 469, 'popapa123', 0, '07708242087', 'loncac', 1, 100000, 'lon123', 1629090567, 16, 8, 2021),
(238, 470, 'popapa123', 0, '07708242087', 'loncac', 1, 20000, 'lon123', 1629090685, 16, 8, 2021),
(239, 471, 'popapa123', 0, '07708242087', 'loncac', 1, 200000, 'lon123', 1629091957, 16, 8, 2021),
(240, 472, 'popapa123', 0, '07708242087', 'loncac', 1, 20000, 'lon123', 1629092053, 16, 8, 2021);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DLC_Ruttien`
--

CREATE TABLE `DLC_Ruttien` (
  `id` int(11) NOT NULL,
  `chubank` text NOT NULL,
  `chinhanh` text NOT NULL,
  `bankname` text NOT NULL,
  `bankaccount` text NOT NULL,
  `sotien` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `time` int(11) NOT NULL,
  `nguoirut` varchar(32) NOT NULL,
  `tinhtrang` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DLC_setting`
--

CREATE TABLE `DLC_setting` (
  `id` int(11) NOT NULL,
  `tenweb` text CHARACTER SET utf8 NOT NULL,
  `thongbao` text CHARACTER SET utf8 NOT NULL,
  `ho` text CHARACTER SET utf8 NOT NULL,
  `ten` text CHARACTER SET utf8 NOT NULL,
  `sdt` text CHARACTER SET utf8 NOT NULL,
  `linkfb` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rutvang`
--

CREATE TABLE `rutvang` (
  `id` int(11) NOT NULL,
  `username` text CHARACTER SET utf8 NOT NULL,
  `nguoiban` text CHARACTER SET utf8 NOT NULL,
  `dichvu` text CHARACTER SET utf8 NOT NULL,
  `trigia` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `noidung` text CHARACTER SET utf8 NOT NULL,
  `thoigianduyet` int(11) NOT NULL,
  `vangngoc` text CHARACTER SET utf8 NOT NULL,
  `server` int(11) NOT NULL,
  `taikhoan` text CHARACTER SET utf8 NOT NULL,
  `matkhau` text CHARACTER SET utf8 NOT NULL,
  `thoigian` int(11) NOT NULL,
  `ngay` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `nam` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Service`
--

CREATE TABLE `Service` (
  `ID` int(11) NOT NULL,
  `username` text CHARACTER SET utf8 NOT NULL,
  `group_id` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `acc_name` text CHARACTER SET utf8 NOT NULL,
  `acc_pass` text CHARACTER SET utf8 NOT NULL,
  `server` int(11) NOT NULL,
  `ingame` text CHARACTER SET utf8 NOT NULL,
  `mistake_by` int(11) NOT NULL,
  `note` text CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `time_duyet` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `Service`
--

INSERT INTO `Service` (`ID`, `username`, `group_id`, `service`, `price`, `title`, `acc_name`, `acc_pass`, `server`, `ingame`, `mistake_by`, `note`, `status`, `time`, `time_duyet`, `day`, `month`, `year`) VALUES
(15, 'ren123', 1, 6, 124000, 'Gói Sơ sinh -1tr5 ( cần 180 ngọc xanh )', '122121', '211221', 1, '', 0, '', 1, 1625029645, 0, 30, 6, 2021),
(14, 'ren123', 1, 2, 81000, 'Gói Nhiệm Vụ Tiêu Diệt Androi 19,20,13,14,15', '212121', '211', 1, '', 0, '', 1, 1624930885, 0, 29, 6, 2021),
(13, 'ren123', 1, 1, 200000, 'Gói Úp 10K Bí Kiếp', 'địt', 'địt', 1, '', 0, '', 1, 1624891626, 0, 28, 6, 2021),
(12, 'ren123', 1, 1, 250000, 'Gói Úp 10K Bí Kiếp', 'test', 'test', 2, '', 0, '', 1, 1624873981, 0, 28, 6, 2021),
(11, 'ren123', 1, 4, 20000, 'Gói Xayda Có Tự Sát (Skill5)', '212121', '212121', 1, '', 0, '', 1, 1624868682, 0, 28, 6, 2021),
(10, 'ren123', 1, 1, 41000, 'Gói Úp 1K Bí Kiếp', 'haduchieu', 'concac@gmail.com', 7, '', 0, '', 1, 1624867842, 0, 28, 6, 2021),
(9, 'ren123', 1, 1, 41000, 'Gói Úp 1K Bí Kiếp', '211221', '2112', 1, '', 0, '', 1, 1624867680, 0, 28, 6, 2021),
(16, 'huuviet', 1, 4, 20000, 'Gói Xayda Có Tự Sát (Skill5)', '<script>alert(\'abc\')</script>', '<script>alert(\'abc\')</script>', 1, '', 0, 'Cmmm', 4, 1625033118, 1625033223, 30, 6, 2021),
(17, 'ren123', 1, 1, 15000, 'Gói Úp Từ Lv1-30', '1212', '2112', 1, '', 0, '', 1, 1625105749, 0, 1, 7, 2021),
(18, 'kingdz01', 1, 6, 150000, '150tr Sức Mạnh - 1tỉ5 Sức Mạnh ( Cần 400 Ngọc )', 'annhan12', 'kingdz01', 4, '', 1, 'Thông Tin Sai', 5, 1625203837, 1625203914, 2, 7, 2021),
(19, 'ren123', 1, 4, 40000, 'Sơ Sinh ( Vào Được Pt )', '121212', 'nolll21221', 7, '', 0, '', 1, 1625898799, 0, 10, 7, 2021),
(20, 'popapa123', 1, 4, 25000, '(Săn Đệ Tử)Namek Có Skill 5 (Laze)', 'cac', 'cac', 4, '', 0, '', 1, 1629027928, 0, 15, 8, 2021),
(21, 'popapa123', 1, 10, 5000, 'Bộ Ngọc Rồng 3 Sao', '2121', '2121', 1, '', 0, '', 4, 1629090173, 1629090192, 16, 8, 2021),
(22, 'popapa123', 1, 4, 25000, '(Săn Đệ Tử)Namek Có Skill 5 (Laze)', 'nick', 'nick', 5, '', 2, 'game lỗi như cc', 5, 1629090900, 1629090924, 16, 8, 2021),
(23, 'popapa123', 1, 10, 45000, 'Bộ Ngọc Rồng 2 Sao', '21212', '211', 1, '', 0, '', 4, 1629090963, 1629090981, 16, 8, 2021),
(24, 'popapa123', 1, 4, 25000, '(Săn Đệ Tử)Trái Đất Có Skill 5 (Qckk)', 'săn đt', 'săn đt', 5, '', 0, 'đéo làm đc', 3, 1629092300, 1629092331, 16, 8, 2021),
(25, 'popapa123', 1, 10, 6000, 'Bộ Ngọc Rồng 1 Sao', '123', '123', 6, '', 0, '123', 4, 1629092365, 1629092395, 16, 8, 2021);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TOM_Congtacvien`
--

CREATE TABLE `TOM_Congtacvien` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `sonickban` int(11) DEFAULT '0',
  `nickdangban` int(11) NOT NULL,
  `doanhthu` int(11) DEFAULT '0',
  `admin` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `TOM_Congtacvien`
--

INSERT INTO `TOM_Congtacvien` (`ID`, `user`, `pass`, `sonickban`, `nickdangban`, `doanhthu`, `admin`) VALUES
(1, 'kingdz01', 'a165f6b79f404513a973c51d7545c781', 3, 0, 546000, 9),
(2, 'taikhoan', 'a788f6d55914857d4b97c1de99cb896b', 0, 0, 0, 1),
(3, 'lon123', 'd4812fe78821724986523737477ae089', 7, 5, 229587, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TOM_Nick`
--

CREATE TABLE `TOM_Nick` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `taikhoan` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `giatien` int(11) NOT NULL,
  `server` int(11) DEFAULT '0',
  `hanhtinh` int(11) DEFAULT '0',
  `hinhanh` text NOT NULL,
  `loainick` int(11) DEFAULT '0',
  `ngay` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `nam` int(11) NOT NULL,
  `congtacvien` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `TOM_Nick`
--

INSERT INTO `TOM_Nick` (`ID`, `taikhoan`, `matkhau`, `giatien`, `server`, `hanhtinh`, `hinhanh`, `loainick`, `ngay`, `thang`, `nam`, `congtacvien`) VALUES
(466, '07708242087', 'loncac', 1000000, 1, 1, 'https://shophplayer.com/admincp/anh/10072021/Screenshot_20210710-113554.png', 0, 15, 8, 2021, 'lon123'),
(468, '07708242087', 'loncac', 20000, 1, 0, 'https://upanh.cf/xhors2483d.jpg', 4, 16, 8, 2021, 'lon123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TOM_setting`
--

CREATE TABLE `TOM_setting` (
  `key` tinytext NOT NULL,
  `tinhtrang` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TOM_Users`
--

CREATE TABLE `TOM_Users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(60) NOT NULL,
  `sodu` int(11) DEFAULT '0',
  `admin` int(11) DEFAULT '0',
  `locked` int(11) NOT NULL,
  `vongquay` bigint(50) NOT NULL,
  `vang` int(100) NOT NULL,
  `time` text NOT NULL,
  `ip` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `TOM_Users`
--

INSERT INTO `TOM_Users` (`ID`, `username`, `password`, `name`, `sodu`, `admin`, `locked`, `vongquay`, `vang`, `time`, `ip`) VALUES
(1, 'kingdz01', 'annhan12', 'kinglaydz', 1187440, 1, 0, 12, 19814985, '1624774768', '14.237.6.156'),
(2, 'ren123', 'popapa123', 'ren123', 686096, 0, 0, 12121195, 18237921, '1624856975', '113.174.211.58'),
(3, 'ccccc1', '123123asd', 'okekucon', 0, 0, 0, 0, 34495280, '1624885365', '171.245.171.76'),
(4, 'huuviet', '123456', '&lt;script&gt;alert(\'abc\')&lt;/script&gt;', 889714, 0, 0, 0, 5535603, '1625032731', '171.242.117.103'),
(5, 'huuviet29', '123456', '&lt;script&gt;alert(\'xss\')&lt;/script&gt;', 0, 0, 0, 0, 0, '1625207846', '171.242.117.103'),
(6, 'popapa123', 'popapa123', 'hehe123', 9326000, 0, 0, 0, 0, '1629027348', '14.233.246.90');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `DLC_Chuyentien`
--
ALTER TABLE `DLC_Chuyentien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `DLC_Dichvu`
--
ALTER TABLE `DLC_Dichvu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `DLC_hopqua`
--
ALTER TABLE `DLC_hopqua`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `DLC_Logbalance`
--
ALTER TABLE `DLC_Logbalance`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `DLC_Napthe`
--
ALTER TABLE `DLC_Napthe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `DLC_Nganhang`
--
ALTER TABLE `DLC_Nganhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `DLC_Nhapnick`
--
ALTER TABLE `DLC_Nhapnick`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `DLC_Nickdamua`
--
ALTER TABLE `DLC_Nickdamua`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `DLC_Ruttien`
--
ALTER TABLE `DLC_Ruttien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `DLC_setting`
--
ALTER TABLE `DLC_setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rutvang`
--
ALTER TABLE `rutvang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `TOM_Congtacvien`
--
ALTER TABLE `TOM_Congtacvien`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `TOM_Nick`
--
ALTER TABLE `TOM_Nick`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `TOM_setting`
--
ALTER TABLE `TOM_setting`
  ADD PRIMARY KEY (`key`(30));

--
-- Chỉ mục cho bảng `TOM_Users`
--
ALTER TABLE `TOM_Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `DLC_Chuyentien`
--
ALTER TABLE `DLC_Chuyentien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `DLC_Dichvu`
--
ALTER TABLE `DLC_Dichvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `DLC_hopqua`
--
ALTER TABLE `DLC_hopqua`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `DLC_Logbalance`
--
ALTER TABLE `DLC_Logbalance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT cho bảng `DLC_Napthe`
--
ALTER TABLE `DLC_Napthe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT cho bảng `DLC_Nganhang`
--
ALTER TABLE `DLC_Nganhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `DLC_Nhapnick`
--
ALTER TABLE `DLC_Nhapnick`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `DLC_Nickdamua`
--
ALTER TABLE `DLC_Nickdamua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT cho bảng `DLC_Ruttien`
--
ALTER TABLE `DLC_Ruttien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `DLC_setting`
--
ALTER TABLE `DLC_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `rutvang`
--
ALTER TABLE `rutvang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `Service`
--
ALTER TABLE `Service`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `TOM_Congtacvien`
--
ALTER TABLE `TOM_Congtacvien`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `TOM_Nick`
--
ALTER TABLE `TOM_Nick`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=473;

--
-- AUTO_INCREMENT cho bảng `TOM_Users`
--
ALTER TABLE `TOM_Users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
