/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 5.6.25 : Database - laravel_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laravel_db` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `laravel_db`;

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `blogs` */

insert  into `blogs`(`id`,`title`,`description`,`created_at`,`updated_at`) values (1,'test 1','des 1','2016-11-20 17:44:40',NULL),(4,'test4','44','2016-11-23 16:28:55','2016-11-23 16:28:55'),(6,'test 5 new','55 new','2016-11-23 16:30:12','2016-11-23 16:44:01'),(7,'Meng','love meng','2016-12-01 14:45:01','2016-12-01 14:45:01'),(8,'Veng','Kompong','2016-12-01 14:45:14','2016-12-01 14:45:14'),(9,'Veasna','Phnom','2016-12-01 14:45:35','2016-12-01 14:45:35'),(10,'Love','Like','2016-12-01 14:57:08','2016-12-01 14:57:08'),(11,'Hello','and hi','2016-12-01 14:57:39','2016-12-01 14:57:39'),(12,'Neag','Nog','2016-12-01 14:57:47','2016-12-01 14:57:47');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_11_20_104229_create_blogs_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `sku` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `filename` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`sku`,`updated_at`,`created_at`,`filename`) values (1,'c','21','2016-12-25 04:35:01','2016-12-25 04:35:01',NULL),(2,'c','323','2016-12-25 04:35:58','2016-12-25 04:35:58',NULL),(3,'','','2016-12-25 04:39:29','2016-12-25 04:39:29',NULL),(4,'','','2016-12-25 04:39:48','2016-12-25 04:39:48',NULL),(5,'eee','2222','2016-12-25 04:45:19','2016-12-25 04:45:19','docx'),(6,'3333','aaaa','2016-12-25 04:45:57','2016-12-25 04:45:57','jpg'),(7,'a','awef','2016-12-25 04:54:07','2016-12-25 04:54:07','1482641647.txt'),(8,'Chest','3433','2016-12-25 04:56:58','2016-12-25 04:56:58','1482641818.txt'),(9,'ab','3232','2016-12-25 05:00:30','2016-12-25 05:00:30','webtur.txt'),(10,'lonu','5678','2017-02-04 15:35:36','2017-02-04 15:35:36','Capture.JPG'),(11,'lonu','5678','2017-02-04 15:35:43','2017-02-04 15:35:43','Capture.JPG'),(12,'','','2017-02-04 15:59:54','2017-02-04 15:59:54','fb.txt'),(13,'','','2017-02-05 03:15:42','2017-02-05 03:15:42','control.txt');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
