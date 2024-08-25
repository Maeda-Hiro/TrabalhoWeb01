<?php

namespace model;

    class usuario
    {

    private $email, $senha, $nome, $rg, $cpf, $endereco, $fone;

    // public function getEmail(){
    //     return $this->email;
    // }

    // public function setEmail($email){
    //     $this->email = $email;
    // }
    // public function getSenha(){
    //     return $this->senha;
    // }

    // public function setSenha($senha){
    //     $this->senha = $senha;
    // }
    // public function getId(){
    //     return $this->id;
    // }

    // public function setId($id){
    //     $this->id = $id;
    // }
    // public function getId(){
    //     return $this->id;
    // }

    // public function setId($id){
    //     $this->id = $id;
    // }
    // public function getId(){
    //     return $this->id;
    // }

    // public function setId($id){
    //     $this->id = $id;
    // }
    // public function getId(){
    //     return $this->id;
    // }

    // public function setId($id){
    //     $this->id = $id;
    // }
    // public function getId(){
    //     return $this->id;
    // }

    // public function setId($id){
    //     $this->id = $id;
    // }

    public function usuario ($email, $senha, $nome, $rg, $cpf, $endereco, $fone){
        $this->email    = $email;
        $this->senha    = $senha;
        $this->nome     = $nome;
        $this->rg       = $rg;
        $this->cpf      = $cpf;
        $this->endereco = $endereco;
        $this->fone     = $fone;
    }

    public function criaUsuario(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "trabalhoweb01_bd";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // $email = $_POST['cadUsuForm_Email'];
        // $senha = hash('sha256', trim($_POST['cadUsuForm_Senha']));
        // $nome = $_POST['cadUsuForm_Nome'];
        // $rg = $_POST['cadUsuForm_Rg'];
        // $cpf = $_POST['cadUsuForm_Cpf'];
        // $endereco = $_POST['cadUsuForm_Ender'];
        // $fone = $_POST['cadUsuForm_Fone'];

        // echo $_POST['cadUsuForm_Email'];

        $sql = "INSERT INTO usuarios (email, senha, nome, rg, cpf, endereco, fone) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiisi", this->email, this->senha, this->nome, this->rg, this->cpf, this->endereco, this->fone);

        $stmt->execute();

        $stmt->close();
        $conn->close();
    }
}
