<?php
    use model\ConectarBd;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $servername = "localhost"; // ou 127.0.0.1
        $username = "root"; // substitua pelo nome de usuário do banco de dados
        $password = ""; // substitua pela senha do banco de dados
        $dbname = "trabalhoweb01_bd";

        $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
    }
        // echo $_POST["logForm_Email"];
        // echo hash('sha256', trim($_POST['logForm_Senha']));

        if(!isset($_POST['logForm_Email'])){
            header('Location: Login.php');
            exit;
        }
        
        if(empty($_POST['logForm_Senha'])){
            header(('Location: Login.php'));
            exit;
        }

        $emailBusca = trim($_POST['logForm_Email']);
        // $senhaBusca = hash('sha256', trim($_POST['logForm_Senha']))
        $senhaBusca = $_POST['logForm_Senha'];
    // mudar
        $sql = 'SELECT * FROM usuarios WHERE email LIKE ? AND senha = ?';
        $stmt = $conn->prepare($sql);    
        $stmt->bind_param("ss", $emailBusca, $senhaBusca);
        // $stmt->bind_param(':senha', $senhaBusca, PDO::PARAM_STR);
        $stmt->execute();
        // $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // if($resultados == ""){
        //     header('Location: Login.php');
        //     echo "asadas";
        // }
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Processa os resultados
            while($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. " - Email: " . $row["email"]. "<br>";
            }
        } else {
            echo "0 resultados";
            header('Location: Login.php');
            exit;
        }
    }

?>
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
    <title>Painel de usuário</title>
</head>
<body>
    <h1 class="danger bg-danger text-center">
        <a href="./Painel.php">
            Gerenciamento de Perfil
        </a>
    </h1>
    <div id="Titulo" class="container">
        <div class="navbar navbar-default">
            <div class="navbar-inner">
                <ul class="nav navbar-nav">
                    <li><a href="./Comentarios.php">Comentários</a></li>
                    <li><a href="./AtualizarDados.php">Atualizar Dados</a></li>
                    <li><a href="./Login.php">Sair</a></li>
                </ul>
            </div>
        </div>
    </div>
    
</body>
</html>