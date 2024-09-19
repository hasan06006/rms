-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Feb 12, 2022 at 05:27 PM
=======
-- Generation Time: Jun 17, 2022 at 08:39 PM
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `advances`
--

CREATE TABLE `advances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `renter_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_amt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit_amt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD
--
-- Dumping data for table `advances`
--

INSERT INTO `advances` (`id`, `flat_id`, `building_id`, `name`, `renter_id`, `credit_amt`, `debit_amt`, `note`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '3', '1', 'admin', '3', '20000', NULL, NULL, '1', NULL, '2022-02-04 04:01:11', '2022-02-04 04:01:11'),
(2, '3', '1', 'admin', '3', NULL, '10000', NULL, '1', NULL, '2022-02-04 04:01:44', '2022-02-04 04:01:44'),
(3, '3', '1', 'admin', '3', '10000', NULL, NULL, '1', NULL, '2022-02-04 04:02:12', '2022-02-04 04:02:12'),
(4, '12', '1', 'nahid mia', '4', '20000', NULL, NULL, '1', NULL, '2022-02-05 14:15:43', '2022-02-05 14:15:43'),
(5, '17', '1', 'abrar', '8', '10000', NULL, NULL, '1', NULL, '2022-02-07 11:33:13', '2022-02-07 11:33:13'),
(6, '17', '1', 'abrar', '8', NULL, '5000', NULL, '1', NULL, '2022-02-07 11:39:00', '2022-02-07 11:39:00');

=======
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d
-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD
--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `name`, `description`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Baitul Haque', 'test', 'YES', '1', '1', '2022-02-11 13:48:29', '2022-02-11 13:58:25'),
(2, 'Haque Mansion', NULL, 'YES', '1', NULL, '2022-02-11 14:04:58', '2022-02-11 14:04:58');

=======
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d
-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD
--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_type`, `amount`, `note`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Withdrawal', '5000', 'dsdas', NULL, NULL, '2022-01-18 10:07:48', '2022-01-18 10:07:48'),
(3, '1', '10000', NULL, NULL, NULL, '2022-02-07 11:47:02', '2022-02-07 11:47:02');
=======
-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d

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
-- Table structure for table `flatinfos`
--

CREATE TABLE `flatinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renter_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD
--
-- Dumping data for table `flatinfos`
--

INSERT INTO `flatinfos` (`id`, `building_id`, `name`, `renter_category`, `rent_amt`, `note`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, '1', 'Flat B', 'GENERAL', '20000', 'adfasf', 'AVAILABLE', '1', NULL, '2022-01-18 01:28:41', '2022-02-05 09:08:52'),
(3, '1', 'Flat D', 'POSITIONED', '10000', 'fdafda dfsa', 'BOOKED', '1', NULL, '2022-01-18 01:35:26', '2022-01-18 04:45:42'),
(5, '1', 'F 1-C', 'GENERAL', '20000', '', 'AVAILABLE', '1', NULL, '2022-02-04 05:52:41', '2022-02-04 05:52:41'),
(6, '1', 'F 1-D', 'GENERAL', '15000', '', 'AVAILABLE', '1', NULL, '2022-02-04 05:53:03', '2022-02-04 05:53:03'),
(7, '1', 'F 2-A', 'GENERAL', '20000', '', 'AVAILABLE', '1', NULL, '2022-02-04 05:53:25', '2022-02-04 05:53:25'),
(8, '1', 'F 2-B', 'GENERAL', '12000', '', 'AVAILABLE', '1', NULL, '2022-02-04 05:54:47', '2022-02-04 05:54:47'),
(9, '1', 'F 2-C', 'GENERAL', '20000', '', 'AVAILABLE', '1', NULL, '2022-02-04 05:55:03', '2022-02-04 05:55:03'),
(10, '1', 'F 2-D', 'GENERAL', '20000', '', 'AVAILABLE', NULL, NULL, '2022-02-04 05:55:21', '2022-02-04 05:55:21'),
(11, '1', 'F 3- A', 'GENERAL', '20000', '', 'AVAILABLE', NULL, NULL, '2022-02-04 05:55:39', '2022-02-04 05:55:39'),
(12, '1', 'F 3-B', 'GENERAL', '20000', '', 'BOOKED', NULL, NULL, '2022-02-04 05:56:08', '2022-02-04 05:56:08'),
(13, '1', 'F 4-A', 'GENERAL', '20000', '', 'BOOKED', NULL, NULL, '2022-02-04 06:57:21', '2022-02-04 06:57:21'),
(14, '1', 'F 4-B', 'GENERAL', '15000', '', 'AVAILABLE', NULL, NULL, '2022-02-04 06:57:36', '2022-02-04 06:57:36'),
(15, '1', 'F 4-C', 'GENERAL', '20000', '', 'BOOKED', NULL, NULL, '2022-02-04 06:57:50', '2022-02-04 06:57:50'),
(16, '1', 'F 5-A', 'GENERAL', '20000', '', 'BOOKED', NULL, NULL, '2022-02-04 06:58:21', '2022-02-04 06:58:21'),
(17, '1', 'flat 5-2', 'GENERAL', '5000', '', 'AVAILABLE', NULL, NULL, '2022-02-07 05:28:46', '2022-02-07 05:28:46'),
(18, '2', 'Flat 3-5', 'GENERAL', '5000', '', 'BOOKED', NULL, NULL, '2022-02-07 06:19:35', '2022-02-07 06:19:35');

