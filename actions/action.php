<?php

session_start();

$tipo = "";

if(isset($_GET['tipo'])){
    $tipo = $_GET['tipo'];
}else{
    header('Location: ../index.php');
}

$conexao = require '../db/connect.php';

if($tipo == 'cliente'){


    //$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    //$telefone =  mysqli_real_escape_string($conexao, $_POST['telefone']);
    //$sql = "insert into clientes values(default, ?,?)";

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

    $sql = "insert into cliente values(default, ?,?)";

    $stmt = $conexao->prepare($sql);

    $result = $stmt->execute([$nome, $telefone]);

    if($result){
        $_SESSION['sucesso'] = 'Cliente Adicionada com Sucesso';
    }else{
        $_SESSION['erro'] = 'Erro ao adicionar';
    }
    header('Location: ../index.php');
    exit();

}


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