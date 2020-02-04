<?php

include_once '../../controller/EnderecoControle.php';

$id = 0;
if(!empty($_GET['id']))
{
    $id = $_REQUEST['id'];
}
if(!empty($_GET['cliente'])) 
{
    $cliente_id = $_REQUEST['cliente'];
    $tipo = "cliente";
}
if(!empty($_GET['empresa'])) 
{
    $empresa_id = $_REQUEST['empresa'];
    $tipo = "empresa";
}
if(!empty($_POST))
{
    $id = $_POST['id'];
    //Delete do banco:
    $enderecoControle = new EnderecoControle();
    $enderecoControle->deleteEndereco($id);
    
    $tipo = $_REQUEST['tipo'];
    
    if ($tipo == "cliente") {
        $cliente_id = $_POST['cliente'];
        header("Location: ../Cliente/detail_cliente.php?id=".$cliente_id);
    } else if ($tipo == "empresa") {
        $empresa_id = $_POST['empresa'];
        header("Location: ../Empresa/detail_empresa.php?id=".$empresa_id);
    }
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
        <title>PMA - Excluir Endereço</title>
        <link href="../../util/aligns.css" rel="stylesheet" type="text/css" />
        <link href="../../util/styles.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="container">
            <div class="jumbotron row">
                <div>
                    <h2>Exclusão de Endereços</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
                </div>
                <div class="header-user">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../util/user.png" width="30px" height="30px">
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#"><?php session_start(); 
                                                                    if(isset($_SESSION['usuario'])) {
                                                                        echo 'Usuário: '. $_SESSION['usuario'];
                                                                    } else {
                                                                        header("Location: ../login/login.php");
                                                                    } ?></a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="../Home/logout.php">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well" id="plabel">Excluir Endereço</h3>
                </div>
                <form class="form-horizontal" action="delete_endereco.php" method="post">
                    <input type="hidden" name="cliente" id="cliente" value="<?php echo $cliente_id ?>" />
                    <input type="hidden" name="empresa" id="empresa" value="<?php echo $empresa_id ?>" />
                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                    <input type="hidden" name="tipo" value="<?php echo $tipo;?>" />
                    <div class="alert alert-danger"> Deseja confirmar a exclusão do endereço?
                    </div>
                    <div class="form actions">
                        <button type="submit" class="btn btn-danger">Sim</button>
                        <?php 
                        if($tipo=="cliente") {
                            echo '<a href="../Cliente/detail_cliente.php?id='.$cliente_id.'" type="btn" class="btn btn-default">Não</a>';
                        } else if ($tipo=="empresa") {
                            echo '<a href="../Empresa/detail_empresa.php?id='.$empresa_id.'" type="btn" class="btn btn-default">Não</a>';
                        }   
                        ?>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    </html>