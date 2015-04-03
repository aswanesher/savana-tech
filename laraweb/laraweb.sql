/*
MySQL Data Transfer
Source Host: localhost
Source Database: laraweb
Target Host: localhost
Target Database: laraweb
Date: 03-Apr-15 7:13:45 AM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for kl_brands
-- ----------------------------
DROP TABLE IF EXISTS `kl_brands`;
CREATE TABLE `kl_brands` (
  `id_brand` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for kl_categories
-- ----------------------------
DROP TABLE IF EXISTS `kl_categories`;
CREATE TABLE `kl_categories` (
  `id_category` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for kl_migrations
-- ----------------------------
DROP TABLE IF EXISTS `kl_migrations`;
CREATE TABLE `kl_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for kl_ostypes
-- ----------------------------
DROP TABLE IF EXISTS `kl_ostypes`;
CREATE TABLE `kl_ostypes` (
  `id_ostype` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ostype` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_ostype`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for kl_smartphones
-- ----------------------------
DROP TABLE IF EXISTS `kl_smartphones`;
CREATE TABLE `kl_smartphones` (
  `id_smartphone` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `ostype_id` int(10) unsigned NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_smartphone`),
  KEY `smartphones_category_id_foreign` (`category_id`),
  KEY `smartphones_brand_id_foreign` (`brand_id`),
  KEY `smartphones_ostype_id_foreign` (`ostype_id`),
  CONSTRAINT `smartphones_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `kl_brands` (`id_brand`),
  CONSTRAINT `smartphones_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `kl_categories` (`id_category`),
  CONSTRAINT `smartphones_ostype_id_foreign` FOREIGN KEY (`ostype_id`) REFERENCES `kl_ostypes` (`id_ostype`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for kl_users
-- ----------------------------
DROP TABLE IF EXISTS `kl_users`;
CREATE TABLE `kl_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('Administrator','User') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `kl_brands` VALUES ('1', 'Apple', '2015-04-02 15:03:13', '2015-04-02 15:03:13');
INSERT INTO `kl_brands` VALUES ('2', 'Samsung', '2015-04-02 15:03:13', '2015-04-02 15:03:13');
INSERT INTO `kl_brands` VALUES ('3', 'Nokia', '2015-04-02 15:03:13', '2015-04-02 15:03:13');
INSERT INTO `kl_brands` VALUES ('4', 'Lenovo', '2015-04-02 15:03:13', '2015-04-02 15:03:13');
INSERT INTO `kl_brands` VALUES ('5', 'LG', '2015-04-02 15:53:46', '2015-04-02 15:53:46');
INSERT INTO `kl_brands` VALUES ('6', 'Advan', '2015-04-02 15:55:07', '2015-04-02 15:55:07');
INSERT INTO `kl_brands` VALUES ('7', 'MITO', '2015-04-02 15:58:29', '2015-04-02 15:58:29');
INSERT INTO `kl_brands` VALUES ('8', 'Nexian', '2015-04-02 17:01:04', '2015-04-02 17:01:04');
INSERT INTO `kl_categories` VALUES ('1', 'Low', '2015-04-02 15:03:13', '2015-04-02 15:03:13');
INSERT INTO `kl_categories` VALUES ('2', 'Middle', '2015-04-02 15:03:13', '2015-04-02 15:03:13');
INSERT INTO `kl_categories` VALUES ('3', 'High', '2015-04-02 15:03:13', '2015-04-02 15:03:13');
INSERT INTO `kl_migrations` VALUES ('2015_01_03_193733_create_users_table', '1');
INSERT INTO `kl_migrations` VALUES ('2015_01_04_134707_create_brands_table', '1');
INSERT INTO `kl_migrations` VALUES ('2015_01_04_134809_create_categories_table', '1');
INSERT INTO `kl_migrations` VALUES ('2015_01_04_134833_create_ostypes_table', '1');
INSERT INTO `kl_migrations` VALUES ('2015_01_04_135030_create_smartphones_table', '1');
INSERT INTO `kl_ostypes` VALUES ('1', 'Android', '2015-04-02 15:03:12', '2015-04-02 15:03:12');
INSERT INTO `kl_ostypes` VALUES ('2', 'iOS', '2015-04-02 15:03:12', '2015-04-02 15:03:12');
INSERT INTO `kl_ostypes` VALUES ('3', 'Symbian', '2015-04-02 15:03:12', '2015-04-02 15:03:12');
INSERT INTO `kl_ostypes` VALUES ('4', 'Windows Phone', '2015-04-02 15:03:12', '2015-04-02 15:03:12');
INSERT INTO `kl_smartphones` VALUES ('1', '3', '1', '2', 'iPhone 5', 'sala satu produk apple', '6000000', 'sp_default.png', '2015-04-02 15:03:13', '2015-04-02 15:03:13');
INSERT INTO `kl_smartphones` VALUES ('2', '3', '2', '1', 'Galaxy S6', 'Hp terbaik saat ini', '4000000', 'K3LYtGhJhRMbq0tzBaCJjkjG-119461955.png', '2015-04-02 15:09:03', '2015-04-02 15:09:03');
INSERT INTO `kl_smartphones` VALUES ('3', '1', '7', '1', 'G1123', 'Hp Entry Level', '500000', 'u9Z200MirmRrdQ6Mo5c4EkAx-Android-512.png', '2015-04-02 16:04:48', '2015-04-02 16:04:48');
INSERT INTO `kl_users` VALUES ('1', 'admin', 'admincrudsp@kiravlab.com', '$2y$10$lbFsIHBWZiMsr2dYgy3PPeTowaVY86pYc5V1NUxm3xJjiGJgkkyvG', 'Administrator', 'oIPEHAPQSkuuQIbbXNmWywoW9tgi4JAyyGT3zZVQ28YgZUZMBzeh7J6sIS99', '2015-04-02 15:03:13', '2015-04-02 17:07:31');
INSERT INTO `kl_users` VALUES ('2', 'user', 'usercrudsp@kiravlab.com', '$2y$10$vyHCbKz8HZvsz0OA8Ri5TuCezBkeJHHd0qvoClGBySL6RKXuMBpH6', 'User', null, '2015-04-02 15:03:13', '2015-04-02 15:03:13');
