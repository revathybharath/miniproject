-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `CreatedOn` datetime NOT NULL DEFAULT '2016-07-01 00:00:01',
  `RoleId` int(11) NOT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `Email` (`Email`),
  KEY `Relationship13` (`RoleId`),
  CONSTRAINT `Relationship13` FOREIGN KEY (`RoleId`) REFERENCES `AuthorisationRole` (`RoleId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (5,'Katrina','Dorn','katrinadorn@gmail.com','$2y$10$9fY/Nz.pjl5crwadAndn5uRExYeG0bgEkPHrWXpQpoVYysahIdeMG','','1970-01-01 00:00:01',1),(6,'Connie','ODonnell','sample@email.com','$2y$10$GPu7Hc.xBtOnTUiGgSnyDeKXE5YyX5mzT1JqDBfTZHOR6cCozQmj6','','1970-01-01 00:00:01',1),(7,'Tisha','Daniels','test@email.com','$2y$10$IjBkWxES7j1oNkVqAOrQvucAAo323RTwD.oOUS2fzM7xbvmw5GQr2','','1970-01-01 00:00:01',1),(9,'Revathy','Bharath','testtest@email.com','$2y$10$FdANDds9pKpdkw4HcR.JO.C6.mHsiHlIGCfOi6IXSknRZUp0Ts6aq','','1970-01-01 00:00:01',1);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-20 21:08:15
