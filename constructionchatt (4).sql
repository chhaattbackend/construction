-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 02:50 PM
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
-- Database: `constructionchatt`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`) VALUES
(1, 'Color'),
(2, 'Whiteness');

-- --------------------------------------------------------

--
-- Table structure for table `a_categories`
--

CREATE TABLE `a_categories` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `a_categories`
--

INSERT INTO `a_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Construction Material', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Lucky Cement'),
(2, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `b_categories`
--

CREATE TABLE `b_categories` (
  `id` int(11) NOT NULL,
  `a_category_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `b_categories`
--

INSERT INTO `b_categories` (`id`, `a_category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cement', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Karachi1', '2021-01-19 13:44:04', '2021-01-19 13:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pakistan1', '2021-01-19 13:44:16', '2021-01-19 13:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `phone`, `email`, `longitude`, `latitude`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Yasir', '03110230456', 'yasirpervez07@gmail.com', 1221, 23323, '5.jpg', '2021-01-19 12:52:01', '2021-01-19 12:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `a_category_id` int(11) DEFAULT NULL,
  `b_category_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `a_category_id`, `b_category_id`, `name`, `description`, `price`, `quantity`, `thumbnail`, `image`, `unit_id`) VALUES
(1, 1, 1, 'Portland Pozzolana Cement', 'Since the time of our inception, we have been providing a wide array of Portland Pozzolana Cement. Offered Portland Pozzolana Cement is made by making use of top quality material and cutting edge technology, which ensures perfection in the end product. This provided Portland Pozzolana Cement is much well-liked among our respected patrons for its cost effectiveness and optimum quality.', 500, 600, NULL, NULL, NULL),
(2, 1, 1, 'Ireland Pozzolana Cement', 'Since the time of our inception, we have been providing a wide array of Portland Pozzolana Cement. Offered Portland Pozzolana Cement is made by making use of top quality material and cutting edge technology, which ensures perfection in the end product. This provided Portland Pozzolana Cement is much well-liked among our respected patrons for its cost effectiveness and optimum quality.', 500, 600, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `attribute_id` int(11) DEFAULT NULL,
  `desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `store_id`, `product_id`, `attribute_id`, `desc`) VALUES
(1, 1, 1, 1, 'White'),
(2, 1, 1, 2, '89%'),
(3, 1, 2, 1, 'White,Black'),
(4, 1, 2, 2, '75%'),
(5, 1, 1, 1, 'poppopoo');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `overview` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `specification` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `overview`, `description`, `specification`, `created_at`, `updated_at`) VALUES
(1, 2, 'ok', NULL, 'ok', '2021-01-19 13:26:01', '2021-01-19 13:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `user_id`, `product_id`, `store_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'ok', '2021-01-19 13:30:46', '2021-01-19 13:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_type_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_type_id`, `name`, `description`, `price`, `image`, `thumbnail`, `unit_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Contractor', 'Contractor', 500, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'Labor', 'Labor description', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Construction Services', NULL, NULL),
(2, 'Labour Services', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `nic` varchar(50) DEFAULT NULL,
  `ntn` varchar(50) DEFAULT NULL,
  `open_timing` varchar(50) DEFAULT NULL,
  `close_timing` varchar(50) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `user_id`, `city_id`, `name`, `email`, `phone`, `mobile`, `address`, `status`, `nic`, `ntn`, `open_timing`, `close_timing`, `image`, `thumbnail`, `featured`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Varsha Industries', 'varisha@gmail.com', '021-35555667', '032325252525', 'test address', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store_products`
--

CREATE TABLE `store_products` (
  `id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `store_price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_products`
--

INSERT INTO `store_products` (`id`, `store_id`, `product_id`, `brand_id`, `store_price`, `qty`, `status`, `unit_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 700, 600, 1, 1, NULL, '2021-01-19 13:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `store_services`
--

CREATE TABLE `store_services` (
  `id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `store_price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_services`
--

INSERT INTO `store_services` (`id`, `store_id`, `service_id`, `store_price`, `qty`, `status`, `unit_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 800, 1, 1, 1, NULL, NULL),
(2, 1, 2, 500, 1, 1, 1, NULL, NULL),
(1, 1, 1, 800, 1, 1, 1, NULL, NULL),
(2, 1, 2, 500, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `contact` text DEFAULT NULL,
  `nic` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `user_id`, `store_id`, `name`, `email`, `contact`, `nic`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Saleem', 'saleem@gmail.com', '03225252525', '056406466165', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`) VALUES
(1, 'Kilograms'),
(2, 'Grams');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'saleem', 'saleem@gmail.com', NULL, 'saleem@gmail.com', NULL, NULL, NULL),
(2, 'Yasir', 'yasirpervez07@gmail.com', NULL, '$2y$10$yTMQ/Nknp8BD4HGnk61ynemAXrtTiWMAFSDVhXhWXYybGckSZ8iCi', NULL, '2021-01-16 08:17:01', '2021-01-16 08:17:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_categories`
--
ALTER TABLE `a_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `b_categories`
--
ALTER TABLE `b_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_products`
--
ALTER TABLE `store_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `a_categories`
--
ALTER TABLE `a_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `b_categories`
--
ALTER TABLE `b_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store_products`
--
ALTER TABLE `store_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
