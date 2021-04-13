-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2021 at 10:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `companySectors`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `phone`, `email`, `sector_company_id`) VALUES
(1, 'Endesa', '', '', 1),
(2, 'Bulb', '952215487', 'buld@gmail.com', 1),
(3, 'ElectSun', '956326598', 'elec@gmail.com', 1),
(4, 'RayLight', '956326589', 'ray@gmail.com', 1),
(5, 'PizzaSoon', '952326589', 'pizza@gmail.com', 2),
(6, 'SteakDone', '954789652', 'steak@gmail.com', 2),
(7, 'EatFast', '952326589', 'eat@gmail.com', 2),
(8, 'PlateOnTable', '954789654', 'plate@gmail.com', 2),
(36, 'LightBlue', '952326598', 'light@gmail.com', 1),
(37, 'CCH Electricity', '956325698', 'cch@gmail.com', 1),
(38, 'Cable BC', '954659875', 'cable@gmail.com', 1),
(39, 'Power & Light', '956325658', 'power@gmail.com', 1),
(40, 'Malaga Energy', '954652365', 'malaga@gmail.com', 1),
(41, 'DTI Energy', '954654789', 'dti@gmail.com', 1),
(42, 'Market Spencer', '954654321', 'market@gmail.com', 2),
(43, 'Delivery Food', '954654321', 'delivery@gmail.com', 2),
(44, 'Banana Express', '954789654', 'banana@gmail.com', 2),
(45, 'Tropical Fruits', '954654321', 'tropical@gmail.com', 2),
(46, 'Carry Market', '954654321', 'carry@gmail.com', 2),
(47, 'Cash & Food', '954789654', 'cash@gmail.com', 2),
(48, 'Nice Toys', '954654321', 'toys@gmail.com', 10),
(49, 'Table Game', 'table@gmail.com', 'table@gmail.com', 10),
(50, 'Run & Play', '954654321', 'run@gmail.com', 10),
(51, 'JMM Toys', '954654321', 'jmm@gmail.com', 10),
(52, 'PlayLand', '954654321', 'playland@gmail.com', 10),
(57, 'Clean Water', '954236547', 'clean@gmail.com', 12),
(58, 'Water group', '954654321', 'wgroup@gmail.com', 12),
(59, 'Malaga Water', '954654321', 'malaga@gmail.com', 12),
(60, 'Crystal DDC', '954654321', 'crystal@hotmail.com', 12),
(61, 'Rain Tap', '954654321', 'rain@gmail.com', 12),
(62, 'Water Treatment', '954654321', 'treat@gmail.com', 12),
(63, 'WPipes', '954654321', 'wpipes@gmail.com', 12),
(64, 'North Water Supply', '954654321', 'north@gmail.com', 12),
(65, 'South & Water', '954654321', 'south@gmail.com', 12),
(66, 'Wastewater', '954654321', 'waste@gmail.com', 12),
(67, 'Bikes 2 All', '954654321', 'bikes@gmail.com', 10),
(68, 'No Plastic Games', '954789654', 'noPlastic@gmail.com', 10),
(69, 'Garden Games', '954789654', 'garden@gmail.com', 10),
(70, 'Board Games LLC', '963852741', 'board@gmail.com', 10),
(71, 'Games & Entertainment', '632145987', 'enter@gmail.com', 10);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `currency_send` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_receive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `exchange` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_send`, `currency_receive`, `amount`, `date`, `exchange`) VALUES
(1, 'EUR', 'GBP', 13, '2021-03-29', '11.11'),
(2, 'EUR', 'GBP', 10, '2021-03-29', '8.54'),
(3, 'EUR', 'EUR', 10, '2021-03-29', '10.00'),
(4, 'USD', 'GBP', 10, '2021-03-29', '7.26'),
(5, 'USD', 'GBP', 25, '2021-03-29', '18.15'),
(6, 'EUR', 'GBP', 25, '2021-03-29', '21.36'),
(7, 'USD', 'EUR', 10, '2021-04-06', '8.42'),
(8, 'EUR', 'USD', 200, '2021-04-01', '235.56'),
(9, 'EUR', 'GBP', 500, '2021-03-29', '427.17'),
(10, 'EUR', 'GBP', 11, '2021-03-03', '9.52'),
(11, 'EUR', 'GBP', 112, '2021-03-03', '96.91'),
(12, 'EUR', 'GBP', 1123, '2021-03-03', '971.73'),
(13, 'EUR', 'GBP', 1, '2021-03-03', '0.87'),
(14, 'USD', 'GBP', 222, '2021-03-03', '159.41'),
(15, 'USD', 'GBP', 1000, '2021-03-03', '718.08'),
(16, 'USD', 'GBP', 1200, '2021-03-03', '861.69'),
(17, 'USD', 'GBP', 1300, '2021-03-03', '933.50'),
(18, 'USD', 'EUR', 23, '2021-03-29', '19.54'),
(19, 'USD', 'EUR', 24, '2021-03-29', '20.39'),
(20, 'USD', 'EUR', 24000, '2021-03-29', '20393.16'),
(21, 'EUR', 'GBP', 13569, '2021-03-03', '11741.28'),
(22, 'GBP', 'EUR', 12365, '2021-02-02', '14028.61');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210408104220', '2021-04-08 10:42:36', 281),
('DoctrineMigrations\\Version20210408104354', '2021-04-08 10:44:02', 245),
('DoctrineMigrations\\Version20210408160919', '2021-04-08 16:09:31', 526),
('DoctrineMigrations\\Version20210408163005', '2021-04-08 16:30:22', 509),
('DoctrineMigrations\\Version20210408163816', '2021-04-08 16:38:33', 470),
('DoctrineMigrations\\Version20210408165242', '2021-04-08 16:52:56', 478),
('DoctrineMigrations\\Version20210408165355', '2021-04-08 16:54:26', 278),
('DoctrineMigrations\\Version20210410103611', '2021-04-10 10:36:27', 556),
('DoctrineMigrations\\Version20210411094050', '2021-04-11 09:41:01', 642),
('DoctrineMigrations\\Version20210412065051', '2021-04-12 06:51:06', 369),
('DoctrineMigrations\\Version20210412065511', '2021-04-12 06:55:22', 453),
('DoctrineMigrations\\Version20210412132854', '2021-04-12 13:29:03', 315),
('DoctrineMigrations\\Version20210412135525', '2021-04-12 13:55:35', 325),
('DoctrineMigrations\\Version20210412135704', '2021-04-12 13:57:11', 288);

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`id`, `name`) VALUES
(1, 'Electric'),
(2, 'Grocery'),
(10, 'Toys'),
(12, 'Water');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'jose@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$9QbNXfFY4eBpVBE7A/u7ag$gG0bEU82tjGoAbgjvYEtOvoaYs53LxS0DElOJAErb2s');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4FBF094F63FC6C5D` (`sector_company_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `FK_4FBF094F63FC6C5D` FOREIGN KEY (`sector_company_id`) REFERENCES `sector` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
