/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : fuxijiaoyu_db

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2017-08-28 23:02:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for fx_ad
-- ----------------------------
DROP TABLE IF EXISTS `fx_ad`;
CREATE TABLE `fx_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '广告位ID',
  `title` varchar(80) NOT NULL DEFAULT '' COMMENT '标题',
  `fileurl` varchar(100) NOT NULL DEFAULT '' COMMENT '文件地址',
  `linkurl` varchar(100) NOT NULL DEFAULT '' COMMENT '链接地址',
  `content` varchar(200) NOT NULL DEFAULT '' COMMENT '简介',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '广告类型：1文字，2图片，3Flash，4视频',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `display` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示：1显示，2隐藏',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='广告表';

-- ----------------------------
-- Records of fx_ad
-- ----------------------------

-- ----------------------------
-- Table structure for fx_admin
-- ----------------------------
DROP TABLE IF EXISTS `fx_admin`;
CREATE TABLE `fx_admin` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员用户ID',
  `username` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `auth_key` varchar(32) NOT NULL DEFAULT '' COMMENT '自动登录key',
  `password_hash` varchar(255) NOT NULL DEFAULT '' COMMENT '加密密码',
  `password_reset_token` varchar(255) NOT NULL DEFAULT '' COMMENT '重置密码token',
  `roleid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `status` tinyint(1) NOT NULL DEFAULT '10' COMMENT '状态',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='管理员用户表';

-- ----------------------------
-- Records of fx_admin
-- ----------------------------
INSERT INTO `fx_admin` VALUES ('1', 'rootmd', 'wcPN-MixqxNlo0cZcY3W0tfn5YbKHSu8', '$2y$13$SToDqRGCf.r8R4z8BBqk2OJSy8fweQc9R8fGsS0yE3tC0y89fF6Du', '', '1', 'wdyuanyue@qq.com', '10', '1473609004', '1473609004');
INSERT INTO `fx_admin` VALUES ('2', 'admin', 'wcPN-MixqxNlo0cZcY3W0tfn5YbKHSu8', '$2y$13$SToDqRGCf.r8R4z8BBqk2OJSy8fweQc9R8fGsS0yE3tC0y89fF6Du', '', '2', 'wdyuanyue@qq.com', '10', '0', '1473989606');

