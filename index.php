<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Responsividade -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Site Imóveis</title>
  </head>
  <body>
    <div class="container">
      <div class="dashboard">
        <p>&nbsp;</p>
      </div>
      <div class="row">
        <div class="col-sm-0 col-md-1">&nbsp;</div>
        <div class="col-sm-12 col-md-10">
          <div class="busca card">
            <div class="card-body">
              
            <div class="imagemDiogenes" style=" float:right; position:relative; top:-70px; left:-60px; height:1px; width:1px; ">
              <img src="img/diogenes.png" style="width:250px;" />
            </div>

              <form method="get" action="busca.php" class="form-group">
                <div class="row">
                  <div class="col-md-4 col-sm-12 pl-0 campoBusca">
                    <label>Tipo de negócio</label>
                    <select name="tipoNegocio" class="form-control">
                      <option value="--">Selecione</option>
                      <option value="1" >Venda</option>
                      <option value="2" >Aluguel</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-12 campoBusca">
                    <label>Cidade</label>
                    <select name="Cidade" class="form-control">
                    <option value="--">Selecione</option>
                      <option value="Água Fria de Goiás" >Água Fria de Goiás</option>
                      <option value="Brasília" >Brasília</option>
                      <option value="Brazlândia" >Brazlândia</option>
                      <option value="Buriti de Goiás" >Buriti de Goiás</option>
                      <option value="Cascavel" >Cascavel</option>
                      <option value="Cidade Ocidental" >Cidade Ocidental</option>
                      <option value="Lago Sul" >Lago Sul</option>
                      <option value="Padre Bernardo" >Padre Bernardo</option>
                      <option value="Pirenópolis" >Pirenópolis</option>
                      <option value="Planaltina" >Planaltina</option>
                      <option value="Planautina" >Planautina</option>
                      <option value="Pontalina" >Pontalina</option>
                      <option value="Rianápolis" >Rianápolis</option>
                      <option value="São Sebastião" >São Sebastião</option>
                      <option value="Sobradinho" >Sobradinho</option>
                      <option value="Teresina de Goiás" >Teresina de Goiás</option>
                      <option value="Unaí" > >Unaí</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-12 campoBusca">
                    <label>Preço</label>
                    <select name="Preco" class="form-control">
                      <option value="--">Selecione</option>
                      <option value="1" >De R$100.000,00 a R$200.000,00</option>
                      <option value="2" >De R$200.000,00 a R$300.000,00</option>
                      <option value="3" >De R$300.000,00 a R$500.000,00</option>
                      <option value="4" >De R$500.000,00 a R$800.000,00</option>
                      <option value="5" >Acima de R$800.000,00</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-12 mt-2 campoBusca2">
                    <label>Quantidade de quartos</label>
                    <select name="quarto" class="form-control">
                      <option value="--">Selecione</option>
                      <option value="1" >1 quarto</option>
                      <option value="2" >2 quartos</option>
                      <option value="3" >3 quartos</option>
                      <option value="4" >4 quartos</option>
                      <option value="5" >Acima de 5 quartos</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-12 mt-2 campoBusca2">
                    <label>Garagem</label>
                    <select name="garagem" class="form-control">
                      <option value="--">Selecione</option>  
                      <option value="1"  >Sim</option>
                      <option value="2"  >Não</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-12 mt-2 campoBusca2">
                    <label>Tipo de imóvel</label>
                    <select name="tipoImovel" class="form-control">
                      <option value="--">Selecione</option>
                      <option value="Apartamento" >Apartamento</option>
                      <option value="Casa" >Casa</option>
                      <option value="Comercial" >Comercial</option>
                      <option value="Rural" >Rural</option>
                      <option value="Terreno" >Terreno</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 p-0 campoBuscaTdo mt-3">
                  <label class="col-12 pl-0">Palavra chave</label>    
                  <input type="text" class="pl-0 form-control col-12 pl-2" name="chave" placeholder="Pesquisar por código ou palavra chave" value="<?php if(isset($_GET['chave'])){ echo $_GET['chave'];  } ?>">
                </div>

                <div class="row">

                  <div class="col-6 offset-3 btnBuscar">
                    <label>&nbsp;</label>
                    <input type="submit" class="btn btn-pri col-12" value="Buscar imóvel"/>
                  </div>


                </div>

              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-0 col-md-1">&nbsp;</div>
        
      </div>
      <!-- FIM DA CARD BODY ^ -->
      <!-- FIM DA CARD BODY | -->
      <!-- FIM DA CARD BODY | -->

    <p>&nbsp;</p>
    <div class="seccard card">
      

        <div class="col-12" style="background:#ededed; padding:20px; border-radius:5px;">
          <div class="row">
            
            <div class="col-12"><h3><strong>Imóveis para venda</h3></strong></div>
            <div class="col-12">&nbsp;</div>
            <div class="recebeImovelCompra col-12 row">
              <div class="center-text">
                <i class="fa fa-spin fa-spinner fa-5x"></i>
                <h5>Carregando dados...</h5>
              </div>
            </div>

            

          </div>
        </div>
        
        <div class="col-12">&nbsp;</div>

        <div class="col-12" style="background:#ebebeb; padding:20px; border-radius:5px;">
          <div class="row">
            
            <div class="col-12"><h3><strong>Imóveis para aluguel</strong></h3></div>
            <div class="col-12">&nbsp;</div>
            <div class="recebeImovelAluguel col-12 row">
              <div class="center-text">
                <i class="fa fa-spin fa-spinner fa-5x"></i>
                <h5>Carregando dados...</h5>
              </div>
            </div>
            
          </div>
        </div>

      </div>
    </div>

    <div class="col-12">&nbsp;</div>
    <div class="col-12">&nbsp;</div>
    <div class="col-12">&nbsp;</div>
    <div class="col-12">&nbsp;</div>


    <style>
      .pagination{
        display:none;
      }
    </style>

     </div>
    <!-- FIM DO CONTAINER -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/jquery.js" ></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <script>

      jQuery(document).ready(function(){

        jQuery.ajax({
          url: 'php/functions.php', 
          type: 'POST',
          data:{ listarImoveisCompra : '' }
        })
        .done(function(xhr) {
          console.log(xhr);
          jQuery('.recebeImovelCompra').html(xhr);
        })
        .fail(function() {
          console.log('error');
        });


        jQuery.ajax({
          url: 'php/functions.php', 
          type: 'POST',
          data:{ listarImoveisAluguel : '' }
        })
        .done(function(xhr) {
          console.log(xhr);
          jQuery('.recebeImovelAluguel').html(xhr);
        })
        .fail(function() {
          console.log('error');
        });



      });

    </script>


  </body>
</html>