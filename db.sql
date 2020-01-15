-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: romain_clair
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `creneaux`
--

DROP TABLE IF EXISTS `creneaux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creneaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creneaux`
--

LOCK TABLES `creneaux` WRITE;
/*!40000 ALTER TABLE `creneaux` DISABLE KEYS */;
/*!40000 ALTER TABLE `creneaux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meetings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `required` longtext COLLATE utf8mb4_unicode_ci,
  `participating` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_44FE52E294AF957A` (`subject_id`),
  CONSTRAINT `FK_44FE52E294AF957A` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meetings`
--

LOCK TABLES `meetings` WRITE;
/*!40000 ALTER TABLE `meetings` DISABLE KEYS */;
INSERT INTO `meetings` VALUES (1,'Les fonctions','Ceci est un exemple de description d\'atelier','Les variables',12,3,NULL,NULL,NULL),(2,'Les variables','Ceci est un exemple de description d\'atelier',NULL,5,1,NULL,NULL,NULL),(3,'Symfony','Ceci est un exemple de description d\'atelier','',0,2,NULL,NULL,NULL),(4,'Les boucles','Ceci est un exemple de description d\'atelier','Les variables',9001,4,NULL,NULL,NULL),(5,'Node.js','Ceci est un exemple de description d\'atelier','Base de Javascript',1,5,NULL,NULL,NULL),(6,'Rust pour les nuls','Ceci est un exemple de description d\'atelier','Aucune',0,6,NULL,NULL,NULL),(7,'Django','Ceci est un exemple de description','Bases de Python',10,7,NULL,NULL,NULL),(9,'Hashage','Ceci est un exemple de description',NULL,12,8,NULL,NULL,NULL),(10,'Gérer l\'accès par IP','Ceci est un exemple de description',NULL,51,9,NULL,NULL,NULL),(11,'Le scrum board','Ceci est un exemple de description',NULL,10,10,NULL,NULL,NULL),(12,'Installation de sa version Ubuntu','Ceci est un exemple de description',NULL,2,11,NULL,NULL,NULL);
/*!40000 ALTER TABLE `meetings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meetings_meetings`
--

DROP TABLE IF EXISTS `meetings_meetings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meetings_meetings` (
  `meetings_source` int(11) NOT NULL,
  `meetings_target` int(11) NOT NULL,
  PRIMARY KEY (`meetings_source`,`meetings_target`),
  KEY `IDX_C97543AA90B2A764` (`meetings_source`),
  KEY `IDX_C97543AA8957F7EB` (`meetings_target`),
  CONSTRAINT `FK_C97543AA8957F7EB` FOREIGN KEY (`meetings_target`) REFERENCES `meetings` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_C97543AA90B2A764` FOREIGN KEY (`meetings_source`) REFERENCES `meetings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meetings_meetings`
--

LOCK TABLES `meetings_meetings` WRITE;
/*!40000 ALTER TABLE `meetings_meetings` DISABLE KEYS */;
/*!40000 ALTER TABLE `meetings_meetings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20191211084414','2019-12-11 08:44:52'),('20191211090536','2019-12-11 09:05:45'),('20191211151032','2019-12-11 15:11:06'),('20191212095101','2019-12-12 09:51:25'),('20191212145731','2019-12-12 14:57:43'),('20191217091659','2019-12-17 09:23:38'),('20191217092937','2019-12-17 09:29:45'),('20191217101706','2019-12-17 10:17:22'),('20200108135345','2020-01-08 13:53:58'),('20200108141559','2020-01-08 14:16:08'),('20200108141848','2020-01-08 14:18:56'),('20200108143141','2020-01-08 14:31:50'),('20200108143729','2020-01-08 14:37:35'),('20200108144226','2020-01-08 14:43:24'),('20200108144527','2020-01-08 14:45:36'),('20200109083122','2020-01-09 08:31:35'),('20200109101739','2020-01-09 10:19:12'),('20200114145726','2020-01-14 15:00:08'),('20200114150155','2020-01-14 15:02:26'),('20200114150936','2020-01-14 15:09:45');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requirements` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_id` int(11) DEFAULT NULL,
  `participation` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AB259917A15F660A` (`theme_id`),
  CONSTRAINT `FK_AB259917A15F660A` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (1,'C','exemple de description',NULL,NULL,1,NULL),(2,'PHP','exemple de description',NULL,NULL,1,NULL),(3,'Java','exemple de description',NULL,NULL,1,NULL),(4,'C++','exemple de description',NULL,NULL,1,NULL),(5,'Javascript','exemple de description',NULL,NULL,1,NULL),(6,'Rust','exemple de description',NULL,NULL,1,NULL),(7,'Python','exemple de description',NULL,NULL,1,NULL),(8,'Cryptographie','Exemple de description',NULL,NULL,2,NULL),(9,'Administrer son réseau','Exemple de description',NULL,NULL,3,NULL),(10,'Scrum','Exemple de description',NULL,NULL,4,NULL),(11,'Ubuntu','Exemple de description',NULL,NULL,5,NULL);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme`
--

DROP TABLE IF EXISTS `theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme`
--

LOCK TABLES `theme` WRITE;
/*!40000 ALTER TABLE `theme` DISABLE KEYS */;
INSERT INTO `theme` VALUES (1,'Développement','developpement.jpg',NULL),(2,'Sécurité','securite.jpg',NULL),(3,'Réseaux','reseau.jpg',NULL),(4,'Méthodologie','methodologie.jpg',NULL),(5,'Système','systeme.png',NULL);
/*!40000 ALTER TABLE `theme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'user','[\"ROLE_SUBSCRIBER\"]','$argon2id$v=19$m=65536,t=4,p=1$/lg/j/37MUDFIOxzZHvlhg$Vcw8vD+YJLFPnolk+2D8sDGijv5eaK8AlLIK7+tvCWk'),(2,'admin','[\"ROLE_ADMIN\"]','$argon2id$v=19$m=65536,t=4,p=1$RuSPIBNcvgCU0yPz+yqzIw$94fQPAAQ+RkEZjT1TZ4XtC5oU2UMoRF56tr+H6xFJ9g'),(3,'romain','[]','$argon2id$v=19$m=65536,t=4,p=1$09+5OIIUhniZIFEqgFHa1g$geHu5+N7xtoUWVcBQOGiOkY4227xkkxshPfM0cPZ6aY'),(4,'stessie','[]','$argon2id$v=19$m=65536,t=4,p=1$kv3USFFvWDTeKx3+zCLDcg$96gkppD/N5nI8ZwStZuzlULVk4en2l2VKN6xHqU4o70');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-15 13:37:07
