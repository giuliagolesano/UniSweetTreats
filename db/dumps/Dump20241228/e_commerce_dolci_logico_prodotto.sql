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
-- Table structure for table `prodotto`
--

DROP TABLE IF EXISTS `prodotto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodotto` (
  `codProd` varchar(10) NOT NULL,
  `quantita` float NOT NULL,
  `nomeGusto` varchar(30) NOT NULL,
  `nomeTip` varchar(25) NOT NULL,
  PRIMARY KEY (`codProd`),
  UNIQUE KEY `ID_PRODOTTO_IND` (`codProd`),
  KEY `FKdi_IND` (`nomeGusto`),
  KEY `FKappartenenza_IND` (`nomeTip`),
  CONSTRAINT `FKappartenenza_FK` FOREIGN KEY (`nomeTip`) REFERENCES `tipologia` (`nomeTip`),
  CONSTRAINT `FKdi_FK` FOREIGN KEY (`nomeGusto`) REFERENCES `gusto` (`nomeGusto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodotto`
--

LOCK TABLES `prodotto` WRITE;
/*!40000 ALTER TABLE `prodotto` DISABLE KEYS */;
INSERT INTO `prodotto` VALUES ('P001',10,'Red Velvet','Torte'),('P002',8,'Oreo','Torte'),('P003',15,'Cherry','Torte'),('P004',7,'Bounty','Torte'),('P005',12,'Cioccolato','Torte'),('P006',5,'Caramello','Torte'),('P007',10,'Confetti','Torte'),('P008',6,'Pistacchio','Torte'),('P009',9,'Carrot Cake','Torte'),('P010',20,'Chocolate Chips','Biscotti'),('P011',15,'Cinnamon','Biscotti'),('P012',25,'Marmellata','Biscotti'),('P013',18,'Cocco','Biscotti'),('P014',22,'Frolla','Biscotti'),('P015',10,'Blueberry','Cupcakes'),('P016',12,'Cioccolato','Cupcakes'),('P017',8,'Chocolate Chips','Cupcakes'),('P018',14,'Frutti di Bosco','Cupcakes'),('P019',30,'Squaletti','Caramelle'),('P020',28,'CocaCola','Caramelle'),('P021',25,'Liquirizie','Caramelle'),('P022',35,'Orsetti','Caramelle'),('P023',20,'Ciliegie','Caramelle'),('P024',18,'Frizzy','Caramelle'),('P025',15,'Uovo','Caramelle'),('P026',12,'Gelè','Caramelle'),('P027',10,'Galatine','Caramelle');
/*!40000 ALTER TABLE `prodotto` ENABLE KEYS */;
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
