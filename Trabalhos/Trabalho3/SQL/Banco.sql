-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: Banco
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `acao`
--

DROP TABLE IF EXISTS `acao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acao` (
  `nro_conta` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `acao` varchar(64) NOT NULL,
  `valor` double DEFAULT NULL,
  PRIMARY KEY (`nro_conta`,`numero`),
  CONSTRAINT `acao_ibfk_1` FOREIGN KEY (`nro_conta`) REFERENCES `cliente` (`nro_conta`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acao`
--

LOCK TABLES `acao` WRITE;
/*!40000 ALTER TABLE `acao` DISABLE KEYS */;
INSERT INTO `acao` VALUES (10,1,'deposito',120),(10,2,'deposito',10),(10,3,'deposito',10),(10,4,'deposito',1220),(10,5,'saldo',-980),(10,6,'saldo',-9323.5),(20,7,'saldo',-123),(20,8,'deposito',4000),(20,9,'saldo',-1000);
/*!40000 ALTER TABLE `acao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `nro_conta` int(11) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `saldo` double NOT NULL,
  PRIMARY KEY (`nro_conta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (10,'Maria',2000),(20,'Jose',3500);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfere`
--

DROP TABLE IF EXISTS `transfere`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfere` (
  `nro_contaO` int(11) NOT NULL,
  `nro_contaD` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `saldo` double NOT NULL,
  PRIMARY KEY (`nro_contaO`,`nro_contaD`,`numero`),
  KEY `nro_contaD` (`nro_contaD`),
  CONSTRAINT `transfere_ibfk_1` FOREIGN KEY (`nro_contaO`) REFERENCES `cliente` (`nro_conta`) ON DELETE CASCADE,
  CONSTRAINT `transfere_ibfk_2` FOREIGN KEY (`nro_contaD`) REFERENCES `cliente` (`nro_conta`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfere`
--

LOCK TABLES `transfere` WRITE;
/*!40000 ALTER TABLE `transfere` DISABLE KEYS */;
INSERT INTO `transfere` VALUES (10,20,1,100),(20,10,2,900);
/*!40000 ALTER TABLE `transfere` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-01 23:14:28
