-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 06:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usermanagment`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL DEFAULT 'subscriber',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `adminviewpassword` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `name`, `user_role`, `email`, `email_verified_at`, `password`, `adminviewpassword`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, NULL, 'admin', 'super_admin', 'admin@admin.com', NULL, '$2y$10$OQRLyCt.hHNfYranX2xh8esgv.6w6i7YIkij4wEHBoAGM75/hPy4a', '', NULL, '2023-11-17 11:50:13', '2023-11-17 11:50:13'),
(4, NULL, 'demo', 'subscriber', 'demo@gmail.com', NULL, '$2y$10$mm4LSrxLd4AMGIX.Yi2jt.K2DwnB5g1Ba5yyTXV.jdXRevE6vnqOS', 'password', NULL, '2023-11-17 12:30:02', '2023-11-17 12:30:02'),
(5, NULL, 'salman khan', 'subscriber', 'salman@gmail.com', NULL, '$2y$10$qbp.7E78ebRNkuL81/BZUOmWI3D.jOS0qIUpmwr7gxI0fi5FQjkZ.', 'password', NULL, '2023-11-17 13:26:16', '2023-11-17 13:26:16'),
(6, NULL, 'Salman Khan', 'subscriber', 'salmannexusfleck@gmail.com', NULL, '$2y$10$FgAivG88oKZnIS72durrVeCJeLLrdkGCnwfTu8wu74D65uqloToKa', NULL, NULL, '2023-11-18 00:19:59', '2023-11-18 00:19:59');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
