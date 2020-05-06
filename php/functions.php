<?php

SESSION_START();
ini_set('display_errors', 1);
ini_set('html_errors', 1);
header('Access-Control-Allow-Origin: *');
date_default_timezone_set('America/Sao_Paulo');

setlocale(LC_MONETARY, 'pt-br');



class Imob
{
    
    ////////////////////////////////////////////////////
    ///////////////////CONECTION////////////////////////
    ////////////////////////////////////////////////////
    private function con(){
        $con = mysqli_connect('localhost','root','root','imobiliaria');
        //$con->set_charset('utf8');
        return $con;
    }
    
    public function query($query){
        return $this->con()->query($query);
    }

    public function listarImoveis($busca){
        
        if($busca == ''){
            $imob = $this->query("SELECT * FROM imovies ORDER BY id DESC");
        }else{
            
            $imob = $this->query("SELECT * FROM imovies ORDER BY id DESC");

        }


        while($row = $imob->fetch_array()){
        ?>
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <a href="detalhes.php?i=<?php echo $row['id']; ?>">
                        <div style="height:200px; overflow:hidden">
                            <?php
                                $img = $this->query("SELECT * FROM Fotos WHERE Imovel = '".$row['id']."' ORDER BY id ASC LIMIT 1");
                                $im = $img->fetch_array();
                            ?>
                            <img src="<?php echo $im['URLArquivo']; ?>" class="card-img-top">
                        </div>
                    </a>

                    <div class="card-body">
                        <a href="detalhes.php?i=<?php echo $row['id']; ?>">
                            <h6 class="titulo card-title">
                                <?php echo $row['TituloImovel']; ?>
                            </h6>
                        </a>
                        <h6>
                            <?php echo $row['Cidade'].'-'.$row['UF']; ?>
                        </h6>
                    </div>
                    <div class="destaque col-12 p-2" style="height:50px;">
                    <?php
                        if(!$row['PrecoVenda'] == ''){
                            ?>
                                <h5>Aluguel: R$ <?php echo number_format(intval($row['PrecoVenda']),2,",","."); ?></h5>
                            <?php
                        }else{
                            ?>
                                <h5>Não informado</h5>
                            <?php
                        }
                    ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <div class="minor">COMPARTILHAR ESSA OFERTA:</div>
                                <div class="icones pt-2">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $_SERVER['HTTP_HOST'].'?i='.$row['id']; ?>" target="_blank"><img class="iconscase" src="img/cfacebook.png"></a>
                                    <a href="https://api.whatsapp.com/send?text=<?php echo $_SERVER['HTTP_HOST'].'?i='.$row['id']; ?>" target="_blank"><img class="iconscase" src="img/cwhatsapp.png"></a>
                                    <a href="https://twitter.com/home?status=<?php echo $_SERVER['HTTP_HOST'].'?i='.$row['id']; ?>" target="_blank"><img class="iconscase" src="img/ctwitter.png"></a>
                                    <a href="mailto:#?&subject=&body=<?php echo $_SERVER['HTTP_HOST'].'?i='.$row['id']; ?>" target="_blank"><img class="iconscase" src="img/cemail.png"></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 p-0 mt-3">
                                <a class="btnfit btn btn-pri col-12" href="detalhes.php?i=<?php echo $row['id']; ?>">Saiba mais</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        <?php
        }
    }


    public function detalhes($id)
    {

        $id = mysqli_real_escape_string($this->con(),$id);

        $dados = array();

        $img = $this->query("SELECT * FROM Fotos WHERE Imovel = '".$id."' ");

        while($im = $img->fetch_array()){
            $dados['Galeria'][] = array(
                'URL' => $im['URLArquivo']
            );
        }

        $detalhes = $this->query("SELECT * FROM imovies WHERE id = '".$id."' ");
        $row = $detalhes->fetch_array();

        $dados['TituloImovel']    = $row['TituloImovel'];
        $dados['Observacao']      = $row['Observacao'];
        $dados['PrecoVenda']      = $row['PrecoVenda'];
        $dados['TipoImovel']      = $row['TipoImovel'];
        $dados['SubTipoImovel']   = $row['SubTipoImovel'];
        $dados['AreaTotal']       = $row['AreaTotal'];
        $dados['AreaUtil']        = $row['AreaUtil'];
        $dados['QtdDormitorios']  = $row['QtdDormitorios'];
        $dados['CodigoImovel']    = $row['CodigoImovel'];
        $dados['Cidade']          = $row['Cidade'];
        $dados['UF']              = $row['UF'];
        $dados['Video']           = $row['Video'];
        $dados['Mapa']            = $row['Mapa'];
        



        return $dados;

    }
 
