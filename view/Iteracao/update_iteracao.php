<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>PMA - Atualizar Iteração</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="../../util/SpryValidationTextField.js" type="text/javascript"></script> 
        <link href="../../util/SpryValid.css" rel="stylesheet" type="text/css" />
        <link href="../../util/sizes.css" rel="stylesheet" type="text/css" />
        <link href="../../util/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
                
            include_once '../../controller/IteracaoControle.php';
            
            $id = null;
            if(!empty($_GET['id'])) 
            {
                $id = $_REQUEST['id'];
            }
            if(!empty($_GET['projeto'])) 
            {
                $projeto_id = $_REQUEST['projeto'];
            }
            if(!empty($_POST))
            {
                $date = new DateTime();
                $date->modify('-4 hours');
                $dateTime = $date->format("Y-m-d H:i:s");
                $descricao = ($_POST['descricao']);
                $id = $_POST['id'];
                
                $iteracaoControle = new IteracaoControle();
                $iteracaoControle->updateIteracao($id, $descricao, $dateTime);
                
                $projeto_id = $_REQUEST['projeto_id'];
                header("Location: ../Projeto/detail_projeto.php?id=".$projeto_id);
            } else {
                $iteracaoControle = new IteracaoControle();
                $data = $iteracaoControle->readIteracao($id);
            }
            

        ?>
        
        <div class="container">
            
            <div class="jumbotron row">
                <div>
                    <h2>Atualização de Iterações</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
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
    
            <form class="form-horizontal" action="update_iteracao.php" method="post">

                        <fieldset>
                            <legend>Iteração</legend>
                            <div id="tarefa">

                                <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                                <input type="hidden" name="projeto_id" id="projeto_id" value="<?php echo $projeto_id ?>" />
                                
                                <div class="form-group col-md-8">
                                    <label for="descricao">Descrição: </label>
                                    <textarea maxlength="450" class="form-control" rows="4" name="descricao" id="descricao" value=""><?php echo $data['descricao'] ?></textarea>
                                </div>
                                
                            
                            </div>
                        </fieldset>

                



                <div class="form-actions">

                    <button type="submit" class="btn btn-success">Atualizar</button>
                    <?php echo '<a href="../Projeto/detail_projeto.php?id='.$projeto_id.'" type="btn" class="btn btn-default">Voltar</a>' ?>

                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
