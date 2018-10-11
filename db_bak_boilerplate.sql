-- Adminer 4.3.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `account_types`;
CREATE TABLE `account_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `account_types` (`id`, `name`) VALUES
(1,	'private'),
(2,	'bussiness');

DROP TABLE IF EXISTS `bussiness_registartion_docs`;
CREATE TABLE `bussiness_registartion_docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `bussiness_registartion_docs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bussiness_registartion_docs` (`id`, `path`, `user_id`, `updated_at`, `created_at`) VALUES
(1,	'[\"photos\\/charts-chart-js.php\",\"photos\\/charts-easy-pie-chart.php\"]',	22,	'2018-09-25 10:25:52',	'2018-09-25 10:25:52'),
(2,	'[\"register-doc\\/charts-jquery-knob.php\",\"register-doc\\/charts-morris-js.php\"]',	24,	'2018-09-25 10:41:52',	'2018-09-25 10:41:52'),
(3,	'[\"contact-us.jpeg\"]',	37,	'2018-10-10 12:55:45',	'2018-10-10 12:55:45');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  UNIQUE KEY `cache_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `seo` varchar(191) NOT NULL,
  `avathar` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categories` (`id`, `name`, `description`, `seo`, `avathar`, `user_id`, `updated_at`, `created_at`) VALUES
(1,	'zxzcsvfd',	NULL,	'sdfdggdb',	NULL,	NULL,	'2018-10-01 15:56:01',	'2018-10-01 15:56:01'),
(2,	'xcsdvdfg',	'xccbvc',	'/xafdgdf/dggh',	NULL,	NULL,	'2018-10-04 11:29:57',	'2018-10-04 11:29:57'),
(3,	'zxvdfbgfhbds',	'vfd',	'zcsdf',	NULL,	NULL,	'2018-10-04 11:40:04',	'2018-10-04 11:40:04'),
(4,	'xfdsgf',	NULL,	'dssfsg',	NULL,	NULL,	'2018-10-04 11:48:02',	'2018-10-04 11:48:02'),
(5,	'dvdgdf',	NULL,	'fdgfdghgfj',	NULL,	NULL,	'2018-10-04 11:49:42',	'2018-10-04 11:49:42'),
(6,	'xaxacsv',	NULL,	'dsdvdfb',	NULL,	NULL,	'2018-10-04 11:50:30',	'2018-10-04 11:50:30'),
(7,	'zxvfb',	NULL,	'sdgvfdhbgfn',	NULL,	NULL,	'2018-10-04 11:51:23',	'2018-10-04 11:51:23'),
(11,	'ds-21',	'sdfgdh',	'dfgdfg/dggf',	'',	2,	'2018-10-09 16:53:35',	'2018-10-04 11:57:32'),
(12,	'cv',	'xvb',	'bcbn',	NULL,	2,	'2018-10-04 12:03:59',	'2018-10-04 12:03:59'),
(13,	'sdfxgdf',	'ddgh',	'fdgdfhg',	'',	2,	'2018-10-05 19:42:35',	'2018-10-04 12:08:03'),
(14,	'sdfxgdf',	'ddgh-safds',	'fdgdfhg',	'',	2,	'2018-10-04 17:44:23',	'2018-10-04 17:44:23'),
(15,	'sdfxgdf',	'ddgh',	'fdgdfhg',	'category/2/user6.jpeg',	2,	'2018-10-05 19:43:49',	'2018-10-05 19:43:49'),
(16,	'sdfwf',	'test part',	'ewrg',	'',	2,	'2018-10-09 17:19:34',	'2018-10-09 14:58:38'),
(17,	'shyam-123',	'fegr frgrtgv\r\n\r\nt4tgtg',	'shyam/b1',	'marked-for-review.png',	2,	'2018-10-09 16:45:07',	'2018-10-09 16:45:07'),
(18,	'adfsd dsfds',	'dfds dsfds',	'wfwegrv',	'buttons-sprite.png',	2,	'2018-10-09 17:22:56',	'2018-10-09 17:22:56'),
(19,	'weboffoce1',	'Encrypted values are passed through serialize during encryption, which allows for encryption of objects and arrays. Thus, non-PHP clients receiving encrypted values will need to  unserialize the data. If you would like to encrypt and decrypt values without serialization, you may use the encryptString and decryptString methods of the Crypt facade',	'weboffice',	'not-answered.png',	39,	'2018-10-11 11:11:30',	'2018-10-11 11:11:30');