    public function imoveis() {
        $xml = simplexml_load_file("imob.xml");

        echo '<pre>';

        $xml = $xml->Imoveis->Imovel;
        //print_r($xml[0]);

        
        for ($i=0; $i < count($xml) ; $i++) { 

            $titulo = trim($xml[$i]->TituloImovel);
            //echo "SELECT CodigoImovel FROM imovies WHERE CodigoImovel = '".$titulo."' ";

            $v = $this->con()->query("SELECT CodigoImovel FROM imovies WHERE CodigoImovel = '".$titulo."' ");

                $this->query("
                    INSERT INTO imovies (
                        CodigoImovel,
                        TipoImovel,
                        SubTipoImovel,
                        TituloImovel,
                        UF,
                        Modelo,
                        Endereco,
                        VisualizarMapa,
                        DivulgarEndereco,
                        Cidade,
                        Bairro,
                        Numero,
                        Complemento,
                        CEP,
                        PrecoVenda,
                        PrecoCondominio,
                        ValorIPTU,
                        UnidadeMetrica,
                        AreaUtil,
                        AreaTotal,
                        QtdDormitorios,
                        QtdSuites,
                        QtdBanheiros,
                        QtdVagas,
                        Observacao,
                        Caracteristicas
                    ) VALUES(
                        '".trim($xml[$i]->CodigoImovel)."',
                        '".trim($xml[$i]->TipoImovel)."',
                        '".trim($xml[$i]->SubTipoImovel)."',
                        '".trim($xml[$i]->TituloImovel)."',
                        '".trim($xml[$i]->UF)."',
                        '".trim($xml[$i]->Modelo)."',
                        '".trim($xml[$i]->Endereco)."',
                        '".trim($xml[$i]->VisualizarMapa)."',
                        '".trim($xml[$i]->DivulgarEndereco)."',
                        '".trim($xml[$i]->Cidade)."',
                        '".trim($xml[$i]->Bairro)."',
                        '".trim($xml[$i]->Numero)."',
                        '".trim($xml[$i]->Complemento)."',
                        '".trim($xml[$i]->CEP)."',
                        '".trim($xml[$i]->PrecoVenda)."',
                        '".trim($xml[$i]->PrecoCondominio)."',
                        '".trim($xml[$i]->ValorIPTU)."',
                        '".trim($xml[$i]->UnidadeMetrica)."',
                        '".trim($xml[$i]->AreaUtil)."',
                        '".trim($xml[$i]->AreaTotal)."',
                        '".trim($xml[$i]->QtdDormitorios)."',
                        '".trim($xml[$i]->QtdSuites)."',
                        '".trim($xml[$i]->QtdBanheiros)."',
                        '".trim($xml[$i]->QtdVagas)."',
                        '".trim($xml[$i]->Observacao)."',
                        '".trim($xml[$i]->Caracteristicas)."'
                    )
                ");
            //}
            
        }
        
        echo '</pre>';

    } 


    public function json(){
        $xml = simplexml_load_file("imob.xml");

        echo '<pre>';
        echo json_encode($xml);
        echo '</pre>';
    }
    
    
    public function imagem(){
        $xml = simplexml_load_file("imob.xml");

        echo '<pre>';
        
        //echo $xml[0]->SubTipoImovel;
        $xml = $xml = $xml->Imoveis->Imovel;
        
        for ($i=0; $i < count($xml); $i++) { 

            //echo json_encode($xml[$i]->Fotos);

            $im = $i + 1;
            for ($f=0; $f < 30; $f++) { 

                if(!$xml[$i]->Fotos->Foto[$f]->URLArquivo == ''){
                    $this->query("
                        INSERT INTO Fotos (
                            NomeArquivo,
                            URLArquivo,
                            Principal,
                            Alterada,
                            Imovel
                        ) VALUES(
                            '".trim($xml[$i]->Fotos->Foto[$f]->NomeArquivo)."',
                            '".trim($xml[$i]->Fotos->Foto[$f]->URLArquivo)."',
                            '".trim($xml[$i]->Fotos->Foto[$f]->Principal)."',
                            '".trim($xml[$i]->Fotos->Foto[$f]->Alterada)."',
                            '".$im."'
                        )
                    ");
                }

            }
        }

        echo '</pre>';
    }
 
    

}

$imob = new Imob();

//$imob->imoveis();
//$imob->json();
//$imob->imagem();




?>