

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>PMA - Detalhar Cliente</title>
        <link href="../../util/aligns.css" rel="stylesheet" type="text/css" />
        <link href="../../util/styles.css" rel="stylesheet" type="text/css" />
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container">
            
            <div class="jumbotron row">
                <div>
                    <h2>Detalhamento do Cliente</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
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
            
            
            <div class="span10 offset1">
                        <?php
                        
                        if(!empty($_GET['id']))
                        {
                            $id = $_REQUEST['id'];
                            include '../../controller/clientecontrole.php';
                            $clienteControle = new ClienteControle();
                            $data = $clienteControle->readCliente($id);
                        }
                        if(!empty($_POST))
                        {
                            
                        }
                        
                        ?>
                <div class="pbuttons" align="right">
                    <?php
                        
                        echo ' ';
                        echo '<a class="btn btn-outline-warning" href="update_cliente.php?id='.$data['id'].'">Atualizar</a>';
                        echo ' ';
                        echo '<a class="btn btn-outline-danger" href="delete_cliente.php?id='.$data['id'].'">Excluir</a>';
    
                    ?>
                    
                </div>
                
                
                <div class="card">
    		<div class="card-header">
                    <h3 class="well">Informações do Cliente</h3> 
                    <div align="right"> 
                    
                    </div>
                </div>
                <div class="container">
                <div class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['nome'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label"><?php if(strlen($data['cpf_cnpj'])==14){echo 'CPF';} else if (strlen($data['cpf_cnpj'])>14){echo 'CNPJ';} else { echo 'CPF/CNPJ'; } ?></label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['cpf_cnpj'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Telefone 01</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['telefone1'];?>
                            </label>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Telefone 02</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['telefone2'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['email'];?>
                            </label>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Endereço(s):</label>
                        <div class="controls">
                            <label class="carousel-inner">
                    <?php
                    
                        echo '<table class="table table-striped">';
                                echo '<thead>';
                                    echo '<tr>';
                                        echo '<th scope="col"></th>';
                                        echo '<th scope="col">Rua</th>';
                                        echo '<th scope="col">Número</th>';
                                        echo '<th scope="col">Bairro</th>';
                                        echo '<th scope="col">Cidade</th>';
                                        echo '<th scope="col">Estado</th>';
                                        echo '<th scope="col">CEP</th>';
                                        echo '<th scope="col">Atualizar</th>';
                                        echo '<th scope="col">Excluir</th>';
                                    echo '</tr>';
                                echo '</thead>';
                    
                        include '../../controller/enderecocontrole.php';
                        $enderecoControle = new EnderecoControle();
                        $data_fk = $enderecoControle->list_enderecosCliente($data['id']);
                        if ($data_fk != NULL) {
                            foreach($data_fk as $row) if($row['ativo']) {

                            
                                echo '<tbody>';
                                    echo '<tr>';
                                                      echo '<th scope="row">'. $row['id'] . '</th>';
                                    echo '<td>'. $row['rua'] . '</td>';
                                    echo '<td>'. $row['numero'] . '</td>';
                                    echo '<td>'. $row['bairro'] . '</td>';
                                    echo '<td>'. $row['cidade'] . '</td>';
                                    echo '<td>'. $row['estado'] . '</td>';
                                    echo '<td>'. $row['CEP'] . '</td>';
                                    echo ' ';
                                    echo '<td width=80><a class="btn btn-outline-warning btn-sm" href="../Endereco/update_endereco.php?id='.$row['id'].'&cliente='.$data['id'].'">Atualizar</a></td>';
                                    echo ' ';
                                    echo '<td width=80><a class="btn btn-outline-danger btn-sm" href="../Endereco/delete_endereco.php?id='.$row['id'].'&cliente='.$data['id'].'">Excluir</a></td>';
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
                        <?php echo '<a class="btn btn-default" href="../Endereco/create_endereco.php?cliente='.$data['id'].'">Adicionar Endereço</a>' ?>
                    </div>
                    
                    <br/>
                    <div class="form-actions">
                        <a href="../Home/home.php" type="btn" class="btn btn-default">Menu Principal</a>
                        <a href="list_cliente.php" type="btn" class="btn btn-default">Voltar</a>
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