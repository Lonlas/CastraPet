-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 15-Maio-2022 às 21:46
-- Versão do servidor: 5.6.34
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdcastrapet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `idanimal` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idraca` int(11) NOT NULL,
  `aninome` varchar(50) NOT NULL,
  `especie` tinyint(4) NOT NULL,
  `sexo` tinyint(4) NOT NULL COMMENT '0 para Fêmea; 1 para Macho',
  `cor` varchar(30) NOT NULL,
  `pelagem` tinyint(4) NOT NULL COMMENT '1 pra curta; 2 média; 3 pra alta;',
  `porte` tinyint(4) NOT NULL COMMENT '1 pra pequeno; 2 pra médio; 3 pra grande;',
  `idade` tinyint(4) NOT NULL,
  `comunitario` tinyint(4) NOT NULL COMMENT '0 pra não; 1 pra sim;',
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`idanimal`, `idusuario`, `idraca`, `aninome`, `especie`, `sexo`, `cor`, `pelagem`, `porte`, `idade`, `comunitario`, `foto`) VALUES
(1, 18, 3, '1', 2, 2, '2', 2, 2, 2, 2, '2'),
(2, 18, 1, '1', 1, 1, '123', 123, 123, 123, 123, '123'),
(3, 18, 4, 'Pitica', 1, 0, 'Castanho e beige', 1, 1, 8, 0, NULL),
(4, 18, 4, 'Kika', 1, 0, 'Branca', 1, 1, 14, 0, NULL),
(5, 18, 6, 'Joaquim', 1, 1, 'braco', 1, 2, 10, 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `castracao`
--

CREATE TABLE `castracao` (
  `idcastracao` int(11) NOT NULL,
  `idanimal` int(11) NOT NULL,
  `idclinica` int(11) NOT NULL,
  `horario` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `observacao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clinica`
--

CREATE TABLE `clinica` (
  `idclinica` int(11) NOT NULL,
  `idlogin` int(11) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `clitelefone` varchar(11) NOT NULL,
  `vagas` int(11) NOT NULL,
  `clirua` varchar(50) NOT NULL,
  `clibairro` varchar(50) NOT NULL,
  `clinumero` varchar(5) NOT NULL,
  `clicep` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clinica`
--

INSERT INTO `clinica` (`idclinica`, `idlogin`, `cnpj`, `clitelefone`, `vagas`, `clirua`, `clibairro`, `clinumero`, `clicep`) VALUES
(1, 26, '1234567891', '123', 123, 'do SabÃ£o', 'das calÃ§adas', '123', '12345678');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivelacesso` tinyint(4) NOT NULL COMMENT '0 pra Usuário; 1 pra clínica; 2 pra adm;'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`idlogin`, `nome`, `email`, `senha`, `nivelacesso`) VALUES
(24, 'Testando da silva', 'user@user.com', '$2y$10$QoMViCRPRIpvHCZbftfGzejE7IPTN6xWeAEzBWX0voCsSjwYsybfS', 0),
(25, 'Testando Adm', 'adm@adm.com', '$2y$10$h8Sde8BNocqPM4Oo4/MWtuI2Zjmx7H7oAetg8Q5kAnQj3pQAJMl0W', 2),
(26, 'Clinica teste', 'clinica@clinica.com', '$2y$10$yDObtSkSV5134sutoNv/3ecEk//F6NkLRPV0JE2sAmGTQDwT0wn/W', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `raca`
--

CREATE TABLE `raca` (
  `idraca` int(11) NOT NULL,
  `raca` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tipoespecie` tinyint(4) NOT NULL COMMENT '0 pra cachorro; 1 pra gato'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `raca`
--

INSERT INTO `raca` (`idraca`, `raca`, `tipoespecie`) VALUES
(1, 'Pastor Alemão', 0),
(2, 'Buldogue Francês', 0),
(3, 'Dog Qualquers', 0),
(4, 'SiamÃªs', 0),
(5, 'Persa', 1),
(6, 'Sphynx', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `idlogin` int(11) NOT NULL,
  `rg` char(9) NOT NULL,
  `cpf` char(11) NOT NULL,
  `beneficio` tinyint(4) NOT NULL,
  `telefone` varchar(10) DEFAULT NULL,
  `celular` varchar(11) NOT NULL,
  `punicao` tinyint(4) NOT NULL,
  `usurua` varchar(50) NOT NULL,
  `usubairro` varchar(50) NOT NULL,
  `usunumero` varchar(5) NOT NULL,
  `usucep` varchar(8) NOT NULL,
  `nis` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idlogin`, `rg`, `cpf`, `beneficio`, `telefone`, `celular`, `punicao`, `usurua`, `usubairro`, `usunumero`, `usucep`, `nis`) VALUES
(18, 24, '123', '123', 0, '123', '123', 0, '123', '123', '123', '123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`idanimal`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idraca` (`idraca`);

--
-- Indexes for table `castracao`
--
ALTER TABLE `castracao`
  ADD PRIMARY KEY (`idcastracao`),
  ADD KEY `idanimal` (`idanimal`,`idclinica`),
  ADD KEY `fkidclinica_castracao` (`idclinica`);

--
-- Indexes for table `clinica`
--
ALTER TABLE `clinica`
  ADD PRIMARY KEY (`idclinica`),
  ADD UNIQUE KEY `cnpj` (`cnpj`),
  ADD KEY `idlogin` (`idlogin`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idlogin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `raca`
--
ALTER TABLE `raca`
  ADD PRIMARY KEY (`idraca`),
  ADD UNIQUE KEY `Raca` (`raca`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `idlogin` (`idlogin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `idanimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `castracao`
--
ALTER TABLE `castracao`
  MODIFY `idcastracao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinica`
--
ALTER TABLE `clinica`
  MODIFY `idclinica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `raca`
--
ALTER TABLE `raca`
  MODIFY `idraca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `fkidraca` FOREIGN KEY (`idraca`) REFERENCES `raca` (`idraca`),
  ADD CONSTRAINT `fkidusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Limitadores para a tabela `castracao`
--
ALTER TABLE `castracao`
  ADD CONSTRAINT `fkidanimal_castracao` FOREIGN KEY (`idanimal`) REFERENCES `animal` (`idanimal`),
  ADD CONSTRAINT `fkidclinica_castracao` FOREIGN KEY (`idclinica`) REFERENCES `clinica` (`idclinica`);

--
-- Limitadores para a tabela `clinica`
--
ALTER TABLE `clinica`
  ADD CONSTRAINT `fkidlogin_clinica` FOREIGN KEY (`idlogin`) REFERENCES `login` (`idlogin`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fkidlogin_usuario` FOREIGN KEY (`idlogin`) REFERENCES `login` (`idlogin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
