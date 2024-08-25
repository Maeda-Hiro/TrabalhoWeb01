<?php
use model\ConectarBd;
// Configurações do banco de dados
$servername = "localhost"; // ou 127.0.0.1
$username = "root"; // substitua pelo nome de usuário do banco de dados
$password = ""; // substitua pela senha do banco de dados
$dbname = "trabalhoweb01_bd";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receber os dados do formulário
$email = $_POST['cadUsuForm_Email'];
$senha = $_POST['cadUsuForm_Senha'];
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