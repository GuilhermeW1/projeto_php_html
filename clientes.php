<?php
include("actions/verifica_sessao.php");
$conexao = require 'db/connect.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('components/js.php') ?>
</head>
<body>

    <?php include('components/menu.php') ?>

    <div class="container">
        
        <form action="actions/action.php?tipo=cliente" method="POST" >
            
            <div class="row"> 
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" required name="nome" class="form-control" >
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="row">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" class="form-control" required>
                    </div>

                </div>

                


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <select name="id_cidade" class="form-control">
                        <option value=0>Selecione..</option>
                        
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
                
                <div class="col-md-6">
                    <div class="row">
                    <div class="form-group">
                            <label for="data_nascimento">Data Nascimento</label>
                            <input type="date" class="form-control" required name="data_nascimento">
                    </div>
                    </div>

                </div>

                
                <div class="col-md-12 mt-3">
                    <div class="submit">
                        <input type="submit" name="submit" class="btn btn-info btn-md" value="Cadastrar"> 
                    </div>

                </div>
            </div>
        </form>
    
    </div>

    
</body>
</html>