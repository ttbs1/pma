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
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
        
        <title>PMA - Modelos</title>
    </head>

    <body>
            <div class="container">
              <div class="jumbotron">
                    <h2>Listagem de Modelos</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
              </div>
                </br>
                <div style="text-align: right;">
                    <p>
                        <a href="create_tipoProjeto.php" class="btn btn-outline-success">Adicionar</a>
                    </p>
                </div>
                        <table style="width: 100%;" id="table" class="table table-striped" data-toggle="table" data-search="true" data-pagination="true"
                        data-locale="pt-BR">
                        <thead>
                            <tr>
                                <th scope="col" data-field="id" data-sortable="true">Id</th>
                                <th scope="col" data-field="descricao" data-sortable="true">Descrição</th>
                                <th scope="col">Detalhar</th>
                                <th scope="col">Atualizar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once '../../controller/TipoProjetoControle.php';

                            $tipoProjetoControle = new TipoProjetoControle();
                            $data = $tipoProjetoControle->listTipoProjeto();
                            foreach($data as $row) 
                            {
                                echo '<tr>';
                                echo '<td>'. $row['id'] . '</td>';
                                echo '<td>'. $row['descricao'] . '</td>';
                                echo ' ';
                                echo '<td width="80"><a class="btn btn-outline-secondary btn-sm" href="detail_tipoProjeto.php?id='.$row['id'].'">Detalhar </a></td>';
                                echo ' ';
                                echo '<td width="80"><a class="btn btn-outline-warning btn-sm" href="update_tipoProjeto.php?id='.$row['id'].'">Atualizar</a></td>';
                                echo ' ';
                                echo '<td width="80"><a class="btn btn-outline-danger btn-sm" href="delete_tipoProjeto.php?id='.$row['id'].'"> Excluir </a></td>';
                                echo ' ';
                                echo '</tr>';
                            }

                                echo '</tbody>';
                            echo '</table>';

                            
                            ?>
                        <a href="../../index.php" type="btn" class="btn btn-default">Menu Principal</a>
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



<!--
<div id="toolbar">
  <button id="remove" class="btn btn-danger" disabled>
    <i class="glyphicon glyphicon-remove"></i> Delete
  </button>
</div>
<table
  data-toolbar="#toolbar"
  data-search="true"
  data-show-refresh="true"
  data-show-toggle="true"
  data-show-fullscreen="true"
  data-show-columns="true"
  data-show-columns-toggle-all="true"
  data-detail-view="true"
  data-show-export="true"
  data-click-to-select="true"
  data-detail-formatter="detailFormatter"
  data-minimum-count-columns="2"
  data-show-pagination-switch="true"
  data-pagination="true"
  data-id-field="id"
  data-page-list="[10, 25, 50, 100, all]"
  data-show-footer="true"
  data-side-pagination="server"
  data-url="https://examples.wenzhixin.net.cn/examples/bootstrap_table/data"
  data-response-handler="responseHandler">
</table>
-->
        
    </body>
</html>
