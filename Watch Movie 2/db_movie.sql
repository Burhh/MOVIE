-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 12 月 01 日 05:49
-- 服务器版本: 5.5.8
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `db_movie`
--

-- --------------------------------------------------------

--
-- 表的结构 `favor`
--

CREATE TABLE IF NOT EXISTS `favor` (
  `ID` int(11) NOT NULL,
  `movNum` varchar(20) NOT NULL COMMENT '电影编号',
  `userName` varchar(50) NOT NULL COMMENT '用户名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `favor`
--

INSERT INTO `favor` (`ID`, `movNum`, `userName`) VALUES
(1, 'mov1', 'lala'),
(0, 'mov2', 'lala');

-- --------------------------------------------------------

--
-- 表的结构 `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `movCHName` varchar(50) NOT NULL COMMENT '电影名CH',
  `movENName` varchar(50) NOT NULL COMMENT '电影名EN',
  `movNum` varchar(50) NOT NULL COMMENT '电影编号',
  `director` varchar(50) NOT NULL COMMENT '导演',
  `starring` varchar(50) NOT NULL COMMENT '主演',
  `type` varchar(50) NOT NULL COMMENT '类型',
  `releaseDate` varchar(50) NOT NULL COMMENT '上映日期',
  `content` text NOT NULL COMMENT '电影介绍',
  `movLink` text NOT NULL COMMENT '电影链接',
  PRIMARY KEY (`ID`),
  KEY `movNum` (`movNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `movie`
--

INSERT INTO `movie` (`ID`, `movCHName`, `movENName`, `movNum`, `director`, `starring`, `type`, `releaseDate`, `content`, `movLink`) VALUES
(1, '肖申克的救赎', 'The Shawshank Redemption', 'mov1', '弗兰克·德拉邦特', '蒂姆·罗宾斯 / 摩根·弗里曼', '剧情', '1994年9月23日美国', '银行家安迪因被当作杀害妻子与情夫的凶手，被判终身监禁。安迪在监狱中一方面帮监狱长做假账，一方面精心策划了一出越狱好戏。', '<a href="http://movie.mtime.com/12231/" target="_blank" title="肖申克的救赎/The Shawshank Redemption">\r\n								<img alt="肖申克的救赎/The Shawshank Redemption" width="96" height="128" class="img_box" src="img/mov1.jpg"></a>		'),
(2, '盗梦空间', 'Inception', 'mov2', '克里斯托弗·诺兰', '莱昂纳多·迪卡普里奥 / 艾伦·佩姬', '惊悚 / 科幻 / 冒险', '2010年9月1日中国', '本片被定义为“发生在意识结构内的当代动作科幻片”，诺兰继《黑暗骑士》后再次给我们带来惊喜，带观众游走于梦境与现实之间。', '<a href="http://movie.mtime.com/99547/" target="_blank" title="盗梦空间/Inception">\r\n										<img alt="盗梦空间/Inception" width="96" height="128" class="img_box" src="img/mov2.jpg"></a>'),
(3, '阿甘正传', 'Forrest Gump', 'mov3', '罗伯特·泽米吉斯', '汤姆·汉克斯 / 罗宾·怀特', '战争 / 喜剧 / 爱情', '1994年6月23日美国', '他是一个占据着成年人躯体的幼童、一个圣贤级的傻子、一个超越真实的普通人、一个代表着民族个性的小人物。', '<a href="http://movie.mtime.com/10054/" target="_blank" title="阿甘正传/Forrest Gump">\r\n										<img alt="阿甘正传/Forrest Gump" width="96" height="128" class="img_box" src="img/mov3.jpg"></a>'),
(4, '这个杀手不太冷', 'Léon', 'mov4', '吕克·贝松', '让·雷诺 / 娜塔莉·波特曼', '惊悚 / 剧情 / 犯罪', '1994年9月14日法国', '本片是吕克·贝松在好莱坞执导的第一部作品，非同一般的剧情、人物的精彩演出及出色的配乐使其成为九十年代动作片的经典之作。', '<a href="http://movie.mtime.com/12599/" target="_blank" title="这个杀手不太冷/Léon">\r\n										<img alt="这个杀手不太冷/Léon" width="96" height="128" class="img_box" src="img/mov4.jpg"></a>'),
(5, '蝙蝠侠：黑暗骑士崛起', 'The Dark Knight Rises', 'mov5', '克里斯托弗·诺兰', '克里斯蒂安·贝尔	 / 汤姆·哈迪', '动作 / 冒险 / 剧情', '2012年8月27日中国', '本片为导演诺兰一手打造的“新蝙蝠侠三部曲”最终章，蝙蝠侠将遇到神秘的猫女以及戴面具的恐怖分子贝恩…', '<a href="http://movie.mtime.com/125424/" target="_blank" title="蝙蝠侠：黑暗骑士崛起/The Dark Knight Rises">\r\n										<img alt="蝙蝠侠：黑暗骑士崛起/The Dark Knight Rises" width="96" height="128" class="img_box" src="img/mov5.jpg"></a>'),
(6, '魔戒首部曲：魔戒现身', 'The Lord of the Rings: The Fellowship of the Ring', 'mov6', '彼得·杰克逊', '伊安·麦克莱恩 / 伊利亚·伍德', '动作 / 奇幻 / 冒险', '2001年12月19日美国', '本片背景为神秘的史前时代，是一场正邪较量引发的长篇故事，而拯救世界的危险任务则落在年轻的哈比族人弗罗多·巴金斯的身上。', '<a href="http://movie.mtime.com/11404/" target="_blank" title="魔戒首部曲：魔戒现身/The Lord of the Rings: The Fellowship of the Ring">\r\n										<img alt="魔戒首部曲：魔戒现身/The Lord of the Rings: The Fellowship of the Ring" width="96" height="128" class="img_box" src="img/mov6.jpg"></a>'),
(7, '放牛班的春天', 'Les Choristes', 'mov7', '克里斯托夫·巴拉蒂', '杰拉尔·朱诺 / 尚-巴堤·莫里耶', '剧情 / 音乐', '2004年3月17日法国', '本片堪称法国版的《死亡诗社》，而且还有一丝《天堂电影院》的味道，凭感人的剧情成为年度法国票房冠军，动人的音乐令人难忘。', '<a href="http://movie.mtime.com/16682/" target="_blank" title="放牛班的春天/Les Choristes">\r\n										<img alt="放牛班的春天/Les Choristes" width="96" height="128" class="img_box" src="img/mov7.jpg"></a>'),
(8, '迈克尔·杰克逊：就是这样', 'This Is It', 'mov8', '肯尼·奥特加', '迈克尔·杰克逊 / 奥里安斯', '纪录片 / 音乐', '2009年10月28日中国', '这是一部纪录迈克尔·杰克逊在生前准备告别演唱会的影片，完整呈现他对演唱会每个环节事必躬亲参与并提供创意的各个细节。', '<a href="http://movie.mtime.com/112254/" target="_blank" title="迈克尔·杰克逊：就是这样/This Is It">\r\n										<img alt="迈克尔·杰克逊：就是这样/This Is It" width="96" height="128" class="img_box" src="img/mov8.jpg"></a>'),
(9, '玛丽和马克思', 'Mary and Max', 'mov9', '亚当·艾略特', '托妮·科莱特 / 菲利普·塞默·霍夫曼', '动画	/ 喜剧 / 剧情', '2009年4月9日澳大利亚', '圣丹斯电影节开幕大作，一部讲述笔友之间20多年友情的动画作品，同时这也是导演的半自传式的影片。', '<a href="http://movie.mtime.com/92909/" target="_blank" title="玛丽和马克思/Mary and Max">\r\n										<img alt="玛丽和马克思/Mary and Max" width="96" height="128" class="img_box" src="img/mov9.jpg"></a>'),
(10, '闻香识女人', 'Scent of a Woman', 'mov10', '马丁·布莱斯特', '阿尔·帕西诺 / 克里斯·奥唐纳', '剧情', '1992年12月23日美国', '一次意外的邂逅、一段性感的探戈、一出恣意的飙车和一段酣畅淋漓的演讲为我们完整地勾勒出生命从毁灭到重生的全部过程。', '<a href="http://movie.mtime.com/13695/" target="_blank" title="闻香识女人/Scent of a Woman">\r\n										<img alt="闻香识女人/Scent of a Woman" width="96" height="128" class="img_box" src="img/mov10.jpg"></a>\r\n');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL COMMENT '用户名',
  `Password` varchar(60) NOT NULL COMMENT '密码',
  `photo` varchar(100) NOT NULL COMMENT '头像',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`ID`, `userName`, `Password`, `photo`) VALUES
(1, 'lala', 'lulu', 'haha');
