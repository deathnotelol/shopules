-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2024 at 06:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopules`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Acer', '../photo/brands/acer_logo.png', '2024-10-08', '2024-10-08'),
(2, 'Apple', '../photo/brands/apple_logo.png', '2024-10-08', '2024-10-08'),
(3, 'Ariel', '../photo/brands/ariel_logo.png', '2024-10-08', '2024-10-08'),
(4, 'Bella', '../photo/brands/bella_logo.png', '2024-10-08', '2024-10-08'),
(5, 'Brands', '../photo/brands/brands_logo.png', '2024-10-08', '2024-10-08'),
(6, 'Giordano', '../photo/brands/giordano_logo.png', '2024-10-08', '2024-10-08'),
(7, 'Loacker', '../photo/brands/loacker_logo.jpg', '2024-10-08', '2024-10-08'),
(8, 'Lockandlock', '../photo/brands/lockandlock_logo.png', '2024-10-08', '2024-10-08'),
(10, 'Sai Sai', '../photo/brands/saisai_logo.png', '2024-10-08', '2024-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(7, 'Smart Home', '../photo/category/category_one.png', '2024-10-03 09:06:24', '2024-10-03 09:06:24'),
(8, 'Kitchen Apperience', '../photo/category/category_seven.png', '2024-10-03 09:06:51', '2024-10-03 09:06:51'),
(11, 'Beauty', '../photo/category/saisai_one.jpg', '2024-10-07 07:31:15', '2024-10-07 07:31:15'),
(12, 'Electronic', '../photo/category/category_five.png', '2024-10-08 14:44:55', '2024-10-08 14:44:55'),
(14, 'Home Accessory ', '../photo/category/category_six.png', '2024-10-08 14:45:56', '2024-10-08 14:45:56'),
(15, 'Kitchen', '../photo/category/category_seven.png', '2024-10-08 14:48:12', '2024-10-08 14:48:12'),
(16, 'Stationery', '../photo/category/category_four.png', '2024-10-08 14:49:05', '2024-10-08 14:49:05'),
(17, 'Furits', '../photo/category/category_two.png', '2024-10-08 16:46:45', '2024-10-08 16:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `photo`, `price`, `discount`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(2, 'T-Shirt', '../photo/items/giordano_one.jpg', 35000, 30000, 4, '2024-10-03 08:50:04', '2024-10-03 08:50:04'),
(4, 'Apple Watch', '../photo/items/apple_one.jpg', 800000, 0, 1, '2024-10-07 04:30:05', '2024-10-07 04:30:05'),
(6, 'item2', '../photo/items/saisai_three.jpg', 45000, 40000, 3, '2024-10-07 04:40:56', '2024-10-07 04:40:56'),
(7, 'item3', '../photo/items/giordano_two.jpg', 75000, 70000, 3, '2024-10-07 04:41:17', '2024-10-07 04:41:17'),
(8, 'Iphone', '../photo/items/apple_three.jpg', 4500000, 4300000, 1, '2024-10-07 04:41:42', '2024-10-07 04:41:42'),
(9, 'item5', '../photo/items/banner_bg.jpg', 25000, 20000, 3, '2024-10-07 04:42:18', '2024-10-07 04:42:18'),
(13, 'Mac Book1', '../photo/items/apple_two.png', 50000000, 49000000, 2, '2024-10-08 14:53:40', '2024-10-08 14:53:40'),
(14, 'Item6', '../photo/items/giordano_one.jpg', 35000, 30000, 4, '2024-10-08 15:43:36', '2024-10-08 15:43:36'),
(15, 'item8', '../photo/items/category_one.png', 25000, 20000, 14, '2024-10-08 15:44:10', '2024-10-08 15:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`id`, `user_id`, `roles_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-10-07 08:47:53', '2024-10-07 08:47:53'),
(2, 'user', '2024-10-07 08:47:53', '2024-10-07 08:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'IPhone', 1, '2024-10-03 06:11:02', '2024-10-03 06:11:02'),
(2, 'Disktop Device', 1, '2024-10-03 06:13:32', '2024-10-03 06:13:32'),
(3, 'Women\'s Clothes', 2, '2024-10-03 06:13:40', '2024-10-03 06:13:40'),
(4, 'Man\'s Clothes	', 3, '2024-10-03 06:21:12', '2024-10-03 06:21:12'),
(7, 'IPhone', 4, '2024-10-07 05:31:04', '2024-10-07 05:31:04'),
(9, 'Women\'s Clothes', 7, '2024-10-07 05:31:16', '2024-10-07 05:31:16'),
(10, 'Air Con', 5, '2024-10-07 05:31:59', '2024-10-07 05:31:59'),
(11, 'Laptop', 7, '2024-10-07 05:32:04', '2024-10-07 05:32:04'),
(13, 'Health Care', 10, '2024-10-07 07:38:16', '2024-10-07 07:38:16'),
(14, 'beauty', 11, '2024-10-07 07:55:18', '2024-10-07 07:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `profile`, `email`, `password`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'admin@gmail.com', 'admin', '09123456789', 'localhost', 0, '2024-10-08 04:05:12', '2024-10-08 04:05:12'),
(2, 'user1', NULL, 'user1@gmail.com', 'user', '0923456789', '456fjkkldsfjkejf', 0, '2024-10-08 04:23:39', '2024-10-08 04:23:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
