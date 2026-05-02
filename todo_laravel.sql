-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2026 at 10:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('taskflow-cache-1b6453892473a467d07372d45eb05abc2031647a', 'i:1;', 1777437903),
('taskflow-cache-1b6453892473a467d07372d45eb05abc2031647a:timer', 'i:1777437903;', 1777437903),
('taskflow-cache-barry123@gmail.com|127.0.0.1', 'i:3;', 1777537396),
('taskflow-cache-barry123@gmail.com|127.0.0.1:timer', 'i:1777537396;', 1777537396),
('taskflow-cache-fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f', 'i:1;', 1777437632),
('taskflow-cache-fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f:timer', 'i:1777437632;', 1777437632);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_04_182628_create_tasks_table', 2),
(5, '2026_04_09_131410_add_user_id_to_tasks_table', 3),
(6, '2026_04_20_200237_add_role_to_users_table', 4),
(7, '2026_04_25_032535_create_personal_access_tokens_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 4, 'api-token', '76abd9dd8683de47c6882fe86b760de691f24c2d9298d3d5dabb384aeb0e2bd4', '[\"*\"]', '2026-04-25 16:30:44', NULL, '2026-04-25 16:22:19', '2026-04-25 16:30:44'),
(3, 'App\\Models\\User', 4, 'api-token', '5afbf69d5fbfc8cd57f56c699c255623df9d7b081249a1860dd6ef98491ba7ad', '[\"*\"]', NULL, NULL, '2026-04-30 05:48:53', '2026-04-30 05:48:53'),
(4, 'App\\Models\\User', 4, 'api-token', 'b7b7461110a132d76f339dbe1cfddb72430ee31b0a5746db3eeb36dc2cd93f8d', '[\"*\"]', '2026-04-30 06:30:12', NULL, '2026-04-30 06:02:27', '2026-04-30 06:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5xfLjzSUNfgoj5KYYE1YpJzuT83BhvLDWa6O78rc', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoickVPT1FjM3hwUmg2NUtWZkVQcnMxRUFXWW5URmFyRlp3TlBYTGt0MSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90YXNrcyI7czo1OiJyb3V0ZSI7czoxMToidGFza3MuaW5kZXgiO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1777440030),
('rpwD79n6NJKD7zZh5Rv4M7N0gjIgAQGrjtL5RGTk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS08yUzl4SlNYYWVyRjlSNDgzbkNyczJlNmlaSUtVcDFRZGdkYUVWRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90YXNrcyI7fX0=', 1777537672),
('Z79sv79rVfJd1aJSFPzVBU5MQ3gKOOk6wCu46FnR', NULL, '127.0.0.1', 'PostmanRuntime/7.39.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVU5DdlRRQ0dZWTFKYW44YUdPa2wyNVBNakRYSllTYWpneWZZQ0FDUyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90YXNrcyI7fX0=', 1777538277);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `task`, `done`, `created_at`, `updated_at`) VALUES
(62, 4, 'Charge devices', 1, '2026-04-22 03:03:31', '2026-04-22 03:08:05'),
(63, 4, 'Backup Files', 1, '2026-04-22 03:03:41', '2026-04-22 03:08:09'),
(64, 4, 'Update Apps', 1, '2026-04-22 03:03:52', '2026-04-22 03:08:15'),
(65, 4, 'Fix bugs', 1, '2026-04-22 03:04:03', '2026-04-22 03:08:20'),
(66, 4, 'Brainstorm ideas', 1, '2026-04-22 03:04:12', '2026-04-22 03:08:26'),
(67, 4, 'Watch Tutorials', 0, '2026-04-22 03:04:24', '2026-04-22 03:04:24'),
(68, 4, 'Push commits', 0, '2026-04-22 03:04:41', '2026-04-22 03:04:41'),
(69, 4, 'Review code', 0, '2026-04-22 03:04:49', '2026-04-22 03:04:49'),
(70, 4, 'Organize files', 1, '2026-04-22 03:07:00', '2026-04-22 03:08:31'),
(71, 4, 'Clear Inbox', 1, '2026-04-22 03:07:11', '2026-04-22 03:08:33'),
(72, 4, 'Reply messages', 1, '2026-04-22 03:07:18', '2026-04-22 03:08:39'),
(73, 4, 'Call friends', 0, '2026-04-22 03:07:26', '2026-04-22 03:07:26'),
(74, 4, 'Water Plants', 0, '2026-04-22 03:07:38', '2026-04-22 03:07:38'),
(75, 4, 'Do laundry', 0, '2026-04-22 03:07:46', '2026-04-22 03:07:46'),
(76, 4, 'Wash Dishes', 0, '2026-04-22 03:07:58', '2026-04-22 03:07:58'),
(77, 1, 'Wake Up', 1, '2026-04-22 03:10:33', '2026-04-22 03:10:42'),
(78, 1, 'Tidy room', 1, '2026-04-22 03:10:40', '2026-04-22 03:10:44'),
(79, 1, 'Deep focus', 1, '2026-04-22 03:10:57', '2026-04-22 03:12:42'),
(80, 1, 'Take break', 1, '2026-04-22 03:11:11', '2026-04-22 03:12:47'),
(81, 1, 'Journal entry', 0, '2026-04-22 03:11:20', '2026-04-22 03:11:20'),
(82, 1, 'Typing practise', 0, '2026-04-22 03:11:30', '2026-04-22 03:11:30'),
(83, 1, 'Sketch idea', 0, '2026-04-22 03:11:40', '2026-04-22 03:11:40'),
(84, 1, 'Listen Podcast', 1, '2026-04-22 03:11:53', '2026-04-22 03:12:56'),
(85, 1, 'Explore tools', 0, '2026-04-22 03:12:03', '2026-04-22 03:12:03'),
(86, 1, 'Learn shortcuts', 1, '2026-04-22 03:12:23', '2026-04-22 03:12:51'),
(87, 2, 'Check updates', 1, '2026-04-22 03:16:21', '2026-04-22 03:22:53'),
(88, 2, 'Restart server', 1, '2026-04-22 03:16:31', '2026-04-22 03:23:02'),
(89, 2, 'Scan notes', 1, '2026-04-22 03:16:37', '2026-04-22 03:23:13'),
(90, 2, 'Draft idea', 1, '2026-04-22 03:16:44', '2026-04-22 03:23:25'),
(91, 2, 'Edit document', 1, '2026-04-22 03:18:43', '2026-04-22 03:23:32'),
(92, 2, 'Submit assignment', 1, '2026-04-22 03:18:55', '2026-04-22 03:23:57'),
(93, 2, 'Debug error', 1, '2026-04-22 03:19:05', '2026-04-22 03:24:01'),
(94, 2, 'Refactor code', 1, '2026-04-22 03:19:13', '2026-04-22 03:24:05'),
(95, 2, 'Test build', 1, '2026-04-22 03:19:25', '2026-04-22 03:24:09'),
(96, 2, 'Deploy App', 1, '2026-04-22 03:19:33', '2026-04-22 03:24:12'),
(97, 2, 'Review goals', 1, '2026-04-22 03:19:42', '2026-04-22 03:24:17'),
(98, 2, 'Track expenses', 0, '2026-04-22 03:19:50', '2026-04-22 03:25:14'),
(99, 2, 'Pay bills', 0, '2026-04-22 03:19:58', '2026-04-22 03:25:21'),
(100, 2, 'Quick nap', 1, '2026-04-22 03:20:08', '2026-04-22 03:24:36'),
(101, 2, 'Drink tea', 1, '2026-04-22 03:20:20', '2026-04-22 03:24:40'),
(102, 2, 'Eat fruit', 0, '2026-04-22 03:20:56', '2026-04-22 03:20:56'),
(103, 2, 'Stretch', 0, '2026-04-22 03:21:08', '2026-04-22 03:21:08'),
(104, 2, 'Clean', 0, '2026-04-22 03:21:16', '2026-04-22 03:21:16'),
(105, 2, 'Sort downloads', 0, '2026-04-22 03:21:28', '2026-04-22 03:21:28'),
(106, 2, 'Rename files', 1, '2026-04-22 03:21:37', '2026-04-22 03:24:55'),
(107, 2, 'Delete junk', 1, '2026-04-22 03:21:54', '2026-04-22 03:25:02'),
(108, 2, 'Mute notification', 1, '2026-04-22 03:22:10', '2026-04-22 03:24:52'),
(109, 2, 'Focus block', 1, '2026-04-22 03:22:20', '2026-04-22 03:24:50'),
(110, 2, 'Evening walk', 0, '2026-04-22 03:22:30', '2026-04-22 03:22:30'),
(111, 2, 'Day reflection', 0, '2026-04-22 03:22:42', '2026-04-22 03:22:42'),
(112, 4, 'Test task from API', 0, '2026-04-25 16:44:46', '2026-04-25 16:44:46'),
(114, 4, 'Test 2 task from API', 0, '2026-04-30 06:20:25', '2026-04-30 06:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jackson Omari', 'barackotieno.tech@gmail.com', 'admin', NULL, '$2y$12$oGxIrf6dj0AYxUMyrbS0cOdCEb52IBqsfpPhUrwI9dz3KrsVT6PCW', '9Pj1SNZ2A1dsjNRDx2EFwPo3j2nKjRy7sRx22b0S85LwuiixQjmnS4j9TXNu', '2026-04-08 10:04:25', '2026-04-22 00:27:58'),
(2, 'Baraka Junior', 'obierobarrack34@gmail.com', 'user', NULL, '$2y$12$l.DvkRkHsg8XiwBkJJ38Ju2wJkGO16iWR5YZDt.h00gX8GgzSQCNe', NULL, '2026-04-09 11:02:39', '2026-04-09 11:02:39'),
(4, 'Admin', 'admin@taskflow.com', 'admin', NULL, '$2y$12$ct/2MNxN2Xpn4cnfieNzjOjmKfDQw8frXk4nHTQXsMKLb.lqynZYm', NULL, '2026-04-22 00:04:27', '2026-04-22 02:59:02'),
(5, 'Vannilah', 'vanillah@gmail.com', 'user', NULL, '$2y$12$8.7UvvVwaE3tS29J9rjCPu.Ouh5WQ8uQKV9TGhHIRQO5x9rkSiMae', NULL, '2026-04-28 18:23:00', '2026-04-28 18:23:00'),
(6, 'test', 'test@gmail.com', 'user', NULL, '$2y$12$YOTymhAPYOUVk7IRrNnYQOkxtmAa/Qf5ER2iHA.1mG2kRpiItnn3a', NULL, '2026-04-28 18:43:34', '2026-04-28 18:43:34'),
(7, 'John', 'john@gmail.com', 'user', NULL, '$2y$12$QgXb3osQMRPqGW0EkN6uVeFKN0u6skz/LmfpLx1XycpjcZ1osNSoW', NULL, '2026-04-29 00:42:40', '2026-04-29 00:42:40'),
(8, 'Montage', 'montagebeluga5@gmail.com', 'user', NULL, '$2y$12$PQE1KVqdxZjrArsVl/twx.jEukBq8OeOwWMz2uRtSH9uXdjjmmUCa', NULL, '2026-04-29 00:46:45', '2026-04-29 00:46:45'),
(9, 'Barack Otieno', 'barackotieno@gmail.com', 'user', NULL, '$2y$12$WlG4euHG9SKyqAq8M44MXuH7ce2arXQlrJAArOnN3mKF1WP632I4u', NULL, '2026-04-30 05:23:33', '2026-04-30 05:23:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
