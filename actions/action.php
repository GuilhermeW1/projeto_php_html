<?php

session_start();

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





/*
if(isset($_POST["submit"])){
    //esses dois vão pegar o nome e senha inseridos no formulario
    $nome = $_POST["nome"];
    $password = $_POST["password"];
    echo "<p>Olá, ".$nome."</p>";
    echo "<p>Olá, ".$password."</p>"; 


    if ($nome == 'gui' && $password == '123'){
        
        //se o usuario informar corretamente dara uma mensagem de boas vindas
        echo "<script>alert(`Bem vindo ${nome} sua senha é ${password}`)</script>";

        echo"<h1>Usuário: ". $nome . "</h1> <br>";
        echo"<h1>Senha: ". $password . "</h1> <br>";
        
        echo"<button> <a herf='#' onclick='history.go(-1)'> <em>Voltar para página de login</em></a> </button>";

    }else{

        //Se o usuario informar incorretamente dara uma mensagem de não autenticação
        echo "<script>alert('Usuario não autenticado')</script>";

        //echo "<p><a href='login.php' rel='prev' target='_self'></a>Voltar</p>"; 

    }


    
}
*/


?>