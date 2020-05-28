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
            <strong class="TituloImovel"></strong>
          </h3>
        </div>  

        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 col-sm-12">
              <!-- /////////////////// -->
              <!-- //////GALERIA////// -->
              <!-- /////////////////// -->
              <div id="galeria" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators" style="width:80%; margin-left:10%; bottom:0px; height:70px; overflow:auto"></ol>

                <style>
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

                  .carousel-indicators::-webkit-scrollbar-track
                  {
                      -webkit-box-shadow: inset 0 0 1px transparent;
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
                </style>

                <div class="carousel-inner"></div>
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
                  <strong>Valor do imóvel - R$ <span class="recebePrecoVenda"></span> </strong>
                </div>
                <div class="card-body text-left">
                  <ul>
                    <li>Código do imóvel : <span class="recebeCodigoImovel"></span> </li>
                    <li> <span class="recebeCidade"></span> - <span class="recebeUF"></span></li>
                    <li><span class="recebeDormitorios"></span></li>
                    <li><span class="recebeAreaUtil"></span></li>
                    <li>Área total: <span class="recebeAreaTotal"></span> m<sup>2</sup></li>
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
                    <a class="col-3 compartilharFacebook" href="https://www.facebook.com/sharer/sharer.php?u=https://imobiliariadiogenes.com.br/busca/detalhes.php?i=" target="_blank"><img class="icons" src="img/cfacebook.png"></a>
                    <a class="col-3 compartilharWhats" href="https://api.whatsapp.com/send?text=https://imobiliariadiogenes.com.br/busca/detalhes.php?i=" target="_blank"><img class="icons" src="img/cwhatsapp.png"></a>
                    <a class="col-3  compartilharTwitter" href="https://twitter.com/home?status=https://imobiliariadiogenes.com.br/busca/detalhes.php?i=" target="_blank"><img class="icons" src="img/ctwitter.png"></a>
                    <a class="col-3  compartilharEmail" href="mailto:#?&subject=&body=https://imobiliariadiogenes.com.br/busca/detalhes.php?i=" target="_blank"><img class="icons" src="img/cemail.png"></a>
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
                <div class="card-body recebeObservacoes"></div> 
              </div>  
              
            </div>
          </div>
          
          </br>
          

          <div class="row">
            <iframe class="col recebeVideo" width="560" height="400" src="https://www.youtube.com/watch?v=DguHgiUg_v8&feature=youtu.be" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            
            <!--iframe class="col recebeVideo" width="560" height="400" src="https://www.youtube.com/watch?v=DguHgiUg_v8&feature=youtu.be" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe-->
          </div>

          
          

          </br>
          <?php
            /* if(!$imob->detalhes($_GET['i'])['Mapa'] == ''){
              ?>
              <div class="row">
                <iframe class="col" src="<?php echo $imob->detalhes($_GET['i'])['Mapa']; ?>" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="true" aria-hidden="false" tabindex="0"></iframe>
              </div>
              <?php
            } */
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
                  <input class="form-control nomeEmail" type="text" placeholder="Nome" name="nome" id="nomeEmail">
                </div>

                <div class="col-12">&nbsp;</div>

                <div class="col-12">
                  <input class="form-control telefoneEmail" type="text" placeholder="Telefone" name="Telefone" id="telefoneEmail">
                </div>

                <div class="col-12">&nbsp;</div>

                <div class="col-12">
                  <input class="form-control emailEmail" type="text" placeholder="E-mail" name="Email" id="emailEmail">
                </div>
                
                <div class="col-12">&nbsp;</div>

                <div class="col-12">
                  <textarea class="form-control corpoEmail" rows="7"></textarea>
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
      jQuery(document).ready(function(){

        
        jQuery('.btnEnviarContato').click(function(){
          jQuery('.btnEnviarContato').hide().before('<div class=" load col-12 center-align ">Enviado...</div>');

          var nomeEmail = jQuery('.nomeEmail').val();
          var telefoneEmail = jQuery('.telefoneEmail').val();
          var emailEmail = jQuery('.emailEmail').val();
          var corpoEmail = jQuery('.corpoEmail').val();



          jQuery.ajax({
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
          
              jQuery('.load').remove();
              jQuery('.btnEnviarContato').before('<div class=" load alert alert-success col-12 text-center ">Sucesso</div>');
              setTimeout(function(){
                jQuery('.load').remove();
                jQuery('.btnEnviarContato').fadeIn();
              },3000);
          
            }else{
          
              jQuery('.load').remove();
              jQuery('.btnEnviarContato').before('<div class=" load alert alert-danger col-12 text-center ">Erro ao enviar</div>');
              setTimeout(function(){
                jQuery('.load').remove();
                jQuery('.btnEnviarContato').fadeIn();
              },3000);
          
            }

          })
          .fail(function() {
            
            jQuery('.load').remove();
            jQuery('.btnEnviarContato').before('<div class=" load alert alert-success col-12 text-center ">Erro ao enviar</div>');
            setTimeout(function(){
              jQuery('.load').remove();
              jQuery('.btnEnviarContato').fadeIn();
            },3000);

          });


        });


        var url = document.location.href;

        try {
          url = url.split('=');  
        } catch (error) {
          
        }


        jQuery.ajax({
          url: 'php/functions.php', 
          type: 'POST',
          data:
            {
              detalhes: url[1],
            }
        })
        .done(function(xhr) {
          console.log(xhr);

          var obj = JSON.parse(xhr);


          var tumb = '';
          var gale = '';
          for (var i = 0; i < obj.Galeria.length; i++) {
            
            tumb += '<li data-target="#galeria" data-slide-to="'+i+'" class="'+ ((i == 0)? 'active' : '') +'">';
            tumb += '<img src="'+ obj.Galeria[i].URL+'" style="min-height:auto; height:50px !important; min-width:auto; width:50px !important; border">';
            tumb += '</li>';

            gale += '<div class="carousel-item '+ ((i == 0)? 'active' : '') +'  ">';
            gale += '<img src="'+ obj.Galeria[i].URL+'" style="width:100%">';
            gale += '<div class="carousel-caption d-none d-md-block"></div>';
            gale += '</div>';
          };

          $('.carousel-indicators').html(tumb);
          $('.carousel-inner').html(gale);



          $('.TituloImovel').html(obj.TituloImovel);

          if(obj.PrecoVenda == ''){
            if(obj.PrecoLocacao == ''){
              $('.recebePrecoVenda').html('Não informado');
            }else{
              $('.recebePrecoVenda').html(obj.PrecoLocacao);
            }
          }else{
            $('.recebePrecoVenda').html(obj.PrecoVenda);
          }

          $('.recebeCodigoImovel').html(obj.CodigoImovel);
          $('.recebeCidade').html(obj.Cidade);
          $('.recebeUF').html(obj.UF);

          $('.recebeDormitorios').html( ((obj.Dormitorios == '' || obj.Dormitorios == undefined) ? '' : 'Quartos : '+obj.Dormitorios ));
          $('.recebeAreaUtil').html('Área útil : '+obj.AreaUtil+' m<sup>2</sup>');
          $('.recebeAreaTotal').html(obj.AreaTotal);
          

          $('.compartilharFacebook').attr({ 'href' : 'https://www.facebook.com/sharer/sharer.php?u=https://imobiliariadiogenes.com.br/busca/detalhes.php?i='+obj.id });
          $('.compartilharWhats').attr({ 'href':'https://api.whatsapp.com/send?text=https://imobiliariadiogenes.com.br/busca/detalhes.php?i='+obj.id });
          $('.compartilharTwitter').attr({ 'href':'https://twitter.com/intent/tweet?url=https://imobiliariadiogenes.com.br/busca/detalhes.php?i='+obj.id });
          $('.compartilharEmail').attr({ 'href':'mailto:#?&subject=&body=https://imobiliariadiogenes.com.br/busca/detalhes.php?i='+obj.id });

          $('.recebeObservacoes').html(obj.Observacao);

          if(obj.Video == '' || obj.Video == undefined){
            $('.recebeVideo').hide();
          }else{

            console.log(obj.Video);
            var video = obj.Video.split('=');
            if(video.length >= 2){
              video = video[1].split('&');
              video = video[0];
              video = 'https://www.youtube.com/embed/'+video;

            }else{
              video = video[0];
            }


            $('.recebeVideo').attr({ 'src' : video });
          }
          
          $('.corpoEmail').val('Olá, eu gostaria de obter mais informações sobre este imóvel Código : ' + obj.CodigoImovel + ' - ' + obj.TituloImovel + ' - ' + obj.Cidade + ' - ' + obj.UF);
          
          
          

                      


          
        })
        .fail(function() {
          console.log('error');
        });


      });
    </script>

  </body>
</html>