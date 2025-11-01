-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2025 at 01:02 PM
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
-- Database: `min_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `pages_count` int(11) DEFAULT NULL,
  `book_id` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pdf_link` longtext DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bookname`, `author`, `reference`, `pages_count`, `book_id`, `image`, `pdf_link`, `category_id`, `language_id`, `created_at`, `updated_at`) VALUES
(1, 'Caring for Yourself During Pregnancy & Beyond', 'unknown', 'ISBN2345768922', 5, 'Caring for Yourself During Pregnancy & BeyondCaring for Yourself During Pregnancy & BeyondCaring for Yourself During Pregnancy & BeyondCaring for Yourself During Pregnancy & Beyond', 'uploads/books/1761989625_6905d3f991783.png', 'https://minbuk.com/book/preview/eyJpdiI6InRKS1JIT3JsTitJSUdvcWNCVDNrTHc9PSIsInZhbHVlIjoiRVpVaUNqbnZqMk9JOEkvczRqcEtqZz09IiwibWFjIjoiYWQ2NmI2OTAzOTY5MThlZmM5YThmMjUyYjhhYWRjNDkyYzcwY2NkZTc4NWQwMTk2MjQyYjc5Nzc3MzVkMjE0ZSIsInRhZyI6IiJ9/Guidelines%20for%20Antenatal%20Care%20and%20Skilled%20Attendance%20at%20Birth', 1, 1, '2025-11-01 03:56:31', '2025-11-01 04:03:45'),
(2, 'Guidelines for Antenatal Care and Skilled Attendance at Birth', 'ANMs, LHVs, SNs', 'ISBN2345768922', 140, 'Every woman should be cared for by a skilled birth attendant (SBA) during pregnancy, childbirth and the postpartum period. The SBA is a person who can handle obstetric emergency.', 'uploads/books/1761989997_6905d56d111ae.png', 'https://minbuk.com/book/preview/eyJpdiI6Im1IY3pCcllpWGRselk1a2pxWW5KRUE9PSIsInZhbHVlIjoiOUhVTDNqVjRiOExHVXI3MUdFbm5EQT09IiwibWFjIjoiYmQyOGJhOGFlODlhZjJhMmQwMWQ4MWI2ZjgyYjc1YWU1OThlN2NmZGNhZTNlNGE4MzYzY2JjZWMxYWQ4Nzk0YSIsInRhZyI6IiJ9/Guidelines%20for%20Antenatal%20Care%20and%20Skilled%20Attendance%20at%20Birth', 3, 1, '2025-11-01 04:09:57', '2025-11-01 04:09:57'),
(3, 'The Pregnancy Book', 'St George_s University Hospitals NHS Foundation Trust', 'ISBN2345768922', 56, 'The Pregnancy Book explains what is occurring in the womb step by step, so that you can better appreciate why your body behaves the way it does and why you feel the way you do.', 'uploads/books/1761994033_6905e5312c542.png', 'https://minbuk.com/book/preview/eyJpdiI6ImJTVGFaYjFXNTh3eXJtTkpKeVQwUVE9PSIsInZhbHVlIjoiSG9Tb29YaE52NGpkZWdZL1Fub1JCUT09IiwibWFjIjoiZDIzN2Q1NDJkYTYyYjY4Njg4N2E3M2VhYjcwZTRmNmI2ZjgyZDI2YmQxMWZkN2U4MTg5NWNlYzVjOWEzYzlkZiIsInRhZyI6IiJ9/The%20Pregnancy%20Book', 3, 1, '2025-11-01 05:17:13', '2025-11-01 05:17:13'),
(5, 'THE CONFESSIONS OF ST. AUGUSTINE', 'Augustine of Hippo', 'ISBN2345768922', 45, 'The common name is the 13 autobiographical writings of St. Augustine, written around 397-398 AD. er and telling about his life and conversion to Christianity.', 'uploads/books/1761994311_6905e6476d333.webp', 'https://minbuk.com/book/preview/eyJpdiI6InBZdVY5bDI5M3JjMVI4cXZqdC9HaUE9PSIsInZhbHVlIjoiK3JwekxETHhMNmlTODgwU3VyM1lRQT09IiwibWFjIjoiMjhkMmNlY2RiYjA1MTY1OWM3OTQ4YzY5MDBlZDFhMDFmZDE3OTI1MDAzOTVhOGJkNmJhODUyM2M5ZTQzOThiMCIsInRhZyI6IiJ9/THE%20CONFESSIONS%20OF%20ST.%20AUGUSTINE', 5, 1, '2025-11-01 05:21:51', '2025-11-01 05:21:51'),
(6, 'The Cask of Amontillado', 'Edgar Allan Poe', 'ISBN2345768922', 45, 'The Cask of Amontillado\" is a short story by the American writer Edgar Allan Poe, first published in the November 1846 issue of Godey\'s Lady\'s Book. The story, set in an unnamed Italian city at carnival time', 'uploads/books/1761994507_6905e70b02dbd.jpg', 'https://minbuk.com/book/preview/eyJpdiI6InFJNFpEUUNZbDdiUjNHNmxRTjBjZnc9PSIsInZhbHVlIjoiZ3JRQVRBN2U0VjBwY254SG1pZ3VHQT09IiwibWFjIjoiMTZlNjFiYjFkNjBkMzhiODUwNTAyZWZjOWI4M2Y3MTZlYTYyM2ExODc0MWM5Y2FjMTM0MDBmMzMyNzg3NzljZiIsInRhZyI6IiJ9/The%20Cask%20of%20Amontillado', 2, 4, '2025-11-01 05:25:07', '2025-11-01 05:25:07'),
(7, 'Jack London', 'Macmillan', 'ISBN2345768922', 52, 'It was the time of the Alaskan gold rush in the 1890’s when sled dogs were very in demand. It is a story about a dog named Buck. He grew up with a comfortable life at Shepherd’s ranch.', 'uploads/books/1761994613_6905e77595391.jpg', 'https://minbuk.com/book/preview/eyJpdiI6Ik9GZmEyTkpjRVFRcTNsYksrbnA4WUE9PSIsInZhbHVlIjoiS3NMdDVybEtjMG01SURidnBaWCtzZz09IiwibWFjIjoiOTk2YTFhMDFjNzIyN2FiZDQ3ODVjMTAwNDRiNTZmM2RlZjQyNTE5NzE5NjY5N2I2NjUwYzcyYjQ0ZjQ1MGIzNiIsInRhZyI6IiJ9/THE%20CALL%20OF%20THE%20WILD', 1, 1, '2025-11-01 05:26:53', '2025-11-01 05:26:53'),
(8, 'MIDDLEMARCH', 'George Eliot', 'ISBN2345768922', 838, 'The largest work of George Eliot (the pseudonym of the English writer Mary Ann Evans), a real masterpiece was the Middlemarch novel about a provincial town.', 'uploads/books/1761994724_6905e7e410fee.jpg', 'https://minbuk.com/book/preview/eyJpdiI6Ikp1UkR4TDJxQkpvcUl4M1dvcUZKNGc9PSIsInZhbHVlIjoiTzRGUmdsM3Jsd3pWUE1OOGdUeFdOdz09IiwibWFjIjoiYTg4Njk1NjBjODU3ZmYxYzgxOTZkZGYwMTJiODQ1OGFkYWE0MTZjODg5YjY3M2QzZDg3YTY2NGRhMWYzODc2MSIsInRhZyI6IiJ9/MIDDLEMARCH', 3, 1, '2025-11-01 05:28:44', '2025-11-01 05:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'fiction', 'fiction', 'uploads/categories/1761989145_fiction.png', '2025-11-01 03:55:45', '2025-11-01 03:55:45'),
(2, 'Horror', 'Horror', 'uploads/categories/1761989410_horror.png', '2025-11-01 04:00:10', '2025-11-01 04:00:10'),
(3, 'Love', 'Love', 'uploads/categories/1761989421_love.png', '2025-11-01 04:00:21', '2025-11-01 04:00:21'),
(4, 'Science Fiction', 'Science Fiction', 'uploads/categories/1761989433_science fiction.png', '2025-11-01 04:00:33', '2025-11-01 04:00:33'),
(5, 'Christian', 'Christian', 'uploads/categories/1761989445_BFU58ITRoaS92GkZrDNuPDJTweBeaw068AF6RQYr.png', '2025-11-01 04:00:45', '2025-11-01 04:00:45'),
(6, 'Fantasy', 'Fantasy', 'uploads/categories/1761989460_fantasy\'.png', '2025-11-01 04:01:00', '2025-11-01 04:01:00'),
(8, 'Children Story', 'Children Story', 'uploads/categories/1761997269_horror.png', '2025-11-01 05:55:10', '2025-11-01 06:11:09');

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
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_name` varchar(255) NOT NULL,
  `language_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`, `language_code`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '2025-11-01 03:55:54', '2025-11-01 03:55:54'),
