/*
 Navicat Premium Data Transfer

 Source Server         : player_titanz2
 Source Server Type    : MySQL
 Source Server Version : 50640
 Source Host           : mysql942.umbler.com:41890
 Source Schema         : _player

 Target Server Type    : MySQL
 Target Server Version : 50640
 File Encoding         : 65001

 Date: 22/09/2018 22:50:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ranking_top5
-- ----------------------------
DROP TABLE IF EXISTS `ranking_top5`;
CREATE TABLE `ranking_top5`  (
  `NickName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ClasseImg` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Posicao` int(2) NOT NULL,
  `ImperioId` int(1) NOT NULL,
  `ranking` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
