/*
用于创建简历主表
*/
CREATE TABLE `ms_jianli` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL COMMENT '简历名称',
  `userId` bigint(20) NOT NULL COMMENT '简历所属用户id',
  `filepath` varchar(200) NOT NULL COMMENT '简历保存路径',
  `description` varchar(1000) DEFAULT NULL,
  `createtime` datetime NOT NULL,
  `updatetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8
