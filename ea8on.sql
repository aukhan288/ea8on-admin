-- phpMyAdmin SQL Dump
-- version 5.1.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 12, 2025 at 09:42 AM
-- Server version: 8.0.39-30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbptojrz5gumlu`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `home_number` text,
  `society` text,
  `area` text,
  `city` text,
  `pincode` int DEFAULT '441904',
  `landmark` text,
  `type` text,
  `status` int NOT NULL DEFAULT '1' COMMENT ' 1 for active, 0for inactive',
  `address_name` text,
  `is_delete` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `home_number`, `society`, `area`, `city`, `pincode`, `landmark`, `type`, `status`, `address_name`, `is_delete`) VALUES
(1, 2, 'B17', NULL, 'Gulistan e Iqbal', 'Karachi ', 75400, 'Dr Eisa clinical laboratory ', 'Gulshan e Iqbal block 13a ', 0, 'Asadullah', 0),
(2, 2, 'B17', NULL, 'Gulistan e Iqbal', 'Karachi ', 75400, 'Dr Eisa clinical laboratory ', 'Gulshan e Iqbal block 13a ', 1, 'Asadullah', 0),
(3, 2, 'B17', NULL, 'Gulistan e Iqbal', 'Karachi ', 75400, 'Dr Eisa clinical laboratory ', 'Gulshan e Iqbal block 13a ', 0, 'Asadullah', 0),
(4, 5, 'Or 13', NULL, 'Gulistan e Iqbal', 'Karahi ', 75400, 'Nepa', 'Julshan Iqbal block 9', 1, 'Syed aun', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `fname` text,
  `lname` text,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `username`, `password`) VALUES
(1, 'Admin', 'Name', 'admin@gmail.com', '$2a$12$QiKjlBHPeHJ4OcrdcHQTN.sNVTNsCTtTp2y5mTmEYOXTRhMskSvaK');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `fname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `delivery_charge` float NOT NULL,
  `is_active` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `delivery_charge`, `is_active`) VALUES
(1, 'Gulistan e Iqbal', 30, '1');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int NOT NULL,
  `img` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 for header, 1 for deal of the day, 2 for home, 3 for footer',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `img`, `status`, `created_at`, `updated_at`) VALUES
