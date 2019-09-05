/*
Navicat MySQL Data Transfer

Source Server         : CLUSTER
Source Server Version : 50538
Source Host           : 162.243.250.47:3306
Source Database       : prueba

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2019-09-05 01:35:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for empleado
-- ----------------------------
DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `idremoto` int(11) DEFAULT NULL,
  `edad` int(3) DEFAULT NULL,
  `salario` double(17,4) DEFAULT NULL,
  `idtiposalario` int(11) DEFAULT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of empleado
-- ----------------------------

-- ----------------------------
-- Table structure for tiposalario
-- ----------------------------
DROP TABLE IF EXISTS `tiposalario`;
CREATE TABLE `tiposalario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tiposalario
-- ----------------------------
INSERT INTO `tiposalario` VALUES ('1', 'Bajo');
INSERT INTO `tiposalario` VALUES ('2', 'Medio');
INSERT INTO `tiposalario` VALUES ('3', 'Alto');
