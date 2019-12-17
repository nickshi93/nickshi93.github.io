# Host: localhost  (Version: 5.7.26)
# Date: 2019-12-17 13:42:54
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
INSERT INTO `tp_admin` VALUES (1,'admin','14e1b600b1fd579f47433b88e8d85291','2019-12-17 08:47:12','2019-11-12 14:50:11',1,1,'/userimage/20191207\\ce247d7dd1fa582ca1f3b83990597b6f.jpg'),(44,'nickshi','14e1b600b1fd579f47433b88e8d85291','2019-11-12 16:13:24','2019-11-12 14:28:55',0,6,NULL),(57,'测试123','14e1b600b1fd579f47433b88e8d85291','','2019-11-12 16:05:30',0,1,NULL),(58,'测试1','14e1b600b1fd579f47433b88e8d85291','','2019-11-12 17:07:06',0,6,NULL),(59,'测试2','14e1b600b1fd579f47433b88e8d85291','','2019-11-12 17:07:18',0,1,NULL),(60,'测试4','14e1b600b1fd579f47433b88e8d85291','','2019-11-12 17:07:34',0,1,NULL),(61,'测试5','14e1b600b1fd579f47433b88e8d85291','','2019-11-12 17:07:56',0,1,NULL),(65,'测试9','14e1b600b1fd579f47433b88e8d85291','','2019-11-12 17:08:52',0,1,NULL),(66,'测试3','14e1b600b1fd579f47433b88e8d85291','','2019-11-13 09:14:07',1,1,NULL),(67,'测试6','14e1b600b1fd579f47433b88e8d85291','','2019-11-13 09:14:21',0,1,NULL),(68,'测试8','14e1b600b1fd579f47433b88e8d85291','','2019-11-13 09:14:38',0,1,NULL),(69,'sdf','14e1b600b1fd579f47433b88e8d85291','2019-12-06 08:59:35','2019-11-13 11:45:04',1,6,NULL),(70,'sdf1','d9b1d7db4cd6e70935368a1efb10e377','','2019-11-13 11:45:29',0,1,NULL),(72,'测试权限','14e1b600b1fd579f47433b88e8d85291','','2019-11-15 14:28:22',1,1,NULL),(73,'用户测试5','14e1b600b1fd579f47433b88e8d85291','','2019-11-15 15:05:42',1,1,NULL),(74,'测试员2','14e1b600b1fd579f47433b88e8d85291','','2019-11-15 15:38:23',0,1,NULL),(76,'sdfss','14e1b600b1fd579f47433b88e8d85291','','2019-11-18 13:41:48',1,1,NULL),(77,'ssss','70873e8580c9900986939611618d7b1e','','2019-11-18 13:43:15',0,1,NULL),(82,'用户1','14e1b600b1fd579f47433b88e8d85291','','2019-11-19 17:16:05',1,7,NULL),(85,'new2','14e1b600b1fd579f47433b88e8d85291','','2019-12-07 11:07:55',1,6,'/userimage/20191206/d9f567c2c05ba41b29074d266f5990dd.jpg');
/*!40000 ALTER TABLE `tp_admin` ENABLE KEYS */;

#
# Structure for table "tp_article"
#

DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `author` char(125) DEFAULT NULL COMMENT '作者',
  `newsdate` datetime DEFAULT NULL,
  `pv` int(11) DEFAULT '0' COMMENT '浏览量',
  `artcontent` longtext COMMENT '文章内容',
  `ishow` int(11) DEFAULT NULL COMMENT '1显示0不显示',
  `top` int(11) DEFAULT NULL COMMENT '1置顶0不置顶',
  `coverimg` varchar(255) DEFAULT NULL COMMENT '封面图片',
  `addtime` char(125) DEFAULT NULL COMMENT '上传时间',
  `descript` longtext COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "tp_article"
#

