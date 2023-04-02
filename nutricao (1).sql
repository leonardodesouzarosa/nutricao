-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Ago-2021 às 23:20
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nutricao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alimento`
--

CREATE TABLE `alimento` (
  `ID` int(11) NOT NULL,
  `DESCRICAO` varchar(15) DEFAULT NULL,
  `CATEGORIA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alimento`
--

INSERT INTO `alimento` (`ID`, `DESCRICAO`, `CATEGORIA`) VALUES
(1, 'Tomate', 1),
(2, 'Arroz', 4),
(3, 'Macarrão', 4),
(4, 'Frango', 3),
(5, 'Peixe', 3),
(6, 'Carne Bovina', 3),
(7, 'Uva', 1),
(8, 'Alface', 2),
(10, 'Morango', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio_semana`
--

CREATE TABLE `cardapio_semana` (
  `ID` int(11) NOT NULL,
  `SEMANA` int(11) NOT NULL,
  `PACIENTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cardapio_semana`
--

INSERT INTO `cardapio_semana` (`ID`, `SEMANA`, `PACIENTE`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 5, 1),
(4, 12, 1),
(5, 13, 1),
(6, 9, 1),
(7, 6, 1),
(8, 1, 2),
(9, 13, 2),
(10, 5, 2),
(11, 12, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_alimento`
--

CREATE TABLE `categoria_alimento` (
  `ID` int(11) NOT NULL,
  `DESCRICAO` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria_alimento`
--

INSERT INTO `categoria_alimento` (`ID`, `DESCRICAO`) VALUES
(1, 'Fruta'),
(2, 'Verdura'),
(3, 'Carne'),
(4, 'Carboidrato');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nutricionista`
--

CREATE TABLE `nutricionista` (
  `ID` int(11) NOT NULL,
  `CODPESSOA` int(11) DEFAULT NULL,
  `CRN` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nutricionista`
--

INSERT INTO `nutricionista` (`ID`, `CODPESSOA`, `CRN`) VALUES
(3, 3, '7842435'),
(4, 4, '5616516');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `ID` int(11) NOT NULL,
  `CODPESSOA` int(11) DEFAULT NULL,
  `ALTURA` decimal(3,2) DEFAULT NULL,
  `PESO` decimal(5,2) DEFAULT NULL,
  `IMC` varchar(5) DEFAULT NULL,
  `CLASSIFICACAO` varchar(15) DEFAULT NULL,
  `OBESIDADE` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`ID`, `CODPESSOA`, `ALTURA`, `PESO`, `IMC`, `CLASSIFICACAO`, `OBESIDADE`) VALUES
(1, 7, NULL, NULL, NULL, NULL, NULL),
(2, 8, NULL, NULL, NULL, NULL, NULL),
(3, 9, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente_nutricionista`
--

CREATE TABLE `paciente_nutricionista` (
  `ID` int(11) NOT NULL,
  `PACIENTE` int(11) NOT NULL,
  `NUTRICIONISTA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `paciente_nutricionista`
--

INSERT INTO `paciente_nutricionista` (`ID`, `PACIENTE`, `NUTRICIONISTA`) VALUES
(2, 1, 3),
(3, 3, 3),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(50) DEFAULT NULL,
  `CPF` varchar(20) DEFAULT NULL,
  `SEXO` varchar(2) DEFAULT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  `TELEFONE` varchar(20) DEFAULT NULL,
  `FOTO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`ID`, `NOME`, `CPF`, `SEXO`, `EMAIL`, `TELEFONE`, `FOTO`) VALUES
(3, 'João Carlos', '222.222.222-22', 'M', 'nutri@gmail.com', '(56) 49849-4162', '1.jpg'),
(4, 'Maria Clara', '666.666.666-66', 'F', 'maria@gmail.com', '(11) 11111-11', '2.jpg'),
(7, 'Felipe da Silva', '542.985.734-23', 'M', 'felipe@gmail.com', '(12) 89473-2984', '3.jpg'),
(8, 'Melissa Araújo', '859.723.894-79', 'F', 'mel@gmail,com', '(38) 94272-3498', '4.jpg'),
(9, 'Cristian Silva', '145.839.485-92', 'M', 'cris@gmail.com', '(23) 94832-0934', 'imagem3.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `refeicao`
--

CREATE TABLE `refeicao` (
  `ID` int(11) NOT NULL,
  `DESCRICAO` varchar(20) DEFAULT NULL,
  `HORA_INICIAL` varchar(10) DEFAULT NULL,
  `HORA_FINAL` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `refeicao`
--

INSERT INTO `refeicao` (`ID`, `DESCRICAO`, `HORA_INICIAL`, `HORA_FINAL`) VALUES
(1, 'Café da Manhã', '06:00', '07:00'),
(2, 'Lanche da Tarde', '15:00', '16:00'),
(3, 'Lanche da Manhã', '09:00', '10:00'),
(4, 'Almoço', '11:30', '12:30'),
(5, 'Jantar', '19:00', '20:00'),
(7, 'Almoço', '12:00', '13:00'),
(9, 'Café da Manhã', '06:30', '07:30'),
(10, 'Café da Manhã', '07:00', '08:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `semana`
--

CREATE TABLE `semana` (
  `ID` int(11) NOT NULL,
  `DIASSEMANA` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `semana`
--

INSERT INTO `semana` (`ID`, `DIASSEMANA`) VALUES
(1, 'Segunda - Feira'),
(2, 'Terça - Feira'),
(5, 'Quarta - Feira'),
(6, 'Quinta - Feira'),
(9, 'Sexta - Feira'),
(12, 'Sábado'),
(13, 'Domingo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(50) DEFAULT NULL,
  `CPF` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `SENHA` varchar(50) DEFAULT NULL,
  `NIVEL` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `NOME`, `CPF`, `EMAIL`, `SENHA`, `NIVEL`) VALUES
(1, 'Administrador', '00000000000', 'admin@gmail.com', 'admin', 'admin'),
(2, 'João Carlos', '222.222.222-22', 'nutri@gmail.com', 'nutri', 'nutricionista');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alimento`
--
ALTER TABLE `alimento`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CATEGORIA` (`CATEGORIA`);

--
-- Índices para tabela `cardapio_semana`
--
ALTER TABLE `cardapio_semana`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `categoria_alimento`
--
ALTER TABLE `categoria_alimento`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `nutricionista`
--
ALTER TABLE `nutricionista`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CODPESSOA` (`CODPESSOA`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CODPESSOA` (`CODPESSOA`);

--
-- Índices para tabela `paciente_nutricionista`
--
ALTER TABLE `paciente_nutricionista`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `refeicao`
--
ALTER TABLE `refeicao`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `semana`
--
ALTER TABLE `semana`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alimento`
--
ALTER TABLE `alimento`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cardapio_semana`
--
ALTER TABLE `cardapio_semana`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `categoria_alimento`
--
ALTER TABLE `categoria_alimento`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `nutricionista`
--
ALTER TABLE `nutricionista`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `paciente_nutricionista`
--
ALTER TABLE `paciente_nutricionista`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `refeicao`
--
ALTER TABLE `refeicao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `semana`
--
ALTER TABLE `semana`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alimento`
--
ALTER TABLE `alimento`
  ADD CONSTRAINT `alimento_ibfk_1` FOREIGN KEY (`CATEGORIA`) REFERENCES `categoria_alimento` (`ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `nutricionista`
--
ALTER TABLE `nutricionista`
  ADD CONSTRAINT `nutricionista_ibfk_1` FOREIGN KEY (`CODPESSOA`) REFERENCES `pessoa` (`ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`CODPESSOA`) REFERENCES `pessoa` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
