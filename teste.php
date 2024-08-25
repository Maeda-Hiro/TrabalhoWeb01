<?php
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
?>