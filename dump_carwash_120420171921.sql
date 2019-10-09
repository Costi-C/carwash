-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Apr 2017 la 18:20
-- Versiune server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carwash`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'barservice', 'bistro', '2017-03-11 09:07:06', '0000-00-00 00:00:00'),
(2, 'Regular Size Car', 'vehicle', '2017-03-16 18:38:39', '0000-00-00 00:00:00'),
(3, 'Medium Size Cargo', 'vehicle', '2017-03-11 09:07:06', NULL),
(4, 'Compact SUV', 'vehicle', '2017-03-11 09:07:06', NULL),
(5, 'Minivan', 'vehicle', '2017-03-11 09:07:06', NULL),
(6, 'Pickup Truck', 'vehicle', '2017-03-11 09:07:06', NULL),
(7, 'Cargo Truck', 'vehicle', '2017-03-11 09:07:06', NULL);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `registration_plate` varchar(255) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `customers`
--

INSERT INTO `customers` (`id`, `registration_plate`, `phone_number`, `created_at`, `updated_at`) VALUES
(12, 'ghutte', NULL, '2017-04-07 09:14:47', '2017-04-07 09:14:47'),
(13, 'sdf', NULL, '2017-04-07 11:13:34', '2017-04-07 11:13:34'),
(14, 'asd', NULL, '2017-04-07 11:14:21', '2017-04-07 11:14:21'),
(15, 'tr123', NULL, '2017-04-07 18:29:47', '2017-04-07 18:29:47'),
(16, 'TR11ASD', NULL, '2017-04-07 18:31:42', '2017-04-07 18:31:42'),
(17, 'TR56GHJ', NULL, '2017-04-07 18:32:34', '2017-04-07 18:32:34'),
(18, 'tr24uiy', NULL, '2017-04-07 18:55:53', '2017-04-07 18:55:53'),
(19, 'tr123asd', NULL, '2017-04-07 19:27:47', '2017-04-07 19:27:47'),
(20, 'tr34jkl', NULL, '2017-04-07 19:42:00', '2017-04-07 19:42:00'),
(21, 'bv56yrr', NULL, '2017-04-07 19:42:11', '2017-04-07 19:42:11'),
(22, 'gj56uyi', NULL, '2017-04-11 18:18:02', '2017-04-11 18:18:02'),
(23, 'asdsag', NULL, '2017-04-12 14:41:18', '2017-04-12 14:41:18'),
(24, 'kj78iop', NULL, '2017-04-12 15:15:07', '2017-04-12 15:15:07');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `employees`
--

INSERT INTO `employees` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ion', '2017-04-07 18:31:20', '2017-04-07 18:31:20'),
(2, 'Salam', '2017-04-12 10:54:32', '2017-04-12 10:54:32');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `deleted` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `employee_id`, `deleted`, `created_at`, `updated_at`) VALUES
(7, 22, 1, 'S-a razgandit', '2017-04-11 18:18:02', '2017-04-11 19:09:11'),
(8, 23, 1, 'S-a cacat', '2017-04-12 14:41:18', '2017-04-12 15:16:18'),
(9, 24, 2, NULL, '2017-04-12 15:15:07', '2017-04-12 15:15:07');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `order_service`
--

CREATE TABLE `order_service` (
  `order_id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `order_service`
--

INSERT INTO `order_service` (`order_id`, `service_id`, `quantity`, `created_at`, `updated_at`) VALUES
(7, 2, 1, '2017-04-11 18:18:03', NULL),
(8, 3, 1, '2017-04-12 14:41:18', NULL),
(8, 10, 2, '2017-04-12 14:41:18', NULL),
(9, 2, 1, '2017-04-12 15:15:07', NULL),
(9, 3, 1, '2017-04-12 15:15:07', NULL),
(9, 6, 2, '2017-04-12 15:15:07', NULL);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `services`
--

INSERT INTO `services` (`id`, `name`, `category_id`, `price`, `created_at`, `updated_at`) VALUES
(2, 'Interior', 2, '15.00', '2017-03-11 09:10:40', '0000-00-00 00:00:00'),
(3, 'Exterior', 2, '15.00', '2017-03-11 09:10:40', NULL),
(4, 'Interior + Exterior', 2, '30.00', '2017-03-11 09:10:40', NULL),
(5, 'Degresare', 2, '70.00', '2017-03-11 09:10:40', NULL),
(6, 'apa plata', 1, '3.00', '2017-03-11 09:10:40', NULL),
(7, 'fanta', 1, '4.50', '2017-03-11 09:10:40', NULL),
(8, 'Exterior', 4, '15.00', '2017-03-27 07:58:19', NULL),
(9, 'Interior', 4, '20.00', '2017-03-27 18:15:57', NULL),
(10, 'Coca', 1, '2.20', '2017-04-12 14:40:19', NULL);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@carwash.ro', '$2y$10$w269H1kzQAN1L4PF1JKn7uk/QtOHMigGXqNcY80fJkoBwMxBYznSG', '1pBsNBjr2m6zepoy4ruApgBTcAaFf29cTKzPljIO2XaE0p2DWsNZuS0hdCQ5', NULL, '2017-03-22 19:07:45'),
(2, 'user', 'user@carwash.ro', '$2y$10$hnM5sTF1Bjq/Oe5I1DYTkOkOOVwgtkkYqbunNJPq.9iCjKdQKiErC', 'ELk6umnzZ64jEG2vA09yoxnZgoRP87yOKlYcpj5f67xxMj1GpB14qy5NZO52', NULL, '2017-04-03 20:32:36');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `vehicles`
--

INSERT INTO `vehicles` (`id`, `type`, `created_at`, `updated_at`, `category_id`, `icon`) VALUES
(1, 'Regular Size Car', '2017-03-11 09:11:13', '0000-00-00 00:00:00', 2, 'cbs-vehicle-icon-small-car'),
(2, 'Medium Size Car', '2017-03-11 09:11:13', '0000-00-00 00:00:00', 3, 'cbs-vehicle-icon-car-mid-size'),
(3, 'Compact SUV', '2017-03-11 09:11:13', NULL, 4, 'cbs-vehicle-icon-suv'),
(4, 'Minivan', '2017-03-11 09:11:13', NULL, 5, 'cbs-vehicle-icon-minivan'),
(5, 'Pickup Truck', '2017-03-11 09:11:13', NULL, 6, 'cbs-vehicle-icon-pickup'),
(6, 'Cargo Truck', '2017-03-11 09:11:13', NULL, 7, 'cbs-vehicle-icon-truck-mid-size');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_id` (`customer_id`),
  ADD KEY `fk_employee_id` (`employee_id`);

--
-- Indexes for table `order_service`
--
ALTER TABLE `order_service`
  ADD KEY `order_service_orders_FK` (`order_id`),
  ADD KEY `order_service_services_FK` (`service_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_IDX` (`email`),
  ADD KEY `password_resets_token_IDX` (`token`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categories_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_UN` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_categories_FK` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `fk_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Restrictii pentru tabele `order_service`
--
ALTER TABLE `order_service`
  ADD CONSTRAINT `order_service_orders_FK` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_service_services_FK` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Restrictii pentru tabele `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `fk_categories_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Restrictii pentru tabele `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_categories_FK` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
