CREATE DATABASE  IF NOT EXISTS `db_omtx` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_omtx`;
-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: db_omtx
-- ------------------------------------------------------
-- Server version	8.0.42

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
-- Table structure for table `tb_chamados`
--

DROP TABLE IF EXISTS `tb_chamados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_chamados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL,
  `data_atualizacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_chamados`
--

LOCK TABLES `tb_chamados` WRITE;
/*!40000 ALTER TABLE `tb_chamados` DISABLE KEYS */;
INSERT INTO `tb_chamados` VALUES (1,'Banco de dados','Atualização de BD.','2025-09-04 11:20:35','Aberto',NULL),(2,'Sistema','Sistema fora do ar','2025-09-04 11:21:43','Em Andamento',NULL),(3,'E-mail','Erro no servidor.','2025-09-04 11:21:49','Aberto',NULL),(4,'Sistema','Sistema fora do ar','2025-09-04 11:21:56','Fechado',NULL),(5,'Faturamento','Faturamento em atraso.','2025-09-04 11:22:09','Aberto',NULL),(6,'Negociação','Dívida à negociar','2025-09-04 11:22:16','Em Andamento',NULL),(7,'Sistema','Sistema fora do ar','2025-09-04 11:22:31','Fechado',NULL),(8,'E-mail','Erro no servidor.','2025-09-04 11:22:37','Aberto',NULL),(13,'Negociação','Dívida à negociar','2025-09-04 11:35:32','Em Andamento',NULL),(14,'Sistema','Sistema fora do ar','2025-09-04 11:36:03','Aberto','2025-09-04 11:59:58');
/*!40000 ALTER TABLE `tb_chamados` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-06 15:16:21
