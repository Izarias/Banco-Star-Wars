-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: caixa42
-- ------------------------------------------------------
-- Server version	5.7.12-log

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
-- Table structure for table `conta`
--

DROP TABLE IF EXISTS `conta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conta` (
  `nconta` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `cpf` char(11) NOT NULL,
  `telefone` int(11) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `senha` int(11) NOT NULL,
  PRIMARY KEY (`nconta`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conta`
--

LOCK TABLES `conta` WRITE;
/*!40000 ALTER TABLE `conta` DISABLE KEYS */;
INSERT INTO `conta` VALUES (1,'Pedro Augusto','Rubiataba','12345678901',33250000,300.00,1),(2,'Isabella ','Ceres','12345678902',33231234,259.50,2),(3,'Iara','Ceres','12345678903',33240078,1000.00,3),(4,'Gabriel','Rubiataba','12345678904',33250666,10000.00,4),(5,'Guilhermy','Rialma','12345678905',33235647,5000.00,5),(6,'Glaydson','Ceres','12345678906',33241001,5000.00,6),(7,'Henrique','Ceres','12345678907',33267890,10000.00,7),(8,'Gabrielle','Uruana','12345678908',33278943,5000.00,8),(9,'Larissa','Carmo do Rio Verde','12345678909',33276534,4750.00,9),(10,'Kamyla','Heitoraí','12345678910',33276851,7000.00,10);
/*!40000 ALTER TABLE `conta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimentacao`
--

DROP TABLE IF EXISTS `movimentacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimentacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `nconta` int(11) NOT NULL,
  `senha` int(11) NOT NULL,
  `contadestino` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nconta` (`nconta`),
  CONSTRAINT `movimentacao_ibfk_1` FOREIGN KEY (`nconta`) REFERENCES `conta` (`nconta`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimentacao`
--

LOCK TABLES `movimentacao` WRITE;
/*!40000 ALTER TABLE `movimentacao` DISABLE KEYS */;
INSERT INTO `movimentacao` VALUES (1,'deposito',300.00,1,1,NULL),(2,'deposito',1000.00,3,3,NULL),(3,'deposito',23500.00,7,7,NULL),(4,'deposito',23500.00,7,7,NULL),(5,'deposito',9.50,10,10,NULL),(6,'transferencia',7000.00,7,7,10),(7,'transferencia',9.50,10,10,2),(8,'transferencia',10000.00,7,7,4),(9,'transferencia',10000.00,7,7,5),(10,'transferencia',10000.00,7,7,6),(11,'transferencia',5000.00,5,5,8),(12,'transferencia',5000.00,6,6,9),(13,'transferencia',250.00,9,9,2),(14,'transferencia',250.00,9,9,9);
/*!40000 ALTER TABLE `movimentacao` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-03 22:08:13
