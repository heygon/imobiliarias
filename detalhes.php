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
    <div class="container-fluid">
      <div class="dashboard">
        <p>&nbsp;</p>
      </div>


<!-- /////////////////////////////////// -->
<!-- /////////////////////////////////// -->
<!-- /////começo da primeira parte////// -->
<!-- /////////////////////////////////// -->
<!-- /////////////////////////////////// -->
      <div class="card text-center">
        <div class="primecard card-header">
          <h3>
            <strong><?php echo $imob->detalhes($_GET['i'])['TituloImovel'] ?></strong>
          </h3>
        </div>  

        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 col-sm-12">
              <!-- /////////////////// -->
              <!-- //////GALERIA////// -->
              <!-- /////////////////// -->
              <div id="galeria" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  
                  <?php
                    $in = 0;
                    for ($i=0; $i < count($imob->detalhes($_GET['i'])['Galeria']) ; $i++) { 
                    ?>
                      <li data-target="#galeria" data-slide-to="<?php echo $i; ?>" class="<?php if($in == 0){ echo 'active'; } ?>"></li>
                    <?php
                    $in = 1;
                    }
                  ?>
                </ol>
                <div class="carousel-inner">
                  
                  <?php
                    $in = 0;
                    for ($i=0; $i < count($imob->detalhes($_GET['i'])['Galeria']) ; $i++) { 
                    ?>
                    
                      <div class="carousel-item <?php if($in == 0){ echo 'active'; } ?>  ">
                        <img src="<?php echo $imob->detalhes($_GET['i'])['Galeria'][$i]['URL']; ?>" style="width:100%">
                        <div class="carousel-caption d-none d-md-block"></div>
                      </div>

                    <?php
                    $in = 1;
                    }
                  ?>
                </div>
                <a class="carousel-control-prev" href="#galeria" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#galeria" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <!-- /////////////////// -->
              <!-- //////GALERIA////// -->
              <!-- /////////////////// -->
            </div>

            <div class="col-lg-4 col-sm-12">
              <div class="card">
                <div class="card-header sub">
                  <strong>Valor do imóvel - R$ <?php echo number_format(intval($imob->detalhes($_GET['i'])['PrecoVenda']),2,",","."); ?></strong>
                </div>
                <div class="card-body text-left">
                  <ul>
                    <li>Código do imóvel : <?php echo $imob->detalhes($_GET['i'])['CodigoImovel']; ?></li>
                    <li><?php echo $imob->detalhes($_GET['i'])['Cidade'].' - '.$imob->detalhes($_GET['i'])['UF']; ?></li>
                    <?php if(!$imob->detalhes($_GET['i'])['QtdDormitorios'] == ''){ echo '<li>'.$imob->detalhes($_GET['i'])['QtdDormitorios'].' quartos</li>'; }; ?> 
                    <?php if(!$imob->detalhes($_GET['i'])['AreaUtil'] == ''){ echo '<li>Área útil: '.$imob->detalhes($_GET['i'])['AreaUtil'].'m<sup>2</sup></li>'; } ?>
                    <li>Área total: <?php echo $imob->detalhes($_GET['i'])['AreaTotal']; ?> m<sup>2</sup></li>
                  </ul>
                </div>
              </div>
              <br>
              <div class="card">
                <div class="card-header sub">
                 <strong> Compartilhe essa oferta</strong>
                </div>
                <div class="icones card-body">
                  <div class="row">
                    <a class="col-3" href="#" target="_blank"><img class="icons" src="img/cfacebook.png"></a>
                    <a class="col-3" href="#" target="_blank"><img class="icons" src="img/cwhatsapp.png"></a>
                    <a class="col-3" href="#" target="_blank"><img class="icons" src="img/ctwitter.png"></a>
                    <a class="col-3" href="#" target="_blank"><img class="icons" src="img/cemail.png"></a>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>

<!-- /////////////////////////////////// -->
<!-- /////////////////////////////////// -->
<!-- /////começo da segnuda parte/////// -->
<!-- /////////////////////////////////// -->
<!-- /////////////////////////////////// -->
    <br>
    <div class="seccard card">
      <div class="row">



        <div class="col-lg-8 col-sm-12">
          
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-header sub">
                 <strong>Informações completas do imóvel</strong>
                </div>
                <div class="card-body">
                  <?php echo $imob->detalhes($_GET['i'])['Observacao']; ?>
                </div> 
              </div>  
              
            </div>
          </div>
          
          </br>
          
          <?php
            if(!$imob->detalhes($_GET['i'])['Video'] == ''){
              ?>
              <div class="row">
                <iframe class="col" width="560" height="400" src="<?php echo $imob->detalhes($_GET['i'])['Video']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <?php
            }
          ?>
          

          </br>
          <?php
            if(!$imob->detalhes($_GET['i'])['Mapa'] == ''){
              ?>
              <div class="row">
                <iframe class="col" src="<?php echo $imob->detalhes($_GET['i'])['Mapa']; ?>" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="true" aria-hidden="false" tabindex="0"></iframe>
              </div>
              <?php
            }
          ?>
          
          <div class="col-12">&nbsp;</div>
          
        </div>

        <div class="col-lg-4 col-sm-12">

          <div class="col">
            <div class="card">
              <div class="sub card-header">
                <strong>Fale Conosco</strong>
              </div>
              <div class="card-body">
                <div class="talk col-12">
                  <h1 class="telefone">
                    <img class="icons" src="img/cwhatsapp.png">
                    (61) 99999-9999
                  </h1>
                </div>

                <div class="col-12">&nbsp;</div>

                <div class="col-12">
                  <input class="form-control" type="text" placeholder="Nome" name="nome" id="nome">
                </div>

                <div class="col-12">&nbsp;</div>

                <div class="col-12">
                  <input class="form-control" type="text" placeholder="Telefone" name="Telefone" id="nome">
                </div>

                <div class="col-12">&nbsp;</div>

                <div class="col-12">
                  <input class="form-control" type="text" placeholder="E-mail" name="Email" id="nome">
                </div>
                
                <div class="col-12">&nbsp;</div>

                <div class="col-12">
                  <textarea class="form-control" rows="7"></textarea>
                </div>

                <div class="col-12">&nbsp;</div>

                <div class="col-12">
                  <h1 class="butao btn btn-success col-12"><strong>enviar</strong></h1>
                </div>
              </div>

            </div>
            
          </div>
        </div>



      <!-- fim da row -->
      </div>
     <!-- fim da card -->
     </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/jquery-3.4.1.slim.min.js" ></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>