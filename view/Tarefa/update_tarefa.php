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
            }
            if(!empty($_POST))
            {
                $tarefa = new Tarefa();
                
                $tarefa->setDescricao($_POST['descricao']);
                $tarefa->setPeso($_POST['peso']);
                $id = $_POST['id'];
                
                $tarefaControle = new TarefaControle();
                $tarefaControle->updateTarefa($id, $tarefa);
                
                $tipoProjeto_id = $_REQUEST['modelo_id'];
                header("Location: ../TipoProjeto/detail_tipoProjeto.php?id=".$tipoProjeto_id);
            } else {
                $tarefaControle = new TarefaControle();
                $data = $tarefaControle->readTarefa($id);
            }
            

        ?>
        
        <div class="container">
            
            <div class="jumbotron">
                <h2>Atualização de Tarefas</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
            </div>
    
            <form class="form-horizontal" action="update_tarefa.php" method="post">

                        <fieldset>
                            <legend>Tarefa</legend>
                            <div id="tarefa">

                                <input type="hidden" name="id" id="id" value="<?php echo $id ?>" /><br>
                                <input type="hidden" name="modelo_id" id="modelo_id" value="<?php echo $tipoProjeto_id ?>" /><br>
                                
                                <label for="descricao">Descrição: </label><br>
                                            <span id="descricao1" class="textfieldHintState">
                                                <input style="width: 380px;" type="text" class="iDescricao" name="descricao" id="descricao" placeholder="Descrição" value="<?php echo $data['descricao'] ?>" /><br>
                                                <span class="textfieldMaxCharsMsg">Esse campo tem limite de 85 caracteres.</span>
                                                <span class="textfieldRequiredMsg">Esse campo é obrigatório</span><br>
                                            </span>
                                <script>
                                    var user = new Spry.Widget.ValidationTextField("descricao", "custom", {validateOn:["blur"], maxChars: 85});
                                </script>
                                <label for="peso">Peso: </label><br>
                                            <span id="peso1" class="textfieldHintState">
                                                <input style="width: 40px;" type="text" class="iDescricao" name="peso" id="peso" placeholder="Peso" value="<?php echo $data['peso'] ?>" /><br>
                                                <span class="textfieldMaxCharsMsg">Esse campo tem limite de 85 caracteres.</span>
                                                <span class="textfieldRequiredMsg">Esse campo é obrigatório</span><br>
                                            </span>
                                <script>
                                    var user = new Spry.Widget.ValidationTextField("peso", "custom", {validateOn:["blur"], maxChars: 85});
                                </script>
                            </div>
                        </fieldset>

                



                <div class="form-actions">

                    <button type="submit" class="btn btn-success">Atualizar</button>
                    <?php echo '<a href="../TipoProjeto/detail_tipoProjeto.php?id='.$tipoProjeto_id.'" type="btn" class="btn btn-default">Voltar</a>' ?>

                </div>
            </form>
        </div>
        
    </body>
</html>
