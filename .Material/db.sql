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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_autor`
--

LOCK TABLES `tb_autor` WRITE;
/*!40000 ALTER TABLE `tb_autor` DISABLE KEYS */;
INSERT INTO `tb_autor` VALUES (1,'Nicolau','Maquiavel'),(2,'Augusto','Cury'),(3,'Tilson','Lucas');
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
-- Table structure for table `tb_editora`
--

DROP TABLE IF EXISTS `tb_editora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_editora` (
  `id_editora` int NOT NULL AUTO_INCREMENT,
  `nome_editora` varchar(45) NOT NULL,
  PRIMARY KEY (`id_editora`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_editora`
--

LOCK TABLES `tb_editora` WRITE;
/*!40000 ALTER TABLE `tb_editora` DISABLE KEYS */;
INSERT INTO `tb_editora` VALUES (1,'Casa do Codigo'),(2,'Nova Editora LDA'),(3,'Mufassa Letras LDA'),(5,'Angola Goldem Edtion');
/*!40000 ALTER TABLE `tb_editora` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_livro`
--

LOCK TABLES `tb_livro` WRITE;
/*!40000 ALTER TABLE `tb_livro` DISABLE KEYS */;
INSERT INTO `tb_livro` VALUES (24,'Docker para Iniciantes',2,5,'2022-06-01','Tecnologia','Devops','Aruitetura de Sistemas',12,'Excelente livro para inicinates e não so.\r\nMas para todo professional de Infraestrutura',5000,NULL,0,'Y','2022-06-14 12:06:47',NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_livro_img`
--

LOCK TABLES `tb_livro_img` WRITE;
/*!40000 ALTER TABLE `tb_livro_img` DISABLE KEYS */;
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-14 23:40:21
