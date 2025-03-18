-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for eaton
CREATE DATABASE IF NOT EXISTS `eaton` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `eaton`;

-- Dumping structure for table eaton.addresses
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_user_id_foreign` (`user_id`),
  CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.addresses: ~0 rows (approximately)

-- Dumping structure for table eaton.areas
CREATE TABLE IF NOT EXISTS `areas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `delivery_charge` double NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.areas: ~0 rows (approximately)

-- Dumping structure for table eaton.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `banner_img` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.banners: ~0 rows (approximately)

-- Dumping structure for table eaton.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.cache: ~0 rows (approximately)

-- Dumping structure for table eaton.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.cache_locks: ~0 rows (approximately)

-- Dumping structure for table eaton.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `category_img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '0',
  `category_img_1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `category_img_2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `category_img_3` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.categories: ~6 rows (approximately)
INSERT INTO `categories` (`id`, `category_name`, `category_img`, `category_img_1`, `category_img_2`, `category_img_3`, `status`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'BURGER', 'categories/5EltkOQR8wu8v8reifhLFGk9Rt7BJmEB4nxlW7t7.jpg', 'categories/CZTfDRbWQYPpBm50YpdTDCA5zol19tT4UbUPjNxa.jpg', 'categories/GxVQA6NZ8JeV2hq7C3lQ5GZ5lFkiYEdNbhqdMdP7.jpg', 'categories/ihIexfe9QFvwZv2aHxhjLZuc8cj7Rk4cH291vttq.jpg', 1, 'Savor the ultimate comfort food with our delicious, juicy burgers crafted to perfection.', '2025-03-18 04:53:30', '2025-03-18 04:53:30'),
	(2, 'WRAPS', 'categories/KVlco35Q7St9nnh5kpBEmWFnjJ7NW42AL0g1C2OD.jpg', 'categories/FvH3wplaehE9jJNLk3sF81oYi77tN3Avwh5DixIv.jpg', 'categories/Vel1AcFCVp6uA9KQbol7G6c6fra3RaQFSpXbWIUx.jpg', 'categories/nE2xLtXyM73lrohaeo6TlO7YEMOslNsX7P3mpyKu.jpg', 1, 'Fresh, flavorful, and versatile wraps packed with delicious fillings for every taste.', '2025-03-18 06:32:52', '2025-03-18 06:32:52'),
	(3, 'GRILLED (STEAMED)', 'categories/7PEf3GSibqMR9tZ9ydqT6Jm7NZSwIJwBFWqY3zxK.jpg', 'categories/XCpJWZHkstYcKo2hZEk1eKWRN5lDyXiecQH77iYj.jpg', 'categories/AmfmMeVDJvyXnNaB4t2qK9DBLcgWqPcbsqiLBeeS.jpg', 'categories/viJwNiA6e0JpqcdTAC6oI5yaPwj5VRoEt7ImTYCR.jpg', 1, 'Grilled (Steamed) dishes offer a delicious balance of smoky flavors and tender textures, achieved by cooking food over direct heat or steam.', '2025-03-18 09:44:02', '2025-03-18 09:44:02'),
	(4, '0', 'categories/bijyHFKVsa7VUQAFnVytLG6YTY244aXC5SDfFbtS.jpg', 'categories/9e8rWAdiirf8T0tMQasLOiYkuRlN3MY7T07UhTEv.jpg', 'categories/bQ5RXSRqNuvUylPcxDzxuAUQFMn1Ow0XQPKPgYYf.jpg', 'categories/LnX3j1ipNKRO6yeNCp463DZDTaNOw2HaKP7OB3r1.jpg', 0, 'Reprehenderit nulla', '2025-03-17 08:03:56', '2025-03-17 08:03:56'),
	(5, '0', 'categories/lXJEfpqEAxygRpyILL5y2iGA0fU99HBjbIXqA8Hi.jpg', 'categories/gj3LpneF5LPJn4VVmvpSwx5gwQwUXJbjQxCpT0A2.jpg', 'categories/f66vvw3alJr6AtYjHWqYNwXBrI3AU0QlaYJ5GHG4.jpg', 'categories/bIMXxXBvAVbjugKs8q16voV9LAK3DYjXdrFoKJzk.jpg', 1, 'Porro unde recusanda', '2025-03-17 08:02:35', '2025-03-17 08:02:35'),
	(6, 'Asadullah khan', 'categories/8rOwZiWcyIcIXDi1MAe2jXnXACKqCirlBmQpePL7.jpg', 'categories/gJe0qiarnVme9x249PvxwZqxqCGIWsTzCc3F8Apf.jpg', 'categories/IhLca98MWfbQJENOfXtcxuksIGWSXSNbjaL12VbV.jpg', 'categories/XWTT9A6uZOLydaqNxLdx4a8KyJVbZv6LnBCpA0pu.jpg', 1, 'fddddddddddddddd', '2025-03-17 08:05:12', '2025-03-17 08:05:12');

-- Dumping structure for table eaton.contact_settings
CREATE TABLE IF NOT EXISTS `contact_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `link` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `icon` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.contact_settings: ~0 rows (approximately)

