-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: each_user_profile_page
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `audio`
--

DROP TABLE IF EXISTS `audio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id` int(11) NOT NULL,
  `song_name` varchar(150) DEFAULT NULL,
  `singer` varchar(80) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `file` text,
  PRIMARY KEY (`id`),
  KEY `fk_id` (`fk_id`),
  CONSTRAINT `audio_ibfk_1` FOREIGN KEY (`fk_id`) REFERENCES `users_account` (`register_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audio`
--

LOCK TABLES `audio` WRITE;
/*!40000 ALTER TABLE `audio` DISABLE KEYS */;
INSERT INTO `audio` VALUES (1,182,'demo song','demo singer','hindi',''),(2,182,'demo2','aasa','asas','bensound-jazzyfrenchy.mp3'),(3,182,'demo song','kjh','kljh','bensound-jazzyfrenchy.mp3'),(4,182,'demo2','demo singer','hindi','bensound-happyrock.mp3'),(5,182,'demo3','demo singer','hindi','bensound-scifi.mp3'),(6,182,'demo4','lakls','laklsakl','bensound-sweet1.mp3'),(7,182,'Abhishek','sdsd','sdsd','bensound-scifi.mp3'),(8,186,'rap','honey','hindi','Party With the Bhoothnath - Yo Yo Honey Singh.mp3'),(9,186,'Abhishek','demo singer','hindi','Kuch Is Tarah - Atif Aslam - 320Kbps.mp3'),(10,186,'eminem','eminem','english rap','Denace, Drinking About You, Lyrics.mp3'),(11,182,'yadav','yadav','hindi','Koi To Saathi Chahiye(MyMp3Song).mp3'),(12,174,'eminem song','eminem','english rap','Eminem - Guts Over Fear ft. Sia (Official Audio).mp3');
/*!40000 ALTER TABLE `audio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `dob` varchar(45) DEFAULT NULL,
  `address` text,
  `about` text,
  PRIMARY KEY (`id`),
  KEY `fk_id` (`fk_id`),
  CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`fk_id`) REFERENCES `users_account` (`register_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (16,186,'yadav','8840656896','kamal@gmail.com','854585','bhadoi Jila','web designer'),(17,186,'Rohit sir','8604875896','kjhgf','kjhgf','lkjhgf','lkjhgf'),(18,186,'Radha','8604815248','rad@gmail.com','10-1-1990','lok nagar','nice g'),(19,186,'virat','8548548548','virat@gmail.com','10-1-1990','525-sector 22 azad nagar','nice man'),(20,186,'manoj','8548548745','','','',''),(21,186,'Mayank','8844557788','man@gmail.com','78/87/75','ramadevi,kanpur','good man'),(22,186,'Error fixed','8888999910','yeah@gmail.com','10-1-1990','yeahpur','he is a debugger'),(24,186,'demo2','8546985478','demoraja@gmail.com','','',''),(25,182,'ABhishek','8585858000','kjhgg','lkjkhg','kljhghfg','lkjkhjghfg'),(26,182,'kamal','8604812585','kamal@gmail.com','12/02/1996','kamal nagar','good man'),(27,182,'demo1','8548578458','demoraja@gmail.com','8745','',''),(28,174,'kamal','8547854965','kamal','','',''),(33,186,'kjhg','8547841212','','','',''),(34,186,'zebra','8547858745','jhasjkahsjhakjhdkjsd78787sdsd','','',''),(36,186,'ram','8840657854','rghj','wsdf','efgh','dfgbh'),(37,182,'Anurag THE BOSS','9454966462','','','',''),(38,186,'Anurag THE BOSS','8785485401','anurag@example.com','10-1-2000','anurag nagar, kanpur','nice man'),(39,174,'abhay','8865898585','','','','');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_details`
--

DROP TABLE IF EXISTS `my_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `class` varchar(80) DEFAULT NULL,
  `roll_number` varchar(12) DEFAULT NULL,
  `dob` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(12) DEFAULT NULL,
  `blood_group` varchar(8) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `adhar` varchar(16) DEFAULT NULL,
  `address` text,
  `hobbies` text,
  `achievements` text,
  `profile_pic` varchar(255) DEFAULT NULL,
  `goal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id` (`fk_id`),
  CONSTRAINT `my_details_ibfk_1` FOREIGN KEY (`fk_id`) REFERENCES `users_account` (`register_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_details`
--

LOCK TABLES `my_details` WRITE;
/*!40000 ALTER TABLE `my_details` DISABLE KEYS */;
INSERT INTO `my_details` VALUES (1,169,'abhishek','lkil','','2019-03-20','mpo@gmail.com','','A+','California','8975-8545-8956','KLLKK','','','abhay udemi.png',''),(2,169,'abhishek','','','','','','---','---','','','','','',''),(3,169,'abhishek','','','','','','---','---','','','','','',''),(4,169,'abhishek','','','','','','---','---','','','','','',''),(5,169,'abh','','','','','','---','---','','','','','',''),(6,169,'lexia','lkil','','2019-03-14','kjhkj@gmail.com','8840656874','A+','Delaware','8975-8545-8956','hjghfgdghj','jkhg','lkjlhg','best color blue.png','kjhg'),(7,169,'','','','','','','---','---','','','','','',''),(8,169,'','','','','','','---','---','','','','','',''),(9,169,'','','','','','','---','---','','','','','',''),(10,172,'abhishek','','','','','','---','---','','','','','lynda_YADDAV.png',''),(11,172,'abhishek','','','','','','---','---','','','','','RSCN4225.JPG',''),(12,173,'abhishek','','','','','','---','---','','','','','RSCN4225.JPG',''),(13,174,'abhishek','chemical','','','','','---','---','','','','','','mot'),(14,175,'abhishek kamal','','','','','8840656874','---','---','','','','','999620_471603906285443_1813325429_n.jpg',''),(16,177,'abhishek','','','','','','---','---','','','','','66221.jpg',''),(17,178,'Lexi','chemical','','','mpo@gmail.com','8840656874','B+','Florida','8975-8545-8956','klals','as','asa','my car.jpg',''),(21,182,'abhishek','Chemical','1615585458','2019-03-13','kamal@gmail.com','','O+','Idaho','8788-5485-4785','anurag nagar','Eating, Teaching','start','Blender_logo_no_text.svg_.png','Happiness'),(24,185,'Anurag dwivedi','lkil','','','','','---','---','5222-2222-2222','','','','kunj_sir1.jpg',''),(25,186,'Deja vu','Chemical','16166566666','2019-03-14','mpo@gmail.com','8840646874','B+','---','8585-4585-4854','awadhpuri kanpur','Eating, Teaching','Now starting my achievements journey','pluw.png','Happiness');
/*!40000 ALTER TABLE `my_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_account`
--

DROP TABLE IF EXISTS `users_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_account` (
  `register_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `mobile` int(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text,
  `hobby` varchar(255) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `about_you` text,
  PRIMARY KEY (`register_id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_account`
--

LOCK TABLES `users_account` WRITE;
/*!40000 ALTER TABLE `users_account` DISABLE KEYS */;
INSERT INTO `users_account` VALUES (169,'lexi2','','',0,'',45874,'kjhkj@gmail.com','','','55555','step0004.jpg',''),(171,'Yadav','','',0,'',5738366,'abhishekkamal1800@gmail.com','','','55555','',''),(172,'lexi3','','',0,'',5655,'kamal@gmail.com','','','55555','lynda_YADDAV.png','i am good'),(173,'lexi4','','',0,'',58458,'kamal@gmail.com','','','55555','',''),(174,'Abhishek','','',0,'',8840656,'mpo@gmil.com','','','55555','',''),(175,'lexi5','','',0,'',4554855,'lexim1@gmail.com','','','55555','',''),(176,'lexi6','','',0,'',884065,'kamal@gmail.com','','','55555','',''),(177,'lexi7','','',0,'',8840656,'lexi@gmail.comm','','','55555','',''),(178,'lexi','','',0,'',854698,'kamal@gmail.com','','','55555','',''),(182,'demo4','','',0,'',58555,'kamal@gmail.com','','','55555','66221.jpg',''),(185,'anurag','','',0,'',584585,'kamal@gmail.com','','','55555','',''),(186,'demo7','','',0,'',58458,'kjhkj@gmail.com','','','55555','','');
/*!40000 ALTER TABLE `users_account` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-27 20:19:59
