#@author 王宇帆 183509578@qq.com

#表结构

#DROP DATABASE IF EXISTS `puxi`;
#CREATE DATABASE IF NOT EXISTS `puxi` CHARSET=UTF8;

-- CREATE TABLE IF NOT EXISTS `puxi_unit`(
-- `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "单位id",
-- `name` VARCHAR(255) NOT NULL UNIQUE KEY COMMENT "单位名",
-- `address` VARCHAR(255) NOT NULL DEFAULT "" COMMENT "单位地址",
-- `email` VARCHAR(100) NOT NULL DEFAULT "" COMMENT "联系邮箱",
-- `phone` VARCHAR(16) COMMENT "手机号",
-- `telephone` VARCHAR(16) COMMENT "座机号",
-- `description` VARCHAR(500) NOT NULL DEFAULT "" COMMENT "单位描述"
-- )ENGINE=InnoDB CHARSET DEFAULT CHARSET=utf8 COMMENT="单位表";


CREATE TABLE IF NOT EXISTS `puxi_database_level`(
`id` TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "级别编号",
`name` VARCHAR(20) NOT NULL UNIQUE KEY COMMENT "级别名",
`alias` VARCHAR (10) NOT NULL COMMENT "别名"
)ENGINE=InnoDB CHARSET DEFAULT CHARSET=utf8 COMMENT="数据库级别表";

INSERT INTO `puxi_database_level`(name,alias) values ('北大核心期刊','PKU'),('中国科技核心期刊','CSTPCD'),('CSSCI索引','CSSCI'),('CSCD索引','CSCD');

CREATE TABLE IF NOT EXISTS `puxi_periodical_category`(
`id` SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "id编号",
`name` VARCHAR(50) NOT NULL UNIQUE KEY COMMENT "期刊分类名",
`description` VARCHAR(500) NOT NULL DEFAULT "" COMMENT "期刊分类描述",
`is_nav` TINYINT UNSIGNED NOT NULL DEFAULT 2 COMMENT "是否在菜单上显示:1否2是",
`status` TINYINT UNSIGNED NOT NULL DEFAULT 2 COMMENT "是否上线：1否2是",
`sortcode` SMALLINT UNSIGNED NOT NULL DEFAULT 1 COMMENT "排序码",
`pid` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT "期刊分类父id",
`typestr` VARCHAR(50) NOT NULL DEFAULT "" COMMENT "期刊分类层次字符",
`level` TINYINT NOT NULL DEFAULT 1 COMMENT "期刊分类层级"
)ENGINE=InnoDB CHARSET DEFAULT CHARSET=utf8 COMMENT="期刊分类表";

CREATE TABLE IF NOT EXISTS `puxi_periodical`(
`id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "编号",
`title` VARCHAR(50) NOT NULL UNIQUE KEY COMMENT "期刊标题名",
`first_letter` CHAR(1) NOT NULL DEFAULT "" COMMENT "期刊名首字母",
`description` VARCHAR(500) NOT NULL DEFAULT "" COMMENT "期刊描述",
`image` VARCHAR(50) NOT NULL DEFAULT "" COMMENT "期刊封面",
`foreign_title` VARCHAR(255) NOT NULL DEFAULT "" COMMENT "期刊外文名",
`issn` CHAR(9) UNIQUE KEY COMMENT "国际标准刊号",
`cn` VARCHAR(10) UNIQUE KEY COMMENT "国内统一刊号",
`viewed` BIGINT UNSIGNED NOT NULL DEFAULT 0 COMMENT "浏览量",
`download` BIGINT UNSIGNED NOT NULL DEFAULT 0 COMMENT "下载量",
`lang` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT "语种1代表中文,2代表英文",
`created_at` DATETIME NOT NULL COMMENT "期刊数据添加时间",
`updated_at` DATETIME NOT NULL COMMENT "期刊数据更新时间",
`establish_at` DATETIME COMMENT "创刊时间",
`cycle` TINYINT UNSIGNED NOT NULL COMMENT "出版周期：1代表旬刊,2半月刊,3月刊,4双月刊,5季刊,6半年刊,7年刊",
`status` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT "期刊状态1代表不上线,2代表上线",
`is_rm` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT "用于期刊的软删除1保留，2删除",
`postal_code` VARCHAR(10) NOT NULL DEFAULT "" COMMENT "邮发代号",
`price_info` VARCHAR(20) NOT NULL DEFAULT "" COMMENT "定价信息",
`typestr` VARCHAR(50) NOT NULL DEFAULT "" COMMENT "期刊分类",
`address` VARCHAR(100) NOT NULL DEFAULT "" COMMENT "期刊地址",
`mobile` VARCHAR(15) NOT NULL DEFAULT "" COMMENT "手机号",
`email` VARCHAR(100) NOT NULL DEFAULT ""  COMMENT "期刊邮箱号",
`competent_unit` VARCHAR(100)  NOT NULL DEFAULT "" COMMENT "期刊主管单位",
`sponsor_unit` VARCHAR(100)  NOT NULL DEFAULT "" COMMENT "期刊主办单位",
`editorial_unit` VARCHAR(100) NOT NULL DEFAULT "" COMMENT "期刊编辑单位"
)ENGINE=InnoDB CHARSET DEFAULT CHARSET=utf8 COMMENT="期刊表";

