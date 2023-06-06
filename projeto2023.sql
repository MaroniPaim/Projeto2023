-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jan-2023 às 15:49
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
-- Banco de dados: `projeto2023`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cheques`
--

CREATE TABLE `cheques` (
  `cheque_id` int(11) NOT NULL,
  `fk_id_cliente` int(11) DEFAULT NULL,
  `Valor` float DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `entregue_a` varchar(50) DEFAULT NULL,
  `FK_id_foto` int(11) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes_cadastros`
--

CREATE TABLE `clientes_cadastros` (
  `Id_Cliente` int(11) NOT NULL,
  `Nome_Cliente` varchar(50) DEFAULT NULL,
  `CNPJ_CPF` varchar(50) DEFAULT NULL,
  `nome_responsavel` varchar(50) DEFAULT NULL,
  `UF` varchar(2) DEFAULT NULL,
  `Cidade` varchar(50) DEFAULT NULL,
  `Mercadoria` varchar(50) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes_pedidos`
--

CREATE TABLE `clientes_pedidos` (
  `ID_vendas` int(11) NOT NULL,
  `fk_id_cliente` int(11) DEFAULT NULL,
  `Metragem` float DEFAULT NULL,
  `ValorTotal` float DEFAULT NULL,
  `Referente_a` varchar(50) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_pagamento`
--

CREATE TABLE `cliente_pagamento` (
  `id_pagamento_cliente` int(11) NOT NULL,
  `fk_id_cliente` int(11) DEFAULT NULL,
  `Valor_pago` float DEFAULT NULL,
  `Metodo_de_pagamento` varchar(50) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `referente_a` int(11) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `feiras`
--

CREATE TABLE `feiras` (
  `ID_feira` int(11) NOT NULL,
  `Nome_feira` varchar(50) DEFAULT NULL,
  `Lugar` varchar(50) DEFAULT NULL,
  `Data_inicio` date DEFAULT NULL,
  `Data_fim` date DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores_cadastro`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores_pagamento`
--

CREATE TABLE `fornecedores_pagamento` (
  `id_pagamento_fornecedor` int(11) NOT NULL,
  `fk_id_fornecedor` int(11) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Valor` float DEFAULT NULL,
  `referente_a` int(11) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores_pedido`
--

CREATE TABLE `fornecedores_pedido` (
  `id_fornecedor_pedido` int(11) NOT NULL,
  `fk_id_fornecedor` int(11) DEFAULT NULL,
  `valor_total` float DEFAULT NULL,
  `referente_a` int(11) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE `fotos` (
  `id_foto` int(11) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE `logs` (
  `id_log` int(11) NOT NULL,
  `DATA` timestamp NOT NULL DEFAULT current_timestamp(),
  `ocorrencia` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `maquinas_cartao`
--

CREATE TABLE `maquinas_cartao` (
  `id_venda_maq` int(11) NOT NULL,
  `DATA` date DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `fk_id_cliente` int(11) DEFAULT NULL,
  `terminal` varchar(50) DEFAULT NULL,
  `factory` varchar(50) DEFAULT NULL,
  `parcelas` int(11) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `permissao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cheques`
--
ALTER TABLE `cheques`
  ADD PRIMARY KEY (`cheque_id`),
  ADD KEY `FK_id_foto` (`FK_id_foto`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`);

--
-- Índices para tabela `clientes_cadastros`
--
ALTER TABLE `clientes_cadastros`
  ADD PRIMARY KEY (`Id_Cliente`);

--
-- Índices para tabela `clientes_pedidos`
--
ALTER TABLE `clientes_pedidos`
  ADD PRIMARY KEY (`ID_vendas`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`);

--
-- Índices para tabela `cliente_pagamento`
--
ALTER TABLE `cliente_pagamento`
  ADD PRIMARY KEY (`id_pagamento_cliente`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`);

--
-- Índices para tabela `feiras`
--
ALTER TABLE `feiras`
  ADD PRIMARY KEY (`ID_feira`);

--
-- Índices para tabela `fornecedores_cadastro`
--
ALTER TABLE `fornecedores_cadastro`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices para tabela `fornecedores_pagamento`
--
ALTER TABLE `fornecedores_pagamento`
  ADD PRIMARY KEY (`id_pagamento_fornecedor`),
  ADD KEY `fk_id_fornecedor` (`fk_id_fornecedor`);

--
-- Índices para tabela `fornecedores_pedido`
--
ALTER TABLE `fornecedores_pedido`
  ADD PRIMARY KEY (`id_fornecedor_pedido`),
  ADD KEY `fk_id_fornecedor` (`fk_id_fornecedor`);

--
-- Índices para tabela `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`);

--
-- Índices para tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_log`);

--
-- Índices para tabela `maquinas_cartao`
--
ALTER TABLE `maquinas_cartao`
  ADD PRIMARY KEY (`id_venda_maq`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
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
  MODIFY `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

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
  MODIFY `ID_feira` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedores_cadastro`
--
ALTER TABLE `fornecedores_cadastro`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

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
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `maquinas_cartao`
--
ALTER TABLE `maquinas_cartao`
  MODIFY `id_venda_maq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cheques`
--
ALTER TABLE `cheques`
  ADD CONSTRAINT `cheques_ibfk_1` FOREIGN KEY (`FK_id_foto`) REFERENCES `fotos` (`id_foto`),
  ADD CONSTRAINT `cheques_ibfk_2` FOREIGN KEY (`fk_id_cliente`) REFERENCES `clientes_cadastros` (`Id_Cliente`);

--
-- Limitadores para a tabela `clientes_pedidos`
--
ALTER TABLE `clientes_pedidos`
  ADD CONSTRAINT `clientes_pedidos_ibfk_1` FOREIGN KEY (`fk_id_cliente`) REFERENCES `clientes_cadastros` (`Id_Cliente`);

--
-- Limitadores para a tabela `cliente_pagamento`
--
ALTER TABLE `cliente_pagamento`
  ADD CONSTRAINT `cliente_pagamento_ibfk_1` FOREIGN KEY (`fk_id_cliente`) REFERENCES `clientes_cadastros` (`Id_Cliente`);

--
-- Limitadores para a tabela `fornecedores_pagamento`
--
ALTER TABLE `fornecedores_pagamento`
  ADD CONSTRAINT `fornecedores_pagamento_ibfk_1` FOREIGN KEY (`fk_id_fornecedor`) REFERENCES `fornecedores_cadastro` (`id_fornecedor`);

--
-- Limitadores para a tabela `fornecedores_pedido`
--
ALTER TABLE `fornecedores_pedido`
  ADD CONSTRAINT `fornecedores_pedido_ibfk_1` FOREIGN KEY (`fk_id_fornecedor`) REFERENCES `fornecedores_cadastro` (`id_fornecedor`);

--
-- Limitadores para a tabela `maquinas_cartao`
--
ALTER TABLE `maquinas_cartao`
  ADD CONSTRAINT `maquinas_cartao_ibfk_1` FOREIGN KEY (`fk_id_cliente`) REFERENCES `clientes_cadastros` (`Id_Cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
