-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2025 at 09:41 AM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kodstecu_tagncash2`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_profiles`
--

CREATE TABLE `business_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agreement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_profiles`
--

INSERT INTO `business_profiles` (`id`, `user_id`, `service_type`, `business_name`, `business_email`, `business_phone`, `address`, `city`, `state`, `country`, `pincode`, `tax_id`, `registration_id`, `agreement`, `status`, `hide`, `created_at`, `updated_at`) VALUES
(1, 3, '', 'vendor001', 'lemom55374@rartg.com', '7868648684', 'vendor', 'Mandya', 'Karnataka', 'India', '571434', 'Ven1245', '172737', 'agreement/aszP3l1BtNnqsOKwwSGDYElR4bebY7eQfUPUfxK8.pdf', 1, 1, '2024-04-12 04:04:29', '2024-07-11 00:26:56'),
(2, 4, 'Restaurant', 'Pets shop', 'chandanmk2738@gmail.com', '7204925695', '#20/1, 10th cross krishnappa block r t nagar bangalore 560032', 'Bangalore North', 'Karnataka', 'India', '560032', '416772', '6177882', 'agreement/U1OZs8iFEdmLY2p0w4vuWcQAHPvM9oMabo3eJyR4.pdf', 1, 1, '2024-04-17 23:17:59', '2024-04-22 01:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_of_offer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campaign_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_validity` datetime DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `instant_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cashback_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_country` enum('India','USA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `redeem_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_image`, `title_of_offer`, `coupon_code`, `campaign_code`, `offer_validity`, `description`, `instant_discount`, `percentage_discount`, `cashback_value`, `coupon_created_by`, `coupon_country`, `status`, `redeem_count`, `created_at`, `updated_at`) VALUES
(3, 'coupon_images/3t430ggTDWa0Z5TZsH4TexSnQGPf6wGlejc19V6T.jpg', 'hshs', 'hsbhs', 'hshhs', '2024-04-23 11:58:00', NULL, '67', 'null', '97', '4', 'India', '0', NULL, '2024-04-18 06:40:39', '2024-04-22 04:56:31'),
(4, 'coupon_images/UKuD08mG9yAEvWvfizN2VsRlyY0HwByzUl686N73.jpg', 'Abc', 'avc150', 'abc150', '2024-04-25 12:38:00', NULL, '250', 'null', '08', '4', 'India', '0', NULL, '2024-04-22 00:59:56', '2024-04-22 06:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `email_verifications`
--

CREATE TABLE `email_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_verifications`
--

INSERT INTO `email_verifications` (`id`, `email`, `otp`, `created_at`, `updated_at`) VALUES
(1, 'lepodiv595@etopys.com', '4416', '2024-04-12 03:55:41', '2024-04-12 03:55:41'),
(2, 'lemom55374@rartg.com', '1626', '2024-04-12 03:58:35', '2024-04-12 03:58:35'),
(3, 'chandanmk2738@gmail.com', '6376', '2024-04-12 04:26:57', '2024-04-21 23:47:07'),
(4, 'hoysala06032001@gmail.com', '6556', '2024-04-12 06:37:51', '2024-04-18 22:21:20'),
(5, 'asha@gmail.com', '5169', '2024-04-17 02:20:03', '2024-04-17 02:20:15'),
(6, 'ashaanand.a07@gmail.com', '9181', '2024-04-17 02:20:27', '2024-04-17 02:20:27'),
(7, 'chandanshetty2738@gmail.com', '2772', '2024-04-17 08:11:31', '2024-04-21 23:45:07'),
(8, 'geethamurthy000@gmail.com', '8049', '2024-04-17 23:24:09', '2024-04-17 23:24:09'),
(9, 'jocite3795@rartg.com', '3984', '2024-04-17 23:47:22', '2024-04-17 23:47:22'),
(10, 'ginolig958@gmail.com', '1271', '2024-04-17 23:50:00', '2024-04-17 23:50:00'),
(11, 'ginolig958@iliken.com', '6577', '2024-04-17 23:50:34', '2024-04-17 23:50:34'),
(12, 'samajasevaka@gmail.com', '8726', '2024-04-17 23:59:41', '2024-04-17 23:59:41'),
(13, 'sama@gmail.com', '4844', '2024-04-22 00:29:59', '2024-04-22 00:29:59'),
(14, 'vzgshns@gmail.com', '3838', '2024-04-22 00:37:08', '2024-04-22 00:38:18'),
(15, 'fghbgtyujfdsthh@gmail.com', '1866', '2024-04-22 00:44:56', '2024-04-22 00:44:56');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(4) NOT NULL DEFAULT '0',
  `notification_by` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notifiable_id`, `title`, `message`, `read`, `notification_by`, `coupon_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 'Welcome to TagNCash', 0, 1, NULL, '2024-04-12 03:56:03', '2024-04-12 03:56:03'),
