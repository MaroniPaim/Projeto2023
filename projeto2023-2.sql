-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 06/06/2023 às 19:45
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto2023`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cheques`
--

CREATE TABLE `cheques` (
  `cheque_id` int(11) NOT NULL,
  `fk_id_cliente` int(11) DEFAULT NULL,
  `Valor` float DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `entregue_a` varchar(50) DEFAULT NULL,
  `FK_id_foto` int(11) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes_cadastros`
--

CREATE TABLE `clientes_cadastros` (
  `Id_Cliente` int(11) NOT NULL,
  `Nome_Cliente` varchar(50) DEFAULT NULL,
  `CNPJ_CPF` varchar(50) DEFAULT NULL,
  `nome_responsavel` varchar(50) DEFAULT NULL,
  `UF` varchar(2) DEFAULT NULL,
  `Cidade` varchar(50) DEFAULT NULL,
  `Mercadoria` varchar(50) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL,
  `nome_fantasia` varchar(50) DEFAULT NULL,
  `razao_social` varchar(50) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `inscricao_estadual` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes_cadastros`
--

INSERT INTO `clientes_cadastros` (`Id_Cliente`, `Nome_Cliente`, `CNPJ_CPF`, `nome_responsavel`, `UF`, `Cidade`, `Mercadoria`, `log`, `nome_fantasia`, `razao_social`, `endereco`, `inscricao_estadual`, `email`, `telefone`) VALUES
(100, 'Nome teste', '00.000.000/0001-00', 'Nome teste', 'UF', 'Cidade', 'Produtos', 'Log Teste', 'Fantasia', 'Razao teste', 'Endereco teste', '11111111', 'Teste@email.com', '00-00000-0000'),
(101, 'Nome do cliente', 'CPF CNPJ', 'Responsavel', 'UF', 'Cidade', 'Memoria', '18130185709 Lucas Maroni Paim @ 23/05/25 02:53:30', 'Nome fantasia', 'Razão Social', 'Endereco', 'Insc Estadual', 'Email@gmail.com', 'telefone');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes_pedidos`
--

CREATE TABLE `clientes_pedidos` (
  `ID_vendas` int(11) NOT NULL,
  `fk_id_cliente` int(11) DEFAULT NULL,
  `Metragem` float DEFAULT NULL,
  `ValorTotal` float DEFAULT NULL,
  `Referente_a` varchar(50) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente_pagamento`
--

CREATE TABLE `cliente_pagamento` (
  `id_pagamento_cliente` int(11) NOT NULL,
  `fk_id_cliente` int(11) DEFAULT NULL,
  `Valor_pago` float DEFAULT NULL,
  `Metodo_de_pagamento` varchar(50) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `referente_a` int(11) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `feiras`
--

CREATE TABLE `feiras` (
  `ID_feira` int(11) NOT NULL,
  `Nome_feira` varchar(50) DEFAULT NULL,
  `Lugar` varchar(50) DEFAULT NULL,
  `Data_inicio` date DEFAULT NULL,
  `Data_fim` date DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `feiras`
--

INSERT INTO `feiras` (`ID_feira`, `Nome_feira`, `Lugar`, `Data_inicio`, `Data_fim`, `log`) VALUES
(1, 'Riocentro Fevereiro 2023', 'Riocentro', '2023-02-08', '2023-02-12', 'Created by admin lucas'),
(2, 'Norte Shopping Abril 23', 'Norte Shopping', '2023-04-11', '2023-02-16', '18130185709 Lucas Maroni Paim @ 1676332817'),
(13, 'Riocentro Junho 2023', 'Riocentro', '2023-06-14', '2023-06-18', '18130185709 Lucas Maroni Paim @ 23/05/25 01:03:39');

-- --------------------------------------------------------

--
-- Estrutura para tabela `feira_extra`
--

CREATE TABLE `feira_extra` (
  `id_extra` int(11) NOT NULL,
  `fk_id_feira` int(11) DEFAULT NULL,
  `fk_id_cliente` int(11) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `obs` varchar(50) DEFAULT NULL,
  `log` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores_cadastro`
--

CREATE TABLE `fornecedores_cadastro` (
  `id_fornecedor` int(11) NOT NULL,
  `nome_fornecedor` varchar(50) DEFAULT NULL,
  `CNPJ_CPF` varchar(50) DEFAULT NULL,
  `Pix1` varchar(50) DEFAULT NULL,
  `favorecido1` varchar(50) DEFAULT NULL,
  `Pix2` varchar(50) DEFAULT NULL,
  `favorecido2` varchar(50) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedores_cadastro`
--

INSERT INTO `fornecedores_cadastro` (`id_fornecedor`, `nome_fornecedor`, `CNPJ_CPF`, `Pix1`, `favorecido1`, `Pix2`, `favorecido2`, `log`) VALUES
(100, 'Pedro Motta', '11151103730', '11151103730', 'Pedro Motta', NULL, NULL, '18130185709 Lucas Maroni Paim @ 23/03/21 06:11:59'),
(101, 'Renan Paim', '18178505723', 'renan@megagestante.com.br', 'Renan Maroni Paim', NULL, NULL, '18130185709 Lucas Maroni Paim @ 23/05/26 01:34:40');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores_pagamento`
--

CREATE TABLE `fornecedores_pagamento` (
  `id_pagamento_fornecedor` int(11) NOT NULL,
  `fk_id_fornecedor` int(11) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Valor` float DEFAULT NULL,
  `referente_a` int(11) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores_pedido`
--

CREATE TABLE `fornecedores_pedido` (
  `id_fornecedor_pedido` int(11) NOT NULL,
  `fk_id_fornecedor` int(11) DEFAULT NULL,
  `valor_total` float DEFAULT NULL,
  `referente_a` int(11) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fotos`
--

CREATE TABLE `fotos` (
  `id_foto` int(11) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `logs`
--

CREATE TABLE `logs` (
  `id_log` int(11) NOT NULL,
  `DATA` timestamp NOT NULL DEFAULT current_timestamp(),
  `ocorrencia` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `logs`
--

INSERT INTO `logs` (`id_log`, `DATA`, `ocorrencia`) VALUES
(94, '2023-02-14 12:26:06', '18130185709 Lucas Maroni Paim adicionou a feira Testeee'),
(95, '2023-02-14 12:37:38', '18130185709 Lucas Maroni Paim adicionou a feira TOma karen'),
(96, '2023-02-14 12:42:02', '18130185709 Lucas Maroni Paim adicionou a feira aaaa'),
(97, '2023-02-14 12:49:21', '18130185709 Lucas Maroni Paim adicionou a feira Toma toma '),
(98, '2023-02-14 12:51:25', '18130185709 Lucas Maroni Paim adicionou a feira tomaaaaaaaaaaaaa'),
(99, '2023-02-14 12:52:25', '18130185709 Lucas Maroni Paim adicionou a feira Toma karen toma'),
(100, '2023-02-14 12:53:06', '18130185709 Lucas Maroni Paim Fez o Logout!'),
(101, '2023-02-14 12:53:14', ' Fez o Logout!'),
(102, '2023-02-14 12:53:17', '18130185709 Lucas Maroni Paim Fez o Login!'),
(103, '2023-02-14 12:55:48', '18130185709 Lucas Maroni Paim Fez o Logout!'),
(104, '2023-02-14 12:55:53', ' Fez o Logout!'),
(105, '2023-02-14 12:55:55', '18130185709 Lucas Maroni Paim Fez o Login!'),
(106, '2023-02-14 12:57:08', '18130185709 Lucas Maroni Paim Fez o Logout!'),
(107, '2023-02-14 12:58:09', '18130185709 Lucas Maroni Paim Fez o Login!'),
(108, '2023-03-21 20:43:37', '18130185709 Lucas Maroni Paim Fez o Logout!'),
(109, '2023-03-21 20:43:40', '18130185709 Lucas Maroni Paim Fez o Login!'),
(110, '2023-03-21 21:11:59', '18130185709 Lucas Maroni Paim adicionou o fornecedor Pedro Motta com a chave pix 11151103730 para o favorecido Pedro Motta'),
(111, '2023-05-25 16:02:59', ' Fez o Logout!'),
(112, '2023-05-25 16:03:03', '18130185709 Lucas Maroni Paim Fez o Login!'),
(113, '2023-05-25 16:03:39', '18130185709 Lucas Maroni Paim adicionou a feira Riocentro Junho 2023'),
(114, '2023-05-25 17:53:30', '18130185709 Lucas Maroni Paim adicionou o cliente  com a chave pix  para o favorecido '),
(115, '2023-05-26 16:34:40', '18130185709 Lucas Maroni Paim adicionou o fornecedor Renan Paim com a chave pix renan@megagestante.com.br para o favorecido Renan Maroni Paim');

-- --------------------------------------------------------

--
-- Estrutura para tabela `maquinas_cartao`
--

CREATE TABLE `maquinas_cartao` (
  `id_venda_maq` int(11) NOT NULL,
  `DATA` date DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `fk_id_cliente` int(11) DEFAULT NULL,
  `terminal` varchar(50) DEFAULT NULL,
  `factory` varchar(50) DEFAULT NULL,
  `parcelas` int(11) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL,
  `fk_id_feira` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `permissao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome_user`, `cpf`, `senha`, `permissao`) VALUES
(1, 'Lucas Maroni Paim', '18130185709', '356a192b7913b04c54574d18c28d46e6395428ab', 1),
(2, 'Osmar Paim', '33542384704', '356a192b7913b04c54574d18c28d46e6395428ab', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cheques`
--
ALTER TABLE `cheques`
  ADD PRIMARY KEY (`cheque_id`),
  ADD KEY `FK_id_foto` (`FK_id_foto`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`);

--
-- Índices de tabela `clientes_cadastros`
--
ALTER TABLE `clientes_cadastros`
  ADD PRIMARY KEY (`Id_Cliente`);

--
-- Índices de tabela `clientes_pedidos`
--
ALTER TABLE `clientes_pedidos`
  ADD PRIMARY KEY (`ID_vendas`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`);

--
-- Índices de tabela `cliente_pagamento`
--
ALTER TABLE `cliente_pagamento`
  ADD PRIMARY KEY (`id_pagamento_cliente`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`);

--
-- Índices de tabela `feiras`
--
ALTER TABLE `feiras`
  ADD PRIMARY KEY (`ID_feira`);

--
-- Índices de tabela `feira_extra`
--
ALTER TABLE `feira_extra`
  ADD PRIMARY KEY (`id_extra`);

--
-- Índices de tabela `fornecedores_cadastro`
--
ALTER TABLE `fornecedores_cadastro`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices de tabela `fornecedores_pagamento`
--
ALTER TABLE `fornecedores_pagamento`
  ADD PRIMARY KEY (`id_pagamento_fornecedor`),
  ADD KEY `fk_id_fornecedor` (`fk_id_fornecedor`);

--
-- Índices de tabela `fornecedores_pedido`
--
ALTER TABLE `fornecedores_pedido`
  ADD PRIMARY KEY (`id_fornecedor_pedido`),
  ADD KEY `fk_id_fornecedor` (`fk_id_fornecedor`);

--
-- Índices de tabela `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`);

--
-- Índices de tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_log`);

--
-- Índices de tabela `maquinas_cartao`
--
ALTER TABLE `maquinas_cartao`
  ADD PRIMARY KEY (`id_venda_maq`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cheques`
--
ALTER TABLE `cheques`
  MODIFY `cheque_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientes_cadastros`
--
ALTER TABLE `clientes_cadastros`
  MODIFY `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de tabela `clientes_pedidos`
--
ALTER TABLE `clientes_pedidos`
  MODIFY `ID_vendas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente_pagamento`
--
ALTER TABLE `cliente_pagamento`
  MODIFY `id_pagamento_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `feiras`
--
ALTER TABLE `feiras`
  MODIFY `ID_feira` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `feira_extra`
--
ALTER TABLE `feira_extra`
  MODIFY `id_extra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedores_cadastro`
--
ALTER TABLE `fornecedores_cadastro`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de tabela `fornecedores_pagamento`
--
ALTER TABLE `fornecedores_pagamento`
  MODIFY `id_pagamento_fornecedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedores_pedido`
--
ALTER TABLE `fornecedores_pedido`
  MODIFY `id_fornecedor_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de tabela `maquinas_cartao`
--
ALTER TABLE `maquinas_cartao`
  MODIFY `id_venda_maq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cheques`
--
ALTER TABLE `cheques`
  ADD CONSTRAINT `cheques_ibfk_1` FOREIGN KEY (`FK_id_foto`) REFERENCES `fotos` (`id_foto`),
  ADD CONSTRAINT `cheques_ibfk_2` FOREIGN KEY (`fk_id_cliente`) REFERENCES `clientes_cadastros` (`Id_Cliente`);

--
-- Restrições para tabelas `clientes_pedidos`
--
ALTER TABLE `clientes_pedidos`
  ADD CONSTRAINT `clientes_pedidos_ibfk_1` FOREIGN KEY (`fk_id_cliente`) REFERENCES `clientes_cadastros` (`Id_Cliente`);

--
-- Restrições para tabelas `cliente_pagamento`
--
ALTER TABLE `cliente_pagamento`
  ADD CONSTRAINT `cliente_pagamento_ibfk_1` FOREIGN KEY (`fk_id_cliente`) REFERENCES `clientes_cadastros` (`Id_Cliente`);

--
-- Restrições para tabelas `fornecedores_pagamento`
--
ALTER TABLE `fornecedores_pagamento`
  ADD CONSTRAINT `fornecedores_pagamento_ibfk_1` FOREIGN KEY (`fk_id_fornecedor`) REFERENCES `fornecedores_cadastro` (`id_fornecedor`);

--
-- Restrições para tabelas `fornecedores_pedido`
--
ALTER TABLE `fornecedores_pedido`
  ADD CONSTRAINT `fornecedores_pedido_ibfk_1` FOREIGN KEY (`fk_id_fornecedor`) REFERENCES `fornecedores_cadastro` (`id_fornecedor`);

--
-- Restrições para tabelas `maquinas_cartao`
--
ALTER TABLE `maquinas_cartao`
  ADD CONSTRAINT `maquinas_cartao_ibfk_1` FOREIGN KEY (`fk_id_cliente`) REFERENCES `clientes_cadastros` (`Id_Cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
