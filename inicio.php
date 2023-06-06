<!DOCTYPE html>
<html lang="pt-br">
<?php
include 'conect.php';
session_start();

if ($_SESSION["cpf"] == null) {
    echo "<script>alert ('Matrícula, Login ou Senha Inválidos!'); location.href='index.php';</script>";
}


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link href="sidebars.css" rel="stylesheet">
    <link href="../projeto2023/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



    <style>
        .lista1 li {
            padding-top: 3%;
            margin-left: 10px;

        }

        .lista1 .btn {
            width: 150px;
        }

        .tela {
            width: 1000px;
            margin-top: 2%;
            margin-left: 2%;
        }

        .tela1 {
            display: grid;
            grid-template-columns: auto;
            grid-template-rows: max-content;

        }

        #listadebotoes {
            margin-top: 10%;
            display: flex;
            width: fit-content;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .nav .btn {
            border-radius: 0;
        }
    </style>
    <script src="../projeto2023/assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../projeto2023/assets/dist/js/sidebars.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../projeto2023/assets/dist/js/dashboard.js"></script>
</head>

<body>
    <main class="d-flex flex-nowrap">

        <!--ABA LATERAL-->
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
            <div class="align-self-center">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <span class="fs-4 align-self-center">Seja Bem Vindo</span>
                </a>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="w3-bar-item w3-button tablink btn bg-primary link-white" onclick="openCity(event,'Home')">
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class=" w3-bar-item w3-button tablink" onclick="openCity(event,'Feiras')">

                        Feiras
                    </a>
                </li>
                <li>
                    <a href="#" class=" w3-bar-item w3-button tablink" onclick="openCity(event,'Clientes')">

                        Clientes
                    </a>
                </li>
                <li>
                    <a href="#" class=" w3-bar-item w3-button tablink" onclick="openCity(event,'Fornecedores')">

                        Fornecedores
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://avatars.githubusercontent.com/u/102095323?v=4" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong><?php echo $_SESSION["nome_user"] ?></strong>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="logout.php" method="post">
                            <input class="dropdown-item" type="submit" value="Sair">
                        </form>
                    </li>

                </ul>
            </div>
        </div>
        <div class="b-example-divider b-example-vr"></div>
        <!--FIM DA ABA LATERAL-->

        <div class="tela">
            <div class="tela1 city w3-animate-top" id="Home">
                <h1>Pagina Inicial</h1>

            </div>
            <div class="city w3-animate-top" id="Feiras" style="display:none">

                <tbody>
                    <table class=" w-100">
                        <thead style="background-color: lightblue;">
                            <tr>
                                <th>ID</th>
                                <th>Feira</th>
                                <th>Local</th>
                                <th>Data Inicio</th>
                                <th>Data Fim</th>
                            </tr>
                        </thead>
                        <?php
                        $stmt = $pdo->prepare('SELECT * FROM feiras');
                        $stmt->execute();

                        if (($stmt->rowCount()) > 0) {
                            foreach ($stmt as $row) :
                        ?>
                                <tr>
                                    <td><a class="tablink" onclick="openCity(event,'ID_feira')"><?php echo $row['ID_feira']; ?></a></td>
                                    <td><?php echo $row['Nome_feira']; ?></td>
                                    <td><?php echo $row['Lugar']; ?></td>
                                    <td><?php echo $row['Data_inicio']; ?></td>
                                    <td><?php echo $row['Data_fim']; ?></td>
                                </tr>
                        <?php
                            endforeach;
                        }
                        ?>
                </tbody>
                </table>
                <hr>

                <form method="post">

                    <input id="firstname" class="input" type="text" placeholder="Nome da Feira" name="nome_feira" />
                    <input id="firstname" class="input" type="text" placeholder="Local da Feira " name="local" />
                    <input id="firstname" class="input" type="date" placeholder="Data de Inicio" name="data_inicio" />
                    <input id="firstname" class="input" type="date" placeholder="Data final" name="data_fim" />

                    <button class="btn btn-primary" formaction="inserir_feira.php">Adicionar Nova Feira</button>
                </form>





            </div>

            <div class="city" id="Clientes" style="display:none">

                <tbody>
                    <table class=" w-100">
                        <thead style="background-color: lightblue;">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Cidade</th>
                                <th>Mercadoria</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        <?php
                        $stmt = $pdo->prepare('SELECT * FROM clientes_cadastros');
                        $stmt->execute();

                        if (($stmt->rowCount()) > 0) {
                            foreach ($stmt as $row) :
                        ?>
                                <tr>
                                    <td><a class="tablink " onclick="openCity(event,'Id_Cliente')"><?php echo $row['Id_Cliente']; ?></a></td>
                                    <td><?php echo $row['Nome_Cliente']; ?></td>
                                    <td><?php echo $row['Cidade'] . " - " . $row['UF']; ?></td>
                                    <td><?php echo $row['Mercadoria']; ?></td>
                                    <td><?php echo $row['telefone']; ?></td>
                                </tr>
                        <?php
                            endforeach;
                        }
                        ?>
                        </thead>
                    </table>
                    </table>

                </tbody>
            </div>
            <div class="city" id="Fornecedores" style="display:none">
                <tbody>
                    <table class=" w-100">
                        <thead style="background-color: lightblue;">
                            <tr>

                                <th>ID</th>
                                <th>Nome</th>
                                <th>CNPJ/CPF</th>
                                <th>Pix1</th>
                                <th>Favorecido</th>
                            </tr>
                        </thead>
                        <?php
                        $stmt = $pdo->prepare('SELECT * FROM fornecedores_cadastro');
                        $stmt->execute();

                        if (($stmt->rowCount()) > 0) {
                            foreach ($stmt as $row) :
                        ?>
                                <tr>
                                    <td><a class="tablink" onclick="openCity(event,'id_fornecedor')"><?php echo $row['id_fornecedor']; ?></a></td>
                                    <td><?php echo $row['nome_fornecedor']; ?></td>
                                    <td><?php echo $row['CNPJ_CPF']; ?></td>
                                    <td><?php echo $row['Pix1']; ?></td>
                                    <td><?php echo $row['favorecido1']; ?></td>
                                </tr>
                        <?php
                            endforeach;
                        }
                        ?>
                </tbody>
                </table>
                <hr>

                <form method="post">
                    <input id="firstname" class="input" type="text" placeholder="Nome da empresa" name="nome_fornecedor" />
                    <input id="firstname" class="input" type="text" placeholder="CPF ou CNPJ" name="CNPJ_CPF" />
                    <input id="firstname" class="input" type="text" placeholder="Pix" name="Pix1" />
                    <input id="firstname" class="input" type="text" placeholder="Nome do favorecido" name="favorecido1" />
                    <button class="btn btn-primary" formaction="inserir_fornecedor.php">Adicionar Novo Fornecedor</button>
                </form>
            </div>
            <div class="city" id="id_fornecedor" style="display:none">
                <a href="#" class=" w3-bar-item w3-button tablink" onclick="openCity(event,'Feiras')">Fornecedores</a>

