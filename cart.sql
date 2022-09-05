-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 07:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(1, 'dwc admin', 'admin@admin.com', '123'),
(2, 'bwd admin', 'yarene9974@runqx.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Adventure Books'),
(3, 'Friction'),
(5, 'Science Books'),
(6, 'Data Science Books '),
(7, 'Nano Technology Books'),
(8, 'Muslim Books'),
(10, 'Global Language Books'),
(12, 'Computer science Books'),
(13, 'Tech');

-- --------------------------------------------------------

--
-- Table structure for table `chat_manager`
--

CREATE TABLE `chat_manager` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_manager`
--

INSERT INTO `chat_manager` (`id`, `admin_id`, `user_id`) VALUES
(3, 1, 4),
(5, 2, 4),
(6, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

CREATE TABLE `credit_card` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `card_no` varchar(255) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `Cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`id`, `order_id`, `email`, `phone`, `address`, `country`, `state`, `zip`, `name`, `card_no`, `month`, `year`, `Cvv`) VALUES
(1, 5, 'dani66666@gmail.com', '5106538977', 'walton', 'Pakistan', 'punjab', 23333, 'Danish Iqbal', '00087668887990', 1, 2030, 147),
(2, 6, 'danishiqbal66666@gmail.com', '5106538977', 'walton', 'Pakistan', 'punjab', 23400, 'Dwc Designers', '9385949589485', 5, 2024, 186);

-- --------------------------------------------------------

--
-- Table structure for table `groupchat`
--

CREATE TABLE `groupchat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `chatter_name` varchar(255) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupchat`
--

INSERT INTO `groupchat` (`id`, `user_id`, `admin_id`, `chatter_name`, `chat_id`, `message`, `time`) VALUES
(24, 4, 1, 'admin', 3, 'Hi', '2022-08-26 18:02:43'),
(25, 4, 1, 'user', 3, 'hi', '2022-08-26 18:02:48'),
(26, 4, 1, 'admin', 3, 'How are you', '2022-08-26 18:07:39'),
(27, 4, 1, 'admin', 3, 'Hi', '2022-08-26 18:24:23'),
(28, 4, 1, 'user', 3, 'Hi', '2022-08-26 18:25:05'),
(29, 4, 2, 'user', 5, 'Hi publisher how are you', '2022-08-27 01:37:37'),
(30, 4, 2, 'admin', 5, 'Hi shital i am good', '2022-08-27 01:37:59'),
(31, 3, 2, 'user', 6, 'Hi kasa hai ap', '2022-08-27 01:46:22'),
(32, 3, 2, 'admin', 6, 'thk ap kasa hai', '2022-08-27 01:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `Order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `Order_id`, `product_id`, `quantity`) VALUES
(13, 5, '1', 2),
(14, 5, '4', 3),
(15, 5, '3', 2),
(16, 5, '2', 2),
(17, 6, '1', 1),
(18, 6, '2', 1),
(19, 6, '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_manager`
--

CREATE TABLE `orders_manager` (
  `Order_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_manager`
--

INSERT INTO `orders_manager` (`Order_id`, `User_id`, `status`) VALUES
(5, 4, 'delivered'),
(6, 4, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `img_src`, `price`, `publisher_id`, `Description`, `Category`) VALUES
(1, 'Product Name 1', '1661411483.jpg', 100, 2, 'desc', '2'),
(2, 'Product Name 2', '2.jpg', 500, 1, '', '2'),
(3, 'Product Name 3', '3.jpg', 30, 1, '', '2'),
(4, 'Product Name 4', '4.jpg', 600, 1, '', '3'),
(5, 'Product 5', '5.jpg', 1050, 1, '', '3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'dwc', 'danishiqbal66666@gmail.com', '123'),
(2, 'danish', 'uzair3134@gmail.com', '123'),
(3, 'mbilalsuleman', 'mbilalsuleman.kashmir@gmail.com', '123'),
(4, 'shital', 'shital@gmail.com', 'shital');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_manager`
--
ALTER TABLE `chat_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupchat`
--
ALTER TABLE `groupchat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_manager`
--
ALTER TABLE `orders_manager`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chat_manager`
--
ALTER TABLE `chat_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `credit_card`
--
ALTER TABLE `credit_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groupchat`
--
ALTER TABLE `groupchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders_manager`
--
ALTER TABLE `orders_manager`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
