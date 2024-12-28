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
-- Table structure for table `formato_da`
--

DROP TABLE IF EXISTS `formato_da`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formato_da` (
  `codOrd` varchar(10) NOT NULL,
  `codProd` varchar(10) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `testo` varchar(50) DEFAULT NULL,
  `topping` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`codProd`,`codOrd`),
  UNIQUE KEY `ID_formato_da_IND` (`codProd`,`codOrd`),
  KEY `FKfor_ORD_IND` (`codOrd`),
  CONSTRAINT `FKfor_ORD_FK` FOREIGN KEY (`codOrd`) REFERENCES `ordine` (`codOrd`),
  CONSTRAINT `FKfor_PRO` FOREIGN KEY (`codProd`) REFERENCES `prodotto` (`codProd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formato_da`
--

LOCK TABLES `formato_da` WRITE;
/*!40000 ALTER TABLE `formato_da` DISABLE KEYS */;
INSERT INTO `formato_da` VALUES ('O001','P001','red_velvet.jpg','Soffice e golosa','Cioccolato'),('O001','P010','cookies.jpg','Con gocce di cioccolato','Nessuno'),('O002','P016','cupcake_cioccolato.jpg','Morbido e cioccolatoso','Ciliegie');
/*!40000 ALTER TABLE `formato_da` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-28 16:12:08
