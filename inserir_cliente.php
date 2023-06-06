<?php
session_start();

/* Caso a execução da exceção seja correta*/
try {




    // Executa a conexao com o mysql e selecionar a base
    include 'conect.php';
    $Nome_Cliente = $_POST['Nome_Cliente'];
    $CNPJ_CPF = $_POST['CNPJ_CPF'];
    $nome_responsavel = $_POST['nome_responsavel'];
    $UF = $_POST['UF'];
    $Cidade = $_POST['Cidade'];
    $Mercadoria = $_POST['Mercadoria'];
    $nome_fantasia = $_POST['nome_fantasia'];
    $razao_social = $_POST['razao_social'];
    $endereco = $_POST['endereco'];
    $inscricao_estadual = $_POST['inscricao_estadual'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $date = new DateTime();

    $date = $date->format("y/m/d h:i:s");
    $log = $_SESSION['log'] . ' @ ' . $date;
    $logOc = $_SESSION['log'] . ' adicionou o cliente ' . $nome_cliente . ' com a chave pix ' . $Pix1 . ' para o favorecido ' . $favorecido1;



    //:Id_Cliente,:Nome_Cliente,:CNPJ_CPF,:nome_responsavel,:UF,:Cidade,
    //      :Mercadoria,:nome_fantasia,:razao_social,:endereco,:inscricao_estadual,:email,:telefone,:log)'
    // Prepara o objeto statement e faz a execução da query
    $stmt = $pdo->prepare('INSERT INTO clientes_cadastros (Nome_Cliente,CNPJ_CPF,nome_responsavel,UF,Cidade,Mercadoria,nome_fantasia,razao_social,endereco,inscricao_estadual,email,telefone,log) 
    VALUES(:Nome_Cliente,:CNPJ_CPF,:nome_responsavel,:UF,:Cidade,:Mercadoria,:nome_fantasia,:razao_social,:endereco,:inscricao_estadual,:email,:telefone,:log)');
    //Execução do array
    $stmt->execute(array(
        ':Nome_Cliente' => $Nome_Cliente,
        ':CNPJ_CPF' => $CNPJ_CPF,
        ':nome_responsavel' => $nome_responsavel,
        ':UF' => $UF,
        ':Cidade' => $Cidade,
        ':Mercadoria' => $Mercadoria,
        ':nome_fantasia' => $nome_fantasia,
        ':razao_social' => $razao_social,
        ':endereco' => $endereco,
        ':inscricao_estadual' => $inscricao_estadual,
        ':email' => $email,
        ':telefone' => $telefone,
        ':log' => $log
    ));

    $stmt = $pdo->prepare('INSERT INTO logs (ocorrencia) VALUES(:logocOrrencia)');
    //Execução do array
    $stmt->execute(array(
        ':logocOrrencia' => $logOc
    ));
}
/* Caso venha erro tras a exceção*/ catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
