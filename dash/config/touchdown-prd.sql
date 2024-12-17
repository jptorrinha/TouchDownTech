-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 17/12/2024 às 19:19
-- Versão do servidor: 8.0.40
-- Versão do PHP: 8.3.14

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `BILLINGS`
--

INSERT INTO `BILLINGS` (`bill_id`, `bill_player_id`, `bill_reference`, `bill_date`, `bill_value`, `team_rel`) VALUES
('4081F549-3E2F-8401-2DB8-5D4B8A400907', '1EA0E37B-D34B-0A7B-2DA1-BFAC0623D45B', '12-2024', '2024-12-16', 'R$ 200,00', 'A0E6D11D-9E05-453B-95B8-C72574269B44'),
('77075EDA-4C5E-2A91-00DC-89D1BD711185', '1EA0E37B-D34B-0A7B-2DA1-BFAC0623D45B', '11-2024', '2024-11-18', 'R$ 150,00', 'A0E6D11D-9E05-453B-95B8-C72574269B44'),
('859F9041-ECD3-3F77-5EDA-4FE08D2F5906', '1EA0E37B-D34B-0A7B-2DA1-BFAC0623D45B', '11-2024', '2024-12-17', 'R$ 200,00', 'A0E6D11D-9E05-453B-95B8-C72574269B44'),
('A0F2A4FD-A633-412A-0DEC-3A8463C1FCDC', '1EA0E37B-D34B-0A7B-2DA1-BFAC0623D45B', '10-2024', '2024-10-18', 'R$ 150,00', 'A0E6D11D-9E05-453B-95B8-C72574269B44'),
('EA8EB471-F646-0145-1EE0-37554D62B98E', '1EA0E37B-D34B-0A7B-2DA1-BFAC0623D45B', '09-2024', '2024-09-18', 'R$ 150,00', 'A0E6D11D-9E05-453B-95B8-C72574269B44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `TEAMS`
--

CREATE TABLE `TEAMS` (
  `team_id` varchar(64) NOT NULL,
  `team_nome` varchar(255) NOT NULL,
  `team_rel` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL COMMENT 'ID do Director para select do Time no login'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `U_couch` varchar(64) DEFAULT NULL,
  `U_director` varchar(64) DEFAULT NULL,
  `U_nome` varchar(255) NOT NULL,
  `U_email` varchar(255) NOT NULL,
  `U_telefone` varchar(30) NOT NULL,
  `U_perfil` set('1','2','3') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL COMMENT '1 - Admin, 2 - Treinador, 3 - Atleta',
  `Link_Analise` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Link_Videos` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `U_senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `USUARIOS`
--

INSERT INTO `USUARIOS` (`U_id`, `U_couch`, `U_director`, `U_nome`, `U_email`, `U_telefone`, `U_perfil`, `Link_Analise`, `Link_Videos`, `U_senha`) VALUES
('1EA0E37B-D34B-0A7B-2DA1-BFAC0623D45B', '863A2C4D-BB5E-FADC-CA9A-F1988E04A3AE', 'A0E6D11D-9E05-453B-95B8-C72574269B44', 'Fernando Costa', 'fernando@nfl.com', '(11) 98765-1234', '3', 'https://drive.google.com/drive/folders/1kD4RNOvrKfT62nLNf-ViAoeNn8VPmAgF?usp=drive_link', NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815'),
('863A2C4D-BB5E-FADC-CA9A-F1988E04A3AE', NULL, 'A0E6D11D-9E05-453B-95B8-C72574269B44', 'Luis Fernando de Oliveira', 'lfoliveira@gmail.net', '(11) 99521-1574', '2', NULL, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815'),
('A0E6D11D-9E05-453B-95B8-C72574269B44', NULL, NULL, 'João Paulo Gomes de Oliveira', 'jpotorrinha@gmail.com', '(11) 99521-1574', '1', '', '', '2b81fe0b83515399951235528162783931756679'),
('D20C4784-3B8A-1E44-505D-67449122F7F3', '863A2C4D-BB5E-FADC-CA9A-F1988E04A3AE', 'A0E6D11D-9E05-453B-95B8-C72574269B44', 'Bernardo de Campo', 'bernandor@nfl.com', '(11) 98765-1234', '3', 'https://drive.google.com/drive/folders/1s6kObe-XzbWtzrOrvvauRPM6r8wTM4FE?usp=drive_link', NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815'),
('FDB395D9-0468-3961-F075-5F5307D4D399', '863A2C4D-BB5E-FADC-CA9A-F1988E04A3AE', 'A0E6D11D-9E05-453B-95B8-C72574269B44', 'Carlos Weber', 'carlos@nfl.com', '(11) 98763-1234', '3', 'https://drive.google.com/drive/folders/1GalojBzTvTivUR6zimUG2LJpHOew2D0q?usp=drive_link', NULL, '2b81fe0b83515399951235528162783931756679');

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
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `team_rel` (`team_rel`);

--
-- Índices de tabela `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`U_id`),
  ADD KEY `U_couch` (`U_couch`),
  ADD KEY `U_director` (`U_director`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
