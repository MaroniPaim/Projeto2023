<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    <script type="text/javascript" src="jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    </head>

<body>
    <div style="display: flex;
                justify-content: space-evenly;
                align-items: baseline;
                ">

        <div>
            <h2>Cadastrar Aluno</h2>
            <form action="inserir_aluno.php" method="post">
                Nome<input name="nome_aluno"><br />
                CPF<input name="cpf"><br />
                Senha<input name="senha"><br />
                Sexo<select name="sexo">
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select><br />
                Nacionalidade<input name="nacionalidade"><br />
                idade<input name="idade"><br />
                cep<input name="cep"><br />
                rua<input name="rua"><br />
                num<input name="num"><br />
                compl<input name="compl"><br />
                bairro<input name="bairro"><br />
                cidade<input name="cidade"><br />
                estado<input name="estado"><br />
                ddd<input name="ddd"><br />
                fone<input name="fone"><br />
                <button type="submit"> Salvar</button>
            </form>

        </div>

        <div>
            <h2>Cadastrar Professor</h2>
            <form action="inserir_professor.php" method="post">
                Nome<input name="nome_prof"><br />
                CPF<input name="cpf_prof"><br>
                Senha<input name="senha_prof" type=password><br />
                <button type="submit"> Salvar</button>
            </form>
        </div>
        <div>
            <h2>Cadastrar Curso</h2>
            <form action="inserir_curso.php" method="post">
                Nome do Curso<input name="nome_curso"><br />
                Carga Horaria<input name="CH"><br />

                <button type="submit"> Salvar</button>
            </form>
        </div>
        <div>
            <h2>Nova Turma</h2>
            <form action="nova_turma.php" method="post">
                Professor<select name="id_prof" id="id_prof">
                    <option>Selecione o Professor:</option>

                    <?php
                    include "conect.php";
                    $stmt1 = $pdo->prepare('SELECT * FROM professores');
                    $stmt1->execute();
                    if (($stmt1->rowCount()) > 0) {

                        foreach ($stmt1 as $row1) :
                    ?>
                            <option value="<?php echo $row1['id_professor']; ?>"><?php echo $row1['nome_prof']; ?></option>
                    <?php
                        endforeach;
                    }
                    ?>
                </select><br>

                Curso<select name="id_curso" id="id_curso">
                    <option>Selecione o Curso:</option>
                    <?php
                    $stmt1 = $pdo->prepare('SELECT * FROM cursos');
                    $stmt1->execute();
                    if (($stmt1->rowCount()) > 0) {
                        foreach ($stmt1 as $row1) :
                    ?>
                            <option value="<?php echo $row1['id_curso']; ?>"><?php echo $row1['nome_curso']; ?></option>
                    <?php
                        endforeach;
                    }
                    ?>
                </select><br>

                Selecione o inicio das aulas
                <input type="date" id="letivo" name="letivo">
                <br>

                <button type="submit"> Salvar</button>
            </form>
        </div>
        <div>
            <h2>Adicionar Alunos a turma</h2>
            <form action="inserir_a_turma.php" method="post">
                Aluno<select name="id_aluno" id="id_aluno">
                    <option>Selecione o Aluno:</option>

                    <?php
                    include "conect.php";
                    $stmt1 = $pdo->prepare('SELECT * FROM alunos');
                    $stmt1->execute();
                    if (($stmt1->rowCount()) > 0) {

                        foreach ($stmt1 as $row1) :
                    ?>
                            <option value="<?php echo $row1['id_aluno']; ?>"><?php echo $row1['id_aluno'] . ' - ' . $row1['nome_aluno']; ?></option>
                    <?php
                        endforeach;
                    }
                    ?>
                </select><br>

                Curso<select name="id_turma" id="id_turma">
                    <option>Selecione o Curso:</option>
                    <?php
                    $stmt1 = $pdo->prepare('SELECT turmas.id_turma,turmas.fk_id_curso, cursos.nome_curso, professores.nome_prof
                    FROM turmas
                    LEFT JOIN cursos
                    ON turmas.fk_id_curso=cursos.id_curso
                    LEFT JOIN professores
                    on turmas.fk_id_professor=professores.id_professor
                    ORDER BY turmas.id_turma;');
                    $stmt1->execute();
                    if (($stmt1->rowCount()) > 0) {
                        foreach ($stmt1 as $row1) :
                    ?>
                            <option value="<?php echo $row1['id_turma']; ?>"><?php echo $row1['id_turma'] . ' - ' . $row1['nome_curso'] . ' - ' . $row1['nome_prof']; ?></option>
                    <?php
                        endforeach;
                    }
                    ?>
                </select><br>


                <button type="submit"> Salvar</button>
            </form>
        </div>
    </div>
    <br><br><br>
<div>  <tbody>
        <table id="tabela">
            <thead style="background-color: lightblue;">
                <tr>
                    <th>Matricula</th>
                    <th>Nome </th>
                    <th>CPF </th>
                    <th>sexo </th>
                    <th>nacionalidade </th>
                    <th>idade </th>
                    <th>cep </th>
                    <th>rua </th>
                    <th>num </th>
                    <th>compl </th>
                    <th>bairro </th>
                    <th>cidade </th>
                    <th>estado </th>
                    <th>ddd </th>
                    <th>fone </th>
                </tr>
                <tr>
                    <th><input type="text" id="txtColuna1" /></th>
                    <th><input type="text" id="txtColuna2" /></th>
                    <th><input type="text" id="txtColuna3" /></th>
                    <th><input type="text" id="txtColuna4" /></th>
                    <th><input type="text" id="txtColuna5" /></th>
                    <th><input type="text" id="txtColuna6" /></th>
                    <th><input type="text" id="txtColuna7" /></th>
                    <th><input type="text" id="txtColuna8" /></th>
                    <th><input type="text" id="txtColuna9" /></th>
                    <th><input type="text" id="txtColuna10" /></th>
                    <th><input type="text" id="txtColuna11" /></th>
                    <th><input type="text" id="txtColuna12" /></th>
                    <th><input type="text" id="txtColuna13" /></th>
                    <th><input type="text" id="txtColuna14" /></th>
                    <th><input type="text" id="txtColuna15" /></th>

                    
                    
                </tr>
            </thead>
            <?php
            $stmtA = $pdo->prepare('SELECT * from alunos
                    ');
            $stmtA->execute();

            if (($stmtA->rowCount()) > 0) {
                foreach ($stmtA as $row) :
            ?>
                    <tr>
                        <td><?php echo $row['id_aluno']; ?></td>
                        <td><?php echo $row['nome_aluno']; ?></a></td>
                        <td><?php echo $row['cpf']; ?></td>
                        <td><?php echo $row['sexo']; ?></td>
                        <td><?php echo $row['nacionalidade']; ?></td>
                        <td><?php echo $row['idade']; ?></td>
                        <td><?php echo $row['cep']; ?></td>
                        <td><?php echo $row['rua']; ?></td>
                        <td><?php echo $row['num']; ?></td>
                        <td><?php echo $row['compl']; ?></td>
                        <td><?php echo $row['bairro']; ?></td>
                        <td><?php echo $row['cidade']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                        <td><?php echo $row['ddd']; ?></td>
                        <td><?php echo $row['fone']; ?></td>
                    </tr>
            <?php
                endforeach;
            }
            ?>

    </tbody>
    </table></div>
    <br><br><br>
<div>  <tbody>
    
        <table id="tabela">
            <thead style="background-color: lightblue;">
                <tr>
                    <th>ID Professor</th>
                    <th>Nome </th>
                    <th>CPF </th>
                </tr>
                <tr>
                    <th><input type="text" id="txtColuna1" /></th>
                    <th><input type="text" id="txtColuna2" /></th>
                    <th><input type="text" id="txtColuna3" /></th>
                </tr>
            </thead>
            <?php

            $stmtProf = $pdo->prepare('SELECT * from professores
                    ');
            $stmtProf->execute();

            if (($stmtProf->rowCount()) > 0) {
                foreach ($stmtProf as $row) :
            ?>
                    <tr>
                        <td><?php echo $row['id_professor']; ?></td>
                        <td><?php echo $row['nome_prof']; ?></a></td>
                        <td><?php echo $row['cpf_prof']; ?></td>

                    </tr>
            <?php
                endforeach;
            }
            ?>

    </tbody>
    </table></div>
    <br><br><br>
<div>  <tbody>
        <table id="tabela">
            <thead style="background-color: lightblue;">
                <tr>
                    <th>ID Curso</th>
                    <th>Curso </th>
                    <th>Carga Horaria </th>
                </tr>
                <tr>
                    <th><input type="text" id="txtColuna1" /></th>
                    <th><input type="text" id="txtColuna2" /></th>
                    <th><input type="text" id="txtColuna3" /></th>      
                </tr>
            </thead>
            <?php
            $stmtCurso = $pdo->prepare('SELECT * from cursos
                    ');
            $stmtCurso->execute();

            if (($stmtCurso->rowCount()) > 0) {
                foreach ($stmtCurso as $row) :
            ?>
                    <tr>
                        <td><?php echo $row['id_curso']; ?></td>
                        <td><?php echo $row['nome_curso']; ?></a></td>
                        <td><?php echo $row['carga_horaria']; ?></td>

                    </tr>
            <?php
                endforeach;
            }
            ?>

    </tbody>
    </table></div>
    <br><br><br>
<div>  <tbody>
        <table id="tabela">
            <thead style="background-color: lightblue;">
                <tr>
                    <th>Turma</th>
                    <th>Inicio das aulas </th>
                    <th>Curso </th>
                    <th>Professor(a) </th>
                </tr>
                <tr>
                    <th><input type="text" id="txtColuna1" /></th>
                    <th><input type="text" id="txtColuna2" /></th>
                    <th><input type="text" id="txtColuna3" /></th>
                    <th><input type="text" id="txtColuna4" /></th>
                </tr>
            </thead>
            <?php
            $stmtTurmas = $pdo->prepare('SELECT turmas.id_turma,turmas.periodo_letivo,cursos.nome_curso,professores.nome_prof
            FROM turmas
            LEFT JOIN cursos
            ON turmas.fk_id_curso = cursos.id_curso
            LEFT JOIN professores
            ON turmas.fk_id_professor = professores.id_professor
            
                    ');
            $stmtTurmas->execute();

            if (($stmtTurmas->rowCount()) > 0) {
                foreach ($stmtTurmas as $row) :
            ?>
                    <tr>
                        <td><?php echo $row['id_turma']; ?></td>
                        <td><?php echo $row['periodo_letivo']; ?></a></td>
                        <td><?php echo $row['nome_curso']; ?></td>
                        <td><?php echo $row['nome_prof']; ?></td>
                    </tr>
            <?php
                endforeach;
            }
            ?>

    </tbody>
    </table></div>
    <br>
    </html>