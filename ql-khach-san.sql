-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 04:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql-khach-san`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhsachdatphongs`
--

CREATE TABLE `danhsachdatphongs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datphongid` bigint(20) UNSIGNED NOT NULL,
  `phongid` int(11) DEFAULT NULL,
  `ngaybatdauo` date NOT NULL,
  `ngayketthuco` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhsachdatphongs`
--

INSERT INTO `danhsachdatphongs` (`id`, `datphongid`, `phongid`, `ngaybatdauo`, `ngayketthuco`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-09-09', '2022-09-10', '2022-09-11 06:11:48', '2022-09-11 07:59:16'),
(13, 2, 2, '2022-09-11', '2022-09-13', '2022-09-11 08:00:03', '2022-09-11 08:00:03'),
(17, 5, 4, '2022-09-11', '2022-09-11', '2022-09-12 08:26:42', '2022-09-12 08:28:06'),
(18, 5, 6, '2022-09-12', '2022-09-14', '2022-09-12 08:28:06', '2022-09-12 08:28:06'),
(19, 6, 1, '2022-09-28', '2022-09-30', '2022-09-12 08:36:41', '2022-09-12 08:49:59'),
(23, 10, 2, '2022-09-09', '2022-09-14', '2022-09-13 05:48:36', '2022-09-13 05:48:36'),
(39, 19, 2, '2022-11-28', '2022-11-28', '2022-11-27 20:22:05', '2022-11-27 20:23:09'),
(40, 19, 1, '2022-11-28', '2022-11-28', '2022-11-27 20:23:09', '2022-11-27 20:23:09'),
(46, 25, 1, '2023-01-18', '2023-01-19', '2023-01-17 21:18:02', '2023-01-17 21:18:02'),
(51, 30, 2, '2023-01-19', '2023-01-20', '2023-01-19 02:27:54', '2023-01-20 06:01:09'),
(70, 45, 1, '2023-03-02', '2023-03-04', '2023-03-02 13:41:33', '2023-03-02 13:41:33'),
(91, 66, 1, '2023-03-11', '2023-03-13', '2023-03-11 01:38:42', '2023-03-11 01:38:42'),
(92, 67, 3, '2023-03-11', '2023-03-12', '2023-03-11 01:41:55', '2023-03-11 06:24:09'),
(93, 68, 1, '2023-03-25', '2023-03-26', '2023-03-25 01:20:54', '2023-03-25 01:20:54'),
(94, 69, 2, '2023-03-25', '2023-03-25', '2023-03-25 01:39:18', '2023-03-25 01:46:00'),
(95, 69, 3, '2023-03-25', '2023-03-28', '2023-03-25 01:46:00', '2023-03-25 01:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `datphongs`
--

CREATE TABLE `datphongs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ngaydat` date NOT NULL,
  `ngaytra` date NOT NULL,
  `soluong` int(11) NOT NULL,
  `khachhangid` bigint(20) UNSIGNED NOT NULL,
  `tinhtrangthanhtoan` tinyint(1) NOT NULL,
  `tinhtrangnhanphong` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `huydatphong` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datphongs`
--

