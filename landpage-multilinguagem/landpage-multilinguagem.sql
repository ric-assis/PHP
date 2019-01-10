-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: categorias
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
-- Table structure for table `lang`
--

DROP TABLE IF EXISTS `lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chave` varchar(50) DEFAULT NULL,
  `valor` varchar(50) DEFAULT NULL,
  `language` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lang`
--

LOCK TABLES `lang` WRITE;
/*!40000 ALTER TABLE `lang` DISABLE KEYS */;
INSERT INTO `lang` VALUES (104,'Minibuses','Minibuses','en'),(105,'Bicycle','Bicycle','en'),(106,'Bicycle','Bicicleta','pt-br'),(107,'Moped','Moped','en'),(108,'Moped','Ciclomotor','pt-br'),(109,'Scooter','Scooter','en'),(110,'Scooter','Lambreta','pt-br'),(111,'Motorcyclo','Motorcyclo','en'),(112,'Motorcyclo','Motociclo','pt-br'),(113,'Tricyclo','Tricyclo','en'),(114,'Tricyclo','Triciclo','pt-br'),(115,'Quadryciclo','Quadryciclo','en'),(116,'Quadryciclo','Quadriiciclo','pt-br'),(117,'Automobile','Automobile','en'),(118,'Automobile','Automóvel','pt-br'),(119,'Buses','Buses','en'),(120,'Buses','Autocarros','pt-br'),(121,'Tram','Tram','en'),(122,'Tram','Eléctrico','pt-br'),(123,'Trailer','Trailer','en'),(124,'Trailer','Reboque','pt-br'),(125,'Semi-trailer','Semi-trailer','en'),(126,'Semi-trailer','Semi-reboque','pt-br'),(127,'Wagon','Wagon','en'),(128,'Wagon','Vagão','pt-br'),(129,'Trucks','Trucks','en'),(130,'Trucks','Caminhões','pt-br'),(131,'Carts','Carts','en'),(132,'Carts','Carrinhos','pt-br'),(133,'Motocross','Motocross','en'),(134,'Motocross','Motocross','pt-br'),(135,'Tractor','Tractor','en'),(136,'Tractor','Trator','pt-br'),(137,'Blouse','Blouse','en'),(138,'Blouse','Blusa','pt-br'),(139,'Trousers','Trousers','en'),(140,'Trousers','Calças','pt-br'),(141,'Shirt','Shirt','en'),(142,'Shirt','Camisa','pt-br'),(143,'Tank top','Tank top','en'),(144,'Tank top','Regata','pt-br'),(145,'T-shirt','T-shirt','en'),(146,'T-shirt','camiseta','pt-br'),(147,'Coat','Coat','en'),(148,'Coat','Casaco','pt-br'),(149,'Overalls','Overalls','en'),(150,'Overalls','Macacões','pt-br'),(151,'Skirt','Skirt','en'),(152,'Skirt','Saia','pt-br'),(153,'About everything','About everything','en'),(154,'About everything','Sobre tudo','pt-br'),(155,'Sweater','Sweater','en'),(156,'Sweater','Suéter','pt-br'),(157,'Dress','Dress','en'),(158,'Dress','Vestir','pt-br'),(159,'Boot','Boot','en'),(160,'Boot','Bota','pt-br'),(161,'Slipper','Slipper','en'),(162,'Slipper','Chinelo','pt-br'),(163,'Football boots','Football boots','en'),(164,'Football boots','Chuteiras','pt-br'),(165,'Sandal','Sandal','en'),(166,'Sandal','Sandália','pt-br'),(167,'Sneaker','Sneaker','en'),(168,'Sneaker','Tênis','pt-br'),(169,'Shoe','Shoe','en'),(170,'Shoe','Sapato','pt-br'),(171,'Shoes','Shoes','en'),(172,'Shoes','sapatos','pt-br'),(173,'Clog','Clog','en'),(174,'Clog','Entupir','pt-br'),(175,'Sneakers','Sneakers','en'),(176,'Sneakers','Sapatenis','pt-br'),(177,'Scarpin','Scarpin','en'),(178,'Scarpin','Scarpan','pt-br'),(179,'Reamer','Reamer','en'),(180,'Reamer','Alargador','pt-br'),(181,'Alliance','Alliance','en'),(182,'Alliance','Aliança','pt-br'),(183,'Ring','Ring','en'),(184,'Ring','Anel','pt-br'),(185,'Bandana','Bandana','en'),(186,'Bandana','Bandana','pt-br'),(187,'womens\' pouch','womens\' pouch','en'),(188,'womens\' pouch','Bolsa feminina','pt-br'),(189,'Men\'s bag','Men\'s bag','en'),(190,'Men\'s bag','Bolsa masculina','pt-br'),(191,'Earring','Earring','en'),(192,'Earring','Brinco','pt-br'),(193,'Brooch','Brooch','en'),(194,'Brooch','Broche','pt-br'),(195,'Scarf','Scarf','en'),(196,'Scarf','Cachecol','pt-br'),(197,'Shinguard','Shinguard','en'),(198,'Shinguard','Caneleira','pt-br'),(199,'Wallet','Wallet','en'),(200,'Wallet','Carteira','pt-br'),(201,'Hat','Hat','en'),(202,'Hat','Chapéu','pt-br'),(203,'Belt','Belt','en'),(204,'Belt','Cinto','pt-br'),(205,'Necklace','Necklace','en'),(206,'Necklace','Colar','pt-br'),(207,'Minibuses','microônibus','pt-br');
/*!40000 ALTER TABLE `lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_categorias`
--

DROP TABLE IF EXISTS `tipo_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) DEFAULT NULL,
  `produto` varchar(50) DEFAULT NULL,
  `valor` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_categorias`
--

LOCK TABLES `tipo_categorias` WRITE;
/*!40000 ALTER TABLE `tipo_categorias` DISABLE KEYS */;
INSERT INTO `tipo_categorias` VALUES (7,'vehicles','Minibuses',90000.00),(8,'vehicles','Bicycle',500.50),(9,'vehicles','Moped',1500.00),(10,'vehicles','Scooter',3500.20),(11,'vehicles','Motorcyclo',6000.00),(12,'vehicles','Tricyclo',7000.00),(13,'vehicles','Quadryciclo',11200.30),(14,'vehicles','Automobile',43000.00),(15,'vehicles','Buses',300000.00),(16,'vehicles','Tram',200000.00),(17,'vehicles','Trailer',150000.00),(18,'vehicles','Semi-trailer',100000.00),(19,'vehicles','Wagon',350.00),(20,'vehicles','Trucks',120000.00),(21,'vehicles','Carts',16000.00),(22,'vehicles','Motocross',7000.00),(23,'vehicles','Tractor',45000.00),(24,'clothes','Blouse',21.00),(25,'clothes','Trousers',23.00),(26,'clothes','Shirt',43.00),(27,'clothes','Tank top',28.00),(28,'clothes','T-shirt',12.30),(29,'clothes','Coat',70.20),(30,'clothes','Overalls',50.30),(31,'clothes','Skirt',14.00),(32,'clothes','About everything',20.00),(33,'clothes','Sweater',45.20),(34,'clothes','Dress',25.30),(35,'shoes','Boot',220.00),(36,'shoes','Slipper',100.00),(37,'shoes','Football boots',180.00),(38,'shoes','Sandal',30.00),(39,'shoes','Sneaker',92.00),(40,'shoes','Shoe',140.00),(41,'shoes','Shoes',150.00),(42,'shoes','Clog',80.60),(43,'shoes','Sneakers',110.00),(44,'shoes','Scarpin',120.00),(45,'accessories','Reamer',30.20),(46,'accessories','Alliance',60.00),(47,'accessories','Ring',4.50),(48,'accessories','Bandana',2.10),(49,'accessories','womens\' pouch',8.90),(50,'accessories','Men\'s bag',14.60),(51,'accessories','Earring',16.20),(52,'accessories','Brooch',3.00),(53,'accessories','Scarf',7.40),(54,'accessories','Shinguard',15.43),(55,'accessories','Wallet',12.00),(56,'accessories','Hat',9.90),(57,'accessories','Belt',8.70),(58,'accessories','Necklace',10.20);
/*!40000 ALTER TABLE `tipo_categorias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-10 20:12:05
