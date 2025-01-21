-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2025 at 04:40 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erlass`
--

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
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_date` date DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `designer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quote` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `user_id`, `image`, `category`, `title`, `upload_date`, `description`, `designer_name`, `video_title`, `created_at`, `updated_at`, `thumbnail`, `media`, `quote`, `document`) VALUES
(43, 9, '/storage/images/jimu-astrobot-1729823109.jpg', 'produk', 'Jimu Astrobot', '2024-10-25', 'Jimu Astrobot adalah kit robotik interaktif yang dirancang untuk mengajarkan konsep STEM (Sains, Teknologi, Teknik, dan Matematika) kepada anak-anak melalui pengalaman membangun dan pemrograman. Kit ini diproduksi oleh UBTECH dan mencakup berbagai komponen yang dapat dirakit menjadi tiga model robot berbeda: AstroBot, Rover, atau Astron, atau pengguna dapat merancang robot mereka sendiri.\r\n\r\nRobot ini dapat diprogram menggunakan aplikasi Jimu dengan pemrograman berbasis Blockly, yang memungkinkan pengguna untuk membuat robot bergerak, mengeksplorasi, dan berinteraksi dengan lingkungannya. Fitur tambahan seperti mata LED, speaker Bluetooth, dan sensor inframerah memberikan kemampuan lebih bagi robot untuk berkomunikasi dan merespons. Dengan lebih dari 387 bagian yang dapat disusun tanpa alat tambahan dan petunjuk 3D di aplikasi, kit ini sangat cocok untuk anak-anak berusia 8 tahun ke ata', NULL, NULL, '2024-10-21 06:01:53', '2024-10-24 19:25:09', NULL, NULL, NULL, NULL),
(55, 9, '/storage/images/jimu-trackbot-1729823217.png', 'produk', 'Jimu Trackbot', '2024-10-28', 'Jimu TrackBot adalah robot pintar yang dirancang untuk pendidikan STEM, memberikan pengalaman belajar interaktif dan menyenangkan dalam bidang robotika dan pemrograman. Dibuat untuk usia sekolah dan pemula, TrackBot hadir dengan kit DIY (Do It Yourself) yang memungkinkan pengguna merakit robot dari awal, memahami mekanisme robotik, dan mempelajari dasar-dasar coding.Secara keseluruhan, Jimu TrackBot cocok untuk anak-anak dan pemula yang ingin memulai perjalanan mereka dalam bidang robotika, memberikan peluang pembelajaran yang kreatif, interaktif, dan sangat relevan dengan era teknologi.', NULL, NULL, '2024-10-23 19:18:28', '2024-10-27 18:49:34', NULL, NULL, NULL, NULL),
(56, 9, '/storage/images/jimu-tankbot-1729823351.jpg', 'produk', 'Jimu Tankbot', '2024-10-25', 'Jimu TankBot adalah salah satu robot kit dari UBTech yang dirancang untuk mengajarkan keterampilan STEM melalui pengalaman membangun dan pemrograman. Kit ini terdiri dari komponen-komponen interaktif yang bisa dirangkai tanpa memerlukan alat khusus. TankBot menggunakan roda rantai seperti tank, yang memungkinkannya bergerak di berbagai permukaan, dan dilengkapi dengan enam servo motor yang memberikan gerakan yang realistis.\r\n\r\nSalah satu fitur utama dari TankBot adalah sensor inframerah yang memungkinkannya mendeteksi objek di sekitarnya. Selain itu, TankBot juga memiliki kemampuan unik untuk mengambil dan memindahkan objek menggunakan fungsi grab-and-lift pertama dalam lini Jimu Robot. Pengguna dapat memprogram TankBot menggunakan aplikasi Jimu Robot melalui perangkat iOS atau Android, dengan opsi untuk menggunakan gerakan yang sudah diprogram atau membuat program sendiri melalui antarmuka yang intuitif\r\n\r\nKit ini sangat cocok untuk mengembangkan keterampilan pemrograman dan robotik, terutama bagi anak-anak dan remaja, karena memungkinkan mereka untuk membangun robot dengan berbagai desain dan mengatur pergerakannya secara langsung melalui aplikasi.', NULL, NULL, '2024-10-24 19:14:51', '2024-10-24 19:29:11', NULL, NULL, NULL, NULL),
(57, 9, '/storage/images/jimu-truckbot-1729823466.jpg', 'produk', 'Jimu Truckbot', '2024-10-25', 'JIMU Truckbot adalah kit robotik dari UBTech yang dirancang untuk mengajarkan konsep STEM (Science, Technology, Engineering, and Mathematics) kepada anak-anak. Dengan kit ini, pengguna dapat membangun dua jenis robot: GravelBot dan DozerBot, yang keduanya dilengkapi dengan fitur interaktif dan dapat diprogram melalui aplikasi Jimu Robot, menggunakan bahasa pemrograman drag-and-drop seperti Blockly.\r\n\r\nKit ini cocok untuk anak-anak mulai usia 8 tahun, dan memberikan instruksi animasi yang memandu langkah demi langkah dalam proses pembangunannya. Truckbot juga dilengkapi dengan sensor ultrasonik yang dapat mendeteksi objek hingga jarak 400 cm, roda bermotor, lampu LED yang dapat diprogram, dan bucket yang dapat digunakan untuk memindahkan atau membuang benda.\r\n\r\nPengguna bisa menggunakan aplikasi yang tersedia di Android maupun iOS untuk mengontrol dan memprogram robot, menjadikannya alat yang menyenangkan dan edukatif dalam belajar pemrograman dasar dan mekanika', NULL, NULL, '2024-10-24 19:20:22', '2024-10-24 19:31:06', NULL, NULL, NULL, NULL),
(67, 9, NULL, 'promotion_videos', NULL, '2024-11-04', NULL, NULL, 'video scratch', '2024-10-27 19:06:58', '2024-11-06 08:08:16', '/storage/thumbnails/-1730088558.png', '/storage/videos/test-video-1730081217.mp4', NULL, NULL),
(70, 9, NULL, 'promotion_videos', NULL, '2024-11-04', NULL, NULL, 'video perkenalan scratch', '2024-10-27 20:43:12', '2024-11-03 18:33:24', '/storage/thumbnails/video-perkenalan-scratch-1730086992.png', '/storage/videos/video-perkenalan-scratch-1730086992.mp4', NULL, NULL),
(71, 9, NULL, 'promotion_videos', NULL, '2024-11-04', NULL, NULL, 'video promosi robotik', '2024-10-27 20:46:32', '2024-11-03 18:33:30', '/storage/thumbnails/video-promosi-robotik-1730087191.png', '/storage/videos/video-promosi-robotik-1730087191.mp4', NULL, NULL),
(72, 9, NULL, 'promotion_videos', NULL, '2024-11-04', NULL, NULL, 'video robotik jimu', '2024-10-27 20:48:32', '2024-11-03 18:33:37', '/storage/thumbnails/video-promosi-robotik-2-1730087312.png', '/storage/videos/video-promosi-robotik-2-1730087312.mp4', NULL, NULL),
(73, 9, NULL, 'promotion_videos', NULL, '2024-11-04', NULL, NULL, 'video DIY Trashbin Microbit', '2024-10-27 20:51:44', '2024-11-03 18:33:43', '/storage/thumbnails/video-diy-trashbin-microbit-1730087504.png', '/storage/videos/video-diy-trashbin-microbit-1730087504.mp4', NULL, NULL),
(74, 9, NULL, 'promotion_videos', NULL, '2024-11-04', NULL, NULL, 'video project scratch siswa', '2024-10-27 20:54:04', '2024-11-03 18:33:50', '/storage/thumbnails/video-project-scratch-1730087644.png', '/storage/videos/video-project-scratch-1730087644.mp4', NULL, NULL),
(75, 9, NULL, 'promotion_videos', NULL, '2024-11-04', NULL, NULL, 'video merakit microbit lego', '2024-10-27 20:56:20', '2024-11-03 18:33:56', '/storage/thumbnails/video-merakit-microbit-lego-1730087780.png', '/storage/videos/video-merakit-microbit-lego-1730087780.mp4', NULL, NULL),
(76, 9, NULL, 'promotion_videos', NULL, '2024-11-04', NULL, NULL, 'video microbit led', '2024-10-27 20:57:53', '2024-11-03 18:34:03', '/storage/thumbnails/-1730342196.png', '/storage/videos/video-microbit-led-1730087873.mp4', NULL, NULL),
(77, 9, NULL, 'promotion_videos', NULL, '2024-11-04', NULL, NULL, 'video Microbit DIY TrashBin', '2024-10-27 21:00:25', '2024-11-03 18:34:09', '/storage/thumbnails/video-microbit-diy-trashbin-1730088025.png', '/storage/videos/video-microbit-diy-trashbin-1730088025.mp4', NULL, NULL),
(91, 9, '/storage/images/default-1731376261.png', 'design_corner', NULL, '2024-11-06', 'asd', 'sda', NULL, '2024-11-10 22:33:38', '2024-11-11 18:51:01', NULL, NULL, NULL, NULL),
(95, 9, '/storage/images/default-1731376736.png', 'design_corner', NULL, '2024-11-12', 'fas', 'asd', NULL, '2024-11-11 18:58:56', '2024-11-11 18:58:56', NULL, NULL, NULL, NULL),
(97, 9, NULL, 'design_corner', NULL, '2024-11-13', 'sad', 'sd', NULL, '2024-11-11 19:06:31', '2024-11-11 19:07:30', NULL, NULL, NULL, '/storage/documents/sd-1731377250.pdf'),
(101, 9, NULL, 'design_corner', NULL, '2024-11-12', 'sad', 'asd', NULL, '2024-11-11 20:05:59', '2024-11-11 20:05:59', NULL, NULL, NULL, '/storage/documents/asd-1731380759.xlsx'),
(102, 9, '/storage/images/default-1731913736.png', 'motivational_quotes', NULL, '2024-11-18', NULL, NULL, NULL, '2024-11-18 00:08:56', '2024-11-18 00:08:56', NULL, NULL, 'ads', NULL),
(104, 9, NULL, 'design_corner', NULL, '2024-11-18', 'asdddddddddddddddddddddddddd', 'asdddddddddddddddddddddddddddddddddd', NULL, '2024-11-18 03:38:55', '2024-11-18 03:38:55', NULL, NULL, NULL, '/storage/documents/asdddddddddddddddddddddddddddddddddd-1731926335.docx'),
(105, 9, '/storage/images/asdddddddddddddddddddddd-1731926364.png', 'alat_promosi_internal', 'asdddddddddddddddddddddd', '2024-11-18', 'asddddddddddddddddddddddd', NULL, NULL, '2024-11-18 03:39:24', '2024-11-18 03:39:24', NULL, NULL, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_16_163637_create_media_table', 1),
(6, '2024_09_19_021034_add_video_and_thumbnail_to_media_table', 2),
(7, '2024_09_19_034919_add_image_to_media_table', 3),
(8, '2024_09_19_040004_remove_columns_from_media_table', 4),
(9, '2024_09_19_040506_add_thumbnail_url_to_media_table', 5),
(10, '2024_09_19_040845_remove_thumbnail_url_from_media_table', 6),
(11, '2024_09_19_040937_add_thumbnail_and_media_to_media_table', 7),
(12, '2024_09_19_071658_add_profile_picture_to_users_table', 8),
(13, '2024_09_19_072148_add_role_to_users_table', 9),
(14, '2024_09_20_040522_add_created_by_to_media_table', 10),
(15, '2024_09_24_134843_remove_created_by_and_video_url_from_table_name', 11),
(16, '2024_10_01_035647_add_quote_to_media_table', 12),
(17, '2024_10_24_014829_create_notifications_table', 13),
(18, '2024_10_28_064758_create_messages_table', 14),
(19, '2024_10_28_081726_modify_message_column_in_messages_table', 15),
(20, '2024_10_28_115550_add_file_to_messages_table', 16),
(21, '2024_11_11_012850_add_document_to_media_table', 17);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','petugas') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'petugas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile_picture`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(2, 'tengku erlangga', 'angga@gmail.com', NULL, '$2y$10$vTFRyVswcprXlFZYWkpUHO71zINkSNAGR2Ro4YnNSJXALvOrRQGnq', NULL, NULL, '2024-09-19 00:31:56', '2024-09-19 00:31:56', 'petugas'),
(3, 'tengku erlangga', 'tengkuerlangga2802@gmail.com', NULL, '$2y$10$lS4ixZCFrIYWmwmgkCprBujCirxZIxxjiFt3e9VjIf2hhBTC9cBiu', 'profile_pictures/1726734951.jpg', NULL, '2024-09-19 00:35:45', '2024-09-19 01:35:51', 'petugas'),
(8, 'petugas', 'petugas@example.com', NULL, '$2y$10$0Nvhaqg83LUOeV9xgloj7OSfZWInWJfzYWZ6JDr512WuFwwnosYhO', 'profile_pictures/1730079282.png', NULL, '2024-09-19 01:04:10', '2024-10-27 18:39:18', 'petugas'),
(9, 'Admin', 'ddd@example.com', NULL, '$2y$10$q1WJA.rvUcO43QeC8JHGOe2it3FDWNoJm6Q3xclYh1ULDt1H/9duK', 'profile_pictures/1729737917.png', NULL, '2024-09-19 01:05:22', '2024-11-20 21:27:10', 'admin'),
(11, 'bebasss', 'aaa@example.com', NULL, '$2y$10$aHG4kbMyj4tpWeet.oIl3eOHvzVMPH81fTYpsEfZ9ljoNE8udyVFG', NULL, NULL, '2024-10-24 21:05:42', '2024-10-24 21:05:42', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
