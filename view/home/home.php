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
        <link href="util/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h2>Menu Princial</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication
            
            <?php 
            session_start();
            
            if (isset($_SESSION['usuario'])) {
                $user = $_SESSION['usuario'];
            } else {
                header("Location: view/login/login.php");
            }
            
            
            echo $user;
            
            ?></span></h4><a href="logout.php">Sair</a>
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
                            <a href="view/Cliente/create_cliente.php">Cadastrar Cliente</a><br>
                        </td>
                        <td>
                            <a href="view/Projeto/create_projeto.php">Cadastrar Projeto</a>
                        </td>
                        <td>
                            <a href="view/Usuario/create_usuario.php">Cadastrar Usuário</a>
                        </td>
                        <td>
                            <a href="view/TipoProjeto/create_tipoProjeto.php">Cadastrar Modelo</a>
                        </td>
                        <td>
                            <a href="view/Empresa/create_empresa.php">Cadastrar Empresa</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="view/Cliente/list_cliente.php">Listar Clientes</a>
                        </td>
                        <td>
                            <a href="view/Projeto/list_projeto.php">Listar Projetos</a>
                        </td>
                        <td>
                            <a href="view/Usuario/list_usuario.php">Listar Usuários</a>
                        </td>
                        <td>
                            <a href="view/TipoProjeto/list_tipoProjeto.php">Listar Modelos</a>
                        </td>
                        <td>
                            <a href="view/Empresa/list_empresa.php">Listar Empresas</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="view/Cliente/read_cliente.php">Pesquisar por Clientes</a>
                        </td>
                        <td>
                            <a href="view/Projeto/read_projeto.php">Pesquisar Projeto</a>
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
