-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2016 at 10:09 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epams`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS `assets` (
  `id` int(11) unsigned NOT NULL,
  `device_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'device name',
  `brand` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resolution` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `processor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `os` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chipset` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gpu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `screenSize` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graphics` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `internalStorage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `simSupport` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arrivalDate` date DEFAULT NULL,
  `arrivalNotes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `assetType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subAsset` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imei` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `storageAllocation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL COMMENT 'category FK',
  `condition_id` int(11) NOT NULL COMMENT 'condition, FK',
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `device_id`, `barcode`, `name`, `brand`, `model`, `resolution`, `processor`, `ram`, `os`, `chipset`, `gpu`, `bit`, `screenSize`, `graphics`, `internalStorage`, `simSupport`, `arrivalDate`, `arrivalNotes`, `mac`, `serial`, `assetType`, `subAsset`, `imei`, `storageAllocation`, `category_id`, `condition_id`, `status_id`) VALUES
(7, 'asd''', 'asdasd', 'asd', 'sa', 's', 'da', 'sd', NULL, 'w', 'qwd', 'a', 'sd', 'ad', 'as', 'da', 'sd', '0000-00-00', 'asd', 'as', 'da', 'sd', 'asd', 'asd', 'as', 2, 1, 0),
(8, '213951093810938', '2903581038975134', 'Samsung', '32ajgnakn', 'kvnaerjvna', 'kjncakdjvn', 'vnjslrkjnsdm', 'vjnserkjvns', 'vlksjenrvksmn', ';jsnervjksnev', 'klsnkjsern', 'verjnaerkjn', 'kjvnvakljrevn', 'dkjfvnaerkj', 'cakrjvnalk', 'velrkjvnsekj', '0000-00-00', 'vsrkjnd', NULL, 'vnrlksjvns', 'carkljvna', 'crjklvnsv', 'vnsrekjsvn', 'vsrkljvns', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `categName` varchar(100) DEFAULT NULL COMMENT 'category name'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categName`) VALUES
(1, 'Android'),
(2, 'Phone'),
(3, 'Tablet'),
(4, 'Adapter'),
(5, 'Cord'),
(6, 'Extension Cord'),
(7, 'Other'),
(8, 'Hello'),
(17, 'Test Data Category'),
(18, 'Test'),
(19, 'Mah nigga'),
(20, 'Testing Hide'),
(21, 'Hi im new and i should be present after create'),
(22, 'testing location'),
(23, 'yea'),
(24, 'tea'),
(25, 'hi'),
(26, 'yow');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL,
  `clientName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `clientName`) VALUES
(1, 'VainGlory'),
(2, 'Boboboi'),
(3, 'Pokemon');

-- --------------------------------------------------------

--
-- Table structure for table `condition`
--

CREATE TABLE IF NOT EXISTS `condition` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL COMMENT 'condition status'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `condition`
--

INSERT INTO `condition` (`id`, `name`) VALUES
(1, 'Bad'),
(2, 'Broken'),
(3, 'Good'),
(4, 'New'),
(5, 'Pogi');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL,
  `empId` varchar(20) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `shift` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `empId`, `firstName`, `lastName`, `created_by`, `created_date`, `modified_by`, `modified_date`, `shift`) VALUES
(2, '2013-02133', 'Summers', 'Smith', NULL, NULL, NULL, NULL, 1),
(3, '2013-02113', 'Doe', 'DJ', NULL, NULL, NULL, NULL, 2),
(4, '2013-02613', 'Fitzpatrick', 'Foo', NULL, NULL, NULL, NULL, 3),
(5, '2013-02113', 'Flynn', 'Bar', NULL, NULL, NULL, NULL, 4),
(6, '120971487', 'Miguel', 'De Jesus', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
  `id` int(11) unsigned NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `firstName`, `lastName`, `gender`, `address`, `dob`) VALUES
(1, 'Airin', 'Satou', 'female', 'Tokyo', '1964-03-04'),
(2, 'Garrett', 'Winters', 'male', 'Tokyo', '1988-09-02'),
(3, 'John', 'Doe', 'male', 'Kansas', '1972-11-02'),
(4, 'Tatyana', 'Fitzpatrick', 'male', 'London', '1989-01-01'),
(5, 'Quinn', 'Flynn', 'male', 'Edinburgh', '1977-03-24'),
(9, 'Miguel', 'De Jesus', 'male', 'YEAAAA', '2016-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE IF NOT EXISTS `shifts` (
  `shift_id` int(11) NOT NULL DEFAULT '0',
  `shift_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`shift_id`, `shift_name`) VALUES
(1, 'Pikachu'),
(2, 'Clefairy'),
(3, 'Scyther'),
(4, 'Snorlax');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Available'),
(2, 'On Shelf'),
(3, 'On Hand'),
(4, 'Borrowed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `usertype_id` int(11) DEFAULT NULL COMMENT '1-admin, 2-rm, 2-member',
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `username`, `password`, `created_by`, `created_date`, `usertype_id`, `modified_by`, `modified_date`) VALUES
(1, NULL, 'admin', '0cc175b9c0f1b6a831c399e269772661', NULL, '2016-09-28', 1, NULL, NULL),
(2, NULL, 'regmem', '92eb5ffee6ae2fec3ad71c777531578f', NULL, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE IF NOT EXISTS `usertypes` (
  `id` int(11) NOT NULL,
  `usertype` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `usertype`) VALUES
(1, 'Admin'),
(2, 'RM'),
(3, 'Tester');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`), ADD KEY `condition_id` (`condition_id`), ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `condition`
--
ALTER TABLE `condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`), ADD KEY `shift` (`shift`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD KEY `usertype_id` (`usertype_id`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `condition`
--
ALTER TABLE `condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
ADD CONSTRAINT `assets_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
ADD CONSTRAINT `assets_ibfk_3` FOREIGN KEY (`condition_id`) REFERENCES `condition` (`id`),
ADD CONSTRAINT `assets_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`shift`) REFERENCES `shifts` (`shift_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`usertype_id`) REFERENCES `usertypes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
