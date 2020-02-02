

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>PMA - Detalhar Modelo</title>
        <link href="../../util/aligns.css" rel="stylesheet" type="text/css" />
        <link href="../../util/styles.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="container">
            
            <div class="jumbotron">
                    <h2>Detalhamento do Modelo</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
            </div>
            
            
            <div class="span10 offset1">
                        <?php
                        
                        if(!empty($_GET['id']))
                        {
                            $id = $_REQUEST['id'];
                            include '../../controller/TipoProjetoControle.php';
                            $tipoProjetoControle = new TipoProjetoControle();
                            $data = $tipoProjetoControle->readTipoProjeto($id);
                        }
                        if(!empty($_POST))
                        {
                            
                        }
                        
                        ?>
                <div class="pbuttons" align="right">
                    <?php
                        
                        echo ' ';
                        echo '<a class="btn btn-outline-warning" href="update_tipoProjeto.php?id='.$data['id'].'">Atualizar</a>';
                        echo ' ';
                        echo '<a class="btn btn-outline-danger" href="delete_tipoProjeto.php?id='.$data['id'].'">Excluir</a>';
    
                    ?>
                    
                </div>
                
                
                <div class="card">
    		<div class="card-header">
                    <h3 class="well">Informações do Modelo</h3> 
                    <div align="right"> 
                    
                    </div>
                </div>
                <div class="container">
                <div class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Descrição</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['descricao'];?>
                            </label>
                        </div>
                    </div>

                    
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
                                        echo '<th scope="col">Opcões</th>';
                                    echo '</tr>';
                                echo '</thead>';
                    
                        include '../../controller/TarefaControle.php';
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
                        </div>
                    </div>
                                
                    <div class="form-actions" align="right">
                        <?php echo '<a class="btn btn-default" href="../Tarefa/create_tarefa.php?id='.$data['id'].'">Adicionar Tarefa</a>' ?>
                    </div>
                    
                    <br/>
                    <div class="form-actions">
                        <a href="../../index.php" type="btn" class="btn btn-default">Menu Principal</a>
                        <a href="list_tipoProjeto.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                  </div>
                  </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>

    </body>

    </html>