/*
 Navicat Premium Data Transfer

 Source Server         : account_titanz2
 Source Server Type    : MySQL
 Source Server Version : 50640
 Source Host           : mysql942.umbler.com:41890
 Source Schema         : _account

 Target Server Type    : MySQL
 Target Server Version : 50640
 File Encoding         : 65001

 Date: 26/09/2018 18:47:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_doacao
-- ----------------------------
DROP TABLE IF EXISTS `admin_doacao`;
CREATE TABLE `admin_doacao`  (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `tipo_doacao` int(1) NOT NULL,
  `valor` float(10, 2) NOT NULL DEFAULT 0.00,
  `bonus` int(3) NOT NULL DEFAULT 0,
  `cash` int(11) NOT NULL DEFAULT 0,
  `link` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `img` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `agencia` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `conta` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `titular` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `banco` int(1) NULL DEFAULT NULL,
  `visivel` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_doacao
-- ----------------------------
INSERT INTO `admin_doacao` VALUES (1, 1, 10.00, 10, 1000, 'https://pag.ae/7UaosR2TR', 'cash_10k.png', NULL, NULL, NULL, NULL, 1);
INSERT INTO `admin_doacao` VALUES (2, 2, 0.00, 0, 0, NULL, '', '0886.013', '10898-7', 'Bruno Maurício Nyland', 2, 1);
INSERT INTO `admin_doacao` VALUES (3, 2, 0.00, 0, 0, NULL, NULL, '4336', '18064-5', 'Larissa B Almeida', 1, 1);
INSERT INTO `admin_doacao` VALUES (4, 1, 20.00, 0, 2000, 'https://pag.ae/bjFtqHN', 'cash_20k.png', NULL, NULL, NULL, NULL, 1);
INSERT INTO `admin_doacao` VALUES (5, 1, 30.00, 0, 3000, 'https://pag.ae/bbFtq3Z', 'cash_30k.png', NULL, NULL, NULL, NULL, 1);
INSERT INTO `admin_doacao` VALUES (6, 1, 50.00, 0, 5000, 'https://pag.ae/bhFtq5z', 'cash_50k.png', NULL, NULL, NULL, NULL, 1);
INSERT INTO `admin_doacao` VALUES (7, 1, 80.00, 0, 8000, 'https://pag.ae/bcFtq6X', 'cash_80k.png', NULL, NULL, NULL, NULL, 1);
INSERT INTO `admin_doacao` VALUES (8, 1, 100.00, 0, 10000, 'https://pag.ae/7UaotSb4u', 'cash_100k.png', NULL, NULL, NULL, NULL, 1);
INSERT INTO `admin_doacao` VALUES (9, 1, 150.00, 0, 15000, 'https://pag.ae/7Uaouozev', 'cash_150k.png', NULL, NULL, NULL, NULL, 1);
INSERT INTO `admin_doacao` VALUES (10, 1, 200.00, 0, 20000, 'https://pag.ae/bmFtrdS', 'cash_200k.png', NULL, NULL, NULL, NULL, 1);
INSERT INTO `admin_doacao` VALUES (11, 1, 300.00, 0, 30000, 'https://pag.ae/bgFtrglz', 'cash_300k.png', NULL, NULL, NULL, NULL, 1);

SET FOREIGN_KEY_CHECKS = 1;
