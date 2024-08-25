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
    <div class="container">
        <h2>Atualizar Dados</h2>
        <div class="tab-content center">
            <h3 class="text-center">Dados pessoais</h3>
            <form id="altUsuForm" action="./AtualizarDados.php" method="POST">
                <?php
                    $sql = 'SELECT * FROM usuarios WHERE id = ?';
                    $stmt = $conn->prepare($sql);    
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
            
                    echo "<input type='hidden' id='cfpUsu' name='cpfUsu' value='{$result->fetch_assoc()['cpf']}'> ";
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. " - Email: " . $row["email"]. "<br>";
                        }
                    }
                    echo 
                    "   <div class='form-group'>
                            <label for='altUsuForm_Nome'>Nome</label>
                            <input type='text' class='form-control' id='altUsuForm_Nome' name='altUsuForm_Nome' value='{$row['']}' placeholder='Digite seu Nome'
                                required>
                        </div>
                        <div class='form-group form-cols'>
                            <div class='col1'>
                                <label for='altUsuForm_Rg'>RG</label>
                                <input type='number' class='form-control' id='altUsuForm_Rg' name='altUsuForm_Rg' value='{$row['']}' placeholder='Digite seu RG'
                                    required>
                            </div>
                            <div class='col1'>
                                <label for='altUsuForm_Cpf'>CPF</label>
                                <input type='text' class='form-control' id='altUsuForm_Cpf' name='altUsuForm_Cpf' value='{$row['']}' placeholder='Digite seu CPF'
                                    required>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='altUsuForm_Ender'>Endereço</label>
                            <input type='text' class='form-control' id='altUsuForm_Ender' name='altUsuForm_Ender' value='{$row['']}' 
                                placeholder='Digite seu Endereço' required>
                        </div>
                        <div class='form-group'>
                            <label for='altUsuForm_Fone'>Fone</label>
                            <input type='number' class='form-control' id='altUsuForm_Fone' name='altUsuForm_Fone' value='{$row['']}' 
                                placeholder='Digite seu Telefone' required>
                        </div>
                        <div class='form-group'>
                            <label for='altUsuForm_Email'>E-mail</label>
                            <input type='email' class='form-control' id='altUsuForm_Email' name='altUsuForm_Email' value='{$row['']}' 
                                placeholder='Digite seu Email ' required>
                        </div>
                        <div class='form-group form-cols'>
                            <div class='col1'>
                                <label for='altUsuForm_Senha'>Senha</label>
                                <input type='password' class='form-control' id='altUsuForm_Senha' name='altUsuForm_Senha' value='{$row['']}' 
                                    placeholder='Digite sua Senha ' required>
                            </div>
                            <div class='col1'>
                                <label for='altUsuForm_ConfSenha'>Confirmação de Senha</label>
                                <input type='password' class='form-control' id='altUsuForm_ConfSenha' name='altUsuForm_ConfSenha' value='{$row['']}' 
                                    placeholder='Digite sua Senha ' required>
                            </div>
                        </div>
                        <BR>
                        <BR>
                        <h3 class='text-center'>Dados Pagamento</h3>
                        <div class='form-group'>
                            <label for='altPagForm_NumCartao'>N° cartão</label>
                            <input type='number' class='form-control' id='altPagForm_NumCartao' name='altPagForm_NumCartao' value='{$row['']}'
                                placeholder='Digite o Numero do Cartão'>
                        </div>
                        <div class='form-group'>
                            <label for='altPagForm_NomeCartao'>Nome no Cartão</label>
                            <input type='text' class='form-control' id='altPagForm_NomeCartao' name='altPagForm_NomeCartao' value='{$row['']}'
                                placeholder='Digite o Nome no Cartão'>
                        </div>
                        <div class='form-group form-cols'>
                            <div class='col1'>
                                <label for='altPagForm_Ccv'>CCV</label>
                                <input type='number' class='form-control' id='altPagForm_Ccv' name='altPagForm_Ccv' value='{$row['']}' placeholder='Digite o CCV'
                                >
                            </div>
                            <div class='col1'>
                                <label for='altPagForm_val'>Validade</label>
                                <input type='number' class='form-control' id='altPagForm_val' name='altPagForm_val' value='{$row['']}'
                                    placeholder='Digite a Validade'>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='altPagForm_Pix'>Chave Pix</label>
                            <input type='text' class='form-control' id='altPagForm_Pix' name='altPagForm_Pix' value='{$row['']}'
                                placeholder='Digite sua Chave Pix'>
                        </div>
                        <div class='form-cols'>
                            <button id='altUsuForm_btSalvar' type='submit' class='btn btn-primary btn-block'>Salvar</button>
                        </div>"
                ?>
            </form>
        </div>
    </div>
</body>

</html>