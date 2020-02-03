<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>PMA - Atualizar Modelo</title>
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
        
            include '../../domain/TipoProjeto.php';
            include '../../domain/endereco.php';
            include '../../controller/TipoProjetoControle.php';
            include '../../controller/enderecocontrole.php';
            
            
	$id = null;
	if ( !empty($_GET['id']))
            {
		$id = $_REQUEST['id'];
            }
        if ( null==$id )
            {
		header("Location: list_tipoProjeto.php");
            }
	if (!empty($_POST)) {
            $tipoProjeto = new TipoProjeto();
            $id = ($_POST['id']);
            $tipoProjeto->setDescricao($_POST['descricao']);
            
            $tipoProjetoControle = new TipoProjetoControle();
            $tipoProjetoControle->updateTipoProjeto($tipoProjeto, $id);
            
	} else {
            $tipoProjetoControle = new TipoProjetoControle();
            $data = $tipoProjetoControle->readTipoProjeto($id);
	}
	
    ?>
        <div class="container">
            <div class="jumbotron row">
                <div>
                    <h2>Atualização de Modelos</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
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
            <form class="form-horizontal" action="update_tipoProjeto.php" method="post">
            <fieldset>
                    <legend>Atualizar Modelo</legend>

                    <input type="hidden" name="id" id="id" placeholder="id" value="<?php echo $id ?>" /><br>

                    <label for="descricao">Descrição: </label><br>
                                <span id="descricao1" class="textfieldHintState">
                                    <input style="width: 380px;" type="text" class="iDescricao" name="descricao" id="descricao" placeholder="Descrição" value="<?php echo $data['descricao'];?>" /><br>
                                    <span class="textfieldMaxCharsMsg">Esse campo tem limite de 85 caracteres.</span>
                                    <span class="textfieldRequiredMsg">Esse campo é obrigatório</span><br>
                                </span>
                    <script>
                        var user = new Spry.Widget.ValidationTextField("descricao", "custom", {validateOn:["blur"], maxChars: 85});
                    </script>

                    


                    </fieldset>



                    <div class="control-group">
                            <label class="control-label">Tarefa(s):</label>
                            <div class="controls">
                                <label class="carousel-inner">
                        <?php

                            echo '<table class="table table-striped">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            echo '<th scope="col"></th>';
                                            echo '<th scope="col">Descrição</th>';
                                            echo '<th scope="col">Peso</th>';
                                            echo '<th scope="col">Opções</th>';
                                        echo '</tr>';
                                    echo '</thead>';

                            include_once '../../controller/TarefaControle.php';
                            $tarefaControle = new TarefaControle();
                            $data_fk = $tarefaControle->list_tarefasTipoProjeto($data['id']);
                            if ($data_fk != NULL) {
                                foreach($data_fk as $row) {

                                    echo '<tbody>';
                                        echo '<tr>';
                                                          echo '<th scope="row">'. $row['id'] . '</th>';
                                        echo '<td>'. $row['descricao'] . '</td>';
                                        echo '<td>'. $row['peso'] . '</td>';
                                        echo '<td width=250>';
                                        echo '<a class="btn btn-outline-warning" href="../Tarefa/update_tarefa.php?id='.$row['id'].'&modelo_id='.$id.'">Atualizar</a>';
                                        echo ' ';
                                        echo '<a class="btn btn-outline-danger" href="../Tarefa/delete_tarefa.php?id='.$row['id'].'&modelo_id='.$id.'">Excluir</a>';
                                        echo '</td>';
                                        echo '</tr>';        
                                    echo '</tbody>';

                                }
                            }


                                echo '</table>';

                        ?>
                                </label>
                        <div class="form-actions" align="right">
                            <?php echo '<a class="btn btn-default" href="../Tarefa/create_tarefa.php?id='.$data['id'].'">Adicionar Tarefa</a>' ?>
                        </div>

                        <br/>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Atualizar</button>
                            <a href="detail_tipoProjeto.php?id=<?php echo $id; ?>" type="btn" class="btn btn-default">Voltar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table-locale-all.min.js"></script>
    </body>
</html>
