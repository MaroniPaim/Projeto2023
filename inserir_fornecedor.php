<?php
session_start();

/* Caso a execução da exceção seja correta*/
try {
    // Executa a conexão com o MySQL e seleciona a base
    include 'conect.php';
    
    $nome_fornecedor = $_POST['nome_fornecedor'];
    $CNPJ_CPF = $_POST['CNPJ_CPF'];
    $Pix1 = $_POST['Pix1'];
    $favorecido1 = $_POST['favorecido1'];
        
    $date = new DateTime();
    $date = $date->format("y/m/d h:i:s");
    $log = $_SESSION['log'].' @ '.$date;
    $logOc = $_SESSION['log'].' adicionou o fornecedor '.$nome_fornecedor.' com a chave pix '.$Pix1.' para o favorecido '.$favorecido1;

    // Prepara o objeto statement e faz a execução da query
    $stmt = $pdo->prepare('INSERT INTO fornecedores_cadastros (nome_fornecedor, CNPJ_CPF, Pix1, favorecido1, log) 
    VALUES (:nome_fornecedor, :CNPJ_CPF, :Pix1, :favorecido1, :log)');
    
    // Execução do array
    $stmt->execute(array(
        ':nome_fornecedor' => $nome_fornecedor,
        ':CNPJ_CPF' => $CNPJ_CPF,
        ':Pix1' => $Pix1,
        ':favorecido1' => $favorecido1,
        ':log' => $log
    ));
    
    $stmt = $pdo->prepare('INSERT INTO logs (ocorrencia) VALUES (:logocorrencia)');
    
    // Execução do array
    $stmt->execute(array(
        ':logocorrencia' => $logOc
    ));
} 
/* Caso ocorra um erro, trata a exceção */
catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

$stmt = $pdo->prepare('SELECT * FROM fornecedores_cadastros ORDER BY id_fornecedor DESC LIMIT 1');
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Agora você pode usar os valores de $row para exibir a última linha da tabela
    $id_fornecedor = $row['id_fornecedor'];
    $nome_fornecedor = $row['nome_fornecedor'];
    $CNPJ_CPF = $row['CNPJ_CPF'];
    $pix1 = $row['Pix1'];
    $favorecido1 = $row['favorecido1'];

    // Faça o que for necessário com os valores da última linha da tabela
}
$response = array(
    'id_fornecedor' => $id_fornecedor,
    'nome_fornecedor' => $nome_fornecedor,
    'CNPJ_CPF' => $CNPJ_CPF,
    'Pix1' => $pix1,
    'favorecido1' => $favorecido1
);

// Define o cabeçalho da resposta como JSON
header('Content-Type: application/json');

// Converte o array em JSON e imprime a resposta
echo json_encode($response);
