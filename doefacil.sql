-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/08/2025 às 21:06
-- Versão do servidor: 8.0.40
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `doefacil`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `doacao`
--

CREATE TABLE `doacao` (
  `id_doacao` int NOT NULL,
  `data` date NOT NULL,
  `statusDoacao` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `numero_estabelecimento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `doacao`
--

INSERT INTO `doacao` (`id_doacao`, `data`, `statusDoacao`, `cidade`, `bairro`, `rua`, `estado`, `numero_estabelecimento`) VALUES
(1, '3563-05-04', 'disponivel', 'londrina', 'rgtjhteywt', 'gyjhteryi6yj', 'rioGrandeDoSul', 46),
(2, '5435-04-23', 'disponivel', 'londrina', 'sagrharhg', 'fhwrjythfg', 'rioGrandeDoSul', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produtos` int NOT NULL,
  `url` varchar(200) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `categorias` varchar(20) NOT NULL,
  `data_validade` date DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `id_doacao` int DEFAULT NULL,
  `statusProduto` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produtos`, `url`, `nome`, `descricao`, `categorias`, `data_validade`, `quantidade`, `id_doacao`, `statusProduto`) VALUES
(5, 'img/bolinho.jpg', 'Bolo de ninho', 'Bolo de ninho para aniversario', 'doces', '2026-12-23', 1, 1, 'disponivel'),
(7, 'img/salgadinho.jpg', 'Cento de Salgados', 'Cento de salgados sortidos', 'salgados', '2025-10-12', 5, 2, 'esgotado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `url` varchar(200) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `data_nascimento` varchar(20) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`url`, `email`, `senha`, `telefone`, `endereco`, `nome`, `data_nascimento`, `cpf`) VALUES
('img/cachorro punk.jpg', 'cachorropunk@gmail.com', '202cb962ac59075b964b07152d234b70', '(87) 98797-9878', 'Rua do Punk Dog', 'Cachorro Punk', '2019-12-20', '441.313.131-31'),
('img/Captura de tela 2025-02-17 201150.png', 'estefany@gmail.com', '$2y$10$5q6VnH6P9Rjsl/WeO5kqyuV2v3ioGOZoYHV57POpuOlHDZlwJ26ju', '(42) 99984-8786', 'Rua Clodoaldo Carneiro, 97', 'Estefany Da Silva Pedroso', '2000-08-11', '133.477.230-90'),
('img/leao.jpg', 'fgf@gmail.com', '202cb962ac59075b964b07152d234b70', '56565', 'hythy', 'vhfh', '2020-10-10', '454545'),
('img/palitinho.jpg', 'jorge@gmail.com', '$2y$10$sNlqeJ04vR.yt3WmNeZyAOZ6T7hKJDKPQpsqatNUkjL98NDnx4LlK', '(32) 57785-6789', 'pedrinho do grau', 'jorgenei', '1990-03-12', '123.234.567-12');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `doacao`
--
ALTER TABLE `doacao`
  ADD PRIMARY KEY (`id_doacao`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produtos`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `doacao`
--
ALTER TABLE `doacao`
  MODIFY `id_doacao` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produtos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