DROP TABLE IF EXISTS `delivery_methods`;
CREATE TABLE `delivery_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `delivery_methods` (`id`, `name`) VALUES
(1,	'pickup'),
(2,	'post');

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2017_09_03_144628_create_permission_tables',	1),
(4,	'2017_09_11_174816_create_social_accounts_table',	1),
(5,	'2017_09_26_140332_create_cache_table',	1),
(6,	'2017_09_26_140528_create_sessions_table',	1),
(7,	'2017_09_26_140609_create_jobs_table',	1),
(8,	'2018_04_08_033256_create_password_histories_table',	1);

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1,	'App\\Models\\Auth\\User',	1),
(1,	'App\\Models\\Auth\\User',	31),
(1,	'App\\Models\\Auth\\User',	35),
(1,	'App\\Models\\Auth\\User',	36),
(1,	'App\\Models\\Auth\\User',	37),
(1,	'App\\Models\\Auth\\User',	38),
(1,	'App\\Models\\Auth\\User',	39);

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1,	'App\\Models\\Auth\\User',	1),
(2,	'App\\Models\\Auth\\User',	2),
(2,	'App\\Models\\Auth\\User',	8),
(3,	'App\\Models\\Auth\\User',	3),
(3,	'App\\Models\\Auth\\User',	9),
(3,	'App\\Models\\Auth\\User',	10),
(3,	'App\\Models\\Auth\\User',	11),
(3,	'App\\Models\\Auth\\User',	12),
(3,	'App\\Models\\Auth\\User',	13),
(3,	'App\\Models\\Auth\\User',	14),
(3,	'App\\Models\\Auth\\User',	15),
(3,	'App\\Models\\Auth\\User',	22),
(3,	'App\\Models\\Auth\\User',	24),
(3,	'App\\Models\\Auth\\User',	26),
(3,	'App\\Models\\Auth\\User',	27),
(3,	'App\\Models\\Auth\\User',	28),
(3,	'App\\Models\\Auth\\User',	29),
(3,	'App\\Models\\Auth\\User',	30),
(3,	'App\\Models\\Auth\\User',	31),
(3,	'App\\Models\\Auth\\User',	32),
(3,	'App\\Models\\Auth\\User',	33),
(3,	'App\\Models\\Auth\\User',	34),
(3,	'App\\Models\\Auth\\User',	35),
(3,	'App\\Models\\Auth\\User',	36),
(3,	'App\\Models\\Auth\\User',	37),
(3,	'App\\Models\\Auth\\User',	38),
(3,	'App\\Models\\Auth\\User',	39);

DROP TABLE IF EXISTS `offer_images`;
CREATE TABLE `offer_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `product_offer_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `offer_images` (`id`, `name`, `product_offer_id`, `updated_at`, `created_at`) VALUES
(3,	'[\"category\\/product\\/images\\/user2.jpg\",\"category\\/product\\/images\\/user8.jpeg\"]',	9,	'2018-10-06 09:58:18',	'2018-10-06 08:36:56'),
(4,	'[\"category\\/product\\/images\\/apple-touch-icon.svg\"]',	11,	'2018-10-06 10:41:56',	'2018-10-06 10:41:56'),
(5,	'[\"category\\/product\\/2\\/images\\/apple-touch-icon.bmp\",\"category\\/product\\/2\\/images\\/apple-touch-icon.svg\"]',	12,	'2018-10-06 13:41:25',	'2018-10-06 13:31:16'),
(7,	'[\"about-us.jpg\",\"aptitude_logo.png\"]',	23,	'2018-10-09 23:53:12',	'2018-10-09 23:53:12'),
(8,	'[\"loader.png\",\"aptitude_logo.png\"]',	28,	'2018-10-10 00:18:37',	'2018-10-10 00:18:37'),
(9,	'[\"about-us.jpg\",\"aptitude_logo.png\"]',	30,	'2018-10-11 11:49:58',	'2018-10-11 11:49:58'),
(10,	'[\"blog-banner.jpg\",\"loader.png\"]',	31,	'2018-10-11 11:51:37',	'2018-10-11 11:51:37');

DROP TABLE IF EXISTS `offer_types`;
CREATE TABLE `offer_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) DEFAULT NULL,
  `datefrom` date DEFAULT NULL,
  `dateto` date DEFAULT NULL,
  `product_offer_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `offer_types` (`id`, `type`, `datefrom`, `dateto`, `product_offer_id`, `updated_at`, `created_at`) VALUES
(1,	1,	'2018-10-10',	'2018-10-31',	28,	'2018-10-10 15:43:53',	'2018-10-09 23:21:20'),
(2,	2,	NULL,	NULL,	24,	'2018-10-10 07:37:10',	'2018-10-09 23:53:12'),
(3,	2,	NULL,	NULL,	27,	'2018-10-10 00:06:09',	'2018-10-10 00:06:09'),
(4,	2,	NULL,	NULL,	23,	'2018-10-10 00:18:37',	'2018-10-10 00:18:37'),
(5,	2,	NULL,	NULL,	29,	'2018-10-11 11:44:31',	'2018-10-11 11:44:31'),
(6,	2,	NULL,	NULL,	30,	'2018-10-11 11:49:58',	'2018-10-11 11:49:58'),
(7,	1,	'2018-10-24',	'2018-10-24',	31,	'2018-10-11 11:51:37',	'2018-10-11 11:51:37');

DROP TABLE IF EXISTS `password_histories`;
CREATE TABLE `password_histories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_histories_user_id_foreign` (`user_id`),
  CONSTRAINT `password_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `password_histories` (`id`, `user_id`, `password`, `created_at`, `updated_at`) VALUES
