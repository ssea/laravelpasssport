/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : avkdb

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 16/05/2019 16:00:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Unpublic, 1=Public',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
BEGIN;
INSERT INTO `categories` VALUES (1, 'my test', 'my-test', NULL, '0', 1, NULL, '2019-05-09 09:13:11', '2019-05-09 09:13:30', NULL);
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_02_28_103048_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (4, '2019_03_06_081653_create_pages_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_03_06_081735_create_categories_table', 1);
INSERT INTO `migrations` VALUES (6, '2019_03_06_081808_create_products_table', 1);
INSERT INTO `migrations` VALUES (7, '2016_06_01_000001_create_oauth_auth_codes_table', 2);
INSERT INTO `migrations` VALUES (8, '2016_06_01_000002_create_oauth_access_tokens_table', 2);
INSERT INTO `migrations` VALUES (9, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2);
INSERT INTO `migrations` VALUES (10, '2016_06_01_000004_create_oauth_clients_table', 2);
INSERT INTO `migrations` VALUES (11, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);
COMMIT;

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for oauth_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------
BEGIN;
INSERT INTO `oauth_access_tokens` VALUES ('04819965b6bab7c477fa93d197b9b9419a72aa24b2d21d2ddf4f293352518d1c49bec48287b74537', 1, 2, NULL, '[]', 0, '2019-05-16 06:54:30', '2019-05-16 06:54:30', '2020-05-16 06:54:30');
INSERT INTO `oauth_access_tokens` VALUES ('4d786da93d989ebf9d79871e860c14a91340a3e8dcc31356df64243549261c385c0e99c9adb7ce2e', 1, 2, NULL, '[]', 0, '2019-05-16 07:21:52', '2019-05-16 07:21:52', '2020-05-16 07:21:52');
INSERT INTO `oauth_access_tokens` VALUES ('941f32ceb6edcb04d20634ee2e53b1d9413d7bb068ad3f853826ac53965ba7917ac8af598efa28a0', 1, 2, NULL, '[]', 0, '2019-05-16 07:21:55', '2019-05-16 07:21:55', '2020-05-16 07:21:55');
INSERT INTO `oauth_access_tokens` VALUES ('96c56bec8ec9bad5fcdbeba110077f10507b58a13c5421f2df176fecd2d13dbec43681c534350271', 1, 2, NULL, '[]', 0, '2019-05-16 07:44:36', '2019-05-16 07:44:36', '2020-05-16 07:44:36');
INSERT INTO `oauth_access_tokens` VALUES ('acbfb7c99ff37a856116a35c1c80099b5d64c61039a8c14885c7561df14ef0756e20bd6fd822ced1', 1, 2, NULL, '[]', 0, '2019-05-16 07:44:29', '2019-05-16 07:44:29', '2020-05-16 07:44:29');
INSERT INTO `oauth_access_tokens` VALUES ('c32718f6802c4a5e0590b64d978e562dff7d87c7343a5f2e75db95443f80846e6cc070a14394f4c8', 1, 2, NULL, '[]', 0, '2019-05-16 07:21:54', '2019-05-16 07:21:54', '2020-05-16 07:21:54');
INSERT INTO `oauth_access_tokens` VALUES ('e0ffb6d3f3f051c1fd47e4773ee460b292d0c9586176d211bc935dedbd6c6785379aacf4f7cd69b3', 1, 3, NULL, '[]', 0, '2019-05-16 06:36:17', '2019-05-16 06:36:17', '2020-05-16 06:36:17');
COMMIT;

-- ----------------------------
-- Table structure for oauth_auth_codes
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for oauth_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------
BEGIN;
INSERT INTO `oauth_clients` VALUES (1, NULL, 'Laravel Personal Access Client', 'E14tub4dCidK4AU8h5Q1xVpQpWvhrwFNmzUKPaVj', 'http://localhost', 1, 0, 0, '2019-05-16 04:27:02', '2019-05-16 04:27:02');
INSERT INTO `oauth_clients` VALUES (2, NULL, 'Laravel Password Grant Client', '8H9fInTutgCBLEYBgatFUG7gcxMM2bJpPKFfcSRb', 'http://localhost', 0, 1, 0, '2019-05-16 04:27:02', '2019-05-16 04:27:02');
INSERT INTO `oauth_clients` VALUES (3, NULL, 'Laravel Password Grant Client', 'rDDes0rsQhBFCcDUtUhedkP6XFtxLEO8wrA54P63', 'http://localhost', 0, 1, 0, '2019-05-16 04:41:48', '2019-05-16 04:41:48');
COMMIT;

