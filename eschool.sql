-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2021 at 04:03 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eschool`
--

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
(32, '2014_10_12_000000_create_users_table', 1),
(33, '2014_10_12_100000_create_password_resets_table', 1),
(34, '2021_07_06_183005_add_role_id_column_in_users_table', 2);

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
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Student', '2021-07-07 09:46:29', '2021-07-07 09:46:29'),
(2, 'Teacher', '2021-07-07 09:46:29', '2021-07-07 09:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(3) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ic`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
('SMKKK12021001', '920424035867', 'Mohamad Afif Bin Ahmad Sukery', 'apihsukery@gmail.com', '$2y$10$.9HK6q8wZxdqward3LCzyusSAp.s96h8IGEM8qE32ZVpxRPFxrfoK', 2, NULL, '2021-07-07 11:25:56', '2021-07-07 11:25:56'),
('SMKKK12021002', '920307106160', 'Siti Hajar Athirah Binti Ahmad Sukery', 'cthajarathirah@gmail.com', '$2y$10$PnsxiMvpJHEG17B1HLHz/OEbswqr2Egc9CN1TGfUJSbq2hyj8E9Ce', 2, NULL, '2021-07-07 11:26:39', '2021-07-07 11:26:39'),
('SMKKK12021003', '171023030330', 'Aisyah Azzahra Binti Mohamad Afif', 'aisyah@gmail.com', '$2y$10$ez2I/32AZ4xWN.ipz1C16e39Z2X48ctKLx3yiLKbAS98j7AmEzutm', 1, NULL, '2021-07-07 11:27:08', '2021-07-07 11:27:08'),
('SMKKK12021004', '852315485261', 'test', 'test1@gmail.com', '$2y$10$nSWZB2zQ6yhBtmPmlEO8E.6FOKG9GPDKYgiwVeMK79fIP58Od11jO', 1, NULL, '2021-07-07 12:03:12', '2021-07-07 12:03:12'),
('SMKKK12021005', '625412365421', 'test tescher', 'testing@gmail.com', '$2y$10$MaUVZlrgSkIkbHGxrK.ZfeV.gABRC/Xl0HurD1qF7Sj7qPnBBj8Om', 2, NULL, '2021-07-07 12:04:06', '2021-07-07 12:04:06'),
('SMKKK12021006', '920307106162', 'siti', 'sitihajarathirah92@gmail.com', '$2y$10$Ht1B1q3xleZpkgCZoh/yC.CgtZHqv1Bl/t03DlhUKbsifn2KGzMH6', 2, NULL, '2021-07-07 14:20:05', '2021-07-07 14:20:05');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_ic_unique` (`ic`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `ic` (`ic`),
  ADD UNIQUE KEY `ic_2` (`ic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
