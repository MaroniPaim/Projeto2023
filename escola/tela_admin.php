<!DOCTYPE html>
<html>
<title>Cadastros</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="script.js"></script>



<style>
  body {
    text-align: center;

    background-color: #024e8c;

  }

  .item1 {
    grid-column-start: 2;
  }

  .item2 {
    grid-column-start: 2;
  }

  .item3 {
    grid-column-start: 1;

  }

  .item4 {
    grid-column-start: 3;

  }

  .item5 {
    grid-column-start: 2;
  }

  .grid-item {
    border: 1px solid rgba(0, 0, 0, 0.8);
    padding: 20px;
    font-size: 30px;
    text-align: center;
  }

  .grid-container {

    display: grid;
    grid-template-columns: auto auto auto;
    padding: 35px;


    /*PRA DIMINUIR A DISTANCIA ENTRE AS COLUNAS*/
    justify-content: center;

  }

  .w3-black,
  .w3-hover-black:hover {
    color: #fff !important;
    background-color: #ff9933 !important;
  }

  .header {

    background: #013056;
    background-image: url(img/Senac_logo.svg.png);
    background-repeat: no-repeat;
    background-position: 100%;
    background-size: 100px;

  }
</style>

<body>
  <script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
 
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>
  <div class="w3-container header" style="color:#fff;">
    <h2>Admnistrador</h2>
    <p>Seja bem vindo.</p>
  </div>
  <div class="w3-bar w3-black navbar">
    <div class="dropdown">
      <button class="w3-bar-item w3-button dropbtn">Alunos</button>
      <div class="dropdown-content">
        <a href="#cadastrarAluno" onclick="openCity('London')">Cadastrar Alunos</a>
        <a href="#ListaAlunos" onclick="openCity('Rio')">Todos os alunos</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="w3-bar-item w3-button dropbtn">Professores</button>
      <div class="dropdown-content">
        <a href="#CadastrarProfessor" onclick="openCity('Paris')">Cadastrar Professores</a>
        <a href="#ListaProfessores" onclick="openCity('SaoPaulo')">Lista de Professores</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="w3-bar-item w3-button dropbtn">Cursos</button>
      <div class="dropdown-content">
        <a href="#CadastrarCurso" onclick="openCity('Tokyo')">Cadastrar novo Cursos</a>
        <a href="#ListaCursos" onclick="openCity('BeloHorizonte')">Lista de Cursos</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="w3-bar-item w3-button dropbtn">Turma</button>
      <div class="dropdown-content">
        <a href="#CadastrarTurma" onclick="openCity('Moscou')">Criar nova Turma</a>
        <a href="#ListaTurmas" onclick="openCity('Caxias')">Lista de Turmas</a>
      </div>
    </div>
  </div>
  <div id="London" class="w3-container city">
    <div class="grid-container">
      <div class="title item1">Cadastro de Alunos<br><br></div>
      <div class="item3">
        <!--CADASTRO DE ALUNO ESTÁ FUNCIONANDO-->
        <form action="inserir_aluno.php" method="post">
          <div class="input-container ic2">
            <input id="firstname" class="input" type="text" placeholder=" " name="nome_aluno" />
            <div class="cut"></div>
            <label for="firstname" class="placeholder">Nome</label>
          </div>
          <div class="input-container ic2">
            <input id="lastname" class="input" type="text" placeholder=" " name="cpf" />
            <div class="cut"></div>
            <label for="lastname" class="placeholder">CPF</label>
          </div>
          <div class="input-container ic2">
            <input id="email" class="input" type="text" placeholder=" " name="senha" />
            <div class="cut "></div>
            <label for="email" class="placeholder">Senha</label>
          </div>
          <div class="input-container ic2">
            <!--AQUI A GENTE VAI PRECISAR ADAPTAR 
          PQ EU ESTAVA USANDO UM SELECT-->
            <select class="input" type="text" placeholder=" " name="sexo">
              <option value="M">Masculino</option>
              <option value="F">Feminino</option>
              <option value="E">Chico linguiça</option>
            </select>
            <div class="cut "></div>
            <label for="email" class="placeholder">Sexo</label>
          </div>
          <div class="input-container ic2">
            <input id="email" class="input" type="text" placeholder=" " name="nacionalidade" />
            <div class="cut "></div>
            <label for="email" class="placeholder">Nacionalidade</label>
          </div>
          <div class="input-container ic2">
            <input id="email" class="input" type="text" placeholder=" " name="idade" />
            <div class="cut "></div>
            <label for="email" class="placeholder">Idade</label>
          </div>
          <div class="input-container ic2">
            <input id="email" class="input" type="text" placeholder=" " name="cep" />
            <div class="cut "></div>
            <label for="email" class="placeholder">CEP</label>
          </div>

          <div class="input-container ic2">
            <input id="email" class="input" type="text" placeholder=" " name="rua" />
            <div class="cut"></div>
            <label for="email" class="placeholder">Rua</label>
          </div>
      </div>
      <div class="item4">
        <div class="input-container ic2">
          <input id="email" class="input" type="text" placeholder=" " name="num" />
          <div class="cut "></div>
          <label for="email" class="placeholder">Numero</label>
        </div>

        <div class="input-container ic2">
          <input id="email" class="input" type="text" placeholder=" " name="compl" />
          <div class="cut "></div>
          <label for="email" class="placeholder">Complemento</label>
        </div>

        <div class="input-container ic2">
          <input id="email" class="input" type="text" placeholder=" " name="bairro" />
          <div class="cut "></div>
          <label for="email" class="placeholder">Bairro</label>
        </div>
        <div class="input-container ic2">
          <input id="email" class="input" type="text" placeholder=" " name="cidade" />
          <div class="cut "></div>
          <label for="email" class="placeholder">Cidade</label>
        </div>
        <div class="input-container ic2">
          <input id="email" class="input" type="text" placeholder=" " name="estado" />
          <div class="cut "></div>
          <label for="email" class="placeholder">Estado</label>
        </div>
        <div class="input-container ic2">
          <input id="email" class="input" type="text" placeholder=" " name="ddd" />
          <div class="cut "></div>
          <label for="email" class="placeholder">DDD</label>
        </div>
        <div class="input-container ic2">
          <input id="email" class="input" type="text" placeholder=" " name="fone" />
          <div class="cut "></div>
          <label for="email" class="placeholder">Telefone</label>
        </div>
      </div>
      <div class="item5">
        <button class="submit">Cadastrar</button>
      </div>
      </form>
    </div>
  </div>
  <div id="Paris" class="w3-container city" style="display:none">
    <form action="inserir_professor.php" method="post" class="grid-container">
      <div class="title item1">Cadastro de Professores<br><br></div>

      <div class="item2">
        <div class="input-container ic2">
          <input id="firstname" class="input" type="text" placeholder=" " name="nome_prof" />
          <div class="cut"></div>
          <label for="firstname" class="placeholder">Nome</label>
        </div>
        <div class="input-container ic2">
          <input id="lastname" class="input" type="text" placeholder=" " name="cpf_prof" />
          <div class="cut"></div>
          <label for="lastname" class="placeholder">CPF</label>
        </div>
        <div class="input-container ic2">
          <input id="email" class="input" type="text" placeholder=" " type=password />
          <div class="cut "></div>
          <label for="email" class="placeholder">Senha</label>
        </div>
      </div>

      <div class="item5">
        <button type="text" class="submit">Cadastrar</button>
      </div>


    </form>
  </div>
  <div id="Tokyo" class="w3-container city" style="display:none">
    <div class="grid-container">
      <div class="title item1">Cadastro de Cursos<br><br></div>
      <div class="item2">
        <form action="inserir_curso.php" method="post">
          <div class="input-container ic2">
            <input id="firstname" class="input" type="text" placeholder=" " name="nome_curso" />
            <div class="cut"></div>
            <label for="firstname" class="placeholder">Nome do curso</label>
          </div>
          <div class="input-container ic2">
            <input id="lastname" class="input" type="text" placeholder=" " name="CH" />
            <div class="cut"></div>
            <label for="lastname" class="placeholder">Carga Horaria</label>
          </div>

      </div>
      <div class="item5">
        <button type="text" class="submit">Cadastrar</button>
      </div>
      </form>
    </div>
  </div>
  <div id="Moscou" class="w3-container city" style="display:none">
    <div class="grid-container">
      <div class="title item1">Cadastro de Turmas<br><br></div>
      <div class="item3 subtitle">
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

          <button type="text" class="submit">Cadastrar</button>
        </form>
      </div>
      <div class="item4 subtitle">
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


          <button type="text" class="submit">Cadastrar</button>
        </form>
      </div>
      <div class="item5">
      </div>
    </div>
    <div>

    </div>
    <div>

    </div>
  </div>
  <div id="Rio" class="w3-container city" style="display:none">
    <tbody>
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
            <th>ddd </th>
            <th>fone </th>
          </tr>
          <tr>
            <th class="peq"><input type="text" id="txtColuna1" style="width: 100%;"></th>
            <th><input type="text" id="txtColuna2" /></th>
            <th><input type="text" id="txtColuna3" /></th>
            <th class="peq"><input type="text" id="txtColuna4" style="width: 100%;" class="inputP" /></th>
            <th><input type="text" id="txtColuna5" /></th>
            <th class="peq"><input type="text" id="txtColuna6" style="width: 100%;" class="inputP" /></th>
            <th><input type="text" id="txtColuna7" /></th>
            <th><input type="text" id="txtColuna8" /></th>
            <th class="peq"><input type="text" id="txtColuna9" style="width: 100%;" class="inputP" /></th>
            <th class="peq"><input type="text" id="txtColuna10" style="width: 100%;" class="inputP" /></th>
            <th><input type="text" id="txtColuna11" /></th>
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
              <tD><?php echo $row['id_aluno']; ?></td>
              <tD><?php echo $row['nome_aluno']; ?></a></td>
              <tD><?php echo $row['cpf']; ?></td>
              <tD><?php echo $row['sexo']; ?></td>
              <tD><?php echo $row['nacionalidade']; ?></td>
              <tD><?php echo $row['idade']; ?></td>
              <tD><?php echo $row['cep']; ?></td>
              <tD><?php echo $row['rua']; ?></td>
              <tD><?php echo $row['num']; ?></td>
              <tD><?php echo $row['ddd']; ?></td>
              <tD><?php echo $row['fone']; ?></td>
            </tr>
        <?php
          endforeach;
        }
        ?>

    </tbody>
    </table>
  </div>
  <div id="SaoPaulo" class="w3-container city" style="display:none">
    <tbody>

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
    </table>
  </div>
  <div id="BeloHorizonte" class="w3-container city" style="display:none">
    <tbody>
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
    </table>
  </div>
  <div id="Caxias" class="w3-container city" style="display:none">
    <tbody>
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
    </table>
  </div>

  

</body>

</html>  

