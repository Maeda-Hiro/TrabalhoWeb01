<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        // if(isset($_POST["cadUsuForm_btProx"])){
        if(hash('sha256', trim($_POST['cadUsuForm_Senha'])) != hash('sha256', trim($_POST['cadUsuForm_ConfSenha']))){
            echo "<p class='danger bg-danger comSucess'>
                    Senhas não coincidem
                </p >";
            exit;
        }else{

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "trabalhoweb01_bd";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            $email = $_POST['cadUsuForm_Email'];
            $senha = hash('sha256', trim($_POST['cadUsuForm_Senha']));
            $nome = $_POST['cadUsuForm_Nome'];
            $rg = $_POST['cadUsuForm_Rg'];
            $cpf = $_POST['cadUsuForm_Cpf'];
            $endereco = $_POST['cadUsuForm_Ender'];
            $fone = $_POST['cadUsuForm_Fone'];

            $numCar = $_POST['cadPagForm_NumCartao'];
            $nomeCar = $_POST['cadPagForm_NomeCartao'];
            $ccvCar = $_POST['cadPagForm_Ccv'];
            $valCar = $_POST['cadPagForm_val'];
            $pix = $_POST['cadPagForm_Pix'];

            $sql = "SELECT * FROM usuarios WHERE email = ? OR rg = ? OR cpf = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sii", $email, $rg, $cpf);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                header('Location: Cadastro.php');
                exit;
            }

            $sql = "INSERT INTO usuarios (email, senha, nome, rg, cpf, endereco, fone) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssiisi", $email, $senha, $nome, $rg, $cpf, $endereco, $fone);
            $stmt->execute();

            $sql = "SELECT id FROM usuarios WHERE cpf = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $cpf);
            $stmt->execute();
            $result = $stmt->get_result();

            $sql = "INSERT INTO dados_bancarios (id_usuario, n_cartao, nome_cartao, ccv, validade, pix) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iisiss", $result->fetch_assoc()['id'], $numCar, $nomeCar, $ccvCar, $valCar, $pix);
            $stmt->execute();

            $stmt->close();
            $conn->close();
        }
    }
?>  

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