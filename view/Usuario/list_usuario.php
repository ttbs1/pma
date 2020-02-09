<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
session_start(); 
if((substr_compare($_SESSION['permissao']['usuario'], '0', 0, 1)) == 0) {
    header("Location: ../Erro/permissao.php");
}
?>

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
        
        <link href="../../util/styles.css" rel="stylesheet" type="text/css" />
        
        
        <title>PMA - Usuários</title>
    </head>

    <body>
            <div class="container">
              <div class="jumbotron row">
                <div>
                    <h2>Listagem de Usuários</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
                </div>
                <div class="header-user">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../util/user.png" width="30px" height="30px">
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#"><?php
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
                <div style="text-align: right;">
                    <p>
                        <?php
                        if((substr_compare($_SESSION['permissao']['usuario'], '1', 1,1)) == 0) {
                            echo '<a href="create_usuario.php" class="btn btn-outline-success">Adicionar</a>';
                        }
                        ?>
                    </p>
                </div>
                        <table style="width: 100%;" id="table" class="table table-striped" data-toggle="table" data-search="true" data-pagination="true"
                        data-locale="pt-BR">
                        <thead>
                            <tr>
                                <th scope="col" data-field="id" data-sortable="true">Id</th>
                                <th scope="col" data-field="usuario" data-sortable="true">Usuário</th>
                                <?php
                                if ((substr_compare($_SESSION['permissao']['usuario'], '1', 2, 1)) == 0) {
                                    echo '<th scope="col">Atualizar</th>';
                                }
                                if ((substr_compare($_SESSION['permissao']['usuario'], '1', 3, 1)) == 0) {
                                    echo '<th scope="col">Excluir</th>';
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once '../../controller/UsuarioControle.php';

                            $usuarioControle = new UsuarioControle();
                            $data = $usuarioControle->listUsuario();
                            foreach($data as $row)
                            {
                                echo '<tr>';
                                echo '<td>'. $row['id'] . '</td>';
                                echo '<td>'. $row['usuario'] . '</td>';
                                echo ' ';
                                if ((substr_compare($_SESSION['permissao']['usuario'], '1', 2, 1)) == 0) {
                                    echo '<td width="80"><a class="btn btn-outline-warning btn-sm" href="update_usuario.php?id='.$row['id'].'">Atualizar</a></td>';
                                }
                                echo ' ';
                                if ((substr_compare($_SESSION['permissao']['usuario'], '1', 3, 1)) == 0) {
                                    echo '<td width="80"><a class="btn btn-outline-danger btn-sm" href="delete_usuario.php?id='.$row['id'].'"> Excluir </a></td>';
                                }
                                echo ' ';
                                echo '</tr>';
                            }

                                echo '</tbody>';
                            echo '</table>';

                            
                            ?>
                        <a href="../Home/home.php" type="btn" class="btn btn-default">Menu Principal</a>
            </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table-locale-all.min.js"></script>




        
    </body>
</html>
