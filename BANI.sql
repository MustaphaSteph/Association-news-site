-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- المزود: localhost
-- أنشئ في: 31 مايو 2016 الساعة 17:01
-- إصدارة المزود: 5.6.12-log
-- PHP إصدارة: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- قاعدة البيانات: `BANI`
--
CREATE DATABASE IF NOT EXISTS `BANI` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `BANI`;

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `login` varchar(20) NOT NULL,
  `pass` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- بنية الجدول `articlee`
--

CREATE TABLE IF NOT EXISTS `articlee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL,
  `auteur_article` varchar(20) CHARACTER SET utf8 NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 NOT NULL,
  `aricle` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- إرجاع أو استيراد بيانات الجدول `articlee`
--

INSERT INTO `articlee` (`id`, `titre`, `date`, `auteur_article`, `image`, `aricle`) VALUES
(1, 'ghhhhhhhhhhhhhhhhhhhhhhh"', '2016-05-31 16:53:01', 'fdsfsd', 'no_image_bani_steph.jpg', 0x667364666473667364),
(2, 'qSQsqSQsq', '2016-05-31 16:56:41', 'fdgddsfdsfsdfsd', 'AD Sport 3HD.png', 0x666473667364667364667364667364667364667364667364667364),
(3, '         fdcd', '2016-05-31 16:58:51', '      cc', 're.jpg', 0x266e6273703b2063646364);

-- --------------------------------------------------------

--
-- بنية الجدول `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` blob NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
