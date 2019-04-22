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

 Date: 29/09/2018 02:41:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_eleicao
-- ----------------------------
DROP TABLE IF EXISTS `admin_eleicao`;
CREATE TABLE `admin_eleicao`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `data_inicio` datetime(0) NOT NULL,
  `data_termino` datetime(0) NOT NULL,
  `visivel` int(1) NOT NULL DEFAULT 0,
  `tempo_min` int(11) NOT NULL DEFAULT 10,
  `kills_min` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
