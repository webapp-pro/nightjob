/*
 Navicat Premium Data Transfer

 Source Server         : HENRY
 Source Server Type    : MySQL
 Source Server Version : 100428
 Source Host           : localhost:3306
 Source Schema         : nightjob_list

 Target Server Type    : MySQL
 Target Server Version : 100428
 File Encoding         : 65001

 Date: 04/07/2023 01:59:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for business_categories
-- ----------------------------
DROP TABLE IF EXISTS `business_categories`;
CREATE TABLE `business_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of business_categories
-- ----------------------------
INSERT INTO `business_categories` VALUES (1, 'キャバクラ');
INSERT INTO `business_categories` VALUES (2, 'ガールズバー');
INSERT INTO `business_categories` VALUES (3, 'ニュークラブ');
INSERT INTO `business_categories` VALUES (4, 'クラブ');
INSERT INTO `business_categories` VALUES (5, 'スナック');
INSERT INTO `business_categories` VALUES (6, 'ラウンジ');
INSERT INTO `business_categories` VALUES (7, 'ガールズラウンジ');
INSERT INTO `business_categories` VALUES (8, '昼キャバ・朝キャバ');
INSERT INTO `business_categories` VALUES (9, '姉キャバ・半熟キャバ');
INSERT INTO `business_categories` VALUES (10, 'ショークラブ');
INSERT INTO `business_categories` VALUES (11, 'パブクラブ');
INSERT INTO `business_categories` VALUES (12, '熟女キャバクラ');
INSERT INTO `business_categories` VALUES (13, '会員制ラウンジ');
INSERT INTO `business_categories` VALUES (14, '案内所');
INSERT INTO `business_categories` VALUES (15, 'バー');
INSERT INTO `business_categories` VALUES (16, 'コンカフェ');
INSERT INTO `business_categories` VALUES (17, '広告代理店');
INSERT INTO `business_categories` VALUES (18, 'ホスト');
INSERT INTO `business_categories` VALUES (19, 'その他');

-- ----------------------------
-- Table structure for companies
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `location_category_id` int UNSIGNED NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES (14, 2, 1, 'storage/companies/cover/IMG_87991688386598.jpeg', 'Club FELIX(フェリクス)', '〈学歴，職歴，スキル#すべて不問〉\r\n熱い想いさえあればどなたでも大丈夫です\r\n【体験入社も受付中！】', 'https://felix-club.jp', 'storage/companies/cover/IMG_87991688386598.jpeg', '2023-06-30 09:44:32', '2023-07-03 12:16:38');

-- ----------------------------
-- Table structure for company_categories
-- ----------------------------
DROP TABLE IF EXISTS `company_categories`;
CREATE TABLE `company_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of company_categories
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING HASH
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for job_applications
-- ----------------------------
DROP TABLE IF EXISTS `job_applications`;
CREATE TABLE `job_applications`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of job_applications
-- ----------------------------
INSERT INTO `job_applications` VALUES (1, 3, 9, '2023-07-04 01:16:15', '2023-07-04 01:16:15');

-- ----------------------------
-- Table structure for location_categories
-- ----------------------------
DROP TABLE IF EXISTS `location_categories`;
CREATE TABLE `location_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 50 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of location_categories
-- ----------------------------
INSERT INTO `location_categories` VALUES (1, '北海道');
INSERT INTO `location_categories` VALUES (2, '青森');
INSERT INTO `location_categories` VALUES (3, '秋田');
INSERT INTO `location_categories` VALUES (4, '岩手');
INSERT INTO `location_categories` VALUES (5, '山形');
INSERT INTO `location_categories` VALUES (6, '宮城');
INSERT INTO `location_categories` VALUES (7, '福島');
INSERT INTO `location_categories` VALUES (8, '新潟');
INSERT INTO `location_categories` VALUES (9, '茨城');
INSERT INTO `location_categories` VALUES (10, '栃木');
INSERT INTO `location_categories` VALUES (11, '群馬');
INSERT INTO `location_categories` VALUES (12, '埼玉');
INSERT INTO `location_categories` VALUES (13, '東京');
INSERT INTO `location_categories` VALUES (14, '千葉');
INSERT INTO `location_categories` VALUES (15, '富山');
INSERT INTO `location_categories` VALUES (16, '長野');
INSERT INTO `location_categories` VALUES (17, '山梨');
INSERT INTO `location_categories` VALUES (18, '神奈川');
INSERT INTO `location_categories` VALUES (19, '石川');
INSERT INTO `location_categories` VALUES (20, '岐阜');
INSERT INTO `location_categories` VALUES (21, '静岡');
INSERT INTO `location_categories` VALUES (22, '福井');
INSERT INTO `location_categories` VALUES (23, '愛知');
INSERT INTO `location_categories` VALUES (24, '滋賀');
INSERT INTO `location_categories` VALUES (25, '三重');
INSERT INTO `location_categories` VALUES (26, '京都');
INSERT INTO `location_categories` VALUES (27, '大阪');
INSERT INTO `location_categories` VALUES (28, '奈良');
INSERT INTO `location_categories` VALUES (29, '和歌山');
INSERT INTO `location_categories` VALUES (30, '兵庫');
INSERT INTO `location_categories` VALUES (31, '鳥取');
INSERT INTO `location_categories` VALUES (32, '岡山');
INSERT INTO `location_categories` VALUES (33, '香川');
INSERT INTO `location_categories` VALUES (34, '徳島');
INSERT INTO `location_categories` VALUES (35, '島根');
INSERT INTO `location_categories` VALUES (36, '広島');
INSERT INTO `location_categories` VALUES (37, '高知');
INSERT INTO `location_categories` VALUES (38, '愛媛');
INSERT INTO `location_categories` VALUES (39, '山口');
INSERT INTO `location_categories` VALUES (40, '福岡');
INSERT INTO `location_categories` VALUES (41, '大分');
INSERT INTO `location_categories` VALUES (42, '佐賀');
INSERT INTO `location_categories` VALUES (43, '熊本');
INSERT INTO `location_categories` VALUES (44, '宮崎');
INSERT INTO `location_categories` VALUES (45, '長崎');
INSERT INTO `location_categories` VALUES (46, '鹿児島');
INSERT INTO `location_categories` VALUES (47, '沖縄');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_10_09_104919_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (6, '2020_10_09_144234_create_occupation_categories_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_10_09_145555_create_companies_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_10_11_024354_create_posts_table', 1);
INSERT INTO `migrations` VALUES (9, '2020_10_12_133736_create_post_user_table', 1);
INSERT INTO `migrations` VALUES (10, '2020_10_13_111952_create_job_applications_table', 1);
INSERT INTO `migrations` VALUES (11, '2020_10_09_144234_create_company_categories_table', 2);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 2);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 3);

-- ----------------------------
-- Table structure for occupation_categories
-- ----------------------------
DROP TABLE IF EXISTS `occupation_categories`;
CREATE TABLE `occupation_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of occupation_categories
-- ----------------------------
INSERT INTO `occupation_categories` VALUES (1, 'ホールスタッフ・ボーイ');
INSERT INTO `occupation_categories` VALUES (2, '店長・幹部候補');
INSERT INTO `occupation_categories` VALUES (3, '送りドライバー');
INSERT INTO `occupation_categories` VALUES (4, 'キッチン');
INSERT INTO `occupation_categories` VALUES (5, 'ソムリエ');
INSERT INTO `occupation_categories` VALUES (6, 'バーテンダー');
INSERT INTO `occupation_categories` VALUES (7, 'チラシ配布スタッフ');
INSERT INTO `occupation_categories` VALUES (8, 'キャッシャー');
INSERT INTO `occupation_categories` VALUES (9, 'ヘアメイク');
INSERT INTO `occupation_categories` VALUES (10, 'webデザイナー');
INSERT INTO `occupation_categories` VALUES (11, 'パントリー');
INSERT INTO `occupation_categories` VALUES (12, '経理');
INSERT INTO `occupation_categories` VALUES (13, '案内所スタッフ');
INSERT INTO `occupation_categories` VALUES (14, 'キャスト');
INSERT INTO `occupation_categories` VALUES (15, 'カメラマン');
INSERT INTO `occupation_categories` VALUES (16, '風俗店舗スタッフ');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`(250)) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'view-dashboard', 'web', '2023-06-29 02:00:03', '2023-06-29 02:00:03');
INSERT INTO `permissions` VALUES (2, 'create-post', 'web', '2023-06-29 02:00:03', '2023-06-29 02:00:03');
INSERT INTO `permissions` VALUES (3, 'edit-post', 'web', '2023-06-29 02:00:03', '2023-06-29 02:00:03');
INSERT INTO `permissions` VALUES (4, 'delete-post', 'web', '2023-06-29 02:00:03', '2023-06-29 02:00:03');
INSERT INTO `permissions` VALUES (5, 'manage-authors', 'web', '2023-06-29 02:00:03', '2023-06-29 02:00:03');
INSERT INTO `permissions` VALUES (6, 'author-section', 'web', '2023-06-29 02:00:03', '2023-06-29 02:00:03');
INSERT INTO `permissions` VALUES (7, 'create-category', 'web', '2023-06-29 02:00:03', '2023-06-29 02:00:03');
INSERT INTO `permissions` VALUES (8, 'edit-category', 'web', '2023-06-29 02:00:03', '2023-06-29 02:00:03');
INSERT INTO `permissions` VALUES (9, 'delete-category', 'web', '2023-06-29 02:00:03', '2023-06-29 02:00:03');
INSERT INTO `permissions` VALUES (10, 'create-company', 'web', '2023-06-29 02:00:03', '2023-06-29 02:00:03');
INSERT INTO `permissions` VALUES (11, 'edit-company', 'web', '2023-06-29 02:00:03', '2023-06-29 02:00:03');
INSERT INTO `permissions` VALUES (12, 'delete-company', 'web', '2023-06-29 02:00:03', '2023-06-29 02:00:03');

-- ----------------------------
-- Table structure for post_user
-- ----------------------------
DROP TABLE IF EXISTS `post_user`;
CREATE TABLE `post_user`  (
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`post_id`, `user_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of post_user
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `occategory` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bucategory` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacancy_count` smallint UNSIGNED NOT NULL,
  `spcategory` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locategory` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `experience` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` mediumint UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (9, 14, '1', '1', 2, '1,7,13', '300000~500000', '16', '2023-07-03 18:49:14', 'なし', '学歴，職歴，スキルすべて不問', '<p><span style=\"color: black;\">〈学歴，職歴，スキル#すべて不問〉</span></p><p><span style=\"color: black;\">熱い想いさえあればどなたでも大丈夫です</span></p><p><span style=\"color: black;\"> 【体験入社も受付中！】</span></p><p><br></p>', 10, '2023-07-03 12:24:37', '2023-07-04 01:49:14');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (2, 2);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (3, 2);
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (4, 2);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (6, 2);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (9, 1);
INSERT INTO `role_has_permissions` VALUES (10, 1);
INSERT INTO `role_has_permissions` VALUES (10, 2);
INSERT INTO `role_has_permissions` VALUES (11, 1);
INSERT INTO `role_has_permissions` VALUES (11, 2);
INSERT INTO `role_has_permissions` VALUES (12, 1);
INSERT INTO `role_has_permissions` VALUES (12, 2);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'web', '2023-06-29 02:00:03', '2023-06-29 02:00:03');
INSERT INTO `roles` VALUES (2, 'author', 'web', '2023-06-29 02:00:03', '2023-06-29 02:00:03');
INSERT INTO `roles` VALUES (3, 'user', 'web', '2023-06-29 02:00:03', '2023-06-29 02:00:03');

-- ----------------------------
-- Table structure for speciality_categories
-- ----------------------------
DROP TABLE IF EXISTS `speciality_categories`;
CREATE TABLE `speciality_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of speciality_categories
-- ----------------------------
INSERT INTO `speciality_categories` VALUES (1, '日払いOK');
INSERT INTO `speciality_categories` VALUES (2, '寮・社宅あり');
INSERT INTO `speciality_categories` VALUES (3, '副業・かけもちOK');
INSERT INTO `speciality_categories` VALUES (4, '週2～3日勤務OK');
INSERT INTO `speciality_categories` VALUES (5, '40代・50代歓迎');
INSERT INTO `speciality_categories` VALUES (6, '社会保険あり');
INSERT INTO `speciality_categories` VALUES (7, '昇給・昇格随時');
INSERT INTO `speciality_categories` VALUES (8, '週休2日制度');
INSERT INTO `speciality_categories` VALUES (9, '体験入社OK');
INSERT INTO `speciality_categories` VALUES (10, '賞与あり');
INSERT INTO `speciality_categories` VALUES (11, '送りあり');
INSERT INTO `speciality_categories` VALUES (12, '制服貸与');
INSERT INTO `speciality_categories` VALUES (13, '交通費支給');
INSERT INTO `speciality_categories` VALUES (14, '食事補助あり');
INSERT INTO `speciality_categories` VALUES (15, '独立支援あり');
INSERT INTO `speciality_categories` VALUES (16, '女性も歓迎');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nikename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) NULL DEFAULT 0,
  `birthday` date NULL DEFAULT NULL,
  `street` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `current_job` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kanjiname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `overview` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `education` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_type` tinyint(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING HASH
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '管理者', 0, '1982-11-12', '12345', '2', '555-555555', 'abc', 'murayama', 'admin@admin.com', '2023-06-29 02:00:04', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'MASTER', 'aaaaaaaaaa', '4', 'gGC6FdsC0cbwdR3pK5DqWh5mSyr3qcc3ALZ2PMXvRLEeiE0LCIBlgifgANTO', 0, '2023-06-29 02:00:04', '2023-06-29 02:00:04');
INSERT INTO `users` VALUES (2, 'employer', '雇用主1', 0, '1991-10-15', '123123', '3', '666-666666', 'bbb', 'hideyosi', 'employer@employer.com', '2023-06-29 02:00:04', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'CEO', 'bbbbbbbbb', '4', 'tzzVaioOGqz93deISa9z7fnL1ePPUj29ebDVILK9U4QlHw8VeP7JPh1cFPi5', 1, '2023-06-29 02:00:04', '2023-06-29 02:00:04');
INSERT INTO `users` VALUES (3, 'applicant', '応募者1', 1, '1996-05-26', '123123123', '5', '333-333333', 'ccc', 'aoki', 'app@app.com', '2023-06-29 02:00:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'Internship', 'ccccccccccc', '6', 'Uv8jeDhubKIstUpGvkVljTsVbBxbuTiKEq710yAeHi5kWl3Rtt1qqtwL0W27', 2, '2023-06-29 02:00:05', '2023-06-29 02:00:05');

SET FOREIGN_KEY_CHECKS = 1;
