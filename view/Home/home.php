<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>PMA - Project Management Aplication</title>
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
                    <h2>Menu Princial</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span>
                </div>
                
                <?php 
                session_start();

                if (isset($_SESSION['usuario_id'])) {
                    include_once '../../controller/UsuarioControle.php';
                    include_once '../../controller/PermissaoControle.php';
                    $usuarioControle = new UsuarioControle();
                    $user = $usuarioControle->readUsuario($_SESSION['usuario_id']);
                    $permissaoControle = new PermissaoControle();
                    $permissoes = $permissaoControle->readPermissao($user['permissao_id']);
                    
                    $_SESSION['usuario'] = $user['usuario'];
                    $_SESSION['permissao'] = $permissoes;
                } else {
                    header("Location: ../login/login.php");
                }
                ?>
                
                <div class="header-user">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../util/user.png" width="30px" height="30px">
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#"><?php echo 'Usuário: '. $_SESSION['usuario']; ?></a>
                            <a class="dropdown-item" href="../Registro/list_registro.php">Log de registros</a>
                            <a class="dropdown-item" href="logout.php">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <tr>
                        <?php 
                        
                        if((substr_compare($permissoes['cliente'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<label class="control-label">Clientes</label>';
                            '</td>';
                        }
                        if((substr_compare($permissoes['projeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                               echo '<label class="control-label">Projetos</label>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['usuario'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<label class="control-label">Usuários</label>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['tipoprojeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<label class="control-label">Modelos de Projeto</label>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['empresa'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<label class="control-label">Empresas</label>';
                            echo '</td>';
                        }
                    echo '</tr>';
                    echo '<tr>';
                        if((substr_compare($permissoes['cliente'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a href="../Cliente/list_cliente.php">Listar Clientes</a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['projeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a href="../Projeto/list_projeto.php">Listar Projetos</a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['usuario'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a href="../Usuario/list_usuario.php">Listar Usuários</a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['tipoprojeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a href="../TipoProjeto/list_tipoProjeto.php">Listar Modelos</a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['empresa'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a href="../Empresa/list_empresa.php">Listar Empresas</a>';
                            echo '</td>';
                        }
                    echo '</tr>';
                    echo '<tr>';
                        if((substr_compare($permissoes['cliente'], '1', 0,1)) == 0) {
                            echo '<td>';
                            if((substr_compare($permissoes['cliente'], '11', 0,2)) == 0) {
                                echo '<a href="../Cliente/create_cliente.php">Cadastrar Cliente</a>';
                            }
                        echo '</td>';
                        }
                        if((substr_compare($permissoes['projeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                            if((substr_compare($permissoes['projeto'], '11', 0,2)) == 0) {
                                echo '<a href="../Projeto/create_projeto.php">Cadastrar Projeto</a>';
                            }
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['usuario'], '1', 0,1)) == 0) {
                            echo '<td>';
                                if((substr_compare($permissoes['usuario'], '11', 0,2)) == 0) {
                                    echo '<a href="../Usuario/create_usuario.php">Cadastrar Usuário</a>';
                                }
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['tipoprojeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                            if((substr_compare($permissoes['tipoprojeto'], '11', 0,2)) == 0) {
                                echo '<a href="../TipoProjeto/create_tipoProjeto.php">Cadastrar Modelo</a>';
                            }
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['empresa'], '1', 0,1)) == 0) {
                            echo '<td>';
                            if((substr_compare($permissoes['empresa'], '11', 0,2)) == 0) {
                                echo '<a href="../Empresa/create_empresa.php">Cadastrar Empresa</a>';
                            }
                            echo '</td>';
                        }
                    echo '</tr>';
                    echo '<tr>';
                        if((substr_compare($permissoes['cliente'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a href="../Cliente/read_cliente.php">Pesquisar por Clientes</a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['projeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a></a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['usuario'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a></a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['tipoprojeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a></a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['empresa'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a></a>';
                            echo '</td>';
                        }
                        ?>
                    </tr>
                    
                </table>
        </div>
        
        
            
        
        
        
    </body>
</html>