/*!40000 ALTER TABLE `tp_article` DISABLE KEYS */;
INSERT INTO `tp_article` VALUES (4,'测试3',8,'石维','2019-12-13 00:00:00',20,'测试封面图片<img src=\"/articleimg/20191213\\fc393795057080aad8fbf03ce5733aa5.gif\" alt=\"\">',1,1,'/articleimg/20191213\\3a4d68b7e1ee87a8069c397768f4b56c.jpg','1576478829','<p><span>自1985年创立以来，Macworld博览会已经成为全球最具影响力的苹果生态圈的盛会。本届博览会以“创新定义未来”为主题，将于8月21日在北京国家会议中心拉开帷幕。届时，Parallels也会参加此次博览会，向消费者展示其创新的产品'),(5,'测试时间1',7,'石维','2019-12-13 14:41:17',1077,'测试简化撒旦法桑格撒地方玩儿<img src=\"/articleimg/20191213\\1e9eca56b9fed3a8d5d4f3979f3e2455.gif\" alt=\"\">',1,0,'/articleimg/20191213\\716626adf466fbe8db484843540be90f.png','1576478829','<p><span>自1985年创立以来，Macworld博览会已经成为全球最具影响力的苹果生态圈的盛会。本届博览会以“创新定义未来”为主题，将于8月21日在北京国家会议中心拉开帷幕。届时，Parallels也会参加此次博览会，向消费者展示其创新的产品'),(6,'Parallels即将亮相2014 Macworld博览会',4,'shiwei','2019-12-16 11:21:30',40,'<p><span>自1985年创立以来，Macworld博览会已经成为全球最具影响力的苹果生态圈的盛会。本届博览会以“创新定义未来”为主题，将于8月21日在北京国家会议中心拉开帷幕。届时，Parallels也会参加此次博览会，向消费者展示其创新的产品与技术。</span></p><p><span>&nbsp; &nbsp; &nbsp; “在技术更迭如此快速的今天，创新是企业可持续发展的驱动力。” Parallels大中华区跨平台应用销售总监赵信荣先生表示：“在此次博览会上，Parallels将向消费者展示我们在提升用户体验方面所做的不懈努力。此外，博览会也为我们与消费者之间建立了一个很好的平台，以倾听他们的心声，让我们持续地为他们带来创新的产品与技术。”<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 此次Parallels展台位于国家会议中心A110。为了使消费者更加近距离地了解旗下产品并回答消费者的问题，Parallels还将在8月22-24日期间在会场中央展示区上进行四场产品咨询与技术创新成果的展示。具体展示时间分别为：<br>　　8月22日13:40—14:00<br>　　8月23日11:30—11:50；15:20-15:40<br>　　8月24日11:00—11:20<br>&nbsp; &nbsp; &nbsp; 同时，Parallels也为参访Parallels展台的媒体和观众朋友准备精美的礼品包，先到先得。欢迎大家前去参与领取。想要了解更多关于Parallels的相关信息，不妨8月21日前往国家会议中心Parallels Macworld展台一探究竟。</span></p>\t\t\r\n\t\t\t\t\t\t\t\t\t\t\t ',1,1,'/articleimg/20191216\\bf2da469c74fb162429446b2ee0873ea.jpg','1576466506','<p><span>自1985年创立以来，Macworld博览会已经成为全球最具影响力的苹果生态圈的盛会。本届博览会以“创新定义未来”为主题，将于8月21日在北京国家会议中心拉开帷幕。届时，Parallels也会参加此次博览会，向消费者展示其创新的产品'),(7,'传苹果曾与惠普研发企业Siri 最终搁浅',3,'nick','2019-12-16 14:46:51',116,'<p><span>北京时间8月14日消息，据外媒MacRumors报道，知情人士称，苹果与IBM联手进军企业市场让竞争对手感受到了巨大的威胁。不过在结缘IBM之前，苹果还曾与惠普商谈，试图开发一款“企业版Siri”移动搜索产品。<br>&nbsp; &nbsp; &nbsp; &nbsp;传苹果曾与惠普研发企业Siri 最终搁浅（图片来自btnet）</span></p><p><span>　　消息称，苹果曾与惠普接触，讨论如何在后者的产品中整合Siri搜索服务，从而让企业员工通过他们的设备获取财务数据、产品库存数量等信息。不过，IBM的介入导致了苹果与惠普的合作项目最终搁浅。事实上，惠普除了与苹果谈判之外，还在谷歌谈论在Android设备上引入相关技术的可能性，例如推出企业版Google Now。<br>　　虽然谷歌尚未在企业数据和企业软件方面部署搜索功能，不过随着苹果结盟IBM，该公司将重新思考企业市场的重要性，通过进入该领域削弱iPhone在商务客户市场主导地位。要知道，Android在企业市场的占比远低于iOS，与惠普这样有丰富经验的公司合作无疑是一个正确的选择。<br>　　今年7月，苹果与IBM共同宣布，已经达成一项排他性的合作关系，即通过一种新类别的商务应用来改造企业移动市场，将IBM的大数据和分析能力引入苹果公司的iPhone和iPad。</span></p>\t\t\r\n\t\t\t\t\t\t\t\t\t\t\t ',1,0,'/articleimg/20191216\\a929d51947ec177cc8959ec92221fc4f.jpg','1576478829','北京时间8月14日消息，据外媒MacRumors报道，知情人士称，苹果与IBM联手进军企业市场让竞争对手感受到了巨大的威胁。不过在结缘IBM之前，苹果还曾与惠普商谈，试图开发一款“企业版Siri”移动搜索产品。'),(8,'this is my second article',3,'123','2019-12-16 15:15:16',132,'<p><span>&nbsp;<span>【导语】</span>过去的一年，对IT分销的考验更加严峻，IT厂商巨头通过各种手段竭力与终端经销商、直接用户拉进距离，压缩渠道空间，而电商技术及平台的发展加剧了这一变化。大型分销商在传统分销领域越来越难挣到钱，导致业务疲软甚至倒退。数码在分销行业发生剧变的大形势下，围绕核心的渠道分销业务大胆创新，积极调整业务架构、争取有利资源的同时为上下游定制应需而变的服务，保持了20%以上的快速增长，取得了逆流而上的发展。</span></p><p><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 资金瓶颈的突破，迅速为数码带来大发展契机。当年9月，刚刚成立的集团公司就实现单月销售额突破6亿元，仅仅3个月后的12月又实现单月销售额突破9亿元。业务规模和利润额突飞猛进的同时，数码也为投资方带来了回报。2012年底，数码在苏州当地先后荣获了“2013年度纳税贡献奖”、“2013年度纳税先进一等奖”等多项社会荣誉。2013年，为配合集团公司规模快速增长的需求，以向上下游提供“更高效、更规范”的服务为目的，数码也对运营体系进行了相应的整合、转移。</span></p><p><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;更稳定的业务架构为快速发展护航&nbsp;&nbsp;&nbsp;&nbsp; 最初在1999年启动分销业务。通过十几年的精诚合作，数码成为外设产品分销商中产品线覆盖最广的一家。而拥有最大团队的外设业务也一枝独秀，一直作为数码分销渠道业务体系的中流砥柱，为公司的销售达成和利润达成提供最有力的保障。</span></p>\t\t\r\n\t\t\t\t\t\t\t\t\t\t\t ',1,0,'/articleimg/20191216\\aa9e0a9674cf6272dd2d3b522d34672b.jpg','1576466506',''),(9,'TIS',4,'123123','2020-01-30 00:00:00',1276,'<p><span>&nbsp;<span>【导语】</span>过去的一年，对IT分销的考验更加严峻，IT厂商巨头通过各种手段竭力与终端经销商、直接用户拉进距离，压缩渠道空间，而电商技术及平台的发展加剧了这一变化。大型分销商在传统分销领域越来越难挣到钱，导致业务疲软甚至倒退。数码在分销行业发生剧变的大形势下，围绕核心的渠道分销业务大胆创新，积极调整业务架构、争取有利资源的同时为上下游定制应需而变的服务，保持了20%以上的快速增长，取得了逆流而上的发展。</span></p><p><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 资金瓶颈的突破，迅速为数码带来大发展契机。当年9月，刚刚成立的集团公司就实现单月销售额突破6亿元，仅仅3个月后的12月又实现单月销售额突破9亿元。业务规模和利润额突飞猛进的同时，数码也为投资方带来了回报。2012年底，数码在苏州当地先后荣获了“2013年度纳税贡献奖”、“2013年度纳税先进一等奖”等多项社会荣誉。2013年，为配合集团公司规模快速增长的需求，以向上下游提供“更高效、更规范”的服务为目的，数码也对运营体系进行了相应的整合、转移。</span></p><p><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;更稳定的业务架构为快速发展护航&nbsp;&nbsp;&nbsp;&nbsp; 最初在1999年启动分销业务。通过十几年的精诚合作，数码成为外设产品分销商中产品线覆盖最广的一家。而拥有最大团队的外设业务也一枝独秀，一直作为数码分销渠道业务体系的中流砥柱，为公司的销售达成和利润达成提供最有力的保障。</span></p>\t\t\r\n\t\t\t\t\t\t\t\t\t\t\t \t\t\r\n\t\t\t\t\t\t\t\t\t\t\t \t\t\r\n\t\t\t\t\t\t\t\t\t\t\t \t\t\r\n\t\t\t\t\t\t\t\t\t\t\t \t\t\r\n\t\t\t\t\t\t\t\t\t\t\t \t\t\r\n\t\t\t\t\t\t\t\t\t\t\t \t\t\r\n\t\t\t\t\t\t\t\t\t\t\t \t\t\r\n\t\t\t\t\t\t\t\t\t\t\t \t\t\r\n\t\t\t\t\t\t\t\t\t\t\t \t\t\r\n\t\t\t\t\t\t\t\t\t\t\t \t\t\r\n\t\t\t\t\t\t\t\t\t\t\t \t\t\r\n\t\t\t\t\t\t\t\t\t\t\t \t\t\r\n\t\t\t\t\t\t\t\t\t\t\t \t\t\r\n\t\t\t\t\t\t\t\t\t\t\t \t\t\r\n\t\t\t\t\t\t\t\t\t\t\t ',1,0,'/articleimg/20191216\\8c0e9cd26646a78c2806c3af35edf0c1.jpg','1576466506','过去的一年，对IT分销的考验更加严峻，IT厂商巨头通过各种手段竭力与终端经销商、直接用户拉进距离，压缩渠道空间，而电商技术及平台的发展加剧了这一变化。');
/*!40000 ALTER TABLE `tp_article` ENABLE KEYS */;

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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

