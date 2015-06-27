-- MySQL dump 10.13  Distrib 5.6.24, for osx10.8 (x86_64)
--
<<<<<<< HEAD
-- Host: localhost    Database: grms
-- ------------------------------------------------------
-- Server version	5.6.24
=======
-- 主机: 127.0.0.1
-- 生成日期: 2015-06-27 09:49:30
-- 服务器版本: 5.6.11
-- PHP 版本: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

>>>>>>> origin/master

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
-- Table structure for table `branch_right`
--

DROP TABLE IF EXISTS `branch_right`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch_right` (
  `branch_id` int(11) DEFAULT NULL,
  `right_id` int(11) DEFAULT NULL,
  KEY `branch_id` (`branch_id`),
  KEY `right_id` (`right_id`),
  CONSTRAINT `branch_right_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `branch_right_ibfk_2` FOREIGN KEY (`right_id`) REFERENCES `rights` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_right`
--

<<<<<<< HEAD
LOCK TABLES `branch_right` WRITE;
/*!40000 ALTER TABLE `branch_right` DISABLE KEYS */;
INSERT INTO `branch_right` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(3,2),(3,1),(3,3);
/*!40000 ALTER TABLE `branch_right` ENABLE KEYS */;
UNLOCK TABLES;
=======
INSERT INTO `branchs` (`id`, `lst_id`, `name`) VALUES
(1, 1, '董事会'),
(2, 1, '销售部'),
(3, 1, '财务部'),
(4, 1, '人事部'),
(5, 2, '销售部第一小组'),
(6, 2, '销售部第二小组'),
(7, 3, '财务部第一小组'),
(8, 3, '财务部第二小组'),
(12, 4, '人事部第一小组'),
(13, 4, '人事部第二小组');

-- --------------------------------------------------------
>>>>>>> origin/master

--
-- Table structure for table `branch_role`
--

DROP TABLE IF EXISTS `branch_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch_role` (
  `branch_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  KEY `branch_id` (`branch_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `branch_role_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `branch_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_role`
--

<<<<<<< HEAD
LOCK TABLES `branch_role` WRITE;
/*!40000 ALTER TABLE `branch_role` DISABLE KEYS */;
INSERT INTO `branch_role` VALUES (3,2),(3,1),(3,3),(11,1),(11,2),(7,1),(7,2);
/*!40000 ALTER TABLE `branch_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch_user`
=======
INSERT INTO `branch_right` (`branch_id`, `right_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 1),
(2, 1),
(2, 2),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- 表的结构 `branch_role`
--

CREATE TABLE IF NOT EXISTS `branch_role` (
  `branch_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  KEY `branch_id` (`branch_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `branch_role`
--

INSERT INTO `branch_role` (`branch_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(3, 4),
(3, 5),
(3, 4),
(4, 6),
(4, 5),
(5, 5),
(6, 6),
(2, 5),
(2, 4),
(2, 2),
(3, 1),
(3, 1),
(3, 1),
(3, 3),
(3, 1),
(1, 3),
(2, 3),
(4, 3),
(1, 4),
(3, 2),
(4, 2);

-- --------------------------------------------------------

--
-- 表的结构 `branch_user`
>>>>>>> origin/master
--

DROP TABLE IF EXISTS `branch_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch_user` (
  `branch_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  KEY `branch_id` (`branch_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `branch_user_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `branch_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_user`
--

<<<<<<< HEAD
LOCK TABLES `branch_user` WRITE;
/*!40000 ALTER TABLE `branch_user` DISABLE KEYS */;
INSERT INTO `branch_user` VALUES (1,1),(1,2),(3,5),(1,6),(3,7),(1,3),(1,3),(1,3),(3,2),(3,1),(3,3),(3,3),(3,3),(3,3),(3,3),(3,3),(3,3),(3,3),(3,3),(3,3),(11,1),(11,2),(7,1),(7,2);
/*!40000 ALTER TABLE `branch_user` ENABLE KEYS */;
UNLOCK TABLES;
=======
INSERT INTO `branch_user` (`branch_id`, `user_id`) VALUES
(1, 1),
(2, 3),
(2, 4),
(3, 5),
(1, 6);

-- --------------------------------------------------------
>>>>>>> origin/master

--
-- Table structure for table `branchs`
--

DROP TABLE IF EXISTS `branchs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branchs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lst_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lst_id` (`lst_id`),
  CONSTRAINT `branchs_ibfk_1` FOREIGN KEY (`lst_id`) REFERENCES `branchs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branchs`
--

LOCK TABLES `branchs` WRITE;
/*!40000 ALTER TABLE `branchs` DISABLE KEYS */;
INSERT INTO `branchs` VALUES (1,1,'董事会'),(3,1,'财务部'),(7,3,'财务部第一小组'),(11,3,'财务部第二小组'),(23,7,'张中雷第一小组'),(24,3,'刘宏博xx小组'),(25,23,'test'),(26,25,'test1'),(41,26,'测试');
/*!40000 ALTER TABLE `branchs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
<<<<<<< HEAD
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `descp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
=======
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;
>>>>>>> origin/master

--
-- Dumping data for table `logs`
--

<<<<<<< HEAD
LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,1,'2015-06-21 18:40:00','add user');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;
=======
INSERT INTO `rights` (`id`, `name`) VALUES
(1, '权限一'),
(2, '权限二'),
(3, '权限三'),
(4, '权限四'),
(5, '权限五'),
(6, '权限六'),
(7, '权限七');

-- --------------------------------------------------------
>>>>>>> origin/master

--
-- Table structure for table `rights`
--

DROP TABLE IF EXISTS `rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
=======
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;
>>>>>>> origin/master

--
-- Dumping data for table `rights`
--

<<<<<<< HEAD
LOCK TABLES `rights` WRITE;
/*!40000 ALTER TABLE `rights` DISABLE KEYS */;
INSERT INTO `rights` VALUES (1,'权限一'),(2,'权限二'),(3,'权限三'),(4,'权限四'),(5,'权限五'),(6,'权限六'),(7,'权限七'),(8,'权限八');
/*!40000 ALTER TABLE `rights` ENABLE KEYS */;
UNLOCK TABLES;
=======
INSERT INTO `roles` (`id`, `name`) VALUES
(1, '角色一'),
(2, '角色二'),
(3, '角色三'),
(4, '角色四'),
(5, '角色五'),
(6, '角色六');

-- --------------------------------------------------------
>>>>>>> origin/master

--
-- Table structure for table `role_right`
--

DROP TABLE IF EXISTS `role_right`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_right` (
  `role_id` int(11) DEFAULT NULL,
  `right_id` int(11) DEFAULT NULL,
  KEY `right_id` (`right_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `role_right_ibfk_1` FOREIGN KEY (`right_id`) REFERENCES `rights` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_right_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_right`
--

<<<<<<< HEAD
LOCK TABLES `role_right` WRITE;
/*!40000 ALTER TABLE `role_right` DISABLE KEYS */;
INSERT INTO `role_right` VALUES (1,1),(1,1),(1,2),(1,3),(1,4),(1,5),(2,1),(2,3),(3,1),(3,3),(3,4);
/*!40000 ALTER TABLE `role_right` ENABLE KEYS */;
UNLOCK TABLES;
=======
INSERT INTO `role_right` (`role_id`, `right_id`) VALUES
(1, 1),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(3, 1),
(3, 3),
(3, 4),
(3, 2),
(2, 2),
(2, 2),
(3, 5),
(4, 1),
(6, 1),
(2, 3);

-- --------------------------------------------------------
>>>>>>> origin/master

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `role_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  KEY `user_id` (`user_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

<<<<<<< HEAD
LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (2,1),(2,2),(2,3),(3,1),(3,3);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;
=======
INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(NULL, NULL),
(3, 4),
(3, 5),
(6, 1),
(2, 7);

-- --------------------------------------------------------
>>>>>>> origin/master

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
=======
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;
>>>>>>> origin/master

--
-- Dumping data for table `roles`
--

<<<<<<< HEAD
LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'角色一'),(2,'角色二'),(3,'角色三'),(4,'角色四'),(5,'角色五'),(6,'角色六'),(10,'角色十（测试）'),(11,'Zhongshan'),(12,'');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
=======
INSERT INTO `users` (`id`, `username`, `sex`, `email`, `tel`, `password`) VALUES
(1, 'admin', 'nan', 'xxx@xx.com', '10086', '123'),
(3, '用户二', '男', '589@qq.com', '10011', 'nebg'),
(4, '用户三', '男', '5XX@qq.com', '114', 'nebg'),
(5, '用户四', '女', '1239@qq.com', '154', 'nbgd'),
(6, '用户五', '男', '5X9@qq.com', '114', 'nebg'),
(7, 'yonghu', 'mele', '21@qq.com', '1221', NULL);

-- --------------------------------------------------------
>>>>>>> origin/master

--
-- Table structure for table `user_right`
--

DROP TABLE IF EXISTS `user_right`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_right` (
  `user_id` int(11) DEFAULT NULL,
  `right_id` int(11) DEFAULT NULL,
  KEY `user_id` (`user_id`),
  KEY `right_id` (`right_id`),
  CONSTRAINT `user_right_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_right_ibfk_2` FOREIGN KEY (`right_id`) REFERENCES `rights` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
<<<<<<< HEAD
-- Dumping data for table `user_right`
=======
-- 转存表中的数据 `user_right`
--

INSERT INTO `user_right` (`user_id`, `right_id`) VALUES
(1, 1),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(3, 1),
(3, 3),
(3, 2),
(7, 1);

--
-- 限制导出的表
--

--
-- 限制表 `branchs`
>>>>>>> origin/master
--

LOCK TABLES `user_right` WRITE;
/*!40000 ALTER TABLE `user_right` DISABLE KEYS */;
INSERT INTO `user_right` VALUES (1,1),(1,1),(1,3),(1,4),(1,5),(2,1),(3,1),(3,4),(2,2),(2,7),(1,2),(1,7),(1,8),(3,2),(3,5),(4,1),(4,2),(4,3),(5,1),(5,2),(7,1),(7,2),(7,3),(7,4),(2,3),(7,5),(3,8),(4,5),(2,4),(2,4);
/*!40000 ALTER TABLE `user_right` ENABLE KEYS */;
UNLOCK TABLES;

--
<<<<<<< HEAD
-- Table structure for table `users`
=======
-- 限制表 `branch_role`
--
ALTER TABLE `branch_role`
  ADD CONSTRAINT `branch_role_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `branch_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- 限制表 `branch_user`
>>>>>>> origin/master
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','男','xxx@xx.com','10086','123'),(2,'用户一','男','333','1231','qw'),(3,'用户二','男','589@qq.com','10011','nebg'),(4,'用户三','男','5XX@qq.com','114','nebg'),(5,'用户四','女','1239@qq.com','154','nbgd'),(6,'用户五','男','5X9@qq.com','114','nebg'),(7,'用户六','女','58921@qq.com','123','nebg');
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

-- Dump completed on 2015-06-27 14:50:13
