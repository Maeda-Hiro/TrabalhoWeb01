<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Sistema de Gerenciamento de Perfil</title>
    <link type="text/css" rel="stylesheet" href="./css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="./css/bootstrap-theme.min.css" />
    <link type="text/css" rel="stylesheet" href="./css/Trabalho01.css">
    <script type="text/javascript" src="./js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/Trabalho01.js"></script>
</head>

<body>
    <h1 class="danger bg-danger text-center">
        <a href="./Painel.php">
            Gerenciamento de Perfil
        </a>
    </h1>
    <div id="login" class="container center">
        <div class="login-container">
            <h2 class="text-center">Login</h2>
            <form id="logForm" action="./Painel.php" method="POST">
                <div class="form-group">
                    <label for="logForm_Email">Email</label>
                    <input type="email" class="form-control" id="logForm_Email" name="logForm_Email" placeholder="Digite seu email" required>
                </div>
                <div class="form-group">
                    <label for="logForm_Senha">Senha</label>
                    <input type="password" class="form-control" id="logForm_Senha" name="logForm_Senha" placeholder="Digite sua senha" required>
                    <a href="#">Esqueceu a senha?</a>
                </div>
                <button id="logUsuForm_btPnl" type="submit" class="btn btn-primary btn-block">Entrar</button>
            </form>
            <div class="semConta">
                <hr>
                Não possui uma conta?
                <hr>
            </div>
            <button id="botaoDeCadastro" type="submit" class="btn btn-default btn-block">Cadastrar-se</button>
        </div>
    </div>
</body>

</html>