<tbody>
                    <table class=" w-100">
                        <thead style="background-color: lightblue;">
                            <tr>
                                
                                <th>Valorrr</th>
                                <th>Data</th>
                                <th>referente a</th>
                            
                            </tr>
                        </thead>
                        <?php
                        $stmt = $pdo->prepare('SELECT Data,Valor,referente_a FROM fornecedores_pagamento');
                        $stmt->execute();

                        if (($stmt->rowCount()) > 0) {
                            foreach ($stmt as $row) :
                        ?>
                                <tr>
                                    <td><?php echo $row['Valor']; ?></td>
                                    <td><?php echo $row['Data']; ?></td>
                                    <td><?php echo $row['referente_a']; ?></td>
                                </tr>
                        <?php
                            endforeach;
                        }
                        ?>
                </tbody>
                </table>


            </div>
            <div class="city" id="Id_Cliente" style="display:none">
                <a href="#" class=" w3-bar-item w3-button tablink" onclick="openCity(event,'Clientes')">Voltar</a>
            </div>
            <div class="city" id="ID_feira" style="display:none">
                <a href="#" class=" w3-bar-item w3-button tablink" onclick="openCity(event,'Feiras')">Voltar</a>
                </a>
            </div>


        </div>
    </main>
    <script>
        function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" btn bg-primary link-white", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " btn bg-primary link-white";
        }

        function semnomeainda(x, y) {

        }
    </script>
</body>

</html>