=======
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_01_17_100303_create_renterinfos_table', 2),
(10, '2022_01_18_151800_create_expenses_table', 4),
(12, '2022_01_22_185410_create_advances_table', 5),
(13, '2022_01_27_142135_create_rentcollections_table', 6),
(14, '2022_02_09_163639_create_rentprocessors_table', 7),
(15, '2022_01_18_123858_create_flatinfos_table', 8),
<<<<<<< HEAD
(16, '2022_02_11_184239_create_buildings_table', 8);
=======
(16, '2022_02_11_184239_create_buildings_table', 8),
(19, '2022_06_17_155500_create_expense_types_table', 9);
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentcollections`
--

CREATE TABLE `rentcollections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rent_for_month` date NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renter_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `electric_bill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gas_bill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others_bill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_paid_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD
--
-- Dumping data for table `rentcollections`
--

INSERT INTO `rentcollections` (`id`, `rent_for_month`, `month`, `year`, `building_id`, `flat_id`, `renter_id`, `rent_amt`, `electric_bill`, `gas_bill`, `others_bill`, `rent_paid_from`, `note`, `is_paid`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '2022-02-03', 'February', '2022', '1', '2', '2', '20000', '1000', '975', '200', 'GENERAL', NULL, NULL, '1', NULL, '2022-02-09 13:09:41', '2022-02-09 13:09:41'),
(2, '2022-02-04', 'February', '2022', '1', '3', '3', '10000', '1000', '975', '200', 'GENERAL', NULL, NULL, '1', NULL, '2022-02-09 13:13:21', '2022-02-09 13:13:21'),
(3, '2022-02-02', 'February', '2022', '1', '12', '4', '20000', '1000', '975', '200', 'GENERAL', NULL, NULL, '1', NULL, '2022-02-09 13:14:05', '2022-02-09 13:14:05'),
(4, '2022-01-05', 'January', '2022', '1', '15', '7', '20000', '1000', '975', '100', 'GENERAL', NULL, NULL, '1', '1', '2022-02-09 13:16:17', '2022-02-10 11:13:46'),
(5, '2022-01-01', 'January', '2022', '1', '2', '2', '20000', '1000', '975', '200', 'GENERAL', NULL, NULL, '1', NULL, '2022-02-09 13:21:00', '2022-02-09 13:21:00'),
(6, '2022-02-02', 'February', '2022', '1', '15', '7', '20000', '1000', '975', '200', 'GENERAL', NULL, NULL, '1', '1', '2022-02-10 11:13:10', '2022-02-10 11:34:45');

=======
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d
-- --------------------------------------------------------

--
-- Table structure for table `renterinfos`
--

CREATE TABLE `renterinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_flat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renter_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renterinfos`
--

