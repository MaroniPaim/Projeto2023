<?php
session_start();
include 'conect.php';


/* Caso a execução da exceção seja correta*/
try {



    // Executa a conexao com o mysql e selecionar a base


    $matricula = $_POST['fk_id_aluno'];
    $nota = $_POST['nota'];
    $fk_id_turma = $_SESSION['fk_id_turma'];
    

    // Prepara o objeto statement e faz a execução da query
    $stmt = $pdo->prepare('INSERT INTO notas (nota, fk_id_aluno, fk_id_turma) 
    VALUES(:nota,:fk_id_aluno,:fk_id_turma)');
    //Execução do array
    $stmt->execute(array(
    
        ':nota' => $nota,
        ':fk_id_aluno' => $matricula,
        ':fk_id_turma' => $fk_id_turma
        

    ));
    header('Location: tela_prof2.php');

}
/* Caso venha erro tras a exceção*/ catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
