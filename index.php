<?php
include("actions/verifica_sessao.php");
//if(isset($_SESSION['nome'])){
  //  header('Location: index.php');
//}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <?php include('./components/js.php') ?>
    
    <style>
      body {
          font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
   } 
     </style>
  
    <title>Index</title>
</head>
<body>
    
    <?php include('./components/menu.php') ?>
    <div>
        <!--<p>Home</p>-->
    </div>
    
    <?php 
    
    /*
    if(isset($_SESSION['sucesso'])){
      echo "<script> mensagem_sucesso('{$_SESSION['erro']}') </script>";
      unset($_SESSION['erro']);

  }

  if(isset($_SESSION['erro'])){
    echo "<script> mensagem_erro('{$_SESSION['erro']}') </script>";
    unset($_SESSION['erro']);

}
*/
    ?>
</body>
</html>