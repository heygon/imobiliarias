<?php
  require 'php/functions.php';
?>


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
              <form class="form-group">
                <div class="row">
                  <div class="col-md-4 col-sm-12">
                    <label>Tipo de negócio</label>
                    <select class="form-control">
                      <option value=""></option>
                      <option value="venda">Venda</option>
                      <option value="aluguel">Aluguel</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <label>Cidade</label>
                    <select class="form-control">
                      <option value=""></option>
                      <option value="Brasília">Brasília</option>
                      <option value="Sobradinho">Sobradinho</option>
                      <option value="Ceilândia">Ceilândia</option>
                      <option value="Samambaia">Samambaia</option>
                      <option value="Guará">Guará</option>
                      <option value="Riacho Fundo 1">Riacho Fundo 1</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <label>Preço</label>
                    <select class="form-control">
                      <option value="1">De R$100.000,00 a R$200.000,00</option>
                      <option value="2">De R$200.000,00 a R$300.000,00</option>
                      <option value="3">De R$300.000,00 a R$500.000,00</option>
                      <option value="4">De R$500.000,00 a R$800.000,00</option>
                      <option value="5">Acima de R$800.000,00</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-12">
                    <label>Quantidade de quartos</label>
                    <select class="form-control">
                      <option value="1">1 quarto</option>
                      <option value="2">2 quartos</option>
                      <option value="3">3 quartos</option>
                      <option value="4">4 quartos</option>
                      <option value="5">Acima de 5 quartos</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <label>Garagem</label>
                    <select class="form-control">
                      <option value="true">Sim</option>
                      <option value="false">Não</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <label>Tipo de imóvel</label>
                    <select class="form-control">
                      <option value="Residencial">Residêncial</option>
                      <option value="Comercial">Comercial</option>
                      <option value="apt">Apartamento</option>
                      <option value="Casa">Casa</option>
                      <option value="cond">Condomínio</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-12">
                    <label>Código do imóvel</label>
                    <select class="form-control">
                      <option value="true">Sim</option>
                      <option value="false">Não</option>
                    </select>
                  </div>
                  <div class="col-md-8 col-sm-12">
                    <label>&nbsp;</label>
                    <div class="btn btn-pri col-12">
                      Buscar imóvel
                    </div>
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
      <div class="row">

        <?php $imob->listarImoveis() ?>

      </div>
    </div>




     </div>
    <!-- FIM DO CONTAINER -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/jquery-3.4.1.slim.min.js" ></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>