-- MySQL dump 10.16  Distrib 10.1.32-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: kennels
-- ------------------------------------------------------
-- Server version	10.1.32-MariaDB

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
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings` (
  `BookingId` int(11) NOT NULL AUTO_INCREMENT,
  `A_Date` date DEFAULT NULL,
  `D_Date` date DEFAULT NULL,
  `Amount` float(5,2) DEFAULT NULL,
  `Paid_Date` date DEFAULT NULL,
  `custid` tinyint(4) NOT NULL,
  `kennelid` tinyint(4) NOT NULL,
  PRIMARY KEY (`BookingId`),
  KEY `custid` (`custid`),
  KEY `kennelid` (`kennelid`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`custid`) REFERENCES `customer` (`custid`),
  CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`kennelid`) REFERENCES `kennels` (`kennelid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (1,'2018-10-06','2018-10-10',60.00,'2018-10-06',1,1),(2,'2018-10-16','2018-10-18',80.00,'2018-10-16',2,3),(3,'2018-10-16','2018-10-18',60.00,'2018-10-16',2,2),(4,'2018-11-02','2018-11-10',140.00,'2018-11-02',3,1);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `custid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `Fore_Name` varchar(15) NOT NULL,
  `Sur_Name` varchar(20) NOT NULL,
  `Street` varchar(20) DEFAULT NULL,
  `Town` varchar(20) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `County` varchar(20) DEFAULT NULL,
  `Mob_Number` int(11) NOT NULL,
  PRIMARY KEY (`custid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Peter','MC Cafferty','Lougher','Annascaul','Tralee','Kerry',860293969),(2,'Pa','Riordan','null','BallyBunion','Tralee','Kerry',871234567),(3,'Tracey','Brosnan','null','null','Killarney','Kerry',851234567),(4,'Derek','Hunt','Brackloon','Annascaul','','Kerry',851234578);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kennels`
--

DROP TABLE IF EXISTS `kennels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kennels` (
  `kennelid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `kennel_type` varchar(4) NOT NULL,
  `kennel_rate` float(5,2) NOT NULL,
  `status` char(1) NOT NULL,
  `path` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`kennelid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kennels`
--

LOCK TABLES `kennels` WRITE;
/*!40000 ALTER TABLE `kennels` DISABLE KEYS */;
INSERT INTO `kennels` VALUES (1,'sm',20.00,'a','images\\users\\smallKennel.jpg'),(2,'m',30.00,'a','images\\users\\Med.jpg'),(3,'l',40.00,'a','images\\users\\lg.jpg'),(4,'xlg',50.00,'a','images\\users\\xlg.jpg');
/*!40000 ALTER TABLE `kennels` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-05 14:23:23
