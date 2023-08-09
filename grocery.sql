-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 01:29 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `PID` int(10) NOT NULL,
  `UID` int(10) NOT NULL,
  `quantity` int(20) NOT NULL,
  `amount` int(50) NOT NULL,
  `CID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`PID`, `UID`, `quantity`, `amount`, `CID`) VALUES
(2, 2, 3, 90, 8),
(3, 1, 3, 180, 10),
(2, 1, 1, 30, 11),
(2, 1, 1, 30, 12);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CID` int(10) NOT NULL,
  `categoryname` varchar(25) NOT NULL,
  `categorydescription` varchar(200) NOT NULL,
  `storeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CID`, `categoryname`, `categorydescription`, `storeID`) VALUES
(2, 'snakes', 'fresh', 0),
(3, ' Beverages', 'on a best discount', 0),
(4, ' food & vegatable', ' fresh', 11),
(5, 'vegetable', ' fresh veg', 14);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FID` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `COMMENT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FID`, `name`, `email`, `COMMENT`) VALUES
(1, 'Roshan Chouhan', 'roshanchouhan29@gmail.com', 'its to good');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `OID` int(10) NOT NULL,
  `paymentmethod` varchar(40) NOT NULL,
  `orderdate` varchar(20) NOT NULL,
  `billingid` int(40) NOT NULL,
  `amount` int(10) NOT NULL,
  `shipping` int(10) NOT NULL,
  `UID` int(10) NOT NULL,
  `storeID` int(11) NOT NULL,
  `items` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`OID`, `paymentmethod`, `orderdate`, `billingid`, `amount`, `shipping`, `UID`, `storeID`, `items`) VALUES
(7, 'CREDIT CARD', '2023-06-01', 0, 330, 1, 1, 0, 0),
(8, 'CREDIT CARD', '2023-06-01', 0, 210, 1, 1, 0, 0),
(9, 'CREDIT CARD', '2023-06-01', 0, 240, 1, 1, 0, 3),
(10, 'CREDIT CARD', '2023-06-01', 0, 240, 1, 1, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PID` int(10) NOT NULL,
  `product_name` varchar(56) NOT NULL,
  `units` int(10) NOT NULL,
  `image` varchar(30) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `CID` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `product_description` text NOT NULL,
  `storeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PID`, `product_name`, `units`, `image`, `weight`, `CID`, `price`, `product_description`, `storeID`) VALUES
(2, 'bannan', 100, 'bannan.jpg', '1', 3, 30, 'fresh', 0),
(3, 'CADBURY CHOCOBAKES  ', 20, 'choco.webp', '200gm', 2, 60, 'CADBURY CHOCOBAKES Choc Filled Cookies, Centre', 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `SID` int(10) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `passward` varchar(100) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesman`
--

INSERT INTO `salesman` (`SID`, `sname`, `email`, `mobile`, `passward`, `fname`, `lname`) VALUES
(12, 'riya sharma', 'riya@gmail.com', '2625489638', '3153be13ca91e847668fbf430757a0b5', 'riya', 'sharma'),
(13, 'Raj Singh Chouhan', 'raj@gmail.com', '7828032975', '65a1223dae83b8092c4edba0823a793c', 'Raj Singh', ' Chouhan'),
(14, 'Roshan  Chouhan', 'roshan@gmail.com', '6264554662', 'd6dfb33a2052663df81c35e5496b3b1b', 'Roshan', 'Chouhan');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `STID` int(10) NOT NULL,
  `storename` text NOT NULL,
  `retailername` varchar(40) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `rdate` date NOT NULL,
  `email` varchar(60) NOT NULL,
  `Salername` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`STID`, `storename`, `retailername`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `rdate`, `email`, `Salername`) VALUES
(3, 'kirana store', 'sourabh chouhan', 'agrawal colony dhannad', 'persistent system', 'pithampur', 'madhya pradesh', 454775, 'HN', '2023-05-29', 'sourabh@gmail.com', 0),
(4, 'kirana store', 'riya sharma', 'tilak nagar', 'indore', 'indore', 'madhya pradesh', 781524, 'HN', '2023-05-29', 'riya@gmail.com', 0),
(5, 'kirana store', 'Raj Chouhan', 'agrawal colony', 'dhannad pithampur', 'pithampur', 'madhya pradesh', 454775, 'HN', '2023-05-01', 'raj@gmail.com', 13),
(6, 'Ondoor Shop', 'Roshan Chouhan', 'agrawal colony', 'pithampur', 'pithampur', 'MP', 454757, 'HN', '2023-06-01', 'roshan@gmail.com', 14);

-- --------------------------------------------------------

--
-- Table structure for table `useraddress`
--

CREATE TABLE `useraddress` (
  `UAID` int(10) NOT NULL,
  `UID` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(20) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraddress`
--

INSERT INTO `useraddress` (`UAID`, `UID`, `fname`, `lname`, `email`, `address1`, `address2`, `country`, `state`, `zip`, `username`) VALUES
(1, 1, 'roshan', 'chouhan', '', 'agrawal colony', 'pithampur', 'india', 'indore', 4547475, 'roshan chouhan'),
(2, 1, '', '', '', '', '', '', '', 0, ''),
(3, 1, '', '', '', '', '', '', '', 0, ''),
(4, 1, '', '', '', '', '', '', '', 0, ''),
(5, 1, '', '', '', '', '', '', '', 0, ''),
(6, 1, 'roshan', 'chouhan', 'roshanchouhan29@gmail.com', 'agrawal colony dhannad khurd pithampur', 'agrawal colony dhannad khurd pithampur', 'india', 'indore', 457547, 'roshan chouhan '),
(7, 1, 'fsdvv', 'sfdsvd', 'roshanchouahgn29@gmail.com', 'sfdg', 'sgdgsg', 'india', 'indore', 4546554, 'sdvfsvsv'),
(8, 1, 'fsdvv', 'sfdsvd', 'roshanchouahgn29@gmail.com', 'sfdg', 'sgdgsg', 'india', 'indore', 4546554, 'sdvfsvsv'),
(9, 1, '', '', '', '', '', '', '', 0, ''),
(10, 1, '', '', '', '', '', '', '', 0, ''),
(11, 1, '', '', '', '', '', '', '', 0, ''),
(12, 1, '', '', '', '', '', '', '', 0, ''),
(13, 1, 'roshan ', 'chouhan', 'roshanchouhan29@gmail.com', 'agrawal colony dhannad', 'pithampur', 'india', 'indore', 755451454, 'Roshan Chouhan'),
(14, 1, '', '', '', '', '', '', '', 0, ''),
(15, 1, '', '', '', '', '', '', '', 0, ''),
(16, 1, '', '', '', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `AID` int(10) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `mobile_number` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `first_name`, `last_name`, `AID`, `emailid`, `mobile_number`, `password`) VALUES
(1, 'roshan', 'chouhan', 1, 'roshanchouhan29@gmail.com', '2147483647', 'd6dfb33a2052663df81c35e5496b3b1b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FID`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`STID`);

--
-- Indexes for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD PRIMARY KEY (`UAID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `OID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salesman`
--
ALTER TABLE `salesman`
  MODIFY `SID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `STID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `useraddress`
--
ALTER TABLE `useraddress`
  MODIFY `UAID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
