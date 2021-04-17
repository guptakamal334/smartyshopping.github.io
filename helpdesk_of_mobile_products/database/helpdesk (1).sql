-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 04:09 PM
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
-- Database: `helpdesk`
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

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `title`, `first_name`, `last_name`, `phone_number`, `street`, `city`, `state`, `pincode`) VALUES
(1, 'Mr.', 'Pawan', 'Mahashwari', '9890909090', 'HN 10, Gali no-5', 'Ramur', 'UP', 244901),
(2, 'Mr.', 'Deepak', 'Gupta', '9090232112', 'Gali No 5 Sangam Vih', 'South Delhi', 'Delhi', 110090),
(3, 'Mrs.', 'Mamta', 'devi', '8989782112', 'HN 105, Gali No-1, B', 'Badarpur Border', 'Delhi', 110067),
(4, 'Mr.', 'Sonu', 'Rana', '8890123223', 'HN-102, Gali No 9', 'Mohan State', 'Delhi', 110090),
(5, 'Mr.', 'Virendra', 'Yadav', '8900009090', 'Gali No. 10', 'Sarita Vihar', 'Delhi', 110090),
(6, 'Mr.', 'Risab', 'Thakur', '8976454334', 'Block-A, Maharani Bhag', 'East Delhi', 'Delhi', 110012),
(7, 'Mr.', 'Roni', 'Tiwari', '7878323232', 'HN.10,Gali No-5, Noida', 'Gautam Buddha Nagar', 'Uttar pradesh', 201301),
(8, 'Mrs.', 'Ilma', 'Farooqui', '8900001212', 'HN101, First Floor, Okhla', 'East Delhi', ' Delhi', 110076),
(9, 'Mr. ', 'Kamal', 'Gupta', '95555899890', 'HN. 20, Noida Sec-62', 'Greater Noida', 'Uttar pradesh', 201301),
(10, 'Mr.', 'Rajesh', 'Kumar', '8989890909', 'HN 10, Gali no-5 , Raj Nagar ', 'Ghazibad', 'Uttar Pradesh', 201009),
(11, 'Mr.', 'Suraj ', 'Kumar', '98898989898', 'Gali No. 14', 'Noida', 'UP', 201011);

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `problem_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `alt_number` varchar(20) NOT NULL,
  `problem_title_id` int(11) NOT NULL,
  `problem_category_id` int(11) NOT NULL,
  `problem_description` varchar(200) NOT NULL,
  `problem_status_id` int(11) NOT NULL,
  `curr_time` datetime NOT NULL,
  `deliver` tinyint(4) NOT NULL,
  `delivery_date` datetime NOT NULL,
  `request_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`problem_id`, `product_id`, `alt_number`, `problem_title_id`, `problem_category_id`, `problem_description`, `problem_status_id`, `curr_time`, `deliver`, `delivery_date`, `request_no`) VALUES
(16, 11, '9837858545', 2, 10, 'mic is not working properly.', 2, '2021-04-17 18:10:55', 0, '0000-00-00 00:00:00', 'REQ38642'),
(17, 8, '8556569689', 2, 8, 'Mobile display touch is not working properly', 1, '2021-04-17 18:13:06', 0, '0000-00-00 00:00:00', 'REQ21439'),
(18, 5, '8574521241', 2, 13, 'Mobile Camera Flash light is not working in click picture time . but flash light still working on as a role of tourch.', 3, '2021-04-17 18:19:48', 1, '2021-04-17 18:42:24', 'REQ11440'),
(19, 7, '8545251325', 1, 17, 'Software update', 1, '2021-04-17 18:20:41', 0, '0000-00-00 00:00:00', 'REQ70422'),
(20, 3, '8541212415', 2, 13, 'Mobile Camera Flash light is not working in click picture time . but flash light still working on as a role of tourch.', 2, '2021-04-17 19:19:45', 0, '0000-00-00 00:00:00', 'REQ14446');

-- --------------------------------------------------------

--
-- Table structure for table `problem_category`
--

CREATE TABLE `problem_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL,
  `pro_title_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problem_category`
--

INSERT INTO `problem_category` (`id`, `cat_name`, `pro_title_id`) VALUES
(6, 'Power Off Button', 2),
(7, 'Volume Button', 2),
(8, 'Display', 2),
(9, 'Jack', 2),
(10, 'Mic', 2),
(11, 'Sim Connect', 2),
(12, 'SD Card Connect', 2),
(13, 'Camera', 2),
(14, 'Flash Light', 2),
(15, 'Earphone Jack', 2),
(16, 'Other', 2),
(17, 'Software Update', 1),
(18, 'Apps not working', 1),
(19, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `problem_status`
--

CREATE TABLE `problem_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problem_status`
--

INSERT INTO `problem_status` (`id`, `status_name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Success'),
(4, 'incomplete');

-- --------------------------------------------------------

--
-- Table structure for table `problem_title`
--

CREATE TABLE `problem_title` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problem_title`
--

INSERT INTO `problem_title` (`id`, `name`) VALUES
(1, 'Software'),
(2, 'Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `imei_no` varchar(20) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `model_no` int(10) NOT NULL,
  `date_of_purchase` date NOT NULL,
  `expire_date` date NOT NULL,
  `status_of_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `customer_id`, `imei_no`, `product_name`, `model_no`, `date_of_purchase`, `expire_date`, `status_of_product`) VALUES
(1, 1, '119890986545312', 'VIVO V9', 1880, '2020-12-01', '2021-12-16', 0),
(2, 11, '119890986545324', 'Vivo-VX', 9090, '2020-06-01', '2021-06-01', 0),
(3, 10, '119890986545324', 'Vivo V5', 4432, '2020-08-05', '2021-08-05', 0),
(4, 2, '119890986577654', 'Vivo 11Pro', 8989, '2020-02-03', '2021-02-03', 0),
(5, 3, '119890986545390', 'Vivo V11', 2309, '2020-11-30', '2021-11-30', 0),
(6, 4, '119890986545321', 'Vivo 79', 5451, '2020-10-01', '2021-10-01', 0),
(7, 5, '119890986587897', 'Vivo 17', 7877, '2021-01-01', '2022-01-01', 0),
(8, 9, '119890986545333', 'Vivo 11R', 8398, '2020-11-04', '2021-11-04', 0),
(9, 8, '119890986545776', 'Vivo V5', 8922, '2020-11-30', '2021-11-30', 0),
(10, 6, '119890986544321', 'Vivo NEXA', 8780, '2020-12-09', '2021-12-09', 0),
(11, 7, '119890986545022', 'Vivo V1', 3321, '2020-08-05', '2021-08-05', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`problem_id`);

--
-- Indexes for table `problem_category`
--
ALTER TABLE `problem_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problem_status`
--
ALTER TABLE `problem_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problem_title`
--
ALTER TABLE `problem_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `problem`
--
ALTER TABLE `problem`
  MODIFY `problem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `problem_category`
--
ALTER TABLE `problem_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `problem_status`
--
ALTER TABLE `problem_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `problem_title`
--
ALTER TABLE `problem_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