-- ----------------------------
-- Table structure for oauth_personal_access_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_personal_access_clients
-- ----------------------------
BEGIN;
INSERT INTO `oauth_personal_access_clients` VALUES (1, 1, '2019-05-16 04:27:02', '2019-05-16 04:27:02');
COMMIT;

-- ----------------------------
-- Table structure for oauth_refresh_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_refresh_tokens
-- ----------------------------
BEGIN;
INSERT INTO `oauth_refresh_tokens` VALUES ('118d1de68046eadcc275b4a4a7fe6a6fad6e1ddd28c352d92196dd6c03c6a081024b6c07d0d7a723', 'e0ffb6d3f3f051c1fd47e4773ee460b292d0c9586176d211bc935dedbd6c6785379aacf4f7cd69b3', 0, '2020-05-16 06:36:17');
INSERT INTO `oauth_refresh_tokens` VALUES ('198ea1258c58739d47973d30b6d1398953d088834139dd400b27a28f9dc09b8c9cb38fb89c3024b1', 'acbfb7c99ff37a856116a35c1c80099b5d64c61039a8c14885c7561df14ef0756e20bd6fd822ced1', 0, '2020-05-16 07:44:29');
INSERT INTO `oauth_refresh_tokens` VALUES ('310763ecac73c68a308c63fee15d4531d4e8994f4900c52ff6bd2a370a94706b2dcc361ef56d7992', '4d786da93d989ebf9d79871e860c14a91340a3e8dcc31356df64243549261c385c0e99c9adb7ce2e', 0, '2020-05-16 07:21:52');
INSERT INTO `oauth_refresh_tokens` VALUES ('788e4ccceefc19a11e8a23761029e08fe3a40bdade3c5238ac886658f2e12aab0554a3ae24703488', '941f32ceb6edcb04d20634ee2e53b1d9413d7bb068ad3f853826ac53965ba7917ac8af598efa28a0', 0, '2020-05-16 07:21:55');
INSERT INTO `oauth_refresh_tokens` VALUES ('7e7bac5530ddd2a68063d8e28a5e43273f66321aab2306c8995241d77a764691e1adb6f730245dc0', '96c56bec8ec9bad5fcdbeba110077f10507b58a13c5421f2df176fecd2d13dbec43681c534350271', 0, '2020-05-16 07:44:36');
INSERT INTO `oauth_refresh_tokens` VALUES ('dfc56a3649a618b0fecbff1335047cf0da87aea8b3e83a9eb03ca914aca14290a24c56023a2869a8', 'c32718f6802c4a5e0590b64d978e562dff7d87c7343a5f2e75db95443f80846e6cc070a14394f4c8', 0, '2020-05-16 07:21:54');
INSERT INTO `oauth_refresh_tokens` VALUES ('e1bd3ec6c3da2f7fce4c2365f2faf78aa507466f2447070b5c5b967a143a1d718d8e38b8d0e600e7', '04819965b6bab7c477fa93d197b9b9419a72aa24b2d21d2ddf4f293352518d1c49bec48287b74537', 0, '2020-05-16 06:54:30');
COMMIT;

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL DEFAULT '0',
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Unpublic, 1=Public',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pages
-- ----------------------------
BEGIN;
INSERT INTO `pages` VALUES (1, 0, 'About us', 'about-us', NULL, NULL, '0', 1, '<p>Des about us</p>', '2019-03-14 07:23:44', '2019-03-14 07:23:44', NULL);
INSERT INTO `pages` VALUES (2, 0, 'Services', 'services', NULL, NULL, '0', 1, '<p>Des Services</p>', '2019-03-14 07:24:22', '2019-03-14 07:24:22', NULL);
INSERT INTO `pages` VALUES (3, 2, 'L\'Oreal Professionnel', 'l-oreal-professionnel', NULL, NULL, '0', 1, '<p>Des L\'Oreal Professionnel</p>', '2019-03-14 07:25:15', '2019-03-14 07:25:15', NULL);
INSERT INTO `pages` VALUES (4, 2, 'BODY Treatments', 'body-treatments', NULL, NULL, '0', 1, '<p>des BODY Treatments</p>', '2019-03-14 07:25:33', '2019-03-14 07:25:33', NULL);
INSERT INTO `pages` VALUES (5, 2, 'FACIAL Treatments', 'facial-treatments', NULL, NULL, '0', 1, '<p>des FACIAL Treatments</p>', '2019-03-14 07:26:03', '2019-03-14 07:26:03', NULL);
INSERT INTO `pages` VALUES (6, 0, 'Product', 'product', NULL, NULL, '0', 1, '<p>des product</p>', '2019-03-14 07:26:21', '2019-03-14 07:26:21', NULL);
INSERT INTO `pages` VALUES (7, 6, 'L\'Oreal Professionnel', 'l-oreal-professionnel-1', NULL, NULL, '0', 1, '<p>des L\'Oreal Professionnel</p>', '2019-03-14 07:26:53', '2019-03-14 07:26:53', NULL);
INSERT INTO `pages` VALUES (8, 6, 'Guinot', 'guinot', NULL, NULL, '0', 1, NULL, '2019-03-14 07:27:08', '2019-03-14 07:27:08', NULL);
INSERT INTO `pages` VALUES (9, 6, 'Cosmecology', 'cosmecology', NULL, NULL, '0', 1, '<p>des Cosmecology</p>', '2019-03-14 07:27:25', '2019-03-14 07:27:25', NULL);
INSERT INTO `pages` VALUES (10, 6, 'Golden Rose', 'golden-rose', NULL, NULL, '0', 1, '<p>des Golden Rose</p>', '2019-03-14 07:27:47', '2019-03-14 07:27:47', NULL);
INSERT INTO `pages` VALUES (11, 6, 'Sansiro', 'sansiro', NULL, NULL, '0', 1, '<p>des Sansiro</p>', '2019-03-14 07:28:03', '2019-03-14 07:28:03', NULL);
INSERT INTO `pages` VALUES (12, 6, 'Roxanne', 'roxanne', NULL, NULL, '0', 1, '<p>des Roxanne</p>', '2019-03-14 07:28:20', '2019-03-14 07:28:20', NULL);
INSERT INTO `pages` VALUES (13, 6, 'Salon Product', 'salon-product', NULL, NULL, '0', 1, '<p>des Salon Product</p>', '2019-03-14 07:28:35', '2019-03-14 07:28:35', NULL);
INSERT INTO `pages` VALUES (14, 0, 'Contact us', 'contact-us', NULL, NULL, '0', 1, '<p>des Contact us</p>', '2019-03-14 07:29:06', '2019-03-14 07:29:06', NULL);
INSERT INTO `pages` VALUES (15, 0, 'Promotion', 'promotion', NULL, NULL, '0', 1, '<p>des promotion</p>', '2019-03-14 07:31:41', '2019-03-14 07:31:41', NULL);
INSERT INTO `pages` VALUES (16, 0, 'Other', 'other', NULL, NULL, '0', 1, '<p>des other</p>', '2019-03-14 07:32:05', '2019-03-14 07:32:05', NULL);
INSERT INTO `pages` VALUES (17, 15, 'L\'Oreal Professionnel', 'l-oreal-professionnel-2', NULL, NULL, '0', 1, '<p>des promotion L\'Oreal Professionnel</p>', '2019-03-14 07:32:54', '2019-03-14 07:32:54', NULL);
INSERT INTO `pages` VALUES (18, 16, 'LKS SAMRACH BOUTIQUE HOTEL', 'lks-samrach-boutique-hotel', NULL, NULL, '0', 1, '<p>des other LKS SAMRACH BOUTIQUE HOTEL</p>', '2019-03-14 07:33:42', '2019-03-14 07:33:42', NULL);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `unit_price` int(11) NOT NULL DEFAULT '0',
  `order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_home` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Not display in home page, 1=display in home page',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Unpublic, 1=Public',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'Mr. Sorn Sea', 'sorn.sea@gmail.com', NULL, '$2y$10$u9qs26bg9jNsIDSdm.G0WuO7cTQtG2s5rsoufzbrJ13rXXeUgFyt.', NULL, '2019-03-14 07:22:01', '2019-03-14 07:22:01', NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
