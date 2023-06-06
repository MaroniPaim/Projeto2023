<h1>Logado como Professor<br>
    Seja bem vindo, <?php session_start();
                    echo $_SESSION['nome_prof'] ?>

</h1>

<div>
    <h2>Cadastrar Nota</h2>
    <form action="inserir_nota.php" method="post">
    Turma <select name="fk_id_turma" id="fk_id_turma">
    <option>Selecione a Turma:</option>

            <?php
            include 'conect.php';
            $id_prof = $_SESSION["id_prof"];
            echo $_SESSION['id_prof'];
            $stmt1 = $pdo->prepare(
            'SELECT turmas.id_turma,turmas.fk_id_curso, cursos.nome_curso
            FROM turmas
            LEFT JOIN cursos
            ON turmas.fk_id_curso=cursos.id_curso
            WHERE turmas.fk_id_professor = :id_prof
            ORDER BY cursos.nome_curso ASC;');
            $stmt1->bindParam(':id_prof', $id_prof);
            $stmt1->execute();


            if (($stmt1->rowCount()) > 0) {

            foreach ($stmt1 as $row1) :

            ?>

            <option value="<?php echo $row1['id_turma']; ?>"><?php echo $row1['nome_curso']; ?></option>
            <?php

                endforeach;
            }
            ?>

            </select><br>

            Selecione o Aluno <select name="fk_id_aluno" id="fk_id_aluno">
            <option>Selecione o Aluno:</option>

            <?php
            $id_prof = $_SESSION["id_prof"];
            echo $_SESSION['id_prof'];
            $stmt1 = $pdo->prepare(

                'SELECT fk_id_aluno, alunos.nome_aluno, cursos.nome_curso,fk_id_turma
                FROM alunos_turmas
                LEFT JOIN alunos
                ON alunos.id_aluno=alunos_turmas.fk_id_aluno
                LEFT JOIN turmas
                ON turmas.id_turma=alunos_turmas.fk_id_turma
                LEFT JOIN cursos
                ON turmas.fk_id_curso=cursos.id_curso
                WHERE fk_id_professor = :id_prof');

            $stmt1->bindParam(':id_prof', $id_prof);
            $stmt1->execute();

            if (($stmt1->rowCount()) > 0) {
                foreach ($stmt1 as $row1) :
            ?>
                    <option value="<?php echo $row1['fk_id_aluno']; ?>"><?php echo $row1['nome_aluno']; ?> - <?php echo $row1['nome_curso']; ?></option>
            <?php
                endforeach;
            }
            ?>

        </select><br>
        Nota <input name="nota"><br>
        <button type="submit"> Salvar</button>
        </form>
</div>