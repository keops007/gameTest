-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 09:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gametest`
--

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
-- Table structure for table `game_competition`
--

CREATE TABLE `game_competition` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `players_number` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_competition`
--

INSERT INTO `game_competition` (`id`, `name`, `slug`, `players_number`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Serie A', 'serie-a', 8, 1, NULL, '2022-08-07 12:00:28', '2022-08-07 12:00:28'),
(2, 'Serie B', 'serie-b', 2, 1, NULL, '2022-08-07 18:33:55', '2022-08-07 18:33:55'),
(3, 'Serie C', 'serie-c', 2, 1, NULL, '2022-08-07 18:57:22', '2022-08-07 18:57:22'),
(4, 'Serie D', 'serie-d', 2, 1, NULL, '2022-08-07 18:57:52', '2022-08-07 18:57:52'),
(5, 'Premier League', 'premier-league', 4, 1, NULL, '2022-08-08 12:04:46', '2022-08-08 12:04:46'),
(6, 'Premier League 2', 'premier-league-2', 4, 1, NULL, '2022-08-08 15:59:20', '2022-08-08 15:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `game_competition_player_log`
--

CREATE TABLE `game_competition_player_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `competition_id` int(10) UNSIGNED NOT NULL,
  `players_id` int(10) UNSIGNED NOT NULL,
  `points` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_competition_player_log`
--

INSERT INTO `game_competition_player_log` (`id`, `competition_id`, `players_id`, `points`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 1, '2022-08-08 11:53:16', '2022-08-08 11:53:16'),
(2, 1, 9, 1, '2022-08-08 11:53:18', '2022-08-08 11:53:18'),
(3, 1, 7, 1, '2022-08-08 15:59:57', '2022-08-08 15:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `game_player`
--

CREATE TABLE `game_player` (
  `id` int(10) UNSIGNED NOT NULL,
  `competition_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_player`
--

INSERT INTO `game_player` (`id`, `competition_id`, `name`, `slug`, `points`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test 1', 'test-1', 4, NULL, '2022-08-07 17:18:51', '2022-08-07 18:39:59'),
(2, 1, 'Test 2', 'test-2', 2, NULL, '2022-08-07 17:31:59', '2022-08-07 18:39:47'),
(4, 2, 'Test 1', 'test-1-2', 0, NULL, '2022-08-07 18:34:22', '2022-08-07 18:34:22'),
(5, 2, 'Test 2', 'test-2-2', 0, NULL, '2022-08-07 18:34:37', '2022-08-07 18:34:37'),
(6, 1, 'Test 3', 'test-3', 3, NULL, '2022-08-07 18:41:54', '2022-08-07 18:43:14'),
(7, 1, 'Test 4', 'test-4', 4, NULL, '2022-08-07 18:41:58', '2022-08-08 15:59:57'),
(8, 1, 'Test 5', 'test-5', 7, NULL, '2022-08-07 18:42:03', '2022-08-07 18:43:30'),
(9, 1, 'Test 6', 'test-6', 4, NULL, '2022-08-07 18:42:07', '2022-08-08 11:53:18'),
(10, 1, 'Test 7', 'test-7', 8, NULL, '2022-08-07 18:42:10', '2022-08-07 18:42:10'),
(11, 1, 'Test 8', 'test-8', 12, NULL, '2022-08-07 18:42:13', '2022-08-07 18:42:13'),
(12, 3, 'Test 9', 'test-9', 0, NULL, '2022-08-08 12:08:23', '2022-08-08 12:08:23'),
(13, 6, 'Test 9', 'test-9-2', 0, NULL, '2022-08-08 15:59:32', '2022-08-08 15:59:32');

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
(8, '2022_08_06_132444_project_tables', 2);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `game_competition`
--
ALTER TABLE `game_competition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_competition_players_number_index` (`players_number`),
  ADD KEY `game_competition_is_active_index` (`is_active`);

--
-- Indexes for table `game_competition_player_log`
--
ALTER TABLE `game_competition_player_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_competition_player_log_competition_id_index` (`competition_id`),
  ADD KEY `game_competition_player_log_players_id_index` (`players_id`),
  ADD KEY `game_competition_player_log_points_index` (`points`);

--
-- Indexes for table `game_player`
--
ALTER TABLE `game_player`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_player_competition_id_index` (`competition_id`),
  ADD KEY `game_player_points_index` (`points`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game_competition`
--
ALTER TABLE `game_competition`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `game_competition_player_log`
--
ALTER TABLE `game_competition_player_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `game_player`
--
ALTER TABLE `game_player`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game_competition_player_log`
--
ALTER TABLE `game_competition_player_log`
  ADD CONSTRAINT `game_competition_player_log_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `game_competition` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `game_competition_player_log_players_id_foreign` FOREIGN KEY (`players_id`) REFERENCES `game_player` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `game_player`
--
ALTER TABLE `game_player`
  ADD CONSTRAINT `game_player_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `game_competition` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
