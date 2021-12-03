<?php
session_start();

$tabela ="";
$id = "";

if(isset($_GET['tabela']) && isset($_GET['id']) ){
$tabela = $_GET['tabela'];
$id = $_GET['id'];


}else{
    header('Location: ./index,.php');
}

$conexao = require '..db/connect.php';

$sql = "upadate {$tabela} set excluido = now() where md5(id) = ?";

$stmt = $conexao->prepare($sql);
$result = $stmt->execute([$id]);

if($resul){
    $_SESSION['sucesso'] = "registro excluido com sucesso";
}else {
    $_SESSION['erro'] = "erro ao excluir";
}
header('Location: ../index.php');
exit();