(2, 'Tamil', 'ta', '2025-11-01 04:41:22', '2025-11-01 04:41:22'),
(3, 'Telungu', 'tu', '2025-11-01 04:41:32', '2025-11-01 04:41:32'),
(4, 'Malayalam', 'ma', '2025-11-01 04:41:40', '2025-11-01 04:41:40'),
(5, 'Hindi', 'hi', '2025-11-01 04:41:48', '2025-11-01 04:41:48');

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
(4, '2025_11_01_063406_create_categories_table', 1),
(5, '2025_11_01_081119_create_languages_table', 1),
(6, '2025_11_01_082627_create_books_table', 1),
(7, '2025_11_01_084800_alter_pdf_link_in_books_table', 1),
(8, '2025_11_01_084909_change_pdf_link_column_in_books_table', 1);

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
('21RGW7ItC80ZanB4jlzOczLzMzXbtH5nidAXUoZA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:144.0) Gecko/20100101 Firefox/144.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicTJ5Y0tPNGt4d3FucXVSdUo0dVpZdURCNFBNQVNsUWdoRW9ndEFjNyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ib29rLzciO3M6NToicm91dGUiO3M6OToiYm9vay5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1761997501);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_book_id_unique` (`book_id`),
  ADD KEY `books_category_id_foreign` (`category_id`),
  ADD KEY `books_language_id_foreign` (`language_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_language_code_unique` (`language_code`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
