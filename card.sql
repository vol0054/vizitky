-- Adminer 4.2.0 MySQL dump

SET NAMES utf8mb4;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `card`;
CREATE TABLE `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf16_czech_ci NOT NULL,
  `surname` varchar(255) COLLATE utf16_czech_ci NOT NULL,
  `institution` varchar(255) COLLATE utf16_czech_ci NOT NULL,
  `project` varchar(255) COLLATE utf16_czech_ci NOT NULL,
  `www` varchar(255) COLLATE utf16_czech_ci NOT NULL,
  `date` date NOT NULL,
  `note` text COLLATE utf16_czech_ci NOT NULL,
  `img` varchar(255) COLLATE utf16_czech_ci NOT NULL,
  `thumb_img` varchar(255) COLLATE utf16_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_czech_ci;


-- 2015-05-13 05:13:55
