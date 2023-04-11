-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: test
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bet_events`
--

DROP TABLE IF EXISTS `bet_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bet_events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bet_id` int NOT NULL,
  `event_id` int NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bet_events`
--

LOCK TABLES `bet_events` WRITE;
/*!40000 ALTER TABLE `bet_events` DISABLE KEYS */;
INSERT INTO `bet_events` VALUES (1,4,6,'Widzew Łódź','2023-01-28 16:43:42','2023-01-28 16:43:42'),(2,7,8,'Real Madryt','2023-01-28 16:43:42','2023-01-28 16:43:42'),(3,5,6,'Widzew Łódź','2023-01-28 16:43:42','2023-01-28 16:43:42'),(4,4,9,'Portugalia','2023-01-28 16:43:42','2023-01-28 16:43:42'),(5,8,5,'Widzew Łódź','2023-01-28 16:43:42','2023-01-28 16:43:42'),(6,10,10,'Widzew Łódź','2023-01-28 16:43:42','2023-01-28 16:43:42'),(7,9,7,'Widzew Łódź','2023-01-28 16:43:42','2023-01-28 16:43:42'),(8,4,8,'Tak','2023-01-28 16:43:42','2023-01-28 16:43:42'),(9,4,9,'Niemcy','2023-01-28 16:43:42','2023-01-28 16:43:42'),(10,9,5,'Niemcy','2023-01-28 16:43:42','2023-01-28 16:43:42'),(11,2,7,'Real Madryt','2023-01-28 16:43:42','2023-01-28 16:43:42'),(12,10,4,'Tak','2023-01-28 16:43:42','2023-01-28 16:43:42'),(13,2,9,'Portugalia','2023-01-28 16:43:42','2023-01-28 16:43:42'),(14,10,8,'Polska','2023-01-28 16:43:42','2023-01-28 16:43:42'),(15,9,9,'Nie','2023-01-28 16:43:42','2023-01-28 16:43:42'),(16,9,5,'Nie','2023-01-28 16:43:42','2023-01-28 16:43:42'),(17,9,9,'Niemcy','2023-01-28 16:43:42','2023-01-28 16:43:42'),(18,1,5,'Portugalia','2023-01-28 16:43:42','2023-01-28 16:43:42'),(19,9,10,'Real Madryt','2023-01-28 16:43:42','2023-01-28 16:43:42'),(20,2,3,'Polska','2023-01-28 16:43:42','2023-01-28 16:43:42');
/*!40000 ALTER TABLE `bet_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bets`
--

DROP TABLE IF EXISTS `bets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stake` double NOT NULL,
  `total_odd` double NOT NULL,
  `status` int NOT NULL,
  `bet_result` int NOT NULL,
  `win_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bets`
--

LOCK TABLES `bets` WRITE;
/*!40000 ALTER TABLE `bets` DISABLE KEYS */;
INSERT INTO `bets` VALUES (1,3,'2023-01-26',420.52,84.89,0,0,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(2,4,'2023-02-01',193.46,37.39,0,0,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(3,2,'2023-02-04',452.47,17.38,1,0,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(4,8,'2023-01-26',847.38,13.8,1,0,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(5,10,'2023-01-31',675.68,26.43,1,2,15179.48904,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(6,9,'2023-01-29',988.92,90.25,0,0,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(7,8,'2023-02-04',981.19,61.71,0,0,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(8,2,'2023-02-02',244.04,31.61,1,2,6556.98874,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(9,10,'2023-01-31',375.38,10.88,1,0,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(10,8,'2023-01-27',481.18,88.19,1,2,36069.97457,'2023-01-28 16:43:42','2023-01-28 16:43:42');
/*!40000 ALTER TABLE `bets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blik_codes`
--

DROP TABLE IF EXISTS `blik_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blik_codes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blik_codes`
--

LOCK TABLES `blik_codes` WRITE;
/*!40000 ALTER TABLE `blik_codes` DISABLE KEYS */;
INSERT INTO `blik_codes` VALUES (1,'308396','2023-01-28 16:43:42','2023-01-28 16:43:42'),(2,'503623','2023-01-28 16:43:42','2023-01-28 16:43:42'),(3,'265187','2023-01-28 16:43:42','2023-01-28 16:43:42'),(4,'936660','2023-01-28 16:43:42','2023-01-28 16:43:42'),(5,'004083','2023-01-28 16:43:42','2023-01-28 16:43:42'),(6,'276549','2023-01-28 16:43:42','2023-01-28 16:43:42'),(7,'804179','2023-01-28 16:43:42','2023-01-28 16:43:42'),(8,'773335','2023-01-28 16:43:42','2023-01-28 16:43:42'),(9,'711575','2023-01-28 16:43:42','2023-01-28 16:43:42'),(10,'902637','2023-01-28 16:43:42','2023-01-28 16:43:42');
/*!40000 ALTER TABLE `blik_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `opponent_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opponent_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discipline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `league` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `round` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Southampton','Tottenham Hotspur','2023-01-22','Piłka Nożna','02:43:00','Europe/Astrakhan','Ekstraklasa','8','live','4:1','2023-01-28 16:43:42','2023-01-28 16:43:42'),(2,'Manchester United','Tottenham Hotspur','2023-02-03','E-sport','04:16:00','Africa/Niamey','Lique 1','1/8 Final','upcoming','1:10','2023-01-28 16:43:42','2023-01-28 16:43:42'),(3,'Manchester United','Manchester City','2023-01-30','Dart','03:36:00','America/Cuiaba','Ekstraklasa','8','ended','0:9','2023-01-28 16:43:42','2023-01-28 16:43:42'),(4,'Manchester United','Manchester City','2023-02-03','Dart','02:58:00','Africa/Ouagadougou','Bundesliga','Semi-Final','live','9:2','2023-01-28 16:43:42','2023-01-28 16:43:42'),(5,'Tottenham Hotspur','Newcastle United','2023-02-03','Koszykówka','20:41:00','America/Vancouver','Lique 1','1','upcoming','6:10','2023-01-28 16:43:42','2023-01-28 16:43:42'),(6,'Southampton','Newcastle United','2023-02-03','Piłka Nożna','17:36:00','America/Managua','Bundesliga','6','upcoming','8:9','2023-01-28 16:43:42','2023-01-28 16:43:42'),(7,'Newcastle United','Manchester United','2023-01-25','E-sport','09:57:00','America/Managua','Bundesliga','9','ended','7:9','2023-01-28 16:43:42','2023-01-28 16:43:42'),(8,'Tottenham Hotspur','Newcastle United','2023-01-24','Piłka Ręczna','15:50:00','Atlantic/South_Georgia','Ekstraklasa','6','ended','1:2','2023-01-28 16:43:42','2023-01-28 16:43:42'),(9,'Manchester United','Manchester City','2023-02-01','Koszykówka','13:59:00','Asia/Yakutsk','Ekstraklasa','1/8 Final','upcoming','6:5','2023-01-28 16:43:42','2023-01-28 16:43:42'),(10,'Nottingham Forest','Newcastle United','2023-02-01','Siatkówka','15:56:00','Australia/Lord_Howe','LaLiga','8','live','5:2','2023-01-28 16:43:42','2023-01-28 16:43:42');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_01_08_104417_create_premiums_table',1),(6,'2023_01_08_105019_create_events_table',1),(7,'2023_01_08_105454_create_odds_table',1),(8,'2023_01_08_105842_create_specials_table',1),(9,'2023_01_11_140011_create_blik_codes_table',1),(10,'2023_01_11_142420_create_tests_table',1),(11,'2023_01_11_173825_create_bets_table',1),(12,'2023_01_11_194743_make_bet_events_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odds`
--

DROP TABLE IF EXISTS `odds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `odds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL,
  `win_op_1` double NOT NULL,
  `win_op_2` double NOT NULL,
  `sum` double NOT NULL,
  `is_special` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odds`
--

LOCK TABLES `odds` WRITE;
/*!40000 ALTER TABLE `odds` DISABLE KEYS */;
INSERT INTO `odds` VALUES (1,1,6.66,50,56.66,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(2,2,1.63,14.28,15.91,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(3,3,1.42,4,5.42,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(4,4,1.28,5.26,6.54,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(5,5,5,2.22,7.22,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(6,6,1.56,2.94,4.5,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(7,7,5.26,2.27,7.53,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(8,8,5.26,4.16,9.42,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(9,9,1.36,16.66,18.02,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(10,10,14.28,2.22,16.5,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(11,1,14.28,6.66,20.94,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(12,2,2.7,2.85,5.55,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(13,3,1.69,7.69,9.38,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(14,4,1.31,10,11.31,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(15,5,3.33,14.28,17.61,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(16,6,12.5,14.28,26.78,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(17,7,1.47,3.33,4.8,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(18,8,2.38,2.77,5.15,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(19,9,1.25,7.69,8.94,0,'2023-01-28 16:43:42','2023-01-28 16:43:42'),(20,10,3.57,2.77,6.34,0,'2023-01-28 16:43:42','2023-01-28 16:43:42');
/*!40000 ALTER TABLE `odds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `premiums`
--

DROP TABLE IF EXISTS `premiums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `premiums` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `scratches_left` int NOT NULL,
  `scratchcard_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `expiration_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harakiried` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `premiums`
--

LOCK TABLES `premiums` WRITE;
/*!40000 ALTER TABLE `premiums` DISABLE KEYS */;
INSERT INTO `premiums` VALUES (1,1,'231432211',1,'2023-02-02',0,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(2,2,'331244134',3,'2023-02-03',1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(3,0,'232144222',5,'2023-01-30',1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(4,0,'232434143',7,'2023-01-29',1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(5,3,'421441123',9,'2023-02-04',1,'2023-01-28 16:43:41','2023-01-28 16:43:41');
/*!40000 ALTER TABLE `premiums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `special_events`
--

DROP TABLE IF EXISTS `special_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `special_events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `special_events`
--

LOCK TABLES `special_events` WRITE;
/*!40000 ALTER TABLE `special_events` DISABLE KEYS */;
INSERT INTO `special_events` VALUES (1,'Czy w przyszłym roku zostanie ogłoszony nowy konkurs literacki dla młodych pisarzy?','Tak','Nie','Tak','2023-01-28 16:43:41','2023-01-28 16:43:41'),(2,'Czy w przyszłym roku zostanie ogłoszony nowy konkurs literacki dla młodych pisarzy?','Tak','Nie','Tak','2023-01-28 16:43:41','2023-01-28 16:43:41'),(3,'Czy w przyszłym roku odbędzie się konferencja dotycząca nowych technologii w branży IT?','Tak','Nie','Tak','2023-01-28 16:43:41','2023-01-28 16:43:41'),(4,'Czy w przyszłym roku zostanie ogłoszony nowy konkurs literacki dla młodych pisarzy?','Tak','Nie','Nie','2023-01-28 16:43:41','2023-01-28 16:43:41'),(5,'Czy w przyszłym roku zostanie ogłoszony nowy budżet Unii Europejskiej?','Tak','Nie','Tak','2023-01-28 16:43:41','2023-01-28 16:43:41'),(6,'Czy w przyszłym roku zostanie wprowadzony nowy model samochodu marki Tesla?','Tak','Nie','Nie','2023-01-28 16:43:41','2023-01-28 16:43:41'),(7,'Czy w przyszłym roku zostanie ogłoszony nowy budżet Unii Europejskiej?','Tak','Nie','Nie','2023-01-28 16:43:41','2023-01-28 16:43:41'),(8,'Czy w przyszłym roku odbędzie się nowa edycja festiwalu filmowego w Cannes?','Tak','Nie','Tak','2023-01-28 16:43:41','2023-01-28 16:43:41'),(9,'Czy w przyszłym roku zostanie ogłoszony nowy konkurs literacki dla młodych pisarzy?','Tak','Nie','Tak','2023-01-28 16:43:41','2023-01-28 16:43:41'),(10,'Czy w przyszłym roku zostanie wprowadzony nowy model samochodu marki Tesla?','Tak','Nie','Tak','2023-01-28 16:43:41','2023-01-28 16:43:41');
/*!40000 ALTER TABLE `special_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposit` double NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nickname_unique` (`nickname`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_number_unique` (`phone_number`),
  UNIQUE KEY `users_person_number_unique` (`person_number`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ova','Padberg','$2y$10$Bjz295Wy5DP/wowhhkRvn.H2tm30j4eCzZBVqLffHjrarIQW7cr5y','Ova0','green.anjali@krajcik.org','+48985863187','01070812485',100,1,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(2,'Berry','Gorczany','$2y$10$JFm2ke2jd9E1t0SBk9rIwugJcHF3MKZF49Dd47w7mOU5Tdfg39.wC','Berry1','lourdes.adams@yahoo.com','+48273685788','01070867600',101,0,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(3,'Elouise','Zemlak','$2y$10$2xdJVrN/n0iXXbL4QF4BSuiwBQnHwek6V7i6yxmpvXtNcSfjIBrhe','Elouise2','serenity05@harvey.com','+48397876265','01070894713',102,1,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(4,'Oliver','Spinka','$2y$10$OaP5rs4.SOdD.DuHcjtE8.ZGtFMEnT04Cy47OGFB6h0IGZ9BiA4bi','Oliver3','miles.schaefer@ratke.net','+48433473328','01070865464',103,0,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(5,'Coty','Cummerata','$2y$10$rArh9iAHFdUJAoWab7TbdOFxGcRPe4Zmelwl7pt6aMT4ENU9RBTRC','Coty4','marty.walker@white.com','+48660724204','01070897931',104,1,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(6,'Vada','Ritchie','$2y$10$N5c/KTPM42jA0.Xui0Zon.smfZzvw7.TZ1SkLmhqFJeCz69Ctt4BC','Vada5','erik.murphy@gmail.com','+48970771596','01070853047',105,0,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(7,'Lorenz','Emmerich','$2y$10$i3Kdj2oF4WyELHGagnRc9.PkQf6UL4V3f2qjLIstjbgw46Uj3oDOK','Lorenz6','rleffler@johnson.com','+48338562029','01070844675',106,1,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(8,'Kelley','Kuhn','$2y$10$Gifngxh7yuzrrkHJjTxXS.CKxYp/2v4ju/wZduAqpRU8NiQIW8B/u','Kelley7','vschaefer@krajcik.com','+48432428970','01070857104',107,0,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(9,'Cielo','Kiehn','$2y$10$Tg2xfJLHj/RsW6y2cKl70..Ti4cIq.Bdv02Ymx3Zan/Dse.4IIuvm','Cielo8','jwisozk@gmail.com','+48943229839','01070863818',108,1,1,'2023-01-28 16:43:41','2023-01-28 16:43:41'),(10,'Frederik','Sawayn','$2y$10$Lsncv4ez6Q2HfoNwKw.3fejzcYr.cpPn9iw/pT0b2P2h26shUpRtG','Frederik9','celestino55@ratke.com','+48146570278','01070816970',109,0,1,'2023-01-28 16:43:41','2023-01-28 16:43:41');
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

-- Dump completed on 2023-01-28 17:43:45
