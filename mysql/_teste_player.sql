/*
Navicat MySQL Data Transfer

Source Server         : Plus
Source Server Version : 50722
Source Host           : 198.245.51.223:3306
Source Database       : _teste_player

Target Server Type    : MYSQL
Target Server Version : 50722
File Encoding         : 65001

Date: 2018-09-22 13:11:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for affect
-- ----------------------------
DROP TABLE IF EXISTS `affect`;
CREATE TABLE `affect` (
  `dwPID` int(10) unsigned NOT NULL DEFAULT '0',
  `bType` smallint(5) unsigned NOT NULL DEFAULT '0',
  `bApplyOn` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `lApplyValue` int(11) NOT NULL DEFAULT '0',
  `dwFlag` int(10) unsigned NOT NULL DEFAULT '0',
  `lDuration` int(11) NOT NULL DEFAULT '0',
  `lSPCost` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`dwPID`,`bType`,`bApplyOn`,`lApplyValue`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of affect
-- ----------------------------

-- ----------------------------
-- Table structure for banword
-- ----------------------------
DROP TABLE IF EXISTS `banword`;
CREATE TABLE `banword` (
  `word` varchar(24) NOT NULL DEFAULT '',
  PRIMARY KEY (`word`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of banword
-- ----------------------------

-- ----------------------------
-- Table structure for change_empire
-- ----------------------------
DROP TABLE IF EXISTS `change_empire`;
CREATE TABLE `change_empire` (
  `account_id` int(11) DEFAULT NULL,
  `change_count` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of change_empire
-- ----------------------------

-- ----------------------------
-- Table structure for guild
-- ----------------------------
DROP TABLE IF EXISTS `guild`;
CREATE TABLE `guild` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(12) NOT NULL DEFAULT '',
  `sp` smallint(6) NOT NULL DEFAULT '1000',
  `master` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(2) DEFAULT NULL,
  `exp` int(11) DEFAULT NULL,
  `skill_point` tinyint(2) NOT NULL DEFAULT '0',
  `skill` tinyblob,
  `win` int(11) NOT NULL DEFAULT '0',
  `draw` int(11) NOT NULL DEFAULT '0',
  `loss` int(11) NOT NULL DEFAULT '0',
  `ladder_point` int(11) NOT NULL DEFAULT '0',
  `gold` int(11) NOT NULL DEFAULT '0',
  `dungeon_ch` int(11) NOT NULL DEFAULT '0',
  `dungeon_map` int(11) unsigned NOT NULL DEFAULT '0',
  `dungeon_cooldown` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guild
-- ----------------------------

-- ----------------------------
-- Table structure for guild_comment
-- ----------------------------
DROP TABLE IF EXISTS `guild_comment`;
CREATE TABLE `guild_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guild_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `notice` tinyint(4) DEFAULT NULL,
  `content` varchar(50) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aaa` (`notice`,`id`,`guild_id`),
  KEY `guild_id` (`guild_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guild_comment
-- ----------------------------

-- ----------------------------
-- Table structure for guild_comment_leader
-- ----------------------------
DROP TABLE IF EXISTS `guild_comment_leader`;
CREATE TABLE `guild_comment_leader` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guild_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(8) CHARACTER SET latin2 DEFAULT NULL,
  `notice` tinyint(4) DEFAULT NULL,
  `content` char(100) CHARACTER SET utf8 DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aaa` (`notice`,`id`,`guild_id`),
  KEY `guild_id` (`guild_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of guild_comment_leader
-- ----------------------------

-- ----------------------------
-- Table structure for guild_grade
-- ----------------------------
DROP TABLE IF EXISTS `guild_grade`;
CREATE TABLE `guild_grade` (
  `guild_id` int(11) NOT NULL DEFAULT '0',
  `grade` tinyint(4) NOT NULL DEFAULT '0',
  `name` varchar(8) NOT NULL DEFAULT '',
  `auth` set('ADD_MEMBER','REMOVE_MEMEBER','NOTICE','USE_SKILL','WAR','GUILD_SAFEBOX') DEFAULT NULL,
  PRIMARY KEY (`guild_id`,`grade`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guild_grade
-- ----------------------------

-- ----------------------------
-- Table structure for guild_member
-- ----------------------------
DROP TABLE IF EXISTS `guild_member`;
CREATE TABLE `guild_member` (
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `guild_id` int(10) unsigned NOT NULL DEFAULT '0',
  `grade` tinyint(2) DEFAULT NULL,
  `is_general` tinyint(1) NOT NULL DEFAULT '0',
  `offer` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`guild_id`,`pid`),
  UNIQUE KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guild_member
-- ----------------------------

-- ----------------------------
-- Table structure for guild_safebox
-- ----------------------------
DROP TABLE IF EXISTS `guild_safebox`;
CREATE TABLE `guild_safebox` (
  `guild_id` int(11) NOT NULL DEFAULT '0',
  `size` int(1) NOT NULL DEFAULT '1',
  `password` varchar(6) NOT NULL DEFAULT '',
  `gold` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`guild_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guild_safebox
-- ----------------------------

-- ----------------------------
-- Table structure for guild_war
-- ----------------------------
DROP TABLE IF EXISTS `guild_war`;
CREATE TABLE `guild_war` (
  `id_from` int(11) NOT NULL DEFAULT '0',
  `id_to` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_from`,`id_to`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guild_war
-- ----------------------------

-- ----------------------------
-- Table structure for guild_war_bet
-- ----------------------------
DROP TABLE IF EXISTS `guild_war_bet`;
CREATE TABLE `guild_war_bet` (
  `login` varchar(24) NOT NULL DEFAULT '',
  `gold` int(10) unsigned NOT NULL DEFAULT '0',
  `guild` int(11) NOT NULL DEFAULT '0',
  `war_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`war_id`,`login`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guild_war_bet
-- ----------------------------

-- ----------------------------
-- Table structure for guild_war_reservation
-- ----------------------------
DROP TABLE IF EXISTS `guild_war_reservation`;
CREATE TABLE `guild_war_reservation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guild1` int(10) unsigned NOT NULL DEFAULT '0',
  `guild2` int(10) unsigned NOT NULL DEFAULT '0',
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `warprice` int(10) unsigned NOT NULL DEFAULT '0',
  `initscore` int(10) unsigned NOT NULL DEFAULT '0',
  `started` tinyint(1) NOT NULL DEFAULT '0',
  `bet_from` int(10) unsigned NOT NULL DEFAULT '0',
  `bet_to` int(10) unsigned NOT NULL DEFAULT '0',
  `winner` int(11) NOT NULL DEFAULT '-1',
  `power1` int(11) NOT NULL DEFAULT '0',
  `power2` int(11) NOT NULL DEFAULT '0',
  `handicap` int(11) NOT NULL DEFAULT '0',
  `result1` int(11) NOT NULL DEFAULT '0',
  `result2` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guild_war_reservation
-- ----------------------------

-- ----------------------------
-- Table structure for highscore
-- ----------------------------
DROP TABLE IF EXISTS `highscore`;
CREATE TABLE `highscore` (
  `pid` int(11) DEFAULT NULL,
  `board` varchar(0) DEFAULT NULL,
  `value` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- ----------------------------
-- Records of highscore
-- ----------------------------

-- ----------------------------
-- Table structure for horse_name
-- ----------------------------
DROP TABLE IF EXISTS `horse_name`;
CREATE TABLE `horse_name` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(16) NOT NULL DEFAULT 'NONAME' COMMENT 'CHARACTER_NAME_MAX_LEN+1 so 24+null',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of horse_name
-- ----------------------------

-- ----------------------------
-- Table structure for item
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) unsigned NOT NULL DEFAULT '0',
  `window` enum('INVENTORY','EQUIPMENT','SAFEBOX','MALL','GROUND','GUILD_SAFEBOX') NOT NULL DEFAULT 'INVENTORY',
  `pos` smallint(5) unsigned NOT NULL DEFAULT '0',
  `count` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `vnum` int(11) unsigned NOT NULL DEFAULT '0',
  `socket0` int(10) NOT NULL DEFAULT '0',
  `socket1` int(10) NOT NULL DEFAULT '0',
  `socket2` int(10) NOT NULL DEFAULT '0',
  `socket3` int(10) unsigned NOT NULL DEFAULT '0',
  `socket4` int(10) unsigned NOT NULL DEFAULT '0',
  `socket5` int(10) unsigned NOT NULL DEFAULT '0',
  `attrtype0` tinyint(4) NOT NULL DEFAULT '0',
  `attrvalue0` smallint(6) NOT NULL DEFAULT '0',
  `attrtype1` tinyint(4) NOT NULL DEFAULT '0',
  `attrvalue1` smallint(6) NOT NULL DEFAULT '0',
  `attrtype2` tinyint(4) NOT NULL DEFAULT '0',
  `attrvalue2` smallint(6) NOT NULL DEFAULT '0',
  `attrtype3` tinyint(4) NOT NULL DEFAULT '0',
  `attrvalue3` smallint(6) NOT NULL DEFAULT '0',
  `attrtype4` tinyint(4) NOT NULL DEFAULT '0',
  `attrvalue4` smallint(6) NOT NULL DEFAULT '0',
  `attrtype5` tinyint(4) NOT NULL DEFAULT '0',
  `attrvalue5` smallint(6) NOT NULL DEFAULT '0',
  `attrtype6` tinyint(4) NOT NULL DEFAULT '0',
  `attrvalue6` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `owner_id_idx` (`owner_id`),
  KEY `item_vnum_index` (`vnum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item
-- ----------------------------

-- ----------------------------
-- Table structure for item_attr
-- ----------------------------
DROP TABLE IF EXISTS `item_attr`;
CREATE TABLE `item_attr` (
  `apply` enum('MAX_HP','MAX_SP','CON','INT','STR','DEX','ATT_SPEED','MOV_SPEED','CAST_SPEED','HP_REGEN','SP_REGEN','POISON_PCT','STUN_PCT','SLOW_PCT','CRITICAL_PCT','PENETRATE_PCT','ATTBONUS_HUMAN','ATTBONUS_ANIMAL','ATTBONUS_ORC','ATTBONUS_MILGYO','ATTBONUS_UNDEAD','ATTBONUS_DEVIL','STEAL_HP','STEAL_SP','MANA_BURN_PCT','DAMAGE_SP_RECOVER','BLOCK','DODGE','RESIST_SWORD','RESIST_TWOHAND','RESIST_DAGGER','RESIST_BELL','RESIST_FAN','RESIST_BOW','RESIST_FIRE','RESIST_ELEC','RESIST_MAGIC','RESIST_WIND','REFLECT_MELEE','REFLECT_CURSE','POISON_REDUCE','KILL_SP_RECOVER','EXP_DOUBLE_BONUS','GOLD_DOUBLE_BONUS','ITEM_DROP_BONUS','POTION_BONUS','KILL_HP_RECOVER','IMMUNE_STUN','IMMUNE_SLOW','IMMUNE_FALL','SKILL','BOW_DISTANCE','ATT_GRADE_BONUS','DEF_GRADE_BONUS','MAGIC_ATT_GRADE_BONUS','MAGIC_DEF_GRADE_BONUS','CURSE_PCT','MAX_STAMINA','ATT_BONUS_TO_WARRIOR','ATT_BONUS_TO_ASSASSIN','ATT_BONUS_TO_SURA','ATT_BONUS_TO_SHAMAN','ATT_BONUS_TO_MONSTER','ATT_BONUS','MALL_DEFBONUS','MALL_EXPBONUS','MALL_ITEMBONUS','MALL_GOLDBONUS','MAX_HP_PCT','MAX_SP_PCT','SKILL_DAMAGE_BONUS','NORMAL_HIT_DAMAGE_BONUS','SKILL_DEFEND_BONUS','NORMAL_HIT_DEFEND_BONUS','PC_BANG_EXP_BONUS','PC_BANG_DROP_BONUS','EXTRACT_HP_PCT','RESIST_WARRIOR','RESIST_ASSASSIN','RESIST_SURA','RESIST_SHAMAN','ENERGY','DEF_GRADE','COSTUME_ATTR_BONUS','MAGIC_ATT_BONUS_PER','MELEE_MAGIC_ATT_BONUS_PER','RESIST_ICE','RESIST_EARTH','RESIST_DARK','RESIST_CRITICAL','RESIST_PENETRATE','BLEEDING_REDUCE','BLEEDING_PCT','ATT_BONUS_TO_WOLFMAN','RESIST_WOLFMAN','RESIST_CLAW') NOT NULL DEFAULT 'MAX_HP',
  `prob` int(11) unsigned NOT NULL DEFAULT '0',
  `lv1` int(11) unsigned NOT NULL DEFAULT '0',
  `lv2` int(11) unsigned NOT NULL DEFAULT '0',
  `lv3` int(11) unsigned NOT NULL DEFAULT '0',
  `lv4` int(11) unsigned NOT NULL DEFAULT '0',
  `lv5` int(11) unsigned NOT NULL DEFAULT '0',
  `weapon` int(11) unsigned NOT NULL DEFAULT '0',
  `body` int(11) unsigned NOT NULL DEFAULT '0',
  `wrist` int(11) unsigned NOT NULL DEFAULT '0',
  `foots` int(11) unsigned NOT NULL DEFAULT '0',
  `neck` int(11) unsigned NOT NULL DEFAULT '0',
  `head` int(11) unsigned NOT NULL DEFAULT '0',
  `shield` int(11) unsigned NOT NULL DEFAULT '0',
  `ear` int(11) unsigned NOT NULL DEFAULT '0',
  `costume_body` int(11) unsigned NOT NULL DEFAULT '0',
  `costume_hair` int(11) unsigned NOT NULL DEFAULT '0',
  `costume_weapon` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item_attr
-- ----------------------------

-- ----------------------------
-- Table structure for item_attr_rare
-- ----------------------------
DROP TABLE IF EXISTS `item_attr_rare`;
CREATE TABLE `item_attr_rare` (
  `apply` enum('MAX_HP','MAX_SP','CON','INT','STR','DEX','ATT_SPEED','MOV_SPEED','CAST_SPEED','HP_REGEN','SP_REGEN','POISON_PCT','STUN_PCT','SLOW_PCT','CRITICAL_PCT','PENETRATE_PCT','ATTBONUS_HUMAN','ATTBONUS_ANIMAL','ATTBONUS_ORC','ATTBONUS_MILGYO','ATTBONUS_UNDEAD','ATTBONUS_DEVIL','STEAL_HP','STEAL_SP','MANA_BURN_PCT','DAMAGE_SP_RECOVER','BLOCK','DODGE','RESIST_SWORD','RESIST_TWOHAND','RESIST_DAGGER','RESIST_BELL','RESIST_FAN','RESIST_BOW','RESIST_FIRE','RESIST_ELEC','RESIST_MAGIC','RESIST_WIND','REFLECT_MELEE','REFLECT_CURSE','POISON_REDUCE','KILL_SP_RECOVER','EXP_DOUBLE_BONUS','GOLD_DOUBLE_BONUS','ITEM_DROP_BONUS','POTION_BONUS','KILL_HP_RECOVER','IMMUNE_STUN','IMMUNE_SLOW','IMMUNE_FALL','SKILL','BOW_DISTANCE','ATT_GRADE_BONUS','DEF_GRADE_BONUS','MAGIC_ATT_GRADE_BONUS','MAGIC_DEF_GRADE_BONUS','CURSE_PCT','MAX_STAMINA','ATT_BONUS_TO_WARRIOR','ATT_BONUS_TO_ASSASSIN','ATT_BONUS_TO_SURA','ATT_BONUS_TO_SHAMAN','ATT_BONUS_TO_MONSTER','ATT_BONUS','MALL_DEFBONUS','MALL_EXPBONUS','MALL_ITEMBONUS','MALL_GOLDBONUS','MAX_HP_PCT','MAX_SP_PCT','SKILL_DAMAGE_BONUS','NORMAL_HIT_DAMAGE_BONUS','SKILL_DEFEND_BONUS','NORMAL_HIT_DEFEND_BONUS','PC_BANG_EXP_BONUS','PC_BANG_DROP_BONUS','EXTRACT_HP_PCT','RESIST_WARRIOR','RESIST_ASSASSIN','RESIST_SURA','RESIST_SHAMAN','ENERGY','DEF_GRADE','COSTUME_ATTR_BONUS','MAGIC_ATT_BONUS_PER','MELEE_MAGIC_ATT_BONUS_PER','RESIST_ICE','RESIST_EARTH','RESIST_DARK','RESIST_CRITICAL','RESIST_PENETRATE','BLEEDING_REDUCE','BLEEDING_PCT','ATT_BONUS_TO_WOLFMAN','RESIST_WOLFMAN','RESIST_CLAW') NOT NULL DEFAULT 'MAX_HP',
  `prob` int(11) unsigned NOT NULL DEFAULT '0',
  `lv1` int(11) unsigned NOT NULL DEFAULT '0',
  `lv2` int(11) unsigned NOT NULL DEFAULT '0',
  `lv3` int(11) unsigned NOT NULL DEFAULT '0',
  `lv4` int(11) unsigned NOT NULL DEFAULT '0',
  `lv5` int(11) unsigned NOT NULL DEFAULT '0',
  `weapon` int(11) unsigned NOT NULL DEFAULT '0',
  `body` int(11) unsigned NOT NULL DEFAULT '0',
  `wrist` int(11) unsigned NOT NULL DEFAULT '0',
  `foots` int(11) unsigned NOT NULL DEFAULT '0',
  `neck` int(11) unsigned NOT NULL DEFAULT '0',
  `head` int(11) unsigned NOT NULL DEFAULT '0',
  `shield` int(11) unsigned NOT NULL DEFAULT '0',
  `ear` int(11) unsigned NOT NULL DEFAULT '0',
  `costume_body` int(11) unsigned NOT NULL DEFAULT '0',
  `costume_hair` int(11) unsigned NOT NULL DEFAULT '0',
  `costume_weapon` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item_attr_rare
-- ----------------------------

-- ----------------------------
-- Table structure for item_award
-- ----------------------------
DROP TABLE IF EXISTS `item_award`;
CREATE TABLE `item_award` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `login` varchar(16) NOT NULL DEFAULT '' COMMENT 'LOGIN_MAX_LEN=30',
  `vnum` int(6) unsigned NOT NULL DEFAULT '0',
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  `given_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `taken_time` datetime DEFAULT NULL,
  `item_id` int(11) unsigned DEFAULT NULL,
  `why` varchar(128) DEFAULT NULL,
  `socket0` int(11) unsigned NOT NULL DEFAULT '0',
  `socket1` int(11) unsigned NOT NULL DEFAULT '0',
  `socket2` int(11) unsigned NOT NULL DEFAULT '0',
  `mall` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pid_idx` (`pid`),
  KEY `given_time_idx` (`given_time`),
  KEY `taken_time_idx` (`taken_time`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item_award
-- ----------------------------

-- ----------------------------
-- Table structure for land
-- ----------------------------
DROP TABLE IF EXISTS `land`;
CREATE TABLE `land` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `map_index` int(11) unsigned NOT NULL DEFAULT '0',
  `x` int(11) unsigned NOT NULL DEFAULT '0',
  `y` int(11) unsigned NOT NULL DEFAULT '0',
  `width` int(11) unsigned NOT NULL DEFAULT '0',
  `height` int(11) unsigned NOT NULL DEFAULT '0',
  `guild_id` int(10) unsigned NOT NULL DEFAULT '0',
  `guild_level_limit` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `price` int(10) unsigned NOT NULL DEFAULT '0',
  `enable` enum('YES','NO') NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of land
-- ----------------------------

-- ----------------------------
-- Table structure for marriage
-- ----------------------------
DROP TABLE IF EXISTS `marriage`;
CREATE TABLE `marriage` (
  `is_married` tinyint(4) NOT NULL DEFAULT '0',
  `pid1` int(10) unsigned NOT NULL DEFAULT '0',
  `pid2` int(10) unsigned NOT NULL DEFAULT '0',
  `love_point` int(11) unsigned DEFAULT NULL,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid1`,`pid2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of marriage
-- ----------------------------

-- ----------------------------
-- Table structure for messenger_list
-- ----------------------------
DROP TABLE IF EXISTS `messenger_list`;
CREATE TABLE `messenger_list` (
  `account` varchar(16) NOT NULL DEFAULT '' COMMENT '24 at maximum',
  `companion` varchar(16) NOT NULL DEFAULT '' COMMENT '24 at maximum',
  PRIMARY KEY (`account`,`companion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of messenger_list
-- ----------------------------

-- ----------------------------
-- Table structure for myshop_pricelist
-- ----------------------------
DROP TABLE IF EXISTS `myshop_pricelist`;
CREATE TABLE `myshop_pricelist` (
  `owner_id` int(11) unsigned NOT NULL DEFAULT '0',
  `item_vnum` int(11) unsigned NOT NULL DEFAULT '0',
  `price` int(10) unsigned NOT NULL DEFAULT '0',
  `cheque` tinyint(3) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `list_id` (`owner_id`,`item_vnum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of myshop_pricelist
-- ----------------------------

-- ----------------------------
-- Table structure for object
-- ----------------------------
DROP TABLE IF EXISTS `object`;
CREATE TABLE `object` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `land_id` int(11) unsigned NOT NULL DEFAULT '0',
  `vnum` int(10) unsigned NOT NULL DEFAULT '0',
  `map_index` int(11) unsigned NOT NULL DEFAULT '0',
  `x` int(11) NOT NULL DEFAULT '0',
  `y` int(11) NOT NULL DEFAULT '0',
  `x_rot` float NOT NULL DEFAULT '0',
  `y_rot` float NOT NULL DEFAULT '0',
  `z_rot` float NOT NULL DEFAULT '0',
  `life` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of object
-- ----------------------------

-- ----------------------------
-- Table structure for object_proto
-- ----------------------------
DROP TABLE IF EXISTS `object_proto`;
CREATE TABLE `object_proto` (
  `vnum` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(32) NOT NULL DEFAULT '',
  `price` int(10) unsigned NOT NULL DEFAULT '0',
  `materials` varchar(64) NOT NULL DEFAULT '',
  `upgrade_vnum` int(10) unsigned NOT NULL DEFAULT '0',
  `upgrade_limit_time` int(10) unsigned NOT NULL DEFAULT '0',
  `life` int(11) NOT NULL DEFAULT '0',
  `reg_1` int(11) NOT NULL DEFAULT '0',
  `reg_2` int(11) NOT NULL DEFAULT '0',
  `reg_3` int(11) NOT NULL DEFAULT '0',
  `reg_4` int(11) NOT NULL DEFAULT '0',
  `npc` int(10) unsigned NOT NULL DEFAULT '0',
  `group_vnum` int(10) unsigned NOT NULL DEFAULT '0',
  `dependent_group` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vnum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of object_proto
-- ----------------------------

-- ----------------------------
-- Table structure for offline_shop_bank
-- ----------------------------
DROP TABLE IF EXISTS `offline_shop_bank`;
CREATE TABLE `offline_shop_bank` (
  `id` int(11) DEFAULT NULL,
  `shop_gold` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of offline_shop_bank
-- ----------------------------

-- ----------------------------
-- Table structure for offline_shop_decoration
-- ----------------------------
DROP TABLE IF EXISTS `offline_shop_decoration`;
CREATE TABLE `offline_shop_decoration` (
  `id` int(10) NOT NULL DEFAULT '0',
  `activacion` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of offline_shop_decoration
-- ----------------------------

-- ----------------------------
-- Table structure for offline_shop_item
-- ----------------------------
DROP TABLE IF EXISTS `offline_shop_item`;
CREATE TABLE `offline_shop_item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) unsigned NOT NULL DEFAULT '0',
  `pos` smallint(5) unsigned NOT NULL DEFAULT '0',
  `count` mediumint(4) unsigned NOT NULL DEFAULT '0',
  `vnum` int(11) unsigned NOT NULL DEFAULT '0',
  `socket0` int(10) unsigned NOT NULL DEFAULT '0',
  `socket1` int(10) unsigned NOT NULL DEFAULT '0',
  `socket2` int(10) unsigned NOT NULL DEFAULT '0',
  `socket3` int(10) unsigned NOT NULL DEFAULT '0',
  `socket4` int(10) unsigned NOT NULL DEFAULT '0',
  `socket5` int(10) unsigned NOT NULL DEFAULT '0',
  `attrtype0` tinyint(4) NOT NULL DEFAULT '0',
  `attrvalue0` smallint(6) NOT NULL DEFAULT '0',
  `attrtype1` tinyint(4) NOT NULL DEFAULT '0',
  `attrvalue1` smallint(6) NOT NULL DEFAULT '0',
  `attrtype2` tinyint(4) NOT NULL DEFAULT '0',
  `attrvalue2` smallint(6) NOT NULL DEFAULT '0',
  `attrtype3` tinyint(4) NOT NULL DEFAULT '0',
  `attrvalue3` smallint(6) NOT NULL DEFAULT '0',
  `attrtype4` tinyint(4) NOT NULL DEFAULT '0',
  `attrvalue4` smallint(6) NOT NULL DEFAULT '0',
  `attrtype5` tinyint(4) NOT NULL DEFAULT '0',
  `attrvalue5` smallint(6) NOT NULL DEFAULT '0',
  `attrtype6` tinyint(4) NOT NULL DEFAULT '0',
  `attrvalue6` smallint(6) NOT NULL DEFAULT '0',
  `price` bigint(11) NOT NULL DEFAULT '0',
  `price_cheque` int(11) NOT NULL DEFAULT '0',
  `status` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `owner_id_idx` (`owner_id`),
  KEY `item_vnum_index` (`vnum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- ----------------------------
-- Records of offline_shop_item
-- ----------------------------

-- ----------------------------
-- Table structure for offline_shop_npc
-- ----------------------------
DROP TABLE IF EXISTS `offline_shop_npc`;
CREATE TABLE `offline_shop_npc` (
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `sign` varchar(32) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `z` int(11) DEFAULT NULL,
  `mapIndex` int(11) DEFAULT NULL,
  `channel` int(2) DEFAULT NULL,
  `npc` int(10) DEFAULT '30000',
  `npc_decoration` int(10) DEFAULT '0',
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of offline_shop_npc
-- ----------------------------

-- ----------------------------
-- Table structure for player
-- ----------------------------
DROP TABLE IF EXISTS `player`;
CREATE TABLE `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(24) NOT NULL DEFAULT 'NONAME',
  `job` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `voice` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `dir` tinyint(2) NOT NULL DEFAULT '0',
  `x` int(11) NOT NULL DEFAULT '0',
  `y` int(11) NOT NULL DEFAULT '0',
  `z` int(11) NOT NULL DEFAULT '0',
  `map_index` int(11) NOT NULL DEFAULT '0',
  `exit_x` int(11) NOT NULL DEFAULT '0',
  `exit_y` int(11) NOT NULL DEFAULT '0',
  `exit_map_index` int(11) NOT NULL DEFAULT '0',
  `hp` int(11) NOT NULL DEFAULT '0',
  `mp` int(11) NOT NULL DEFAULT '0',
  `stamina` smallint(6) NOT NULL DEFAULT '0',
  `random_hp` smallint(5) unsigned NOT NULL DEFAULT '0',
  `random_sp` smallint(5) unsigned NOT NULL DEFAULT '0',
  `playtime` int(11) NOT NULL DEFAULT '0',
  `level` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `pz` int(11) NOT NULL DEFAULT '0',
  `level_step` tinyint(1) NOT NULL DEFAULT '0',
  `st` smallint(3) NOT NULL DEFAULT '0',
  `ht` smallint(3) NOT NULL DEFAULT '0',
  `dx` smallint(3) NOT NULL DEFAULT '0',
  `iq` smallint(3) NOT NULL DEFAULT '0',
  `exp` int(11) NOT NULL DEFAULT '0',
  `gold` bigint(50) NOT NULL DEFAULT '0',
  `cheque` tinyint(3) NOT NULL DEFAULT '0',
  `stat_point` smallint(3) NOT NULL DEFAULT '0',
  `skill_point` smallint(3) NOT NULL DEFAULT '0',
  `quickslot` tinyblob,
  `ip` varchar(15) DEFAULT '0.0.0.0',
  `part_main` int(7) NOT NULL DEFAULT '0',
  `part_base` tinyint(4) NOT NULL DEFAULT '0',
  `part_hair` mediumint(4) NOT NULL DEFAULT '0',
  `part_acce` smallint(4) unsigned NOT NULL DEFAULT '0',
  `skill_group` tinyint(4) NOT NULL DEFAULT '0',
  `skill_level` blob,
  `alignment` int(11) NOT NULL DEFAULT '0',
  `last_play` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `change_name` tinyint(1) NOT NULL DEFAULT '0',
  `mobile` varchar(24) DEFAULT NULL,
  `sub_skill_point` smallint(3) NOT NULL DEFAULT '0',
  `stat_reset_count` tinyint(4) NOT NULL DEFAULT '0',
  `horse_hp` smallint(4) NOT NULL DEFAULT '0',
  `horse_stamina` smallint(4) NOT NULL DEFAULT '0',
  `horse_level` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `horse_hp_droptime` int(10) unsigned NOT NULL DEFAULT '0',
  `horse_riding` tinyint(1) NOT NULL DEFAULT '0',
  `horse_skill_point` smallint(3) NOT NULL DEFAULT '0',
  `pontos_de_conquista` int(11) NOT NULL,
  `kills` int(11) NOT NULL,
  `encruzilhada` int(11) NOT NULL,
  `insignia` int(11) NOT NULL,
  `frags_last_war` int(11) NOT NULL,
  `kills_last_war` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account_id_idx` (`account_id`),
  KEY `name_idx` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of player
-- ----------------------------

-- ----------------------------
-- Table structure for player_deleted
-- ----------------------------
DROP TABLE IF EXISTS `player_deleted`;
CREATE TABLE `player_deleted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(24) NOT NULL DEFAULT 'NONAME',
  `job` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `voice` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `dir` tinyint(2) NOT NULL DEFAULT '0',
  `x` int(11) NOT NULL DEFAULT '0',
  `y` int(11) NOT NULL DEFAULT '0',
  `z` int(11) NOT NULL DEFAULT '0',
  `map_index` int(11) NOT NULL DEFAULT '0',
  `exit_x` int(11) NOT NULL DEFAULT '0',
  `exit_y` int(11) NOT NULL DEFAULT '0',
  `exit_map_index` int(11) NOT NULL DEFAULT '0',
  `hp` int(11) NOT NULL DEFAULT '0',
  `mp` int(11) NOT NULL DEFAULT '0',
  `stamina` smallint(6) NOT NULL DEFAULT '0',
  `random_hp` smallint(5) unsigned NOT NULL DEFAULT '0',
  `random_sp` smallint(5) unsigned NOT NULL DEFAULT '0',
  `playtime` int(11) NOT NULL DEFAULT '0',
  `level` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `pz` int(11) NOT NULL DEFAULT '0',
  `level_step` tinyint(1) NOT NULL DEFAULT '0',
  `st` smallint(3) NOT NULL DEFAULT '0',
  `ht` smallint(3) NOT NULL DEFAULT '0',
  `dx` smallint(3) NOT NULL DEFAULT '0',
  `iq` smallint(3) NOT NULL DEFAULT '0',
  `exp` int(11) NOT NULL DEFAULT '0',
  `gold` int(11) NOT NULL DEFAULT '0',
  `cheque` tinyint(3) NOT NULL DEFAULT '0',
  `stat_point` smallint(3) NOT NULL DEFAULT '0',
  `skill_point` smallint(3) NOT NULL DEFAULT '0',
  `quickslot` tinyblob,
  `ip` varchar(15) DEFAULT '0.0.0.0',
  `part_main` int(7) NOT NULL DEFAULT '0',
  `part_base` tinyint(4) NOT NULL DEFAULT '0',
  `part_hair` mediumint(4) NOT NULL DEFAULT '0',
  `part_acce` smallint(4) unsigned NOT NULL DEFAULT '0',
  `skill_group` tinyint(4) NOT NULL DEFAULT '0',
  `skill_level` blob,
  `alignment` int(11) NOT NULL DEFAULT '0',
  `last_play` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `change_name` tinyint(1) NOT NULL DEFAULT '0',
  `mobile` varchar(24) DEFAULT NULL,
  `sub_skill_point` smallint(3) NOT NULL DEFAULT '0',
  `stat_reset_count` tinyint(4) NOT NULL DEFAULT '0',
  `horse_hp` smallint(4) NOT NULL DEFAULT '0',
  `horse_stamina` smallint(4) NOT NULL DEFAULT '0',
  `horse_level` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `horse_hp_droptime` int(10) unsigned NOT NULL DEFAULT '0',
  `horse_riding` tinyint(1) NOT NULL DEFAULT '0',
  `horse_skill_point` smallint(3) NOT NULL DEFAULT '0',
  `pontos_de_conquista` int(11) NOT NULL,
  `kills` int(11) NOT NULL,
  `encruzilhada` int(11) NOT NULL,
  `insignia` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account_id_idx` (`account_id`),
  KEY `name_idx` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of player_deleted
-- ----------------------------

-- ----------------------------
-- Table structure for player_index
-- ----------------------------
DROP TABLE IF EXISTS `player_index`;
CREATE TABLE `player_index` (
  `id` int(11) NOT NULL DEFAULT '0',
  `pid1` int(11) NOT NULL DEFAULT '0',
  `pid2` int(11) NOT NULL DEFAULT '0',
  `pid3` int(11) NOT NULL DEFAULT '0',
  `pid4` int(11) NOT NULL DEFAULT '0',
  `pid5` int(10) unsigned NOT NULL DEFAULT '0',
  `empire` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pid1_key` (`pid1`),
  KEY `pid2_key` (`pid2`),
  KEY `pid3_key` (`pid3`),
  KEY `pid4_key` (`pid4`),
  KEY `pid5_key` (`pid5`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of player_index
-- ----------------------------

-- ----------------------------
-- Table structure for quest
-- ----------------------------
DROP TABLE IF EXISTS `quest`;
CREATE TABLE `quest` (
  `dwPID` int(10) unsigned NOT NULL DEFAULT '0',
  `szName` varchar(32) NOT NULL DEFAULT '',
  `szState` varchar(64) NOT NULL DEFAULT '',
  `lValue` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`dwPID`,`szName`,`szState`),
  KEY `pid_idx` (`dwPID`),
  KEY `name_idx` (`szName`),
  KEY `state_idx` (`szState`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of quest
-- ----------------------------

-- ----------------------------
-- Table structure for refine_proto
-- ----------------------------
DROP TABLE IF EXISTS `refine_proto`;
CREATE TABLE `refine_proto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vnum0` int(10) unsigned NOT NULL DEFAULT '0',
  `count0` smallint(6) NOT NULL DEFAULT '0',
  `vnum1` int(10) unsigned NOT NULL DEFAULT '0',
  `count1` smallint(6) NOT NULL DEFAULT '0',
  `vnum2` int(10) unsigned NOT NULL DEFAULT '0',
  `count2` smallint(6) NOT NULL DEFAULT '0',
  `vnum3` int(10) unsigned NOT NULL DEFAULT '0',
  `count3` smallint(6) NOT NULL DEFAULT '0',
  `vnum4` int(10) unsigned NOT NULL DEFAULT '0',
  `count4` smallint(6) NOT NULL DEFAULT '0',
  `cost` int(11) NOT NULL DEFAULT '0',
  `src_vnum` int(10) unsigned NOT NULL DEFAULT '0',
  `result_vnum` int(10) unsigned NOT NULL DEFAULT '0',
  `prob` smallint(6) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of refine_proto
-- ----------------------------

-- ----------------------------
-- Table structure for safebox
-- ----------------------------
DROP TABLE IF EXISTS `safebox`;
CREATE TABLE `safebox` (
  `account_id` int(10) unsigned NOT NULL DEFAULT '0',
  `size` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `password` varchar(6) NOT NULL DEFAULT '',
  `gold` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of safebox
-- ----------------------------

-- ----------------------------
-- Table structure for shop
-- ----------------------------
DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `vnum` int(11) NOT NULL DEFAULT '0',
  `name` varchar(32) NOT NULL DEFAULT 'Noname',
  `npc_vnum` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vnum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop
-- ----------------------------

-- ----------------------------
-- Table structure for shop_average_price
-- ----------------------------
DROP TABLE IF EXISTS `shop_average_price`;
CREATE TABLE `shop_average_price` (
  `vnum` int(11) NOT NULL,
  `price` bigint(30) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_average_price
-- ----------------------------

-- ----------------------------
-- Table structure for shop_item
-- ----------------------------
DROP TABLE IF EXISTS `shop_item`;
CREATE TABLE `shop_item` (
  `shop_vnum` int(11) NOT NULL DEFAULT '0',
  `item_vnum` int(11) NOT NULL DEFAULT '0',
  `count` tinyint(4) unsigned NOT NULL DEFAULT '1',
  UNIQUE KEY `vnum_unique` (`shop_vnum`,`item_vnum`,`count`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_item
-- ----------------------------

-- ----------------------------
-- Table structure for skill_proto
-- ----------------------------
DROP TABLE IF EXISTS `skill_proto`;
CREATE TABLE `skill_proto` (
  `dwVnum` int(11) NOT NULL DEFAULT '0',
  `szName` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `bType` tinyint(4) NOT NULL DEFAULT '0',
  `bLevelStep` tinyint(4) NOT NULL DEFAULT '0',
  `bMaxLevel` tinyint(4) NOT NULL DEFAULT '0',
  `bLevelLimit` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `szPointOn` enum('NONE','MAX_HP','MAX_SP','HP_REGEN','SP_REGEN','BLOCK','HP','SP','ATT_GRADE','DEF_GRADE','MAGIC_ATT_GRADE','MAGIC_DEF_GRADE','BOW_DISTANCE','MOV_SPEED','ATT_SPEED','POISON_PCT','RESIST_RANGE','RESIST_MELEE','CASTING_SPEED','REFLECT_MELEE','ATT_BONUS','DEF_BONUS','RESIST_NORMAL','DODGE','KILL_HP_RECOVER','KILL_SP_RECOVER','HIT_HP_RECOVER','HIT_SP_RECOVER','CRITICAL','MANASHIELD','SKILL_DAMAGE_BONUS','NORMAL_HIT_DAMAGE_BONUS','MAX_HP_PCT','MAX_MP_PCT') NOT NULL DEFAULT 'NONE',
  `szPointPoly` varchar(100) NOT NULL DEFAULT '',
  `szSPCostPoly` varchar(100) NOT NULL DEFAULT '',
  `szDurationPoly` varchar(100) NOT NULL DEFAULT '',
  `szDurationSPCostPoly` varchar(100) NOT NULL DEFAULT '',
  `szCooldownPoly` varchar(100) NOT NULL DEFAULT '',
  `szMasterBonusPoly` varchar(100) NOT NULL DEFAULT '',
  `szAttackGradePoly` varchar(100) NOT NULL DEFAULT '',
  `setFlag` set('ATTACK','USE_MELEE_DAMAGE','COMPUTE_ATTGRADE','SELFONLY','USE_MAGIC_DAMAGE','USE_HP_AS_COST','COMPUTE_MAGIC_DAMAGE','SPLASH','GIVE_PENALTY','USE_ARROW_DAMAGE','PENETRATE','IGNORE_TARGET_RATING','ATTACK_SLOW','ATTACK_STUN','HP_ABSORB','SP_ABSORB','ATTACK_FIRE_CONT','REMOVE_BAD_AFFECT','REMOVE_GOOD_AFFECT','CRUSH','ATTACK_POISON','TOGGLE','DISABLE_BY_POINT_UP','CRUSH_LONG','ATTACK_WIND','ATTACK_ELEC','ATTACK_FIRE','PARTY','ATTACK_BLEEDING') DEFAULT NULL,
  `setAffectFlag` enum('YMIR','INVISIBILITY','SPAWN','POISON','SLOW','STUN','DUNGEON_READY','DUNGEON_UNIQUE','BUILDING_CONSTRUCTION_SMALL','BUILDING_CONSTRUCTION_LARGE','BUILDING_UPGRADE','MOV_SPEED_POTION','ATT_SPEED_POTION','FISH_MIND','JEONGWIHON','GEOMGYEONG','CHEONGEUN','GYEONGGONG','EUNHYUNG','GWIGUM','TERROR','JUMAGAP','HOSIN','BOHO','KWAESOK','MANASHIELD','MUYEONG','REVIVE_INVISIBLE','FIRE','GICHEON','JEUNGRYEOK','TANHWAN_DASH','PABEOP','CHEONGEUN_WITH_FALL','POLYMORPH','WAR_FLAG1','WAR_FLAG2','WAR_FLAG3','CHINA_FIREWORK','HAIR','GERMANY','RAMADAN_RING','BLEEDING','RED_POSSESSION','BLUE_POSSESSION') NOT NULL DEFAULT 'YMIR',
  `szPointOn2` enum('NONE','MAX_HP','MAX_SP','HP_REGEN','SP_REGEN','BLOCK','HP','SP','ATT_GRADE','DEF_GRADE','MAGIC_ATT_GRADE','MAGIC_DEF_GRADE','BOW_DISTANCE','MOV_SPEED','ATT_SPEED','POISON_PCT','RESIST_RANGE','RESIST_MELEE','CASTING_SPEED','REFLECT_MELEE','ATT_BONUS','DEF_BONUS','RESIST_NORMAL','DODGE','KILL_HP_RECOVER','KILL_SP_RECOVER','HIT_HP_RECOVER','HIT_SP_RECOVER','CRITICAL','MANASHIELD','SKILL_DAMAGE_BONUS','NORMAL_HIT_DAMAGE_BONUS') NOT NULL DEFAULT 'NONE',
  `szPointPoly2` varchar(100) NOT NULL DEFAULT '',
  `szDurationPoly2` varchar(100) NOT NULL DEFAULT '',
  `setAffectFlag2` enum('YMIR','INVISIBILITY','SPAWN','POISON','SLOW','STUN','DUNGEON_READY','DUNGEON_UNIQUE','BUILDING_CONSTRUCTION_SMALL','BUILDING_CONSTRUCTION_LARGE','BUILDING_UPGRADE','MOV_SPEED_POTION','ATT_SPEED_POTION','FISH_MIND','JEONGWIHON','GEOMGYEONG','CHEONGEUN','GYEONGGONG','EUNHYUNG','GWIGUM','TERROR','JUMAGAP','HOSIN','BOHO','KWAESOK','MANASHIELD','MUYEONG','REVIVE_INVISIBLE','FIRE','GICHEON','JEUNGRYEOK','TANHWAN_DASH','PABEOP','CHEONGEUN_WITH_FALL','POLYMORPH','WAR_FLAG1','WAR_FLAG2','WAR_FLAG3','CHINA_FIREWORK','HAIR','GERMANY','RAMADAN_RING','BLEEDING','RED_POSSESSION','BLUE_POSSESSION') NOT NULL DEFAULT 'YMIR',
  `szPointOn3` varchar(100) NOT NULL DEFAULT 'NONE',
  `szPointPoly3` varchar(100) NOT NULL DEFAULT '',
  `szDurationPoly3` varchar(100) NOT NULL DEFAULT '',
  `szGrandMasterAddSPCostPoly` varchar(100) NOT NULL DEFAULT '',
  `prerequisiteSkillVnum` int(11) NOT NULL DEFAULT '0',
  `prerequisiteSkillLevel` int(11) NOT NULL DEFAULT '0',
  `eSkillType` enum('NORMAL','MELEE','RANGE','MAGIC') NOT NULL DEFAULT 'NORMAL',
  `iMaxHit` tinyint(4) NOT NULL DEFAULT '0',
  `szSplashAroundDamageAdjustPoly` varchar(100) NOT NULL DEFAULT '1',
  `dwTargetRange` int(11) NOT NULL DEFAULT '1000',
  `dwSplashRange` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`dwVnum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of skill_proto
-- ----------------------------
