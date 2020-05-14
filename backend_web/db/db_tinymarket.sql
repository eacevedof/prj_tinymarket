/*
SQLyog Community v12.1 (32 bit)
MySQL - 10.4.11-MariaDB-1:10.4.11+maria~bionic : Database - db_tinymarket
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_tinymarket` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_tinymarket`;
-- USE `dbs433055`;

/*Table structure for table `app_order_head` */

DROP TABLE IF EXISTS `app_order_head`;

CREATE TABLE `app_order_head` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_platform` varchar(3) DEFAULT NULL,
  `delete_user` varchar(15) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `cru_csvnote` varchar(500) DEFAULT NULL,
  `is_erpsent` varchar(3) DEFAULT '0',
  `is_enabled` varchar(3) DEFAULT '1',
  `i` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_erp` varchar(25) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `id_user_client` int(11) NOT NULL,
  `id_user_seller` int(11) NOT NULL,
  `total` decimal(10,3) DEFAULT 0.000,
  `status` varchar(25) DEFAULT NULL,
  `notes` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='cabecera de pedidos';

/*Data for the table `app_order_head` */

/*Table structure for table `app_order_lines` */

DROP TABLE IF EXISTS `app_order_lines`;

CREATE TABLE `app_order_lines` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_platform` varchar(3) DEFAULT NULL,
  `delete_user` varchar(15) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `cru_csvnote` varchar(500) DEFAULT NULL,
  `is_erpsent` varchar(3) DEFAULT '0',
  `is_enabled` varchar(3) DEFAULT '1',
  `i` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_erp` varchar(25) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `id_order_head` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `price` decimal(10,3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='lineas de pedido';

/*Data for the table `app_order_lines` */

/*Table structure for table `app_product` */

DROP TABLE IF EXISTS `app_product`;

CREATE TABLE `app_product` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_platform` varchar(3) DEFAULT NULL,
  `delete_user` varchar(15) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `cru_csvnote` varchar(500) DEFAULT NULL,
  `is_erpsent` varchar(3) DEFAULT '0',
  `is_enabled` varchar(3) DEFAULT '1',
  `i` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_erp` varchar(25) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `description_full` varchar(3000) DEFAULT NULL,
  `slug` varchar(75) DEFAULT NULL,
  `units_min` int(5) NOT NULL DEFAULT 1,
  `units_max` int(5) NOT NULL DEFAULT 99999,
  `price_gross` decimal(10,3) DEFAULT 0.000,
  `tax_percent` decimal(10,3) DEFAULT 0.000,
  `price_taxed` decimal(10,3) DEFAULT 0.000,
  `price_sale` decimal(10,3) NOT NULL DEFAULT 0.000,
  `user_id` int(11) NOT NULL COMMENT 'empresa o usuario propietario',
  `order_by` int(11) DEFAULT 100,
  `code_cache` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_product` */

insert  into `app_product`(`processflag`,`insert_platform`,`insert_user`,`insert_date`,`update_platform`,`update_user`,`update_date`,`delete_platform`,`delete_user`,`delete_date`,`cru_csvnote`,`is_erpsent`,`is_enabled`,`i`,`id`,`code_erp`,`description`,`description_full`,`slug`,`units_min`,`units_max`,`price_gross`,`tax_percent`,`price_taxed`,`price_sale`,`user_id`,`order_by`,`code_cache`) values (NULL,'1',NULL,'2020-05-08 10:19:25',NULL,NULL,'2020-05-12 12:15:24',NULL,NULL,NULL,NULL,'0','1',NULL,1,NULL,'Ceviche','The world-known Peruvian “Ceviche” itself! Local Grouper marinated to perfection in lime juice, red onions…',NULL,1,99999,'0.000','0.000','0.000','14.520',1,100,NULL),(NULL,'1',NULL,'2020-05-08 10:19:25',NULL,NULL,'2020-05-12 12:16:26',NULL,NULL,NULL,NULL,'0','1',NULL,2,NULL,'Anticuchos de corazón','Grilled to perfection heart of beef skewers, accompanied with thinly sliced boiled potatoes, covered with…',NULL,1,99999,'0.000','0.000','0.000','18.820',1,100,NULL),(NULL,'1',NULL,'2020-05-08 10:19:25',NULL,NULL,'2020-05-11 19:52:30',NULL,NULL,NULL,NULL,'0','1',NULL,3,NULL,'Pescado a la chorrillada','Grouper fillet whit sauteed onions and soy sauce (Catch of day / Market price) ',NULL,1,99999,'0.000','0.000','0.000','18.820',1,100,NULL),(NULL,'1',NULL,'2020-05-11 19:53:29',NULL,NULL,'2020-05-11 19:53:48',NULL,NULL,NULL,NULL,'0','1',NULL,4,NULL,'Sudado de pescado ','Grouper fillet cooked in fish broth with onion, tomato (Catch of day / Market price)     \r\nSalmon al Grill ',NULL,1,99999,'0.000','0.000','0.000','21.040',1,100,NULL),(NULL,'1',NULL,'2020-05-11 19:55:03',NULL,NULL,'2020-05-11 19:55:03',NULL,NULL,NULL,NULL,'0','1',NULL,5,NULL,'Cau cau de mariscos','Fish and seafood stew cooked with mint leaves and aji amarillo sauce',NULL,1,99999,'0.000','0.000','0.000','21.940',1,100,NULL);

/*Table structure for table `app_product_images` */

DROP TABLE IF EXISTS `app_product_images`;

CREATE TABLE `app_product_images` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_platform` varchar(3) DEFAULT NULL,
  `delete_user` varchar(15) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `cru_csvnote` varchar(500) DEFAULT NULL,
  `is_erpsent` varchar(3) DEFAULT '0',
  `is_enabled` varchar(3) DEFAULT '1',
  `i` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `id_product` int(11) NOT NULL,
  `path_file` varchar(2000) NOT NULL,
  `slug` varchar(75) DEFAULT NULL,
  `order_by` int(11) DEFAULT 100,
  `code_cache` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_product_images` */

/*Table structure for table `app_products_tags` */

DROP TABLE IF EXISTS `app_products_tags`;

CREATE TABLE `app_products_tags` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_platform` varchar(3) DEFAULT NULL,
  `delete_user` varchar(15) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `cru_csvnote` varchar(500) DEFAULT NULL,
  `is_erpsent` varchar(3) DEFAULT '0',
  `is_enabled` varchar(3) DEFAULT '1',
  `i` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) DEFAULT NULL,
  `id_tag` int(11) DEFAULT NULL,
  `code_cache` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_products_tags` */

/*Table structure for table `app_promotion` */

DROP TABLE IF EXISTS `app_promotion`;

CREATE TABLE `app_promotion` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_platform` varchar(3) DEFAULT NULL,
  `delete_user` varchar(15) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `cru_csvnote` varchar(500) DEFAULT NULL,
  `is_erpsent` varchar(3) DEFAULT '0',
  `is_enabled` varchar(3) DEFAULT '1',
  `i` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(250) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  `code_cache` varchar(500) DEFAULT NULL,
  `date_from` datetime DEFAULT NULL,
  `date_to` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_promotion` */

/*Table structure for table `app_promotion_users` */

DROP TABLE IF EXISTS `app_promotion_users`;

CREATE TABLE `app_promotion_users` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_platform` varchar(3) DEFAULT NULL,
  `delete_user` varchar(15) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `cru_csvnote` varchar(500) DEFAULT NULL,
  `is_erpsent` varchar(3) DEFAULT '0',
  `is_enabled` varchar(3) DEFAULT '1',
  `i` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(250) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL COMMENT 'el usuario que se ha apuntado',
  `code` varchar(25) DEFAULT NULL COMMENT 'la clave que llega en el email',
  `date_exec` datetime DEFAULT NULL COMMENT 'cuando se ejecuta la promo',
  `code_cache` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_promotion_users` */

/*Table structure for table `app_tag` */

DROP TABLE IF EXISTS `app_tag`;

CREATE TABLE `app_tag` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_platform` varchar(3) DEFAULT NULL,
  `delete_user` varchar(15) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `cru_csvnote` varchar(500) DEFAULT NULL,
  `is_erpsent` varchar(3) DEFAULT '0',
  `is_enabled` varchar(3) DEFAULT '1',
  `i` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL COMMENT 'la descripcion en slug',
  `order_by` int(5) NOT NULL DEFAULT 100,
  `code_cache` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_tag` */

/*Table structure for table `app_tag_array` */

DROP TABLE IF EXISTS `app_tag_array`;

CREATE TABLE `app_tag_array` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_platform` varchar(3) DEFAULT NULL,
  `delete_user` varchar(15) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `cru_csvnote` varchar(500) DEFAULT NULL,
  `is_erpsent` varchar(3) DEFAULT '0',
  `is_enabled` varchar(3) DEFAULT '1',
  `i` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_erp` varchar(25) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `id_tosave` varchar(25) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `order_by` int(5) NOT NULL DEFAULT 100,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_tag_array` */

