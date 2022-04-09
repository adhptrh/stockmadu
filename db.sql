-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: stockmadu
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `outlets`
--

DROP TABLE IF EXISTS `outlets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outlets` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `latitude` decimal(10,8) NOT NULL DEFAULT 0.00000000,
  `longitude` decimal(11,8) NOT NULL DEFAULT 0.00000000,
  `photo` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Create Time',
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Update Time',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `outlets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='newTable';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outlets`
--

LOCK TABLES `outlets` WRITE;
/*!40000 ALTER TABLE `outlets` DISABLE KEYS */;
INSERT INTO `outlets` VALUES (1,'Alfa','awdsdaw',0.51670000,101.44170000,'1649403002_64a955ed7e44aa301cd4.jpeg',5,'2022-04-04 19:55:57','2022-04-09 02:31:15'),(2,'Bravo','awdawd',0.51670000,101.44170000,'1649459097_eb1271f6ebaeb6dd1506.png',5,'2022-04-04 19:57:54','2022-04-08 18:04:57'),(3,'Charlie','awdawd',0.51670000,101.44170000,'1649449577_ea8a7ea88956069513b7.jpeg',6,'2022-04-04 19:58:12','2022-04-08 15:26:17'),(11,'Gamma','Jl Meranti',0.51670000,101.44170000,'1649366828_02df4cb6fe351e9ec4fd.jpeg',5,'2022-04-07 06:43:32','2022-04-09 02:31:15');
/*!40000 ALTER TABLE `outlets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Create Time',
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Update Time',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='newTable';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Madu NZ Nafiza 1 KG','2022-04-04 19:58:30','2022-04-08 12:49:35'),(2,'Madu NZ Nafiza 700 GR','2022-04-04 19:58:36','2022-04-08 12:49:50'),(3,'Madu NZ Nafiza 350 GR','2022-04-06 05:26:06','2022-04-08 12:50:03'),(4,'Madu Sarang NZ Nafiza 500 GR','2022-04-05 18:22:52','2022-04-08 12:50:26'),(13,'Madu Sarang NZ Nafiza 250 GR','2022-04-08 05:50:56','2022-04-09 01:28:28');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `product_id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Create Time',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Update Time',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `outlet_id` (`outlet_id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='newTable';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,1,1,4,'2022-04-04 19:59:19','2022-04-06 06:00:23'),(3,1,1,-2,'2022-04-04 20:03:03','2022-04-04 20:03:03'),(4,2,1,5,'2022-04-06 05:56:56','2022-04-06 05:56:56'),(5,2,2,10,'2022-02-04 05:56:56','2022-04-06 05:58:04'),(6,2,2,-4,'2022-02-06 05:57:20','2022-04-06 05:58:15'),(7,2,2,-1,'2022-04-06 05:58:29','2022-04-06 05:58:29'),(8,1,1,-1,'2022-03-06 05:58:29','2022-04-06 05:59:54'),(9,1,1,-1,'2022-01-06 06:00:29','2022-04-06 06:00:36'),(10,2,1,1,'2022-04-07 20:23:01','2022-04-07 20:23:01'),(11,2,1,-1,'2022-04-07 20:23:55','2022-04-07 20:23:55'),(12,1,1,50,'2022-04-08 06:26:58','2022-04-08 06:26:58'),(13,1,1,1,'2022-04-08 06:27:27','2022-04-08 06:27:27'),(14,1,1,-15,'2022-04-08 07:15:44','2022-04-08 07:15:44'),(15,1,11,25,'2022-04-08 07:24:57','2022-04-08 07:24:57'),(16,1,11,-3,'2022-04-08 18:36:59','2022-04-08 18:36:59'),(17,1,11,-1,'2022-04-08 18:38:17','2022-04-08 18:38:17'),(18,1,11,-2,'2022-04-08 18:38:55','2022-04-08 18:38:55'),(19,13,3,24,'2022-04-08 18:39:37','2022-04-08 18:39:37'),(20,13,3,-15,'2022-04-08 18:41:04','2022-04-08 18:41:04');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Create Time',
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Update Time',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='newTable';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'owner','$2y$10$S96tbjXmqo7nSgUCS8sII.B74XZTW1BpDqM/8UW6YRF3ciuXxz1Oi','owner','2022-04-04 19:54:30','2022-04-09 01:28:14'),(4,'admin','$2y$10$AHJPa4pO88jbRxEJxuLwkuOedYD3/Z6ixhqfOi/bQSESZV48uS1Y.','admin','2022-04-04 19:54:44','2022-04-06 14:37:54'),(5,'sales1','$2y$10$gSRVbSCXQCYaT1vrBbFXrOGjLvpOe5qF5/bhpRf3vtMW8bDpnqetq','sales','2022-04-04 19:54:57','2022-04-07 01:02:28'),(6,'sales2','$2y$10$gSRVbSCXQCYaT1vrBbFXrOGjLvpOe5qF5/bhpRf3vtMW8bDpnqetq','sales','2022-04-04 19:55:09','2022-04-09 13:40:46'),(8,'testing','$2y$10$OJrSRvn.L0AAn/I.t71MpuK0Ool1m076NdWXTDYuMKVh4LmG9IpXq','sales','2022-04-08 18:29:06','2022-04-09 01:35:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-09 13:48:12
