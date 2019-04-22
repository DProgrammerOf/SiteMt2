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

 Date: 29/09/2018 02:42:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_candidatos_eleicao
-- ----------------------------
DROP TABLE IF EXISTS `admin_candidatos_eleicao`;
CREATE TABLE `admin_candidatos_eleicao`  (
  `id_eleicao` int(11) NOT NULL,
  `id_player` int(11) NOT NULL,
  `id_reino` int(1) NOT NULL,
  `votos` int(11) NOT NULL,
  `nickname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
