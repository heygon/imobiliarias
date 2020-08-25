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
        //$con = mysqli_connect('localhost','heygon','4595995ab','imobiliaria');
        $con = mysqli_connect('localhost','ofer1649_busca','GWRMxTnA68U8QJk','ofer1649_busca');
        //$con->set_charset('utf8');
        return $con;
    }
    
    public function query($query){
        return @$this->con()->query($query);
    }

    public function listarImoveis($busca){
        
        print_r($busca);

        if(isset($busca['pagination'])){
            $p = $busca['pagination'];
        }else{
            $p = 0;
        }


        $sql = "SELECT * FROM imovies WHERE ";

        if(isset($busca['tipoNegocio'])){
            if($busca['tipoNegocio'] == '' || $busca['tipoNegocio'] == '--'){}else{
                $sql .= " VendaAluga = '".$busca['tipoNegocio']."' AND ";
            }
        }
        if(isset($busca['Cidade'])){
            if($busca['Cidade'] == '' || $busca['Cidade'] == '--'){}else{
                $sql .= " Cidade = '".$busca['Cidade']."' AND ";
            }
        }
        if(isset($busca['Preco'])){
            if($busca['Preco'] == '' || $busca['Preco'] == '--'){}else{

                if($busca['Preco'] == 1){
                    $sql .= " PrecoVenda > 100000 AND PrecoVenda < 200000 AND ";
                }else if($busca['Preco'] == 2){
                    $sql .= " PrecoVenda > 200000 AND PrecoVenda < 300000 AND ";
                }else if($busca['Preco'] == 3){
                    $sql .= " PrecoVenda > 300000 AND PrecoVenda < 500000 AND ";
                }else if($busca['Preco'] == 4){
                    $sql .= " PrecoVenda > 500000 AND PrecoVenda < 800000 AND ";
                }else if($busca['Preco'] == 5){
                    $sql .= " PrecoVenda > 800000 AND ";
                } 
            }
        }
        if(isset($busca['quarto'])){
            if($busca['quarto'] == '' || $busca['quarto'] == '--'){}else{
                $sql .= " QtdDormitorios = '".$busca['quarto']."' AND ";
            }
        }
        if(isset($busca['garagem'])){
            if($busca['garagem'] == '' || $busca['garagem'] == '--'){}else{
                if($busca['garagem'] == 1){
                    $sql .= " QtdVagas > 1 AND ";
                }
            }
        }
        if(isset($busca['tipoImovel'])){
            if($busca['tipoImovel'] == '' || $busca['tipoImovel'] == '--'){}else{
                $sql .= " TipoImovel = '".$busca['tipoImovel']."' AND ";
            }
        }
        if(isset($busca['chave'])){
            if($busca['chave'] == '' || $busca['chave'] == '--'){}else{
                $sql .= " (TituloImovel LIKE '%".$busca['chave']."%' OR CodigoImovel LIKE '%".$busca['chave']."%') AND ";
            }
        }

        $sqlP = $sql." Status = 1 ";
        $params = $busca['tipoNegocio'];

        $sql .= " Status = 1 GROUP BY id ORDER BY PrecoVenda ASC ";
        
        if($p == 0){
            $sql .= " LIMIT 12 ";
        }else{
            $sql .= " LIMIT ".$p.",12 ";
        }


        //echo $sql;

        $this->corpoResultado($sql,$sqlP,$params);
        
    }

    public function listarImoveisCompra(){

        $imob = "SELECT * FROM imovies WHERE VendaAluga = 1 AND Status = 1 ORDER BY rand() LIMIT 3 ";
        $this->corpoResultado($imob,'','');

    }

    public function listarImoveisAluguel(){

        $imob = "SELECT * FROM imovies WHERE VendaAluga = 2 AND Status = 1 ORDER BY rand() LIMIT 3";
        $this->corpoResultado($imob,'','');

    }


    public function corpoResultado($sql,$sqlP,$params)
    {

        $imob = $this->query($sql);
        

        if(!mysqli_num_rows($imob)){

            echo '<div class="col-md-12 col-sm-12 alert alert-warning text-center">Nenhum resultado encontrado</div>';
        }else{
            while($row = $imob->fetch_array()){
            ?>
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <a href="https://imobiliariadiogenes.com.br/imovel?i=<?php echo $row['id']; ?>">
                            <div style="height:200px; overflow:hidden">
                                <?php
                                    $img = $this->query("SELECT * FROM Fotos WHERE Imovel = '".$row['id']."' ORDER BY id ASC LIMIT 1");
                                    $im = $img->fetch_array();
                                ?>
                                <img src="<?php echo $im['URLArquivo']; ?>" class="card-img-top">
                            </div>
                        </a>

                        <div class="card-body">
                            <a href="https://imobiliariadiogenes.com.br/imovel?i=<?php echo $row['id']; ?>">
                                <h6 class="titulo card-title">
                                    <?php echo utf8_decode($row['TituloImovel']); ?>
                                </h6>
                            </a>
                            <h6>
                                <?php echo utf8_decode($row['Cidade'].'-'.$row['UF']); ?>
                            </h6>
                        </div>
                        <div class="destaque col-12 p-2" style="height:50px;">
                        <?php
                            if(!$row['PrecoVenda'] == ''){
                                ?>
                                    <h5 class="branco">Valor: R$ <?php echo number_format(intval($row['PrecoVenda']),2,",","."); ?></h5>
                                <?php
                            }else{
                                if($row['PrecoLocacao'] == ''){
                                    ?>
                                        <h5 class="branco">Não informado</h5>
                                    <?php
                                }else{
                                    ?>
                                        <h5 class="branco">Aluguel: R$ <?php echo number_format(intval($row['PrecoLocacao']),2,",","."); ?></h5>
                                    <?php
                                }
                            }
                        ?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="minor">COMPARTILHAR ESSA OFERTA:</div>
                                    <div class="icones pt-2">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://imobiliariadiogenes.com.br/imovel?i=<?php echo $row['id']; ?>" target="_blank"><img class="iconscase" src="https://imobiliariadiogenes.com.br/busca/img/cfacebook.png"></a>
                                        <a href="https://api.whatsapp.com/send?text=https://imobiliariadiogenes.com.br/imovel?i=<?php echo $row['id']; ?>" target="_blank"><img class="iconscase" src="https://imobiliariadiogenes.com.br/busca/img/cwhatsapp.png"></a>
                                        <a href="https://twitter.com/intent/tweet?url=https://imobiliariadiogenes.com.br/imovel?i=<?php echo $row['id']; ?>" target="_blank"><img class="iconscase" src="https://imobiliariadiogenes.com.br/busca/img/ctwitter.png"></a>
                                        <a href="mailto:#?&subject=&body=https://imobiliariadiogenes.com.br/imovel?i=<?php echo $row['id']; ?>" target="_blank"><img class="iconscase" src="https://imobiliariadiogenes.com.br/busca/img/cemail.png"></a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 p-0 mt-3">
                                    <a class="btnfit btn btn-pri col-12" href="https://imobiliariadiogenes.com.br/imovel?i=<?php echo $row['id']; ?>">Saiba mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            <?php
            }
            

            
    
            if($params == '--'){
                $num = 137 / 12 ;
            }else{
                $getTotal = $this->query($sqlP);
                $num = @mysqli_num_rows($getTotal) / 12 ;
            }
            
            //cho '<br/> Resultados -> '.$num.' tem busca -> '.$sqlP;

            if($num > 1){
                
                if($num > 11){
                    $num = 11; 
                }

                echo '<nav class=" col-6 offset-3 mt-5 text-center prepagination ">';
                echo '<ul class="pagination">';
                    for ($i=0; $i < $num; $i++) { 
                        echo '<li class="page-item  ';
                        if(isset($_GET['pagination'])){
                            if($_GET['pagination'] == $i ){
                                echo 'active';
                            }
                        }
                        echo ' "><a class="page-link" data-link="'.$i.'" href="#">'.$i.'</a></li>';
                    }
                echo '</ul>';
                echo '</nav>';

            }
            
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

        $dados['id']              = $row['id'];
        $dados['TituloImovel']    = utf8_decode($row['TituloImovel']);
        $dados['Observacao']      = utf8_decode($row['Observacao']);
        $dados['PrecoVenda']      = $row['PrecoVenda'];
        $dados['PrecoLocacao']    = $row['PrecoLocacao'];
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
        
        //return $dados;
        echo json_encode($dados);

    }


    public function enviarContato($nomeEmail,$telefoneEmail,$emailEmail,$corpoEmail)
    {
        $to = 'gshlucas6@gmail.com';
        // subject
        $subject = 'Contato enviado pelo site';

        // message
        $message = '
        <html>
        <head>
            <title>Contato enviado pelo site</title>
        </head>
        <body>
            <h6><strong>Contato enviado pelo site</strong></h6>
            <table>
                <tr>
                    <td>Nome</td><td>'.$nomeEmail.'</td>
                </tr>
                <tr>
                    <td>Telefone</td><td>'.$telefoneEmail.'</td>
                </tr>
                <tr>
                    <td>Email</td><td>'.$emailEmail.'</td>
                </tr>
                <tr>
                    <td>Contato</td><td>'.utf8_decode($corpoEmail).'</td>
                </tr>
                <tr>
                    <td>Enviado em: </td><td>'.date('d/m/Y H:i:s').'</td>
                </tr>
            </table>
        </body>
        </html>
        ';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: '.$to. "\r\n";
        $headers .= 'From: Sistema <noreply@imobiliariadiogenes.com.br>' . "\r\n";

        // Mail it
        mail($to, $subject, $message, $headers);
    }

 
    public function imoveis() {
        
        $this->query("TRUNCATE TABLE Fotos ");
        $this->query("TRUNCATE TABLE imovies ");
        
        $content = utf8_encode(file_get_contents('https://www.okeimoveis.com.br/gestao/webservices/IntegracaoImoveisOke.webservice.php?ccu=2039'));
        $xml = simplexml_load_string($content);

        echo '<pre>';

        $xml = $xml->Imoveis->Imovel;
        //print_r($xml[3]);

        
        for ($i=0; $i < count($xml) ; $i++) { 

            //print_r($xml[3]);
            //print_r($xml[3]->CEP);
            //print_r('<br/><br/>');

            
            $confere = $this->query("SELECT CodigoImovel FROM imovies WHERE CodigoImovel = '" . trim($xml[$i]->CodigoImovel) . "' ");
            if(!mysqli_num_rows($confere)){

                $vendaAluga = (trim($xml[$i]->PrecoVenda) == '' || trim($xml[$i]->PrecoVenda) == null ) ? 2 : 1 ;
                
                if($xml[$i]->latitude == 0 || $xml[$i]->latitude == '0' || $xml[$i]->longitude == 0 || $xml[$i]->longitude == '0'){
                    $mapa = '';
                }else{
                    $latitude = floatval($xml[$i]->latitude);
                    $longitude = floatval($xml[$i]->longitude);
                    $mapa = 'https://maps.google.com/maps?q='.$latitude.','.$longitude.'&hl=es&z=14&amp;output=embed';
                }

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
                    PrecoLocacao,
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
                    Caracteristicas,
                    Video,
                    Status,
                    VendaAluga,
                    Mapa
                ) VALUES(
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->CodigoImovel))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->TipoImovel))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->SubTipoImovel))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->TituloImovel))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->UF))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->Modelo))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->Endereco))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->VisualizarMapa))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->DivulgarEndereco))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->Cidade))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->Bairro))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->Numero))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->Complemento))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->CEP))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->PrecoVenda))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->PrecoLocacao))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->PrecoCondominio))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->ValorIPTU))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->UnidadeMetrica))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->AreaUtil))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->AreaTotal))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->QtdDormitorios))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->QtdSuites))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->QtdBanheiros))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->QtdVagas))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->Observacao))."',
                    '".trim(preg_replace("/'/s"," ",$xml[$i]->Caracteristicas))."',
                    '".trim(@$xml[$i]->Videos->Video->Url)."',
                    '1',
                    '". $vendaAluga ."',
                    '".$mapa."'
                )");
                
                
                
            

                // Recupera o último ID de anúncio inserido
                $lastId = $this->query("SELECT id FROM imovies ORDER BY id DESC LIMIT 1 ");
                $lastId = $lastId->fetch_array();

                // Faz o parse das imagens e insere no banco com a ID do anuncio
                for ($f=0; $f < count($xml[$i]->Fotos->Foto) ; $f++) { 

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
                            '".$lastId['id']."'
                        )
                    ");
                }
            }
            
        }
        
        
        echo '</pre>';

    } 


    public function json(){
        $xml = simplexml_load_file("imob.xml");

        echo '<pre>';
        echo json_encode($xml);
        echo '</pre>';
    }
 
    

}


$imob = new Imob();

if(isset($_GET['xml'])){
    $imob->imoveis();
}
//$imob->json();


if(isset($_POST['enviarContato'])){
    $imob->enviarContato($_POST['nomeEmail'],$_POST['telefoneEmail'],$_POST['emailEmail'],$_POST['corpoEmail']);
}

if(isset($_POST['listarImoveisCompra'])){
    $imob->listarImoveisCompra();
}

if(isset($_POST['listarImoveisAluguel'])){
    $imob->listarImoveisAluguel();
}


if(isset($_POST['corpoResultado'])){
    $imob->listarImoveis($_POST);
}


if(isset($_POST['detalhes'])){
    $imob->detalhes($_POST['detalhes']);
}



?>
