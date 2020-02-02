<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>PMA - Cadastrar Tarefa</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="../../util/SpryValidationTextField.js" type="text/javascript"></script> 
        <link href="../../util/SpryValid.css" rel="stylesheet" type="text/css" />
        <link href="../../util/sizes.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
            if(!empty($_GET['id']))
            {
                $id = $_REQUEST['id'];
            }
            if(!empty($_POST))
            {
                include_once '../../domain/tarefa.php';
                include_once '../../controller/TarefaControle.php';
                $tarefa = new Tarefa();
                
                $tarefa->setDescricao($_POST['descricao']);
                $tarefa->setPeso($_POST['peso']);
                $id = $_POST['id'];
                
                $tarefaControle = new TarefaControle();
                $tarefaControle->novaTarefa_TipoProjeto($tarefa, $id);
                
                header("Location: ../TipoProjeto/detail_tipoProjeto.php?id=".$id);
            }

        ?>
        
        <div class="container">
            
            <div class="jumbotron">
                    <h2>Cadastro de Tarefas</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
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

                                <input type="hidden" name="id" id="id" value="<?php echo $id ?>" /><br>

                            <label for="descricao">Descrição: </label><br>
                                        <span id="descricao1" class="textfieldHintState">
                                            <input style="width: 380px;" type="text" class="iDescricao" name="descricao" id="descricao" placeholder="Descrição" value="" /><br>
                                            <span class="textfieldMaxCharsMsg">Esse campo tem limite de 85 caracteres.</span>
                                            <span class="textfieldRequiredMsg">Esse campo é obrigatório</span><br>
                                        </span>
                            <script>
                                var user = new Spry.Widget.ValidationTextField("descricao", "custom", {validateOn:["blur"], maxChars: 85});
                            </script>
                            <label for="peso">Peso: </label><br>
                                        <span id="peso1" class="textfieldHintState">
                                            <input style="width: 40px;" type="text" class="iDescricao" name="peso" id="peso" placeholder="Peso" value="" /><br>
                                            <span class="textfieldMaxCharsMsg">Esse campo tem limite de 85 caracteres.</span>
                                            <span class="textfieldRequiredMsg">Esse campo é obrigatório</span><br>
                                        </span>
                            <script>
                                var user = new Spry.Widget.ValidationTextField("peso", "custom", {validateOn:["blur"], maxChars: 85});
                            </script>
                            </div>
                            </fieldset>
                            
                            <div class="form-actions">
                                <br/>

                                <button type="submit" class="btn btn-success">Adicionar</button>
                                <a href="../../index.php" type="btn" class="btn btn-default">Menu Principal</a>
                                <?php echo '<a href="../TipoProjeto/detail_tipoProjeto.php?id='.$id.'" type="btn" class="btn btn-default">Voltar</a>'?>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
    </body>
</html>
