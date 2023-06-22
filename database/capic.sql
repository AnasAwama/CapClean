-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 08:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capic`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(20) NOT NULL,
  `cat_desc` varchar(30) NOT NULL,
  `cat_image` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_desc`, `cat_image`) VALUES
(1, 'Tile & Grout', 'exercitation ullamco laboris n', 'tiles-img.png'),
(2, 'Carpet Cleaning', 'exercitation ullamco laboris n', 'carpet-img.png'),
(3, 'Tile & Grout', 'exercitation ullamco laboris n', 'tiles-img.png'),
(4, 'Carpet Cleaning', ' exercitation ullamco laboris ', 'carpet-img.png'),
(7, 'Tile & Grout2', 'xercitation ullamco laboris n', 'tiles-img.png'),
(8, 'Tile & Grout3', 'xercitation ullamco laboris n', 'tiles-img.png');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(10) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `item_desc` varchar(30) NOT NULL,
  `images` varchar(30) NOT NULL,
  `item_short_desc` varchar(10) NOT NULL,
  `item_price` float NOT NULL,
  `item_rate` int(11) NOT NULL,
  `item_cat_id` int(20) NOT NULL,
  `item_quant` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_desc`, `images`, `item_short_desc`, `item_price`, `item_rate`, `item_cat_id`, `item_quant`) VALUES
(2, 'Carpet Cleaning', 'Exercitation ullamco laboris n', 'carpet-img.png', 'sfwervcb', 20.99, 0, 1, 10),
(3, 'Tile & Grout', 'Exercitation ullamco laboris n', 'carpet-img.png', 'afadfsadfe', 10.4, 0, 2, 10),
(7, 'prod', 'aAAAAAAAAAAAAAAAAAAAAAaaaaaaaa', '', 'aAAAAAAAAA', 20, 0, 1, 11),
(8, 'prod', 'asdsdasdasdsadsa', '', 'asdsdasdas', 2, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `amount` decimal(10,0) NOT NULL,
  `currency` varchar(4) NOT NULL,
  `TransactionID` varchar(100) NOT NULL,
  `Statu` varchar(100) NOT NULL,
  `ID` int(100) NOT NULL,
  `item` varchar(100) NOT NULL,
  `orderDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`amount`, `currency`, `TransactionID`, `Statu`, `ID`, `item`, `orderDate`) VALUES
('136', 'USD', 'Completed', '7GV98081BP865791Y', 1, '', NULL),
('58', 'USD', 'Completed', '6L06347094941904F', 2, '', NULL),
('42', 'USD', 'Completed', '63B27900HL029680P', 3, '', NULL),
('42', 'USD', 'Completed', '63B27900HL029680P', 4, '', NULL),
('42', 'USD', 'Completed', '63B27900HL029680P', 5, '', NULL),
('19', 'USD', 'Completed', '1V424274B2490551N', 6, '', NULL),
('58', 'USD', 'Completed', '7T490133T0077190J', 7, '', NULL),
('21', 'USD', 'Completed', '92A772456W082380E', 8, '', NULL),
('21', 'USD', 'Completed', '1SL78140H15422608', 9, '', NULL),
('21', 'USD', 'Completed', '9VY604776E389033J', 10, '', NULL),
('19', 'USD', 'Completed', '1RD08450AU3806804', 11, '{prod2:1;prod1:1;}', NULL),
('19', 'USD', 'Completed', '1RD08450AU3806804', 12, '{prod2:1;prod1:1;}', NULL),
('21', 'USD', 'Completed', '0N4134251N0018626', 13, '{prod2:1;}', '2023-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` int(200) NOT NULL,
  `hashPassword` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `access` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `hashPassword`, `email`, `access`) VALUES
(1, 'anas', 123, '', 'a@g.com', 'admin'),
(2, 'Ahmed', 123, '', 'a@b.com', 'user'),
(4, 'anasdffd', 123, '', 'anas.aw.anas@gmail.com', 'user'),
(10, 'aa', 123, '', 'a@gmail', 'admin'),
(11, 'aaa', 123, '', 'a@gmail,co,', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_cat_id` (`item_cat_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
