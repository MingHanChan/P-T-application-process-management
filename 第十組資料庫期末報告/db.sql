-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2015 年 01 月 13 日 11:59
-- 伺服器版本: 5.5.39
-- PHP 版本： 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `apply`
--

CREATE TABLE IF NOT EXISTS `apply` (
  `case_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `custom_id` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `applyer`
--

CREATE TABLE IF NOT EXISTS `applyer` (
  `custom_name_ch` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `custom_name_eg` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `custom_telephone` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_cellphone` int(10) NOT NULL,
  `custom_fax` int(10) DEFAULT NULL,
  `custom_email` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_address_ch` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `custom_address_eg` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_country` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `case`
--

CREATE TABLE IF NOT EXISTS `case` (
  `case_name_number` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `case_status` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `case_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `document_date` date DEFAULT NULL,
  `case_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `case_country` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `case_category` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `money_date` date DEFAULT NULL,
  `turn_down_date` date DEFAULT NULL,
  `turn_down_reason` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `money_year` int(2) DEFAULT NULL,
  `write_date` date DEFAULT NULL,
  `graph_date` date DEFAULT NULL,
  `modify_date` date DEFAULT NULL,
  `modify_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `send_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `apply`
--
ALTER TABLE `apply`
 ADD PRIMARY KEY (`case_id`,`custom_id`), ADD KEY `custom_id` (`custom_id`), ADD KEY `case_id` (`case_id`);

--
-- 資料表索引 `applyer`
--
ALTER TABLE `applyer`
 ADD PRIMARY KEY (`custom_id`);

--
-- 資料表索引 `case`
--
ALTER TABLE `case`
 ADD PRIMARY KEY (`case_name_number`,`case_id`), ADD KEY `case_id` (`case_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`name`);

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `apply`
--
ALTER TABLE `apply`
ADD CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`custom_id`) REFERENCES `applyer` (`custom_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `apply_ibfk_2` FOREIGN KEY (`case_id`) REFERENCES `case` (`case_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
