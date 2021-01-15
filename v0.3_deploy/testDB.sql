-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: testDB
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.3

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
-- Table structure for table `catalogs`
--

DROP TABLE IF EXISTS `catalogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalogs` (
  `catalog_id` int DEFAULT NULL,
  `name` tinytext,
  KEY `idx_catalogs_catalog_id` (`catalog_id`),
  FULLTEXT KEY `idx_catalogs_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogs`
--

LOCK TABLES `catalogs` WRITE;
/*!40000 ALTER TABLE `catalogs` DISABLE KEYS */;
INSERT INTO `catalogs` VALUES (1,'Видеокарты'),(3,'Материнские платы'),(4,'Жестки Диски'),(5,'Память \"RAM\"'),(6,'Переферия'),(2,'Процессоры'),(7,'Звуковые платы');
/*!40000 ALTER TABLE `catalogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` tinytext,
  `last_name` tinytext,
  `numberphone` varchar(20) DEFAULT NULL,
  `email` tinytext,
  `data` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Valerii','D','+48729381514','le.legioner@gmail.com','24.12.2020 12:49:00'),(2,'Ivan','Pupkin','555-55-55','mail@mail','24.12.2020 15:37:38'),(3,'Valerii','Dubkov','+48729381514','le.legioner@gmail.com','24.12.2020 15:37:44'),(5,'Valerii','Valerii','+48729381514','le.legioner@gmail.com','24.12.2020 17:46:55'),(6,'Dubkov','Valerii','+48729381514','le.legioner@gmail.com','24.12.2020 17:48:01'),(7,'Ivan','Pupkin','555-55-55','mail@mail','27.12.2020 12:55:30'),(8,'Dubkov','Valerii','+48729381514','le.legioner@gmail.com','27.12.2020 12:55:43'),(9,'Ivan','Pupkin','555-55-55','mail@mail','27.12.2020 22:21:56'),(10,'Ivan','Pupkin','555-55-55','mail@mail','28.12.2020 14:20:37'),(11,'Ivan','Pupkin','555-55-55','mail@mail','28.12.2020 14:21:05'),(12,'Valerii','Dundukov','+48729381514','le.legioner@gmail.com','28.12.2020 17:37:16'),(13,'Ivan','Pupkin','555-55-55','mail@mail','28.12.2020 17:45:48'),(14,'Ivan','Pupkin','555-55-55','mail@mail','29.12.2020 11:59:54'),(15,'Ivan','Pupkin','555-55-55','mail@mail','29.12.2020 12:05:10'),(16,'Alla','Lukash','+789095556','56778@mail.ru','29.12.2020 12:06:42');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customersNB`
--

DROP TABLE IF EXISTS `customersNB`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customersNB` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `first_name` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `customersNB_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `productsNB` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customersNB`
--

LOCK TABLES `customersNB` WRITE;
/*!40000 ALTER TABLE `customersNB` DISABLE KEYS */;
INSERT INTO `customersNB` VALUES (1,1,'Valerii','Dubkov','686352633','mail@mail','2028-12-20 00:00:00'),(2,1,'Valerii','Dubkov','380686352633','mail@mail','2028-12-20 00:00:00'),(3,2,'Misha','Larionow','445','mail@mail','2012-11-20 00:00:00'),(4,1,'John','Johnson','102','mail@mail',NULL);
/*!40000 ALTER TABLE `customersNB` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custommersS`
--

DROP TABLE IF EXISTS `custommersS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custommersS` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` tinytext,
  `last_name` tinytext,
  `numberphone` int DEFAULT NULL,
  `email` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custommersS`
--

LOCK TABLES `custommersS` WRITE;
/*!40000 ALTER TABLE `custommersS` DISABLE KEYS */;
/*!40000 ALTER TABLE `custommersS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `name`
--

DROP TABLE IF EXISTS `name`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `name` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `name`
--

LOCK TABLES `name` WRITE;
/*!40000 ALTER TABLE `name` DISABLE KEYS */;
/*!40000 ALTER TABLE `name` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `news_id` int NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `putdate` datetime NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Новый день','2020-12-25 12:13:44');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_contents`
--

DROP TABLE IF EXISTS `news_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news_contents` (
  `content_id` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `news_id` int NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_contents`
--

LOCK TABLES `news_contents` WRITE;
/*!40000 ALTER TABLE `news_contents` DISABLE KEYS */;
INSERT INTO `news_contents` VALUES (1,'Народный календарь, приметы и фольклор Руси\r\nСпиридон Солнцеворот.\r\n\r\nПосле Спиридона день хоть на воробьиный носок, но прибавится.\r\nКак день прибавляется, на земле воздух холодеет.\r\nКоли воробьи вдруг начинают собирать пух и перья и тащат их в свои гнёзда — к сильным морозам.\r\nОткуда ветер на Спиридона, оттуда же будет дуть до Сороков (22 марта).\r\nЕсли на Спиридона светит солнце, то дни на Святках (с 7 января по 19 января) будут ясными.\r\nКоли солнце начинает светить с самого утра — к ясному Новому году.\r\nНа Спиридона-солнцеворота медведь в берлоге поворачивается на другой бок, а корова на солнышке бок погреет.\r\nЗакармливают кур гречихой из правого рукава, чтобы раньше неслись.\r\nСадовники встряхивают яблони, приговаривая: «Спиридоньев день, подымайся вверх!».\r\nВзрослым запрещалось на Спиридона работать.\r\nНарезали вишнёвых веточек и ставили их в горшок на покуцти (в переднем углу) и каждый день поливали: коли они зацветали на Рождество (православное), то в следующем году ожидали добрый урожай на садовые плоды[4].',1);
/*!40000 ALTER TABLE `news_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productsNB`
--

DROP TABLE IF EXISTS `productsNB`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productsNB` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productsNB`
--

LOCK TABLES `productsNB` WRITE;
/*!40000 ALTER TABLE `productsNB` DISABLE KEYS */;
INSERT INTO `productsNB` VALUES (1,'tires',10,'GoodYears','2008-01-20'),(2,'tires',100,'Dunlop','2008-01-19'),(3,'tires',100,'Pirelli',NULL);
/*!40000 ALTER TABLE `productsNB` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'testDB'
--

--
-- Dumping routines for database 'testDB'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-29 12:07:44
