# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.19)
# Database: xiaofanzhuo
# Generation Time: 2015-01-10 16:51:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table activity
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activity`;

CREATE TABLE `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `amount` int(11) DEFAULT '0' COMMENT 'total amount',
  `create_time` int(11) DEFAULT '0' COMMENT '????',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;

INSERT INTO `activity` (`id`, `group_id`, `status`, `amount`, `create_time`)
VALUES
	(1,1,1,100,0),
	(2,2,0,0,0),
	(17,4,1,3,0),
	(18,4,1,2,0),
	(19,4,1,22,1420877706),
	(20,4,1,123123123,1420879146),
	(21,4,1,213,1420879174),
	(22,4,1,333333333,1420908572);

/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ugroup
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ugroup`;

CREATE TABLE `ugroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_user_id` int(11) NOT NULL COMMENT '用户id',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ugroup` WRITE;
/*!40000 ALTER TABLE `ugroup` DISABLE KEYS */;

INSERT INTO `ugroup` (`id`, `owner_user_id`, `create_time`)
VALUES
	(1,4,1234567890),
	(2,5,1234567890),
	(3,6,1234567891),
	(4,16,1420722059);

/*!40000 ALTER TABLE `ugroup` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '??',
  `phone` varchar(16) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '手机号码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `password`, `phone`)
VALUES
	(4,'test1','pd1','15558012007'),
	(5,'test2','pd2','15558012001'),
	(6,'test3','pd3','15558012002'),
	(7,'test4','pd4','15558012003'),
	(8,'test5','pd5','15558012004'),
	(9,'test6','pd6','15558012005'),
	(10,'test3','pd3','15558012002'),
	(11,'test2','pd2','15558012001'),
	(12,'test1','pd1','15558012007'),
	(13,'??','123456','15555555555'),
	(15,'15558012222','202cb962ac59075b964b07152d234b70','15558012222'),
	(16,'15558011111','698d51a19d8a121ce581499d7b701668','15558011111'),
	(17,'test1','e10adc3949ba59abbe56e057f20f883e','123456'),
	(18,'test111','e10adc3949ba59abbe56e057f20f883e','123456'),
	(19,'test11121','0ceddb46393515dabcc37c77607889f8','1234561321'),
	(21,'1111111','950a4152c2b4aa3ad78bdd6b366cc179','312'),
	(22,'11111112','097e26b2ffb0339458b55da17425a71f','3121'),
	(23,'111111121','097e26b2ffb0339458b55da17425a71f','3121'),
	(24,'111113','202cb962ac59075b964b07152d234b70','123'),
	(25,'阿霖','33ceb07bf4eeb3da587e268d663aba1a','1213'),
	(26,'1111','f7e0b956540676a129760a3eae309294','2333'),
	(27,'3213','b59c67bf196a4758191e42f76670ceba','1111'),
	(28,'33333','1a100d2c0dab19c4430e7d73762b3423','333333'),
	(29,'44444','79b7cdcd14db14e9cb498f1793817d69','44444'),
	(30,'7777777','018b59ce1fd616d874afad0f44ba338d','1283');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_activity
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_activity`;

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `activity_id` int(11) NOT NULL COMMENT '活动id',
  `is_join` tinyint(1) NOT NULL DEFAULT '-1' COMMENT '是否加入 -1 初始化，0 不加入，1加入',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_activity` WRITE;
/*!40000 ALTER TABLE `user_activity` DISABLE KEYS */;

INSERT INTO `user_activity` (`id`, `user_id`, `activity_id`, `is_join`)
VALUES
	(1,4,1,1),
	(3,5,1,1),
	(4,6,1,0),
	(5,7,1,0),
	(6,8,1,0),
	(46,26,18,0),
	(47,27,18,0),
	(48,28,18,0),
	(49,29,18,0),
	(50,26,19,1),
	(51,27,19,1),
	(52,28,19,1),
	(53,29,19,1),
	(54,26,20,1),
	(55,27,20,1),
	(56,28,20,1),
	(57,29,20,1),
	(58,26,21,1),
	(59,27,21,1),
	(60,28,21,0),
	(61,29,21,0),
	(62,26,22,1),
	(63,27,22,1),
	(64,28,22,1),
	(65,29,22,1);

/*!40000 ALTER TABLE `user_activity` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_group
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_group`;

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;

INSERT INTO `user_group` (`id`, `group_id`, `user_id`)
VALUES
	(1,1,4),
	(2,1,5),
	(3,1,6),
	(4,1,7),
	(5,1,8),
	(6,2,5),
	(7,2,6),
	(8,2,7),
	(12,4,26),
	(13,4,27),
	(14,4,28),
	(15,4,29),
	(16,4,30);

/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
