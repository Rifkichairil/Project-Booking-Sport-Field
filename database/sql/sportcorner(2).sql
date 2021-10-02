-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2021 at 10:22 AM
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
  `field_address` text,
  `price` int(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fasilitas` text,
  `no_rek` int(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`id`, `user_id`, `field_category`, `field_name`, `field_code`, `field_address`, `price`, `image`, `fasilitas`, `no_rek`, `created_at`, `updated_at`, `deleted_at`) VALUES
(00000000000000000044, 3, 'Bulu Tangkis', 'Golden Stick', 'B 01', 'Jl. Alternatif UI', 50000, 'images/YVjCfomTkN004ZsSUJc5UNbOqHk59WOK93ra4YSm.jpg', 'Toilet,Wi-Fi,Canteen ', 220112, '2020-12-13 16:50:18', '2020-12-13 17:03:22', NULL),
(00000000000000000048, 3, 'Futsal', 'Golden Stick', 'F 01', 'Jl. Alternatif UI', 40000, 'images/wcvTmqwE6esVnOkiv1YoVUXz2TFKHvsZcjHoJqJH.jpg', 'Toilet,Wi-Fi, Kantin', 2232991, '2020-12-31 18:05:11', '2020-12-31 18:09:00', NULL),
(00000000000000000049, 3, 'Bulu Tangkis', 'Golden Stick', 'B 02', 'Jl. AlternatIf UI', 60000, 'images/field/iwsMeIxBB8u4LAm8BqgUG1rf8zXYcvzeVaMcoSMi.jpg', 'Toilet,Wi-Fi, Kantin', 992992, '2020-12-31 18:46:21', '2020-12-31 18:46:21', NULL),
(00000000000000000050, 38, 'Futsal', 'Dzaky Futsal', 'F 01', 'Jl. Depok', 50000, 'images/field/N3xqLQZxqBwSogyjebyE5kScUjOdicP7hMLXE8sI.jpg', 'Toilet,Wi-Fi, Kantin', 918398290, '2021-01-05 17:00:02', '2021-01-05 17:00:02', NULL);

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
  `no_rek` int(20) NOT NULL,
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

INSERT INTO `order_field` (`id`, `user_id`, `field_id`, `owner_id`, `unique_code`, `field_name`, `field_category`, `field_code`, `field_date`, `no_rek`, `time_start`, `time_end`, `price`, `total`, `expired_order`, `status`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(00000000000000000028, 4, 44, 3, 87, 'Golden Stick', 'Bulu Tangkis', 'B 01', '2021-01-19', 220112, '10:00', '12:00', 50087, '100087', '2021-01-17 08:23:20', 1, NULL, '2021-01-17 08:08:20', '2021-01-17 08:08:20', NULL),
(00000000000000000029, 4, 44, 3, 92, 'Golden Stick', 'Bulu Tangkis', 'B 01', '2021-01-19', 220112, '12:00', '13:00', 50092, '50092', '2021-01-17 08:34:34', 0, NULL, '2021-01-17 08:19:34', '2021-01-17 08:19:34', NULL);

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

--
-- Dumping data for table `turney`
--

INSERT INTO `turney` (`id`, `image`, `turney_name`, `turney_desc`, `turney_address`, `turney_link`, `turney_open_req`, `turney_fee`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'images/turney/Tb4UKVcuG1SWWBLKAeTwsT3Wj6NwU16xdYd0fLSN.jpg', 'Futsale Turney', 'Pemenang mendapatkan satu unit HP', 'Jl. Alternatif Cibubur', 'https://www.instagram.com/', '2021-01-27', '200000', '2020-12-31 18:54:17', '2020-12-31 18:54:17', NULL),
(2, 'images/turney/6tYVbhoS3DxrTAtgPsvNAwi3hXxjwNAyRTCouE7i.jpg', 'Futsale Turney', 'pemenang mendapatkan 5 unit motor', 'Jl. depok', 'https://www.instagram.com/', '2021-01-22', '100000', '2021-01-05 17:05:34', '2021-01-05 17:05:34', NULL);

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
(34, 2, 10, 'user', 'name', 'user.name@mail.com', 1, '$2y$10$kMqGIvXSCfRW1zxYQZ9h3uYpawBUTvvHNWr4D2bIGJrI4dTu.ORLG', '082423764592', 1, '2020-12-21 08:14:55', '2020-12-28 08:07:01', NULL),
(35, 2, 10, 'user', 'name', 'user.name@mail.com', 0, '$2y$10$rhC77ZY6DkCfaAIUdqA4D.mBFrgxehtZe/xRG9KL0ciG49PSsGIbq', '082423764592', 1, '2020-12-21 08:43:29', '2020-12-21 08:43:29', NULL),
(36, 2, 10, 'user', 'name1', 'username@mail.com', 1, '$2y$10$eXMvGLOxaFlHnoBjZ9sZGO5dAGqClxakP/fEO1pX/opX9kkcDI1eC', '087654789654', 1, '2021-01-01 16:41:45', '2021-01-01 16:53:16', NULL),
(37, 2, 10, 'Lazuardi', 'Dwi putri', 'lazuardi@mail.com', 1, '$2y$10$XFpxwn50yktxcObXwXgQUuSheHQ4B/YZcfOhfp9pMLrIKzcPYGc3S', '08767876543', 1, '2021-01-02 14:04:08', '2021-01-02 14:11:04', NULL),
(38, 1, 50, 'Muh.', 'Hanif', 'dzakyfutsal@mail.com', 1, '$2y$10$2h08E6IG5iDScSvgG/os4.SV3pcKUEV6QSu7hp2KaXrJK.UVf7K3q', '087564327865', 1, '2021-01-05 16:52:36', '2021-01-05 16:57:25', NULL);

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
  MODIFY `id` bigint(20) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `order_field`
--
ALTER TABLE `order_field`
  MODIFY `id` bigint(20) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `turney`
--
ALTER TABLE `turney`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
