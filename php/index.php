<?php
  require 'functions.php';
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Responsividade -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Site Imóveis</title>
  </head>
  <body>

    <div class="content">
        <div class="row">
            <div class="d-flex col-12 justify-content-center align-items-center" style="margin-top:15%">
                <div class="jumbotron text-center">
                    <h5 class="col-12">Clique no botão para atualizar</h5>

                    <?php
                      if(isset($_POST['atualizar'])){
                        $imob->imoveis();

                        echo '<div class="alert alert-success text-center">Atualização executada com sucesso!</div>';
                        echo '<script> setTimeout(function(){ location.href = "index.php" },3000); </script>';
                      }
                    ?>


                    <form method="post" action="index.php">
                        <input type="submit" class="btn btn-primary" name="atualizar" value="Atualizar" />
                    </form>
                </div>
            </div>

        </div>
    </div>



  </body>
</html>