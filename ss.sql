-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 05 月 26 日 13:43
-- 服务器版本: 5.0.90
-- PHP 版本: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ss`
--

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL auto_increment,
  `user_name` varchar(128) NOT NULL,
  `email` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `plan` varchar(2) NOT NULL,
  `passwd` varchar(16) NOT NULL,
  `t` int(11) NOT NULL default '0',
  `u` bigint(20) NOT NULL,
  `d` bigint(20) NOT NULL,
  `transfer_enable` bigint(20) NOT NULL,
  `port` int(11) NOT NULL,
  `switch` tinyint(4) NOT NULL default '1',
  `enable` tinyint(4) NOT NULL default '1',
  `type` tinyint(4) NOT NULL default '1',
  `last_get_gift_time` int(11) NOT NULL default '0',
  `last_check_in_time` int(11) NOT NULL default '0',
  `last_rest_pass_time` int(11) NOT NULL default '0',
  `reg_date` datetime NOT NULL,
  `invite_num` int(8) NOT NULL,
  `money` decimal(12,2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `pass`, `plan`, `passwd`, `t`, `u`, `d`, `transfer_enable`, `port`, `switch`, `enable`, `type`, `last_get_gift_time`, `last_check_in_time`, `last_rest_pass_time`, `reg_date`, `invite_num`, `money`) VALUES
(1, 'admin', 'aswda', '4297f44b13955235245b2497399d7a93', 'A', 'wddas666', 0, 2048, 2048, 1000000, 0, 1, 0, 7, 0, 0, 0, '0000-00-00 00:00:00', 0, 100.00),
(2, 'admini', 'admin@ttkea.com', '21232f297a57a5a743894a0e4a801fc3', '', '00031234', 0, 9999, 6666, 999, 555555, 1, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 0, 0.00);
