<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>PMA - Atualizar Tarefa</title>
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
                
            include_once '../../domain/Tarefa.php';
            include_once '../../controller/TarefaControle.php';
            
            $id = null;
            if(!empty($_GET['id'])) 
            {
                $id = $_REQUEST['id'];
            }
            if(!empty($_GET['modelo_id'])) 
            {
                $tipoProjeto_id = $_REQUEST['modelo_id'];
                $tipo = 'tipoProjeto';
            }
            if(!empty($_GET['projeto_id']))
            {
                $projeto_id = $_REQUEST['projeto_id'];
                $tipo = 'projeto';
            }
            if(!empty($_POST))
            {
                $tarefa = new Tarefa();
                
                $tarefa->setDescricao($_POST['descricao']);
                $tarefa->setPeso($_POST['peso']);
                $id = $_POST['id'];
                
                $tarefaControle = new TarefaControle();
                $tarefaControle->updateTarefa($id, $tarefa);
                
                $tipo = $_POST['tipo'];
    
                if ($tipo == 'tipoProjeto') {
                    $tipoProjeto_id = $_POST['modelo_id'];
                    header("Location: ../TipoProjeto/detail_tipoProjeto.php?id=".$tipoProjeto_id);
                } elseif ($tipo == 'projeto') {
                    $projeto_id = $_POST['projeto_id'];
                    header("Location: ../Projeto/detail_projeto.php?id=".$projeto_id);
                }
            } else {
                $tarefaControle = new TarefaControle();
                $data = $tarefaControle->readTarefa($id);
            }
            

        ?>
        
        <div class="container">
            
            <div class="jumbotron row">
                <div>
                    <h2>Atualização de Tarefas</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
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
    
            <form class="form-horizontal" action="update_tarefa.php" method="post">

                        <fieldset>
                            <legend>Tarefa</legend>
                            <div id="tarefa">

                                <input type="hidden" name="id" value="<?php echo $id;?>" />
                                <input type="hidden" name="modelo_id" value="<?php echo $tipoProjeto_id;?>" />
                                <input type="hidden" name="projeto_id" value="<?php echo $projeto_id;?>" />
                                <input type="hidden" name="tipo" value="<?php echo $tipo;?>" />
                                
                                <div class="form-group col-md-8">
                                    <label for="descricao">Descrição: </label><br>
                                        <span id="descricao1" class="textfieldHintState">
                                            <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" value="<?php echo $data['descricao'] ?>" />
                                            <span class="textfieldMaxCharsMsg">Esse campo tem limite de 85 caracteres.</span>
                                            <span class="textfieldRequiredMsg">Esse campo é obrigatório</span>
                                        </span>
                                </div>
                                <script>
                                    var user = new Spry.Widget.ValidationTextField("descricao", "custom", {validateOn:["blur"], maxChars: 85});
                                </script>
                                <div class="form-group col-md-1">
                                    <label for="peso">Peso: </label><br>
                                        <span id="peso1" class="textfieldHintState">
                                            <input type="text" class="form-control" name="peso" id="peso" placeholder="Peso" value="<?php echo $data['peso'] ?>" />
                                            <span class="textfieldMaxCharsMsg">Esse campo tem limite de 85 caracteres.</span>
                                            <span class="textfieldRequiredMsg">Esse campo é obrigatório</span>
                                        </span>
                                </div>
                                <script>
                                    var user = new Spry.Widget.ValidationTextField("peso", "custom", {validateOn:["blur"], maxChars: 85});
                                </script>
                            </div>
                        </fieldset>

                



                <div class="form-actions">

                    <button type="submit" class="btn btn-success">Atualizar</button>
                    <?php if ($tipo == 'tipoProjeto') { echo '<a href="../TipoProjeto/detail_tipoProjeto.php?id='.$tipoProjeto_id.'" type="btn" class="btn btn-default">Não</a>'; }
                    elseif ($tipo == 'projeto') { echo '<a href="../Projeto/detail_projeto.php?id='.$projeto_id.'" type="btn" class="btn btn-default">Não</a>'; } ?>

                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
