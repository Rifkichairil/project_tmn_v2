-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_tmn
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `absen`
--

DROP TABLE IF EXISTS `absen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `absen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `account_id` int NOT NULL,
  `absen_of_date` timestamp NULL DEFAULT NULL,
  `type` enum('IN','OUT') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_absen_account1_idx` (`account_id`),
  CONSTRAINT `fk_absen_account1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absen`
--

LOCK TABLES `absen` WRITE;
/*!40000 ALTER TABLE `absen` DISABLE KEYS */;
INSERT INTO `absen` VALUES (1,6,'2023-08-27 23:01:44','IN','2023-07-27 23:01:44','2023-07-27 23:01:44',NULL),(2,6,'2023-08-21 23:03:59','OUT','2023-07-27 23:03:59','2023-07-27 23:03:59',NULL),(3,9,'2023-08-04 08:41:00','IN','2023-08-04 08:41:00','2023-08-04 08:41:00',NULL),(4,9,'2023-08-04 08:43:57','OUT','2023-08-04 08:43:57','2023-08-04 08:43:57',NULL),(5,9,'2023-08-04 08:44:13','OUT','2023-08-04 08:44:13','2023-08-04 08:44:13',NULL);
/*!40000 ALTER TABLE `absen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `position_id` bigint NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` int NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_account_position1_idx` (`position_id`),
  CONSTRAINT `fk_account_position1` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,1,'f319ed1d-90e1-4d79-a41c-6d30a28373d4','admin@gmail.com','+6287878038756',99,'$2y$10$Htqvq8X27dyk3uoFXC2QpuAPsGWHUs2aoJzeBsb/akRzM2eFnDb5q',0,'2023-07-27 06:40:00','2023-07-27 11:21:21',NULL),(3,1,'60b0ef01-e03a-4109-a791-eef5cb1ee956','admin2@gmail.com',NULL,99,'$2y$10$Htqvq8X27dyk3uoFXC2QpuAPsGWHUs2aoJzeBsb/akRzM2eFnDb5q',1,'2023-07-27 06:56:06','2023-07-27 06:56:06',NULL),(4,2,'73063f8b-3c5f-4a89-9bcf-f59ce7063b18','karyawan@gmail.com','+6285159729022',1,'$2y$10$Htqvq8X27dyk3uoFXC2QpuAPsGWHUs2aoJzeBsb/akRzM2eFnDb5q',0,'2023-07-27 09:55:33','2023-07-27 09:55:33',NULL),(6,2,'6ef33293-bc33-4e87-9440-b20584883495','karyawan2@gmail.com','+6285159729021',1,'$2y$10$Htqvq8X27dyk3uoFXC2QpuAPsGWHUs2aoJzeBsb/akRzM2eFnDb5q',1,'2023-07-27 09:57:38','2023-07-27 09:57:38',NULL),(8,1,'cdd9b873-fff2-417c-ba85-18493a5e5721','admin.tmn@gmail.com',NULL,99,'$2y$10$NLKE/bkxvnfeStbYuKJJL.AjvY/3SUSIJ6Ghz4NO/V.KZGsaZwkky',1,'2023-08-04 08:38:05','2023-08-04 08:38:05',NULL),(9,2,'db387098-1ba2-4030-9912-45195613575e','karyawan.tmn@gmail.com','+6285159729012',1,'$2y$10$Vtzo3OsaTsmmYtJ/8EKiC.H8Q3LnJburu6RIEwx1HW6v8FEeeWrge',1,'2023-08-04 08:40:26','2023-08-04 08:40:26',NULL);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `identity`
--

DROP TABLE IF EXISTS `identity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `identity` (
  `id` int NOT NULL AUTO_INCREMENT,
  `account_id` int NOT NULL,
  `ktp_number` varchar(25) DEFAULT NULL,
  `npwp_number` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ktp_number_UNIQUE` (`ktp_number`),
  UNIQUE KEY `npwp_number_UNIQUE` (`npwp_number`),
  KEY `fk_identity_account1_idx` (`account_id`),
  CONSTRAINT `fk_identity_account1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identity`
--

LOCK TABLES `identity` WRITE;
/*!40000 ALTER TABLE `identity` DISABLE KEYS */;
INSERT INTO `identity` VALUES (1,1,'1234531290123465','12.333.131.2-312.312','2023-07-27 06:40:00','2023-08-04 06:52:29',NULL),(3,3,NULL,NULL,'2023-07-27 06:56:06','2023-07-27 06:56:06',NULL),(4,4,'1234567890123465','11.111.111.1-111.111','2023-07-27 09:55:33','2023-07-27 09:55:33',NULL),(6,6,'1234567891123465','11.111.111.1-111.112','2023-07-27 09:57:38','2023-07-27 09:57:38',NULL),(8,8,NULL,NULL,'2023-08-04 08:38:05','2023-08-04 08:38:05',NULL),(9,9,'1234531290123234','12.222.222.2-222.233','2023-08-04 08:40:26','2023-08-04 08:40:26',NULL);
/*!40000 ALTER TABLE `identity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `account_id` int NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `place_of_birth` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('LAKI','PEREMPUAN','OTHER') DEFAULT 'OTHER',
  `religion` enum('ISLAM','KRISTEN','KATHOLIK','HINDU','BUDHA','KONGHUCU','OTHER') DEFAULT 'OTHER',
  `address` text,
  `zipcode` char(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_personal_account_idx` (`account_id`),
  CONSTRAINT `fk_personal_account` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,1,'Admin satu','depok','1998-10-03','LAKI','OTHER','jln jln','13130','2023-07-27 06:40:00','2023-08-04 06:52:29',NULL),(3,3,'Testing Masuk 2',NULL,NULL,'OTHER','OTHER',NULL,NULL,'2023-07-27 06:56:06','2023-07-27 06:56:06',NULL),(4,4,'MUHAMMAD RIFKI CHAIRIL','depok','1998-10-03','LAKI','ISLAM','Jalan nangka no 20, beji depok jawabarat','16548','2023-07-27 09:55:33','2023-07-27 09:55:33',NULL),(6,6,'muhammad rifki chairil','depok','1998-10-03','LAKI','ISLAM','Jalan nangka no 20, beji depok jawabarat','12345','2023-07-27 09:57:38','2023-07-27 09:57:38',NULL),(8,8,'ADMIN TMN',NULL,NULL,'OTHER','OTHER',NULL,NULL,'2023-08-04 08:38:05','2023-08-04 08:38:05',NULL),(9,9,'KARYAWAN TMN','depok','2023-08-04','LAKI','ISLAM','Jalan nangka no 20, beji depok jawabarat','16548','2023-08-04 08:40:26','2023-08-04 08:40:26',NULL);
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `positions` (
  `id` bigint NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` VALUES (1,'Admin'),(2,'Karyawan');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-04 22:56:13
