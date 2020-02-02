<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>PMA - Clientes</title>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
</head>

<body>
        <div class="container">
          <div class="jumbotron">
                <h2>Listagem de Clientes</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
          </div>
            </br>
            <div class="row">
                <p>
                    <a href="create_cliente.php" class="btn btn-outline-success">Adicionar</a>
                    <a href="read_cliente.php" class="btn btn-outline-primary">Pesquisar</a>
                </p>
            </div>
                <table id="table" class="table table-striped" data-toggle="table" data-search="true" data-pagination="true"
                        data-locale="pt-BR">
                    <thead>
                        <tr>
                            <th scope="col" data-field="id" data-sortable="true">Id</th>
                            <th scope="col" data-field="nome" data-sortable="true">Nome</th>
                            <th scope="col" data-field="cpf_cnpj" data-sortable="true" width="135">CPF/CNPJ</th>
                            <th scope="col" data-field="telefone1" data-sortable="true" width="135">Telefone 01</th>
                            <th scope="col" data-field="telefone2" data-sortable="true" width="135">Telefone 02</th>
                            <th scope="col" data-field="email" data-sortable="true">Email</th>
                            <th scope="col">Detalhar</th>
                            <th scope="col">Atualizar</th>
                            <th scope="col">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once '../../controller/ClienteControle.php';
                        
                        $clienteControle = new ClienteControle();
                        $data = $clienteControle->listCliente();
                        foreach($data as $row) 
                        {
                            echo '<tr>';
			                      echo '<th scope="row">'. $row['id'] . '</th>';
                            echo '<td>'. $row['nome'] . '</td>';
                            echo '<td>'. $row['cpf_cnpj'] . '</td>';
                            echo '<td>'. $row['telefone1'] . '</td>';
                            echo '<td>'. $row['telefone2'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo ' ';
                            echo '<td width="80"><a class="btn btn-outline-secondary btn-sm" href="detail_cliente.php?id='.$row['id'].'">Detalhar</a></td>';
                            echo ' ';
                            echo '<td width="80"><a class="btn btn-outline-warning btn-sm" href="update_cliente.php?id='.$row['id'].'">Atualizar</a></td>';
                            echo ' ';
                            echo '<td width="80"><a class="btn btn-outline-danger btn-sm" href="delete_cliente.php?id='.$row['id'].'">Excluir</a></td>';
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
    

    
</body>

</html>