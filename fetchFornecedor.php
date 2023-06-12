
<?php

// AQUI AGORA VAMOS ESTILIZAR TODA A INTERFACE DA TELA DO FORNECEDOR, COLOCANDO O HTML DAS TABLES ENTRE AS QUERIES E ADICIONANDO NOVAS QUERIES




session_start();

/* Caso a execução da exceção seja correta*/
try {




    // Executa a conexao com o mysql e selecionar a base
    include 'conect.php';
    $id_fornecedor = $_POST['fetchid'];




 
    //
    ?>
    
    <h1>Dados do fornecedor</h1>
    <table class="w-50">
        <thead style="background-color: lightblue;">
            <tr>

                <th>Nome</th>
                <th>CNPJ/CPF</th>
                <th>Chave PIX</th>
                <th>favorecido</th>

            </tr>
        </thead>


        <?php

        $stmt = $pdo->prepare('SELECT * FROM fornecedores_cadastros WHERE id_fornecedor = :id_fornecedor;');
        $stmt->execute(array(
            ':id_fornecedor' => $id_fornecedor
        ));

        if (($stmt->rowCount()) > 0) {
            foreach ($stmt as $row) :
        ?>
                <tr>
                    <td><?php echo $row['nome_fornecedor']; ?></td>
                    <td><?php echo $row['CNPJ_CPF']; ?></td>
                    <td><?php echo $row['Pix1']; ?></td>
                    <td><?php echo $row['favorecido1']; ?></td>
                </tr>
        <?php
            endforeach;
        }
        ?>
    </table>
        <h1>Pedidos ao fornecedor</h1>
    <table class="w-50">
        <thead style="background-color: lightblue;">
            <tr>

                <th>Valor total</th>
                <th>Referente a</th>
            

            </tr>
        </thead>
         	

        <?php

        $stmt = $pdo->prepare('SELECT * FROM fornecedores_pedidos WHERE fk_id_fornecedor = :id_fornecedor;');
        $stmt->execute(array(
            ':id_fornecedor' => $id_fornecedor
        ));

        if (($stmt->rowCount()) > 0) {
            foreach ($stmt as $row) :
        ?>
                <tr>
                    <td><?php echo $row['valor_total']; ?></td>
                    <td><?php echo $row['fk_id_feira']; ?></td>
                </tr>
        <?php
            endforeach;
        }
        
?>
        <br>
    </table>
    <br>
        <h1>Pagamentos Realizados</h1>
        <table class="w-50">
            <thead style="background-color: lightblue;">
                <tr>

                    <th>Data</th>
                    <th>Valor</th>
                    <th>referente a</th>

                </tr>
            </thead>


            <?php

            $stmt2 = $pdo->prepare('SELECT * FROM fornecedores_pagamentos WHERE fk_id_fornecedor = :id_fornecedor;');
            $stmt2->execute(array(
                ':id_fornecedor' => $id_fornecedor
            ));

            if (($stmt2->rowCount()) > 0) {
                foreach ($stmt2 as $row) :
            ?>

                    <tr>

                        <td><?php echo $row['Data']; ?></td>
                        <td><?php echo $row['Valor']; ?></td>
                        <td><?php echo $row['fk_id_feira']; ?></td>
                    </tr>
        <?php
                endforeach;
            }
        }
        /* Caso venha erro tras a exceção*/ catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        ?>
        </table>