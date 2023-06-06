<?php

/* Caso a execução da exceção seja correta*/
try {

    // Executa a conexao com o mysql e selecionar a base
    include 'conect.php';

    $id_curso = $_POST['id_curso'];
    $id_prof = $_POST['id_prof'];
    $letivo = $_POST['letivo'];





    // Prepara o objeto statement e faz a execução da query
    $stmt = $pdo->prepare('INSERT INTO turmas (fk_id_curso,fk_id_professor,periodo_letivo) 
    VALUES(:fk_id_curso,:fk_id_professor,:letivo)');
    //Execução do array
    $stmt->execute(array(
        ':fk_id_curso' => $id_curso,
        ':fk_id_professor' => $id_prof,
        ':letivo' =>$letivo
    ));
    header('Location: tela_admin.php');
}
/* Caso venha erro tras a exceção*/ catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
