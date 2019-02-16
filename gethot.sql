/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : gethot

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-08-15 19:21:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for gh_article
-- ----------------------------
DROP TABLE IF EXISTS `gh_article`;
CREATE TABLE `gh_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `add_time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '0文章 1两性 2有关我们',
  `content` text COLLATE utf8_unicode_ci,
  `author` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of gh_article
-- ----------------------------
INSERT INTO `gh_article` VALUES ('29', null, '关于我们', '2015-12-25 22:53:54', '2', '<div class=\"sector\">    <div class=\"sector_content\">        <p>欢迎来到龙禧星。</p>               <p> 从2010年3月成立至今，凭借口碑传播，龙禧星已经发展成为在北京、上海、成都、广州、沈阳拥有总面积达五万多平米的自建仓储、            专业客服中心、超过3000万注册用户、月销售超过6亿元中国领先的化妆品电子商务网站，成为近年中国发展速度最快的电子商务公司之一。            而最初那小小的梦想，也已成为数千聚美优品人的信念：        </p>        <p>                        我们相信，选择可以很简单：与你一样热爱美丽的小美们，能为特别的你推荐最合适的美妆产品。        </p>        <p>                        我们相信，信任可以很简单：坚持30天无条件退货承诺，能让您的网购成为绝无风险的享受。        </p>        <p>                        我们相信，沟通可以很简单：几百位客服MM面对面般的贴心服务，能让您下的每一个订单都踏实安心。        </p>        <p>                        我们相信，省时可以很简单：百万元打造的物流配送系统，能让您心爱的美妆第一时间给您带来惊喜……        </p>        <p>                        我们相信互联网平等而开放的力量，我们相信用户的信任是最大的依靠，我们相信一群充满梦想的人，可以凭借着爱与执着，让你的美丽更简单！        </p>        <img src=\"http://images.jumei.com/templates/jumei/images/about/jumei_team.jpg\" alt=\"\">    </div></div>', '我', '1', '关于我们');
INSERT INTO `gh_article` VALUES ('59', null, '免责声明', null, '2', '&lt;td width=&quot;780&quot; class=&quot;S lh15&quot; style=&quot;line-height: 22px;&quot;&gt;\n      &lt;font color=&quot;#666666&quot;&gt;&lt;strong&gt;免责声明：&lt;/strong&gt; \n&lt;p&gt;1.以上所展示的信息由企业自行提供，内容的真实性、准确性和合法性由发布企业负责。龙禧星对此不承担任何保证责任。&lt;/p&gt;\n&lt;p&gt;\n2.如果以上产品侵犯您的版权或者非企业授权发布，请联系龙禧星,我们会在24小时内审核处理。\n&lt;/p&gt;\n&lt;p&gt;3.在线留言评论代表使用该企业产品的个人观点，如果不需要显示的留言或评论，联系龙禧星删除。&lt;/p&gt;\n&lt;p&gt;\n4.龙禧星只提供产品信息，一切交易将视为客户自行自愿交易，对交易风险由交易双方自行负责，龙禧星对此不承担任何保证责任。&lt;/p&gt;&lt;br&gt;\n    &lt;/font&gt;&lt;/td&gt;', '我', '1', '免责声明');
INSERT INTO `gh_article` VALUES ('62', null, '测试1', '2017-08-12 09:35:50', '3', '&lt;p&gt;sdfsdfsdf3222&lt;/p&gt;', '', '0', null);
INSERT INTO `gh_article` VALUES ('63', null, '测试2', '2017-08-12 09:35:55', '3', '&lt;p&gt;dddd&lt;/p&gt;', '', '0', null);
INSERT INTO `gh_article` VALUES ('64', null, '测试3', '2017-08-12 09:35:50', '3', '&lt;p&gt;sdfsdfsdf3222&lt;/p&gt;', '', '0', null);
INSERT INTO `gh_article` VALUES ('65', null, '测试154', '2017-08-12 09:35:55', '3', '&lt;p&gt;dddd&lt;/p&gt;', '', '0', null);
INSERT INTO `gh_article` VALUES ('66', null, '测试1测试5', '2017-08-12 09:35:50', '3', '&lt;p&gt;sdfsdfsdf3222&lt;/p&gt;', '', '0', null);
INSERT INTO `gh_article` VALUES ('67', null, '测试6', '2017-08-12 09:35:55', '3', '&lt;p&gt;dddd&lt;/p&gt;', '', '0', null);
INSERT INTO `gh_article` VALUES ('68', null, '测试87', '2017-08-12 09:35:50', '3', '&lt;p&gt;sdfsdfsdf3222&lt;/p&gt;', '', '0', null);
INSERT INTO `gh_article` VALUES ('69', null, '测试18', '2017-08-12 09:35:55', '3', '&lt;p&gt;dddd&lt;/p&gt;', '', '0', null);
INSERT INTO `gh_article` VALUES ('70', null, '测试9', '2017-08-12 09:35:50', '3', '&lt;p&gt;sdfsdfsdf3222&lt;/p&gt;', '', '0', null);
INSERT INTO `gh_article` VALUES ('71', null, '测试10', '2017-08-12 09:35:55', '3', '&lt;p&gt;dddd&lt;/p&gt;', '', '0', null);
INSERT INTO `gh_article` VALUES ('72', null, 'sdfsdf3333测试11', '2017-08-12 09:35:50', '3', '&lt;p&gt;sdfsdfsdf3222&lt;/p&gt;', '', '0', null);
INSERT INTO `gh_article` VALUES ('73', null, '测试12', '2017-08-12 09:35:55', '3', '&lt;p&gt;dddd&lt;/p&gt;', '', '0', null);
INSERT INTO `gh_article` VALUES ('74', null, 'sdfsdf3333', '2017-08-12 09:35:50', '3', '&lt;p&gt;sdfsdfsdf3222&lt;/p&gt;', '', '0', null);

