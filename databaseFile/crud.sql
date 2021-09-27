-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 03:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(4) NOT NULL,
  `contact_user_id` int(4) NOT NULL,
  `contact_no` varchar(16) DEFAULT NULL,
  `contact_document` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_user_id`, `contact_no`, `contact_document`) VALUES
(4, 5, '9887457670', 'codecamp.jpeg'),
(5, 5, '9887457600', 'codecamp.jpeg'),
(6, 5, '9887457678', 'butterfly.jpg'),
(7, 6, '9887456666', 'codecamp.jpeg'),
(8, 6, '9887456666', 'codecamp.jpeg'),
(9, 6, '9887457000', 'eye.jpg'),
(10, 6, '9887456678', 'butterfly.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(60) NOT NULL,
  `log_user_id` int(4) NOT NULL,
  `log_username` varchar(255) NOT NULL,
  `log_action` varchar(255) NOT NULL,
  `log_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `log_user_id`, `log_username`, `log_action`, `log_time`) VALUES
(1, 5, 'bobadmin', 'Loggedout', '2021-09-27 18:32:55'),
(2, 5, 'bobadmin', 'loggedin', '2021-09-27 18:33:18'),
(3, 5, 'bobadmin', 'Loggedout', '2021-09-27 18:33:25'),
(4, 6, 'Jack', 'loggedin', '2021-09-27 18:33:56'),
(5, 6, 'Jack', 'loggedin', '2021-09-27 18:35:50'),
(6, 6, 'Jack', 'Loggedout', '2021-09-27 18:35:51'),
(7, 5, 'bobadmin', 'loggedin', '2021-09-27 18:36:19'),
(8, 0, '', 'Loggedout', '2021-09-27 18:36:21'),
(9, 5, 'bobadmin', 'Loggedout', '2021-09-27 18:36:40'),
(10, 8, 'rajaram', 'new User Registered', '2021-09-27 18:39:45'),
(11, 8, 'rajaram', 'loggedin', '2021-09-27 18:39:46'),
(12, 8, 'rajaram', 'Loggedout', '2021-09-27 18:41:55'),
(13, 5, 'bobadmin', 'loggedin', '2021-09-27 18:45:31'),
(14, 5, 'bobadmin', 'Loggedout', '2021-09-27 18:49:50'),
(15, 6, 'Jack', 'loggedin', '2021-09-27 18:49:56'),
(16, 6, 'Jack', 'Contact added', '2021-09-27 18:50:13'),
(17, 6, 'Jack', 'Contact added', '2021-09-27 18:50:16'),
(18, 6, 'Jack', 'Contact added', '2021-09-27 18:54:29'),
(19, 6, 'Jack', 'Contact added', '2021-09-27 18:55:01'),
(20, 6, 'Jack', 'Loggedout', '2021-09-27 18:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `user_firstname` varchar(60) DEFAULT NULL,
  `user_lastname` varchar(60) DEFAULT NULL,
  `user_email` varchar(60) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_address` varchar(60) DEFAULT NULL,
  `user_contact_no` varchar(15) DEFAULT NULL,
  `user_role` varchar(60) NOT NULL DEFAULT 'member',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_address`, `user_contact_no`, `user_role`, `created_at`) VALUES
(5, 'bobadmin', 'Bob', 'Shretha', 'bob@admin.com', '$2y$12$5dQOIIjsBvG7mB3kKVjyI.Q8ZJznkre3V2ydfaNnV72lihxx0oMru', 'main', NULL, 'admin', '2021-09-27 15:12:09'),
(6, 'Jack', 'Jack', 'Thapa', 'jack@admin.com', '$2y$12$iQdGNmG1kXNxvmB/MdmzEO1JYFfF.nJcNDqZyh54jc98jpFQGCtsi', '', NULL, 'member', '2021-09-27 15:16:03'),
(8, 'rajaram', 'bob', 'raj', 'magar@raj.com', '$2y$12$kWG7cAw9/Qpd5pysFD49yugUkbXpEU1SsgrLbGgwV91cyyBbpGAEG', 'mainst', NULL, 'member', '2021-09-27 18:39:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `contact-constraint` (`contact_user_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contact-constraint` FOREIGN KEY (`contact_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
