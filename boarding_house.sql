-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2024 at 06:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boarding_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int NOT NULL,
  `houseName` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('pending','accepted','declined') DEFAULT 'pending',
  `application_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `houseName`, `name`, `email`, `phone`, `address`, `message`, `status`, `application_date`) VALUES
(1, 'A.D.V BH 1', 'Naruto Shippuden', 'narutoshippuden@gmail.com', '09123456789', 'Leaf Village', 'would like to apply', 'pending', '2024-05-27 17:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `id` int NOT NULL,
  `bed_number` varchar(10) NOT NULL,
  `room_id` int NOT NULL,
  `status` enum('available','occupied') DEFAULT 'available',
  `tenant_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `boarding_houses`
--

CREATE TABLE `boarding_houses` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_posted` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `tenant_id` int DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int NOT NULL,
  `room_number` varchar(10) NOT NULL,
  `capacity` int NOT NULL,
  `current_occupants` int DEFAULT '0',
  `status` enum('available','full') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `capacity`, `current_occupants`, `status`) VALUES
(1, '1', 4, 0, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `room_number` varchar(10) NOT NULL,
  `bed_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$2DXKzlTMJopLp804FsMt8.EEJ2Txz29kY8N27D2sSCy5UkfNvBE9W', 'admin'),
(4, 'user', '$2y$10$TuaV7/A/fL67x6brZjWOtOHszdi7F/PkHqSAtPbwROqs.4xGsN.22', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `boarding_houses`
--
ALTER TABLE `boarding_houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_number` (`room_number`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `boarding_houses`
--
ALTER TABLE `boarding_houses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beds`
--
ALTER TABLE `beds`
  ADD CONSTRAINT `beds_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `beds_ibfk_2` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
