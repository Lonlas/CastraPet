-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 12-Jun-2022 às 02:58
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
  `especie` tinyint(4) NOT NULL COMMENT '0 para Canina e 1 para Felina',
  `sexo` tinyint(4) NOT NULL COMMENT '0 para Fêmea; 1 para Macho',
  `cor` varchar(30) NOT NULL,
  `pelagem` tinyint(4) NOT NULL COMMENT '0 pra curta; 1 média; 2 pra alta;',
  `porte` tinyint(4) NOT NULL COMMENT '0 pra pequeno; 1 pra médio; 2 pra grande;',
  `idade` tinyint(4) NOT NULL,
  `comunitario` tinyint(4) NOT NULL COMMENT '0 pra não; 1 pra sim;',
  `foto` varchar(50) DEFAULT NULL,
  `codchip` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`idanimal`, `idusuario`, `idraca`, `aninome`, `especie`, `sexo`, `cor`, `pelagem`, `porte`, `idade`, `comunitario`, `foto`, `codchip`) VALUES
(3, 18, 4, 'Pitica', 1, 0, 'Castanho e beige', 1, 1, 8, 0, '3c5064982d2774489b6c176a72c750ec.jpg', ''),
(4, 18, 4, 'Kika', 1, 0, 'Branca', 1, 1, 14, 0, '6ba827401eabaf5582118d3d668cd18d.jpg', ''),
(7, 20, 6, 'Bartolomeu', 1, 1, 'Vermelho', 1, 2, 12, 0, 'dea44929c35ea6d90b3cbd0a57ac18a5.png', ''),
(8, 20, 3, 'Hugu', 0, 1, 'Preto', 2, 2, 5, 1, '5f4c9075d01c1e2d8f125597f49de9e2.png', ''),
(9, 22, 3, 'Rex', 1, 1, 'Caramelo', 1, 2, 1, 0, 'a3ccbf69d983f3ba65203e8e7aaf9a0d.jpg', ''),
(11, 22, 3, 'TotÃ³', 1, 1, 'Caramelo', 1, 1, 2, 0, '08d0316efae2c9870d79270ee1c0791f.jpg', ''),
(15, 22, 4, 'Kiara', 1, 1, 'Bege', 1, 1, 5, 0, '895f42ccae3502519b72045fe6104082.jpg', ''),
(17, 22, 1, 'Mufasa', 0, 1, 'Capa Preta', 1, 2, 1, 0, 'ff211b00eaa578d5c913633a2b8972d5.webp', ''),
(18, 22, 2, 'Duck', 0, 1, 'Caramelo', 0, 1, 6, 0, '518e1f7bf4714b757ca26a265356d3ac.webp', ''),
(19, 18, 7, 'Loki', 0, 1, 'Branco', 0, 0, 5, 0, 'c1107873d459d6425666fe85640ab611.jpg', ''),
(20, 18, 4, 'Belinha', 1, 0, 'Branca', 1, 1, 3, 0, '6366c16e27206a88cd58e05d881e6bd7.jpg', ''),
(21, 18, 7, 'Mel', 0, 0, 'Caramelo', 0, 0, 3, 0, '4b3c94d863c6d8324b29e8dede83d6ec.jpg', ''),
(22, 18, 8, 'Cadu', 0, 1, 'Bege', 2, 2, 3, 0, '2a75b5d37223003530f89360fdf8a84a.jpg', ''),
(23, 19, 7, 'Pietro', 0, 1, 'Caramelo', 0, 1, 2, 0, '341a58e45ffd6e69b9594d3d825cfd3a.jpg', ''),
(24, 19, 4, 'Carla', 1, 0, 'Branca', 2, 1, 7, 0, '9228cb8ed4bab1105654c7c98d1e8b68.jpg', ''),
(25, 19, 6, 'Bills', 1, 1, 'Rosa', 0, 1, 6, 1, '7f872316b8ee62365ebed9d6f88fc6ec.jpg', ''),
(26, 21, 7, 'JoJo', 1, 1, 'Branco', 2, 0, 3, 0, 'fb37a0689a8016ac013e037aafa4995f.jpg', ''),
(27, 21, 8, 'Jorge', 0, 1, 'Bege', 2, 2, 1, 0, '859194d48c1cf6460aba2995d69ccf2b.jpg', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `castracao`
--

CREATE TABLE `castracao` (
  `idcastracao` int(11) NOT NULL,
  `idanimal` int(11) NOT NULL,
  `idclinica` int(11) DEFAULT NULL,
  `horario` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 - Solicitação em análise; 1 - Solicitação aprovada; 2 - Animal Castrado; 3 - Solicitação Reprovada; 4 - Tutor não compareceu; 5 - Solicitação Cancelada; 6 - Solicitação Reagendada; 7 - Animal foi a óbito',
  `observacao` varchar(100) DEFAULT NULL,
  `obsclinica` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `castracao`
--

INSERT INTO `castracao` (`idcastracao`, `idanimal`, `idclinica`, `horario`, `status`, `observacao`, `obsclinica`) VALUES
(1, 7, 1, '2022-05-24 13:00:00', 1, NULL, NULL),
(3, 8, 2, '2022-05-27 12:00:00', 1, NULL, NULL),
(4, 3, NULL, NULL, 0, '', NULL),
(6, 4, 2, '2022-05-25 14:30:00', 2, 'Sim', NULL),
(7, 17, 2, '2022-05-12 17:19:00', 1, 'Na pata esqueda traseira, ele tem uma dor forte quando pega de mal jeito.', NULL),
(8, 26, NULL, NULL, 3, 'Yare Yare Daze...', NULL);

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
  `clicep` varchar(8) NOT NULL,
  `ativo` tinyint(4) NOT NULL COMMENT '0 - Clínica não ativa; 1 - Clínica ativa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clinica`
--

INSERT INTO `clinica` (`idclinica`, `idlogin`, `cnpj`, `clitelefone`, `vagas`, `clirua`, `clibairro`, `clinumero`, `clicep`, `ativo`) VALUES
(1, 26, '1234567891', '123', 123, 'do SabÃ£o', 'das calÃ§adas', '123', '12345678', 1),
(2, 29, '1000025798', '1140028922', 199, 'Avenida do Chocolate', 'Bairro GuaranÃ¡', '111', '09875456', 1),
(3, 30, '20000489465', '1189224002', 150, 'Avenida da Beterraba', 'Bairro Jaca', '105', '09875456', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `nivelacesso` tinyint(4) NOT NULL COMMENT '0 pra Usuário; 1 pra clínica; 2 pra adm;',
  `codsenha` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`idlogin`, `nome`, `email`, `senha`, `nivelacesso`, `codsenha`) VALUES
(24, 'Testando da silva', 'user@user.com', '$2y$10$QoMViCRPRIpvHCZbftfGzejE7IPTN6xWeAEzBWX0voCsSjwYsybfS', 0, NULL),
(25, 'Testando Adm', 'adm@adm.com', '$2y$10$h8Sde8BNocqPM4Oo4/MWtuI2Zjmx7H7oAetg8Q5kAnQj3pQAJMl0W', 2, NULL),
(26, 'Clinica teste', 'clinica@clinica.com', '$2y$10$yDObtSkSV5134sutoNv/3ecEk//F6NkLRPV0JE2sAmGTQDwT0wn/W', 1, NULL),
(27, 'Enzo', 'usuario1@gmail.com', '$2y$10$AJK0zQ83WvwvqFsI31u6A.S31PhP7GgJGN/CqK5mv9tJPCpk5xQgS', 0, NULL),
(28, 'Matheus', 'usuario2@gmail.com', '$2y$10$AJK0zQ83WvwvqFsI31u6A.S31PhP7GgJGN/CqK5mv9tJPCpk5xQgS', 0, NULL),
(29, 'Peshop da Belinha', 'belinha@gmail.com', '$2y$10$AJK0zQ83WvwvqFsI31u6A.S31PhP7GgJGN/CqK5mv9tJPCpk5xQgS', 1, NULL),
(30, 'Peshop do Bruno', 'bruno@gmail.com', '$2y$10$AJK0zQ83WvwvqFsI31u6A.S31PhP7GgJGN/CqK5mv9tJPCpk5xQgS', 1, NULL),
(32, 'Ketlyn', 'usuario3@gmail.com', '$2y$10$AJK0zQ83WvwvqFsI31u6A.S31PhP7GgJGN/CqK5mv9tJPCpk5xQgS', 0, NULL),
(33, 'JoÃ£o da Silvassauro', 'usuario4@gmail.com', '$2y$10$xVC.VmMXN0UJ2zOo/TELQ.yhnUchks0sGHFY7mOXFdEPb3xn.Z8pC', 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `raca`
--

CREATE TABLE `raca` (
  `idraca` int(11) NOT NULL,
  `raca` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tipoespecie` tinyint(4) NOT NULL COMMENT '0 pra cachorro; 1 pra gato; 2 para os dois'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `raca`
--

INSERT INTO `raca` (`idraca`, `raca`, `tipoespecie`) VALUES
(1, 'Pastor AlemÃ£o', 0),
(2, 'Buldogue FrancÃªs', 0),
(3, 'Dog Qualquers', 0),
(4, 'SiamÃªs', 0),
(5, 'Persa', 1),
(6, 'Sphynx', 1),
(7, 'S.R.D - Sem RaÃ§a Definida', 2),
(8, 'Chow-chow', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `idlogin` int(11) NOT NULL,
  `rg` char(9) NOT NULL,
  `cpf` char(11) NOT NULL,
  `beneficio` tinyint(4) NOT NULL COMMENT '0 - Sem benefício; 1 - Benefício Soical; 2 - Protetor de Animais; 3 - Em análise',
  `telefone` varchar(10) DEFAULT NULL,
  `celular` varchar(11) NOT NULL,
  `whatsapp` tinyint(4) NOT NULL COMMENT '0 - Celular não é whatsapp; 1 - Celular é whatsapp',
  `punicao` tinyint(4) NOT NULL,
  `usurua` varchar(50) NOT NULL,
  `usubairro` varchar(50) NOT NULL,
  `usunumero` varchar(5) NOT NULL,
  `usucep` varchar(8) NOT NULL,
  `nis` char(11) DEFAULT NULL,
  `doccomprovante` varchar(255) DEFAULT NULL,
  `quantcastracoes` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idlogin`, `rg`, `cpf`, `beneficio`, `telefone`, `celular`, `whatsapp`, `punicao`, `usurua`, `usubairro`, `usunumero`, `usucep`, `nis`, `doccomprovante`, `quantcastracoes`) VALUES
(18, 24, '123', '123', 2, '123', '123', 0, 0, '123', '123', '123', '123', NULL, NULL, 3),
(19, 27, '551661230', '12345678900', 1, NULL, '11976798730', 0, 0, 'Rua das flores', 'Bairro teste', '125', '09875456', '12345678900', NULL, 2),
(20, 28, '400289226', '78945612300', 1, NULL, '11940028922', 0, 0, 'Rua Maluca', 'Bairro Louco', '123', '09875456', '78945612300', NULL, 0),
(21, 32, '12345678X', '12312305599', 0, NULL, '', 0, 0, 'GuardiÃ£o do MacarrÃ£o', 'Amondegas Flutuantes', '702', '05578654', NULL, NULL, 0),
(22, 33, '12345228X', '12312305511', 0, NULL, '11912345678', 0, 0, 'GuardiÃ£o do MacarrÃ£o', 'Amondegas Flutuantes', '700', '05578654', NULL, NULL, 0);

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
  ADD UNIQUE KEY `horario` (`horario`),
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
  MODIFY `idanimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `castracao`
--
ALTER TABLE `castracao`
  MODIFY `idcastracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clinica`
--
ALTER TABLE `clinica`
  MODIFY `idclinica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `raca`
--
ALTER TABLE `raca`
  MODIFY `idraca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
