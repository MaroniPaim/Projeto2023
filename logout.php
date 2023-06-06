<?php
include 'conect.php';
session_start();
// $endlog = $_SESSION["log"]." Fez o Logout!";
// $stmt2 = $pdo->prepare('INSERT INTO logs (ocorrencia) values (:log)');
// $stmt2->bindParam(':log',$endlog);
// $stmt2->execute();
// session_unset(); 
// destroy the session 
// session_destroy(); 
header('Location: index.php');
?>