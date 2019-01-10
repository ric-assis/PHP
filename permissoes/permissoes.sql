-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: permissoes
-- ------------------------------------------------------
-- Server version	5.7.13-log

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
-- Table structure for table `cliente_permissoes`
--

DROP TABLE IF EXISTS `cliente_permissoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_permissoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_permissoes`
--

LOCK TABLES `cliente_permissoes` WRITE;
/*!40000 ALTER TABLE `cliente_permissoes` DISABLE KEYS */;
INSERT INTO `cliente_permissoes` VALUES (20,'Matheus Rodolfo','matheus@matheus.com','Rua C','250'),(21,'janine Maia','janine@janine.com','Rua 1A','500'),(22,'Reinaldo Geanekine','reinaldog@reinaldog.com','Rua D-10','760'),(23,'Maria Madalena','maria@maria.com','Rua Dom Pedro I','1375'),(24,'Alice Maravilha','alice@alice.com','Rua Santa Quiteria','1452');
/*!40000 ALTER TABLE `cliente_permissoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissao_permissoes`
--

DROP TABLE IF EXISTS `permissao_permissoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissao_permissoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_da_permissao` varchar(50) DEFAULT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissao_permissoes`
--

LOCK TABLES `permissao_permissoes` WRITE;
/*!40000 ALTER TABLE `permissao_permissoes` DISABLE KEYS */;
INSERT INTO `permissao_permissoes` VALUES (1,'ADD','Adicionar cadastro'),(2,'DEL','Apagar cadastro'),(3,'UPD','Atualizar cadastro'),(4,'REA','Lêr cadastro'),(5,'PAG','Acessar páginas restritas');
/*!40000 ALTER TABLE `permissao_permissoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_permisao_permissoes`
--

DROP TABLE IF EXISTS `usuario_permisao_permissoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_permisao_permissoes` (
  `id_usuario` int(11) NOT NULL,
  `id_permissao` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_permissao`),
  KEY `fk_permissao` (`id_permissao`),
  CONSTRAINT `fk_permissao` FOREIGN KEY (`id_permissao`) REFERENCES `permissao_permissoes` (`id`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario_permissoes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_permisao_permissoes`
--

LOCK TABLES `usuario_permisao_permissoes` WRITE;
/*!40000 ALTER TABLE `usuario_permisao_permissoes` DISABLE KEYS */;
INSERT INTO `usuario_permisao_permissoes` VALUES (1,1),(2,1),(1,2),(2,2),(1,3),(3,3),(1,4),(2,4),(3,4),(4,4),(1,5);
/*!40000 ALTER TABLE `usuario_permisao_permissoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_permissoes`
--

DROP TABLE IF EXISTS `usuario_permissoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_permissoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_permissoes`
--

LOCK TABLES `usuario_permissoes` WRITE;
/*!40000 ALTER TABLE `usuario_permissoes` DISABLE KEYS */;
INSERT INTO `usuario_permissoes` VALUES (1,'alonso','123456789','a.ric.c.assis@gmail.com','202cb962ac59075b964b07152d234b70'),(2,'ricardo','987654321','a.ric.c.assis@outlook.com','202cb962ac59075b964b07152d234b70'),(3,'admin','012345678','admin@outlook.com','202cb962ac59075b964b07152d234b70'),(4,'user','234567890','user@outlook.com','202cb962ac59075b964b07152d234b70'),(5,'estagiário','123789456','estagiario@estagiario.com','202cb962ac59075b964b07152d234b70');
/*!40000 ALTER TABLE `usuario_permissoes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-10 20:13:34
