<?php

@SESSION_START();
@ini_set('display_errors', 1);
@ini_set('html_errors', 1);
@header('Access-Control-Allow-Origin: *');
@date_default_timezone_set('America/Sao_Paulo');


class Imob
{
    
    	////////////////////////////////////////////////////
		///////////////////CONECTION////////////////////////
		////////////////////////////////////////////////////
		private function con(){
			$con = mysqli_connect('localhost','root','root','imobiliaria');
    		$con->set_charset('utf8');
    		return $con;
        }
        
        public function query($query){
            return $this->con()->query($query);
        }

        public function listarImoveis($busca){
            
            if($busca == ''){
                $imob = $this->query("SELECT * FROM imoveis ORDER BY id DESC");
            }else{
                
                $imob = $this->query("SELECT * FROM imoveis ORDER BY id DESC");

            }


            while($row = $imob->fetch_array()){
            ?>
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <img src="<?php echo $row['Capa']; ?>" class="card-img-top">
                        <div class="card-body">
                        <h6 class="titulo card-title"><?php echo $row['Titulo']; ?></h6>
                        <h6><?php echo $row['Cidade']; ?> </h6>
                        </div>
                        <div class="destaque col-12 p-2">
                            <h5>Aluguel: R$ <?php echo $row['Valor']; ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                <div class="minor">COMPARTILHAR ESSA OFERTA:</div>
                                <div class="icones">
                                    <a href="<?php echo $row['facebook']; ?>"><img class="iconscase" src="img/face.svg"></a>
                                    <a href="<?php echo $row['Whats']; ?>"><img class="iconscase" src="img/whats.svg"></a>
                                    <a href="<?php echo $row['Twitter']; ?>"><img class="iconscase" src="img/twiiter.svg"></a>
                                    <a href="mailto:<?php echo $row['Email']; ?>"><img class="iconscase" src="img/email.svg"></a>
                                </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <a class="btnfit btn btn-pri col-12" href="detalhes.php?i=<?php echo $row['$id']; ?>">Saiba mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            <?php
            }
        }


}

$imob = new Imob();


?>