-- ----------------------------
-- Table structure for gh_detail_tags
-- ----------------------------
DROP TABLE IF EXISTS `gh_detail_tags`;
CREATE TABLE `gh_detail_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tags` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(1) COLLATE utf8_unicode_ci NOT NULL COMMENT '0体育 1游戏 2美文 3两性 4关于',
  `count` int(11) DEFAULT NULL COMMENT '次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of gh_detail_tags
-- ----------------------------
INSERT INTO `gh_detail_tags` VALUES ('1', '时代发生的', '0', '1');
INSERT INTO `gh_detail_tags` VALUES ('2', '免责声明', '2', '1');
INSERT INTO `gh_detail_tags` VALUES ('3', '技术', '0', '1');
INSERT INTO `gh_detail_tags` VALUES ('4', '产品', '0', '1');
INSERT INTO `gh_detail_tags` VALUES ('5', '设计', '0', '1');
INSERT INTO `gh_detail_tags` VALUES ('6', '运营', '0', '1');
INSERT INTO `gh_detail_tags` VALUES ('7', '市场与销售', '0', '1');
INSERT INTO `gh_detail_tags` VALUES ('8', '职能', '0', '1');
INSERT INTO `gh_detail_tags` VALUES ('9', '金融', '0', '1');

-- ----------------------------
-- Table structure for gh_label
-- ----------------------------
DROP TABLE IF EXISTS `gh_label`;
CREATE TABLE `gh_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tags` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(1) COLLATE utf8_unicode_ci NOT NULL COMMENT '0体育 1游戏 2美文 3两性 4关于',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of gh_label
-- ----------------------------
INSERT INTO `gh_label` VALUES ('6', '流量充值,话费充值,物联卡充值,点卡充值', '2');
INSERT INTO `gh_label` VALUES ('8', '关于我们,免责声明', '4');
INSERT INTO `gh_label` VALUES ('16', '技术,产品,设计,运营,市场与销售,职能,金融', '0');
INSERT INTO `gh_label` VALUES ('17', '', '3');
INSERT INTO `gh_label` VALUES ('18', '流量优惠,流量资讯,流量充值', '1');