(1,	1,	'$2y$10$YVeo2Of5MfMmfTHlvXq69eJUbeNbPybRwryk0B/3u/H3Kg9M6euma',	'2018-09-21 14:26:59',	'2018-09-21 14:26:59'),
(2,	2,	'$2y$10$cQ2CzNu0Q82fWqbkSuj2aO8OzqVLc.Dmj227Oat.k8TYI9S4F0aUu',	'2018-09-21 14:26:59',	'2018-09-21 14:26:59'),
(3,	3,	'$2y$10$p1yEFWQT8PnsPKSk1K1gleGpJEvQmC8Wgf7FL4ihyDLaaH8dcQUc2',	'2018-09-21 14:27:00',	'2018-09-21 14:27:00'),
(8,	8,	'$2y$10$LCbYWGLppiRkBOe/wWlLm.TilbZxOu.5hDilWV5yyknenRUbCGAWa',	'2018-09-24 09:28:51',	'2018-09-24 09:28:51'),
(9,	9,	'$2y$10$UMZ7J6kDyyqK3kxKtL.wTeGdQ.WDlDRMizB8BGbsu4/C/k90nvY2S',	'2018-09-24 20:52:17',	'2018-09-24 20:52:17'),
(10,	10,	'$2y$10$UQyEIlh9yPTeUOzozSCvVubW8Om4SKKH7eMn/w9R7KsRxT2X7I.0S',	'2018-09-25 08:13:52',	'2018-09-25 08:13:52'),
(11,	11,	'$2y$10$ALoxhYmfRUFXovlZEA2ZvuuNLj1GvR.bW5iwsKXNy5Tyr2QQKXhVW',	'2018-09-25 08:22:27',	'2018-09-25 08:22:27'),
(12,	12,	'$2y$10$N6j/qAtPWwaJrb.PnIBnFuetBcpgAgcmUsacFfnH3fLTPF7IU4FIi',	'2018-09-25 08:26:36',	'2018-09-25 08:26:36'),
(13,	13,	'$2y$10$ww0KkO/QxK1LedJt4wwvTO2JhqBvANFt20OcW7uoma8rFwSa9pnXu',	'2018-09-25 08:36:24',	'2018-09-25 08:36:24'),
(14,	14,	'$2y$10$oV/o4/Yoshhf8UovT5962.4E3AQmb4.I2JAem0LlKXqdTt9cLi2wS',	'2018-09-25 08:39:48',	'2018-09-25 08:39:48'),
(15,	15,	'$2y$10$S4GPc98.ahVPp9xmn.GZouM5sNm2.CQoOBfpULDgGEi/cBVvwvaKC',	'2018-09-25 08:41:40',	'2018-09-25 08:41:40'),
(22,	22,	'$2y$10$rncmd0H.fWeROggqaa5rPOqPg7vKRpbCLq5QbFS6blAeUV/DgsiSG',	'2018-09-25 10:25:52',	'2018-09-25 10:25:52'),
(24,	24,	'$2y$10$QACj2K7w2lmiPu5s1ykWIu6Ln4H0fHt98FQ2s4avRtWurjm0RhQZS',	'2018-09-25 10:41:52',	'2018-09-25 10:41:52'),
(26,	26,	'$2y$10$mHyfzTj4DQ5fSUmi82/0C.E/6tdlEOD.yJHgnMaXEe6u/piwIO/sy',	'2018-09-25 10:45:28',	'2018-09-25 10:45:28'),
(27,	27,	'$2y$10$o7Zn4ZRD/Bwa..tbec6ZD.Jm3pFQi5vjdTAEgfjUGP1dABwLv/st2',	'2018-09-28 12:58:21',	'2018-09-28 12:58:21'),
(28,	28,	'$2y$10$z5LloD0dvCFqh7Jrrt054OxWul6SRhwRc.EJJI9.ClNioiqNEQQJS',	'2018-09-28 13:01:20',	'2018-09-28 13:01:20'),
(29,	29,	'$2y$10$6FOfxHp/DqF9HfA7B26c1eavvFsyio0P5c28svlTlR9KsxJuv9BBW',	'2018-09-28 13:02:29',	'2018-09-28 13:02:29'),
(30,	30,	'$2y$10$cfPsZYB/8X12eHZXaL9O9e8GzVycJB5HG95v8stzPlwW/8NTcZci2',	'2018-09-28 13:07:38',	'2018-09-28 13:07:38'),
(31,	31,	'$2y$10$4T3QhMzbaGoiRrPUnaYF2eQhrHWnvzymNhhPJAG2NuNoscv5.K5e.',	'2018-10-04 08:12:54',	'2018-10-04 08:12:54'),
(32,	32,	'$2y$10$6N0UfQob.QNitV8f3dUetOwxl.c22zgZAX6/VFmw8SEGyH4XdWJfu',	'2018-10-04 08:41:00',	'2018-10-04 08:41:00'),
(33,	33,	'$2y$10$e8zY/M9tzOuvtFjLYM7bNO3aW/WIqjxzL/5mMM0e2dh.MsynX1StW',	'2018-10-04 08:44:29',	'2018-10-04 08:44:29'),
(34,	34,	'$2y$10$k42YpF.MnfPL4qpFcaKV7eZbM8BkyPAbASvGNZ0B8noElBLUztMGa',	'2018-10-04 09:24:18',	'2018-10-04 09:24:18'),
(35,	35,	'$2y$10$pSX.AFYsyQAqhQyZMjrRhezGS/9ZYSkxmM4xqSqsYFuSTD5wTv3fu',	'2018-10-04 09:26:50',	'2018-10-04 09:26:50'),
(36,	36,	'$2y$10$HAsTtg.ZStGl5egfyNRPbupbSHufjB3VEJS30j2tHRluB7nn9C8eu',	'2018-10-10 11:51:57',	'2018-10-10 11:51:57'),
(37,	37,	'$2y$10$XqJBY5FliEhjIaVXqwOj1efwnHaZ0OZpc73i1AsjmbwkdJA3kVToS',	'2018-10-10 12:55:45',	'2018-10-10 12:55:45'),
(38,	38,	'$2y$10$rL7uEf/ayrLods4FZ0e/Me9WbFQ/LdlrRnc63N1jFUi.jUwuTKqI.',	'2018-10-10 13:08:59',	'2018-10-10 13:08:59'),
(39,	39,	'$2y$10$VIlzjfdqMFfx4iHZNrcsNePvec5CJFktCsp9ro7LysKxpMzVRZGbm',	'2018-10-11 11:09:12',	'2018-10-11 11:09:12');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1,	'view backend',	'web',	'2018-09-21 14:27:00',	'2018-09-21 14:27:00');

