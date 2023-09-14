-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 14, 2023 lúc 07:34 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `UserName` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Role` enum('Admin','Staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `UserName`, `Password`, `Address`, `PhoneNumber`, `Email`, `Role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Ha Noi', '0974054129', 'admin@gmail.com', 'Admin'),
(2, 'guest', '084e0343a0486ff05530df6c705c8bb4', 'Hai Phong', '0123456789', 'guest@gmail.com', ''),
(3, 'staff', '1253208465b1efa876f982d8a9e73eef', 'Ho Chi Minh', '0987654321', 'staff@gmail.com', 'Staff'),
(4, 'staff2', '1253208465b1efa876f982d8a9e73eef', 'Nghe An', '0987123456', 'staff2@gmail.com', 'Staff');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `cmt_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `cmt_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`cmt_id`, `id`, `f_id`, `Comment`, `cmt_Time`) VALUES
(1, 1, 1, 'Good', '0000-00-00 00:00:00'),
(2, 1, 1, 'Bad', '0000-00-00 00:00:00'),
(3, 1, 1, 'test', '2023-09-14 05:21:18'),
(4, 1, 2, 'I like it', '2023-09-14 05:23:14'),
(5, 2, 2, 'very helpful', '2023-09-14 05:26:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `Image` mediumtext NOT NULL,
  `Heading` text NOT NULL,
  `Content` text NOT NULL,
  `Description` text NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`c_id`, `Image`, `Heading`, `Content`, `Description`, `Price`) VALUES
(1, 'invest101.png', 'invest101', 'The most concise course help to find the effective investment formula', 'Online course with the most condensed knowledge, helping new investors quickly a foundation system to start participating in the stock market quickly and find an effective investment formula.', 100),
(2, 'investor.png', 'Investor', 'Investor Course - Search for Stocks to increase x2, x3 from 2 to 3 years.', 'Analyze the business models of specific industries and analyze the competitive advantages of businesses to come up with a method to find companies that can grow in the long run.', 200),
(3, 'protrade20.png', 'protrade20', 'Protrade 20 Course -  Find stock2 up 20-30% in 6-8 weeks', 'Use technical analysis to find stocks that can thrive in a short time.', 150);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `forum`
--

CREATE TABLE `forum` (
  `f_id` int(11) NOT NULL,
  `f_Image` mediumtext NOT NULL,
  `f_Heading` text NOT NULL,
  `f_Content` text NOT NULL,
  `f_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `forum`
--

INSERT INTO `forum` (`f_id`, `f_Image`, `f_Heading`, `f_Content`, `f_Time`) VALUES
(2, 'forum1.jpg', 'The biggest mistake when investing in stocks', 'Emotional trading is the biggest mistake when investing in securities leading to investment failures and losses.	', '2023-09-14 05:22:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member_course`
--

CREATE TABLE `member_course` (
  `m_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `member_course`
--

INSERT INTO `member_course` (`m_id`, `c_id`, `id`) VALUES
(1, 2, 2),
(2, 1, 2),
(3, 3, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `support`
--

CREATE TABLE `support` (
  `s_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Service` mediumtext NOT NULL,
  `Message` text NOT NULL,
  `Note` varchar(1000) NOT NULL,
  `StaffName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `support`
--

INSERT INTO `support` (`s_id`, `id`, `Service`, `Message`, `Note`, `StaffName`) VALUES
(1, 2, 'Online Services', 'Do u have something else?', 'Customers visited', 'staff');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Chỉ mục cho bảng `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`f_id`);

--
-- Chỉ mục cho bảng `member_course`
--
ALTER TABLE `member_course`
  ADD PRIMARY KEY (`m_id`);

--
-- Chỉ mục cho bảng `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `forum`
--
ALTER TABLE `forum`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `member_course`
--
ALTER TABLE `member_course`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `support`
--
ALTER TABLE `support`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
