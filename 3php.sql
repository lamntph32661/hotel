-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2024 at 02:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3php`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2024_07_15_144118_create_product_table', 1),
(16, '2024_07_15_144907_create_product_comment_table', 1),
(17, '2024_07_15_145943_create_log_table', 1),
(18, '2024_07_15_152633_update_product_table', 1),
(19, '2024_07_15_155234_delete_colum_product_table', 1),
(20, '2024_07_15_160158_delete_log_table', 2),
(21, '2024_07_19_142441_update_users_table', 3),
(31, '2024_07_19_142853_create_products_table', 4),
(32, '2024_07_19_143531_create_orders_table', 4),
(33, '2024_07_19_143912_create_orders_detail_table', 4),
(34, '2024_07_22_143844_update_products_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `totalPrice` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `created_at`, `updated_at`, `totalPrice`) VALUES
(31, 62, '2012-03-22 10:12:40', '2021-09-16 04:52:35', 47.07),
(32, 74, '2003-09-01 21:46:55', '2019-11-03 18:01:40', 2.54),
(33, 67, '2000-03-17 12:23:51', '2011-10-23 06:01:47', 46.33),
(34, 68, '1986-10-06 11:07:40', '2010-12-01 03:52:33', 72.52),
(35, 73, '1999-04-23 00:51:09', '1988-10-25 03:41:22', 95.31),
(36, 69, '2008-06-14 01:18:36', '2008-04-01 07:56:54', 23.53),
(37, 70, '2008-09-14 01:37:40', '2000-11-14 11:12:22', 95.82),
(38, 63, '1972-10-27 07:44:46', '1975-05-01 22:18:19', 11.10),
(39, 67, '1980-03-27 14:44:18', '2006-01-18 19:56:18', 24.57),
(40, 76, '2012-12-06 09:46:15', '2010-11-19 15:55:42', 88.68),
(41, 64, '1974-12-30 04:32:50', '1972-11-27 01:15:11', 83.26),
(42, 66, '1981-04-25 05:57:10', '2012-11-09 17:02:55', 68.01),
(43, 73, '2008-09-03 17:34:10', '1974-08-20 09:34:04', 24.53),
(44, 73, '1983-10-11 08:57:07', '2008-04-21 21:29:26', 89.03),
(45, 69, '2024-05-04 10:47:29', '1994-08-16 21:08:27', 91.72),
(46, 70, '1975-08-27 16:06:17', '2019-01-27 07:40:36', 84.25),
(47, 66, '1996-02-08 05:08:54', '1982-10-06 01:04:17', 61.69),
(48, 69, '1979-06-20 08:29:37', '1971-06-12 03:00:33', 7.45),
(49, 76, '1978-10-18 23:40:46', '1986-01-02 19:34:24', 59.30),
(50, 66, '2011-12-14 10:07:48', '2003-06-15 22:32:19', 70.84);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `order_detail_id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`order_detail_id`, `order_id`, `created_at`, `updated_at`, `product_id`, `quantity`, `price`) VALUES
(41, 40, '1970-11-20 04:39:29', '1979-09-22 14:58:10', 42, 1, 800.02),
(42, 49, '2017-12-18 22:32:19', '2006-02-18 02:50:26', 50, 1, 800.02),
(43, 48, '2022-07-24 11:41:04', '1984-06-15 14:54:21', 50, 1, 800.02),
(44, 32, '2017-11-06 00:26:49', '1997-10-20 10:34:01', 42, 1, 800.02),
(45, 48, '1977-08-11 12:31:14', '1995-06-01 17:56:51', 42, 1, 800.02),
(46, 42, '2006-03-19 23:29:12', '1977-08-19 23:06:09', 47, 1, 800.02),
(47, 50, '2016-02-21 14:52:48', '1998-11-04 06:57:27', 49, 1, 800.02),
(48, 40, '2000-10-31 12:53:48', '1980-01-19 02:01:09', 50, 1, 800.02),
(49, 39, '1981-05-13 01:51:06', '1995-04-09 13:23:39', 49, 1, 800.02),
(50, 38, '1982-06-21 21:03:32', '2010-02-19 06:00:47', 41, 1, 800.02);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 'porro', 58.29, '2006-09-18 03:22:39', '2017-08-08 23:05:51'),
(2, 'consequatur', 33.60, '2004-04-02 01:08:20', '2006-01-17 08:58:26'),
(3, 'similique', 28.46, '1992-07-25 22:43:21', '1997-04-02 00:53:46'),
(4, 'et', 34.38, '1973-06-06 21:15:00', '2005-04-03 02:57:56'),
(5, 'et', 58.97, '2014-05-19 22:24:00', '1971-10-21 04:22:23'),
(6, 'nesciunt', 92.90, '2019-03-23 12:44:39', '2022-09-30 08:48:38'),
(7, 'molestias', 77.55, '1990-08-03 08:44:46', '1981-10-24 02:35:47'),
(8, 'possimus', 22.99, '1979-05-02 04:04:30', '2021-03-28 03:21:21'),
(9, 'cupiditate', 24.37, '2013-05-12 23:41:20', '2007-05-27 11:17:32'),
(10, 'omnis', 57.72, '2006-12-10 09:42:00', '2014-07-14 12:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(10,2) NOT NULL DEFAULT '800.02',
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `created_at`, `updated_at`, `description`, `price`, `image`) VALUES
(41, 'itaque', '1973-05-01 16:58:19', '1984-08-14 08:20:42', 'Cumque ratione quam aut sed. Possimus aut ipsum eius maiores sequi consequuntur blanditiis. Expedita est corporis velit veniam.', 800.02, NULL),
(42, 'itaque', '2006-03-03 17:11:23', '2023-10-14 05:02:43', 'Aut et et modi ut perspiciatis. Eaque ipsa debitis non beatae cumque. Hic neque voluptates dolore voluptatem dolorem fugit est et. Modi nulla reiciendis quos.', 800.02, NULL),
(43, 'quis', '1977-12-22 07:20:20', '1970-11-26 19:45:35', 'Quo quidem ea sed doloribus nostrum quo officiis. Reiciendis illo culpa et necessitatibus rem cumque. Eum dolorem ea qui natus velit esse. Repudiandae quisquam omnis vero. Aut iure velit consequuntur deleniti.', 800.02, NULL),
(44, 'animi', '2005-06-21 18:47:16', '1972-07-05 11:20:13', 'Dolores reiciendis culpa qui est ab. Adipisci consequuntur dignissimos ipsa perspiciatis aliquam unde. Et debitis ut impedit qui expedita consequatur consequatur. Porro officia libero doloribus.', 800.02, NULL),
(45, 'corporis', '1975-03-30 01:06:10', '1998-03-21 02:54:57', 'Earum ullam aut fugiat et nemo. Neque modi repellat occaecati deleniti ipsum eius vel. Qui dolores aut commodi. Molestias sint eum cumque pariatur ea tempore veniam.', 800.02, NULL),
(46, 'quo', '1989-08-29 05:15:53', '2020-10-09 22:46:03', 'Inventore nobis laboriosam reprehenderit quae repellat fuga nam maxime. Sint minus at ipsa maiores est voluptas autem. Consectetur et quis dolores sed voluptatem.', 800.02, NULL),
(47, 'animi', '1986-03-31 06:25:06', '2008-03-16 16:46:29', 'Ullam consequuntur id aut et neque distinctio enim nemo. Dicta sit ut in numquam. Inventore magni aut ea harum qui doloremque. Ad deleniti sit aperiam laborum quaerat delectus.', 800.02, NULL),
(48, 'maiores', '1979-03-17 00:39:29', '1992-10-19 23:15:10', 'Qui porro itaque reiciendis totam omnis. Rerum asperiores deserunt aut et. Amet provident expedita porro est. Cupiditate in rerum inventore accusamus beatae fugiat assumenda.', 800.02, NULL),
(49, 'minima', '1980-03-07 00:14:23', '2015-01-12 22:08:35', 'Molestias occaecati tempore magnam qui aliquid non. Qui repellendus et consequatur quos temporibus incidunt ducimus. Atque eligendi dolores labore vel.', 800.02, NULL),
(50, 'voluptatibus', '1975-07-28 16:44:38', '1984-09-30 13:27:00', 'Occaecati tenetur corrupti eius eum dicta nam odio. Libero dolores rerum aut non sunt dolores nesciunt. Quisquam voluptatem et repellendus aut modi. Quis fugiat occaecati illo qui dolores.', 800.02, NULL),
(51, 'admin lâm', '2024-07-22 08:38:56', '2024-07-22 08:38:56', '12d', 1994.00, 'cc'),
(52, 'admin lâmmm', '2024-07-22 09:03:12', '2024-07-22 09:03:12', '23653', 203.00, 'imageProduct/1721638992.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_comment`
--

CREATE TABLE `product_comment` (
  `id` int UNSIGNED NOT NULL,
  `userId` int UNSIGNED NOT NULL,
  `productId` int UNSIGNED NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '1: Admin, 2: User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `address`, `phone`, `role`) VALUES
(62, 'Dax Rowe PhD', 'thanhlam200496@gmail.com', '2024-07-19 08:36:05', '$2y$10$t4aaHu7kOSuMP32tjgeQGODcxlm.A1vCUZgNLR2aoKaoMhiFsu8o.', 'WtdZI4jHjjY9Uv2jYv38FvcPX0OCbtsmxSTFexs8o6QA8h6WfAAl8PLzQbpZ', '2024-07-19 08:36:05', '2024-07-19 08:36:05', '242 Ernser Way\nTrantowland, AZ 43515', '+1-571-509-8456', '1'),
(63, 'Prof. Mariela Crona', 'kris.ilene@example.com', '2024-07-19 08:36:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rj2cTseTsk', '2024-07-19 08:36:05', '2024-07-19 08:36:05', '591 Ortiz Park Apt. 349\nLegrosside, AZ 39602', '724.667.1581', '2'),
(64, 'Dr. Alejandra Dickinson Sr.', 'clara.homenick@example.com', '2024-07-19 08:36:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0htR162tzb', '2024-07-19 08:36:05', '2024-07-19 08:36:05', '93832 Jayden Pine\nJastshire, MN 99215-8087', '406-908-1628', '2'),
(65, 'Casper Daugherty', 'jessie55@example.net', '2024-07-19 08:36:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hiCOXTdz7b', '2024-07-19 08:36:05', '2024-07-19 08:36:05', '38168 George Skyway\nIdellaview, CO 96294', '985-490-9802', '2'),
(66, 'Carmelo O\'Kon', 'mckenzie.payton@example.com', '2024-07-19 08:36:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YNbO206wK7', '2024-07-19 08:36:05', '2024-07-19 08:36:05', '10702 Little Turnpike\nMinnietown, CA 95840', '(210) 288-9824', '2'),
(67, 'Stevie Wolff', 'koelpin.jose@example.org', '2024-07-19 08:36:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AmdcwLsEOV', '2024-07-19 08:36:05', '2024-07-19 08:36:05', '937 King Square\nBrandtshire, NC 55955', '769-241-0561', '2'),
(68, 'Dr. Clovis Macejkovic', 'gerlach.vergie@example.net', '2024-07-19 08:36:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JGKZUVGj4i', '2024-07-19 08:36:05', '2024-07-19 08:36:05', '75441 Wehner Coves\nNorth Franciscohaven, TX 83182', '458-206-1145', '2'),
(69, 'Maye Leffler', 'ella73@example.net', '2024-07-19 08:36:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZcgvgWfK0X', '2024-07-19 08:36:05', '2024-07-19 08:36:05', '45765 Vandervort Rest\nMarvinport, NV 28383-1976', '+1 (325) 538-1113', '2'),
(70, 'Oma Wintheiser', 'aankunding@example.org', '2024-07-19 08:36:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ut3CfeIVDK', '2024-07-19 08:36:05', '2024-07-19 08:36:05', '659 Cremin Mews\nTurcottechester, MS 26031-5144', '+15807521630', '2'),
(71, 'Lue Mayer', 'diana01@example.com', '2024-07-19 08:36:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eW7JVeukMS', '2024-07-19 08:36:05', '2024-07-19 08:36:05', '96883 Koss Creek Apt. 037\nPort Mayrashire, PA 87006-5163', '(239) 798-1500', '2'),
(72, 'Isidro Bartell', 'wkling@example.org', '2024-07-19 08:36:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8Hm8PO9Om7', '2024-07-19 08:36:05', '2024-07-19 08:36:05', '19916 Julian Cliff\nBogisichtown, CO 05257', '+1-936-773-6435', '2'),
(73, 'Burley Metz', 'nkub@example.net', '2024-07-19 08:36:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uS6XYQQBAr', '2024-07-19 08:36:05', '2024-07-19 08:36:05', '72183 Anahi Center Suite 860\nNew Zane, AR 62383', '1-908-389-9645', '2'),
(74, 'Oleta Schmeler', 'vritchie@example.com', '2024-07-19 08:36:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ho0dpEZoHV', '2024-07-19 08:36:05', '2024-07-19 08:36:05', '6586 Andrew Islands Suite 032\nWest Evanbury, ND 47852', '+1-302-868-0260', '2'),
(75, 'Sarina Ratke DVM', 'daphne06@example.net', '2024-07-19 08:36:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Wu2lWBsru4', '2024-07-19 08:36:05', '2024-07-19 08:36:05', '1930 Britney Lights\nEast Eddie, LA 89260', '1-305-274-3943', '2'),
(76, 'Ms. Wanda Blanda', 'justyn18@example.com', '2024-07-19 08:36:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UjoiBzQESf', '2024-07-19 08:36:05', '2024-07-19 08:36:05', '8568 Haley Alley\nNew Arveltown, DE 86094', '(352) 569-5706', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `orders_detail_order_id_foreign` (`order_id`),
  ADD KEY `orders_detail_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_comment_userid_foreign` (`userId`),
  ADD KEY `product_comment_productid_foreign` (`productId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `order_detail_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_comment`
--
ALTER TABLE `product_comment`
  ADD CONSTRAINT `product_comment_productid_foreign` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_comment_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