DROP TABLE IF EXISTS `productoffers`;
CREATE TABLE `productoffers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(101) NOT NULL,
  `descriptionoffer` text DEFAULT NULL,
  `descriptionbussiness` text DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `deliverymethodid` int(11) DEFAULT NULL,
  `girapercentage` double DEFAULT NULL,
  `pricelistdocument` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `confirmed` tinyint(4) NOT NULL DEFAULT 0,
  `deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `categoryid` (`categoryid`),
  CONSTRAINT `productoffers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `productoffers_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `productoffers` (`id`, `name`, `descriptionoffer`, `descriptionbussiness`, `categoryid`, `deliverymethodid`, `girapercentage`, `pricelistdocument`, `user_id`, `confirmed`, `deleted`, `created_at`, `updated_at`) VALUES
(9,	'asfsdfdg',	'sdfdfg',	NULL,	2,	1,	30,	'category/product/2/doc/sample.pdf',	2,	0,	1,	'2018-10-06 08:36:56',	'2018-10-09 10:54:38'),
(10,	'zxvcv',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	0,	'2018-10-06 10:35:46',	'2018-10-06 10:35:46'),
(11,	'as12',	'safg',	'safdsgvfdb',	3,	1,	42,	'/tmp/phpmdd9vA',	NULL,	0,	0,	'2018-10-06 10:41:56',	'2018-10-06 10:41:56'),
(12,	'test-123',	NULL,	NULL,	11,	NULL,	49,	'category/product/2/doc/am0.pdf',	2,	0,	0,	'2018-10-06 10:51:57',	'2018-10-06 13:41:59'),
(13,	'xcdsv',	NULL,	NULL,	NULL,	NULL,	20,	'',	NULL,	0,	0,	'2018-10-09 22:55:43',	'2018-10-09 22:55:43'),
(14,	'xcdsv',	NULL,	NULL,	NULL,	NULL,	20,	'',	NULL,	0,	0,	'2018-10-09 22:56:15',	'2018-10-09 22:56:15'),
(15,	'xcdsv',	NULL,	NULL,	NULL,	NULL,	20,	'',	NULL,	0,	0,	'2018-10-09 22:56:30',	'2018-10-09 22:56:30'),
(16,	'xcdsv',	NULL,	NULL,	NULL,	NULL,	20,	'',	NULL,	0,	0,	'2018-10-09 23:01:53',	'2018-10-09 23:01:53'),
(17,	'xcdsv',	NULL,	NULL,	NULL,	NULL,	20,	'',	NULL,	0,	0,	'2018-10-09 23:12:17',	'2018-10-09 23:12:17'),
(18,	'xcdsv',	NULL,	NULL,	NULL,	NULL,	20,	'',	NULL,	0,	0,	'2018-10-09 23:13:53',	'2018-10-09 23:13:53'),
(19,	'xcdsv',	NULL,	NULL,	NULL,	NULL,	20,	'',	NULL,	0,	0,	'2018-10-09 23:14:24',	'2018-10-09 23:14:24'),
(20,	'xcdsv',	NULL,	NULL,	NULL,	NULL,	20,	'',	NULL,	0,	0,	'2018-10-09 23:16:55',	'2018-10-09 23:16:55'),
(21,	'xcdsv',	NULL,	NULL,	NULL,	NULL,	20,	'',	NULL,	0,	0,	'2018-10-09 23:17:26',	'2018-10-09 23:17:26'),
(22,	'xcdsv',	NULL,	NULL,	NULL,	NULL,	20,	'',	NULL,	0,	0,	'2018-10-09 23:18:31',	'2018-10-09 23:18:31'),
(23,	'zxcxv',	NULL,	NULL,	1,	NULL,	34,	'',	1,	0,	0,	'2018-10-09 23:21:20',	'2018-10-10 07:05:04'),
(24,	'zxcdv',	NULL,	NULL,	13,	NULL,	39,	'',	1,	1,	0,	'2018-10-09 23:53:12',	'2018-10-10 07:37:10'),
(25,	'cxvcb',	NULL,	NULL,	2,	NULL,	20,	'',	1,	1,	0,	'2018-10-10 00:03:09',	'2018-10-10 00:03:09'),
(26,	'cxvcb',	NULL,	NULL,	2,	NULL,	20,	'',	1,	1,	0,	'2018-10-10 00:05:29',	'2018-10-10 00:05:29'),
(27,	'cxvcb',	NULL,	NULL,	2,	NULL,	20,	'',	1,	1,	0,	'2018-10-10 00:06:09',	'2018-10-10 00:06:09'),
(28,	'11',	NULL,	NULL,	1,	NULL,	20,	'sample.pdf',	1,	1,	0,	'2018-10-10 00:18:37',	'2018-10-10 00:18:37'),
(29,	'wdwfewfreg',	NULL,	NULL,	19,	NULL,	20,	'',	39,	0,	1,	'2018-10-11 11:44:31',	'2018-10-11 11:44:38'),
(30,	'test1',	NULL,	'If a matching model instance is not found in the database, a 404 HTTP response will be automatically generated.',	19,	1,	64,	'',	39,	1,	0,	'2018-10-11 11:49:58',	'2018-10-11 11:55:14'),
(31,	'test5',	'Since we have bound all {user} parameters to the App\\User model, a User instance will be injected into the route. So, for example, a request to profile/1 will inject the User instance from the database which has an ID of 1.\r\n\r\nIf a matching model instance is not found in the database, a 404 HTTP response will be automatically generated.',	'If a matching model instance is not found in the database, a 404 HTTP response will be automatically generated.',	19,	1,	32,	'',	39,	1,	0,	'2018-10-11 11:51:36',	'2018-10-11 11:54:49');

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1,	'administrator',	'web',	'2018-09-21 14:27:00',	'2018-09-21 14:27:00'),
(2,	'executive',	'web',	'2018-09-21 14:27:00',	'2018-09-21 14:27:00'),
(3,	'user',	'web',	'2018-09-21 14:27:00',	'2018-09-21 14:27:00');

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1,	1),
(1,	2);

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `social_accounts`;
CREATE TABLE `social_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provider` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_accounts_user_id_foreign` (`user_id`),
  CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gravatar',
  `avatar_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` int(11) DEFAULT NULL,
  `bussiness_kyc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bussiness_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(52) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(52) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_changed_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `account_type` (`account_type`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`account_type`) REFERENCES `account_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `uuid`, `first_name`, `last_name`, `email`, `avatar_type`, `avatar_location`, `website`, `address`, `phoneno`, `account_type`, `bussiness_kyc`, `bussiness_description`, `latitude`, `longitude`, `password`, `password_changed_at`, `active`, `confirmation_code`, `confirmed`, `timezone`, `last_login_at`, `last_login_ip`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'187c8ab5-f640-4fd0-96f2-e9cc9a6e1aea',	'Admin',	'Istrator',	'admin@admin.com',	'gravatar',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'51.5074',	'-0.118092',	'$2y$10$pSX.AFYsyQAqhQyZMjrRhezGS/9ZYSkxmM4xqSqsYFuSTD5wTv3fu',	NULL,	1,	'c3c3850e5019c8742960e453e4acbe89',	1,	'America/New_York',	'2018-10-11 11:54:27',	'172.20.0.1',	'BP2J38qvcVzCG60MNEdybq4KEpVV5HexTYO5mD3rdrMRVm0FXy5gdSPmpsDj',	'2018-09-21 14:26:59',	'2018-10-11 11:54:27',	NULL),
(2,	'ac94c540-774a-4e4d-bac8-f18a0f2eb645',	'Backend',	'User',	'executive@executive.com',	'storage',	'avatars/8Ci3nOXf2dH1QIayZEbzRlbDBsdAVUUd95bEGZ1E.png',	NULL,	NULL,	NULL,	NULL,	NULL,	'asascds dfew ad\r\n\r\nsadfsf\r\n\r\ndfdg',	'51.5074',	'1.087732',	'$2y$10$pSX.AFYsyQAqhQyZMjrRhezGS/9ZYSkxmM4xqSqsYFuSTD5wTv3fu',	NULL,	1,	'687c5dfd395b85279fad208f7cbfd530',	1,	'America/New_York',	'2018-10-09 19:25:37',	'172.20.0.1',	'5N61D6dVWDTnojyfOeh4u6CA4nVAgHJKN3meNlMI5LtkjiwJlpZj6iKyRZ0M',	'2018-09-21 14:26:59',	'2018-10-09 19:25:37',	NULL),
(3,	'3539035e-c6fc-4201-9767-801f12854f86',	'Default',	'User',	'user@user.com',	'storage',	'avatars/ZGd9axeWnp27Y1zHxTIGmtCCLo5urAO2VN6P7ov4.png',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'52.5074',	'1.087932',	'$2y$10$9AAVDm3gLSzW4GJQ6CXEguMp1QCEb2eNKEug8DtEIwKMeAx4CTHFi',	NULL,	1,	'6e998a95049c9440e9bb5a22c2374a3a',	1,	'America/New_York',	'2018-09-24 18:27:12',	'172.20.0.1',	'HYatucAFdiiGCaR529FSdfysuwSvqhW017p0H7yiZwsowb8jEfEb3jSmKMWV',	'2018-09-21 14:27:00',	'2018-09-24 18:27:12',	NULL),
(8,	'22dc538d-71cb-4e23-9c33-b1cb59fe5eb8',	'xcx',	'xzxcxv',	'fghj@gmail.com',	'gravatar',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'$2y$10$LCbYWGLppiRkBOe/wWlLm.TilbZxOu.5hDilWV5yyknenRUbCGAWa',	NULL,	1,	'd3718b1650231d922829ad7fa096ba3c',	1,	NULL,	NULL,	NULL,	NULL,	'2018-09-24 09:28:51',	'2018-09-24 09:30:26',	NULL),
(9,	'b743bf20-c662-4ce2-bc3c-ed300bff263d',	'zx c',	'zx xc',	'xz@gmail.com',	'gravatar',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'$2y$10$UMZ7J6kDyyqK3kxKtL.wTeGdQ.WDlDRMizB8BGbsu4/C/k90nvY2S',	NULL,	1,	'051121125856da0891af4bd64cbe6284',	0,	NULL,	NULL,	NULL,	NULL,	'2018-09-24 20:52:17',	'2018-09-24 20:52:17',	NULL),
(10,	'b19c0822-ca32-428f-af0d-f0242bf6021e',	'ascsxa',	'xcsdc',	'admin1@admin.com',	'gravatar',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'$2y$10$UQyEIlh9yPTeUOzozSCvVubW8Om4SKKH7eMn/w9R7KsRxT2X7I.0S',	NULL,	1,	'0e990df3db21c6523de48d950a25c938',	0,	NULL,	NULL,	NULL,	NULL,	'2018-09-25 08:13:52',	'2018-09-25 08:13:52',	NULL),
(11,	'097d2240-3f2c-4d06-baab-997d899ffc71',	'zx',	'cvcb',	'admi2n@admin.com',	'gravatar',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'$2y$10$ALoxhYmfRUFXovlZEA2ZvuuNLj1GvR.bW5iwsKXNy5Tyr2QQKXhVW',	NULL,	1,	'9daf9c9e9a0b499a601a71aebc2ee9a3',	0,	NULL,	NULL,	NULL,	NULL,	'2018-09-25 08:22:27',	'2018-09-25 08:22:27',	NULL),
(12,	'7706898d-76e3-4a4d-a222-3ee797038bcd',	'cxv',	'cv',	'admin21@admin.com',	'gravatar',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'$2y$10$N6j/qAtPWwaJrb.PnIBnFuetBcpgAgcmUsacFfnH3fLTPF7IU4FIi',	NULL,	1,	'64fd3d79ba3eb6539195074f25f712a0',	0,	NULL,	NULL,	NULL,	NULL,	'2018-09-25 08:26:36',	'2018-09-25 08:26:36',	NULL),
(13,	'6447c8db-894b-4042-b0fc-b225e1b42b66',	'aa',	'dd',	'executive1@executive.com',	'gravatar',	NULL,	NULL,	'xvdfvfd',	'12324',	NULL,	NULL,	NULL,	NULL,	NULL,	'$2y$10$ww0KkO/QxK1LedJt4wwvTO2JhqBvANFt20OcW7uoma8rFwSa9pnXu',	NULL,	1,	'c5b52092e2443574f4c29aa3689dda1c',	0,	NULL,	NULL,	NULL,	'OMGTUCDtzSIV0OPVBC6gmvWclUTfSNpboB3kzowPlIZwcS5MqIup1fXNiz45',	'2018-09-25 08:36:24',	'2018-09-25 08:36:24',	NULL),
(14,	'220ce330-b257-4fcc-848f-448407a8079f',	'dfsdf',	'fgdfg',	'admin4@admin.com',	'gravatar',	NULL,	NULL,	'dfghf',	'54546',	NULL,	NULL,	NULL,	NULL,	NULL,	'$2y$10$oV/o4/Yoshhf8UovT5962.4E3AQmb4.I2JAem0LlKXqdTt9cLi2wS',	NULL,	1,	'7d1e1f901080eed299e7287688fc936a',	0,	NULL,	NULL,	NULL,	NULL,	'2018-09-25 08:39:48',	'2018-09-25 08:39:48',	NULL),
(15,	'0013c2bf-3d3e-4846-80f7-5530555f5523',	'dwdwdg',	'dfgfh',	'executive1r@executive.com',	'gravatar',	NULL,	NULL,	'dgfhgfhn',	'343534',	1,	NULL,	NULL,	NULL,	NULL,	'$2y$10$S4GPc98.ahVPp9xmn.GZouM5sNm2.CQoOBfpULDgGEi/cBVvwvaKC',	NULL,	1,	'53e6cb43a6fe4c36214ef14773cdeb94',	0,	NULL,	NULL,	NULL,	NULL,	'2018-09-25 08:41:40',	'2018-09-25 08:41:40',	NULL),
(22,	'c8088ad6-6152-4641-ad81-efeca6b92478',	'zxcsv',	'ccvb',	'executivee@executive.com',	'gravatar',	NULL,	NULL,	'vsf',	NULL,	2,	NULL,	NULL,	NULL,	NULL,	'$2y$10$rncmd0H.fWeROggqaa5rPOqPg7vKRpbCLq5QbFS6blAeUV/DgsiSG',	NULL,	1,	'a5acc6583190fbeadfbd45bd52c5adcb',	0,	NULL,	NULL,	NULL,	NULL,	'2018-09-25 10:25:52',	'2018-09-25 10:25:52',	NULL),
(24,	'2ce32d01-2a30-4e6e-b283-fc3b05fbec51',	'zxvcv',	'afvdsvv',	'admin1234@admin.com',	'gravatar',	NULL,	NULL,	'csvfdb',	NULL,	2,	NULL,	NULL,	NULL,	NULL,	'$2y$10$QACj2K7w2lmiPu5s1ykWIu6Ln4H0fHt98FQ2s4avRtWurjm0RhQZS',	NULL,	1,	'bb1ed588deabe14000222b9d49adc5dd',	0,	NULL,	NULL,	NULL,	'FQjLRAjXJG31Es0n20V4RsW8pv9RvWmAYd9ul0OWUTSi9jVzsUqKZ9mQRW3B',	'2018-09-25 10:41:52',	'2018-09-25 10:41:52',	NULL),
(26,	'b255cf66-4ef9-4733-adec-898345984ba4',	'zxfzsdv',	'sddfg',	'admi22n@admin.com',	'gravatar',	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	'$2y$10$mHyfzTj4DQ5fSUmi82/0C.E/6tdlEOD.yJHgnMaXEe6u/piwIO/sy',	NULL,	1,	'a210dfe90e212d4b775fb9be5ed6b56b',	0,	NULL,	NULL,	NULL,	NULL,	'2018-09-25 10:45:28',	'2018-09-25 10:45:28',	NULL),
(27,	'f7c0f107-a8ef-46e8-a898-7ae2e776b329',	'ascsd',	'xcfdsf',	'dddadmin@admin.com',	'gravatar',	NULL,	NULL,	'xzcxzc',	'24234535',	1,	NULL,	NULL,	NULL,	NULL,	'$2y$10$o7Zn4ZRD/Bwa..tbec6ZD.Jm3pFQi5vjdTAEgfjUGP1dABwLv/st2',	NULL,	1,	'4b8b6546846d0269a600727c42f435f0',	0,	NULL,	NULL,	NULL,	NULL,	'2018-09-28 12:58:21',	'2018-09-28 12:58:21',	NULL),
(28,	'12292f9e-23ef-49b3-955d-6607041cfbf2',	'dfsdf',	'dsfdg',	'ad2234min1@admin.com',	'gravatar',	NULL,	NULL,	'dsvfdg',	'2343243',	1,	NULL,	NULL,	NULL,	NULL,	'$2y$10$z5LloD0dvCFqh7Jrrt054OxWul6SRhwRc.EJJI9.ClNioiqNEQQJS',	NULL,	1,	'c4ce9fe2de706823c502f5b1ed37841f',	0,	NULL,	NULL,	NULL,	NULL,	'2018-09-28 13:01:20',	'2018-09-28 13:01:20',	NULL),
(29,	'3a38b66f-9fa0-4dd1-814b-9596b992ce46',	'sfcsdf',	'efret',	'affffdmin1@admin.com',	'gravatar',	NULL,	NULL,	'weret',	NULL,	1,	NULL,	NULL,	NULL,	NULL,	'$2y$10$6FOfxHp/DqF9HfA7B26c1eavvFsyio0P5c28svlTlR9KsxJuv9BBW',	NULL,	1,	'781929965b9cd25bceef1be532b56542',	0,	NULL,	NULL,	NULL,	NULL,	'2018-09-28 13:02:29',	'2018-09-28 13:02:29',	NULL),
(30,	'7fa97f87-dafc-4794-8f2f-5a28c0b3b688',	'qqqq',	'www',	'dddexecutive1@executive.com',	'gravatar',	NULL,	NULL,	'sqs',	NULL,	1,	NULL,	NULL,	'1223213',	'0.4456546',	'$2y$10$cfPsZYB/8X12eHZXaL9O9e8GzVycJB5HG95v8stzPlwW/8NTcZci2',	NULL,	1,	'1b86cc15ff17f00f1738c0acc3efb875',	0,	NULL,	NULL,	NULL,	NULL,	'2018-09-28 13:07:38',	'2018-09-28 13:07:38',	NULL),
(31,	'3af534e8-35eb-4490-a06f-9a96b10a3c60',	'q1',	'a2',	'userq1@user.com',	'gravatar',	NULL,	NULL,	'sadfdsg',	'1232432',	1,	NULL,	NULL,	NULL,	NULL,	'$2y$10$4T3QhMzbaGoiRrPUnaYF2eQhrHWnvzymNhhPJAG2NuNoscv5.K5e.',	NULL,	1,	'29c0d2fc3ebe79eccc32d015d34d3c81',	1,	'America/New_York',	'2018-10-04 08:30:44',	'172.20.0.1',	'OwnwrksjSBQjCtXrYdjxVFtxH8ZYgcQo1E5y9AsqQQr3qiLXA75pmSxCejzc',	'2018-10-04 08:12:54',	'2018-10-04 08:30:44',	NULL),
(32,	'f36e40eb-6d1a-4328-8d19-48d90c2aed62',	'as',	'cvcc',	'test@gmail.com',	'gravatar',	NULL,	NULL,	'vb',	'asdfsfsd',	1,	NULL,	NULL,	NULL,	NULL,	'$2y$10$6N0UfQob.QNitV8f3dUetOwxl.c22zgZAX6/VFmw8SEGyH4XdWJfu',	NULL,	1,	'a18548606f956ae850d72abacae3a2a7',	1,	'America/New_York',	'2018-10-04 17:59:10',	'172.20.0.1',	'6gVykX3DVVQYPHWEP2qYDTSIFAILAJaoee3x4Z0za3Xt0cE0u3wHhMS2X55I',	'2018-10-04 08:41:00',	'2018-10-04 17:59:10',	NULL),
(33,	'7c785403-381e-4566-bc9b-72c3d7edcc26',	'adasd',	'df',	'tq@gmail.com',	'gravatar',	NULL,	NULL,	NULL,	'42343454',	1,	NULL,	NULL,	NULL,	NULL,	'$2y$10$e8zY/M9tzOuvtFjLYM7bNO3aW/WIqjxzL/5mMM0e2dh.MsynX1StW',	NULL,	1,	'038c6ecc4e64f761576d901805e265a2',	1,	'America/New_York',	'2018-10-04 08:44:50',	'172.20.0.1',	'eyDYG4hxxRnmRioisA7YGHTMPZWSX36KKBN7rnFBkYGaOmCp566naF7h0yJJ',	'2018-10-04 08:44:29',	'2018-10-04 08:44:50',	NULL),
(34,	'b4fc0552-5f37-4962-bfc5-132c45c1b44a',	'sxsa',	'xcxc',	's1@gmail.com',	'gravatar',	NULL,	NULL,	NULL,	'3435',	1,	NULL,	NULL,	NULL,	NULL,	'$2y$10$k42YpF.MnfPL4qpFcaKV7eZbM8BkyPAbASvGNZ0B8noElBLUztMGa',	NULL,	1,	'6d2f5aa9e8dff02150df836bf9f395b5',	0,	NULL,	NULL,	NULL,	'CKEkrRs5wsS5s3PYwZuwHxgBCj2vWsE7uCbLcJIpNUcj1X23pCfLRO7uz4o0',	'2018-10-04 09:24:18',	'2018-10-04 09:24:18',	NULL),
(35,	'ef37f060-cd2a-45f5-a9a3-9b7bb582ff56',	'as',	'cv',	'z1@gmail.com',	'gravatar',	NULL,	NULL,	NULL,	'343w543',	1,	NULL,	NULL,	NULL,	NULL,	'$2y$10$pSX.AFYsyQAqhQyZMjrRhezGS/9ZYSkxmM4xqSqsYFuSTD5wTv3fu',	NULL,	1,	'3b96cb7a18f446f8c6ffb47e4d086a80',	1,	'America/New_York',	'2018-10-05 06:35:15',	'172.20.0.1',	'PzM8vDFlFXvclqNlSkbQr4WCuGa9pxNnzhy2SKKYwEfnf8mjUT45Za47Pdif',	'2018-10-04 09:26:50',	'2018-10-05 06:35:15',	NULL),
(36,	'a3f4b4c0-b60e-4f85-b1a6-be9d58266e0e',	'dnknml',	'dsgf',	'dfdgfd@gmail.com',	'gravatar',	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	'$2y$10$HAsTtg.ZStGl5egfyNRPbupbSHufjB3VEJS30j2tHRluB7nn9C8eu',	NULL,	1,	'd8b031eca7d3a1061904a631f4d82b93',	0,	NULL,	NULL,	NULL,	NULL,	'2018-10-10 11:51:57',	'2018-10-10 11:51:57',	NULL),
(37,	'794cf036-906a-459c-8e7c-8e94802ad60c',	'xCdv',	'zcvv',	'exec243utive1@executive.com',	'gravatar',	NULL,	NULL,	NULL,	NULL,	2,	'[\"1539176144.buttons-sprite.png\"]',	NULL,	NULL,	NULL,	'$2y$10$XqJBY5FliEhjIaVXqwOj1efwnHaZ0OZpc73i1AsjmbwkdJA3kVToS',	NULL,	1,	'baccb3dd4d653ee9e51576eb5ca89e25',	0,	NULL,	NULL,	NULL,	NULL,	'2018-10-10 12:55:45',	'2018-10-10 12:55:45',	NULL),
(38,	'25d9ee8b-43a1-4068-a866-ca1f455f1571',	'asadsdf',	'sdfdsg',	'executwdeffvive1@executive.com',	'gravatar',	NULL,	NULL,	NULL,	NULL,	2,	'[\"1539176939.buttons-sprite.png\",\"1539176939.answered.png\"]',	NULL,	NULL,	NULL,	'$2y$10$rL7uEf/ayrLods4FZ0e/Me9WbFQ/LdlrRnc63N1jFUi.jUwuTKqI.',	NULL,	1,	'8af7931496ec4d5d6b5b5d36f3858ffc',	0,	NULL,	NULL,	NULL,	NULL,	'2018-10-10 13:08:59',	'2018-10-10 13:08:59',	NULL),
(39,	'a0ce3c45-e9f9-4073-862d-7f4e61bd1771',	'test-weboffice',	'web',	'weboffice@gmail.com',	'gravatar',	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	'8.4855',	'76.94924',	'$2y$10$VIlzjfdqMFfx4iHZNrcsNePvec5CJFktCsp9ro7LysKxpMzVRZGbm',	NULL,	1,	'60ec55c3d0cde946adb1aed6f1070974',	1,	'America/New_York',	'2018-10-11 11:35:28',	'172.20.0.1',	'KbStx6VUbbnjYmh9coBo6gLjLi05cwNXJw3Q1Oy0joyGXpfKEPWEk3mA0yYf',	'2018-10-11 11:09:12',	'2018-10-11 11:35:28',	NULL);

-- 2018-10-11 12:36:45
