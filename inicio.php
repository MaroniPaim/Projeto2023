<!DOCTYPE html>
<html lang="pt-br">
<?php
include 'conect.php';
session_start();

if ($_SESSION["cpf"] == null) {
    echo "<script>alert ('Login ou Senha Inválidos!'); location.href='index.php';</script>";
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


    <script>
        $(document).ready(function() {
            $("button").click(function() {
                var id = $(this).val(); // Obter o valor do botão clicado
                var fetchFile = $(this).data("fetch-file"); // Obter o valor do atributo de dados "fetch-file"
                var targetSelector = $(this).data("target-selector"); // Obter o valor do atributo de dados "target-selector"

                // Fazer a solicitação POST para o arquivo PHP correspondente
                $.post(fetchFile, {
                        fetchid: id
                    },
                    function(data, status) {
                        $(targetSelector).html(data);
                    });
            });
        });
    </script>



    <style>
        .lista1 li {
            padding-top: 3%;
            margin-left: 10px;

        }

        .lista1 .btn {
            width: 150px;
        }

        .tela {
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

        .idLink {
            text-decoration: underline;
        }
    </style>
    <script src="../projeto2023/assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../projeto2023/assets/dist/js/sidebars.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
</head>

<body>
    <main class="d-flex flex-nowrap ">

        <!--ABA LATERAL-->
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
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

        <div class="tela w-100">
            <div class="tela1 city w3-animate-top " id="Home">
                <h1>Pagina Inicial</h1>
            </div>
            <div class="city w-100" id="Feiras" style="display:none">
                <table class="w-100">
                    <thead style="background-color: lightblue;">
                        <tr>
                            <th>ID</th>
                            <th>Feira</th>
                            <th>Local</th>
                            <th>Data Inicio</th>
                            <th>Data Fim</th>
                        </tr>
                    </thead>
                    <tbody id="feirasTableBody">
                        <?php
                        $stmt = $pdo->prepare('SELECT * FROM feiras');
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            foreach ($stmt as $row) :
                        ?>
                                <tr>
                                    <td><a class="idLink" onclick="openCity('simplelink','ID_feira')"><?php echo $row['ID_feira']; ?></a></td>
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

                <form id="myForm" method="post" class="w-75">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nome_feira">Nome da Feira</label>
                            <input id="nome_feira" class="input form-control" type="text" placeholder="Local Mes Ano" name="nome_feira" />

                            <label for="local">Local da Feira</label>
                            <input id="local" class="input form-control" type="text" placeholder="Exemplo: Riocentro" name="local" />
                        </div>

                        <div class="col-md-6">
                            <label for="data_inicio">Data de Início</label>
                            <input id="data_inicio" class="input form-control" type="date" name="data_inicio" />

                            <label for="data_fim">Data Final</label>
                            <input id="data_fim" class="input form-control" type="date" name="data_fim" />
                        </div>
                    </div>
                    <br>
                    <button id="submitButton" class="btn btn-primary">Adicionar Nova Feira</button>
                </form>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#submitButton').click(function(e) {
                            e.preventDefault(); // Impede o envio padrão do formulário

                            // Coleta os dados do formulário
                            var nomeFeira = $('#nome_feira').val();
                            var local = $('#local').val();
                            var dataInicio = $('#data_inicio').val();
                            var dataFim = $('#data_fim').val();

                            // Cria um objeto com os dados do formulário
                            var formData = {
                                nome_feira: nomeFeira,
                                local: local,
                                data_inicio: dataInicio,
                                data_fim: dataFim
                            };

                            // Envia os dados via AJAX
                            $.ajax({
                                type: 'POST',
                                url: 'inserir_feira.php',
                                data: formData,
                                success: function(response) {
                                    // Exibe uma mensagem de sucesso
                                    alert('Feira adicionada com sucesso!');

                                    // Limpa os campos do formulário
                                    $('#nome_feira').val('');
                                    $('#local').val('');
                                    $('#data_inicio').val('');
                                    $('#data_fim').val('');

                                    // Adiciona uma nova linha à tabela
                                    var newRow = '<tr>' +
                                        '<td><a class="idLink" onclick="openCity(\'simplelink\',\'ID_feira\')">' + response.ID_feira + '</a></td>' +
                                        '<td>' + response.Nome_feira + '</td>' +
                                        '<td>' + response.Lugar + '</td>' +
                                        '<td>' + response.Data_inicio + '</td>' +
                                        '<td>' + response.Data_fim + '</td>' +
                                        '</tr>';

                                    $('#feirasTableBody').append(newRow);
                                },
                                error: function(xhr, status, error) {
                                    // Trate os erros aqui
                                    console.log(xhr.responseText);
                                }
                            });
                        });
                    });
                </script>
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

            if ($stmt->rowCount() > 0) {
                foreach ($stmt as $row) :
            ?>
                    <tr>
                        <td><button data-fetch-file="fetchCliente.php" data-target-selector="#cliente_query" class="idLink" id="fetch_id_cliente" onclick="openCity('simplelink','Id_Cliente')" value="<?php echo $row['Id_Cliente']; ?>"><?php echo $row['Id_Cliente']; ?></button></td>
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
    </tbody>
    <hr>
    <div class="form-group">
        <form method="post" class="w-75" id="form_cliente">
            <div class="row">
                <div class="col-md-6">
                    <label for="nome_responsavel">Nome do Responsável</label>
                    <input class="input form-control" type="text" id="nome_responsavel" placeholder="Exemplo: João Silva" name="nome_responsavel" />

                    <label for="CNPJ_CPF">CNPJ/CPF</label>
                    <input class="input form-control" type="text" id="CNPJ_CPF" placeholder="Exemplo: 123.456.789-00" name="CNPJ_CPF" />

                    <label for="Nome_Cliente">Nome do Cliente</label>
                    <input class="input form-control" type="text" id="Nome_Cliente" placeholder="Exemplo: Empresa XYZ" name="Nome_Cliente" />

                    <label for="razao_social">Razão Social</label>
                    <input class="input form-control" type="text" id="razao_social" placeholder="Exemplo: ABC Indústria Ltda." name="razao_social" />

                    <label for="nome_fantasia">Nome Fantasia</label>
                    <input class="input form-control" type="text" id="nome_fantasia" placeholder="Exemplo: ABC Indústria" name="nome_fantasia" />

                    <label for="telefone">Telefone</label>
                    <input class="input form-control" type="text" id="telefone" placeholder="Exemplo: (00) 1234-5678" name="telefone" />

                </div>

                <div class="col-md-6">

                    <label for="email">Email</label>
                    <input class="input form-control" type="email" id="email" placeholder="Exemplo: exemplo@email.com" name="email" />

                    <label for="Cidade">Cidade</label>
                    <input class="input form-control" type="text" id="Cidade" placeholder="Exemplo: São Paulo" name="Cidade" />

                    <label for="UF">UF</label>
                    <input class="input form-control" type="text" id="UF" placeholder="Exemplo: SP" name="UF" />

                    <label for="inscricao_estadual">Inscrição Estadual</label>
                    <input class="input form-control" type="text" id="inscricao_estadual" placeholder="Exemplo: 123456789" name="inscricao_estadual" />

                    <label for="Mercadoria">Mercadoria</label>
                    <input class="input form-control" type="text" id="Mercadoria" placeholder="Exemplo: Produtos Eletrônicos" name="Mercadoria" />

                    <label for="endereco">Endereço</label>
                    <input class="input form-control" type="text" id="endereco" placeholder="Exemplo: Rua Exemplo, 123" name="endereco" />
                </div>
            </div>

            <br>
            <button class="btn btn-primary" type="submit">Adicionar Nova Feira</button>
        </form>
    </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Captura o evento de envio do formulário
  $('#form_cliente').submit(function(event) {
    event.preventDefault(); // Evita que o formulário seja enviado de forma padrão

    var form = $(this); // Obtém o formulário

    $.ajax({
      type: form.attr('method'), // Método de envio (post)
      url: form.attr('action'), // URL de destino (inserir_cliente.php)
      data: form.serialize(), // Dados do formulário serializados
      dataType: 'json', // Tipo de dado esperado na resposta (JSON)
      success: function(response) {
        // Manipule a resposta aqui, se necessário
        console.log(response);
        
        // Exemplo de exibição dos dados do fornecedor adicionado
        var newRow = '<tr>' +
            '<td>' + response.ID_fornecedor + '</td>' +
            '<td>' + response.Nome_fornecedor + '</td>' +
            '<td>' + response.CNPJ_CPF + '</td>' +
            '<td>' + response.Pix1 + '</td>' +
            '<td>' + response.Favorecido1 + '</td>' +
            '</tr>';
        
        $('.w-100 tbody').append(newRow);
        
        // Limpa os campos do formulário
        form[0].reset();
      },
      error: function(xhr, status, error) {
        // Manipule os erros aqui
        console.log(xhr.responseText);
      }
    });
  });
});
</script>


            </div>
            <div class="city" id="Fornecedores" style="display:none">
                <table class="w-100">
                    <thead style="background-color: lightblue;">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CNPJ/CPF</th>
                            <th>Pix1</th>
                            <th>Favorecido</th>
                        </tr>
                    </thead>
                    <tbody id="fornecedoresTableBody">
                        <?php
                        $stmt = $pdo->prepare('SELECT * FROM fornecedores_cadastros');
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            foreach ($stmt as $row) :
                        ?>
                                <tr>
                                    <td><button data-fetch-file="fetchFornecedor.php" data-target-selector="#fornecedor_query" class="idLink" id="fetch_id_fornecedor" onclick="openCity('simplelink','id_fornecedor')" value="<?php echo $row['id_fornecedor']; ?>"><?php echo $row['id_fornecedor']; ?></button></td>
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
                <form id="fornecedorForm" method="post" class="w-75">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nome_fornecedor">Nome da Empresa</label>
                            <input id="nome_fornecedor" class="input form-control" type="text" placeholder="Nome da Empresa" name="nome_fornecedor" />

                            <label for="CNPJ_CPF">CPF ou CNPJ</label>
                            <input id="CNPJ_CPF" class="input form-control" type="text" placeholder="CPF ou CNPJ" name="CNPJ_CPF" />
                        </div>

                        <div class="col-md-6">
                            <label for="Pix1">Pix</label>
                            <input id="Pix1" class="input form-control" type="text" placeholder="Pix" name="Pix1" />

                            <label for="favorecido1">Nome do Favorecido</label>
                            <input id="favorecido1" class="input form-control" type="text" placeholder="Nome do Favorecido do Pix" name="favorecido1" />
                        </div>
                    </div>
                    <br>
                    <button id="fornecedorSubmitButton" class="btn btn-primary">Adicionar Novo Fornecedor</button>
                </form>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#fornecedorSubmitButton').click(function(e) {
                        e.preventDefault(); // Impede o envio padrão do formulário

                        // Coleta os dados do formulário
                        var nomeFornecedor = $('#nome_fornecedor').val();
                        var cnpjCpf = $('#CNPJ_CPF').val();
                        var pix1 = $('#Pix1').val();
                        var favorecido1 = $('#favorecido1').val();

                        // Cria um objeto com os dados do formulário
                        var formData = {
                            nome_fornecedor: nomeFornecedor,
                            CNPJ_CPF: cnpjCpf,
                            Pix1: pix1,
                            favorecido1: favorecido1
                        };

                        // Envia os dados via AJAX
                        $.ajax({
                            type: 'POST',
                            url: 'inserir_fornecedor.php',
                            data: formData,
                            success: function(response) {
                                // Exibe uma mensagem de sucesso
                                alert('Fornecedor adicionado com sucesso!');

                                // Limpa os campos do formulário
                                $('#nome_fornecedor').val('');
                                $('#CNPJ_CPF').val('');
                                $('#Pix1').val('');
                                $('#favorecido1').val('');

                                // Adiciona uma nova linha à tabela
                                var newRow = '<tr>' +
                                    '<td><button data-fetch-file="fetchFornecedor.php" data-target-selector="#fornecedor_query" class="idLink" id="fetch_id_fornecedor" onclick="openCity(\'simplelink\',\'id_fornecedor\')" value="' + response.id_fornecedor + '">' + response.id_fornecedor + '</button></td>' +
                                    '<td>' + response.nome_fornecedor + '</td>' +
                                    '<td>' + response.CNPJ_CPF + '</td>' +
                                    '<td>' + response.Pix1 + '</td>' +
                                    '<td>' + response.favorecido1 + '</td>' +
                                    '</tr>';

                                $('#fornecedoresTableBody').append(newRow);
                            },
                            error: function(xhr, status, error) {
                                // Trate os erros aqui
                                console.log(xhr.responseText);
                            }
                        });
                    });
                });
            </script>

            <div class="city" id="id_fornecedor" style="display:none">
                <a href="#" class=" w3-bar-item w3-button w3-blue tablink " onclick="openCity('simplelink','Fornecedores')">Voltar para fornecedores</a>
                <hr>
                <div id="fornecedor_query">


                </div>



            </div>
            <div class="city w-100" id="Id_Cliente" style="display:none">
                <a href="#" class="  w3-blue w3-bar-item w3-button tablink" onclick="openCity(event,'Clientes')">Voltar para clientes</a>
                <hr>
                <div id="cliente_query" class=" w-100">


                </div>

            </div>
            <div class="city" id="ID_feira" style="display:none">
                <a href="#" class="  w3-blue w3-bar-item w3-button tablink" onclick="openCity(event,'Feiras')">Voltar para feiras</a>
                <hr>
                <div id="feira_query">


                </div>
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
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("btn", "bg-primary", "link-white");
            }
            document.getElementById(cityName).style.display = "block";
            if (evt !== 'simplelink') {

                evt.currentTarget.classList.add("btn", "bg-primary", "link-white");
            }
        }
    </script>
</body>

</html>