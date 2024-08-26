<?php
    if($_GET["id"] > 0){
        $id = $_GET["id"];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "trabalhoweb01_bd";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        if(!isset($_POST['logForm_Email'])){
            header('Location: Login.php');
            exit;
        }
        
        if(empty($_POST['logForm_Senha'])){
            header(('Location: Login.php'));
            exit;
        }

        $emailBusca = trim($_POST['logForm_Email']);
        $senhaBusca = hash('sha256', trim($_POST['logForm_Senha']));
        $sql = 'SELECT * FROM usuarios WHERE email LIKE ? AND senha = ?';
        $stmt = $conn->prepare($sql);    
        $stmt->bind_param("ss", $emailBusca, $senhaBusca);
        $stmt->execute();
        $result = $stmt->get_result();
        if($id = 0){
            $id = $result->fetch_assoc()['id'];
        }

        // echo "<input type='hidden' id='cfpUsu' name='cpfUsu' value='{$result->fetch_assoc()['cpf']}'> ";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. " - Email: " . $row["email"]. "<br>";
            }
        } else {
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
    <?php
        echo"
            <a href='./Painel.php?id={$id}'>
                Gerenciamento de Perfil
            </a>
        </h1>
        <div id='Titulo' class='container'>
            <div class='navbar navbar-default'>
                <div class='navbar-inner'>
                    <ul class='nav navbar-nav'>
                        <li><a href='./Comentarios.php?id={$id}'>Comentários</a></li>
                        <li><a href='./AtualizarDados.php?id={$id}'>Atualizar Dados</a></li>
                        <li><a href='./Login.php?id={$id}'>Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>";
    ?>
        
</body>
</html>