/*Table structure for table `base_user` */

DROP TABLE IF EXISTS `base_user`;

CREATE TABLE `base_user` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_platform` varchar(3) DEFAULT NULL,
  `delete_user` varchar(15) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `cru_csvnote` varchar(500) DEFAULT NULL,
  `is_erpsent` varchar(3) DEFAULT '0',
  `is_enabled` varchar(3) DEFAULT '1',
  `i` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_erp` varchar(25) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `geo_location` varchar(500) DEFAULT NULL,
  `id_gender` int(11) DEFAULT NULL,
  `id_nationality` int(11) DEFAULT NULL,
  `id_country` int(11) DEFAULT NULL COMMENT 'app_array.type=country',
  `id_language` int(11) DEFAULT NULL COMMENT 'su idioma de preferencia',
  `path_picture` varchar(100) DEFAULT NULL,
  `id_profile` int(11) DEFAULT NULL COMMENT 'app_array.type=profile: user,maintenaince,system',
  `tokenreset` varchar(250) DEFAULT NULL,
  `log_attempts` int(5) DEFAULT 0,
  `rating` int(11) DEFAULT NULL COMMENT 'la puntuacion',
  `date_validated` varchar(14) DEFAULT NULL COMMENT 'cuando valido su cuenta por email',
  `code_cache` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `base_user_email_uindex` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `base_user` */

