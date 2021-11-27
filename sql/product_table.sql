-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 02:03 PM
-- Server version: 8.0.26
-- PHP Version: 7.4.23

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
  `ID` int NOT NULL,
  `Image` text NOT NULL,
  `Name` text NOT NULL,
  `Price` float NOT NULL,
  `Description` text NOT NULL,
  `Hot` tinyint(1) NOT NULL,
  `Tag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`ID`, `Image`, `Name`, `Price`, `Description`, `Hot`, `Tag`) VALUES
(26, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/tao-removebg-preview-460x460.png', 'Apple', 2.99, 'This is Apple.', 1, 'FRUIT'),
(27, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/chuoi-removebg-preview-460x460.png', 'Banana', 3.99, 'This is Banana.', 1, 'FRUIT'),
(28, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/suplo-removebg-preview-460x460.png', 'Brocoli', 5.99, 'This is Broccoli.', 1, 'VEGETABLE'),
(29, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/carot-removebg-preview-460x460.png', 'Carrot', 6.99, 'This is Carrot.', 1, 'VEGETABLE'),
(30, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/khoaitay-removebg-300x300.png', 'Potato', 5.99, 'This is Potato.', 1, 'VEGETABLE'),
(31, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/luu-removebg-preview-460x460.png', 'Pomegranate', 1.99, 'This is Pomegranate.', 1, 'FRUIT'),
(32, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/duahau-removebg-preview-460x460.png', 'Water Melon', 6.99, 'This is Water Melon.', 1, 'FRUIT'),
(33, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/cam-removebg-preview-460x460.png', 'Orange', 4.99, 'This is Orange.', 1, 'FRUIT'),
(34, 'https://demo.cmssuperheroes.com/themeforest/orgus/wp-content/uploads/2021/07/hanh-removebg-preview-300x300.png', 'Onion', 4.99, 'This is Onion.', 1, 'VEGETABLE'),
(36, 'https://scontent.fdad1-3.fna.fbcdn.net/v/t1.15752-9/260280047_1079851136106082_5780334989579560128_n.png?_nc_cat=104&ccb=1-5&_nc_sid=ae9488&_nc_ohc=7-pZ-f-fT28AX-tjUqP&_nc_ht=scontent.fdad1-3.fna&oh=aa3663f7735622484e19659cce7eb373&oe=61C64DDA', 'Lime', 6.99, 'This is Lime.', 1, 'FRUIT'),
(37, 'https://scontent.fdad1-2.fna.fbcdn.net/v/t1.15752-9/259076539_1534215433615592_700657346672154744_n.png?_nc_cat=102&ccb=1-5&_nc_sid=ae9488&_nc_ohc=uqXVW4G8n8gAX9v-tV_&_nc_ht=scontent.fdad1-2.fna&oh=83e7277748417da978908ab85786ea42&oe=61C88EDC', 'Melon', 1.99, 'This is Melon.', 1, 'VEGETABLE'),
(38, 'https://scontent.fdad1-1.fna.fbcdn.net/v/t1.15752-9/261354588_750002939249985_1079709450406200072_n.png?_nc_cat=103&ccb=1-5&_nc_sid=ae9488&_nc_ohc=IfYHzMJ2LjwAX_CBqeE&_nc_ht=scontent.fdad1-1.fna&oh=238625eb51844a3164df768479d0c6de&oe=61C91409', 'Strawberry', 2.99, 'This is Strawberry.', 1, 'FRUIT'),
(42, 'https://scontent.fdad1-3.fna.fbcdn.net/v/t1.15752-9/258244303_1847791388740812_6694324633656671019_n.png?_nc_cat=104&ccb=1-5&_nc_sid=ae9488&_nc_ohc=8jwdgnLxaKQAX9MtnvB&_nc_ht=scontent.fdad1-3.fna&oh=bf94179f9d9d3d7bf7cd3ef391289670&oe=61C5B3FD', 'Blueberry', 3.99, 'This is Blueberry.', 1, 'FRUIT'),
(43, 'https://scontent.fdad2-1.fna.fbcdn.net/v/t1.15752-9/261778634_2893434454320727_4995277963633995736_n.png?_nc_cat=107&ccb=1-5&_nc_sid=ae9488&_nc_ohc=CPycC4B8Qj8AX-ypLSP&tn=jLpkOyrhNfq3t577&_nc_ht=scontent.fdad2-1.fna&oh=4d68b517f7bdbebb0ba0705fe5611740&oe=61C903ED', 'Beef', 10.99, 'This is Beef.', 1, 'MEAT'),
(44, 'https://scontent.fdad1-1.fna.fbcdn.net/v/t1.15752-9/261542607_1352310118533781_3467589568191656877_n.png?_nc_cat=100&ccb=1-5&_nc_sid=ae9488&_nc_ohc=I0rVeBHIg5wAX9EgNVM&_nc_ht=scontent.fdad1-1.fna&oh=70f5f4a73ac7bc25bb67915ac7344f64&oe=61C69EB7', 'Chicken Meat', 10.99, 'This is Chicken Meat.', 1, 'MEAT'),
(45, 'https://scontent.fdad2-1.fna.fbcdn.net/v/t1.15752-9/261776103_658037288945856_8411275231417730664_n.png?_nc_cat=101&ccb=1-5&_nc_sid=ae9488&_nc_ohc=PR2obzy88XEAX_TAn6I&_nc_ht=scontent.fdad2-1.fna&oh=e3910fc4f42d51dca1b9b887ff9900a0&oe=61C5F81E', 'Salmon Meat', 12.99, 'This is Salmon Meat.', 1, 'FISH');

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
