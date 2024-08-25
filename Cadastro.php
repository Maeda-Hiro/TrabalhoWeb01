<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <link type="text/css" rel="stylesheet" href="css/Trabalho01.css">
    <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/Trabalho01.js"></script>
    <title>Cadastro de Usuário</title>
</head>

<body>
    <h1 class="danger bg-danger text-center">
        <a href="./Painel.php">
            Gerenciamento de Perfil
        </a>
    </h1>
    <div class="container">
        <h2>Cadastro</h2>
        <ul id="cadCadastros" class="nav nav-tabs">
            <li role="tab" class="active"><a href="#cadUsu">Cadastro Usuario</a></li>
            <li role="tab"><a href="#cadPag">Cadastro Bancarios</a></li>
        </ul>
        <div class="tab-content center">
            <!-- <div role="tab-content"> -->
                <div id="cadUsu" class="cadastro-container tab-pane fade in active">
                    <h3 class="text-center">Dados pessoais</h3>
                    <form id="cadUsuForm" action="./teste.php" method="POST">
                        <div class="form-group">
                            <label for="cadUsuForm_Nome">Nome</label>
                            <input type="text" class="form-control" id="cadUsuForm_Nome" name="cadUsuForm_Nome" placeholder="Digite seu Nome"
                                required>
                        </div>
                        <div class="form-group form-cols">
                            <div class="col1">
                                <label for="cadUsuForm_Rg">RG</label>
                                <input type="number" class="form-control" id="cadUsuForm_Rg" name="cadUsuForm_Rg" placeholder="Digite seu RG"
                                    required>
                            </div>
                            <div class="col1">
                                <label for="cadUsuForm_Cpf">CPF</label>
                                <input type="text" class="form-control" id="cadUsuForm_Cpf" name="cadUsuForm_Cpf" placeholder="Digite seu CPF"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cadUsuForm_Ender">Endereço</label>
                            <input type="text" class="form-control" id="cadUsuForm_Ender" name="cadUsuForm_Ender" 
                                placeholder="Digite seu Endereço" required>
                        </div>
                        <div class="form-group">
                            <label for="cadUsuForm_Fone">Fone</label>
                            <input type="number" class="form-control" id="cadUsuForm_Fone" name="cadUsuForm_Fone" 
                                placeholder="Digite seu Telefone" required>
                        </div>
                        <div class="form-group">
                            <label for="cadUsuForm_Email">E-mail</label>
                            <input type="email" class="form-control" id="cadUsuForm_Email" name="cadUsuForm_Email" 
                                placeholder="Digite seu Email " required>
                        </div>
                        <div class="form-group form-cols">
                            <div class="col1">
                                <label for="cadUsuForm_Senha">Senha</label>
                                <input type="password" class="form-control" id="cadUsuForm_Senha" name="cadUsuForm_Senha" 
                                    placeholder="Digite sua Senha " required>
                            </div>
                            <div class="col1">
                                <label for="cadUsuForm_ConfSenha">Confirmação de Senha</label>
                                <input type="password" class="form-control" id="cadUsuForm_ConfSenha" name="cadUsuForm_ConfSenha" 
                                    placeholder="Digite sua Senha " required>
                            </div>
                        </div>
                        <input type="submit" name="cadUsuForm_btProx" id="cadUsuForm_btProx" class="btn btn-primary btn-block" value="Seguinte">
                        <!-- <button id="cadUsuForm_btProx" type="submit" class="btn btn-primary btn-block">Seguinte</button> -->

                        <?php

                            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                                // echo $_POST["cadUsuForm"];

                                // if(isset($_POST["cadUsuForm_btProx"])){
                                //     echo "Form 1 have been submitted";
                                // } else if(isset($_POST["cadUsuForm_btSalvar"])){
                                //     echo "Form 2 have been submitted";
                                // }
                                // echo hash('sha256', trim($_POST['logForm_Senha']));

                                if(!isset($_POST['cadUsuForm_Nome'])){
                                    header('Location: Login.php');
                                    exit;
                                }
                                if(!isset($_POST['cadUsuForm_Rg'])){
                                    header('Location: Login.php');
                                    exit;
                                }
                                if(!isset($_POST['cadUsuForm_Cpf'])){
                                    header('Location: Login.php');
                                    exit;
                                }
                                if(!isset($_POST['cadUsuForm_Ender'])){
                                    header('Location: Login.php');
                                    exit;
                                }
                                if(!isset($_POST['cadUsuForm_Fone'])){
                                    header('Location: Login.php');
                                    exit;
                                }
                                if(!isset($_POST['cadUsuForm_Email'])){
                                    header(('Location: Login.php'));
                                    exit;
                                }
                                if(!isset($_POST['cadUsuForm_Senha'])){
                                    header(('Location: Login.php'));
                                    exit;
                                }
                                if(!isset($_POST['cadUsuForm_ConfSenha'])){
                                    header(('Location: Login.php'));
                                    exit;
                                }

                                if(hash('sha256', trim($_POST['cadUsuForm_Senha'])) != hash('sha256', trim($_POST['cadUsuForm_ConfSenha']))){
                                    exit;
                                }
                            }
                        ?>
                    </form>
                </div>
                <div id="cadPag" class="cadastro-container tab-pane fade">
                    <h3 class="text-center">Dados Bancarios</h3>
                    <form id="cadPagForm"  action="./ValidaCadastro.php" method="POST">
                        <div class="form-group">
                            <label for="cadPagForm_NumCartao">N° cartão</label>
                            <input type="number" class="form-control" id="cadPagForm_NumCartao"
                                placeholder="Digite o Numero do Cartão" required>
                        </div>
                        <div class="form-group">
                            <label for="cadPagForm_NomeCartao">Nome no Cartão</label>
                            <input type="text" class="form-control" id="cadPagForm_NomeCartao"
                                placeholder="Digite o Nome no Cartão" required>
                        </div>
                        <div class="form-group form-cols">
                            <div class="col1">
                                <label for="cadPagForm_Ccv">CCV</label>
                                <input type="number" class="form-control" id="cadPagForm_Ccv" placeholder="Digite o CCV"
                                    required>
                            </div>
                            <div class="col1">
                                <label for="cadPagForm_val">Validade</label>
                                <input type="number" class="form-control" id="cadPagForm_val"
                                    placeholder="Digite a Validade" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cadPagForm_Pix">Chave Pix</label>
                            <input type="text" class="form-control" id="cadPagForm_Pix"
                                placeholder="Digite sua Chave Pix" required>
                        </div>
                        <div class="form-cols">
                            <button id="cadUsuForm_btVoltar" type="submit" class="btn btn-default col1">Voltar</button>
                            <!-- <button id="cadUsuForm_btSalvar" type="submit" class="btn btn-primary col1">Salvar</button> -->
                            <input type="submit" name="cadUsuForm_btSalvar" id="cadUsuForm_btSalvar" class="btn btn-primary col1" value="Salvar">

                        </div>
                    </form>
                </div>
            <!-- </div> -->
        </div>
    </div>
</body>

</html>