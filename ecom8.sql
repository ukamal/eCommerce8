-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 08:22 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom8`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutuses`
--

CREATE TABLE `aboutuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutuses`
--

INSERT INTO `aboutuses` (`id`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, NULL, '2021-08-14 07:10:44', '2021-08-14 07:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bangladeshi', 1, NULL, '2021-08-14 07:15:59', '2021-08-14 07:15:59'),
(2, 'Indian', 1, NULL, '2021-08-14 07:16:09', '2021-08-14 07:16:09'),
(3, 'Malaysian', 1, NULL, '2021-08-14 07:16:17', '2021-08-14 07:16:17'),
(4, 'Japanizes', 1, NULL, '2021-08-14 07:17:27', '2021-08-14 07:17:27'),
(5, 'USA', 1, NULL, '2021-08-14 07:17:45', '2021-08-14 07:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Category 1', 1, NULL, '2021-08-14 07:14:08', '2021-08-14 07:14:08'),
(2, 'Category 2', 1, NULL, '2021-08-14 07:14:19', '2021-08-14 07:14:19'),
(3, 'Category 3', 1, NULL, '2021-08-14 07:14:28', '2021-08-14 07:14:28'),
(4, 'Category 4', 1, NULL, '2021-08-14 07:14:37', '2021-08-14 07:14:37'),
(5, 'Category 5', 1, NULL, '2021-08-14 07:14:46', '2021-08-14 07:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'White', 1, NULL, '2021-08-14 07:18:30', '2021-08-14 07:18:30'),
(2, 'Black', 1, NULL, '2021-08-14 07:18:43', '2021-08-14 07:18:43'),
(3, 'Yellow', 1, NULL, '2021-08-14 07:18:51', '2021-08-14 07:18:51'),
(4, 'Green', 1, NULL, '2021-08-14 07:19:01', '2021-08-14 07:19:01'),
(5, 'Blue', 1, NULL, '2021-08-14 07:19:12', '2021-08-14 07:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '202108131358205982695_1291645574570693_3508462694272701567_n.jpg', 1, NULL, '2021-08-13 07:58:49', '2021-08-13 07:58:49');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_03_120649_create_brands_table', 1),
(5, '2021_07_03_122552_create_logos_table', 1),
(6, '2021_07_03_122901_create_sliders_table', 1),
(7, '2021_07_03_123035_create_contacts_table', 1),
(8, '2021_07_03_123148_create_aboutuses_table', 1),
(9, '2021_07_03_123302_create_categories_table', 1),
(10, '2021_07_04_074225_create_colors_table', 1),
(11, '2021_07_04_125832_create_sizes_table', 1),
(12, '2021_07_04_173053_create_products_table', 1),
(13, '2021_07_04_173352_create_product_sizes_table', 1),
(14, '2021_07_04_173449_create_product_colors_table', 1),
(15, '2021_07_04_173651_create_product_sub_images_table', 1),
(16, '2021_07_16_164829_create_socials_table', 1),
(17, '2021_08_15_070342_create_shippings_table', 2),
(18, '2021_08_15_070715_create_payments_table', 2),
(19, '2021_08_15_070732_create_orders_table', 2),
(20, '2021_08_15_070758_create_order_details_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user_id=customer_id',
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `order_total` int(11) NOT NULL,
  `stutas` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending and 1=approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_id`, `payment_id`, `order_no`, `order_total`, `stutas`, `created_at`, `updated_at`) VALUES
(2, 2, 5, 7, 1, 150, 0, '2021-08-17 03:51:59', '2021-08-17 03:51:59'),
(3, 2, 6, 8, 2, 280, 0, '2021-08-18 00:46:21', '2021-08-18 00:46:21'),
(4, 2, 6, 9, 3, 0, 0, '2021-08-18 06:09:35', '2021-08-18 06:09:35'),
(5, 2, 6, 10, 4, 140, 0, '2021-08-18 06:10:21', '2021-08-18 06:10:21'),
(6, 2, 6, 11, 5, 140, 0, '2021-08-18 07:47:13', '2021-08-18 07:47:13'),
(7, 3, 8, 12, 6, 70, 1, '2021-08-19 01:26:20', '2021-08-19 01:26:20'),
(8, 2, 9, 13, 7, 140, 0, '2021-08-19 23:38:37', '2021-08-19 23:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `color_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 4, 1, 2, '2021-08-17 03:51:59', '2021-08-17 03:51:59'),
(2, 3, 1, 2, 2, 2, '2021-08-18 00:46:21', '2021-08-18 00:46:21'),
(3, 3, 2, 3, 1, 2, '2021-08-18 00:46:21', '2021-08-18 00:46:21'),
(4, 5, 1, 2, 1, 2, '2021-08-18 06:10:21', '2021-08-18 06:10:21'),
(5, 6, 2, 2, 1, 2, '2021-08-18 07:47:13', '2021-08-18 07:47:13'),
(6, 7, 1, 2, 1, 1, '2021-08-19 01:26:20', '2021-08-19 01:26:20'),
(7, 8, 1, 2, 1, 2, '2021-08-19 23:38:37', '2021-08-19 23:38:37');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payent_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payent_method`, `transaction_no`, `created_at`, `updated_at`) VALUES
(7, 'Hand Cash', NULL, '2021-08-17 03:51:59', '2021-08-17 03:51:59'),
(8, 'Hand Cash', NULL, '2021-08-18 00:46:21', '2021-08-18 00:46:21'),
(9, 'Hand Cash', NULL, '2021-08-18 06:09:35', '2021-08-18 06:09:35'),
(10, 'Hand Cash', NULL, '2021-08-18 06:10:21', '2021-08-18 06:10:21'),
(11, 'Bkash', '012', '2021-08-18 07:47:13', '2021-08-18 07:47:13'),
(12, 'Bkash', '0123', '2021-08-19 01:26:20', '2021-08-19 01:26:20'),
(13, 'Bkash', '012345', '2021-08-19 23:38:37', '2021-08-19 23:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `slug`, `price`, `short_desc`, `long_desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Napa', 'napa', 70, 'Lorem Ipsum is simply a dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply a dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '202108141337Napa-500-480x480.jpg', '2021-08-14 07:37:15', '2021-08-14 07:37:15'),
(2, 1, 1, 'Ace Tablet', 'ace-tablet', 70, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '202108141341ACE-PARACETAMOL-500_n.jpg.crdownload', '2021-08-14 07:41:56', '2021-08-14 07:41:56'),
(3, 2, 2, 'Tamen Tablet', 'tamen-tablet', 75, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '202108141347Tamen-Ultra.jpg', '2021-08-14 07:47:18', '2021-08-14 07:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-08-14 07:37:15', '2021-08-14 07:37:15'),
(2, 1, 3, '2021-08-14 07:37:15', '2021-08-14 07:37:15'),
(3, 2, 2, '2021-08-14 07:41:56', '2021-08-14 07:41:56'),
(4, 2, 3, '2021-08-14 07:41:56', '2021-08-14 07:41:56'),
(5, 3, 4, '2021-08-14 07:47:18', '2021-08-14 07:47:18'),
(6, 3, 5, '2021-08-14 07:47:18', '2021-08-14 07:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-08-14 07:37:15', '2021-08-14 07:37:15'),
(2, 1, 2, '2021-08-14 07:37:15', '2021-08-14 07:37:15'),
(3, 2, 1, '2021-08-14 07:41:56', '2021-08-14 07:41:56'),
(4, 2, 2, '2021-08-14 07:41:56', '2021-08-14 07:41:56'),
(5, 2, 3, '2021-08-14 07:41:56', '2021-08-14 07:41:56'),
(6, 3, 1, '2021-08-14 07:47:18', '2021-08-14 07:47:18'),
(7, 3, 3, '2021-08-14 07:47:18', '2021-08-14 07:47:18'),
(8, 3, 4, '2021-08-14 07:47:18', '2021-08-14 07:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_images`
--

CREATE TABLE `product_sub_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sub_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_images`
--

INSERT INTO `product_sub_images` (`id`, `product_id`, `sub_image`, `created_at`, `updated_at`) VALUES
(1, 1, '202108141337Napa-Extend-Tablet-665-mg.jpg', '2021-08-14 07:37:15', '2021-08-14 07:37:15'),
(2, 1, '202108141337Napa-Extra-1.jpg', '2021-08-14 07:37:15', '2021-08-14 07:37:15'),
(3, 2, '202108141341Ace-Plus-Tablet-1-Strip-500-mg65-mg.jpg', '2021-08-14 07:41:56', '2021-08-14 07:41:56'),
(4, 2, '202108141341Ace-XR.jpg', '2021-08-14 07:41:56', '2021-08-14 07:41:56'),
(5, 3, '202108141347Tamen+Turbo.png', '2021-08-14 07:47:18', '2021-08-14 07:47:18'),
(6, 3, '202108141347Tamen-XR.jpg', '2021-08-14 07:47:18', '2021-08-14 07:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user_id=customer_id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `user_id`, `name`, `email`, `mobile_no`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, 'test', 'test@gmail.com', '01868799280', 'Bhulta,bhulta,Rupganj,Narayanganj', '2021-08-16 10:25:03', '2021-08-16 10:25:03'),
(2, 2, 'kamal hossen', 'kamal@gmail.com', '0858799580', 'Bhulta,bhulta,Rupganj,Narayanganj', '2021-08-16 10:58:29', '2021-08-16 10:58:29'),
(3, 2, 'kamal hossen', 'kamal@gmail.com', '0858799580', 'Bhulta,bhulta,Rupganj,Narayanganj', '2021-08-16 10:59:14', '2021-08-16 10:59:14'),
(4, 2, 'Kamal Hossen', 'flkamal2016@gmail.com', '01868799280', 'Bhulta,bhulta,Rupganj,Narayanganj', '2021-08-16 11:12:01', '2021-08-16 11:12:01'),
(5, 2, 'Tamen Tablet', 'tamen@gmail.com', '01858466250', 'Bhulta,bhulta,Rupganj,Narayanganj', '2021-08-17 02:11:29', '2021-08-17 02:11:29'),
(6, 2, 'test', 'test@gmail.com', '01868799280', 'Bhulta,bhulta,Rupganj,Narayanganj', '2021-08-18 00:45:55', '2021-08-18 00:45:55'),
(7, 2, 'petar', 'petar@gmail.com', '018569857412', 'dhaka,usa', '2021-08-18 06:07:25', '2021-08-18 06:07:25'),
(8, 3, 'test', 'test@gmail.com', '01868799280', 'Bhulta,bhulta,Rupganj,Narayanganj', '2021-08-19 01:25:57', '2021-08-19 01:25:57'),
(9, 2, 'Friday', 'flkamal2016@gmail.com', '01868799280', 'Bhulta,bhulta,Rupganj,Narayanganj', '2021-08-19 23:38:25', '2021-08-19 23:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'S', 1, NULL, '2021-08-14 07:21:12', '2021-08-14 07:21:12'),
(2, 'M', 1, NULL, '2021-08-14 07:21:20', '2021-08-14 07:21:20'),
(3, 'L', 1, NULL, '2021-08-14 07:21:27', '2021-08-14 07:21:27'),
(4, 'XL', 1, NULL, '2021-08-14 07:21:34', '2021-08-14 07:21:34'),
(5, 'XXL', 1, NULL, '2021-08-14 07:21:41', '2021-08-14 07:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `short_title`, `long_title`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '202108141217fff.png&text=eCommerce', 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, 1, '2021-08-14 06:13:16', '2021-08-14 06:17:14'),
(2, '202108141222fff.png&text=corporate+business', 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, NULL, '2021-08-14 06:22:12', '2021-08-14 06:22:12'),
(3, '202108141223fff.png&text=Garments+business', 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, NULL, '2021-08-14 06:23:02', '2021-08-14 06:23:02'),
(4, '202108141223fff.png&text=Medicine+business', 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, NULL, '2021-08-14 06:23:27', '2021-08-14 06:23:27'),
(5, '202108141223fff.png&text=software+business', 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, 1, '2021-08-14 06:23:53', '2021-08-14 06:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `address`, `mobile`, `email`, `facebook`, `twitter`, `youtube`, `linkedin`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bhulta,bhulta,Rupganj,Narayanganj', '01868000000', 'dummy@gmail.com', 'www.facebook.com', 'https://twitter.com', 'https://www.youtube.com/', 'https://www.linkedin.com', NULL, NULL, '2021-08-13 08:27:22', '2021-08-13 08:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `rule`, `email`, `provider_id`, `avatar`, `email_verified_at`, `password`, `mobile`, `code`, `address`, `gender`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'super_admin', 'admin@gmail.com', NULL, NULL, NULL, '$2y$10$42W5Yv8QFDirNV5zgIdup.VKl/1aVBFWk3UHlmZOCitI7RtWTCt6C', '01805255230', NULL, 'Narayanganj, Bangladesh', 'Male', '202108131357admin.png', 1, NULL, '2021-08-13 07:45:50', '2021-08-13 07:57:57'),
(2, 'customer', 'Md.Kamal Hossen', NULL, 'flkamal2016@gmail.com', NULL, NULL, NULL, '$2y$10$5XrgyhjVZb2HsNrofs1pc.hxYiCVUaWpPzxeeOTGzoGIPlWhwX/jS', '01868799280', '9505', 'Dhaka,Narayanganj,Rupganj', 'Male', '202108141540unnamed.png', 1, NULL, '2021-08-14 09:38:00', '2021-08-14 10:21:15'),
(3, 'customer', 'shuvo', NULL, 'php7version@gmail.com', NULL, NULL, NULL, '$2y$10$Xohrn7MRVBrBfR914Mp7DuRco9tgUgbYvD9ELwCGw0GLYAocRDPbK', '01858799280', '2764', NULL, NULL, NULL, 1, NULL, '2021-08-19 01:23:57', '2021-08-19 01:25:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutuses`
--
ALTER TABLE `aboutuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_name_unique` (`name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_name_unique` (`name`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
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
-- AUTO_INCREMENT for table `aboutuses`
--
ALTER TABLE `aboutuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