#
# Data for table "tp_banner"
#

/*!40000 ALTER TABLE `tp_banner` DISABLE KEYS */;
INSERT INTO `tp_banner` VALUES (11,'/uploads/20191122\\70a115dd1508b481bf4318204073f380.jpg',0,0),(12,'/uploads/20191122\\11f00ec19590778521bf74ac65cf72ee.jpg',0,1),(13,'/uploads/20191122\\31d649f3d0719993682716e9c922e2ea.jpg',1,0),(14,'/uploads/20191122\\0c3593ba9481472c53fa2a9331a64f22.jpg',1,1),(23,'/uploads/20191213\\38ded55e543fdda09c1243ed891979a9.jpg',0,0);
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

#
# Data for table "tp_category"
#

/*!40000 ALTER TABLE `tp_category` DISABLE KEYS */;
INSERT INTO `tp_category` VALUES (1,'新闻栏目',0,0,1,'news'),(2,'电影',0,0,0,'news'),(3,'国际时事',1,0,0,'news'),(4,'焦点访谈',1,0,0,'news'),(7,'爱情片',2,0,2,'news'),(8,'动作片',2,0,2,'news'),(9,'韩国片',0,0,0,'goods'),(12,'商品页面',0,0,0,'goods');
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
INSERT INTO `tp_member` VALUES (1,'nick','8f240fb81db1d8f373b81b94bb91f648','13918739151','2019-12-02 11:23:45','2019-12-11 17:13:17',1),(2,NULL,'14e1b600b1fd579f47433b88e8d85291','13918736255','2019-12-02 11:23:45','2019-12-10 15:52:50',1),(5,'nick2','14e1b600b1fd579f47433b88e8d85291','13918761023','2019-12-05 11:18:46','2019-12-06 10:27:26',0),(7,'nick','14e1b600b1fd579f47433b88e8d85291',NULL,'2019-12-07 13:37:11','2019-12-11 17:13:17',1);
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
INSERT INTO `tp_role` VALUES (1,'管理员','2019-11-15 11:44:12','all'),(6,'测试员','2019-11-18 09:09:08','1,6,7,8,3,11,12,4,13,5,14,15'),(7,'测试2','2019-11-19 17:15:28','1,3,4');
/*!40000 ALTER TABLE `tp_role` ENABLE KEYS */;
