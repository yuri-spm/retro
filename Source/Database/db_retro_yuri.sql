-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para db_retro
CREATE DATABASE IF NOT EXISTS `db_retro` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_retro`;

-- Copiando estrutura para tabela db_retro.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `clie_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  PRIMARY KEY (`clie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_retro.cliente: ~2 rows (aproximadamente)
DELETE FROM `cliente`;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`clie_id`, `nome`, `email`, `cpf`) VALUES
	(1, 'yuri do monte', 'yuri.spm@gmail.com', '854984125698'),
	(2, 'Robson', 'curso@upinside.com.br', '34892493349');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando estrutura para tabela db_retro.clie_endereco
CREATE TABLE IF NOT EXISTS `clie_endereco` (
  `endereco_id` int(11) NOT NULL AUTO_INCREMENT,
  `clie_id` int(11) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `cep` varchar(30) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  PRIMARY KEY (`endereco_id`),
  KEY `fk_clie_id` (`clie_id`),
  CONSTRAINT `fk_clie_id` FOREIGN KEY (`clie_id`) REFERENCES `cliente` (`clie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_retro.clie_endereco: ~1 rows (aproximadamente)
DELETE FROM `clie_endereco`;
/*!40000 ALTER TABLE `clie_endereco` DISABLE KEYS */;
INSERT INTO `clie_endereco` (`endereco_id`, `clie_id`, `rua`, `complemento`, `bairro`, `cidade`, `cep`, `referencia`) VALUES
	(1, 1, 'endereco', 'complemento', 'bairro', 'cidade', 'cep', 'ponto referencia');
/*!40000 ALTER TABLE `clie_endereco` ENABLE KEYS */;

-- Copiando estrutura para tabela db_retro.clie_telefone
CREATE TABLE IF NOT EXISTS `clie_telefone` (
  `telefone_id` int(11) NOT NULL AUTO_INCREMENT,
  `clie_id` int(11) NOT NULL,
  `tel_01` varchar(30) NOT NULL,
  PRIMARY KEY (`telefone_id`),
  KEY `fk_telefone_clie_id` (`clie_id`),
  CONSTRAINT `fk_telefone_clie_id` FOREIGN KEY (`clie_id`) REFERENCES `cliente` (`clie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_retro.clie_telefone: ~1 rows (aproximadamente)
DELETE FROM `clie_telefone`;
/*!40000 ALTER TABLE `clie_telefone` DISABLE KEYS */;
INSERT INTO `clie_telefone` (`telefone_id`, `clie_id`, `tel_01`) VALUES
	(1, 1, '234234234');
/*!40000 ALTER TABLE `clie_telefone` ENABLE KEYS */;

-- Copiando estrutura para tabela db_retro.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `func_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  PRIMARY KEY (`func_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_retro.funcionario: ~2 rows (aproximadamente)
DELETE FROM `funcionario`;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` (`func_id`, `nome`, `email`, `cpf`) VALUES
	(1, 'Junior do Carlos', 'junior.carlos@gmail.com.br', '15698571865'),
	(2, 'Junior do Carlos', 'junior.carlos@gmail.com.br', '15698571865');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

-- Copiando estrutura para tabela db_retro.func_endereco
CREATE TABLE IF NOT EXISTS `func_endereco` (
  `endereco_id` int(11) NOT NULL AUTO_INCREMENT,
  `func_id` int(11) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `cep` varchar(30) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  PRIMARY KEY (`endereco_id`),
  KEY `fk_endereco_func_id` (`func_id`),
  CONSTRAINT `fk_endereco_func_id` FOREIGN KEY (`func_id`) REFERENCES `funcionario` (`func_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_retro.func_endereco: ~2 rows (aproximadamente)
DELETE FROM `func_endereco`;
/*!40000 ALTER TABLE `func_endereco` DISABLE KEYS */;
INSERT INTO `func_endereco` (`endereco_id`, `func_id`, `rua`, `complemento`, `bairro`, `cidade`, `cep`, `referencia`) VALUES
	(1, 1, 'Rua Augusto Braga', 'casa', 'Madureira', 'Rio de Janeiro', '21258782', 'Perto do Posto Shell'),
	(2, 2, 'Rua Augusto Braga', 'casa', 'Madureira', 'Rio de Janeiro', '21258782', 'Perto do Posto Shell');
/*!40000 ALTER TABLE `func_endereco` ENABLE KEYS */;

-- Copiando estrutura para tabela db_retro.func_telefone
CREATE TABLE IF NOT EXISTS `func_telefone` (
  `telefone_id` int(11) NOT NULL,
  `func_id` int(11) NOT NULL,
  `tel_01` varchar(30) NOT NULL,
  KEY `fk_telefone_func_id` (`func_id`),
  CONSTRAINT `fk_telefone_func_id` FOREIGN KEY (`func_id`) REFERENCES `funcionario` (`func_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_retro.func_telefone: ~2 rows (aproximadamente)
DELETE FROM `func_telefone`;
/*!40000 ALTER TABLE `func_telefone` DISABLE KEYS */;
INSERT INTO `func_telefone` (`telefone_id`, `func_id`, `tel_01`) VALUES
	(1, 1, '021952695489'),
	(2, 2, '021952695489');
/*!40000 ALTER TABLE `func_telefone` ENABLE KEYS */;

-- Copiando estrutura para tabela db_retro.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `pedido_id` int(11) NOT NULL AUTO_INCREMENT,
  `clie_id` int(11) NOT NULL,
  `func_id` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `total` int(11) NOT NULL,
  `desconto` varchar(100) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `produto1_id` int(11) NOT NULL,
  `produto2_id` int(11) DEFAULT NULL,
  `produto3_id` int(11) DEFAULT NULL,
  `observacao` varchar(255) NOT NULL,
  PRIMARY KEY (`pedido_id`),
  KEY `fk_pedido_produto1` (`produto1_id`),
  KEY `fk_pedido_produto2` (`produto2_id`),
  KEY `fk_pedido_produto3` (`produto3_id`),
  CONSTRAINT `fk_pedido_produto1` FOREIGN KEY (`produto1_id`) REFERENCES `produto` (`produto_id`),
  CONSTRAINT `fk_pedido_produto2` FOREIGN KEY (`produto2_id`) REFERENCES `produto` (`produto_id`),
  CONSTRAINT `fk_pedido_produto3` FOREIGN KEY (`produto3_id`) REFERENCES `produto` (`produto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_retro.pedido: ~0 rows (aproximadamente)
DELETE FROM `pedido`;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;

-- Copiando estrutura para tabela db_retro.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `produto_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `valor` varchar(30) NOT NULL,
  PRIMARY KEY (`produto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_retro.produto: ~17 rows (aproximadamente)
DELETE FROM `produto`;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`produto_id`, `nome`, `valor`) VALUES
	(1, 'Picanha avec farofa', '60,00'),
	(2, 'Jarret rôti avec tutú aux haricots', '55,00'),
	(3, 'Poulet strogonoff', '20,00'),
	(4, 'Rouget en tranches avec bouillie de poisson', '40,00'),
	(5, 'Poulet rôti', '18,00'),
	(6, 'Riz et haricots', '7,00'),
	(7, 'Pain chaud', '5,00'),
	(8, 'Toast Petrópolis au parmesan', '6,50'),
	(9, 'Pain avec saucisse', '10,00'),
	(10, 'Pain aux oeufs', '7,00'),
	(11, 'Gâteau à la semoule de maïs à la noix de coco', '5,00'),
	(12, 'Poulet à la farine de manioc', '20,00'),
	(13, 'Presunto de parma caneloni e mussarela búfala', '69,00'),
	(14, 'Lasagnes normales du dimanche', '25,00'),
	(15, 'Crêpe fou', '13,00'),
	(16, 'Burger Cury', '18,00'),
	(17, 'Gros Pourri', '15,00');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
