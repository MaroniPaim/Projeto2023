<?php

/* Caso a execução da exceção seja correta*/
try {

    // Executa a conexao com o mysql e selecionar a base
    include 'conect.php';

    $nome_curso = $_POST['nome_curso'];
    $CH = $_POST['CH'];



    // Prepara o objeto statement e faz a execução da query
    $stmt = $pdo->prepare('INSERT INTO cursos (nome_curso,carga_horaria) 
    VALUES(:curso,:CH)');
    //Execução do array
    $stmt->execute(array(
        ':curso' => $nome_curso,
        ':CH' => $CH
    ));
    header('Location: tela_admin.php');
}
/* Caso venha erro tras a exceção*/ catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
