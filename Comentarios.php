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
    <div id="comentarios" class="container">
        <?php
            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                if(!isset($_POST['comForm_Coment']) || $_POST['comForm_Coment'] == ""){
                    echo "  <p class='danger bg-danger comSucess'>
                                Campo Comentario deve ser preenchido
                            </p >";
                }else{
                    // mudar
                    // $sql = 'INSERT INTO tabela (nome, comentario) VALUES (?, )'; 
                    // $stmt = Conexao::getCon()->prepare($sql); 
                    // $stmt->bindValue(1, $p->getNome());
                    // $stmt->bindValue(2, $_POST['comForm_Coment']);
                    // $stmt->execute();
                    echo "  <p class='success bg-success comSucess'>
                                Comentario enviado com sucesso
                                </p >";
                }
            }
        ?>

        <h2 class="text-center">Comentários</h2>
        <form id="comForm" action="./Comentarios.php" method="POST">
            <div class="form-group">
                <label for="comForm_Coment">Comentarios</label>
                <textarea id="comForm_Coment" name="comForm_Coment" class="form-control" rows="4"></textarea>
            </div>
            <button id="comForm_BtComent" type="submit" class="btn btn-primary btn-block">Enviar</button>
        </form>
        <?php
            // // mudar
            // $sql = 'SELECT * FROM tabelaComentario';
            // $stmt = ConectarBd::getCon()->prepare($sql);
            // $stmt->execute();
            // $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // foreach ($resultados as $resultado) {
            //     echo "  <div class='col-md-4 mb-4'>
            //                 <div class='card'>
            //                     <h4 class='text-center mt-4'>{$resultado['nome']}</h4>
            //                     <h6 class='text-center'>id={$resultado['id']}</h6>
            //                     <p class='text-center'>{$resultado['descrição']}</p>
            //                     <p class='text-center'>R$ {$resultado['valor']}</p>
            //                     <div class='d-flex flex-row justify-content-center mb-4'>
            //                         <a href='editar.php?id={$resultado['id']}' class='text-light text-decoration-none me-3'><button class='btn btn-primary'>Editar</button></a>
            //                         <a href='deletar.php?id={$resultado['id']}' class='text-light text-decoration-none ms-3'><button class='btn btn-danger'>Deletar</button></a>
            //                     </div>
            //                 </div>
            //             </div>";
            //   }
        ?>
            

    </div>
</body>
</html>
