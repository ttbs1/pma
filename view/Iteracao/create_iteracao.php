<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>PMA - Cadastrar Iteração</title>
        <link rel="icon" href="../../util/icon.png" type="image/icon type">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../util/links/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="../../util/SpryValidationTextField.js" type="text/javascript"></script> 
        <link href="../../util/SpryValid.css" rel="stylesheet" type="text/css" />
        <link href="../../util/sizes.css" rel="stylesheet" type="text/css" />
        <link href="../../util/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
            if(!empty($_GET['id']))
            {
                $id = $_REQUEST['id'];
            }
            if(!empty($_POST))
            {
                
                include_once '../../controller/IteracaoControle.php';
                
                $date = new DateTime();
                $date->modify('-4 hours');
                $dateTime = $date->format("Y-m-d H:i:s");
                $projeto_id = $_REQUEST['id'];
                $descricao = ($_POST['descricao']);
                session_start();
                if(isset($_SESSION['usuario_id']))
                    $usuario_id = $_SESSION['usuario_id'];
                
                $iteracaoControle = new IteracaoControle();
                $iteracaoControle->novaIteracao_Projeto($usuario_id, $projeto_id, $descricao, $dateTime);
                
                header("Location: ../Projeto/detail_projeto.php?id=".$projeto_id);
            }

        ?>
        
        <div class="container">
            
            <div class="jumbotron row">
                <div>
                    <h2>Cadastro de Iterações</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
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
                            <a class="dropdown-item" href="../Registro/list_registro.php">Log de registros</a>
                            <a class="dropdown-item" href="../Home/logout.php">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
    
            <div clas="span10 offset1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="well"> Adicionar Iteração </h3>
                    </div>
                    <div class="card-body">
            
                        <form class="form-horizontal" action="create_iteracao.php" method="post">

                            <fieldset>
                            <legend>Nova Iteração: </legend>
                            <div id="tarefa">

                                <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                            
                                <div class="form-group col-md-8">
                                    <label for="descricao">Descrição: </label>
                                    <textarea maxlength="450" class="form-control" rows="4" name="descricao" id="descricao"></textarea>
                                </div>
                                
                            </div>
                            </fieldset>
                            
                            <div class="form-actions">
                                <br/>

                                <button type="submit" class="btn btn-success">Adicionar</button>
                                <a href="../Home/home.php" type="btn" class="btn btn-default">Menu Principal</a>
                                <?php echo '<a href="../Projeto/detail_projeto.php?id='.$id.'" type="btn" class="btn btn-default">Voltar</a>'?>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        <script src="../../util/links/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="../../util/links/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../../util/links/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </body>
</html>