-- ----------------------------
-- Table structure for fx_admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `fx_admin_menu`;
CREATE TABLE `fx_admin_menu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '后台菜单ID',
  `name` varchar(128) NOT NULL DEFAULT '' COMMENT '菜单名',
  `parentid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '父菜单名ID',
  `route` varchar(255) NOT NULL DEFAULT '' COMMENT '路由',
  `order` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  `data` blob NOT NULL COMMENT '数据',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `idx_order` (`order`),
  KEY `idx_parentid` (`parentid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

-- ----------------------------
-- Records of fx_admin_menu
-- ----------------------------
INSERT INTO `fx_admin_menu` VALUES ('1', '系统设置', '0', '', '0', 0x7B2269636F6E223A2266612066612D6C6F636B222C2276697369626C65223A747275657D, '0');
INSERT INTO `fx_admin_menu` VALUES ('2', '路由', '1', '/admin/route/index', '1', 0x7B2269636F6E223A2266612066612D636972636C652D6F222C2276697369626C65223A747275657D, '0');
INSERT INTO `fx_admin_menu` VALUES ('3', '权限', '1', '/admin/permission/index', '2', 0x7B2269636F6E223A2266612066612D636972636C652D6F222C2276697369626C65223A747275657D, '0');
INSERT INTO `fx_admin_menu` VALUES ('4', '角色', '1', '/admin/role/index', '3', 0x7B2269636F6E223A2266612066612D636972636C652D6F222C2276697369626C65223A747275657D, '0');
INSERT INTO `fx_admin_menu` VALUES ('5', '分配', '1', '/admin/assignment/index', '4', 0x7B2269636F6E223A2266612066612D636972636C652D6F222C2276697369626C65223A747275657D, '0');
INSERT INTO `fx_admin_menu` VALUES ('6', '菜单', '1', '/admin/menu/index', '5', 0x7B2269636F6E223A2266612066612D636972636C652D6F222C2276697369626C65223A747275657D, '0');
INSERT INTO `fx_admin_menu` VALUES ('7', '用户管理', '0', '/admin/user/index', '0', 0x7B2269636F6E223A2266612066612D7573657273222C2276697369626C65223A747275657D, '0');
INSERT INTO `fx_admin_menu` VALUES ('8', '账号', '1', '/admin/user/index', '0', 0x7B2269636F6E223A2266612066612D636972636C652D6F222C2276697369626C65223A747275657D, '0');

-- ----------------------------
-- Table structure for fx_admin_permission
-- ----------------------------
DROP TABLE IF EXISTS `fx_admin_permission`;
CREATE TABLE `fx_admin_permission` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限ID',
  `name` varchar(128) NOT NULL DEFAULT '' COMMENT '权限名',
  `route` varchar(64) NOT NULL DEFAULT '' COMMENT '路由',
  `data` varchar(128) NOT NULL DEFAULT '' COMMENT '参数数据',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
-- Records of fx_admin_permission
-- ----------------------------
INSERT INTO `fx_admin_permission` VALUES ('1', '账号', '/admin/user/*', '', '0', '0', '1503850116');
INSERT INTO `fx_admin_permission` VALUES ('2', '分配', '/admin/assignment/*', '', '0', '0', '0');
INSERT INTO `fx_admin_permission` VALUES ('3', '权限', '/admin/permission/*', '', '0', '1487316478', '1487318259');
INSERT INTO `fx_admin_permission` VALUES ('4', '菜单', '/admin/menu/*', '', '0', '1487323177', '1487323177');
INSERT INTO `fx_admin_permission` VALUES ('5', '路由', '/admin/route/*', '', '0', '0', '0');
INSERT INTO `fx_admin_permission` VALUES ('6', '角色', '/admin/role/*', '', '0', '0', '0');

-- ----------------------------
-- Table structure for fx_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `fx_admin_role`;
CREATE TABLE `fx_admin_role` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色ID',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '角色名称',
  `description` text NOT NULL COMMENT '描述',
  `order` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `idx_order` (`order`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='管理员角色表';

-- ----------------------------
-- Records of fx_admin_role
-- ----------------------------
INSERT INTO `fx_admin_role` VALUES ('1', 'root', 'ROOT', '0', '0', '0', '0');
INSERT INTO `fx_admin_role` VALUES ('2', 'administrator', '超级管理员', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for fx_admin_role_perm
-- ----------------------------
DROP TABLE IF EXISTS `fx_admin_role_perm`;
CREATE TABLE `fx_admin_role_perm` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `roleid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  `permid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '权限ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_roleid_route` (`roleid`,`permid`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='角色权限表';

-- ----------------------------
-- Records of fx_admin_role_perm
-- ----------------------------
INSERT INTO `fx_admin_role_perm` VALUES ('19', '1', '8');
INSERT INTO `fx_admin_role_perm` VALUES ('22', '1', '2');
INSERT INTO `fx_admin_role_perm` VALUES ('23', '1', '4');
INSERT INTO `fx_admin_role_perm` VALUES ('27', '1', '3');
INSERT INTO `fx_admin_role_perm` VALUES ('34', '1', '6');
INSERT INTO `fx_admin_role_perm` VALUES ('35', '1', '5');
INSERT INTO `fx_admin_role_perm` VALUES ('36', '1', '7');
INSERT INTO `fx_admin_role_perm` VALUES ('39', '2', '6');
INSERT INTO `fx_admin_role_perm` VALUES ('40', '2', '1');
INSERT INTO `fx_admin_role_perm` VALUES ('41', '1', '1');

-- ----------------------------
-- Table structure for fx_admin_route
-- ----------------------------
DROP TABLE IF EXISTS `fx_admin_route`;
CREATE TABLE `fx_admin_route` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '后台路由ID',
  `route` varchar(64) NOT NULL DEFAULT '' COMMENT '路由',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='后台路由表';

-- ----------------------------
-- Records of fx_admin_route
-- ----------------------------
INSERT INTO `fx_admin_route` VALUES ('1', '/admin/assignment/*');
INSERT INTO `fx_admin_route` VALUES ('2', '/admin/default/*');
INSERT INTO `fx_admin_route` VALUES ('3', '/admin/menu/*');
INSERT INTO `fx_admin_route` VALUES ('4', '/admin/permission/*');
INSERT INTO `fx_admin_route` VALUES ('5', '/admin/role/*');
INSERT INTO `fx_admin_route` VALUES ('6', '/admin/route/*');
INSERT INTO `fx_admin_route` VALUES ('25', '/admin/assignment/index');
INSERT INTO `fx_admin_route` VALUES ('26', '/admin/menu/index');
INSERT INTO `fx_admin_route` VALUES ('27', '/admin/permission/index');
INSERT INTO `fx_admin_route` VALUES ('28', '/admin/role/index');
INSERT INTO `fx_admin_route` VALUES ('29', '/admin/route/index');
INSERT INTO `fx_admin_route` VALUES ('38', '/admin/user/index');
INSERT INTO `fx_admin_route` VALUES ('39', '/admin/user/*');

-- ----------------------------
-- Table structure for fx_ad_position
-- ----------------------------
DROP TABLE IF EXISTS `fx_ad_position`;
CREATE TABLE `fx_ad_position` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '广告位名称',
  `width` smallint(4) unsigned NOT NULL DEFAULT '0' COMMENT '宽度',
  `height` smallint(4) unsigned NOT NULL DEFAULT '0' COMMENT '高度',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用：0启用，1禁用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='广告位表';

-- ----------------------------
-- Records of fx_ad_position
-- ----------------------------

-- ----------------------------
-- Table structure for fx_category
-- ----------------------------
DROP TABLE IF EXISTS `fx_category`;
CREATE TABLE `fx_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `modelid` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `arrparentid` varchar(200) NOT NULL DEFAULT '' COMMENT '所有父类ID',
  `child` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否存在子栏目：0不存在，1存在',
  `arrchildid` varchar(200) NOT NULL DEFAULT '' COMMENT '所有子栏目ID',
  `catname` varchar(30) NOT NULL DEFAULT '' COMMENT '栏目名称',
  `pic` varchar(100) NOT NULL DEFAULT '' COMMENT '图片',
  `description` varchar(500) NOT NULL DEFAULT '' COMMENT '描述',
  `parentdir` varchar(100) NOT NULL DEFAULT '' COMMENT '父目录',
  `catdir` varchar(30) NOT NULL DEFAULT '' COMMENT '目录',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '链接地址',
  `setting` text NOT NULL COMMENT '配置信息',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `ismenu` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of fx_category
-- ----------------------------

-- ----------------------------
-- Table structure for fx_course
-- ----------------------------
DROP TABLE IF EXISTS `fx_course`;
CREATE TABLE `fx_course` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `name` varchar(80) NOT NULL DEFAULT '' COMMENT '课程名称',
  `subtitle` varchar(80) NOT NULL DEFAULT '' COMMENT '副标题',
  `teacherid` smallint(8) unsigned NOT NULL DEFAULT '0' COMMENT '主讲老师ID',
  `thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '缩略图',
  `keywords` varchar(50) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '描述',
  `price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `difficulty_level` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '难度等级：1初级，2中级，3高级',
  `course_number` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '每期课程节数',
  `course_duration` smallint(4) unsigned NOT NULL DEFAULT '0' COMMENT '每节课程时长（分钟）',
  `posids` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有推荐位：0无，1有',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '链接地址',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '审核状态',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否外部链接：0否，1是',
  `author` varchar(30) NOT NULL DEFAULT '' COMMENT '作者',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='课程模型主表';

-- ----------------------------
-- Records of fx_course
-- ----------------------------

-- ----------------------------
-- Table structure for fx_course_collection
-- ----------------------------
DROP TABLE IF EXISTS `fx_course_collection`;
CREATE TABLE `fx_course_collection` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID',
  `courseid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '课程ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='课程收藏表';

-- ----------------------------
-- Records of fx_course_collection
-- ----------------------------

-- ----------------------------
-- Table structure for fx_course_data
-- ----------------------------
DROP TABLE IF EXISTS `fx_course_data`;
CREATE TABLE `fx_course_data` (
  `id` int(10) unsigned DEFAULT '0' COMMENT '课程ID',
  `content` text NOT NULL COMMENT '课程详情',
  `syllabus` text NOT NULL COMMENT '课程大纲',
  `data` varchar(100) NOT NULL DEFAULT '' COMMENT '资料下载地址',
  `material` varchar(100) NOT NULL DEFAULT '' COMMENT '电子教材地址',
  `template` varchar(30) NOT NULL DEFAULT '' COMMENT '模板',
  `click` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击量',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='课程模型副表';

-- ----------------------------
-- Records of fx_course_data
-- ----------------------------

-- ----------------------------
-- Table structure for fx_course_section
-- ----------------------------
DROP TABLE IF EXISTS `fx_course_section`;
CREATE TABLE `fx_course_section` (
  `id` int(10) unsigned DEFAULT '0' COMMENT '课程ID',
  `name` varchar(80) NOT NULL COMMENT '小节名称',
  `subtitle` varchar(80) NOT NULL DEFAULT '' COMMENT '副标题',
  `video` varchar(100) NOT NULL DEFAULT '' COMMENT '视频地址',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '链接地址',
  `template` varchar(30) NOT NULL DEFAULT '' COMMENT '模板',
  `audition` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否可试听：0不可以，1可以',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='课程小节';

-- ----------------------------
-- Records of fx_course_section
-- ----------------------------

-- ----------------------------
-- Table structure for fx_enroll
-- ----------------------------
DROP TABLE IF EXISTS `fx_enroll`;
CREATE TABLE `fx_enroll` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '姓名',
  `contact` varchar(20) NOT NULL DEFAULT '' COMMENT '联系方式',
  `learn` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否学过琴：0没学过，1学过',
  `learning_level` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '学习程度：1没有接触过，2个般，3想系统学习',
  `expect_teacher` varchar(30) NOT NULL DEFAULT '' COMMENT '期望老师',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '报名时间',
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作人ID',
  `note` varchar(50) NOT NULL DEFAULT '' COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0.未处理，1.已处理',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='报名申请表';

-- ----------------------------
-- Records of fx_enroll
-- ----------------------------

-- ----------------------------
-- Table structure for fx_feedback
-- ----------------------------
DROP TABLE IF EXISTS `fx_feedback`;
CREATE TABLE `fx_feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '姓名',
  `phone` bigint(11) NOT NULL DEFAULT '0' COMMENT '手机',
  `email` varchar(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `content` varchar(20) NOT NULL DEFAULT '' COMMENT '内容',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `note` varchar(50) NOT NULL DEFAULT '' COMMENT '备注',
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作人ID',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0.未处理，1.已处理',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='意见反馈';

-- ----------------------------
-- Records of fx_feedback
-- ----------------------------

-- ----------------------------
-- Table structure for fx_member
-- ----------------------------
DROP TABLE IF EXISTS `fx_member`;
CREATE TABLE `fx_member` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `auth_key` varchar(32) NOT NULL DEFAULT '' COMMENT '自动登录key',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `password_reset_token` varchar(255) NOT NULL DEFAULT '' COMMENT '重置密码token',
  `email_validate_token` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱验证token',
  `nickname` varchar(20) NOT NULL DEFAULT '' COMMENT '昵称',
  `photo` varchar(100) NOT NULL DEFAULT '' COMMENT '头像',
  `phone` bigint(11) unsigned NOT NULL DEFAULT '0' COMMENT '手机号',
  `email` char(32) NOT NULL DEFAULT '' COMMENT '邮箱',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '用户类型：1学生，2教师',
  `amount` decimal(8,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '金钱',
  `point` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `regtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `lasttime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `regip` int(10) NOT NULL DEFAULT '0' COMMENT '注册ip',
  `lastip` int(10) NOT NULL DEFAULT '0' COMMENT '上次登录ip',
  `loginnum` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `islock` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否锁定：0未锁定，1已锁定',
  `vip` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'VIP等级',
  `overduedate` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'VIP过期时间',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of fx_member
-- ----------------------------

-- ----------------------------
-- Table structure for fx_member_student
-- ----------------------------
DROP TABLE IF EXISTS `fx_member_student`;
CREATE TABLE `fx_member_student` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `realname` varchar(20) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '性别：1男，2女',
  `hobby` varchar(200) NOT NULL DEFAULT '' COMMENT '个人爱好',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='学生资料表';

-- ----------------------------
-- Records of fx_member_student
-- ----------------------------

-- ----------------------------
-- Table structure for fx_member_teacher
-- ----------------------------
DROP TABLE IF EXISTS `fx_member_teacher`;
CREATE TABLE `fx_member_teacher` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `realname` varchar(20) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '性别：1男，2女',
  `hobby` varchar(200) NOT NULL DEFAULT '' COMMENT '个人爱好',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='教师资料表';

-- ----------------------------
-- Records of fx_member_teacher
-- ----------------------------

-- ----------------------------
-- Table structure for fx_model
-- ----------------------------
DROP TABLE IF EXISTS `fx_model`;
CREATE TABLE `fx_model` (
  `modelid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '模型ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '模型名称',
  `description` varchar(100) NOT NULL DEFAULT '' COMMENT '描述',
  `tablename` varchar(20) NOT NULL DEFAULT '' COMMENT '表名',
  `setting` text NOT NULL COMMENT '配置信息',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用：0启用，1禁用',
  `category_template` varchar(30) NOT NULL DEFAULT '' COMMENT '栏目模板',
  `list_template` varchar(30) NOT NULL DEFAULT '' COMMENT '列表页模板',
  `show_template` varchar(30) NOT NULL DEFAULT '' COMMENT '内容页模板',
  `js_template` varchar(30) NOT NULL DEFAULT '' COMMENT 'JS模板',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`modelid`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='模型表';

-- ----------------------------
-- Records of fx_model
-- ----------------------------
INSERT INTO `fx_model` VALUES ('1', '文章模型', '', 'news', '', '0', '0', 'category', 'list', 'show', '', '0', '0');
INSERT INTO `fx_model` VALUES ('2', '下载模型', '', 'download', '', '0', '0', 'category_download', 'list_download', 'show_download', '', '0', '0');
INSERT INTO `fx_model` VALUES ('3', '图片模型', '', 'picture', '', '0', '0', 'category_picture', 'list_picture', 'show_picture', '', '0', '0');
INSERT INTO `fx_model` VALUES ('10', '普通会员', '普通会员', 'member_detail', '', '0', '0', '', '', '', '', '0', '2');
INSERT INTO `fx_model` VALUES ('11', '视频模型', '', 'video', '', '0', '0', 'category_video', 'list_video', 'show_video', '', '0', '0');

-- ----------------------------
-- Table structure for fx_news
-- ----------------------------
DROP TABLE IF EXISTS `fx_news`;
CREATE TABLE `fx_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `title` varchar(80) NOT NULL DEFAULT '' COMMENT '标题',
  `subtitle` varchar(80) NOT NULL DEFAULT '' COMMENT '副标题',
  `thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '缩略图',
  `video` varchar(100) NOT NULL DEFAULT '' COMMENT '视频地址',
  `keywords` varchar(50) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '描述',
  `posids` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有推荐位：0无，1有',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '链接地址',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '审核状态',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否外部链接：0否，1是',
  `author` varchar(30) NOT NULL DEFAULT '' COMMENT '作者',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章模型主表';

-- ----------------------------
-- Records of fx_news
-- ----------------------------

-- ----------------------------
-- Table structure for fx_news_data
-- ----------------------------
DROP TABLE IF EXISTS `fx_news_data`;
CREATE TABLE `fx_news_data` (
  `id` int(10) unsigned DEFAULT '0' COMMENT '文章ID',
  `content` text NOT NULL COMMENT '内容',
  `template` varchar(30) NOT NULL DEFAULT '' COMMENT '模板',
  `copyfrom` varchar(100) NOT NULL DEFAULT '' COMMENT '来源',
  `click` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击量',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章模型副表';

-- ----------------------------
-- Records of fx_news_data
-- ----------------------------

-- ----------------------------
-- Table structure for fx_notify
-- ----------------------------
DROP TABLE IF EXISTS `fx_notify`;
CREATE TABLE `fx_notify` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '消息ID',
  `content` varchar(500) NOT NULL DEFAULT '' COMMENT '消息内容',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '消息类型 1公告 2提醒  3私信',
  `target_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '目标ID',
  `target_type` varchar(20) NOT NULL DEFAULT '' COMMENT '目标类型',
  `action` varchar(30) NOT NULL DEFAULT '' COMMENT '提醒信息动作类型',
  `sender_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '发送者ID 1系统',
  `sender_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '消息发送者类型：1学员 2教师 3系统',
  `created_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='消息表';

-- ----------------------------
-- Records of fx_notify
-- ----------------------------

-- ----------------------------
-- Table structure for fx_notify_receive
-- ----------------------------
DROP TABLE IF EXISTS `fx_notify_receive`;
CREATE TABLE `fx_notify_receive` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户消息ID',
  `is_read` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否已读  1是  0否',
  `receiver_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '消息接收者',
  `receiver_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '消息接收者类型：1学员 2教师',
  `notify_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '消息ID',
  `notify_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '消息类型 1公告 2提醒  3私信',
  `created_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户消息表';

-- ----------------------------
-- Records of fx_notify_receive
-- ----------------------------

-- ----------------------------
-- Table structure for fx_notify_subscription
-- ----------------------------
DROP TABLE IF EXISTS `fx_notify_subscription`;
CREATE TABLE `fx_notify_subscription` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订阅ID',
  `target_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '目标ID',
  `target_type` varchar(20) NOT NULL DEFAULT '' COMMENT '目标类型',
  `action` varchar(30) NOT NULL DEFAULT '' COMMENT '订阅动作',
  `subscriber_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '消息订阅者',
  `subscriber_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '消息订阅者类型：1学员 2教师',
  `created_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='订阅表';

-- ----------------------------
-- Records of fx_notify_subscription
-- ----------------------------
INSERT INTO `fx_notify_subscription` VALUES ('1', '1', 'question', 'question_type_3_new', '68118247', '1', '1496906187');
INSERT INTO `fx_notify_subscription` VALUES ('2', '1', 'question', 'question_type_3_timeout', '68118247', '1', '1496906187');
INSERT INTO `fx_notify_subscription` VALUES ('3', '2', 'registration', 'registration_type_3_new', '13996218', '2', '1496907427');
INSERT INTO `fx_notify_subscription` VALUES ('4', '3', 'question', 'question_type_3_new', '68118247', '1', '1496906187');
INSERT INTO `fx_notify_subscription` VALUES ('5', '3', 'question', 'question_type_3_timeout', '68118247', '1', '1496906187');

-- ----------------------------
-- Table structure for fx_notify_subscription_config
-- ----------------------------
DROP TABLE IF EXISTS `fx_notify_subscription_config`;
CREATE TABLE `fx_notify_subscription_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `subscriber_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '消息订阅者',
  `subscriber_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '消息订阅者类型：1学员 2教师',
  `action` varchar(500) NOT NULL DEFAULT '' COMMENT '用户的配置json',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订阅配置表';

-- ----------------------------
-- Records of fx_notify_subscription_config
-- ----------------------------

-- ----------------------------
-- Table structure for fx_order
-- ----------------------------
DROP TABLE IF EXISTS `fx_order`;
CREATE TABLE `fx_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `orderid` varchar(30) NOT NULL DEFAULT '' COMMENT '订单号',
  `courseid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '课程ID',
  `userid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID',
  `amount` decimal(8,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '金额',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '报名时间',
  `paytime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '支付时间',
  `pay_number` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '交易流水号',
  `pay_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '支付方式：1支付宝，2微信',
  `note` varchar(50) NOT NULL DEFAULT '' COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0未支付，1已支付，2支付过期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='报名订单表';

-- ----------------------------
-- Records of fx_order
-- ----------------------------

-- ----------------------------
-- Table structure for fx_page
-- ----------------------------
DROP TABLE IF EXISTS `fx_page`;
CREATE TABLE `fx_page` (
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `title` varchar(80) NOT NULL DEFAULT '' COMMENT '标题',
  `subtitle` varchar(80) NOT NULL DEFAULT '' COMMENT '副标题',
  `thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '缩略图',
  `video` varchar(100) NOT NULL DEFAULT '' COMMENT '视频地址',
  `keywords` varchar(50) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '描述',
  `content` text NOT NULL COMMENT '内容',
  `template` varchar(30) NOT NULL DEFAULT '' COMMENT '模板',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='单网页模型表';

-- ----------------------------
-- Records of fx_page
-- ----------------------------

-- ----------------------------
-- Table structure for fx_position
-- ----------------------------
DROP TABLE IF EXISTS `fx_position`;
CREATE TABLE `fx_position` (
  `posid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '推荐位ID',
  `modelid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '推荐位名称',
  `maxnum` smallint(5) unsigned NOT NULL DEFAULT '20' COMMENT '最大保存条数',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`posid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='推荐位表';

-- ----------------------------
-- Records of fx_position
-- ----------------------------
INSERT INTO `fx_position` VALUES ('1', '0', '0', '首页焦点图推荐', '20', '1');
INSERT INTO `fx_position` VALUES ('2', '0', '0', '首页头条推荐', '20', '4');
INSERT INTO `fx_position` VALUES ('13', '82', '0', '栏目页焦点图', '20', '0');
INSERT INTO `fx_position` VALUES ('5', '69', '0', '推荐下载', '20', '0');
INSERT INTO `fx_position` VALUES ('8', '30', '54', '图片频道首页焦点图', '20', '0');
INSERT INTO `fx_position` VALUES ('9', '0', '0', '网站顶部推荐', '20', '0');
INSERT INTO `fx_position` VALUES ('10', '0', '0', '栏目首页推荐', '20', '0');
INSERT INTO `fx_position` VALUES ('12', '0', '0', '首页图片推荐', '20', '0');
INSERT INTO `fx_position` VALUES ('14', '0', '0', '视频首页焦点图', '20', '0');
INSERT INTO `fx_position` VALUES ('15', '0', '0', '视频首页头条推荐', '20', '0');
INSERT INTO `fx_position` VALUES ('16', '0', '0', '视频首页每日热点', '20', '0');
INSERT INTO `fx_position` VALUES ('17', '0', '0', '视频栏目精彩推荐', '20', '0');

-- ----------------------------
-- Table structure for fx_position_data
-- ----------------------------
DROP TABLE IF EXISTS `fx_position_data`;
CREATE TABLE `fx_position_data` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '信息ID',
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `posid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '推荐位ID',
  `modelid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `thumb` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有缩略图：0否，1是',
  `data` text NOT NULL COMMENT '数据',
  `sort` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  KEY `posid` (`posid`),
  KEY `listorder` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='推荐位数据表';

-- ----------------------------
-- Records of fx_position_data
-- ----------------------------
INSERT INTO `fx_position_data` VALUES ('1', '6', '2', '1', '0', '{\"title\":\"\\u6d4b\\u8bd5\\u6587\\u7ae0\\u4e00\",\"description\":\"\\u6d4b\\u8bd5\\u6587\\u7ae0\",\"inputtime\":\"1503505091\",\"style\":\"\"}', '1');
INSERT INTO `fx_position_data` VALUES ('1', '6', '9', '1', '0', '{\"title\":\"\\u6d4b\\u8bd5\\u6587\\u7ae0\\u4e00\",\"description\":\"\\u6d4b\\u8bd5\\u6587\\u7ae0\",\"inputtime\":\"1503505091\",\"style\":\"\"}', '1');

-- ----------------------------
-- Table structure for fx_teacher
-- ----------------------------
DROP TABLE IF EXISTS `fx_teacher`;
CREATE TABLE `fx_teacher` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '教师姓名',
  `subtitle` varchar(80) NOT NULL DEFAULT '' COMMENT '副标题',
  `thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '缩略图',
  `keywords` varchar(50) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '描述',
  `posids` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有推荐位：0无，1有',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '链接地址',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='教师模型主表';

-- ----------------------------
-- Records of fx_teacher
-- ----------------------------

-- ----------------------------
-- Table structure for fx_teacher_data
-- ----------------------------
DROP TABLE IF EXISTS `fx_teacher_data`;
CREATE TABLE `fx_teacher_data` (
  `id` int(10) unsigned DEFAULT '0' COMMENT '教师ID',
  `content` text NOT NULL COMMENT '教师介绍',
  `template` varchar(30) NOT NULL DEFAULT '' COMMENT '模板',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='教师模型副表';

-- ----------------------------
-- Records of fx_teacher_data
-- ----------------------------
