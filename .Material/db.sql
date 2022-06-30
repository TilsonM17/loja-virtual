-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: db_loja
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

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
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nome_admin` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(200) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin`
--

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` VALUES (2,'Admin Sistema','admin@loja.com','$2y$10$My5clVKB3g6ISfWiu0NffOR5dw2do8KHDEqvfs4hDzTFTSC4Xef2y');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_autor`
--

DROP TABLE IF EXISTS `tb_autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_autor` (
  `id_autor` int NOT NULL AUTO_INCREMENT,
  `nome_autor` varchar(45) NOT NULL,
  `sobre_nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_autor`
--

LOCK TABLES `tb_autor` WRITE;
/*!40000 ALTER TABLE `tb_autor` DISABLE KEYS */;
INSERT INTO `tb_autor` VALUES (1,'Nicolau','Maquiavel'),(2,'Augusto','Cury'),(3,'Tilson','Lucas'),(7,'Robert','Brob'),(8,'Mauricio','Anitoche');
/*!40000 ALTER TABLE `tb_autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categoria`
--

DROP TABLE IF EXISTS `tb_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_categoria` (
  `id_categoria` int NOT NULL,
  `pri_categoria` varchar(45) NOT NULL,
  `seg_categoria` varchar(50) DEFAULT NULL,
  `ter_categoria` varchar(45) DEFAULT NULL,
  `idade_minima` int NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categoria`
--

LOCK TABLES `tb_categoria` WRITE;
/*!40000 ALTER TABLE `tb_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_compra`
--

DROP TABLE IF EXISTS `tb_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_compra` (
  `id_compra` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int unsigned NOT NULL,
  `total_compra` int NOT NULL,
  `status` enum('SEND','DOWNLOAD') DEFAULT 'SEND',
  `purl_donwload` varchar(45) NOT NULL,
  `data_compra` datetime NOT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `fk_tb_compra_1_idx` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_compra`
--

LOCK TABLES `tb_compra` WRITE;
/*!40000 ALTER TABLE `tb_compra` DISABLE KEYS */;
INSERT INTO `tb_compra` VALUES (15,13,10000,'SEND','vX5Ki','2022-06-30 15:33:53'),(16,13,23000,'SEND','5ilZj','2022-06-30 23:24:05');
/*!40000 ALTER TABLE `tb_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_editora`
--

DROP TABLE IF EXISTS `tb_editora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_editora` (
  `id_editora` int NOT NULL AUTO_INCREMENT,
  `nome_editora` varchar(45) NOT NULL,
  PRIMARY KEY (`id_editora`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_editora`
--

LOCK TABLES `tb_editora` WRITE;
/*!40000 ALTER TABLE `tb_editora` DISABLE KEYS */;
INSERT INTO `tb_editora` VALUES (1,'Casa do Codigo'),(2,'Nova Editora LDA'),(3,'Mufassa Letras LDA'),(5,'Angola Goldem Edtion'),(6,'O&#039;Relly');
/*!40000 ALTER TABLE `tb_editora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_items`
--

DROP TABLE IF EXISTS `tb_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_items` (
  `id_items` int NOT NULL AUTO_INCREMENT,
  `id_compra` int NOT NULL,
  `id_livro` int NOT NULL,
  `qtd` int NOT NULL,
  `sub_total` int NOT NULL,
  PRIMARY KEY (`id_items`),
  KEY `fk_tb_items_2_idx` (`id_livro`),
  KEY `fk_tb_items_1_idx` (`id_compra`),
  CONSTRAINT `fk_tb_items_1` FOREIGN KEY (`id_compra`) REFERENCES `tb_compra` (`id_compra`),
  CONSTRAINT `fk_tb_items_2` FOREIGN KEY (`id_livro`) REFERENCES `tb_livro` (`id_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_items`
--

LOCK TABLES `tb_items` WRITE;
/*!40000 ALTER TABLE `tb_items` DISABLE KEYS */;
INSERT INTO `tb_items` VALUES (1,15,28,2,2000),(2,15,29,2,8000),(3,16,28,1,1000),(4,16,32,1,2000),(5,16,31,1,20000);
/*!40000 ALTER TABLE `tb_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_livro`
--

DROP TABLE IF EXISTS `tb_livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_livro` (
  `id_livro` int NOT NULL AUTO_INCREMENT,
  `nome_livro` varchar(100) NOT NULL,
  `id_autor` int NOT NULL,
  `id_editora` int NOT NULL,
  `data_lancamento` date NOT NULL,
  `pri_categoria` varchar(45) NOT NULL,
  `seg_categoria` varchar(45) DEFAULT NULL,
  `ter_categoria` varchar(45) DEFAULT NULL,
  `idade_minima` int NOT NULL,
  `descricao` varchar(300) DEFAULT NULL,
  `preco` int NOT NULL,
  `preco_desconto` int DEFAULT NULL,
  `desconto` int NOT NULL DEFAULT '0',
  `ativo` set('N','Y') NOT NULL DEFAULT 'Y',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_livro`),
  KEY `fk_tb_livro_1_idx` (`id_editora`),
  KEY `fk_tb_livro_to_autor_idx` (`id_autor`),
  CONSTRAINT `fk_tb_livro_to_autor` FOREIGN KEY (`id_autor`) REFERENCES `tb_autor` (`id_autor`) ON DELETE CASCADE,
  CONSTRAINT `fk_tb_livro_to_editora` FOREIGN KEY (`id_editora`) REFERENCES `tb_editora` (`id_editora`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_livro`
--

LOCK TABLES `tb_livro` WRITE;
/*!40000 ALTER TABLE `tb_livro` DISABLE KEYS */;
INSERT INTO `tb_livro` VALUES (27,'JavaScript Patterns',1,3,'2021-12-07','Tecnologia','JavaScript','Design Pattern',12,'Excelente Livro',6000,NULL,0,'Y','2022-06-16 22:14:27',NULL),(28,'Fluente Python',2,3,'2022-02-09','Python','Iniciante','Apreendizado',12,'Livro voltado para quem esta a iniciar os seus estudos em pyhon',1000,NULL,0,'Y','2022-06-16 23:18:57',NULL),(29,'Padrão de Arquitura com python',7,6,'2022-06-06','Python','Design Pattern',NULL,12,'Excelente livro',4000,NULL,0,'Y','2022-06-16 23:24:57',NULL),(30,'O retorno do Cangaceiro JavaScript',3,1,'2020-07-09','Javascript','Iniciante','Guia Pratico',12,'Em uma abordagem simplis e extremamente didatica vamos falar sobre Javascript',8000,NULL,0,'Y','2022-06-21 15:06:43',NULL),(31,'Rede Neural com TensorFlow',3,5,'2019-10-11','TensorFlow','RedeNeural',NULL,12,'Uma breve intrudução a rede neural com tensorflow',20000,NULL,0,'Y','2022-06-21 15:32:16',NULL),(32,'Deep Learning with Pythorch',8,3,'2018-05-30','Pythorch','Python','Deep Learning',12,'Livro para amantes de Pythorch',2000,NULL,0,'Y','2022-06-29 13:30:32',NULL);
/*!40000 ALTER TABLE `tb_livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_livro_img`
--

DROP TABLE IF EXISTS `tb_livro_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_livro_img` (
  `id_livro_img` int NOT NULL AUTO_INCREMENT,
  `id_livro` int NOT NULL,
  `img_nome` varchar(100) NOT NULL,
  `img_type` varchar(45) NOT NULL,
  PRIMARY KEY (`id_livro_img`),
  KEY `fk_tb_livro_img_to_tb_livro` (`id_livro`),
  CONSTRAINT `fk_tb_livro_img_to_tb_livro` FOREIGN KEY (`id_livro`) REFERENCES `tb_livro` (`id_livro`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_livro_img`
--

LOCK TABLES `tb_livro_img` WRITE;
/*!40000 ALTER TABLE `tb_livro_img` DISABLE KEYS */;
INSERT INTO `tb_livro_img` VALUES (3,27,'2022-06-16-39q.jpg','image/jpeg'),(4,28,'2022-06-16-BZ8.jpg','image/jpeg'),(5,29,'2022-06-16-Da8.jpg','image/jpeg'),(6,30,'2022-06-21-yZk.jpg','image/jpeg'),(7,31,'2022-06-21-C2T.jpg','image/jpeg'),(8,32,'2022-06-29-9Fm.jpg','image/jpeg');
/*!40000 ALTER TABLE `tb_livro_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tel_user`
--

DROP TABLE IF EXISTS `tb_tel_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_tel_user` (
  `id_tel` int unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int unsigned NOT NULL,
  `numero_tel` varchar(45) NOT NULL,
  `numero_tel_2` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tel`),
  KEY `fk_tb_tel_user_to_tb_usuario_idx` (`id_usuario`),
  CONSTRAINT `fk_tb_tel_user_to_tb_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tel_user`
--

LOCK TABLES `tb_tel_user` WRITE;
/*!40000 ALTER TABLE `tb_tel_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_tel_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuarios` (
  `id_usuario` int unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `purl` varchar(12) DEFAULT NULL,
  `ativo` enum('Y','N') NOT NULL DEFAULT 'N',
  `acess_token` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuarios`
--

LOCK TABLES `tb_usuarios` WRITE;
/*!40000 ALTER TABLE `tb_usuarios` DISABLE KEYS */;
INSERT INTO `tb_usuarios` VALUES (13,'Tilson Mateus','tilsonmat@gmail.com','$2y$10$.Rpv8x69LCCWQahNmN24F.tExVuJGK5ZgCtLLFqcKPgCX/McmewdC','','Y',NULL,'2022-05-20 17:00:54','2022-05-20 17:00:54',NULL);
/*!40000 ALTER TABLE `tb_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_livro`
--

DROP TABLE IF EXISTS `vw_livro`;
/*!50001 DROP VIEW IF EXISTS `vw_livro`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_livro` AS SELECT 
 1 AS `id_livro`,
 1 AS `nome_livro`,
 1 AS `data_lancamento`,
 1 AS `pri_categoria`,
 1 AS `seg_categoria`,
 1 AS `ter_categoria`,
 1 AS `idade_minima`,
 1 AS `descricao`,
 1 AS `preco`,
 1 AS `desconto`,
 1 AS `ativo`,
 1 AS `img_nome`,
 1 AS `autor`,
 1 AS `nome_editora`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_livro`
--

/*!50001 DROP VIEW IF EXISTS `vw_livro`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`tilsonm17`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_livro` AS select `l`.`id_livro` AS `id_livro`,`l`.`nome_livro` AS `nome_livro`,`l`.`data_lancamento` AS `data_lancamento`,`l`.`pri_categoria` AS `pri_categoria`,`l`.`seg_categoria` AS `seg_categoria`,`l`.`ter_categoria` AS `ter_categoria`,`l`.`idade_minima` AS `idade_minima`,ifnull(`l`.`descricao`,'Sem Descrição') AS `descricao`,`l`.`preco` AS `preco`,`l`.`desconto` AS `desconto`,`l`.`ativo` AS `ativo`,`i`.`img_nome` AS `img_nome`,concat(`a`.`nome_autor`,' ',`a`.`sobre_nome`) AS `autor`,`e`.`nome_editora` AS `nome_editora` from (((`tb_livro` `l` join `tb_livro_img` `i` on((`l`.`id_livro` = `i`.`id_livro`))) join `tb_autor` `a` on((`l`.`id_autor` = `a`.`id_autor`))) join `tb_editora` `e` on((`l`.`id_editora` = `e`.`id_editora`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-30 23:36:41
