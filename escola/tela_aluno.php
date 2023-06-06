<DOCTYPE html>
    <html>
    <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    <script type="text/javascript" src="jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    </head>
    <?php include 'conect.php'; ?>
    <body>
        <h1>Seja bem vindo,
            <?php session_start();
            echo $_SESSION['nome_aluno'];  ?>
            <br><br>
            Confira suas notas abaixo:
        </h1>
        <div id="divConteudo">
            <table id="tabela">
                <thead style="background-color: lightblue;">
                    <tr>
                        <th>Turma</th>
                        <th>Disciplina</th>
                        <th>Professor</th>
                        <th>Nota</th>
                    </tr>
                    <tr>
                        <th><input type="text" id="txtColuna1" /></th>
                        <th><input type="text" id="txtColuna2" /></th>
                        <th><input type="text" id="txtColuna3" /></th>
                        <th><input type="text" id="txtColuna4" /></th>
                        <!-- Basta ir seguindo a sequencia que será adicionado pelo JS -->
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $id_aluno = $_SESSION["id_aluno"];
                    $stmt = $pdo->prepare('select notas.nota,notas.fk_id_aluno,notas.fk_id_turma,professores.nome_prof,turmas.fk_id_professor,turmas.fk_id_curso,alunos.nome_aluno,cursos.nome_curso
                    FROM notas
                    LEFT JOIN turmas
                    ON notas.fk_id_turma = turmas.id_turma
                    LEFT JOIN professores
                    ON turmas.fk_id_professor = professores.id_professor
                    LEFT JOIN cursos
                    ON turmas.fk_id_curso = cursos.id_curso
                    LEFT JOIN alunos
                    ON notas.fk_id_aluno = alunos.id_aluno
                    WHERE fk_id_aluno = :id_aluno
                    ');

                    $stmt->bindParam(':id_aluno', $id_aluno);
                    $stmt->execute();

                    if (($stmt->rowCount()) > 0) {
                        foreach ($stmt as $row) :
                    ?>
                            <tr>
                                <td><?php echo $row['fk_id_turma']; ?></td>
                                <td><?php echo $row['nome_curso']; ?></td>
                                <td><?php echo $row['nome_prof']; ?></td>
                                <td><?php echo $row['nota']; ?></td>
                            </tr>
                    <?php
                        endforeach;
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </body>

    </html>