<?php
  include "includes/functions/lib.php";
  include "includes/connection/connection.php";
  include "includes/class/password.php";

  //clearCookie();
  
  if(!isset($_COOKIE["siteAuth"])){
    alert("Você não está logado!!!");

    if(isset($_POST["entrar"])){
      $email = $_POST["email"];
      $senha = $_POST["senha"];
          
      if(checkPasswd($connection, $email, $senha)){
        if(isset($_POST["manter_conectado"]))
          $hash = hashForCookie($connection, $senha, $email);

        alert("Logou!!!");
        location("cadastroPerfilOng.php");
      }else
        alert("Usuário e/ou senha inválido(s)!!!");
    }
  }else{
    $cookie = $_COOKIE["siteAuth"];
    $dados  = unserialize( $cookie );
    
    if(checkHash($connection, $dados["email"], $dados["senha"])){
      alert("Você está logado!!!");
    }else
      alert("Os dados do cookie estão incorretos!!!");
  }
  mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <link href="includes/css/estilos.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    
    <iframe src="headerPag.php" height="50px" width="100%"></iframe>

    <!-- Modal Recuoerar Senha -->
    <div id="recuperar_senha" class="modal fade">
      <div class="modal-dialog">
          
        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3> Recuperar Senha</h3>
          </div>

          <div class="modal-body" style="padding:40px 50px;">
            <form action="" method="post" role="form">
              <div class="form-group">
                <label for="email"><span class="glyphicon glyphicon-user"></span> E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Insira email">
              </div>
              <div class="form-group">
                <label for="cnpj"> CNPJ </label>
                <input type="cnpj" class="form-control" id="cnpj" name="cnpj" placeholder="Insira CNPJ">
              </div>
              
              <button name="enviar_senha" type="submit" class="btn btn-success btn-block">Enviar</button>
            </form>   
          </div>
        </div> <!-- modal content -->  
      </div> <!-- modal dialog --> 
    </div> <!-- /modal recuperar senha -->

    <div class="container"> 

      <div class="col-sm-6">
        <img class="img-responsive" src="imagens/logo.jpg">.. </img> 
      </div> <!-- img -->

      <div class="col-sm-6"> 
        <div class="page-header"> 
          <h3> Acessar</h3>
        </div> <!-- page header -->
        <form action="home.php" method="post" role="form">
          <div class="form-group">
            <label for="email"><span class="glyphicon glyphicon-user"></span> E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Insira email">
          </div>
          <div class="form-group">
            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira senha">
          </div>
          <div class="checkbox">
            <label><input name="manter_conectado" type="checkbox" value="" checked>Manter conectado</label>
          </div>
          <button name="entrar" type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Entrar</button>
          <p id="cadastrar-se"><a href="cadastroOng.php">Cadastre-se</a></p>
          <p><span class="glyphicon glyphicon-lock"></span><a data-toggle="modal" href="#recuperar_senha">Esqueceu sua senha?</a></p>
        </form>   
      </div> <!--login -->


    </div> <!-- container --> 
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>