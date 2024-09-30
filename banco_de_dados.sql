-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/09/2024 às 01:12
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `conselho`
--
CREATE DATABASE IF NOT EXISTS `conselho` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `conselho`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `Usuario_idusuario` int(11) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  `Turma` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`Usuario_idusuario`, `matricula`, `Turma`) VALUES
(1, '20211SL.TII_I0001', 'Info4'),
(2, '20211SL.SER_S0001', 'Ser4');

-- --------------------------------------------------------

--
-- Estrutura para tabela `aviso`
--

CREATE TABLE `aviso` (
  `idAviso` int(11) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `professor_Usuario_idusuario` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `aviso`
--

INSERT INTO `aviso` (`idAviso`, `mensagem`, `data`, `professor_Usuario_idusuario`, `usuario_idusuario`) VALUES
(1, 'Teste', '0000-00-00', 4, 1),
(2, 'Teste1', '0000-00-00', 4, 2),
(3, 'Teste2', '0000-00-00', 4, 3),
(4, 'Data limite xx/xx', '0000-00-00', 4, 1),
(5, 'Teste3', '0000-00-00', 4, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `curso`
--

INSERT INTO `curso` (`idCurso`, `nome`) VALUES
(1, 'Informática internet'),
(2, 'Energias renováveis'),
(3, 'Eletro eletrônica');

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `idDisciplina` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `disciplina`
--

INSERT INTO `disciplina` (`idDisciplina`, `nome`) VALUES
(1, 'Matemática4'),
(2, 'Inglês4'),
(3, 'DAW'),
(4, 'Meteorologia'),
(5, 'TEC');

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina_has_curso`
--

CREATE TABLE `disciplina_has_curso` (
  `Disciplina_idDisciplina` int(11) NOT NULL,
  `Curso_idCurso` int(11) NOT NULL,
  `Professor_Usuario_idusuario` int(11) NOT NULL,
  `Grade_curricular_anual_idGrade` int(11) NOT NULL,
  `parecer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `disciplina_has_curso`
--

INSERT INTO `disciplina_has_curso` (`Disciplina_idDisciplina`, `Curso_idCurso`, `Professor_Usuario_idusuario`, `Grade_curricular_anual_idGrade`, `parecer`) VALUES
(1, 1, 3, 1, 'turma falta muito a aula'),
(1, 3, 5, 3, NULL),
(2, 1, 5, 1, 'falta entrega trabalhos'),
(3, 1, 4, 1, NULL),
(4, 2, 3, 2, NULL),
(5, 3, 5, 3, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `documento`
--

CREATE TABLE `documento` (
  `idDocumento` int(11) NOT NULL,
  `prazo_A` datetime NOT NULL,
  `trimestre` tinyint(4) NOT NULL,
  `representantes` varchar(255) DEFAULT NULL,
  `conselheiro` varchar(255) DEFAULT NULL,
  `participantes` varchar(255) DEFAULT NULL,
  `Aluno_Usuario_idusuario` int(11) NOT NULL,
  `Grade_curricular_anual_idGrade` int(11) NOT NULL,
  `prazo_P` datetime DEFAULT '2024-12-31 23:59:59'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `documento`
--

INSERT INTO `documento` (`idDocumento`, `prazo_A`, `trimestre`, `representantes`, `conselheiro`, `participantes`, `Aluno_Usuario_idusuario`, `Grade_curricular_anual_idGrade`, `prazo_P`) VALUES
(1, '2024-12-31 23:59:59', 1, 'eu desisto', 'conselheiro teste', 'deus', 1, 1, '2024-12-31 23:59:59'),
(2, '2024-12-15 23:59:59', 1, 'Representantes B', 'Conselheiro B', 'Participantes B', 2, 2, '2024-12-31 23:59:59');

-- --------------------------------------------------------

--
-- Estrutura para tabela `grade_curricular_anual`
--

CREATE TABLE `grade_curricular_anual` (
  `idGrade` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `grade_curricular_anual`
--

INSERT INTO `grade_curricular_anual` (`idGrade`, `descricao`) VALUES
(1, 'Grade 2024 Informática'),
(2, 'Grade 2024 Energias Renováveis'),
(3, 'Grade 2024 Eletro Eletrônica'),
(4, 'Grade 2023 Informática'),
(5, 'Grade 2023 Energias Renováveis');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `Usuario_idusuario` int(11) NOT NULL,
  `coordenador` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`Usuario_idusuario`, `coordenador`) VALUES
(3, NULL),
(4, 'i'),
(5, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `resposta`
--

CREATE TABLE `resposta` (
  `idResposta` int(11) NOT NULL,
  `questao` tinyint(4) NOT NULL,
  `valor` tinyint(4) DEFAULT NULL,
  `texto` varchar(255) NOT NULL,
  `Documento_idDocumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `resposta`
--

INSERT INTO `resposta` (`idResposta`, `questao`, `valor`, `texto`, `Documento_idDocumento`) VALUES
(1, 1, 3, 'teste 1', 1),
(2, 2, NULL, 'lore ipsum', 1),
(3, 3, 3, 'ta funcionando prr', 1),
(4, 4, 3, 'eu amo programação', 1),
(5, 5, 3, 'eu odeio banco', 1),
(6, 6, 3, 'funcionou', 1),
(7, 7, 3, 'yupiiii', 1),
(8, 8, 1, 'meu ', 1),
(9, 9, NULL, 'lore ipsum', 1),
(10, 1, 3, 'lore ipsum2', 2),
(11, 2, NULL, 'lore ipsum2', 2),
(12, 3, 3, 'lore ipsum2', 2),
(13, 4, 3, 'lore ipsum2', 2),
(14, 5, 3, 'lore ipsum2', 2),
(15, 6, 3, 'lore ipsum2', 2),
(16, 7, 3, 'lore ipsum2', 2),
(17, 8, 3, 'lore ipsum2', 2),
(18, 9, NULL, 'lore ipsum2', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `professor` tinyint(1) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `login`, `senha`, `professor`, `nome`) VALUES
(1, 'TII_I20211', 'banana', 0, 'Vinicius'),
(2, 'SER_S20211', 'banana', 0, 'Gustavo'),
(3, 'JoãoMoraes', 'banana', 1, 'João'),
(4, 'RebecaFiss', 'banana', 1, 'Rebeca'),
(5, 'KauêVargas', 'banana', 1, 'Kauê');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`Usuario_idusuario`);

--
-- Índices de tabela `aviso`
--
ALTER TABLE `aviso`
  ADD PRIMARY KEY (`idAviso`),
  ADD KEY `fk_Aviso_professor1` (`professor_Usuario_idusuario`),
  ADD KEY `fk_Aviso_usuario1` (`usuario_idusuario`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Índices de tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`idDisciplina`);

--
-- Índices de tabela `disciplina_has_curso`
--
ALTER TABLE `disciplina_has_curso`
  ADD PRIMARY KEY (`Disciplina_idDisciplina`,`Curso_idCurso`,`Professor_Usuario_idusuario`,`Grade_curricular_anual_idGrade`),
  ADD KEY `fk_Disciplina_has_Curso_Curso1` (`Curso_idCurso`),
  ADD KEY `fk_Disciplina_has_Curso_Professor1` (`Professor_Usuario_idusuario`),
  ADD KEY `fk_disciplina_has_curso_Grade_curricular_anual1` (`Grade_curricular_anual_idGrade`);

--
-- Índices de tabela `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`idDocumento`),
  ADD KEY `fk_Documento_Aluno1` (`Aluno_Usuario_idusuario`),
  ADD KEY `fk_documento_Grade_curricular_anual1` (`Grade_curricular_anual_idGrade`);

--
-- Índices de tabela `grade_curricular_anual`
--
ALTER TABLE `grade_curricular_anual`
  ADD PRIMARY KEY (`idGrade`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`Usuario_idusuario`);

--
-- Índices de tabela `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`idResposta`),
  ADD KEY `fk_Resposta_Documento1` (`Documento_idDocumento`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aviso`
--
ALTER TABLE `aviso`
  MODIFY `idAviso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `idDisciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `documento`
--
ALTER TABLE `documento`
  MODIFY `idDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `grade_curricular_anual`
--
ALTER TABLE `grade_curricular_anual`
  MODIFY `idGrade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `resposta`
--
ALTER TABLE `resposta`
  MODIFY `idResposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_Aluno_Usuario` FOREIGN KEY (`Usuario_idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Restrições para tabelas `aviso`
--
ALTER TABLE `aviso`
  ADD CONSTRAINT `fk_Aviso_professor1` FOREIGN KEY (`professor_Usuario_idusuario`) REFERENCES `professor` (`Usuario_idusuario`),
  ADD CONSTRAINT `fk_Aviso_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Restrições para tabelas `disciplina_has_curso`
--
ALTER TABLE `disciplina_has_curso`
  ADD CONSTRAINT `fk_Disciplina_has_Curso_Curso1` FOREIGN KEY (`Curso_idCurso`) REFERENCES `curso` (`idCurso`),
  ADD CONSTRAINT `fk_Disciplina_has_Curso_Disciplina1` FOREIGN KEY (`Disciplina_idDisciplina`) REFERENCES `disciplina` (`idDisciplina`),
  ADD CONSTRAINT `fk_Disciplina_has_Curso_Professor1` FOREIGN KEY (`Professor_Usuario_idusuario`) REFERENCES `professor` (`Usuario_idusuario`),
  ADD CONSTRAINT `fk_disciplina_has_curso_Grade_curricular_anual1` FOREIGN KEY (`Grade_curricular_anual_idGrade`) REFERENCES `grade_curricular_anual` (`idGrade`);

--
-- Restrições para tabelas `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `fk_Documento_Aluno1` FOREIGN KEY (`Aluno_Usuario_idusuario`) REFERENCES `aluno` (`Usuario_idusuario`),
  ADD CONSTRAINT `fk_documento_Grade_curricular_anual1` FOREIGN KEY (`Grade_curricular_anual_idGrade`) REFERENCES `grade_curricular_anual` (`idGrade`);

--
-- Restrições para tabelas `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_Professor_Usuario1` FOREIGN KEY (`Usuario_idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Restrições para tabelas `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `fk_Resposta_Documento1` FOREIGN KEY (`Documento_idDocumento`) REFERENCES `documento` (`idDocumento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
