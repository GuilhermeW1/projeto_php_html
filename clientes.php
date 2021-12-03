<?php
include("actions/verifica_sessao.php");
$conexao = require 'db/connect.php';
define('DATE_BR', 'd/m/Y');

if(isset($_GET['id'])){

    $id_cliente = $_GET['id'];
    $stmt = $conexao->prepare("select c.id, c.nome, c.telefone,  c.data_nascimento , ci.id as idcidade
    from cliente c, cidades ci
    where ci.id = c.id_cidade
    and c.id = {$id_cliente}");

    $stmt->execute();
    $row_cliente = $stmt->fetch(PDO::FETCH_ASSOC);

}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('components/js.php') ?>

    <style>
        div#ab{
            margin-bottom: 15px;    
        }
    </style>
</head>

<body>

    <?php include('components/menu.php') ?>

    <div class="container">
        
        <form action="actions/action.php?tipo=cliente" method="POST" >
            
            <div class="row"> 
                        //ADICIONAR ID HIIDEN PRA PEGAR NA ACTION
                        <label for="nome">Nome</label>
                        <input type="text" required name="nome" class="form-control" value="<?php   if(isset($_GET['id'])){  echo $row_cliente['nome']; } ?> ">


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" required name="nome" class="form-control" value="<?php   if(isset($_GET['id'])){  echo $row_cliente['nome']; } ?> ">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="row">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" class="form-control" required value="<?php   if(isset($_GET['id'])){  echo $row_cliente['telefone']; } ?> " >
                    </div>

                </div>

                


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <select name="id_cidade" class="form-control">
                        <option <?php echo isset($row_cliente['idcidade']) ? '' : 'selected'; ?>value=0 >Selecione..</option>
                        
                        <?php
                            $stmt = $conexao->prepare("select id, nome from cidades order by nome");
                            $stmt->execute();
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                echo ("<option " .
                                    (isset($row_cliente['idcidade']) && $row_cliente['idcidade']
                                        == $row['id'] ? 'selected' : '')
                                    . " value={$row['id']}>{$row['nome']}</option>");
                            }
                        ?>
                        </select>
                    </div>

                </div>
                
                <div class="col-md-6">
                    <div class="row">
                    <div class="form-group">
                            <label for="data_nascimento">Data Nascimento</label>
                            <input type="date" class="form-control" required name="data_nascimento" value= "<?php  if(isset($_GET['id'])){  echo $row_cliente['data_nascimento'];  }else{echo "";}  ?>" >
                    </div>
                    </div>

                </div>

                
                <div class="col-md-12 mt-3" id="ab">
                    <div class="submit">
                        <input type="submit" name="submit" class="btn btn-info btn-md" value="Cadastrar"> 
                    </div>

                </div>
            </div>
        </form>
    
    </div>

    <div class="container">  
        <div id="a">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Data de nascimento</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Ações</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        $stmt = $conexao->prepare("select c.id as idcli ,c.nome as nome, c.data_nascimento as data , ci.nome as cidade, ci.id
                        from cliente c, cidades ci
                        where ci.id = c.id_cidade");
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo ("<tr>
                                    <td>{$row['nome']}</td>
                                    <td>{$row['data']}</td>
                                    <td>{$row['cidade']}</td>
                                    <td> <a href='clientes.php?id={$row['idcli']}'>Editar</a></td>
                                    <td> <a herf='actions/exclusao.php?clientes?id'> X</a></td>
                                    

                                </tr>"
                                );
                        }
                    
                    ?>
                            
                    
                
                </tbody>
            </table>
                                            

        </div>
        </div>

    
</body>
</html>