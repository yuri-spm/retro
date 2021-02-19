-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 14/08/2020 às 14:47
-- Versão do servidor: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- Versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_retro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `clie_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`clie_id`, `nome`, `email`, `cpf`) VALUES
(1, 'yuri do monte', 'yuri.spm@gmail.com', '854984125698');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clie_endereco`
--

CREATE TABLE `clie_endereco` (
  `endereco_id` int(11) NOT NULL,
  `clie_id` int(11) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `cep` varchar(30) NOT NULL,
  `referencia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `clie_endereco`
--

INSERT INTO `clie_endereco` (`endereco_id`, `clie_id`, `rua`, `complemento`, `bairro`, `cidade`, `cep`, `referencia`) VALUES
(1, 1, 'endereco', 'complemento', 'bairro', 'cidade', 'cep', 'ponto referencia');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clie_telefone`
--

CREATE TABLE `clie_telefone` (
  `telefone_id` int(11) NOT NULL,
  `clie_id` int(11) NOT NULL,
  `tel_01` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `clie_telefone`
--

INSERT INTO `clie_telefone` (`telefone_id`, `clie_id`, `tel_01`) VALUES
(1, 1, '234234234');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `func_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`func_id`, `nome`, `email`, `cpf`) VALUES
(1, 'Junior do Carlos', 'junior.carlos@gmail.com.br', '15698571865'),
(2, 'Junior do Carlos', 'junior.carlos@gmail.com.br', '15698571865');

-- --------------------------------------------------------

--
-- Estrutura para tabela `func_endereco`
--

CREATE TABLE `func_endereco` (
  `endereco_id` int(11) NOT NULL,
  `func_id` int(11) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `cep` varchar(30) NOT NULL,
  `referencia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `func_endereco`
--

INSERT INTO `func_endereco` (`endereco_id`, `func_id`, `rua`, `complemento`, `bairro`, `cidade`, `cep`, `referencia`) VALUES
(1, 1, 'Rua Augusto Braga', 'casa', 'Madureira', 'Rio de Janeiro', '21258782', 'Perto do Posto Shell'),
(2, 2, 'Rua Augusto Braga', 'casa', 'Madureira', 'Rio de Janeiro', '21258782', 'Perto do Posto Shell');

-- --------------------------------------------------------

--
-- Estrutura para tabela `func_telefone`
--

CREATE TABLE `func_telefone` (
  `telefone_id` int(11) NOT NULL,
  `func_id` int(11) NOT NULL,
  `tel_01` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `func_telefone`
--

INSERT INTO `func_telefone` (`telefone_id`, `func_id`, `tel_01`) VALUES
(1, 1, '021952695489'),
(2, 2, '021952695489');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `pedido_id` int(11) NOT NULL,
  `clie_id` int(11) NOT NULL,
  `func_id` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `total` int(11) NOT NULL,
  `desconto` varchar(100) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `produto1_id` int(11) NOT NULL,
  `produto2_id` int(11) DEFAULT NULL,
  `produto3_id` int(11) DEFAULT NULL,
  `observacao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `produto_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `produto`
--

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

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`clie_id`);

--
-- Índices de tabela `clie_endereco`
--
ALTER TABLE `clie_endereco`
  ADD PRIMARY KEY (`endereco_id`),
  ADD KEY `fk_clie_id` (`clie_id`);

--
-- Índices de tabela `clie_telefone`
--
ALTER TABLE `clie_telefone`
  ADD PRIMARY KEY (`telefone_id`),
  ADD KEY `fk_telefone_clie_id` (`clie_id`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`func_id`);

--
-- Índices de tabela `func_endereco`
--
ALTER TABLE `func_endereco`
  ADD PRIMARY KEY (`endereco_id`),
  ADD KEY `fk_endereco_func_id` (`func_id`);

--
-- Índices de tabela `func_telefone`
--
ALTER TABLE `func_telefone`
  ADD KEY `fk_telefone_func_id` (`func_id`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `fk_pedido_produto1` (`produto1_id`),
  ADD KEY `fk_pedido_produto2` (`produto2_id`),
  ADD KEY `fk_pedido_produto3` (`produto3_id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`produto_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `clie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `clie_endereco`
--
ALTER TABLE `clie_endereco`
  MODIFY `endereco_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `clie_telefone`
--
ALTER TABLE `clie_telefone`
  MODIFY `telefone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `func_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `func_endereco`
--
ALTER TABLE `func_endereco`
  MODIFY `endereco_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `clie_endereco`
--
ALTER TABLE `clie_endereco`
  ADD CONSTRAINT `fk_clie_id` FOREIGN KEY (`clie_id`) REFERENCES `cliente` (`clie_id`);

--
-- Restrições para tabelas `clie_telefone`
--
ALTER TABLE `clie_telefone`
  ADD CONSTRAINT `fk_telefone_clie_id` FOREIGN KEY (`clie_id`) REFERENCES `cliente` (`clie_id`);

--
-- Restrições para tabelas `func_endereco`
--
ALTER TABLE `func_endereco`
  ADD CONSTRAINT `fk_endereco_func_id` FOREIGN KEY (`func_id`) REFERENCES `funcionario` (`func_id`);

--
-- Restrições para tabelas `func_telefone`
--
ALTER TABLE `func_telefone`
  ADD CONSTRAINT `fk_telefone_func_id` FOREIGN KEY (`func_id`) REFERENCES `funcionario` (`func_id`);

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_produto1` FOREIGN KEY (`produto1_id`) REFERENCES `produto` (`produto_id`),
  ADD CONSTRAINT `fk_pedido_produto2` FOREIGN KEY (`produto2_id`) REFERENCES `produto` (`produto_id`),
  ADD CONSTRAINT `fk_pedido_produto3` FOREIGN KEY (`produto3_id`) REFERENCES `produto` (`produto_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
