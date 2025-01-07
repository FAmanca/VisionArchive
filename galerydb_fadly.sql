-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2025 at 06:16 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visionarchivedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_album` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_buat` date NOT NULL,
  `UserID` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `nama_album`, `deskripsi`, `tanggal_buat`, `UserID`, `created_at`, `updated_at`) VALUES
(1, 'Waifuable', 'kumpulan waipu', '2024-12-21', 1, '2024-12-21 09:12:19', '2024-12-21 09:12:19'),
(2, 'Absurd', 'absurd + text', '2024-12-21', 1, '2024-12-21 09:32:17', '2024-12-21 09:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `bans`
--

CREATE TABLE `bans` (
  `id` bigint UNSIGNED NOT NULL,
  `UserID` bigint UNSIGNED NOT NULL,
  `BanReason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BannedUntil` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bans`
--

INSERT INTO `bans` (`id`, `UserID`, `BanReason`, `BannedUntil`, `created_at`, `updated_at`) VALUES
(9, 6, 'MAMPUS KOE KE BAN', '2024-12-27 09:19:46', '2024-12-27 01:19:46', '2024-12-27 01:19:46'),
(13, 7, 'UDAH LE TENGKYU', '2025-01-03 07:47:09', '2025-01-03 00:42:09', '2025-01-03 00:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `FotoId` bigint UNSIGNED NOT NULL,
  `UserId` bigint UNSIGNED NOT NULL,
  `isi_komentar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_komentar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `FotoId`, `UserId`, `isi_komentar`, `tanggal_komentar`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'mantap euy', '2024-12-21', '2024-12-21 09:14:29', '2024-12-21 09:14:29'),
(2, 5, 7, 'tidak boleh ini anak kecil', '2025-01-03', '2025-01-03 00:30:34', '2025-01-03 00:30:34'),
(3, 5, 1, 'biarin', '2025-01-03', '2025-01-03 00:30:53', '2025-01-03 00:30:53'),
(9, 11, 1, 'LAGI CYT', '2025-01-05', '2025-01-04 10:59:57', '2025-01-04 10:59:57'),
(10, 11, 1, 'TES KOMEN', '2025-01-05', '2025-01-04 11:00:03', '2025-01-04 11:00:03');

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint UNSIGNED NOT NULL,
  `judul_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_unggah` date NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `AlbumID` bigint UNSIGNED NOT NULL,
  `UserID` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `judul_foto`, `deskripsi_foto`, `tanggal_unggah`, `foto`, `AlbumID`, `UserID`, `created_at`, `updated_at`) VALUES