(27, 'storage/images/vDQ4HDn5HQ5k9KXqdVkMenDqkTEL2NtqLxMof4K1.webp', 1, '2024-12-06 09:45:01', '2024-12-06 09:45:01'),
(28, 'storage/images/yFPmvkKfWjCgjMwBtemjXCXh6KrKgC8RMHgkSVVF.webp', 1, '2024-12-06 09:45:11', '2024-12-06 09:45:11'),
(29, 'storage/images/Tua7PXhMIX8DAzADxvsh5QLRtpMJUFxc3u84f17W.webp', 1, '2024-12-06 09:45:23', '2024-12-06 09:45:23'),
(30, 'storage/images/6Yg8eghS7TxGKLqZ20dpeTB9sL6KtGdUmwgG40r8.webp', 1, '2024-12-06 09:45:32', '2024-12-06 09:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category_img` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category_img_1` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `category_img_2` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `category_img_3` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_img`, `category_img_1`, `category_img_2`, `category_img_3`, `created_at`, `updated_at`) VALUES
(10, 'Beef', 'storage/images/ns63MSps30rZh5rXWwrC1rkLDU9spMnAQaJAirng.png', NULL, NULL, NULL, '2024-12-04 09:50:36', '2024-12-04 09:50:36'),
(11, 'FRIED CHICKEN', 'storage/images/q8g7hFO8TYcwEIBT8kIq9UN2g23bUkD1MSR0E54o.webp', NULL, NULL, NULL, '2024-12-06 05:27:49', '2024-12-06 05:27:49'),
(12, 'GRILLED CHICKEN', 'storage/images/KTKZkJenzZESVIlBO2vgqsKo3y2Ka0trcSSsq3l2.webp', NULL, NULL, NULL, '2024-12-06 05:30:34', '2024-12-06 05:30:34'),
(13, 'DISSERT & SHAKES', 'storage/images/N8zuVRGyS6eg3CtmMJWMEbTe2UTvUM6ZW4npqi96.webp', NULL, NULL, NULL, '2024-12-06 05:31:44', '2024-12-06 05:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `contact_setting`
--

CREATE TABLE `contact_setting` (
  `id` int NOT NULL,
  `title` text,
  `description` text,
  `link` text,
  `icon` text,
  `is_active` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_setting`
--

INSERT INTO `contact_setting` (`id`, `title`, `description`, `link`, `icon`, `is_active`) VALUES
(1, 'Meet Us @', 'Admin Address', 'https://www.google.com/maps/place/Shree+Rushbh+Super+Shop/@21.1648901,79.6536492,19.67z/data=!4m9!1m2!2m1!1sRishabh+Super+Shopee!3m5!1s0x3a2b3f1ba02c032f:0x4ec3068c20c967d6!8m2!3d21.1650428!4d79.6539997!15sChRSaXNoYWJoIFN1cGVyIFNob3BlZZIBBXN0b3Jl', 'map-marker-radius', 1),
(2, 'Call', '+918888888888', 'tel:+919107797979', 'phone', 1),
(3, 'Whatsapp', '+91 8888888888', 'whatsapp://send?text=Hello Shree Rushabh Super Shopee&phone=919107797979', 'whatsapp', 1),
(4, 'Email', 'mymail@gmail.com', 'mailto:rishabhsupershopee@gmail.com', 'mail', 1),
(5, 'Website', 'https://yourdomain.co.in', 'https://therishabhgroup.co.in', 'web', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL COMMENT '0 for All user, other than 0 for specific user	',
  `coupon_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_multitimes` int NOT NULL COMMENT 'single = 0, multi = 1',
  `date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'coupon_code',
  `status` int NOT NULL DEFAULT '1',
  `coupon_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_order_amount` int NOT NULL,
  `is_delete` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `user_id`, `coupon_img`, `is_multitimes`, `date`, `description`, `value`, `coupon_code`, `status`, `coupon_title`, `min_order_amount`, `is_delete`) VALUES
(1, 2, 'uploads/coupon/coupon_1732099625.webp', 0, '2024-11-21', 'dfd', '50', 'PHR8T151', 1, 'discount', 1, 0),
(2, 2, 'uploads/coupon/coupon_1732100209.webp', 0, '2024-11-21', 'This is a long coupon description that will be truncated.', '150', 'UEPRURRX', 1, 'offer', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT '0',
  `coupon_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_multitimes` int NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `coupon_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_order_amount` int NOT NULL,
  `is_delete` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boys`
--

CREATE TABLE `delivery_boys` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_key` int NOT NULL,
  `aid` int NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `a_status` int NOT NULL DEFAULT '1',
  `imgpath` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_delete` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_boys`
--

INSERT INTO `delivery_boys` (`id`, `name`, `mobile`, `email`, `token`, `app_key`, `aid`, `address`, `status`, `password`, `a_status`, `imgpath`, `is_delete`) VALUES
(1, 'Abbas Afridi', '3002969860', '', 'zie722xwc2', 0, 0, 'Orangi town karachi', 1, 'Admin12#', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy_notification`
--

CREATE TABLE `delivery_boy_notification` (
  `id` int NOT NULL,
  `delivery_boy_id` int NOT NULL,
  `title` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_products`
--

CREATE TABLE `favorite_products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `order_id` text,
  `user_id` int NOT NULL,
  `rate` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `order_id`, `user_id`, `rate`, `message`) VALUES
(29, '', 2, '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int NOT NULL,
  `product_id` tinyint NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `quantity` float NOT NULL DEFAULT '0',
  `unit` varchar(50) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `product_id`, `name`, `quantity`, `unit`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'mayonnaise', 1, 'ml', 25, '2024-12-07 17:52:13', NULL),
(2, 1, 'Catchup', 1, 'ml', 15, '2024-12-07 17:52:13', NULL),
(3, 43, 'Dana Cervantes', 0, '0', 881, '2024-12-10 15:03:08', '2024-12-10 15:03:08'),
(4, 43, 'Stuart Neal', 0, '0', 901, '2024-12-10 15:03:08', '2024-12-10 15:03:08'),
(5, 44, 'Dana Cervantes', 0, '0', 881, '2024-12-10 15:12:53', '2024-12-10 15:12:53'),
(6, 44, 'Stuart Neal', 0, '0', 901, '2024-12-10 15:12:53', '2024-12-10 15:12:53'),
(7, 45, 'Dana Cervantes', 0, '0', 881, '2024-12-10 15:13:19', '2024-12-10 15:13:19'),
(8, 45, 'Stuart Neal', 0, '0', 901, '2024-12-10 15:13:19', '2024-12-10 15:13:19'),
(9, 46, 'Dana Cervantes', 0, '0', 881, '2024-12-10 15:13:45', '2024-12-10 15:13:45'),
(10, 46, 'Stuart Neal', 0, '0', 901, '2024-12-10 15:13:45', '2024-12-10 15:13:45'),
(11, 47, 'Dana Cervantes', 0, '0', 881, '2024-12-10 15:15:13', '2024-12-10 15:15:13'),
(12, 47, 'Stuart Neal', 0, '0', 901, '2024-12-10 15:15:13', '2024-12-10 15:15:13'),
(13, 48, 'Dana Cervantes', 0, '0', 881, '2024-12-10 15:15:37', '2024-12-10 15:15:37'),
(14, 48, 'Stuart Neal', 0, '0', 901, '2024-12-10 15:15:37', '2024-12-10 15:15:37'),
(15, 49, 'Dana Cervantes', 0, '0', 881, '2024-12-10 15:16:13', '2024-12-10 15:16:13'),
(16, 49, 'Stuart Neal', 0, '0', 901, '2024-12-10 15:16:13', '2024-12-10 15:16:13'),
(17, 50, 'a', 0, '0', 10, '2024-12-23 10:38:59', '2024-12-23 10:38:59'),
(18, 51, 'a', 0, '0', 10, '2024-12-23 10:42:02', '2024-12-23 10:42:02'),
(19, 52, 'a', 0, '0', 10, '2024-12-23 10:43:07', '2024-12-23 10:43:07'),
(20, 53, 'Lemon Juice', 0, '0', 40, '2024-12-23 11:09:39', '2024-12-23 11:09:39'),
(21, 53, 'Olive Oil', 0, '0', 30, '2024-12-23 11:09:39', '2024-12-23 11:09:39'),
(22, 53, 'Oregano', 0, '0', 20, '2024-12-23 11:09:39', '2024-12-23 11:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_20_111444_create_personal_access_tokens_table', 1),
(5, '2024_11_19_150219_create_admins_table', 1),
(6, '2024_11_19_150847_create_wallets_table', 1),
(7, '2024_11_19_151215_create_categories_table', 1),
(8, '2024_11_19_151422_create_products_table', 1),
(9, '2024_11_19_154339_user_favorite_products', 1),
(10, '2024_11_19_154924_create_coupons_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `title` text NOT NULL,
  `img` text,
  `msg` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `title`, `img`, `msg`, `date`) VALUES
(19, 0, 'New Product Vanilla Milk Added', 'storage/thumbnails/M1ZAs2mcJpqovodcGCyus2kf6H7sxtFcBUEtOBkB.webp', 'Our Store New Product Inserted', '2024-11-22 16:12:09'),
(20, 0, 'New Product Mango Shake Added', 'storage/thumbnails/M1ZAs2mcJpqovodcGCyus2kf6H7sxtFcBUEtOBkB.webp', 'Our Store New Product Inserted', '2024-11-22 18:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_order_id` text,
  `user_id` text,
  `product_name` text,
  `product_id` text,
  `product_variation` text,
  `product_price` text,
  `delivery_date` text,
  `timesloat` text,
  `order_date` datetime DEFAULT NULL,
  `status` int DEFAULT '1',
  `quantity` text,
  `discount` text,
  `total` text,
  `payment_method_id` text,
  `delivery_boy_id` int DEFAULT '0',
  `photo` longtext,
  `delivery_boy_status` text,
  `tax` text,
  `address_id` int DEFAULT '0',
  `transaction_id` text,
  `coupon_id` int DEFAULT NULL,
  `coupon_amount` text,
  `deliveryCharge` text,
  `totalDiscountPrice` text,
  `serviceTaxAmt` text,
  `used_wallet_amount` int NOT NULL DEFAULT '0',
  `delivery_sign` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_order_id`, `user_id`, `product_name`, `product_id`, `product_variation`, `product_price`, `delivery_date`, `timesloat`, `order_date`, `status`, `quantity`, `discount`, `total`, `payment_method_id`, `delivery_boy_id`, `photo`, `delivery_boy_status`, `tax`, `address_id`, `transaction_id`, `coupon_id`, `coupon_amount`, `deliveryCharge`, `totalDiscountPrice`, `serviceTaxAmt`, `used_wallet_amount`, `delivery_sign`) VALUES
(16, '#6741a88495b91', '2', 'Vanilla Milk', '26', 'ml', '500', '', '', '2024-11-23 15:33:48', 2, '1', '20', '438', '1', 1, 'https://ea8on-admin.assignmentmentor.co.uk/uploads/product/product_1732272129.webp', NULL, '2', 2, '', 0, '0', '30', '400', '8', 0, NULL),
(17, '#6741b48ea50f0', '2', 'Mango Shake', '27', 'ml', '450', '', '', '2024-11-23 16:25:10', 1, '1', '50', '260', '1', 0, 'https://ea8on-admin.assignmentmentor.co.uk/uploads/product/product_1732279690.webp', NULL, '2', 2, '', 0, '0', '30', '225', '5', 0, NULL),
(18, '#6744951e174a1', '2', 'Vanilla Milk', '26', 'ml', '500', '', '', '2024-11-25 20:47:50', 1, '1', '20', '438', '1', 0, 'https://ea8on-admin.assignmentmentor.co.uk/uploads/product/product_1732272129.webp', NULL, '2', 2, '', 0, '0', '30', '400', '8', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `otp_verifications`
--

CREATE TABLE `otp_verifications` (
  `id` int NOT NULL,
  `mobile` text,
  `otp` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp_verifications`
--

INSERT INTO `otp_verifications` (`id`, `mobile`, `otp`, `created_at`, `updated_at`) VALUES
(27, '3002969860', 123456, '2024-12-11 13:18:04', '2024-12-11 13:18:04'),
(28, '3002969860', 123456, '2024-12-11 13:19:07', '2024-12-11 13:19:07'),
(29, '3002969860', 123456, '2024-12-11 13:19:23', '2024-12-11 13:19:23'),
(30, '3002969860', 123456, '2024-12-11 13:21:20', '2024-12-11 13:21:20'),
(31, '3002969860', 123456, '2024-12-11 13:51:31', '2024-12-11 13:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int NOT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `api_key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `secret_key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `img`, `title`, `description`, `api_key`, `secret_key`, `status`) VALUES
(1, 'dist/img/cash_on_delivery.png', 'Cash on Delivery', 'Using COD Save Service Tax', NULL, NULL, 1),
(2, 'dist/img/card.png', 'Credit/Debit Card', '100% Secure Payment', 'rzp_test_C0TL8h0Ba4OjId', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(15, 'App\\Models\\User', 6, 'Personal Access Token', 'f392f6593b2142e2b76d43fa0103e5ff40a86f59a7ea4608f2b5e18d0d2f25df', '[\"*\"]', NULL, NULL, '2024-12-12 11:39:16', '2024-12-12 11:39:16'),
(16, 'App\\Models\\User', 6, 'Personal Access Token', '6d2c26dd59c06bdc82efd15a8a4916a0123932bac570c19df799ce3ffa6feecb', '[\"*\"]', NULL, NULL, '2024-12-12 11:42:24', '2024-12-12 11:42:24'),
(17, 'App\\Models\\User', 6, 'Personal Access Token', '43cc40449d3164c134bcabf24f05320126792d09192eb56a7de721f9ae5f4183', '[\"*\"]', NULL, NULL, '2024-12-13 03:25:16', '2024-12-13 03:25:16'),
(18, 'App\\Models\\User', 6, 'Personal Access Token', '028462d95c30f88e39a92e7ad9ef8d5b56a8dbba9c85a149e766456eca7196af', '[\"*\"]', '2024-12-19 05:29:57', NULL, '2024-12-13 03:28:10', '2024-12-19 05:29:57'),
(19, 'App\\Models\\User', 6, 'Personal Access Token', '4b9396ce5ae8506d17958db3a05d8e10c67695b1fa62618058ed8fc29c3da392', '[\"*\"]', NULL, NULL, '2024-12-14 10:07:37', '2024-12-14 10:07:37'),
(20, 'App\\Models\\User', 6, 'Personal Access Token', 'a8a4e249245556ff2a44b3ca3fb6e210f82ae515e554a8d0fe290df6784cb1f0', '[\"*\"]', NULL, NULL, '2025-01-06 14:33:10', '2025-01-06 14:33:10'),
(21, 'App\\Models\\User', 6, 'Personal Access Token', '04f86aebcc7a507ce709e820e7ad450ef8f25abe66078427dc0fcf5777075bd2', '[\"*\"]', NULL, NULL, '2025-01-06 14:33:46', '2025-01-06 14:33:46'),
(22, 'App\\Models\\User', 6, 'Personal Access Token', '0075309491f84ff939d6e3c28e1b72b1f2d8755829796d3072943b924cce521e', '[\"*\"]', NULL, NULL, '2025-01-06 14:36:03', '2025-01-06 14:36:03'),
(23, 'App\\Models\\User', 6, 'Personal Access Token', 'a7df47ea522927143cfcad6c0655d96ec51904a089e8b2c315ced0af13481d41', '[\"*\"]', NULL, NULL, '2025-01-06 14:37:45', '2025-01-06 14:37:45'),
(24, 'App\\Models\\User', 6, 'Personal Access Token', '71769f10ef09b8638db88997d4e265d94a9d032e636d426b220de287386ad305', '[\"*\"]', NULL, NULL, '2025-01-06 14:39:16', '2025-01-06 14:39:16'),
(25, 'App\\Models\\User', 6, 'Personal Access Token', '55d18e4ba59bc45c275701369181adcb34e0c94df18c734368d9a390f7e0f1dd', '[\"*\"]', NULL, NULL, '2025-01-06 14:41:55', '2025-01-06 14:41:55'),
(26, 'App\\Models\\User', 6, 'Personal Access Token', 'e2072b8bf21e1c3377767733f99d0530b03a099913f28a703657aac6b42eb7cb', '[\"*\"]', NULL, NULL, '2025-01-06 14:43:03', '2025-01-06 14:43:03'),
(27, 'App\\Models\\User', 6, 'Personal Access Token', 'e60fa3ac112e68b380daddd3dc09298358af8ed80cb19536c97a49a28b2c0b7d', '[\"*\"]', NULL, NULL, '2025-01-06 14:44:40', '2025-01-06 14:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `product_name` text NOT NULL,
  `brand_name` text NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int DEFAULT NULL,
  `description` text NOT NULL,
  `variation` text NOT NULL,
  `price` text NOT NULL,
  `status` int NOT NULL,
  `stock` int NOT NULL,
  `main_img` text NOT NULL,
  `img_1` text,
  `img_2` text,
  `img_3` text,
  `tag` longtext,
  `date` datetime NOT NULL,
  `discount` int NOT NULL DEFAULT '0',
  `popular` int NOT NULL,
  `dealOfTheDay` int NOT NULL DEFAULT '0',
  `is_delete` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `brand_name`, `category_id`, `subcategory_id`, `description`, `variation`, `price`, `status`, `stock`, `main_img`, `img_1`, `img_2`, `img_3`, `tag`, `date`, `discount`, `popular`, `dealOfTheDay`, `is_delete`) VALUES
(26, 'Vanilla Milk', 'Vanilla Milk', 22, NULL, 'A creamy, indulgent milkshake blending smooth vanilla ice cream and milk for a sweet, frosty treat.', 'ml', '500', 1, 1, 'uploads/product/product_1732272129.webp', 'uploads/product/product_1732272129_p.webp', 'uploads/product/product_1732272129_p.webp', 'uploads/product/product_1732272129_p.webp', NULL, '2024-11-22 16:12:09', 20, 0, 1, 0),
(27, 'Mango Shake', 'Mango Shake', 22, NULL, 'A refreshing and creamy shake made with ripe mangoes, milk, and ice, offering a tropical, fruity delight.', 'ml', '450', 1, 1, 'uploads/product/product_1732279690.webp', 'uploads/product/product_1732279690_p.webp', '', '', NULL, '2024-11-22 18:18:10', 50, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `price` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `stock` int NOT NULL,
  `send_notification` int NOT NULL,
  `publish` int NOT NULL,
  `main_img` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img_1` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `img_2` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `img_3` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tag` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `discount` int NOT NULL DEFAULT '0',
  `deal_of_the_day` int NOT NULL DEFAULT '0',
  `is_delete` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `sub_category_id`, `description`, `price`, `stock`, `send_notification`, `publish`, `main_img`, `img_1`, `img_2`, `img_3`, `tag`, `discount`, `deal_of_the_day`, `is_delete`, `created_at`, `updated_at`) VALUES
(53, 'Full Chicken', 12, NULL, 'Juicy, flavorful full chicken marinated in a zesty peri-peri sauce, grilled to perfection for a spicy, smoky delight.', '3000', 0, 1, 1, 'storage/thumbnails/aI2CVz6SYwqcl6L2TCPQbbjeibTPiyXx06E1Z54V.webp', NULL, NULL, NULL, NULL, 10, 1, NULL, '2024-12-23 06:09:39', '2024-12-23 06:09:39'),
(54, 'Half Chicken', 12, NULL, 'Juicy, flavorful full chicken marinated in a zesty peri-peri sauce, grilled to perfection for a spicy, smoky delight.', '1500', 0, 1, 1, 'storage/thumbnails/aI2CVz6SYwqcl6L2TCPQbbjeibTPiyXx06E1Z54V.webp', NULL, NULL, NULL, NULL, 10, 1, NULL, '2024-12-23 06:09:39', '2024-12-23 06:09:39'),
(55, 'Rainbow', 13, 13, 'Rainbow Shack is a vibrant store filled with colorful, unique products.', '300', 0, 1, 1, 'storage/thumbnails/muyD6Bd3M9zkIOHqRP30bX61tPIlOpfqymvTbVHR.webp', NULL, NULL, NULL, NULL, 0, 1, NULL, '2025-01-06 16:15:28', '2025-01-06 16:15:28'),
(56, 'Alika Mcfadden', 13, 13, 'Rerum sed ut nihil d', '412', 0, 1, 1, 'storage/thumbnails/jBMH5UG9TDDtKqm8DwjqRn0KQoZOscrY2VCPe7eD.png', NULL, NULL, NULL, NULL, 0, 1, NULL, '2025-01-06 16:46:31', '2025-01-06 16:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `product_enquiry`
--

CREATE TABLE `product_enquiry` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `message` text,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_enquiry`
--

INSERT INTO `product_enquiry` (`id`, `user_id`, `message`, `date`) VALUES
(1, 2, 'B', '2024-11-04 05:17:19'),
(2, 2, 'Bur', '2024-11-04 05:18:06'),
(3, 2, 'B', '2024-11-20 03:56:54'),
(4, 2, 'Bu', '2024-11-20 03:57:03'),
(5, 2, 'Zin', '2024-11-20 04:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_flavours`
--

CREATE TABLE `product_flavours` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `stock` tinyint NOT NULL DEFAULT '0',
  `price` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_flavours`
--

INSERT INTO `product_flavours` (`id`, `product_id`, `title`, `stock`, `price`, `created_at`, `updated_at`) VALUES
(2, 49, 'Bison burgers', 1, 567, '2024-12-10 15:16:13', '2024-12-10 15:16:13'),
(3, 49, 'Chezy burgers', 1, 395, '2024-12-10 15:16:13', '2024-12-10 15:16:13'),
(4, 49, 'Crunchy burgers', 1, 911, '2024-12-10 15:16:13', '2024-12-10 15:16:13'),
(5, 52, '', 1, 10, '2024-12-23 10:43:07', '2024-12-23 10:43:07'),
(6, 53, 'Olive Oil', 1, 50, '2024-12-23 11:09:39', '2024-12-23 11:09:39'),
(7, 53, '', 1, 30, '2024-12-23 11:09:39', '2024-12-23 11:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_sides`
--

CREATE TABLE `product_sides` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `price` float NOT NULL DEFAULT '0',
  `unit` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sides`
--

INSERT INTO `product_sides` (`id`, `product_id`, `name`, `price`, `unit`, `created_at`, `updated_at`) VALUES
(9, 53, 'Pilau Rice', 10, 0, '2024-12-23 11:09:39', '2024-12-23 11:09:39'),
(10, 53, 'Spicy Rice (Biryani)', 50, 0, '2024-12-23 11:09:39', '2024-12-23 11:09:39'),
(11, 53, 'Mashed Potatoes', 60, 0, '2024-12-23 11:09:39', '2024-12-23 11:09:39'),
(12, 53, 'Mushy Peas', 60, 0, '2024-12-23 11:09:39', '2024-12-23 11:09:39'),
(13, 53, 'Corn on the Cob', 60, 0, '2024-12-23 11:09:39', '2024-12-23 11:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `title` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `stock` int NOT NULL,
  `price` double NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `title`, `stock`, `price`, `created_at`, `updated_at`) VALUES
(53, 52, 'aaaaa', 1, 10, '2024-12-23 10:43:07', '2024-12-23 10:43:07'),
(54, 53, 'Large', 1, 500, '2024-12-23 11:09:39', '2024-12-23 11:09:39'),
(55, 53, 'Extra Large', 1, 800, '2024-12-23 11:09:39', '2024-12-23 11:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `rate_order`
--

CREATE TABLE `rate_order` (
  `id` int NOT NULL,
  `order_id` text NOT NULL,
  `user_id` int NOT NULL,
  `message` text NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `read_notification`
--

CREATE TABLE `read_notification` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `notification_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `read_notification`
--

INSERT INTO `read_notification` (`id`, `user_id`, `notification_id`) VALUES
(1, 2, 7),
(2, 2, 6),
(3, 2, 5),
(4, 2, 4),
(5, 2, 3),
(6, 2, 2),
(7, 2, 9),
(8, 2, 8),
(9, 5, 9),
(10, 5, 8),
(11, 5, 7),
(12, 5, 6),
(13, 5, 5),
(14, 5, 4),
(15, 5, 3),
(16, 5, 10),
(17, 2, 10),
(18, 2, 20),
(19, 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7ihyZqbA01HXo8HFuJhx4vZVIkP6VnVJGP3mboe7', NULL, '116.90.114.177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidGg0bkxEWUp2VFY4UzltZGxxZk5mNENTd0RlSVZWN05aTEpwZGRyUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vZGV2LmVhOG9uLmNvLnVrL3B1YmxpYy9hZG1pbi9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzY6Imh0dHBzOi8vZGV2LmVhOG9uLmNvLnVrL3B1YmxpYy9hZG1pbiI7fX0=', 1735640838),
('8C2rHaSo1RK63VOhLjZWExVjKmvLDam6KaSZ6HPs', NULL, '119.73.96.137', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVE4ZUNFNFFjWFFYb3huUUcwRUlHdWsyMEYydkJVYnFpWkxhaElnZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZGV2LmVhOG9uLmNvLnVrL2FkbWluL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741771778),
('b2Hx5AfPQtmEc5bpR58tzfBuCi4aPOLNBJ7e0yvS', NULL, '119.73.96.207', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTl2MlE3dTlTSXFhRDNiR0pwTFIzcmNWZ0xQUU9PZ2RKeGtCMU5FNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vZGV2LmVhOG9uLmNvLnVrL3B1YmxpYy9hZG1pbi9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1736244840),
('IkKoCRWFBnx0L8fp0C98zGv1BKyA8Gx8MrxGGOG1', NULL, '119.73.96.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZEFISzFUeWRCd1I2OHFzaWhIRHRyWXgwVWVoYkdQTVlpUnlIWlEzaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vZGV2LmVhOG9uLmNvLnVrL3B1YmxpYy9hZG1pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NDc6Imh0dHBzOi8vZGV2LmVhOG9uLmNvLnVrL3B1YmxpYy9hZG1pbi9wcm9kdWN0cz8/Ijt9fQ==', 1736182527),
('MkwLfevw7KBVkoY4vw1DHnEg2GsTuhMpopeWSK8j', NULL, '119.73.96.207', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidU1ZOEh3UUQzVkpDcHdoTG9IZnViVzl4dUc1Rzc2bkZvSHNYVG4xMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vZGV2LmVhOG9uLmNvLnVrL3B1YmxpYyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1736410971),
('VHJJr4F5vVlAjWL5fAtE7lXfYtQNvWjzOjFBmFXJ', NULL, '34.235.48.77', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMTI1WG5qWTlyOEt3NGlOZ0NrblZRd0JDVEgzOFpaWmwyWk1mb0lOVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vZGV2LmVhOG9uLmNvLnVrL3B1YmxpYyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1736183936);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int NOT NULL,
  `privacy_policy` longtext NOT NULL,
  `about_us` longtext NOT NULL,
  `minimum_order_value` int NOT NULL,
  `timezone` text NOT NULL,
  `tax` int NOT NULL,
  `app_header_logo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `app_logo` text,
  `title` text,
  `terms_condition` text NOT NULL,
  `refund_policy` text,
  `currency` text,
  `notification_secret_key` text,
  `new_version_code` int DEFAULT NULL,
  `is_force_update` int DEFAULT NULL,
  `is_update_active` int DEFAULT '1',
  `app_maintenance` int NOT NULL DEFAULT '0',
  `primary_color` text,
  `init_wallet_amt` int NOT NULL DEFAULT '0' COMMENT 'Who Used Referral Code',
  `init_wallet_amt_referral` int NOT NULL DEFAULT '0' COMMENT 'Who Referring'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `privacy_policy`, `about_us`, `minimum_order_value`, `timezone`, `tax`, `app_header_logo`, `app_logo`, `title`, `terms_condition`, `refund_policy`, `currency`, `notification_secret_key`, `new_version_code`, `is_force_update`, `is_update_active`, `app_maintenance`, `primary_color`, `init_wallet_amt`, `init_wallet_amt_referral`) VALUES
(1, '<strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '<strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', 1, 'Asia/Kolkata', 2, 'dist/img/app_header_logo_1730475225.webp', 'dist/img/app_logo_1730475225.webp', ' ', '<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc</span>', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of de Finibus Bonorum et Malorum (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, Lorem ipsum dolor sit amet.., comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from de Finibus Bonorum et Malorum by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'INR', 'ya29.a0AeDClZCGBj4U9EWh_KXlcNixBaQlpTJaS0MfeGCqVC-6B6gV6KOss7ylV-h4f8JgKw5jd6ofVojkU5ZbR5FWiIhlJAojPuVw9PhdKN1rXGZ-T0Dhj92wNfip7jnkiJhRReIpyxXjQVBZAZBsoZGHKkgqYd_jQCcIcHFh12q8aCgYKAcQSARASFQHGX2MiQtq_szaqSqfIjSRG64ijVA0175', 10, 0, 1, 1, '', 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `img`, `updated_at`, `created_at`) VALUES
(12, 13, 'Dessert', 'storage/images/JJtMQTqalmXBxaGSoVKWlg6anEEGZYj6ugUHiK7e.webp', '2024-12-06 10:58:42', '2024-12-06 10:58:42'),
(13, 13, 'Shakes', 'storage/images/IrZGsJZna5zAxhKpCHlKhUOLCt3Y7bC0Cs6FCcKJ.webp', '2024-12-06 10:58:59', '2024-12-06 10:58:59'),
(15, 11, 'Burgers', 'storage/images/6F6EOFSk3HEpbVRZ4vJOUT78PS2oKIijLAKkyAzt.png', '2024-12-23 08:55:00', '2024-12-23 08:55:00'),
(16, 11, 'Chicken on the bone', 'storage/images/Vm8ti97gnLiamWZnPAKPmiCIIkQdYHRKcAG6yk8m.png', '2024-12-23 08:57:51', '2024-12-23 08:57:51'),
(17, 11, 'Boneless', 'storage/images/dOAk1aJRbCwOUdQWNuVil8SF9K75vt9ZycYdu39x.jpg', '2024-12-23 09:01:30', '2024-12-23 09:01:30'),
(18, 11, 'Wraps', 'storage/images/w6V4T46Mu9FwCesPzK1jVYdhtxuk1VQCaI4tEWQ9.jpg', '2024-12-23 09:12:25', '2024-12-23 09:12:25'),
(19, 10, 'Burgers', 'storage/images/t2DQmSok2m82XNr0Zc2DCvRXahOLGwECZB4OnTVH.png', '2024-12-23 09:13:43', '2024-12-23 09:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `id` int NOT NULL,
  `mintime` text NOT NULL,
  `maxtime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`id`, `mintime`, `maxtime`) VALUES
(1, '11:00', '23:00'),
(2, '10:00', '11:00');

-- --------------------------------------------------------

--
-- Table structure for table `used_coupon`
--

CREATE TABLE `used_coupon` (
  `id` int NOT NULL,
  `coupon_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `plate_form` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'web',
  `mobile` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `registration_date` datetime DEFAULT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `pin` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `app_key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ref_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `plate_form`, `mobile`, `registration_date`, `password`, `status`, `pin`, `app_key`, `user_token`, `img`, `ref_code`, `deleted_at`, `created_at`, `updated_at`, `remember_token`) VALUES
(6, 'Asadullah', NULL, 'android', '3002969860', NULL, '$2y$12$8EuMItfCIv06BaNiL0Fs6.GQQqm5Fcn1Ut7GXt5jewL2nk9pJtA5.', 1, NULL, 'djfzY8h-S-GFUCipJPY6dr:APA91bGSiEHH0zlndp4WN52YA-lbgxYvHCOmLtvYbJnDPpMdujNlhcYG81g6H8vb5P2_T3QlWBAisPlobCVKeLKOgcQ0xMF_ru4fOEjjpG96_Oi_jLKHWFY', NULL, NULL, NULL, NULL, '2024-12-11 08:49:33', '2025-01-06 14:43:03', 'NVw9sbht7sKo8YmHMWgiSzDdahciVnIfJRwsTb3GB2kTGLkaVSbpVOZG8Wm8');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `ref_user_id` int NOT NULL DEFAULT '0',
  `amount` float NOT NULL,
  `closing_amount` float NOT NULL,
  `flag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user_id`, `ref_user_id`, `amount`, `closing_amount`, `flag`, `remark`, `date`) VALUES
(1, 2, 0, 0, 0, 'not_referral', 'No Referral Code used', '2024-11-04 15:41:05'),
(2, 3, 0, 0, 0, 'not_referral', 'No Referral Code used', '2024-11-04 19:46:05'),
(3, 4, 0, 0, 0, 'not_referral', 'No Referral Code used', '2024-11-04 19:49:28'),
(4, 5, 0, 0, 0, 'not_referral', 'No Referral Code used', '2024-11-04 20:06:37'),
(5, 6, 0, 0, 0, 'not_referral', 'No Referral Code used', '2024-11-21 16:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `ref_user_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `amount` double NOT NULL,
  `closing_amount` double NOT NULL,
  `flag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_setting`
--
ALTER TABLE `contact_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy_notification`
--
ALTER TABLE `delivery_boy_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_favorite_products_product_id_foreign` (`product_id`),
  ADD KEY `user_favorite_products_user_id_foreign` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`) USING BTREE;

--
-- Indexes for table `product_enquiry`
--
ALTER TABLE `product_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_flavours`
--
ALTER TABLE `product_flavours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sides`
--
ALTER TABLE `product_sides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_order`
--
ALTER TABLE `rate_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `read_notification`
--
ALTER TABLE `read_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `used_coupon`
--
ALTER TABLE `used_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact_setting`
--
ALTER TABLE `contact_setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_boy_notification`
--
ALTER TABLE `delivery_boy_notification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_products`
--
ALTER TABLE `favorite_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `product_enquiry`
--
ALTER TABLE `product_enquiry`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_flavours`
--
ALTER TABLE `product_flavours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_sides`
--
ALTER TABLE `product_sides`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `rate_order`
--
ALTER TABLE `rate_order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `read_notification`
--
ALTER TABLE `read_notification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `used_coupon`
--
ALTER TABLE `used_coupon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD CONSTRAINT `user_favorite_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_favorite_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