-- ----------------------------
-- Table structure for gh_sport
-- ----------------------------
DROP TABLE IF EXISTS `gh_sport`;
CREATE TABLE `gh_sport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `add_time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '0体育 1游戏',
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `week` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `small_time` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of gh_sport
-- ----------------------------
INSERT INTO `gh_sport` VALUES ('4', '2017-02-28 10:50', '后端工程师[车公庙] 2017-02-08', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('5', '2017-02-28 10:50', '2D动画师[深圳]', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('6', '2017-02-28 10:50', 'IOS开发工程师', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('7', '2017-02-28 10:50', '高级前端开发工程师', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('8', '2017-02-28 10:50', 'JAVA开发工程师', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('9', '2017-02-28 10:50', '财经BA-需求分析顾问', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('10', '2017-02-28 10:50', '交互设计师UE', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('15', '2017-02-28 10:50', '中国移动4G大优惠：套餐5折/免费300MB流量', '2017-12-23 12:11:22', '1', '1', '流量优惠,流量资讯,流量充值', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('16', '2017-02-28 10:50', '关于物联卡，你知道多少？', '2017-12-23 12:11:22', '1', '1', '流量优惠,流量资讯,流量充值', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('17', '2017-02-28 10:50', '有了物联网卡，你还会说4G流量贵吗？', '2017-12-23 12:11:22', '1', '1', '流量优惠,流量资讯,流量充值', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('18', '2017-02-28 10:50', '中国移动4G大优惠：套餐5折/免费300MB流量', '2017-12-23 12:11:22', '1', '1', '流量优惠,流量资讯,流量充值', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('19', '2017-02-28 10:50', '物联卡与普通的sim卡有什么区别', '2017-12-23 12:11:22', '1', '1', '流量优惠,流量资讯,流量充值', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('20', '2017-02-28 10:50', '中国移动4G大优惠：套餐5折/免费300MB流量', '2017-12-23 12:11:22', '1', '1', '流量优惠,流量资讯,流量充值', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('21', '2017-02-28 10:50', '2017年感恩大回馈，流量大放送！', '2017-12-23 12:11:22', '1', '1', '流量优惠,流量资讯,流量充值', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('22', '2017-02-28 10:50', '中国移动4G大优惠：套餐5折/免费300MB流量', '2017-12-23 12:11:22', '1', '1', '流量优惠,流量资讯,流量充值', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('23', '2017-02-28 10:50', '“春节流量大放送”是病毒?三家通信运营商均表示未开通此项业务', '2017-12-23 12:11:22', '1', '1', '流量优惠,流量资讯,流量充值', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('24', '2017-02-28 10:50', '中国移动4G大优惠：套餐5折/免费300MB流量', '2017-12-23 12:11:22', '1', '1', '流量优惠,流量资讯,流量充值', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('25', '2017-02-28 10:50', '关注“智慧流量”,领200M流量', '2017-12-23 12:11:22', '1', '1', '流量优惠,流量资讯,流量充值', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('26', '2017-02-28 10:50', '中国移动4G大优惠：套餐5折/免费300MB流量', '2017-12-23 12:11:22', '1', '1', '流量优惠,流量资讯,流量充值', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('28', '2017-02-28 10:50', '中国移动4G大优惠：套餐5折/免费300MB流量', '2017-12-23 12:11:22', '1', '1', '流量优惠,流量资讯,流量充值', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('29', '2017-02-28 10:50', '政府公关经理', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('30', '2017-02-28 10:50', '医疗行业销售总监', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('31', '2017-02-28 10:50', 'PHP高级开发工程师', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('32', '2017-02-28 10:50', '资深文案策划', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('33', '2017-02-28 10:50', '多大的', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('34', '2017-02-28 10:50', '后端工程师[车公庙] 2017-02-08', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('35', '2017-02-28 10:50', '2D动画师[深圳]', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('36', '2017-02-28 10:50', 'IOS开发工程师', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('37', '2017-02-28 10:50', '高级前端开发工程师', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('38', '2017-02-28 10:50', 'JAVA开发工程师', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('39', '2017-02-28 10:50', '财经BA-需求分析顾问', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('40', '2017-02-28 10:50', '交互设计师UE', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('41', '2017-02-28 10:50', '单片机工程师', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '02月23日', '星期二', '09:50');
INSERT INTO `gh_sport` VALUES ('49', '2017-02-28 10:50', '政府公关经理', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '02月22日', '星期一', '09:45');
INSERT INTO `gh_sport` VALUES ('50', '2017-02-28 10:50', '医疗行业销售总监', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('51', '2017-02-28 10:50', 'PHP高级开发工程师', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('52', '2017-02-28 10:50', '资深文案策划', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('53', '2017-02-28 10:50', '后端工程师[车公庙] 2017-02-08', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '12月28日', '星期四', '23:15');
INSERT INTO `gh_sport` VALUES ('54', '2017-02-11 10:15', '2D动画师[深圳]', '2017-12-23 12:11:22', '0', '1', '技术,产品,设计,运营,市场与销售,职能,金融', '02月11日', '星期六', '10:15');
INSERT INTO `gh_sport` VALUES ('55', '2017-02-28 10:50', '中国移动4G大优惠：套餐5折/免费300MB流量', '2017-12-23 12:11:22', '1', '1', '流量优惠,流量资讯,流量充值', '12月27日', '星期日', '09:45');

-- ----------------------------
-- Table structure for gh_sport_url
-- ----------------------------
DROP TABLE IF EXISTS `gh_sport_url`;
CREATE TABLE `gh_sport_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `sport_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gh_sport_url_gh_sport` (`sport_id`),
  CONSTRAINT `fk_gh_sport_url_gh_sport` FOREIGN KEY (`sport_id`) REFERENCES `gh_sport` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of gh_sport_url
-- ----------------------------
INSERT INTO `gh_sport_url` VALUES ('1', '', '', '54');

-- ----------------------------
-- Table structure for gh_user
-- ----------------------------
DROP TABLE IF EXISTS `gh_user`;
CREATE TABLE `gh_user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gh_user
-- ----------------------------
INSERT INTO `gh_user` VALUES ('1', 'admin', '123@abc');
