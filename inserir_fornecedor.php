<?php
session_start();

/* Caso a execução da exceção seja correta*/
try {
    

    				

    // Executa a conexao com o mysql e selecionar a base
    INCLUDE 'conect.php';
    $nome_fornecedor = $_POST['nome_fornecedor'];
    $CNPJ_CPF = $_POST['CNPJ_CPF'];
    $Pix1 = $_POST['Pix1'];
    $favorecido1 = $_POST['favorecido1'];
        
    $date = new DateTime();

    $date = $date->format("y/m/d h:i:s");
    $log = $_SESSION['log'].' @ '.$date;
    $logOc = $_SESSION['log'].' adicionou o fornecedor '.$nome_fornecedor. ' com a chave pix '.$Pix1.' para o favorecido '.$favorecido1;

    // Prepara o objeto statement e faz a execução da query
    $stmt = $pdo->prepare('INSERT INTO fornecedores_cadastro (nome_fornecedor,CNPJ_CPF,Pix1,favorecido1,log) 
    VALUES(:nome_fornecedor,:CNPJ_CPF,:Pix1,:favorecido1,:log)');
   //Execução do array
    $stmt->execute(array(
        ':nome_fornecedor'=>$nome_fornecedor,
        ':CNPJ_CPF'=>$CNPJ_CPF,
        ':Pix1'=>$Pix1,
        ':favorecido1'=>$favorecido1,
        ':log'=>$log
    ));
    $stmt = $pdo->prepare('INSERT INTO logs (ocorrencia) VALUES(:logocOrrencia)');
   //Execução do array
    $stmt->execute(array(
        ':logocOrrencia'=>$logOc
    ));
} 
/* Caso venha erro tras a exceção*/
catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
