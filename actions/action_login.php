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








?>