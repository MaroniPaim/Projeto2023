<?php

/* Caso a execução da exceção seja correta*/
try {

    // Executa a conexao com o mysql e selecionar a base
    include 'conect.php';

    $nome_prof = $_POST['nome_prof'];
    $senha = $_POST['senha_prof'];
    $senha = sha1($senha);
    $cpf_prof = $_POST['cpf_prof'];

    // Prepara o objeto statement e faz a execução da query
    $stmt = $pdo->prepare('INSERT INTO professores (nome_prof,senha,cpf_prof) 
    VALUES(:nome_prof,:senha,:cpf)');
    //Execução do array
    $stmt->execute(array(
    
        
        ':nome_prof' => $nome_prof,
        ':senha' => $senha,
        ':cpf' => $cpf_prof

    ));
    header('Location: tela_admin.php');
}
/* Caso venha erro tras a exceção*/ catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