(1, 'Furina', 'Furina Best Waifu', '2024-12-21', 'images/rxzYbfnVz8toOB0AEPYR9a70Q1wKDrz6BAjiIvIH.jpg', 1, 1, '2024-12-21 09:12:29', '2024-12-21 09:12:29'),
(2, 'Keqing WANGY', 'Keqing WANGY', '2024-12-21', 'images/bhyqxMY9stUo2StShBXikln7cXD8cFGVl3YS5GI2.jpg', 1, 1, '2024-12-21 09:13:21', '2024-12-21 09:13:21'),
(3, 'Nahida Kawaii', 'Nahida wogh kawaii sekali', '2024-12-21', 'images/d6YEmwPZ3nVo3iS7iw01Kzl6c073gfHQLIO4S4Ss.png', 1, 1, '2024-12-21 09:14:01', '2024-12-21 09:14:01'),
(4, 'skirk', 'sensei tatang', '2024-12-21', 'images/NlVRdT6uKFRh5X7NSYoLH9YgWwjn2TqenJLOvlgz.png', 1, 1, '2024-12-21 09:14:19', '2024-12-21 09:14:19'),
(5, 'QIQI', 'QIQI WANGY WOGH', '2024-12-21', 'images/cw51E4cafxHzyT6h9fQpHLeEtuGXj1xmRPm3dvkM.png', 1, 1, '2024-12-21 09:28:44', '2024-12-21 09:28:44'),
(6, 'Anby Demara', 'Anby jet jet jet', '2024-12-21', 'images/qc2evKBeOLJobnu32KQsAQdnXbeO84gIYkltWAUS.jpg', 1, 1, '2024-12-21 09:29:00', '2024-12-21 09:29:00'),
(7, 'Arona Wallpaper', 'Bagus nih buat wp desktop linux', '2024-12-21', 'images/YN7ND45YZjdzpZKs0BHwOu6tmeTD5w5P1ouYLxHB.jpg', 1, 1, '2024-12-21 09:29:27', '2024-12-21 09:29:27'),
(8, 'Kamisato Ayaka', 'Powercreep jarang kepake spiral party premium pula :v', '2024-12-21', 'images/CL2IOH7bm11LRYpwBWNCucak3FUFftyI1R8TocbY.jpg', 1, 1, '2024-12-21 09:30:16', '2024-12-21 09:30:16'),
(9, 'Aceng', 'mantap cuy epic ngeri', '2024-12-21', 'images/zU4mb2ehpa1tTtN8wcxVLUKzPOsQieWpBjWn9FRD.png', 1, 1, '2024-12-21 09:30:52', '2024-12-21 09:30:52'),
(10, 'Izayoi Nonomi', 'Penguras apa ini cuy', '2024-12-21', 'images/y32PZR730jSwBx0w30ibVJg7ASwBDlw7xbz7pPg2.jpg', 1, 1, '2024-12-21 09:31:23', '2024-12-21 09:31:23'),
(11, 'Arona pfp', 'edan kawaii pula ni', '2024-12-21', 'images/qMK5I4cwjwUyKDvjkkST1uIrA0Igy9QXwevWXar7.jpg', 1, 1, '2024-12-21 09:31:47', '2024-12-21 09:31:47'),
(13, 'Ywdah si', 'Ywdah si ga ada deskripsi', '2024-12-21', 'images/J358ORXIkeC2vUzr89MZ8ILybjY0m9lSnQUnIDWH.jpg', 2, 1, '2024-12-21 09:33:06', '2024-12-21 09:33:06'),
(14, 'Dingin tetapi tidak kejam', 'kedinginan cuyy', '2024-12-21', 'images/iMp1GWSX7RrYEiDBnPVckwcjXKlVNHvAkIoUZleh.jpg', 2, 1, '2024-12-21 09:33:38', '2024-12-21 09:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint UNSIGNED NOT NULL,
  `FotoId` bigint UNSIGNED NOT NULL,
  `UserId` bigint UNSIGNED NOT NULL,
  `tanggal_like` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `FotoId`, `UserId`, `tanggal_like`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-12-21', '2024-12-21 09:12:32', '2024-12-21 09:12:32'),
(2, 4, 1, '2024-12-21', '2024-12-21 09:14:22', '2024-12-21 09:14:22'),
(4, 13, 1, '2024-12-21', '2024-12-21 09:33:45', '2024-12-21 09:33:45'),
(6, 1, 2, '2024-12-22', '2024-12-21 23:03:52', '2024-12-21 23:03:52'),
(7, 11, 2, '2024-12-22', '2024-12-21 23:04:00', '2024-12-21 23:04:00'),
(8, 10, 6, '2024-12-27', '2024-12-27 01:04:03', '2024-12-27 01:04:03'),
(9, 9, 6, '2024-12-27', '2024-12-27 01:17:47', '2024-12-27 01:17:47'),
(20, 13, 7, '2025-01-03', '2025-01-03 00:21:32', '2025-01-03 00:21:32'),
(21, 14, 7, '2025-01-03', '2025-01-03 00:29:38', '2025-01-03 00:29:38'),
(22, 14, 1, '2025-01-03', '2025-01-03 00:30:25', '2025-01-03 00:30:25'),
(23, 11, 1, '2025-01-05', '2025-01-04 10:55:31', '2025-01-04 10:55:31'),
(24, 7, 1, '2025-01-05', '2025-01-04 10:56:02', '2025-01-04 10:56:02');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_02_123504_create_images_table', 1),
(6, '2024_12_02_123516_create_likes_table', 1),
(7, '2024_12_02_123527_create_comments_table', 1),
(8, '2024_12_02_123741_create_albums_table', 1),
(9, '2024_12_18_123156_create_reports_table', 1),
(10, '2024_12_21_164738_create_bans_table', 2),
(11, '2024_12_21_165350_create_bans_table', 3);

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
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint UNSIGNED NOT NULL,
  `UserId` bigint UNSIGNED NOT NULL,
  `FotoId` bigint UNSIGNED NOT NULL,
  `category` enum('Spam/Advertisement','Inappropriate Content','Copyright Violation','Harassment/Bullying','Pornography/Adult Content') COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','reviewed','resolved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `UserId`, `FotoId`, `category`, `reason`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 13, 'Harassment/Bullying', 'SNADDDDD', 'pending', '2024-12-21 23:29:35', '2024-12-21 23:29:35'),
