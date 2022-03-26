-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.21-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para crednosso
CREATE DATABASE IF NOT EXISTS `crednosso` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `crednosso`;

-- Copiando estrutura para tabela crednosso.atms
CREATE TABLE IF NOT EXISTS `atms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_treasury` int(11) DEFAULT 0,
  `name` varchar(150) DEFAULT NULL,
  `shortened_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shortened_name` (`shortened_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.atms: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `atms` DISABLE KEYS */;
/*!40000 ALTER TABLE `atms` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.authorized_token
CREATE TABLE IF NOT EXISTS `authorized_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL DEFAULT '0',
  `datetime_access` datetime DEFAULT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.authorized_token: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `authorized_token` DISABLE KEYS */;
INSERT INTO `authorized_token` (`id`, `id_user`, `token`, `datetime_access`, `active`) VALUES
	(42, 1, '$2y$10$SaAvGaZB2g9v7/BczmthTuMrXjx/VIWz11RvH5OJPdPKwMI0bm51.', '2021-10-02 20:11:41', 'N'),
	(43, 1, '$2y$10$0kwQaUMnr1z/xVH6vGTVZ.0OXHTbFRIwdvEq3z01KMMjbuS.d2N3O', '2021-10-02 20:11:54', 'N'),
	(44, 1, '$2y$10$GyjBqZhaTdPgWh6r94xNo.auqhSWrdKEi0qrAlfFZy9Zf1NzEU8N.', '2021-10-02 23:51:06', 'N'),
	(45, 1, '$2y$10$GHN1nfXsmaQbmYGzkV9Guu5Y9.JiRTHWrRqQJwYe6G5D3a5nSEQTW', '2021-10-03 10:23:50', 'N'),
	(46, 1, '$2y$10$rgZhMDl2GerO8eki4ceS6.O/1r25pnUnvC3mRrXX0KKn.Cq9Z7AsG', '2021-10-03 10:27:30', 'N'),
	(47, 1, '$2y$10$sqyOr53q36erDT0k8SnY5.yz2WVEZxpDEM4SwOAKeqE4NEb2QCj2u', '2021-10-04 09:33:23', 'N'),
	(48, 1, '$2y$10$/oA5ILkWNBuiOwGxtAcxfek2Jxz/8mwZ7mCyizghEpkbJco9YlulG', '2021-10-04 19:45:20', 'N'),
	(49, 1, '$2y$10$XwxCiKwz7dIQBKCJ13ezPOPxKlGqq5Teue1KVXOEdQBf4NtT6Mu3y', '2021-10-06 11:58:50', 'N'),
	(50, 1, '$2y$10$hQgc5YUubOKCMpUzL9I.dudQaLrqqz0RzZAEgYAFTlboyY/e8FXXq', '2021-10-06 15:09:22', 'N'),
	(51, 1, '$2y$10$4HvyMvmMUnZaNQhra1fN7ujU4jPs.R9PifdkrUaPEfrWXRXYwa8QG', '2021-10-06 22:27:28', 'N'),
	(52, 1, '$2y$10$mJjcqqOBp9soyRECSIahhedUNcGfWOMLlliq3opWkQJ9BpBT.pYJS', '2021-10-11 22:43:21', 'N'),
	(53, 1, '$2y$10$4DBDZnOtOiu4L6lBiOH/Demz00Wr5nTfogjwLzLWroq2CVQEsv2u2', '2021-10-12 10:32:19', 'Y');
/*!40000 ALTER TABLE `authorized_token` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.input_type
CREATE TABLE IF NOT EXISTS `input_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.input_type: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `input_type` DISABLE KEYS */;
INSERT INTO `input_type` (`id`, `name`) VALUES
	(3, 'Abastecimento'),
	(1, 'Entrada'),
	(2, 'Saida');
/*!40000 ALTER TABLE `input_type` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.operation_type
CREATE TABLE IF NOT EXISTS `operation_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '0',
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.operation_type: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `operation_type` DISABLE KEYS */;
INSERT INTO `operation_type` (`id`, `name`, `active`) VALUES
	(1, 'Transferencia entre custodia', 'Y'),
	(2, 'Retirada loja', 'Y'),
	(3, 'Entre tesourarias', 'Y'),
	(4, 'Santander', 'Y'),
	(5, 'Seret BB', 'Y');
/*!40000 ALTER TABLE `operation_type` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.order_type
CREATE TABLE IF NOT EXISTS `order_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '0',
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.order_type: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `order_type` DISABLE KEYS */;
INSERT INTO `order_type` (`id`, `name`, `active`) VALUES
	(1, 'eventual', 'Y'),
	(2, 'folha', 'Y');
/*!40000 ALTER TABLE `order_type` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lote` varchar(100) DEFAULT NULL,
  `id_operation_type` int(11) NOT NULL DEFAULT 0,
  `id_origin` int(11) NOT NULL,
  `id_order_type` int(11) NOT NULL,
  `id_destiny` int(11) NOT NULL,
  `date_request` date NOT NULL,
  `qt_10` int(11) DEFAULT NULL,
  `qt_20` int(11) DEFAULT NULL,
  `qt_50` int(11) DEFAULT NULL,
  `qt_100` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `status` enum('open','closed') DEFAULT 'open',
  `value_total` float DEFAULT NULL,
  `confirmed_value` float DEFAULT NULL,
  `change_in_confirmation` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.requests: ~22 rows (aproximadamente)
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` (`id`, `lote`, `id_operation_type`, `id_origin`, `id_order_type`, `id_destiny`, `date_request`, `qt_10`, `qt_20`, `qt_50`, `qt_100`, `note`, `active`, `status`, `value_total`, `confirmed_value`, `change_in_confirmation`) VALUES
	(1, '00501523', 3, 5, 2, 15, '0000-00-00', 200, 200, 200, 200, 'TESTE editado', 'Y', 'closed', NULL, 36000, 'Y'),
	(2, '00501523', 2, 2, 1, 8, '0000-00-00', 100, 100, 100, 100, 'teste 2 ', 'Y', 'closed', NULL, NULL, 'Y'),
	(3, '01100118', 2, 13, 1, 8, '2021-10-04', 1000, 0, 500, 611, 'teste 3', 'Y', 'open', NULL, NULL, 'N'),
	(4, '1500823', 2, 15, 2, 8, '0000-00-00', 11, 1, 155, 12, 'sasaa', 'Y', 'open', NULL, NULL, 'N'),
	(5, '1500823', 3, 5, 2, 18, '0000-00-00', 10, 20, 30, 40, 'TESTE editado', 'N', 'open', NULL, NULL, 'N'),
	(6, '200623', 2, 2, 1, 6, '0000-00-00', 1, 1, 1, 1, 'aasasas', 'Y', 'open', NULL, NULL, 'N'),
	(7, '0020066', 2, 2, 1, 9, '2021-10-06', 2, 5, 3, 1, 'lote 0020066', 'Y', 'open', NULL, NULL, 'N'),
	(8, '200623', 3, 4, 1, 14, '0000-00-00', 2, 5, 3, 5, 'primeiro do lote', 'Y', 'open', NULL, NULL, 'N'),
	(9, '01100118', 3, 4, 1, 14, '2021-10-07', 2, 5, 3, 5, 'primeiro do lote', 'Y', 'open', NULL, NULL, 'N'),
	(10, '00401410', 3, 4, 1, 14, '2021-10-07', 2, 5, 3, 5, 'primeiro do lote', 'Y', 'open', NULL, NULL, 'N'),
	(11, '00401410', 3, 9, 1, 7, '2021-10-07', 54, 51, 18, 51, 'lote 2', 'Y', 'open', NULL, NULL, 'N'),
	(12, '00301012', 2, 3, 2, 10, '2021-10-07', 15, 51, 5155, 515, 'mais um teste lote', 'Y', 'open', NULL, NULL, 'N'),
	(13, '00901813', 2, 9, 1, 18, '2021-10-07', 15, 51, 511, 15155, 'lote 0', 'Y', 'open', NULL, NULL, 'N'),
	(14, '01100118', 3, 6, 1, 17, '2021-10-07', 23, 51, 115, 45, 'teste pra saci', 'Y', 'open', NULL, NULL, 'N'),
	(15, '01100118', 1, 6, 2, 12, '2021-10-07', 12, 216, 26, 15, '# chateado', 'Y', 'open', NULL, NULL, 'N'),
	(16, '00301616', 3, 3, 1, 16, '2021-10-07', 1, 151, 1551, 15, 'peiddo #', 'Y', 'open', NULL, NULL, 'N'),
	(17, '01200717', 2, 12, 1, 7, '2021-10-07', 4, 1, 1, 1221, '1', 'Y', 'open', NULL, NULL, 'N'),
	(18, '01100118', 3, 11, 1, 1, '2021-10-07', 100, 100, 100, 100, '#1', 'Y', 'open', NULL, 18000, 'N'),
	(19, '01100118', 3, 11, 1, 1, '2021-10-07', 51, 15, 1515, 1551, '#1', 'Y', 'open', NULL, NULL, 'N'),
	(20, '01100118', 1, 4, 1, 13, '2021-10-07', 45, 51152, 1, 565, 'epdiredo as', 'Y', 'open', NULL, NULL, 'N'),
	(21, '04604621', 2, 46, 1, 46, '2021-10-07', 100, 100, 100, 100, '', 'Y', 'open', NULL, NULL, 'N'),
	(22, '04604621', 1, 6, 1, 10, '2021-10-08', 121, 515, 211, 511, 'sasa', 'Y', 'open', 73160, 0, 'N');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.shipping_company
CREATE TABLE IF NOT EXISTS `shipping_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_shipping` int(11) DEFAULT NULL,
  `name_shipping` varchar(100) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_shipping` (`id_shipping`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.shipping_company: ~66 rows (aproximadamente)
/*!40000 ALTER TABLE `shipping_company` DISABLE KEYS */;
INSERT INTO `shipping_company` (`id`, `id_shipping`, `name_shipping`, `active`) VALUES
	(1, 1, 'MATEUS SUPERMERCADOS', 'Y'),
	(2, 2, 'PROSEGUR SAO LUIS', 'Y'),
	(3, 3, 'PROSEGUR MARABA', 'Y'),
	(4, 4, 'PROSEGUR BACABAL', 'Y'),
	(5, 5, 'PROFORT', 'Y'),
	(6, 6, 'PROSEGUR IMPERATRIZ', 'Y'),
	(7, 7, 'CEFOR BALSAS', 'Y'),
	(8, 8, 'CEFOR SAO LUIS', 'Y'),
	(9, 9, 'CEFOR IMPERATRIZ', 'Y'),
	(10, 10, 'PROSEGUR PARAUAPEBAS', 'Y'),
	(11, 11, 'CEFOR BACABAL', 'Y'),
	(12, 12, 'PROSEGUR TERESINA', 'Y'),
	(13, 13, 'PROSEGUR BELEM', 'Y'),
	(14, 14, 'PROSEGUR CASTANHAL', 'Y'),
	(15, 15, 'PROSEGUR FORTALEZA', 'Y'),
	(16, 16, 'PROSEGUR ALTAMIRA', 'Y'),
	(17, 17, 'BRD CAMINO TUCUMA', 'Y'),
	(18, 18, 'BRD CAMINO JACUNDA', 'Y'),
	(19, 19, 'BRD BACABAL', 'Y'),
	(20, 20, 'BRD MIX CAXIAS', 'Y'),
	(21, 21, 'BRD CHAPADINHA', 'Y'),
	(22, 22, 'BRD PEDREIRAS', 'Y'),
	(23, 23, 'BRD PARNAIBA', 'Y'),
	(24, 24, 'BRD CONCEICAO DO ARAGUAIA', 'Y'),
	(25, 25, 'PROSEGUR PARNAIBA', 'Y'),
	(26, 26, 'BRD NOVO SUPER COHATRAC', 'Y'),
	(27, 27, 'BRD BABAÇULANDIA', 'Y'),
	(28, 28, 'BRD MATEUS CODO', 'Y'),
	(29, 29, 'BRD CAMINO GRAJAU', 'Y'),
	(30, 30, 'BRD NOVA MARABA', 'Y'),
	(31, 31, 'BRD TAILANDIA', 'Y'),
	(32, 32, 'BRD COQUEIRO', 'Y'),
	(33, 33, 'BRD PINHEIRO', 'Y'),
	(34, 34, 'BRD ABAETETUBA', 'Y'),
	(35, 35, 'BRD MIX CASTANHAL', 'Y'),
	(36, 36, 'BRD SUPER CASTANHAL', 'Y'),
	(37, 37, 'BRD PRESIDENTE DUTRA', 'Y'),
	(38, 38, 'BRD BARCARENA', 'Y'),
	(39, 39, 'BRD CAPANEMA', 'Y'),
	(40, 40, 'BRD PARAUAPEBAS 28', 'Y'),
	(41, 41, 'BRD PARAUAPEBAS 254', 'Y'),
	(42, 42, 'BRD ALTAMIRA', 'Y'),
	(43, 43, 'BRD MARITUBA', 'Y'),
	(44, 44, 'BRD MAGUARI', 'Y'),
	(45, 45, 'BRD SUPER BELEM', 'Y'),
	(46, 46, 'BRD MARAMBAIA', 'Y'),
	(47, 47, 'BRD INFRAERO', 'Y'),
	(48, 48, 'BRD JARDELANDIA', 'Y'),
	(49, 49, 'BRD SUPER BELEM', 'N'),
	(50, 50, 'BRD SUPER MARABA', 'Y'),
	(51, 51, 'BRD MIX MARABA', 'Y'),
	(52, 52, 'BRD MIX CEASA', 'Y'),
	(53, 53, 'BRD BARRA DO CORDA', 'Y'),
	(54, 54, 'COHAMA - RECICLADORA', 'Y'),
	(55, 55, 'BRD REDENÇÃO', 'Y'),
	(56, 56, 'BRD BARREIRINHAS CAMINO', 'Y'),
	(57, 57, 'BRD BURITICUPU', 'Y'),
	(58, 58, 'BRD MIX TUCURUI', 'Y'),
	(59, 59, 'BRD TIANGUA', 'Y'),
	(60, 60, 'BRD MARIO COVAS', 'Y'),
	(61, 61, 'BRD MIX FLORIANO', 'Y'),
	(62, 62, 'BRD MIX SOBRAL', 'Y'),
	(63, 63, 'TESTE', 'N'),
	(64, 64, 'SUPER PIRIPIRI', 'Y'),
	(65, 65, 'MIX TERESINA', 'Y'),
	(66, 66, 'MIX TIMON', 'Y');
/*!40000 ALTER TABLE `shipping_company` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.treasury
CREATE TABLE IF NOT EXISTS `treasury` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_shipping` int(11) NOT NULL,
  `id_input_type` int(11) NOT NULL,
  `balance` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_shipping` (`id_shipping`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.treasury: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `treasury` DISABLE KEYS */;
INSERT INTO `treasury` (`id`, `id_shipping`, `id_input_type`, `balance`) VALUES
	(1, 1, 1, 100);
/*!40000 ALTER TABLE `treasury` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nivel` enum('admin','user') NOT NULL DEFAULT 'user',
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `nivel`, `active`) VALUES
	(1, 'Tarcisio Silva', 'tarcisio.silva@crednosso.com.br', 'TARCISIOSILVA', '$2y$10$YW7P6YfkEzFg0asoolofV.J.CvvKl.jGVZyYpiZmrz0Ff/iM3JzNi', 'admin', 'Y');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;