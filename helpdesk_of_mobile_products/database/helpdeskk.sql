-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 03:14 PM
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

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(1, '1', '1', '1', '1', '2021-04-07 07:24:51'),
(2, 'w', 'w', 'w', 'w', '2021-04-07 07:34:32'),
(3, 'q', 'q', 'q', 'q', '2021-04-07 07:36:14'),
(4, 'q', 'q', 'q', 'q', '2021-04-07 07:37:08'),
(5, 'q', 'q', 'q', 'qfdfd', '2021-04-07 07:37:14'),
(6, '1', '1', '09555899891', '1', '2021-04-07 04:17:08'),
(7, '12', '1', '1', '1', '2021-04-07 04:18:26'),
(8, '1', '1', '09810929386', '1', '2021-04-07 04:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
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
(85, 10, 'DOT GREEN SHIRT WITH GREEN COLOUR', 700, 500, 10, '39420363_5g.jpeg,72136073_4g.jpeg,58290478_3g.jpeg,37129445_2g.jpeg,73816234_1g.jpeg', 'DFDSF FDF DFD DF', 'FDFDSFDFDSFDS DF DFDF DF DFD', 'dfdf fdf fd df f dfdsfdf', 'ffdfdrerewfdsfdsd', 'fdfdsfdrerwr', 1),
(86, 10, 'Shirt Printed', 1000, 700, 20, '81011149_b.jpeg,53428118_4chap.jpeg,45745690_3chap.jpeg,39619162_2cha.jpeg,17938811_a.jpeg', 'fdfdfd dfdf dfdfdf fdftrtrttr uy iuytfdfi', '0ujroi', 'uirjeoiruo', 'iriifieeiwre reirencre ere', 'ieureioo', 1),
(87, 10, 'Dark Line Shirt', 800, 600, 10, '33082341_6printed.jpeg,25915577_5printed.jpeg,48180207_4printed.jpeg,91978489_3printed.jpeg,21337615_2printed.jpeg,70707826_1printed.jpeg', 'ureioeu reorieuriwe re iUWIEUIR RIEJR OIwu', 'jreiFIERUEROER RIER EIJ', 'fjierue ie er eirjewiro ererewjriew rrnnfdkferuew fnfi1', 'reiwrueworeu eor er frjfnfneirj ew', 'jueriwejrehrjfnf ej ewri rio', 1),
(88, 10, 'Plain Green Shirt', 1200, 1000, 15, '40351524_6simgre.jpeg,86696616_5sigree.jpeg,40390360_5simplgr.jpeg,41671698_2simplegreen.jpeg,43911608_1sigreen.jpeg', 'sdffd djf dkjf dj', 'jfdjkf', 'efjdfj', 'iefjdrj efi', 'jefjd fi', 1),
(89, 10, 'Shirt with Red and Black', 500, 450, 10, '50456584_6redlin.jpeg,71448821_5redlin.jpeg,70259492_4redlin.jpeg,41758298_3redlin.jpeg,76462997_2rdl.jpeg,16650643_1redlin.jpeg', 'dfd short Description', 'fkjd ei deresidjf f dkfdfowrueoru', 'reoruewrkej roi', 'ejroker eirjer eirjerjoekrjefkodjfdfjdkj', 'ifjerkoehrjklnfdgfjdkkghn', 1),
(90, 10, 'Shirt with black and white', 1300, 1000, 5, '96865383_fd.jpeg,80214201_linb.jpeg,44734333_3bl.jpeg,29443462_blacklin.jpeg,22731202_2blalin.jpeg,54891393_1blackline.jpeg', 'dfdfdsfd', 'df', 'dsfdfd', 'dsfdsfdfdsf', 'fdf', 1),
(91, 10, 'Plain Shirt with pink colour', 1200, 1000, 20, '18860162_df.jpeg,18872975_pi.jpeg,55853815_fdfplin.jpeg,75688107_2plin.jpeg,74927762_plin2.jpeg,53774048_pi1.jpeg', 'dfkdjrie reor eweiroer', 'ireore rer ierue oriweuror', 'rier ueri erjefdfmoi', 'rrejfdfiroe rruerieo', 'u rier ejefkdfdj ewiorje', 1),
(92, 0, '', 0, 0, 0, 'IMG_20200127_151648.jpg', '', '', '', '', '', 0),
(93, 13, 'Sport Tracer', 1500, 1250, 10, '28536078_s1t.jpeg,46294149_s2t.jpeg,54123228_s3t.jpeg', 'fdfdfdf dffdf', 'fdfdfd df dfd fdf df', 'fdfdf df dfdfdrewioureiurj', 'ioif f fdfoidfpdif', 'dfoidoipfdiopf', 1),
(94, 13, 'Tracer shoe', 1650, 800, 10, '25163155_s1tt.jpeg,89337798_s2tt.jpeg,35686991_s3tt.jpeg,15213794_s5tt.jpeg', 'fdfdf`', 'iiudif dfjd fdfu', 'u dfiudiofudfidufdouf fiudpfoidpf', 'idopifd fid fidofp idfopd ifdi', 'ifodifdifdofdif do dfido', 1),
(95, 13, 'Campus sport', 1450, 1130, 10, '36903922_s1c.jpeg,18905901_s2c.jpeg,62565457_s4c.jpeg,99429788_s5c.jpeg', 'fdf', 'jhdjfdjj', 'jjkdsfjdfjk', 'jdkjfdjfkui', 'jfdkjkd', 1),
(96, 13, 'Blue Campus', 1950, 1650, 5, '34359349_s1cc.jpeg,65427380_s2cc.jpeg,55328906_s3cc.jpeg,57163733_s4cc.jpeg,67818442_s5cc.jpeg', 'jfuirue fjdf iufifo', 'fdiufd ufiure rioeuer fds fdfjk', 'iufdiuer erui eruier fjdj', 'uifdufrje reui fjdfujo', 'ufdifr ueruei u f', 1),
(97, 13, 'Red chief', 2950, 2250, 5, '61700773_s1r.jpeg,99853402_s3r.jpeg,18738970_s4r.jpeg,57576298_s5r.jpeg,88703358_s6r.jpeg', 'dfdjfkjfdkjf', 'jdufj', 'fjdfur', 'fdurj', 'fidfurjeirdfj dfu i', 1),
(98, 13, 'Nike sports', 2550, 2150, 5, '81190004_s1n.jpeg,36437232_s2n.jpeg,97690586_s3n.jpeg,93438119_s4n.jpeg,70114034_s5n.jpeg', 'fdf', 'fdfd', 'fdrer', 'i', 'fd', 1),
(99, 13, 'Red chieff', 2650, 1950, 5, '92149022_s3rf.jpeg,30907045_s5rf.jpeg', 'dffd', 'iuiui', 'iuiu', 'iu', 'iuI', 1),
(100, 13, 'Shoes', 3250, 2650, 5, '97029530_s1nn.jpeg,57435080_s2nb.jpeg,89665811_s3nb.jpeg,85384545_s4nb.jpeg,92564026_s6nb.jpeg', 'fdfdffjuiuiuqiu', 'u', 'iuiuuiu', 'ui', 'u', 1),
(101, 13, 'sparx', 1350, 950, 5, '63370580_s1sss.jpeg,64754243_s2sss.jpeg', 'fdfd', 'fdfr', 'fd', 'fd', 'fd', 1),
(102, 13, 'White Sparx', 1250, 1200, 5, '38843841_s1s.jpeg,50068528_s2s.jpeg,11525091_s3s.jpeg,67602526_s4s.jpeg,67153215_s5s.jpeg', 'fd', 'fdfd', 'fdf', 'fdf', 'fdf', 1),
(103, 13, 'Campus Shoe', 1560, 1200, 5, '24477472_s1ss.jpeg,86473136_s2ss.jpeg,13617433_s3ss.jpeg,54300360_s4ss.jpeg,18444241_s5ss.jpeg,14371714_s6ss.jpeg', 'fdf', 'dfoioi', 'poifdjp', 'iodforipo', 'ipri', 1),
(104, 12, 'Slim Fit Men Grey Cotton Lycra Blend Trousers', 1450, 950, 5, '62129779_s2.jpeg,21344715_s3.jpeg,61271504_s5.jpeg,46443658_s7.jpeg,99558521_s8.jpeg', 'fdfdfdfioi o', 'ioi', 'gfgfg', 'iooi', 'io', 1),
(105, 12, 'Regular Fit Men Cotton Blend Cream Cotton Blend Trousers', 550, 450, 5, '35205369_s.jpeg,14663750_s1.jpeg,44719940_s4.jpeg,56558032_s5.jpeg', 'fdf', 'fdf', 'fd', 'fdf', 'fd', 1),
(106, 12, 'Regular Fit Men Blue Cotton Blend Trousers', 650, 500, 5, '56093775_s.jpeg,44302447_s2.jpeg,86618045_s3.jpeg,89934856_s5.jpeg', 'dfdf', 'dffd', 'fd', 'fd', 'fd', 1),
(107, 12, 'Slim Men Dark Blue Jeans', 599, 499, 5, '46224494_a.jpeg,36321587_a1.jpeg,35865890_s2.jpeg,30380610_s5.jpeg,13498084_s7.jpeg', 'fdf', 'j', '', 'jkkj', '', 1),
(108, 11, 'Color Block Men Round Neck White, Black, Yellow T-Shirt', 350, 229, 5, '93365493_t.jpeg,86077650_t1.jpeg,27667381_t3.jpeg,41286883_t5.jpeg,61577613_t6.jpeg', 'fdff', 'kjkj', 'j', 'jkjk', 'jk', 1),
(109, 11, 'Color Block Men Round Neck Black T-Shirt', 550, 459, 10, '40444508_tr.jpeg,83775972_tw.jpeg,76285514_ty.jpeg', 'fd', 'fdf', 'jfj', 'ijf', 'df', 1),
(110, 11, 'Solid Men Round Neck Blue T-Shirt', 450, 350, 10, '15135354_ee.jpeg,85694913_eee.jpeg,57298983_t.jpeg,43809721_te.jpeg,39668658_tee.jpeg', 'ddfd', 'kfl;kdlk', 'lkfdfl', 'klfldkl', 'kf', 1),
(111, 11, 'Solid Men Mandarin Collar Blue T-Shirt', 500, 250, 10, '35835626_rere.jpeg,53009254_teeee.jpeg,21161733_trr.jpeg', 'fdffjkuiu', 'ijdijfiqjijsij', 'Solid Men Mandarin Collar Blue T-Shirt', 'kfSolid Men Mandarin Collar Blue T-Shirt', 'Solid Men Mandarin Collar Blue T-Shirt', 1),
(112, 11, 'Striped Men Polo Neck Dark Blue, Light Green, White T-Shirt', 450, 250, 10, '48266590_ewrerww.jpeg,94681490_tttttt.jpeg', 'fdf', 'Striped Men Polo Neck Dark Blue, Light Green, White T-Shirt', 'Striped Men Polo Neck Dark Blue, Light Green, White T-Shirt', 'dfdStriped Men Polo Neck Dark Blue, Light Green, White T-Shirt', 'Striped Men Polo Neck Dark Blue, Light Green, White T-Shirt', 1),
(113, 11, 'Color Block Men Polo Neck Multicolor T-Shirt', 500, 459, 10, '86449210_eee.jpeg,44164233_fdfd.jpeg,61515599_ffd.jpeg,26852593_sdf.jpeg,55738900_tt.jpeg', 'fdf', 'dff', 'fdfd', 'fdf', 'fdf', 1);

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
(50, 'Kamal Gupta', 'user', 'user', '9555899891', '', '2021-03-12 05:24:27', 0),
(51, 'Deepak', 'Deepak@123', 'deepak@123', '7906397670', '', '2021-03-16 12:30:34', 0);

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
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
