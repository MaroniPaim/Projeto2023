<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    <script type="text/javascript" src="jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="estilo.css">
    </head>


<h1 align="center">Logado como Professor<br>
<?php session_start();
                   echo $_SESSION['nome_prof']; 
                   include 'conect.php';
            $id_prof = $_SESSION["id_prof"]; ?>
    <p>Seja bem vindo</p>
                   
</h1>

<div align="center">
        <tbody>
        <table id="tabela" style="width:30% ;">
                <thead style="background-color: lightblue;">
                    <tr>
                        <th>Turma</th>
                        <th>Disciplina</th>
                        <th>Inicio das Aulas</th>
                        <th>Carga Horaria</th>
                    </tr>
                    <tr>
                        <th><input type="text" id="txtColuna1" /></th>
                        <th><input type="text" id="txtColuna2" /></th>
                        <th><input type="text" id="txtColuna3" /></th>
                        <th><input type="text" id="txtColuna4" /></th>
                    </tr>
                </thead>
                    <?php
                    $stmt = $pdo->prepare('SELECT turmas.id_turma,cursos.nome_curso,turmas.periodo_letivo,cursos.carga_horaria
                    FROM turmas
                    LEFT JOIN cursos
                    ON turmas.fk_id_curso = cursos.id_curso
                    WHERE turmas.fk_id_professor = :id_prof
                    ');

                    $stmt->bindParam(':id_prof', $id_prof);
                    $stmt->execute();

                    if (($stmt->rowCount()) > 0) {
                        foreach ($stmt as $row) :
                    ?>
                            <tr>
                                <td><a href="tela_prof2.php?id_turma=<?php echo $row['id_turma']; ?>"><?php echo $row['id_turma']; ?></a></td>
                                <td><?php echo $row['nome_curso']; ?></td>
                                <td><?php echo $row['periodo_letivo']; ?></td>
                                <td><?php echo $row['carga_horaria']; ?></td>
                            </tr>
                    <?php
                        endforeach;
                    }
                    ?>

                </tbody>
            </table>
</div>