SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `card`;
CREATE TABLE `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `institution` varchar(255) CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `project` varchar(255) CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `www` varchar(255) CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `date` date DEFAULT NULL,
  `note` text CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL DEFAULT 'NULL',
  `thumb_img` varchar(255) CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf16 COLLATE utf16_czech_ci DEFAULT 'NULL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;