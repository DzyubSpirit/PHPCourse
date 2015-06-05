-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: WorkName
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Dziuba','Dzyubavlad@gmail.com','*00A51F3F48415C7D4E8908980D443C29C69B60C9','2015-05-27 17:36:46',1),(2,'Kirill','Vlad19965@mail.ru','*AA803D048B666A933E512AA53B36C70174A37D1E','2015-05-27 18:43:07',1),(3,'Romka','Romka@ukr.net','*F351DF89CD8C39B8FA62BF3011AC3FFF92E13219','2015-05-27 19:33:10',1),(4,'Vovka','FomenkoVladimir@mail.ru','*837C7C87E0E750C1BFBADFB546DF3BDB31F99847','2015-05-27 19:34:21',1),(5,'Geniy','JustMail@s.com','*837C7C87E0E750C1BFBADFB546DF3BDB31F99847','2015-05-27 19:36:25',1),(6,'New_User','SomeEmail.com','4422','1996-08-08 20:07:16',1),(12,'Foma','Foma@gmail.com','566222','2020-11-06 06:06:06',1),(13,'Godzilla','DestroyAll@gmail.com','2412','2013-05-05 12:13:54',0),(14,'Google','googlecorp@google.com','YANDEX_LOH','0000-00-00 00:00:00',1),(15,'SomeBody','WantToEat@somebody.eat','*1C4B4E2049DFD295952B14BFCBB062AA7D5D0C64','0000-00-00 00:00:00',1),(16,'ZenMax','zenmax@alliance.com','*4B290298927B296FA3FC374F6A10B75895E8A045','0000-00-00 00:00:00',1),(17,'Nickname','nickname@gmail.com','*9044419CA9928132E6C32E9118B11C2049EE40E3','0000-00-00 00:00:00',1),(18,'Buchka','Buchka@gmail.com','*B5BBB464D718F03C11EAE9CC5C3ADB651A8685CD','2015-06-03 18:05:44',1),(20,'Kroshka','Kroshka@gmail.com','*41458A682432E0571806D987B1CDA1B0C8D0AA66','0000-00-00 00:00:00',0),(22,'BigGuy','BigGuy@shupay.menya','*698DE0E6E9849AC5E1CE8CD7BA32EF3429903C5D','0000-00-00 00:00:00',0),(24,'Mamka','Mamka@tvoya.net','*E495141931F9B63094DF47AEA5A92B6678B1C961','0000-00-00 00:00:00',1),(25,'Dota2','Dota2@my.love','*273F6C2681B29366BC122726F97B52D3A75F74B9','2015-06-03 18:12:49',1),(26,'LOL','','*2DA21A567609A599B1C6DF7096612C3C4A7DAEE5','0000-00-00 00:00:00',1),(28,'BigDaddy','BigDaddy@gmail.com','*EC795F85C606DC40DCA9B141228A82B36CE835F6','2015-06-04 17:43:22',1),(30,'Volad','deMort@mail.ru','*C3E746C0C58BC11F4DF50B8402B38F7A9649CE8C','2015-06-04 17:47:38',1),(34,'Vodka','Vodka@vezde.net','*016C7CFF3A1A5E4493C75E6DB08DD57AB4F22118','2015-06-04 17:51:07',1),(37,'Zet','Zet@net.net','*AC56C124E47D1FCD858F50816ADE298FE352636D','2015-06-04 17:51:53',1),(39,'BigGunGuy','AK47@gmail.com','*242AE93A97E53F1D154194A0E1A738B67F132CB2','2015-06-04 17:52:20',1),(40,'Zayac','Zayac@volk.zadrot','*64D76E0F4F2C702E1CC466DDF25A8351B216926E','2015-06-04 18:06:36',1),(41,'Spok','Spok@star.track','*84A3C187C6FA11FD056817E5D2C54946F1E58EFB','2015-06-04 18:34:35',1),(44,'Vrungel','Vrungel@po.beda','*D8DADF41D197458B332EA6094E4856D7AB0C59A0','2015-06-04 18:38:08',1),(47,'Merry','Merry@gmail.com','*5881CF205F0BE95303242EADD2C2FB8D280E14FD','2015-06-04 18:57:08',1),(52,'Vlad','Vlad@gmail.com','*A4B6157319038724E3560894F7F932C8886EBFCF','2015-06-04 19:21:10',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishes`
--

DROP TABLE IF EXISTS `wishes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wish_text` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishes`
--

LOCK TABLES `wishes` WRITE;
/*!40000 ALTER TABLE `wishes` DISABLE KEYS */;
INSERT INTO `wishes` VALUES (1,'Fill the wish list',4);
/*!40000 ALTER TABLE `wishes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-05 19:22:42
