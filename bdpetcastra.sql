-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 04-Jul-2022 às 01:31
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
-- Database: `bdpetcastra`
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
  `codchip` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`idanimal`, `idusuario`, `idraca`, `aninome`, `especie`, `sexo`, `cor`, `pelagem`, `porte`, `idade`, `comunitario`, `foto`, `codchip`) VALUES
(29, 23, 5, 'Pitituca', 1, 0, 'Preto e branco', 0, 1, 5, 0, '6252afffc12a828347cb34fbc9377652.jpg', ''),
(30, 23, 1, 'Bob', 0, 0, 'caramelo', 1, 0, 3, 0, '2dfb1a0267f3441299b5e024cb35097b.jpg', NULL),
(32, 24, 7, 'Roger', 0, 1, 'Branco', 1, 1, 2, 1, '6e33a132f63ae84fc6c197471d94d9e3.jpg', NULL),
(33, 25, 7, 'Cadu', 0, 1, 'branco', 2, 1, 2, 0, '3ac52dbb1ab458fd3ad53ac6bfe96a97.jpg', '165464861113216'),
(34, 26, 7, 'Bob', 1, 1, 'Marrom', 1, 1, 2, 0, 'fa1048a3b2d3dfe6bb1affc3d0a7ac75.jpg', '222542727878278'),
(35, 26, 7, 'fred', 0, 1, 'Branco', 1, 1, 3, 1, '8ad083793b1141cbd0084129b75fd218.jpg', '515151615151'),
(36, 26, 7, 'roger', 0, 1, 'Marrom', 1, 1, 5, 1, '712356345e7494b41d361fc8bef5f6c8.jpg', '51151515151515'),
(37, 26, 4, 'lux', 1, 0, 'Marrom', 0, 0, 4, 0, '7bc32a262fa76ce628cad42a0808d653.jpg', '12121151515'),
(38, 26, 7, 'ronaldo', 0, 1, 'Branco', 1, 0, 2, 0, '41c6fa2d51741a07cc734a8453e56567.jpg', '47474747474747'),
(39, 26, 7, 'eren', 1, 1, 'Marrom', 1, 1, 1, 1, '821d5b05d27968a26abfdac990856d4b.jpg', '131313131313'),
(40, 26, 7, 'francisco', 0, 1, 'Branco', 0, 0, 5, 1, '0e85c3e9e753b86e36ae758d03314ac7.jpg', NULL),
(41, 25, 4, 'lux', 1, 0, 'Marrom', 0, 0, 2, 1, 'fb93f930933de0206d6ae23a4f000c89.jpg', '1212121212121'),
(42, 25, 7, 'mufasa', 0, 1, 'caramelo', 0, 0, 2, 0, 'd21df72f3444238bfd2de11509815597.jpg', '989898989898'),
(43, 25, 2, 'roger', 0, 1, 'branco', 0, 0, 4, 0, 'f48977888680cb6c0cc3c3b0b3d5a532.jpg', '656565655665565'),
(44, 25, 1, 'francisco', 0, 1, 'Marrom', 0, 1, 2, 1, 'd61122e366e5d7a1c5d0800ba7eb56a0.jpg', '42342342342342'),
(45, 25, 7, 'garfild', 1, 1, 'caramelo', 0, 0, 2, 0, '0449ffd6b6bce24f35a868c2762935d0.jpg', '545454545454545'),
(46, 25, 2, 'robertinho', 0, 1, 'caramelo', 0, 0, 2, 0, 'd8ac632d1db424d2f79004d190d4ce46.jpg', '454554545454545'),
(47, 25, 2, 'Mel', 0, 0, 'Branco', 1, 0, 3, 0, '84e53acdfe3b3871fc645d16d37f7e13.jpg', '898998898998988'),
(48, 25, 7, 'xuxu', 1, 0, 'branco', 1, 1, 4, 0, '5c79962c59c8d1636c900db39b5b6c08.jpg', '123456789987984'),
(49, 25, 7, 'pucca', 0, 0, 'caramelo', 0, 1, 4, 1, 'cadadfb65611781b41271dcc70915f79.jpg', NULL),
(50, 25, 7, 'puminho', 1, 1, 'Branco', 0, 0, 4, 0, '32c77765e4026eb6e7b085f90ca74cb1.jpg', '454545454545454'),
(51, 25, 1, 'graci', 0, 0, 'Branco', 0, 0, 5, 0, '26c8b2ce0eab2729f0f10edd2b3cf913.jpg', '4545454568678'),
(52, 25, 4, 'Juju', 1, 0, 'Marrom', 0, 0, 3, 0, '2739bd4130cec5dec36523bfb708043b.jpg', '787878787878'),
(53, 25, 1, 'fernando', 0, 1, 'Marrom', 0, 0, 2, 0, 'db31e3dcb2d22fa610df034d64d67f89.jpg', '484848484848'),
(54, 25, 8, 'RomÃ©rio', 0, 1, 'caramelo', 0, 0, 4, 0, '52723bdf5be7a9c374cf3099857114ec.jpg', NULL),
(55, 25, 7, 'bob marley', 0, 1, 'Marrom', 0, 0, 4, 0, '9626c46ac52419597e7a61be92e70234.jpg', '666363636666'),
(56, 25, 4, 'sun', 1, 0, 'Branco', 0, 0, 4, 0, '47ecc9ed23e5e0dc5b6465734c4d63cf.jpg', '787887878787'),
(57, 25, 2, 'goiaba', 0, 1, 'Branco', 0, 0, 2, 0, '6a4e64666913e76c3a92782fe7ef68bd.jpg', '411411414144141'),
(58, 25, 4, 'Luna', 1, 0, 'Marrom', 0, 0, 2, 0, 'a740904bc49b77a13aa5d1ddba9d6ad2.jpg', NULL),
(59, 25, 1, 'vagner', 0, 1, 'Branco', 0, 0, 2, 0, '352ccc1212016603e2cbce1142cbeeca.jpg', '4242424242424'),
(60, 25, 1, 'bonnie', 0, 1, 'Marrom', 0, 0, 4, 0, '1881664e22d9308d91d0932687e64849.jpg', '566556656656'),
(61, 25, 1, 'bruno', 0, 1, 'branco', 0, 0, 7, 0, 'd751759bee36a9c8d908a50ed645ea2c.jpg', '2232323233223'),
(62, 25, 4, 'moon', 1, 0, 'Marrom', 0, 0, 2, 0, 'c882624e1f2735074c90736de950aa0f.jpg', '77777777777'),
(63, 25, 1, 'booob', 0, 1, 'branca', 0, 0, 5, 0, '0c386476bed682116b2d5c104ba15425.jpg', '156546514564545'),
(64, 25, 1, 'hiago', 0, 1, 'branca', 0, 0, 4, 0, '673ad4ff72e8976911087df0a1f0872a.jpg', '656656665665'),
(65, 25, 4, 'rogerinho', 1, 1, 'branca', 0, 0, 2, 0, '8d10edb4aa6a3fdf9671ad79b5fad686.jpg', '99999999999'),
(66, 25, 1, 'Pantera', 0, 0, 'preto', 0, 0, 5, 0, '270a6698355d5c3b4cbe520903661dea.jpg', '8888888888');

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
(12, 29, 6, NULL, 1, '', NULL),
(13, 30, 5, NULL, 1, '', NULL),
(14, 33, 5, '2022-06-30 17:00:00', 2, '', NULL),
(15, 34, 5, '2022-06-21 17:11:00', 2, '', NULL),
(16, 35, 5, '2022-06-30 20:20:00', 2, 'dipirona', NULL),
(17, 36, 5, '2022-06-28 18:26:00', 2, 'alergia a dipirona ', NULL),
(18, 37, 5, '2022-06-29 17:35:00', 2, 'alergia a dipirona', NULL),
(19, 38, 5, '2022-06-25 11:40:00', 2, 'tem dores na perna traseira esquerda :(', NULL),
(20, 39, 5, '2022-06-26 19:48:00', 2, 'dores na pata dianteira', NULL),
(21, 40, 5, '2022-06-29 12:12:00', 4, 'Alergia a dipirona', NULL),
(22, 41, 5, '2022-06-22 09:25:00', 2, '', NULL),
(23, 42, 5, '2022-06-28 20:17:00', 2, '', NULL),
(24, 43, 5, '2022-06-29 12:41:00', 2, '', NULL),
(25, 44, 5, '2022-06-28 14:00:00', 2, '', NULL),
(26, 45, 5, '2022-06-28 14:42:00', 2, 'dores na pata traseira', NULL),
(27, 46, 5, '2022-06-29 12:44:00', 2, '', NULL),
(28, 47, 5, '2022-06-28 21:50:00', 2, '', NULL),
(29, 48, 5, '2022-06-22 17:00:00', 2, 'alergia a dipirona', NULL),
(30, 49, 5, '2022-07-01 18:01:00', 7, 'alergia a dipirona e dor nas patas esquerdas', NULL),
(31, 50, 5, '2022-06-29 13:54:00', 2, '', NULL),
(32, 51, 5, '2022-06-30 16:00:00', 2, '', NULL),
(33, 52, 5, '2022-06-23 00:08:00', 2, '', NULL),
(34, 53, 5, '2022-06-29 16:20:00', 2, '', NULL),
(35, 54, 5, '2022-06-28 15:31:00', 1, 'dor na pata traseira', NULL),
(36, 55, 5, '2022-06-28 14:48:00', 2, '', NULL),
(37, 56, 5, '2022-06-30 22:45:00', 2, '', NULL),
(38, 57, 5, '2022-06-21 22:52:00', 2, '', NULL),
(39, 58, 5, '2022-06-28 15:00:00', 1, '', NULL),
(40, 59, 5, '2022-06-22 17:05:00', 2, '', NULL),
(41, 60, 5, '2022-06-28 15:15:00', 2, '', NULL),
(42, 61, 5, '2022-06-28 17:26:00', 2, '', NULL),
(43, 62, 5, '2022-06-27 09:30:00', 2, '', NULL),
(44, 63, 5, '2022-06-24 22:36:00', 2, 'alergia a dipirona', NULL),
(45, 64, 5, '2022-06-21 15:48:00', 2, '', NULL),
(46, 65, 5, '2022-06-27 12:00:00', 2, '', NULL),
(47, 66, 5, '2022-06-28 16:10:00', 2, '', NULL);

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
(5, 35, '46549846468846', '1148192332', 116, 'Rua EstaÃ§Ã£o Franco da Rocha', 'Portal da EstaÃ§Ã£o', '300', '07868010', 1),
(6, 39, '46549846156460', '1148192332', 150, 'Rua EstaÃ§Ã£o Botujuru', 'Portal da EstaÃ§Ã£o', '28', '07868050', 1);

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
(1, 'Administrador', 'adm@adm.com', '$2y$10$h8Sde8BNocqPM4Oo4/MWtuI2Zjmx7H7oAetg8Q5kAnQj3pQAJMl0W', 2, NULL),
(34, 'Miguel Henrique Guerreiro Silva', 'miguelhenriquegs369@gmail.com', '$2y$10$qGVoHysxHQNT860fyz9RM.hBF8rJrOpJpfVHwGzsFRnbHkJkAaOv2', 0, NULL),
(35, 'ClÃ­nica Teste', 'clinica.teste@gmail.com', '$2y$10$4UScpWuFmo0aNE78d.IGMeHKX1zKT62ketB8nFpHRLMuK.UeK6aAC', 1, NULL),
(36, 'Matheus Pereira', 'matheus12@gmail.com', '$2y$10$pE/KSJ6CaN0EQYp4QGTKrO3IQhGFYoDPNi0tAx3PdEVfvkbcWrN0i', 0, NULL),
(37, 'Usuario', 'barbosaticyanne1@gmail.com', '$2y$10$fK7FN67teiaVxBeeHD28p.hsIa3DZlGoLpTFAlC34WBZ5.bZzjPKy', 0, NULL),
(38, 'Ketlyn', 'cestariketlyn@gmail.com', '$2y$10$CE6.z2G08nfYYJ6jG2KnMuGcJgCC18T//HOpaTSWmcgNWzhcFW/uC', 0, NULL),
(39, 'clinica 2', 'barbosa.sticyanne@gmail.com', '$2y$10$kBAep9IujM1k0HJjvzs2Eez8Unzz986wLRu5rUHrAMCfS.ZD3vAWW', 1, NULL);

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
(4, 'SiamÃªs', 1),
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
(23, 34, '231365654', '51520752881', 1, '1196515224', '11965152246', 1, 0, 'Rua EstaÃ§Ã£o Botujuru', 'Portal da EstaÃ§Ã£o', '29', '07868050', '21354648464', '4651e9d28a5d4d96b929e92a95678a86.jpg', 2),
(24, 36, '231365654', '84264888972', 0, '1196515224', '11965152246', 1, 0, 'Rua EstaÃ§Ã£o Botujuru', 'Portal da EstaÃ§Ã£o', '300', '07868050', NULL, '7f67ae65396ea3e2987f42e483014d5a.jpg', 1),
(25, 37, '231365654', '68213324013', 0, NULL, '11965152246', 1, 0, 'Rua EstaÃ§Ã£o Franco da Rocha', 'Portal da EstaÃ§Ã£o', '365', '07868010', NULL, '15236294860067616103f82e5af888de.jpg', 1),
(26, 38, '231365654', '51560077832', 0, '1196515224', '11965152246', 1, 0, 'Rua EstaÃ§Ã£o Botujuru', 'Portal da EstaÃ§Ã£o', '300', '07868050', NULL, '801075735f87505a178e9920629942b3.jpg', 1);

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
  MODIFY `idanimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `castracao`
--
ALTER TABLE `castracao`
  MODIFY `idcastracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `clinica`
--
ALTER TABLE `clinica`
  MODIFY `idclinica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `raca`
--
ALTER TABLE `raca`
  MODIFY `idraca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  ADD CONSTRAINT `fkidanimal_castracao` FOREIGN KEY (`idanimal`) REFERENCES `animal` (`idanimal`) ON DELETE CASCADE,
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
