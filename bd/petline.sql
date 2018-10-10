/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : petline

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-09-18 22:44:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `agenda`
-- ----------------------------
DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dt_fim` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dt_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_agenda` (`id`),
  KEY `fk_id_usuario` (`id_usuario`),
  CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of agenda
-- ----------------------------

-- ----------------------------
-- Table structure for `conta`
-- ----------------------------
DROP TABLE IF EXISTS `conta`;
CREATE TABLE `conta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agencia` varchar(255) DEFAULT NULL,
  `tipo_conta` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `dt_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cartao` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_conta` (`id`),
  KEY `fk_id_usuario_4` (`id_usuario`),
  CONSTRAINT `fk_id_usuario_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of conta
-- ----------------------------

-- ----------------------------
-- Table structure for `pacote`
-- ----------------------------
DROP TABLE IF EXISTS `pacote`;
CREATE TABLE `pacote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `quantidade_passeio` int(11) NOT NULL,
  `dt_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dt_fim` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dt_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pacote` (`id`),
  KEY `fk_id_usuario_2` (`id_usuario`),
  CONSTRAINT `fk_id_usuario_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pacote
-- ----------------------------

-- ----------------------------
-- Table structure for `pesquisa`
-- ----------------------------
DROP TABLE IF EXISTS `pesquisa`;
CREATE TABLE `pesquisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(255) DEFAULT NULL,
  `nota` varchar(20) NOT NULL,
  `dt_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_pesquisa` (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pesquisa
-- ----------------------------

-- ----------------------------
-- Table structure for `pet`
-- ----------------------------
DROP TABLE IF EXISTS `pet`;
CREATE TABLE `pet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `raca` varchar(255) NOT NULL,
  `peso` varchar(25) NOT NULL,
  `cor` varchar(25) NOT NULL,
  `dt_nascimento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dt_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descricao` text,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pet` (`id`),
  KEY `fk_id_usuario_3` (`id_usuario`),
  CONSTRAINT `fk_id_usuario_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pet
-- ----------------------------

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `login` varchar(25) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `cpf` varchar(25) NOT NULL,
  `uf` char(2) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `dt_nascimento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dt_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo` int(11) DEFAULT NULL,
  `perfil` char(3) NOT NULL,
  `descricao` text,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `login` (`login`),
  KEY `idx_cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'Administrador', 'Petline', 'admin', '23d42f5f3f66498b2c8ff4c20b8c5ac826e47146', 'administrador@petline.com', '00000000', '00000000', '000000000', null, '', null, '2018-01-01 00:00:00', '2018-09-13 20:31:02', null, 'adm', null, '', '');
