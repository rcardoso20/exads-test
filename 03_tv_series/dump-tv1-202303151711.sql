-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: tv1
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

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
-- Table structure for table `tv_series`
--

DROP TABLE IF EXISTS `tv_series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tv_series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `channel` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tv_series`
--

LOCK TABLES `tv_series` WRITE;
/*!40000 ALTER TABLE `tv_series` DISABLE KEYS */;
INSERT INTO `tv_series` VALUES (1,'The Last of Us','HBO Max','Action,Adventure,Drama'),(2,'The Blacklist','Netflix','Crime,Drama,Mystery'),(4,'Squid Game','Netflix','Action,Drama,Mystery'),(5,'Breaking Bad','AMC','Crime,Drama,Thriller'),(6,'Chernobyl','Netflix','Drama,History,Thriller'),(7,'The Peaky Blinders','Netflix','Crime,Drama'),(8,'Game of Thrones','HBO','Action,Adventure,Drama'),(9,'Arcane','Netflix','Animation,Action,Adventure'),(10,'The Office','NBC','Comedy');
/*!40000 ALTER TABLE `tv_series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tv_series_intervals`
--

DROP TABLE IF EXISTS `tv_series_intervals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tv_series_intervals` (
  `id_tv_series` int(11) NOT NULL,
  `week_day` varchar(255) DEFAULT NULL,
  `show_time` time DEFAULT NULL,
  `week_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tv_series`),
  CONSTRAINT `tv_series_intervals_ibfk_1` FOREIGN KEY (`id_tv_series`) REFERENCES `tv_series` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tv_series_intervals`
--

LOCK TABLES `tv_series_intervals` WRITE;
/*!40000 ALTER TABLE `tv_series_intervals` DISABLE KEYS */;
INSERT INTO `tv_series_intervals` VALUES (1,'Wednesday','08:00:00',2),(2,'Friday','00:00:00',4),(4,'Wednesday','12:30:00',2),(5,'Monday','23:00:00',0),(6,'Tuesday','22:30:00',1),(7,'Thursday','22:00:00',3),(8,'Saturday','10:00:00',5),(9,'Sunday','15:00:00',6),(10,'Sunday','23:45:00',6);
/*!40000 ALTER TABLE `tv_series_intervals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'tv1'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-15 17:11:41