INSERT INTO `renterinfos` (`id`, `name`, `father_name`, `nid`, `mobile`, `address`, `assigned_flat`, `building_id`, `renter_category`, `document`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'dasfas', 'asdfa', 'afas', 'afdas', 'fdsafa', '2', '1', 'General', '1642938909.jpg', 'INACTIVE', '1', NULL, '2022-01-23 05:55:09', '2022-02-06 13:24:43'),
(3, 'admin', 'admin', '6868878', '7988979', 'hkkjhjhk', '3', '1', 'General', '1642965277.jpg', 'ACTIVE', '1', NULL, '2022-01-23 13:14:37', '2022-01-23 13:58:11'),
(4, 'nahid mia', 'gahid mia', '46456343542', '07978987', 'hjkhkj', '12', '1', 'General', '1644092107.jpg', 'ACTIVE', '1', NULL, '2022-02-05 14:15:07', '2022-02-05 14:15:07'),
(5, 'pias', 'kamrul', '556576545', '77867678', 'hkjhjkhjkhk', '13', '1', 'General', '1644093747.jpg', 'ACTIVE', '1', NULL, '2022-02-05 14:42:27', '2022-02-11 07:30:43'),
(6, 'boni amin', 'moni amin', '657657657', '675656', 'hkkjhjhjg ghgj', '16', '1', 'General', '1644163431.jpg', 'ACTIVE', '1', NULL, '2022-02-06 10:03:51', '2022-02-06 10:03:51'),
(7, 'kana baba', 'sana baba', '65765754545456', '644546546', 'jhjggfg fgfghfgh', '15', '1', 'General', '1644163473.jpg', 'ACTIVE', '1', NULL, '2022-02-06 10:04:33', '2022-02-06 10:04:33'),
<<<<<<< HEAD
(8, 'abrar', 'xxxxxx', '45564645', '56576576', 'ggjhhg hghjgj', '18', '2', 'General', '1644255075.docx', 'ACTIVE', '1', NULL, '2022-02-07 11:31:15', '2022-02-08 11:29:36');
=======
(8, 'abrar', 'xxxxxx', '45564645', '56576576', 'ggjhhg hghjgj', '18', '2', 'General', '1644255075.docx', 'ACTIVE', '1', NULL, '2022-02-07 11:31:15', '2022-02-08 11:29:36'),
(10, 'mr zaman', 'mr akbar', '23432423', '01913343432', 'jfdskajfkl jkldjskaj', '2', '1', 'General', '1644775370.jpg', 'ACTIVE', '10', NULL, '2022-02-13 12:02:50', '2022-02-13 12:02:50'),
(11, 'tester', 'testing', '2343232131', '2343223423', 'testers testing area road test village best', '6', '1', 'General', NULL, 'ACTIVE', '11', NULL, '2022-03-02 04:32:36', '2022-03-02 04:32:36');
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d

-- --------------------------------------------------------

--
-- Table structure for table `rentprocessors`
--

