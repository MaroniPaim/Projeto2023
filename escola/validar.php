<?php
    // Executa a conexao com o mysql e selecionar a base
    INCLUDE 'conect.php';

    session_start(); //faz o arquivo iniciar a sessao com o browser
    
    // pega dados via POST
    // Recebe o valo do email
    $login = $_POST["login"];
    // Recebe o valo do email
    $senha = $_POST["senha"];
    // Converte a senha em um hash criptografado de SHA1
    $senha = sha1($senha);

// Faz a consulta na tabela usuários
    $stmt = $pdo->prepare('SELECT * FROM users WHERE login = :login AND senha = :senha');
    $stmt->execute(array(
      ':login'   => $login,
      ':senha' => $senha,
    ));
  // Se encontrar uma linha entra no IF
    if(($stmt->rowCount()) ==1){

        foreach($stmt as $row):/* descarrega o statement para a variável $row */
            $_SESSION["id_user"] = $row["id_user"]; /* Cria a seção com o id do user */
            header('Location: tela_admin.php');
        endforeach;
    }
// faz a consula na tabela Alunos
    $stmt2 = $pdo->prepare('SELECT * FROM alunos WHERE cpf = :login AND senha = :senha');
    $stmt2->execute(array(
      ':login'   => $login,
      ':senha' => $senha,
    ));
  // Se encontrar uma linha entra no IF
    if(($stmt2->rowCount()) ==1){
        foreach($stmt2 as $row2):/* descarrega o statement2 para a variável $row2 */
            $_SESSION["id_aluno"] = $row2["id_aluno"]; /* Cria a seção com o id do aluno */
            $_SESSION["nome_aluno"] = $row2["nome_aluno"]; /* Cria a seção com o id do aluno */

            header('Location: tela_aluno.php');
        endforeach;
    } else {
        echo "<script>alert ('Matrícula, Login ou Senha Inválidos!'); location.href='index.html';</script>";
    }
    $stmt3 = $pdo->prepare('SELECT * FROM professores WHERE cpf_prof = :login AND senha =:senha');
    $stmt3 -> execute(array(
      ':login' => $login,
      ':senha' => $senha,

    ));
    if(($stmt3 ->rowCount())==1){
      foreach($stmt3 as $row3):
        $_SESSION["id_prof"] = $row3["id_professor"];
        $_SESSION["nome_prof"] = $row3["nome_prof"];

        header('Location: tela_prof1.php');
      endforeach;
    } else {
      echo "<script>alert ('Matrícula, Login ou Senha Inválidos!'); location.href='index.html';</script>";
    }

    ?>
