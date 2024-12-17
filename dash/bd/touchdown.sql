-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 17/12/2024 às 12:18
-- Versão do servidor: 5.7.39
-- Versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `touchdown`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `BILLINGS`
--

CREATE TABLE `BILLINGS` (
  `bill_id` varchar(64) NOT NULL,
  `bill_player_id` varchar(64) NOT NULL,
  `bill_reference` varchar(255) NOT NULL,
  `bill_date` varchar(64) NOT NULL,
  `bill_value` varchar(64) NOT NULL,
  `team_rel` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `BILLINGS`
--

INSERT INTO `BILLINGS` (`bill_id`, `bill_player_id`, `bill_reference`, `bill_date`, `bill_value`, `team_rel`) VALUES
('4081F549-3E2F-8401-2DB8-5D4B8A400907', 'A0E6D11D-9E05-453B-95B8-C72574269B44', '12-2024', '2024-12-16', 'R$ 200,00', 'A0E6D11D-9E05-453B-95B8-C72574269B44'),
('77075EDA-4C5E-2A91-00DC-89D1BD711185', 'A0E6D11D-9E05-453B-95B8-C72574269B44', '11-2024', '2024-11-18', 'R$ 150,00', 'A0E6D11D-9E05-453B-95B8-C72574269B44'),
('A0F2A4FD-A633-412A-0DEC-3A8463C1FCDC', 'A0E6D11D-9E05-453B-95B8-C72574269B44', '10-2024', '2024-10-18', 'R$ 150,00', 'A0E6D11D-9E05-453B-95B8-C72574269B44'),
('EA8EB471-F646-0145-1EE0-37554D62B98E', 'A0E6D11D-9E05-453B-95B8-C72574269B44', '09-2024', '2024-09-18', 'R$ 150,00', 'A0E6D11D-9E05-453B-95B8-C72574269B44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `TEAMS`
--

CREATE TABLE `TEAMS` (
  `team_id` varchar(64) NOT NULL,
  `team_nome` varchar(255) NOT NULL,
  `team_rel` varchar(64) NOT NULL COMMENT 'ID para select do Time no login'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `TEAMS`
--

INSERT INTO `TEAMS` (`team_id`, `team_nome`, `team_rel`) VALUES
('BDC96E76-FD4A-B3F5-2053-DBDA4BE29B7B', 'Time da NFL', 'A0E6D11D-9E05-453B-95B8-C72574269B44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `USUARIOS`
--

CREATE TABLE `USUARIOS` (
  `U_id` varchar(36) NOT NULL,
  `U_nome` varchar(255) NOT NULL,
  `U_email` varchar(255) NOT NULL,
  `U_telefone` varchar(30) NOT NULL,
  `U_perfil` set('1','2','3') DEFAULT NULL COMMENT '1 - Admin, 2 - Treinador, 3 - Atleta',
  `Link_Analise` varchar(255) NOT NULL,
  `Link_Videos` varchar(255) NOT NULL,
  `U_senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `USUARIOS`
--

INSERT INTO `USUARIOS` (`U_id`, `U_nome`, `U_email`, `U_telefone`, `U_perfil`, `Link_Analise`, `Link_Videos`, `U_senha`) VALUES
('A0E6D11D-9E05-453B-95B8-C72574269B44', 'João Paulo Gomes de Oliveira', 'jpotorrinha@gmail.com', '(11) 99521-1574', '2', '', '', '2b81fe0b83515399951235528162783931756679');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `BILLINGS`
--
ALTER TABLE `BILLINGS`
  ADD PRIMARY KEY (`bill_id`);

--
-- Índices de tabela `TEAMS`
--
ALTER TABLE `TEAMS`
  ADD PRIMARY KEY (`team_id`);

--
-- Índices de tabela `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`U_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