(2, 3, NULL, 'Welcome to TagNCash', 0, 1, NULL, '2024-04-12 03:58:58', '2024-04-12 03:58:58'),
(3, 4, NULL, 'Welcome to TagNCash', 0, 1, NULL, '2024-04-12 04:28:28', '2024-04-12 04:28:28'),
(4, 5, NULL, 'Welcome to TagNCash', 0, 1, NULL, '2024-04-12 06:38:20', '2024-04-12 06:38:20'),
(5, 4, 'Coupon Redemption', 'User Hoysala wants to redeem yshd coupon', 0, 5, NULL, '2024-04-17 08:28:44', '2024-04-17 08:28:44'),
(6, 5, 'Coupon Redeemed', 'You have successfully redeemed the coupon', 0, 1, NULL, '2024-04-17 08:29:28', '2024-04-17 08:29:28'),
(7, 11, NULL, 'Welcome to TagNCash', 0, 1, NULL, '2024-04-17 23:24:42', '2024-04-17 23:24:42'),
(8, 11, NULL, 'You have shared the coupon to Hoysala', 0, 1, NULL, '2024-04-17 23:31:34', '2024-04-17 23:31:34'),
(9, 5, NULL, 'You have received a coupon from Chandan', 0, 1, NULL, '2024-04-17 23:31:34', '2024-04-17 23:31:34'),
(10, 4, 'Coupon Redemption', 'User Hoysala wants to redeem yshd coupon', 0, 5, NULL, '2024-04-17 23:41:33', '2024-04-17 23:41:33'),
(11, 5, 'Coupon Redeemed', 'You have successfully redeemed the coupon', 0, 1, NULL, '2024-04-17 23:42:21', '2024-04-17 23:42:21'),
(12, 12, NULL, 'Welcome to TagNCash', 0, 1, NULL, '2024-04-17 23:47:44', '2024-04-17 23:47:44'),
(13, 13, NULL, 'Welcome to TagNCash', 0, 1, NULL, '2024-04-17 23:50:54', '2024-04-17 23:50:54'),
(14, 4, 'Coupon Redemption', 'User Chandan wants to redeem PET SHOP coupon', 0, 11, NULL, '2024-04-17 23:55:54', '2024-04-17 23:55:54'),
(15, 11, 'Coupon Redeemed', 'You have successfully redeemed the coupon', 0, 1, 2, '2024-04-17 23:56:15', '2024-04-17 23:56:15'),
(16, 14, NULL, 'Welcome to TagNCash', 0, 1, NULL, '2024-04-18 00:00:21', '2024-04-18 00:00:21'),
(17, 4, 'Coupon Redemption', 'User Chandan wants to redeem yshd coupon', 0, 11, NULL, '2024-04-18 00:14:17', '2024-04-18 00:14:17'),
(18, 4, 'Coupon Redemption', 'User Chandan wants to redeem PET SHOP coupon', 0, 11, NULL, '2024-04-18 00:15:27', '2024-04-18 00:15:27'),
(19, 4, 'Coupon Redemption', 'User Chandan wants to redeem PET SHOP coupon', 0, 11, NULL, '2024-04-18 00:19:21', '2024-04-18 00:19:21'),
(20, 4, 'Coupon Redemption', 'User Chandan wants to redeem PET SHOP coupon', 0, 11, NULL, '2024-04-18 00:21:55', '2024-04-18 00:21:55'),
(21, 11, 'Coupon Redeemed', 'You have successfully redeemed the coupon', 0, 1, 2, '2024-04-18 00:22:09', '2024-04-18 00:22:09'),
(22, 4, 'Coupon Redemption', 'User Chandan wants to redeem yshd coupon', 0, 11, 1, '2024-04-18 00:31:18', '2024-04-18 00:31:18'),
(23, 11, 'Coupon Redeemed', 'You have successfully redeemed the coupon', 0, 1, 1, '2024-04-18 00:31:33', '2024-04-18 00:31:33'),
(24, 4, 'Coupon Redemption', 'User Chandan wants to redeem PET SHOP coupon', 0, 11, 2, '2024-04-18 00:38:24', '2024-04-18 00:38:24'),
(25, 11, 'Coupon Redeemed', 'You have successfully redeemed the PET SHOP coupon', 0, 1, 2, '2024-04-18 00:38:38', '2024-04-18 00:38:38'),
(26, 4, 'Coupon Deactivated', 'Your coupon yshd is deactivated', 0, 1, 1, '2024-04-18 00:58:40', '2024-04-18 00:58:40'),
(27, 4, 'Coupon Activated', 'Your coupon yshd is activated', 0, 1, 1, '2024-04-18 00:59:00', '2024-04-18 00:59:00'),
(28, 4, 'Account Disapproved', 'Your account has been disapproved by Admin', 0, 1, NULL, '2024-04-18 01:02:47', '2024-04-18 01:02:47'),
(29, 4, 'Account Approved', 'Your account has been approved by Admin', 0, 1, NULL, '2024-04-18 01:02:59', '2024-04-18 01:02:59'),
(30, 4, 'Coupon Deactivated', 'Your coupon yshd is deactivated', 0, 1, 1, '2024-04-18 01:27:53', '2024-04-18 01:27:53'),
(31, 4, 'Coupon Activated', 'Your coupon yshd is activated', 0, 1, 1, '2024-04-18 01:38:27', '2024-04-18 01:38:27'),
(32, 4, 'Coupon Deactivated', 'Your coupon yshd is deactivated', 0, 1, 1, '2024-04-18 01:40:24', '2024-04-18 01:40:24'),
(33, 4, 'Coupon Deactivated', 'Your coupon PET SHOP is deactivated', 0, 1, 2, '2024-04-18 01:41:12', '2024-04-18 01:41:12'),
(34, 4, 'Coupon Activated', 'Your coupon PET SHOP is activated', 0, 1, 2, '2024-04-18 01:41:18', '2024-04-18 01:41:18'),
(35, 4, 'Coupon Deactivated', 'Your coupon PET SHOP is deactivated', 0, 1, 2, '2024-04-18 01:41:25', '2024-04-18 01:41:25'),
(36, 4, 'Coupon Activated', 'Your coupon PET SHOP is activated', 0, 1, 2, '2024-04-18 06:35:48', '2024-04-18 06:35:48'),
(37, 4, 'Coupon Deactivated', 'Your coupon PET SHOP is deactivated', 0, 1, 2, '2024-04-18 06:36:26', '2024-04-18 06:36:26'),
(38, 4, 'Coupon Activated', 'Your coupon PET SHOP is activated', 0, 1, 2, '2024-04-21 23:05:56', '2024-04-21 23:05:56'),
(39, 4, 'Coupon Activated', 'Your coupon hshs is activated', 0, 1, 3, '2024-04-21 23:06:02', '2024-04-21 23:06:02'),
(40, 5, 'Coupon Shared', 'You have shared the coupon to Chandan', 0, 1, 2, '2024-04-21 23:11:03', '2024-04-21 23:11:03'),
(41, 11, 'Coupon Received', 'You have received a coupon from Hoysala', 0, 1, 2, '2024-04-21 23:11:03', '2024-04-21 23:11:03'),
(42, 4, 'Coupon Redemption', 'User Hoysala wants to redeem PET SHOP coupon', 0, 5, 2, '2024-04-21 23:11:19', '2024-04-21 23:11:19'),
(43, 4, 'Coupon Redemption', 'User Hoysala wants to redeem PET SHOP coupon', 0, 5, 2, '2024-04-21 23:12:36', '2024-04-21 23:12:36'),
(44, 5, 'Coupon Redeemed', 'You have successfully redeemed the PET SHOP coupon', 0, 1, 2, '2024-04-21 23:12:53', '2024-04-21 23:12:53'),
(45, 4, 'Coupon Redemption', 'User Hoysala wants to redeem PET SHOP coupon', 0, 5, 2, '2024-04-21 23:21:33', '2024-04-21 23:21:33'),
(46, 5, 'Coupon Shared', 'You have shared the coupon to Chandan', 0, 1, 2, '2024-04-21 23:21:54', '2024-04-21 23:21:54'),
(47, 11, 'Coupon Received', 'You have received a coupon from Hoysala', 0, 1, 2, '2024-04-21 23:21:54', '2024-04-21 23:21:54'),
(48, 4, 'Coupon Redemption', 'User Hoysala wants to redeem PET SHOP coupon', 0, 5, 2, '2024-04-21 23:22:13', '2024-04-21 23:22:13'),
(49, 5, 'Coupon Shared', 'You have shared the coupon to Chandan', 0, 1, 2, '2024-04-21 23:22:24', '2024-04-21 23:22:24'),
(50, 11, 'Coupon Received', 'You have received a coupon from Hoysala', 0, 1, 2, '2024-04-21 23:22:24', '2024-04-21 23:22:24'),
(51, 15, 'Welcome to TagNCash', 'Checkout our app. Exciting offers are waiting for you!!', 0, 1, NULL, '2024-04-22 00:38:27', '2024-04-22 00:38:27'),
(52, 4, 'Coupon Deactivated', 'Your coupon PET SHOP is deactivated', 0, 1, 2, '2024-04-22 00:51:38', '2024-04-22 00:51:38'),
(53, 4, 'Coupon Deactivated', 'Your coupon hshs is deactivated', 0, 1, 3, '2024-04-22 00:58:43', '2024-04-22 00:58:43'),
(54, 4, 'Coupon Activated', 'Your coupon hshs is activated', 0, 1, 3, '2024-04-22 00:58:52', '2024-04-22 00:58:52'),
(55, 4, 'Coupon Deactivated', 'Your coupon Abc is deactivated', 0, 1, 4, '2024-04-22 01:00:06', '2024-04-22 01:00:06'),
(56, 4, 'Coupon Activated', 'Your coupon Abc is activated', 0, 1, 4, '2024-04-22 01:07:49', '2024-04-22 01:07:49'),
(57, 4, 'Coupon Deactivated', 'Your coupon Abc is deactivated', 0, 1, 4, '2024-04-22 01:08:07', '2024-04-22 01:08:07'),
(58, 4, 'Coupon Activated', 'Your coupon Abc is activated', 0, 1, 4, '2024-04-22 01:08:36', '2024-04-22 01:08:36'),
(59, 4, 'Account Disapproved', 'Your account has been disapproved by Admin', 0, 1, NULL, '2024-04-22 01:11:44', '2024-04-22 01:11:44'),
(60, 4, 'Account Approved', 'Your account has been approved by Admin', 0, 1, NULL, '2024-04-22 01:11:46', '2024-04-22 01:11:46'),
(61, 4, 'Account Disapproved', 'Your account has been disapproved by Admin', 0, 1, NULL, '2024-04-22 01:19:39', '2024-04-22 01:19:39'),
(62, 4, 'Account Approved', 'Your account has been approved by Admin', 0, 1, NULL, '2024-04-22 01:19:43', '2024-04-22 01:19:43'),
(63, 4, 'Account Disabled', 'Your account has been disabled by Admin', 0, 1, NULL, '2024-04-22 01:19:53', '2024-04-22 01:19:53'),
(64, 15, 'Account Disabled', 'Your account has been disabled by Admin', 0, 1, NULL, '2024-04-22 01:24:06', '2024-04-22 01:24:06'),
(65, 4, 'Coupon Activated', 'Your coupon Abc is activated', 0, 1, 4, '2024-04-22 01:38:56', '2024-04-22 01:38:56'),
(66, 4, 'Coupon Deactivated', 'Your coupon Abc is deactivated', 0, 1, 4, '2024-04-22 01:39:27', '2024-04-22 01:39:27'),
(67, 4, 'Coupon Activated', 'Your coupon hshs is activated', 0, 1, 3, '2024-04-22 01:42:11', '2024-04-22 01:42:11'),
(68, 4, 'Coupon Activated', 'Your coupon Abc is activated', 0, 1, 4, '2024-04-22 01:42:30', '2024-04-22 01:42:30'),
(69, 4, 'Coupon Deactivated', 'Your coupon Abc is deactivated', 0, 1, 4, '2024-04-22 01:42:36', '2024-04-22 01:42:36'),
(70, 4, 'Coupon Deactivated', 'Your coupon hshs is deactivated', 0, 1, 3, '2024-04-22 01:44:33', '2024-04-22 01:44:33'),
(71, 4, 'Coupon Activated', 'Your coupon hshs is activated', 0, 1, 3, '2024-04-22 01:45:47', '2024-04-22 01:45:47'),
(72, 4, 'Coupon Activated', 'Your coupon Abc is activated', 0, 1, 4, '2024-04-22 01:48:06', '2024-04-22 01:48:06'),
(73, 4, 'Coupon Redemption', 'User Hoysala wants to redeem hshs coupon', 0, 5, 3, '2024-04-22 02:17:54', '2024-04-22 02:17:54'),
(74, 5, 'Coupon Redeemed', 'You have successfully redeemed the hshs coupon', 0, 1, 3, '2024-04-22 02:18:14', '2024-04-22 02:18:14'),
(75, 4, 'Coupon Deactivated', 'Your coupon hshs is deactivated', 0, 1, 3, '2024-04-22 04:56:31', '2024-04-22 04:56:31'),
(76, 4, 'Coupon Deactivated', 'Your coupon Abc is deactivated', 0, 1, 4, '2024-04-22 04:56:47', '2024-04-22 04:56:47'),
(77, 16, 'Welcome to TagNCash', 'Checkout our app. Exciting offers are waiting for you!!', 0, 1, NULL, '2024-05-06 03:47:06', '2024-05-06 03:47:06'),
(78, 13, 'Account Disabled', 'Your account has been disabled by Admin', 0, 1, NULL, '2024-07-11 00:26:25', '2024-07-11 00:26:25'),
(79, 3, 'Account Disabled', 'Your account has been disabled by Admin', 0, 1, NULL, '2024-07-11 00:26:56', '2024-07-11 00:26:56');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
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
-- Table structure for table `redeemed_coupons`
--

