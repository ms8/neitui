/*
Navicat MySQL Data Transfer

Source Server         : ms
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : ms8

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2013-12-23 21:07:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ms_dictionary`
-- ----------------------------
DROP TABLE IF EXISTS `ms_dictionary`;
CREATE TABLE `ms_dictionary` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL COMMENT '字典代码',
  `name` varchar(100) NOT NULL COMMENT '名称',
  `type` varchar(10) NOT NULL COMMENT '字典类型，对应字典类型表ms_dictionary_type中的type',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ms_dictionary
-- ----------------------------
INSERT INTO `ms_dictionary` VALUES ('1', 'wlaq', '网络安全', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('2', 'software', '软件', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('3', 'infoManage', '信息管理', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('4', 'netManage', '网络运维', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('5', 'wireless', '无线系统', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('6', 'IDC', 'IDC', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('7', 'hardware', '硬件', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('8', 'mobile', '移动开发', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('9', 'pageDesign', '网页设计', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('10', 'financial', '财务会计', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('11', 'electric', '电气', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('12', 'implement', '实施', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('13', 'quality', '质检', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('14', 'materials', '物流', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('15', 'machinics', '机械', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('16', 'jinron', '金融', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('17', 'jianzhu', '建筑', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('18', 'nengyuan', '能源', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('19', 'food', '食品', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('20', 'law', '法律', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('21', 'swyx', '生物医学', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('22', 'qihua', '企划', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('23', 'hr', '人力', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('24', 'bianji', '编辑', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('25', 'xzzl', '行政助理', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('26', 'kefu', '客服', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('27', 'pinxuan', '品牌宣传', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('28', 'guanpei', '管理培训生', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('29', 'teacher', '教师', 'zp_tag');
INSERT INTO `ms_dictionary` VALUES ('30', 'language', '语言', 'zp_tag');

-- ----------------------------
-- Table structure for `ms_dictionary_type`
-- ----------------------------
DROP TABLE IF EXISTS `ms_dictionary_type`;
CREATE TABLE `ms_dictionary_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL COMMENT '字典类型代码',
  `name` varchar(100) NOT NULL COMMENT '字典类型名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ms_dictionary_type
-- ----------------------------
INSERT INTO `ms_dictionary_type` VALUES ('1', 'zp_tag', '招聘会公司的职位类别');


-- ----------------------------
-- Records of ms_itemchildren
-- ----------------------------
INSERT INTO `ms_itemchildren` VALUES ('总管理', 'msdictionary');
INSERT INTO `ms_itemchildren` VALUES ('总管理', 'msdictionarytype');
INSERT INTO `ms_itemchildren` VALUES ('总管理', 'mszhaopinhui');
INSERT INTO `ms_itemchildren` VALUES ('总管理', 'mszpdetail');


-- ----------------------------
-- Records of ms_items
-- ----------------------------
INSERT INTO `ms_items` VALUES ('mszhaopinhui', '1', '录入招聘会', null, 's:12:\"活动管理\";', null);
INSERT INTO `ms_items` VALUES ('mszpdetail', '1', '录入招聘会公司', null, 's:12:\"活动管理\";', null);
INSERT INTO `ms_items` VALUES ('msdictionarytype', '1', '数据字典类型', null, 's:12:\"字典管理\";', null);
INSERT INTO `ms_items` VALUES ('msdictionary', '1', '数据字典', null, 's:12:\"字典管理\";', null);


-- ----------------------------
-- Records of ms_role
-- ----------------------------
INSERT INTO `ms_role` VALUES ('1', '1', '小粉丝', '1', '1387032325', '1', '1', null);

INSERT INTO `ms_tag` VALUES ('0', '0', '顶级分类', '1', '2013-12-14 23:00:52');

-- ----------------------------
-- Table structure for `ms_zhaopinhui`
-- ----------------------------
DROP TABLE IF EXISTS `ms_zhaopinhui`;
CREATE TABLE `ms_zhaopinhui` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '招聘会名称',
  `activity_date` datetime NOT NULL COMMENT '活动时间',
  `activity_address` varchar(200) DEFAULT NULL COMMENT '活动地址，可以为空',
  `status` varchar(1) DEFAULT NULL COMMENT '招聘会状态，0为过时，1为可用，批处理将当前日期之前（包括当前日期）的置为0',
  `description` varchar(500) DEFAULT NULL COMMENT '招聘会简介，可为空',
  `createtime` datetime NOT NULL COMMENT '本记录创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ms_zhaopinhui
-- ----------------------------
INSERT INTO `ms_zhaopinhui` VALUES ('1', '北京理工大学冬季招聘会专场', '2013-12-20 00:00:00', '北京理工大学操场', '1', '北京理工大学冬季招聘会专场，众多企业参与', '2013-12-19 00:00:00');
INSERT INTO `ms_zhaopinhui` VALUES ('2', '北京科技大学研究生专场招聘会', '2013-12-23 13:00:00', '北京科技大学操场', '1', '这是一场针对研究生的招聘会，会有众多企业众多职位', '2013-12-20 20:36:06');
INSERT INTO `ms_zhaopinhui` VALUES ('3', '北京大学招聘会专场', '2013-12-21 10:11:00', '北京大学操场', '1', '这是一场互联网行业的招聘会', '2013-12-20 20:49:51');

-- ----------------------------
-- Table structure for `ms_zpdetail`
-- ----------------------------
DROP TABLE IF EXISTS `ms_zpdetail`;
CREATE TABLE `ms_zpdetail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `zpId` bigint(20) NOT NULL COMMENT '所属招聘会的id',
  `companyId` bigint(20) DEFAULT NULL COMMENT '所属公司Id，如果站内暂不存在此公司，为空',
  `name` varchar(100) NOT NULL COMMENT '公司名称',
  `position` varchar(100) NOT NULL COMMENT '招聘岗位',
  `description` varchar(2000) DEFAULT NULL COMMENT '岗位描述',
  `apply` varchar(1) DEFAULT NULL COMMENT '能否接受网申，将来扩展用，0：不能，1：可以',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ms_zpdetail
-- ----------------------------
INSERT INTO `ms_zpdetail` VALUES ('1', '1', null, '华为技术有限公司', '初级软件工程师', '路由器网点系统开发方向', '0');
INSERT INTO `ms_zpdetail` VALUES ('2', '2', null, '心意技术有限公司', '中级软件工程师', '电商系统开发方向', '0');
INSERT INTO `ms_zpdetail` VALUES ('7', '1', null, '标签测试公司', '标签测试职位', '没有描述', '0');

-- ----------------------------
-- Table structure for `ms_zpdetail_tag`
-- ----------------------------
DROP TABLE IF EXISTS `ms_zpdetail_tag`;
CREATE TABLE `ms_zpdetail_tag` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `zp_detailid` bigint(20) NOT NULL COMMENT 'ms_zpdetail表主键Id',
  `tag_code` varchar(10) NOT NULL COMMENT 'tag代码，对应字典表的code',
  `tag_name` varchar(100) DEFAULT NULL COMMENT 'tag名称，对应字典表的name',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ms_zpdetail_tag
-- ----------------------------
INSERT INTO `ms_zpdetail_tag` VALUES ('4', '7', 'infoManage', '信息管理');
INSERT INTO `ms_zpdetail_tag` VALUES ('5', '7', 'materials', '物流');
INSERT INTO `ms_zpdetail_tag` VALUES ('6', '7', 'kefu', '客服');