CREATE TABLE `rentprocessors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rent_for_month` date NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renter_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `electric_bill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gas_bill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others_bill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_paid_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD
--
-- Dumping data for table `rentprocessors`
--

INSERT INTO `rentprocessors` (`id`, `rent_for_month`, `month`, `year`, `flat_id`, `building_id`, `renter_id`, `rent_amt`, `electric_bill`, `gas_bill`, `others_bill`, `rent_paid_from`, `note`, `is_paid`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '2022-02-03', 'February', '2022', '3', '1', '3', '10000', '', '', '', '', '', '', '1', '', '2022-02-10 06:12:24', '2022-02-10 06:12:24'),
(2, '2022-02-03', 'February', '2022', '12', '1', '4', '20000', '', '', '', '', '', '', '1', '', '2022-02-10 06:12:24', '2022-02-10 06:12:24'),
(3, '2022-02-03', 'February', '2022', '2', '1', '5', '20000', '', '', '', '', '', '', '1', '', '2022-02-10 06:12:24', '2022-02-10 06:12:24'),
(4, '2022-02-03', 'February', '2022', '16', '1', '6', '20000', '', '', '', '', '', '', '1', '', '2022-02-10 06:12:24', '2022-02-10 06:12:24'),
(5, '2022-02-03', 'February', '2022', '15', '1', '7', '20000', '', '', '', '', '', '', '1', '', '2022-02-10 06:12:24', '2022-02-10 06:12:24'),
(6, '2022-02-03', 'February', '2022', '18', '2', '8', '5000', '', '', '', '', '', '', '1', '', '2022-02-10 06:12:24', '2022-02-10 06:12:24'),
(7, '2022-01-01', 'January', '2022', '3', '1', '3', '10000', '', '', '', '', '', '', '1', '', '2022-02-10 07:06:52', '2022-02-10 07:06:52'),
(8, '2022-01-01', 'January', '2022', '12', '1', '4', '20000', '', '', '', '', '', '', '1', '', '2022-02-10 07:06:52', '2022-02-10 07:06:52'),
(9, '2022-01-01', 'January', '2022', '2', '1', '5', '20000', '', '', '', '', '', '', '1', '', '2022-02-10 07:06:52', '2022-02-10 07:06:52'),
(10, '2022-01-01', 'January', '2022', '16', '1', '6', '20000', '', '', '', '', '', '', '1', '', '2022-02-10 07:06:52', '2022-02-10 07:06:52'),
(11, '2022-01-01', 'January', '2022', '15', '1', '7', '20000', '', '', '', '', '', '', '1', '', '2022-02-10 07:06:52', '2022-02-10 07:06:52'),
(12, '2022-01-01', 'January', '2022', '18', '2', '8', '5000', '', '', '', '', '', '', '1', '', '2022-02-10 07:06:52', '2022-02-10 07:06:52');

=======
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role_name`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
<<<<<<< HEAD
(1, 'hasan', 'hasan', NULL, 'Admin', NULL, '$2y$10$ZEUPOpv2tT0/cAYn2KRQpOb9UHbISjwjrvVKfk9vOIBbgVpf2nS6q', 'RKU5a0CzVQkutNVVj4LsIRN1UM84VvcomKjPTPoTGKkd9dJNxwxAYy9Fm4Ep', '2022-01-16 00:08:11', '2022-01-16 00:08:11'),
(2, 'anchal', 'anchal', NULL, 'Admin', NULL, '$2y$10$78T/ZcvMXIG2ORR9wsTZue.4ItUeCq..O3U7lhDh8XlRwMUMsQp6.', NULL, '2022-01-16 01:29:23', '2022-01-16 01:29:23'),
(7, 'Rinku hasan', 'rinku', NULL, 'Admin', NULL, '$2y$10$TPZIgRMVETtptHon/uKNw.1amLqSxXGV40YcaXF3m/cPVDJqRxAvO', NULL, '2022-02-05 01:25:04', '2022-02-05 01:31:10'),
(8, 'pias', 'pias', NULL, 'Admin', NULL, '$2y$10$z9.ij2j9v8jP8ixfRGU7ouHSjPs81qs2K/jAPoljepdUgue9uf6ge', NULL, '2022-02-05 01:25:14', '2022-02-05 01:41:34'),
(9, 'Admin', 'admin', NULL, 'Admin', NULL, '$2y$10$mf3MozNgI9bwTsys.YRzpup2.vcRh4WRpPhYtZTV4FG2e/CEAuqhK', NULL, '2022-02-05 01:35:45', '2022-02-05 01:35:45'),
(10, 'roton', 'roton', NULL, 'User', NULL, '$2y$10$pI8nRDZxe2W06rJx.TsodOWAZn.Ri1sfiTSomzzwoLntTjPsRyn7i', NULL, '2022-02-10 15:05:59', '2022-02-10 15:05:59');
=======
(1, 'admin', 'admin', NULL, 'Admin', NULL, '$2y$10$L2g.yeSc/UIu3opA6q5d4OqYXZk9uXIxXmrOrp4kMFFGZNn4tF4jS', NULL, '2022-06-17 12:36:35', '2022-06-17 12:38:01');
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advances`
--
ALTER TABLE `advances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
=======
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`id`);

--
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flatinfos`
--
ALTER TABLE `flatinfos`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rentcollections`
--
ALTER TABLE `rentcollections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renterinfos`
--
ALTER TABLE `renterinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentprocessors`
--
ALTER TABLE `rentprocessors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advances`
--
ALTER TABLE `advances`
<<<<<<< HEAD
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
<<<<<<< HEAD
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
<<<<<<< HEAD
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flatinfos`
--
ALTER TABLE `flatinfos`
<<<<<<< HEAD
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
<<<<<<< HEAD
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
=======
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentcollections`
--
ALTER TABLE `rentcollections`
<<<<<<< HEAD
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d

--
-- AUTO_INCREMENT for table `renterinfos`
--
ALTER TABLE `renterinfos`
<<<<<<< HEAD
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d

--
-- AUTO_INCREMENT for table `rentprocessors`
--
ALTER TABLE `rentprocessors`
<<<<<<< HEAD
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
<<<<<<< HEAD
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
