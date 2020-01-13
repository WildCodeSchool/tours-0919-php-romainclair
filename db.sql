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
  `subjects_id` int(11) DEFAULT NULL,
  `meetings_id` int(11) DEFAULT NULL,
  `timeslots_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_44FE52E294AF957A` (`subjects_id`),
  KEY `IDX_44FE52E21EAF2177` (`meetings_id`),
  CONSTRAINT `FK_44FE52E21EAF2177` FOREIGN KEY (`meetings_id`) REFERENCES `meetings` (`id`),
  CONSTRAINT `FK_44FE52E294AF957A` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meetings`
--

LOCK TABLES `meetings` WRITE;
/*!40000 ALTER TABLE `meetings` DISABLE KEYS */;
INSERT INTO `meetings` VALUES (1,'Les fonctions','Ceci est un exemple de description d\'atelier','Les variables',12,3,NULL,1),(2,'Les variables','Ceci est un exemple de description d\'atelier',NULL,5,1,1,1),(3,'Symfony','Ceci est un exemple de description d\'atelier','',0,2,NULL,1),(4,'Les boucles','Ceci est un exemple de description d\'atelier','Les variables',9001,4,NULL,1),(5,'Node.js','Ceci est un exemple de description d\'atelier','Base de Javascript',1,5,NULL,1),(6,'Rust pour les nuls','Ceci est un exemple de description d\'atelier','Aucune',0,6,NULL,1),(7,'Django','Ceci est un exemple de description','Bases de Python',10,7,NULL,1),(9,'Hashage','Ceci est un exemple de description',NULL,12,8,NULL,1),(10,'Gérer l\'accès par IP','Ceci est un exemple de description',NULL,51,9,NULL,1),(11,'Le scrum board','Ceci est un exemple de description',NULL,10,10,NULL,1),(12,'Installation de sa version Ubuntu','Ceci est un exemple de description',NULL,2,11,NULL,1);
/*!40000 ALTER TABLE `meetings` ENABLE KEYS */;
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
INSERT INTO `migration_versions` VALUES ('20191211084414','2019-12-11 08:44:52'),('20191211090536','2019-12-11 09:05:45'),('20191211151032','2019-12-11 15:11:06'),('20191212095101','2019-12-12 09:51:25'),('20191212145731','2019-12-12 14:57:43'),('20191217091659','2019-12-17 09:23:38'),('20191217092937','2019-12-17 09:29:45'),('20191217101706','2019-12-17 10:17:22'),('20200108135345','2020-01-08 13:53:58'),('20200108141559','2020-01-08 14:16:08'),('20200108141848','2020-01-08 14:18:56'),('20200108143141','2020-01-08 14:31:50'),('20200108143729','2020-01-08 14:37:35'),('20200108144226','2020-01-08 14:43:24'),('20200108144527','2020-01-08 14:45:36'),('20200109083122','2020-01-09 08:31:35'),('20200109101739','2020-01-09 10:19:12');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requirements` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thematiques_id` int(11) DEFAULT NULL,
  `participation` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AB259917A15F660A` (`thematiques_id`),
  CONSTRAINT `FK_AB259917A15F660A` FOREIGN KEY (`thematiques_id`) REFERENCES `thematiques` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'C','exemple de description',NULL,NULL,1,NULL),(2,'PHP','exemple de description',NULL,NULL,1,NULL),(3,'Java','exemple de description',NULL,NULL,1,NULL),(4,'C++','exemple de description',NULL,NULL,1,NULL),(5,'Javascript','exemple de description',NULL,NULL,1,NULL),(6,'Rust','exemple de description',NULL,NULL,1,NULL),(7,'Python','exemple de description',NULL,NULL,1,NULL),(8,'Cryptographie','Exemple de description',NULL,NULL,2,NULL),(9,'Administrer son réseau','Exemple de description',NULL,NULL,3,NULL),(10,'Scrum','Exemple de description',NULL,NULL,4,NULL),(11,'Ubuntu','Exemple de description',NULL,NULL,5,NULL),(12,'asq','ds','qd','Capture d’écran de 2019-10-17 22-54-25-5e1c890c30fc0.png',NULL,1),(13,'d','d','d','Capture du 2019-12-04 10-33-03-5e1c8a285755d.png',NULL,1),(14,'e','s','s','Capture du 2019-10-23 15-17-30-5e1c8dff5b966.png',NULL,1),(15,'fv','sq','sq','Capture d’écran de 2019-12-21 20-55-30-5e1c8e1df40a1.png',NULL,1),(16,'fv','sq','sq','Capture d’écran de 2019-12-21 20-55-30-5e1c916314cb1.png',NULL,1),(17,'fv','sq','sq','Capture d’écran de 2019-12-21 20-55-30-5e1c924a748e7.png',NULL,1),(18,'fv','sq','sq','Capture d’écran de 2019-12-21 20-55-30-5e1c951a0d2ef.png',NULL,1),(19,'fv','sq','sq','Capture d’écran de 2019-12-21 20-55-30-5e1c95eab5564.png',NULL,1);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thematiques`
--

DROP TABLE IF EXISTS `thematiques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thematiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thematiques`
--

LOCK TABLES `thematiques` WRITE;
/*!40000 ALTER TABLE `thematiques` DISABLE KEYS */;
INSERT INTO `thematiques` VALUES (1,'Développement','developpement.jpg',NULL),(2,'Sécurité','securite.jpg',NULL),(3,'Réseaux','reseau.jpg',NULL),(4,'Méthodologie','methodologie.jpg',NULL),(5,'Système','systeme.png',NULL);
/*!40000 ALTER TABLE `thematiques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timeslots`
--

DROP TABLE IF EXISTS `timeslots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timeslots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `meetings_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_38EC4CE61EAF2177` (`meetings_id`),
  CONSTRAINT `FK_38EC4CE61EAF2177` FOREIGN KEY (`meetings_id`) REFERENCES `meetings` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timeslots`
--

LOCK TABLES `timeslots` WRITE;
/*!40000 ALTER TABLE `timeslots` DISABLE KEYS */;
INSERT INTO `timeslots` VALUES (1,'2020-09-01',NULL);
/*!40000 ALTER TABLE `timeslots` ENABLE KEYS */;
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

-- Dump completed on 2020-01-13 17:33:38
