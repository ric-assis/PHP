-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: blog
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
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `postagem` mediumtext,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (2,'Alonso Ricardo Conceicao Assis','Teste de envio de mensagem para o blog via banco de dados','avatar/ec4e5ce44a9c241242ec734446d39ca2.png'),(4,'Ricardo Daniel Rosa Assis','Teste de envio 2','avatar/7a96611cdb9ce1fea446acb5a3687e6c.png'),(6,'Ivanilce Rosa','Teste de envio sem a pasta criadaa','avatar/9ff1f25c2611a965649844a9ca9148d6.png'),(7,'admin','Teste numero 3 com impressao dos dados na página','avatar/5802626184225ee867e9adf325575be7.png'),(10,'Manuela','Teste de validação de dados com dados certos','avatar/1f84cb5fa8442c5e103be5c0371fe1a6.png'),(11,'admin','Teste de direito  erro 403','avatar/f98ff783c942a5234a065b9e48de7fda.png'),(19,'Zenaura Assis','O contingente de desempregados é 3,7% menor que o registrado no trimestre encerrado em junho (474 mil pessoas a menos). Já na comparação com o mesmo trimestre do ano passado, quando havia 13 milhões de desempregados no país, a população desocupada caiu 3,6% (menos 469 mil pessoas).\r\nO número de pessoas desalentadas (que desistiram de procurar emprego) ficou estável em relação ao trimestre anterior, se mantendo no patamar recorde (4,8 milhões). Na comparação com o mesmo trimestre de 2017, porém, houve alta de 12,6%.','avatar/e6d1378ffd6476ea5b1da8d49dd755c9.jpg'),(23,'Alonso Ricardo','A troca de mensagens pelo Twitter veio depois de aliados de Haddad afirmarem, na noite de domingo (28), que o petista não ligaria para Bolsonaro por ter sido alvo de ofensas pessoais ao longo da campanha eleitoral. Bolsonaro foi ... - Veja mais em https://noticias.uol.com.br/politica/eleicoes/2018/noticias/2018/10/29/bolsonaro-agradece-mensagem-de-haddad-o-brasil-merece-o-melhor.htm?cmpid=copiaecola','avatar/eda900869840473661e6ce91f938432a.jpg');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'blog'
--

--
-- Dumping routines for database 'blog'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-30 11:19:30
