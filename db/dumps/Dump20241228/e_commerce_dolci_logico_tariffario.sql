-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: e_commerce_dolci_logico
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `tariffario`
--

DROP TABLE IF EXISTS `tariffario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tariffario` (
  `nomeGusto` varchar(30) NOT NULL,
  `nomeTip` varchar(25) NOT NULL,
  `prezzo` varchar(5) NOT NULL,
  `sconto_perc` float DEFAULT NULL,
  PRIMARY KEY (`nomeTip`,`nomeGusto`),
  UNIQUE KEY `ID_TARIFFARIO_IND` (`nomeTip`,`nomeGusto`),
  KEY `FKcosto_gusto_IND` (`nomeGusto`),
  CONSTRAINT `FKcosto_gusto_FK` FOREIGN KEY (`nomeGusto`) REFERENCES `gusto` (`nomeGusto`),
  CONSTRAINT `FKcosto_tipologia` FOREIGN KEY (`nomeTip`) REFERENCES `tipologia` (`nomeTip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tariffario`
--

LOCK TABLES `tariffario` WRITE;
/*!40000 ALTER TABLE `tariffario` DISABLE KEYS */;
INSERT INTO `tariffario` VALUES ('Chocolate Chips','Biscotti','5.00',0),('Cinnamon','Biscotti','4.50',10),('CocaCola','Caramelle','1.80',0),('Squaletti','Caramelle','2.00',0),('Blueberry','Cupcakes','3.00',5),('Cioccolato','Cupcakes','3.50',0),('Bounty','Torte','22.00',0),('Caramello','Torte','23.00',5),('Cherry','Torte','19.50',7.5),('Cioccolato','Torte','21.00',10),('Oreo','Torte','18.00',5),('Red Velvet','Torte','20.00',10);
/*!40000 ALTER TABLE `tariffario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-28 16:12:06
