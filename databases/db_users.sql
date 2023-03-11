-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 11, 2023 at 09:13 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` smallint(6) UNSIGNED NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`, `role_desc`) VALUES
(1, 'admin', 'Admin is able to add new users, update or delete them and modify their roles.'),
(2, 'unregistered', 'All the users by default');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` smallint(11) UNSIGNED NOT NULL,
  `user_lname` varchar(75) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_photo` varchar(50) NOT NULL,
  `role_id` smallint(6) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `user_lname`, `user_fname`, `user_username`, `user_password`, `user_photo`, `role_id`) VALUES
(1, 'Smith', 'Maggie', 'msmith', '79ceb6a262ccd958cd33b75e078f13e5', 'person5.jpg', 1),
(2, 'Burton', 'Tim', 'tburton', '897fc8801b9706808021d8adfbd87cd5', 'person2.jpg', 2),
(3, 'Geer', 'Richard', 'rgeer', 'aadc5b1760f5f42a1c11c61bf918b244', 'person3.jpg', 2),
(6, 'Linda', 'Flynn', 'lflynn', '195917d044810e8664ff195c8bcfe9a0', 'person4.jpg', 1),
(7, 'Lee', 'Jennie', 'jlee', '9a92b3638fc2561e581f694d9b4aec1e', 'person5.jpg', 2),
(13, 'Mills', 'Sasha', 'sasha', '83e1ea39c9d3b1999c0bfe5b8bf1fd9a', 'person2.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_users_to_roles` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` smallint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_to_roles` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
