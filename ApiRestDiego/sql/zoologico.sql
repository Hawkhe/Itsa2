/*
 Navicat Premium Data Transfer

 Source Server         : drp
 Source Server Type    : MySQL
 Source Server Version : 100411 (10.4.11-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : zoologico

 Target Server Type    : MySQL
 Target Server Version : 100411 (10.4.11-MariaDB)
 File Encoding         : 65001

 Date: 19/03/2024 15:54:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for animal
-- ----------------------------
DROP TABLE IF EXISTS `animal`;
CREATE TABLE `animal`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `edad` int NULL DEFAULT NULL,
  `especie` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `clasificacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of animal
-- ----------------------------
INSERT INTO `animal` VALUES (1, 3, 'Tigre', 'Felino', 'Saludable');
INSERT INTO `animal` VALUES (2, 1, 'Hiena', 'Mamifero', 'Enfermo, bajando de peso');
INSERT INTO `animal` VALUES (3, 110, 'Tortuga', 'oviparo', 'Saludable');
INSERT INTO `animal` VALUES (4, 4, 'Huron', 'Mamifero', 'En rehabilitacion por heridas producidas en una pe');
INSERT INTO `animal` VALUES (6, 5, 'Leon', 'felino', 'Saludable');

SET FOREIGN_KEY_CHECKS = 1;
