<?php
$id_user = $_GET['id_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insert.php" method="post">
        <input name='id_user' value="<?= $id_user?>" readonly>
        Login<input name="login">
        Senha<input type="password" name="senha">
        <button type="submit"> Atualizar</button>
        <button onclick="history.back()">Voltar</button>

    </form>
</body>
</html>