-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 03:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ltw`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Avatar` text NOT NULL,
  `PermissionComment` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`Username`, `Password`, `Email`, `PhoneNumber`, `Avatar`, `PermissionComment`) VALUES
('daily123', 'Daily123.', 'daily123@gmail.com', '12345678910', '', 1),
('htmlcss123', 'Htmlcss123.', 'htmlcss123@gmail.com', '12345678910', 'https://pickaface.net/gallery/avatar/unr_random_180527_1151_2bcb7h9.png', 1),
('john123', 'John123.', 'john123@gmail.com', '12345678910', 'https://pickaface.net/gallery/avatar/unr_random_160817_0304_2mvqp69.png', 1),
('julia123', 'Julia123.', 'julia123@gmail.com', '12345678910', 'https://pickaface.net/gallery/avatar/unr_randomavatar_170412_0236_9n4c2i.png', 1),
('noavt123', 'Noavt123.', 'noavt123@gmail.com', '12345678910', '', 1),
('nocmt123', 'Nocmt123.', 'nocmt123@gmail.com', '12345678910', 'https://www.peterbe.com/avatar.random.png', 1),
('ryan123', 'Ryan123.', 'ryan123@gmail.com', '12345678910', 'https://pickaface.net/gallery/avatar/unr_randomguy_190409_1742_4g5.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
