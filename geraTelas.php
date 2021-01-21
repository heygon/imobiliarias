<?php

    setlocale(LC_MONETARY, 'pt-br');

    $con = mysqli_connect('localhost','ofer1649_busca','GWRMxTnA68U8QJk','ofer1649_busca');

    $getImovel = $con->query("SELECT * FROM imovies WHERE CodigoImovel = '2020040700913' ");
    $ri = $getImovel->fetch_array();

    
    $img = $con->query("SELECT * FROM Fotos WHERE Imovel = '".$ri['id']."' ");
    $im = $img->fetch_array();

    
    $carrousel = '';
    $thumb = '';
    $i = 0;
    while ($rim = $img->fetch_array()) {

        $carrousel .= '<li data-target="#galeria" data-slide-to="'.$i.'" class="'. ($i == 0 ? 'active' : '') .'">';
        $carrousel .= '<img src="'.$rim['URLArquivo'].'" style="min-height:auto; height:50px !important; min-width:auto; width:50px !important; border">';
        $carrousel .= '</li>';

        
        $thumb .= '<div class="carousel-item '.($i == 0 ? "active" : '' ).'  ">';
        $thumb .= '<img src="'.$rim['URLArquivo'].'" style="width:100%">';
        $thumb .= '<div class="carousel-caption d-none d-md-block"></div>';
        $thumb .= '</div>';

        $i++;
    }
    
    


    $html = '
    <!doctype html>
        <html lang="pt-BR">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            
        
            <meta property="og:site_name" content="Diógenes Imóveis">
            <meta property="og:title" content="'.utf8_decode($ri['TituloImovel']).'" />
            <meta property="og:description" content="Veja mais detalhes sobre o imóvel deste link" />
            <meta property="og:image" itemprop="image" content="'.$im['URLArquivo'].'">
            
            
                    
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="css/estilo.css">
            <title>Diógenes Imóveis</title>



            <script type="text/javascript" src="js/jquery.js" ></script>
            <script type="text/javascript" src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.flexslider-min.js"></script>

            <script>
            jQuery(document).ready(function(){

                
                function formatValor(e){
                    var valor = parseInt(e);
                    valor = valor.toLocaleString("pt-br",{style: "currency", currency: "BRL"});
                    return valor;
                }



                jQuery(".btnEnviarContato").click(function(){
                jQuery(".btnEnviarContato").hide().before('."'".'<div class=" load col-12 center-align ">Enviado...</div>'."'".');

                var nomeEmail = jQuery(".nomeEmail").val();
                var telefoneEmail = jQuery(".telefoneEmail").val();
                var emailEmail = jQuery(".emailEmail").val();
                var corpoEmail = jQuery(".corpoEmail").val();



                jQuery.ajax({
                    url: "php/functions.php",
                    type: "POST",
                    data:
                    {
                        enviarContato:"",
                        nomeEmail,
                        telefoneEmail,
                        emailEmail,
                        corpoEmail,
                    }
                    })
                    .done(function(xhr) {
                        //console.log(xhr);
                        if(xhr.resp = "s"){
                    
                        jQuery(".load").remove();
                        jQuery(".btnEnviarContato").before('."'".'<div class=" load alert alert-success col-12 text-center ">Sucesso</div>'."'".');
                        setTimeout(function(){
                            jQuery(".load").remove();
                            jQuery(".btnEnviarContato").fadeIn();
                        },3000);
                    
                        }else{
                    

                        jQuery(".load").remove();
                        jQuery(".btnEnviarContato").before('."'".'<div class=" load alert alert-danger col-12 text-center ">Erro ao enviar</div>'."'".');
                        setTimeout(function(){
                            jQuery(".load").remove();
                            jQuery(".btnEnviarContato").fadeIn();
                        },3000);
                    
                        }

                    })
                    .fail(function() {
                        
                        jQuery(".load").remove();
                        jQuery(".btnEnviarContato").before('."'".'<div class=" load alert alert-success col-12 text-center ">Erro ao enviar</div>'."'".');
                        setTimeout(function(){
                        jQuery(".load").remove();
                        jQuery(".btnEnviarContato").fadeIn();
                        },3000);

                    });

                });              


                jQuery(".carousel-indicators li img").on("click", function () {
                    var img = $(this).attr("src");
                    console.log(img);
                
                    jQuery("#imagemCarrousel").fadeIn();
                    jQuery("#recebeImagemGrande").html('."'".'<img src="'."'".'+img+'."'".'" style="width:100%" />'."'".');
                    
                });
                
                
                
                
                jQuery(".carousel-item img").on("click", function () {
                    var img = $(this).attr("src");
                    console.log(img);
                
                    $("#imagemCarrousel").fadeIn();
                    $("#recebeImagemGrande").html('."'".'<img src="'."'".'+img+'."'".'" style="width:100%"/>'."'".');
                    
                });
                
                $(".fecharImgDestaque").click(function(){
                    $("#imagemCarrousel").hide();
                });

            });
            </script>




            <style>
                #imagemCarrousel{
                    position: fixed;
                    top: 0px;
                    left: 0px;
                    height: 100%;
                    width: 100%;
                    background: rgba(0, 0, 0, 0.8);
                    display: none;
                    z-index:999;
                }
                #imagemCarrousel strong{
                    position: fixed;
                    top: 15px;
                    right: 15px;
                    color:#fff;
                }
                #imagemCarrousel #recebeImagemGrande{
                    height: 90%;
                    width: 90%;
                    margin-left:5%;
                    margin-top:3%;
                    overflow: hidden;
                }
                
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
                    <strong class="TituloImovel">'.utf8_decode($ri['TituloImovel']).'</strong>
                </h3>
                </div>  

                <div class="card-body">
                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                    <!-- /////////////////// -->
                    <!-- //////GALERIA////// -->
                    <!-- /////////////////// -->
                    <div id="galeria" class="carousel slide" data-ride="carousel">
                        
                        <ol class="carousel-indicators" style="width:80%; margin-left:10%; bottom:0px; height:70px; overflow:auto">'.$thumb.'</ol>

                        <div class="carousel-inner">'.$carrousel.'</div>
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
                        <strong>Valor do imóvel <br/> <span class="recebePrecoVenda">R$'. ($ri['PrecoVenda'] == '' ? money_format('%.2n', $ri['PrecoLocacao']) : money_format('%.2n', $ri['PrecoVenda']) )  .'</span> </strong>
                        
                        </div>
                        <div class="card-body text-left">
                        <ul class="recebeInfosImoveis">
                            '.( $ri['CodigoImovel'] == '' ? '' : '<li>Código do imóvel : '.$ri['CodigoImovel'].'</li>' ).'
                            '.( $ri['Cidade'] == '' ? '' : '<li>Cidade : '.$ri['Cidade'].'</li>' ).'
                            '.( $ri['UF'] == '' ? '' : '<li>UF : '.$ri['UF'].'</li>' ).'
                            '.( $ri['AreaUtil'] == '' ? '' : '<li>Área privada m<sup>2</sup> : '.$ri['AreaUtil'].'</li>' ).'
                            '.( $ri['AreaTotal'] == '' ? '' : '<li>Área total m<sup>2</sup> : '.$ri['AreaTotal'].'</li>' ).'
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
                            <a class="col-3 compartilharFacebook" href="https://www.facebook.com/sharer/sharer.php?u=https://imobiliariadiogenes.com.br/busca/detalhes.php?i='.$ri['CodigoImovel'].'" target="_blank"><img class="icons" src="img/cfacebook.png"></a>
                            <a class="col-3 compartilharWhats" href="https://api.whatsapp.com/send?text=https://imobiliariadiogenes.com.br/busca/detalhes.php?i='.$ri['CodigoImovel'].'" target="_blank"><img class="icons" src="img/cwhatsapp.png"></a>
                            <a class="col-3  compartilharTwitter" href="https://twitter.com/home?status=https://imobiliariadiogenes.com.br/busca/detalhes.php?i='.$ri['CodigoImovel'].'" target="_blank"><img class="icons" src="img/ctwitter.png"></a>
                            <a class="col-3  compartilharEmail" href="mailto:#?&subject=&body=https://imobiliariadiogenes.com.br/busca/detalhes.php?i='.$ri['CodigoImovel'].'" target="_blank"><img class="icons" src="img/cemail.png"></a>
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
                        <div class="card-body recebeObservacoes">'.utf8_decode($ri['Observacao']).'</div> 
                    </div>  
                    
                    </div>
                </div>
                
                </br>
                

                <div class="row">
                    <div class="recebeVideo col-12">

                        <!--
                            //console.log(obj.Video);
                            var video = obj.Video.split("=");
                            if(video.length >= 2){
                                video = video[1].split("&");
                                video = video[0];
                                video = "https://www.youtube.com/embed/"+video;
                            }else{
                                video = video[0];
                            }
                        -->
                        

                        '.( $ri['Video'] == '' ? '' : '<iframe class="col p-2" width="560" height="400" src="'.$ri['Video'].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' ).'

                    </div>
                </div>

                
                

                </br>
                <div class="row ">
                    <div class="recebeMapa col-12"></div>
                </div>

                





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
                            <a href="https://api.whatsapp.com/send?phone=556141018555&text=Ol%C3%A1%20Di%C3%B3genes%20Im%C3%B3veis!" target="_blank">
                        <h1 class="telefone">
                            <img style="width:40px;" src="https://imobiliariadiogenes.com.br/wp-content/uploads/2020/05/whatsapp.png">
                            61 4101-8555
                        </h1>
                        </a>
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
                        <textarea class="form-control corpoEmail" rows="7">Olá, eu gostaria de obter mais informações sobre este imóvel  de Código '.$ri['CodigoImovel'].' - '.utf8_decode($ri['TituloImovel']).' - '.utf8_decode($ri['Cidade']).' - '.$ri['UF'].'</textarea>
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

            <div id="imagemCarrousel">
            <strong class="fecharImgDestaque">Fechar</strong>
            <div id="recebeImagemGrande"></div>
            </div>



            <div id="ImageFull" style="display:none; position:fixed; top:0px; left:0px; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:20">
            <img src="img/times.svg" class="closeImageFull" style="position:fixed; top:16px; right:16px; color:#fff; height:35px; " />

            <img src="img/card.jpg" class="recebeNovaImagem" style="position:fixed; top:30px; width:80%; margin-left:10%; " />
            </div>

        </body>
        </html>';


        echo $html;

        /* $handle = fopen("detalhes_gerado.html", "r+");
        fwrite($handle, $html);
        fclose($handle); */




        ?>