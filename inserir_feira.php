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
$stmt = $pdo->prepare('SELECT * FROM feiras ORDER BY ID_feira DESC LIMIT 1');
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Agora você pode usar os valores de $row para exibir a última linha da tabela
    $idFeira = $row['ID_feira'];
    $nomeFeira = $row['Nome_feira'];
    $local = $row['Lugar'];
    $dataInicio = $row['Data_inicio'];
    $dataFim = $row['Data_fim'];

    // Faça o que for necessário com os valores da última linha da tabela
}
$response = array(
    'ID_feira' => $idFeira,
    'Nome_feira' => $nomeFeira,
    'Lugar' => $local,
    'Data_inicio' => $dataInicio,
    'Data_fim' => $dataFim
);

// Define o cabeçalho da resposta como JSON
header('Content-Type: application/json');

// Converte o array em JSON e imprime a resposta
echo json_encode($response);
