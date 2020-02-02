

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>PMA - Projetos</title>
        <link href="../../util/dashboard.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                  <h2>Listagem de Projetos</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
            </div>
                    <div class="container">
                        <div id="columns-full" class="columns clearfix">
                            <div class="row" style="padding : 15px;">
        <?php
        
        include_once '../../controller/ProjetoControle.php';
        include_once '../../controller/ClienteControle.php';
        
        $projetoControle = new ProjetoControle();
        $clienteControle = new ClienteControle();
        $data = $projetoControle->listProjeto();
        
        
        foreach ($data as $row)
        {
            $cli = $clienteControle->readCliente($row['cliente_id']);
            echo '
                    <div class="col-md-3" style="float:right;">
                      <!-- Card -->
                      <div id="draggable-handle" class="card">

                        <!-- Card image -->
                        <img class="card-img-top" style="opacity : 0.75" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">

                        <!-- Card content -->
                        <div class="card-body">

                        <!-- Title -->
                        <h4 class="card-title"><a>'.$cli['nome'].'</a></h4>
                        <!-- Text -->
                        <p class="card-text" style="text-align: right">'.$row['data_prevista'].'</p>
                        <!-- Button -->
                        <p style="text-align: right"><a href="detail_projeto.php?id='.$row['id'].'" class="btn btn-primary">Detalhar</a></p>

                      </div>

                      </div>
                      <!-- Card -->
                  </div>
                  ';
        }
        
        ?>
                            </div>
                        </div>
                    </div>
            
            
        </div>
    </body>
</html>