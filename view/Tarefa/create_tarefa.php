<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>PMA - Cadastrar Tarefa</title>
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
            if(!empty($_GET['tipoProjeto_id']))
            {
                $tipoProjeto_id = $_REQUEST['tipoProjeto_id'];
                $tipo = 'tipoProjeto';
            }
            if(!empty($_GET['projeto_id']))
            {
                $projeto_id = $_REQUEST['projeto_id'];
                $tipo = 'projeto';
            }
            if(!empty($_POST))
            {
                include_once '../../domain/tarefa.php';
                include_once '../../controller/TarefaControle.php';
                $tarefa = new Tarefa();
                
                $tarefa->setDescricao($_POST['descricao']);
                $tarefa->setPeso($_POST['peso']);
                
                $tarefaControle = new TarefaControle();
                $tipo = $_POST['tipo'];
                
                if($tipo == 'tipoProjeto') {
                    $tipoProjeto_id = $_POST['tipoProjeto_id'];
                    $tarefaControle->novaTarefa_TipoProjeto($tarefa, $tipoProjeto_id);
                    
                    header("Location: ../TipoProjeto/detail_tipoProjeto.php?id=".$tipoProjeto_id);
                } elseif ($tipo == 'projeto') {
                    $projeto_id = $_POST['projeto_id'];
                    $tarefaControle->novaTarefa_Projeto2($tarefa, $projeto_id);
                    
                    header("Location: ../Projeto/detail_projeto.php?id=".$projeto_id);
                }
                
                
            }

        ?>
        
        <div class="container">
            
            <div class="jumbotron row">
                <div>
                    <h2>Cadastro de Tarefas</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
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
                        <h3 class="well"> Adicionar Modelo de Projeto </h3>
                    </div>
                    <div class="card-body">
            
                        <form class="form-horizontal" action="create_tarefa.php" method="post">




                            <fieldset>
                            <legend>Tarefa</legend>
                            <div id="tarefa">

                                <input type="hidden" name="tipo" value="<?php echo $tipo ?>" />
                                <input type="hidden" name="tipoProjeto_id" id="tipoProjeto_id" value="<?php echo $tipoProjeto_id ?>" />
                                <input type="hidden" name="projeto_id" id="projeto_id" value="<?php echo $projeto_id ?>" />
                            
                                <div class="form-group col-md-6">
                                    <label for="descricao">Descrição: </label><br>
                                        <span id="descricao1" class="textfieldHintState">
                                            <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" value="" />
                                            <span class="textfieldMaxCharsMsg">Esse campo tem limite de 85 caracteres.</span>
                                            <span class="textfieldRequiredMsg">Esse campo é obrigatório</span>
                                        </span>
                                </div>
                                
                            <script>
                                var user = new Spry.Widget.ValidationTextField("descricao1", "custom", {validateOn:["blur"], maxChars: 85});
                            </script>
                            
                                <div class="form-group col-md-1">
                                    <label for="peso">Peso: </label><br>
                                        <span id="peso1" class="textfieldHintState">
                                            <input type="text" class="form-control" name="peso" id="peso" placeholder="Peso" value="" />
                                            <span class="textfieldMaxCharsMsg">Esse campo tem limite de 85 caracteres.</span>
                                            <span class="textfieldRequiredMsg">Esse campo é obrigatório</span>
                                        </span>
                                </div>
                            <script>
                                var user = new Spry.Widget.ValidationTextField("peso1", "integer", {validateOn:["blur"], minValue: 1, maxValue: 100});
                            </script>
                            </div>
                            </fieldset>
                            
                            <div class="form-actions">
                                <br/>

                                <button type="submit" class="btn btn-success">Adicionar</button>
                                <a href="../Home/home.php" type="btn" class="btn btn-default">Menu Principal</a>
                                <?php if ($tipo == 'tipoProjeto') {echo '<a href="../TipoProjeto/detail_tipoProjeto.php?id='.$tipoProjeto_id.'" type="btn" class="btn btn-default">Voltar</a>'; }
                                else if ($tipo == 'projeto') { echo '<a href="../Projeto/detail_projeto.php?id='.$projeto_id.'" type="btn" class="btn btn-default">Voltar</a>'; } ?>

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
        <p></p>
        
    </body>
</html>
