-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: izwe
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.13.10.1

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
-- Table structure for table `gruppi`
--

DROP TABLE IF EXISTS `gruppi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gruppi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_gruppo` varchar(100) NOT NULL,
  `sorvegliante_id` int(11) NOT NULL,
  `assistente_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gruppi`
--

LOCK TABLES `gruppi` WRITE;
/*!40000 ALTER TABLE `gruppi` DISABLE KEYS */;
INSERT INTO `gruppi` VALUES (1,'Amoruso',1,139,'2014-03-18 20:47:53'),(2,'Ginestra',37,137,'2014-03-18 20:49:36'),(3,'Calaminici',14,130,'2014-03-18 20:50:25'),(5,'Baldi',6,23,'2014-03-18 20:51:34');
/*!40000 ALTER TABLE `gruppi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proclamatori`
--

DROP TABLE IF EXISTS `proclamatori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proclamatori` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `gruppo_id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `gruppo_id` (`gruppo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proclamatori`
--

LOCK TABLES `proclamatori` WRITE;
/*!40000 ALTER TABLE `proclamatori` DISABLE KEYS */;
INSERT INTO `proclamatori` VALUES (0,0,'Comitiva','','2014-12-22 17:52:19'),(1,1,' Giuseppe','Amoruso','2014-03-18 20:37:46'),(2,1,' Raffaella','Amoruso','2014-03-18 20:37:46'),(3,1,' Luigi','Amoruso','2014-03-18 20:37:46'),(4,1,' Ruben','Amoruso','2014-03-18 20:37:46'),(5,1,' Gianni','Antonucci','2014-03-18 20:37:46'),(6,5,' Francesco','Baldi','2014-03-18 20:37:46'),(7,5,' Mariella','Baldi','2014-03-18 20:37:46'),(9,5,' Roy','Bellingan','2014-03-18 20:37:46'),(10,5,' Imperia','Bortone','2014-03-18 20:37:46'),(11,5,' Antonio','Cacciapuoti','2014-03-18 20:37:46'),(12,5,' Graziella','Cacciapuoti','2014-03-18 20:37:46'),(13,5,' Andrea','Cacciapuoti','2014-03-18 20:37:46'),(14,3,' Davide','Calaminici','2014-03-18 20:37:46'),(15,3,' Ruth','Calaminici','2014-03-18 20:37:46'),(17,3,' Sara','Colagrossi','2014-03-18 20:37:46'),(18,5,' Ada','Coni','2014-03-18 20:37:46'),(19,5,' Concetta','Cupani','2014-03-18 20:37:46'),(20,3,' Bruna','De Luca','2014-03-18 20:37:46'),(21,3,' Ruggero','De Luca','2014-03-18 20:37:46'),(22,1,' Maurizio','Di Felice','2014-03-18 20:37:46'),(23,5,' Giancarlo','Emili','2014-03-18 20:37:46'),(24,5,' Rosanna','Emili','2014-03-18 20:37:46'),(25,3,' Oscar','Emili','2014-03-18 20:37:46'),(26,3,' Andrea','Esuperanzi','2014-03-18 20:37:46'),(27,3,' Mery','Esuperanzi','2014-03-18 20:37:46'),(28,3,' Giada','Esuperanzi','2014-03-18 20:37:46'),(29,1,' Pina','Esuperanzi','2014-03-18 20:37:46'),(30,2,' Bianca Maria','Filieri','2014-03-18 20:37:46'),(31,3,' Maria','Fiorentino','2014-03-18 20:37:46'),(32,1,' Danilo','Fornito','2014-03-18 20:37:46'),(33,1,' Davide','Fornito','2014-03-18 20:37:46'),(35,2,' Carla','Fortini','2014-03-18 20:37:46'),(36,2,' Vittorio','Fortini','2014-03-18 20:37:46'),(37,2,' Davide','Ginestra','2014-03-18 20:37:46'),(38,2,' Roberta','Ginestra','2014-03-18 20:37:46'),(39,2,' Ilaria','Ginestra','2014-03-18 20:37:46'),(40,3,' Ivana','Giuliani','2014-03-18 20:37:46'),(41,1,' Giacomo','Libanori','2014-03-18 20:37:46'),(42,1,' Maria Pia','Libanori','2014-03-18 20:37:46'),(43,5,' Fabio','Libanori','2014-03-18 20:37:46'),(44,5,' Fabrizio','Lommi','2014-03-18 20:37:46'),(45,5,' Elisa','Lommi','2014-03-18 20:37:46'),(46,1,' Roberto','Longo','2014-03-18 20:37:46'),(47,1,' Simona','Longo','2014-03-18 20:37:46'),(48,1,' Filomena','Longo','2014-03-18 20:37:46'),(49,3,' Maurizio','Lucarini','2014-03-18 20:37:46'),(50,1,' Fabio','Mancuso','2014-03-18 20:37:46'),(51,1,' Antonietta','Marcias','2014-03-18 20:37:46'),(52,1,' Gavina','Marcias','2014-03-18 20:37:46'),(53,2,' Emanuele','Mastracci','2014-03-18 20:37:46'),(54,2,' Paolo','Mastropietro','2014-03-18 20:37:46'),(55,2,' Elisa','Mastropietro','2014-03-18 20:37:46'),(56,2,' Sergio','Micheli','2014-03-18 20:37:46'),(57,5,' Cesare','Millevolte','2014-03-18 20:37:46'),(58,5,' Licia','Millevolte','2014-03-18 20:37:46'),(59,2,' Flavio','Minacapilli','2014-03-18 20:37:46'),(60,2,' Lucia','Minacapilli','2014-03-18 20:37:46'),(61,3,' Maria','Olivieri','2014-03-18 20:37:46'),(62,3,' Valentina','Olivieri','2014-03-18 20:37:46'),(63,5,' Gianluca','Ottavianelli','2014-03-18 20:37:46'),(64,5,' Micol','Ottavianelli','2014-03-18 20:37:46'),(65,5,' Giuseppina','Panzironi','2014-03-18 20:37:46'),(66,3,' Roberto','Pizzella','2014-03-18 20:37:46'),(67,5,' Karen','Pizzicannella','2014-03-18 20:37:46'),(68,2,' Bruna','Principini','2014-03-18 20:37:46'),(69,2,' Valentina','Principini','2014-03-18 20:37:46'),(70,2,' Alessandro','Radi','2014-03-18 20:37:46'),(71,2,' Antonietta','Radi','2014-03-18 20:37:46'),(72,3,' Maria Assunta','Rossi','2014-03-18 20:37:46'),(73,3,' Marta','Rossi','2014-03-18 20:37:46'),(74,3,' Paola','Rossi','2014-03-18 20:37:46'),(75,2,' Anna','Savina','2014-03-18 20:37:46'),(76,2,' Argisa','Savina','2014-03-18 20:37:46'),(77,2,' Filippo','Savina','2014-03-18 20:37:46'),(78,2,' Gisella','Servetti','2014-03-18 20:37:46'),(79,2,' Maurizio','Servetti','2014-03-18 20:37:46'),(128,3,' Paola','Aglietti','2014-03-18 21:26:35'),(129,5,' Daniele','Brancorsini','2014-03-18 21:26:35'),(130,3,' Claudio','Giuliani','2014-03-18 21:26:35'),(131,1,' Elisa','Mancuso','2014-03-18 21:26:35'),(132,1,' Anna Maria','Marcias','2014-03-18 21:26:35'),(133,2,' Romina','Mastracci','2014-03-18 21:26:35'),(134,5,' Angela','Pascucci','2014-03-18 21:26:35'),(137,2,' Renzo','Savina','2014-03-18 21:26:35'),(138,2,' Elisabetta','Savina','2014-03-18 21:26:35'),(139,1,' Paolo','Savina','2014-03-18 21:26:35'),(143,3,'Loretta','Emili','2014-03-18 21:58:54'),(144,3,'Laura','Zoppo','2014-09-19 17:57:03'),(145,3,'Alberico','Zoppo','2014-09-19 17:57:24'),(146,1,'Francesco','Fiorenzo','2014-10-19 16:26:09'),(147,1,'Valentina','Fiorenzo','2014-10-19 16:26:26');
/*!40000 ALTER TABLE `proclamatori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_p` int(10) NOT NULL,
  `territorio_n` varchar(10) NOT NULL,
  `data_uscita` date NOT NULL,
  `r_uscita` int(10) unsigned NOT NULL,
  `data_rientro` date DEFAULT NULL,
  `r_rientro` int(10) unsigned NOT NULL,
  `note` mediumtext NOT NULL,
  `last_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `keynice` (`id`,`territorio_n`,`data_uscita`),
  KEY `territorio_n` (`territorio_n`),
  KEY `id_p` (`id_p`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (1,146,'2','2014-11-14',1,'0000-00-00',0,'','2014-12-19 11:12:14'),(2,22,'3','2014-11-09',1,'0000-00-00',0,'','2014-12-19 11:12:14'),(3,134,'6','2014-09-12',1,'2015-01-09',0,'','2015-01-09 18:59:23'),(4,3,'8','2014-11-02',1,'2014-12-28',0,'','2014-12-28 16:52:18'),(5,61,'14','2014-11-07',1,'2015-01-23',1,'','2015-01-23 19:01:00'),(6,129,'17','2014-10-05',1,'2015-01-25',0,'','2015-01-25 17:50:26'),(7,38,'18','2014-09-19',1,'2015-01-04',0,'','2015-01-04 17:07:58'),(8,132,'21','2014-09-20',1,'2015-01-09',0,'','2015-01-09 18:48:14'),(9,145,'22','2014-09-21',1,'2014-10-20',1,'','2014-12-19 11:12:14'),(10,131,'23','2014-09-28',1,'2014-11-28',1,'','2014-12-19 11:12:14'),(11,41,'29','2014-09-14',1,'0000-00-00',0,'','2014-12-19 11:12:14'),(12,49,'32','2014-11-30',1,'0000-00-00',0,'','2014-12-19 11:12:14'),(13,143,'33A','2014-12-02',1,'0000-00-00',0,'','2014-12-19 11:12:14'),(14,24,'33B','2014-09-05',1,'2015-01-04',0,'','2015-01-04 16:59:12'),(15,3,'34','2014-09-13',1,'2014-11-02',1,'','2014-12-19 11:12:14'),(16,130,'35','2014-11-08',1,'2015-01-02',0,'','2015-01-04 17:01:16'),(21,74,'30','2014-12-14',1,'0000-00-00',0,'consegnato a Marta','2014-12-22 18:03:25'),(22,24,'37','2014-09-05',1,'2015-01-02',0,'','2015-01-04 17:01:46'),(23,73,'38','2014-12-14',1,'0000-00-00',0,'','2014-12-22 18:05:37'),(24,61,'39','2014-09-13',1,'0000-00-00',0,'','2015-01-25 12:23:15'),(25,32,'40','2014-10-05',1,'2014-12-25',0,'','2015-01-25 17:55:18'),(26,130,'41','2014-09-05',1,'2014-11-30',1,'','2014-12-22 19:05:21'),(27,137,'42','2014-04-14',1,'2014-12-28',0,'','2014-12-28 17:45:03'),(28,138,'44','2014-11-30',1,'0000-00-00',0,'','2014-12-22 18:09:19'),(29,15,'45','2014-09-27',1,'0000-00-00',0,'','2014-12-22 18:09:40'),(30,33,'47','2014-10-05',1,'0000-00-00',0,'','2014-12-22 18:10:20'),(31,139,'48','2014-09-26',1,'0000-00-00',0,'','2014-12-22 18:10:42'),(32,50,'49','2014-11-16',1,'0000-00-00',0,'','2014-12-22 18:11:05'),(33,128,'53','2014-09-07',1,'2015-01-11',0,'','2015-01-11 16:54:04'),(34,143,'55','2014-09-14',1,'2014-12-02',1,'','2014-12-22 18:12:14'),(35,131,'56','2014-11-28',1,'0000-00-00',0,'','2014-12-22 18:47:00'),(36,9,'74','2014-12-10',1,'0000-00-00',0,'','2014-12-22 18:47:37'),(37,69,'76','2014-10-24',1,'0000-00-00',0,'','2014-12-22 18:48:12'),(38,129,'78','2014-10-05',1,'2015-01-25',0,'','2015-01-25 17:50:12'),(39,133,'79','2014-11-28',1,'0000-00-00',0,'','2014-12-22 18:49:14'),(40,51,'80','2014-09-12',1,'2014-11-30',1,'','2014-12-22 18:49:42'),(41,4,'81','2014-10-20',1,'2014-12-21',0,'','2015-01-25 13:54:44'),(42,71,'82','2014-10-26',1,'0000-00-00',0,'','2014-12-22 18:50:45'),(43,46,'83','2014-12-20',1,'0000-00-00',0,'','2014-12-22 18:51:05'),(44,7,'84','2014-12-03',1,'0000-00-00',0,'','2014-12-22 18:51:25'),(45,64,'85','2014-09-21',1,'0000-00-00',0,'','2014-12-22 18:51:58'),(46,6,'86','2014-09-03',1,'2014-12-28',0,'','2014-12-28 17:01:10'),(47,59,'87','2014-09-05',1,'2015-01-04',0,'','2015-01-04 16:55:04'),(48,0,'88','2014-09-28',1,'0000-00-00',0,'','2014-12-22 18:53:09'),(49,79,'89','2014-03-21',1,'0000-00-00',0,'','2014-12-22 18:54:10'),(50,41,'90','2014-11-28',1,'0000-00-00',0,'','2014-12-22 18:54:59'),(52,35,'94','2014-11-28',1,'0000-00-00',0,'','2014-12-22 18:57:17'),(53,47,'95','2014-12-07',1,'0000-00-00',0,'','2014-12-22 18:57:42'),(54,43,'96','2014-09-05',1,'2014-12-28',0,'','2014-12-28 17:05:39'),(55,2,'97','2014-09-28',1,'2014-12-28',0,'','2014-12-28 16:51:30'),(56,132,'98','2014-09-03',1,'2015-01-02',0,'','2015-01-04 17:02:01'),(57,139,'99','2014-12-21',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(58,74,'100','2014-11-22',1,'2014-12-14',1,'','2014-12-22 18:59:45'),(59,5,'102','2014-10-08',1,'0000-00-00',0,'','2014-12-22 19:00:49'),(60,69,'105','2014-09-05',1,'2014-10-24',1,'','2014-12-22 19:33:10'),(61,0,'106','2014-09-19',1,'0000-00-00',0,'','2014-12-22 19:01:36'),(62,1,'109','2014-09-14',1,'2014-12-28',0,'','2014-12-28 16:51:55'),(63,145,'110','2014-10-26',1,'2014-12-26',0,'','2014-12-26 16:41:09'),(64,36,'111','2014-11-02',1,'0000-00-00',0,'','2014-12-22 19:02:44'),(65,132,'75','2014-08-31',1,'2014-12-28',0,'','2014-12-28 16:52:29'),(66,63,'1','2014-07-27',1,'2014-09-07',1,'','2014-12-26 12:34:48'),(67,63,'4','2014-08-10',1,'2014-09-07',1,'','2014-12-26 12:35:13'),(68,49,'7','2014-08-10',1,'2014-11-30',1,'','2014-12-26 12:39:16'),(69,47,'9','2014-07-27',1,'2014-09-05',1,'','2014-12-26 12:40:10'),(70,43,'10','2014-08-27',1,'2014-09-05',1,'','2014-12-26 12:41:33'),(71,66,'11','2014-08-17',1,'2014-11-30',1,'','2014-12-26 12:42:03'),(72,132,'12','2014-08-31',1,'2014-09-19',1,'','2014-12-26 12:42:26'),(73,134,'13','2014-07-11',1,'2014-09-12',1,'','2014-12-26 12:42:53'),(74,77,'15','2014-06-29',1,'2014-11-30',1,'','2014-12-26 12:43:26'),(75,15,'16','2014-04-11',1,'2014-09-19',1,'','2014-12-26 12:44:06'),(76,38,'24','2014-08-17',1,'2014-09-05',1,'','2014-12-26 12:44:41'),(77,131,'25','2014-07-25',1,'2014-09-05',1,'','2014-12-26 12:45:09'),(78,69,'26','2014-08-22',1,'2014-09-05',1,'','2014-12-26 12:45:34'),(79,61,'27','2014-08-31',1,'2014-11-07',1,'','2014-12-26 12:46:13'),(80,41,'31','2014-08-08',1,'2014-08-31',1,'','2014-12-26 12:46:41'),(82,9,'36','2014-04-06',1,'2014-11-30',1,'','2014-12-26 12:47:55'),(83,138,'46','2014-08-22',1,'2014-12-07',1,'','2014-12-26 12:48:53'),(84,24,'50','2014-07-27',1,'2014-09-05',1,'','2014-12-26 12:49:23'),(85,37,'51','2014-08-17',1,'2014-09-28',1,'','2014-12-26 12:49:50'),(86,138,'54','2014-08-22',1,'2014-11-28',1,'','2014-12-26 12:50:29'),(87,43,'57','2014-08-03',1,'2014-09-05',1,'','2014-12-26 12:50:58'),(88,32,'58','2014-06-08',1,'2014-09-07',1,'','2014-12-26 12:51:22'),(89,36,'59','2014-08-01',1,'2014-09-05',1,'','2014-12-26 12:51:48'),(90,46,'60','2014-06-13',1,'2014-11-30',1,'','2014-12-26 12:52:21'),(91,47,'61','2014-08-22',1,'2014-11-30',1,'','2014-12-26 12:52:58'),(92,15,'62','2014-08-22',1,'2014-09-19',1,'','2014-12-26 12:53:21'),(93,7,'72','2014-08-01',1,'2014-11-30',1,'','2014-12-26 12:53:56'),(94,67,'73','2014-08-08',1,'2014-09-05',1,'','2014-12-26 12:54:33'),(95,132,'77','2014-08-01',1,'2014-08-31',1,'','2014-12-26 12:55:20'),(96,6,'91','2014-04-11',1,'2014-09-07',1,'','2014-12-26 12:55:54'),(97,133,'92','2014-08-01',1,'2014-09-07',1,'','2014-12-26 12:56:23'),(98,38,'93A','2014-08-24',1,'2014-09-05',1,'','2014-12-26 12:56:47'),(100,14,'93B','2014-09-28',1,'2014-12-28',0,'','2014-12-28 17:01:52'),(101,57,'101','2014-08-10',1,'2014-09-05',1,'','2014-12-26 12:59:12'),(102,139,'103','2014-08-01',1,'2014-09-28',1,'','2014-12-26 12:59:40'),(103,55,'104','2014-08-01',1,'2014-11-21',1,'','2014-12-26 13:00:09'),(104,71,'107','2014-07-27',1,'2014-12-02',1,'','2014-12-26 13:00:35'),(105,46,'108','2014-08-10',1,'2014-08-31',1,'','2014-12-26 13:01:07'),(106,14,'43','2014-02-28',1,'2014-09-19',1,'','2014-12-26 13:04:48'),(107,145,'93A','2014-12-26',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(108,37,'59','2014-12-26',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(109,32,'5','2014-12-27',1,'1970-01-01',0,'','2015-01-25 17:54:53'),(110,132,'77','2014-12-28',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(111,6,'86','2014-12-28',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(112,14,'93B','2014-12-28',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(113,43,'108','2014-12-28',0,'0000-00-00',0,'lavorare in gruppo','2015-01-25 12:23:15'),(114,41,'42','2014-12-28',0,'2015-01-09',0,'','2015-01-09 18:48:51'),(115,1,'92','2014-12-28',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(116,59,'87','2015-01-04',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(117,24,'33B','2015-01-04',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(118,24,'8','2015-01-02',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(119,132,'15','2015-01-02',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(120,3,'24','2015-01-04',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(121,134,'9','2015-01-09',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(122,70,'19','2014-12-07',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(123,130,'20','2014-12-04',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(124,49,'28','2014-12-08',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(125,128,'31','2015-01-11',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(126,23,'91','2015-01-11',0,'0000-00-00',0,'','2015-01-25 12:23:15'),(127,61,'10','2015-01-23',1,'0000-00-00',0,'','2015-01-25 12:23:15'),(128,129,'97','2015-01-23',0,'1970-01-01',0,'','2015-01-25 17:50:12');
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `territori`
--

DROP TABLE IF EXISTS `territori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `territori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n` varchar(255) NOT NULL,
  `zona` varchar(255) NOT NULL,
  `note` int(11) NOT NULL,
  `censimento` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `territori`
--

LOCK TABLES `territori` WRITE;
/*!40000 ALTER TABLE `territori` DISABLE KEYS */;
INSERT INTO `territori` VALUES (1,'1','Frascati',0,184),(2,'2','Frascati',0,145),(3,'3','Frascati',0,89),(4,'4','Frascati',0,143),(5,'5','Frascati',0,145),(6,'6','Frascati',0,44),(7,'7','Frascati',0,217),(8,'8','Frascati',0,121),(9,'9','Frascati',0,231),(10,'10','Frascati',0,151),(11,'11','Frascati',0,108),(12,'12','Frascati',0,189),(13,'13','Frascati',0,173),(14,'14','Frascati',0,140),(15,'15','Frascati',0,27),(16,'16','Frascati',0,163),(17,'17','Frascati',0,178),(18,'18','Frascati',0,168),(19,'19','Frascati',0,125),(20,'20','Frascati',0,127),(21,'21','Frascati',0,240),(22,'22','Frascati',0,79),(23,'23','Frascati',0,157),(24,'24','Frascati',0,104),(25,'25','Frascati',0,130),(26,'26','Frascati',0,95),(27,'27','Frascati',0,162),(28,'28','Frascati',0,163),(29,'29','Frascati',0,116),(30,'30','Frascati',0,130),(31,'31','Frascati',0,110),(32,'32','Frascati',0,70),(34,'34','Frascati',0,39),(35,'35','Frascati',0,90),(36,'36','Frascati',0,186),(37,'37','Frascati',0,130),(38,'38','Frascati',0,279),(39,'39','Frascati',0,163),(40,'40','Frascati',0,148),(41,'41','Frascati',0,186),(42,'42','Frascati',0,221),(43,'43','Frascati',0,0),(44,'44','Frascati',0,250),(45,'45','Frascati',0,100),(46,'46','Frascati',0,174),(47,'47','Frascati',0,133),(48,'48','Frascati',0,94),(49,'49','Frascati',0,205),(50,'50','Frascati',0,246),(51,'51','Frascati',0,150),(53,'53','Frascati',0,193),(54,'54','Frascati',0,209),(55,'55','Frascati',0,89),(56,'56','Frascati',0,118),(57,'57','Frascati',0,152),(58,'58','Frascati',0,142),(59,'59','Frascati',0,100),(60,'60','Frascati',0,59),(61,'61','Frascati',0,0),(62,'62','Frascati',0,249),(72,'72','Grottaferrata',0,176),(73,'73','Grottaferrata',0,300),(74,'74','Grottaferrata',0,146),(75,'75','Grottaferrata',0,68),(76,'76','Grottaferrata',0,127),(77,'77','Grottaferrata',0,181),(78,'78','Grottaferrata',0,0),(79,'79','Grottaferrata',0,72),(80,'80','Grottaferrata',0,210),(81,'81','Grottaferrata',0,238),(82,'82','Grottaferrata',0,120),(83,'83','Grottaferrata',0,161),(84,'84','Grottaferrata',0,0),(85,'85','Grottaferrata',0,451),(86,'86','Grottaferrata',0,140),(87,'87','Grottaferrata',0,320),(88,'88','Grottaferrata',0,220),(89,'89','Grottaferrata',0,45),(90,'90','Grottaferrata',0,169),(91,'91','Grottaferrata',0,125),(92,'92','Grottaferrata',0,225),(93,'93A','Grottaferrata',0,95),(94,'94','Grottaferrata',0,127),(95,'95','Grottaferrata',0,327),(96,'96','Grottaferrata',0,232),(97,'97','Grottaferrata',0,248),(98,'98','Grottaferrata',0,64),(99,'99','Grottaferrata',0,0),(100,'100','Grottaferrata',0,184),(101,'101','Grottaferrata',0,165),(102,'102','Grottaferrata',0,118),(103,'103','Grottaferrata',0,54),(104,'104','Grottaferrata',0,0),(105,'105','Grottaferrata',0,303),(106,'106','Grottaferrata',0,260),(107,'107','Grottaferrata',0,238),(108,'108','Grottaferrata',0,322),(109,'109','Grottaferrata',0,167),(110,'110','Grottaferrata',0,41),(111,'111','Grottaferrata',0,246),(112,'33A','Frascati',0,228),(113,'33B','Frascati',0,108),(114,'93B','Grottaferrata',0,0);
/*!40000 ALTER TABLE `territori` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-30 15:26:45
