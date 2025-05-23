-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2025 at 02:10 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mangement_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `Category_No` int NOT NULL AUTO_INCREMENT,
  `CatName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Category_No`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_No`, `CatName`) VALUES
(1, 'Soup'),
(2, 'Drink'),
(3, 'Pizza'),
(4, 'Burger');

-- --------------------------------------------------------

--
-- Table structure for table `customer_register`
--

DROP TABLE IF EXISTS `customer_register`;
CREATE TABLE IF NOT EXISTS `customer_register` (
  `csr_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `csr_name` varchar(30) NOT NULL,
  `csr_gmail` varchar(50) NOT NULL,
  `csr_phone` int NOT NULL,
  `csr_password` varchar(100) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`csr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_register`
--

INSERT INTO `customer_register` (`csr_id`, `csr_name`, `csr_gmail`, `csr_phone`, `csr_password`, `register_date`) VALUES
(1, '[value-2]', '[value-3]', 0, '[value-5]', '2025-04-29 09:26:03'),
(2, 'NamYan', 'namyan@gmail.com', 964563693, '123', '2025-04-29 09:26:03'),
(3, 'NamYan', 'namyan@gmail.com', 964563693, '123', '2025-04-29 09:26:03'),
(4, 'NamYou', 'namyou@22gmail.com', 93943, '123', '2025-04-29 09:26:03'),
(5, 'Nam Yan', 'nam_you@pp.bbu.edu.kh', 964563693, '123', '2025-04-29 10:40:12'),
(6, 'Nam Yan', 'nam_you@pp.bbu.edu.kh', 964563693, '123', '2025-04-29 10:40:23'),
(7, 'Nam Yan', 'nam_you@pp.bbu.edu.kh', 964563693, '123', '2025-04-30 14:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `Emp_ID` int NOT NULL AUTO_INCREMENT,
  `Emp_Role` varchar(100) DEFAULT NULL,
  `Emp_gmail` varchar(100) DEFAULT NULL,
  `Emp_password` varchar(100) DEFAULT NULL,
  `emp_firstname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `emp_lastname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `emp_image` text,
  PRIMARY KEY (`Emp_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_ID`, `Emp_Role`, `Emp_gmail`, `Emp_password`, `emp_firstname`, `emp_lastname`, `emp_image`) VALUES
(8, 'HRM', 'SovannoeutSreyneat11@gmail.com', '123456789', 'Sreyneat', 'Sovannoeut', '682d358459d2c.jpg'),
(2, 'Admin', 'namyou854@gmail.com', '123', 'Nam', 'You', '681482d4d85e1.jpg'),
(3, 'Admin', 'SovannoeutSreyneat11@gmail.com', '123', 'Sreyneat', 'Sovannoeut ', '681719e4e4de6.jpg'),
(4, 'Admin', 'PhenVesna002@gmail.com', '123', 'Phen', 'Vesna', '681719d9e6165.jpg'),
(5, 'Admin', 'khevkhem777@gmail.com', '123', 'Khev', 'Khem', '681716870f696.jpg'),
(6, 'HRM', 'ChamroeunPrakot11@gmail.com', '123', 'Chamroeun', 'Prakot', '682ca6e5348c7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `gmail` varchar(50) NOT NULL,
  `phone` int NOT NULL,
  `address` text NOT NULL,
  `qty_oder` int NOT NULL,
  `price` float NOT NULL,
  `total` double NOT NULL,
  `order_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `gmail`, `phone`, `address`, `qty_oder`, `price`, `total`, `order_data`, `name`) VALUES
(1, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 3, 30000, 30000, '2025-04-29 05:51:59', 'សម្លប្រហើរ'),
(2, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 7, 5000, 35000, '2025-04-29 05:57:42', 'ប្រហិតក្រឡុក'),
(3, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 7, 5000, 35000, '2025-04-29 05:57:54', 'ប្រហិតក្រឡុក'),
(4, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 7, 5000, 35000, '2025-04-29 05:58:12', 'ប្រហិតក្រឡុក'),
(5, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 7, 5000, 35000, '2025-04-29 05:58:15', 'ប្រហិតក្រឡុក'),
(6, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 7, 5000, 35000, '2025-04-29 05:58:39', 'ប្រហិតក្រឡុក'),
(7, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 2, 5000, 10000, '2025-04-29 05:58:50', 'ប្រហិតក្រឡុក'),
(8, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 3, 5000, 15000, '2025-04-29 06:01:55', 'ប្រហិតក្រឡុក'),
(9, 'namyou854@gmail.com', 964563693, 'rwsrrrtr', 1, 10000, 10000, '2025-04-29 09:35:25', 'សម្លប្រហើរ'),
(10, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 3, 5000, 15000, '2025-04-30 14:53:59', 'ប្រហិតក្រឡុក'),
(11, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 7, 5000, 35000, '2025-04-30 15:02:09', 'ប្រហិតក្រឡុក'),
(12, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 6, 10000, 60000, '2025-04-30 15:27:27', 'ឆាសាច់គោ'),
(13, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 9, 10000, 90000, '2025-04-30 23:53:48', 'Coffee'),
(14, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 5, 10000, 50000, '2025-04-30 23:54:21', 'ឆាសាច់គោ'),
(15, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 4, 3000, 12000, '2025-04-30 23:54:45', 'សាំងវិច'),
(16, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 1, 10000, 10000, '2025-05-06 07:05:15', 'ស៊ុបប្រហិត'),
(17, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 3, 30000, 45000, '2025-05-19 16:34:05', 'SEAFOOD'),
(18, 'namyou854@gmail.com', 964563693, 'PP Sensok St1982', 4, 555, 10955, '2025-05-20 15:50:05', 'ddasfada');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` text NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_image`, `category`) VALUES
(4, 'Pizza', 50000, '682ca5d8de591.jpg', 'Food'),
(5, 'Pizza', 40000, '682ca5bbd54cb.jpg', 'Food'),
(8, 'Pizza', 50000, '682ca5fe7ce31.jpg', 'Food'),
(6, 'Pizza', 20000, '682ca59a51e33.jpg', 'Food'),
(7, 'Pizza', 30000, '682ca52123267.jpg', 'Food'),
(9, 'ស៊ុបឆ្អឹងគោ', 20000, '682ca78d0572d.jpg', 'Soup'),
(10, 'Steak Beaf', 10000, '682cace275bab.jpg', 'Steak'),
(11, 'coffee ice Latte', 5000, '682cae981b1f9.jpg', 'Drinks'),
(12, 'ទឹកផ្លែប៉ោម', 5000, '682caebf2ca87.jpg', 'Drinks'),
(13, 'ទឹកក្រូចឆ្មា', 5000, '682caedf0e885.jpg', 'Drinks'),
(14, 'ទឹកក្រូចឆ្មាស្រស់', 5000, '682caf208ba36.jpg', 'Drinks'),
(15, 'Roast pork', 10000, '682caf7bf09f6.jpg', 'Food'),
(16, 'Steak Chicken', 1000, '682cafaab2195.jpg', 'Steak'),
(17, 'Shushi', 2000, '682cafe3e4650.jpg', 'Shushi'),
(18, 'Shushi', 15000, '682caffa66dc8.jpg', 'Shushi'),
(19, 'Health Food', 7000, '682cb041ea0df.jpg', 'Drinks'),
(20, 'ចៀនជួន', 20000, '682cb0f1a188e.jpg', 'Khmer Food'),
(21, 'Shushi', 5000, '682d355d4922b.jpg', 'Shushi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
