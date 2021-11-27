<?php 
include("actions/verifica_sessao.php");
$conexao = require 'db/connect.php';


$tipo = "";

if(isset($_GET['id'])){
    $id_cidade = $_GET['id'];
    $stmt = $conexao->prepare("select * from cidades where id = '{$id_cidade}'");
    $stmt->execute();
    $row_cidade = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include ('./components/js.php');
    ?>
    <title>Adicionar Cidades</title>
    <style>
        h1{
            text-align: center;
        }
        #a{
            margin: 10px 0px 0px 0px;
        }


    </style>
</head>
<body>
    <header>    

    <?php 
        include ('./components/menu.php');
    ?>

    </header>    

    <main>
        <h1>Adicionar cidade</h1>
        <div class="container"> 
        <form action="actions/action_cidade.php" method="POST" >
            
            
            <div class="row"> 
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome Da Cidade</label>
                        <input type="text" required name="nome_cidade" class="form-control" value="<?php if(isset($_GET['id'])) {echo $row_cidade['nome']; }else{echo "";} ?>" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <label for="telefone">Sigla da cidade</label>
                        <input type="text" name="sigla_cidade" class="form-control" required value="<?php if(isset($_GET['id'])) { ;echo $row_cidade['sigla_estado']; }else{echo "";} ?>">
                    </div>

                </div>
                
                <!-- aqui vai o id do cara selecionado e vai mandar la pro actions cidadde onde tem que 
                    validar se ta preenchido ou nao o id  -->
                
                    <div class="col-md-6" hidden>
                        <div class="row">
                            <label for="id_cidade">Sigla da cidade</label>
                            <input type="text" name="id_cidade" class="form-control" value="<?php if(isset($_GET['id'])) {echo $row_cidade['id']; }else{echo "";} ?>">
                    </div>

                    </div>

                    <?php 
                    if(isset($_GET['id'])){
                        /*se a tela for carregada com um id definido no editar*/
                        echo ("
                            <div class='col-md-1 mt-3'>
                                <div class='submit'>
                                    <input type='submit' name='submit' class='btn btn-info btn-md' value='Salvar'  > 
                                </div>

                            </div>
                        ");
                        
                        echo ("
                            <div class='col-md-1 mt-3'>
                                <div class='submit'>
                                <a href='cidades.php' class='btn btn-info btn-md'>Cancelar</a>
                                </div>

                            </div>
                        ");
                    /*se a tela for carregada sem um id definido pelo editar*/
                    }else{
                        echo ("
                            <div class='col-md-1 mt-3'>
                                <div class='submit'>
                                    <input type='submit' name='submit' class='btn btn-info btn-md' value='Cadastrar'> 
                                </div>

                            </div'
                        ");

                    }
                    
                    ?>

                
            </div>
        </div>
        </form>
        </div>


        
        <div class="container">  
        <div id="a">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Ações</th>
                      
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        $stmt = $conexao->prepare("select id, nome, sigla_estado as estado from cidades order by nome");
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo ("<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['nome']}</td>
                                    <td>{$row['estado']}</td>
                                    <td> <a href='cidades.php?id={$row['id']}'>Editar</a></td>
                                    

                                </tr>"
                                );
                        }
                    
                    ?>
                            
                    
                
                </tbody>
            </table>
                                            

        </div>
        </div>

    </main>
    
</body>
</html>