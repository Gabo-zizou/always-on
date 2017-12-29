/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : always_on

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-28 21:10:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cuenta
-- ----------------------------
DROP TABLE IF EXISTS `cuenta`;
CREATE TABLE `cuenta` (
  `id_cuenta` int(15) NOT NULL AUTO_INCREMENT,
  `saldo` int(15) DEFAULT NULL,
  `id_cliente` int(15) DEFAULT NULL,
  `fecha_movimiento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_tipo_cuenta` int(15) DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cuenta
-- ----------------------------
INSERT INTO `cuenta` VALUES ('1', '750', '1', '2017-12-28 21:09:32', '1');
INSERT INTO `cuenta` VALUES ('2', '300', '2', '2017-12-28 21:09:32', '2');

-- ----------------------------
-- Table structure for movimiento
-- ----------------------------
DROP TABLE IF EXISTS `movimiento`;
CREATE TABLE `movimiento` (
  `id_movimiento` int(15) NOT NULL AUTO_INCREMENT,
  `movimiento` varchar(30) DEFAULT NULL,
  `estado` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`id_movimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of movimiento
-- ----------------------------
INSERT INTO `movimiento` VALUES ('1', 'Transferencia', '1');
INSERT INTO `movimiento` VALUES ('2', 'Giro', '1');
INSERT INTO `movimiento` VALUES ('3', 'Deposito', '0');

-- ----------------------------
-- Table structure for personas
-- ----------------------------
DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
  `id_persona` int(15) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `estado` enum('1','0') DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `clave` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of personas
-- ----------------------------
INSERT INTO `personas` VALUES ('1', 'gabriel', 'moya', 'email@email.cl', '', '2017-12-28 20:59:51', '81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `personas` VALUES ('2', 'Larry', 'Moya', 'ee@ee.cl', '', '2017-12-28 21:08:43', '81dc9bdb52d04dc20036dbd8313ed055');

-- ----------------------------
-- Table structure for tipo_cuenta
-- ----------------------------
DROP TABLE IF EXISTS `tipo_cuenta`;
CREATE TABLE `tipo_cuenta` (
  `id_tipo` int(15) NOT NULL AUTO_INCREMENT,
  `cuenta` varchar(50) DEFAULT NULL,
  `estado` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_cuenta
-- ----------------------------
INSERT INTO `tipo_cuenta` VALUES ('1', 'Cuenta Vista', '1');
INSERT INTO `tipo_cuenta` VALUES ('2', 'Cuenta Corriente', '1');

-- ----------------------------
-- Table structure for transferencias
-- ----------------------------
DROP TABLE IF EXISTS `transferencias`;
CREATE TABLE `transferencias` (
  `id_transferencia` int(15) NOT NULL AUTO_INCREMENT,
  `monto_movimiento` int(15) DEFAULT NULL,
  `fecha_movimiento` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_movimiento` int(15) DEFAULT NULL,
  `id_persona_emisora` int(15) DEFAULT NULL,
  `id_persona_receptora` int(15) DEFAULT NULL,
  PRIMARY KEY (`id_transferencia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transferencias
-- ----------------------------
INSERT INTO `transferencias` VALUES ('1', '250', '2017-12-28 21:09:32', '1', '1', '2');
