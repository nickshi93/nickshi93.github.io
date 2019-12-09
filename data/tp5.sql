# Host: localhost  (Version: 5.7.26)
# Date: 2019-12-09 10:25:40
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tp_admin"
#

DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` char(125) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `login_time` varchar(255) DEFAULT NULL,
  `resign_time` varchar(255) DEFAULT NULL,
  `used` int(11) DEFAULT '0' COMMENT '0关闭，1开启',
  `role` int(11) DEFAULT '1' COMMENT '0管理员1业务员',
  `img` varchar(255) DEFAULT NULL COMMENT '头像',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

#
# Data for table "tp_admin"
#

/*!40000 ALTER TABLE `tp_admin` DISABLE KEYS */;
INSERT INTO `tp_admin` VALUES (1,'admin','14e1b600b1fd579f47433b88e8d85291','2019-12-07 17:20:55','2019-11-12 14:50:11',1,1,'/userimage/20191207\\ce247d7dd1fa582ca1f3b83990597b6f.jpg'),(44,'nickshi','14e1b600b1fd579f47433b88e8d85291','2019-11-12 16:13:24','2019-11-12 14:28:55',0,6,NULL),(57,'测试123','14e1b600b1fd579f47433b88e8d85291','','2019-11-12 16:05:30',0,1,NULL),(58,'测试1','14e1b600b1fd579f47433b88e8d85291','','2019-11-12 17:07:06',0,6,NULL),(59,'测试2','14e1b600b1fd579f47433b88e8d85291','','2019-11-12 17:07:18',0,1,NULL),(60,'测试4','14e1b600b1fd579f47433b88e8d85291','','2019-11-12 17:07:34',0,1,NULL),(61,'测试5','14e1b600b1fd579f47433b88e8d85291','','2019-11-12 17:07:56',0,1,NULL),(65,'测试9','14e1b600b1fd579f47433b88e8d85291','','2019-11-12 17:08:52',0,1,NULL),(66,'测试3','14e1b600b1fd579f47433b88e8d85291','','2019-11-13 09:14:07',1,1,NULL),(67,'测试6','14e1b600b1fd579f47433b88e8d85291','','2019-11-13 09:14:21',0,1,NULL),(68,'测试8','14e1b600b1fd579f47433b88e8d85291','','2019-11-13 09:14:38',0,1,NULL),(69,'sdf','14e1b600b1fd579f47433b88e8d85291','2019-12-06 08:59:35','2019-11-13 11:45:04',1,6,NULL),(70,'sdf1','d9b1d7db4cd6e70935368a1efb10e377','','2019-11-13 11:45:29',0,1,NULL),(72,'测试权限','14e1b600b1fd579f47433b88e8d85291','','2019-11-15 14:28:22',1,1,NULL),(73,'用户测试5','14e1b600b1fd579f47433b88e8d85291','','2019-11-15 15:05:42',1,1,NULL),(74,'测试员2','14e1b600b1fd579f47433b88e8d85291','','2019-11-15 15:38:23',0,1,NULL),(76,'sdfss','14e1b600b1fd579f47433b88e8d85291','','2019-11-18 13:41:48',1,1,NULL),(77,'ssss','70873e8580c9900986939611618d7b1e','','2019-11-18 13:43:15',0,1,NULL),(82,'用户1','14e1b600b1fd579f47433b88e8d85291','','2019-11-19 17:16:05',1,7,NULL),(85,'new2','14e1b600b1fd579f47433b88e8d85291','','2019-12-07 11:07:55',1,6,'/userimage/20191206/d9f567c2c05ba41b29074d266f5990dd.jpg');
/*!40000 ALTER TABLE `tp_admin` ENABLE KEYS */;

#
# Structure for table "tp_banner"
#

DROP TABLE IF EXISTS `tp_banner`;
CREATE TABLE `tp_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_address` varchar(255) DEFAULT NULL,
  `imgtype` int(11) DEFAULT '0' COMMENT '0是PC，1为手机端',
  `sortid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

#
# Data for table "tp_banner"
#

/*!40000 ALTER TABLE `tp_banner` DISABLE KEYS */;
INSERT INTO `tp_banner` VALUES (11,'/uploads/20191122\\70a115dd1508b481bf4318204073f380.jpg',0,0),(12,'/uploads/20191122\\11f00ec19590778521bf74ac65cf72ee.jpg',0,1),(13,'/uploads/20191122\\31d649f3d0719993682716e9c922e2ea.jpg',1,0),(14,'/uploads/20191122\\0c3593ba9481472c53fa2a9331a64f22.jpg',1,1);
/*!40000 ALTER TABLE `tp_banner` ENABLE KEYS */;

