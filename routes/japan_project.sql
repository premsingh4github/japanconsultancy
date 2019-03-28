-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 11:25 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `japan_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 3, '2019-03-27 10:46:08', '2019-03-27 10:46:08'),
(2, 3, '2019-03-27 10:59:08', '2019-03-27 10:59:08'),
(3, 3, '2019-03-28 02:45:14', '2019-03-28 02:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2019', '2019-02-19 13:38:20', '2019-02-19 13:38:20'),
(2, '2018', '2019-02-20 07:19:46', '2019-02-20 07:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `category_description` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_status` enum('Active','UnActive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'UnActive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Electronic Devices', NULL, 'Active', '2019-01-03 12:24:53', '2019-01-03 12:24:53'),
(2, 'Electronic Accessories', NULL, 'Active', '2019-01-03 12:25:17', '2019-01-03 12:48:00'),
(3, 'TV & Home Appliances', NULL, 'Active', '2019-01-03 12:25:39', '2019-01-03 12:48:00'),
(4, 'Health & Beauty', NULL, 'Active', '2019-01-03 12:25:55', '2019-01-03 12:47:59'),
(5, 'Babies & Toys', NULL, 'Active', '2019-01-03 12:26:10', '2019-01-03 12:47:52'),
(6, 'groceries & Pets', NULL, 'Active', '2019-01-03 12:26:35', '2019-01-03 12:47:52'),
(7, 'Home & Lifestyle', NULL, 'Active', '2019-01-03 12:26:54', '2019-01-03 12:47:51'),
(8, 'Women\'s Fashion', NULL, 'Active', '2019-01-03 12:27:12', '2019-01-03 12:47:51'),
(9, 'Watches & Accessories', NULL, 'Active', '2019-01-03 12:27:34', '2019-01-03 12:47:56'),
(10, 'Sports & Outdoor', NULL, 'Active', '2019-01-03 12:28:00', '2019-01-03 12:47:50'),
(11, 'Automotive & Motorbike', NULL, 'Active', '2019-01-03 12:28:21', '2019-01-03 12:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `class_batch_sections`
--

CREATE TABLE `class_batch_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_batch_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `shift` enum('morning','day') COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_batch_sections`
--

INSERT INTO `class_batch_sections` (`id`, `class_batch_id`, `section_id`, `shift`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'morning', '2019-03-01', '2019-07-31', '2019-02-19 13:38:51', '2019-03-28 02:43:19'),
(2, 2, 1, 'day', '2019-03-01', '2019-03-31', '2019-03-25 02:20:10', '2019-03-25 02:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `class_batch_subjects`
--

CREATE TABLE `class_batch_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_batch_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_rooms`
--

CREATE TABLE `class_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_rooms`
--

INSERT INTO `class_rooms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Batch', '2019-02-20 07:29:45', '2019-02-27 10:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `class_room_batches`
--

CREATE TABLE `class_room_batches` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_room_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_room_batches`
--

INSERT INTO `class_room_batches` (`id`, `class_room_id`, `batch_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-02-19 13:38:26', '2019-02-19 13:38:26'),
(2, 1, 2, '2019-02-26 18:49:53', '2019-02-26 18:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `class_section_days`
--

CREATE TABLE `class_section_days` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_section_id` int(11) DEFAULT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_section_students`
--

CREATE TABLE `class_section_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_section_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_section_students`
--

INSERT INTO `class_section_students` (`id`, `class_section_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2019-02-19 13:39:15', '2019-02-19 13:39:15'),
(2, 1, 4, '2019-02-19 13:39:15', '2019-02-19 13:39:15'),
(3, 1, 5, '2019-02-19 13:39:15', '2019-02-19 13:39:15'),
(4, 1, 41, '2019-02-23 11:30:41', '2019-02-23 11:30:41'),
(5, 2, 49, '2019-03-27 10:56:03', '2019-03-27 10:56:03'),
(6, 2, 51, '2019-03-27 10:56:03', '2019-03-27 10:56:03'),
(7, 1, 52, '2019-03-27 10:56:03', '2019-03-27 10:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Nepal', '2019-02-13 13:43:38', '2019-02-13 13:43:38'),
(2, 'Japan', '2019-02-13 13:43:38', '2019-02-13 13:43:38'),
(3, 'Uzbekistan', NULL, NULL),
(4, 'Vietnam', NULL, NULL),
(5, 'China', NULL, NULL),
(6, 'Korea', NULL, NULL),
(7, 'Srilanka', NULL, NULL),
(8, 'Mynmar', NULL, NULL),
(9, 'Bangladesh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_models`
--

CREATE TABLE `event_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_22_142948_create_roles_table', 1),
(4, '2019_01_22_143333_update_users_table', 1),
(5, '2019_01_24_064926_create_class_rooms_table', 1),
(6, '2019_01_24_065141_create_batches_table', 1),
(7, '2019_01_24_065805_create_class_room_batches_table', 1),
(8, '2019_01_26_034501_create_sections_table', 1),
(9, '2019_01_26_034713_create_subjects_table', 1),
(10, '2019_01_28_064842_create_teachers_table', 1),
(11, '2019_01_31_045628_create_class_batch_sections_table', 1),
(12, '2019_01_31_050710_create_class_batch_subjects_table', 1),
(13, '2019_01_31_051135_create_class_section_students_table', 1),
(14, '2019_01_31_051659_create_student_optionals_table', 1),
(15, '2019_02_04_112743_create_holidays_table', 1),
(16, '2019_02_05_035306_create_class_section_days_table', 1),
(17, '2019_02_05_043024_create_students_table', 1),
(18, '2019_02_06_073442_create_country_table', 1),
(19, '2019_02_06_080139_create_section_periods_table', 1),
(20, '2019_02_06_081934_create_attendances_table', 1),
(21, '2019_02_13_153747_create_residensal_card_times_table', 1),
(22, '2019_03_21_054238_create_teacher_subjects_table', 2),
(23, '2019_03_26_061217_create_event_models_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `residensal_card_times`
--

CREATE TABLE `residensal_card_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `residensal_card_times`
--

INSERT INTO `residensal_card_times` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '6 Month', '2019-02-14 01:43:41', '2019-02-14 01:43:41'),
(2, '1 Year', '2019-02-14 01:43:55', '2019-02-14 01:43:55'),
(3, '1year6month', '2019-02-14 01:44:28', '2019-02-15 07:11:10'),
(4, '２年', '2019-02-14 18:30:12', '2019-02-14 18:30:12'),
(5, '１year3month', '2019-02-15 07:09:42', '2019-02-15 07:09:42'),
(6, '2year3month', '2019-02-15 07:10:07', '2019-02-15 07:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-02-13 13:43:38', '2019-02-13 13:43:38'),
(2, 'staff', '2019-02-13 13:43:38', '2019-02-13 13:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A Section', '2019-02-19 13:36:20', '2019-02-19 13:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `section_periods`
--

CREATE TABLE `section_periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_s_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_at` timestamp NULL DEFAULT NULL,
  `end_at` timestamp NULL DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `last_student_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_student_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_student_japanese_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_student_japanese_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_room_batch_id` int(11) DEFAULT NULL,
  `student_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residensal_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_sex` enum('m','f','o') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'm',
  `country_id` int(11) DEFAULT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residensalCardTime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residensal_card_expire` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_time_job_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_where_they_works` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_where_they_works` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nearest_station` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_id` int(11) DEFAULT NULL,
  `subject_optional_id` int(11) DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_of_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nearest_station1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '留学',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `last_student_name`, `first_student_name`, `last_student_japanese_name`, `first_student_japanese_name`, `class_room_batch_id`, `student_number`, `residensal_card`, `student_sex`, `country_id`, `date_of_birth`, `entry_date`, `expire_date`, `residensalCardTime`, `residensal_card_expire`, `address`, `personal_phone_number`, `part_time_job_name`, `phone_where_they_works`, `address_where_they_works`, `nearest_station`, `student_note`, `unique_id`, `subject_optional_id`, `photo`, `student_of_year`, `nearest_station1`, `student_status`, `created_at`, `updated_at`) VALUES
(3, 'TAMANG', 'SUNITA', 'タマン', 'スニタ', 1, '19154', 'PN41216042EA', 'f', 1, '1995-02-28', '2019-04-06', '2020-03-31', '1', '2021-04-20', '東京都板橋区舟渡3－13－15　レオパレスリベール404号室', '090-4418-4315', 'マクドナルド西荻窪店', '03-3395-7076', '新宿区百人町1丁目20－3バラードハイム新宿渡辺ビル201', '西荻窪駅', NULL, 1917603, 1, '0.44812500 1550125476.jpg', '第1学年', NULL, '留学', '2019-02-14 12:24:36', '2019-02-27 14:15:22'),
(4, 'KHADKA', 'ISHWOR', 'カドカ　', 'イソル', 1, '19131', 'PN73206078EA', 'm', 1, '1993-03-28', '2019-04-06', '2020-03-31', '2', '2019-08-17', '東京都新宿区北新宿3－9－17　藤本荘105号室', '070-2021-7322', NULL, NULL, NULL, NULL, NULL, 1911604, NULL, '0.10385400 1550137471.jpg', '第1学年', NULL, '留学', '2019-02-14 15:44:31', '2019-02-27 13:58:58'),
(5, 'OLI', 'GHANSHYAM', 'オリ', 'ガンシャム', 1, '19132', 'PN12268002EA', 'm', 1, '1995-02-27', '2019-04-06', '2020-03-31', '2', '2019-08-17', '東京都新宿区大久保1－12－21　第8コート新宿205号室', '070-4211-5701', NULL, NULL, NULL, NULL, NULL, 1968925, NULL, '0.50599500 1550144225.jpg', '第1学年', NULL, '留学', '2019-02-14 17:37:05', '2019-02-27 13:59:36'),
(6, 'BHUJEL', 'AASHIS', 'ブジェル', 'アシス', 1, '19133', 'EG22093323RD', 'm', 1, '1997-12-07', '2019-04-06', '2020-03-31', '4', '2019-07-13', '山口県萩市大字椿東3000-10　専門学校さくら国際言語学院寮', '070-7566-4635', '㈱博多魚嘉 仙崎事業所', '0837-23-3940', '山口県長門市東深川駅前643-1', '長門市駅', NULL, 1955126, NULL, '0.05643400 1550144533.jpg', '第1学年', NULL, '留学', '2019-02-14 17:42:13', '2019-02-27 14:00:35'),
(7, 'GURUNG', 'RITA', 'グルン', 'リタ', 1, '19134', 'EG75220312RD', 'f', 1, '1996-03-16', '2019-04-06', '2020-03-31', '4', '2019-07-13', '山口県萩市大字椿東3000-10　専門学校さくら国際言語学院寮', '080-2944-2447', NULL, NULL, NULL, NULL, NULL, 1955027, 1, '0.43374700 1550147375.jpg', '第1学年', NULL, '留学', '2019-02-14 18:29:35', '2019-02-27 14:01:23'),
(8, 'GURUNG', 'RAKHI', 'グルン', 'ラキ', 1, '19101', '2019/07/23', 'f', 1, '1992-10-10', '2019-04-06', '2020-03-31', NULL, '2019-07-23', '東京都新宿区北新宿1－16－3　せぴあ館201号室', '090-9327-2694', '羽田クロノゲート　ヤマト運輸㈱', '03-6756-7165', '東京都大田区羽田旭町11-1', NULL, NULL, 1942148, 1, '0.33817200 1550161107.jpg', '第1学年', NULL, '留学', '2019-02-14 22:18:27', '2019-02-26 20:23:09'),
(9, 'GHARTHI  MAGAR', 'CHANDRA  PRASAD', 'ガルティ　マガル', 'チャンドラ　プラサド', 1, '19102', 'PN63129511EA', 'm', 1, '1996-09-29', '2019-04-06', '2020-03-31', NULL, '2019-04-13', '東京都新宿区百人町1－22－20　トミイビル201号室', '070-2172-1441', '羽田クロノゲート　ヤマト運輸㈱', '03-6756-7165', '東京都大田区羽田旭町11-1', NULL, NULL, 1934709, 1, '0.79334600 1550168461.jpg', '第1学年', NULL, '留学', '2019-02-15 00:21:01', '2019-02-27 08:25:47'),
(10, 'TOSHPULATOV', 'UTKUR', 'トシプラトフ', 'ウタクロ', 1, '19103', 'PN93263573FA', 'm', 3, '1990-05-13', '2019-04-06', '2020-03-31', NULL, '2019-04-04', '東京都新宿区北新宿4－3－11　ユモドスクエア北新宿205号室', '080-9299-2618', 'セブン-イレブン 新大久保駅西店', '03-5386-0053', '東京都新宿区百人町1-15-21', NULL, NULL, 19620210, NULL, '0.09463300 1550170318.jpg', '第1学年', NULL, '留学', '2019-02-15 00:51:58', '2019-02-27 08:26:57'),
(11, 'LE  VAN', 'DINH', 'レ　ヴァン', 'ジン', 1, '19104', 'PN92620182EA', 'm', 4, '1997-08-24', '2019-04-06', '2020-03-31', '2', '2019-08-14', '東京都新宿区下落合4-22-13　林ビル301号室', '070-4316-5928', NULL, NULL, NULL, NULL, NULL, 19552211, NULL, '0.44048600 1550171284.jpg', '第1学年', NULL, '留学', '2019-02-15 01:08:04', '2019-02-27 08:28:54'),
(12, 'PETHTHA MESTIYAGE  CHAMINDA', 'DESHAPPRIYA', 'ペッタ　メシヤゲ　チャミンダ', 'テシャピカ', 1, '19105', 'PN06306158EA', 'm', 7, '1989-06-27', '2019-04-06', '2020-03-31', '1', '2019-05-06', '東京都豊島区南長崎3－31－5　パラゼット南長崎101号室', '070-4806-8944', '新東京ベース店　ヤマト運輸㈱', '03-3799-6138', '東京都品川区八潮3-2-35', '品川駅', NULL, 19514512, 1, '0.40055500 1550172143.jpg', '第1学年', NULL, '留学', '2019-02-15 01:22:23', '2019-02-27 08:31:41'),
(13, 'RAUT', 'SUNIL', 'ラウト', 'スニル', 1, '19106', 'PN68524925EA', 'm', 1, '1992-11-25', '2019-04-06', '2020-03-31', '2', '2019-07-26', '東京都新宿区北新宿4－16－11　パルフェ北新宿101号室', '090-4244-8144', '神奈川ベース店　ヤマト運輸㈱', '045-500-5149', '神奈川県横浜市鶴見区安善町1-1-1　', '安善町駅', NULL, 19930713, NULL, '0.84067700 1550172551.jpg', '第1学年', NULL, '留学', '2019-02-15 01:29:11', '2019-02-27 08:32:53'),
(14, 'SEN  THAKURI', 'BISHAL', 'セン　タクリ', 'ビサル', 1, '19107', 'PN71777011EA', 'm', 1, '1997-01-09', '2019-04-06', '2020-03-31', '1', '2019-04-19', '東京都新宿区北新宿4－28－1－202', '080-6640-8080', 'マクドナルド赤坂駅前店', '03-3585-0306', '東京都港区赤坂5-4-5', '赤坂駅', NULL, 19984414, 1, '0.85404900 1550173135.jpg', '第1学年', NULL, '留学', '2019-02-15 01:38:55', '2019-02-27 08:35:35'),
(15, 'NGUYEN  HOAI', 'NAM', 'グウェン　ホアイ', 'ナム', 1, '19108', 'PN66442530EA', 'm', 4, '1998-01-26', '2019-04-06', '2020-03-31', '2', '2019-07-05', '東京都足立区小台2－20－17　クレイノODAIYOU 204号室', '070-4984-1550', '羽田クロノゲート　ヤマト運輸㈱', '03-6756-7165', '東京都大田区羽田旭町11-1', '穴守稲荷駅', NULL, 19556115, NULL, '0.69904200 1550174084.jpg', '第1学年', NULL, '留学', '2019-02-15 01:54:44', '2019-02-27 08:38:37'),
(16, 'TAMANG', 'ARTHA  BAHADUR', 'タマン', 'アルタ　バハドゥル', 1, '19109', 'EG04304647FA', 'm', 1, '1993-04-14', '2019-04-06', '2020-03-31', '5', '2019-02-04', '東京都豊島区北大塚2－22－4　巣鴨新田アパート2F', '080-6785-2095', NULL, NULL, NULL, NULL, NULL, 19641516, NULL, '0.51910600 1550174536.jpg', '第1学年', NULL, '留学', '2019-02-15 02:02:16', '2019-02-27 08:41:19'),
(17, 'TURSUNOV', 'DALER', 'テウルスノブ', 'ダレル', 1, '19110', 'PN15437670EA', 'm', 3, '1995-02-04', '2019-04-06', '2020-03-31', '1', '2019-03-31', '東京都豊島区巣鴨5－39－5　ローベンハイツ巣鴨102号室', '080-8163-6671', '東京法人営業支店　ヤマト運輸㈱', '03-5564-3734', '東京都江東区有明1-6-26', '田町駅', NULL, 19999117, 1, '0.32542900 1550175058.jpg', '第1学年', NULL, '留学', '2019-02-15 02:10:58', '2019-02-27 08:50:02'),
(18, 'PANDAY', 'NAGILA  SIRJANA', 'パンディ', 'ナギラ　シルジャナ', 1, '19135', 'EG71484718GA', 'f', 1, '1992-03-21', '2019-04-06', '2020-03-31', '4', '2019-12-10', '東京都新宿区高田馬場3－25－21　昇峰ハイム2　103号室', '080-5678-2981', '羽田クロノゲート　ヤマト運輸㈱', '03-6756-7165', '東京都大田区羽田旭町11-1', '穴守稲荷駅', NULL, 19775218, NULL, '0.26102100 1550192689.jpg', '第1学年', NULL, '留学', '2019-02-15 07:04:49', '2019-02-27 14:02:07'),
(19, 'LE  QUANG', 'MINH', 'レ　クアン　', 'ミン', 1, '19155', 'PN24114958GA', 'm', 4, '1995-12-24', '2018-06-12', '10-02-11', NULL, '2019-04-12', '埼玉県吉川市木売2－12－5　吉田ハイツ101号室', NULL, '新東京ベース店　ヤマト運輸㈱', '03-3799-6138', '東京都品川区八潮3-2-35', '品川駅', NULL, 19938019, 5, '0.70806700 1550193356.jpg', '第1学年', '吉川駅', '留学', '2019-02-15 07:15:56', '2019-02-15 07:15:56'),
(20, 'VU', 'NHAT  GIANG', 'ブー', '　ニャット　ヤン', 1, '19136', 'PN09509491EA', 'm', 4, '1998-06-11', '2019-04-06', '2020-03-31', '2', '2019-07-05', '埼玉県戸田市川岸3－5－8　レオパレスシルフィー206号室', '070-4453-7055', NULL, NULL, NULL, NULL, NULL, 19818420, NULL, '0.61034100 1550193424.jpg', '第1学年', NULL, '留学', '2019-02-15 07:17:04', '2019-02-27 14:02:51'),
(21, 'SILWAL', 'ADHIKARI  RASMITA', 'シルワル', '　アディカリ　ラスミタ', 1, '19137', 'PN38018037EA', 'f', 1, '1995-03-24', '2019-04-06', '2020-03-31', '2', '2019-08-21', '東京都豊島区千早1－14－14', '080-5046-8933', NULL, NULL, NULL, NULL, NULL, 19731121, NULL, '0.79908900 1550193705.jpg', '第1学年', NULL, '留学', '2019-02-15 07:21:45', '2019-02-27 14:03:28'),
(22, 'GURUNG', 'KABITA', 'グルン　', 'カビタ', 1, '19156', 'EG94302119FA', 'f', 1, '1993-01-01', '2019-04-06', '2020-03-31', '5', '2019-02-23', '東京都豊島区千早1－36－6　ライベスト池袋Ⅱ　103号室', '080-5416-1993', '㈱東京オペレーションパートナーズ', '03-5757-9339', '東京都大田区羽田空港3-1-1 W1棟', '羽田空港国内線ターミナル', NULL, 19728622, NULL, '0.79855800 1550194189.jpg', '第1学年', NULL, '留学', '2019-02-15 07:29:49', '2019-02-27 14:15:56'),
(23, 'G C', 'ANJALI', 'ジーシー アンザリ', 'アンザリ', 1, '19138', 'PN40763483EA', 'f', 1, '1997-05-02', '2019-04-06', '2020-03-31', '1', '2019-05-12', '東京都板橋区板橋1－26－1ハイツヤギシタ202号室', '070-2192-0230', '磯丸水産 人形町店', '03-5643-7580', '東京都中央区日本橋人形町1-4-10 人形町センタービル1F', '都営浅草線　人形町駅', NULL, 19145523, 1, '0.90494100 1550194240.jpg', '第1学年', NULL, '留学', '2019-02-15 07:30:40', '2019-02-27 14:04:03'),
(24, 'GURUNG', 'CHOK  NARAYAN', 'グルン　', 'チョク　ナラヤン', 1, '19157', 'PN06877467EA', 'm', 1, '1992-09-15', '2019-04-06', '2020-03-31', '2', '2019-07-23', '東京都中野区中央3－16－15　アスパ中野101号室', '080-1736-6295', 'ファミリーマート 武蔵小杉駅北口店', '044-739-0380', '神奈川県川崎市中原区小杉町１－４０３－６０', '武蔵小杉駅', NULL, 19481724, NULL, '0.39886600 1550194447.jpg', '第1学年', NULL, '留学', '2019-02-15 07:34:07', '2019-02-27 14:16:34'),
(25, 'K C', 'PRADEEP', 'ケーシー　', 'プラディプ', 1, '19139', 'PN10871573GA', 'm', 1, '1991-11-02', '2019-04-06', '2020-03-31', '5', '2019-04-10', '東京都新宿区北新宿3－5－16　セドルハイム304号室', '070-4533-8549', 'マクドナルド 恵比寿駅前店', '03-3444-0762', '東京都渋谷区恵比寿1-10-10', '恵比寿駅', NULL, 19803225, NULL, '0.35400000 1550194484.jpg', '第1学年', NULL, '留学', '2019-02-15 07:34:44', '2019-02-27 14:04:45'),
(26, 'SAPKOTA', 'PRATIMA', 'サプコタ　', 'プロティマ', 1, '19158', 'PN36757165EA', 'f', 1, '1992-11-03', '2019-04-06', '2020-03-31', '2', '2019-07-26', '東京都新宿区北新宿1－27－6　カーサ島田203号室', '090-4175-7158', NULL, NULL, NULL, NULL, NULL, 19331626, NULL, '0.41637400 1550194635.jpg', '第1学年', NULL, '留学', '2019-02-15 07:37:15', '2019-02-27 14:17:21'),
(27, 'KUMESTHERU', 'ARACHCHIGE  NISANKA  PUSHPA  KUMARA', 'クメステル　', 'アラッチゲ　ニサンカ　プシュパ　クマラ', 1, '19140', 'EG70950466FA', 'm', 7, '1991-01-22', '2019-04-06', '2020-03-31', '5', '2018-12-28', '千葉県市川市下新宿22－18　藤ハイツ101号室', '080-9299-4305', NULL, NULL, NULL, NULL, NULL, 19564927, NULL, '0.42765800 1550194665.jpg', '第1学年', NULL, '留学', '2019-02-15 07:37:45', '2019-02-27 14:05:48'),
(28, 'PARAJULI', 'TILAK  RAM', 'パラズリ　', 'ティラク　ラム', 1, '19141', 'PN50869392EA', 'm', 1, '1996-02-21', '2019-04-06', '2020-03-31', '2', '2019-08-01', '東京都豊島区池袋3－37－7　太考荘201号室', '080-9351-3885', NULL, NULL, NULL, NULL, NULL, 19504228, NULL, '0.99624400 1550194830.jpg', '第1学年', NULL, '留学', '2019-02-15 07:40:30', '2019-02-27 14:06:31'),
(29, 'NGUYEN', 'VIET  CUONG', 'グエン　', 'ヴィエット　クオン', 1, '19159', 'PN05828883GA', 'm', 4, '1988-06-10', '2019-04-06', '2020-03-31', '5', '2019-04-11', '東京都新宿区新宿7－6－13　東山荘102号室', '090-1543-1988', '新東京ベース店　ヤマト運輸㈱', '03-3799-6138', '東京都品川区八潮3-2-35', '品川駅', NULL, 19108829, NULL, '0.59843400 1550194878.jpg', '第1学年', NULL, '留学', '2019-02-15 07:41:18', '2019-02-27 14:18:02'),
(30, 'PAUDEL', 'SARITA', 'パウデル', '　サリタ', 1, '19142', 'PN19455353EA', 'f', 1, '1990-09-26', '2019-04-06', '2020-03-31', '1', '2019-04-15', '東京都大田区西六郷1－14－2　ストーク西六郷203号室', '090-9345-9417', NULL, NULL, NULL, NULL, NULL, 19589330, 1, '0.39722300 1550195070.jpg', '第1学年', NULL, '留学', '2019-02-15 07:44:30', '2019-02-27 14:07:13'),
(31, 'PHAM', 'THI  LAM', 'ファム　', 'ティ　ラム', 1, '19160', 'PN30155268FA', 'f', 4, '1996-12-28', '2019-04-06', '2020-03-31', '5', '2019-04-18', '東京都新宿区北新宿1－30－30-112', '080-1050-6886', '三洋ビル管理株式会社', '03-6417-4810', '東京都目黒区下目黒1-6-20 明治安田生命目黒ビル2F', '品川駅', NULL, 19170031, NULL, '0.12096900 1550195129.jpg', '第1学年', NULL, '留学', '2019-02-15 07:45:29', '2019-02-27 14:18:37'),
(32, 'KC', 'EROJ', 'ケーシー　', 'イロズ', 1, '19161', 'PN80130165EA', 'm', 1, '1998-01-27', '2019-04-06', '2020-03-31', '5', '2019-02-09', '東京都新宿区北新宿4−28−1−202', '080-9812-1624', '株式会社慶和', '0422-49-3221', '東京都武蔵野市吉祥寺南2-4-18', 'JR吉祥寺駅', NULL, 19214732, NULL, '0.91806800 1550195314.jpg', '第1学年', NULL, '留学', '2019-02-15 07:48:34', '2019-02-27 14:19:12'),
(33, 'PAUDEL', 'SUNIL', 'パウデル　', 'スニル', 1, '19162', 'PN51499103EA', 'm', 1, '1998-11-27', '2019-04-06', '2020-03-31', '2', '2019-07-19', '東京都新宿区北新宿4−28−1−302', '080-6544-7164', '池尻大橋駅北店　FamilyMart', '03-5779-5206', '東京都目黒区大橋2-24-1', '池尻大橋駅', NULL, 19104533, NULL, '0.03700200 1550195474.jpg', '第1学年', NULL, '留学', '2019-02-15 07:51:14', '2019-02-27 14:19:45'),
(34, 'SHRESTHA', 'DURGA', 'セレスタ　', 'ドゥルガ', 1, '19163', 'DU98866323FA', 'f', 1, '1995-09-05', '2019-04-06', '2020-03-31', '6', '2019-01-03', '埼玉県蕨市南町2－6－17　第3エンゼルハイツ103号室', '080-4194-9843', NULL, NULL, NULL, NULL, NULL, 19271634, NULL, '0.19616200 1550195617.jpg', '第1学年', NULL, '留学', '2019-02-15 07:53:37', '2019-02-27 14:20:34'),
(35, 'KC', 'REBATI', 'ケーシー　', 'レバティ', 1, '19164', 'PN42832830ED', 'f', 1, '1993-05-14', '2019-04-06', '2020-03-31', '1', '2019-05-26', '埼玉県志木市本町5－5－15　第2志木ハイツ105号室', '070-3536-1855', NULL, NULL, NULL, NULL, NULL, 19425435, 1, '0.79215000 1550195755.jpg', '第1学年', NULL, '留学', '2019-02-15 07:55:55', '2019-02-27 14:21:10'),
(36, 'KHADKA', 'GAURI', 'カドカ　', 'ゴウリ', 1, '19165', 'EG15582984EA', 'f', 1, '1994-02-10', '2019-04-06', '2020-03-31', '5', '2019-01-25', '東京都豊島区東池袋2－48－3　コーポ87　203号室', '080-5902-2560', NULL, NULL, NULL, NULL, NULL, 19439036, NULL, '0.61135800 1550195866.jpg', '第1学年', NULL, '留学', '2019-02-15 07:57:46', '2019-02-27 14:21:46'),
(37, 'THAPA', 'SITA', 'タパ　', 'シタ', 1, '19166', 'EG05656748GA', 'f', 1, '1998-01-25', '2019-04-06', '2020-03-31', '5', '2019-02-15', '東京都豊島区池袋3－20－9　サクラハウス201号室', '090-3599-7793', NULL, NULL, NULL, NULL, NULL, 19796237, NULL, '0.74297500 1550196018.jpg', '第1学年', NULL, '留学', '2019-02-15 08:00:18', '2019-02-27 14:22:25'),
(38, 'POUDEL', 'ANKIT', 'パウダル　', 'アンキト', 1, '19167', 'PN60722394EA', 'm', 1, '1996-01-13', '2019-04-06', '2020-03-31', '2', '2019-08-28', '神奈川県川崎市川崎区本町2－11－4　河原崎荘201号室', '070-3884-9384', '㈱東京オペレーションパートナーズ', '03-5757-9339', '東京都大田区羽田空港3-1-1 W1棟', '羽田空港国内線ターミナル', NULL, 19331838, NULL, '0.13241200 1550196210.jpg', '第1学年', NULL, '留学', '2019-02-15 08:03:30', '2019-02-27 14:22:58'),
(39, 'MIN', 'OO', 'ミン　', 'ウー', 1, '19168', 'PN21052569EA', 'm', 8, '1991-01-27', '2019-04-06', '2020-03-31', '1', '2019-04-10', '東京都新宿区大久保2－14－2　老本ビル4－B', '080-5035-9183', '秀山 (シュウザン)', '03-3354-6347', '東京都新宿区歌舞伎町1-2-2 サブナード地下街', '新宿駅', NULL, 19100039, 1, '0.01607100 1550196418.jpg', '第1学年', NULL, '留学', '2019-02-15 08:06:58', '2019-02-27 14:23:29'),
(40, 'THAPA', 'SAMPADHA', 'タパ', '　サマパダ', 1, '19143', 'PN81445313EA', 'f', 1, '1998-08-16', '2019-04-06', '2020-03-31', '1', '2019-04-15', '東京都台東区入谷1－16－10', '090-9344-9186', NULL, NULL, NULL, NULL, NULL, 19109140, 1, '0.14523900 1550196476.jpg', '第1学年', NULL, '留学', '2019-02-15 08:07:56', '2019-02-27 14:07:46'),
(41, 'SUBEDI', 'KRISHNA  KUMARI', 'スベディ　', 'クリシュナ　クマリ', 1, '19169', 'PN33103844EA', 'f', 1, '1989-09-06', '2019-04-06', '2020-03-31', '2', '2019-05-28', '東京都北区中里2－4－7　銀座コーポ202号室', '090-4240-1586', 'トオカツフーズ株式会社', '048-225-6711', '埼玉県川口市元郷4丁目5-1', '川口駅', NULL, 19382741, NULL, '0.10022700 1550196554.jpg', '第1学年', NULL, '留学', '2019-02-15 08:09:14', '2019-02-27 14:26:27'),
(42, 'MAHARJAN', 'JAYASYA', 'マハラザン　', 'ザヤサ', 1, '19170', 'DU17933585FA', 'f', 1, '1995-08-28', '2019-04-06', '2020-03-31', '6', '2019-01-12', '埼玉県川口市中青木2－19－40　レオパレスクエールアピテ203号室', '070-3668-9817', 'ロイヤルホスト 九段下店', '03-3230-2251', '東京都千代田区九段北1-13-12 北の丸スクエア1F', '九段下駅', NULL, 19312242, NULL, '0.61742900 1550196711.jpg', '第1学年', NULL, '留学', '2019-02-15 08:11:51', '2019-02-27 14:27:19'),
(43, 'PARIYAR', 'ROJINA', 'パリャラ', '　ロジナ', 1, '19144', 'PN25401703EA', 'f', 1, '1994-08-11', '2019-04-06', '2020-03-31', '1', '2019-06-17', '東京都江戸川区平井5－5－6　全観スカイハイツ203号室', '090-8442-3266', 'セブンイレブン 亀戸3丁目店', '03-3637-4513', '東京都江東区亀戸3丁目23-1', '亀戸駅', NULL, 19633643, 1, '0.41655000 1550196817.jpg', '第1学年', NULL, '留学', '2019-02-15 08:13:37', '2019-02-27 14:08:32'),
(44, 'POUDEL', 'GANGA', 'ポウデル　', 'ガンガ', 1, '19171', 'PN02081266EA', 'f', 1, '1993-04-20', '2019-04-06', '2020-03-31', '1', '2018-10-16', '東京都大東区千束2-18-5 リケン303号室', '090-9648-6231', NULL, NULL, NULL, NULL, NULL, 19913844, 1, '0.65349600 1550196826.jpg', '第1学年', NULL, '留学', '2019-02-15 08:13:46', '2019-02-27 14:28:27'),
(45, 'THAPA', 'CHHETRI  SEEMA', 'タパ　', 'チェトリ　シマ', 1, '19145', 'PN61062464EA', 'f', 1, '1994-11-29', '2019-04-06', '2020-03-31', '2', '2019-06-05', '東京都豊島区池袋3－20－9　サクラハウス201号室', '070-2157-9720', NULL, NULL, NULL, NULL, NULL, 19438645, NULL, '0.50423000 1550196968.jpg', '第1学年', NULL, '留学', '2019-02-15 08:16:08', '2019-02-27 14:09:18'),
(46, 'RAI  CHAMLING', 'YOGESH  ROSHAN', 'ライ チャムリン　', 'ヨゲス　ロスン', 1, '19172', 'PN20511030EA', 'm', 1, '1996-11-07', '2019-04-06', '2020-03-31', '2', '2019-08-20', '東京都北区田端新町1－23－3　ホワイトハイツ田端女子寮401号室', '080-5046-1863', '羽田クロノゲート　ヤマト運輸㈱', '03-6756-7165', '東京都大田区羽田旭町11-1', '穴守稲荷駅', NULL, 19420846, NULL, '0.43205200 1550196977.jpg', '第1学年', NULL, '留学', '2019-02-15 08:16:17', '2019-02-27 14:29:16'),
(47, 'OLI', 'PRAKASH', 'オリ　', 'プラカス', 1, '19173', 'PN79723505EA', 'm', 1, '1997-06-02', '2019-04-06', '2020-03-31', '5', '2019-01-30', '東京都新宿区北新宿4－28－1－202号室', '080-8153-1799', 'SGフィルダー㈱　', '03-6834-2733', '東京都江東区青梅4-1-16', '東京テレポート駅', NULL, 19157947, NULL, '0.74807400 1550197227.jpg', '第1学年', NULL, '留学', '2019-02-15 08:20:27', '2019-02-27 14:30:03'),
(48, 'LAMA', 'SANJEEV', 'ラマ', '　サンジバ', 1, '19146', 'PN57038201EA', 'm', 1, '1998-12-09', '2019-04-06', '2020-03-31', '1', '2019-05-20', '東京都新宿区上落合2－1－10　富士ビル206号室', '090-6348-6228', NULL, NULL, NULL, NULL, NULL, 19634748, 1, '0.53829200 1550197246.jpg', '第1学年', NULL, '留学', '2019-02-15 08:20:46', '2019-02-27 14:10:04'),
(49, 'CHAUDHARY', 'NARESH', 'チョウダリ　', 'ナレス', 1, '19174', 'PN11978240EA', 'm', 1, '1997-05-15', '2019-04-06', '2020-03-31', '1', '2019-04-26', '東京都豊島区上池袋2－12－3　リーベルトシマ302号室', '070-3838-8021', '一軒め酒場 歌舞伎町一番街店', '03-5285-4080', '東京都新宿区歌舞伎町1-17-5 和田久ビル地下1階', '西部新宿駅', NULL, 19494549, 1, '0.59854400 1550197364.jpg', '第1学年', NULL, '留学', '2019-02-15 08:22:44', '2019-02-27 14:30:40'),
(50, 'JAMKATTEL', 'GANESH', 'ザマカテル', 'ガネス', 1, '19147', 'PN91816085EA', 'm', 1, '1997-04-17', '2019-04-06', '2020-03-31', '2', '2019-07-20', '東京都豊島区池袋4－28－1　林マンション304号室', '080-5499-9008', NULL, NULL, NULL, NULL, NULL, 19167150, NULL, '0.41093500 1550197417.jpg', '第1学年', NULL, '留学', '2019-02-15 08:23:37', '2019-02-27 14:10:40'),
(51, 'ADHIKARI', 'LAXMI', 'アディカリ　', 'ラクシュミ', 1, '19175', 'PN80108694EA', 'f', 1, '1997-12-26', '2019-04-06', '2020-03-31', '2', '2019-08-29', '東京都文京区目白台2-9-4-302', '070-4043-4684', 'マクドナルド青山店', '03-3423-0710', '東京都港区北青山3-3-7', '原宿駅', NULL, 19552751, NULL, '0.91027300 1550197534.jpg', '第1学年', NULL, '留学', '2019-02-15 08:25:34', '2019-02-27 14:31:13'),
(52, 'KHADKA', 'SAMJIB', 'カドカ　', 'サンジバ', 1, '19176', 'PN84798921EA', 'm', 1, '1995-08-26', '2019-04-06', '2020-03-31', '2', '2019-08-17', '東京都豊島区南大塚1-30-13コーポ武幸301', '080-2389-7861', NULL, NULL, NULL, NULL, NULL, 19598652, NULL, '0.69812900 1550197663.jpg', '第1学年', NULL, '留学', '2019-02-15 08:27:43', '2019-02-27 14:31:54'),
(53, 'GURUNG', 'AMBAR  BAHADUR', 'グルン', 'アンバル　バハドル', 1, '19111', 'PN66933652EA', 'm', 1, '1995-11-18', '2019-04-06', '2020-03-31', '2', '2019-07-23', '東京都新宿区北新宿3－18－12　メゾンT・O 101号室', '080-6256-4366', NULL, NULL, NULL, NULL, NULL, 19769753, NULL, '0.14793100 1550198164.jpg', '第1学年', NULL, '留学', '2019-02-15 08:36:04', '2019-02-27 08:54:53'),
(54, 'GIRI', 'RAJU', 'ギリ', '　ラジュ', 1, '19148', 'PN13151191EA', 'm', 1, '1991-04-30', '2019-04-06', '2020-03-31', '2', '2019-07-13', '東京都豊島区池袋3－37－7　太考荘201号室', '070-1069-3947', NULL, NULL, NULL, NULL, NULL, 19852254, NULL, '0.79790400 1550198448.jpg', '第1学年', NULL, '留学', '2019-02-15 08:40:48', '2019-02-27 14:11:20'),
(55, 'GURUNG', 'MANISHA', 'グルング', 'マニシャ', 1, '19149', 'PN64370869EA', 'f', 1, '1993-12-24', '2019-04-06', '2020-03-31', '1', '2019-04-12', '東京都台東区浅草橋4－6－1　建部ビル2FE', '080-5037-1452', 'ワールドエンタプライズ株式会社', '044-281-1935', '神奈川県川崎市川崎区殿町3-26- 1', '川島新田駅', NULL, 19727955, 1, '0.81904700 1550198645.jpg', '第1学年', NULL, '留学', '2019-02-15 08:44:05', '2019-02-27 14:12:10'),
(56, 'LAMA', 'KIRAN', 'ラマ', 'キラン', 1, '19150', 'EG47988570EA', 'm', 1, '1994-06-29', '2019-04-06', '2020-03-31', '4', '2019-07-28', '東京都上池袋1－17－5', '080-3963-5404', NULL, NULL, NULL, NULL, NULL, 19667356, NULL, '0.69707100 1550198802.jpg', '第1学年', NULL, '留学', '2019-02-15 08:46:42', '2019-02-27 14:12:50'),
(57, 'OLI', 'PABAN', 'オリ', 'パバン', 1, '19112', 'PN95076094EA', 'm', 1, '1991-07-31', '2019-04-06', '2020-03-31', '2', '2019-08-10', '東京都新宿区大久保1－12－21　第8コート新宿205号室', '080-1383-7778', '神奈川ベース店　ヤマト運輸㈱', '045-500-5149', '神奈川県横浜市鶴見区安善町1-1-1　', '安善町駅', NULL, 19897357, NULL, '0.03926500 1550198968.jpg', '第1学年', NULL, '留学', '2019-02-15 08:49:28', '2019-02-27 08:56:06'),
(58, 'MAXAMMATIBROXIMOV', 'AZIZBEK', 'マハマディロヒモフ　', 'アズズベク', 1, '19151', 'EG66510901FA', 'm', 3, '1992-04-17', '2019-04-06', '2020-03-31', '5', '2019-03-26', '東京都北区滝野川3－51－6　レオパレスルミエール206号室', '070-4466-3553', 'SGフィルダー㈱　城南営業所', '03-3799-8691', '東京都品川区八潮3-2-38', '品川駅', NULL, 19225558, NULL, '0.91425900 1550199003.jpg', '第1学年', NULL, '留学', '2019-02-15 08:50:03', '2019-02-27 14:13:24'),
(59, 'ACHARYA', 'SHILA', 'アチャリャ', '　シラ', 1, '19152', 'PN22832871EA', 'f', 1, '1986-07-04', '2019-04-06', '2020-03-31', '1', '2019-04-04', '東京都新宿区高田馬場4－28－13　Y.Oマンション402号室', '090-6155-9078', NULL, NULL, NULL, NULL, NULL, 19258859, 1, '0.99707800 1550199168.jpg', '第1学年', NULL, '留学', '2019-02-15 08:52:48', '2019-02-27 14:14:00'),
(60, 'CHHANTYAL', 'NISHA', 'チャンタル', '　ニシャ', 1, '19153', 'PN30058932EA', 'f', 1, '1998-08-03', '2019-04-06', '2020-03-31', '1', '2019-05-23', '東京都板橋区舟渡3－13－15　レオパレスリベール404号室', '080-5898-7261', 'マクドナルド青山店', '03-3423-0710', '東京都港区北青山3-3-7', '表参道駅', NULL, 19390860, 1, '0.83102500 1550199486.jpg', '第1学年', NULL, '留学', '2019-02-15 08:58:06', '2019-02-27 14:14:38'),
(61, 'BHUSAL', 'BISHNU  PRASAD', 'ブザル', 'ビスヌ　プラサド', 1, '19113', 'PN80963429EA', 'm', 1, '1991-08-03', '2019-04-06', '2020-03-31', '2', '2019-07-24', '東京都新宿区新宿7－6－13　東山荘401号室', '080-9395-0498', NULL, NULL, NULL, NULL, NULL, 19943661, NULL, NULL, '第1学年', NULL, '留学', '2019-02-15 08:59:29', '2019-02-27 08:56:59'),
(62, 'SHERPA', 'LAKPADIKI', 'シェルパ', 'ラクパディキ', 1, '19114', 'PN48280672EA', 'f', 1, '1993-04-15', '2019-02-27', '2020-03-31', '1', '2019-04-15', '東京都板橋区舟渡3－13－15　レオパレスリベール404号室', '090-4419-8289', 'マクドナルド西荻窪店', '03-3395-7076', '東京都杉並区西荻南3-24-1', NULL, NULL, 19237562, 1, '0.12917500 1550201053.jpg', '第1学年', NULL, '留学', '2019-02-15 09:24:13', '2019-02-27 08:58:14'),
(63, 'TAMANG', 'TARA', 'タマン', 'タラ', 1, '19115', 'PN80807434EA', 'f', 1, '1997-06-10', '2019-04-06', '2020-03-31', '1', '2019-04-26', '埼玉県戸田市大字新曽956番地　フジレジデンスⅡ　102号室', '080-9397-9249', 'ファミリーマート 板橋舟渡二丁目店', '03-5916-9171', '東京都板橋区舟渡二丁目２１番２', '浮間舟渡駅', NULL, 19578163, 1, '0.91259200 1550206381.jpg', '第1学年', NULL, '留学', '2019-02-15 10:53:01', '2019-02-27 13:31:18'),
(64, 'POUDEL', 'SHIVA', 'パウデル', 'シバ', 1, '19116', 'PN73438574EA', 'm', 1, '1997-02-14', '2019-04-06', '2020-03-31', '2', '2019-08-14', '東京都板橋区富士見町20－32', '080-1391-4495', NULL, NULL, NULL, NULL, NULL, 19484964, NULL, '0.80399900 1550206956.jpg', '第1学年', NULL, '留学', '2019-02-15 11:02:36', '2019-02-27 13:32:44'),
(65, 'RAI', 'NIKHIL', 'ライ', '二キル', 1, '19117', 'PN25458155EB', 'm', 1, '1996-01-23', '2019-04-06', '2020-03-31', '1', '2019-04-03', '栃木県宇都宮市南大通り1－1－12　宇都宮ダイカンプラザスポーツメント404号室', '070-3529-7149', 'ハイボール酒場 宇都宮駅西口店', '028-678-4744', '栃木県宇都宮市大通り3-1-2', '宇都宮駅', NULL, 19551965, 1, '0.91586700 1550207971.jpg', '第1学年', NULL, '留学', '2019-02-15 11:19:31', '2019-02-27 13:33:26'),
(66, 'PURI', 'MABIN', 'プリ', 'マビン', 1, '19118', 'PN04238464EB', 'm', 1, '1994-05-10', '2019-04-06', '2020-03-31', '1', '2019-04-03', '栃木県宇都宮市南大通り1－1－12　宇都宮ダイカンプラザスポーツメント404号室', '090-8056-0853', 'ハイボール酒場 宇都宮駅西口店', '028-678-4744', '栃木県宇都宮市大通り3-1-2', '宇都宮駅', NULL, 19418766, 1, '0.11338000 1550208255.jpg', '第1学年', NULL, '留学', '2019-02-15 11:24:15', '2019-02-27 13:35:52'),
(67, 'SHRESTHA', 'SUSHANT', 'シレスタ', 'スサント', 1, '19119', 'PN68058166EB', 'm', 1, '1996-11-27', '2019-04-06', '2020-03-31', '1', '2019-04-03', '栃木県宇都宮市南大通り1－1－12　宇都宮ダイカンプラザスポーツメント404号室', '090-8052-8866', '東洋ビューティ', '028-687-2250', '栃木県芳賀郡芳賀町芳賀台３８－５', '宇都宮駅', NULL, 19326567, 1, '0.89650900 1550209485.jpg', '第1学年', NULL, '留学', '2019-02-15 11:44:45', '2019-02-27 13:37:48'),
(68, 'BHATTARAI', 'PUJA', 'バトライ', 'プザ', 1, '19120', 'PN46652724EA', 'f', 1, '1996-08-07', '2019-04-06', '2020-03-31', '2', '2019-07-26', '東京都新宿区百人町2－21－11　シエスタ永和Ⅰ　103号室', '080-5047-2085', NULL, NULL, NULL, NULL, NULL, 19611068, NULL, '0.09798000 1550210874.jpg', '第1学年', NULL, '留学', '2019-02-15 12:07:54', '2019-02-27 13:39:27'),
(69, 'PARAJULI  BHAT', 'BHUPENDRA', 'パラジュリ　バット', 'ブペンドラ', 1, '19121', 'EG42723700RD', 'm', 1, '1996-05-07', '2019-04-06', '2020-03-31', '6', '2019-08-11', '山口県萩市大字椿東3000-10　専門学校さくら国際言語学院寮', '080-2755-1926', 'フジミツ株式会社', '0837-22-3354', '山口県長門市三隅下2378-31', '長門市三隅駅', NULL, 19570769, NULL, '0.45894900 1550212621.jpg', '第1学年', NULL, '留学', '2019-02-15 12:37:01', '2019-02-27 13:40:17'),
(70, 'PAUDEL', 'BHOLARAJ', 'ポウデル', 'ボララズ', 1, '19122', 'EG83158091RD', 'm', 1, '1994-12-09', '2019-04-06', '2020-03-31', '6', '2019-08-14', '山口県萩市大字椿東3000-10　専門学校さくら国際言語学院寮', '080-2884-8464', 'デリカサラダボーイ㈱山口', '083-974-3900', '山口県山口市小郡上郷５２６２', '上郷駅', NULL, 19406470, NULL, '0.20070100 1550213048.jpg', '第1学年', NULL, '留学', '2019-02-15 12:44:08', '2019-02-27 13:41:08'),
(71, 'ACHARYA  NEUPANE', 'URMILA', 'アチャリャ　ネウパネ', 'ウルミラ', 1, '19123', 'EG27924025GA', 'f', 1, '1993-04-07', '2019-04-06', '2020-03-31', '5', '2019-01-15', '東京都杉並区天沼1－1－14　ゆたか荘', '080-5198-4845', 'TOKYO CRAFT LAND 銀座', '03-6263-8715', '東京都中央区銀座5-4-1　西五ビルB1', '銀座駅', NULL, 19182771, 1, '0.10165700 1550214883.jpg', '第1学年', NULL, '留学', '2019-02-15 13:14:43', '2019-02-27 13:41:55'),
(72, 'SIMKHADA', 'SITTAL', 'シマカダ', 'シタル', 1, '19124', 'PN35179549EA', 'm', 1, '1991-03-02', '2019-04-06', '2020-03-31', '2', '2019-04-09', '東京都新宿区百人町2－18－9　グリーンハイツ202号室', '080-6722-4885', NULL, NULL, NULL, NULL, NULL, 19206872, NULL, '0.10329300 1550221264.jpg', '第1学年', NULL, '留学', '2019-02-15 15:01:04', '2019-02-27 13:42:35'),
(73, 'TIWARI  PANDAY', 'SARITA', 'ティワリ  パンダイ', 'サリタ', 1, '19125', 'EG87373685GA', 'f', 1, '1992-11-28', '2019-04-06', '2020-03-31', '4', '2019-12-10', '東京都新宿区高田馬場3－25－21　昇峰ハイム2　103号室', '080-5680-7202', 'マクドナルド第一京浜鮫洲店', '03-5783-3312', '東京都品川区東大井1-2-20', '鮫洲駅', NULL, 19153773, NULL, '0.53115800 1550221642.jpg', '第1学年', NULL, '留学', '2019-02-15 15:07:22', '2019-02-27 13:43:20'),
(74, 'ADHIKARI  HUMAGAIN', 'YAMUNA', 'アディカリ　フマガイン', 'ヤムナ', 1, '19126', 'PN01029888FA', 'f', 1, '1993-03-17', '2019-04-06', '2020-03-31', '4', '2020-01-04', '東京都新宿区高田馬場3－25－21　昇峰ハイム2　103号室', '090-9333-6285', 'マクドナルド恵比寿駅前店', '03-3444-0761', '東京都渋谷区恵比寿1-10-10', 'JR恵比寿駅', NULL, 19175174, NULL, '0.23834700 1550222473.jpg', '第1学年', NULL, '留学', '2019-02-15 15:21:13', '2019-02-27 13:44:16'),
(75, 'ZHAO', 'CHU  LEI', 'チョウ', 'ソレイ', 1, '19127', 'EG86078049FA', 'm', 5, '1999-03-07', '2019-04-06', '2020-03-31', '5', '2019-01-06', '東京都文京区大塚5－7－11－603号室', '080-3093-5070', 'していない', NULL, NULL, NULL, NULL, 19489975, NULL, '0.40832600 1550224892.jpg', '第1学年', NULL, '留学', '2019-02-15 16:01:32', '2019-02-27 13:45:19'),
(76, 'SHRESTHA', 'ARCHANA', 'スレスタ', 'アルツアナ', 1, '19128', 'PN57792482QG', 'f', 1, '1995-08-19', '2019-04-06', '2020-03-31', '4', '2019-07-13', '山口県萩市大字椿東3000-10　専門学校さくら国際言語学院寮', '080-2944-3868', 'セブン‐イレブン　萩古萩町店', '0838-22-0225', '山口県萩市大字古萩町25-5', '東萩駅', NULL, 19898076, NULL, '0.90177100 1550225530.jpg', '第1学年', NULL, '留学', '2019-02-15 16:12:10', '2019-02-27 13:46:03'),
(77, 'GURUNG', 'SACHIN', 'グルン', 'サチン', 1, '19129', 'EG80537358RD', 'm', 1, '1992-11-28', '2019-04-06', '2020-03-31', '6', '2019-08-14', '山口県萩市大字椿東3000-10　専門学校さくら国際言語学院寮', '080-2946-4640', 'デリカサラダボーイ㈱山口', '083-974-3900', '山口県山口市小郡上郷５２６２', '上郷駅', NULL, 19188877, NULL, '0.34254900 1550225844.jpg', '第1学年', NULL, '留学', '2019-02-15 16:17:24', '2019-02-27 13:46:44'),
(78, 'BHANDARI　', 'BIBEK', 'バンダリ　', 'ビベク', 2, '18124', 'PN00321050EA', 'm', 1, '1992-04-05', '2018-04-06', '2020-03-31', '4', '2020-05-25', '東京都中野区上高田3丁目18番6号薬師パレスマンション501', '080-6489-9658', 'ローソン中野セントラルパークイースト', '03-3387-3930', '東京都中野区中野4-10-1', '中野', NULL, 18984078, 1, '422d33c37a71d5ecb3b73ad3a638c23a.1551011302.jpg', '第2学年', NULL, '留学', '2019-02-20 13:42:13', '2019-02-26 14:35:45'),
(79, 'RAI　', 'SUNIL', 'ライ　', 'スニル', 2, '18125', 'PN55441866EA', 'm', 1, '1997-06-23', '2018-04-06', '2020-03-31', '2', '2019-06-11', '東京都中野区上高田3丁目18番6号薬師パレスマンション501', '080-6489-2351', NULL, NULL, NULL, NULL, NULL, 18237879, 1, '8f160d4c9a06a60e675752cf951aea49.1551011496.jpg', '第2学年', NULL, '留学', '2019-02-20 13:45:20', '2019-02-26 14:36:26'),
(80, 'GAHATRAJ　', 'KANTA', 'ガハタラズ　', 'カンタ', 2, '18126', 'PN86201286EF', 'f', 1, '1993-08-06', '2018-04-06', '2020-03-31', '2', '2019-08-14', '東京都杉並区阿佐谷北2丁目6番15号エーデルワイス201', '080-5384-5862', '（株）ケー・エキスプレス（レストラン）つるとんたん羽田店', '03-6428-0326', '東京都大田区羽田空港2-6-5国際線ターミナル4F', '羽田空港国際ターミナル', NULL, 18365980, 1, 'd64c372150c3eb9ae10fc0abedefe040.1551011527.jpg', '第2学年', NULL, '留学', '2019-02-20 13:49:36', '2019-02-26 14:36:41'),
(81, 'GOTAME　', 'ISHWOR', 'ゴタメ　', 'イソル', 2, '18127', 'PN12185215EA', 'm', 1, '1997-11-10', '2018-04-06', '2020-03-31', '4', '2020-07-13', '東京都北区赤羽北2丁目19番6-204号 メゾン・ド•プラネット', '090-9381-1484', 'ヤマト運輸株式会社', '045-500-5149', '神奈川県横浜市鶴見区安善町1-1-1', '浅野・安善', NULL, 18568281, 1, 'b2852e6de10522d6fae03c4e55c30cae.1551011556.jpg', '第2学年', NULL, '留学', '2019-02-20 13:52:36', '2019-02-26 14:36:54'),
(82, 'PHAM THI 　', 'THUY　LINH', 'ファン　ティ　', 'トゥイ　リン', 2, '18128', 'PN14224873EF', 'f', 4, '1997-04-22', '2018-04-06', '2020-03-31', '4', '2020-07-19', '東京都新宿区下落合1-2-13 フェリスロータス102', '070-2159-4873', '海と', '03-5954-2620', '東京都豊島区高田3-13-6', '高田馬場', NULL, 18356782, 1, 'b850896432e2d4c9ac6983e01d3d9fc0.1551011633.jpg', '第2学年', NULL, '留学', '2019-02-20 13:55:23', '2019-02-26 14:37:08'),
(83, 'BUDHATHOKI', 'SAMJHANA', 'ブダトキ　', 'サムザナ', 2, '18129', 'PN42301209EA', 'f', 1, '1988-04-23', '2018-04-06', '2020-03-31', '2', '2019-04-03', '東京都新宿区北新宿3-5-25 レオーベンハイム201', '070-1045-7799', 'ヤマト運輸神奈川主管', '045-500-5149', '神奈川県横浜市鶴見区安善町1-1-1', '浅野・安善', NULL, 18985083, 1, '3a67bdf1aee9be564d30c4518096c541.1551011672.jpg', '第2学年', NULL, '留学', '2019-02-20 13:58:21', '2019-02-26 14:37:20'),
(84, 'LAMICHHANE', 'GOVINDA PRASAD', 'ラミチャネ　', 'ゴビンダ　パラサド', 2, '18136', 'PN18365445EA', 'm', 1, '1978-05-18', '2018-04-06', '2020-03-31', '4', '2020-07-02', '東京都新宿区百人町2丁目20番20号アーバンリーベ103', '070-1949-0264', '日本マクドナルド（株）東新宿駅前店', '03-5291-8235', '東京都新宿区新宿6-29-10', '東新宿', NULL, 18484084, 1, '2c72b3f77c41dda9f57d5abdd8bace96.1551011742.jpg', '第2学年', NULL, '留学', '2019-02-20 14:06:12', '2019-02-26 14:38:32'),
(85, 'DO　THI　', 'TUYET　NHUNG', 'ド　ティ　', 'テゥエット　ニュン', 2, '18139', 'EG13526252EF', 'f', 4, '1993-12-14', '2018-04-06', '2020-03-31', '2', '2018-09-19', '東京都新宿区北新宿2-6-5 ハイツ柏木102', '080-6898-9294', 'ローソン', '03-6212-8012', '東京都千代田区丸の内2-6-1', '東京', NULL, 18866685, 1, '183b88cb799478a3327a7ca5f216f247.1551011771.jpg', '第2学年', NULL, '留学', '2019-02-20 14:10:04', '2019-02-26 14:39:22'),
(86, 'DONG　', 'VAN　DAI', 'ドン　', 'ヴァン　ダイ', 2, '18140', 'PN27825039EF', 'm', 4, '1993-08-20', '2028-04-06', '2020-03-31', '4', '2020-05-01', '東京都新宿区下落合1-2-13 フェリスロータス102', '070-2159-4474', 'ファミリーマート', '03-3524-8224', '東京都中央区築地6-4-10', NULL, NULL, 18825486, 1, '308f2ed65f9fe9c2f71ba8485501594b.1551011796.jpg', '第2学年', NULL, '留学', '2019-02-20 14:13:26', '2019-02-26 14:39:57'),
(87, 'KHAREL BHUMI PRASAD', 'BHUMI PRASAD', 'カーレル　', 'ブミ　プラサド', 2, '18141', 'PN49823572EA', 'm', 1, '1986-05-29', '2018-04-06', '2020-03-31', '2', '2019-07-09', '東京都新宿区百人町1丁目9番8号  アーバンフジ101', '080-9107-6929', 'セブンイレブン', '03-3470-7119', '東京都港区六本木6-1-3', '六本木', NULL, 18330987, 1, '22bd752862bf6192824e919a25ad1f1a.1551011825.jpg', '第2学年', NULL, '留学', '2019-02-20 14:15:52', '2019-02-26 14:40:45'),
(88, 'TAMANG', 'PREM  KUMAR', 'タマング　', 'ペレム　クマル', 2, '18142', 'PN47875737EA', 'm', 1, '1989-11-27', '2018-04-06', '2020-03-31', '2', '2019-07-23', '東京都新宿区北新宿1丁目35番14号東新マンション303', '070-4734-1405', '金の蔵　新宿ペレット店', '03-5909-5650', '東京都新宿区西新宿1−1−1パレットビル6F', '新宿・新宿西口', NULL, 18651288, 1, 'b3ed3719e497368cc85014920c31671e.1551011850.jpg', '第2学年', NULL, '留学', '2019-02-20 14:18:15', '2019-02-26 14:41:22'),
(89, 'MAHATO', 'RAJESH  KUMAR', 'マハト　', 'ラゼス　クマル', 2, '18143', 'PN17840330EF', 'm', 1, '1992-02-29', '2018-04-06', '2020-03-31', '4', '2020-08-17', '東京都豊島区西巣鴨1丁目3番19号ホワイトハイツ大塚学生寮別棟101号', '070-3544-1631', 'ヤマト運輸株式会社', '0120-555-643', '東京都大田区羽田旭町11-1', '整備場', NULL, 18132489, 1, '5b6e29aede942ed7ca43c3bc1a51f1bc.1551011875.jpg', '第2学年', NULL, '留学', '2019-02-20 14:20:39', '2019-02-26 14:42:00'),
(90, 'KANDEL　PAUDEL　', 'PARBATI', 'カンデル　パウデル　', 'パルバティ', 2, '18144', 'PN44132791EA', 'f', 1, '1991-11-24', '2018-04-06', '2020-03-31', '2', '2019-08-22', '東京都中野区東中野1丁目46番21号パーシモン東中野101', '070-3620-0462', '（株）武蔵野フーズ　ムサシノ食品部所沢工場', '049-259-5228', '埼玉県入間郡三芳町竹間沢東15-7', '柳瀬川・新座', NULL, 18257490, 1, '0441a7195440425d5f4b0a976e4c38bf.1551011903.jpg', '第2学年', NULL, '留学', '2019-02-20 14:22:52', '2019-02-26 14:43:01'),
(91, 'LAMA', 'NABINA', 'ラマ　', 'ナビナ', 2, '18145', 'PN99671229ED', 'f', 1, '1993-08-02', '2018-04-06', '2020-03-31', '1', '2019-04-25', '埼玉県和光市白子1丁目24番6号小泉荘', '090-4412-7218', 'ローソン', '03-5948-5290', '東京都北区上十条2-30-1', '十条', NULL, 18126091, 1, '02108759409ddc6b592ec9f49e69cfc9.1551011955.jpg', '第2学年', NULL, '留学', '2019-02-20 14:26:30', '2019-02-26 14:43:36'),
(92, 'MAGAR', 'MILAN', 'マガル　', 'ミラン', 2, '18146', 'PN92542835EA', 'm', 1, '1995-05-07', '2018-04-06', '2020-03-31', '2', '2019-03-28', '東京都新宿区下落合4丁目9番1号プチハイツY・T104', '070-3848-3160', 'ローソン港一の橋店', '03-5442-0397', '東京都港区麻布十番4-3-1', '麻布十番', NULL, 18744292, 1, 'f700cee972ac962b4e8178f1e5027fa0.1551011982.jpg', '第2学年', NULL, '留学', '2019-02-20 14:29:41', '2019-02-26 14:44:14'),
(93, 'POUDEL　', 'SABIN', 'ポウデル　', 'サビン', 2, '18147', 'PN97952435EA', 'm', 1, '1995-10-23', '2018-04-06', '2020-03-31', '2', '2019-05-09', '東京都新宿区大久保2丁目33番3号ロッソ新大久保C棟103', '070-4347-0990', 'ファミリマート　恵比寿二丁目店', '03-6408-5010', '東京都渋谷区恵比寿2-29-2', '恵比寿・白金高輪', NULL, 18783293, 1, '6eee5dbcb00012325e3ee0c80388ad8b.1551012008.jpg', '第2学年', NULL, '留学', '2019-02-20 14:32:36', '2019-02-26 14:44:46'),
(94, 'GURUNG　', 'SONIKA　', 'グルン　', 'ソニカ', 2, '18148', 'PN90165317EA', 'f', 1, '1985-10-14', '2018-04-06', '2020-03-31', '2', '2019-05-10', '東京都中野区東中野2-34-2 桜山ハウス102', '070-3996-0834', 'ワールドエンタプライズ（株）', '044-281-1935', '神奈川県川崎市川崎区殿町3-26-1', '小鳥新田', NULL, 18804694, 1, '9f0eb1170f6e3373b1aad8fd8183dc33.1551012030.jpg', '第2学年', NULL, '留学', '2019-02-20 14:34:50', '2019-02-26 14:45:21'),
(95, 'TANDUKAR　', 'SANGITA', 'タンデュカル　', 'サンギタ', 2, '18149', 'PN82426980EF', 'f', 1, '1992-07-07', '2018-04-06', '2020-03-31', '4', '2020-08-27', '東京都豊島区長崎2丁目11番10号椎名町マンションH号', '070-3548-0833', '日本マクドナルド（株）西武新宿駅前店', '03-6273-8101', '東京都新宿区歌舞伎町1-24-1', '西武新宿', NULL, 18879595, 1, '06cf692946bc2728b0da1ad61e87161c.1551012085.jpg', '第2学年', NULL, '留学', '2019-02-20 14:37:12', '2019-02-26 14:45:57'),
(96, 'SAPKOTA　', 'KALPANA', 'サプコタ　', 'カルパナ', 2, '18150', 'PN10690284EF', 'f', 1, '1994-11-24', '2018-04-06', '2020-03-31', '4', '2020-09-27', '東京都板橋区板橋4丁目11番10-107号イシイビル', '070-3620-0550', 'ヤマト運輸神奈川ベース店', '045-500-5149', '神奈川県横浜市鶴見区安善町1-1-1', '浅野・安善', NULL, 18385096, 1, 'e5bc5f3836c3faacfa44f53c47e206d0.1551012127.jpg', '第2学年', NULL, '留学', '2019-02-20 14:40:40', '2019-02-26 14:46:30'),
(97, 'SINGH', 'GYANENDRA  PRASAD', 'シン　', 'ギャネンドラ　プラサド', 2, '18152', 'PN94576629EA', 'm', 1, '1990-02-01', '2018-04-06', '2020-03-31', '4', '2020-05-14', '東京都上落合1丁目9番15号福室ビル303', '080-6764-8194', 'ヤマト運輸神奈川ベース店', '045-751-3729', '神奈川県横浜市鶴見区安善町1-1-1', '浅野・安善', NULL, 18186797, 1, '8e248e1bad774b19bb03b1bc60ebc57e.1551012224.jpg', '第2学年', NULL, '留学', '2019-02-20 14:46:03', '2019-02-26 14:49:05'),
(98, 'PAUDYAL　', 'GOPI　PRASAD', 'パウデル　', 'ゴピ　プラサド', 2, '18153', 'PN96824373EA', 'm', 1, '1986-04-15', '2018-04-06', '2020-03-31', '2', '2019-05-14', '東京都豊島区池袋4丁目30番9号ハイツ新井201号', '080-6250-4664', 'S・TEC株式会社', '03-3235-9888', '東京都新宿区岩戸町14番地 神楽坂不二ビル2-D', '牛込神楽坂', NULL, 18555698, 1, '544d4001986956872063dd1c2e77396a.1551012256.jpg', '第2学年', NULL, '留学', '2019-02-20 14:48:41', '2019-02-26 14:49:59'),
(99, 'DAHAL　', 'BIDUR', 'ダハル　', 'ビズラ', 2, '18154', 'PN76322241EA', 'm', 1, '1994-04-20', '2018-04-06', '2020-03-31', '2', '2019-06-21', '東京都板橋区板橋4丁目11番10-107号イシイビル', '080-6765-2984', 'ヤマト運輸神奈川ベース店', '045-500-5149', '神奈川県横浜市鶴見区安善町1-1-1', '浅野・安善', NULL, 18912199, 1, '564141d46e4a369a6460979d4e936217.1551012294.jpg', '第2学年', NULL, '留学', '2019-02-20 14:51:10', '2019-02-26 14:50:45'),
(100, 'GHIMIRE', 'APSARA', 'ギミレ　', 'アプサラ', 2, '18155', 'PN78755846EA', 'f', 1, '1990-05-02', '2018-04-06', '2020-03-31', '2', '2019-09-11', '東京都新宿区高田馬場2丁目6番10号関ビル406A', '070-3546-3203', '株式会社カスタマーディライト', '03-5925-8258', '東京都新宿区新宿2-8-5', '新宿三丁目・新宿御苑前', NULL, 188900100, 1, '1364d994de76d170c34e742f23a87a15.1551012340.jpg', '第2学年', NULL, '留学', '2019-02-20 14:53:28', '2019-02-26 14:53:24'),
(101, 'MAGAR　', 'AMBIKA', 'マガル　', 'アンビカ', 2, '18156', 'PN91731940EA', 'f', 1, '1991-12-08', '2018-04-06', '2020-03-31', '2', '2019-03-28', '東京都杉並区天沼1-15-8 サニーハイツ101', '070-3848-3185', 'ねぎし　フードサービス', '03-6908-5306', '東京都中野区東中野1-11-10エヌアンドエフビル4F', '中野坂上・東中野', NULL, 186124101, 1, 'b13c5d263d8b1553cd290970a8d7abae.1551012367.jpg', '第2学年', NULL, '留学', '2019-02-20 14:55:54', '2019-02-26 14:54:18'),
(102, 'DARLAMI', 'BISHESH KUMAR', 'ダラミ　', 'ビセス　クマル', 2, '18159', 'PN75871944EA', 'm', 1, '1990-06-29', '2018-04-06', '2020-03-31', '4', '2020-05-25', '東京都北区田端1丁目10番9号パシフィックハイツ102号', '070-1499-8587', 'ヤマト運輸神奈川ベース店', '045-500-5149', '神奈川県横浜市鶴見区安善町1-1-1', '浅野・安善', NULL, 186894102, 1, '70bfd6003ea9ddc40ac0f3debe2d33f8.1551012399.jpg', '第2学年', NULL, '留学', '2019-02-20 14:59:17', '2019-02-26 14:55:53'),
(103, 'BHATTARAI　', 'NIROSH', 'バタライ　', 'ニロス', 2, '18160', 'PN09046309EA', 'm', 1, '1993-04-17', '2018-04-06', '2020-03-31', '2', '2019-04-25', '東京都豊島区南池袋1丁目5番2号 井上荘101号', '090-9317-3259', NULL, NULL, NULL, NULL, NULL, 187080103, 1, '2696285675f2afebf5db0e67702d9ccd.1551012432.jpg', '第2学年', NULL, '留学', '2019-02-20 15:02:27', '2019-02-26 14:57:04'),
(104, 'LU', 'YU  TING', 'リク　', 'ギョクテイ', 2, '18161', 'PN54874673EA', 'f', 4, '1994-11-11', '2018-04-06', '2020-03-31', '4', '2020-08-17', '東京都豊島区池袋3丁目56番8号グリーンヴィレッジ402号', '070-3662-1091', 'セブンイレブン港区三田3丁目店', '03-3798-5033', '東京都港区三田3-7-15', '田町', NULL, 183757104, 1, 'eaf338fcba9f72228df6a33978e51753.1551012465.jpg', '第2学年', NULL, '留学', '2019-02-20 15:04:52', '2019-02-26 14:58:00'),
(105, 'TAMANG  GOLE　SITA', 'SITA', 'タマン　ゴレ　', 'シタ', 2, '18162', 'PN00177019EA', 'f', 1, '1994-09-21', '2018-04-06', '2020-03-31', '4', '2020-04-13', '埼玉県和光市白子1丁目24番6号小泉荘', '080-5042-4556', '株式会社武蔵野朝霞工場', '048-469-1500', '埼玉県朝霞市膝折町4−14−30', '成増・地下鉄成増', NULL, 189253105, 1, '9774b843cc6a7d6c95ee117c65f77b51.1551012506.jpg', '第2学年', NULL, '留学', '2019-02-20 15:08:22', '2019-02-26 14:58:48'),
(106, 'BAJAGAIN　', 'RAVI', 'バジャガイン　', 'ラビ', 2, '18163', 'PN47963647EF', 'm', 1, '1990-08-25', '2018-04-06', '2020-03-31', '4', '2020-10-26', '東京都豊島区池袋3丁目52番15号メゾン山藤302号', '070-4125-0402', 'ヤマト運輸株式会社', '0120-555-643', '東京都大田区羽田旭町11-1', '整備場', NULL, 182164106, 1, '97a70a41ebbc5c29683bd797cb02c07a.1551012555.jpg', '第2学年', NULL, '留学', '2019-02-20 15:12:16', '2019-02-26 14:59:26'),
(107, 'WANG　', 'WEIKAI', 'オウ　', 'イカイ', 2, '18166', 'PN05523676EA', 'm', 5, '1996-10-14', '2018-04-06', '2020-03-31', '2', '2019-08-17', '東京都中野区鷺宮4丁目37番16号トラスティ鷺宮211', '070-3618-8999', '餃子の店　ニイハオ', '03-3465-0747', '東京都渋谷区西原2-27-4', '幡ヶ谷', NULL, 185166107, 1, '35e657837d630c72a2c8d40341942a18.1551012611.jpg', '第2学年', NULL, '留学', '2019-02-20 15:15:53', '2019-02-26 15:02:48'),
(108, 'RAI　', 'SUSHMANJALI', 'ライ　', 'ススマンザリ', 2, '18167', 'PN75688357EA', 'f', 1, '1994-08-25', '2018-04-06', '2020-03-31', '4', '2020-07-27', '東京都豊島区上池袋1丁目16番11号カーサ・ブランカ202号', '080-3471-0407', 'マクドナルド高田馬場駅前店', '03-5292-9431', '東京都新宿区高田馬場2-18-11稲門ビル2F', '高田馬場', NULL, 189521108, 1, '802b4a3594a12f9de7842b0e57ff330a.1551012648.jpg', '第2学年', NULL, '留学', '2019-02-20 15:20:06', '2019-02-26 15:03:20'),
(109, 'TAMANG', 'BIJAY', 'タマング　', 'ビザヤ', 2, '18168', 'PN96085234EF', 'm', 1, '1989-07-18', '2018-04-06', '2020-03-31', '4', '2020-11-01', '東京都豊島区池袋3丁目52番15号メゾン山藤302号', '070-1065-9527', '株式会社ゴールデンマジック', '03-3272-8071', '東京都中央区八重洲1-5-10RISM八重洲B1〜2F', '丸山　侑也', NULL, 181533109, 1, 'fa6c9d02ba7042d30bcfc8b9f7a42c30.1551012741.jpg', '第2学年', NULL, '留学', '2019-02-20 15:23:00', '2019-02-26 15:04:14'),
(110, 'KANDEL', 'NAV RAJ', 'カンデル　', 'ナブラズ', 2, '18170', 'PN02095551EA', 'm', 1, '1993-02-16', '2018-04-06', '2020-03-31', '4', '2020-05-14', '東京都新宿区百人町2丁目20番20号アーバンリーベ103', '070-1944-5123', 'マクドナルドJR東京駅店', '03-3211-3677', '東京都千代田区丸の内1-9-1東京駅一番街', '東京', NULL, 189859110, 1, '638cd1bcc8a1a77b7253a39a71ec1451.1551012807.jpg', '第2学年', NULL, '留学', '2019-02-20 15:26:02', '2019-02-26 15:05:06'),
(111, 'CHHETRI', 'SITA', 'チェトリ　', 'シタ', 2, '18171', 'PN79254571EA', 'f', 1, '1992-07-14', '2018-04-06', '2020-03-31', '4', '2020-04-13', '東京都新宿区北新宿1丁目27番4号 パークリッヂハイツ205', '080-5046-4132', '（株）日本レストランエンタプライズ', '048-422-2881', '埼玉県戸田市美女木1269-17', '北戸田', NULL, 188966111, 1, 'c8e3c2b2f0ba04b9a9ad17a0f44273a0.1551012835.jpg', '第2学年', NULL, '留学', '2019-02-20 15:28:32', '2019-02-26 15:05:43'),
(112, 'K C', 'NIRMALA', 'ケーシー　', 'ニルマラ', 2, '18172', 'PN86901111EA', 'f', 1, '1993-04-14', '2018-04-06', '2020-03-31', '4', '2020-04-12', '東京都豊島区西巣鴨2丁目8番8号 阿部方', '080-5186-5468', '株式会社きむら家', '03-5368-0337', '東京都新宿区住吉町6-3', '曙橋', NULL, 189618112, 1, 'c82b74583f5ffdb3721e8379f919f579.1551012859.jpg', '第2学年', NULL, '留学', '2019-02-20 15:31:33', '2019-02-26 15:06:20'),
(113, 'SHRESTHA', 'BISHWASH', 'シュレスタ　', 'ビシュワシュ', 2, '18173', 'PN82381595EA', 'm', 1, '1992-05-01', '2018-04-06', '2020-03-31', '2', '2019-05-16', '東京都新宿区百人町1-17-5-402号', '080-8860-6526', '東栄フーズ株式会社', '03-3298-1121', '東京都品川区東大井3-17-4プリメール', '立会川・大井町', NULL, 187145113, 1, '7c144abe04067d2804cb70266db49ce7.1551012891.jpg', '第2学年', NULL, '留学', '2019-02-20 15:33:51', '2019-02-26 15:07:07'),
(114, 'THAPA ALE', 'SHILA', 'タパ　アレ　', 'シラ', 2, '18174', 'PN14997370ED', 'f', 1, '1989-07-19', '2018-04-06', '2020-03-31', '4', '2020-11-04', '埼玉県和光市白子1丁目24番6号小泉荘', '080-9201-9876', '株式会社武蔵野　朝霞工場', '048-469-1500', '埼玉県朝霞市膝折町4−14−30', '朝霞・新座', NULL, 183219114, 1, 'd2857af215201ce034ea3578c0177a62.1551012940.jpg', '第2学年', NULL, '留学', '2019-02-20 15:37:04', '2019-02-26 15:08:30'),
(115, 'GIRI', 'AARATI', 'ギリ　', 'アラティ', 2, '18175', 'PN58183480EA', 'f', 1, '1993-10-25', '2018-04-06', '2020-03-31', '2', '2019-09-05', '東京都杉並区天沼1丁目17番11号 ポニーハウス', '080-85624734', NULL, NULL, NULL, NULL, NULL, 188328115, 1, 'e6f5e02d510c23399e236327c471fd7b.1551012979.jpg', '第2学年', NULL, '留学', '2019-02-20 15:39:26', '2019-02-26 15:09:02'),
(116, 'THOKAR', 'MONIKA', 'トカル　', 'モニカ', 2, '18176', 'PN97447764ED', 'f', 1, '1992-04-29', '2018-04-06', '2020-03-31', '2', '2019-09-11', '埼玉県坂戸市泉町2丁目5番地5第10雲南コーポ205号室', '090-8402-3883', 'オーケー高田馬場店', '03-5927-9811', '東京都豊島区高田3-29-1', '高田馬場・目白', NULL, 184223116, 1, 'e4a8dc0e3ae9e0082890002611780d04.1551013012.jpg', '第2学年', NULL, '留学', '2019-02-20 15:42:43', '2019-02-26 15:09:48'),
(118, 'RAHMAN　', 'MD　MOKHLESUR', 'ラマハン　', 'エムディ　モクレスル', 2, '18134', 'PN96460219EA', 'm', 9, '1996-01-01', '2018-04-06', '2020-03-31', '2', '2019-09-12', '東京都北区上十条2丁目30番11号', '070-3985-6182', '株式会社トラジ', '03-5220-7071', '東京都千代田区丸の内2-4-1丸の内ビル6F', '東京', NULL, 182102118, 1, 'b46bd1bae1751bc4a9f34b2da9065913.1551011709.jpg', '第2学年', NULL, '留学', '2019-02-21 16:06:12', '2019-02-26 14:37:34'),
(119, 'IBRAHIM　', 'MD', 'イブラヒム　', 'エムディ', 2, '18151', 'PN74353119EF', 'm', 9, '1992-02-01', '2018-04-06', '2020-03-31', '4', '2020-10-24', '東京都北区中十条2丁目18番10号第一竹葉荘8号', '080-6721-4639', 'TOHOリテール（株） 丸の内ディンドン有楽町ビル店', '03-3215-8340', '東京都千代田区有楽町1−10−1有楽町ビルB1F', '有楽町・日比谷', NULL, 187543119, 1, 'c15bf15a5fd84d90b7a0c06182f8082f.1551012187.jpg', '第2学年', NULL, '留学', '2019-02-21 16:09:17', '2019-02-26 14:47:04'),
(120, 'HASAN　', 'MD　RABIUL', 'ハサン　', 'エムディ　ラビュール', 2, '18164', 'PN90798814EA', 'm', 9, '1995-05-10', '2018-04-06', '2020-03-31', '2', '2019-05-02', '東京都北区中十条3丁目16番11-203号ジュンハイツ', '080-8882-5394', 'シエロダイニング株式会社', '03-5312-5801', '東京都新宿区新宿2-3-13大橋ビル1F', '新宿三丁目・新宿御苑前', NULL, 183484120, 1, '8e00f1dfa8c745e6d2b7839e369ac287.1551012581.jpg', '第2学年', NULL, '留学', '2019-02-21 16:13:06', '2019-02-26 15:00:19'),
(121, 'YOUSU', 'MOHAMMAD  ABU', 'ユウスフ　', 'モハメド　アブ', 2, '18101', 'PN49083459EA', 'm', 9, '1993-04-03', '2018-04-06', '2020-03-31', '2', '2019-05-07', '埼玉県蕨市塚越５－１５－１０グレアーハウス２０５号', '070-2654-7899', '天狗', '03-3984-4551', '東京都豊島区東池袋1-3-6山手ビルB1F', '池袋', '<p>Please update Remarks<br />\r\nthis is demo</p>', 181022121, 1, '87a8177e9bae8bf85dfc088fb2f42187.1551010616.jpg', '第2学年', NULL, '留学', '2019-02-22 08:10:58', '2019-03-14 04:05:09'),
(122, 'TAKI　', 'UDDIN', 'タキ　', 'ウッディン', 2, '18102', 'PN27529885EA', 'm', 9, '1994-01-01', '2018-04-06', '2020-03-31', '2', '2019-06-01', '東京都北区東十条4丁目8番10-302号 結城ビル', '070-2673-5219', '株式会社グルメ杵屋', '03-5220-4085', '東京都千代田区丸の内1-9-2グラントウキョウサウスタワー地下1階', '東京', NULL, 187506122, 1, '4745cd7d140af13207bf18c2750b882c.1551010639.jpg', '第2学年', NULL, '留学', '2019-02-22 08:14:25', '2019-02-26 14:29:49'),
(123, 'THAPA', 'MEGHRAJ', 'タパ　', 'メガラジ', 2, '18104', 'PN45647525EA', 'm', 1, '1991-06-28', '2018-04-06', '2020-03-31', '2', '2019-05-01', '東京都新宿区大久保2丁目25番2号レオパレス要203', '080-2805-8521', NULL, NULL, NULL, NULL, NULL, 187206123, 1, 'e9004180c02c3c0bc222a1ffd12ed49e.1551010663.jpg', '第2学年', NULL, '留学', '2019-02-22 09:37:40', '2019-02-26 14:30:04'),
(124, 'KHADKA　', 'SASMITA', 'カダカ　', 'サスミタ', 2, '18105', 'PN19560958EA', 'f', 1, '1995-12-23', '2018-04-06', '2020-03-31', '2', '2019-03-27', '東京都中野区東中野4丁目5番3号コーポラス山内206', '070-4343-2892', NULL, NULL, NULL, NULL, NULL, 183164124, 1, '07c24387390a6635fbfc186b958fb3d8.1551010685.jpg', '第2学年', NULL, '留学', '2019-02-22 09:39:32', '2019-02-26 14:30:16'),
(125, 'PAUDEL　', 'ARUN', 'パウデル　', 'アルン', 2, '18107', 'PN02794783EA', 'm', 1, '1993-11-08', '2018-04-06', '2020-03-31', '2', '2019-07-20', '東京都新宿区高田馬場4丁目16番1号 パークヒルズ203', '070-2161-1339', '養老乃瀧（株）', '03-3598-4060', '東京都北区1-11-4', '王子', NULL, 186558125, 1, '473b6928a1e5cc93e988de4289dc5eb9.1551010714.jpg', '第2学年', NULL, '留学', '2019-02-22 10:44:09', '2019-02-26 14:30:29'),
(126, 'PANDAY　', 'SANTOSH', 'パンデ　', 'サントス', 2, '18108', 'PN87519255EA', 'm', 1, '1989-01-23', '2018-04-06', '2020-03-31', '2', '2019-09-28', '東京都豊島区要町1丁目37番16号富士コーポ205号', '070-2647-5399', NULL, NULL, NULL, NULL, NULL, 188505126, 1, '472afc48c70cf587cf6ccd88ffb8853b.1551010739.jpg', '第2学年', NULL, '留学', '2019-02-22 10:46:12', '2019-02-26 14:30:42'),
(127, 'BUDHA', 'KRISHNA BAHADUR', 'ブダ　', 'クリシュナ　バハドゥル', 2, '18109', 'PN12435693EF', 'm', 1, '1989-07-03', '2018-04-06', '2020-03-31', '2', '2019-05-15', '東京都国分寺市南町2-1-28 飯塚コーポ301', '070-1043-1486', 'K・LINEプリメイラ株式会社(野菜･果物の加工･盛付け)', '042-506-8355', '東京都立川市一番町 4-65-10 大清ビル西武立川・武蔵砂川', '西武立川・武蔵砂川', NULL, 182467127, 1, 'dddbd42d9167289f343dee0796c89908.1551010762.jpg', '第2学年', NULL, '留学', '2019-02-22 10:50:03', '2019-02-26 14:30:57'),
(128, 'ARYAL　', 'PUNYA　PRASAD', 'アレル　', 'プンヤ　プラサド', 2, '18110', 'PN45811344ED', 'm', 1, '1990-12-10', '2018-04-06', '2020-03-31', '4', '2020-07-12', '埼玉県蕨市南町2-16-2', '090-4227-9143', '（株）佐々木商店', '045-581-3397', '神奈川県横浜市鶴見区元宮1-14-21', '八丁畷（はっちょうなわて）', NULL, 183798128, 1, 'edd36077e4911cce998ebe83dcf1d3e7.1551010799.jpg', '第2学年', NULL, '留学', '2019-02-22 10:55:49', '2019-02-26 14:31:49'),
(129, 'BHUSAL　', 'SOBHIT', 'ブザル　ソ', 'ビット', 2, '18112', 'PN07151402EA', 'm', 1, '1995-10-07', '2018-04-06', '2020-03-31', '4', '2020-08-03', '東京都新宿区中落合1丁目20番3号セベラパートⅢ303', '090-7772-4616', NULL, NULL, NULL, NULL, NULL, 183568129, 1, '5dcb66f6480b7ec19b31806509ed24c5.1551010836.jpg', '第2学年', NULL, '留学', '2019-02-22 10:58:07', '2019-02-26 14:32:03'),
(130, 'SUBEDI　', 'SITA', 'スベディ　', 'シタ', 2, '18113', 'PN91206663EA', 'f', 1, '1992-02-09', '2018-04-06', '2020-03-31', '4', '2020-08-03', '東京都新宿区中落合1丁目20番3号セベラパートⅢ303', '080-3821-7289', NULL, NULL, NULL, NULL, NULL, 188726130, 1, '99ee2e6644e96a262b61a6c308822c10.1551010861.jpg', '第2学年', NULL, '留学', '2019-02-22 11:00:27', '2019-02-26 14:32:18'),
(131, 'GURUNG　', 'SAROJ　RAJ', 'グルン　', 'サロズ　ラズ', 2, '18114', 'PN3329７６７５EA', 'm', 1, '1989-08-12', '2018-04-06', '2020-03-31', '4', '2020-12-10', '東京都中野区上高田3丁目18番6号薬師パレスマンション402', '080-1938-5065', NULL, NULL, NULL, NULL, NULL, 185776131, 1, '57cdff1699b018a9759be31f8703aa27.1551010891.jpg', '第2学年', NULL, '留学', '2019-02-22 11:03:00', '2019-02-26 14:32:33'),
(132, 'BISTA　', 'BINITA', 'ビスタ　', 'ビニタ', 2, '18115', 'PN87024883EA', 'f', 1, '1996-09-03', '2018-04-06', '2020-03-31', '4', '2020-07-25', '東京都新宿区高田馬場3丁目21番18号戸塚マンション3-C', '080-6488-4846', NULL, NULL, NULL, NULL, NULL, 189249132, 1, '92d60a3c723fd725b5e2636d7c7338b6.1551010921.jpg', '第2学年', NULL, '留学', '2019-02-22 11:05:05', '2019-02-26 14:32:47'),
(133, 'MAGAR　', 'SAGAR', 'マガル　', 'サガル', 2, '18116', 'PN50779081EA', 'm', 1, '1995-04-18', '2018-04-06', '2020-03-31', '2', '2019-05-23', '東京都中野区上高田3丁目18番6号薬師パレスマンション501', '080-9851-6837', 'ローソン　中野セントラルパークイースト店', '03-3387-3930', '東京都中野区中野4-10-1', '中野', NULL, 189792133, 1, '615e2ac702b1b8a45cd6866fe84312ea.1551010945.jpg', '第2学年', NULL, '留学', '2019-02-22 11:07:13', '2019-02-26 14:33:02'),
(134, 'HITANG　', 'MONIKA', 'ヒタン　', 'モニカ', 2, '18117', 'PN08935935EA', 'f', 1, '1993-03-27', '2018-04-06', '2020-03-31', '2', '2019-05-30', '東京都杉並区高円寺北2丁目34番7号マリオン高円寺103', '090-8293-7300', 'ローソン高円寺駅前店', '03-5373-8186', '東京都杉並区高円寺2-4-4', '高円寺', NULL, 187068134, 1, 'e6c81cc168aca9326e90578ae4bfc6e1.1551010976.jpg', '第2学年', NULL, '留学', '2019-02-22 11:09:23', '2019-02-26 14:33:17'),
(135, 'GURUNG　', 'RAJ', 'グルン　', 'ラジ', 2, '18118', 'PN80857513EA', 'm', 1, '1994-11-25', '2018-04-06', '2020-03-31', '4', '2020-05-02', '東京都中野区上高田3丁目18番6号薬師パレスマンション402', '080-6499-7900', 'ファミリーマート', '03-5380-7208', '東京都中央区上高田2-53-5', '新富町', NULL, 185079135, 1, '78a4b5a57c93fd304799228f7d738848.1551011034.jpg', '第2学年', NULL, '留学', '2019-02-22 11:11:35', '2019-02-26 14:33:36'),
(136, 'BALAMI　', 'SRIJANA', 'バラミ　', 'シリジャナ', 2, '18119', 'PN86204730EA', 'f', 1, '1993-10-23', '2018-04-06', '2020-03-31', '4', '2020-05-30', '東京都杉並区高円寺北2丁目34番7号マリオン高円寺103', '080-6489-3171', '金の蔵 新宿パレット店', '03-5909-5650', '東京都新宿区西新宿1-1-1 新宿パレットビル6F', '新宿', NULL, 188719136, 1, '2d93d4bc31b2b2d7b16601151d2e197d.1551011062.jpg', '第2学年', NULL, '留学', '2019-02-22 11:13:36', '2019-02-26 14:33:52'),
(137, 'ALE　', 'KUMAR', 'アレ　', 'クマル', 2, '18120', 'PN30600314EA', 'm', 1, '1991-09-11', '2018-04-06', '2020-03-31', '2', '2019-09-18', '東京都豊島区上池袋4丁目33番20号第三福田荘　101号', '090-5841-8644', NULL, NULL, NULL, NULL, NULL, 182287137, 1, '2efbe709600ab026d45ada1848f7e803.1551011088.jpg', '第2学年', NULL, '留学', '2019-02-22 11:15:40', '2019-02-26 14:34:09'),
(138, 'ILANGANTHILAKA MDIYANSELAGE  DULSHANI', 'MADUWANTHIKA  KUMARI ILANGANTHILAKA', 'イランガンティラカ　', 'ムディヤンセラゲ　ドゥルシャニ　', 2, '18121', 'PN32282221EA', 'f', 7, '1995-06-08', '2018-04-06', '2020-03-31', '4', '2020-08-23', '東京都中野区鷺宮5丁目2番7号ガーデンスクエア鷺ノ宮　401', '080-7701-4427', 'セブンイレブン中野沼袋駅前店', '03-3388-6895', '東京都中野区沼袋3-4-19', '沼袋', NULL, 185765138, 1, '574471ce688fe26f8d8a424f383ebcda.1551011202.jpg', '第2学年', NULL, '留学', '2019-02-22 11:20:23', '2019-02-26 14:34:40');
INSERT INTO `students` (`id`, `last_student_name`, `first_student_name`, `last_student_japanese_name`, `first_student_japanese_name`, `class_room_batch_id`, `student_number`, `residensal_card`, `student_sex`, `country_id`, `date_of_birth`, `entry_date`, `expire_date`, `residensalCardTime`, `residensal_card_expire`, `address`, `personal_phone_number`, `part_time_job_name`, `phone_where_they_works`, `address_where_they_works`, `nearest_station`, `student_note`, `unique_id`, `subject_optional_id`, `photo`, `student_of_year`, `nearest_station1`, `student_status`, `created_at`, `updated_at`) VALUES
(139, 'CHAPAGAI　', 'KIRAN', 'チャパガイ　', 'キラン', 2, '18122', 'PN93583292EA', 'm', 1, '1992-02-23', '2018-04-06', '2020-03-31', '4', '2020-07-11', '東京都文京区千駄木2丁目26番6号 団子坂スカイビル501', '080-8431-3119', 'ヤマト運輸株式会社（羽田クロノゲートベース）', '03-6756-7165', '東京都大田区羽田旭町11-1', '整備場', NULL, 182522139, 1, '36469d8c71a66cf0055b2ce1e916feec.1551011234.jpg', '第2学年', NULL, '留学', '2019-02-22 11:22:26', '2019-02-26 14:34:57'),
(140, 'AALE　', 'SURENDRA', 'アレ　', 'スレンドラ', 2, '18123', 'PN95520882EA', 'm', 1, '1991-12-25', '2018-04-06', '2020-03-31', '2', '2019-06-11', '東京都中野区上高田3丁目18番6号薬師パレスマンション501', '080-6489-9657', NULL, NULL, NULL, NULL, NULL, 184669140, 1, '7342152645c29fed1b2ca09bb85ca042.1551011273.jpg', '第2学年', NULL, '留学', '2019-02-22 11:24:39', '2019-02-26 14:35:12'),
(141, 'DANGI', 'TILAK', 'グルン　', 'サチン', 1, '19130', 'PN20224418SD', 'm', 1, '1992-04-19', '2019-04-06', '2020-03-31', '2', '2019-06-08', '沖縄県うるま市安慶名2－10－13　東洋言語文化学院203号室', '090-1942-1697', 'オール・フォア沖縄株式会社', '098-917-6324', '沖縄県国頭郡恩納村字冨着志利福地原246-1　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　(カフー リゾート フチャク コンド・ホテル)', 'カフー リゾート フチャク コンド　・ホテル(バス停)', NULL, 194231141, NULL, '0.11171100 1551254267.jpg', '第1学年', '那覇空港　　　　　　　　　　　　　(→羽田空港国際ターミナル)', '留学', '2019-02-27 13:57:47', '2019-02-27 13:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `student_optionals`
--

CREATE TABLE `student_optionals` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_section_student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` enum('compulsary','optional') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `subject_type`, `created_at`, `updated_at`) VALUES
(1, 'NAT5', 'optional', '2019-02-14 01:44:58', '2019-02-14 01:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_teacher_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_teacher_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_teacher_japanese_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_teacher_japanese_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_sex` enum('m','f','o') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'm',
  `country_id` int(11) DEFAULT NULL,
  `teacher_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_phone_number1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_phone_number2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_phone_number3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subjects`
--

CREATE TABLE `teacher_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$2OF9vOa1F16CblVHBWdoeOUI6ZYDl6HGxPm8kOzoA.tGGmXzI.6Vi', 'Gc3pL5byQuF0q5izkQEV3K1cl5wq8jxaVDs4DmdWVju8Ul7SNcm3Z6zPeKVB', NULL, NULL, 1),
(2, 'staff', 'staff@gmail.com', NULL, '$2y$10$78tDiJVLRR9HCkhnfWX0Uuo53olid4TMex06rMPvgjar4o6CWsVMO', NULL, NULL, NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_student_id_foreign` (`student_id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_batch_sections`
--
ALTER TABLE `class_batch_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_batch_subjects`
--
ALTER TABLE `class_batch_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_rooms`
--
ALTER TABLE `class_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_room_batches`
--
ALTER TABLE `class_room_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_section_days`
--
ALTER TABLE `class_section_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_section_students`
--
ALTER TABLE `class_section_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_models`
--
ALTER TABLE `event_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
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
-- Indexes for table `residensal_card_times`
--
ALTER TABLE `residensal_card_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_periods`
--
ALTER TABLE `section_periods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_periods_c_s_id_foreign` (`c_s_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_optionals`
--
ALTER TABLE `student_optionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_subjects`
--
ALTER TABLE `teacher_subjects`
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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `class_batch_sections`
--
ALTER TABLE `class_batch_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_batch_subjects`
--
ALTER TABLE `class_batch_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_rooms`
--
ALTER TABLE `class_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_room_batches`
--
ALTER TABLE `class_room_batches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_section_days`
--
ALTER TABLE `class_section_days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_section_students`
--
ALTER TABLE `class_section_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event_models`
--
ALTER TABLE `event_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `residensal_card_times`
--
ALTER TABLE `residensal_card_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section_periods`
--
ALTER TABLE `section_periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `student_optionals`
--
ALTER TABLE `student_optionals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_subjects`
--
ALTER TABLE `teacher_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `section_periods`
--
ALTER TABLE `section_periods`
  ADD CONSTRAINT `section_periods_c_s_id_foreign` FOREIGN KEY (`c_s_id`) REFERENCES `class_batch_sections` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
