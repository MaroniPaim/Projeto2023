<!DOCTYPE html>
<html>
<?php 
include 'conect.php';

  session_start();
  $endlog = $_SESSION["log"]." Fez o Logout!";
  $stmt2 = $pdo->prepare('INSERT INTO logs (ocorrencia) values (:log)');
  $stmt2->bindParam(':log',$endlog);
  $stmt2->execute();
session_unset(); 
// destroy the session 
session_destroy(); 
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
    .box{display: grid;}


  </style>
<script src="../projeto2023/assets/dist/js/bootstrap.bundle.min.js"></script>
<link href="../projeto2023/assets/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body style="display: flex; justify-content: center;">

  <div style="width:30%; ">

    <form action="validar.php" method="post">
      
      <div class="box">
        <label for="Login"><b>CPF ou Login</b></label>
        <input type="text" placeholder="Digite seu CPF ou Login" name="login" required>

        <label for="senha"><b>Senha</b></label>
        <input type="password" placeholder="Digite sua Senha" name="senha" required>

        <button type="submit" class="btn btn-primary" >Login</button>

      </div>

    </form>

  </div>
</body>

</html>
