-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 24, 2020 at 11:28 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportcorner`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Futsal', '2020-06-24 15:41:05', NULL, NULL),
(2, 'Voli', '2020-07-04 07:39:51', '2020-07-04 07:39:51', NULL),
(3, 'Basket', '2020-08-28 12:27:25', '2020-08-28 12:27:25', NULL),
(4, 'Tenis Meja', '2020-08-28 12:28:53', '2020-08-28 12:28:53', NULL),
(6, 'Badminton', '2020-12-14 04:47:41', '2020-12-14 04:47:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `id` bigint(20) UNSIGNED ZEROFILL NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `field_category` varchar(45) DEFAULT NULL,
  `field_name` varchar(100) DEFAULT NULL,
  `field_code` varchar(15) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fasilitas` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`id`, `user_id`, `field_category`, `field_name`, `field_code`, `price`, `image`, `fasilitas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(00000000000000000044, 3, 'Bulu Tangkis', 'Golden Stick', 'B 01', 50000, 'images/YVjCfomTkN004ZsSUJc5UNbOqHk59WOK93ra4YSm.jpg', 'Toilet,Wi-Fi,Canteen ', '2020-12-13 16:50:18', '2020-12-13 17:03:22', NULL),
(00000000000000000045, 2, 'Futsal', 'Arena Futsal', 'F 01', 40000, 'images/T4pCcrok20O4QhnezdcGIuXEzVetgCAh9SOK0G8B.jpg', 'Toilet,Wi-Fi, Kantin', '2020-12-13 16:55:12', '2020-12-24 09:06:39', NULL),
(00000000000000000046, 2, 'Futsal', 'Arena Futsal', 'F 02', 60000, 'images/9rDKzYR3IDvpYrhKbJe5jAo94MI7hph83sYggeFS.jpg', 'Toilet,Wi-Fi, Kantin', '2020-12-24 09:08:45', '2020-12-24 10:17:43', NULL),
(00000000000000000047, 2, 'futsal', 'asik', 'f 150', 40000, 'images/field/mw6kLbytM9CaDHBTEgSqDfpaEYuN4HxPzZR3osEr.jpg', 'Toilet,Wi-Fi, Kantin', '2020-12-24 09:16:40', '2020-12-24 09:16:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_field`
--

