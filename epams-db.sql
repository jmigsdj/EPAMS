/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 10.1.13-MariaDB : Database - epams
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`epams` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `epams`;

/*Table structure for table `assets` */

DROP TABLE IF EXISTS `assets`;

CREATE TABLE `assets` (
  `asset_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `device_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `device_barcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `device_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `category` int(11) NOT NULL,
  `condition` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`asset_id`),
  KEY `category` (`category`),
  KEY `condition` (`condition`),
  KEY `status` (`status`),
  CONSTRAINT `assets_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`categ_id`),
  CONSTRAINT `assets_ibfk_2` FOREIGN KEY (`condition`) REFERENCES `condition` (`condition_id`),
  CONSTRAINT `assets_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `assets` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `categ_id` int(11) NOT NULL AUTO_INCREMENT,
  `categ_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`categ_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`categ_id`,`categ_name`) values (1,'Android');

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `client_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `client_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `clients` */

/*Table structure for table `condition` */

DROP TABLE IF EXISTS `condition`;

CREATE TABLE `condition` (
  `condition_id` int(11) NOT NULL AUTO_INCREMENT,
  `condition_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`condition_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `condition` */

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `employee_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `empId` varchar(20) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `shift` int(11) unsigned DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  KEY `shift` (`shift`),
  CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`shift`) REFERENCES `shifts` (`shift_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `employees` */

/*Table structure for table `shifts` */

DROP TABLE IF EXISTS `shifts`;

CREATE TABLE `shifts` (
  `shift_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `shift_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`shift_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `shifts` */

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `status` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_num` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `usertype` int(11) unsigned NOT NULL COMMENT '1-admin, 2-rm, 2-member',
  `created_by` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `usertype` (`usertype`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`usertype`) REFERENCES `usertypes` (`usertype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

/*Table structure for table `usertypes` */

DROP TABLE IF EXISTS `usertypes`;

CREATE TABLE `usertypes` (
  `usertype_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usertype_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`usertype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usertypes` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
