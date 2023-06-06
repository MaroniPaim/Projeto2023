<?php

/* Caso a execução da exceção seja correta*/
try {

    // Executa a conexao com o mysql e selecionar a base
    include 'conect.php';

    $id_turma = $_POST['id_turma'];
    $id_aluno = $_POST['id_aluno'];
    


    // Prepara o objeto statement e faz a execução da query
    $stmt = $pdo->prepare('INSERT INTO alunos_turmas (fk_id_aluno, fk_id_turma) 
    VALUES(:fk_id_aluno,:fk_id_turma)');
    //Execução do array
    $stmt->execute(array(
        ':fk_id_aluno' => $id_aluno,
        ':fk_id_turma' => $id_turma
    ));
    header('Location: tela_admin.php');
}
/* Caso venha erro tras a exceção*/ catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
