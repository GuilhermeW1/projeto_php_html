<?php

session_start();



$conexao = require '../db/connect.php';

if(isset($_POST['id_cidade']) >= 1 ){


    $id_cidade = $_POST['id_cidade'];
   
    if($id_cidade > 0){
        $nome_cidade = $_POST['nome_cidade'];
        $sigla_cidade = $_POST['sigla_cidade'];

        $sql = "update cidades set nome = ?, sigla_estado = ? where id = ? ";
        $stmt = $conexao->prepare($sql);
         $result = $stmt->execute([$nome_cidade, $sigla_cidade, $id_cidade]);

        if($result){
        $_SESSION['sucesso'] = 'Cliente Adicionada com Sucesso';
    
        }else {
        $_SESSION['erro'] = 'Erro ao adicionar';
        }
        header('Location: ../cidades.php');
        exit();

    }
    
    


    
else{

$nome_cidade = $_POST['nome_cidade'];
$sigla_cidade = $_POST['sigla_cidade'];




$sql = "insert into cidades values(default, ?, ?)";
$stmt = $conexao->prepare($sql);

$result = $stmt->execute([$nome_cidade, $sigla_cidade]);


if($result){
    $_SESSION['sucesso'] = 'Cliente Adicionada com Sucesso';

}else {
    $_SESSION['erro'] = 'Erro ao adicionar';
}
header('Location: ../cidades.php');
    exit();

}}
?>