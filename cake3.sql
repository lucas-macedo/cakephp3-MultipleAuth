-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `articles` (`id`, `title`, `body`, `created`, `modified`) VALUES
(1,	'The title',	'This is the article body.',	'2015-01-20 17:04:40',	NULL),
(2,	'A title once again',	'And the article body follows.',	'2015-01-20 17:04:40',	NULL),
(3,	'Title strikes back',	'This is really exciting! Not.',	'2015-01-20 17:04:40',	NULL);

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'customer',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `cpf` varchar(30) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1,	'admin',	'$2y$10$jmeSGalr/EFaAMYuMeozeuC5NphuD9CGgGrwWvBYST9dzPWqUbdj2',	'admin',	NULL,	NULL),
(2,	'user',	'$2y$10$a/LpI/Aa0QTO7VaUvPctqOUVJJMkN6mLLjFgKpTLx8owIqIpRVfa2',	'author',	NULL,	NULL);

-- 2015-01-23 17:12:54
