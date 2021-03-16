-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 09:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(10, 'SHIRT', 1),
(11, 'T-SHIRT', 1),
(12, 'PENT', 1),
(13, 'FOOTWEAR', 1);

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
(78, 'fdf', 'f', 'f', 'f', '2021-02-10 07:11:32'),
(79, 'fdf', 'f', 'f', 'f', '2021-02-10 07:12:25'),
(80, 'fdf', 'f', 'f', 'f', '2021-02-10 07:12:56'),
(81, 'fdf', 'f', 'f', 'f', '2021-02-10 07:13:18'),
(82, 'fdf', 'f', 'f', 'f', '2021-02-10 07:13:20'),
(83, 'fdf', 'f', 'f', 'f', '2021-02-10 07:13:22'),
(84, 'fdf', 'f', 'f', 'f', '2021-02-10 07:13:24'),
(85, 'fdf', 'fd', 'fd', 'fd', '2021-02-10 07:13:56'),
(86, 'fdf', 'fdf', 'fd', 'fdf', '2021-02-10 07:14:47'),
(87, 'fdf', 'fdf', 'fd', 'fdf', '2021-02-10 07:15:07'),
(88, 'fdf', 'fdf', 'fd', 'fdf', '2021-02-10 07:15:37'),
(89, 'fdf', 'fdf', 'fd', 'fdf', '2021-02-10 07:15:44'),
(90, 'fdf', 'fdf', 'fd', 'fdffdfd', '2021-02-10 07:15:47'),
(91, 'fdfdf', 'fdfd', 'dfdfd', 'fdfd', '2021-02-10 07:16:19'),
(92, 'fdfdf', 'fdfd', 'dfdfd', 'fdfd', '2021-02-10 07:16:20'),
(93, 'fdfdf', 'fdfd', 'dfdfd', 'fdfd', '2021-02-10 07:16:21'),
(94, 'fdfdf', 'fdfd', 'dfdfd', 'fdfd', '2021-02-10 07:16:21'),
(95, 'fdfdf', 'fdfd', 'dfdfd', 'fdfd', '2021-02-10 07:16:22'),
(96, 'fdfdf', 'fdfd', 'dfdfd', 'fdfd', '2021-02-10 07:16:22'),
(97, 'fdfdf', 'fdfd', 'dfdfd', 'fdfd', '2021-02-10 07:16:22'),
(98, 'fdfd', 'fdf', 'fd', 'fd', '2021-02-10 07:28:07'),
(99, 'fdfd', 'fdf', 'fd', 'fd', '2021-02-10 07:28:33'),
(100, 'fdfd', 'fdf', 'fd', 'fd', '2021-02-10 07:28:34'),
(101, 'fdfd', 'fdf', 'fdfdf', 'fd', '2021-02-10 07:28:39'),
(102, 'fdfd', 'fdf', 'fdfdf', 'fdf', '2021-02-10 07:28:45'),
(103, 'fdfd', 'fdf', 'fdfdf', 'fdf', '2021-02-10 07:28:47'),
(104, 'fd', 'fd', 'fd', 'dfd', '2021-02-10 07:29:52'),
(105, 'fd', 'fd', 'fd', 'dfd', '2021-02-10 07:29:53'),
(106, 'fd', 'fd', 'fd', 'dfd', '2021-02-10 07:30:17'),
(107, 'fdf', 'fd', 'fdf', 'fdfd', '2021-02-10 07:36:15'),
(108, 'fd', 'fd', 'fd', 'fd', '2021-02-10 07:46:36'),
(109, 'fd', 'fd', 'fdf', 'fd', '2021-02-10 08:25:02'),
(110, '1', '1', '1', '1', '2021-02-12 08:43:02'),
(111, 'fff', 'dd', 'f', 'dd', '2021-02-12 08:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(20) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `address`, `state`, `city`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `added_on`) VALUES
(3, 48, '110', 'Uttar pradesh', 'ghaziabad', 201009, 'COD', 2000, 'Success', 2, '2021-03-16 12:26:43'),
(4, 48, 'C311', 'Uttar pradesh', 'Noida', 201301, 'PayUmoney', 1600, 'pending', 0, '2021-03-16 12:29:27'),
(5, 50, 'A 515?A Sangam Vihar', 'Delhi', 'North Delhi', 110082, 'PayUmoney', 2500, 'pending', 0, '2021-03-16 12:36:32'),
(6, 50, '230 Akbarpur Behrampour', 'Uttar pradesh', 'Ghaziabad', 201009, 'COD', 3000, 'Success', 1, '2021-03-16 12:37:42'),
(7, 50, '111', '1', '1', 1, 'COD', 500, 'Success', 1, '2021-03-16 13:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(3, 3, 90, 1, 1000),
(4, 3, 91, 1, 1000),
(5, 4, 85, 1, 500),
(6, 4, 86, 1, 700),
(7, 4, 84, 1, 400),
(8, 5, 85, 1, 500),
(9, 5, 87, 1, 600),
(10, 5, 84, 1, 400),
(11, 5, 88, 1, 1000),
(12, 6, 90, 3, 3000),
(13, 7, 85, 1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `order_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `order_status`) VALUES
(1, 'pending'),
(2, 'Processing'),
(3, 'shipped'),
(4, 'canceled'),
(5, 'complete');

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
(84, 10, 'SHIRT WITH SKY BLUE Color', 500, 400, 10, '98304222_5.jpeg,93902575_4.jpeg,29537904_3.jpeg,49086179_2.jpeg,98838551_1.jpeg', 'Good Shirt', 'Description dfdkrrui reiroewowe', 'Meta Title', 'Meta Description', 'Meta Keyword', 1),
(85, 11, 'DOT GREEN SHIRT WITH GREEN COLOUR', 700, 500, 10, '39420363_5g.jpeg,72136073_4g.jpeg,58290478_3g.jpeg,37129445_2g.jpeg,73816234_1g.jpeg', 'DFDSF FDF DFD DF', 'FDFDSFDFDSFDS DF DFDF DF DFD', 'dfdf fdf fd df f dfdsfdf', 'ffdfdrerewfdsfdsd', 'fdfdsfdrerwr', 1),
(86, 10, 'Shirt Printed', 1000, 700, 20, '81011149_b.jpeg,53428118_4chap.jpeg,45745690_3chap.jpeg,39619162_2cha.jpeg,17938811_a.jpeg', 'fdfdfd dfdf dfdfdf fdftrtrttr uy iuytfdfi', '0ujroi', 'uirjeoiruo', 'iriifieeiwre reirencre ere', 'ieureioo', 1),
(87, 10, 'Dark Line Shirt', 800, 600, 10, '33082341_6printed.jpeg,25915577_5printed.jpeg,48180207_4printed.jpeg,91978489_3printed.jpeg,21337615_2printed.jpeg,70707826_1printed.jpeg', 'ureioeu reorieuriwe re iUWIEUIR RIEJR OIwu', 'jreiFIERUEROER RIER EIJ', 'fjierue ie er eirjewiro ererewjriew rrnnfdkferuew fnfi1', 'reiwrueworeu eor er frjfnfneirj ew', 'jueriwejrehrjfnf ej ewri rio', 1),
(88, 10, 'Plain Green Shirt', 1200, 1000, 15, '40351524_6simgre.jpeg,86696616_5sigree.jpeg,40390360_5simplgr.jpeg,41671698_2simplegreen.jpeg,43911608_1sigreen.jpeg', 'sdffd djf dkjf dj', 'jfdjkf', 'efjdfj', 'iefjdrj efi', 'jefjd fi', 1),
(89, 10, 'Shirt with Red and Black', 500, 450, 10, '50456584_6redlin.jpeg,71448821_5redlin.jpeg,70259492_4redlin.jpeg,41758298_3redlin.jpeg,76462997_2rdl.jpeg,16650643_1redlin.jpeg', 'dfd short Description', 'fkjd ei deresidjf f dkfdfowrueoru', 'reoruewrkej roi', 'ejroker eirjer eirjerjoekrjefkodjfdfjdkj', 'ifjerkoehrjklnfdgfjdkkghn', 1),
(90, 10, 'Shirt with black and white', 1300, 1000, 5, '96865383_fd.jpeg,80214201_linb.jpeg,44734333_3bl.jpeg,29443462_blacklin.jpeg,22731202_2blalin.jpeg,54891393_1blackline.jpeg', 'dfdfdsfd', 'df', 'dsfdfd', 'dsfdsfdfdsf', 'fdf', 1),
(91, 10, 'Plain Shirt with pink colour', 1200, 1000, 20, '18860162_df.jpeg,18872975_pi.jpeg,55853815_fdfplin.jpeg,75688107_2plin.jpeg,74927762_plin2.jpeg,53774048_pi1.jpeg', 'dfkdjrie reor eweiroer', 'ireore rer ierue oriweuror', 'rier ueri erjefdfmoi', 'rrejfdfiroe rruerieo', 'u rier ejefkdfdj ewiorje', 1),
(92, 0, '', 0, 0, 0, 'IMG_20200127_151648.jpg', '', '', '', '', '', 0);

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
(48, '1', '1', '1', '1', '', '2021-02-27 07:42:26', 0),
(50, 'Kamal Gupta', 'user', 'user', '9555899891', '', '2021-03-12 05:24:27', 0);

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
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
