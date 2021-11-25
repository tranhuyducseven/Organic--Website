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
-- Table structure for table `comment_table`
--

CREATE TABLE `comment_table` (
  `ID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Content` text NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_table`
--

INSERT INTO `comment_table` (`ID`, `Username`, `Content`, `Time`) VALUES
(9, 'nocmt123', 'This is so bad!', '2021-11-25 13:40:49'),
(10, 'nocmt123', 'I hate this!', '2021-11-25 13:41:05'),
(11, 'nocmt123', 'Delete this post!', '2021-11-25 13:41:19'),
(9, 'noavt123', 'hello\n', '2021-11-25 13:42:19'),
(9, 'noavt123', 'Hi\n', '2021-11-25 13:42:23'),
(10, 'noavt123', 'I kinda agree!', '2021-11-25 13:42:52'),
(11, 'noavt123', 'Same to me!', '2021-11-25 13:43:02'),
(9, 'daily123', 'Nice to meet you!', '2021-11-25 13:45:01'),
(9, 'ryan123', 'Yes and no.', '2021-11-25 13:45:56'),
(10, 'ryan123', 'Awesome!', '2021-11-25 13:46:18'),
(14, 'ryan123', 'Yep', '2021-11-25 13:46:30'),
(12, 'htmlcss123', 'My first comment!', '2021-11-25 13:53:12'),
(13, 'htmlcss123', 'My second comment!', '2021-11-25 13:53:25'),
(16, 'htmlcss123', 'My third comment!', '2021-11-25 13:53:42'),
(15, 'htmlcss123', 'My last comment!', '2021-11-25 13:53:56'),
(11, 'john123', '!!!!', '2021-11-25 13:57:41'),
(12, 'john123', 'Ok', '2021-11-25 13:57:51'),
(9, 'john123', 'Good!', '2021-11-25 13:58:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
