-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-09-19 20:15:20
-- 服务器版本： 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eirs`
--

-- --------------------------------------------------------

--
-- 表的结构 `estateinfo`
--

DROP TABLE IF EXISTS `estateinfo`;
CREATE TABLE IF NOT EXISTS `estateinfo` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '房产编号',
  `coveredArea` decimal(10,2) UNSIGNED NOT NULL COMMENT '建筑面积',
  `insideArea` decimal(10,2) NOT NULL COMMENT '套内面积',
  `location` varchar(255) NOT NULL COMMENT '地址',
  `price` decimal(10,2) NOT NULL COMMENT '售价',
  `time` date DEFAULT NULL COMMENT '购买时间',
  `Householder` varchar(255) DEFAULT NULL COMMENT '户主',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `estateinfo`
--

INSERT INTO `estateinfo` (`id`, `coveredArea`, `insideArea`, `location`, `price`, `time`, `Householder`) VALUES
(1, '120.50', '115.25', 'NanChang', '125.75', '2018-09-16', 'Jack'),
(2, '113.25', '110.11', 'HangZhou', '114.34', NULL, NULL),
(3, '113.25', '110.11', 'NanChang', '114.34', NULL, NULL),
(4, '120.50', '115.25', 'HangZhou', '125.75', '2018-09-16', 'Jack'),
(5, '113.25', '110.11', 'NanChang', '114.34', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT '客户ID',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `IDCardNums` varchar(18) NOT NULL COMMENT '身份证号',
  `birthday` date DEFAULT NULL COMMENT '出生日期',
  `gender` bit(1) NOT NULL DEFAULT b'1' COMMENT '性别',
  `email` varchar(255) NOT NULL COMMENT 'E-mail',
  `address` varchar(255) NOT NULL COMMENT '通讯地址',
  `tel` varchar(12) NOT NULL COMMENT '电话',
  `psw` varchar(20) NOT NULL COMMENT '密码',
  `isAdministrator` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否管理员',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`ID`, `name`, `IDCardNums`, `birthday`, `gender`, `email`, `address`, `tel`, `psw`, `isAdministrator`) VALUES
(0000000001, 'Kevin', '362301199711171518', '1997-11-17', b'1', 'kevinsalvatore@qq.com', 'NanChang', '18170873820', '123456', b'1'),
(0000000002, 'Jack', '362321199811171234', '1998-11-17', b'1', 'jack@qq.com', 'NanChang', '17879328753', '123123', b'0'),
(0000000003, 'Amy', '362322199611161234', '1996-11-16', b'0', 'amy@qq.com', 'ShangRao', '12345675678', 'abcabc', b'0'),
(0000000004, 'Lucy', '362322199910011234', '1999-10-01', b'0', 'lucy@qq.com', 'HangZhou', '12312312345', '12345', b'0'),
(0000000005, 'Kite', '362300199812121234', '1998-12-12', b'0', 'kite@qq.com', 'NanChang', '12345674567', '123', b'0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
