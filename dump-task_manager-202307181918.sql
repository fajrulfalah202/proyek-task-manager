-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: task_manager
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `Categories`
--

DROP TABLE IF EXISTS `Categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Categories` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Description` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categories`
--

LOCK TABLES `Categories` WRITE;
/*!40000 ALTER TABLE `Categories` DISABLE KEYS */;
INSERT INTO `Categories` VALUES (1,'Category 1','Description 1'),(2,'Category 2','Description 2'),(3,'Category 3','Description 3'),(4,'Category 4','Description 4'),(5,'Category 5','Description 5'),(6,'Category 6','Description 6'),(7,'Category 7','Description 7'),(8,'Category 8','Description 8'),(9,'Category 9','Description 9'),(10,'Category 10','Description 10');
/*!40000 ALTER TABLE `Categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Priorities`
--

DROP TABLE IF EXISTS `Priorities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Priorities` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Description` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Priorities`
--

LOCK TABLES `Priorities` WRITE;
/*!40000 ALTER TABLE `Priorities` DISABLE KEYS */;
INSERT INTO `Priorities` VALUES (1,'Priority 1','Description 1'),(2,'Priority 2','Description 2'),(3,'Priority 3','Description 3'),(4,'Priority 4','Description 4'),(5,'Priority 5','Description 5'),(6,'Priority 6','Description 6'),(7,'Priority 7','Description 7'),(8,'Priority 8','Description 8'),(9,'Priority 9','Description 9'),(10,'Priority 10','Description 10');
/*!40000 ALTER TABLE `Priorities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TaskUser`
--

DROP TABLE IF EXISTS `TaskUser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TaskUser` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TaskID` int DEFAULT NULL,
  `UserID` int DEFAULT NULL,
  `Role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `TaskID` (`TaskID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `TaskUser_ibfk_1` FOREIGN KEY (`TaskID`) REFERENCES `Tasks` (`ID`),
  CONSTRAINT `TaskUser_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `Users` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TaskUser`
--

LOCK TABLES `TaskUser` WRITE;
/*!40000 ALTER TABLE `TaskUser` DISABLE KEYS */;
INSERT INTO `TaskUser` VALUES (1,1,1,'Assignee'),(2,1,2,'Assignee'),(3,2,1,'Assignee'),(4,2,3,'Assignee'),(5,3,2,'Assignee'),(6,3,4,'Assignee'),(7,4,1,'Assignee'),(8,4,5,'Assignee'),(9,5,3,'Assignee'),(10,5,6,'Assignee'),(11,6,4,'Assignee'),(12,6,7,'Assignee'),(13,7,5,'Assignee'),(14,7,8,'Assignee'),(15,8,6,'Assignee'),(16,8,9,'Assignee'),(17,9,7,'Assignee'),(18,9,10,'Assignee'),(19,10,8,'Assignee'),(20,10,9,'Assignee');
/*!40000 ALTER TABLE `TaskUser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tasks`
--

DROP TABLE IF EXISTS `Tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Tasks` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` text,
  `Deadline` date DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `UserID` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `Tasks_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Users` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tasks`
--

LOCK TABLES `Tasks` WRITE;
/*!40000 ALTER TABLE `Tasks` DISABLE KEYS */;
INSERT INTO `Tasks` VALUES (1,'Task 1','Description 1','2023-07-20','Pending',NULL),(2,'Task 2','Description 2','2023-07-21','Pending',NULL),(3,'Task 3','Description 3','2023-07-22','Pending',NULL),(4,'Task 4','Description 4','2023-07-23','Pending',NULL),(5,'Task 5','Description 5','2023-07-24','Pending',NULL),(6,'Task 6','Description 6','2023-07-25','Pending',NULL),(7,'Task 7','Description 7','2023-07-26','Pending',NULL),(8,'Task 8','Description 8','2023-07-27','Pending',NULL),(9,'Task 9','Description 9','2023-07-28','Pending',NULL),(10,'Task 10','Description 10','2023-07-29','Pending',NULL),(11,'a','sad','2023-07-21','Pending',NULL),(12,'a','a','2023-07-19','Pending',NULL),(13,'a','a','2023-07-19','Pending',NULL),(14,'tugas baru','wadkajwod','2023-07-19','In Progress',NULL),(15,'tuga sbaru2','adasd','2023-07-19','In Progress',NULL),(16,'fasfsa','fasfdsass','2023-07-14','In Progress',NULL);
/*!40000 ALTER TABLE `Tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `passwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'John Doe','john.doe@example.com','$2y$12$L1o.uyvhO4GQVzBtK4ZeoeBoMvDSHf7BAf2CsnuxwMCBpWrzrS58m'),(2,'Jane Smith','jane.smith@example.com','$2y$12$dmKF6HK0FlFasy.oFIzmF.r9/wTeGGOWrnvwk0exWZ7ZDaJaaLN2O'),(3,'Michael Johnson','michael.johnson@example.com','$2y$12$Bbfcqe979DiCzTTJb7dR4uRk9M12pSAnfoSOJ/SZG7SoyvZP4v0DK'),(4,'Emily Wilson','emily.wilson@example.com','$2y$12$J9JY9ecS8VXaNfgMY8RvU.2OZtJ91NPcotXxHYdKMQoItW7TnwT6u'),(5,'David Brown','david.brown@example.com','$2y$12$UyO0qaE6rkqpeH93bjRJSOsGZ32KBH4bnbGBtNkwbqFslsd9TB4U.'),(6,'Sarah Davis','sarah.davis@example.com','$2y$12$FP3nX94bCdS2vS5nY26KxuJzBNI.lHsUzZCzYUYK6lallK7c2ezFa'),(7,'Robert Anderson','robert.anderson@example.com','$2y$12$hMyDIcNkiNa/J7aKRu4zXOhRwLMsHUhZCpDoVB5tmqsY4uByR49uC'),(8,'Jessica Thomas','jessica.thomas@example.com','$2y$12$i.1.nLVSy1VdyOtLG7xitelv6ULp7xWUNFZ4.OY/QdkRJX2V7ozdK'),(9,'William Martinez','william.martinez@example.com','$2y$12$.G724j9KVbIA.j6lPbAoEuGzIds90A0aZmP1c9CMq6mQobSNfxwFq'),(10,'Olivia Taylor','olivia.taylor@example.com','$2y$12$iOBgdtj0PAYbn2MhdcHy3uPfTpNLMbbEEvS2Py.NtYhfFmjAGh7km');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'task_manager'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-18 19:18:01
