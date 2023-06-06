<?php
    // Executa a conexao com o mysql e selecionar a base
    INCLUDE 'conect.php';
    // Faz a consuta nas tabelas desejadas
$consulta = $pdo->query("SELECT * FROM users;");


while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: {$linha['id_user']} - Login: {$linha['login']} <a href='form_update.php?id_user={$linha['id_user']}'>Atualizar</a>---<a href='delete.php?id_user={$linha['id_user']}'>Deletar</a><br /> ";
}
