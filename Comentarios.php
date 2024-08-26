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
    <title>Comentários</title>
</head>

<body>
    <h1 class="danger bg-danger text-center">
        <?php
        $id = $_GET["id"];
        echo"   <a href='./Painel.php?id={$id}'>
                    Gerenciamento de Perfil
                </a>
            </h1>
            <div id='Titulo' class='container'>
                <div class='navbar navbar-default'>
                    <div class='navbar-inner'>
                        <ul class='nav navbar-nav'>
                            <li><a href='./Comentarios.php?id={$id}'>Comentários</a></li>
                            <li><a href='./AtualizarDados.php?id={$id}'>Atualizar Dados</a></li>
                            <li><a href='./Login.php'>Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id='comentarios' class='container'>";

            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                if(!isset($_POST['comForm_Coment']) || $_POST['comForm_Coment'] == ""){
                    echo "  <p class='danger bg-danger comSucess'>
                                Campo Comentario deve ser preenchido
                            </p >";
                }else{

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "trabalhoweb01_bd";
        
                    $conn = new mysqli($servername, $username, $password, $dbname);
        
                    if ($conn->connect_error) {
                        die("Conexão falhou: " . $conn->connect_error);
                    }

                    $hoje = date('d/m/Y');
                    $comentario = $_POST['comForm_Coment'];
                    echo $hoje;
                    $sql = 'INSERT INTO comentarios (id_usuario, data, descricao) VALUES (?, ?, ?)'; 
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("iss", $id, $hoje, $comentario);
                    $stmt->execute();
                    echo "  <p class='success bg-success comSucess'>
                                Comentario enviado com sucesso
                            </p >";
                    
                    
                    $stmt->close();
                    $conn->close();
                }
            }
            echo "  <h2 class='text-center'>Comentários</h2>
                    <form id='comForm' action='./Comentarios.php?id={$id}' method='POST'>
                        <div class='form-group'>
                            <label for='comForm_Coment'>Comentarios</label>
                            <textarea id='comForm_Coment' name='comForm_Coment' class='form-control' rows='4'></textarea>
                        </div>
                        <button id='comForm_BtComent' type='submit' class='btn btn-primary btn-block'>Enviar</button>
                    </form>";

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "trabalhoweb01_bd";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            $sql = 'SELECT * FROM comentarios';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();

            while($row = $result->fetch_assoc()) {
                echo "  <div class='col-md-4 mb-4'>
                            <div class='d-flex flex-row justify-content-center mb-4'>
                                {$row['descricao']}
                            </div>
                        </div>";
              }
            $stmt->close();
            $conn->close();
        ?>
            

    </div>
</body>
</html>
