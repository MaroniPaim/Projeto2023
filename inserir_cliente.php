<?php
session_start();

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Executa a conexão com o MySQL e seleciona a base
        include 'conect.php';
        
        // Obtém os dados do formulário
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $inscricao_estadual = $_POST['inscricao_estadual'];
        $endereco = $_POST['endereco'];
        $razao_social = $_POST['razao_social'];
        $nome_fantasia = $_POST['nome_fantasia'];
        $Mercadoria = $_POST['Mercadoria'];
        $Cidade = $_POST['Cidade'];
        $UF = $_POST['UF'];
        $nome_responsavel = $_POST['nome_responsavel'];
        $CNPJ_CPF = $_POST['CNPJ_CPF'];
        $Nome_Cliente = $_POST['Nome_Cliente'];
        
        $date = new DateTime();
        $date = $date->format("y/m/d h:i:s");
        
        $log = $_SESSION['log'].' @ '.$date;
        $logOcorrencia = $_SESSION['log'].' adicionou o cliente '.$Nome_Cliente.' com CNPJ/CPF '.$CNPJ_CPF;
        
        // Prepara a query de inserção
        $stmt = $pdo->prepare('INSERT INTO clientes_cadastros (telefone, email, inscricao_estadual, endereco, razao_social, nome_fantasia, Mercadoria, Cidade, UF, nome_responsavel, CNPJ_CPF, Nome_Cliente, log) 
        VALUES (:telefone, :email, :inscricao_estadual, :endereco, :razao_social, :nome_fantasia, :Mercadoria, :Cidade, :UF, :nome_responsavel, :CNPJ_CPF, :Nome_Cliente, :log)');
        
        // Executa a query de inserção
        $stmt->execute(array(
            ':telefone' => $telefone,
            ':email' => $email,
            ':inscricao_estadual' => $inscricao_estadual,
            ':endereco' => $endereco,
            ':razao_social' => $razao_social,
            ':nome_fantasia' => $nome_fantasia,
            ':Mercadoria' => $Mercadoria,
            ':Cidade' => $Cidade,
            ':UF' => $UF,
            ':nome_responsavel' => $nome_responsavel,
            ':CNPJ_CPF' => $CNPJ_CPF,
            ':Nome_Cliente' => $Nome_Cliente,
            ':log' => $log
        ));
        
        // Prepara a query de inserção do log
        $stmt = $pdo->prepare('INSERT INTO logs (ocorrencia) VALUES (:logOcorrencia)');
        
        // Executa a query de inserção do log
        $stmt->execute(array(
            ':logOcorrencia' => $logOcorrencia
        ));
        
        // Cria um array com os dados do fornecedor adicionado
        $response = array(
            'Id_Cliente' => $pdo->lastInsertId(),
            'Nome_Cliente' => $Nome_Cliente,
            'CNPJ_CPF' => $CNPJ_CPF,
            'telefone' => $telefone,
            'Mercadoria' => $Mercadoria
        );
        
        // Retorna a resposta em JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (PDOException $e) {
        // Trata a exceção caso ocorra algum erro
        echo 'Error: ' . $e->getMessage();
    }
}
?>
