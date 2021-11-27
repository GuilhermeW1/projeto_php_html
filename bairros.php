<?php
    include('actions/verifica_sessao.php');
    $conexao = require 'db/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de bairros</title>
    <?php 
        include('components/js.php');
    ?>

    <style>
        h1#titulo{
            text-align: center;
        }
    </style>

</head>
<body>
    <?php 
        include('components/menu.php');
    ?>

    <h1 id="titulo">Adicionar bairros</h1>
    <div class="container"> 
    <form action="">
        
        <div class="row">
            
            <div class="col-md-4 ">
                <div class="form-group">
                    <label for="logradouro" >Logradouro</label>
                    <input type="text" name="logradouro" id="" required class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <select name="id_cidade" class="form-control">
                        <option value=0>Selecione...  </option>
                        <?php
                            $stmt = $conexao->prepare("select id, nome from cidades order by nome");
                            $stmt->execute();

                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                echo ("<option value={$row['id']} > {$row['nome']}</option>");
                            }

                        ?>


                    </select>


                </div>

            </div>


        </div>



    </form>
    </div>

    
</body>
</html>