<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="./css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="./css/bootstrap-theme.min.css" />
    <link type="text/css" rel="stylesheet" href="./css/Trabalho01.css">
    <script type="text/javascript" src="./js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/Trabalho01.js"></script>
    <title>Cadastro de Usuário</title>
</head>

<body>
    <h1 class="danger bg-danger text-center">
        <a href="./Painel.php">
            Gerenciamento de Perfil
        </a>
    </h1>
    <div class="container center">
        <h2>Cadastro</h2>
        <div class="tab-content center">
            <h3 class="text-center">Dados pessoais</h3>
            <form id="cadUsuForm" action="./Login.php" method="POST">
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
                <BR>
                <BR>
                <h3 class="text-center">Dados Pagamento</h3>
                <div class="form-group">
                    <label for="cadPagForm_NumCartao">N° cartão</label>
                    <input type="number" class="form-control" id="cadPagForm_NumCartao" name="cadPagForm_NumCartao"
                        placeholder="Digite o Numero do Cartão">
                </div>
                <div class="form-group">
                    <label for="cadPagForm_NomeCartao">Nome no Cartão</label>
                    <input type="text" class="form-control" id="cadPagForm_NomeCartao" name="cadPagForm_NomeCartao"
                        placeholder="Digite o Nome no Cartão">
                </div>
                <div class="form-group form-cols">
                    <div class="col1">
                        <label for="cadPagForm_Ccv">CCV</label>
                        <input type="number" class="form-control" id="cadPagForm_Ccv" name="cadPagForm_Ccv" placeholder="Digite o CCV"
                        >
                    </div>
                    <div class="col1">
                        <label for="cadPagForm_val">Validade</label>
                        <input type="number" class="form-control" id="cadPagForm_val" name="cadPagForm_val"
                            placeholder="Digite a Validade">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cadPagForm_Pix">Chave Pix</label>
                    <input type="text" class="form-control" id="cadPagForm_Pix" name="cadPagForm_Pix"
                        placeholder="Digite sua Chave Pix">
                </div>
                <div class="form-cols">
                    <button id="cadUsuForm_btSalvar" type="submit" class="btn btn-primary btn-block">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>