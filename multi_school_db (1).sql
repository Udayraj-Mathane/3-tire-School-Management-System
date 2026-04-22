-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2026 at 06:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `school_id` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `school_id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'SCH101', 'Admin User', 'admin@abc.com', 'admin123', '2026-04-18 18:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `my_key` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT 0,
  `ignore_limits` tinyint(4) DEFAULT 0,
  `is_private_key` tinyint(4) DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `user_id`, `my_key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `status`, `date_created`) VALUES
(1, 1, 'funda123', 1, 0, 0, NULL, 1, '2026-04-18 18:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `school_id`, `email`, `phone`, `address`, `status`, `created_at`) VALUES
(1, 'ABC School', 'SCH001', 'new@school.com', '9999999999', 'Mumbai', 1, '2026-04-18 18:07:29'),
(3, 'Sipna', 'SCH002', 'sipna@gmail.com', '1234567893', 'Amravati', 1, '2026-04-20 05:26:41'),
(4, 'Ram Meghe', 'SCH003', 'rammeghe@gmail.com', '1234567893', 'Amravati', 1, '2026-04-20 13:15:01'),
(5, 'Green Valley School', 'SCH004', 'greenvalley@gmail.com', '9876543210', 'Mumbai', 1, '2026-04-21 06:46:45'),
(6, 'Sunrise Public School', 'SCH005', 'sunrise@gmail.com', '9876543211', 'Pune', 1, '2026-04-21 06:46:45'),
(7, 'Blue Ridge Academy', 'SCH006', 'blueridge@gmail.com', '9876543212', 'Nashik', 1, '2026-04-21 06:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `student_id` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `school_id`, `student_id`, `name`, `email`, `course`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SCH001', 'STU001', 'Rajiv Raut', 'test2@gmail.com', 'BBA', 'Male', 1, '2026-04-18 18:09:24', '2026-04-20 04:34:03'),
(4, 'SCH001', 'STU002', 'Udayraj Mathane', 'uday123@gmail.com', 'IT', 'Male', 1, '2026-04-20 07:43:46', '2026-04-20 07:43:46'),
(5, 'SCH004', 'STU4001', 'Amit Sharma', 'amit.s4@gmail.com', 'BCA', 'Male', 1, '2026-04-21 06:48:10', '2026-04-21 06:48:10'),
(6, 'SCH004', 'STU4002', 'Priya Mehta', 'priya.s4@gmail.com', 'BBA', 'Female', 1, '2026-04-21 06:48:10', '2026-04-21 06:48:10'),
(7, 'SCH004', 'STU4003', 'Rahul Verma', 'rahul.s4@gmail.com', 'BSc IT', 'Male', 1, '2026-04-21 06:48:10', '2026-04-21 06:48:10'),
(8, 'SCH004', 'STU4004', 'Neha Patil', 'neha.s4@gmail.com', 'BCom', 'Female', 1, '2026-04-21 06:48:10', '2026-04-21 06:48:10'),
(9, 'SCH004', 'STU4005', 'Karan Joshi', 'karan.s4@gmail.com', 'BCA', 'Male', 1, '2026-04-21 06:48:10', '2026-04-21 06:48:10'),
(10, 'SCH005', 'STU5001', 'Sneha Kapoor', 'sneha.s5@gmail.com', 'BBA', 'Female', 1, '2026-04-21 06:48:10', '2026-04-21 06:48:10'),
(11, 'SCH005', 'STU5002', 'Vikas Singh', 'vikas.s5@gmail.com', 'BSc IT', 'Male', 1, '2026-04-21 06:48:10', '2026-04-21 06:48:10'),
(12, 'SCH005', 'STU5003', 'Pooja Nair', 'pooja.s5@gmail.com', 'BCom', 'Female', 1, '2026-04-21 06:48:10', '2026-04-21 06:48:10'),
(13, 'SCH005', 'STU5004', 'Rohit Gupta', 'rohit.s5@gmail.com', 'BCA', 'Male', 1, '2026-04-21 06:48:10', '2026-04-21 06:48:10'),
(14, 'SCH005', 'STU5005', 'Anjali Deshmukh', 'anjali.s5@gmail.com', 'BBA', 'Female', 1, '2026-04-21 06:48:10', '2026-04-21 06:48:10'),
(15, 'SCH006', 'STU6001', 'Arjun Reddy', 'arjun.s6@gmail.com', 'BSc IT', 'Male', 1, '2026-04-21 06:48:10', '2026-04-21 06:48:10'),
(16, 'SCH006', 'STU6002', 'Kavya Iyer', 'kavya.s6@gmail.com', 'BCom', 'Female', 1, '2026-04-21 06:48:10', '2026-04-21 06:48:10'),
(17, 'SCH006', 'STU6003', 'Manish Yadav', 'manish.s6@gmail.com', 'BCA', 'Male', 1, '2026-04-21 06:48:10', '2026-04-21 06:48:10'),
(18, 'SCH006', 'STU6004', 'Divya Kulkarni', 'divya.s6@gmail.com', 'BBA', 'Female', 1, '2026-04-21 06:48:10', '2026-04-21 06:48:10'),
(19, 'SCH006', 'STU6005', 'Sandeep Pawar', 'sandeep.s6@gmail.com', 'BSc IT', 'Male', 1, '2026-04-21 06:48:10', '2026-04-21 06:48:10'),
(20, 'SCH001', 'STU1001', 'Ravi Kumar', 'ravi.s1@gmail.com', 'BCA', 'Male', 1, '2026-04-21 06:49:25', '2026-04-21 06:49:25'),
(21, 'SCH001', 'STU1002', 'Anita Singh', 'anita.s1@gmail.com', 'BBA', 'Female', 1, '2026-04-21 06:49:25', '2026-04-21 06:49:25'),
(22, 'SCH001', 'STU1003', 'Mohit Jain', 'mohit.s1@gmail.com', 'BCom', 'Male', 1, '2026-04-21 06:49:25', '2026-04-21 06:49:25'),
(23, 'SCH001', 'STU1004', 'Pooja Sharma', 'pooja.s1@gmail.com', 'BSc IT', 'Female', 1, '2026-04-21 06:49:25', '2026-04-21 06:49:25'),
(24, 'SCH001', 'STU1005', 'Deepak Yadav', 'deepak.s1@gmail.com', 'BCA', 'Male', 1, '2026-04-21 06:49:25', '2026-04-21 06:49:25'),
(25, 'SCH002', 'STU2001', 'Nikhil Patil', 'nikhil.s2@gmail.com', 'BBA', 'Male', 1, '2026-04-21 06:49:25', '2026-04-21 06:49:25'),
(26, 'SCH002', 'STU2002', 'Aarti Desai', 'aarti.s2@gmail.com', 'BCom', 'Female', 1, '2026-04-21 06:49:25', '2026-04-21 06:49:25'),
(27, 'SCH002', 'STU2003', 'Suresh Rane', 'suresh.s2@gmail.com', 'BSc IT', 'Male', 1, '2026-04-21 06:49:25', '2026-04-21 06:49:25'),
(28, 'SCH002', 'STU2004', 'Meena Joshi', 'meena.s2@gmail.com', 'BCA', 'Female', 1, '2026-04-21 06:49:25', '2026-04-21 06:49:25'),
(29, 'SCH002', 'STU2005', 'Ajay Shinde', 'ajay.s2@gmail.com', 'BBA', 'Male', 1, '2026-04-21 06:49:25', '2026-04-21 06:49:25'),
(30, 'SCH003', 'STU3001', 'Kiran More', 'kiran.s3@gmail.com', 'BCom', 'Male', 1, '2026-04-21 06:49:25', '2026-04-21 06:49:25'),
(31, 'SCH003', 'STU3002', 'Swapnil Pawar', 'swapnil.s3@gmail.com', 'BCA', 'Male', 1, '2026-04-21 06:49:25', '2026-04-21 06:49:25'),
(32, 'SCH003', 'STU3003', 'Rutuja Patil', 'rutuja.s3@gmail.com', 'BBA', 'Female', 1, '2026-04-21 06:49:25', '2026-04-21 06:49:25'),
(33, 'SCH003', 'STU3004', 'Tejas Kulkarni', 'tejas.s3@gmail.com', 'BSc IT', 'Male', 1, '2026-04-21 06:49:25', '2026-04-21 06:49:25'),
(34, 'SCH003', 'STU3005', 'Sonali Jadhav', 'sonali.s3@gmail.com', 'BCom', 'Female', 1, '2026-04-21 06:49:25', '2026-04-21 06:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `school_id` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('superadmin','admin','student') NOT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `school_id`, `email`, `password`, `role`, `ref_id`, `created_at`) VALUES
(1, 'SCH101', 'admin@abc.com', 'admin1234', 'admin', 1, '2026-04-18 18:09:00'),
(2, 'SCH101', 'john@abc.com', 'stud123', 'student', 1, '2026-04-18 18:09:48'),
(3, 'SCH101', 'test@gmail.com', '$2y$10$ZHTkmhcAHpUFlcEJAv3vQestH7OrRhN/tdLbKbXtauRwfOGVlDLvW', 'student', 1, '2026-04-19 13:13:36'),
(4, 'SCH102', 'test2@gmail.com', '123456', 'student', 1, '2026-04-19 13:20:05'),
(5, 'SCH101', 'admin@gmail.com', '123456', 'admin', 0, '2026-04-19 14:45:16'),
(10, 'SCH101', 'admin2@gmail.com', '123456', 'admin', 0, '2026-04-19 14:52:06'),
(11, 'SCH102', 'admin3@gmail.com', '123456', 'admin', 0, '2026-04-19 14:57:45'),
(12, '0', 'superadmin@gmail.com', '123456', 'superadmin', 0, '2026-04-20 04:39:56'),
(13, 'SCH002', 'adminsipna@gmail.com', '123456', 'admin', NULL, '2026-04-20 06:23:52'),
(14, 'SCH003', 'adminram@gmail.com', '123456', 'admin', NULL, '2026-04-20 13:15:25'),
(15, 'SCH004', 'greenvalley@gmail.com', '123456', 'admin', NULL, '2026-04-21 06:52:25'),
(16, 'SCH005', 'sunrise@gmail.com', '123456', 'admin', NULL, '2026-04-21 07:19:54'),
(17, 'SCH006', 'blueridge@gmail.com', '123456', 'admin', NULL, '2026-04-21 07:20:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `college_id` (`school_id`),
  ADD UNIQUE KEY `school_id` (`school_id`),
  ADD UNIQUE KEY `school_id_2` (`school_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_students_school` (`school_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_school` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
