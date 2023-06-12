<?php

session_start();

/* Caso a execução da exceção seja correta*/
try {




    // Executa a conexao com o mysql e selecionar a base
    include 'conect.php';
    $id_cliente = $_POST['fetchid'];





?>

    <h1>Dados do cliente</h1>
    <table class="w-100">
        <thead style="background-color: lightblue;">
            <tr>
                <th>Nome</th>
                <th>CNPJ/CPF</th>
                <th>Nome Responsável</th>
                <th>UF - Cidade</th>
                <th>Mercadoria</th>
                <th>Nome Fantasia</th>
                <th>Razão Social</th>
                <th>Endereço</th>
                <th>Inscrição Estadual</th>
                <th>Email</th>
                <th>Telefone</th>
            </tr>
        </thead>

        <?php
        $stmt = $pdo->prepare('SELECT * FROM clientes_cadastros WHERE id_cliente = :id_cliente;');
        $stmt->execute(array(
            ':id_cliente' => $id_cliente
        ));

        if (($stmt->rowCount()) > 0) {
            foreach ($stmt as $row) :
        ?>
                <tr>
                    <td><?php echo $row['Nome_Cliente']; ?></td>
                    <td><?php echo $row['CNPJ_CPF']; ?></td>
                    <td><?php echo $row['nome_responsavel']; ?></td>
                    <td><?php echo $row['Cidade'] . " - " . $row['UF']; ?></td>
                    <td><?php echo $row['Mercadoria']; ?></td>
                    <td><?php echo $row['nome_fantasia']; ?></td>
                    <td><?php echo $row['razao_social']; ?></td>
                    <td><?php echo $row['endereco']; ?></td>
                    <td><?php echo $row['inscricao_estadual']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['telefone']; ?></td>
                </tr>
        <?php
            endforeach;
        }
        ?>
    </table>
    <h1>Contratos do cliente</h1>
    <table class="w-100">
        <thead style="background-color: lightblue;">
            <tr>
                <th>Metragem</th>
                <th>Valor total</th>
                <th>Valor do m²</th>
                <th>Referente a</th>
            </tr>
        </thead>

        <?php
        $stmt = $pdo->prepare('SELECT * FROM clientes_pedidos WHERE fk_id_cliente = :id_cliente;');
        $stmt->execute(array(
            ':id_cliente' => $id_cliente
        ));

        if (($stmt->rowCount()) > 0) {
            foreach ($stmt as $row) :
                $metragem = $row['Metragem'];
                $total = $row['ValorTotal'];
                $valordometro = $total / $metragem;
        ?>
                <tr>
                    <td><?php echo $row['Metragem']; ?></td>
                    <td><?php echo "R$ " . $row['ValorTotal']; ?></td>
                    <td><?php echo "R$ " . $valordometro; ?></td>
                    <td><?php echo $row['fk_id_feira']; ?></td>

                </tr>
        <?php
            endforeach;
        }
        ?>
    </table>
    <br>
    <h1>Pagamentos Recebidos</h1>
    <table class="w-100">
        <thead style="background-color: lightblue;">
            <tr>
                <th>Data</th>
                <th>Valor</th>
                <th>Referente a</th>
            </tr>
        </thead>

        <?php
        $stmt = $pdo->prepare('SELECT * FROM clientes_pagamentos WHERE fk_id_cliente = :id_cliente;');
        $stmt->execute(array(
            ':id_cliente' => $id_cliente
        ));

        if (($stmt->rowCount()) > 0) {
            foreach ($stmt as $row) :
        ?>
                <tr>
                    <td><?php echo $row['Data']; ?></td>
                    <td><?php echo $row['Valor_pago']; ?></td>
                    <td><?php echo $row['fk_id_feira']; ?></td>
                </tr>
        <?php
            endforeach;
        }
        ?>


    </table>
    <div>
        <h1>Saldo do Cliente</h1>
        <table class="w-100">
            <thead style="background-color: lightblue;">
                <tr>
                    <th>Total Pago</th>
                    <th>Total Acordado</th>
                    <th>Saldo</th>
                
                </tr>
            </thead>


            <?php
            $stmt = $pdo->prepare('SELECT SUM(clientes_pagamentos.Valor_pago) as "Total Pago", SUM(clientes_pedidos.ValorTotal) as "Total Acordado" FROM clientes_pagamentos left join clientes_pedidos ON clientes_pedidos.fk_id_cliente = clientes_pagamentos.fk_id_cliente WHERE clientes_pagamentos.fk_id_cliente = :id_cliente;');
            $stmt->execute(array(
                ':id_cliente' => $id_cliente
            ));

            if (($stmt->rowCount()) > 0) {
                foreach ($stmt as $row) :
            ?>
        	
                    <tr>
                        <td><?php $totalPago = $row['Total Pago']; echo $row['Total Pago']; ?></td>
                        <td><?php $totalAcordado =$row['Total Acordado']; echo $row['Total Acordado']; ?></td>
                        <td><?php $saldo = $totalAcordado-$totalPago; echo $saldo; ?></td>
                    </tr>
        <?php
                endforeach;
            }
        }
        /* Caso venha erro tras a exceção*/ catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        ?>
    </div>
    </table>