CREATE TABLE IF NOT EXISTS `puxi_periodical_db`(
`id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "编号",
`periodical_id` INT UNSIGNED NOT NULL COMMENT "期刊id",
`db_id` TINYINT UNSIGNED NOT NULL COMMENT "数据级别id"
)ENGINE=InnoDB CHARSET DEFAULT CHARSET=utf8 COMMENT="期刊期刊级别关系表";

-- CREATE TABLE IF NOT EXISTS `puxi_paper_author`(
-- `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "id编号",
-- `pid` INT UNSIGNED NOT NULL COMMENT "关联的论文id",
-- `aid` INT UNSIGNED NOT NULL COMMENT "关联的作者id"
-- )ENGINE=InnoDB CHARSET DEFAULT CHARSET=utf8 COMMENT="论文作者表";

CREATE TABLE IF NOT EXISTS `puxi_member`(
`id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "用户id",
`username` VARCHAR(20) UNIQUE KEY NOT NULL COMMENT "用户昵称",
`password` VARCHAR(255) NOT NULL COMMENT "密码",
`avator` VARCHAR (50) COMMENT "头像",
`phone` VARCHAR(11) UNIQUE KEY NOT NULL COMMENT "手机号",
`gender` ENUM('1','2','3') NOT NULL DEFAULT '3' COMMENT "性别:1男2女3保密",
`created_at` DATETIME NOT NULL COMMENT "创建时间",
`updated_at` DATETIME NOT NULL COMMENT "更新时间",
`remember_token` VARCHAR(100) COMMENT "记住密码token",
`status` ENUM('1','2')  NOT NULL DEFAULT '2' COMMENT "1不启用,2启用默认"
)ENGINE=InnoDB CHARSET DEFAULT CHARSET=utf8 COMMENT="用户表";

CREATE TABLE IF NOT EXISTS `puxi_role` (
  `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT "角色编号",
  `role_name` VARCHAR(20) NOT NULL UNIQUE KEY COMMENT "角色名",
  `auth_ids` TEXT COMMENT "角色权限集合",
  `auth_ac` TEXT COMMENT "角色权限控制器方法集合",
  `role_desc` VARCHAR(500) NOT NULL DEFAULT "" COMMENT "角色描述"
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT="角色表";

CREATE TABLE IF NOT EXISTS `puxi_manager`(
`id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "管理员编号",
`username` VARCHAR(20) UNIQUE KEY NOT NULL COMMENT "管理员昵称",
`password` VARCHAR(255) NOT NULL COMMENT "登录密码",
`gender` ENUM('1','2','3') NOT NULL DEFAULT '3' COMMENT "性别:1男2女3保密",
`created_at` DATETIME  NOT NULL COMMENT "用户创建时间",
`updated_at` DATETIME NOT NULL COMMENT "用户信息更新时间",
`mobile` VARCHAR(11) NOT NULL DEFAULT "" COMMENT "手机号",
`email` VARCHAR(100) UNIQUE KEY NOT NULL DEFAULT ""  COMMENT "邮箱地址",
`remember_token` varchar(100) COMMENT "记住密码token",
`status` ENUM('1','2')  NOT NULL DEFAULT '2' COMMENT "1不启用,2启用",
`role_id` TINYINT UNSIGNED NOT NULL COMMENT "关联角色id"
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT="后台管理员表";

CREATE TABLE IF NOT EXISTS `puxi_auth` (
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "权限编号",
  `auth_name` varchar(20) NOT NULL COMMENT "权限名",
  `controller` varchar(40)  DEFAULT "" COMMENT "控制器名",
  `action` varchar(30)  DEFAULT "" COMMENT "方法名",
  `pid` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT "权限父级id",
  `is_nav` ENUM('1','2')  NOT NULL DEFAULT '1' COMMENT "是否作为导航显示1是2否",
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT="权限表";

CREATE TABLE IF NOT EXISTS `puxi_document`(
`id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "期刊文档编号",
`year` YEAR NOT NULL COMMENT "文档年份",
`phase` TINYINT UNSIGNED NOT NULL COMMENT "文档期数",
`code` CHAR(32) NOT NULL UNIQUE KEY COMMENT "文档唯一编号",
`name` VARCHAR(50) NOT NULL UNIQUE KEY COMMENT "存在硬盘上的文档名",
`original` VARCHAR(100) NOT NULL DEFAULT "" COMMENT "源文件名字",
`note` VARCHAR(50) NOT NULL DEFAULT "" COMMENT "文档备注",
`status` TINYINT NOT NULL DEFAULT 1 COMMENT "期刊状态1待审核,2审核失败,3上线",
`periodical_id` INT UNSIGNED NOT NULL COMMENT "关联的期刊编号" 
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT="上传的期刊文档表";

CREATE TABLE IF NOT EXISTS `puxi_periodical_preview`(
`id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "期刊预览图编号",
`sort_id` TINYINT UNSIGNED NOT NULL COMMENT "预览图顺序编号",
`name` VARCHAR(50) NOT NULL UNIQUE KEY COMMENT "存在硬盘上的文档名",
`periodical_doc_id` INT UNSIGNED NOT NULL COMMENT "关联的文档id"
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT "期刊预览图";

#期刊论文需要先有期刊信息
CREATE TABLE IF NOT EXISTS `puxi_periodical_paper`(
`id` BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "id编号",
`title` VARCHAR(255) NOT NULL COMMENT "标题",
`abstract` VARCHAR(500) NOT NULL DEFAULT "" COMMENT "摘要",
`keywords` VARCHAR(255) NOT NULL DEFAULT "" COMMENT "关键词",
`platename` VARCHAR(20) NOT NULL DEFAULT "" COMMENT "论文板块名",
`authors` VARCHAR(255) NOT NULL DEFAULT "" COMMENT "作者" ,
`source` VARCHAR(255) NOT NULL DEFAULT "" COMMENT "文章来源",
`doi` VARCHAR(255) UNIQUE KEY COMMENT "数字对象唯一标识符",
`content` text COMMENT "论文内容",
`name` VARCHAR(50) NOT NULL DEFAULT ""  COMMENT "论文附件地址",
`year` YEAR NOT NULL COMMENT "论文年份",
`phase` TINYINT UNSIGNED NOT NULL COMMENT "论文期数",
`sortid` TINYINT UNSIGNED NOT NULL COMMENT "论文序号",
`code` CHAR(32) UNIQUE KEY NOT NULL COMMENT "论文唯一标识符",
`created_at` DATETIME  NOT NULL COMMENT "期刊论文创建时间",
`updated_at` DATETIME NOT NULL COMMENT "期刊论文更新时间",
`periodical_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT "来源期刊",
`is_rm` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT "是否删除1不删除2删除",
`status` TINYINT UNSIGNED DEFAULT 2 COMMENT "是否上线1不上线,2上线"
)ENGINE=InnoDB CHARSET DEFAULT CHARSET=utf8 COMMENT="论文表";

#论文预览图表
CREATE TABLE IF NOT EXISTS `puxi_periodical_paper_preview`(
`id` BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "论文预览图编号",
`name` varchar(50) NOT NULL COMMENT "期刊预览图名",
`sortid` TINYINT UNSIGNED NOT NULL COMMENT "期刊预览图排序号",
`periodical_paper_id` BIGINT UNSIGNED NOT NULL COMMENT "关联的论文id"
)ENGINE=InnoDB CHARSET DEFAULT CHARSET=utf8 COMMENT="论文预览图表"; 

CREATE TABLE IF NOT EXISTS `puxi_collection_paper`(
`id` BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "论文收藏编号",
`member_id` INT UNSIGNED NOT NULL COMMENT "会员id",
`paper_id` BIGINT UNSIGNED NOT NULL COMMENT "论文id"
)ENGINE=InnoDB CHARSET DEFAULT  CHARSET=utf8 COMMENT="论文收藏表";

CREATE TABLE IF NOT EXISTS `puxi_site`(
`id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "站点信息编号",
`site_name` VARCHAR (50) NOT NULL COMMENT "站点名称",
`site_desc` VARCHAR (255) NOT NULL DEFAULT "" COMMENT "站点描述",
`site_keywords` VARCHAR (255) NOT NULL DEFAULT "" COMMENT "站点关键词",
`copyright` VARCHAR (255) NOT NULL DEFAULT "" COMMENT "站点版权声明",
`record_number` VARCHAR (255) NOT NULL DEFAULT "" COMMENT "备案号",
`phone` VARCHAR (20) NOT NULL DEFAULT "" COMMENT "手机号",
`wechat` VARCHAR (20) NOT NULL DEFAULT "" COMMENT "微信号",
`email` VARCHAR (100) NOT NULL DEFAULT "" COMMENT "邮箱号",
`qq` VARCHAR (20) NOT NULL DEFAULT "" COMMENT "qq号",
`address` VARCHAR (255) NOT NULL DEFAULT "" COMMENT "公司地址",
`created_at` DATETIME COMMENT "创建日期",
`updated_at` DATETIME COMMENT "更新日期"
)ENGINE=InnoDB CHARSET DEFAULT CHARSET= utf8 COMMENT="站点信息表";

INSERT INTO `puxi_site`(site_name,site_desc,site_keywords,copyright,record_number,phone,wechat,email,qq,address) VALUES("普西学术","期刊收录","期刊，论文","©2018 Puxi 普西学术声明","浙公网安备 33010002000099号","15489543214","melong","183509578@qq.com","183509578","北京海淀区");
#索引
#
#期刊表
#标题单列索引
CREATE INDEX `title_index` ON `puxi_periodical`(`title`);

#文档查询索引
#select `year`, `phase`, `original`, `note` from `puxi_document` where `periodical_id` = '21' order by `year` desc, `phase` asc
#
#
#文档目录查询索引
#riodicalPaper::select('year', 'phase')->where('periodical_id', '=', $id)->orderByDesc('year')->orderBy('phase')->distinct()->get()
insert into `samo_paper`(title) values('王宇帆爱code');