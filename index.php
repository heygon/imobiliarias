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
              
            <div class="imagemDiogenes" style=" float:right; position:relative; top:-70px; left:-60px; height:1px; width:1px; ">
              <img src="img/diogenes.png" style="width:250px;" />
            </div>

              <form method="get" action="busca.php" class="form-group">
                <div class="row">
                  <div class="col-md-4 col-sm-12 pl-0 campoBusca">
                    <label>Tipo de negócio</label>
                    <select name="tipoNegocio" class="form-control">
                      <option value="--">Selecione</option>
                      <option value="1" <?php if(isset($_GET['tipoNegocio'])){ if($_GET['tipoNegocio'] == 1){ echo 'selected'; }  } ?> >Venda</option>
                      <option value="2" <?php if(isset($_GET['tipoNegocio'])){ if($_GET['tipoNegocio'] == 2){ echo 'selected'; }  } ?> >Aluguel</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-12 campoBusca">
                    <label>Cidade</label>
                    <select name="Cidade" class="form-control">
                    <option value="--">Selecione</option>
                      <option value="Água Fria de Goiás" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Água Fria de Goiás'){ echo 'selected'; }  } ?> >Água Fria de Goiás</option>
                      <option value="Brasília" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Brasília'){ echo 'selected'; }  } ?> >Brasília</option>
                      <option value="Brazlândia" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Brazlândia'){ echo 'selected'; }  } ?> >Brazlândia</option>
                      <option value="Buriti de Goiás" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Buriti de Goiás'){ echo 'selected'; }  } ?> >Buriti de Goiás</option>
                      <option value="Cascavel" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Cascavel'){ echo 'selected'; }  } ?> >Cascavel</option>
                      <option value="Cidade Ocidental" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Cidade Ocidental'){ echo 'selected'; }  } ?> >Cidade Ocidental</option>
                      <option value="Lago Sul" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Lago Sul'){ echo 'selected'; }  } ?> >Lago Sul</option>
                      <option value="Padre Bernardo" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Padre Bernardo'){ echo 'selected'; }  } ?> >Padre Bernardo</option>
                      <option value="Pirenópolis" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Pirenópolis'){ echo 'selected'; }  } ?> >Pirenópolis</option>
                      <option value="Planaltina" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Planaltina'){ echo 'selected'; }  } ?> >Planaltina</option>
                      <option value="Planautina" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Planautina'){ echo 'selected'; }  } ?> >Planautina</option>
                      <option value="Pontalina" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Pontalina'){ echo 'selected'; }  } ?> >Pontalina</option>
                      <option value="Rianápolis" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Rianápolis'){ echo 'selected'; }  } ?> >Rianápolis</option>
                      <option value="São Sebastião" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'São Sebastião'){ echo 'selected'; }  } ?> >São Sebastião</option>
                      <option value="Sobradinho" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Sobradinho'){ echo 'selected'; }  } ?> >Sobradinho</option>
                      <option value="Teresina de Goiás" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Teresina de Goiás'){ echo 'selected'; }  } ?> >Teresina de Goiás</option>
                      <option value="Unaí" <?php if(isset($_GET['Cidade'])){ if($_GET['Cidade'] == 'Unaí'){ echo 'selected'; }  } ?> >Unaí</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-12 campoBusca">
                    <label>Preço</label>
                    <select name="Preco" class="form-control">
                      <option value="--">Selecione</option>
                      <option value="1" <?php if(isset($_GET['Preco'])){ if($_GET['Preco'] == 1){ echo 'selected'; } } ?> >De R$100.000,00 a R$200.000,00</option>
                      <option value="2" <?php if(isset($_GET['Preco'])){ if($_GET['Preco'] == 2){ echo 'selected'; } } ?> >De R$200.000,00 a R$300.000,00</option>
                      <option value="3" <?php if(isset($_GET['Preco'])){ if($_GET['Preco'] == 3){ echo 'selected'; } } ?> >De R$300.000,00 a R$500.000,00</option>
                      <option value="4" <?php if(isset($_GET['Preco'])){ if($_GET['Preco'] == 4){ echo 'selected'; } } ?> >De R$500.000,00 a R$800.000,00</option>
                      <option value="5" <?php if(isset($_GET['Preco'])){ if($_GET['Preco'] == 5){ echo 'selected'; } } ?> >Acima de R$800.000,00</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-12 mt-2 campoBusca2">
                    <label>Quantidade de quartos</label>
                    <select name="quarto" class="form-control">
                      <option value="--">Selecione</option>
                      <option value="1" <?php if(isset($_GET['quarto'])){ if($_GET['quarto'] == 1){ echo 'selected'; } } ?>>1 quarto</option>
                      <option value="2" <?php if(isset($_GET['quarto'])){ if($_GET['quarto'] == 2){ echo 'selected'; } } ?>>2 quartos</option>
                      <option value="3" <?php if(isset($_GET['quarto'])){ if($_GET['quarto'] == 3){ echo 'selected'; } } ?>>3 quartos</option>
                      <option value="4" <?php if(isset($_GET['quarto'])){ if($_GET['quarto'] == 4){ echo 'selected'; } } ?>>4 quartos</option>
                      <option value="5" <?php if(isset($_GET['quarto'])){ if($_GET['quarto'] == 5){ echo 'selected'; } } ?>>Acima de 5 quartos</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-12 mt-2 campoBusca2">
                    <label>Garagem</label>
                    <select name="garagem" class="form-control">
                      <option value="--">Selecione</option>  
                      <option value="1"   <?php if(isset($_GET['garagem'])){ if($_GET['garagem'] == 1){ echo 'selected'; } } ?>>Sim</option>
                      <option value="2"  <?php if(isset($_GET['garagem'])){ if($_GET['garagem'] == 2){ echo 'selected'; } } ?>>Não</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-12 mt-2 campoBusca2">
                    <label>Tipo de imóvel</label>
                    <select name="tipoImovel" class="form-control">
                      <option value="--">Selecione</option>
                      <option value="Apartamento" <?php if(isset($_GET['tipoImovel'])){ if($_GET['tipoImovel'] == 'Apartamento'){ echo 'selected'; } } ?>>Apartamento</option>
                      <option value="Casa" <?php if(isset($_GET['tipoImovel'])){ if($_GET['tipoImovel'] == 'Casa'){ echo 'selected'; } } ?>>Casa</option>
                      <option value="Comercial" <?php if(isset($_GET['tipoImovel'])){ if($_GET['tipoImovel'] == 'Comercial'){ echo 'selected'; } } ?>>Comercial</option>
                      <option value="Rural" <?php if(isset($_GET['tipoImovel'])){ if($_GET['tipoImovel'] == 'Rural'){ echo 'selected'; } } ?>>Rural</option>
                      <option value="Terreno" <?php if(isset($_GET['tipoImovel'])){ if($_GET['tipoImovel'] == 'Terreno'){ echo 'selected'; } } ?>>Terreno</option>
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
            <?php $imob->listarImoveisCompra(); ?>
          </div>
        </div>
        
        <div class="col-12">&nbsp;</div>

        <div class="col-12" style="background:#ebebeb; padding:20px; border-radius:5px;">
          <div class="row">
            
            <div class="col-12"><h3><strong>Imóveis para aluguel</strong></h3></div>
            <div class="col-12">&nbsp;</div>
            <?php $imob->listarImoveisAluguel(); ?>
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
    <script type="text/javascript" src="js/jquery-3.4.1.slim.min.js" ></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>