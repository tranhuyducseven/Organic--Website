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
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `ID` int(11) NOT NULL,
  `Image` text NOT NULL,
  `Name` text NOT NULL,
  `Price` float NOT NULL,
  `Description` text NOT NULL,
  `Hot` tinyint(1) NOT NULL,
  `Tag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`ID`, `Image`, `Name`, `Price`, `Description`, `Hot`, `Tag`) VALUES
(26, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/tao-removebg-preview-460x460.png', 'Apple', 2.99, 'This is Apple.', 1, 'FRUIT'),
(27, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/chuoi-removebg-preview-460x460.png', 'Banana', 3.99, 'This is Banana.', 1, 'FRUIT'),
(28, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/suplo-removebg-preview-460x460.png', 'Brocoli', 5.99, 'This is Brocoli.', 1, 'VEGETABLE'),
(29, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/carot-removebg-preview-460x460.png', 'Carrot', 6.99, 'This is Carrot.', 1, 'VEGETABLE'),
(30, 'https://assets.stickpng.com/images/580b57fcd9996e24bc43c175.png', 'Peache', 5.99, 'This is Peache.', 1, 'FRUIT'),
(31, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/luu-removebg-preview-460x460.png', 'Pomegranate', 1.99, 'This is Pomegranate.', 1, 'FRUIT'),
(32, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/duahau-removebg-preview-460x460.png', 'Watter Melon', 6.99, 'This is Watter Melon.', 1, 'FRUIT'),
(33, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/cam-removebg-preview-460x460.png', 'Orange', 4.99, 'This is Orange.', 1, 'FRUIT'),
(34, 'data:image/jpeg;base64,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', 'Papaya', 4.99, 'This is Papaya.', 1, 'FRUIT'),
(36, 'https://static.wixstatic.com/media/2cd43b_075d273be9b341dfa759d9b72e766280~mv2_d_2492_2223_s_2.png/v1/fill/w_320,h_285,q_90/2cd43b_075d273be9b341dfa759d9b72e766280~mv2_d_2492_2223_s_2.png', 'Coconut', 6.99, 'This is Coconut.', 1, 'FRUIT'),
(37, 'https://pngimg.com/uploads/green_bean/green_bean_PNG20.png', 'Green Beans', 1.99, 'This is Green Beans.', 1, 'VEGETABLE'),
(38, 'https://pngimg.com/uploads/pepper/pepper_PNG99158.png', 'Bell Pepper', 2.99, 'This is Bell Pepper.', 1, 'VEGETABLE'),
(42, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/khoaitay-removebg-460x460.png', 'Potatos', 3.99, 'This is Potatos.', 1, 'VEGETABLE'),
(43, 'data:image/jpeg;base64,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', 'Beef', 10.99, 'This is Beef.', 1, 'MEAT'),
(44, 'data:image/jpeg;base64,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', 'Chicken Meat', 10.99, 'This is Chicken Meat.', 1, 'MEAT'),
(45, 'data:image/jpeg;base64,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', 'Salmon Meat', 12.99, 'This is Salmon Meat.', 1, 'FISH');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
