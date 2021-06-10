-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Jun-2021 às 01:32
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_noturno`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `us_id` int(11) NOT NULL,
  `us_login` varchar(20) NOT NULL,
  `us_senha` varchar(16) NOT NULL,
  `us_nome` varchar(15) NOT NULL,
  `us_sobrenome` varchar(50) NOT NULL,
  `us_email` varchar(50) NOT NULL,
  `us_sexo` tinyint(1) DEFAULT NULL,
  `us_data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `us_data_modificacao` timestamp NULL DEFAULT NULL,
  `us_data_exclusao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`us_id`, `us_login`, `us_senha`, `us_nome`, `us_sobrenome`, `us_email`, `us_sexo`, `us_data_cadastro`, `us_data_modificacao`, `us_data_exclusao`) VALUES
(1, 'Juan', '123', 'Juan', 'Yuri Gonzaga', 'juan@pastel.com', 1, '2021-06-10 23:30:17', '2021-06-10 23:30:17', '2021-06-10 23:30:17');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
