-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 01:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikebdnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accessoriesname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `madeby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `accessoriestype_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usedtime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 2,
  `price` int(11) NOT NULL,
  `negotiable` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accessoriestypes`
--

CREATE TABLE `accessoriestypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accessoriesname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounttypes`
--

CREATE TABLE `accounttypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `superadmin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `accounttype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounttypes`
--

INSERT INTO `accounttypes` (`id`, `superadmin_id`, `accounttype`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'Superadmin', '2020-02-09 00:28:55', '2020-02-09 00:28:55'),
(2, 1, 'User', 'Superadmin', '2020-02-09 00:28:59', '2020-02-09 00:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `adminpayments`
--

CREATE TABLE `adminpayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `acash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anote` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pattachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giftcard` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ccard_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_CVV2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payfrom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paydue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `superadmin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `accounttype_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `superadmin_id`, `accounttype_id`, `name`, `image`, `phone`, `email`, `password`, `status_id`, `gender_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'zahidul Islam', '1581229784__156303.jpeg', '01739898764', 'admin1234@gmail.com', '$2y$10$UOBdxUfmw2LJ6Xdrtq6Ha.2gwLUEixEWEPpLEuQaVo9pMT7XIZcHi', 1, 1, NULL, '2020-02-09 00:29:44', '2020-02-09 00:29:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barcodes`
--

