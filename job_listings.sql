-- MySQL dump 10.13  Distrib 8.0.30, for macos12.4 (arm64)
--
-- Host: localhost    Database: job_listings
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `listings`
--

DROP TABLE IF EXISTS `listings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `listings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `listings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listings`
--

LOCK TABLES `listings` WRITE;
/*!40000 ALTER TABLE `listings` DISABLE KEYS */;
INSERT INTO `listings` VALUES (25,11,'One','asdlkfjhasdjklfgdasjklfgaesyuiogfaeryuiosfghadslkfgdsalkfgyuierawghaiusldkgfhawriyufgklahlsasdlkfjhasdjklfgdasjklfgaesyuiogfaeryuiosfghadslkfgdsalkfgyuierawghaiusldkgfhawriyufgklahlsasdlkfjhasdjklfgdasjklfgaesyuiogfaeryuiosfghadslkfgdsalkfgyuierawghaiusldkgfhawriyufgklahls','2022-08-18 22:11:22'),(32,35,'Junior Web Developer','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan imperdiet neque, in accumsan nisl mattis in. Donec rutrum tempus vestibulum. Curabitur semper molestie auctor. Cras ut risus sed augue porta euismod. Sed luctus hendrerit odio vel feugiat. Nunc justo nulla, bibendum vitae ultricies non, consequat sed nulla. Aenean odio augue, cursus faucibus nunc eget, venenatis condimentum ante. Aliquam interdum rhoncus quam eu vehicula. Mauris bibendum elementum arcu at mattis. Pellentesque eleifend sodales tortor. Curabitur rhoncus nunc vel nulla feugiat, ut egestas metus pellentesque. Aliquam bibendum efficitur nunc, sed fermentum ex aliquet a. Nunc ac nisi lectus. Nulla elementum iaculis.','2022-08-19 23:47:44'),(33,35,'Medior Web Developer','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan imperdiet neque, in accumsan nisl mattis in. Donec rutrum tempus vestibulum. Curabitur semper molestie auctor. Cras ut risus sed augue porta euismod. Sed luctus hendrerit odio vel feugiat. Nunc justo nulla, bibendum vitae ultricies non, consequat sed nulla. Aenean odio augue, cursus faucibus nunc eget, venenatis condimentum ante. Aliquam interdum rhoncus quam eu vehicula. Mauris bibendum elementum arcu at mattis. Pellentesque eleifend sodales tortor. Curabitur rhoncus nunc vel nulla feugiat, ut egestas metus pellentesque. Aliquam bibendum efficitur nunc, sed fermentum ex aliquet a. Nunc ac nisi lectus. Nulla elementum iaculis.','2022-08-19 23:47:51'),(34,11,'Senior Web Developer','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan imperdiet neque, in accumsan nisl mattis in. Donec rutrum tempus vestibulum. Curabitur semper molestie auctor. Cras ut risus sed augue porta euismod. Sed luctus hendrerit odio vel feugiat. Nunc justo nulla, bibendum vitae ultricies non, consequat sed nulla. Aenean odio augue, cursus faucibus nunc eget, venenatis condimentum ante. Aliquam interdum rhoncus quam eu vehicula. Mauris bibendum elementum arcu at mattis. Pellentesque eleifend sodales tortor. Curabitur rhoncus nunc vel nulla feugiat, ut egestas metus pellentesque. Aliquam bibendum efficitur nunc, sed fermentum ex aliquet a. Nunc ac nisi lectus. Nulla elementum iaculis.','2022-08-19 23:47:54'),(35,11,'Web Developer Team Lead','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan imperdiet neque, in accumsan nisl mattis in. Donec rutrum tempus vestibulum. Curabitur semper molestie auctor. Cras ut risus sed augue porta euismod. Sed luctus hendrerit odio vel feugiat. Nunc justo nulla, bibendum vitae ultricies non, consequat sed nulla. Aenean odio augue, cursus faucibus nunc eget, venenatis condimentum ante. Aliquam interdum rhoncus quam eu vehicula. Mauris bibendum elementum arcu at mattis. Pellentesque eleifend sodales tortor. Curabitur rhoncus nunc vel nulla feugiat, ut egestas metus pellentesque. Aliquam bibendum efficitur nunc, sed fermentum ex aliquet a. Nunc ac nisi lectus. Nulla elementum iaculis.','2022-08-19 23:47:59'),(36,35,'Blockchain Developer','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan imperdiet neque, in accumsan nisl mattis in. Donec rutrum tempus vestibulum. Curabitur semper molestie auctor. Cras ut risus sed augue porta euismod. Sed luctus hendrerit odio vel feugiat. Nunc justo nulla, bibendum vitae ultricies non, consequat sed nulla. Aenean odio augue, cursus faucibus nunc eget, venenatis condimentum ante. Aliquam interdum rhoncus quam eu vehicula. Mauris bibendum elementum arcu at mattis. Pellentesque eleifend sodales tortor. Curabitur rhoncus nunc vel nulla feugiat, ut egestas metus pellentesque. Aliquam bibendum efficitur nunc, sed fermentum ex aliquet a. Nunc ac nisi lectus. Nulla elementum iaculis.','2022-08-19 23:48:02'),(37,11,'DevOps','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan imperdiet neque, in accumsan nisl mattis in. Donec rutrum tempus vestibulum. Curabitur semper molestie auctor. Cras ut risus sed augue porta euismod. Sed luctus hendrerit odio vel feugiat. Nunc justo nulla, bibendum vitae ultricies non, consequat sed nulla. Aenean odio augue, cursus faucibus nunc eget, venenatis condimentum ante. Aliquam interdum rhoncus quam eu vehicula. Mauris bibendum elementum arcu at mattis. Pellentesque eleifend sodales tortor. Curabitur rhoncus nunc vel nulla feugiat, ut egestas metus pellentesque. Aliquam bibendum efficitur nunc, sed fermentum ex aliquet a. Nunc ac nisi lectus. Nulla elementum iaculis.','2022-08-19 23:49:06'),(38,35,'UX Tester','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan imperdiet neque, in accumsan nisl mattis in. Donec rutrum tempus vestibulum. Curabitur semper molestie auctor. Cras ut risus sed augue porta euismod. Sed luctus hendrerit odio vel feugiat. Nunc justo nulla, bibendum vitae ultricies non, consequat sed nulla. Aenean odio augue, cursus faucibus nunc eget, venenatis condimentum ante. Aliquam interdum rhoncus quam eu vehicula. Mauris bibendum elementum arcu at mattis. Pellentesque eleifend sodales tortor. Curabitur rhoncus nunc vel nulla feugiat, ut egestas metus pellentesque. Aliquam bibendum efficitur nunc, sed fermentum ex aliquet a. Nunc ac nisi lectus. Nulla elementum iaculis.','2022-08-19 23:49:10'),(39,35,'Graphic Designer','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan imperdiet neque, in accumsan nisl mattis in. Donec rutrum tempus vestibulum. Curabitur semper molestie auctor. Cras ut risus sed augue porta euismod. Sed luctus hendrerit odio vel feugiat. Nunc justo nulla, bibendum vitae ultricies non, consequat sed nulla. Aenean odio augue, cursus faucibus nunc eget, venenatis condimentum ante. Aliquam interdum rhoncus quam eu vehicula. Mauris bibendum elementum arcu at mattis. Pellentesque eleifend sodales tortor. Curabitur rhoncus nunc vel nulla feugiat, ut egestas metus pellentesque. Aliquam bibendum efficitur nunc, sed fermentum ex aliquet a. Nunc ac nisi lectus. Nulla elementum iaculis.','2022-08-19 23:49:17'),(40,11,'UI Tester','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan imperdiet neque, in accumsan nisl mattis in. Donec rutrum tempus vestibulum. Curabitur semper molestie auctor. Cras ut risus sed augue porta euismod. Sed luctus hendrerit odio vel feugiat. Nunc justo nulla, bibendum vitae ultricies non, consequat sed nulla. Aenean odio augue, cursus faucibus nunc eget, venenatis condimentum ante. Aliquam interdum rhoncus quam eu vehicula. Mauris bibendum elementum arcu at mattis. Pellentesque eleifend sodales tortor. Curabitur rhoncus nunc vel nulla feugiat, ut egestas metus pellentesque. Aliquam bibendum efficitur nunc, sed fermentum ex aliquet a. Nunc ac nisi lectus. Nulla elementum iaculis.','2022-08-19 23:49:29'),(41,35,'Quality Assurance','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan imperdiet neque, in accumsan nisl mattis in. Donec rutrum tempus vestibulum. Curabitur semper molestie auctor. Cras ut risus sed augue porta euismod. Sed luctus hendrerit odio vel feugiat. Nunc justo nulla, bibendum vitae ultricies non, consequat sed nulla. Aenean odio augue, cursus faucibus nunc eget, venenatis condimentum ante. Aliquam interdum rhoncus quam eu vehicula. Mauris bibendum elementum arcu at mattis. Pellentesque eleifend sodales tortor. Curabitur rhoncus nunc vel nulla feugiat, ut egestas metus pellentesque. Aliquam bibendum efficitur nunc, sed fermentum ex aliquet a. Nunc ac nisi lectus. Nulla elementum iaculis.','2022-08-19 23:49:44');
/*!40000 ALTER TABLE `listings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin'),(2,'user');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `role_id` int NOT NULL DEFAULT '2',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `profile_picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (11,'savami','sava@outlook.com','6556629ae1a506689808356d93503b76',1,'Sava','Miljkovic','1660944643_7c31590f-0023-4ac2-9cc2-b3694bf1f3d2.jpeg'),(15,'v.ozi','velimir@ozi.com','25f9e794323b453885f5181f1b624d0b',2,'Velimir','Ozi',NULL),(16,'d.klopas','dinesh@klopas.com','25f9e794323b453885f5181f1b624d0b',2,'Dinesh','Klopas',NULL),(18,'d.viljar','damianos@viljar.com','25f9e794323b453885f5181f1b624d0b',2,'Damianos','Viljar',NULL),(26,'j.hanne','juta@hanne.com','25d55ad283aa400af464c76d713c07ad',2,'Juta','Hanne',NULL),(35,'tester','test@test.com','532676f172108201adec6f963fe95615',2,'Testing','User',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-20  0:04:17