(3, 2, 10, 'Pornography/Adult Content', '4NOOOOOOOO', 'pending', '2024-12-21 23:29:49', '2024-12-21 23:29:49'),
(4, 2, 14, 'Copyright Violation', 'DINGINNNNNNNNN', 'pending', '2024-12-21 23:30:02', '2024-12-21 23:30:02'),
(5, 7, 5, 'Pornography/Adult Content', 'Pasal 52 (1) bahwa setiap Anak wajib mendapatkan perlindungan dari Orang Tua, Masyarakat dan Negara. > Pasal 58 (1) bahwa setiap anak wajib memperoleh perlindungan hukum dari berbagai macam bentuk kekerasan, pelecehan seksual, serta perbuatan yang tidak menyenangkan.', 'pending', '2025-01-03 00:31:11', '2025-01-03 00:31:11'),
(6, 2, 14, 'Copyright Violation', 'DINGINNNNNNNNN', 'pending', '2024-12-21 23:30:02', '2024-12-21 23:30:02'),
(7, 2, 13, 'Harassment/Bullying', 'SNADDDDD', 'pending', '2024-12-21 23:29:35', '2024-12-21 23:29:35'),
(8, 1, 11, 'Inappropriate Content', 'TESSSSSSSSSSSSSSSSSSSSS', 'pending', '2025-01-04 10:55:46', '2025-01-04 10:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pfp` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_refresh_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `pfp`, `remember_token`, `google_id`, `google_token`, `google_refresh_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Furina De Fontaine', 'furinnaaa@gmail.com', NULL, '$2y$10$eXvmk6YyyHC.xCkaG2xE5uvbY9T5tm/xD7iGnlm5BGY1pziWqomRO', 'profile_pict/W25yzpO13wH4TW9UrvaI1ZYoVPWSuR8FUVILjHIp.jpg', NULL, '107379542286480020907', 'ya29.a0ARW5m77NsolhQ8dnnbbnQxExS3yVN3nFhMl-V3fnDBsMftaVbehajSErc82H5ox2PoOaJprSykKob5cuSYIOaXV2S7Wg7DHPkex-HrSjHnZvV8IgPA7C6OOVQvDrL8jVJqqiJeu_1UZ3hmApTd2GfsQabyfO12o2MmsaCgYKASESAQ4SFQHGX2MiOtbGtpK4eYDZyYImWIg0lQ0170', NULL, 'admin', '2024-12-21 09:11:38', '2024-12-21 09:13:05'),
(2, 'Izayoi Nonomi', 'nonomi@gmail.com', NULL, '$2y$10$7B2AyRfyCVCJJtXMPcSu9uvYskwRxx6r7qEN2ImO1uvy9Ri3Vsl0i', NULL, NULL, NULL, NULL, NULL, 'user', '2024-12-21 10:26:37', '2025-01-04 10:25:50'),
(3, 'Fadly Amanca', 'fadlyamanca@gmail.com', NULL, '$2y$10$FMQpeX.1ueeT5RZomkAgZe1zyIu.dLKt5py6We3voWzec7yRiOaGK', NULL, NULL, '114212965069701060662', 'ya29.a0ARW5m753W2OnRsZhE2adSHh9ck7jM3Wni6yYW0iJfm7A-KCpwiwnT4C8ovFEZTpW_CnXmym_qYsC6C5xhHdOsFG2PWNKbR_FbQrESb8jPx_1doDt2pht5-hMh-AqPcJ8gKZuwByEns8tWd_MDmPrQ1gUx43SpvQ9WdAB9_ILaCgYKAaISARASFQHGX2MiN1q-twwEuJSpQqcRaCqVLA0175', NULL, 'user', '2024-12-21 23:31:15', '2025-01-04 10:20:32'),
(5, 'shiroko', 'shiroko@gmail.com', NULL, '$2y$10$3cX9xxQ85Tr.n55xfH2Ua.C1Xdd1PShiAlHaC.ZQW0kZjxwJcoqHC', NULL, NULL, NULL, NULL, NULL, 'user', '2024-12-21 23:31:43', '2024-12-21 23:31:43'),
(6, 'Arona OS', 'arona@gmail.com', NULL, '$2y$10$deM2Lsu02WZ4J6A5Togb.OPy6IbChN1cgmnPJVrRZOlbdiYcW92LS', NULL, NULL, NULL, NULL, NULL, 'user', '2024-12-21 23:32:05', '2024-12-27 00:58:35'),
(7, 'manusia tidak mewing', 'tidak@gmail.com', NULL, '$2y$10$8qsrupgLxwBt.3LHlRhHEeQNVkV2QXg0LyzXZmOWqJxmT6rEDXSuu', 'profile_pict/tFmTCRgUypGyLDCYQKJSyyBQda5g8XjNIw3bJXXH.jpg', NULL, NULL, NULL, NULL, 'user', '2025-01-03 00:20:21', '2025-01-03 00:35:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bans`
--
ALTER TABLE `bans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
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
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bans`
--
ALTER TABLE `bans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
