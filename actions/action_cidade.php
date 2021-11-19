<?php

session_start();

$conxao = require '../db/connect.php';

$nome_cidade = $_POST['nome_cidade'];
$sigla_cidade = $_POST['sigla_cidade'];




$sql = "insert into cidades values(default, ?, ?)";
$stmt = $conxao->prepare($sql);

$result = $stmt->execute([$nome_cidade, $sigla_cidade]);


if($result){
    $_SESSION['sucesso'] = 'Cliente Adicionada com Sucesso';

}else {
    $_SESSION['erro'] = 'Erro ao adicionar';
}
header('Location: ../cidades.php');
    exit();


?>