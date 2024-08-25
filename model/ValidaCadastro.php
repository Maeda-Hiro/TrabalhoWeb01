<?php
    //     $emailBusca = trim($_POST['logForm_Email']);
    //     $senhaBusca = hash('sha256', trim($_POST['logForm_Senha']));
    // // mudar
    //     $sql = 'SELECT * FROM tabela WHERE email LIKE :email AND senha = :senha';
    //     $stmt = ConectarBd::getCon()->prepare($sql);    
    //     $stmt->bindParam(':email', $emailBusca, PDO::PARAM_STR);
    //     $stmt->bindParam(':senha', $senhaBusca, PDO::PARAM_STR);
    //     $stmt->execute();
    //     $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     if($resultados == ""){
    //         header('Location: Login.php');
    //         echo "asadas";
    //         // mudar
    //         $sql = 'INSERT INTO produtos (nome, descrição, valor) VALUES (?, ?, ?)'; 
    //         $stmt = Conexao::getCon()->prepare($sql); 
    //         $stmt->bindValue(1, $p->getNome());
    //         $stmt->bindValue(2, $p->getDesc());
    //         $stmt->bindValue(3, $p->getValor());

    //         $stmt->execute();
    //     }


    namespace model;

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

    echo $_POST['cadUsuForm_Email'];

    $sql = "INSERT INTO usuarios (email, senha, nome, rg, cpf, endereco, fone) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiisi", $email, $senha, $nome, $rg, $cpf, $endereco, $fone);

    $stmt->execute();

    $stmt->close();
    $conn->close();

    class ProdutoDao
    {

    public function createUsu(Usuario $p){

        $sql = 'INSERT INTO produtos (nome, descrição, valor) VALUES (?, ?, ?)'; 
        $stmt = Conexao::getCon()->prepare($sql); 
        $stmt->bindValue(1, $p->getNome());
        $stmt->bindValue(2, $p->getDesc());
        $stmt->bindValue(3, $p->getValor());

        $stmt->execute();

    }

    public function read(){

        $sql = 'SELECT * FROM produtos';
        $stmt = Conexao::getCon()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0){
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
        }

    }

    public function update(Produto $p){

        $sql = 'UPDATE produtos SET nome = ?, descrição = ?, valor = ?  WHERE id = ?';
        $stmt = Conexao::getCon()->prepare($sql);
        $stmt->bindValue(1, $p-> getNome());
        $stmt->bindValue(2, $p-> getDesc());
        $stmt->bindValue(3, $p->getValor());
        $stmt->bindValue(4, $p->getId());
        
        $stmt->execute();

    }

    public function delete($id){

        $sql = 'DELETE FROM produtos WHERE id=?';
        $stmt = Conexao::getCon()->prepare($sql);
        $stmt->bindValue(1, $id->getId());

        $stmt->execute();

    }

    // public function search($nome){
        
    //   $sql = 'SELECT * FROM produtos WHERE nome LIKE :nome';
    //   $sth->bindParam(':nome', $nome, PDO::PARAM_STR);
    //   $sth->execute();
    
    //   $res = sth->fetchAll(PDO::FETCH_ASSOC);

    // }

    }

?>