-- Dumping structure for table eaton.coupons
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT '0',
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.coupons: ~0 rows (approximately)

-- Dumping structure for table eaton.delivery_boy_notifications
CREATE TABLE IF NOT EXISTS `delivery_boy_notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `delivery_boy_id` bigint unsigned NOT NULL,
  `title` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `delivery_boy_notifications_delivery_boy_id_foreign` (`delivery_boy_id`),
  CONSTRAINT `delivery_boy_notifications_delivery_boy_id_foreign` FOREIGN KEY (`delivery_boy_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.delivery_boy_notifications: ~0 rows (approximately)

-- Dumping structure for table eaton.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table eaton.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_id` bigint unsigned NOT NULL,
  `rate` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedback_user_id_foreign` (`user_id`),
  CONSTRAINT `feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.feedback: ~0 rows (approximately)

-- Dumping structure for table eaton.home
CREATE TABLE IF NOT EXISTS `home` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `is_active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `home_category_id_foreign` (`category_id`),
  CONSTRAINT `home_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.home: ~0 rows (approximately)

-- Dumping structure for table eaton.ingredients
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ingredients_product_id_foreign` (`product_id`),
  CONSTRAINT `ingredients_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.ingredients: ~0 rows (approximately)

-- Dumping structure for table eaton.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.jobs: ~0 rows (approximately)

-- Dumping structure for table eaton.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.job_batches: ~0 rows (approximately)

-- Dumping structure for table eaton.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.migrations: ~0 rows (approximately)
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
	(25, '2024_12_07_100217_create_product_sizes_table', 1),
	(26, '2024_12_07_103546_create_product_flavours_table', 1),
	(27, '2024_12_07_123827_create_ingredients_table', 1),
	(28, '2025_03_12_105150_create_roles_table', 1),
	(29, '2025_03_12_131041_create_sub_categories_table', 1),
	(30, '2025_03_12_152258_create_sides_table', 1);

-- Dumping structure for table eaton.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT '0',
  `title` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `msg` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.notifications: ~0 rows (approximately)

-- Dumping structure for table eaton.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.orders: ~0 rows (approximately)

-- Dumping structure for table eaton.otp_verification
CREATE TABLE IF NOT EXISTS `otp_verification` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `mobile` text COLLATE utf8mb4_unicode_ci,
  `otp` int DEFAULT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.otp_verification: ~0 rows (approximately)

-- Dumping structure for table eaton.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table eaton.payment_method
CREATE TABLE IF NOT EXISTS `payment_method` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `img` text COLLATE utf8mb4_unicode_ci,
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `api_key` text COLLATE utf8mb4_unicode_ci,
  `secret_key` text COLLATE utf8mb4_unicode_ci,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.payment_method: ~0 rows (approximately)

-- Dumping structure for table eaton.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table eaton.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `brand_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `variation` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `price` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int NOT NULL,
  `stock` int NOT NULL,
  `main_img` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img_1` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `img_2` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `img_3` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tag` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `date` datetime NOT NULL,
  `discount` int NOT NULL DEFAULT '0',
  `popular` int NOT NULL,
  `dealOfTheDay` int NOT NULL DEFAULT '0',
  `is_delete` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.products: ~0 rows (approximately)

-- Dumping structure for table eaton.product_enquiry
CREATE TABLE IF NOT EXISTS `product_enquiry` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.product_enquiry: ~0 rows (approximately)

-- Dumping structure for table eaton.product_flavours
CREATE TABLE IF NOT EXISTS `product_flavours` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_flavours_product_id_foreign` (`product_id`),
  CONSTRAINT `product_flavours_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.product_flavours: ~0 rows (approximately)

-- Dumping structure for table eaton.product_sizes
CREATE TABLE IF NOT EXISTS `product_sizes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_sizes_product_id_foreign` (`product_id`),
  CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.product_sizes: ~0 rows (approximately)

