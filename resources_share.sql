-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2017-05-26 04:04:30
-- 伺服器版本: 10.1.21-MariaDB
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `resources_share`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `m_id` int(10) NOT NULL,
  `m_username` varchar(30) NOT NULL,
  `m_password` varchar(100) NOT NULL,
  `m_authority` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`m_id`, `m_username`, `m_password`, `m_authority`) VALUES
(1, 'sora', 'c13367945d5d4c91047b3b50234aa7ab', 5),
(2, 'pingyi', 'e5aab23a6d665d357185bacdfc6fd969', 5);

-- --------------------------------------------------------

--
-- 資料表結構 `source`
--

CREATE TABLE `source` (
  `s_id` int(10) NOT NULL,
  `s_title` varchar(30) NOT NULL,
  `s_content` varchar(200) NOT NULL,
  `s_fileName` varchar(50) NOT NULL,
  `s_fileDownload` varchar(100) NOT NULL,
  `s_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `s_authority` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

--
-- 資料表索引 `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`s_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `source`
--
ALTER TABLE `source`
  MODIFY `s_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
