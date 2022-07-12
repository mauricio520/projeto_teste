-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jul-2022 às 14:43
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_php`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor`
--

CREATE TABLE `cor` (
  `cor_id` int(11) NOT NULL,
  `cor_nome` varchar(255) NOT NULL,
  `cor_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cor`
--

INSERT INTO `cor` (`cor_id`, `cor_nome`, `cor_status`) VALUES
(1, 'VERMELHO', 0),
(2, 'AMARELO', 1),
(3, 'AZUL', 1),
(4, 'VERMELHO', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `preco`
--

CREATE TABLE `preco` (
  `id_preco` int(11) NOT NULL,
  `preco` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `preco`
--

INSERT INTO `preco` (`id_preco`, `preco`) VALUES
(1, '50.11'),
(2, '500.10'),
(3, '20.00'),
(4, '40.00'),
(5, '50.00'),
(6, '30.00'),
(7, '5000.00'),
(8, '2000.00'),
(9, '46523.00'),
(10, '55689.00'),
(11, '65656.00'),
(12, '28935.00'),
(13, '45544.00'),
(14, '99999.99'),
(15, '45775.00'),
(16, '400.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_prod` int(11) NOT NULL,
  `nome_prod` varchar(255) NOT NULL,
  `cor_prod` varchar(255) NOT NULL,
  `status_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_prod`, `nome_prod`, `cor_prod`, `status_prod`) VALUES
(1, 'produto1', 'VERMELHO', 1),
(2, 'produto2', 'AZUL', 1),
(3, 'produto3', 'AMARELO', 1),
(4, 'produto4', 'AZUL', 1),
(5, 'produto5', 'AZUL', 1),
(6, 'produto6', 'AMARELO', 1),
(7, 'produto7', 'VERMELHO', 1),
(8, 'produto8', 'VERMELHO', 1),
(9, 'produto teste', 'AMARELO', 1),
(10, 'produto10', 'VERMELHO', 1),
(11, 'produto11', 'VERMELHO', 1),
(12, 'produto12', 'VERMELHO', 1),
(13, 'produto teste', 'VERMELHO', 1),
(14, 'produto14', 'AMARELO', 1),
(15, 'produto 15', 'AZUL', 1),
(16, 'produto 16', 'AMARELO', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cor`
--
ALTER TABLE `cor`
  ADD PRIMARY KEY (`cor_id`);

--
-- Índices para tabela `preco`
--
ALTER TABLE `preco`
  ADD PRIMARY KEY (`id_preco`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_prod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cor`
--
ALTER TABLE `cor`
  MODIFY `cor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `preco`
--
ALTER TABLE `preco`
  MODIFY `id_preco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
