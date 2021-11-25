-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 02:59 PM
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
-- Table structure for table `blog_table`
--

CREATE TABLE `blog_table` (
  `ID` int(11) NOT NULL,
  `Image` text NOT NULL,
  `Title` text NOT NULL,
  `Content` text NOT NULL,
  `Tag` text NOT NULL,
  `Day` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_table`
--

INSERT INTO `blog_table` (`ID`, `Image`, `Title`, `Content`, `Tag`, `Day`, `Description`) VALUES
(9, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/06/img-project2.jpg', 'Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.', 'ORGANIC,FOOD', '2021-11-25 13:31:16', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(10, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/06/img-service-768x434.jpg', 'Water spinach arugula pea tatsoi aubergine spring onion bush tomato kale radicchio.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.', 'ORGANIC,FOOD', '2021-11-25 13:31:35', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(11, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/healthy-food-scaled-768x512.jpg', 'It is a long established fact that reader will be distracted by the readable content.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.', 'HEALTH,LIFESTYLE', '2021-11-25 13:31:52', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(12, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/happy-farner-1.jpg', 'Credibly innovate granular internal or \"organic\" sources whereas high standards.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.', 'ORGANIC,FACT', '2021-11-25 13:32:18', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(13, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/05/blog2-768x434.jpg', 'Organic products is best for your health.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.', 'ORGANIC,FACT', '2021-11-25 13:32:35', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(14, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/06/img-service-768x434.jpg', 'Round and round like a carousel.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.', 'OTHERS', '2021-11-25 13:32:49', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(15, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/05/blog2-768x434.jpg', 'Warm and humid, a sticky day health.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.', 'HEALTH,LIFESTYLE', '2021-11-25 13:33:03', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(16, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/05/blog1-768x434.jpg', 'You can start your day by pairing’s fresh orange juice with tasty vegan.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500 when an unknown printer took and galley of type and scrambled it to make a type specimen book when an unknown printer took a galley of type and scrambled it make a type specimen book. It has survived not only five centuries.', 'HEALTH,LIFESTYLE', '2021-11-25 13:33:17', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_table`
--
ALTER TABLE `blog_table`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_table`
--
ALTER TABLE `blog_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
