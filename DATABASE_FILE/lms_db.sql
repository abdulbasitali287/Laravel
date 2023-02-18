-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 12:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `user_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 11, 'admin', '2023-01-24 08:07:24', '2023-01-26 04:53:36'),
(2, 12, 'user', '2023-01-26 04:58:36', '2023-01-26 04:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `dob_of_publication` date NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `publisher`, `dob_of_publication`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Heaven', 'Molana Tariq sb', 'J.', '2023-01-02', 1, '2023-01-20 06:09:49', '2023-01-20 06:09:49'),
(2, 'Fun Land', 'William', 'Jack', '2023-01-05', 1, '2023-01-22 23:12:20', '2023-01-23 08:38:46'),
(5, 'battle of yrmook', 'Molana Tariq sb', 'J.', '2023-01-01', 3, '2023-01-23 08:38:07', '2023-01-23 08:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `borrowing`
--

CREATE TABLE `borrowing` (
  `borrowing_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `borrowed_date` date NOT NULL,
  `due_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowing`
--

INSERT INTO `borrowing` (`borrowing_id`, `user_id`, `book_id`, `borrowed_date`, `due_date`, `created_at`, `updated_at`) VALUES
(2, 9, 5, '2023-01-07', '2023-02-04', '2023-01-23 23:55:29', '2023-01-23 23:55:29'),
(3, 8, 1, '2023-01-14', '2023-01-27', '2023-01-23 23:58:00', '2023-01-23 23:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `borrowreturned`
--

CREATE TABLE `borrowreturned` (
  `return_id` bigint(20) UNSIGNED NOT NULL,
  `borrowing_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `returned_date` date NOT NULL,
  `due_date` date NOT NULL,
  `fine` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowreturned`
--

INSERT INTO `borrowreturned` (`return_id`, `borrowing_id`, `user_id`, `book_id`, `returned_date`, `due_date`, `fine`, `created_at`, `updated_at`) VALUES
(2, 2, 9, 2, '2023-01-13', '2023-02-01', 0, '2023-01-24 06:11:32', '2023-01-24 06:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Adventure stories', 'An adventure story is a genre of literature that features a protagonist going on an adventure of some kind. It is often considered to be escapist literature due to the fact that the stories sometimes take place in exotic, interesting, and dangerous locations.', '2023-01-20 02:53:16', '2023-01-20 02:55:01'),
(3, 'Historical Fiction', 'Historical Fiction is set in a real place, during a culturally recognizable time. The details and the action in the story can be a mix of actual events and ones from the author\'s imagination as they fill in the gaps. Characters can be pure fiction or based on real people (often, it\'s both).', '2023-01-22 23:13:22', '2023-01-22 23:13:22'),
(4, 'Horror', 'Horror is a genre of literature, film, and television that is meant to scare, startle, shock, and even repulse audiences. The key focus of a horror novel, horror film, or horror TV show is to elicit a sense of dread in the reader through frightening images, themes, and situations.', '2023-01-23 07:39:02', '2023-01-23 07:39:02');

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
-- Table structure for table `lmsusers`
--

CREATE TABLE `lmsusers` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lmsusers`
--

INSERT INTO `lmsusers` (`user_id`, `name`, `gender`, `email`, `password`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(8, 'haris', 'male', 'haris123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '77777777777', 'Lahore Pak', '2023-01-20 02:05:28', '2023-01-20 02:05:28'),
(9, 'shazia', 'female', 'shazia123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '99999999999', 'Queta', '2023-01-20 02:20:43', '2023-01-20 02:20:57'),
(10, 'Abuzar', 'male', 'abuzar123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '03359632285', 'Islamabad Pakistan', '2023-01-24 09:11:02', '2023-01-24 09:11:02'),
(11, 'moin', 'male', 'moin123@gmail.com', '1234', '98874512285', 'Sukkhur Pakistan', '2023-01-25 04:06:03', '2023-01-25 04:06:03'),
(12, 'Nida', 'female', 'nida123@gmail.com', '1234', '88888888888', 'Dadu Pakistan', '2023-01-25 23:02:04', '2023-01-25 23:02:04'),
(13, 'fahad', 'male', 'fahad123@gmail.com', '1234', '88888888899', 'Hyderabad Pakistan', '2023-01-25 23:34:32', '2023-01-25 23:34:32'),
(14, 'admin', 'male', 'admin123@gmail.com', '$2y$10$KBC0A2.t7OO.//gYXk.9VerOtvMVvoxz2XJpX4xg6PXvdrTM3AQwu', '87795487789', 'Karachi', '2023-01-29 23:55:23', '2023-01-29 23:55:23'),
(15, 'user', 'male', 'user123@gmail.com', '$2y$10$SLL.oAMtt5EMP7XtQKuMi.gNWFNGNr.5raf043Mp6fCj2Wzu7pdYi', '88889999955', 'Lahore', '2023-01-29 23:59:14', '2023-01-29 23:59:14'),
(16, 'admin', 'male', 'admin123@gmail.com', '$2y$10$gFbl6qY9LaWpZX.owtbozuYRkPPG5K7psbzND8aDB/a3wE2juwznO', '03354562281', 'Islamabad Pakistan', '2023-02-18 06:42:19', '2023-02-18 06:42:19');

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
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(29, '2023_01_18_102313_create_lmsusers_table', 1),
(30, '2023_01_18_103357_create_category_table', 1),
(31, '2023_01_18_104507_create_books_table', 2),
(32, '2023_01_18_105001_create_admins_table', 3),
(33, '2023_01_18_105524_create_borrowing_table', 4),
(34, '2023_01_18_110134_create_borrowreturned_table', 5),
(35, '2023_01_18_110634_create_shelf_table', 6),
(36, '2023_01_19_054647_add_columns_to_lmsuser_table', 7),
(37, '2023_01_19_055001_add_columns_to_lmsusers_table', 8),
(38, '2023_01_19_093848_drop_image_from_lmsusers', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `shelf_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `shelf_no` int(11) NOT NULL DEFAULT 0,
  `floor` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`shelf_id`, `book_id`, `shelf_no`, `floor`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2023-01-24 07:11:37', '2023-01-24 07:11:37');

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
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Indexes for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD PRIMARY KEY (`borrowing_id`),
  ADD KEY `borrowing_user_id_foreign` (`user_id`),
  ADD KEY `borrowing_book_id_foreign` (`book_id`);

--
-- Indexes for table `borrowreturned`
--
ALTER TABLE `borrowreturned`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `borrowreturned_borrowing_id_foreign` (`borrowing_id`),
  ADD KEY `borrowreturned_user_id_foreign` (`user_id`),
  ADD KEY `borrowreturned_book_id_foreign` (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lmsusers`
--
ALTER TABLE `lmsusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`shelf_id`),
  ADD KEY `shelf_book_id_foreign` (`book_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `borrowing`
--
ALTER TABLE `borrowing`
  MODIFY `borrowing_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `borrowreturned`
--
ALTER TABLE `borrowreturned`
  MODIFY `return_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lmsusers`
--
ALTER TABLE `lmsusers`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shelf`
--
ALTER TABLE `shelf`
  MODIFY `shelf_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `lmsusers` (`user_id`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD CONSTRAINT `borrowing_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `borrowing_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `lmsusers` (`user_id`);

--
-- Constraints for table `borrowreturned`
--
ALTER TABLE `borrowreturned`
  ADD CONSTRAINT `borrowreturned_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `borrowreturned_borrowing_id_foreign` FOREIGN KEY (`borrowing_id`) REFERENCES `borrowing` (`borrowing_id`),
  ADD CONSTRAINT `borrowreturned_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `lmsusers` (`user_id`);

--
-- Constraints for table `shelf`
--
ALTER TABLE `shelf`
  ADD CONSTRAINT `shelf_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
