/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : petline

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-10-23 13:43:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `agenda`
-- ----------------------------
DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt_passeio` date NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fim` time DEFAULT NULL,
  `descricao` text,
  `ativo` char(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `dt_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_agenda` (`id`),
  KEY `fk_id_usuario` (`id_usuario`),
  CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of agenda
-- ----------------------------
INSERT INTO `agenda` VALUES ('1', '2018-10-23', '08:00:00', '08:30:00', null, '1', '3', '2018-10-22 14:54:21');
INSERT INTO `agenda` VALUES ('2', '2018-10-24', '09:10:00', '00:00:00', '', '0', '3', '2018-10-22 14:54:24');
INSERT INTO `agenda` VALUES ('4', '2018-10-26', '06:00:00', '12:00:00', 'Dias disponÃƒÂ­veis', '1', '3', '2018-10-22 14:54:29');
INSERT INTO `agenda` VALUES ('7', '2018-10-10', '06:00:00', '18:00:00', 'Estou disponível', '1', '3', '2018-10-22 15:06:08');

-- ----------------------------
-- Table structure for `conta`
-- ----------------------------
DROP TABLE IF EXISTS `conta`;
CREATE TABLE `conta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agencia` varchar(255) DEFAULT NULL,
  `tipo_conta` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `dt_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
  `dt_passeio` date NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fim` time DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `dt_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ativo` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pacote` (`id`),
  KEY `fk_id_usuario_2` (`id_usuario`),
  CONSTRAINT `fk_id_usuario_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pacote
-- ----------------------------
INSERT INTO `pacote` VALUES ('2', 'LINE_BASIC', '1', '2018-10-10', '07:18:00', '08:18:00', '2', '2018-10-19 18:56:26', '1');
INSERT INTO `pacote` VALUES ('3', 'LINE_BASIC', '1', '2018-12-12', '05:05:00', '05:05:00', '2', '2018-10-19 18:56:37', '1');
INSERT INTO `pacote` VALUES ('4', 'LINE_BASIC', '1', '2018-10-23', '10:00:00', '11:00:00', '2', '2018-10-22 21:04:25', '1');

-- ----------------------------
-- Table structure for `pesquisa`
-- ----------------------------
DROP TABLE IF EXISTS `pesquisa`;
CREATE TABLE `pesquisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(255) DEFAULT NULL,
  `nota` varchar(20) NOT NULL,
  `dt_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_pesquisa` (`id`)
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
  `dt_nascimento` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dt_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descricao` text,
  `id_usuario` int(11) DEFAULT NULL,
  `ativo` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pet` (`id`),
  KEY `fk_id_usuario_3` (`id_usuario`),
  CONSTRAINT `fk_id_usuario_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pet
-- ----------------------------
INSERT INTO `pet` VALUES ('1', 'Dick 2', 'Labrador 3', '15', 'Preto e branco', '2018-10-16 10:18:36', '2018-10-16 13:42:02', 'Ele é um cachorro e bonito', '1', '1');
INSERT INTO `pet` VALUES ('2', 'Dick Vigarista', 'Labrador', '50', 'Preto e branco', '2015-10-10 00:00:00', '2018-10-15 14:05:14', 'Ele é um cachorro', '1', '1');
INSERT INTO `pet` VALUES ('4', 'Nina', 'vira-lata', '12', 'preta', '2018-10-15 21:38:23', '2018-10-16 13:36:20', 'É uma cachorro linda', '2', '1');
INSERT INTO `pet` VALUES ('5', 'Nina', 'poodle', '15', 'preta', '2018-10-15 21:52:11', '2018-10-22 21:02:44', 'Cachorra', '2', '1');

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
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `dt_nascimento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descricao` text,
  `perfil` char(3) NOT NULL,
  `ativo` int(11) DEFAULT NULL,
  `dt_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `login` (`login`),
  KEY `idx_cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'Administrador', 'Petline', 'admin', '23d42f5f3f66498b2c8ff4c20b8c5ac826e47146', 'administrador@petline.com', '(00) 00000-0', '00000000', '000000000', 'DF', '72745-011', 'Brasília', 'Quadra 45 Conjunto K', 'Vila São José (Brazlândia)', '2018-10-09 13:13:50', '', 'adm', '1', '2018-09-13 20:31:02');
INSERT INTO `usuario` VALUES ('2', 'Cliente', 'Petline', 'cliente', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'cliente@petline.com', '(61) 99356-4879', '19.878.131-6', '635.460.591-23', 'MG', '30510-410', 'Belo Horizonte', 'Rua Azaléia', 'Nova Gameleira', '2018-10-16 10:23:07', '', 'cli', '1', '2018-10-18 11:30:04');
INSERT INTO `usuario` VALUES ('3', 'Passeador', 'Petline', 'passeador', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'passeador@passeador.com', '(61) 93265-9898', '16.589.876', '171.418.723-37', 'RJ', '23575-385', 'Rio de Janeiro', 'Travessa Dom Diniz', 'Santa Cruz', '2018-10-09 00:00:00', '', 'pas', '1', '2018-10-18 11:29:24');
INSERT INTO `usuario` VALUES ('4', 'Rafael', 'Souza', 'rafael', 'cbf2510a5f9f7eece23428da7125c06115839e2b', 'rafael@gmail.com', '(65) 49846-5168', '21.498.465-1', '726.491.981-17', 'GO', '72855-239', 'Luziânia', 'Quadra 239', 'Parque Industrial Mingone', '2018-10-04 00:00:00', '', 'cli', '1', '2018-09-20 13:56:57');
INSERT INTO `usuario` VALUES ('5', 'Rafael', 'Rodrigues', 'rafael1', '1f49d78abdcbe13fcf991ec4a4ee60fcdf8b7f4b', 'rafael2@gmail.com', '(44) 44444-4444', '65.198.465-1', '426.187.374-58', 'DF', '72738-000', 'Brasília', 'Quadra 38', 'Vila São José (Brazlândia)', '2018-10-11 13:08:58', 'Onde quer que você esteja, você sempre estará lá!!!!!', 'pas', '1', '2018-09-20 13:59:05');
INSERT INTO `usuario` VALUES ('6', 'Evaldo', 'Junior', 'evaldo', '3e2fc5e632b74c065a9a5efa054acacd7b14475c', 'evaldo@gmail.com', '(61) 32132-1321', '11.111.284-8', '000.000.000-00', 'DF', '72745-011', 'Brasília', 'Quadra 45 Conjunto K', 'Vila São José (Brazlândia)', '2018-10-09 20:13:44', 'Sou passeador e gosto de passear com cães', 'pas', '1', '2018-09-20 19:25:32');
INSERT INTO `usuario` VALUES ('7', 'teste', 'teste', 'anderson1', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'email@email.com', '(65) 64684-8684', '16.546.848-6', '057.799.111-69', 'DF', '72745-011', 'Brasília', 'Quadra 45 Conjunto K', 'Vila São José (Brazlândia)', '2011-10-10 00:00:00', '', 'cli', '1', '2018-10-11 20:02:55');