INSERT INTO `datphongs` (`id`, `ngaydat`, `ngaytra`, `soluong`, `khachhangid`, `tinhtrangthanhtoan`, `tinhtrangnhanphong`, `created_at`, `updated_at`, `huydatphong`) VALUES
(2, '2022-09-09', '2022-09-13', 1, 2, 0, 1, '2022-09-11 06:11:48', '2022-09-14 06:48:28', 0),
(5, '2022-09-11', '2022-09-14', 1, 5, 1, 1, '2022-09-12 08:26:42', '2022-09-14 06:37:07', 0),
(6, '2022-09-28', '2022-09-30', 1, 6, 0, 0, '2022-09-12 08:36:41', '2022-09-14 06:43:32', 0),
(10, '2022-09-09', '2022-09-14', 1, 10, 1, 1, '2022-09-13 05:48:36', '2022-09-14 06:43:19', 0),
(19, '2022-11-28', '2022-11-28', 1, 19, 0, 0, '2022-11-27 20:22:05', '2023-03-02 13:41:04', 1),
(25, '2023-01-18', '2023-01-19', 1, 25, 1, 1, '2023-01-17 21:18:02', '2023-01-22 02:43:17', 0),
(30, '2023-01-19', '2023-01-20', 1, 35, 1, 1, '2023-01-19 02:27:54', '2023-03-02 04:07:35', 0),
(45, '2023-03-02', '2023-03-04', 1, 53, 0, 0, '2023-03-02 13:41:33', '2023-03-05 07:37:08', 0),
(66, '2023-03-11', '2023-03-13', 1, 74, 1, 1, '2023-03-11 01:38:42', '2023-03-11 01:39:15', 0),
(67, '2023-03-11', '2023-03-12', 1, 75, 0, 0, '2023-03-11 01:41:55', '2023-03-11 01:41:55', 0),
(68, '2023-03-25', '2023-03-26', 1, 76, 0, 0, '2023-03-25 01:20:54', '2023-03-25 01:20:54', 0),
(69, '2023-03-25', '2023-03-28', 1, 77, 0, 1, '2023-03-25 01:39:18', '2023-03-25 01:45:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dichvus`
--

CREATE TABLE `dichvus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giatien` int(11) NOT NULL,
  `donvi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dichvus`
--

INSERT INTO `dichvus` (`id`, `ten`, `giatien`, `donvi`, `created_at`, `updated_at`) VALUES
(1, 'Ăn uống', 100, 'VND', '2023-02-11 13:19:28', '2023-02-11 13:23:23'),
(2, 'Giặt ủi', 200, 'VND', '2023-02-11 13:23:11', '2023-02-11 13:23:28'),
(4, 'Chuyên chở', 500, 'VND', '2023-02-12 02:37:37', '2023-02-15 13:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `dichvu_datphongs`
--

CREATE TABLE `dichvu_datphongs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datphongid` bigint(20) UNSIGNED DEFAULT NULL,
  `dichvuid` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dichvu_datphongs`
--

INSERT INTO `dichvu_datphongs` (`id`, `datphongid`, `dichvuid`, `created_at`, `updated_at`) VALUES
(1, 30, 1, '2023-02-12 03:18:09', '2023-02-12 03:18:09'),
(2, 30, 2, '2023-02-12 03:18:09', '2023-02-12 03:18:09'),
(9, 30, 4, '2023-02-15 13:40:54', '2023-02-15 13:40:54'),
(10, NULL, 1, '2023-03-02 04:05:06', '2023-03-02 04:05:06'),
(11, NULL, 2, '2023-03-02 04:05:06', '2023-03-02 04:05:06');

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
-- Table structure for table `huydatphongs`
--

CREATE TABLE `huydatphongs` (
  `so` int(10) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datphongid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `huydatphongs`
--

INSERT INTO `huydatphongs` (`so`, `ten`, `datphongid`, `created_at`, `updated_at`) VALUES
(6, '1', 19, '2023-03-02 13:41:04', '2023-03-02 13:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `khachhangs`
--

CREATE TABLE `khachhangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `datphongid` bigint(20) UNSIGNED DEFAULT NULL,
  `userid` bigint(20) UNSIGNED DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioitinh` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vanbang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khachhangs`
--

INSERT INTO `khachhangs` (`id`, `ten`, `sdt`, `email`, `created_at`, `updated_at`, `datphongid`, `userid`, `diachi`, `gioitinh`, `vanbang`) VALUES
(2, 'Ly Nhut Nam', 787887155, 'namly@gmail.com', '2022-09-11 06:11:48', '2023-02-10 21:31:35', 2, NULL, 'Q.Ninh Kiều, TP.Cần Thơ', 'nam', '0123145211'),
(5, 'Nam', 123456789, 'nu@gmail.com', '2022-09-12 08:26:42', '2022-09-12 08:26:42', 5, NULL, NULL, NULL, NULL),
(6, 'Nam', 787887155, '1@gmail.com', '2022-09-12 08:36:41', '2022-09-12 08:36:41', 6, NULL, NULL, NULL, NULL),
(10, 'Nam Nam', 787887155, '1@gmail.com', '2022-09-13 05:48:36', '2022-09-29 07:46:54', 10, NULL, NULL, NULL, NULL),
(19, '1', 787887155, 'nhutnam393@gmail.com', '2022-11-27 20:22:05', '2022-11-27 20:22:05', 19, NULL, NULL, NULL, NULL),
(25, 'meme', 787887155, 'nhutnam393@gmail.com', '2023-01-17 21:18:02', '2023-01-17 21:18:02', 25, NULL, NULL, NULL, NULL),
(35, 'khachhang', 787887155, 'khachhang@gmail.com', '2023-01-19 02:27:54', '2023-01-19 02:27:54', 30, 23, NULL, NULL, NULL),
(46, 'khachhang', 123456789, 'khachhang@gmail.com', '2023-02-13 14:15:25', '2023-02-13 14:15:25', NULL, 23, NULL, NULL, NULL),
(47, 'khachhang', 123456789, 'khachhang@gmail.com', '2023-02-13 14:16:28', '2023-02-13 14:16:28', NULL, 23, NULL, NULL, NULL),
(48, 'khachhang', 123456789, 'khachhang@gmail.com', '2023-02-13 14:16:43', '2023-02-13 14:16:43', NULL, 23, NULL, NULL, NULL),
(53, 'nam', 787887155, 'nhutnam393@gmail.com', '2023-03-02 13:41:33', '2023-03-02 13:41:33', 45, NULL, 'Q.Ninh Kiều, TP.Cần Thơ', 'nam', '0123145211'),
(74, 'Lý Nhựt Nam', 787887155, 'nhutnam393@gmail.com', '2023-03-11 01:38:42', '2023-03-11 01:38:42', 66, NULL, 'Q.Ninh Kiều, TP.Cần Thơ', 'nam', '0123145211'),
(75, 'khachhang', 123456789, 'khachhang@gmail.com', '2023-03-11 01:41:55', '2023-03-11 01:41:55', 67, 23, NULL, NULL, NULL),
(76, 'admin', 787887155, 'admin@gmail.com', '2023-03-25 01:20:54', '2023-03-25 01:20:54', 68, 13, NULL, NULL, NULL),
(77, 'admin', 787887155, 'admin@gmail.com', '2023-03-25 01:39:18', '2023-03-25 01:39:18', 69, 13, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loaiphongs`
--

CREATE TABLE `loaiphongs` (
  `ma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` double NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `mieuTa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaiphongs`
--

INSERT INTO `loaiphongs` (`ma`, `ten`, `gia`, `hinh`, `soluong`, `mieuTa`, `created_at`, `updated_at`) VALUES
('LP1', 'Phòng thường', 100, 'img_1.jpg', 1, 'Phòng đẹp, rẻ', '2023-02-15 13:15:16', '2023-02-15 13:15:16'),
('LP2', 'Phòng VIP 2', 200, 'img_2.jpg', 2, 'Phòng VIP cho 2 người', '2022-09-04 22:33:03', '2022-09-29 07:06:52'),
('LP3', 'Phòng thường đôi', 200, 'img_3.jpg', 2, 'Đẹp tiện nghi', '2023-02-15 13:16:01', '2023-02-15 13:16:01'),
('LP4', 'Phòng thường gia đình', 200, 'img_4.jpg', 5, 'Phòng dành cho gia đình', '2022-09-04 22:35:29', '2022-09-29 07:07:16'),
('LP5', 'Phòng VIP', 100, 'img_5.jpg', 1, 'Phòng dành cho khách VIP', '2022-09-04 22:28:53', '2022-09-29 07:07:39'),
('LP6', 'Phòng VIP 3', 500, 'slider-1.jpg', 10, 'Phòng sang trọng', '2022-09-29 07:16:30', '2022-09-29 07:16:30');

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
(5, '2022_08_19_151412_create_loaiphongs_table', 1),
(6, '2022_08_20_093607_create_phongs_table', 1),
(7, '2022_09_03_135235_create_permission_tables', 1),
(8, '2022_09_06_063702_create_nhanviens_table', 1),
(9, '2022_09_11_100102_create_khachhangs_table', 1),
(10, '2022_09_11_100303_create_datphongs_table', 1),
(11, '2022_09_11_100439_khachhangs', 1),
(12, '2022_09_11_130255_create_danhsachdatphongs', 1),
(13, '2023_01_18_142504_add_userid_to_khachhangs_table', 2),
(14, '2023_01_19_071402_add_sdt_to_users_table', 3),
(15, '2023_02_11_035529_add_more_row_to_khachhang', 4),
(16, '2023_02_11_060850_create_nhanphongs_table', 5),
(17, '2023_02_11_062452_create_nhanphongs_table', 6),
(18, '2023_02_11_150547_create_traphongs_table', 7),
(19, '2023_02_11_151749_create_traphongs_table', 8),
(20, '2023_02_11_154323_create_huydangkys_table', 9),
(21, '2023_02_11_160242_create_huydatphongs_table', 10),
(22, '2023_02_11_161418_add_huydatphong_to_datphongs_table', 11),
(23, '2023_02_11_194722_create_dichvus_table', 12),
(24, '2023_02_11_195052_create_dichvus_table', 13),
(25, '2023_02_11_213514_create_dichvu_datphongs_table', 14),
(26, '2023_02_12_093455_create_dichvu_datphong_table', 15),
(27, '2023_02_12_100426_create_dichvu_datphongs_table', 16),
(28, '2019_05_03_000001_create_customer_columns', 17),
(29, '2019_05_03_000002_create_subscriptions_table', 17),
(30, '2019_05_03_000003_create_subscription_items_table', 17),
(31, '2023_03_03_151311_create_chuyenkhoans_table', 17),
(32, '2023_03_03_201822_create_chuyenkhoans_table', 18),
(33, '2023_03_03_213409_create_chuyenkhoans_table', 19),
(34, '2023_03_04_124552_create_chuyenkhoans_table', 20),
(35, '2023_03_04_150301_create_thanhtoans_table', 21),
(36, '2023_03_04_151345_create_thanhtoans_table', 22),
(37, '2023_03_04_151351_create_chuyenkhoans_table', 22),
(38, '2023_03_04_151408_add_chuyenkhoanid_to_thanhtoans_table', 22),
(39, '2023_03_04_152004_create_thanhtoans_table', 23),
(40, '2023_03_26_094343_add_picture1,2,3_to_phongs_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 13),
(5, 'App\\Models\\User', 23);

-- --------------------------------------------------------

--
-- Table structure for table `nhanphongs`
--

CREATE TABLE `nhanphongs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datphongid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhanphongs`
--

INSERT INTO `nhanphongs` (`id`, `ten`, `datphongid`, `created_at`, `updated_at`) VALUES
(14, 'khachhang', 30, '2023-02-15 09:30:50', '2023-02-15 09:30:50'),
(18, 'admin', 69, '2023-03-25 01:45:45', '2023-03-25 01:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `nhanviens`
--

CREATE TABLE `nhanviens` (
  `ma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luong` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhanviens`
--

INSERT INTO `nhanviens` (`ma`, `ten`, `luong`, `created_at`, `updated_at`) VALUES
('NV1', 'Lý Nhựt Nam', 1000.00, '2022-09-06 00:00:24', '2022-09-06 00:03:57'),
('NV2', 'Lý Nam', 1000.00, '2022-09-06 00:04:39', '2022-09-06 00:04:39'),
('NV3', 'Lý', 1000.00, '2022-09-06 00:04:49', '2022-09-06 00:04:49'),
('NV4', 'Nam', 1000.00, '2022-09-06 00:04:59', '2022-09-06 00:04:59'),
('NV5', 'nam', 1000.00, '2022-09-06 00:05:12', '2022-09-06 00:05:12'),
('NV6', 'nam', 1000.00, '2022-09-06 00:05:23', '2022-09-06 00:05:23');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2022-09-04 03:33:31', '2022-09-04 03:33:31'),
(2, 'role-create', 'web', '2022-09-04 03:33:31', '2022-09-04 03:33:31'),
(3, 'role-edit', 'web', '2022-09-04 03:33:31', '2022-09-04 03:33:31'),
(4, 'role-delete', 'web', '2022-09-04 03:33:31', '2022-09-04 03:33:31'),
(5, 'nhanvien-list', 'web', '2022-09-04 03:33:31', '2022-09-04 03:33:31'),
(6, 'nhanvien-create', 'web', '2022-09-04 03:33:31', '2022-09-04 03:33:31'),
(7, 'nhanvien-edit', 'web', '2022-09-04 03:33:31', '2022-09-04 03:33:31'),
(8, 'nhanvien-delete', 'web', '2022-09-04 03:33:31', '2022-09-04 03:33:31');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phongs`
--

CREATE TABLE `phongs` (
  `so_phong` int(11) NOT NULL,
  `loaiphongid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `picture_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phongs`
--

INSERT INTO `phongs` (`so_phong`, `loaiphongid`, `created_at`, `updated_at`, `picture_1`, `picture_2`, `picture_3`) VALUES
(1, 'LP2', '2022-09-04 22:32:01', '2023-03-26 03:21:56', 'slider-5.jpg', 'slider-6.jpg', 'slider-7.jpg'),
(2, 'LP4', '2022-09-04 22:32:08', '2023-03-26 03:21:38', 'slider-4.jpg', 'slider-5.jpg', 'slider-6.jpg'),
(3, 'LP2', '2022-09-29 07:55:14', '2023-03-26 03:21:21', 'slider-1.jpg', 'slider-2.jpg', 'slider-3.jpg'),
(4, 'LP3', '2022-09-04 22:32:24', '2023-03-26 03:20:29', 'slider-2.jpg', 'slider-6.jpg', 'slider-3.jpg'),
(5, 'LP5', '2022-09-29 07:55:22', '2023-03-26 03:20:09', 'slider-1.jpg', 'slider-5.jpg', 'slider-7.jpg'),
(6, 'LP4', '2022-09-08 20:27:21', '2023-03-26 03:19:50', 'slider-2.jpg', 'slider-3.jpg', 'slider-4.jpg'),
(7, 'LP6', '2022-09-29 07:31:38', '2023-03-26 03:20:57', 'img_3.jpg', 'img_5.jpg', 'img_1.jpg'),
(8, 'LP1', '2023-03-26 02:56:07', '2023-03-26 02:56:07', 'hero_1.jpg', 'hero_2.jpg', 'hero_4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'User', 'web', '2022-09-06 00:08:26', '2022-09-06 00:08:26'),
(3, 'Admin', 'web', '2022-09-11 06:31:14', '2022-09-11 06:31:14'),
(5, 'Khachhang', 'web', '2023-01-18 00:44:54', '2023-01-18 00:44:54');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(1, 5),
(2, 3),
(3, 3),
(4, 3),
(5, 2),
(5, 3),
(5, 5),
(6, 2),
(6, 3),
(7, 2),
(7, 3),
(8, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thanhtoans`
--

CREATE TABLE `thanhtoans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hinhthuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `chuyenkhoan_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khachhangid` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `loaitien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thanhtoans`
--

INSERT INTO `thanhtoans` (`id`, `hinhthuc`, `gia`, `chuyenkhoan_token`, `khachhangid`, `created_at`, `updated_at`, `loaitien`) VALUES
(28, 'chuyenkhoan', 100, 'tok_1MjlLxLEqh448DKunsozvDmi', NULL, '2023-03-09 15:26:05', '2023-03-09 15:26:05', 'datcoc'),
(30, 'chuyenkhoan', 100, 'tok_1MkHOKLEqh448DKuwhlD9VNi', 74, '2023-03-11 01:38:42', '2023-03-11 01:38:42', 'datcoc'),
(31, 'chuyenkhoan', 100, 'tok_1MkHOsLEqh448DKuWp2rO9pK', 74, '2023-03-11 01:39:15', '2023-03-11 01:39:15', 'traphong');

-- --------------------------------------------------------

--
-- Table structure for table `traphongs`
--

CREATE TABLE `traphongs` (
  `so` int(10) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datphongid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `traphongs`
--

INSERT INTO `traphongs` (`so`, `ten`, `datphongid`, `created_at`, `updated_at`) VALUES
(31, 'Lý Nhựt Nam', 66, '2023-03-11 01:39:15', '2023-03-11 01:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sdt` int(11) NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `sdt`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(13, NULL, 'admin@gmail.com', 'admin', NULL, '$2y$10$MNlcHIsu6uqnI41bXua51OtlOQaTmVpG6lb4qwRDE5XUmJDCtEwO.', NULL, '2022-09-11 06:31:14', '2023-02-10 20:59:51', 787887155, NULL, NULL, NULL, NULL),
(15, NULL, 'nhutnam393@gmail.com', 'nhutnam393', NULL, '$2y$10$AkJIY5zkd.jUdyGZCoqIN.ZO4JzBRO2K1UzsAUrPn5nIESELa.rXe', NULL, '2022-09-12 19:14:44', '2022-09-12 19:14:44', 0, NULL, NULL, NULL, NULL),
(23, NULL, 'khachhang@gmail.com', 'khachhang', NULL, '$2y$10$1Zhm/KCg2ojYPvXrWQV0Huv4f2dUdIgzdRvm0rQwmvt8AmMWHDQY6', NULL, '2023-01-19 01:31:52', '2023-02-11 12:26:40', 123456789, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhsachdatphongs`
--
ALTER TABLE `danhsachdatphongs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhsachdatphongs_datphongid_foreign` (`datphongid`),
  ADD KEY `danhsachdatphongs_phongid_foreign` (`phongid`);

--
-- Indexes for table `datphongs`
--
ALTER TABLE `datphongs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datphongs_khachhangid_foreign` (`khachhangid`);

--
-- Indexes for table `dichvus`
--
ALTER TABLE `dichvus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dichvu_datphongs`
--
ALTER TABLE `dichvu_datphongs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dichvu_datphongs_datphongid_foreign` (`datphongid`),
  ADD KEY `dichvu_datphongs_dichvuid_foreign` (`dichvuid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `huydatphongs`
--
ALTER TABLE `huydatphongs`
  ADD PRIMARY KEY (`so`),
  ADD KEY `huydatphongs_datphongid_foreign` (`datphongid`);

--
-- Indexes for table `khachhangs`
--
ALTER TABLE `khachhangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khachhangs_datphongid_foreign` (`datphongid`),
  ADD KEY `khachhangs_userid_foreign` (`userid`);

--
-- Indexes for table `loaiphongs`
--
ALTER TABLE `loaiphongs`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `nhanphongs`
--
ALTER TABLE `nhanphongs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhanphongs_datphongid_foreign` (`datphongid`);

--
-- Indexes for table `nhanviens`
--
ALTER TABLE `nhanviens`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phongs`
--
ALTER TABLE `phongs`
  ADD PRIMARY KEY (`so_phong`),
  ADD KEY `phongs_loaiphongid_foreign` (`loaiphongid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `thanhtoans`
--
ALTER TABLE `thanhtoans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thanhtoans_khachhangid_foreign` (`khachhangid`);

--
-- Indexes for table `traphongs`
--
ALTER TABLE `traphongs`
  ADD PRIMARY KEY (`so`),
  ADD KEY `traphongs_datphongid_foreign` (`datphongid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhsachdatphongs`
--
ALTER TABLE `danhsachdatphongs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `datphongs`
--
ALTER TABLE `datphongs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `dichvus`
--
ALTER TABLE `dichvus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dichvu_datphongs`
--
ALTER TABLE `dichvu_datphongs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `huydatphongs`
--
ALTER TABLE `huydatphongs`
  MODIFY `so` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `khachhangs`
--
ALTER TABLE `khachhangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `nhanphongs`
--
ALTER TABLE `nhanphongs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thanhtoans`
--
ALTER TABLE `thanhtoans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `traphongs`
--
ALTER TABLE `traphongs`
  MODIFY `so` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `danhsachdatphongs`
--
ALTER TABLE `danhsachdatphongs`
  ADD CONSTRAINT `danhsachdatphongs_datphongid_foreign` FOREIGN KEY (`datphongid`) REFERENCES `datphongs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `danhsachdatphongs_phongid_foreign` FOREIGN KEY (`phongid`) REFERENCES `phongs` (`so_phong`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `datphongs`
--
ALTER TABLE `datphongs`
  ADD CONSTRAINT `datphongs_khachhangid_foreign` FOREIGN KEY (`khachhangid`) REFERENCES `khachhangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dichvu_datphongs`
--
ALTER TABLE `dichvu_datphongs`
  ADD CONSTRAINT `dichvu_datphongs_datphongid_foreign` FOREIGN KEY (`datphongid`) REFERENCES `datphongs` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `dichvu_datphongs_dichvuid_foreign` FOREIGN KEY (`dichvuid`) REFERENCES `dichvus` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `huydatphongs`
--
ALTER TABLE `huydatphongs`
  ADD CONSTRAINT `huydatphongs_datphongid_foreign` FOREIGN KEY (`datphongid`) REFERENCES `datphongs` (`id`);

--
-- Constraints for table `khachhangs`
--
ALTER TABLE `khachhangs`
  ADD CONSTRAINT `khachhangs_datphongid_foreign` FOREIGN KEY (`datphongid`) REFERENCES `datphongs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `khachhangs_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nhanphongs`
--
ALTER TABLE `nhanphongs`
  ADD CONSTRAINT `nhanphongs_datphongid_foreign` FOREIGN KEY (`datphongid`) REFERENCES `datphongs` (`id`);

--
-- Constraints for table `phongs`
--
ALTER TABLE `phongs`
  ADD CONSTRAINT `phongs_loaiphongid_foreign` FOREIGN KEY (`loaiphongid`) REFERENCES `loaiphongs` (`ma`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `thanhtoans`
--
ALTER TABLE `thanhtoans`
  ADD CONSTRAINT `thanhtoans_khachhangid_foreign` FOREIGN KEY (`khachhangid`) REFERENCES `khachhangs` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `traphongs`
--
ALTER TABLE `traphongs`
  ADD CONSTRAINT `traphongs_datphongid_foreign` FOREIGN KEY (`datphongid`) REFERENCES `datphongs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
