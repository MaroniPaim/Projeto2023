<?php

/* Caso a execução da exceção seja correta*/
try {
    
    // Executa a conexao com o mysql e selecionar a base
    INCLUDE 'conect.php';

    $nome_aluno = $_POST['nome_aluno'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $senha = sha1($senha);
    $sexo = $_POST['sexo'];
    $nacionalidade = $_POST['nacionalidade'];
    $idade = $_POST['idade'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $num = $_POST['num'];
    $compl = $_POST['compl'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $ddd = $_POST['ddd'];
    $fone = $_POST['fone'];
    // Prepara o objeto statement e faz a execução da query
    $stmt = $pdo->prepare('INSERT INTO alunos (nome_aluno,cpf,senha,sexo,nacionalidade,idade,cep,rua,num,compl,bairro,cidade,estado,ddd,fone) 
    VALUES(:nome_aluno,:cpf,:senha,:sexo,:nacionalidade,:idade,:cep,:rua,:num,:compl,:bairro,:cidade,:estado,:ddd,:fone)');
   //Execução do array
    $stmt->execute(array(
        ':nome_aluno'=>$nome_aluno,
        ':cpf'=>$cpf,
        ':senha'=>$senha,
        ':sexo'=>$sexo,
        ':nacionalidade'=>$nacionalidade,
        ':idade'=>$idade,
        ':cep'=>$cep,
        ':rua'=>$rua,
        ':num'=>$num,
        ':compl'=>$compl,
        ':bairro'=>$bairro,
        ':cidade'=>$cidade,
        ':estado'=>$estado,
        ':ddd'=>$ddd,
        ':fone'=>$fone
    ));
    header('Location: tela_admin.php');
} 
/* Caso venha erro tras a exceção*/
catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
