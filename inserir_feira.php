<?php
session_start();

/* Caso a execução da exceção seja correta*/
try {
    
    // Executa a conexao com o mysql e selecionar a base
    INCLUDE 'conect.php';
    $nome_feira = $_POST['nome_feira'];
    $local = $_POST['local'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
        
    $date = new DateTime();

    $date = $date->format("y/m/d h:i:s");
    $log = $_SESSION['log'].' @ '.$date;
    $logOc = $_SESSION['log'].' adicionou a feira '.$nome_feira;

    // Prepara o objeto statement e faz a execução da query
    $stmt = $pdo->prepare('INSERT INTO feiras (nome_feira,lugar,data_inicio,data_fim,log) 
    VALUES(:nome_feira,:local,:data_inicio,:data_fim,:log)');
   //Execução do array
    $stmt->execute(array(
        ':nome_feira'=>$nome_feira,
        ':local'=>$local,
        ':data_inicio'=>$data_inicio,
        ':data_fim'=>$data_fim,
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
