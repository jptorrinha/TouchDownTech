-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 04/08/2022 às 14:01
-- Versão do servidor: 5.7.34
-- Versão do PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `devportal`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `CLIENTES`
--

CREATE TABLE `CLIENTES` (
  `C_id` varchar(255) NOT NULL,
  `C_nome` varchar(255) NOT NULL,
  `C_cargo` varchar(255) NOT NULL,
  `C_email` varchar(255) NOT NULL,
  `C_empresa` varchar(255) NOT NULL,
  `C_telefone` varchar(30) NOT NULL,
  `C_senha` varchar(255) NOT NULL,
  `C_status` set('ATIVO','INATIVO') NOT NULL DEFAULT 'ATIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `CLIENTES`
--

INSERT INTO `CLIENTES` (`C_id`, `C_nome`, `C_cargo`, `C_email`, `C_empresa`, `C_telefone`, `C_senha`, `C_status`) VALUES
('530FBDAF-E448-794B-7A52-AC4B6D98C400', 'JOAO PAULO GOMES DE OLIVEIRA', 'Dev', 'jpotorrinha@gmail.com', 'FT', '(11) 98974-3626', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'ATIVO'),
('E690EB83-FECB-7F32-9EB4-38BEFAAE0D75', 'JOAO PAULO GOMES DE OLIVEIRA', 'CEO', 'jpotorrinha@gmail.com.br', 'FTZ', '(11) 98974-3626', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'ATIVO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `USUARIOS`
--

CREATE TABLE `USUARIOS` (
  `U_id` varchar(36) NOT NULL,
  `U_nome` varchar(255) NOT NULL,
  `U_cargo` varchar(255) NOT NULL,
  `U_email` varchar(255) NOT NULL,
  `U_telefone` varchar(30) NOT NULL,
  `U_senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `USUARIOS`
--

INSERT INTO `USUARIOS` (`U_id`, `U_nome`, `U_cargo`, `U_email`, `U_telefone`, `U_senha`) VALUES
('A5A928C5-B48E-0E89-E17E-83B864B7F423', 'JOAO PAULO GOMES DE OLIVEIRA 4', 'Arquiteto de Soluções', 'jpotorrinha@gmail.com.co', '(11) 98974-3626', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1'),
('E13603D9-9CFF-8AC1-69A6-1D33BDEBD233', 'JOAO PAULO GOMES DE OLIVEIRA 1', 'Arquiteto de Soluções', 'joao.oliveira@first-tech.com', '(11) 98974-3626', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1'),
('EA27933D-D28C-37E6-EA05-36DC71E26064', 'JOAO PAULO GOMES DE OLIVEIRA 3', 'Arquiteto de Soluções', 'jpotorrinha@gmail.com', '(11) 98974-3626', 'adcd7048512e64b48da55b027577886ee5a36350'),
('F5D36EC9-5D31-E747-A626-0985B3156E7A', 'JOAO PAULO GOMES DE OLIVEIRA 2', 'Arquiteto de Soluções', 'jpotorrinha@gmail.com.br', '(11) 98974-3626', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `CLIENTES`
--
ALTER TABLE `CLIENTES`
  ADD PRIMARY KEY (`C_id`,`C_email`),
  ADD UNIQUE KEY `C_id` (`C_id`),
  ADD UNIQUE KEY `C_email` (`C_email`);

--
-- Índices de tabela `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`U_id`,`U_email`),
  ADD UNIQUE KEY `U_email` (`U_email`),
  ADD UNIQUE KEY `U_id` (`U_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
