<?php
  include "includes/functions/lib.php";
  include "includes/connection/connection.php";
  include "includes/class/password.php";

  // echo hashForCookie("teste", "teste@teste");

  if(isset($_POST["salvar"])){
    $razao_social   = $_POST["razao_social"];
    $nome_fantasia  = $_POST["nome_fantasia"];
    $cnpj           = $_POST["cnpj"];
    $endereco       = $_POST["endereco"];
    $numero         = $_POST["numero"];
    $bairro         = $_POST["bairro"];
    $cidade         = $_POST["cidade"];
    $uf             = $_POST["uf"];
    $cep            = $_POST["cep"];
    $telefone       = $_POST["telefone"];
    $email          = $_POST["email"];
    $senha          = hashPasswdWithSalt($_POST["senha"], $salt);
    // $hash_cookie    = hashForCookie($_POST["senha"], $_POST["email"]);
    
    $sql = "INSERT INTO ong.usuario
            (razao_social,
            nome_fantasia,
            cnpj,
            endereco,
            numero,
            bairro,
            cidade,
            uf,
            cep,
            telefone,
            email,
            senha,
            salt,
            ultima_modificacao,
            data_criacao)
            VALUES
            ('$razao_social',
            '$nome_fantasia',
            '$cnpj',
            '$endereco',
            '$numero',
            '$bairro',
            '$cidade',
            '$uf',
            '$cep',
            '$telefone',
            '$email',
            '$senha',
            '$salt',
            NOW(),
            NOW());";
    if(mysqli_query($connection, $sql)){
      alert("Cadastro feito com sucesso!!!");
      location("cadastroPerfilOng");
    }else
      alert("Ocorreu algum erro ao efetuar o cadastro!!!");

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
    <title>Cadastro ONG</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="includes/jquery/jquery.mask.js" type="text/javascript"></script>
    <!-- <script src="includes/jquery/jquery-3.3.1.min.js"></script> -->

    <script>
      $( document ).ready(function() {
        //MASCARA DOS CAMPOS
        $('#cep').mask('00000-000');
        $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('#telefone').mask('(00) 0000-0000');

        //MONTA AS CIDADES DE ACORDO COM ESTADO SELECIONADO
        $.getJSON('includes/json/estados_cidades.json', function (data) {
          var items = [];
          var options = '<option value=""></option>';	
          $.each(data, function (key, val) {
            options += '<option value="' + val.nome + '">' + val.nome + '</option>';
          });					
          $("#uf").html(options);				
          
          $("#uf").change(function () {				
          
            var options_cidades = '';
            var str = "";					
            
            $("#uf option:selected").each(function () {
              str += $(this).text();
            });
            
            $.each(data, function (key, val) {
              if(val.nome == str) {							
                $.each(val.cidades, function (key_city, val_city) {
                  options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
                });							
              }
            });
            $("#cidade").html(options_cidades);
            
          }).change();		
        
        });

        //VERIFICA SE AS DUAS SENHAS DIGITADAS SÃO IGUAIS
        $('.check_password').blur(function() {
          var password = $('#senha'),
            repassword = $('#conf_senha');

          //password.addClass(
            //password.val().length > 0 ? 'has-success' : 'has-error'
          //);
          //repassword.addClass(
          // password.val().length > 0 ? 'has-success' : 'has-error'
          //);

          if(password.val() != repassword.val() && repassword.val() != "") {
            repassword.addClass('has-error');
          }
          else
            repassword.removeClass('has-error');
        });
      });
    </script>
    
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

    <!-- Conteudos --> 
    <section> 
      <div class="container">
        <form action="cadastroOng.php" method="post" class="form-horizontal"> 
          <!--Dados da Entidade --> 
          <h3 class="page-header"> Dados da Entidade </h3> 
          <div class="form-group">
            <div class="col-sm-4">
              <label for="razao_social">Razão Social</label>
              <input type="text" maxlenght="100" class="form-control" id="razao_social" name="razao_social" required>
            </div>
            <div class="col-sm-4">
              <label for="nome_fantasia">Nome Fantasia</label>
              <input type="text" maxlenght="50" class="form-control" id="nome_fantasia" name="nome_fantasia" required>
            </div> 
            <div class="col-sm-2">
              <label for="cnpj">CNPJ</label>
              <input type="text" maxlength="18" class="form-control" id="cnpj" name="cnpj" required>
            </div>
          </div> 

          <div class="form-group">
            <div class="col-sm-5">
              <label for="endereco">Endereço</label>
              <input type="text" maxlenght="50" class="form-control" id="endereco" name="endereco" required>
            </div>
            <div class="col-sm-1">
              <label for="numero">Nº</label>
              <input type="text" maxlenght="5" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="col-sm-4">
              <label for="bairro">Bairro</label>
              <input type="text" maxlenght="50" class="form-control" id="bairro" name="bairro" required>
            </div>
          </div> 

          <div class="form-group">
            <div class="col-sm-1" class="form-group">
              <label for="uf">UF</label>
              <select class="form-control" id="uf" name="uf" required>
                <option value=""></option>
              </select>
            </div> 
            <div class="col-sm-4">
              <label for="cidade">Cidade</label>
              <select class="form-control" id="cidade" name="cidade" required>
              </select>
            </div>
            <div class="col-sm-2">
              <label for="cep">CEP</label>
              <input type="text" maxlength="9" class="form-control" id="cep" name="cep" required>
            </div>
            <div class="col-sm-3">
              <label for="telefone">Telefone</label>
              <input type="text" maxlength="14" class="form-control" id="telefone" name="telefone" required>
            </div> 
          </div> 
                 
          <!--Dados da Senha --> 
          <h3 class="page-header"> Controle de Acesso </h3> 
          <div class="form-group">
            <div class="col-sm-6">
              <label for="email">E-mail</label>
              <input type="text" maxlenght="100" class="form-control" id="email" name="email" required>
            </div>
          </div> 
            
          <div class="form-group">
            <div class="col-sm-3">
              <label for="senha">Senha</label>
              <input type="password" maxlenght="8" class="form-control check_password" id="senha" name="senha" required>
            </div>
            <div class="col-sm-3">
              <label for="conf_senha">Confirmar a senha</label>
              <input type="password" maxlenght="8" class="form-control check_password" id="conf_senha" name="conf_senha" required>
            </div> 
          </div> 

          <!-- Botões -->
          <div class="form-group">
            <div class="col-sm-1">
              <button name="salvar" type="submit" class="btn btn-default">Salvar</button>
            </div>
            <div class="col-sm-1">
              <button type="button" class="btn btn-default" onclick="window.location = 'home.php'">Cancelar</button>
            </div>
          </div> 
      </form>


      </div> <!-- container--> 
    </section>

    
    <!-- Rodape --> 
    <footer id="rodape">
      <div class="container"> 
        <div class="row">

          <div class="col-md-2"> 
            <p id="icone-rodape"> DE MÃOS DADAS </p>
          </div> <!-- COL-MD --> 

          <div class="col-md-2"> 
            <a href="" id="sobre"> Sobre </a>
          </div>
          <div class="col-md-2"> 
            <a href="" id="quem-somos"> Quem Somos </a>
          </div>
          <div class="col-md-2"> 
            <a href="" id="contato"> Contato </a>
          </div> <!-- col md --> 

        </div> <!-- row --> 
      </div> <!-- container --> 
    </footer>



     <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>