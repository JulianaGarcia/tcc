<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cadastro Atividades</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="includes/jquery/jquery.mask.js" type="text/javascript"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <link href="includes/css/estilos.css" rel="stylesheet">
    <script src="includes/js/functions.js" type="text/javascript"></script>
    

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
        <form action="cadastroPerfilOng.php" method="post" class="form-horizontal"> 
          <!--Dados da Entidade --> 
          <h3 class="page-header"> Cadastro Atividades </h3>
          <p>Insira aqui atividades e eventos da ONG</p>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="atividade">Atividade</label>
              <input type="text" class="form-control"  id="atividade" name="atividade" required>
            </div>
          </div> 

          <div class="form-group">
            <div class="col-sm-6">
              <label for="descricao">Descrição</label>
              <textarea class="form-control" rows="5" id="descricao" name="descricao" required></textarea>
            </div>
          </div> 

          <div class="form-group">
            <div class="col-sm-2">
              <label for="dataAtividade">Data</label>
              <input type="text" class="form-control"  id="dataAtividade" name="dataAtividade" required>
            </div>
            <div class="col-sm-2">
              <label for="horaAtividade">Hora </label>
              <input type="text" class="form-control"  id="horaAtividade" name="horaAtividade" required>
            </div> 
            <div class="col-sm-2">
              <label for="duracao">Duração</label>
              <input type="text" class="form-control" id="duracao" name="duracao" required>
            </div>
          </div> 

          <div class="form-group">
            <div class="col-sm-6">
              <label for="publico_alvo">Público Alvo</label>
              <input type="text" class="form-control" id="publico_alvo" name="publico_alvo" required>
            </div>
          </div> 
          
          <div class="form-group">
            <div class="col-sm-6">
              <label for="local">Local</label>
              <input type="text" class="form-control" id="local" name="local" required>
            </div>
          </div>


          <!-- Botões -->
          <div class="form-group botao-perfil">
            <div class="col-sm-1">
              <button name="salvar" type="submit" class="btn btn-default">Salvar</button>
            </div>
            <div class="col-sm-1">
              <button type="button" class="btn btn-default">Cancelar</button>
            </div>
          </div> 
        </form>
      </div> <!-- container--> 
    </section>

      
     <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>