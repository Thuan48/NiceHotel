-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th8 06, 2023 lúc 05:03 AM
-- Phiên bản máy phục vụ: 10.10.2-MariaDB
-- Phiên bản PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hotel_management`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `password`, `role`) VALUES
(3, 'Nguyễn Thị', 'Hằng', 'nguyenhang@example.com', '0987654321', '456 Đường XYZ', '123', 0),
(4, 'Trần Văn', 'Tùng', 'tranvt@example.com', '0909090909', '789 Đường KLM', '123', 0),
(5, 'Lê Thị', 'Hương', 'lethi@example.com', '0123456789', '101 Đường QRS', '123', 0),
(6, 'Phạm Văn', 'Linh', 'phamvanlinh@example.com', '0777777777', '222 Đường DEF', '123', 0),
(7, 'Đinh Minh', 'Hiếu', 'dinhminhhieu@example.com', '0333333333', '333 Đường MNO', '123', 0),
(1, 'tran', 'thuan', 'admin123@gmail.com', NULL, NULL, '123', 1),
(2, 'nguyen', 'viet', 'user@gmail.com', '1', NULL, '123', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `feedback_text` text NOT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `customer_id` (`customer_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `customer_id`, `feedback_text`) VALUES
(1, 1, 'Dịch vụ tốt và phòng ốc thoải mái.'),
(2, 2, 'Nhân viên thân thiện và nhiệt tình.'),
(3, 3, 'Khách sạn đẹp, gần trung tâm thành phố.'),
(4, 4, 'Dịch vụ ăn uống ngon và đa dạng.'),
(5, 5, 'Ghế massage trong phòng rất tuyệt vời.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(50) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `reservation_ibfk_1` (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `customer_id`, `check_in_date`, `check_out_date`) VALUES
(1, '1', '2023-08-01', '2023-08-05'),
(2, '2', '2023-08-10', '2023-08-15'),
(3, '1', '2023-08-05', '2023-08-08'),
(4, '2', '2023-08-20', '2023-08-25'),
(5, '1', '2023-08-12', '2023-08-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reservation_details`
--

DROP TABLE IF EXISTS `reservation_details`;
CREATE TABLE IF NOT EXISTS `reservation_details` (
  `reservationdetail_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`reservationdetail_id`),
  KEY `reservation_details_ibfk_1` (`room_id`),
  KEY `reservation_details_ibfk_2` (`service_id`),
  KEY `reservation_details_ibfk_3` (`reservation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reservation_details`
--

INSERT INTO `reservation_details` (`reservationdetail_id`, `room_id`, `service_id`, `total_amount`, `reservation_id`) VALUES
(1, 1, 1, 1, 400),
(2, 2, 2, 2, 750),
(3, 1, 1, 3, 300),
(4, 2, 2, 1, 650),
(5, 1, 2, 2, 250);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` varchar(10) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `max_occupancy` int(11) NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `rate` float NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`room_id`),
  KEY `room_type_id` (`room_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_number`, `room_type_id`, `max_occupancy`, `is_available`, `rate`, `description`) VALUES
(4, '104', 2, 3, 1, 200, 'good'),
(5, '201', 3, 4, 1, 280, 'good'),
(6, '202', 2, 3, 1, 240, 'good'),
(7, '203', 1, 2, 1, 180, 'good'),
(8, '302', 3, 4, 1, 300, 'good');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roomtypes`
--

DROP TABLE IF EXISTS `roomtypes`;
CREATE TABLE IF NOT EXISTS `roomtypes` (
  `room_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type_name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`room_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `description`, `price`) VALUES
(17, 'Dịch vụ phòng', 'Dọn phòng hàng ngày và thay đồ đạc.', '40.00'),
(16, 'Tour du lịch', 'Các chương trình tour du lịch tham quan thành phố.', '100.00'),
(15, 'Dịch vụ giặt là', 'Dịch vụ giặt là và là ủi quần áo.', '15.00'),
(14, 'Dịch vụ buffet sáng', 'Bữa sáng đa dạng với nhiều món ngon.', '25.00'),
(13, 'Dịch vụ đưa đón sân bay', 'Dịch vụ đưa đón khách từ sân bay đến khách sạn.', '80.00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
