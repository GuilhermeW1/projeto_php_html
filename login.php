<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>

    <style>
      body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
    </style>
</head>
<body>

  <div id="login">
    <h3 class="text-center text-white pt-5">Login form</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                   
                <form id="login-form" class="form" action="action.php" method="post">
                        <h3 class="text-center text-info">Login</h3>

                        <div class="form-group">
                            <label for="nome" class="text-info">Usuário:</label><br>
                            <input type="text" name="nome" id="nome"  class="form-control" placeholder="Usuário" required>
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Senha:</label><br>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>
                        </div>

                        <div class="form-group">
                            <!-- <input type="checkbox" name="teste" value="Checkbox"> -->
                            <label for="remember-me" class="text-info"><span>Lembre me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Entrar"> 
                        </div>
                        <div id="register-link" class="text-right">
                            <a href="create.php" rel="next" target="_self" class="text-info">Criar conta</a><br>
                            
                            
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>