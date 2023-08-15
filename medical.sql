-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 02:37 PM
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
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `stat` varchar(25) NOT NULL,
  `coun` varchar(25) NOT NULL,
  `phn` varchar(25) NOT NULL,
  `main` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `uname`, `pass`, `city`, `stat`, `coun`, `phn`, `main`, `gender`) VALUES
(1, 'san', 'tosh', 'kiriti', '12345', 'nandyal', 'ap', 'india', '8074703858', 'kiritisivasantosh@gmail.c', 'male'),
(2, 'kiritisivasantosh', 'elikanti', 'santosh', 'santosh@2004', 'nandyal', 'Andhra pradesh', 'India', '8074703858', 'kiritisivasantosh@gmail.c', 'male'),
(3, 'NIKHIL', 'PARCHURU', '21BCE7770', 'nikhil', 'CHIRALA', 'ANDHRA PRADESH', 'India', '9963587784', 'parchurusivasainikhil@gma', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `healthcare`
--

CREATE TABLE `healthcare` (
  `id` int(22) NOT NULL,
  `name` varchar(22) DEFAULT NULL,
  `price` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthcare`
--

INSERT INTO `healthcare` (`id`, `name`, `price`) VALUES
(4, 'Basic Checkup', 100),
(5, 'Standard Checkup', 200),
(6, 'Comprehensive Checkup', 350),
(7, 'Full Body Examination', 500),
(8, 'Cardiovascular Screeni', 150);

-- --------------------------------------------------------

--
-- Table structure for table `labtest`
--

CREATE TABLE `labtest` (
  `id` int(22) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `testfor` varchar(22) NOT NULL,
  `price` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `labtest`
--

INSERT INTO `labtest` (`id`, `name`, `testfor`, `price`) VALUES
(1, 'Blood Test', 'General Health Checkup', 50),
(2, 'Urine Test', 'Kidney Function', 30),
(3, 'Cholesterol Test', 'Heart Health', 40),
(4, 'Thyroid Test', 'Thyroid Function', 25),
(5, 'Liver Function Test', 'Liver Health', 35);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(22) NOT NULL,
  `name` varchar(22) NOT NULL,
  `price` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1, 'Toothbrush', 299),
(2, 'Toothpaste', 350),
(3, 'Shampoo', 575),
(4, 'Conditioner', 575),
(5, 'Soap', 199),
(6, 'Towel Set', 1250),
(7, 'Bed Sheets', 1800),
(8, 'Pillow', 899),
(9, 'Blanket', 1549),
(10, 'Laundry Detergent', 675),
(11, 'Dish Soap', 250),
(12, 'Bath Sponge', 125),
(13, 'Razor', 399),
(14, 'Shaving Cream', 425),
(15, 'Hairbrush', 249),
(16, 'Feminine Hygiene Produ', 625),
(17, 'Hand Soap', 175),
(18, 'Deodorant', 300),
(19, 'Mouthwash', 450),
(20, 'Sunscreen', 750);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `Firstname` varchar(22) NOT NULL,
  `Lastname` varchar(22) NOT NULL,
  `Username` varchar(22) NOT NULL,
  `Password` varchar(22) NOT NULL,
  `Confirm Password` varchar(22) NOT NULL,
  `City/Town/Village` varchar(22) NOT NULL,
  `State` varchar(22) NOT NULL,
  `Country` varchar(22) NOT NULL,
  `Phone Number` varchar(22) NOT NULL,
  `Email ID` varchar(22) NOT NULL,
  `Gender` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tablets`
--

CREATE TABLE `tablets` (
  `id` int(22) NOT NULL,
  `name` varchar(22) NOT NULL,
  `usagefor` varchar(22) NOT NULL,
  `price` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tablets`
--

INSERT INTO `tablets` (`id`, `name`, `usagefor`, `price`) VALUES
(1, 'PainAway', 'Pain Relief', 10),
(2, 'FeverRelief', 'Fever Reduction', 8),
(3, 'ColdCoughFix', 'Cold and Cough Relief', 7),
(4, 'AllerFree', 'Allergy Relief', 12),
(5, 'DigestEase', 'Digestive Aid', 9),
(6, 'HeadacheRelief', 'Headache Management', 6),
(7, 'InflammEase', 'Inflammation Control', 11),
(8, 'SleepWell', 'Sleep Aid', 14),
(9, 'JointEase', 'Joint Health', 13),
(10, 'MultiVita', 'Multivitamin Supplemen', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `healthcare`
--
ALTER TABLE `healthcare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labtest`
--
ALTER TABLE `labtest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablets`
--
ALTER TABLE `tablets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `healthcare`
--
ALTER TABLE `healthcare`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `labtest`
--
ALTER TABLE `labtest`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tablets`
--
ALTER TABLE `tablets`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
