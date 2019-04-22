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

 Date: 26/09/2018 18:47:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_itemdestaque
-- ----------------------------
DROP TABLE IF EXISTS `admin_itemdestaque`;
CREATE TABLE `admin_itemdestaque`  (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_lista` int(1) NOT NULL,
  `texto` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `visivel` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_itemdestaque
-- ----------------------------
INSERT INTO `admin_itemdestaque` VALUES (1, 1, '<div><strong><font color=\'#ffa500\'>Bracelete do Dragão Teste</font></strong>\r\n<br>\r\n<br> Redução a Skill: +15%\r\n<br>Tempo de Duração: 20h\r\n<br><font color=\'red\'>Quantidade: 1</font>\r\n<br><font color=\'green\'>Valor em Cash: 12.500</font>\r\n<br>\r\n<br>Item negociável.\r\n  </div>', 'Bracelete_do_Dragao.png', 1);
INSERT INTO `admin_itemdestaque` VALUES (2, 1, ' <div><strong><font color=\'#ffa500\'>Bracelete do Tigre</font></strong>\r\n<br>\r\n<br> Redução a Skill: +15%\r\n<br>Tempo de Duração: 20h\r\n<br><font color=\'red\'>Quantidade: 1</font>\r\n<br><font color=\'green\'>Valor em Cash: 12.500</font>\r\n<br>\r\n<br>Item negociável.\r\n  </div>', 'Bracelete_do_Tigre.png', 1);
INSERT INTO `admin_itemdestaque` VALUES (3, 1, '<div><strong><font color=\'#ffa500\'>Brinco do Dragão</font></strong>\r\n<br>\r\n<br> Aumento de Defesa: +300\r\n<br>Tempo de Duração: 20h\r\n<br><font color=\'red\'>Quantidade: 1</font>\r\n<br><font color=\'green\'>Valor em Cash: 10.500</font>\r\n<br>\r\n<br>Item negociável.\r\n  </div>', 'Brinco_do_Dragao.png', 1);
INSERT INTO `admin_itemdestaque` VALUES (4, 1, '<div><strong><font color=\'#ffa500\'>Brinco do Tigre</font></strong>\r\n<br>\r\n<br> Aumento de Defesa: +200\r\n<br>Tempo de Duração: 20h\r\n<br><font color=\'red\'>Quantidade: 1</font>\r\n<br><font color=\'green\'>Valor em Cash: 10.500</font>\r\n<br>\r\n<br>Item negociável.\r\n  </div>', 'Brinco_do_Tigre.png', 1);
INSERT INTO `admin_itemdestaque` VALUES (5, 1, '<div><strong><font color=\'#ffa500\'>Passagem Secreta</font></strong>\r\n<br>\r\n<br>Usado para acessar o Mapa Vip.\r\n<br><font color=\'red\'>Quantidade: 5</font>\r\n<br><font color=\'green\'>Valor em Cash: 10.000</font>\r\n<br>\r\n<br>Item negociável.\r\n  </div>', 'Passagem_Secreta.png', 1);
INSERT INTO `admin_itemdestaque` VALUES (6, 1, '<div><strong><font color=\'#ffa500\'>Expansão de Inventário</font></strong>\r\n<br>\r\n<br>Destravar 5 slot do III ou IV inventario.\r\n<br><font color=\'red\'>Quantidade: 1</font>\r\n<br><font color=\'green\'>Valor em Cash: 1.500</font>\r\n<br>\r\n<br>Item negociável.\r\n  </div>', 'ExpansaodeInventario.png', 1);
INSERT INTO `admin_itemdestaque` VALUES (7, 2, '<div><strong><font color=\'#ffa500\'>Monóculo Vermelho</font></strong>\r\n<br>\r\n<br>Usado para transmutação de armadura.\r\n<br><font color=\'red\'>Quantidade: 1</font>\r\n<br><font color=\'green\'>Valor em Cash: 20.000</font>\r\n<br>\r\n<br>Item negociável.\r\n  </div>', 'Monoculo_Vermelho.png', 1);
INSERT INTO `admin_itemdestaque` VALUES (8, 2, '<div><strong><font color=\'#ffa500\'>Pedra Arco-Íris</font></strong>\r\n<br>\r\n<br>Coloca 1 skill de M para P, não perde honra.\r\n<br><font color=\'red\'>Quantidade: 1</font>\r\n<br><font color=\'green\'>Valor em Cash: 2.000</font>\r\n<br>\r\n<br>Item negociável.\r\n  </div>', 'Pedra_ArcoIris.png', 1);
INSERT INTO `admin_itemdestaque` VALUES (9, 2, '<div><strong><font color=\'#ffa500\'>Pincel Mágico</font></strong>\r\n<br>\r\n<br>Usado para transmutação de acessorios.\r\n<br><font color=\'red\'>Quantidade: 1</font>\r\n<br><font color=\'green\'>Valor em Cash: 10.000</font>\r\n<br>\r\n<br>Item negociável.\r\n  </div>', 'Pincel_Magico.png', 1);
INSERT INTO `admin_itemdestaque` VALUES (10, 2, '<div><strong><font color=\'#ffa500\'>Poção Eterna</font></strong>\r\n<br>\r\n<br>Regeneração de Hp: +150\r\n<br>Tempo de Duração: 30d\r\n<br><font color=\'green\'>Valor em Cash: 10.000</font>\r\n<br>\r\n<br>\r\n<br>Item negociável.\r\n  </div>', 'Pocao_Eterna.png', 1);
INSERT INTO `admin_itemdestaque` VALUES (11, 2, '<div><strong><font color=\'#ffa500\'>Símbolo Heróico</font></strong>\r\n<br>\r\n<br>Usado para transmutação de armas.\r\n<br><font color=\'red\'>Quantidade: 1</font>\r\n<br><font color=\'green\'>Valor em Cash: 15.000</font>\r\n<br>\r\n<br>Item negociável.\r\n  </div>', 'Simbolo_Heroico.png', 1);
INSERT INTO `admin_itemdestaque` VALUES (12, 2, '<div><strong><font color=\'#ffa500\'>Símbolo Heróico</font></strong>\r\n<br>\r\n<br>Usado para transmutação de armas.\r\n<br><font color=\'red\'>Quantidade: 1</font>\r\n<br><font color=\'green\'>Valor em Cash: 15.000</font>\r\n<br>\r\n<br>Item negociável.\r\n  </div>', 'Simbolo_Heroico.png', 1);
INSERT INTO `admin_itemdestaque` VALUES (14, 3, '<div><strong><font color=\'#ffa500\'>Monóculo Vermelho</font></strong>\r\n<br>\r\n<br>Usado para transmutação de armadura.\r\n<br><font color=\'red\'>Quantidade: 1</font>\r\n<br><font color=\'green\'>Valor em Cash: 20.000</font>\r\n<br>\r\n<br>Item negociável.\r\n  </div>', 'Bracelete_do_Dragao.png', 1);
INSERT INTO `admin_itemdestaque` VALUES (16, 3, '<div><strong><font color=\'#ffa500\'>Nome do Item 3</font></strong>\r\n<br>\r\n<br>Usado para transmutação de armadura.\r\n<br><font color=\'red\'>Quantidade: 1</font>\r\n<br><font color=\'green\'>Valor em Cash: 20.000</font>\r\n<br>\r\n<br>Item negociável.\r\n  </div>', 'ExpansaodeInventario.png', 1);

SET FOREIGN_KEY_CHECKS = 1;
