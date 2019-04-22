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

 Date: 29/09/2018 02:42:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for eleicao_votos
-- ----------------------------
DROP TABLE IF EXISTS `eleicao_votos`;
CREATE TABLE `eleicao_votos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_conta` int(11) NOT NULL,
  `id_eleicao` int(11) NOT NULL,
  `id_candidato` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_at` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
