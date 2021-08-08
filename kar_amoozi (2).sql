-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2020 at 09:38 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kar_amoozi`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_levels`
--

CREATE TABLE `access_levels` (
  `id` char(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'کد سطح دسترسی',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'نام سطح دسترسی'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `access_levels`
--

INSERT INTO `access_levels` (`id`, `name`) VALUES
('100', 'منو کاربران'),
('101', 'افزودن کاربر'),
('102', 'ویرایش کاربر'),
('103', 'حذف کاربر'),
('104', 'سطح دسترسی کاربر'),
('105', 'منو سطوح دسترسی'),
('106', 'افزودن سطح دسترسی'),
('107', 'ویرایش سطح دسترسی'),
('108', 'منو برنامه هفتگی'),
('109', 'افزودن برنامه هفتگی'),
('110', 'ویرایش برنامه هفتگی'),
('111', 'حذف برنامه هفتگی'),
('112', 'منو تنظیمات'),
('113', 'اسلایدر'),
('114', 'افزودن عکس'),
('115', 'ویرایش عکس'),
('116', 'حذف عکس'),
('117', 'اطلاعیه'),
('118', 'افزودن اطلاعیه'),
('119', 'ویرایش اطلاعیه'),
('120', 'حذف اطلاعیه'),
('121', 'منو نیمسال'),
('122', 'افزودن نیمسال'),
('123', 'ویرایش نیمسال'),
('124', 'حذف نیمسال'),
('125', 'منو چارت تحصیلی'),
('126', 'افزودن چارت تحصیلی'),
('127', 'ویرایش چارت تحصیلی'),
('128', 'حذف چارت تحصیلی'),
('129', 'منو صندوق پیام'),
('130', 'حذف پیام'),
('131', 'منو لینک کلاس ها'),
('132', 'افزودن لینک کلاس'),
('133', 'ویرایش لینک کلاس'),
('134', 'مشاهده فرم های پروژه'),
('135', 'فرم پروژه دانشجو'),
('136', 'منو اساتید'),
('137', 'افزودن استاد'),
('138', 'ویرایش استاد');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'عنوان اطلاعیه',
  `text` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'متن اطلاعیه',
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'آدرس فایل',
  `ClassLink` char(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'لینک درس',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `text`, `attachment`, `ClassLink`, `created_at`, `updated_at`) VALUES
(1, 'انتخاب واحد', 'شروع انتخاب واحد', NULL, NULL, '2020-09-24 10:11:34', '2020-09-24 10:11:59'),
(2, 'test', 'testtest', '/Announcement/1601193468.php', '1011', '2020-09-27 07:32:00', '2020-09-27 07:57:49'),
(3, 'ضصث', 'شیذدئمن', NULL, '5555', '2020-09-27 08:25:23', '2020-09-27 08:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `CodeBranch` char(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'کدرشته تحصیلی',
  `NameBranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'نام رشته تحصیلی',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`CodeBranch`, `NameBranch`, `created_at`, `updated_at`) VALUES
('111', 'مهندسی تکنولوژی نرم افزار', NULL, NULL),
('154', 'نرم افزار کامپیوتر', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_links`
--

CREATE TABLE `class_links` (
  `ERCode` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `LessonCode` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `LessonTitle` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `DayOfWeek` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `StartTime` char(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EndTime` char(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TeacherName` char(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ClassLink` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_links`
--

INSERT INTO `class_links` (`ERCode`, `LessonCode`, `LessonTitle`, `DayOfWeek`, `StartTime`, `EndTime`, `TeacherName`, `ClassLink`) VALUES
('1010', '4565', 'برنامه سازی', 'دوشنبه', '15:02', '18:00', 'علی اصغر فلاح', 'https://www.google.com/'),
('1011', '4651', 'برنامه سازی1', 'یک شنبه', '15:02', '19:02', 'ستوده', 'https://www.google0.com/'),
('1015', '8527', 'هوش مصنوعی', 'یک شنبه', '17:45', '21:00', 'حسینی', 'https://www.youtube.com/'),
('5555', '8521', 'شبیه سازی', NULL, NULL, NULL, 'فلاح', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` char(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'نام کامل',
  `phonenumber` char(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'شماره همراه',
  `text` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'متن پیام',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `fullname`, `phonenumber`, `text`, `created_at`, `updated_at`) VALUES
(4, 'احسان جابری', '09157932340', 'سلام من به شما.', '2020-09-29 08:07:45', '2020-09-29 08:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2020_09_20_095848_create_access_levels_table', 1),
(3, '2020_09_20_100554_create_user_access_levels_table', 1),
(4, '2020_09_20_101225_create_announcements_table', 1),
(5, '2020_09_20_101547_create_sliders_table', 1),
(6, '2020_09_22_153259_create_terms_table', 1),
(7, '2020_09_22_161126_create_week_shes_table', 1),
(8, '2020_09_24_150923_create_contact_us_table', 2),
(10, '2020_09_26_115354_create_class_links_table', 3),
(12, '2020_09_28_163021_create_access_levels', 4),
(13, '2020_10_18_181341_create_branches_table', 5),
(14, '2020_10_18_181832_create_teachers_table', 6),
(16, '2020_10_18_203009_create_projects_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `CodePrsn` char(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'کدپرسنلی',
  `CountUnit` char(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'تعداد واحد گذرانده',
  `Email` char(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'پست الکترونیک',
  `Telephone` char(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'تلفن ثابت',
  `PhoneNumber` char(13) COLLATE utf8_unicode_ci NOT NULL COMMENT 'تلفن همراه',
  `Address` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'آدرس',
  `ProjectMasterCode` char(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'کد استاد پروژه',
  `ProjectAdvisorCode` char(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'کد ستاد مشاور',
  `Title` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'عنوان پروژه',
  `ProjectType` tinyint(1) NOT NULL COMMENT 'نوع پروژه',
  `Proposed` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'پیشنهاد پروژه',
  `GroupMember` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'اعضای گروه',
  `Summary` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'شرح خلاصه',
  `Equipment` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'امکانات و تجهیزات',
  `HowDoJob` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'روش انجام کار',
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'وضعیت فرم',
  `Message` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'پیام استاد به دانشجو',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`CodePrsn`, `CountUnit`, `Email`, `Telephone`, `PhoneNumber`, `Address`, `ProjectMasterCode`, `ProjectAdvisorCode`, `Title`, `ProjectType`, `Proposed`, `GroupMember`, `Summary`, `Equipment`, `HowDoJob`, `status`, `Message`, `created_at`, `updated_at`) VALUES
('97121055111005', '50', 'ehsan.jaberi20@yahoo.com', '056-32316963', '0915-793-2340', 'بیرجند،بلوار شعبانیه', '97121055111009', '97121055111009', 'سامانه مدیریت دانشگاه', 0, '3', NULL, 'مدیریت بهتر و سریع تر کلاس ها و استاید.', 'زبان برنامه نویسی php', 'فریمورک لاراول', '1', 'رلذادتئ', '2020-10-18 18:35:33', '2020-10-19 08:07:36'),
('97121055111009', '50', 'info-055@tvu.ac.ir', '056-32316967', '0915-793-2341', 'مشهد – چهار راه خیام', '97121055111005', '97121055111005', 'ارزشیابی', 1, '1', 'علیرضا نیکزاد', 'ارزشیابی اساتید', 'ارزشیابی اساتید1', 'ارزشیابی اساتی6', '2', 'asd', '2020-10-18 18:42:59', '2020-10-19 07:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'آدرس عکس',
  `StartDate` date DEFAULT NULL COMMENT 'تاریخ شروع نمایش',
  `EndDate` date DEFAULT NULL COMMENT 'تاریخ پایان نمایش'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image_url`, `StartDate`, `EndDate`) VALUES
(7, '/Slider/1600945263.jpg', '1399-07-03', '1399-07-30'),
(8, '/Slider/1600947242.jpg', '1399-07-03', '1399-09-05'),
(9, '/Slider/1600950210.jpg', '1399-07-03', '1399-07-30'),
(10, '/Slider/1600950225.jpg', '1399-07-03', '1399-07-30'),
(11, '/Slider/1600950238.jpg', '1399-07-03', '1399-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `CodePrsn` char(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'کدپرسنلی',
  `CodeRank` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'مدرک تحصیلی',
  `BrcName` char(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'رشته تحصیلی',
  `Telephone` char(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'تلفن ثابت',
  `PhoneNumber` char(13) COLLATE utf8_unicode_ci NOT NULL COMMENT 'تلفن همراه',
  `Email` char(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'پست الکترونیک',
  `Address` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'آدرس',
  `Status` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'وضعیت',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`CodePrsn`, `CodeRank`, `BrcName`, `Telephone`, `PhoneNumber`, `Email`, `Address`, `Status`, `created_at`, `updated_at`) VALUES
('97121055111005', '3', 'هوش مصنوعی', '05632316963', '09157932340', 'info-055@tvu.ac.ir', 'شیراز،فلکه اول', '1', '2020-10-18 18:05:52', '2020-10-18 18:05:52'),
('97121055111009', '4', 'هوش مصنوعی', '05632316963', '09157932340', 'ehsan.jaberi20@yahoo.com', 'بیرجند،بلوار شعبانیه', '1', '2020-10-18 16:06:39', '2020-10-19 08:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `CodeTrm` char(7) COLLATE utf8_unicode_ci NOT NULL COMMENT 'کد ترم',
  `NameTrm` char(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'نام ترم'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`CodeTrm`, `NameTrm`) VALUES
('991', 'نیم سال اول 99-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `CodePrsn` char(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'کدپرسنلی',
  `CodeNational` char(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'کد ملی',
  `Fname` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'نام',
  `Lname` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'نام خانوادگی',
  `CodeBrc` char(5) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'کد رشته تحصیلی',
  `CodeRank` char(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'کد مدرک',
  `CodeJab` char(5) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'کد سمت',
  `CodeUni` char(5) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'کد دانشگاه',
  `CodeSts` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'کد وضعیت',
  `CodeAccess` char(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'کد سطح دسترسی',
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'نام کاربری',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'رمز عبور',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`CodePrsn`, `CodeNational`, `Fname`, `Lname`, `CodeBrc`, `CodeRank`, `CodeJab`, `CodeUni`, `CodeSts`, `CodeAccess`, `username`, `password`, `created_at`, `updated_at`) VALUES
('97121055111005', '0640549225', 'احسان', 'جابری', NULL, NULL, NULL, NULL, '0', '2', 'ehsanjaberi', '$2y$10$rQAEL/JJ.sdi2jMMJijEReXwqIOGoeukFxixvmh8RNgHEtuszhlRa', '2020-09-24 10:08:17', '2020-09-29 07:32:38'),
('97121055111009', '0640549226', 'علی اکبر', 'طالبی', NULL, NULL, NULL, NULL, '0', '10', 'aliakbar', '$2y$10$dvGggTF2fm2f4QIzyXFdcuguELVsCkAyujHtEZcuGuNfmVTgZ9HRK', '2020-09-24 12:35:00', '2020-10-19 07:59:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_levels`
--

CREATE TABLE `user_access_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` char(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'نام سطح دسترسی',
  `access_level_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'کد نقش'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_access_levels`
--

INSERT INTO `user_access_levels` (`id`, `Name`, `access_level_id`) VALUES
(2, 'ادمین', '100101102103104105106107108109110111112113114115116117118119120121122123124125126127128129130131132133134135136137138'),
(3, 'مینی ادمین', '101102103'),
(4, 'دانشجو(پروژه)', '101102103'),
(5, 'بیکار', '100101102'),
(6, 'test', '103'),
(7, 'injm', NULL),
(8, 'kkk', '103'),
(9, 'FullAccess', '100101102103'),
(10, 'استاد پروژه', '112117118119134');

-- --------------------------------------------------------

--
-- Table structure for table `week_shes`
--

CREATE TABLE `week_shes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'عنوان',
  `attachment` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'آدرس فایل',
  `M` char(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'مقطع تحصیلی',
  `status` char(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'وضعیت(برنامه هفتگی،چارت تحصیلی)',
  `term` char(7) COLLATE utf8_unicode_ci NOT NULL COMMENT 'نیمسال',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `week_shes`
--

INSERT INTO `week_shes` (`id`, `title`, `attachment`, `M`, `status`, `term`, `created_at`, `updated_at`) VALUES
(1, 'چارت تحصیلی قبل از ورودی 981', '/WeekSh/1600942744.jpg', '0', '1', '991', '2020-09-24 10:19:04', '2020-09-24 10:20:43'),
(2, 'چارت تحصیلی از ورودی 981 به بعد', '/WeekSh/1600942819.jpg', '0', '1', '991', '2020-09-24 10:20:19', '2020-09-24 10:20:19'),
(3, 'لیست دروس تخصصی', '/WeekSh/1600943119.jpg', '0', '0', '991', '2020-09-24 10:25:19', '2020-09-24 10:26:29'),
(4, 'لیست دروس تخصصی', '/WeekSh/1600943162.jpg', '1', '0', '991', '2020-09-24 10:26:02', '2020-09-24 10:26:42'),
(5, 'لیست دروس عمومی', '/WeekSh/1600943235.jpg', '0', '0', '991', '2020-09-24 10:27:15', '2020-09-24 10:27:15'),
(6, 'لیست دروس عمومی', '/WeekSh/1600943255.jpg', '1', '0', '991', '2020-09-24 10:27:35', '2020-09-24 10:27:35'),
(7, 'چارت تحصیلی کارشناسی', '/WeekSh/1600943321.jpg', '1', '1', '991', '2020-09-24 10:28:41', '2020-09-24 10:28:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_levels`
--
ALTER TABLE `access_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`CodeBranch`);

--
-- Indexes for table `class_links`
--
ALTER TABLE `class_links`
  ADD PRIMARY KEY (`ERCode`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`CodePrsn`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`CodePrsn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`CodePrsn`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_access_levels`
--
ALTER TABLE `user_access_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `week_shes`
--
ALTER TABLE `week_shes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_access_levels`
--
ALTER TABLE `user_access_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `week_shes`
--
ALTER TABLE `week_shes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
