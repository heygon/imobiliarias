<?php

    $dirname = 'html';

    exec('chmod -R 777 '.$dirname);

    array_map('unlink', glob("$dirname/*.*"));
    //unlink($dirname);
    rmdir($dirname);



    setlocale(LC_MONETARY, 'pt-BR');

    $con = mysqli_connect('localhost','ofer1649_busca','GWRMxTnA68U8QJk','ofer1649_busca');

    $getImovel = $con->query("SELECT * FROM imovies ");
    
    while($ri = $getImovel->fetch_array()){

        $img = $con->query("SELECT * FROM Fotos WHERE Imovel = '".$ri['id']."' ");
        $im = $img->fetch_array();

        
        $carrousel = '';
        $thumb = '';
        $i = 0;
        while ($rim = $img->fetch_array()) {

            $carrousel .= '<div  class="carousel-item'.($i == 0 ? "active" : '' ).'  ">';
            $carrousel .= '<img src="'.$rim['URLArquivo'].'" style="width:100%"/>';
            $carrousel .= '</div>';
            
            $thumb .= '<li data-target="#galeria"  data-slide-to="'.$i.'" class=" '. ($i == 0 ? 'active' : '') .'">';
            $thumb .= '<img src="'.$rim['URLArquivo'].'" style="min-height:auto; height:50px !important; min-width:auto; width:50px !important; border"/>';
            $thumb .= '</li>
            ';

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
                <link rel="stylesheet" href="https://imobiliariadiogenes.com.br/busca/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://imobiliariadiogenes.com.br/busca/css/estilo.css">
                <title>Diógenes Imóveis</title>



                <script type="text/javascript" src="https://imobiliariadiogenes.com.br/busca/js/jquery.js" ></script>
                <script type="text/javascript" src="https://imobiliariadiogenes.com.br/busca/js/popper.min.js"></script>
                <script src="https://imobiliariadiogenes.com.br/busca/js/bootstrap.min.js"></script>
                <script src="https://imobiliariadiogenes.com.br/busca/js/jquery.flexslider-min.js"></script>

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
                            jQuery("#recebeImagemGrande").html('."'".'<img src="'."'".'+img+'."'".'" style="width:100%; max-height:100% !important;" />'."'".');
                        });
                        
                        
                        
                        
                        jQuery(".carousel-item img").on("click", function () {
                            var img = $(this).attr("src");
                            console.log(img);
                        
                            $("#imagemCarrousel").fadeIn();
                            $("#recebeImagemGrande").html('."'".'<img src="'."'".'+img+'."'".'" style="width:100%; max-height:100% !important;"/>'."'".');
                        });


                        function prepraImagemGrande(){
                            var imagens = [];
                            $(".carousel-item img").each(function (index, element) {
                                imagens.push({
                                    url : $(this).attr('."'".'src'."'".')
                                });
                            });

                            
                            var indice = 0;
                            $('."'".'.btnCarrouselMais'."'".').click(function(){
                                indice++;
                                if(indice > imagens.length){
                                    indice = 0
                                }
                                $("#recebeImagemGrande").html('."'".'<img src="'."'".'+imagens[indice].url+'."'".'" style="width:100%; max-height:100% !important;"/>'."'".');
                            });
                            $('."'".'.btnCarrouselMenos'."'".').click(function(){
                                indice--;
                                if(indice < 0){
                                    indice = imagens.length - 1;
                                }
                                $("#recebeImagemGrande").html('."'".'<img src="'."'".'+imagens[indice].url+'."'".'" style="width:100%; max-height:100% !important;"/>'."'".');
                            });

                        }
                        prepraImagemGrande();

                        
                        $(".fecharImgDestaque").click(function(){
                            $("#imagemCarrousel").hide();
                        });
                        

                    });
                    function resizeIframe(obj) {
                        obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + "px";
                        
                    }
                    
                    jQuery( document ).ready(function() {
                        jQuery("#menu").load( "https://imobiliariadiogenes.com.br/?page_id=1313" );
                        jQuery("#rodape").load( "https://imobiliariadiogenes.com.br/rodape" );
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
                    #imagemCarrousel .fecharImgDestaque{
                        position: fixed;
                        top: 15px;
                        right: 15px;
                        color:#fff;
                    }
                    #imagemCarrousel .btnCarrouselMais{
                        position:absolute;
                        top: 50vh;
                        right:10px;
                        z-index: 99999;
                    }
                    #imagemCarrousel .btnCarrouselMenos{
                        position:absolute;
                        top: 50vh;
                        left:10px;
                        z-index: 99999;
                    }
                    #imagemCarrousel #recebeImagemGrande{
                        height: 90%;
                        max-width: 90%;
                        
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
                        bottom:40px
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

                    .carousel-inner li{
                        list-style:none;
                        float:left;
                    }

                    
                </style>

            </head>
            <body>
            

                <a href="https://imobiliariadiogenes.com.br/buscar-imoveis/" style="color:white;"><center>
                    <img src="https://imobiliariadiogenes.com.br/wp-content/uploads/2020/06/logoAvatar-1.png" alt="" title="" height="auto" width="350px"  sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 901px, 100vw">
                </center></a>

                <br>
                <br>

                <div style="background-color:#3D4195; widht:100%;">
                    <br>
                    <a href="https://imobiliariadiogenes.com.br/buscar-imoveis/" style="color:white;"><center><b>FAZER NOVA BUSCA</b></center></a>
                    <br>
                </div>
            
            
            
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
                        <strong class="TituloImovel" style="color:white !important;">'.utf8_decode($ri['TituloImovel']).'</strong>
                    </h3>
                    </div>  

                    <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 col-sm-12">
                        <!-- /////////////////// -->
                        <!-- //////GALERIA////// -->
                        <!-- /////////////////// -->
                        <div id="galeria2">
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
                        </div>
                        <!-- /////////////////// -->
                        <!-- //////GALERIA////// -->
                        <!-- /////////////////// -->
                        </div>

                        <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="card-header sub">
                            <strong>Valor do imóvel <br/> <span class="recebePrecoVenda">R$'. ($ri['PrecoVenda'] == '' ? number_format($ri['PrecoLocacao'],2,',','.') : number_format($ri['PrecoVenda'],2,',','.') )  .'</span> </strong>
                            
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
                                <a class="col-3 compartilharFacebook" href="https://www.facebook.com/sharer/sharer.php?u=https://imobiliariadiogenes.com.br/busca/php/html/imovel_'.$ri['CodigoImovel'].'.html" target="_blank"><img class="icons" src="http://imobiliariadiogenes.com.br/busca/img/cfacebook.png"></a>
                                <a class="col-3 compartilharWhats" href="https://api.whatsapp.com/send?text=https://imobiliariadiogenes.com.br/busca/php/html/imovel_'.$ri['CodigoImovel'].'.html" target="_blank"><img class="icons" src="http://imobiliariadiogenes.com.br/busca/img/cwhatsapp.png"></a>
                                <a class="col-3  compartilharTwitter" href="https://twitter.com/home?status=https://imobiliariadiogenes.com.br/busca/php/html/imovel_'.$ri['CodigoImovel'].'.html" target="_blank"><img class="icons" src="http://imobiliariadiogenes.com.br/busca/img/ctwitter.png"></a>
                                <a class="col-3  compartilharEmail" href="mailto:#?&subject=&body=https://imobiliariadiogenes.com.br/busca/php/html/imovel_'.$ri['CodigoImovel'].'.html" target="_blank"><img class="icons" src="http://imobiliariadiogenes.com.br/busca/img/cemail.png"></a>
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
                            <div class="card-body recebeObservacoes">
                                '.utf8_decode($ri['Observacao']).'
                            </div> 
                        </div>  
                        
                        </div>
                    </div>
                    
                    </br>
                    

                    <div class="row">
                        <div class="recebeVideo col-12">

                            ';
                                $video = @explode('watch?v=',$ri['Video']);
                                $video = @explode('&',$video[1]);
                                $video = @'https://www.youtube.com/embed/'.$video[ 0 ];

                            $html .= '
                            '.( $ri['Video'] == '' ? '' : '<iframe class="col p-2" width="560" height="400" src="'.$video.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' ).'

                        </div>
                    </div>

                    
                
                    </br>
                    <div class="row ">
                        <div class="recebeMapa col-12">
                            <div class="recebeMapa col-12">
                                <iframe src="'.$ri['Mapa'].'" class="col-12 p-0" style="height:330px"></iframe>
                            </div>
                        </div>
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
                    <div class="btnCarrouselMenos">< </div>
                    <div class="btnCarrouselMais">> </div>
                    <div id="recebeImagemGrande"></div>
                </div>



                <div id="ImageFull" style="display:none; position:fixed; top:0px; left:0px; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:20">
                <img src="img/times.svg" class="closeImageFull" style="position:fixed; top:16px; right:16px; color:#fff; height:35px; " />

                <img src="img/card.jpg" class="recebeNovaImagem" style="position:fixed; top:30px; width:80%; margin-left:10%; " />
                </div>
                
                <iframe src="https://imobiliariadiogenes.com.br/rodape" id="urlImov" width="100%" frameborder="0"  onload="resizeIframe(this)"></iframe>

            </body>
            </html>';

            //echo $html;

            sleep(3);
            if(!is_dir('html')){
                mkdir("html", 0755);
            }
            $handle = fopen("html/imovel_".$ri['CodigoImovel'].".html", "w+");
            fwrite($handle, $html);
            fclose($handle);

        }
