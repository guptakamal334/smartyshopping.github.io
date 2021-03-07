-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2021 at 10:22 AM
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
(84, 10, 'SHIRT WITH SKY BLUE', 500, 400, 10, '98304222_5.jpeg,93902575_4.jpeg,29537904_3.jpeg,49086179_2.jpeg,98838551_1.jpeg', 'Good Shirt', 'Description dfdkrrui reiroewowe', 'Meta Title', 'Meta Description', 'Meta Keyword', 1),
(85, 11, 'DOT GREEN SHIRT WITH GREEN COLOUR', 700, 500, 10, '39420363_5g.jpeg,72136073_4g.jpeg,58290478_3g.jpeg,37129445_2g.jpeg,73816234_1g.jpeg', 'DFDSF FDF DFD DF', 'FDFDSFDFDSFDS DF DFDF DF DFD', 'dfdf fdf fd df f dfdsfdf', 'ffdfdrerewfdsfdsd', 'fdfdsfdrerwr', 1),
(86, 10, 'Shirt Printed', 1000, 700, 20, '81011149_b.jpeg,53428118_4chap.jpeg,45745690_3chap.jpeg,39619162_2cha.jpeg,17938811_a.jpeg', 'fdfdfd dfdf dfdfdf fdftrtrttr uy iuytfdfi', '0ujroi', 'uirjeoiruo', 'iriifieeiwre reirencre ere', 'ieureioo', 1),
(87, 10, 'Dark Line Shirt', 800, 600, 10, '33082341_6printed.jpeg,25915577_5printed.jpeg,48180207_4printed.jpeg,91978489_3printed.jpeg,21337615_2printed.jpeg,70707826_1printed.jpeg', 'ureioeu reorieuriwe re iUWIEUIR RIEJR OIwu', 'jreiFIERUEROER RIER EIJ', 'fjierue ie er eirjewiro ererewjriew rrnnfdkferuew fnfi1', 'reiwrueworeu eor er frjfnfneirj ew', 'jueriwejrehrjfnf ej ewri rio', 1),
(88, 10, 'Plain Green Shirt', 1200, 1000, 15, '40351524_6simgre.jpeg,86696616_5sigree.jpeg,40390360_5simplgr.jpeg,41671698_2simplegreen.jpeg,43911608_1sigreen.jpeg', 'sdffd djf dkjf dj', 'jfdjkf', 'efjdfj', 'iefjdrj efi', 'jefjd fi', 1),
(89, 10, 'Shirt with Red and Black', 500, 450, 10, '50456584_6redlin.jpeg,71448821_5redlin.jpeg,70259492_4redlin.jpeg,41758298_3redlin.jpeg,76462997_2rdl.jpeg,16650643_1redlin.jpeg', 'dfd short Description', 'fkjd ei deresidjf f dkfdfowrueoru', 'reoruewrkej roi', 'ejroker eirjer eirjerjoekrjefkodjfdfjdkj', 'ifjerkoehrjklnfdgfjdkkghn', 1),
(90, 10, 'Shirt with black and white', 1300, 1000, 5, '96865383_fd.jpeg,80214201_linb.jpeg,44734333_3bl.jpeg,29443462_blacklin.jpeg,22731202_2blalin.jpeg,54891393_1blackline.jpeg', 'dfdfdsfd', 'df', 'dsfdfd', 'dsfdsfdfdsf', 'fdf', 1),
(91, 10, 'Plain Shirt with pink colour', 1200, 1000, 20, '18860162_df.jpeg,18872975_pi.jpeg,55853815_fdfplin.jpeg,75688107_2plin.jpeg,74927762_plin2.jpeg,53774048_pi1.jpeg', 'dfkdjrie reor eweiroer', 'ireore rer ierue oriweuror', 'rier ueri erjefdfmoi', 'rrejfdfiroe rruerieo', 'u rier ejefkdfdj ewiorje', 1);

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
(2, 'deepak gupta', 'df', 'deepakguptag222@gmail.com', '09560944343', 'kh 131 budh vihar behrampur ghaziabad, ghaziabad', '0000-00-00 00:00:00', 1),
(5, 'kamal', '', 'gupta@gmail.com', '+9198586', 'deli', '0000-00-00 00:00:00', 0),
(7, 'treeer', '', 're@gmail.comm', '9837560943', 'delhi', '2021-01-20 06:10:10', 0),
(8, 'Manoj', '', 'manoj@123', '986', '954', '2021-01-20 06:38:03', 1),
(9, 'Bilal', '', 'bilal@gmail.com', '8989890909', 'HN 23 Blaock-A, Badarpur New Delhi (Delhi)', '2021-01-22 01:34:46', 1),
(10, 'kamal', '123', 'guptakamal334@gmail.com', '9555899891', '', '2021-02-01 07:39:12', 0),
(11, 'kamal', '123', 'guptakamal34@gmail.com', '9555899891', '', '2021-02-01 07:39:33', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
