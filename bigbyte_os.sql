-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table bigbyte_os.agents
CREATE TABLE IF NOT EXISTS `agents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.agents: ~2 rows (approximately)
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` (`id`, `name`, `code`, `isActive`, `created_at`, `updated_at`) VALUES
	(1, 'Sample', 'SAM', 0, '2022-05-23 13:28:05', '2022-05-23 14:46:28'),
	(2, 'Wewe', 'WEWE', 0, '2022-05-23 15:08:53', '2022-05-23 15:08:53');
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.branches
CREATE TABLE IF NOT EXISTS `branches` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.branches: ~0 rows (approximately)
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` (`id`, `name`, `code`, `isActive`, `created_at`, `updated_at`) VALUES
	(1, 'Main', 'OMP', 0, '2022-05-24 10:16:14', '2022-05-24 10:16:23');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.case_check_lists
CREATE TABLE IF NOT EXISTS `case_check_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_delivery` date DEFAULT NULL,
  `case_setup_id` int(11) NOT NULL,
  `lfi_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty_delivered` int(11) NOT NULL,
  `qty_used` int(11) NOT NULL,
  `isPulledout` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.case_check_lists: ~4 rows (approximately)
/*!40000 ALTER TABLE `case_check_lists` DISABLE KEYS */;
INSERT INTO `case_check_lists` (`id`, `date_delivery`, `case_setup_id`, `lfi_id`, `branch_id`, `product_id`, `qty_delivered`, `qty_used`, `isPulledout`, `created_at`, `updated_at`) VALUES
	(1, '2022-05-27', 1, 8, 1, 1, 5, 5, 1, '2022-05-30 08:59:01', '2022-05-30 10:46:25'),
	(2, '2022-05-27', 1, 9, 1, 2, 5, 5, 1, '2022-05-30 08:59:01', '2022-05-30 10:46:25'),
	(3, '2022-06-07', 2, 8, 1, 1, 2, 2, 1, '2022-06-07 15:14:15', '2022-06-07 15:14:40'),
	(4, '2022-06-07', 2, 9, 1, 2, 2, 2, 1, '2022-06-07 15:14:15', '2022-06-07 15:14:40'),
	(5, '2022-06-07', 2, 5, 1, 1, 2, 2, 1, '2022-06-07 15:14:26', '2022-06-07 15:14:40');
/*!40000 ALTER TABLE `case_check_lists` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.case_setups
CREATE TABLE IF NOT EXISTS `case_setups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `surgery_time` time NOT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `surgeon_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `implant_id` int(11) NOT NULL,
  `date_delivery` date NOT NULL,
  `date_surgery` date NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.case_setups: ~2 rows (approximately)
/*!40000 ALTER TABLE `case_setups` DISABLE KEYS */;
INSERT INTO `case_setups` (`id`, `date`, `surgery_time`, `patient_name`, `branch_id`, `agent_id`, `surgeon_id`, `hospital_id`, `implant_id`, `date_delivery`, `date_surgery`, `notes`, `status_id`, `created_at`, `updated_at`) VALUES
	(1, '2022-05-27', '22:00:00', 'Nonong Balinan', 1, 1, 1, 1, 1, '2022-05-27', '2022-05-27', NULL, 5, '2022-05-27 09:35:50', '2022-06-04 09:40:44'),
	(2, '2022-06-07', '10:00:00', 'Ryan Rems', 1, 1, 1, 1, 1, '2022-06-07', '2022-06-07', NULL, 5, '2022-06-07 15:12:43', '2022-06-07 15:17:14');
/*!40000 ALTER TABLE `case_setups` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.case_statuses
CREATE TABLE IF NOT EXISTS `case_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.case_statuses: ~4 rows (approximately)
/*!40000 ALTER TABLE `case_statuses` DISABLE KEYS */;
INSERT INTO `case_statuses` (`id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
	(1, 'Open', 0, '2022-05-26 16:19:33', '2022-05-26 16:19:33'),
	(2, 'Delivered', 0, '2022-05-26 16:19:39', '2022-05-26 16:19:39'),
	(3, 'Pulled Out', 0, '2022-05-26 16:19:46', '2022-05-26 16:19:46'),
	(4, 'Receivable', 0, '2022-05-26 16:19:58', '2022-05-26 16:19:58'),
	(5, 'Paid', 0, '2022-05-26 16:20:06', '2022-05-26 16:20:06');
/*!40000 ALTER TABLE `case_statuses` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.case_subcases
CREATE TABLE IF NOT EXISTS `case_subcases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `case_setup_id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `subcase_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.case_subcases: ~3 rows (approximately)
/*!40000 ALTER TABLE `case_subcases` DISABLE KEYS */;
INSERT INTO `case_subcases` (`id`, `case_setup_id`, `case_id`, `subcase_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, '2022-05-27 09:35:50', '2022-05-27 09:35:50'),
	(2, 2, 1, 1, '2022-06-07 15:12:43', '2022-06-07 15:12:43'),
	(3, 2, 1, 2, '2022-06-07 15:12:43', '2022-06-07 15:12:43');
/*!40000 ALTER TABLE `case_subcases` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.case_technicians
CREATE TABLE IF NOT EXISTS `case_technicians` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `case_setup_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.case_technicians: ~2 rows (approximately)
/*!40000 ALTER TABLE `case_technicians` DISABLE KEYS */;
INSERT INTO `case_technicians` (`id`, `case_setup_id`, `technician_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 5, '2022-05-30 09:56:46', '2022-05-30 09:56:46'),
	(2, 2, 5, '2022-06-07 15:16:17', '2022-06-07 15:16:17');
/*!40000 ALTER TABLE `case_technicians` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.case_vouchers
CREATE TABLE IF NOT EXISTS `case_vouchers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `case_setup_id` int(11) NOT NULL,
  `control_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pricing_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.case_vouchers: ~0 rows (approximately)
/*!40000 ALTER TABLE `case_vouchers` DISABLE KEYS */;
INSERT INTO `case_vouchers` (`id`, `case_setup_id`, `control_number`, `pricing_type`, `created_at`, `updated_at`) VALUES
	(1, 1, '1', 'AGENT', '2022-05-30 11:21:46', '2022-05-30 11:21:46'),
	(2, 2, '12345', 'OUTSOURCE', '2022-06-07 15:16:31', '2022-06-07 15:16:48');
/*!40000 ALTER TABLE `case_vouchers` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.hospitals
CREATE TABLE IF NOT EXISTS `hospitals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.hospitals: ~0 rows (approximately)
/*!40000 ALTER TABLE `hospitals` DISABLE KEYS */;
INSERT INTO `hospitals` (`id`, `name`, `code`, `address`, `isActive`, `created_at`, `updated_at`) VALUES
	(1, 'Test', 'AA', 'BB', 0, '2022-05-23 15:55:01', '2022-05-23 15:55:18');
/*!40000 ALTER TABLE `hospitals` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.implant_cases
CREATE TABLE IF NOT EXISTS `implant_cases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.implant_cases: ~2 rows (approximately)
/*!40000 ALTER TABLE `implant_cases` DISABLE KEYS */;
INSERT INTO `implant_cases` (`id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
	(1, 'ANKLE FRACTURE', 0, '2022-05-25 09:05:01', '2022-05-25 09:08:46'),
	(2, 'CLAVICLE - DISTAL FRACTURE', 0, '2022-05-25 09:05:32', '2022-05-25 09:05:32');
/*!40000 ALTER TABLE `implant_cases` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.implant_sub_cases
CREATE TABLE IF NOT EXISTS `implant_sub_cases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `case_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.implant_sub_cases: ~2 rows (approximately)
/*!40000 ALTER TABLE `implant_sub_cases` DISABLE KEYS */;
INSERT INTO `implant_sub_cases` (`id`, `case_id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Test 1', 0, '2022-05-25 10:32:05', '2022-05-25 10:32:05'),
	(2, 1, 'Test 2', 0, '2022-05-25 10:32:12', '2022-05-25 10:32:12');
/*!40000 ALTER TABLE `implant_sub_cases` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.loaner_forms
CREATE TABLE IF NOT EXISTS `loaner_forms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subcase_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.loaner_forms: ~0 rows (approximately)
/*!40000 ALTER TABLE `loaner_forms` DISABLE KEYS */;
INSERT INTO `loaner_forms` (`id`, `subcase_id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
	(4, 1, 'Test', 0, '2022-05-25 14:05:45', '2022-05-25 14:05:45'),
	(5, 1, 'Sample', 0, '2022-05-26 13:22:46', '2022-05-26 13:22:46');
/*!40000 ALTER TABLE `loaner_forms` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.loaner_form_lists
CREATE TABLE IF NOT EXISTS `loaner_form_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `loaner_form_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.loaner_form_lists: ~4 rows (approximately)
/*!40000 ALTER TABLE `loaner_form_lists` DISABLE KEYS */;
INSERT INTO `loaner_form_lists` (`id`, `loaner_form_id`, `product_id`, `qty`, `isActive`, `created_at`, `updated_at`) VALUES
	(5, 5, 1, 0, 0, '2022-05-25 14:05:45', '2022-05-26 13:54:36'),
	(8, 4, 1, 0, 0, '2022-05-26 13:56:57', '2022-05-26 13:56:57'),
	(9, 4, 2, 0, 0, '2022-05-26 13:56:57', '2022-05-26 13:56:57');
/*!40000 ALTER TABLE `loaner_form_lists` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.migrations: ~14 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2022_05_23_125942_create_agents_table', 2),
	(4, '2022_05_23_150726_create_surgeons_table', 3),
	(5, '2022_05_23_154243_create_hospitals_table', 4),
	(6, '2022_05_24_100139_create_branches_table', 5),
	(7, '2022_05_24_104747_create_suppliers_table', 6),
	(8, '2022_05_24_132943_create_product_categories_table', 7),
	(9, '2022_05_24_134406_create_product_sub_categories_table', 8),
	(10, '2022_05_24_140634_create_product_sub_two_categories_table', 9),
	(11, '2022_05_24_143644_create_products_table', 10),
	(12, '2022_05_25_084858_create_implant_cases_table', 11),
	(13, '2022_05_25_094247_create_implant_sub_cases_table', 12),
	(14, '2022_05_25_104048_create_loaner_forms_table', 13),
	(15, '2022_05_25_132139_create_loaner_form_lists_table', 14),
	(16, '2022_05_26_142707_create_usertypes_table', 15),
	(17, '2022_05_26_160919_create_case_statuses_table', 16),
	(18, '2022_05_27_074425_create_case_setups_table', 17),
	(19, '2022_05_27_091938_create_case_subcases_table', 18),
	(20, '2022_05_30_081402_create_case_check_lists_table', 19),
	(21, '2022_05_30_090914_create_case_technicians_table', 20),
	(22, '2022_05_30_110226_create_case_vouchers_table', 21),
	(23, '2022_06_04_105426_create_settings_table', 22);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subtwo_id` int(11) NOT NULL,
  `catalog_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capital_usd` decimal(9,2) NOT NULL,
  `capital_php` decimal(9,2) NOT NULL,
  `exchange_rate` decimal(9,2) NOT NULL,
  `agent_price` decimal(9,2) NOT NULL,
  `outsource_price` decimal(9,2) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.products: ~2 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `subtwo_id`, `catalog_no`, `uom_id`, `description`, `capital_usd`, `capital_php`, `exchange_rate`, `agent_price`, `outsource_price`, `isActive`, `created_at`, `updated_at`) VALUES
	(1, 1, '1001', 'PC', 'Test 1 Product', 6.50, 338.00, 52.00, 500.00, 600.00, 0, '2022-05-24 16:38:26', '2022-05-24 16:38:26'),
	(2, 1, '1002', 'PC', 'Test 2 Product', 6.50, 338.00, 52.00, 500.00, 600.00, 0, '2022-05-24 16:38:57', '2022-05-24 16:38:57');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.product_categories
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.product_categories: ~2 rows (approximately)
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` (`id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
	(1, 'ARTHROSCOPY', 0, '2022-05-24 13:41:40', '2022-05-24 13:41:40'),
	(2, 'ARTHROPLASTY', 0, '2022-05-24 13:41:49', '2022-05-24 13:41:49'),
	(3, 'SPINE', 0, '2022-05-24 13:41:57', '2022-05-24 13:41:57');
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.product_sub_categories
CREATE TABLE IF NOT EXISTS `product_sub_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.product_sub_categories: ~4 rows (approximately)
/*!40000 ALTER TABLE `product_sub_categories` DISABLE KEYS */;
INSERT INTO `product_sub_categories` (`id`, `category_id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
	(1, 2, 'KNEE ARTHROPLASTY INSTRUMENTATION', 0, '2022-05-24 14:00:04', '2022-05-24 14:00:04'),
	(2, 2, 'HIP ARTHROPLASTY MODULAR INSTRUMENTATION', 0, '2022-05-24 14:00:18', '2022-05-24 14:00:18'),
	(3, 3, 'THORACIC LUMBAR', 0, '2022-05-24 14:01:24', '2022-05-24 14:01:24'),
	(4, 3, 'CERVICO-THORACIC-LUMBAR INSTRUMENTATION', 0, '2022-05-24 14:01:40', '2022-05-24 14:01:40');
/*!40000 ALTER TABLE `product_sub_categories` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.product_sub_two_categories
CREATE TABLE IF NOT EXISTS `product_sub_two_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subone_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.product_sub_two_categories: ~2 rows (approximately)
/*!40000 ALTER TABLE `product_sub_two_categories` DISABLE KEYS */;
INSERT INTO `product_sub_two_categories` (`id`, `subone_id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
	(1, 3, 'Test 1', 0, '2022-05-24 14:23:12', '2022-05-24 14:23:12'),
	(2, 3, 'Test 2', 0, '2022-05-24 14:23:21', '2022-05-24 14:23:21');
/*!40000 ALTER TABLE `product_sub_two_categories` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.settings: ~2 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `company_name`, `company_address`, `company_mobile`, `company_logo`, `created_at`, `updated_at`) VALUES
	(1, 'Sample', 'Sample', 'Sample', 'FLFP5Y68qNCCA4whPQJHXGEjCaT7zftGUF1CLJp6wRWDDcIDLM.png', '2022-06-04 16:41:24', '2022-06-04 16:41:24'),
	(2, 'Yes', 'Yes', 'Yes', 'tVtK1kQSMHcsDSR2KxidMVsmt5bkkId9s7W0heDkIbLjIRjjQf.png', '2022-06-04 16:52:25', '2022-06-04 16:52:25'),
	(3, 'Rojas Mcdonald LLC', 'Juarez Lynch Associates', 'Potter Lamb Associates', 'pACo54ZS6maKVZ3EuttRQOZA7rfyB09L46uJl20zApnU4scQlH.png', '2022-06-04 17:04:14', '2022-06-04 17:04:14');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.suppliers
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.suppliers: ~0 rows (approximately)
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` (`id`, `name`, `address`, `email`, `mobile`, `contact_person`, `isActive`, `created_at`, `updated_at`) VALUES
	(1, 'Test', 'Test', 'tes', '0909', 'Tester', 0, '2022-05-24 11:01:03', '2022-05-24 11:01:18');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.surgeons
CREATE TABLE IF NOT EXISTS `surgeons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) unsigned DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.surgeons: ~2 rows (approximately)
/*!40000 ALTER TABLE `surgeons` DISABLE KEYS */;
INSERT INTO `surgeons` (`id`, `branch_id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Dr. Jones', 0, '2022-05-23 15:18:38', '2022-05-24 10:22:51'),
	(2, 1, 'Dr. Love', 0, '2022-05-23 15:18:47', '2022-05-23 15:18:47');
/*!40000 ALTER TABLE `surgeons` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype_id` int(11) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `agent_id` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email_verified_at`, `password`, `usertype_id`, `isActive`, `agent_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', NULL, '$2y$10$cIQZkl4QtUbC7PR7udyVj.18NusWq2yekDrzWREk2UWQIPR5G9i/W', 2, 0, NULL, NULL, NULL, NULL),
	(2, 'SAM', NULL, '$2y$10$cIQZkl4QtUbC7PR7udyVj.18NusWq2yekDrzWREk2UWQIPR5G9i/W', 1, 0, 1, NULL, '2022-05-26 14:59:43', '2022-05-26 14:59:43'),
	(3, 'WEWE', NULL, '$2y$10$D8RarMe4fwN1Lq6bUp5jyehOFqWdDPXZiNZdqvSDbkJYYEhy0pEuK', 1, 0, 2, NULL, '2022-05-26 14:59:50', '2022-05-26 14:59:50'),
	(4, 'stockuser', NULL, '$2y$10$liydaDjUiPKp7DwWkn.ddOTgyBz5OVerJpeDwBvwL/j8kLDvo0BNi', 4, 0, NULL, NULL, '2022-05-26 15:29:42', '2022-06-07 17:26:30'),
	(5, 'tech12345', NULL, '$2y$10$eKYWOyaTx0gCLx7NOIwOgeuIsskUylP/.e7wMpscq1e.aUQZmH2/K', 3, 0, NULL, NULL, '2022-05-30 09:10:30', '2022-05-30 09:10:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table bigbyte_os.usertypes
CREATE TABLE IF NOT EXISTS `usertypes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bigbyte_os.usertypes: ~4 rows (approximately)
/*!40000 ALTER TABLE `usertypes` DISABLE KEYS */;
INSERT INTO `usertypes` (`id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
	(1, 'Agent', 0, '2022-05-26 14:40:07', '2022-05-26 14:40:07'),
	(2, 'Administrator', 0, '2022-05-26 14:40:14', '2022-05-26 14:49:49'),
	(3, 'Technician', 0, '2022-05-26 14:40:20', '2022-05-26 14:40:20'),
	(4, 'Stock Clerk', 0, '2022-05-26 14:40:31', '2022-05-26 14:40:31');
/*!40000 ALTER TABLE `usertypes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
