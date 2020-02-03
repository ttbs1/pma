<?php

include_once '../../controller/EmpresaControle.php';

$id = 0;
if(!empty($_GET['id']))
{
    $id = $_REQUEST['id'];
}
if(!empty($_POST))
{
    $id = $_POST['id'];
    
    $empresaControle = new EmpresaControle();
    $empresaControle->deleteEmpresa($id);
    header("Location: list_empresa.php");
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
        <title>PMA - Excluir Empresa</title>
        <link href="../../util/aligns.css" rel="stylesheet" type="text/css" />
        <link href="../../util/styles.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="container">
            <div class="jumbotron row">
                <div>
                    <h2>Exclusão de Empresas</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
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
                            <a class="dropdown-item" href="../home/logout.php">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well" id="plabel">Excluir Empresa</h3>
                </div>
                <form class="form-horizontal" action="delete_empresa.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                    <div class="alert alert-danger"> Deseja confirmar a exclusão da empresa?
                    </div>
                    <div class="form actions">
                        <button type="submit" class="btn btn-danger">Sim</button>
                        <a href="detail_empresa.php?id=<?php echo $id;?>" type="btn" class="btn btn-default">Não</a>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    </html>