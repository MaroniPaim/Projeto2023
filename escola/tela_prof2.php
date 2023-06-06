<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    <script type="text/javascript" src="jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<h1 align="center">Professor <?php
                            include 'conect.php';
                            session_start();
                            echo $_SESSION['nome_prof']; ?><br><?php
                                                                if (isset($_GET['id_turma'])) {
                                                                    $_SESSION['fk_id_turma'] = $_GET['id_turma'];
                                                                }
                                                                echo " Turma " . $_SESSION['fk_id_turma'];
                                                                ;

                                                                ?>

    <br>
</h1>

<div align="center">
    <h2>Cadastrar Nota</h2>
    <form action="inserir_nota.php" method="post">

    

        <h4>Selecione o Aluno</h4> <select class="select" name="fk_id_aluno" id="fk_id_aluno" >
            <option>Selecione o Aluno:</option>
            <?php
            $id_prof = $_SESSION['id_prof'];
            $fk_id_turma = $_SESSION['fk_id_turma'];
            $stmt1 = $pdo->prepare(

                'SELECT fk_id_aluno, alunos.nome_aluno, cursos.nome_curso,fk_id_turma
                FROM alunos_turmas
                LEFT JOIN alunos
                ON alunos.id_aluno=alunos_turmas.fk_id_aluno
                LEFT JOIN turmas
                ON turmas.id_turma=alunos_turmas.fk_id_turma
                LEFT JOIN cursos
                ON turmas.fk_id_curso=cursos.id_curso
                WHERE fk_id_professor = :id_prof AND fk_id_turma = :fk_id_turma'
            );


            $stmt1->execute(array(
                ':id_prof'   => $id_prof,
                ':fk_id_turma' => $fk_id_turma,
            ));

            if (($stmt1->rowCount()) > 0) {
                foreach ($stmt1 as $row1) :

            ?>

                    <option value="<?php echo $row1['fk_id_aluno']; ?>"><?php echo $row1['nome_aluno']; ?> - <?php echo $row1['nome_curso']; ?></option>

            <?php
                endforeach;
            }
            ?>

        </select><br><br>
        <h4>Nota</h4> <input name="nota"><br><br><br>
        <button type="submit" class="submit"> Salvar</button>
        <a href="tela_prof1.php" style="text-decoration: none" class="submit">Selecionar a Turma</a>
    </form>

</div>
<div align="center">
    <tbody>
        <table id="tabela" style="width:30% ;">
            <thead style="background-color: lightblue;">
                <tr>
                    <th>Matricula</th>
                    <th>Nome</th>
                    <th>Nota</th>

                </tr>
                <tr>
                    <th><input type="text" id="txtColuna1" /></th>
                    <th><input type="text" id="txtColuna2" /></th>
                    <th><input type="text" id="txtColuna3" /></th>

                </tr>
            </thead>
            <?php
            $stmt = $pdo->prepare('SELECT notas.nota,alunos_turmas.fk_id_aluno,alunos.nome_aluno
                    FROM notas
                    LEFT JOIN alunos_turmas
                    ON notas.fk_id_aluno=alunos_turmas.fk_id_aluno
                    LEFT JOIN alunos
                    ON notas.fk_id_aluno = alunos.id_aluno
                    WHERE alunos_turmas.fk_id_turma = :fk_id_turma
                    ');

            $stmt->bindParam(':fk_id_turma', $fk_id_turma);
            $stmt->execute();

            if (($stmt->rowCount()) > 0) {
                foreach ($stmt as $row) :
            ?>
                    <tr>
                        <td><?php echo $row['fk_id_aluno']; ?></td>
                        <td><?php echo $row['nome_aluno']; ?></a></td>
                        <td><?php echo $row['nota']; ?></td>
                    </tr>
            <?php
                endforeach;
            }
            ?>

    </tbody>
    </table>
</div>