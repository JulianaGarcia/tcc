<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Atividades</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <link href="includes/css/estilos.css" rel="stylesheet">
    <script src="javaScript.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <iframe src="headerPag.php" height="50px" width="100%"></iframe>

    <br>
    <br>
    <!-- Conteudos --> 
    <section> 
      <div class="container">
          <!--Dados da Entidade --> 
          <h3 class="page-header"> Atividades </h3>
          <button type="submit" class="btn btn-default"><a href="cadastroAtividades.php">Adicionar</a></button>
          <div class="table-responsive">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>
                    Ações
                    <!--<span class="glyphicon glyphicon-pencil"></span> 
                    <span class="glyphicon glyphicon-remove"></span> -->
                  </th>
                  <th>
                    Atividade
                  </th>
                  <th>
                    Descrição
                  </th>
                  <th>
                    Data/Hota
                  </th>
                  <th>
                    Público Alvo
                  </th>
                  <th>
                    Local
                  </th>
                  <th>
                    Duração
                  </th>
                </tr>
              </thead>
              <tbody>
               <!-- Dados serão inseridos pelo botão inserir --> 
              </tbody>              
            </table>
          </div>
              
      
      </div> <!-- container--> 
    </section>

      
     <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>