CREATE TABLE `barcodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `barcode_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogcategorylists`
--

CREATE TABLE `blogcategorylists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `categorylist` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogcategorylists`
--

INSERT INTO `blogcategorylists` (`id`, `blog_id`, `categorylist`, `created_at`, `updated_at`) VALUES
(1, 1, 'def', '2020-02-19 00:31:56', '2020-02-19 00:31:56'),
(2, 2, 'def', '2020-02-19 00:33:57', '2020-02-19 00:33:57'),
(4, 4, 'ghi', '2020-02-19 00:41:15', '2020-02-19 00:41:15'),
(5, 5, 'def', '2020-02-19 00:43:51', '2020-02-19 00:43:51'),
(6, 6, 'abc', '2020-02-19 00:45:55', '2020-02-19 00:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `blogcomments`
--

CREATE TABLE `blogcomments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `clickview` int(11) NOT NULL DEFAULT 0,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `superadmin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tag`)),
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metadescription` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postimage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 2,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `slug`, `language`, `clickview`, `admin_id`, `superadmin_id`, `title`, `tag`, `url`, `metadescription`, `postimage`, `status`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'honda-xr150l-feature-review-expand-your-horizon', 'en', 0, 1, NULL, 'Honda XR150L Feature Review – Expand Your Horizon', '[\"ad\"]', NULL, 'Mr. Md Shakhawat Sobahan, Director & COO, Monico Technologies LTD\nMr.Shoel Aman, General Manager,\nMr.MD. Khalid Bin Anower, AGM, Business Development,\n', '1582093915__999525.jpeg', 2, '<p>Mr. Md Shakhawat Sobahan, Director &amp; COO, Monico Technologies LTD</p><p> Mr.Shoel Aman, General Manager,</p><p> Mr.MD. Khalid Bin Anower, AGM, Business Development,</p><p> Mr.Harunur Rashid Chayon, AGM, Finder vehicle tracking system</p><p> Mr.Anupam Roy Asst, Manager, Branding &amp; Media</p><p> Mr. Suvro Sen, CEO, BikeBD.</p><p> Mr. Asad Iqbal , CTO, BikeBD<a href=\"https://www.finder-lbs.com/\" rel=\"noopener noreferrer\" target=\"_blank\">PS</a>&nbsp;has created a large number of customers through its customized solution which includes its build map (known as Monico map) and device. Monico Map which is a new concept in the GPS tracking system in Bangladesh.Finder GPS has a lot of features like API connectivity, Customized Landmarks, GEO alert, over-speed alert, power alert, etc.</p><p>For <strong>BikeBD members </strong>they will be providing special service to the bikers. Any biker who will have “BikeBD Sticker” on his bike will be able to purchase the device at&nbsp;a special price of&nbsp;3500/- BDT. In Dhaka and Chittagong the installation charge is free and outside Dhaka and Chittagong <strong>installation charge will be 1000/-</strong>. <strong>The monthly subscription charge is 350/- BDT.</strong> All these offers are only for BikeBD Fans and Followers.</p><p>Currently BikeBD has Engine oil partner with Mobil, Helmet partner with GearX Bang</p><p><img src=\"https://www.bikebd.com/wp-content/uploads/2020/02/bikebd-and-finder-gps.jpg\" alt=\"bikebd and finder gps\" height=\"960\" width=\"1280\"></p>', '2020-02-19 00:31:56', '2020-02-19 00:31:56', NULL),
(2, 'Yamaha-Cashback', 'en', 0, 1, NULL, 'Yamaha Cashback Offer On Valentine February 2020 !', '[\"asd\"]', NULL, 'Yamaha Cashback Offer On Valentine February 2020 !Yamaha Cashback Offer On Valentine February 2020 !Yamaha Cashback Offer On Valentine February 2020 !', '1582094037__811664.jpeg', 2, '<p><img src=\"https://www.bikebd.com/wp-content/uploads/2020/02/yamaha-fzs-v3-abs-2019.jpg\" alt=\"yamaha fzs v3 abs 2019\" height=\"500\" width=\"750\"></p><p>With every purchase of <a href=\"https://www.bikebd.com/yamaha-fzs-fi-v3-review-team-bikebd/\" rel=\"noopener noreferrer\" target=\"_blank\">Yamaha FZS FI V3 (ABS)</a>, FZ FI V3 (ABS) &amp; FZS FI V2 customers can avail 10,000/- BDT cashback. This offer will continue till 29th February 2019.maha introduces the FZS journey back in 2008.&nbsp;Everyone was surprised back then because for the first time they fitted 140 section rear tire on this 150cc segment. Because of this acceleration, mileage, and top speed may decrease but control of handling and braking increases.</p><p class=\"ql-align-center\"><a href=\"https://www.bikebd.com/adserv/www/delivery/ck.php?oaparams=2__bannerid=51__zoneid=16__cb=0b3e3e09f1__oadest=https%3A%2F%2Fwww.facebook.com%2Fbdkawasaki%2F\" rel=\"noopener noreferrer\" target=\"_blank\"><img src=\"https://www.bikebd.com/adserv/www/images/2f691bd3927bd43facd1bfd2fc1896b1.jpg\" height=\"250\" width=\"300\"></a></p><p class=\"ql-align-center\"><img src=\"https://www.bikebd.com/adserv/www/delivery/lg.php?bannerid=51&amp;campaignid=24&amp;zoneid=16&amp;loc=https%3A%2F%2Fwww.bikebd.com%2Fyamaha-cashback-offer-valentine-february-2020%2F&amp;referer=https%3A%2F%2Fwww.bikebd.com%2F&amp;cb=0b3e3e09f1\" height=\"0\" width=\"0\"></p><p>Yamaha FZS series is one of the popular series in Bangladesh. These series are popular for its handling, braking, and balance.&nbsp;Yamaha has improved this motorcycle day by day. First, they introduce with Fi (Fuel injection) engine. Last year they introduced Yamaha FZS Fi V3 motorcycle with single-channel ABS (anti-lock braking system).</p><h2 class=\"ql-align-center\"><a href=\"https://www.youtube.com/watch?v=Ik7esKErCQY\" rel=\"noopener noreferrer\" target=\"_blank\">Click For To See The Yamaha FZS FI V3 Review</a></h2><p>maha introduces the FZS journey back in 2008.&nbsp;Everyone was surprised back then because for the first time they fitted 140 section rear tire on this 150cc segment. Because of this acceleration, mileage, and top speed may decrease but control of handling and braking increases.</p><p class=\"ql-align-center\"><a href=\"https://www.bikebd.com/adserv/www/delivery/ck.php?oaparams=2__bannerid=51__zoneid=16__cb=0b3e3e09f1__oadest=https%3A%2F%2Fwww.facebook.com%2Fbdkawasaki%2F\" rel=\"noopener noreferrer\" target=\"_blank\"><img src=\"https://www.bikebd.com/adserv/www/images/2f691bd3927bd43facd1bfd2fc1896b1.jpg\" height=\"250\" width=\"300\"></a></p><p class=\"ql-align-center\"><img src=\"https://www.bikebd.com/adserv/www/delivery/lg.php?bannerid=51&amp;campaignid=24&amp;zoneid=16&amp;loc=https%3A%2F%2Fwww.bikebd.com%2Fyamaha-cashback-offer-valentine-february-2020%2F&amp;referer=https%3A%2F%2Fwww.bikebd.com%2F&amp;cb=0b3e3e09f1\" height=\"0\" width=\"0\"></p><p>Yamaha FZS series is one of the popular series in Bangladesh. These series are popular for its handling, braking, and balance.&nbsp;Yamaha has improved this motorcycle day by day. First, they introduce with Fi (Fuel injection) engine. Last year they introduced Yamaha FZS Fi V3 motorcycle with single-channel ABS (anti-lock braking system).</p><h2 class=\"ql-align-center\"><a href=\"https://www.youtube.com/watch?v=Ik7esKErCQY\" rel=\"noopener noreferrer\" target=\"_blank\">Click For To See The Yamaha FZS FI V3 Review</a></h2><p>maha introduces the FZS journey back in 2008.&nbsp;Everyone was surprised back then because for the first time they fitted 140 section rear tire on this 150cc segment. Because of this acceleration, mileage, and top speed may decrease but control of handling and braking increases.</p><p class=\"ql-align-center\"><a href=\"https://www.bikebd.com/adserv/www/delivery/ck.php?oaparams=2__bannerid=51__zoneid=16__cb=0b3e3e09f1__oadest=https%3A%2F%2Fwww.facebook.com%2Fbdkawasaki%2F\" rel=\"noopener noreferrer\" target=\"_blank\"><img src=\"https://www.bikebd.com/adserv/www/images/2f691bd3927bd43facd1bfd2fc1896b1.jpg\" height=\"250\" width=\"300\"></a></p><p class=\"ql-align-center\"><img src=\"https://www.bikebd.com/adserv/www/delivery/lg.php?bannerid=51&amp;campaignid=24&amp;zoneid=16&amp;loc=https%3A%2F%2Fwww.bikebd.com%2Fyamaha-cashback-offer-valentine-february-2020%2F&amp;referer=https%3A%2F%2Fwww.bikebd.com%2F&amp;cb=0b3e3e09f1\" height=\"0\" width=\"0\"></p><p>Yamaha FZS series is one of the popular series in Bangladesh. These series are popular for its handling, braking, and balance.&nbsp;Yamaha has improved this motorcycle day by day. First, they introduce with Fi (Fuel injection) engine. Last year they introduced Yamaha FZS Fi V3 motorcycle with single-channel ABS (anti-lock braking system).</p><h2 class=\"ql-align-center\"><a href=\"https://www.youtube.com/watch?v=Ik7esKErCQY\" rel=\"noopener noreferrer\" target=\"_blank\">Click For To See The Yamaha FZS FI V3 Review</a></h2><p>maha introduces the FZS journey back in 2008.&nbsp;Everyone was surprised back then because for the first time they fitted 140 section rear tire on this 150cc segment. Because of this acceleration, mileage, and top speed may decrease but control of handling and braking increases.</p><p class=\"ql-align-center\"><a href=\"https://www.bikebd.com/adserv/www/delivery/ck.php?oaparams=2__bannerid=51__zoneid=16__cb=0b3e3e09f1__oadest=https%3A%2F%2Fwww.facebook.com%2Fbdkawasaki%2F\" rel=\"noopener noreferrer\" target=\"_blank\"><img src=\"https://www.bikebd.com/adserv/www/images/2f691bd3927bd43facd1bfd2fc1896b1.jpg\" height=\"250\" width=\"300\"></a></p><p class=\"ql-align-center\"><img src=\"https://www.bikebd.com/adserv/www/delivery/lg.php?bannerid=51&amp;campaignid=24&amp;zoneid=16&amp;loc=https%3A%2F%2Fwww.bikebd.com%2Fyamaha-cashback-offer-valentine-february-2020%2F&amp;referer=https%3A%2F%2Fwww.bikebd.com%2F&amp;cb=0b3e3e09f1\" height=\"0\" width=\"0\"></p><p>Yamaha FZS series is one of the popular series in Bangladesh. These series are popular for its handling, braking, and balance.&nbsp;Yamaha has improved this motorcycle day by day. First, they introduce with Fi (Fuel injection) engine. Last year they introduced Yamaha FZS Fi V3 motorcycle with single-channel ABS (anti-lock braking system).</p><h2 class=\"ql-align-center\"><a href=\"https://www.youtube.com/watch?v=Ik7esKErCQY\" rel=\"noopener noreferrer\" target=\"_blank\">Click For To See The Yamaha FZS FI V3 Review</a></h2><p><br></p>', '2020-02-19 00:33:57', '2020-02-19 00:33:57', NULL),
(4, 'ঢাকার-আশেপাশে-৩৪-টি-মনোরম-জায়গা-একদিনে-ঘুরে-আসার-মত', 'bn', 0, 1, NULL, 'ঢাকার আশেপাশে ৩৪ টি মনোরম জায়গা একদিনে ঘুরে আসার মত', '[\"a\"]', 'dsfsdfsdfsd', 'বর্তমান সময়ে বাইকাররা একটু সুযোগ পেলে বাইক নিয়ে একদিনে ঢাকার আশেপাশে ঘুরে আসার মতো মনোরম জায়গা গুলোর সন্ধানে থাকে। বাইক নিয়ে লং ট্যুরে যাওয়ার ইচ্ছা আমাদের অনেকেরই থাকে। কিন্তু আমরা সময়ের অভাবের কারনে অনেক সময় লং ট্যুর দেয়ার সুযোগ হয় না। আজ আমরা জানবো ঢাকার আশেপাশে ৩৪ টি মনোরম জায়গা সম্পর্কে।sdafsda', '1582094475__627189.jpeg', 2, '<p>বর্তমান সময়ে বাইকাররা একটু সুযোগ পেলে বাইক নিয়ে একদিনে ঢাকার আশেপাশে ঘুরে আসার মতো মনোরম জায়গা গুলোর সন্ধানে থাকে। বাইক নিয়ে লং ট্যুরে যাওয়ার ইচ্ছা আমাদের অনেকেরই থাকে। কিন্তু আমরা সময়ের অভাবের কারনে অনেক সময় লং ট্যুর দেয়ার সুযোগ হয় না। আজ আমরা জানবো ঢাকার আশেপাশে ৩৪ টি মনোরম জায়গা সম্পর্কে।</p>', '2020-02-19 00:41:15', '2020-02-19 00:41:15', NULL),
(5, 'ইস্যুরেন্স-কাভারেজ-!', 'bn', 0, 1, NULL, 'লিফান মোটরসাইকেল দিচ্ছে ৭০,০০০/- টাকার বাইক ইস্যুরেন্স কাভারেজ !', '[\"adf\"]', 'asdafsdafsadf', 'বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !', '1582094631__313800.jpeg', 2, '<p>বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !বাইক ইস্যুরেন্স কাভারেজ !<a href=\"https://bikebd.com/bn/wp-content/uploads/2020/01/lifan-motorcycle-insurance-coverage-%E0%A6%B2%E0%A6%BF%E0%A6%AB%E0%A6%BE%E0%A6%A8-%E0%A6%AE%E0%A7%8B%E0%A6%9F%E0%A6%B0%E0%A6%B8%E0%A6%BE%E0%A6%87%E0%A6%95%E0%A7%87%E0%A6%B2.jpg\" rel=\"noopener noreferrer\" target=\"_blank\"><img src=\"https://bikebd.com/bn/wp-content/uploads/2020/01/lifan-motorcycle-insurance-coverage-%E0%A6%B2%E0%A6%BF%E0%A6%AB%E0%A6%BE%E0%A6%A8-%E0%A6%AE%E0%A7%8B%E0%A6%9F%E0%A6%B0%E0%A6%B8%E0%A6%BE%E0%A6%87%E0%A6%95%E0%A7%87%E0%A6%B2.jpg\" alt=\"lifan motorcycle insurance coverage লিফান মোটরসাইকেল\" height=\"800\" width=\"800\"></a></p><p>বাইকারদের কথা মাথায় রেখে এই উদ্যোগ সত্যি প্রশংসনীয় । বাংলাদেশে প্রথম বারের মত কোন বাইক কোম্পানি এটি শুরু করতে যাচ্ছে । এই ইন্স্যুরেন্স এর সাথে যুক্ত হয়ে<strong>বিমাবিড ডট কম</strong> । প্রত্যেকটি বাইকের প্রিমিয়াম জমা দিবে রাসেল ইন্ডাস্ট্রি। প্রথম মালিকের ক্ষেত্রে এই সুবিধা থাকবে । তবে বাইক সেকেন্ড হ্যান্ড কিনবেন তাদের ক্ষেত্রে এই ইন্স্যুরেন্স সুবিধা থাকবে না ।</p><p class=\"ql-align-center\"><img src=\"https://bkdads.bikebd.com/www/delivery/lg.php?bannerid=0&amp;campaignid=0&amp;zoneid=17&amp;loc=https%3A%2F%2Fwww.bikebd.com%2Fbn%2F%25e0%25a6%25b2%25e0%25a6%25bf%25e0%25a6%25ab%25e0%25a6%25be%25e0%25a6%25a8-%25e0%25a6%25ae%25e0%25a7%258b%25e0%25a6%259f%25e0%25a6%25b0%25e0%25a6%25b8%25e0%25a6%25be%25e0%25a6%2587%25e0%25a6%2595%25e0%25a7%2587%25e0%25a6%25b2%2F&amp;referer=https%3A%2F%2Fwww.bikebd.com%2Fbn%2F&amp;cb=d3e4128434\" height=\"0\" width=\"0\"></p><p>বাইক কেনার পর ডিলার থেকে নিলে ডিলার এর কাছে পর্যাপ্ত ইনফরমেশন সহ রেজিস্ট্রেশন এর জন্য জমা দিতে হবে ক্যাশ মেমো ফটোকপি সহ ।<a href=\"https://bikebd.com/bn/wp-content/uploads/2020/01/lifan-motorcycle-insurance-coverage-%E0%A6%B2%E0%A6%BF%E0%A6%AB%E0%A6%BE%E0%A6%A8-%E0%A6%AE%E0%A7%8B%E0%A6%9F%E0%A6%B0%E0%A6%B8%E0%A6%BE%E0%A6%87%E0%A6%95%E0%A7%87%E0%A6%B2.jpg\" rel=\"noopener noreferrer\" target=\"_blank\"><img src=\"https://bikebd.com/bn/wp-content/uploads/2020/01/lifan-motorcycle-insurance-coverage-%E0%A6%B2%E0%A6%BF%E0%A6%AB%E0%A6%BE%E0%A6%A8-%E0%A6%AE%E0%A7%8B%E0%A6%9F%E0%A6%B0%E0%A6%B8%E0%A6%BE%E0%A6%87%E0%A6%95%E0%A7%87%E0%A6%B2.jpg\" alt=\"lifan motorcycle insurance coverage লিফান মোটরসাইকেল\" height=\"800\" width=\"800\"></a></p><p>বাইকারদের কথা মাথায় রেখে এই উদ্যোগ সত্যি প্রশংসনীয় । বাংলাদেশে প্রথম বারের মত কোন বাইক কোম্পানি এটি শুরু করতে যাচ্ছে । এই ইন্স্যুরেন্স এর সাথে যুক্ত হয়েছে <strong>বিমাবিড ডট</strong> । প্রত্যেকটি বাইকের প্রিমিয়াম জমা দিবে রাসেল ইন্ডাস্ট্রি। প্রথম মালিকের ক্ষেত্রে এই সুবিধা থাকবে । তবে বাইক সেকেন্ড হ্যান্ড কিনবেন তাদের ক্ষেত্রে এই ইন্স্যুরেন্স সুবিধা থাকবে না ।</p><p class=\"ql-align-center\"><strong><img src=\"https://bkdads.bikebd.com/www/delivery/lg.php?bannerid=0&amp;campaignid=0&amp;zoneid=17&amp;loc=https%3A%2F%2Fwww.bikebd.com%2Fbn%2F%25e0%25a6%25b2%25e0%25a6%25bf%25e0%25a6%25ab%25e0%25a6%25be%25e0%25a6%25a8-%25e0%25a6%25ae%25e0%25a7%258b%25e0%25a6%259f%25e0%25a6%25b0%25e0%25a6%25b8%25e0%25a6%25be%25e0%25a6%2587%25e0%25a6%2595%25e0%25a7%2587%25e0%25a6%25b2%2F&amp;referer=https%3A%2F%2Fwww.bikebd.com%2Fbn%2F&amp;cb=d3e4128434\" height=\"0\" width=\"0\"></strong></p><p>বাইক কেনার পর ডিলার থেকে নিলে ডিলার এর কাছে পর্যাপ্ত ইনফরমেশন সহ রেজিস্ট্রেশন এর জন্য জমা দিতে হবে ক্যাশ মেমো ফটোকপি সহ ।<strong> কম</strong>ছে </p>', '2020-02-19 00:43:51', '2020-02-19 00:43:51', NULL),
(6, 'ইস্যুরেন্স-কাভারেজ', 'en', 0, 1, NULL, 'MoU Signing Ceremony Between BikeBD And Finder GPS', '[\"a\"]', '', 'Finder GPS is the new tracker partner of BikeBD.com. There was an MoU signing ceremony with Monico Technologies Ltd and BikeBD a few days back. Finder GPS is working in Bangladesh for the past 10 years & will be working with BikeBD to create awareness among the bikers about motorcycle security systems in Bangladesh.', '1582094755__398566.jpeg', 2, '<p><strong>Finder GPS</strong> is the new tracker partner of<strong> BikeBD.com</strong>. There was an MoU signing ceremony with Monico Technologies Ltd and BikeBD a few days back. <strong>Finder GPS</strong> is working in Bangladesh for the past 10 years &amp; will be working with BikeBD to create awareness among the bikers about motorcycle security systems in Bangladesh.<strong>Finder GPS</strong> is the new tracker partner of<strong> BikeBD.com</strong>. There was an MoU signing ceremony with Monico Technologies Ltd and BikeBD a few days back. <strong>Finder GPS</strong> is working in Bangladesh for the past 10 years &amp; will be working with BikeBD to create awareness among the bikers about motorcycle security systems in Bangladesh.rom now on Finder is the Official GPS partner of BikeBD. In the MoU signing ceremony the folllowing officials were present</p><p class=\"ql-align-center\"><a href=\"https://www.bikebd.com/adserv/www/delivery/ck.php?oaparams=2__bannerid=51__zoneid=16__cb=67bc397dd0__oadest=https%3A%2F%2Fwww.facebook.com%2Fbdkawasaki%2F\" rel=\"noopener noreferrer\" target=\"_blank\"><img src=\"https://www.bikebd.com/adserv/www/images/2f691bd3927bd43facd1bfd2fc1896b1.jpg\" height=\"250\" width=\"300\"></a></p><p class=\"ql-align-center\"><img src=\"https://www.bikebd.com/adserv/www/delivery/lg.php?bannerid=51&amp;campaignid=24&amp;zoneid=16&amp;loc=https%3A%2F%2Fwww.bikebd.com%2Fmou-signing-ceremony-between-bikebd-and-finder-gps%2F&amp;referer=https%3A%2F%2Fwww.bikebd.com%2F&amp;cb=67bc397dd0\" height=\"0\" width=\"0\"></p><p>Mr. Md Shakhawat Sobahan, Director &amp; COO, Monico Technologies LTD</p><p> Mr.Shoel Aman, General Manager,</p><p> Mr.MD. Khalid Bin Anower, AGM, Business Development,</p><p> Mr.Harunur Rashid Chayon, AGM, Finder vehicle tracking system</p><p> Mr.Anupam Roy Asst, Manager, Branding &amp; Media</p><p> Mr. Suvro Sen, CEO, BikeBD.</p><p> Mr. Asad Iqbal , CTO, BikeBD</p>', '2020-02-19 00:45:55', '2020-02-19 00:45:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `categoryname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `admin_id`, `categoryname`, `created_at`, `updated_at`) VALUES
(1, 1, 'abc', '2020-02-09 02:37:23', '2020-02-09 02:37:23'),
(2, 1, 'def', '2020-02-09 02:37:33', '2020-02-09 02:37:33'),
(3, 1, 'ghi', '2020-02-09 02:37:39', '2020-02-09 02:37:39'),
(4, 1, 'xyz', '2020-02-09 02:37:44', '2020-02-09 02:37:44'),
(5, 1, 'Hello', '2020-02-19 01:19:45', '2020-02-19 01:19:45');

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
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `admin_id`, `gender`, `created_by`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Male', 'Superadmin', '2020-02-09 00:29:05', '2020-02-09 00:29:05'),
(2, NULL, 'Female', 'Superadmin', '2020-02-09 00:29:09', '2020-02-09 00:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `divisionname` varchar(198) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dbanglaname` varchar(198) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(41, '2014_10_12_100000_create_password_resets_table', 1),
(42, '2019_03_19_103350_create_superadmins_table', 1),
(43, '2019_04_19_064005_create_accounttypes_table', 1),
(44, '2019_04_19_105136_create_statuses_table', 1),
(45, '2019_04_20_103232_create_genders_table', 1),
(46, '2019_05_01_095710_create_admins_table', 1),
(47, '2019_05_12_095710_create_users_table', 1),
(48, '2019_05_17_083024_create_payments_table', 1),
(49, '2019_05_21_051520_create_permission_tables', 1),
(50, '2019_05_22_101801_create_barcodes_table', 1),
(51, '2019_08_19_000000_create_failed_jobs_table', 1),
(52, '2019_09_05_170859_create_settings_table', 1),
(53, '2019_09_24_170404_create_adminpayments_table', 1),
(54, '2019_12_05_122510_create_locations_table', 1),
(55, '2019_12_05_123241_create_sublocations_table', 1),
(56, '2019_12_07_070746_create_accessoriestypes_table', 1),
(57, '2019_12_08_090310_create_modelyears_table', 2),
(58, '2019_12_08_093123_create_categories_table', 3),
(65, '2020_02_10_063905_create_blogcategorylists_table', 4),
(66, '2020_02_13_090732_create_blogcomments_table', 4),
(71, '2020_02_09_054458_create_blogs_table', 5),
(72, '2020_02_13_094536_create_parentpages_table', 5),
(74, '2020_02_13_095139_create_pages_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `modelyears`
--

CREATE TABLE `modelyears` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `modelyear` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `clickview` int(11) NOT NULL DEFAULT 0,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `superadmin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parentpage_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pagetitle` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageurl` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagemetadescription` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pageimage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 2,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `language`, `clickview`, `admin_id`, `superadmin_id`, `parentpage_id`, `pagetitle`, `pagename`, `pageurl`, `pagemetadescription`, `pageimage`, `status`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sdfsdf', 'bn', 0, 1, NULL, 4, 'sdfsdf', 'Home1', NULL, 'sadf sdaf \nsadfsda\n\nsadf\nsad', '1582096539__945780.jpeg', 2, '<p><strong>sdfasdfds af</strong></p><p><strong>sadf</strong></p><p><strong>sfda</strong></p><p><strong>sad</strong></p><p><br></p><p><u>sad fsd</u></p><p><u>af</u></p><p><u> sda</u></p><p><u>f</u></p><h1>sd</h1>', '2020-02-19 01:15:39', '2020-02-19 01:15:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parentpages`
--

CREATE TABLE `parentpages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `superadmin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parentpage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parentpages`
--

INSERT INTO `parentpages` (`id`, `admin_id`, `superadmin_id`, `parentpage`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Home', '2020-02-19 01:06:37', '2020-02-19 01:07:56'),
(2, 1, NULL, 'About', '2020-02-19 01:06:45', '2020-02-19 01:06:45'),
(3, 1, NULL, 'Contact', '2020-02-19 01:06:52', '2020-02-19 01:06:52'),
(4, 1, NULL, 'Gellary', '2020-02-19 01:07:21', '2020-02-19 01:07:21'),
(5, 1, NULL, 'Home1', '2020-02-19 01:15:39', '2020-02-19 01:15:39');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pay_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(198) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `printheadline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `papersize` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstcondition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondcondition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thirdcondition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `superadmin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `superadmin_id`, `status_name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Active', 'Superadmin', '2020-02-09 00:29:17', '2020-02-09 00:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `sublocations`
--

CREATE TABLE `sublocations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `districtname` varchar(198) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disbanglaname` varchar(198) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `superadmins`
--

CREATE TABLE `superadmins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `superadminname` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(198) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `superadmins`
--

INSERT INTO `superadmins` (`id`, `superadminname`, `image`, `phone`, `email`, `password`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'not-found.jpg', '', 'admin1234@gmail.com', '$2y$10$oiWSKKpE745.ILnxJlrH/ujAccydcnDEnbnfQcqFKAreCWzgrlKtu', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `superadmin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `accounttype_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `superadmin_id`, `admin_id`, `accounttype_id`, `name`, `image`, `phone`, `email`, `status_id`, `gender_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, NULL, 1, 2, 'zahidul Islam', '1581325204__825728.jpeg', '01744852158', 'admin1234@gmail.com', 1, 2, NULL, '$2y$10$HZoV7ox2zn/Qac/u3zFvPuHYt.wgk5iVW4rzrhzyngi6A3py950tO', NULL, '2020-02-10 03:00:05', '2020-02-10 03:00:05', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accessoriestypes`
--
ALTER TABLE `accessoriestypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accessoriestypes_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `accounttypes`
--
ALTER TABLE `accounttypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounttypes_accounttype_unique` (`accounttype`),
  ADD KEY `accounttypes_superadmin_id_foreign` (`superadmin_id`);

--
-- Indexes for table `adminpayments`
--
ALTER TABLE `adminpayments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminpayments_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_superadmin_id_foreign` (`superadmin_id`),
  ADD KEY `admins_accounttype_id_foreign` (`accounttype_id`),
  ADD KEY `admins_status_id_foreign` (`status_id`),
  ADD KEY `admins_gender_id_foreign` (`gender_id`);

--
-- Indexes for table `barcodes`
--
ALTER TABLE `barcodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcodes_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `blogcategorylists`
--
ALTER TABLE `blogcategorylists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogcategorylists_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `blogcomments`
--
ALTER TABLE `blogcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogcomments_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_admin_id_foreign` (`admin_id`),
  ADD KEY `blogs_superadmin_id_foreign` (`superadmin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_categoryname_unique` (`categoryname`),
  ADD KEY `categories_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genders_gender_unique` (`gender`),
  ADD KEY `genders_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modelyears`
--
ALTER TABLE `modelyears`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modelyears_modelyear_unique` (`modelyear`),
  ADD KEY `modelyears_admin_id_foreign` (`admin_id`);

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
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD UNIQUE KEY `pages_pagename_unique` (`pagename`),
  ADD KEY `pages_admin_id_foreign` (`admin_id`),
  ADD KEY `pages_superadmin_id_foreign` (`superadmin_id`),
  ADD KEY `pages_parentpage_id_foreign` (`parentpage_id`);

--
-- Indexes for table `parentpages`
--
ALTER TABLE `parentpages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parentpages_parentpage_unique` (`parentpage`),
  ADD KEY `parentpages_admin_id_foreign` (`admin_id`),
  ADD KEY `parentpages_superadmin_id_foreign` (`superadmin_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statuses_superadmin_id_foreign` (`superadmin_id`);

--
-- Indexes for table `sublocations`
--
ALTER TABLE `sublocations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sublocations_admin_id_foreign` (`admin_id`),
  ADD KEY `sublocations_division_id_foreign` (`division_id`);

--
-- Indexes for table `superadmins`
--
ALTER TABLE `superadmins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `superadmins_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_superadmin_id_foreign` (`superadmin_id`),
  ADD KEY `users_admin_id_foreign` (`admin_id`),
  ADD KEY `users_accounttype_id_foreign` (`accounttype_id`),
  ADD KEY `users_status_id_foreign` (`status_id`),
  ADD KEY `users_gender_id_foreign` (`gender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accessoriestypes`
--
ALTER TABLE `accessoriestypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounttypes`
--
ALTER TABLE `accounttypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adminpayments`
--
ALTER TABLE `adminpayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barcodes`
--
ALTER TABLE `barcodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogcategorylists`
--
ALTER TABLE `blogcategorylists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blogcomments`
--
ALTER TABLE `blogcomments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `modelyears`
--
ALTER TABLE `modelyears`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parentpages`
--
ALTER TABLE `parentpages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sublocations`
--
ALTER TABLE `sublocations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `superadmins`
--
ALTER TABLE `superadmins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accessoriestypes`
--
ALTER TABLE `accessoriestypes`
  ADD CONSTRAINT `accessoriestypes_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `accounttypes`
--
ALTER TABLE `accounttypes`
  ADD CONSTRAINT `accounttypes_superadmin_id_foreign` FOREIGN KEY (`superadmin_id`) REFERENCES `superadmins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `adminpayments`
--
ALTER TABLE `adminpayments`
  ADD CONSTRAINT `adminpayments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_accounttype_id_foreign` FOREIGN KEY (`accounttype_id`) REFERENCES `accounttypes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_superadmin_id_foreign` FOREIGN KEY (`superadmin_id`) REFERENCES `superadmins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `barcodes`
--
ALTER TABLE `barcodes`
  ADD CONSTRAINT `barcodes_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `superadmins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogcategorylists`
--
ALTER TABLE `blogcategorylists`
  ADD CONSTRAINT `blogcategorylists_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogcomments`
--
ALTER TABLE `blogcomments`
  ADD CONSTRAINT `blogcomments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_superadmin_id_foreign` FOREIGN KEY (`superadmin_id`) REFERENCES `superadmins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `genders`
--
ALTER TABLE `genders`
  ADD CONSTRAINT `genders_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `superadmins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `modelyears`
--
ALTER TABLE `modelyears`
  ADD CONSTRAINT `modelyears_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_parentpage_id_foreign` FOREIGN KEY (`parentpage_id`) REFERENCES `parentpages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_superadmin_id_foreign` FOREIGN KEY (`superadmin_id`) REFERENCES `superadmins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parentpages`
--
ALTER TABLE `parentpages`
  ADD CONSTRAINT `parentpages_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parentpages_superadmin_id_foreign` FOREIGN KEY (`superadmin_id`) REFERENCES `superadmins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `superadmins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `statuses`
--
ALTER TABLE `statuses`
  ADD CONSTRAINT `statuses_superadmin_id_foreign` FOREIGN KEY (`superadmin_id`) REFERENCES `superadmins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sublocations`
--
ALTER TABLE `sublocations`
  ADD CONSTRAINT `sublocations_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sublocations_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_accounttype_id_foreign` FOREIGN KEY (`accounttype_id`) REFERENCES `accounttypes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_superadmin_id_foreign` FOREIGN KEY (`superadmin_id`) REFERENCES `superadmins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
