-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Dez-2018 às 23:52
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_liga`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campeonato`
--

CREATE TABLE `campeonato` (
  `cod_campeonato` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `ano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `campeonato_curso`
--

CREATE TABLE `campeonato_curso` (
  `curso` varchar(50) NOT NULL,
  `cod_campeonato` int(11) NOT NULL,
  `pontuacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE `jogador` (
  `cod_jogador` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador_jogo`
--

CREATE TABLE `jogador_jogo` (
  `cod_jogo` int(11) NOT NULL,
  `cod_jogador` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `pontuacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo`
--

CREATE TABLE `jogo` (
  `cod_jogo` int(11) NOT NULL,
  `curso1` varchar(50) NOT NULL,
  `curso2` varchar(50) NOT NULL,
  `cod_campeonato` int(11) NOT NULL,
  `horario` time NOT NULL,
  `data` date NOT NULL,
  `modalidade` varchar(50) NOT NULL,
  `resultado1` int(11) DEFAULT NULL,
  `resultado2` int(11) DEFAULT NULL,
  `mvp` int(11) DEFAULT NULL,
  `nomemvp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campeonato`
--
ALTER TABLE `campeonato`
  ADD PRIMARY KEY (`cod_campeonato`);

--
-- Indexes for table `campeonato_curso`
--
ALTER TABLE `campeonato_curso`
  ADD PRIMARY KEY (`curso`,`cod_campeonato`),
  ADD KEY `cod_campeonato` (`cod_campeonato`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`nome`);

--
-- Indexes for table `jogador`
--
ALTER TABLE `jogador`
  ADD PRIMARY KEY (`cod_jogador`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `curso` (`curso`) USING BTREE;

--
-- Indexes for table `jogador_jogo`
--
ALTER TABLE `jogador_jogo`
  ADD PRIMARY KEY (`cod_jogo`,`cod_jogador`) USING BTREE,
  ADD KEY `cod_jogador` (`cod_jogador`);

--
-- Indexes for table `jogo`
--
ALTER TABLE `jogo`
  ADD PRIMARY KEY (`cod_jogo`),
  ADD KEY `cod_campeonato` (`cod_campeonato`),
  ADD KEY `curso1` (`curso1`),
  ADD KEY `curso2` (`curso2`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campeonato`
--
ALTER TABLE `campeonato`
  MODIFY `cod_campeonato` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jogador`
--
ALTER TABLE `jogador`
  MODIFY `cod_jogador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `jogo`
--
ALTER TABLE `jogo`
  MODIFY `cod_jogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `campeonato_curso`
--
ALTER TABLE `campeonato_curso`
  ADD CONSTRAINT `campeonato_curso_ibfk_2` FOREIGN KEY (`cod_campeonato`) REFERENCES `campeonato` (`cod_campeonato`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso` FOREIGN KEY (`curso`) REFERENCES `curso` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `jogador_jogo`
--
ALTER TABLE `jogador_jogo`
  ADD CONSTRAINT `jogador_jogo_ibfk_1` FOREIGN KEY (`cod_jogo`) REFERENCES `jogo` (`cod_jogo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jogador_jogo_ibfk_2` FOREIGN KEY (`cod_jogador`) REFERENCES `jogador` (`cod_jogador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `jogo`
--
ALTER TABLE `jogo`
  ADD CONSTRAINT `curso1` FOREIGN KEY (`curso1`) REFERENCES `curso` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso2` FOREIGN KEY (`curso2`) REFERENCES `curso` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jogo_ibfk_3` FOREIGN KEY (`cod_campeonato`) REFERENCES `campeonato` (`cod_campeonato`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