CREATE TABLE `order_field` (
  `id` bigint(20) UNSIGNED ZEROFILL NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `field_id` bigint(20) DEFAULT NULL,
  `owner_id` bigint(20) DEFAULT NULL,
  `unique_code` int(3) DEFAULT NULL,
  `field_name` varchar(100) DEFAULT NULL,
  `field_category` varchar(40) DEFAULT NULL,
  `field_code` varchar(15) DEFAULT NULL,
  `field_date` varchar(10) DEFAULT NULL,
  `time_start` varchar(10) DEFAULT NULL,
  `time_end` varchar(10) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `total` varchar(10) DEFAULT NULL,
  `expired_order` timestamp NULL DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_field`
--

INSERT INTO `order_field` (`id`, `user_id`, `field_id`, `owner_id`, `unique_code`, `field_name`, `field_category`, `field_code`, `field_date`, `time_start`, `time_end`, `price`, `total`, `expired_order`, `status`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(00000000000000000001, 4, 38, 2, 23, 'Arena Sport', 'Futsal', 'A 01', '12/24/2020', '10:00', '11:00', 75023, '75023', '2020-12-11 15:31:50', NULL, NULL, '2020-12-11 14:31:50', '2020-12-11 14:31:50', NULL),
(00000000000000000002, 4, 44, 3, 7, 'Golden Stick', 'Bulu Tangkis', 'B 01', '12/15/2020', '10:00', '12:00', 50007, '100007', '2020-12-14 07:25:30', NULL, NULL, '2020-12-14 06:25:30', '2020-12-14 06:25:30', NULL),
(00000000000000000003, 4, 45, 2, 4, 'Arena Futsal', 'Futsal', 'F 01', '12/16/2020', '10:00', '12:00', 40004, '80004', '2020-12-15 10:06:24', NULL, NULL, '2020-12-15 09:06:24', '2020-12-15 09:06:24', NULL),
(00000000000000000004, 4, 44, 3, 17, 'Golden Stick', 'Bulu Tangkis', 'B 01', '12/16/2020', '11:00', '13:00', 50017, '100017', '2020-12-15 17:34:34', 1, NULL, '2020-12-15 16:34:34', '2020-12-16 04:25:50', NULL),
(00000000000000000005, 4, 45, 2, 50, 'Arena Futsal', 'Futsal', 'F 01', '12/23/2020', '10:00', '13:00', 40050, '120050', '2020-12-22 05:41:47', 1, NULL, '2020-12-22 04:41:47', '2020-12-24 10:59:30', NULL),
(00000000000000000006, 4, 44, 3, 15, 'Golden Stick', 'Bulu Tangkis', 'B 01', '12/23/2020', '11:00', '13:00', 50015, '100015', '2020-12-22 08:07:26', NULL, NULL, '2020-12-22 07:07:26', '2020-12-22 07:07:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) UNSIGNED ZEROFILL NOT NULL,
  `owner_id` bigint(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `order_field_id` bigint(20) UNSIGNED ZEROFILL NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `owner_id`, `image`, `created_at`, `updated_at`, `deleted_at`, `order_field_id`, `user_id`) VALUES
(00000000000000000001, 3, 'images/Y6kTVlPzteUcspZ6kXuJeTEoofb5dWWBJBXX0bK9.jpg', '2020-12-15 17:02:21', '2020-12-15 17:02:21', NULL, 00000000000000000004, 4),
(00000000000000000002, 2, 'images/BZRQT30KmD5p7xSJ4OEb8gCaj5q79FHIsjpNisYg.jpg', '2020-12-22 04:42:18', '2020-12-22 04:42:18', NULL, 00000000000000000005, 4);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(0, 'Guest', '2020-06-02 03:50:00', '2020-06-02 03:50:00'),
(1, 'Admin', '2020-06-02 03:50:00', '2020-06-02 03:50:00'),
(2, 'Customer', '2020-06-02 03:50:00', '2020-06-02 03:50:00'),
(99, 'Super Admin', '2020-06-02 03:50:00', '2020-06-02 03:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `turney`
--

CREATE TABLE `turney` (
  `id` bigint(20) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `turney_name` varchar(100) DEFAULT NULL,
  `turney_desc` text,
  `turney_address` text,
  `turney_link` text,
  `turney_open_req` varchar(50) DEFAULT NULL,
  `turney_fee` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `role_id` int(2) DEFAULT NULL,
  `account` int(1) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `is_email` int(2) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `account`, `first_name`, `last_name`, `email`, `is_email`, `password`, `telp`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 99, 9, 'haya', 'rasikhah', 'hr@g.c', 1, '$2y$10$kiW6u0XWjCL71Aj3EHEqV.r78mwdx3lfJrNspTRYAzeNy59SP3tXy', '321654', 1, '2020-06-24 15:26:50', '2020-06-24 15:26:50', NULL),
(2, 1, 50, 'Arena', 'Futsal', 'af@g.c', 1, '$2y$10$.bCGNunp.3r.mE0hRuoXbuIW2/2ftJTYNkEzs1cmRQKkWgbatFKM.', '321654', 1, '2020-06-24 15:34:25', '2020-12-14 04:38:42', NULL),
(3, 1, 50, 'Golden', 'Sport', 'gs@g.c', 1, '$2y$10$WPl8MMNzJ9QnylshchDO6.4ntJoL/v7tD2t97ThbKhjYinl8YYPgW', '321654', 1, '2020-06-24 15:35:06', '2020-06-29 14:51:50', NULL),
(4, 2, 10, 'rifki', 'chairil', 'rc@g.c', 1, '$2y$10$nH52y4s2cX4Dwfxrbug6WO9nDU1kg627kaWGDaMgZjR1sBGML4dk6', '321654', 1, '2020-06-24 15:43:20', '2020-06-24 15:48:45', NULL),
(11, 2, 10, 'haya', 'rasikhah', 'haya@mail.com', 0, '$2y$10$GZLFnjTsC5YNBZ.CISI.BOqG6CmoVODdCS2ZOEBM2rnb9I/AmuKHa', '087877603456', 1, '2020-12-17 05:26:03', '2020-12-17 05:26:03', NULL),
(32, 2, 10, 'coba', 'banget', 'ampebisa@gmail.com', 1, '$2y$10$5wKj8FPg0a6PbGU5SG5.a./ZJU8xvy7.rg49QH1E3wVGVqQx42wBK', '085960405898', 1, '2020-12-17 07:01:14', '2020-12-17 07:01:42', NULL),
(33, 2, 10, 'testing', 'satu', 'testingsatu@g.c', 0, '$2y$10$TlJ.vlg26O0AFkgLBVJf3uZtjNJ5t8vtn5cW0XN8G3FFZp8fxJjmC', '321654987', 1, '2020-12-17 07:05:53', '2020-12-17 07:05:53', NULL),
(34, 2, 10, 'user', 'name', 'user.name@mail.com', 0, '$2y$10$kMqGIvXSCfRW1zxYQZ9h3uYpawBUTvvHNWr4D2bIGJrI4dTu.ORLG', '082423764592', 1, '2020-12-21 08:14:55', '2020-12-21 08:14:55', NULL),
(35, 2, 10, 'user', 'name', 'user.name@mail.com', 0, '$2y$10$rhC77ZY6DkCfaAIUdqA4D.mBFrgxehtZe/xRG9KL0ciG49PSsGIbq', '082423764592', 1, '2020-12-21 08:43:29', '2020-12-21 08:43:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_field_user_idx` (`user_id`);

--
-- Indexes for table `order_field`
--
ALTER TABLE `order_field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_field_user_idx` (`user_id`),
  ADD KEY `field_id` (`field_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payment_order_field1_idx` (`order_field_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turney`
--
ALTER TABLE `turney`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `id` bigint(20) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `order_field`
--
ALTER TABLE `order_field`
  MODIFY `id` bigint(20) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `turney`
--
ALTER TABLE `turney`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `field`
--
ALTER TABLE `field`
  ADD CONSTRAINT `fk_field_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_field`
--
ALTER TABLE `order_field`
  ADD CONSTRAINT `fk_field_user0` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_order_field1` FOREIGN KEY (`order_field_id`) REFERENCES `order_field` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
