-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 08:38 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(11) NOT NULL,
  `catname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`) VALUES
(2, 'European Food'),
(11, 'Dessert'),
(12, 'Asian Food');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `userid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `message` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`userid`, `username`, `email`, `feedback`, `message`) VALUES
(1, 'Aaaaaaaaaa', 'aungaung@gmail.com', 'Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Send'),
(3, 'Min Nyo', 'minnyo@gmail.com', 'such a great restaurant', 'Send'),
(4, 'nyi san shwe', 'nyisanshwe@gmail.com', 'ejfnewvndvn kv rgkj rkjgn rkv kv skv rj vkjv rk j', 'Send'),
(5, 'Aaaaaaaaaaaaa', 'bbb@gmail.com', 'AaaaaaAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaAa', 'Send'),
(6, 'qwerty', 'qwer@gmail.com', 'ccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', 'Send');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodid` int(11) NOT NULL,
  `foodname` varchar(30) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodid`, `foodname`, `categoryid`, `price`, `qty`, `photo`) VALUES
(1, 'Cassoulet', 2, 10, 60, 'cassoulet.jpg'),
(2, 'Beef', 2, 10, 40, 'beef.jpg'),
(3, 'Onion Soup', 2, 5, 30, 'onion.jpg'),
(4, 'Italian Pasta', 2, 10, 50, 'pasta.jpg'),
(5, 'Porchetta', 2, 12, 70, 'porchetta.jpg'),
(6, 'Bangers And Mash', 2, 8, 40, 'banger.jpg'),
(7, 'Roast', 2, 10, 50, 'roast.jpg'),
(8, 'Fresh Sea Food', 2, 15, 60, 'seafood.jpg'),
(9, 'Paella', 2, 9, 35, 'paella.jpg'),
(20, 'Kyay Oh', 12, 10, 100, 'Kyay Oh.jpg'),
(21, 'Tempura', 12, 5, 100, 'Tempura.jpg'),
(22, 'Curry Rice', 12, 15, 100, 'Curry Rice.jpg'),
(23, 'Ramen', 12, 7, 70, 'Ramen.jpg'),
(24, 'Ga Noung', 12, 8, 50, 'Ga nuong.jpg'),
(25, 'Pekin Duck', 12, 10, 50, 'Peking Roasted Duck.jpg'),
(26, 'Tom Yum Gong', 12, 5, 50, 'Tom Yum Goong.jpg'),
(27, 'Vegetable Rice', 12, 10, 80, 'Vegetable Fried Rice.jpg'),
(28, 'Chicken Masala', 12, 8, 70, 'Chicken Tikka Masala.jpg'),
(29, 'Cendol', 11, 5, 50, 'cendol1.jpg'),
(30, 'Egg Pudding', 11, 5, 45, 'Egg pudding.jpg'),
(31, 'Egg Tart', 11, 5, 50, 'Egg Tart.jpg'),
(32, 'Ice Cream', 11, 5, 50, 'Ice cream.jpg'),
(33, 'Japanese Cake', 2, 5, 50, 'Japanese Cheesecake.jpg'),
(34, 'Mochi', 11, 5, 50, 'Mochi.jpg'),
(35, 'Falooda', 11, 10, 100, 'falooda2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `foodid` varchar(255) NOT NULL,
  `foodqty` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `orderid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`foodid`, `foodqty`, `amount`, `orderid`) VALUES
('7', '3', '30', '1'),
('8', '2', '30', '1'),
('20', '4', '40', '2'),
('32', '2', '10', '2');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `deliveryname` varchar(30) NOT NULL,
  `deliveryphone` varchar(20) NOT NULL,
  `deliveryaddress` varchar(300) NOT NULL,
  `orderdate` date NOT NULL,
  `status` int(11) NOT NULL,
  `senddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `deliveryname`, `deliveryphone`, `deliveryaddress`, `orderdate`, `status`, `senddate`) VALUES
(1, 19, 'Hein Htet', '09776230203', 'Yangon', '2021-01-15', 0, '0000-00-00'),
(2, 21, 'Maung Maung', '09776230203', 'Yangon', '2021-01-15', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `phone`, `address`, `role`) VALUES
(1, 'kyawhtetthwin', '2ff9a0bc6df29ef80d67d5e9a883862a', 'htetthwin1234@gmail.com', '09011423', 'Yangon', 'user'),
(4, 'Zaw Zaw', 'a152e841783914146e4bcd4f39100686', 'scoundrel102@gmail.com', '09011423', 'New York', 'user'),
(5, 'min nyo', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'aungaung@gmail.com', '09011423', 'Yangon', 'user'),
(6, 'Htet Aung Hlaing', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Htetaung@gmail.com', '09011423', 'Myanmar', 'user'),
(7, 'kaungkaung', 'afb300af2012a5b4191b581d2fd7d4dd', 'kaungkaung@gmail.com', '123456', 'London', 'user'),
(8, 'nyisanshwe', 'c5ed2c6b51c1e18fe879f68b16a9545d', 'nyisanshwe@gmail.com', '093334444', 'Yngon', 'user'),
(9, 'kyaw htet', 'e10adc3949ba59abbe56e057f20f883e', 'kyawkyaw@gmail.com', '0987654', 'Myanmar', 'user'),
(11, 'abcdef', 'e80b5017098950fc58aad83c8c14978e', 'abc@gmail.com', '0911112222', 'ABCDEF', 'user'),
(12, 'zyxwv', '36a61d50555eaa00b36496846c64aa82', '', '', '', 'admin'),
(13, 'asdfgh', 'a152e841783914146e4bcd4f39100686', '', '', '', 'admin'),
(14, 'qwerty', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'htetthwin1234@gmail.com', '099876543', 'yangon', 'user'),
(17, 'maungmaung', '91eb346d110682d7021736c144a56fe8', 'mgmg@gmail.com', '0977445566', 'New York', 'user'),
(19, 'Hein Htet', '1b68dfa1c206d693e76e939a665b978e', 'hhein1911@gmail.com', '09776230203', 'Yangon', 'user'),
(20, 'Hein Htet Admin', '1b68dfa1c206d693e76e939a665b978e', 'hhein1911@gmail.com', '09776230203', 'Yangon', 'admin'),
(21, 'Maung Maung', 'e10adc3949ba59abbe56e057f20f883e', 'mg@gmail.com', '09776230203', 'Yangon', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
