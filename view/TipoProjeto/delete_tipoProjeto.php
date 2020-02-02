<?php

include_once '../../controller/TipoProjetoControle.php';

$id = 0;
if(!empty($_GET['id']))
{
    $id = $_REQUEST['id'];
}
if(!empty($_POST))
{
    $id = $_POST['id'];
    
    $tipoProjetoControle = new TipoProjetoControle();
    $tipoProjetoControle->deleteTipoProjeto($id);
    header("Location: list_tipoProjeto.php");
}
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>PMA - Excluir Modelo</title>
        <link href="../../util/aligns.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="container">
            <div class="jumbotron">
                    <h2>Exclusão de Modelos</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
            </div>
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well" id="plabel">Excluir Modelo</h3>
                </div>
                <form class="form-horizontal" action="delete_tipoProjeto.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                    <div class="alert alert-danger"> Deseja confirmar a exclusão do modelo de projeto?
                    </div>
                    <div class="form actions">
                        <button type="submit" class="btn btn-danger">Sim</button>
                        <a href="detail_tipoProjeto.php?id=<?php echo $id;?>" type="btn" class="btn btn-default">Não</a>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>
    </body>

    </html>