insert  into `base_user`(`processflag`,`insert_platform`,`insert_user`,`insert_date`,`update_platform`,`update_user`,`update_date`,`delete_platform`,`delete_user`,`delete_date`,`cru_csvnote`,`is_erpsent`,`is_enabled`,`i`,`id`,`code_erp`,`description`,`email`,`password`,`phone`,`fullname`,`address`,`age`,`geo_location`,`id_gender`,`id_nationality`,`id_country`,`id_language`,`path_picture`,`id_profile`,`tokenreset`,`log_attempts`,`rating`,`date_validated`,`code_cache`) values (NULL,'1',NULL,'2020-05-05 20:33:20',NULL,NULL,'2020-05-05 20:33:20',NULL,NULL,NULL,NULL,'0','1',NULL,1,NULL,NULL,'aa@aa.com','$2y$04$yf.g9VdZ.aQV3fMwr0cQGOP72QkgXp5zqX6qkAdmcF74WQgctyKHa',NULL,'AA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,0,NULL,NULL,NULL),(NULL,'1',NULL,'2020-05-06 09:47:07',NULL,NULL,'2020-05-06 09:47:07',NULL,NULL,NULL,NULL,'0','1',NULL,2,NULL,NULL,'hola@hola.com','$2y$04$mBDCllMenDgX5LkaiKawR.aCftf1u8F7o4AkpVYOqAxCOr.OzAMPK',NULL,'hola',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,0,NULL,NULL,NULL);

/*Table structure for table `base_user_array` */

DROP TABLE IF EXISTS `base_user_array`;

CREATE TABLE `base_user_array` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_platform` varchar(3) DEFAULT NULL,
  `delete_user` varchar(15) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `cru_csvnote` varchar(500) DEFAULT NULL,
  `is_erpsent` varchar(3) DEFAULT '0',
  `is_enabled` varchar(3) DEFAULT '1',
  `i` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_erp` varchar(25) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `id_tosave` varchar(25) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `order_by` int(5) NOT NULL DEFAULT 100,
  `code_cache` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `base_user_array` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`role`,`name`,`surname`,`email`,`password`,`created_at`) values (1,'ROLE_USER','A','af','eacevedof@eaf.com','password','2020-01-05 20:03:31'),(2,'ROLE_USER','B','GH','bgh@eaf.com','password','2020-01-05 20:03:31'),(3,'ROLE_USER','C','JK','cjk@eaf.com','password','2020-01-05 20:03:31'),(4,'ROLE_USER','ttt','iii','fff@yahoo.es','$2y$04$zZutshZqxrzSyTZANM2yBuSC1vTy2Bzgx6LUHnJnQCxDv5nVTwou6','2020-01-06 11:18:49'),(5,'ROLE_USER','ttt','iii','fff@yahoo.es','$2y$04$4RqIIbuL1iFVb93JxqSGgeaK6yS5I8uLvntDN/HLuLfQ7LKYYWpfa','2020-01-06 11:20:42'),(6,'ROLE_USER','aa','bbb','dd@rr.com','$2y$04$VkELnZPxA68IS5ZagUFV..JqxiIMX4jTYX0z9VrBiG7NGZIy3yuSi','2020-01-06 11:30:56'),(7,'ROLE_USER','aa','bb','cc@go.com','$2y$04$x8PqzqiqVxPTh8xL0eBuseB2gmuwj8HHq7VL2cm7i/czx00jS.1Bu','2020-01-06 11:31:52'),(8,'ROLE_USER','aa','bb','cc@go.com','$2y$04$1yhxyY/8ojk0tOZE8iR.huQflqIG2kwUo.TInACawCKCKGpC.9/UC','2020-01-06 11:32:06'),(9,'ROLE_USER','aa','bb','cc@go.com','$2y$04$iSgbxh/4ykNlN11SBjGluOH/WPe.ye37jW8ow9RiSEI4cnsIm1Qbq','2020-01-06 11:35:06'),(10,'ROLE_USER','aa','bb','mmm@ccc.com','$2y$04$RHM3ZZB7qs2HsnMFswdUGeJGZa0p3l.wiR2ao/kvAYzbaAKokeX6m','2020-01-06 11:39:52'),(11,'ROLE_USER','eaf','eaf','eaf@eaf.com','$2y$04$ykFXVDQGK4xJrPgjUn6esuYh4QfoWOTUOYKS3mcyNPjLuZ8ik0yii','2020-01-06 12:36:44'),(12,'ROLE_USER','eaf','eaf','eaf@eaf.com','$2y$04$w4dlNVCGZi5dSp9JOqzu/.TkD8ILNnj6w1kW0fVUn4sb32km/i6pC','2020-01-06 12:37:26'),(13,'ROLE_USER','eaf','eaf','eaf@eaf.com','$2y$04$mxpmrzLVhdho.wDzgPsioejVlfzRCbW23//v51Tr3jrDARlS.roz2','2020-01-06 12:42:26'),(14,'ROLE_USER','aa','bb','cc@go.com','$2y$04$6RjSK4Een6pD8O2OUYgLZOcHYj5JBblPld9ywvxRUm4VIpEWM51Ki','2020-01-06 12:43:04'),(15,'ROLE_USER','aa','bb','cc@mm.c','$2y$04$MhPwYN.V/t7/CoiJ/NY6l.81cMPkzUoCbPZ9cruZUGMZXBuweatoe','2020-01-06 12:59:46'),(16,'ROLE_USER','abb','ddd','rrr@gg.com','$2y$04$Sq/lstjbBvVLW3frp5fxGuyIBMByCi36H0zQPaFQ8klK//bHVNzI6','2020-01-06 13:16:25'),(17,'ROLE_USER','aaa','xxx','ee@mmm.com.99','$2y$04$QGarCa1rGi.2QbXuHf5rGuxj6LmUDwA6lNH2kwPFlvL.vfj1nxQzy','2020-01-06 13:20:06'),(18,'ROLE_USER','agua','mala','ppp@mmm.com','$2y$04$PW8oOTuwbVoIJSN/oKtVA.xGrDa9UgzFftKDUIcZaBAEixTovraJW','2020-01-06 13:20:27'),(19,'ROLE_USER','aa','aa','aa@aa.com','$2y$04$TUze2I6sdud2P.VHf8e20OD/0vOpH14SgPwSGyxsAPTDSkjPZvQtq','2020-01-06 18:59:32'),(20,'ROLE_USER','bb','bb','bb@bb.com','$2y$04$Lh294P3hwKzAuq5OaLbKYOocyHa0zy8ajQvU9xstaqEWYTFlsL226','2020-01-06 19:01:09'),(21,'ROLE_USER','cc','cc','cc@cc.com','$2y$04$N/0ad33YWy5zCYJJmVaruev1nb.VSwrnzVfZS/IYjWywJuMddjrZC','2020-01-06 19:04:47'),(22,'ROLE_USER','xxx','xxx','xxx@xxx.com','$2y$04$zQKx.NScvOoxZNqyh/Vs2e/14hgmbUUqhEm7AvkZGvsmIv/WHUwQm','2020-01-07 20:54:59'),(23,'ROLE_USER','aaNULL','NULL','NULLdd@d.com','$2y$04$Pm.qe7MN.tpF0SRXUTk/pu.asR91/qcuoCBG2NGzsAEam99h4Nmfq','2020-04-29 13:37:24'),(24,'ROLE_USER','aa','aa','aa@aa.com','$2y$04$JRs5y2qb/cF4vzjbLsf9qugvU6XE/hBFo2HgtDeIsaP4JtHNfVd8y','2020-04-29 14:46:15'),(25,'ROLE_USER','xx','rr','565@a.com','$2y$04$FBLOyQuauqH5PCEKau6daO0.aG9u3V8.HnRlnTh/UiUbHvHEshQ7O','2020-05-04 20:53:39');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
