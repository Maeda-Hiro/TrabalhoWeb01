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
    <title>Atualizar Dados de Usuário</title>
</head>

<body>
    <h1 class="danger bg-danger text-center">
        <?php
            $id = $_GET["id"];
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "trabalhoweb01_bd";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if(hash('sha256', trim($_POST['altUsuForm_Senha'])) != hash('sha256', trim($_POST['altUsuForm_ConfSenha']))){
                    echo "<p class='danger bg-danger comSucess'>
                            Senhas não coincidem
                        </p >";
                    exit;
                }

                $email = $_POST['altUsuForm_Email'];
                $senha = hash('sha256', trim($_POST['altUsuForm_Senha']));
                $nome = $_POST['altUsuForm_Nome'];
                $rg = $_POST['altUsuForm_Rg'];
                $cpf = $_POST['altUsuForm_Cpf'];
                $endereco = $_POST['altUsuForm_Ender'];
                $fone = $_POST['altUsuForm_Fone'];

                $numCar = $_POST['altPagForm_NumCartao'];
                $nomeCar = $_POST['altPagForm_NomeCartao'];
                $ccvCar = $_POST['altPagForm_Ccv'];
                $valCar = $_POST['altPagForm_val'];
                $pix = $_POST['altPagForm_Pix'];
                $id_bancario = $_POST['altPagForm_idBancario'];

                $sql = "UPDATE usuarios SET email = ?, senha = ?, nome = ?, rg = ?, cpf = ?, endereco = ?, fone = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssiisii", $email, $senha, $nome, $rg, $cpf, $endereco, $fone, $id);
                $stmt->execute();

                $sql = "UPDATE dados_bancarios SET n_cartao = ?, nome_cartao = ?, ccv = ?, validade = ?, pix = ? WHERE id_usuario = ? AND id_dados_bancarios = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("isissii", $numCar, $nomeCar, $ccvCar, $valCar, $pix, $id, $id_bancario);
                $stmt->execute();

            }

            $sql = 'SELECT * FROM usuarios WHERE id = ?';
            $stmt = $conn->prepare($sql);    
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $usuario = $result->fetch_assoc();
            }

            $sql = 'SELECT * FROM dados_bancarios WHERE id_usuario = ?';
            $stmt = $conn->prepare($sql);    
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            if ($resultado->num_rows > 0) {
                $pagamento = $resultado->fetch_assoc();
            }

            if (isset($_POST['altUsuForm_btExcluir'])) {
            
                $sql = 'DELETE FROM comentarios WHERE id_usuario = ?';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();

                $sql = 'DELETE FROM dados_bancarios WHERE id_usuario = ?';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();

                $sql = 'DELETE FROM usuarios WHERE id = ?';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
            
                if ($stmt->execute()) {
                    header("Location: Login.php");
                    echo "Usuário excluído com sucesso!";
                } else {
                    echo "Erro ao excluir o usuário: " . $stmt->error;
                }
            }

            $stmt->close();
            $conn->close();
            
            echo "  <a href='./Painel.php?id={$id}'>
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
                <div class='container'>
                    <h2>Atualizar Dados</h2>
                    <div class='tab-content center'>
                        <h3 class='text-center'>Dados pessoais</h3>
                        <form id='altUsuForm' action='./AtualizarDados.php?id={$id}' method='POST'>
                            <div class='form-group'>
                                <label for='altUsuForm_Nome'>Nome</label>
                                <input type='text' class='form-control' id='altUsuForm_Nome' name='altUsuForm_Nome' value='{$usuario['nome']}' placeholder='Digite seu Nome'
                                    required>
                            </div>
                            <div class='form-group form-cols'>
                                <div class='col1'>
                                    <label for='altUsuForm_Rg'>RG</label>
                                    <input type='number' class='form-control' id='altUsuForm_Rg' name='altUsuForm_Rg' value='{$usuario['rg']}' placeholder='Digite seu RG'
                                        required>
                                </div>
                                <div class='col1'>
                                    <label for='altUsuForm_Cpf'>CPF</label>
                                    <input type='text' class='form-control' id='altUsuForm_Cpf' name='altUsuForm_Cpf' value='{$usuario['cpf']}' placeholder='Digite seu CPF'
                                        required>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='altUsuForm_Ender'>Endereço</label>
                                <input type='text' class='form-control' id='altUsuForm_Ender' name='altUsuForm_Ender' value='{$usuario['endereco']}' 
                                    placeholder='Digite seu Endereço' required>
                            </div>
                            <div class='form-group'>
                                <label for='altUsuForm_Fone'>Fone</label>
                                <input type='number' class='form-control' id='altUsuForm_Fone' name='altUsuForm_Fone' value='{$usuario['fone']}' 
                                    placeholder='Digite seu Telefone' required>
                            </div>
                            <div class='form-group'>
                                <label for='altUsuForm_Email'>E-mail</label>
                                <input type='email' class='form-control' id='altUsuForm_Email' name='altUsuForm_Email' value='{$usuario['email']}' 
                                    placeholder='Digite seu Email ' required>
                            </div>
                            <div class='form-group form-cols'>
                                <div class='col1'>
                                    <label for='altUsuForm_Senha'>Senha</label>
                                    <input type='password' class='form-control' id='altUsuForm_Senha' name='altUsuForm_Senha' value='' 
                                        placeholder='Digite sua Senha ' required>
                                </div>
                                <div class='col1'>
                                    <label for='altUsuForm_ConfSenha'>Confirmação de Senha</label>
                                    <input type='password' class='form-control' id='altUsuForm_ConfSenha' name='altUsuForm_ConfSenha' value='' 
                                        placeholder='Digite sua Senha ' required>
                                </div>
                            </div>";
                            
            foreach([$pagamento] as $pag){
                echo"
                            <BR>
                            <BR>
                            <h3 class='text-center'>Dados Pagamento</h3>
                            <input type='hidden' name='altPagForm_idBancario' value='{$pag['id_dados_bancarios']}'>
                            <div class='form-group'>
                                <label for='altPagForm_NumCartao'>N° cartão</label>
                                <input type='number' class='form-control' id='altPagForm_NumCartao' name='altPagForm_NumCartao' value='{$pag['n_cartao']}'
                                    placeholder='Digite o Numero do Cartão'>
                            </div>
                            <div class='form-group'>
                                <label for='altPagForm_NomeCartao'>Nome no Cartão</label>
                                <input type='text' class='form-control' id='altPagForm_NomeCartao' name='altPagForm_NomeCartao' value='{$pag['nome_cartao']}'
                                    placeholder='Digite o Nome no Cartão'>
                            </div>
                            <div class='form-group form-cols'>
                                <div class='col1'>
                                    <label for='altPagForm_Ccv'>CCV</label>
                                    <input type='number' class='form-control' id='altPagForm_Ccv' name='altPagForm_Ccv' value='{$pag['ccv']}' placeholder='Digite o CCV'
                                    >
                                </div>
                                <div class='col1'>
                                    <label for='altPagForm_val'>Validade</label>
                                    <input type='text' class='form-control' id='altPagForm_val' name='altPagForm_val' value='{$pag['validade']}'
                                        placeholder='Digite a Validade'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='altPagForm_Pix'>Chave Pix</label>
                                <input type='text' class='form-control' id='altPagForm_Pix' name='altPagForm_Pix' value='{$pag['pix']}'
                                    placeholder='Digite sua Chave Pix'>
                            </div>";
                    }
                ?>
                <div class='form-cols'>
                    <button id='altUsuForm_btSalvar' type='submit' class='btn btn-primary btn-block'>Salvar</button>
                    <button name='altUsuForm_btExcluir' type='submit' class='btn btn-primary btn-block' onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir Usuário</button>
                
                </div>
            </form>
        </div>
    </div>
</body>

</html>