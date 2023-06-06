<?php
// Executa a conexao com o mysql e selecionar a base
include 'conect.php';

session_start(); //faz o arquivo iniciar a sessao com o browser

// pega dados via POST
// Recebe o valo do email
$login = $_POST["login"];
// Recebe o valo do email
$senha = $_POST["senha"];
// Converte a senha em um hash criptografado de SHA1
$senha = sha1($senha);

// Faz a consulta na tabela usuários
$stmt = $pdo->prepare('SELECT * FROM usuarios WHERE cpf = :login AND senha = :senha');
$stmt->execute(array(
  ':login'   => $login,
  ':senha' => $senha,
));
// Se encontrar uma linha entra no IF
if (($stmt->rowCount()) == 1) {

  foreach ($stmt as $row) :
    $_SESSION["nome_user"] = $row["nome_user"];
    $_SESSION["cpf"] = $row["cpf"];
    $_SESSION["log"] = $row["cpf"] . " " . $row["nome_user"];
    echo $_SESSION["log"];
  endforeach;



              $startlog = $_SESSION["log"]." Fez o Login!";
              $stmt2 = $pdo->prepare('INSERT INTO logs (ocorrencia) values (:logg)');
              $stmt2->bindParam(':logg',$startlog);
              $stmt2->execute();

              header('Location: inicio.php');

               
} else {
  echo "<script>alert ('Matrícula, Login ou Senha Inválidos!'); location.href='index.php';</script>";
}
