/*
Navicat MySQL Data Transfer

Source Server         : Plus
Source Server Version : 50722
Source Host           : 198.245.51.223:3306
Source Database       : _teste_common

Target Server Type    : MYSQL
Target Server Version : 50722
File Encoding         : 65001

Date: 2018-09-22 13:09:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for gmhost
-- ----------------------------
DROP TABLE IF EXISTS `gmhost`;
CREATE TABLE `gmhost` (
  `mIP` varchar(16) NOT NULL DEFAULT '',
  PRIMARY KEY (`mIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of gmhost
-- ----------------------------

-- ----------------------------
-- Table structure for gmlist
-- ----------------------------
DROP TABLE IF EXISTS `gmlist`;
CREATE TABLE `gmlist` (
  `mID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mAccount` varchar(16) NOT NULL DEFAULT '',
  `mName` varchar(16) NOT NULL DEFAULT '',
  `mContactIP` varchar(16) NOT NULL DEFAULT '',
  `mServerIP` varchar(16) NOT NULL DEFAULT 'ALL',
  `mAuthority` enum('IMPLEMENTOR','HIGH_WIZARD','GOD','LOW_WIZARD','PLAYER') DEFAULT 'PLAYER',
  PRIMARY KEY (`mID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of gmlist
-- ----------------------------

-- ----------------------------
-- Table structure for locale
-- ----------------------------
DROP TABLE IF EXISTS `locale`;
CREATE TABLE `locale` (
  `mKey` varchar(255) NOT NULL DEFAULT '',
  `mValue` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`mKey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of locale
-- ----------------------------
