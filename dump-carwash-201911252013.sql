-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: carwash
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.8-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'barservice','bistro','2017-03-11 09:07:06','0000-00-00 00:00:00'),(2,'Regular Size Car','vehicle','2017-03-16 18:38:39','0000-00-00 00:00:00'),(3,'Medium Size Cargo','vehicle','2017-03-11 09:07:06',NULL),(4,'Compact SUV','vehicle','2017-03-11 09:07:06',NULL),(5,'Minivan','vehicle','2017-03-11 09:07:06',NULL),(6,'Pickup Truck','vehicle','2017-03-11 09:07:06',NULL),(7,'Cargo Truck','vehicle','2017-03-11 09:07:06',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_plate` varchar(255) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (12,'ghutte',NULL,'2017-04-07 09:14:47','2017-04-07 09:14:47'),(13,'sdf',NULL,'2017-04-07 11:13:34','2017-04-07 11:13:34'),(14,'asd',NULL,'2017-04-07 11:14:21','2017-04-07 11:14:21'),(15,'tr123',NULL,'2017-04-07 18:29:47','2017-04-07 18:29:47'),(16,'TR11ASD',NULL,'2017-04-07 18:31:42','2017-04-07 18:31:42'),(17,'TR56GHJ',NULL,'2017-04-07 18:32:34','2017-04-07 18:32:34'),(18,'tr24uiy',NULL,'2017-04-07 18:55:53','2017-04-07 18:55:53'),(19,'tr123asd',NULL,'2017-04-07 19:27:47','2017-04-07 19:27:47'),(20,'tr34jkl',NULL,'2017-04-07 19:42:00','2017-04-07 19:42:00'),(21,'bv56yrr',NULL,'2017-04-07 19:42:11','2017-04-07 19:42:11'),(22,'gj56uyi',NULL,'2017-04-11 18:18:02','2017-04-11 18:18:02'),(23,'asdsag',NULL,'2017-04-12 14:41:18','2017-04-12 14:41:18'),(24,'kj78iop',NULL,'2017-04-12 15:15:07','2017-04-12 15:15:07');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'Ion','2017-04-07 18:31:20','2017-04-07 18:31:20'),(2,'Salam','2017-04-12 10:54:32','2017-04-12 10:54:32');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_service`
--

DROP TABLE IF EXISTS `order_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_service` (
  `order_id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  KEY `order_service_orders_FK` (`order_id`),
  KEY `order_service_services_FK` (`service_id`),
  CONSTRAINT `order_service_orders_FK` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `order_service_services_FK` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_service`
--

LOCK TABLES `order_service` WRITE;
/*!40000 ALTER TABLE `order_service` DISABLE KEYS */;
INSERT INTO `order_service` VALUES (7,2,1,'2017-04-11 18:18:03',NULL),(8,3,1,'2017-04-12 14:41:18',NULL),(8,10,2,'2017-04-12 14:41:18',NULL),(9,2,1,'2017-04-12 15:15:07',NULL),(9,3,1,'2017-04-12 15:15:07',NULL),(9,6,2,'2017-04-12 15:15:07',NULL);
/*!40000 ALTER TABLE `order_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `deleted` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_customer_id` (`customer_id`),
  KEY `fk_employee_id` (`employee_id`),
  CONSTRAINT `fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `fk_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (7,22,1,'S-a razgandit','2017-04-11 18:18:02','2017-04-11 19:09:11'),(8,23,1,'S-a cacat','2017-04-12 14:41:18','2017-04-12 15:16:18'),(9,24,2,NULL,'2017-04-12 15:15:07','2017-04-12 15:15:07');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_IDX` (`email`),
  KEY `password_resets_token_IDX` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categories_id` (`category_id`),
  CONSTRAINT `fk_categories_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (2,'Interior',2,15.00,'2017-03-11 09:10:40','0000-00-00 00:00:00'),(3,'Exterior',2,15.00,'2017-03-11 09:10:40',NULL),(4,'Interior + Exterior',2,30.00,'2017-03-11 09:10:40',NULL),(5,'Degresare',2,70.00,'2017-03-11 09:10:40',NULL),(6,'apa plata',1,3.00,'2017-03-11 09:10:40',NULL),(7,'fanta',1,4.50,'2017-03-11 09:10:40',NULL),(8,'Exterior',4,15.00,'2017-03-27 07:58:19',NULL),(9,'Interior',4,20.00,'2017-03-27 18:15:57',NULL),(10,'Coca',1,2.20,'2017-04-12 14:40:19',NULL);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_UN` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@carwash.ro','$2y$10$z8Z2nWoLjmg6apTARVfCH.4eP4IoTCq.HgAA/b5bgNACu0Y/F/c6a','pvUufR1jqpY2sruu7khjcHzCglRnl4MfjTJ53aIQGcFD3VtcQd0XzDDzpTV6',NULL,'2019-11-25 17:48:59'),(2,'user','user@carwash.ro','$2y$10$CNEDy8C/ja3wyWDwAke/cO5CcvPirn.zbdMMik49GAMf9/DXGOj.m','IcRhIzoW4ZAcuWiqkmvWdZ6Ah3fkRZuYcAd2nUr9s9XQFJawHoQ8PrShJuZY',NULL,'2019-11-25 17:50:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicles_categories_FK` (`category_id`),
  CONSTRAINT `vehicles_categories_FK` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES (1,'Regular Size Car','2017-03-11 09:11:13','0000-00-00 00:00:00',2,'cbs-vehicle-icon-small-car'),(2,'Medium Size Car','2017-03-11 09:11:13','0000-00-00 00:00:00',3,'cbs-vehicle-icon-car-mid-size'),(3,'Compact SUV','2017-03-11 09:11:13',NULL,4,'cbs-vehicle-icon-suv'),(4,'Minivan','2017-03-11 09:11:13',NULL,5,'cbs-vehicle-icon-minivan'),(5,'Pickup Truck','2017-03-11 09:11:13',NULL,6,'cbs-vehicle-icon-pickup'),(6,'Cargo Truck','2017-03-11 09:11:13',NULL,7,'cbs-vehicle-icon-truck-mid-size');
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'carwash'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-25 20:13:17
