-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: 127.0.0.1    Database: red_belt_d
-- ------------------------------------------------------
-- Server version	5.5.38

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
-- Table structure for table `fave_quote`
--

DROP TABLE IF EXISTS `fave_quote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fave_quote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fave_quote`
--

LOCK TABLES `fave_quote` WRITE;
/*!40000 ALTER TABLE `fave_quote` DISABLE KEYS */;
INSERT INTO `fave_quote` VALUES (6,10,5),(7,6,8),(8,3,8),(9,1,8),(10,6,1),(11,3,1),(71,2,2),(72,0,1),(88,10,1),(89,11,1),(90,12,1),(91,13,1),(92,14,1),(93,15,1),(94,16,1),(95,17,1),(96,18,1),(97,19,1);
/*!40000 ALTER TABLE `fave_quote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotes`
--

DROP TABLE IF EXISTS `quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `author_quote` varchar(45) DEFAULT NULL,
  `quote` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotes`
--

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;
INSERT INTO `quotes` VALUES (10,1,'John Quincy Adams','Government stuff','2015-04-15 21:43:43',NULL),(11,1,'Uncle Jesse','Hello there','2015-04-15 21:43:55',NULL),(12,2,'Heisenberg','I am the one who knocks','2015-04-15 21:44:16',NULL),(13,5,'Michael','Hello, I\'m Michael Choi, founder of Coding Do','2015-04-15 21:44:56',NULL),(14,1,'John Quincy Adams','Stuff happens','2015-04-15 22:04:42',NULL),(15,2,'Heisenberg','I love stuff','2015-04-16 15:42:32',NULL),(16,1,'QA Tester','Testing','2015-04-17 09:36:57',NULL),(17,2,'heisfn','fdbaguirba','2015-04-17 21:24:43',NULL),(18,2,'gfadgfsd','gfdagfds','2015-04-17 21:31:50',NULL),(19,1,'David Lee','I FINISHED!!','2015-04-19 01:36:06',NULL);
/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'David Lee','Dave','itxawjteeb@gmail.com','12345678','1988-12-21 00:00:00','2015-04-15 18:49:00',NULL),(2,'Walter White','Heisenberg','breakingbad@amc.com','12345678','1988-12-21 00:00:00','2015-04-15 18:49:41',NULL),(5,'Michael Choi','Dojo Instructor','michael@choiness.com','12345678','1988-12-21 00:00:00','2015-04-15 18:56:13',NULL),(6,'Ryota Honjo','Japanese Guy','hello@japan.com','12345678','1988-12-21 00:00:00','2015-04-15 18:57:30',NULL),(7,'Chris Yang','Chris','chris@yahoo.com','12345678','1988-12-21 00:00:00','2015-04-15 19:05:41',NULL),(8,'David Lee','Chris','dlee148@student.cccd.edu','12345678','1988-12-21 00:00:00','2015-04-15 22:04:16',NULL);
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

-- Dump completed on 2015-04-19  1:40:04
