<?php
    
    // Executa a conexao com o mysql e selecionar a base
    INCLUDE 'conect.php';

$id_user = $_GET['id_user'];

try {

  $stmt = $pdo->prepare('DELETE FROM users WHERE id_user = :id_user');
  $stmt->bindParam(':id_user', $id_user);
  $stmt->execute();

  echo 'Linhas da Tabela Afetadas '.$stmt->rowCount(); /* Linhas afetadas */
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>