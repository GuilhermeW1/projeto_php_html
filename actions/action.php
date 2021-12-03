<?php

session_start();

$tipo = "";
$conexao = require '../db/connect.php';
/*
if(isset($_GET['tipo'])){
    $tipo = $_GET['tipo'];
}else{
    header('Location: ../index.php');
}

$conexao = require '../db/connect.php';

if($tipo == 'cliente'){

    define('DATE_PBANCO', 'Y/m/d');
    define('DATA_BANCO_PFRONT', 'd/m/y');


    //$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    //$telefone =  mysqli_real_escape_string($conexao, $_POST['telefone']);
    //$sql = "insert into clientes values(default, ?,?)";

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cidade = $_POST['id_cidade'];
    $data_nascimento = $_POST['data_nascimento'];
    
    //$data_nascimento->format(DATE_PBANCO);
    /*
    if($nome = "" || $telefone = "" || $cidade = null || $data_nascimento = null){
        echo  "<p> algum dos dados esta nullo</p>";
        header('Location: ../clientes.php');
    }
    
    $sql = "insert into cliente values(default, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    $result = $stmt->execute([$nome, $telefone, $cidade, $data_nascimento]);

    

    if($result){
        $_SESSION['sucesso'] = 'Cliente Adicionada com Sucesso';
    }else{
        $_SESSION['erro'] = 'Erro ao adicionar';
    }
    header('Location: ../index.php');
    exit();

}
*/

if(isset($_POST['id'])){
    $id = $_POST['id'];

}

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cidade = $_POST['id_cidade'];
$data_nascimento = $_POST['data_nascimento'];


if(!isset($nome) || $nome =""){
    $_SESSION['erro'] = "informe o nome do cliente";
    header('Location: ../index.php');
}

if(!isset($telefone) || $telefone =""){
    $_SESSION['erro'] = "informe o telefone do cliente";
    header('Location: ../index.php');
}
if(!isset($cidade) || $cidade =""){
    $_SESSION['erro'] = "informe a cidade do cliente";
    header('Location: ../index.php');
}
if(!isset($data_nascimento) || $data_nascimento =""){
    $_SESSION['erro'] = "informe a data de nascimento do cliente";
    header('Location: ../index.php');
}

if(!isset($id)){//incluir
    $sql = "insert into cliente values(default, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $result = $stmt->execute([$nome, $telefone, $cidade, $data_nascimento]);
    
}else{//alterar
    $sql = "update cliente  set nome = ?, telefone = ?, data_nascimento = ?, cidade = ? where id = ? ";//tem que ver esse cidade ai se ta puchando o scerto
    $stmt = $conexao->prepare($sql);
    $result = $stmt->execute([$nome, $telefone, $data_nascimento, $cidade, $id]);


}

if($result){
    $_SESSION['sucesso'] = 'Cliente Adicionada com Sucesso';
}else{
    $_SESSION['erro'] = 'Erro ao adicionar';
}
header('Location: ../index.php');
exit();





/*
if(isset($_POST['nome']) && isset($_POST['password']) ){
    $user = $_POST['nome'];
    $pass = $_POST['password'];

    $conexao = require '../db/connect.php';
    $sql = " SELECT usuarios.id, usuarios.nome, senha, tipo.nome as tipo " .
           " from usuarios , tipo " . 
           " where usuarios.id_tipo = tipo.id " .
           " and login = '$user' " .
           " and senha = md5('$pass') ";  

    $result = $conexao->query($sql);
    
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if(isset($row['nome'])){
        $_SESSION['id_usuario'] = $row['id'];
        $_SESSION['nome_usuario'] = $row['nome'];
        header('Location: ../index.php');
    } else {
        header('Location: ../login.php');
        
}
}

*/






?>