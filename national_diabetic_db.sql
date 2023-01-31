-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 08:08 PM
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
-- Database: `national_diabetic_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `zip_code` text NOT NULL,
  `description` text NOT NULL,
  `insurance` text NOT NULL,
  `discount` int(11) NOT NULL,
  `status` text NOT NULL,
  `comment` text NOT NULL,
  `amount` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `application_code` text NOT NULL,
  `proccessed_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `address`, `city`, `zip_code`, `description`, `insurance`, `discount`, `status`, `comment`, `amount`, `patient_id`, `application_code`, `proccessed_by`, `created_at`, `updated_at`) VALUES
(1, 'Kigali, Gasabo, Remera', 'Kigali', 'KN 217-29', 'I am very sick', 'BRITAM', 10, 'Approved', 'take 3 per day', 3500, 7, '', 0, '2022-08-24 18:07:54', '2022-08-24 19:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `terms_condition` text NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `name`, `description`, `terms_condition`, `price`, `discount`) VALUES
(1, 'pracetamol', 'headeach medecine', 'one', 200, 10),
(2, 'Peneceline', 'Sugar balance', 'Morning: 1\r\nMid-day: 1\r\nEvening: 1', 700, 10);

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `id` int(11) NOT NULL,
  `insurance` text NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`id`, `insurance`, `discount`) VALUES
(1, 'RSSB', 15),
(2, 'BRITAM', 10),
(3, 'MMI', 10),
(4, 'RADIANT', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `drug_id`, `quantity`, `price`, `application_id`, `created_by`, `created_at`) VALUES
(7, 1, 5, 200, 5, 1, '2022-08-23 12:06:30'),
(8, 2, 5, 200, 5, 1, '2022-08-23 12:06:30'),
(9, 2, 0, 700, 6, 7, '2022-08-24 17:47:59'),
(10, 1, 0, 200, 7, 7, '2022-08-24 17:53:49'),
(11, 2, 0, 700, 7, 7, '2022-08-24 17:53:49'),
(12, 2, 0, 700, 8, 7, '2022-08-24 18:05:40'),
(13, 2, 5, 700, 1, 7, '2022-08-24 18:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `national_id` text NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `diabetic_type` text NOT NULL,
  `address` text NOT NULL,
  `insurance` text NOT NULL,
  `category` text NOT NULL,
  `status` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `national_id`, `dob`, `gender`, `diabetic_type`, `address`, `insurance`, `category`, `status`, `user_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '198873664646664', '1990-10-27', 'Male', 'TYPE 1', 'Kigali, Gasabo, Remera', '2', 'Class 1', 'Active', 7, 1, '2022-08-05 10:59:03', '2022-08-24 20:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `type`, `amount`, `created_at`, `updated_at`) VALUES
(5, 'Momo Pay', 2000, '2022-08-23 22:01:49', '2022-08-23 22:01:49'),
(7, 'Momo Pay', 350, '2022-08-24 18:23:02', '2022-08-24 18:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL,
  `names` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `status` text NOT NULL,
  `location` text NOT NULL,
  `hash_location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `category`, `names`, `telephone`, `email`, `username`, `password`, `status`, `location`, `hash_location`) VALUES
(1, 'Hospital', 'KALISA Fabrice', '+10788701615', 'hategasam@gmail.com', 'kanombe', '$2y$10$OULF8RKKQgsxUADmMEtHVOr0yBPbKn/7Hs6alGdlQAV2qrRkaIA1a', 'Active', 'Kigali, Gasabo, Remera', ''),
(7, 'Patient', 'mukaveclimited@gmail.com', '', 'eric@gmail.com', 'musanze', '$2y$10$C1/ERbK/6PJF09nvXWK8be65LJYByDJROp2qa5zAhALsqolIAGxU6', 'Active', 'Kigali, Gasabo, Remera', ''),
(10, 'Administrator', 'HATEGEKIMANA Samuel', '+10788701615', 'sam@gmail.com', 'RDA', '$2y$10$41F4dkHYba4Cl87R.kgdsOMQTrLnnzVsdzOw2tc1pbEmj.cbj85qe', 'Active', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