#
# Structure for table "tp_category"
#

DROP TABLE IF EXISTS `tp_category`;
CREATE TABLE `tp_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT '0' COMMENT '0是顶级栏目',
  `is_show` int(11) DEFAULT '0' COMMENT '0为显示，1为不显示',
  `sortid` int(11) DEFAULT '0' COMMENT '排序',
  `url` varchar(255) DEFAULT NULL COMMENT '路径',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "tp_category"
#

/*!40000 ALTER TABLE `tp_category` DISABLE KEYS */;
INSERT INTO `tp_category` VALUES (1,'新闻栏目',0,0,0,NULL),(2,'电影',0,0,0,NULL),(3,'国际时事',1,0,0,NULL),(4,'焦点访谈',1,0,0,NULL),(7,'爱情片',2,0,2,NULL),(8,'动作片',2,0,2,NULL),(9,'韩国片',0,1,0,NULL);
/*!40000 ALTER TABLE `tp_category` ENABLE KEYS */;

#
# Structure for table "tp_dysms"
#

DROP TABLE IF EXISTS `tp_dysms`;
CREATE TABLE `tp_dysms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyid` varchar(255) DEFAULT NULL,
  `keysecret` varchar(255) DEFAULT NULL,
  `signame` varchar(255) DEFAULT NULL COMMENT '签名',
  `templatecode` varchar(255) DEFAULT NULL COMMENT '短信模板',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "tp_dysms"
#

/*!40000 ALTER TABLE `tp_dysms` DISABLE KEYS */;
INSERT INTO `tp_dysms` VALUES (1,'','','','');
/*!40000 ALTER TABLE `tp_dysms` ENABLE KEYS */;

#
# Structure for table "tp_member"
#

DROP TABLE IF EXISTS `tp_member`;
CREATE TABLE `tp_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `resign_time` varchar(255) DEFAULT NULL,
  `login_time` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT '1' COMMENT '1是开启，0是关闭',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "tp_member"
#

/*!40000 ALTER TABLE `tp_member` DISABLE KEYS */;
INSERT INTO `tp_member` VALUES (1,'nick','8f240fb81db1d8f373b81b94bb91f648','13918739151','2019-12-02 11:23:45','2019-12-06 10:22:57',1),(2,NULL,'14e1b600b1fd579f47433b88e8d85291','13918736255','2019-12-02 11:23:45','2019-12-06 10:34:49',1),(5,'nick2','14e1b600b1fd579f47433b88e8d85291','13918761023','2019-12-05 11:18:46','2019-12-06 10:27:26',0),(7,'nick','14e1b600b1fd579f47433b88e8d85291',NULL,'2019-12-07 13:37:11',NULL,1);
/*!40000 ALTER TABLE `tp_member` ENABLE KEYS */;

#
# Structure for table "tp_menu"
#

DROP TABLE IF EXISTS `tp_menu`;
CREATE TABLE `tp_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `menurl` varchar(255) DEFAULT NULL,
  `parentid` varchar(255) DEFAULT NULL COMMENT '父类',
  `menuicon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "tp_menu"
#

/*!40000 ALTER TABLE `tp_menu` DISABLE KEYS */;
INSERT INTO `tp_menu` VALUES (1,'用户管理',NULL,NULL,NULL),(2,'用户管理',NULL,NULL,NULL);
/*!40000 ALTER TABLE `tp_menu` ENABLE KEYS */;

#
# Structure for table "tp_role"
#

DROP TABLE IF EXISTS `tp_role`;
CREATE TABLE `tp_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `addtime` varchar(255) DEFAULT NULL COMMENT '新增时间',
  `authority` longtext COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "tp_role"
#

/*!40000 ALTER TABLE `tp_role` DISABLE KEYS */;
INSERT INTO `tp_role` VALUES (1,'管理员','2019-11-15 11:44:12','all'),(6,'测试员','2019-11-18 09:09:08','1,6,7,8,3,11,12,5,14,15'),(7,'测试2','2019-11-19 17:15:28','1,3,4');
/*!40000 ALTER TABLE `tp_role` ENABLE KEYS */;