CREATE TABLE `redeemed_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `redeemed_by` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `redeem_otp` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redeemed_coupons`
--

INSERT INTO `redeemed_coupons` (`id`, `coupon_id`, `redeemed_by`, `redeem_otp`, `created_at`, `updated_at`) VALUES
(1, 1, '[5,5,11]', '[]', '2024-04-17 08:28:44', '2024-04-18 00:31:33'),
(2, 2, '[11,11,11,5]', '{\"5\":5978}', '2024-04-17 23:55:54', '2024-04-21 23:22:13'),
(3, 3, '[5]', '[]', '2024-04-22 02:17:54', '2024-04-22 02:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `shared_coupons`
--

CREATE TABLE `shared_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` bigint(20) UNSIGNED NOT NULL,
  `shared_to` bigint(20) UNSIGNED DEFAULT NULL,
  `redeemed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `redeemed_at` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shared_coupons`
--

INSERT INTO `shared_coupons` (`id`, `coupon_id`, `from_user_id`, `to_user_id`, `shared_to`, `redeemed`, `redeemed_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 5, NULL, '1', '2024-04-18 05:12:21', '0', '2024-04-17 23:31:34', '2024-04-17 23:42:21'),
(2, 2, 5, 11, NULL, '0', NULL, '0', '2024-04-21 23:11:03', '2024-04-21 23:11:03'),
(3, 2, 5, 11, NULL, '0', NULL, '0', '2024-04-21 23:21:54', '2024-04-21 23:21:54'),
(4, 2, 5, 11, NULL, '0', NULL, '0', '2024-04-21 23:22:24', '2024-04-21 23:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `from_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `to_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reward` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bill_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `vendor_id`, `coupon_id`, `from_user_id`, `to_user_id`, `reward`, `bill_value`, `discount`, `date`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 5, NULL, '0', '1000', '28', '2024-04-17 13:59:28', '2024-04-17 08:29:28', '2024-04-17 08:29:28'),
(2, 4, 1, 11, 5, '10', '1000', '28', '2024-04-18 05:12:21', '2024-04-17 23:42:21', '2024-04-17 23:42:21'),
(3, 4, 2, 11, NULL, '0', '10000', '500', '2024-04-18 05:26:15', '2024-04-17 23:56:15', '2024-04-17 23:56:15'),
(4, 4, 2, 11, NULL, '0', '10000', '500', '2024-04-18 05:52:09', '2024-04-18 00:22:09', '2024-04-18 00:22:09'),
(5, 4, 1, 11, NULL, '0', '1580', '28', '2024-04-18 06:01:33', '2024-04-18 00:31:33', '2024-04-18 00:31:33'),
(6, 4, 2, 11, NULL, '0', '100000', '500', '2024-04-18 06:08:38', '2024-04-18 00:38:38', '2024-04-18 00:38:38'),
(7, 4, 2, 5, NULL, '0', '10000', '500', '2024-04-22 04:42:53', '2024-04-21 23:12:53', '2024-04-21 23:12:53'),
(8, 4, 3, 5, NULL, '0', '1000', '67', '2024-04-22 07:48:14', '2024-04-22 02:18:14', '2024-04-22 02:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `email`, `phone`, `country`, `profile_image`, `email_verified_at`, `password`, `status`, `hide`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '9879879871', 'India', NULL, NULL, '$2y$10$oRhvlQgrgmM2DTDV3g2bLe7IViHj4Y2gaHON16elLpgr/1UkuwF0O', 1, 0, NULL, '2024-04-12 07:09:21', '2024-04-12 07:09:21'),
(2, 'user', 'user 1', 'lepodiv595@etopys.com', '79464', 'India', NULL, NULL, '$2y$12$cBFFR1r99ofnzphuHoqRLOAT2iGijYdlcJvuXnVeDnNEZipFAOSAK', 1, 1, NULL, '2024-04-12 03:56:03', '2024-04-22 01:27:35'),
(3, 'vendor', 'vendor1', 'lemom55374@rartg.com', '7868648684', 'India', 'profile_image/ZzQ11XUZ8UlqOAX1NWRPH849cUcrdMy8D0BTXI1T.jpg', NULL, '$2y$12$DAYmsQghP53Z6CjwrO9ARO74Ac8SONybab6xUnssBzesi74rgih6i', 1, 1, NULL, '2024-04-12 03:58:58', '2024-07-11 00:26:56'),
(4, 'vendor', 'Chandan M K', 'chandanmk2738@gmail.com', '7204925695', 'India', 'profile_image/aJDFULM74Pe8LmSGh5Wo5fepuladdfijtwd6F6Gs.jpg', NULL, '$2y$12$KI/A/dCxhQeNvcK3f0.eD.0f/PbCdPEXX3ImSKzwGgqg6q144prLu', 1, 0, NULL, '2024-04-12 04:28:28', '2024-04-22 01:30:12'),
(5, 'user', 'Hoysala', 'hoysala06032001@gmail.com', '7406057347', 'India', NULL, NULL, '$2y$12$QHChBZLpLpcM9awhaxDL6OY9loQXMcr/Ga4MmgEkRTV1Ii1wojymK', 1, 1, NULL, '2024-04-12 06:38:20', '2024-07-11 00:26:10'),
(11, 'user', 'Chandan', 'geethamurthy000@gmail.com', '7204925655', 'India', 'profile_image/BcbFQ1bE6YWG1F2TABA6zyomVFAo2Z8NruP9xMo4.jpg', NULL, '$2y$12$aWydGUlnG7uR44/j6Gca0.MxjQ/vnEZz.JwMr8jYrjujUyjXGahwm', 1, 0, NULL, '2024-04-17 23:24:42', '2024-04-18 00:36:56'),
(12, 'user', 'Hoysala', 'jocite3795@rartg.com', '7405248494', 'USA', NULL, NULL, '$2y$12$sSpIxjlSDC8H80qijBrkf.7WKs5mIXGNYU6xVIHR66KplAd8CGzDu', 1, 0, NULL, '2024-04-17 23:47:44', '2024-04-17 23:47:44'),
(13, 'vendor', 'Hoysala vendor', 'ginolig958@iliken.com', '6464484649', 'USA', NULL, NULL, '$2y$12$0iz7RKJTuu9K6dUcUbhHkOg7OyL3KBMAiSpdX5ubhad4yrKRl.I2a', 0, 1, NULL, '2024-04-17 23:50:54', '2024-07-11 00:26:25'),
(14, 'user', 'Samaja Sevaka', 'samajasevaka@gmail.com', '9512354876', 'USA', NULL, NULL, '$2y$12$xPE4/4s8FrWWiulp2FiVT.eXeGVxpJHtmqjDwclrzyMA23MW9.XNy', 0, 1, NULL, '2024-04-18 00:00:21', '2024-05-06 22:53:57'),
(15, 'vendor', 'sgdh', 'vzgshns@gmail.com', '875556', 'India', NULL, NULL, '$2y$12$X7oNoKbsj2uI8drEVDJRVey55i9/gkM9JZtLe06CDz5aAt7ZlCraO', 0, 1, NULL, '2024-04-22 00:38:27', '2024-04-22 01:24:06'),
(16, 'vendor', 'chandan m k', 'yihipap634@shanreto.com', '986453684', 'India', NULL, NULL, '$2y$12$hlJ/4KbYh48Np.u7e1yCBuNZzZdPd23O.4Jly8YhX1HrK0CqN3YKO', 0, 0, NULL, '2024-05-06 03:47:06', '2024-05-06 03:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `balance`, `created_at`, `updated_at`) VALUES
(1, 1, '317', '2024-04-17 08:29:28', '2024-04-22 02:18:14'),
(2, 4, '327', '2024-04-17 08:29:28', '2024-04-22 02:18:14'),
(3, 11, '10', '2024-04-17 23:42:21', '2024-04-17 23:42:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_profiles`
--
ALTER TABLE `business_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `business_profiles_business_email_unique` (`business_email`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verifications`
--
ALTER TABLE `email_verifications`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `redeemed_coupons`
--
ALTER TABLE `redeemed_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shared_coupons`
--
ALTER TABLE `shared_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_profiles`
--
ALTER TABLE `business_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_verifications`
--
ALTER TABLE `email_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redeemed_coupons`
--
ALTER TABLE `redeemed_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shared_coupons`
--
ALTER TABLE `shared_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
