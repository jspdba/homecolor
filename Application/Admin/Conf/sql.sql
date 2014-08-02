/**
 * 分类表
**/
CREATE TABLE IF NOT EXISTS `think_topic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `leval` int(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/**
 * 软件表
**/

CREATE TABLE IF NOT EXISTS `think_soft` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `url` varchar(64),
  `cid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/**
 * 用户表
**/
CREATE TABLE IF NOT EXISTS `think_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `passwd` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
/**
 * 存放csv文件
 */

CREATE TABLE IF NOT EXISTS `think_csv` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topic` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
/**
 * 存放代理数据
 */
CREATE TABLE IF NOT EXISTS `think_proxy` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `host` varchar(32) NOT NULL,
  `port` varchar(16) NOT NULL,
  `used` boolean NOT NULL,
  `createTime` timestamp default current_timestamp,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

