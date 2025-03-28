-- phpMyAdmin SQL Dump
-- version 5.1.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2025 at 11:33 AM
-- Server version: 8.0.39-30
-- PHP Version: 8.2.28

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
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `home_number` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `society` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `area` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `city` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `pincode` int DEFAULT '441904',
  `landmark` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `type` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `status` int NOT NULL DEFAULT '1',
  `address_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `is_delete` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `delivery_charge` double NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `banner_img` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'storage/images/xYHMBFYBUHAFRf1wrrRvtMX1f5gYMavZN2pJaR8L.jpg', 1, '2025-03-24 13:05:24', '2025-03-24 13:05:24'),
(2, 'storage/images/BdVhyJfse06RXDZZsBdtuA95AE9letXzLxdjZRXw.webp', 1, '2025-03-24 13:12:04', '2025-03-24 13:12:04'),
(3, 'storage/images/E8xayajAPfugHOIVbYtm2F66E6aFgxP8ADBNc53z.jpg', 1, '2025-03-24 13:13:07', '2025-03-24 13:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_img`, `category_img_1`, `category_img_2`, `category_img_3`, `created_at`, `updated_at`, `description`, `status`) VALUES
(1, 'BURGER', 'categories/KFFKw7oBD654U6LEq9DKdTgK0tbjor7AVzkPQsqR.jpg', 'categories/u11wJlnB5ervnyXpBCY4KL0GG3FF8J8XMtNdjZXJ.jpg', 'categories/Qj7VznoBMRj5cxhtIlOeiVtjjfYBIIXfjfrPlAYN.jpg', 'categories/bTTriqquhawamAcdCCmkgwSYv5S6W2nWNAWA6XJw.jpg', '2025-03-24 11:36:04', '2025-03-24 11:36:04', 'Delicious, juicy burgers made with fresh ingredients, served with a variety of toppings for the perfect bite every time.', 1),
(2, 'WRAPS', 'categories/QxvglJIXczgHXoNeQCyPVP7hZ8RWDJA7JhpdeiHL.jpg', 'categories/qpTpB7uL3envh6itVMM2MNiILx7UdfCkwj9YXyd0.jpg', 'categories/VzKJs77zPV7wGK6p4KMYPdHZzwok1JHfXe6G0AWc.webp', 'categories/4kgNLNB8BgKMPqHfLOWsrXI9vxdORpnJTZUtO6vu.jpg', '2025-03-24 11:56:57', '2025-03-24 11:56:57', 'Tasty, fresh wraps filled with flavorful ingredients, wrapped in soft tortillas for a perfect handheld meal on the go.', 1),
(3, 'GRILLED (STEAMED)', 'categories/UBrwHGWEvOZ6Do7rKyf4BEYzgfgJtG0BfIvaGQkl.jpg', 'categories/0msEQCsKtwWuOKpveFXLxsTFpkghW7LUBhn9Kp7Y.jpg', 'categories/1QMOCi1MSO7UCg9U8afc6dUmqodMrdqMOcTItEtb.jpg', 'categories/1iCt8JIiE52fbt8pnNEGrTOL54h81luU04n8rPTz.jpg', '2025-03-24 12:00:36', '2025-03-24 12:00:36', 'Tender, flavorful grilled or steamed dishes, cooked to perfection for a healthy and delicious meal option.', 1),
(4, 'PLATTERS', 'categories/iHWcfN2bflmBuYqiJTBjGJlBr3HpMtLbgMowNc6c.jpg', 'categories/Js8bXbSXnxcj8qXP237K5Fdc1eZuKwTBGloCMuux.jpg', 'categories/7wfglh9Ajwyp0gMd9Lmmzx13ZjA08nw9x4jmAhbF.jpg', 'categories/2g8M5a6TC0XuoOPB9H9EFWIiuoyzOun7WhCeLKhr.jpg', '2025-03-24 12:02:19', '2025-03-24 12:02:19', 'Generous platters filled with a variety of flavorful dishes, perfect for sharing and satisfying every craving in one meal.', 1),
(5, 'VARIETY MEAL', 'categories/jYSJZuSPd4Kg1AqFcNcBrlBjl9wtGRisHQ9GHmDv.jpg', 'categories/8V6TxnhgqHWotORf6ZK7qjQtMug7UdBiVA274I9D.jpg', 'categories/JcS3QLAoH8vFYEgHohVyoBucMwo3N9Z3g0dyjcgc.jpg', 'categories/8j7JRwiH8JONOop0vAPqoNFFxRTtw2Dw8fB2lL7F.jpg', '2025-03-24 12:04:55', '2025-03-24 12:04:55', 'A perfect combo of flavorful dishes, offering a mix of delicious sides and mains for a satisfying and complete meal experience.', 1),
(6, 'KIDS JUNCTION', 'categories/5sD3IeqGhNDIhKZExbfqxz9yQ1rfMnEOFfjIAp2n.jpg', 'categories/UVnXgl40EM6y1UT9k8rcu5GM0Tn78MfWW94finkY.jpg', 'categories/zemqa4pTLY0ye5zEudJH5K9tDEMSojKVBxtgJWEz.jpg', 'categories/py6mw7mprDZ05zz2ouSUwmWtZgVGzDj9yD1gvXby.jpg', '2025-03-24 12:08:53', '2025-03-24 12:08:53', 'Tasty and fun meals specially crafted for kids, featuring delicious flavors and perfect portions for little appetites.', 1),
(7, 'SHAKES', 'categories/5xS3sWL2H9RUtq2rZyDWYdW8ei0yJG43TdlScr5r.jpg', 'categories/37EcDoOlwT5yU1Qkb6nIxQM8BGG7dKHWduIaWeCt.jpg', 'categories/EtiKmcITj3qFFgAWSGFH5QwIMKOFTd6TOFMZyTe7.jpg', 'categories/wqdYRMfS4sQdBawJJ3U6zWVgmXu1QikzKWibo8QB.jpg', '2025-03-24 12:10:24', '2025-03-24 12:10:24', 'Creamy, rich, and flavorful shakes made with real ingredients, blended to perfection for a refreshing and indulgent treat.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_settings`
--

CREATE TABLE `contact_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `title` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `link` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `icon` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `delivery_boy_notifications`
--

CREATE TABLE `delivery_boy_notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `delivery_boy_id` bigint UNSIGNED NOT NULL,
  `title` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `rate` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` bigint UNSIGNED NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `is_active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2024_11_19_150847_create_wallets_table', 1),
(6, '2024_11_19_151215_create_categories_table', 1),
(7, '2024_11_19_151422_create_products_table', 1),
(8, '2024_11_19_154339_user_favorite_products', 1),
(9, '2024_11_19_154924_create_coupons_table', 1),
(10, '2024_11_19_155043_create_used_coupon_table', 1),
(11, '2024_11_19_161335_create_settings_table', 1),
(12, '2024_11_19_161730_create_addresses_table', 1),
(13, '2024_11_19_161847_create_areas_table', 1),
(14, '2024_11_19_162502_create_banners_table', 1),
(15, '2024_11_19_163524_create_contact_settings_table', 1),
(16, '2024_11_19_163930_create_notifications_table', 1),
(17, '2024_11_19_164039_create_delivery_boy_notifications_table', 1),
(18, '2024_11_19_164213_create_feedback_table', 1),
(19, '2024_11_19_164323_create_home_table', 1),
(20, '2024_11_20_082353_create_orders_table', 1),
(21, '2024_11_20_082543_create_otp_verification_table', 1),
(22, '2024_11_20_082706_create_payment_method_table', 1),
(23, '2024_11_20_082928_create_product_enquiry_table', 1),
(24, '2024_11_20_083347_create_read_notification_table', 1),
(25, '2024_12_07_103546_create_product_flavours_table', 1),
(26, '2024_12_07_123827_create_ingredients_table', 1),
(27, '2025_03_12_105150_create_roles_table', 1),
(28, '2025_03_12_131041_create_sub_categories_table', 1),
(29, '2025_03_12_152258_create_sides_table', 1),
(30, '2025_03_19_102905_create_product_variants_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `title` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `msg` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_order_id` text COLLATE utf8mb4_unicode_ci,
  `user_id` text COLLATE utf8mb4_unicode_ci,
  `product_name` text COLLATE utf8mb4_unicode_ci,
  `product_id` text COLLATE utf8mb4_unicode_ci,
  `product_variation` text COLLATE utf8mb4_unicode_ci,
  `product_price` text COLLATE utf8mb4_unicode_ci,
  `delivery_date` text COLLATE utf8mb4_unicode_ci,
  `timeslot` text COLLATE utf8mb4_unicode_ci,
  `discount` text COLLATE utf8mb4_unicode_ci,
  `total` text COLLATE utf8mb4_unicode_ci,
  `payment_method_id` text COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `delivery_boy_status` text COLLATE utf8mb4_unicode_ci,
  `tax` text COLLATE utf8mb4_unicode_ci,
  `transaction_id` text COLLATE utf8mb4_unicode_ci,
  `coupon_amount` text COLLATE utf8mb4_unicode_ci,
  `deliveryCharge` text COLLATE utf8mb4_unicode_ci,
  `totalDiscountPrice` text COLLATE utf8mb4_unicode_ci,
  `serviceTaxAmt` text COLLATE utf8mb4_unicode_ci,
  `status` int DEFAULT '1',
  `delivery_boy_id` int DEFAULT '0',
  `address_id` int DEFAULT '0',
  `coupon_id` int DEFAULT NULL,
  `used_wallet_amount` int DEFAULT '0',
  `order_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otp_verification`
--

CREATE TABLE `otp_verification` (
  `id` bigint UNSIGNED NOT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci,
  `otp` int DEFAULT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` bigint UNSIGNED NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci,
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `api_key` text COLLATE utf8mb4_unicode_ci,
  `secret_key` text COLLATE utf8mb4_unicode_ci,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `variation` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `sandwich_price` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `stock` int NOT NULL,
  `main_img` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `img_1` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `img_2` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `img_3` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `deal_of_the_day` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meal_price` float DEFAULT NULL,
  `send_notification` tinyint(1) NOT NULL DEFAULT '0',
  `has_sides` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `description`, `variation`, `sandwich_price`, `status`, `stock`, `main_img`, `img_1`, `img_2`, `img_3`, `deal_of_the_day`, `deleted_at`, `created_at`, `updated_at`, `meal_price`, `send_notification`, `has_sides`) VALUES
(1, 'Fried Chicken', 1, 'Crispy, tender fried chicken, available in regular or spicy, delivering bold flavor and a satisfying crunch in every bite.', NULL, 4.99, 1, 0, 'images/products/htvpIDTV3D93Y7ABYAD8cjX1JuVYDl799EWqr8CJ.jpg', 'images/products/fUGVqin7hY5FA98t4rf8r3qsr8I8wbQFMnM6aZiQ.jpg', 'images/products/DdvWibMnxhWgc5bgUS23GjyOyOdfyJjN1iVbuapd.jpg', 'images/products/RaErHVQeGcm2DRt8dX0UWPw0eiktYhkQmRHxgRFh.jpg', 1, NULL, '2025-03-24 12:19:10', '2025-03-24 12:19:10', 7.49, 1, 0),
(2, 'Galactic Crumble', 7, 'Galactic Crumble Shake: A cosmic blend of creamy vanilla, crunchy cookie crumbles & a swirl of galaxy-inspired flavors!', NULL, 4.99, 1, 0, 'images/products/83CLRptFC4rEWbEDybhlDUmB1Ez6GYnjenZcyES1.jpg', 'images/products/vhxPsQxhklFnB7CKvxXQ3Fc9Jd7yE2FE6mmiTLmY.jpg', 'images/products/I8p4i8NhQsU9a6gccxckeVvaMUV4nyxZ3t3pg3ki.jpg', 'images/products/FZW5KCFAy9dzTg1HHC8eWdzn0QlPbHrAzXtseoCa.jpg', 1, NULL, '2025-03-27 10:35:32', '2025-03-27 10:35:32', NULL, 1, 0),
(3, 'Meteorite Mocha', 7, 'a', NULL, 4.99, 1, 0, 'images/products/L8MMuMWARulzHYieWElMtVERUxoMRnWVfRoHLXLJ.jpg', NULL, 'images/products/RroP83GxhxwjlA3S16AXck7oho188PjqQcr55dFp.jpg', 'images/products/0uBy1WJHPu75itRG0d2dFVY07G2whZ1KSfAzhjX6.jpg', 1, NULL, '2025-03-27 10:46:13', '2025-03-27 10:46:13', NULL, 1, 0),
(4, 'Asadullah khan', 1, 'tttttttttt', NULL, 3.44, 1, 1, NULL, NULL, NULL, NULL, 0, NULL, '2025-03-28 11:11:36', '2025-03-28 11:11:36', NULL, 0, 0),
(5, 'Asadullah khan', 1, 'tttttttttt', NULL, 3.44, 1, 1, NULL, NULL, NULL, NULL, 0, NULL, '2025-03-28 11:16:05', '2025-03-28 11:16:05', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_enquiry`
--

CREATE TABLE `product_enquiry` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_flavours`
--

CREATE TABLE `product_flavours` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `variant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `read_notification`
--

CREATE TABLE `read_notification` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `notification_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'customer', NULL, NULL),
(3, 'delivery boy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ZfUaUvOUs5bDmp7Sc9ELPJCGDzRJxlF1cTQttZR0', NULL, '119.73.96.207', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2swemdmWGxzQlJtcHRnREpxM0x6cjlwanY2TTdBRTFWcUhDTjVBMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vZGV2LmVhOG9uLmNvLnVrL2FkbWluL3Byb2R1Y3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1743160828);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `privacy_policy` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `about_us` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `minimum_order_value` int NOT NULL,
  `timezone` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tax` int NOT NULL,
  `app_header_logo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `app_logo` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `title` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `terms_condition` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `refund_policy` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `currency` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `notification_secret_key` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `new_version_code` int DEFAULT NULL,
  `is_force_update` int DEFAULT NULL,
  `is_update_active` int NOT NULL DEFAULT '1',
  `app_maintenance` int NOT NULL DEFAULT '0',
  `primary_color` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `init_wallet_amt` int NOT NULL DEFAULT '0',
  `init_wallet_amt_referral` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sides`
--

CREATE TABLE `sides` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sides`
--

INSERT INTO `sides` (`id`, `name`, `description`, `image`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'White Rice (whole spices)', 'Aromatic white rice cooked with whole spices, delivering a subtle fragrance and rich flavor, perfect for any meal.', 'sides/bGu1SLb8oEIdklAdkzdWXTbbmYzj0n8MpM0QJ1I3.jpg', '3.99', 1, '2025-03-24 10:39:37', '2025-03-24 11:09:00'),
(2, 'Spiced Rice', 'Aromatic white rice cooked with whole spices, delivering a subtle fragrance and rich flavor, perfect for any meal.', 'sides/bRA1qIoGp1iUMtEOLkkOiKHnrHuvhrCp32d5yRoq.jpg', '3.99', 1, '2025-03-24 10:39:37', '2025-03-24 11:17:38'),
(3, 'Mozzarella Sticks (6)', 'Crispy golden mozzarella sticks filled with gooey cheese, served hot and perfect for dipping. Comes in a pack of six.', 'sides/2the9i809ZAgAq7YoR7mepnUIF6iPD1r8mIowkeS.jpg', '3.99', 1, '2025-03-24 11:19:55', '2025-03-24 11:19:55'),
(4, 'Onion Rings (10)', 'Crispy, golden-battered onion rings fried to perfection, offering a crunchy bite. Comes in a pack of ten, perfect for sharing.', 'sides/5OJN6wnDDqRmGRtsXL1GPV4I8P6Ztli1Xw0xrRXV.jpg', '3.99', 1, '2025-03-24 11:23:56', '2025-03-24 11:23:56'),
(5, 'Mashed Potatoes', 'Crispy, golden-battered onion rings fried to perfection, offering a crunchy bite. Comes in a pack of ten, perfect for sharing.', 'sides/XLhLo49tLv31RKfClOmakBv57Em0VporcNjpqO0R.jpg', '3.99', 1, '2025-03-24 11:23:56', '2025-03-24 11:25:25'),
(6, 'Mushy Peas', 'Soft, seasoned mushy peas with a smooth yet textured consistency, offering a classic, flavorful side for any meal.', 'sides/7QjlBtNtq9hiL54SUJKz8IFxbnekvPvj5jT0laV6.jpg', '3.99', 1, '2025-03-24 11:28:32', '2025-03-24 11:28:32'),
(7, 'Chilli Cheese Bites (10)', 'Crispy bites filled with spicy chili and gooey cheese, delivering a perfect balance of heat and flavor. Comes in a pack of ten.', 'sides/RcxlQaDrhzGBzt5y19Q3LXhhPKedtVhWhFnKZOVH.jpg', '3.99', 1, '2025-03-24 11:30:24', '2025-03-24 11:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint NOT NULL,
  `name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `thumbnail` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img_1` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `img_2` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `img_3` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `used_coupon`
--

CREATE TABLE `used_coupon` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `mobile` text COLLATE utf8mb4_unicode_ci,
  `registration_date` datetime DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `pin` text COLLATE utf8mb4_unicode_ci,
  `app_key` text COLLATE utf8mb4_unicode_ci,
  `user_token` text COLLATE utf8mb4_unicode_ci,
  `img` text COLLATE utf8mb4_unicode_ci,
  `ref_code` text COLLATE utf8mb4_unicode_ci,
  `is_delete` int NOT NULL DEFAULT '0',
  `role_id` bigint NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `registration_date`, `password`, `status`, `pin`, `app_key`, `user_token`, `img`, `ref_code`, `is_delete`, `role_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Asad Khan', 'admin@gmail.com', NULL, '2025-03-24 10:34:22', '$2y$12$dxNaEBqto6KpLbl0po8FYewiBrGxpL4X5AUL4nSQtiZLAiSlkBbJ.', 1, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, '2025-03-24 10:34:22', '2025-03-24 10:34:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_favorite_products`
--

CREATE TABLE `user_favorite_products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
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
-- Indexes for table `contact_settings`
--
ALTER TABLE `contact_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy_notifications`
--
ALTER TABLE `delivery_boy_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_boy_notifications_delivery_boy_id_foreign` (`delivery_boy_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_user_id_foreign` (`user_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home_category_id_foreign` (`category_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredients_product_id_foreign` (`product_id`);

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
-- Indexes for table `otp_verification`
--
ALTER TABLE `otp_verification`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_enquiry`
--
ALTER TABLE `product_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_flavours`
--
ALTER TABLE `product_flavours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_flavours_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`);

--
-- Indexes for table `read_notification`
--
ALTER TABLE `read_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sides`
--
ALTER TABLE `sides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `used_coupon`
--
ALTER TABLE `used_coupon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `used_coupon_coupon_id_foreign` (`coupon_id`),
  ADD KEY `used_coupon_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_favorite_products`
--
ALTER TABLE `user_favorite_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_favorite_products_product_id_foreign` (`product_id`),
  ADD KEY `user_favorite_products_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_settings`
--
ALTER TABLE `contact_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_boy_notifications`
--
ALTER TABLE `delivery_boy_notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otp_verification`
--
ALTER TABLE `otp_verification`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_enquiry`
--
ALTER TABLE `product_enquiry`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_flavours`
--
ALTER TABLE `product_flavours`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `read_notification`
--
ALTER TABLE `read_notification`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sides`
--
ALTER TABLE `sides`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `used_coupon`
--
ALTER TABLE `used_coupon`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_favorite_products`
--
ALTER TABLE `user_favorite_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `delivery_boy_notifications`
--
ALTER TABLE `delivery_boy_notifications`
  ADD CONSTRAINT `delivery_boy_notifications_delivery_boy_id_foreign` FOREIGN KEY (`delivery_boy_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `home`
--
ALTER TABLE `home`
  ADD CONSTRAINT `home_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_flavours`
--
ALTER TABLE `product_flavours`
  ADD CONSTRAINT `product_flavours_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `used_coupon`
--
ALTER TABLE `used_coupon`
  ADD CONSTRAINT `used_coupon_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `used_coupon_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_favorite_products`
--
ALTER TABLE `user_favorite_products`
  ADD CONSTRAINT `user_favorite_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_favorite_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
