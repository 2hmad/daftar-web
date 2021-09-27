-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 02:45 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daftar`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(255) NOT NULL,
  `user_email` text NOT NULL,
  `customer_name` text NOT NULL,
  `customer_phone` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_email`, `customer_name`, `customer_phone`, `created_at`) VALUES
(1, 'eng.ahmedmohamed.2002@gmail.com', 'ahmed mhoamed', '', '15-09-2021'),
(3, 'eng.ahmedmohamed.2002@gmail.com', 'Ahmed Mohamed', '+201275457924', '2021-09-20'),
(4, 'eng.ahmedmohamed.2002@gmail.com', 'Ahmed Mohamed Ibrahim', '+201275457924', '2021-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `customers_data`
--

CREATE TABLE `customers_data` (
  `id` int(255) NOT NULL,
  `customer_id` text NOT NULL,
  `user_email` text NOT NULL,
  `type` text NOT NULL,
  `amount` text NOT NULL,
  `name` text NOT NULL,
  `date` text NOT NULL,
  `details` text NOT NULL,
  `pic` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers_data`
--

INSERT INTO `customers_data` (`id`, `customer_id`, `user_email`, `type`, `amount`, `name`, `date`, `details`, `pic`) VALUES
(2, '4', 'eng.ahmedmohamed.2002@gmail.com', 'gave', '50.00', 'fgh', '2021-09-24', 'fgh', 'public/uploads/eng.ahmedmohamed.2002@gmail.com-4-fgh-77074248.jpg'),
(3, '4', 'eng.ahmedmohamed.2002@gmail.com', 'got', '500', 'fgh', '2021-09-24', 'fgh', 'public/uploads/eng.ahmedmohamed.2002@gmail.com-4-fgh-77074248.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `releated_users`
--

CREATE TABLE `releated_users` (
  `id` int(255) NOT NULL,
  `releated_user` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(5000) NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `releated_users`
--

INSERT INTO `releated_users` (`id`, `releated_user`, `first_name`, `last_name`, `email`, `phone`, `password`) VALUES
(1, 'eng.ahmedmohamed.2002@gmail.com', 'Ahmed', 'Mohamed', 'ahmed@gmail.com', '01275457924', ''),
(2, 'eng.ahmedmohamed.2002@gmail.com', 'Ahmed', 'Mohamed', 'ahmed@gmail.com', '01275457924', '');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(255) NOT NULL,
  `user_email` text NOT NULL,
  `supplier_name` text NOT NULL,
  `supplier_phone` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `user_email`, `supplier_name`, `supplier_phone`, `created_at`) VALUES
(2, 'eng.ahmedmohamed.2002@gmail.com', 'Ahmed Mohamed', '+201275457924', '2021-09-20'),
(3, 'eng.ahmedmohamed.2002@gmail.com', 'Ahmed Mohamed', '+201275457924', '2021-09-20'),
(4, 'eng.ahmedmohamed.2002@gmail.com', 'bassem', '+201275457924', '2021-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers_data`
--

CREATE TABLE `suppliers_data` (
  `id` int(255) NOT NULL,
  `supplier_id` int(255) NOT NULL,
  `user_email` text NOT NULL,
  `type` text NOT NULL,
  `amount` text NOT NULL,
  `name` text NOT NULL,
  `date` text NOT NULL,
  `details` text NOT NULL,
  `pic` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers_data`
--

INSERT INTO `suppliers_data` (`id`, `supplier_id`, `user_email`, `type`, `amount`, `name`, `date`, `details`, `pic`) VALUES
(23, 1, 'eng.ahmedmohamed.2002@gmail.com', 'gave', '500', '', '', '', ''),
(24, 1, 'eng.ahmedmohamed.2002@gmail.com', 'gave', '500', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(2000) NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`) VALUES
(8, 'Ahmed', 'Ibrahim', 'eng.ahmedmohamed.2002@gmail.com', '+201275457924', '$2y$10$eXwB/YBTmW6FNJN935i1lOBD7bXgKi9rVJ6C2FhRCXLyREu/4ELSm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_data`
--
ALTER TABLE `customers_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `releated_users`
--
ALTER TABLE `releated_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers_data`
--
ALTER TABLE `suppliers_data`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers_data`
--
ALTER TABLE `customers_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `releated_users`
--
ALTER TABLE `releated_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers_data`
--
ALTER TABLE `suppliers_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