-- Dumping structure for table eaton.read_notification
CREATE TABLE IF NOT EXISTS `read_notification` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `notification_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.read_notification: ~0 rows (approximately)

-- Dumping structure for table eaton.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', NULL, NULL),
	(2, 'customer', NULL, NULL),
	(3, 'delivery boy', NULL, NULL);

-- Dumping structure for table eaton.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('LxX2eXcQZZuBMaEN5Om74W0J9hDA8Clqj8rLaf2V', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib2o5dFdYU0Y2SHdidU9KVWh5dVY1NEg3OTZkUFJZUndETVhrNTVJNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9lYThvbi1hZG1pbi50ZXN0OjgwODAvYWRtaW4vY2F0ZWdvcmllcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1742310383),
	('mVFbaXgcMb74du8UAjDB8WQAHGvtpsMof9roo5mr', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieFVQcUtkYWhjNHdxbUlpT0x5MHFzRWpVcm9hSlNzMWVZV291WkRqZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9lYThvbi1hZG1pbi50ZXN0OjgwODAvYWRtaW4vY2F0ZWdvcmllcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1742313682),
	('Ya6iU2xtVd0ksn5JE4qWlRDCqsLbMFYkFQzprgI5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidTBpN21KUUVXWDFZcmhnQjJHYkZUNTVxeTBPMUhxb0VHWWVVdjFLMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9lYThvbi1hZG1pbi50ZXN0OjgwODAvYWRtaW4vY2F0ZWdvcmllcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1742311039);

-- Dumping structure for table eaton.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.settings: ~0 rows (approximately)

-- Dumping structure for table eaton.sides
CREATE TABLE IF NOT EXISTS `sides` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.sides: ~6 rows (approximately)
INSERT INTO `sides` (`id`, `name`, `description`, `image`, `price`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'White Rice (whole spices)', 'Fluffy white rice infused with whole spices for a fragrant, aromatic flavor.', 'sides/5A6JWePGDg1dcfQaa14pJo9uQQcAx4PhB49U7MTZ.jpg', 3.99, 1, '2025-03-17 04:36:13', '2025-03-18 06:18:17'),
	(2, 'Spiced Rice', 'A flavorful blend of aromatic spices and tender rice, perfectly seasoned for a rich taste.', 'sides/klxajHiq2TRz7bEqp7uVQVeb0yOFfHTXfaKhrdhM.jpg', 3.99, 1, '2025-03-17 04:24:54', '2025-03-17 04:37:10'),
	(3, 'Mozzarella Sticks (6)', 'Crispy, golden fries made from freshly cut potatoes, seasoned to perfection.', 'sides/8coSU1t6GRaTsVC6B6hfcHL2U3FfAMCLxvvhQoIu.jpg', 3.99, 1, '2025-03-17 04:17:30', '2025-03-17 04:46:59'),
	(4, 'Chilli Cheese Bites (10)', 'Crispy, golden fries made from freshly cut potatoes, seasoned to perfection.', 'sides/cxxUjHAMDqXchD9Maxi8WwC5zDuex44fgSD1ifK0.jpg', 3.99, 1, '2025-03-17 04:17:30', '2025-03-17 04:59:59'),
	(5, 'Onion Rings (10)', 'Crispy, golden fries made from freshly cut potatoes, seasoned to perfection.', 'sides/kpisyqJFvz8o44S5DhBglID55QbKFj4Xwe2SdMif.jpg', 3.99, 1, '2025-03-17 04:17:30', '2025-03-17 04:59:32'),
	(7, 'Mashed Potatoes', 'Creamy, smooth mashed potatoes, perfectly seasoned for a rich, comforting taste.', 'sides/Cgn7H3Ux9r3L0nkZL3aeVzxymzFf6eWxcZ8WntaT.jpg', 3.99, 1, '2025-03-17 05:02:53', '2025-03-17 05:02:53'),
	(8, 'Mushy Peas', 'Soft, flavorful peas mashed to perfection, offering a comforting, savory side.', 'sides/IoNFetl13wHf8PnDUoVXmxBJJ27pDM8bBbAK5asw.jpg', 3.99, 1, '2025-03-17 05:05:58', '2025-03-17 05:05:58');

-- Dumping structure for table eaton.sub_categories
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint NOT NULL,
  `name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `thumbnail` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img_1` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `img_2` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `img_3` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.sub_categories: ~0 rows (approximately)

-- Dumping structure for table eaton.used_coupon
CREATE TABLE IF NOT EXISTS `used_coupon` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `coupon_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `used_coupon_coupon_id_foreign` (`coupon_id`),
  KEY `used_coupon_user_id_foreign` (`user_id`),
  CONSTRAINT `used_coupon_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE SET NULL,
  CONSTRAINT `used_coupon_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.used_coupon: ~0 rows (approximately)

-- Dumping structure for table eaton.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `registration_date`, `password`, `status`, `pin`, `app_key`, `user_token`, `img`, `ref_code`, `is_delete`, `role_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Asad Khan', 'admin@gmail.com', NULL, '2025-03-17 09:10:55', '$2y$12$o1YUWIK48mS7k4t4xLW/mu69FHL1nRm6ckuUAkl6mmY1gMAkzdIMm', 1, NULL, NULL, NULL, NULL, NULL, 0, 1, 'h79M32RAmFmVuNi1duTVjQGhEKQbOOqCt7CRxZXMSgH5ynvrfKvu0bS1U184', '2025-03-17 04:10:56', '2025-03-17 04:10:56', NULL);

-- Dumping structure for table eaton.user_favorite_products
CREATE TABLE IF NOT EXISTS `user_favorite_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_favorite_products_product_id_foreign` (`product_id`),
  KEY `user_favorite_products_user_id_foreign` (`user_id`),
  CONSTRAINT `user_favorite_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_favorite_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.user_favorite_products: ~0 rows (approximately)

-- Dumping structure for table eaton.wallets
CREATE TABLE IF NOT EXISTS `wallets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `ref_user_id` bigint unsigned NOT NULL DEFAULT '0',
  `amount` double NOT NULL,
  `closing_amount` double NOT NULL,
  `flag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wallets_user_id_foreign` (`user_id`),
  CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eaton.wallets: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
