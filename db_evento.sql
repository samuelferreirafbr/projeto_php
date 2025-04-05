-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 16/11/2024 às 22:34
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_evento`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `foto` blob NOT NULL,
  `data_nascimento` date NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `genero` enum('masculino','feminino') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`id`, `nome`, `email`, `senha`, `foto`, `data_nascimento`, `is_admin`, `cliente_id`, `genero`) VALUES
(2, 'Adm ', 'administrador@gmail.com', '$2y$10$Boo', 0x416e79436f6e762e636f6d5f5f4d756e646f2d636f72706f72617469766f2d322d312e77656270, '2003-04-12', 1, 2, 'masculino');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` blob NOT NULL,
  `data_nascimento` date NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `genero` enum('masculino','feminino') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `senha`, `foto`, `data_nascimento`, `is_admin`, `genero`) VALUES
(1, 'Cliente comum', 'clientecomum@gmail.com', '$2y$10$Xc3', 0x6165737468657469632d7370696465722d6d616e2d6d617276656c2d6465736b746f702d77616c6c70617065722d707265766965772e6a7067, '2003-04-12', 0, 'masculino'),
(2, 'Adm ', 'administrador@gmail.com', '$2y$10$Boo', 0x416e79436f6e762e636f6d5f5f4d756e646f2d636f72706f72617469766f2d322d312e77656270, '2003-04-12', 1, 'masculino'),
(3, 'Felipe Pereira Souza', 'felipe@gmail.com', '$2y$10$xwP', 0x6165737468657469632d7370696465722d6d616e2d6d617276656c2d6465736b746f702d77616c6c70617065722d707265766965772e6a7067, '2004-04-12', 0, 'masculino');

-- --------------------------------------------------------

--
-- Estrutura para tabela `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `data_finalizacao` date NOT NULL,
  `horario` time NOT NULL,
  `local` varchar(255) NOT NULL,
  `tipo_evento` enum('infantil','adulto','empresarial') NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `evento`
--

INSERT INTO `evento` (`id`, `data_finalizacao`, `horario`, `local`, `tipo_evento`, `nome`) VALUES
(1, '2024-09-22', '23:50:00', 'Santa Maria Shopping', 'adulto', 'Festa Comum'),
(2, '2024-09-22', '23:50:00', 'Santa Maria Shopping', 'adulto', 'Festa Comum'),
(7, '2025-09-14', '22:00:00', 'Pizzaria do José', 'infantil', 'Festa do Joãozinho');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
