-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for swift
CREATE DATABASE IF NOT EXISTS `swift` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `swift`;

-- Dumping structure for table swift.cartao
CREATE TABLE IF NOT EXISTS `cartao` (
  `IDcartao` int(11) NOT NULL AUTO_INCREMENT,
  `pin` char(4) NOT NULL,
  `data_validade` date NOT NULL,
  `cvv` char(3) NOT NULL,
  `num_cartao` varchar(16) NOT NULL DEFAULT '0',
  `IDconta` int(11) NOT NULL,
  PRIMARY KEY (`IDcartao`),
  UNIQUE KEY `num_cartao` (`num_cartao`),
  KEY `IDconta` (`IDconta`),
  CONSTRAINT `cartao_ibfk_1` FOREIGN KEY (`IDconta`) REFERENCES `conta` (`IDconta`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table swift.cartao: ~6 rows (approximately)
INSERT INTO `cartao` (`IDcartao`, `pin`, `data_validade`, `cvv`, `num_cartao`, `IDconta`) VALUES
	(13, '8235', '2026-11-01', '235', '7151162878799770', 47),
	(14, '2206', '2026-07-01', '188', '6427583462262100', 48),
	(15, '4606', '2026-05-01', '759', '8045774252013816', 49),
	(16, '2248', '2026-02-01', '436', '8813451416308804', 50),
	(17, '2470', '2026-08-01', '018', '9453216928252464', 51),
	(18, '8486', '2026-04-01', '202', '8218193340812823', 47),
	(19, '4648', '2026-04-01', '106', '5937785425003740', 50),
	(20, '8888', '2026-12-01', '431', '9716570547767190', 52),
	(21, '6053', '2026-01-01', '990', '9391068353199131', 53),
	(22, '4939', '2026-09-01', '919', '5462947633953810', 54),
	(23, '6070', '2026-02-01', '722', '3643069150399745', 55),
	(24, '6256', '2026-07-01', '854', '5410489823515953', 56);

-- Dumping structure for table swift.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `IDcliente` int(11) NOT NULL AUTO_INCREMENT,
  `primeiro` varchar(50) NOT NULL,
  `apelido` varchar(50) NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefone` char(9) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nif` char(9) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `codigo_postal` char(8) DEFAULT NULL,
  `localidade` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `palavra_passe` varchar(120) NOT NULL,
  `genero` enum('Masculino','Feminino','Não Indicado') NOT NULL DEFAULT 'Não Indicado',
  PRIMARY KEY (`IDcliente`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table swift.cliente: ~5 rows (approximately)
INSERT INTO `cliente` (`IDcliente`, `primeiro`, `apelido`, `data_nascimento`, `telefone`, `email`, `nif`, `endereco`, `codigo_postal`, `localidade`, `pais`, `palavra_passe`, `genero`) VALUES
	(61, 'Valentim', 'Oryshchuk', '2004-09-24', '911180027', 'valentim@swift.com', '000000000', 'Rua Emilia Silva Carvalho N2 2ESQUERDA', '2410-101', 'Leiria', 'Portugal', '$2y$10$dmDPNdV9CuT9j83OV.nmwOaIkQv.tU9yZDziW7bEFTBZwuadmRINi', 'Masculino'),
	(62, 'Francisco', 'Assis', '2005-07-07', '911111111', 'francisco@swift.com', '111111111', 'Rua Emilia Silva Carvalho N2 2ESQUERDA', '2410-101', 'Leiria', 'Portugal', '$2y$10$UIR0i2aCje4JiajE22//jusg0Fv/WAd.J1D9aMNYFkvFD0BdxSBhi', 'Masculino'),
	(63, 'Rúben', 'Teixiera', '2005-07-07', '922222222', 'ruben@swift.com', '222222222', 'Rua Emilia Silva Carvalho N2 2ESQUERDA', '2410-101', 'Leiria', 'Portugal', '$2y$10$7yHMkLtmOAnn.u1d2wKa.OpTndXG0rUu0gbP00qVZsSDU8plWwXki', 'Masculino'),
	(64, 'Rafael', 'Ligeiro', '2005-07-07', '933333333', 'rafael@swift.com', '333333333', 'Rua Emilia Silva Carvalho N2 2ESQUERDA', '2410-101', 'Leiria', 'Portugal', '$2y$10$2cVRV6wIMP8v0.XRqrq6e.c/fUfg7oQUOnsDu7QW.eFr2UVFOFQ3K', 'Masculino'),
	(65, 'Alexandre', 'Marcelino', '2005-07-07', '944444444', 'alexandre@swift.com', '444444444', 'Rua Emilia Silva Carvalho N2 2ESQUERDA', '2410-101', 'Leiria', 'Portugal', '$2y$10$vF1uBH0V.F7c/ufxCT/QeuQTKed3lXN/865GzGX9iSaTbPRRgNHDO', 'Masculino'),
	(66, 'Filipe', 'Carvalho', '2005-07-07', '955555555', 'filipe@swift.com', '555555555', 'Rua Emilia Silva Carvalho N2 2ESQUERDA', '2410-101', 'Leiria', 'Portugal', '', 'Não Indicado'),
	(67, 'Ernesto', 'Doris', '2005-07-07', '966666666', 'ernesto@swift.com', '666666666', 'Rua Emilia Silva Carvalho N2 2ESQUERDA', '2410-101', 'Leiria', 'Portugal', '', 'Feminino'),
	(68, 'Rita', 'Elinha', '2005-07-07', '977777777', 'rita@swift.com', '777777777', 'Rua Emilia Silva Carvalho N2 2ESQUERDA', '2410-101', 'Leiria', 'Portugal', '', 'Feminino'),
	(69, 'Diogo', 'Cabelinho', '2005-07-07', '988888888', 'diogo@swift.com', '888888888', 'Rua Emilia Silva Carvalho N2 2ESQUERDA', '2410-101', 'Leiria', 'Portugal', '', 'Masculino'),
	(70, 'Paulo', 'Caranguejo', '2005-07-07', '999999999', 'paulo@swift.com', '999999999', 'Rua Emilia Silva Carvalho N2 2ESQUERDA', '2410-101', 'Leiria', 'Portugal', '', 'Masculino');

-- Dumping structure for table swift.conta
CREATE TABLE IF NOT EXISTS `conta` (
  `IDconta` int(11) NOT NULL AUTO_INCREMENT,
  `plano` enum('Standard','Plus','Premium') NOT NULL DEFAULT 'Standard',
  `saldo` decimal(20,6) DEFAULT NULL,
  `iban` char(34) NOT NULL,
  `nib` char(21) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'https://i.imgur.com/TX7ArYv.png',
  `IDcliente` int(11) NOT NULL,
  PRIMARY KEY (`IDconta`),
  UNIQUE KEY `iban` (`iban`),
  UNIQUE KEY `nib` (`nib`),
  KEY `IDcliente` (`IDcliente`),
  CONSTRAINT `conta_ibfk_1` FOREIGN KEY (`IDcliente`) REFERENCES `cliente` (`IDcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table swift.conta: ~5 rows (approximately)
INSERT INTO `conta` (`IDconta`, `plano`, `saldo`, `iban`, `nib`, `foto`, `IDcliente`) VALUES
	(47, 'Premium', 1871.010000, 'PT11000799662529881740', '00079966413353917117', 'https://i.imgur.com/TX7ArYv.png', 61),
	(48, 'Plus', 24112.010000, 'PT23000799668654690929', '00079966461085680676', 'https://i.imgur.com/TX7ArYv.png', 62),
	(49, 'Standard', 0.000000, 'PT51000799666475472323', '00079966559011498771', 'https://i.imgur.com/TX7ArYv.png', 63),
	(50, 'Premium', 93492.010000, 'PT28000799664680523239', '00079966306211529380', 'https://i.imgur.com/TX7ArYv.png', 64),
	(51, 'Standard', 0.000000, 'PT38000799661846900956', '00079966425436655763', 'https://i.imgur.com/TX7ArYv.png', 65),
	(52, 'Standard', 0.000000, 'PT86000799663726357154', '00079966233468845453', 'https://i.imgur.com/TX7ArYv.png', 66),
	(53, 'Standard', 0.000000, 'PT97000799663289277866', '00079966710964378764', 'https://i.imgur.com/TX7ArYv.png', 67),
	(54, 'Standard', 0.000000, 'PT77000799668654499740', '00079966271741349244', 'https://i.imgur.com/TX7ArYv.png', 68),
	(55, 'Standard', 0.000000, 'PT22000799662686731706', '00079966293788123824', 'https://i.imgur.com/TX7ArYv.png', 69),
	(56, 'Standard', 0.000000, 'PT04000799665187673718', '00079966863733915925', 'https://i.imgur.com/TX7ArYv.png', 70);

-- Dumping structure for table swift.contacrypto
CREATE TABLE IF NOT EXISTS `contacrypto` (
  `IDcrypto` int(11) NOT NULL AUTO_INCREMENT,
  `saldo` decimal(20,6) DEFAULT NULL,
  `IDconta` int(11) NOT NULL,
  PRIMARY KEY (`IDcrypto`),
  KEY `IDconta` (`IDconta`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table swift.contacrypto: ~3 rows (approximately)
INSERT INTO `contacrypto` (`IDcrypto`, `saldo`, `IDconta`) VALUES
	(6, 384460.000000, 47),
	(7, 27000.000000, 48),
	(8, 172563.000000, 50);

-- Dumping structure for table swift.criptomoeda
CREATE TABLE IF NOT EXISTS `criptomoeda` (
  `IDmoeda` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `simbolo` varchar(50) DEFAULT NULL,
  `valor` decimal(20,6) NOT NULL,
  PRIMARY KEY (`IDmoeda`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table swift.criptomoeda: ~4 rows (approximately)
INSERT INTO `criptomoeda` (`IDmoeda`, `nome`, `simbolo`, `valor`) VALUES
	(8, 'Bitcoin', NULL, 23000.000000),
	(9, 'Ethereum', NULL, 1600.000000),
	(10, 'Solana', NULL, 20.000000),
	(11, 'Cardano', NULL, 18.000000);

-- Dumping structure for view swift.detalhes_cartao
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `detalhes_cartao` (
	`Plano` ENUM('Standard','Plus','Premium') NOT NULL COLLATE 'utf8mb4_general_ci',
	`Saldo à Ordem` DECIMAL(20,6) NULL,
	`Data de Validade do cartão` DATE NOT NULL,
	`Primeiro Nome` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Apelido` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Saldo Poupança` DECIMAL(20,6) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for table swift.funcionarios
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `IDfuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` enum('Administrador','Gerente','Funcionario') NOT NULL DEFAULT 'Funcionario',
  `IDcliente` int(11) NOT NULL,
  PRIMARY KEY (`IDfuncionario`),
  KEY `IDcliente` (`IDcliente`),
  CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`IDcliente`) REFERENCES `cliente` (`IDcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table swift.funcionarios: ~3 rows (approximately)
INSERT INTO `funcionarios` (`IDfuncionario`, `cargo`, `IDcliente`) VALUES
	(6, 'Administrador', 61),
	(7, 'Funcionario', 65),
	(8, 'Gerente', 64);

-- Dumping structure for table swift.mensagem
CREATE TABLE IF NOT EXISTS `mensagem` (
  `IDmensagem` int(11) NOT NULL AUTO_INCREMENT,
  `texto` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `IDcliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDmensagem`),
  KEY `IDcliente` (`IDcliente`),
  CONSTRAINT `mensagem_ibfk_1` FOREIGN KEY (`IDcliente`) REFERENCES `cliente` (`IDcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table swift.mensagem: ~5 rows (approximately)
INSERT INTO `mensagem` (`IDmensagem`, `texto`, `email`, `nome`, `IDcliente`) VALUES
	(1, 'Esta mensagem é somente para testar a págine de "Contacte-nos", feedback 5*', 'valentim@swift.com', 'Valentim', 61),
	(2, 'Mensagem teste página, tenho uma dúvida ali, na parte 123', 'rafael@swift.com', 'Rafael', 64),
	(3, 'Mensagem teste página, tenho uma dúvida ali, na parte 123', 'alexandre@swift.com', 'Alexandre', 65),
	(4, 'Queria saber se seria possível, obter uma plano especial?', 'ruben@swift.com', 'Rúben', 63),
	(5, 'Neste websiote tem uma funcionalidade de cashback?', 'francisco@swift.com', 'Francisco', 62);

-- Dumping structure for table swift.plano_poupanca
CREATE TABLE IF NOT EXISTS `plano_poupanca` (
  `IDpoupanca` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `poupado` decimal(20,6) NOT NULL DEFAULT 0.000000,
  `objetivo` decimal(20,6) NOT NULL DEFAULT 0.000000,
  `IDconta` int(11) NOT NULL,
  PRIMARY KEY (`IDpoupanca`),
  KEY `IDconta` (`IDconta`),
  CONSTRAINT `plano_poupanca_ibfk_1` FOREIGN KEY (`IDconta`) REFERENCES `conta` (`IDconta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table swift.plano_poupanca: ~3 rows (approximately)
INSERT INTO `plano_poupanca` (`IDpoupanca`, `titulo`, `descricao`, `poupado`, `objetivo`, `IDconta`) VALUES
	(2, 'Cofre', 'Cofre Poupança Swift', 252.000000, 100.000000, 47),
	(3, 'Cofre', 'Férias Maldivas', 655.000000, 4000.000000, 48),
	(4, 'Cofre', 'Carro Novo', 5164.000000, 36000.000000, 50);

-- Dumping structure for table swift.transacoes
CREATE TABLE IF NOT EXISTS `transacoes` (
  `IDtransacao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `data_transacao` datetime DEFAULT current_timestamp(),
  `valor` decimal(20,6) NOT NULL DEFAULT 0.000000,
  `remetente` varchar(100) NOT NULL,
  `recetor` varchar(100) NOT NULL,
  `IDconta` int(11) NOT NULL,
  PRIMARY KEY (`IDtransacao`),
  KEY `IDconta` (`IDconta`),
  CONSTRAINT `transacoes_ibfk_1` FOREIGN KEY (`IDconta`) REFERENCES `conta` (`IDconta`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table swift.transacoes: ~29 rows (approximately)
INSERT INTO `transacoes` (`IDtransacao`, `descricao`, `data_transacao`, `valor`, `remetente`, `recetor`, `IDconta`) VALUES
	(2, 'Dinheiro adicionado via Apple Pay', '2023-07-07 17:02:11', 1800.000000, 'Administração Swift', 'PT11000799662529881740', 47),
	(3, 'Subscrição plano Premium', '2023-07-07 17:02:22', 7.990000, 'PT11000799662529881740', 'Administração Swift', 47),
	(4, 'Para o Cofre', '2023-07-07 17:02:34', 200.000000, 'PT11000799662529881740', 'Cofre Swift', 47),
	(5, 'Para o Cofre', '2023-07-07 17:02:52', 82.000000, 'PT11000799662529881740', 'Cofre Swift', 47),
	(6, 'Do Cofre', '2023-07-07 17:02:57', 30.000000, 'Cofre Swift', 'PT11000799662529881740', 47),
	(7, 'Transferência de Valentim', '2023-07-07 17:03:20', 24.000000, 'PT11000799662529881740', 'PT23000799668654690929', 48),
	(8, 'Transferência para Francisco', '2023-07-07 17:03:20', 24.000000, 'PT11000799662529881740', 'PT23000799668654690929', 47),
	(9, 'Dinheiro adicionado via Apple Pay', '2023-07-07 17:15:52', 25389.000000, 'Administração Swift', 'PT23000799668654690929', 48),
	(10, 'Subscrição plano Plus', '2023-07-07 17:15:55', 2.990000, 'PT23000799668654690929', 'Administração Swift', 48),
	(11, 'Transferência de Francisco', '2023-07-07 17:16:28', 643.000000, 'PT23000799668654690929', 'PT28000799664680523239', 50),
	(12, 'Transferência para Rafael', '2023-07-07 17:16:28', 643.000000, 'PT23000799668654690929', 'PT28000799664680523239', 48),
	(13, 'Para o Cofre', '2023-07-07 17:16:55', 680.000000, 'PT23000799668654690929', 'Cofre Swift', 48),
	(14, 'Para o Cofre', '2023-07-07 17:18:47', 23.000000, 'PT23000799668654690929', 'Cofre Swift', 48),
	(15, 'Para o Cofre', '2023-07-07 17:18:52', 81.000000, 'PT23000799668654690929', 'Cofre Swift', 48),
	(16, 'Para o Cofre', '2023-07-07 17:18:55', 18.000000, 'PT23000799668654690929', 'Cofre Swift', 48),
	(17, 'Do Cofre', '2023-07-07 17:19:01', 147.000000, 'Cofre Swift', 'PT23000799668654690929', 48),
	(18, 'Dinheiro adicionado via Apple Pay', '2023-07-07 17:19:21', 98376.000000, 'Administração Swift', 'PT28000799664680523239', 50),
	(19, 'Subscrição plano Premium', '2023-07-07 17:19:25', 7.990000, 'PT28000799664680523239', 'Administração Swift', 50),
	(20, 'Transferência de Rafael', '2023-07-07 17:19:36', 355.000000, 'PT28000799664680523239', 'PT11000799662529881740', 47),
	(21, 'Transferência para Valentim', '2023-07-07 17:19:36', 355.000000, 'PT28000799664680523239', 'PT11000799662529881740', 50),
	(22, 'Para o Cofre', '2023-07-07 17:19:50', 2400.000000, 'PT28000799664680523239', 'Cofre Swift', 50),
	(23, 'Para o Cofre', '2023-07-07 17:20:06', 130.000000, 'PT28000799664680523239', 'Cofre Swift', 50),
	(24, 'Para o Cofre', '2023-07-07 17:20:09', 400.000000, 'PT28000799664680523239', 'Cofre Swift', 50),
	(25, 'Do Cofre', '2023-07-07 17:20:13', 200.000000, 'Cofre Swift', 'PT28000799664680523239', 50),
	(26, 'Para o Cofre', '2023-07-07 17:20:15', 745.000000, 'PT28000799664680523239', 'Cofre Swift', 50),
	(27, 'Do Cofre', '2023-07-07 17:20:17', 12.000000, 'Cofre Swift', 'PT28000799664680523239', 50),
	(28, 'Para o Cofre', '2023-07-07 17:20:21', 466.000000, 'PT28000799664680523239', 'Cofre Swift', 50),
	(29, 'Para o Cofre', '2023-07-07 17:20:24', 1298.000000, 'PT28000799664680523239', 'Cofre Swift', 50),
	(30, 'Do Cofre', '2023-07-07 17:20:30', 63.000000, 'Cofre Swift', 'PT28000799664680523239', 50);

-- Dumping structure for table swift.transacoes_crypto
CREATE TABLE IF NOT EXISTS `transacoes_crypto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` decimal(8,8) NOT NULL,
  `tipo_transacao` enum('Compra','Envio','Venda') NOT NULL,
  `data_transacao` date NOT NULL,
  `IDcrypto` int(11) DEFAULT NULL,
  `IDmoeda` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDcrypto` (`IDcrypto`),
  KEY `IDmoeda` (`IDmoeda`),
  CONSTRAINT `transacoes_crypto_ibfk_1` FOREIGN KEY (`IDcrypto`) REFERENCES `contacrypto` (`IDcrypto`),
  CONSTRAINT `transacoes_crypto_ibfk_2` FOREIGN KEY (`IDmoeda`) REFERENCES `criptomoeda` (`IDmoeda`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table swift.transacoes_crypto: ~12 rows (approximately)
INSERT INTO `transacoes_crypto` (`id`, `quantidade`, `tipo_transacao`, `data_transacao`, `IDcrypto`, `IDmoeda`) VALUES
	(6, 0.99999999, 'Compra', '2023-07-07', 6, 8),
	(7, 0.99999999, 'Compra', '2023-07-07', 6, 10),
	(8, 0.99999999, 'Compra', '2023-07-07', 6, 9),
	(9, 0.99999999, 'Venda', '2023-07-07', 6, 10),
	(10, 0.99999999, 'Compra', '2023-07-07', 7, 8),
	(11, 0.99999999, 'Compra', '2023-07-07', 7, 9),
	(12, 0.99999999, 'Venda', '2023-07-07', 7, 9),
	(13, 0.99999999, 'Compra', '2023-07-07', 8, 8),
	(14, 0.99999999, 'Compra', '2023-07-07', 8, 11),
	(15, 0.99999999, 'Compra', '2023-07-07', 8, 9),
	(16, 0.99999999, 'Venda', '2023-07-07', 8, 8),
	(17, 0.05300000, 'Venda', '2023-07-07', 8, 8);

-- Dumping structure for view swift.detalhes_cartao
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `detalhes_cartao`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `detalhes_cartao` AS select `conta`.`plano` AS `Plano`,`conta`.`saldo` AS `Saldo à Ordem`,`cartao`.`data_validade` AS `Data de Validade do cartão`,`cliente`.`primeiro` AS `Primeiro Nome`,`cliente`.`apelido` AS `Apelido`,`plano_poupanca`.`poupado` AS `Saldo Poupança` from (((`conta` join `cartao` on(`conta`.`IDconta` = `cartao`.`IDconta`)) join `cliente` on(`conta`.`IDcliente` = `cliente`.`IDcliente`)) join `plano_poupanca` on(`conta`.`IDconta` = `plano_poupanca`.`IDconta`)) ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
