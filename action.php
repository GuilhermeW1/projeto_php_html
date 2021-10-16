



<?php

if(isset($_POST["submit"])){
    //esses dois vão pegar o nome e senha inseridos no formulario
    $nome = $_POST["nome"];
    $password = $_POST["password"];

    //echo "<p>Olá, ".$nome."</p>";
    //echo "<p>Olá, ".$password."</p>"; 


    if ($nome == 'gui' && $password == '123'){
        
        //se o usuario informar corretamente dara uma mensagem de boas vindas
        echo "<script>alert('Bem vindo')</script>";

    }else{

        //Se o usuario informar incorretamente dara uma mensagem de não autenticação
        echo "<script>alert('Usuario não autenticado')</script>";

        //echo "<p><a href='login.php' rel='prev' target='_self'></a>Voltar</p>"; 

    }

    
}



?>