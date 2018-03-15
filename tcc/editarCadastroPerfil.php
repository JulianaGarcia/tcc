
 
 <!DOCTYPE html>
  <html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Editar Perfil ONG</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="includes/jquery/jquery.mask.js" type="text/javascript"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <link href="includes/css/estilos.css" rel="stylesheet">
    <script src="includes/js/functions.js" type="text/javascript"></script>
    <script>
        function sair(){
          alert("sadasdasdasdsad");
        }

        $( document ).ready(function() {
        //MASCARA DOS CAMPOS
        $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
        });
    </script>

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
          <h3 class="page-header"> Editar o Perfil </h3>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="descricao">Descrição Ong</label>
              <textarea class="form-control" rows="5" id="descricao" name="descricao" required></textarea>
            </div>
          </div> 

          <div class="form-group">
            <div class="col-sm-6">
              <label for="publico_alvo">Público Alvo</label>
              <input type="text" class="form-control"  id="publico_alvo" name="publico_alvo" required>
            </div>
          </div> 

          <div class="form-group">
            <div class="col-sm-6">
              <label for="objetos_aceitos">Quais objetos/materiais são aceitos pela ONG?</label>
              <input type="text" class="form-control"  id="objetos_aceitos" name="objetos_aceitos" required>
            </div>
          </div> 

          <div class="form-group">
            <div class="col-sm-3">
              <label for="retirar_local"> Possibilidade de retirar o material no local? </label>
              <label class="radio-inline"> 
                <input type="radio" id="retirar_local" name="retirar_local" value="Sim">Sim
              </label>
              <label class="radio-inline">
                <input type="radio" id="retirar_local" name="retirar_local" value="Não">Não
              </label>
            </div> 
          </div>

          <div class="form-group">
            <div class="col-sm-6">
              <label for="horario">Hórario de Funcionamento</label>
              <input type="text" class="form-control" id="horario" name="horario" required>
            </div>
          </div> 
          
          <div class="form-group">
            <div class="col-sm-6">
              <label for="pagina-externa">Página Externa</label>
              <input type="text" class="form-control" id="pagina-externa" name="pagina-externa" required>
            </div>
          </div> 

          <div class="checkbox">
            <label><b> <input type="checkbox" id="contribuicao-dinheiro" name="contribuicao-dinheiro" onclick="exibeDadosConta()"> Aceita contribuição em forma de dinheiro?</b></label>
          </div>

          <div class="form-group info-bancarias" id="dados-bancarios" name="dados-bancarios">
            <div class="col-sm-3">
              <label for="banco">Banco</label>
              <input type="text" class="form-control" id="banco" name="banco">
            </div>
            <div class="col-sm-3">
              <label for="agencia">Agencia</label>
              <input type="text" class="form-control" id="agencia" name="agencia">
            </div>
            <div class="col-sm-3">
              <label for="conta_corrente">Conta Corrente</label>
              <input type="text" class="form-control" id="conta_corrente" name="conta_corrente">
            </div>
            <div class="col-sm-3">
              <label for="cnpj">CNPJ</label>
              <input type="text" class="form-control" id="cnpj" name="cnpj">
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