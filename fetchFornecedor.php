<?php
session_start();

/* Caso a execução da exceção seja correta*/
try {
    

    				

    // Executa a conexao com o mysql e selecionar a base
    INCLUDE 'conect.php';
 

  
    $stmt = $pdo->prepare('SELECT * FROM fornecedores_cadastro');
    $stmt->execute();

    if (($stmt->rowCount()) > 0) {
        foreach ($stmt as $row) :
    ?>
            <tr>
                <td><?php echo $row['id_fornecedor']; ?></td>
                <td><?php echo $row['nome_fornecedor']; ?></td>
                <td><?php echo $row['CNPJ_CPF']; ?></td>
                <td><?php echo $row['Pix1']; ?></td>
                <td><?php echo $row['favorecido1']; ?></td>
            </tr>
    <?php
        endforeach;
    }
    
} 
/* Caso venha erro tras a exceção*/
catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>