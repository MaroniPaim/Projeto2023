<?php
// PHP DATA OBJECT - PHP Orinetado a Objetos
    $username = 'root'; /* Nome do usuário do Banco*/
    $password = ''; /* Senha do usuário do Banco*/
    $pdo = new PDO('mysql:host=localhost;dbname=escola', $username, $password); /* Cria um novo objeto e passa para Variável PDO*/
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);/* Irá exibir as exceções erros ao objeto pdo */

    ?>