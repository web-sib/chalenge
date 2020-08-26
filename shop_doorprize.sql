-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 04:34 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_doorprize`
--

-- --------------------------------------------------------

--
-- Table structure for table `doorprize_data`
--

CREATE TABLE `doorprize_data` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `point` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doorprize_data`
--

INSERT INTO `doorprize_data` (`id`, `name`, `point`, `is_active`) VALUES
(1, 'Kalung emas 2 gram', 100, 1),
(3, 'handphone', 1000000, 1),
(4, 'becak', 10000, 1),
(5, 'sepeda', 100, 1),
(6, 'motor', 200000, 1),
(7, 'helm', 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 2, 'KEYSIB001', 3, 0, 0, NULL, 220914);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `my_gift`
--

CREATE TABLE `my_gift` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doorprize_id` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `my_gift`
--

INSERT INTO `my_gift` (`id`, `user_id`, `doorprize_id`, `address`, `is_active`) VALUES
(2, 2, 3, NULL, 1),
(3, 2, 5, NULL, 1),
(4, 2, 3, NULL, 0),
(5, 2, 1, NULL, 0),
(6, 2, 5, NULL, 0),
(7, 2, 5, NULL, 0),
(8, 2, 5, NULL, 0),
(9, 2, 5, NULL, 0),
(10, 2, 5, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `my_point`
--

CREATE TABLE `my_point` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `my_point`
--

INSERT INTO `my_point` (`id`, `user_id`, `point`) VALUES
(3, 2, 90),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`id`, `name`, `username`, `password`, `address`, `level`) VALUES
(1, 'joko', 'jokopinter', '12345', 'lasem', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `purchase_price`, `stock`, `discount`, `created_at`, `is_active`) VALUES
(1, 'wortel', 10000, 100000, 0, '10', '2020-08-21 04:50:36', 1),
(5, 'kangkung', 15000, 13000, 0, '0', '2020-08-21 13:43:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `total_product` int(11) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `officer_id` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `remaining_money` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `invoice`, `total_product`, `total_pay`, `user_id`, `officer_id`, `money`, `remaining_money`, `created_at`) VALUES
(3, 'Door200820002', 1, 10000, 2, 1, 10, 0, '2020-08-22 00:00:00'),
(4, 'Door2008220001', 2, 5000000, 2, 1, 20, 10000, '2020-08-22 00:00:00'),
(5, 'Door2008220002', 1, 15, 2, 1, 15, 0, '2020-08-22 00:00:00'),
(6, 'Door2008220003', 1, 10, 2, 1, 10, 0, '2020-08-22 00:00:00'),
(7, 'Door2008220004', 1, 10, 2, 1, 10, 0, '2020-08-22 00:00:00'),
(8, 'Door2008220005', 1, 10, 2, 1, 10, 0, '2020-08-22 00:00:00'),
(9, 'Door2008220006', 1, 10, 2, 1, 10, 0, '2020-08-22 00:00:00'),
(10, 'Door2008220007', 1, 15, 2, 1, 20, 5, '2020-08-22 00:00:00'),
(11, 'Door2008220008', 1, 15, 2, 1, 20, 5, '2020-08-22 00:00:00'),
(30, 'Door2008220027', 2, 25000, 2, 1, 25, 0, '2020-08-22 00:00:00'),
(33, 'Door2008220028', 1, 9000, 2, 1, 10, 1000, '2020-08-22 00:00:00'),
(34, 'Door2008220029', 2, 24000, 2, 1, 25, 1000, '2020-08-22 00:00:00'),
(35, 'Door2008260001', 11, 111000, 3, 1, 150, 39000, '2020-08-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `address`) VALUES
(2, 'paijo', 'paijo12@gmail.com', '12345', 'babagan'),
(3, 'ajes', 'ajis_wafiqCetia12@gmail.com', '12345', 'babagan'),
(4, 'mad', 'madforever12@gmail.com', '12345', 'babagan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doorprize_data`
--
ALTER TABLE `doorprize_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_gift`
--
ALTER TABLE `my_gift`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_gift_ibfk_1` (`user_id`),
  ADD KEY `my_gift_ibfk_2` (`doorprize_id`);

--
-- Indexes for table `my_point`
--
ALTER TABLE `my_point`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_point_ibfk_1` (`user_id`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `officer_id` (`officer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doorprize_data`
--
ALTER TABLE `doorprize_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `my_gift`
--
ALTER TABLE `my_gift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `my_point`
--
ALTER TABLE `my_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `officer`
--
ALTER TABLE `officer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keys`
--
ALTER TABLE `keys`
  ADD CONSTRAINT `keys_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `my_gift`
--
ALTER TABLE `my_gift`
  ADD CONSTRAINT `my_gift_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `my_gift_ibfk_2` FOREIGN KEY (`doorprize_id`) REFERENCES `doorprize_data` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `my_point`
--
ALTER TABLE `my_point`
  ADD CONSTRAINT `my_point_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`officer_id`) REFERENCES `officer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
