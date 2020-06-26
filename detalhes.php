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


    <meta property="og:title" content="Diógenes Imóveis"/>
    <meta property="og:image" content="https://imobiliariadiogenes.com.br/wp-content/uploads/2020/02/logo-1.png"/>
    <meta property="og:url" content="https://imobiliariadiogenes.com.br"/>
    <meta property="og:site_name" content="Diógenes Imóveis"/>


    <style>
      .carousel-indicators{
        width:80%;
        margin-left:10%;
        bottom:0px;
        height:70px;
        overflow:auto;
      }
      .carousel-indicators::-webkit-scrollbar-track
      {
          -webkit-box-shadow: inset 0 0 1px rgba(0,0,0,0.3);
          background-color: transparent;
      }

      .carousel-indicators::-webkit-scrollbar
      {
          width: 1px;
          background-color: transparent;
      }

      .carousel-indicators::-webkit-scrollbar-thumb
      {
          background-color: transparent;
      }


      .carousel-indicators{
        bottom:40px
      }
      .carousel-indicators li{
        text-indent:0px;
        margin-right:20px;
      }
      .carousel-indicators li.active{
        opacity:1;
      }
      .carousel-indicators li.active img{
        border:solid 2px #fff;
      }
      
    </style>

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
                      <li data-target="#galeria" data-slide-to="<?php echo $i; ?>" class="<?php if($in == 0){ echo 'active'; } ?>">
                        <img src="<?php echo $imob->detalhes($_GET['i'])['Galeria'][$i]['URL']; ?>" style="min-height:auto; height:50px !important; min-width:auto; width:50px !important; border">
                      </li>
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
                    <?php if(!$imob->detalhes($_GET['i'])['AreaUtil'] == ''){ echo '<li>Área privativa: '.$imob->detalhes($_GET['i'])['AreaUtil'].'m<sup>2</sup></li>'; } ?>
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
                    <a class="col-3" href="https://www.facebook.com/sharer/sharer.php?u=https://imobiliariadiogenes.com.br/busca/detalhes.php?i=<?php echo $_GET['i']; ?>" target="_blank"><img class="icons" src="img/cfacebook.png"></a>
                    <a class="col-3" href="https://api.whatsapp.com/send?text=https://imobiliariadiogenes.com.br/busca/detalhes.php?i=<?php echo $_GET['i']; ?>" target="_blank"><img class="icons" src="img/cwhatsapp.png"></a>
                    <a class="col-3" href="https://twitter.com/home?status=https://imobiliariadiogenes.com.br/busca/detalhes.php?i=<?php echo $_GET['i']; ?>" target="_blank"><img class="icons" src="img/ctwitter.png"></a>
                    <a class="col-3" href="mailto:#?&subject=&body=https://imobiliariadiogenes.com.br/busca/detalhes.php?i=<?php echo $_GET['i']; ?>" target="_blank"><img class="icons" src="img/cemail.png"></a>
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
                  <input class="form-control nomeEmail" type="text" placeholder="Nome" name="nome" id="nome">
                </div>

                <div class="col-12">&nbsp;</div>

                <div class="col-12">
                  <input class="form-control telefoneEmail" type="text" placeholder="Telefone" name="Telefone" id="nome">
                </div>

                <div class="col-12">&nbsp;</div>

                <div class="col-12">
                  <input class="form-control emailEmail" type="text" placeholder="E-mail" name="Email" id="nome">
                </div>
                
                <div class="col-12">&nbsp;</div>

                <div class="col-12">
                  <textarea class="form-control corpoEmail" rows="7">Olá, eu gostaria de obter mais informações sobre este imóvel Código : <?php echo $imob->detalhes($_GET['i'])['CodigoImovel'].' - '.$imob->detalhes($_GET['i'])['TituloImovel'].' - '.$imob->detalhes($_GET['i'])['Cidade'].' - '.$imob->detalhes($_GET['i'])['UF']; ?></textarea>
                </div>

                <div class="col-12">&nbsp;</div>

                <div class="col-12">
                  <h1 class="butao btn btn-success col-12 btnEnviarContato"><strong>enviar</strong></h1>
                </div>
              </div>

            </div>
            
          </div>
        </div>


        <div class="col-12">&nbsp;</div>
        <div class="col-12">&nbsp;</div>
        <div class="col-12">&nbsp;</div>

      <!-- fim da row -->
      </div>
     <!-- fim da card -->
     </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/jquery.js" ></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <script>
      $(document).ready(function(){

        
        $('.btnEnviarContato').click(function(){
          $('.btnEnviarContato').hide().before('<div class=" load col-12 center-align ">Enviado...</div>');

          var nomeEmail = $('.nomeEmail').val();
          var telefoneEmail = $('.telefoneEmail').val();
          var emailEmail = $('.emailEmail').val();
          var corpoEmail = $('.corpoEmail').val();



          $.ajax({
            url: 'php/functions.php',
            type: 'POST',
            data:
              {
                enviarContato:'',
                nomeEmail,
                telefoneEmail,
                emailEmail,
                corpoEmail,
              }
          })
          .done(function(xhr) {
            console.log(xhr);
            if(xhr.resp = 's'){
          
              $('.load').remove();
              $('.btnEnviarContato').before('<div class=" load alert alert-success col-12 text-center ">Sucesso</div>');
              setTimeout(function(){
                $('.load').remove();
                $('.btnEnviarContato').fadeIn();
              },3000);
          
            }else{
          
              $('.load').remove();
              $('.btnEnviarContato').before('<div class=" load alert alert-danger col-12 text-center ">Erro ao enviar</div>');
              setTimeout(function(){
                $('.load').remove();
                $('.btnEnviarContato').fadeIn();
              },3000);
          
            }

          })
          .fail(function() {
            
            $('.load').remove();
            $('.btnEnviarContato').before('<div class=" load alert alert-success col-12 text-center ">Erro ao enviar</div>');
            setTimeout(function(){
              $('.load').remove();
              $('.btnEnviarContato').fadeIn();
            },3000);

          });


        });


        $('.carousel-indicators li img').click(function(){
          console.log($(this).attr('src'));
          $('#ImageFull').fadeIn();
        });

        $('.closeImageFull').click(function(){
          $('#ImageFull').hide();
        });

      });
    </script>


    <div id="ImageFull" style="display:none; position:fixed; top:0px; left:0px; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:20">
      <img src="img/times.svg" class="closeImageFull" style="position:fixed; top:16px; right:16px; color:#fff; height:35px; " />

      <img src="img/card.jpg" class="recebeNovaImagem" style="position:fixed; top:30px; width:80%; margin-left:10%; " />
    </div>

  </body>
</html>