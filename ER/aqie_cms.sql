-- MySQL dump 10.13  Distrib 5.5.53, for Win32 (AMD64)
--
-- Host: localhost    Database: aqie_cms
-- ------------------------------------------------------
-- Server version	5.5.53-log

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
-- Table structure for table `cms_admin`
--

DROP TABLE IF EXISTS `cms_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_admin` (
  `admin_id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `lastloginip` varchar(15) DEFAULT '0',
  `lastlogintime` int(10) unsigned DEFAULT '0',
  `email` varchar(40) DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`admin_id`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_admin`
--

LOCK TABLES `cms_admin` WRITE;
/*!40000 ALTER TABLE `cms_admin` DISABLE KEYS */;
INSERT INTO `cms_admin` VALUES (2,'admin','ce85c7aaeb5e7c6dbbbda6ef63af52a6','0',1492453316,'','',1);
/*!40000 ALTER TABLE `cms_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_menu`
--

DROP TABLE IF EXISTS `cms_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_menu` (
  `menu_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `parentid` smallint(6) NOT NULL DEFAULT '0',
  `m` varchar(20) NOT NULL DEFAULT '',
  `c` varchar(20) NOT NULL DEFAULT '',
  `f` varchar(20) NOT NULL DEFAULT '',
  `data` varchar(100) NOT NULL DEFAULT '',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`),
  KEY `listorder` (`listorder`),
  KEY `parentid` (`parentid`),
  KEY `module` (`m`,`c`,`f`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_menu`
--

LOCK TABLES `cms_menu` WRITE;
/*!40000 ALTER TABLE `cms_menu` DISABLE KEYS */;
INSERT INTO `cms_menu` VALUES (1,'文章管理',0,'admin','content','index','',0,1,1),(2,'菜单管理',0,'admin','menu','index','',0,1,1),(3,'推荐位管理',0,'admin','position','index','',0,1,1),(4,'推荐位内容管理',0,'admin','positioncontent','index','',0,1,1),(5,'用户管理',0,'admin','admin','index','',0,1,1),(6,'基本管理',0,'admin','basic','index','',0,1,1),(7,'评论管理',0,'admin','comment','index','',0,1,1),(8,'后台',0,'home','cat','index','',0,1,0),(9,'数据库',0,'home','cat','index','',0,1,0),(10,'Web',0,'home','cat','index','',0,1,0),(11,'Others',0,'home','cat','index','',0,1,0),(12,'总结',0,'home','cat','index','',0,1,0),(13,'优秀文章',0,'home','cat','index','',0,1,0),(14,'商城',0,'home','cat','index','',0,1,0);
/*!40000 ALTER TABLE `cms_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_news`
--

DROP TABLE IF EXISTS `cms_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_news` (
  `news_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `title` varchar(80) NOT NULL DEFAULT '',
  `small_title` varchar(30) NOT NULL DEFAULT '',
  `title_font_color` varchar(250) DEFAULT NULL COMMENT '标题颜色',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `keywords` char(40) NOT NULL DEFAULT '',
  `description` varchar(250) NOT NULL COMMENT '文章描述',
  `posids` varchar(250) NOT NULL DEFAULT '',
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `copyfrom` varchar(250) DEFAULT NULL COMMENT '来源',
  `username` char(20) NOT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `countnum` int(10) unsigned NOT NULL DEFAULT '0',
  `recommend` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`news_id`),
  KEY `status` (`status`,`listorder`,`news_id`),
  KEY `listorder` (`catid`,`status`,`listorder`,`news_id`),
  KEY `catid` (`catid`,`status`,`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_news`
--

LOCK TABLES `cms_news` WRITE;
/*!40000 ALTER TABLE `cms_news` DISABLE KEYS */;
INSERT INTO `cms_news` VALUES (1,8,'后台','1','','/upload/2017/04/16/58f34268af0e0.jpg','1','测试','',0,1,'0','admin',1492337259,0,2,0),(2,9,'数据库','1','#5674ed','/upload/2017/04/16/58f342b3c97e8.jpg','1','1','',0,1,'0','admin',1492337339,0,4,0),(3,10,'web','1','#ed568b','/upload/2017/04/16/58f342c934de0.jpg','1','1','',0,1,'0','admin',1492337359,0,1,0),(4,11,'其他','1','','/upload/2017/04/16/58f342df4c1ff.jpg','1','1','',0,1,'0','admin',1492337386,0,1,0),(5,8,'测试图片','1','#ed568b','','11','11','',0,1,'0','admin',1492337565,0,0,0),(6,11,'我说的重要，我会去守护','守护','','/upload/2017/04/17/58f39b346619b.jpg',' 但是','的','',0,1,'0','admin',1492360011,0,2,1),(7,11,'再见，青春里的你','青春','#5674ed','/upload/2017/04/17/58f39bc5d9a84.jpg','青春','青春','',0,1,'0','admin',1492360201,0,5,1),(8,13,'如果高中生谈恋爱，请善待它','早恋','','/upload/2017/04/17/58f3b4dc1d42e.jpg','早恋','描述','',0,1,'0','admin',1492366583,0,1,0),(9,13,'我说我的愚，你看你的景','愚','#ed568b','/upload/2017/04/17/58f3ba22a60a6.jpg','的','年轻','',0,1,'0','admin',1492368057,0,4,0),(10,14,'商城业务逻辑','商品','','','1','1','',0,1,'0','admin',1492425783,0,1,1);
/*!40000 ALTER TABLE `cms_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_news_content`
--

DROP TABLE IF EXISTS `cms_news_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_news_content` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` mediumint(8) unsigned NOT NULL,
  `content` mediumtext NOT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_news_content`
--

LOCK TABLES `cms_news_content` WRITE;
/*!40000 ALTER TABLE `cms_news_content` DISABLE KEYS */;
INSERT INTO `cms_news_content` VALUES (1,1,'1',1492337259,0),(2,2,'1',1492337339,0),(3,3,'1',1492337359,0),(4,4,'1',1492337386,0),(5,5,'11',1492337565,0),(6,6,'&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;童话里面，在长满蓝色桔梗花的地方，有一家小小的商店，蓝蓝的“印染·桔梗店”招牌，泥土地房间、白桦木椅子、漂亮桌子，腰围藏青色围裙的小店员，什么都能染，如果在这里染了大拇指和食指，组成菱形的窗子，就能看回过去。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;我的过去是什么样子呢，我想回到哪一段过去呢。我想回到的瞬间，是我给小鸡切菜叶的时候，是我剥下的蒜皮落到地上被小鸡一抢而空的时候，是村里小姐姐背着我的时候，是在地里摘生豆角吃的时候，是闻到雨中玉米地里的香气的时候。所以，我的梦想是，回到我出生的地方，盖一个城堡一样的房子，四周种满花，喂喂鸡，绣绣花，做一个快乐的闲人。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;如果可以，我还想有一个榛子那样能看透独美孤单的爱人。就那样轻轻悄悄来到我身边，用我从没见过的眼神看着我，用我从没听过的话对我说着话，从此以后再也不离开我，永远不愿让我因为他变得不幸。可是我又很担心，如果最终我失去了他该怎么办。毕竟一个人逝去了，要再上哪儿去找他呢，地狱有吗，天堂有吗，要怎么样才能再找到他呢。还没有得到就先想失去，患得患失大概就是这个样子吧。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;现在的我，有时候，真的觉得这个世界很冰冷，看到那些能发自内心笑出来的小孩子，就会想我也曾是会那样明媚地笑着的人啊，我想我终会重拾我的笑容，但不是现在，虽然，我知道，微笑是这个世界上最简单的事。但我也明白，生活大概不过是一条街，不过是一场梦，梦醒了就往前走，没有以后，也知道那些纯净的人，始终会到达。所以我说的重要，我一定会努力去守护，直到它生根发芽的那一天。&amp;nbsp;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;成长，就是变得渐渐什么都能承受，并能有力量守护自己所爱的一切。最美好的，就是心里那一切啊，就是闭上眼睛看到的那一切啊。不要让生活一点一点掏空我的心，而是用梦想和希望一点一点填满我的心，这就是我一直的愿望。最后致自己：你要努力，认真帅气地活着，我会为你鼓掌。\r\n&lt;/p&gt;',1492360011,0),(7,7,'&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	所谓长大&lt;br /&gt;\r\n就是把原本看重的东西看轻一点&lt;br /&gt;\r\n原本看轻的东西看重一点\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	成长&lt;br /&gt;\r\n带走的不只是时光&lt;br /&gt;\r\n还带走了当初那些不害怕失去的勇气\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	高攀不起所谓的地久天长&lt;br /&gt;\r\n等待不了所谓的地老天荒\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	我只是一个人在演戏\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	每个人都有自己的生活&lt;br /&gt;\r\n谁都不可能一直陪谁&lt;br /&gt;\r\n而我的梦想就是你过的好\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	许多事情&lt;br /&gt;\r\n只有经历了才会懂&lt;br /&gt;\r\n青春也就如此\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	关于幸福&lt;br /&gt;\r\n我始终不能精确描绘它的模样&lt;br /&gt;\r\n梦里的画面&lt;br /&gt;\r\n我想用尽全力去将它平凑完整\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	我始终只能以陌生人的身份去怀念\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	如果我说&lt;br /&gt;\r\n始于初见，止于终老&lt;br /&gt;\r\n以我之姓，冠你之名&lt;br /&gt;\r\n可好？\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	突然感觉我们好遥远了&lt;br /&gt;\r\n不联系了不是不想念了&lt;br /&gt;\r\n其实你一直是心底的秘密\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	既然选择离去&lt;br /&gt;\r\n就悄无声息的幸福\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	未来的路还很长&lt;br /&gt;\r\n且行且珍惜\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	只是在追逐梦想的路上&lt;br /&gt;\r\n我们越走越远\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	青春和梦想的冲突&lt;br /&gt;\r\n只是朋友我们可以了\r\n&lt;/p&gt;',1492360201,0),(8,8,'&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	高中时代的恋爱，直到现在想起，我都觉得那是上天的恩赐。它让我在最美的青春里，经历了最真的爱恋。虽然直到最后，也没能为它起一个流芳百世的名字，但是这样风轻云淡的的日子里，不温不火，也给了我们最温柔的回忆。对于结果，我们是无怨无尤的，因为我只想好好爱它。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 它是最纯洁的暧昧，你常常悄悄的在我的桌兜里放上我最喜欢喝的老酸奶，却永远不会告诉我，那个人就是你。你会不自觉的对我好，所有的事情都能想到我，你不许任何人来伤害我，可是我们却无法用最直接的名义来相称对方。可能最近的距离就是远远地看着，那四个字你大概永远不会说出口，因为你怕一旦说出口，转头我就会消失不见。你最擅长的就是守候，因为你常常说，得之我幸，失之我命。即便最后你用你的十年青春，换来了我的一纸婚约，你也不会说半个后悔。因为你觉得值。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 它是最特别的约会，因为除了节假日，我们每天都可以在一起，貌似光明正大，却又日日见不得光。我们可以骑着单车和太阳赛跑，阳光如初，你侧过头看到我的明眸善睐，刘海被风吹得凌乱，我浅浅一笑，你说是真的很好看。学校的铃声为我们独奏，没有烛光晚餐，没有玫瑰长裙，但一样感同身受。手牵手是我们最亲密的动作，因此，你格外珍惜每一次的偷偷摸摸，有时候，我也会脸红的低下头，说牵一下就好，别被老师看见。你曾说过，你最大的梦想就是要对我好，这也是我听过最浪漫的情话。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;它是心底最柔软的懂你，当时我沉浸在张爱玲的世界里不能自拔，你悄悄在我耳边说，我愿做你的陈奕迅。因为我曾说过，如果张爱玲还活在这世上，那么最懂她的人莫过于陈奕迅了。你说愿为我抹去胡兰成的伤害，还会亲口告诉我红玫瑰和白玫瑰只是一个凄美动人的故事，你说你的玫瑰只有我这一朵，我永远不需要自将谢婉。记得那天，我在操场上感动的红了眼眶。我知道，对于一个爱看武侠小说的你，去揣摩少女的心思，其实难为你了。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;它拥有最完美的承诺。你喜欢看我的文章，便知道了我的一句话：丽江是我最爱恋的情人。你便翻阅所有的资料，找到了它最美的心脏——泸沽湖。你说总有一天你会带我去到这里，我们手牵手，背负泸沽湖，面朝情人树，你把我相拥入怀，然后我们一起大声的朗读我最喜欢的诗——《致橡树》，根，紧握在地下，叶，相触在云里。没有人听得懂我们的言语，我们却幸福了一辈子。这样的场景，我在梦里经历了好几回，真的很美，不论承诺还是你！\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 就这让人无法忘怀的爱恋，有人却偏偏不与它礼貌相待，常常把它们夸饰成可以燎原的火把，随时往上面浇灌冷水。其实，不妨低头想想，你伤害的，或许恰恰就是你心中最柔软的回忆。要知道它的一度出现，也曾书写了你最美的青春。我想知道，流年里，那个人你真的舍得当他从来没有出现过吗？\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 我感谢这段谈不及悲伤的恋爱，它带给我的幸福无法言喻，只能以此文章表以心意：若你看到高中生谈恋爱，请您善待它，若你恰是这位高中生，我希望你能用最明媚的方式去呵护它。要知道，每一个年龄段的爱情，都应该被尊重，每一份美好的回忆，都值得用心珍藏。清简如素的岁月里，这样的花香，十年，一百年，芬芳依旧。\r\n&lt;/p&gt;',1492366583,0),(9,9,'&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	听到过很多人说，“同龄的男生大多都比同龄的女生幼稚”。就好像在《那些年，我们一起追过的女孩》中的柯景腾一样，在瓢泼大雨中，不顾沈佳宜黯然的身影，大声哭诉着“我就是幼稚，才会喜欢你”。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	电影大家都看过，剧情也都熟稔于心。但看了一遍，两遍，却依旧还想再看一遍。或许是因为里面那时帅气逼人，青春阳光的柯震东还没卷入毒品的是非中；或许是因为自己这颗不再朝气蓬勃的心，依旧想感觉一把青春的激荡。或许，或许。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	我记得中学的时候，日记本里经常会出现一个字母---S。当然，对于这样一个出现在小女生本子里频率那么高，而且还是一个如此特别的字母。当然，这个人不一般。不，应该说是这个字母不一般。时过境迁，现在的我终于可以很大方的承认，我对这个不一般的S，的确存在着不一般的感觉。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	记得第一次看见S君的时候，是在一个晚霞漫天的傍晚。那个夏天的傍晚，天好似被火烧了起来，美得触目惊心。或许，那片美好的天空总在酝酿着什么故事。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	故事可以这样来讲：在一片推搡中，一个女孩被班上一个力大无比的大胖子连拖带拽的拉出了教室，然后在大胖子的一个降龙十八掌的威力之下，惯性般的向前冲过去。在距离女孩的脸一掌的距离，出现了一张布满青春痘的印记的脸。这个脸上还长着青春痘的少年，当然就是S君。女孩或许有些慢热，又或许有些慌乱，连男生的脸都没看清，就落荒而逃，并且逃到了班主任的办公室。然后，或许就没有然后了。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	我需要澄清的是，她没有去打小报告。她只是看着窗外的人一个接一个的走过来，把她当猴子看，感到十分郁闷。那时候的她，就是那种，喜欢将自己淹没到尘埃里的人。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	或许是男生最后的道歉，让她对男生添了那么一点点的好感；或许是多年一成不变的读书生活太过单调；或许，或许。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	&amp;nbsp;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-family:微软雅黑;font-size:14px;&quot;&gt;\r\n	故事似乎就没有再讲的必要了。&lt;img src=&quot;/upload/2017/04/17/58f3bab15b9df.jpg&quot; alt=&quot;&quot; /&gt;\r\n&lt;/p&gt;',1492368057,0),(10,10,'&lt;div class=&quot;postTitle&quot; style=&quot;padding:10px 10px 10px 0px;font-size:14px;font-weight:bold;margin:0px;font-family:verdana, Arial, Helvetica, sans-serif;&quot;&gt;\r\n	&lt;a id=&quot;cb_post_title_url&quot; class=&quot;postTitle2&quot; href=&quot;http://www.cnblogs.com/sunxi/articles/2572072.html&quot;&gt;什么是商品类型&lt;/a&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;cnblogs_post_body&quot; style=&quot;margin:0px 0px 20px;font-family:verdana, Arial, Helvetica, sans-serif;font-size:14px;&quot;&gt;\r\n	&lt;div class=&quot;span-auto&quot; style=&quot;margin:0px;&quot;&gt;\r\n		&lt;h5 style=&quot;font-size:12px;&quot;&gt;\r\n			商品类型不同于商品分类，指的是依据某一类商品的相同属性归纳成的属性集合，例如手机类型有屏幕尺寸、铃声、网络制式等共同的属性；书籍类型有出版社、作者、ISBN号等共同的属性。商品类型可以在简单商品基础上增加更多的展示点，让顾客能全方位、多角度的来选择商品。商品类型包括扩展属性、参数、规格等三个部分。\r\n		&lt;/h5&gt;\r\n		&lt;h3 style=&quot;font-size:16px;color:#666666;&quot;&gt;\r\n			本小节共包含5点。通过本部分的学习，您可以详细了解属性、扩展属性、详细参数表，为后续设置做准备。\r\n		&lt;/h3&gt;\r\n		&lt;ol&gt;\r\n			&lt;li&gt;\r\n				扩展属性\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n				详细参数表\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n				规格\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n				顾客必填信息\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n				通用商品类型\r\n			&lt;/li&gt;\r\n		&lt;/ol&gt;\r\n		&lt;div class=&quot;note clearfix&quot; style=&quot;margin:0px;&quot;&gt;\r\n			&lt;span class=&quot;STYLE1&quot;&gt;&lt;strong&gt;说明：&lt;/strong&gt;在目前版本中，商品类型只适用于实体商品，虚拟类商品暂不支持。所谓实体商品就是在现实中看得见、摸得着的商品。&lt;/span&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n	&lt;p&gt;\r\n		&lt;strong&gt;接下来，我们根据一个具体商品来说明商品类型的内容&lt;/strong&gt;\r\n	&lt;/p&gt;\r\n	&lt;div class=&quot;content&quot; style=&quot;margin:0px;&quot;&gt;\r\n		&lt;h3 style=&quot;font-size:16px;color:#666666;&quot;&gt;\r\n			1、扩展属性\r\n		&lt;/h3&gt;\r\n		&lt;p&gt;\r\n			先说明一下商品的基本属性，基本属性就是大多数商品所共有的一些内容，如商品名称、货号、重量等基本内容。&lt;br /&gt;\r\n扩展属性则是某类商品所独有的内容，不同商品内容有所区别。&lt;br /&gt;\r\n在ECstore网店点击一个复杂商品的详细页面，可看到在前台显示的扩展属性内容。\r\n		&lt;/p&gt;\r\n		&lt;p&gt;\r\n			&lt;iframe id=&quot;iframe_0.2475859107859706&quot; src=&quot;data:text/html;charset=utf8,%3Cstyle%3Ebody%7Bmargin:0;padding:0%7D%3C/style%3E%3Cimg%20id=%22img%22%20src=%22http://www.shopex.cn/help/ecstore/images/8221001.jpg?_=2572072%22%20style=%22border:none;max-width:587px%22%3E%3Cscript%3Ewindow.onload%20=%20function%20()%20%7Bvar%20img%20=%20document.getElementById(\'img\');%20window.parent.postMessage(%7BiframeId:\'iframe_0.2475859107859706\',width:img.width,height:img.height%7D,%20\'http://www.cnblogs.com\');%7D%3C/script%3E&quot; frameborder=&quot;0&quot; style=&quot;width:20px;height:20px;&quot;&gt;\r\n			&lt;/iframe&gt;\r\n&lt;br /&gt;\r\n本商品中，货号、编号等就是所有商品共有的内容，就称之为基本属性。&amp;nbsp;&lt;br /&gt;\r\n而质地、场合、季节、版型等均是这一分类下商品所独有的内容，就是服装类商品的扩展属性。&amp;nbsp;&lt;br /&gt;\r\n不同类商品的扩展属性不尽相同，如食品会有保质期、产地、原材料；电脑会有主频、内在大小、显卡等内容，这些均可用扩展属性来表现。\r\n		&lt;/p&gt;\r\n		&lt;h3 style=&quot;font-size:16px;color:#666666;&quot;&gt;\r\n			2、详细参数表\r\n		&lt;/h3&gt;\r\n		&lt;p&gt;\r\n			当商品需要展示的内容比较多，而扩展属性又不能完全显示其内容时，可以用详细参数表来更详尽的展示商品的信息。&lt;br /&gt;\r\n如手机商品中，支持的频段可能有多个、主屏尺寸有多个、屏幕色彩有多种、音乐播放和文件格式有多种，用扩展属性已经不能完全展示商品的内容了，此时就可以用详细参数表来全部展示。&lt;br /&gt;\r\n参数表可以分组，每一组中可以有详细内容。&lt;br /&gt;\r\n通过详细参数表配合扩展属性基本可以把商品的所有内容全部展示出来，让顾客更方便的了解商品信息，从而产生相应的购买行动。&lt;br /&gt;\r\n			&lt;iframe id=&quot;iframe_0.628988032738439&quot; src=&quot;data:text/html;charset=utf8,%3Cstyle%3Ebody%7Bmargin:0;padding:0%7D%3C/style%3E%3Cimg%20id=%22img%22%20src=%22http://www.shopex.cn/help/ecstore/images/8221002.gif?_=2572072%22%20style=%22border:none;max-width:587px%22%3E%3Cscript%3Ewindow.onload%20=%20function%20()%20%7Bvar%20img%20=%20document.getElementById(\'img\');%20window.parent.postMessage(%7BiframeId:\'iframe_0.628988032738439\',width:img.width,height:img.height%7D,%20\'http://www.cnblogs.com\');%7D%3C/script%3E&quot; frameborder=&quot;0&quot; style=&quot;width:20px;height:20px;&quot;&gt;\r\n			&lt;/iframe&gt;\r\n		&lt;/p&gt;\r\n		&lt;h3 style=&quot;font-size:16px;color:#666666;&quot;&gt;\r\n			3、规格\r\n		&lt;/h3&gt;\r\n		&lt;p&gt;\r\n			所谓规格是依据顾客的购买习惯而独立出来的一种商品的特殊属性，例如顾客先选好了某一款衬衫，然后必须再选择颜色和尺码才可以订购，这里的颜色和尺码称为规格。&lt;br /&gt;\r\n具体介绍请参考规格文章\r\n		&lt;/p&gt;\r\n		&lt;h3 style=&quot;font-size:16px;color:#666666;&quot;&gt;\r\n			4、顾客必填信息\r\n		&lt;/h3&gt;\r\n		&lt;p&gt;\r\n			有些商品，用户购买时需要填写一些信息，以方便店主处理商品。&lt;br /&gt;\r\n比如商品是鲜花，商店提供送花上门服务，顾客购买鲜花送给他人时可以填写一下收花人的信息，这样就方便店主直接送花上门。&lt;br /&gt;\r\n比如商品是衬衫，商店提供免费喷字服务，顾客购买时就可以留一下字的内容，方便店主进行后续操作。&lt;br /&gt;\r\n同时，顾客也可以说一下商品的注意事项或送货时间。&lt;br /&gt;\r\n总之，这个项目是购物时的一个良好的补充，方便店主与顾客。\r\n		&lt;/p&gt;\r\n		&lt;h3 style=&quot;font-size:16px;color:#666666;&quot;&gt;\r\n			5、通用商品类型\r\n		&lt;/h3&gt;\r\n		&lt;p&gt;\r\n			在ECstore中，任何一个商品分类都要绑定商品类型才可。&lt;br /&gt;\r\n而有些简单商品是不需要商品类型的，此时系统就会在这种商品分类下默认一个通用的商品类型。&lt;br /&gt;\r\n通用商品类型是ECstore系统内置的仅含有商品名、重量、销售价格、简介、库存、品牌等基本属性的一种商品类型。\r\n		&lt;/p&gt;\r\n		&lt;p&gt;\r\n			如果是在简单商品分类下添加商品，或没有选择商品分类时，系统会自动启用通用商品类型，如图所示。&lt;br /&gt;\r\n			&lt;iframe id=&quot;iframe_0.8673196479781413&quot; src=&quot;data:text/html;charset=utf8,%3Cstyle%3Ebody%7Bmargin:0;padding:0%7D%3C/style%3E%3Cimg%20id=%22img%22%20src=%22http://www.shopex.cn/help/ecstore/images/8221003.jpg?_=2572072%22%20style=%22border:none;max-width:587px%22%3E%3Cscript%3Ewindow.onload%20=%20function%20()%20%7Bvar%20img%20=%20document.getElementById(\'img\');%20window.parent.postMessage(%7BiframeId:\'iframe_0.8673196479781413\',width:img.width,height:img.height%7D,%20\'http://www.cnblogs.com\');%7D%3C/script%3E&quot; frameborder=&quot;0&quot; style=&quot;width:20px;height:20px;&quot;&gt;\r\n			&lt;/iframe&gt;\r\n&lt;br /&gt;\r\n通用商品类型是一个默认的商品类型，不能删除。\r\n		&lt;/p&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;MySignature&quot; style=&quot;margin:0px;font-family:verdana, Arial, Helvetica, sans-serif;font-size:14px;&quot;&gt;\r\n	&lt;br /&gt;\r\n&lt;/div&gt;',1492425783,0);
/*!40000 ALTER TABLE `cms_news_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_position`
--

DROP TABLE IF EXISTS `cms_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_position` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` char(100) DEFAULT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_position`
--

LOCK TABLES `cms_position` WRITE;
/*!40000 ALTER TABLE `cms_position` DISABLE KEYS */;
INSERT INTO `cms_position` VALUES (1,'倾听世界',1,'这个主要图文，文章引用链接',1492330923,0),(2,'往期征文',1,'这个也是外链，后面可以更改功能',1492332801,0),(3,'首页轮播图',1,'轮播图啊啊啊',1492333448,0),(4,'征文比赛',1,'征文',1492366311,0);
/*!40000 ALTER TABLE `cms_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_position_content`
--

DROP TABLE IF EXISTS `cms_position_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_position_content` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` int(5) unsigned NOT NULL,
  `title` varchar(30) NOT NULL DEFAULT '',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(100) DEFAULT NULL,
  `news_id` mediumint(8) unsigned NOT NULL,
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_position_content`
--

LOCK TABLES `cms_position_content` WRITE;
/*!40000 ALTER TABLE `cms_position_content` DISABLE KEYS */;
INSERT INTO `cms_position_content` VALUES (1,1,'倾听','/upload/2017/04/16/58f32ac30a32e.jpg','http://www.sharesmile.cn/qing-1',0,0,1,1492331352,0),(2,1,'倾听2','/upload/2017/04/16/58f32bf944bae.jpg','http://www.sharesmile.cn/qing-3',0,0,1,1492331520,0),(3,1,'倾听3','/upload/2017/04/16/58f32d14ccc51.jpg','http://www.sharesmile.cn/qing-4',0,0,1,1492331798,0),(4,1,'倾听4','/upload/2017/04/16/58f32d2e10a54.jpg','http://www.sharesmile.cn/qing-6',0,0,1,1492331827,0),(5,1,'倾听5','/upload/2017/04/16/58f32d47559a2.jpg','http://www.sharesmile.cn/qing-7',0,0,1,1492331850,0),(6,1,'倾听6','/upload/2017/04/16/58f32d721c950.jpg','http://www.sharesmile.cn/qing-10',0,0,1,1492331893,0),(7,1,'倾听7','/upload/2017/04/16/58f32d8e4f065.jpg','http://www.sharesmile.cn/qing-13',0,0,1,1492331920,0),(8,1,'倾听8','/upload/2017/04/16/58f32dc899534.jpg','http://www.sharesmile.cn/qing-15',0,0,1,1492331979,0),(9,1,'倾听9','/upload/2017/04/16/58f32dedf0845.jpg','http://www.sharesmile.cn/qing-22',0,0,1,1492332016,0),(10,1,'倾听10','/upload/2017/04/16/58f32e0726f6d.jpg','http://www.sharesmile.cn/qing-24',0,0,1,1492332042,0),(11,2,'游走在毕业的季节','/upload/2017/04/16/58f331bd79539.jpg','http://www.sharesmile.cn/essay-8',0,0,1,1492332991,0),(12,2,'装满爱，去旅行','/upload/2017/04/16/58f331de9ea79.png','http://www.sharesmile.cn/essay-7',0,0,1,1492333035,0),(13,2,'飘着淡淡粽香的父亲节','/upload/2017/04/16/58f33210686b0.jpg','http://www.sharesmile.cn/essay-6',0,0,1,1492333076,0),(14,2,'东方之星之痛','/upload/2017/04/16/58f3323e1f536.jpg','http://www.sharesmile.cn/essay-5',0,0,1,1492333120,0),(15,2,'我和你的城','/upload/2017/04/16/58f3325bae12a.jpg','http://www.sharesmile.cn/essay-4',0,0,1,1492333149,0),(16,3,'邂逅夏天去旅行','/upload/2017/04/16/58f333e76ad85.jpg','http://www.sharesmile.cn/essay-9',0,0,-1,1492333545,0),(17,3,'世界那么大不想去看看','/upload/2017/04/16/58f3340de4f6f.jpg','http://www.sharesmile.cn/qing',0,0,-1,1492333583,0),(18,3,'我说的重要，我会去守护','/upload/2017/04/17/58f39b346619b.jpg',NULL,6,0,1,1492360011,0),(19,3,'再见，青春里的你','/upload/2017/04/17/58f39bc5d9a84.jpg',NULL,7,0,1,1492360201,0),(20,4,'如果高中生谈恋爱，请善待它','/upload/2017/04/17/58f3b4dc1d42e.jpg',NULL,8,0,1,1492366583,0),(21,4,'我说我的愚，你看你的景','/upload/2017/04/17/58f3ba22a60a6.jpg',NULL,9,0,1,1492368057,0);
/*!40000 ALTER TABLE `cms_position_content` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-18  3:00:59
