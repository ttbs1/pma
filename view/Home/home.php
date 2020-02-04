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
                    $usuarioControle = new UsuarioControle();
                    $user = $usuarioControle->readUsuario($_SESSION['usuario_id']);
                    
                    $_SESSION['usuario'] = $user['usuario'];
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
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="logout.php">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <tr>
                        <td>
                            <label class="control-label">Clientes</label>
                        </td>
                        <td>
                            <label class="control-label">Projetos</label>
                        </td>
                        <td>
                            <label class="control-label">Usuários</label>
                        </td>
                        <td>
                            <label class="control-label">Modelos de Projeto</label>
                        </td>
                        <td>
                            <label class="control-label">Empresas</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="../Cliente/create_cliente.php">Cadastrar Cliente</a><br>
                        </td>
                        <td>
                            <a href="../Projeto/create_projeto.php">Cadastrar Projeto</a>
                        </td>
                        <td>
                            <a href="../Usuario/create_usuario.php">Cadastrar Usuário</a>
                        </td>
                        <td>
                            <a href="../TipoProjeto/create_tipoProjeto.php">Cadastrar Modelo</a>
                        </td>
                        <td>
                            <a href="../Empresa/create_empresa.php">Cadastrar Empresa</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="../Cliente/list_cliente.php">Listar Clientes</a>
                        </td>
                        <td>
                            <a href="../Projeto/list_projeto.php">Listar Projetos</a>
                        </td>
                        <td>
                            <a href="../Usuario/list_usuario.php">Listar Usuários</a>
                        </td>
                        <td>
                            <a href="../TipoProjeto/list_tipoProjeto.php">Listar Modelos</a>
                        </td>
                        <td>
                            <a href="../Empresa/list_empresa.php">Listar Empresas</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="../Cliente/read_cliente.php">Pesquisar por Clientes</a>
                        </td>
                        <td>
                            <a href="../Projeto/read_projeto.php">Pesquisar Projeto</a>
                        </td>
                        <td>
                            <a></a>
                        </td>
                        <td>
                            <a></a>
                        </td>
                        <td>
                            <a></a>
                        </td>
                        
                    </tr>
                    
                </table>
        </div>
        
        
            
        
        
        
    </body>
</html>
