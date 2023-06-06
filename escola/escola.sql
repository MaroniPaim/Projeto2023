-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jan-2023 às 15:56
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escola`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `nacionalidade` varchar(20) NOT NULL,
  `idade` int(11) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `num` int(11) DEFAULT 0,
  `compl` varchar(10) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `ddd` varchar(5) NOT NULL,
  `fone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome_aluno`, `cpf`, `senha`, `sexo`, `nacionalidade`, `idade`, `cep`, `rua`, `num`, `compl`, `bairro`, `cidade`, `estado`, `ddd`, `fone`) VALUES
(1, 'Jupira da Farofa', '123', '356a192b7913b04c54574d18c28d46e6395428ab', 'M', 'Brasileiro', 41, '24-000', 'rua', 0, 'compl', 'bairro', 'cidade', 'RJ', '021', '0000515'),
(2, 'Pedro Ventura Vuktech', '19999999999', '356a192b7913b04c54574d18c28d46e6395428ab', 'M', 'Chinapaules', 22, '20222222', 'Rua do pau', 1, '10', 'Bucetopolis', 'Belo Horizonte', 'Mi', '21', '999999999'),
(3, 'Lucas', '111111111', '356a192b7913b04c54574d18c28d46e6395428ab', 'M', '', 0, '', '', 0, '', '', '', '', '', ''),
(4, 'Bruno', '000000000000', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'M', '', 0, '', '', 0, '', '', '', '', '', ''),
(5, 'Juliana', '0000000000001', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'M', '', 0, '', '', 0, '', '', '', '', '', ''),
(6, 'Cleber', '000000000000000', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'M', '', 0, '', '', 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_turmas`
--

CREATE TABLE `alunos_turmas` (
  `id_alunos_turmas` int(11) NOT NULL,
  `fk_id_aluno` int(11) DEFAULT NULL,
  `fk_id_turma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos_turmas`
--

INSERT INTO `alunos_turmas` (`id_alunos_turmas`, `fk_id_aluno`, `fk_id_turma`) VALUES
(18, 1, 10),
(19, 1, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(50) NOT NULL,
  `carga_horaria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome_curso`, `carga_horaria`) VALUES
(11, 'Matematica', 10),
(12, 'Portugues', 10),
(13, 'Geografia', 10),
(14, 'História', 10),
(15, 'Artes', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE `notas` (
  `id_nota` int(11) NOT NULL,
  `nota` float NOT NULL,
  `fk_id_aluno` int(11) DEFAULT NULL,
  `fk_id_turma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notas`
--

INSERT INTO `notas` (`id_nota`, `nota`, `fk_id_aluno`, `fk_id_turma`) VALUES
(9, 10, 1, 9),
(10, 5, 1, 9),
(12, 10, 1, 9),
(13, 10, 1, 9),
(14, 9, 1, 9),
(15, 5, 1, 9),
(16, 10, 1, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id_professor` int(11) NOT NULL,
  `nome_prof` varchar(50) DEFAULT NULL,
  `cpf_prof` varchar(20) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id_professor`, `nome_prof`, `cpf_prof`, `senha`) VALUES
(1, 'Lucas Maroni Paim', '18130185709', '356a192b7913b04c54574d18c28d46e6395428ab'),
(5, 'Jorge', '147258', '356a192b7913b04c54574d18c28d46e6395428ab'),
(6, 'Benito', '159357', '356a192b7913b04c54574d18c28d46e6395428ab'),
(7, 'Matheus', '369258', '356a192b7913b04c54574d18c28d46e6395428ab'),
(8, 'Marcio', '56451618946315565648', '356a192b7913b04c54574d18c28d46e6395428ab'),
(9, 'Lucas 2', '1651336148965132', '356a192b7913b04c54574d18c28d46e6395428ab');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id_turma` int(11) NOT NULL,
  `fk_id_curso` int(11) DEFAULT NULL,
  `fk_id_professor` int(11) DEFAULT NULL,
  `periodo_letivo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id_turma`, `fk_id_curso`, `fk_id_professor`, `periodo_letivo`) VALUES
(7, 14, 7, '2023-01-12'),
(8, 13, 6, '2023-01-12'),
(9, 12, 5, '2023-01-12'),
(10, 15, 5, '2023-01-12'),
(11, 11, 8, '2023-01-16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `login`, `senha`) VALUES
(1, 'Lucas', '356a192b7913b04c54574d18c28d46e6395428ab');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `alunos_turmas`
--
ALTER TABLE `alunos_turmas`
  ADD PRIMARY KEY (`id_alunos_turmas`),
  ADD KEY `fk_id_aluno` (`fk_id_aluno`),
  ADD KEY `fk_id_turmas` (`fk_id_turma`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `fk_id_aluno` (`fk_id_aluno`),
  ADD KEY `fk_id_turma` (`fk_id_turma`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id_professor`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `fk_id_curso` (`fk_id_curso`),
  ADD KEY `fk_id_professor` (`fk_id_professor`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `alunos_turmas`
--
ALTER TABLE `alunos_turmas`
  MODIFY `id_alunos_turmas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alunos_turmas`
--
ALTER TABLE `alunos_turmas`
  ADD CONSTRAINT `alunos_turmas_ibfk_1` FOREIGN KEY (`fk_id_aluno`) REFERENCES `alunos` (`id_aluno`),
  ADD CONSTRAINT `alunos_turmas_ibfk_2` FOREIGN KEY (`fk_id_turma`) REFERENCES `turmas` (`id_turma`);

--
-- Limitadores para a tabela `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`fk_id_aluno`) REFERENCES `alunos` (`id_aluno`),
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`fk_id_turma`) REFERENCES `turmas` (`id_turma`);

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`fk_id_curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `turmas_ibfk_2` FOREIGN KEY (`fk_id_professor`) REFERENCES `professores` (`id_professor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
