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
  `id_atm` int(11) NOT NULL,
  `id_treasury` int(11) NOT NULL DEFAULT 0,
  `name_atm` varchar(150) NOT NULL,
  `shortened_name_atm` varchar(100) NOT NULL,
  `cass_A` int(11) DEFAULT 10,
  `cass_B` int(11) DEFAULT 20,
  `cass_C` int(11) DEFAULT 50,
  `cass_D` int(11) DEFAULT 100,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `shortened_name` (`shortened_name_atm`) USING BTREE,
  UNIQUE KEY `id_atm` (`id_atm`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.atms: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `atms` DISABLE KEYS */;
INSERT INTO `atms` (`id`, `id_atm`, `id_treasury`, `name_atm`, `shortened_name_atm`, `cass_A`, `cass_B`, `cass_C`, `cass_D`, `status`) VALUES
	(1, 1, 2, 'SUPER COHAMA 01', 'SUP COHAMA 01', 10, 20, 50, 100, 'Y');
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

-- Copiando estrutura para tabela crednosso.batchs
CREATE TABLE IF NOT EXISTS `batchs` (
  `id` int(11) NOT NULL,
  `batch` varchar(100) DEFAULT NULL,
  `status` set('open','paused','closed') DEFAULT 'open',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.batchs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `batchs` DISABLE KEYS */;
/*!40000 ALTER TABLE `batchs` ENABLE KEYS */;

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
  `id_batch` int(11) DEFAULT NULL,
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
  `value_total` float DEFAULT 0,
  `confirmed_value` float DEFAULT 0,
  `change_in_confirmation` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.requests: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.shipping_company
CREATE TABLE IF NOT EXISTS `shipping_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_shipping` int(11) DEFAULT NULL,
  `name_shipping` varchar(100) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_shipping` (`id_shipping`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.shipping_company: ~74 rows (aproximadamente)
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
	(66, 66, 'MIX TIMON', 'Y'),
	(68, 67, 'PRESERV - RECIFE', 'Y'),
	(69, 68, 'MIX BRAGANCA', 'Y'),
	(71, 69, 'SUPER CANAA DOS CARAJAS', 'Y'),
	(72, 70, 'SUPER ESTREITO', 'Y'),
	(73, 71, 'MIX PARAGOMINAS', 'Y'),
	(74, 72, 'MIX TIMON ALVORADA', 'Y'),
	(75, 73, 'MIX JUAZEIRO', 'Y'),
	(76, 74, 'MIX PETROLINA', 'Y'),
	(77, 75, 'PROSEGUR FEIRA DE SANTANA', 'Y'),
	(78, 76, 'MIX BENGUI', 'Y'),
	(79, 77, 'TEXEIRA DE FREITAS', 'Y'),
	(80, 78, 'MIX ITAPIPOCA', 'Y');
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

-- Copiando dados para a tabela crednosso.treasury: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `treasury` DISABLE KEYS */;
INSERT INTO `treasury` (`id`, `id_shipping`, `id_input_type`, `balance`) VALUES
	(1, 1, 1, 0);
/*!40000 ALTER TABLE `treasury` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nivel` enum('admin','user') NOT NULL DEFAULT 'user',
  `token` varchar(253) DEFAULT NULL,
  `date_login` date DEFAULT NULL,
  `change_date` datetime DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.users: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `nivel`, `token`, `date_login`, `change_date`, `active`) VALUES
	(1, 'Tarcisio Silva', 'TARCISIOSILVA', 'tarcisio.silva@crednosso.com.br', '$2y$10$YW7P6YfkEzFg0asoolofV.J.CvvKl.jGVZyYpiZmrz0Ff/iM3JzNi', 'admin', '$2y$10$bnGglRN8Qmwf9DuUFAU94uJgUegLHa2enibHQHYAhGRxKALzQnkZW', NULL, NULL, 'Y'),
	(2, 'Dillan Andrew', 'DILLANSOUSA', 'dillan.sousa@crednosso.com.br', '$2y$10$s4196SsNI.4nNFNtfop3c.gItB3.lffP/gsGfUH24s/NlY4O886TC', 'user', NULL, NULL, NULL, 'Y'),
	(6, 'teste teste', 'TESTETESTE', 'teste@teste.com', '$2y$10$7AP.N2zJndZy2PuV0Do16exjsQVxPADqPrj2bVttSvGShMaUjXnqK', 'user', NULL, NULL, NULL, 'N');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
