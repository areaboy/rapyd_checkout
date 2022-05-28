-- MySQL dump 10.19  Distrib 10.3.34-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: rapyd_checkout
-- ------------------------------------------------------
-- Server version	10.3.34-MariaDB-log-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_time` varchar(100) DEFAULT NULL,
  `timing` varchar(100) DEFAULT NULL,
  `rapyd_key` text DEFAULT NULL,
  `rapyd_secret` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'rapyd','rapyd','$2y$04$rvt/ostGeoJuJoKQxwNQPu0/8ODTEtHdQu7oSSb.PoGuGF7eyy08W','Thursday, May 26, 2022, 5:05 pm','1653599130',NULL,NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `cart_session` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `shipping_rate` varchar(100) DEFAULT NULL,
  `total_amount` varchar(100) DEFAULT NULL,
  `total_amount1` varchar(100) DEFAULT NULL,
  `product_title` varchar(150) DEFAULT NULL,
  `product_photo` varchar(150) DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `timer1` varchar(100) DEFAULT NULL,
  `timer2` varchar(100) DEFAULT NULL,
  `cart_status` varchar(50) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `discount` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (76,'annball@gmail.com','Ann Ball','Broadway 10012, New York, NY, USA','123','USA','1653157709','120','1653033632','2','362','362','Rapyd Product 1','good1653033631.png','3','1653157756','Saturday, May 21, 2022, 2:29 pm','activated',NULL,'0'),(77,'annball@gmail.com','Ann Ball','Broadway 10012, New York, NY, USA','123','USA','1653157709','70','1653033732','4','144','144','Rapyd Product 2','good1653033732.png','2','1653157844','Saturday, May 21, 2022, 2:30 pm','activated',NULL,'0'),(78,'esedofredrick@gmail.com','venus johnson','Broadway 10012, New York, NY, USA','123','USA','1653157991','62','1653033836','2','188','188','Rapyd Product 3','good1653033836.png','3','1653158091','Saturday, May 21, 2022, 2:34 pm','abandon',NULL,'0'),(79,'esedofredrick@gmail.com','venus johnson','Broadway 10012, New York, NY, USA','123','USA','1653157991','62','1653033836','2','126','126','Rapyd Product 3','good1653033836.png','2','1653158114','Saturday, May 21, 2022, 2:35 pm','abandon',NULL,'0'),(80,'esedofredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','USA','1653157783','62','1653033836','2','126','126','Rapyd Product 3','good1653033836.png','2','1653158213','Saturday, May 21, 2022, 2:36 pm','saved','No money in my Card','0'),(81,'esedofredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','USA','1653157783','70','1653033732','4','144','144','Rapyd Product 2','good1653033732.png','2','1653158227','Saturday, May 21, 2022, 2:37 pm','saved',' my credit Card has expired','0'),(82,'esedofredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','USA','1653157783','62','1653033836','2','126','126','Rapyd Product 3','good1653033836.png','2','1653158240','Saturday, May 21, 2022, 2:37 pm','saved','Please I forgot my credit Card','0'),(83,'henry@gmail.com','Henry Obasi','Broadway 10012, New York, NY, USA','123','USA','1653158390','62','1653033836','2','126','126','Rapyd Product 3','good1653033836.png','2','1653158446','Saturday, May 21, 2022, 2:40 pm','activated',NULL,'0'),(84,'esedofredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','USA','1653158605','62','1653033836','2','188','188','Rapyd Product 3','good1653033836.png','3','1653159789','Saturday, May 21, 2022, 3:03 pm','abandon',NULL,'0'),(85,'esedofredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','USA','1653159882','62','1653033836','2','188','188','Rapyd Product 3','good1653033836.png','3','1653160008','Saturday, May 21, 2022, 3:06 pm','activated',NULL,'0'),(86,'esedofredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','USA','1653159882','70','1653033732','4','214','214','Rapyd Product 2','good1653033732.png','3','1653160054','Saturday, May 21, 2022, 3:07 pm','activated',NULL,'0'),(89,'richard@gmail.com','richard','Broadway 10012, New York, NY, USA','123','USA','1653201191','62','1653033836','2','126','126','Rapyd Product 3','good1653033836.png','2','1653201951','Sunday, May 22, 2022, 2:45 am','activated',NULL,'0'),(91,'richard@gmail.com','Richard Clark','Broadway 10012, New York, NY, USA','123','USA','1653202349','62','1653033836','2','188','188','Rapyd Product 3','good1653033836.png','3','1653202770','Sunday, May 22, 2022, 2:59 am','activated',NULL,'0'),(92,'esedofredrick@gmail.com','Fredrick Johnson','Broadway 10012, New York, NY, USA','123','USA','1653204028','62','1653033836','2','188','188','Rapyd Product 3','good1653033836.png','3','1653204556','Sunday, May 22, 2022, 3:29 am','activated','I will be back later,  I did not know that my Credrit Card has expired... ','0'),(93,'esedofredrick@gmail.com','Venus Johnson','Broadway 10012, New York, NY, USA','123','USA','1653204624','62','1653033836','2','188','188','Rapyd Product 3','good1653033836.png','3','1653205140','Sunday, May 22, 2022, 3:39 am','activated',NULL,'0'),(96,'fredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','USA','1653307115','62','1653033836','2','188','188','Rapyd Product 3','good1653033836.png','3','1653307457','Monday, May 23, 2022, 8:04 am','activated',NULL,'0'),(97,'fredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','USA','1653307115','70','1653033732','4','144','144','Rapyd Product 2','good1653033732.png','2','1653307478','Monday, May 23, 2022, 8:04 am','activated',NULL,'0'),(106,'esedofredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','United States','1653614306','62','1653033836','2','126','126','Rapyd Product 3','good1653033836.png','2','1653614923','Thursday, May 26, 2022, 9:28 pm','abandon',NULL,'0'),(122,'esedofredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','United States','1653712732','62','1653033836','2','126','126','Rapyd Product 3','good1653033836.png','2','1653713106','Saturday, May 28, 2022, 12:45 am','activated',NULL,'0'),(123,'esedofredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','United States','1653712732','70','1653033732','4','214','214','Rapyd Product 2','good1653033732.png','3','1653713140','Saturday, May 28, 2022, 12:45 am','activated',NULL,'0'),(124,'esedofredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','United States','1653713310','62','1653033836','2','188','188','Rapyd Product 3','good1653033836.png','3','1653713454','Saturday, May 28, 2022, 12:50 am','activated',NULL,'0'),(125,'esedofredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','United States','1653717626','62','1653033836','2','188','188','Rapyd Product 3','good1653033836.png','3','1653735489','Saturday, May 28, 2022, 6:58 am','activated',NULL,'0'),(126,'esedofredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','United States','1653735638','62','1653033836','2','188','188','Rapyd Product 3','good1653033836.png','3','1653735676','Saturday, May 28, 2022, 7:01 am','activated',NULL,'0'),(128,'esedofredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','United States','1653736604','70','1653033732','4','284','284','Rapyd Product 2','good1653033732.png','4','1653737169','Saturday, May 28, 2022, 7:26 am','activated','My Credit having Issues','0'),(129,'esedofredrick@gmail.com','Ese Ann','sss','ssss','Canada','1653741247','62','1653033836','2','126','126','Rapyd Product 3','good1653033836.png','2','1653741783','Saturday, May 28, 2022, 8:43 am','activated','dddddd','0');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `cart_session` varchar(100) DEFAULT NULL,
  `merchant_reference_id` varchar(100) DEFAULT NULL,
  `checkout_pageid` text DEFAULT NULL,
  `total_amount` varchar(50) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `payment_id` text DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (71,'annball@gmail.com','Ann Ball','1653157709','1653157756','checkout_7eb682e771d24cd0ab1c00c3beb4da4c','362','2','payment_b28e5646b597eedb923bac3496b7115d','CLO'),(72,'annball@gmail.com','Ann Ball','1653157709','1653157844','checkout_7eb682e771d24cd0ab1c00c3beb4da4c','144','2','payment_b28e5646b597eedb923bac3496b7115d','CLO'),(73,'esedofredrick@gmail.com','Esedo Fredrick','1653157783','1653158213','checkout_5d01bbb98593f6190f8d235805e7aa00','126','2','0','ACT'),(74,'esedofredrick@gmail.com','Esedo Fredrick','1653157783','1653158227','checkout_5d01bbb98593f6190f8d235805e7aa00','144','2','0','ACT'),(75,'esedofredrick@gmail.com','Esedo Fredrick','1653157783','1653158240','checkout_5d01bbb98593f6190f8d235805e7aa00','126','2','0','ACT'),(76,'henry@gmail.com','Henry Obasi','1653158390','1653158446','checkout_c5860b357625bdda9a7913986e968321','126','2','payment_bbc9a117173a745d114127c56ead0be4','CLO'),(77,'esedofredrick@gmail.com','Esedo Fredrick','1653159882','1653160008','checkout_4cfc3846f4bda7ba60f0251e10b03ccf','188','2','payment_53725f44f89b3f4c994b32d3e8419050','CLO'),(78,'esedofredrick@gmail.com','Esedo Fredrick','1653159882','1653160054','checkout_4cfc3846f4bda7ba60f0251e10b03ccf','214','2','payment_53725f44f89b3f4c994b32d3e8419050','CLO'),(79,'richard@gmail.com','Richard Bruce','1653201191','1653201573','checkout_7c1041dba9180c0e0e9df0a7f62fdf19','188','2',NULL,NULL),(80,'richard@gmail.com','richard','1653201191','1653201951','checkout_b39cb6d5fac15ee12f4a6f149fb1d4a4','126','2',NULL,NULL),(81,'clark@gmail.com','Richard Clark','1653202349','1653202412','checkout_20c1a0899e0aa84d8c9a5ec9526eb35a','126','2',NULL,NULL),(82,'richard@gmail.com','Richard Clark','1653202349','1653202770','checkout_51212e045f0b2f1b4b44b5e6623384a2','188','2',NULL,NULL),(83,'esedofredrick@gmail.com','Fredrick Johnson','1653204028','1653204556','checkout_9bcd2d1e70b6a0c68f36f18169bffc88','188','2','payment_dfede203734840656392c7f0277f182f','CLO'),(84,'esedofredrick@gmail.com','Venus Johnson','1653204624','1653205140','checkout_b1f6a5aa6a17c6bf2262d9bd456a6840','188','2','payment_f57cf1f119a9282a35e3c24ac2887b09','CLO'),(85,'ssss','sss','1653290151','1653290175','checkout_81a11b4a1b889f51ce5e3ebaad88f06c','26.9','2','0','ACT'),(86,'ssss','sss','1653290151','1653290175','checkout_2ef45a1a4b27f65906f09a35fb14cc4a','26.9','2','0','ACT'),(87,'ssss','sss','1653290151','1653290175','checkout_66c35f680f1540152e2a68186db0a0ab','26.9','2','0','ACT'),(88,'ssss','sss','1653290151','1653290175','checkout_bbb577cffaac8c824623ed060064314b','26.9','0','0','ACT'),(89,'esedofredrick@gmail.com','Esedo','1653290151','1653292635','checkout_5d26a03bc3d7aa64b5fffdeac50e7295','50.8','2','0','ACT'),(90,'esedofredrick@gmail.com','Esedo Fredrick','1653158605','1653159789','checkout_9a838432f9ba01cd4c896c5bcf0c728d','188','2','0','ACT'),(91,'fredrick@gmail.com','Esedo Fredrick','1653307115','1653307457','checkout_c67c68a4bea3ed5c5d24c12adabb66d3','188','2','payment_718a40edcc5657ed3b65efaf337196d7','CLO'),(92,'fredrick@gmail.com','Esedo Fredrick','1653307115','1653307478','checkout_c67c68a4bea3ed5c5d24c12adabb66d3','144','2','payment_718a40edcc5657ed3b65efaf337196d7','CLO'),(93,'esedofredrick@gmail.com','ssss','1653508992','1653509038','checkout_526fe250cbabd2edb6b067e930147fc1','250','2','payment_ac6ff253b8dd534030bc67a1e72348c1','CLO'),(94,'esedofredrick@gmail.com','ssss','1653508992','1653509038','checkout_37f8d589b9b51a1a0b471fdfe091b596','250','2','payment_ac6ff253b8dd534030bc67a1e72348c1','CLO'),(95,'esedofredrick@gmail.com','ssss','1653508992','1653509038','checkout_7596e994df3172fa221e8ca4f17c8873','250','2','payment_ac6ff253b8dd534030bc67a1e72348c1','CLO'),(96,'esedofredrick@gmail.com','ssss','1653508992','1653509038','checkout_00545da7b4efa0bb77d16021dc39f48c','250','2','payment_ac6ff253b8dd534030bc67a1e72348c1','CLO'),(97,'esedofredrick@gmail.com','ssss','1653508992','1653509038','checkout_1eee5cab5c21952f40a96848bfbfe0a5','250','2','payment_ac6ff253b8dd534030bc67a1e72348c1','CLO'),(98,'esedofredrick@gmail.com','ssss','1653508992','1653509038','checkout_1d9e7a822f110feee7871a0b2be48820','250','2','payment_ac6ff253b8dd534030bc67a1e72348c1','CLO'),(99,'esedofredrick@gmail.com','ww','1653514487','1653516932','checkout_f1649bcf3b2b402e8ba7733cbf669f6d','250','2','0','ACT'),(100,'esedofredrick@gmail.com','Esed','1653516975','1653517001','checkout_2ebdb91b6bae6889d7337c216bf0e2ef','250','2','0','ACT'),(101,'esedofredrick@gmail.com','ddd','1653535738','1653535764','checkout_a502ad6f0d4ce7a713619c1ea0238e60','188','2','payment_b0f500b2bc7f63d5b88dc0dc448168f6','CLO'),(102,'esedofredrick@gmail.com','ddd','1653535738','1653535764','checkout_87e3fa1fa3b93886d185af807945e0d3','188','2','payment_b0f500b2bc7f63d5b88dc0dc448168f6','CLO'),(103,'esedofredrick@gmail.com','ddd','1653535738','1653535764','checkout_0e19c2d5376b5e7f7455c2d90370ea72','188','2','payment_b0f500b2bc7f63d5b88dc0dc448168f6','CLO'),(104,'esedofredrick@gmail.com','ddd','1653535738','1653535764','checkout_c52d746f634af089129ac0c0509b825f','188','2','payment_b0f500b2bc7f63d5b88dc0dc448168f6','CLO'),(105,'esedofredrick@gmail.com','Esedo Fredrick','1653614306','1653614455','checkout_ea4f03d0141c663cc57fcb363b81fa05','126','2','0','ACT'),(106,'esedofredrick@gmail.com','Esedo Fredrick','1653614306','1653614923','checkout_ea4f03d0141c663cc57fcb363b81fa05','126','2','0','ACT'),(107,'esedofredrick@gmail.com','Esedo Fredrick','1653615670','1653616397','checkout_cf6b686bc8adbc1633dc54c987e2e229','188','2','payment_ebb4b931b94d177187f4266ce12eda60','CLO'),(108,'esedofredrick@gmail.com','Esedo Fredrick','1653615670','1653616417','checkout_cf6b686bc8adbc1633dc54c987e2e229','144','2','payment_ebb4b931b94d177187f4266ce12eda60','CLO'),(109,'esedofredrick@gmail.com','Esedo Fredrick','1653617134','1653617156','checkout_48b77330b4db5f4ad3e4f18f39f9512e','188','2','payment_18f9540c59ee38c1207c11b619d1f0d7','CLO'),(110,'esedofredrick@gmail.com','ddd','1653617525','1653617542','checkout_56efa03ba9b0f0c4c041c538079bc95a','126','2','payment_553da56108d6d2707f2a149ea9d62b1e','CLO'),(111,'esedofredrick@gmail.com','Esedo Fredrick','1653653586','1653653604','checkout_204d2d7331bb365c2438133bced435e4','188','2','payment_bc2519c981b67e5b9c3a457cc82dc2f2','CLO'),(112,'esedofredrick@gmail.com','Esedo Fredrick','1653653586','1653653604','checkout_3acdfda27ba273a3c873cee24c5ab46d','188','2','payment_bc2519c981b67e5b9c3a457cc82dc2f2','CLO'),(113,'esedofredrick@gmail.com','Esedo Fredrick','1653656653','1653656731','checkout_f894ef2095721dded001042655a98331','188','2',NULL,'CLO'),(114,'ewu22222222222222@gmail.com','dddd','1653656786','1653656920','checkout_e0dc49439f2bb96d73b623ae9b2b797a','188','2','0','ACT'),(115,'esedofredrick@gmail.com','Esedo Fredrick','1653656653','1653656731','checkout_04e849adbb3558cbd83910971d3df394','188','2',NULL,'CLO'),(116,'esedofredrick@gmail.com','Eseco ','1653679647','1653679814','checkout_eeebfcf4e5eeae72aaa5cba88a1bc175','188','2','payment_3bb0c7ac2038c042e3f27bcae51a9eab','CLO'),(117,'esedofredrick@gmail.com','dd','1653679841','1653680185','checkout_1566d198827d24c7530d09c598cee8d4','126','2','0','ACT'),(118,'esedofredrick@gmail.com','Eseco ','1653679647','1653679814','checkout_e98c0e61233a90b28def8348f4e23776','188','2','payment_3bb0c7ac2038c042e3f27bcae51a9eab','CLO'),(119,'esedofredrick@gmail.com','ewww','1653679647','1653680248','checkout_e98c0e61233a90b28def8348f4e23776','250','2','payment_3bb0c7ac2038c042e3f27bcae51a9eab','CLO'),(120,'esedofredrick@gmail.com','www','1653687686','1653687911','checkout_72986077b3e6666530f0801f286cfc07','126','2','payment_e493e6230d5aa55ed8c95832206a764d','CLO'),(121,'esedofredrick@gmail.com','dd','1653688071','1653688092','checkout_54bd36127b304eb65f0639547457c388','250','2','payment_c4de183ca92bdbfbdd60e933526fb9d4','CLO'),(122,'esedofredrick@gmail.com','dd','1653688071','1653688092','checkout_904625145d69d146f45ff427a2da5490','250','2','payment_c4de183ca92bdbfbdd60e933526fb9d4','CLO'),(123,'esedofredrick@gmail.com','dd','1653688071','1653688092','checkout_8ece2b0cce36b3a74de3796ffa68f031','250','2','payment_c4de183ca92bdbfbdd60e933526fb9d4','CLO'),(124,'esedofredrick@gmail.com','dd','1653688071','1653688092','checkout_6e09c692cd4df900245a1f854e22fbc9','250','2','payment_c4de183ca92bdbfbdd60e933526fb9d4','CLO'),(125,'esedofredrick@gmail.com','vvv','1653690543','1653690564','checkout_9e72a66eea94d94709489db394395d81','64','2','payment_75ec38a0021298c9c2d094d909f7cd75','CLO'),(126,'esedofredrick@gmail.com','vvv','1653690543','1653690564','checkout_bc623d51c35e656d4cb3fd74d25f2275','64','2','payment_75ec38a0021298c9c2d094d909f7cd75','CLO'),(127,'esedofredrick@gmail.com','wwww','1653706739','1653706769','checkout_4426a92b5aade0c943276279a6909cc4','188','2','payment_a5030d6c63bb2f9f57ed346d77e9145e','CLO'),(128,'esedofredrick@gmail.com','wwww','1653706739','1653706769','checkout_9793856617c3b621b9031c6c779598b9','188','2','payment_a5030d6c63bb2f9f57ed346d77e9145e','CLO'),(129,'esedofredrick@gmail.com','wwww','1653706739','1653706769','checkout_51b1e613e7755bfa52cdefa1b61d6a97','188','2','payment_a5030d6c63bb2f9f57ed346d77e9145e','CLO'),(130,'esedofredrick@gmail.com','wwww','1653706739','1653706769','checkout_93f174f900cdf202e0212f61f5ceaf39','188','2','payment_a5030d6c63bb2f9f57ed346d77e9145e','CLO'),(131,'esedofredrick@gmail.com','wwww','1653706739','1653706769','checkout_1941e15a21e5c0469ad3effed254b0b7','188','2','payment_a5030d6c63bb2f9f57ed346d77e9145e','CLO'),(132,'esedofredrick@gmail.com','Esedo Fredrick','1653710812','1653710828','checkout_f06f356a74387764ae8a8d4208f63183','250','2','payment_11b73267d5d93877ebed7571fe12b0bd','CLO'),(133,'esedofredrick@gmail.com','Esedo Fredrick','1653710812','1653710828','checkout_efad3bf09870aefbf7c607448be1a247','250','2','payment_11b73267d5d93877ebed7571fe12b0bd','CLO'),(134,'esedofredrick@gmail.com','Esedo Fredrick','1653712732','1653713106','checkout_5397b08c6b4950d18994e07926b7be20','126','2','payment_c57859538a8f7782a39b0fb23a465a95','CLO'),(135,'esedofredrick@gmail.com','Esedo Fredrick','1653712732','1653713140','checkout_5397b08c6b4950d18994e07926b7be20','214','2','payment_c57859538a8f7782a39b0fb23a465a95','CLO'),(136,'esedofredrick@gmail.com','Esedo Fredrick','1653713310','1653713454','checkout_7286a7d3ea309692a92fbfac2837017b','188','2','payment_f4016587c3a17c521183e8c9c8f5e7e5','CLO'),(137,'esedofredrick@gmail.com','Esedo Fredrick','1653717626','1653735489','checkout_4a971c01ad66d17b9e9cfbbfa95e8c13','188','2',NULL,'CLO'),(138,'esedofredrick@gmail.com','Esedo Fredrick','1653735638','1653735676','checkout_41a40a419c1afbaa8f82aa3427e0d17a','188','2','payment_9f68cfb5bac21e1f737f0c2a03bdb5dd','CLO'),(139,'esedofredrick@gmail.com','Esedo Fredrick','1653736604','1653737158','checkout_d84a6d1bb08dab69b50a903ae1380b8c','126','2',NULL,'CLO'),(140,'esedofredrick@gmail.com','Esedo Fredrick','1653736604','1653737169','checkout_d84a6d1bb08dab69b50a903ae1380b8c','284','2',NULL,'CLO'),(141,'esedofredrick@gmail.com','Esedo Fredrick','1653736604','1653737169','checkout_2682653e40337e93b87b8bf3d5345b1e','284','2',NULL,'CLO'),(142,'esedofredrick@gmail.com','Esedo Fredrick','1653736604','1653737169','checkout_59f69d6238d7f9c11e46547ac75a8282','284','2',NULL,'CLO'),(143,'esedofredrick@gmail.com','Esedo Fredrick','1653717626','1653735489','checkout_66c5ff1ae00c1e236fcd91a0bf748ac4','188','2',NULL,'CLO'),(144,'esedofredrick@gmail.com','Ese Ann','1653741247','1653741783','checkout_9874b436334e710bb941077e2e56acd5','126','2','payment_fd4414a0c307e138d80bdb47eacfe261','CLO');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `shipping_rate` varchar(100) DEFAULT NULL,
  `created_time` varchar(100) DEFAULT NULL,
  `timer1` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (7,'Rapyd Product 1','Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid quaerat autem voluptate optio excep','120','good1653033631.png','2','Friday, May 20, 2022, 4:00 am','1653033632'),(8,'Rapyd Product 2','Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid quaerat autem voluptate optio excep','70','good1653033732.png','4','Friday, May 20, 2022, 4:02 am','1653033732'),(9,'Rapyd Product 3','Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid quaerat autem voluptate optio excep','62','good1653033836.png','2','Friday, May 20, 2022, 4:03 am','1653033836');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `cart_session` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `shipping_rate` varchar(100) DEFAULT NULL,
  `total_amount` varchar(100) DEFAULT NULL,
  `total_amount1` varchar(100) DEFAULT NULL,
  `product_title` varchar(100) DEFAULT NULL,
  `product_photo` varchar(100) DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `timer1` varchar(100) DEFAULT NULL,
  `timer2` varchar(100) DEFAULT NULL,
  `checkout_pageid` varchar(400) DEFAULT NULL,
  `payment_id` varchar(400) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `payment_redirect_url` text DEFAULT NULL,
  `total_amount_payable` varchar(50) DEFAULT NULL,
  `discount_split` varchar(50) DEFAULT NULL,
  `discount_all` varchar(50) DEFAULT NULL,
  `merchant_reference_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (105,'annball@gmail.com','Ann Ball','Broadway 10012, New York, NY, USA','123','USA','1653157709','70','1653033732','4','144','144','Rapyd Product 2','good1653033732.png','2','1653157844','Saturday, May 21, 2022, 2:30 pm','checkout_7eb682e771d24cd0ab1c00c3beb4da4c','payment_b28e5646b597eedb923bac3496b7115d','CLO','https://sandboxcheckout-preview.rapyd.net?token=checkout_7eb682e771d24cd0ab1c00c3beb4da4c','502','1','2','1653157844'),(107,'esedofredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','USA','1653157783','70','1653033732','4','144','144','Rapyd Product 2','good1653033732.png','2','1653158227','Saturday, May 21, 2022, 2:37 pm','checkout_5d01bbb98593f6190f8d235805e7aa00','0','ACT','https://sandboxcheckout-preview.rapyd.net?token=checkout_5d01bbb98593f6190f8d235805e7aa00','390','0.66666666666667','2','1653158227'),(108,'esedofredrick@gmail.com','Esedo Fredrick','Broadway 10012, New York, NY, USA','123','USA','1653157783','62','1653033836','2','126','126','Rapyd Product 3','good1653033836.png','2','1653158240','Saturday, May 21, 2022, 2:37 pm','checkout_5d01bbb98593f6190f8d235805e7aa00','0','ACT','https://sandboxcheckout-preview.rapyd.net?token=checkout_5d01bbb98593f6190f8d235805e7aa00','390','0.66666666666667','2','1653158240'),(109,'henry@gmail.com','Henry Obasi','Broadway 10012, New York, NY, USA','123','USA','1653158390','62','1653033836','2','126','126','Rapyd Product 3','good1653033836.png','2','1653158446','Saturday, May 21, 2022, 2:40 pm','checkout_c5860b357625bdda9a7913986e968321','payment_bbc9a117173a745d114127c56ead0be4','CLO','https://sandboxcheckout-preview.rapyd.net?token=checkout_c5860b357625bdda9a7913986e968321','124','2','2','1653158446');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `phone_no` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `created_time` varchar(100) DEFAULT NULL,
  `timing` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (8,'henry@gmail.com',NULL,'Henry Obasi','$2y$04$sjEinUzcrzr6YddlliBNIO0LScTJtFksJojdq4OjYyNTlwfumPN02','Saturday, May 21, 2022, 2:43 pm','1653158583'),(9,'esedofredrick@gmail.com',NULL,'Esedo Fredrick','$2y$04$9SwuuJSLW1jqbGpzPZyDeOOvRWEdXKC8yRpL3MeCdi0dDJfvcTGKS','Saturday, May 21, 2022, 3:09 pm','1653160184');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'rapyd_checkout'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-28  9:52:48
