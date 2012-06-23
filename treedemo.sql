-- phpMyAdmin SQL Dump
-- version 3.4.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 06 月 26 日 12:42
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `treedemo`
--

-- --------------------------------------------------------

--
-- 表的结构 `tbl_tree`
--

CREATE TABLE IF NOT EXISTS `tbl_tree` (
  `id` int(5) NOT NULL auto_increment,
  `lft` int(5) NOT NULL,
  `rgt` int(5) NOT NULL,
  `level` int(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `tbl_tree`
--

INSERT INTO `tbl_tree` (`id`, `lft`, `rgt`, `level`, `title`, `url`) VALUES
(1, 0, 19, 0, '后台管理', NULL),
(2, 1, 6, 1, '信息管理', ''),
(3, 2, 3, 2, '关于我们', 'about'),
(4, 4, 5, 2, '联系我们', 'contact'),
(5, 7, 12, 1, '文章管理', ''),
(6, 8, 9, 2, '新闻动态', 'news'),
(7, 10, 11, 2, '最新活动', 'play'),
(8, 13, 18, 1, '图片管理', ''),
(9, 14, 15, 2, '产品展示', 'product'),
(10, 16, 17, 2, '公司图片', 'picture');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
