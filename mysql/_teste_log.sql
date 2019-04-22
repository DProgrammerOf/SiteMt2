/*
Navicat MySQL Data Transfer

Source Server         : Plus
Source Server Version : 50722
Source Host           : 198.245.51.223:3306
Source Database       : _teste_log

Target Server Type    : MYSQL
Target Server Version : 50722
File Encoding         : 65001

Date: 2018-09-22 13:10:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bootlog
-- ----------------------------
DROP TABLE IF EXISTS `bootlog`;
CREATE TABLE `bootlog` (
  `time` int(11) DEFAULT NULL,
  `hostname` int(11) DEFAULT NULL,
  `channel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of bootlog
-- ----------------------------

-- ----------------------------
-- Table structure for change_name
-- ----------------------------
DROP TABLE IF EXISTS `change_name`;
CREATE TABLE `change_name` (
  `pid` int(20) NOT NULL DEFAULT '0',
  `old_name` varchar(30) DEFAULT NULL,
  `new_name` varchar(30) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of change_name
-- ----------------------------

-- ----------------------------
-- Table structure for command_log
-- ----------------------------
DROP TABLE IF EXISTS `command_log`;
CREATE TABLE `command_log` (
  `userid` int(11) DEFAULT NULL,
  `server` int(11) DEFAULT NULL,
  `ip` text,
  `port` int(11) DEFAULT NULL,
  `username` varchar(12) DEFAULT 'NONAME',
  `command` varchar(105) DEFAULT NULL,
  `date` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of command_log
-- ----------------------------

-- ----------------------------
-- Table structure for cube
-- ----------------------------
DROP TABLE IF EXISTS `cube`;
CREATE TABLE `cube` (
  `pid` varchar(20) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `x` varchar(40) DEFAULT NULL,
  `y` varchar(40) DEFAULT NULL,
  `item_vnum` varchar(40) DEFAULT NULL,
  `item_uid` varchar(40) DEFAULT NULL,
  `item_count` varchar(20) DEFAULT NULL,
  `success` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of cube
-- ----------------------------

-- ----------------------------
-- Table structure for fish_log
-- ----------------------------
DROP TABLE IF EXISTS `fish_log`;
CREATE TABLE `fish_log` (
  `1` int(11) DEFAULT NULL,
  `2` int(11) DEFAULT NULL,
  `3` int(11) DEFAULT NULL,
  `4` int(11) DEFAULT NULL,
  `5` int(11) DEFAULT NULL,
  `6` int(11) DEFAULT NULL,
  `7` int(11) DEFAULT NULL,
  `8` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of fish_log
-- ----------------------------

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
-- Table structure for goldlog
-- ----------------------------
DROP TABLE IF EXISTS `goldlog`;
CREATE TABLE `goldlog` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `pid` int(20) DEFAULT NULL,
  `what` int(20) DEFAULT NULL,
  `how` varchar(20) DEFAULT NULL,
  `hint` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of goldlog
-- ----------------------------

-- ----------------------------
-- Table structure for levellog
-- ----------------------------
DROP TABLE IF EXISTS `levellog`;
CREATE TABLE `levellog` (
  `name` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `account_id` varchar(30) DEFAULT NULL,
  `pid` varchar(30) DEFAULT NULL,
  `playtime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of levellog
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

-- ----------------------------
-- Table structure for locale_bug
-- ----------------------------
DROP TABLE IF EXISTS `locale_bug`;
CREATE TABLE `locale_bug` (
  `mKey` varchar(255) NOT NULL DEFAULT '',
  `mValue` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`mKey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of locale_bug
-- ----------------------------

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `ID` int(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `who` int(11) DEFAULT NULL,
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `what` int(11) DEFAULT NULL,
  `how` varchar(20) DEFAULT NULL,
  `hint` varchar(20) DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `vnum` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of log
-- ----------------------------

-- ----------------------------
-- Table structure for loginlog
-- ----------------------------
DROP TABLE IF EXISTS `loginlog`;
CREATE TABLE `loginlog` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `type` text,
  `time` datetime DEFAULT NULL,
  `channel` int(20) DEFAULT NULL,
  `account_id` int(20) DEFAULT NULL,
  `pid` int(20) DEFAULT NULL,
  `level` int(20) DEFAULT NULL,
  `job` int(20) DEFAULT NULL,
  `playtime` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of loginlog
-- ----------------------------

-- ----------------------------
-- Table structure for loginlog2
-- ----------------------------
DROP TABLE IF EXISTS `loginlog2`;
CREATE TABLE `loginlog2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text,
  `is_gm` int(11) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `channel` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `client_version` text,
  `ip` text,
  `logout_time` datetime DEFAULT NULL,
  `playtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of loginlog2
-- ----------------------------

-- ----------------------------
-- Table structure for money_log
-- ----------------------------
DROP TABLE IF EXISTS `money_log`;
CREATE TABLE `money_log` (
  `time` datetime DEFAULT NULL,
  `1` varchar(20) DEFAULT NULL,
  `2` varchar(20) DEFAULT '0',
  `3` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of money_log
-- ----------------------------

-- ----------------------------
-- Table structure for quest_reward_log
-- ----------------------------
DROP TABLE IF EXISTS `quest_reward_log`;
CREATE TABLE `quest_reward_log` (
  `1` varchar(50) DEFAULT NULL,
  `2` int(11) DEFAULT NULL,
  `3` int(11) DEFAULT NULL,
  `4` int(11) DEFAULT NULL,
  `5` int(11) DEFAULT NULL,
  `6` int(11) DEFAULT NULL,
  `7` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of quest_reward_log
-- ----------------------------

-- ----------------------------
-- Table structure for refinelog
-- ----------------------------
DROP TABLE IF EXISTS `refinelog`;
CREATE TABLE `refinelog` (
  `Id` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `step` int(11) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `is_success` int(11) DEFAULT NULL,
  `setType` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of refinelog
-- ----------------------------

-- ----------------------------
-- Table structure for shout_log
-- ----------------------------
DROP TABLE IF EXISTS `shout_log`;
CREATE TABLE `shout_log` (
  `1` time DEFAULT NULL,
  `2` int(11) DEFAULT NULL,
  `3` int(11) DEFAULT NULL,
  `4` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of shout_log
-- ----------------------------
