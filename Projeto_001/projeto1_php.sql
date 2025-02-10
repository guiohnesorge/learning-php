-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Fev-2025 às 16:05
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto1_php`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mercado`
--

CREATE TABLE `mercado` (
  `CODIGO` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `QUANTIDADE` varchar(50) NOT NULL,
  `PRECO` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `mercado`
--

INSERT INTO `mercado` (`CODIGO`, `NOME`, `QUANTIDADE`, `PRECO`) VALUES
(5, 'Teste', '15', 150);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `CODIGO` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `SENHA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`CODIGO`, `NOME`, `EMAIL`, `SENHA`) VALUES
(1, 'Administrador', 'admin', 'admin'),
(26, 'Guilherme', 'guilhermeohnesorge1@gmail.com', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `mercado`
--
ALTER TABLE `mercado`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`CODIGO`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `mercado`
--
ALTER TABLE `mercado`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
