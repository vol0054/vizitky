-- Adminer 4.2.0 MySQL dump

SET NAMES utf8mb4;
SET time_zone = '+00:00';

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
  `img` varchar(255) COLLATE utf16_czech_ci NOT NULL DEFAULT 'NULL',
  `thumb_img` varchar(255) COLLATE utf16_czech_ci NOT NULL,
  `foto` varchar(255) COLLATE utf16_czech_ci NOT NULL DEFAULT 'NULL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_czech_ci;


-- 2015-06-09 07:13:13
