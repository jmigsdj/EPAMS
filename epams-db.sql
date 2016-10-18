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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `status_id` int(11) NOT NULL,
  `tracker_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `condition_id` (`condition_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `assets` */

insert  into `assets`(`id`,`device_id`,`barcode`,`name`,`brand`,`model`,`resolution`,`processor`,`ram`,`os`,`chipset`,`gpu`,`bit`,`screenSize`,`graphics`,`internalStorage`,`simSupport`,`arrivalDate`,`arrivalNotes`,`mac`,`serial`,`assetType`,`subAsset`,`imei`,`storageAllocation`,`category_id`,`condition_id`,`status_id`,`tracker_id`) values (8,'213951093810938','2903581038975134','Samsung','32ajgnakn','kvnaerjvna','kjncakdjvn','vnjslrkjnsdm','vjnserkjvns','vlksjenrvksmn',';jsnervjksnev','klsnkjsern','verjnaerkjn','kjvnvakljrevn','dkjfvnaerkj','cakrjvnalk','velrkjvnsekj','0000-00-00','vsrkjnd',NULL,'vnrlksjvns','carkljvna','crjklvnsv','vnsrekjsvn','vsrkljvns',0,0,0,0);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categName` varchar(100) DEFAULT NULL COMMENT 'category name',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`id`,`categName`) values (1,'Android'),(2,'Phone'),(3,'Tablet'),(4,'Adapter'),(5,'Cord'),(6,'Extension Cord'),(27,'Watch Ios');

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `clients` */

insert  into `clients`(`id`,`clientName`) values (1,'VainGlory'),(2,'Boboboi'),(3,'Pokemon');

/*Table structure for table `condition` */

DROP TABLE IF EXISTS `condition`;

CREATE TABLE `condition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `condition` varchar(100) DEFAULT NULL COMMENT 'condition status',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `condition` */

insert  into `condition`(`id`,`condition`) values (1,'Bad'),(2,'Broken'),(3,'Good'),(7,'New'),(8,'Old');

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empId` varchar(11) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `shift` int(11) DEFAULT NULL,
  `tracker_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shift` (`shift`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `employees` */

insert  into `employees`(`id`,`empId`,`firstName`,`lastName`,`created_by`,`created_date`,`modified_by`,`modified_date`,`shift`,`tracker_id`) values (3,'2013-02113','Doe','DJ',NULL,NULL,NULL,NULL,2,0),(4,'2013-02613','Fitzpatrick','Foo',NULL,NULL,NULL,NULL,3,0),(5,'2013-02113','Flynn','Bar',NULL,NULL,NULL,NULL,4,0),(6,'1209-71487','Miguel','De Jesus',NULL,NULL,NULL,NULL,1,0);

/*Table structure for table `history` */

DROP TABLE IF EXISTS `history`;

CREATE TABLE `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `history` */

/*Table structure for table `release` */

DROP TABLE IF EXISTS `release`;

CREATE TABLE `release` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `dev_id` int(11) NOT NULL,
  KEY `id` (`id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `release` */

/*Table structure for table `shifts` */

DROP TABLE IF EXISTS `shifts`;

CREATE TABLE `shifts` (
  `shift_id` int(11) NOT NULL DEFAULT '0',
  `shift_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`shift_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `shifts` */

insert  into `shifts`(`shift_id`,`shift_name`) values (1,'1st Shift'),(2,'2nd Shift'),(3,'3rd Shift'),(4,'4th Shift');

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `status` */

insert  into `status`(`id`,`status`) values (1,'Available'),(2,'On Shelf'),(3,'On Hand'),(4,'Borrowed');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `usertype_id` int(11) DEFAULT NULL COMMENT '1-admin, 2-rm, 2-member',
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usertype_id` (`usertype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`employee_id`,`username`,`password`,`created_by`,`created_date`,`usertype_id`,`modified_by`,`modified_date`) values (1,NULL,'admin','0cc175b9c0f1b6a831c399e269772661',NULL,'2016-09-28',1,NULL,NULL),(2,NULL,'rm','1a1dc91c907325c69271ddf0c944bc72',NULL,NULL,2,NULL,NULL),(3,NULL,'tester','0cc175b9c0f1b6a831c399e269772661',NULL,NULL,3,NULL,NULL),(4,NULL,'Test','098f6bcd4621d373cade4e832627b4f6',NULL,NULL,3,NULL,NULL);

/*Table structure for table `usertypes` */

DROP TABLE IF EXISTS `usertypes`;

CREATE TABLE `usertypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usertype` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `usertypes` */

insert  into `usertypes`(`id`,`usertype`) values (1,'Admin'),(2,'RM'),(3,'Tester');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
