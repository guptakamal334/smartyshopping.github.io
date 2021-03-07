-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 03:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartyshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin', 'admin', 'Kamal Gupta');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(2, 'Cat4', 0),
(3, 'Cat1', 1),
(5, 'Cat6', 1),
(7, 'Cat9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(1, 'Vishal', 'vishal@gmail.com', '1234567890', 'Test Query', '2020-01-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(1, 5, '1', 2, 3, 4, '49428269_WhatsApp Image 2021-01-18 at 7.45.26 PM.jpeg', '5', '6', '7', '', '9', 1),
(4, 5, 'test', 100, 99, 12, '727864583_2018_4image_15_14_018245767336-ll.jpg', 'test', 'test', 'test', 'test', 'test', 1),
(5, 7, 'test33', 100, 98, 8, '708794487_64-1.jpg', 'test', 'test', 'test', '', 'test', 1),
(6, 5, 'dd', 4, 4, 4, '69323468_', 's', 's', 's', 's', 's', 1),
(7, 5, 'ee', 4, 4, 4, '40439570_', 's', 's', 's', 's', 's', 1),
(8, 5, 'ff', 4, 4, 4, '50304539_', 's', 's', 's', 's', 's', 1),
(9, 3, 'pp', 1, 2, 3, 'path.jp', 'e', 'ee', '33', '22', '22', 0),
(10, 3, 'qqqqqqq', 1, 1, 1, '2854438_002.jpg', '1', '1', '1', '11', '1', 1),
(11, 5, 'eerer', 3, 6, 6, '2049818_001.jpg', '66', '6', '66', '6', '67', 1),
(12, 2, 'ttt', 2, 2, 2, '4218565_001.jpg', '2', '2', '2', '22', '2', 1),
(13, 2, 'w', 1, 1, 1, '95855395_WhatsApp Image 2021-01-18 at 6.52.34 PM (1).jpeg', '2', '2', '2', '2', '2', 1),
(14, 3, '23', 2, 22, 2, '52608121_WhatsApp Image 2021-01-18 at 7.45.27 PM (1).jpeg', '22', '2', '2', '2', '2', 1),
(15, 2, 'f', 22, 22, 2, '52677376_26.jpg', 'qq', 'q', 'q', 'q', 'q', 1),
(16, 9, 'sdsdsdsdsdsdsdsds sd sd sds dsd s', 2, 22, 2, '63109863_IMG_20200220_174336.jpg', 'w', 'ww', 'w', 'w', 'w', 0),
(17, 0, 'ww', 2, 2, 2, '3224990_001.jpg', '22', '2', '2', '22', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `address`, `added_on`, `status`) VALUES
(1, 'Vishal Gupta', '', 'vishal@gmail.com', '9837560918', 'Sec-62 Noida Gautam Buddha Nagar (UP)', '2020-01-14 00:00:00', 1),
(2, 'deepak gupta', 'df', 'deepakguptag222@gmail.com', '09560949582', 'kh 131 budh vihar behrampur ghaziabad, ghaziabad', '0000-00-00 00:00:00', 1),
(5, 'kamal', '', 'gupta@gmail.com', '+9198586', 'deli', '0000-00-00 00:00:00', 1),
(7, 'Ilma', '', 'ilma@gmail.comm', '9837560918', 'delhi', '2021-01-20 06:10:10', 1),
(8, 'Manoj', '', 'manoj@123', '986', '954', '2021-01-20 06:38:03', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
