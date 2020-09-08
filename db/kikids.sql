-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Jun-2020 às 20:36
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `kikids`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogadores`
--

CREATE TABLE `jogadores` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `nome` varchar(255) NOT NULL COMMENT 'nome',
  `pontuacao` double NOT NULL COMMENT 'pontuacao'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='datatable demo table';

--
-- Extraindo dados da tabela `jogadores`
--

INSERT INTO `jogadores` (`id`, `nome`, `pontuacao`) VALUES
(1, 'Tiger Nixon', 320800),
(2, 'Garrett Winters', 170750),
(3, 'Ashton Cox', 86000),
(4, 'Cedric Kelly', 433060),
(5, 'Airi Satou', 162700),
(6, 'Brielle Williamson', 372000),
(7, 'Herrod Chandler', 137500),
(8, 'Rhona Davidson', 327900),
(9, 'Colleen Hurst', 205500),
(10, 'Sonya Frost', 103600),
(11, 'Jena Gaines', 90560),
(12, 'Quinn Flynn', 342000),
(13, 'Charde Marshall', 470600),
(14, 'Haley Kennedy', 313500),
(15, 'Tatyana Fitzpatrick', 385750),
(16, 'Michael Silva', 198500),
(17, 'Paul Byrd', 725000),
(18, 'Gloria Little', 237500),
(19, 'Bradley Greer', 132000),
(20, 'Dai Rios', 217500),
(21, 'Jenette Caldwell', 345000),
(22, 'Yuri Berry', 675000),
(23, 'Caesar Vance', 106450),
(24, 'Doris Wilder', 85600),
(25, 'Angelica Ramos', 1200000),
(26, 'Gavin Joyce', 92575),
(27, 'Jennifer Chang', 357650),
(28, 'Brenden Wagner', 206850),
(29, 'Fiona Green', 850000),
(30, 'Shou Itou', 163000),
(31, 'Michelle House', 95400),
(32, 'Suki Burks', 114500),
(33, 'Prescott Bartlett', 145000),
(34, 'Gavin Cortez', 235500),
(35, 'Martena Mccray', 324050),
(36, 'Unity Butler', 85675),
(37, 'Howard Hatfield', 164500),
(38, 'Hope Fuentes', 109850),
(39, 'Vivian Harrell', 452500),
(40, 'Timothy Mooney', 136200),
(41, 'Jackson Bradshaw', 645750),
(42, 'Olivia Liang', 234500),
(43, 'Bruno Nash', 163500),
(44, 'Sakura Yamamoto', 139575),
(45, 'Thor Walton', 98540),
(46, 'Finn Camacho', 87500),
(47, 'Serge Baldwin', 138575),
(48, 'Zenaida Frank', 125250),
(49, 'Zorita Serrano', 115000),
(50, 'Jennifer Acosta', 75650),
(51, 'Cara Stevens', 145600),
(52, 'Hermione Butler', 356250),
(53, 'Lael Greer', 103500),
(54, 'Jonas Alexander', 86500),
(55, 'Shad Decker', 183000),
(56, 'Michael Bruce', 183000),
(57, 'Donna Snider', 1120000),
(64, 'Irineu', 9000000),
(65, 'Michael Jackson', 500000),
(67, 'Bruno', 15000000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `pergunta` varchar(255) NOT NULL COMMENT 'pergunta',
  `resposta_certa` varchar(255) NOT NULL COMMENT 'resposta_certa',
  `resposta_errada` varchar(255) NOT NULL COMMENT 'resposta_errada',
  `feedback_certo` varchar(255) NOT NULL COMMENT 'feedback_certo',
  `feedback_errado` varchar(255) NOT NULL COMMENT 'feedback_errado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='datatable demo table';

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `pergunta`, `resposta_certa`, `resposta_errada`, `feedback_certo`, `feedback_errado`) VALUES
(3, 'Qual dos alimentos é mais saudável?', 'salada.gif', 'coxinha.gif', 'Parabéns você acertou!', 'Errou!'),
(4, 'Qual dos alimentos é mais saudável?', 'pao.gif', 'pastel.gif', 'Parabéns você acertou!', 'Errou!'),
(6, 'Qual dos alimentos é mais saudável?', 'feijao.gif', 'sorvete.gif', 'Parabéns você acertou!', 'Errou!'),
(7, 'Qual dos alimentos é mais saudável?', 'banana.gif', 'chocolate.gif', 'Parabéns você acertou!', 'Errou!'),
(8, 'Qual dos alimentos é mais saudável?', 'uva.gif', 'bala.gif', 'Parabéns você acertou!', 'Errou!'),
(9, 'Qual dos alimentos é mais saudável?', 'laranja.gif', 'risoles.gif', 'Parabéns você acertou!', 'Errou!'),
(10, 'Qual dos alimentos é mais saudável?', 'melancia.gif', 'bombom.gif', 'Parabéns você acertou!', 'Errou!'),
(64, 'Qual dos alimentos é mais saudável?', 'mamão.gif', 'bolacha.gif', 'Parabéns você acertou!', 'Errou!'),
(65, 'Qual dos alimentos é mais saudável?', 'morango.json', 'burger.json', 'Acertou!', 'Errou!'),
(66, 'Qual dos alimentos é mais saudável?', 'teste', 'teste', 'teste', 'teste'),
(67, 'Qual dos alimentos é mais saudável?', 'morango.gif', 'morango.gif', 'Parabens!', 'Errou!'),
(68, 'Qual dos alimentos é mais saudável?', 'uva', 'c', 'd', 'a'),
(69, 'teste', 'laranja', '3', '4', '5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(NULL, 'eduardo', 'edupassero47@gmail.com', 'admin', 'bdae054674487bd0d548922e9dce2f53'),
(NULL, 'joao', 'edupassero47@gmail.com', 'user', '51cb39699a4647b8097271e522f1b8de'),
(NULL, 'Eduarda', 'edupassero45@gmail.com', 'user', 'c5b1efc185dbb66aa03043aa53de53f5'),
(NULL, 'john', 'edupassero@jhon.com', 'user', 'edu1234'),
(NULL, 'jonas', 'edupassero45@gmail.com', 'user', 'c5b1efc185dbb66aa03043aa53de53f5'),
(NULL, 'bruno', 'bruno@mymail.com', 'admin', '581b90db2e5328782bf02c0cdd783a3b'),
(NULL, 'brunoe', 'bruno@mymail.com', 'admin', 'b90dab27c9d3bbe1a98cf26ae20edbf6'),
(NULL, 'bruno', 'NINGUNO@NINGUNO.COM', 'admin', 'dcc7a642511e1fd49c9e215cbff094bd'),
(NULL, 'maria', NULL, 'admin', 'a23b2677636d0d0dfa792aa22d2b5c94'),
(NULL, 'maria', NULL, 'admin', 'a23b2677636d0d0dfa792aa22d2b5c94'),
(NULL, 'mario', NULL, 'admin', 'a23b2677636d0d0dfa792aa22d2b5c94'),
(NULL, 'irineu', NULL, 'admin', '152e6136bf9a7da2aa7ebfe463b730d4');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `jogadores`
--
ALTER TABLE `jogadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `jogadores`
--
ALTER TABLE `jogadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
