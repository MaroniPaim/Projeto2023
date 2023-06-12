-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 05:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `cheques`
--

CREATE TABLE `cheques` (
  `cheque_id` int(11) NOT NULL,
  `fk_id_cliente` int(11) NOT NULL,
  `Valor` float NOT NULL,
  `Data` date NOT NULL,
  `entregue_a` varchar(50) NOT NULL,
  `FK_id_foto` int(11) NOT NULL,
  `log` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clientes_cadastros`
--

CREATE TABLE `clientes_cadastros` (
  `Id_Cliente` int(11) NOT NULL,
  `Nome_Cliente` varchar(50) NOT NULL,
  `CNPJ_CPF` varchar(50) NOT NULL,
  `nome_responsavel` varchar(50) NOT NULL,
  `UF` varchar(2) NOT NULL,
  `Cidade` varchar(50) NOT NULL,
  `Mercadoria` varchar(50) NOT NULL,
  `log` varchar(200) NOT NULL,
  `nome_fantasia` varchar(50) NOT NULL,
  `razao_social` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `inscricao_estadual` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes_cadastros`
--

INSERT INTO `clientes_cadastros` (`Id_Cliente`, `Nome_Cliente`, `CNPJ_CPF`, `nome_responsavel`, `UF`, `Cidade`, `Mercadoria`, `log`, `nome_fantasia`, `razao_social`, `endereco`, `inscricao_estadual`, `email`, `telefone`) VALUES
(100, 'Nome teste', '00.000.000/0001-00', 'Nome teste', 'UF', 'Cidade', 'Produtos', 'Log Teste', 'Fantasia', 'Razao teste', 'Endereco teste', '11111111', 'Teste@email.com', '00-00000-0000'),
(101, 'Nome do cliente', 'CPF CNPJ', 'Responsavel', 'UF', 'Cidade', 'Memoria', '18130185709 Lucas Maroni Paim @ 23/05/25 02:53:30', 'Nome fantasia', 'Razão Social', 'Endereco', 'Insc Estadual', 'Email@gmail.com', 'telefone');

-- --------------------------------------------------------

--
-- Table structure for table `clientes_pedidos`
--

CREATE TABLE `clientes_pedidos` (
  `ID_vendas` int(11) NOT NULL,
  `fk_id_cliente` int(11) NOT NULL,
  `Metragem` float NOT NULL,
  `ValorTotal` float NOT NULL,
  `Referente_a` int(11) NOT NULL,
  `log` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clientes_pagamento`
--

CREATE TABLE `clientes_pagamento` (
  `id_pagamento_cliente` int(11) NOT NULL,
  `fk_id_cliente` int(11) NOT NULL,
  `Valor_pago` float NOT NULL,
  `Metodo_de_pagamento` varchar(50) NOT NULL,
  `Data` date NOT NULL,
  `referente_a` int(11) NOT NULL,
  `log` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feiras`
--

CREATE TABLE `feiras` (
  `ID_feira` int(11) NOT NULL,
  `Nome_feira` varchar(50) NOT NULL,
  `Lugar` varchar(50) NOT NULL,
  `Data_inicio` date NOT NULL,
  `Data_fim` date NOT NULL,
  `log` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feiras`
--

INSERT INTO `feiras` (`ID_feira`, `Nome_feira`, `Lugar`, `Data_inicio`, `Data_fim`, `log`) VALUES
(1, 'Riocentro Fevereiro 2023', 'Riocentro', '2023-02-08', '2023-02-12', 'Created by admin lucas'),
(2, 'Norte Shopping Abril 23', 'Norte Shopping', '2023-04-11', '2023-02-16', '18130185709 Lucas Maroni Paim @ 1676332817'),
(13, 'Riocentro Junho 2023', 'Riocentro', '2023-06-14', '2023-06-18', '18130185709 Lucas Maroni Paim @ 23/05/25 01:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `feira_extra`
--

CREATE TABLE `feira_extra` (
  `id_extra` int(11) NOT NULL,
  `fk_id_feira` int(11) NOT NULL,
  `fk_id_cliente` int(11) NOT NULL,
  `valor` float NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `obs` varchar(50) NOT NULL,
  `log` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fornecedores_cadastro`
--

CREATE TABLE `fornecedores_cadastro` (
  `id_fornecedor` int(11) NOT NULL,
  `nome_fornecedor` varchar(50) NOT NULL,
  `CNPJ_CPF` varchar(50) NOT NULL,
  `Pix1` varchar(50) NOT NULL,
  `favorecido1` varchar(50) NOT NULL,
  `Pix2` varchar(50) NOT NULL,
  `favorecido2` varchar(50) NOT NULL,
  `log` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fornecedores_cadastro`
--

INSERT INTO `fornecedores_cadastro` (`id_fornecedor`, `nome_fornecedor`, `CNPJ_CPF`, `Pix1`, `favorecido1`, `Pix2`, `favorecido2`, `log`) VALUES
(100, 'Pedro Motta', '11151103730', '11151103730', 'Pedro Motta', '', '', '18130185709 Lucas Maroni Paim @ 23/03/21 06:11:59'),
(101, 'Renan Paim', '18178505723', 'renan@megagestante.com.br', 'Renan Maroni Paim', '', '', '18130185709 Lucas Maroni Paim @ 23/05/26 01:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `fornecedores_pagamento`
--

CREATE TABLE `fornecedores_pagamento` (
  `id_pagamento_fornecedor` int(11) NOT NULL,
  `fk_id_fornecedor` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Valor` float NOT NULL,
  `referente_a` int(11) NOT NULL,
  `log` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fornecedores_pagamento`
--

INSERT INTO `fornecedores_pagamento` (`id_pagamento_fornecedor`, `fk_id_fornecedor`, `Data`, `Valor`, `referente_a`, `log`) VALUES
(1, 101, '0000-00-00', 1000, 0, 'de teste'),
(2, 100, '0000-00-00', 0.1, 0, 'teste carai'),
(3, 101, '2023-06-08', 10000000, 0, 'de teste'),
(4, 101, '2023-06-19', 1234570, 0, 'de teste'),
(5, 100, '2023-03-06', 987.54, 0, 'teste carai');

-- --------------------------------------------------------

--
-- Table structure for table `fornecedores_pedido`
--

CREATE TABLE `fornecedores_pedido` (
  `id_fornecedor_pedido` int(11) NOT NULL,
  `fk_id_fornecedor` int(11) NOT NULL,
  `valor_total` float NOT NULL,
  `referente_a` int(11) NOT NULL,
  `log` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fornecedores_pedido`
--

INSERT INTO `fornecedores_pedido` (`id_fornecedor_pedido`, `fk_id_fornecedor`, `valor_total`, `referente_a`, `log`) VALUES
(1, 101, 1000, 0, 'De teste'),
(2, 100, 1000, 0, 'De teste');

-- --------------------------------------------------------

--
-- Table structure for table `fotos`
--

CREATE TABLE `fotos` (
  `id_foto` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `log` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id_log` int(11) NOT NULL,
  `DATA` timestamp NOT NULL DEFAULT current_timestamp(),
  `ocorrencia` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
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
(115, '2023-05-26 16:34:40', '18130185709 Lucas Maroni Paim adicionou o fornecedor Renan Paim com a chave pix renan@megagestante.com.br para o favorecido Renan Maroni Paim'),
(116, '2023-06-07 00:04:44', ' Fez o Logout!'),
(117, '2023-06-07 00:04:44', ' Fez o Logout!'),
(118, '2023-06-07 00:04:45', ' Fez o Logout!'),
(119, '2023-06-07 00:04:46', ' Fez o Logout!'),
(120, '2023-06-07 00:04:49', '18130185709 Lucas Maroni Paim Fez o Login!'),
(121, '2023-06-07 00:04:56', '18130185709 Lucas Maroni Paim Fez o Logout!'),
(122, '2023-06-07 00:04:58', ' Fez o Logout!'),
(123, '2023-06-07 00:05:24', ' Fez o Logout!'),
(124, '2023-06-07 00:05:24', ' Fez o Logout!'),
(125, '2023-06-07 00:05:25', ' Fez o Logout!'),
(126, '2023-06-07 00:05:38', ' Fez o Logout!'),
(127, '2023-06-07 00:18:46', ' Fez o Logout!'),
(128, '2023-06-07 00:19:45', ' Fez o Logout!'),
(129, '2023-06-07 00:21:43', 'ngm Fez o Logout!'),
(130, '2023-06-07 00:23:51', 'ngm Fez o Logout!'),
(131, '2023-06-07 00:24:53', 'ngm Fez o Logout!'),
(132, '2023-06-07 00:25:01', 'ngm Fez o Logout!'),
(133, '2023-06-07 00:26:20', ' Fez o Logout!'),
(134, '2023-06-07 00:26:21', ' Fez o Logout!'),
(135, '2023-06-07 00:26:21', ' Fez o Logout!'),
(136, '2023-06-07 00:33:23', 'Fez o Logout!'),
(137, '2023-06-07 00:33:24', 'Fez o Logout!'),
(138, '2023-06-07 00:39:00', '18130185709 Lucas Maroni Paim Fez o Login!'),
(139, '2023-06-07 00:55:08', '18130185709 Lucas Maroni Paim Fez o Login!'),
(140, '2023-06-07 17:50:45', '18130185709 Lucas Maroni Paim Fez o Login!'),
(141, '2023-06-07 18:48:18', '18130185709 Lucas Maroni Paim Fez o Logout!'),
(142, '2023-06-07 18:48:21', '18130185709 Lucas Maroni Paim Fez o Login!'),
(143, '2023-06-07 19:54:41', '18130185709 Lucas Maroni Paim adicionou a feira '),
(144, '2023-06-08 08:04:01', '18130185709 Lucas Maroni Paim Fez o Login!'),
(145, '2023-06-08 13:50:15', '18130185709 Lucas Maroni Paim adicionou o fornecedor EMpresa de merda com a chave pix VAisefoder@pix.con.br para o favorecido Otario');

-- --------------------------------------------------------

--
-- Table structure for table `maquinas_cartao`
--

CREATE TABLE `maquinas_cartao` (
  `id_venda_maq` int(11) NOT NULL,
  `DATA` date NOT NULL,
  `valor` float NOT NULL,
  `fk_id_cliente` int(11) NOT NULL,
  `terminal` varchar(50) NOT NULL,
  `factory` varchar(50) NOT NULL,
  `parcelas` int(11) NOT NULL,
  `log` varchar(200) NOT NULL,
  `fk_id_feira` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `permissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome_user`, `cpf`, `senha`, `permissao`) VALUES
(1, 'Lucas Maroni Paim', '18130185709', '356a192b7913b04c54574d18c28d46e6395428ab', 1),
(2, 'Osmar Paim', '33542384704', '356a192b7913b04c54574d18c28d46e6395428ab', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cheques`
--
ALTER TABLE `cheques`
  ADD PRIMARY KEY (`cheque_id`),
  ADD KEY `FK_id_foto` (`FK_id_foto`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`);

--
-- Indexes for table `clientes_cadastros`
--
ALTER TABLE `clientes_cadastros`
  ADD PRIMARY KEY (`Id_Cliente`);

--
-- Indexes for table `clientes_pedidos`
--
ALTER TABLE `clientes_pedidos`
  ADD PRIMARY KEY (`ID_vendas`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`);

--
-- Indexes for table `clientes_pagamento`
--
ALTER TABLE `clientes_pagamento`
  ADD PRIMARY KEY (`id_pagamento_cliente`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`);

--
-- Indexes for table `feiras`
--
ALTER TABLE `feiras`
  ADD PRIMARY KEY (`ID_feira`);

--
-- Indexes for table `feira_extra`
--
ALTER TABLE `feira_extra`
  ADD PRIMARY KEY (`id_extra`);

--
-- Indexes for table `fornecedores_cadastro`
--
ALTER TABLE `fornecedores_cadastro`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Indexes for table `fornecedores_pagamento`
--
ALTER TABLE `fornecedores_pagamento`
  ADD PRIMARY KEY (`id_pagamento_fornecedor`),
  ADD KEY `fk_id_fornecedor` (`fk_id_fornecedor`);

--
-- Indexes for table `fornecedores_pedido`
--
ALTER TABLE `fornecedores_pedido`
  ADD PRIMARY KEY (`id_fornecedor_pedido`),
  ADD KEY `fk_id_fornecedor` (`fk_id_fornecedor`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `maquinas_cartao`
--
ALTER TABLE `maquinas_cartao`
  ADD PRIMARY KEY (`id_venda_maq`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cheques`
--
ALTER TABLE `cheques`
  MODIFY `cheque_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientes_cadastros`
--
ALTER TABLE `clientes_cadastros`
  MODIFY `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `clientes_pedidos`
--
ALTER TABLE `clientes_pedidos`
  MODIFY `ID_vendas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientes_pagamento`
--
ALTER TABLE `clientes_pagamento`
  MODIFY `id_pagamento_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feiras`
--
ALTER TABLE `feiras`
  MODIFY `ID_feira` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feira_extra`
--
ALTER TABLE `feira_extra`
  MODIFY `id_extra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fornecedores_cadastro`
--
ALTER TABLE `fornecedores_cadastro`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `fornecedores_pagamento`
--
ALTER TABLE `fornecedores_pagamento`
  MODIFY `id_pagamento_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fornecedores_pedido`
--
ALTER TABLE `fornecedores_pedido`
  MODIFY `id_fornecedor_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `maquinas_cartao`
--
ALTER TABLE `maquinas_cartao`
  MODIFY `id_venda_maq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cheques`
--
ALTER TABLE `cheques`
  ADD CONSTRAINT `cheques_ibfk_1` FOREIGN KEY (`FK_id_foto`) REFERENCES `fotos` (`id_foto`),
  ADD CONSTRAINT `cheques_ibfk_2` FOREIGN KEY (`fk_id_cliente`) REFERENCES `clientes_cadastros` (`Id_Cliente`);

--
-- Constraints for table `clientes_pedidos`
--
ALTER TABLE `clientes_pedidos`
  ADD CONSTRAINT `clientes_pedidos_ibfk_1` FOREIGN KEY (`fk_id_cliente`) REFERENCES `clientes_cadastros` (`Id_Cliente`);

--
-- Constraints for table `clientes_pagamento`
--
ALTER TABLE `clientes_pagamento`
  ADD CONSTRAINT `clientes_pagamento_ibfk_1` FOREIGN KEY (`fk_id_cliente`) REFERENCES `clientes_cadastros` (`Id_Cliente`);

--
-- Constraints for table `fornecedores_pagamento`
--
ALTER TABLE `fornecedores_pagamento`
  ADD CONSTRAINT `fornecedores_pagamento_ibfk_1` FOREIGN KEY (`fk_id_fornecedor`) REFERENCES `fornecedores_cadastro` (`id_fornecedor`);

--
-- Constraints for table `fornecedores_pedido`
--
ALTER TABLE `fornecedores_pedido`
  ADD CONSTRAINT `fornecedores_pedido_ibfk_1` FOREIGN KEY (`fk_id_fornecedor`) REFERENCES `fornecedores_cadastro` (`id_fornecedor`);

--
-- Constraints for table `maquinas_cartao`
--
ALTER TABLE `maquinas_cartao`
  ADD CONSTRAINT `maquinas_cartao_ibfk_1` FOREIGN KEY (`fk_id_cliente`) REFERENCES `clientes_cadastros` (`Id_Cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
