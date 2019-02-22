/*
 Navicat Premium Data Transfer

 Source Server         : ampps
 Source Server Type    : MySQL
 Source Server Version : 50637
 Source Host           : localhost
 Source Database       : piweb

 Target Server Type    : MySQL
 Target Server Version : 50637
 File Encoding         : utf-8

 Date: 11/12/2018 15:46:11 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `alunos`
-- ----------------------------
DROP TABLE IF EXISTS `alunos`;
CREATE TABLE `alunos` (
  `codigo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `matricula` varchar(255) DEFAULT NULL,
  `curso` varchar(255) DEFAULT NULL,
  `turno` varchar(255) DEFAULT NULL,
  `periodo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `alunos`
-- ----------------------------
BEGIN;
INSERT INTO `alunos` VALUES ('16', '123', '123', 'Inf', 'T', '2'), ('18', 'Fran', '117', 'Inf', 'M', '4'), ('19', '123', '133333', 'Ing', 'T', '2');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
