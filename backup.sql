-- MySQL dump 10.13  Distrib 8.0.45, for Linux (x86_64)
--
-- Host: localhost    Database: books
-- ------------------------------------------------------
-- Server version	8.0.45-0ubuntu0.24.04.1

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
-- Table structure for table `book_genres`
--

DROP TABLE IF EXISTS `book_genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_genres` (
  `genre_id` int NOT NULL,
  `genre_code` varchar(10) NOT NULL,
  `genre_name` varchar(255) NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_genres`
--

LOCK TABLES `book_genres` WRITE;
/*!40000 ALTER TABLE `book_genres` DISABLE KEYS */;
INSERT INTO `book_genres` VALUES (1,'FIC','Fiction','2026-02-18 17:26:31','2026-02-18 17:26:31'),(2,'MYS','Mystery','2026-02-18 17:26:31','2026-02-18 17:26:31'),(3,'TXT','Textbook','2026-02-18 17:26:31','2026-02-18 17:26:31');
/*!40000 ALTER TABLE `book_genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_listing`
--

DROP TABLE IF EXISTS `book_listing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_listing` (
  `book_id` int NOT NULL,
  `book_code` varchar(10) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_description` text,
  `book_author` varchar(255) NOT NULL,
  `book_genre` varchar(255) DEFAULT NULL,
  `book_genre_id` int DEFAULT '0',
  `book_buy_price` decimal(10,2) NOT NULL,
  `book_sell_price` decimal(10,2) NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`book_id`),
  KEY `book_genre_id` (`book_genre_id`),
  CONSTRAINT `book_listing_ibfk_1` FOREIGN KEY (`book_genre_id`) REFERENCES `book_genres` (`genre_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_listing`
--

LOCK TABLES `book_listing` WRITE;
/*!40000 ALTER TABLE `book_listing` DISABLE KEYS */;
INSERT INTO `book_listing` VALUES (1,'B001','The Great Gatsby','A novel set in the Roaring Twenties.','F. Scott Fitzgerald','Fiction',1,10.00,15.00,'2026-02-18 17:27:29','2026-02-18 17:27:29'),(2,'B002','The Hound of the Baskervilles','A mystery novel featuring Sherlock Holmes.','Arthur Conan Doyle','Mystery',2,8.00,12.00,'2026-02-18 17:27:29','2026-02-18 17:27:29'),(3,'B003','Introduction to Algorithms','A comprehensive textbook on algorithms.','Thomas H. Cormen','Textbook',3,50.00,75.00,'2026-02-18 17:27:29','2026-02-18 17:27:29'),(4,'B004','To Kill a Mockingbird','A novel about racial injustice in the Deep South.','Harper Lee','Fiction',1,12.00,18.00,'2026-02-25 02:26:53','2026-02-25 02:26:53'),(5,'B005','1984','A dystopian novel about totalitarianism.','George Orwell','Fiction',1,9.00,14.00,'2026-02-25 02:26:53','2026-02-25 02:26:53'),(6,'B006','The Catcher in the Rye','A novel about teenage rebellion and angst.','J.D. Salinger','Fiction',1,11.00,16.00,'2026-02-25 02:26:53','2026-02-25 02:26:53'),(7,'B007','Pride and Prejudice','A classic novel about love and social class.','Jane Austen','Fiction',1,10.00,15.00,'2026-02-25 02:26:53','2026-02-25 02:26:53'),(8,'B008','And Then There Were None','A mystery novel by Agatha Christie.','Agatha Christie','Mystery',2,7.00,10.00,'2026-02-25 02:26:53','2026-02-25 02:26:53'),(9,'B009','The Great Alone','A novel about survival in the Alaskan wilderness.','Kristin Hannah','Mystery',2,12.00,18.00,'2026-02-25 02:26:53','2026-02-25 02:26:53'),(10,'B010','The Silent Patient','A psychological thriller about a woman\'s act of violence.','Alex Michaelides','Mystery',2,9.00,14.00,'2026-02-25 02:26:53','2026-02-25 02:26:53'),(11,'B011','The Alchemist','A novel about a shepherd\'s journey to find treasure.','Paulo Coelho','Mystery',2,10.00,15.00,'2026-02-25 02:26:53','2026-02-25 02:26:53'),(12,'B012','C++ For Dummies','A beginner\'s guide to C++ programming.','Stephen R. Davis','Textbook',3,30.00,45.00,'2026-02-25 02:26:53','2026-02-25 02:26:53'),(13,'B013','The Pragmatic Programmer','A guide to becoming a better programmer.','Andrew Hunt','Textbook',3,40.00,60.00,'2026-02-25 02:26:53','2026-02-25 02:26:53'),(14,'B014','Clean Code','A handbook of agile software craftsmanship.','Robert C. Martin','Textbook',3,35.00,50.00,'2026-02-25 02:26:53','2026-02-25 02:26:53'),(15,'B015','Design Patterns','Elements of Reusable Object-Oriented Software.','Erich Gamma','Textbook',3,45.00,70.00,'2026-02-25 02:26:53','2026-02-25 02:26:53');
/*!40000 ALTER TABLE `book_listing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_users`
--

DROP TABLE IF EXISTS `book_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_users` (
  `book_user_id` int NOT NULL AUTO_INCREMENT,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `pronouns` varchar(60) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`book_user_id`),
  UNIQUE KEY `email_address` (`email_address`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_users`
--

LOCK TABLES `book_users` WRITE;
/*!40000 ALTER TABLE `book_users` DISABLE KEYS */;
INSERT INTO `book_users` VALUES (1,'xpucha@books.com','5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8','He/Him','alex','pucha','887-9075','2026-02-04 17:30:17','2026-02-04 17:30:17'),(2,'radachi@books.com','5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8','She/It','rei','adachi','123-5555','2026-02-04 17:30:19','2026-02-04 17:30:19'),(3,'hkoch@books.com','5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8','She/Her','honey','koch','416-8888','2026-02-04 17:30:23','2026-02-04 17:30:23');
/*!40000 ALTER TABLE `book_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-02-24 22:16:49
