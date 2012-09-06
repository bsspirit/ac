-- MySQL dump 10.13  Distrib 5.1.56, for redhat-linux-gnu (i386)
--
-- Host: localhost    Database: webtool
-- ------------------------------------------------------
-- Server version	5.1.56-log

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
-- Table structure for table `t_finance_balance`
--

DROP TABLE IF EXISTS `t_finance_balance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_finance_balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL,
  `money` float NOT NULL DEFAULT '0',
  `pay_type` enum('input','output') DEFAULT NULL,
  `pay_mode` enum('cash','visa') DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_finance_balance`
--

LOCK TABLES `t_finance_balance` WRITE;
/*!40000 ALTER TABLE `t_finance_balance` DISABLE KEYS */;
INSERT INTO `t_finance_balance` VALUES (1,20111207,170,'output','cash','买路由器+无线鼠标','2011-12-08 09:13:25'),(2,20111206,3100,'input','cash','工资','2011-12-08 09:29:30'),(3,20111208,232,'input','cash','去欧洲的30000押金到期利息结算','2011-12-08 09:30:51');
/*!40000 ALTER TABLE `t_finance_balance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_website`
--

DROP TABLE IF EXISTS `t_website`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_website` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `url` varchar(128) NOT NULL,
  `grade` int(11) DEFAULT '0',
  `cid` int(11) DEFAULT '0',
  `image` varchar(256) DEFAULT NULL,
  `icon` varchar(256) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_website`
--

LOCK TABLES `t_website` WRITE;
/*!40000 ALTER TABLE `t_website` DISABLE KEYS */;
INSERT INTO `t_website` VALUES (1,'Google','www.google.com',0,1,'/images/screen/google.com.hk.png','/images/icon/google.com.hk.ico','2011-12-05 00:39:55'),(2,'奥城兴业','www.ac-999.com',0,2,'/images/screen/ac-999.com.png','/images/icon/ac-999.com.ico','2011-12-05 00:39:56'),(3,'龙仙山安吉白茶','www.100rmb.info',0,2,'/images/screen/100rmb.info.png','/images/icon/100rmb.info.ico','2011-12-05 00:39:56'),(4,'Localhost:安吉白茶','loc.100rmb.info',0,3,'/images/screen/loc.100rmb.info.png',NULL,'2011-12-05 00:39:56'),(5,'Localhost:奥城兴业','loc.ac-999.com',0,3,'/images/screen/loc.ac-999.com.png',NULL,'2011-12-05 00:39:57'),(6,'Localhost:网站工具','loc.tao6s.com',0,3,'/images/screen/loc.tao6s.com.png',NULL,'2011-12-05 00:39:57'),(7,'皮皮书屋','www.ppurl.com',0,1,'/images/screen/ppurl.com.png',NULL,'2011-12-05 00:39:57'),(8,'WebQQ','web.qq.com',0,1,'/images/screen/web.qq.com.png',NULL,'2011-12-05 00:39:58'),(9,'Mahout','mahout.apahce.org',0,1,'/images/screen/mahout.apache.org.png','/images/icon/mahout.apache.org.ico','2011-12-05 00:39:58'),(10,'在线词典','dict.cn',0,1,'/images/screen/dict.cn.png',NULL,'2011-12-05 00:39:58'),(11,'GitHub','github.com',0,1,'/images/screen/github.com.png',NULL,'2011-12-05 00:39:58'),(14,'天际网 | www.tianji.com | 中国职业人士首选网','www.tianji.com',0,1,'/images/screen/tianji.com.png','/images/icon/tianji.com.ico','2011-12-08 08:42:15'),(15,'jQuery: The Write Less, Do More,','www.jquery.com',0,1,'/images/screen/jquery.com.png','/images/icon/jquery.com.ico','2011-12-08 08:46:27'),(16,'PHP: Hypertext Preprocessor','www.php.net',0,1,'/images/screen/php.net.png','/images/icon/php.net.ico','2011-12-08 09:34:58');
/*!40000 ALTER TABLE `t_website` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_website_catalog`
--

DROP TABLE IF EXISTS `t_website_catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_website_catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `seq` int(11) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_website_catalog`
--

LOCK TABLES `t_website_catalog` WRITE;
/*!40000 ALTER TABLE `t_website_catalog` DISABLE KEYS */;
INSERT INTO `t_website_catalog` VALUES (1,'常用站点',1,'2011-12-05 00:40:01'),(2,'我的网站',3,'2011-12-05 00:40:01'),(3,'本地站点',2,'2011-12-05 00:40:02');
/*!40000 ALTER TABLE `t_website_catalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_website_order`
--

DROP TABLE IF EXISTS `t_website_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_website_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wid` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wid` (`wid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_website_order`
--

LOCK TABLES `t_website_order` WRITE;
/*!40000 ALTER TABLE `t_website_order` DISABLE KEYS */;
INSERT INTO `t_website_order` VALUES (1,1,10,'2011-12-05 00:40:02'),(2,2,100,'2011-12-05 00:40:02'),(3,3,99,'2011-12-05 00:40:03'),(4,4,1000,'2011-12-05 00:40:03'),(5,5,999,'2011-12-05 00:40:03'),(6,6,998,'2011-12-05 00:40:03'),(7,7,9,'2011-12-05 00:40:04'),(8,8,8,'2011-12-05 00:40:04'),(9,9,7,'2011-12-05 00:40:04'),(10,10,6,'2011-12-05 00:40:05');
/*!40000 ALTER TABLE `t_website_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_website_tag`
--

DROP TABLE IF EXISTS `t_website_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_website_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wid` int(11) NOT NULL,
  `tag` varchar(32) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wid` (`wid`,`tag`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_website_tag`
--

LOCK TABLES `t_website_tag` WRITE;
/*!40000 ALTER TABLE `t_website_tag` DISABLE KEYS */;
INSERT INTO `t_website_tag` VALUES (1,1,'搜索引擎','2011-12-05 00:39:59'),(2,2,'奥城兴业','2011-12-05 00:39:59'),(3,2,'中央空调','2011-12-05 00:39:59'),(4,3,'安吉白茶','2011-12-05 00:40:00'),(5,4,'安吉白茶','2011-12-05 00:40:00'),(6,4,'奥城兴业','2011-12-05 00:40:00'),(7,7,'资源下载','2011-12-05 00:40:00');
/*!40000 ALTER TABLE `t_website_tag` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-12-08  5:38:22
