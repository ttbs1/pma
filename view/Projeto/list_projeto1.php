<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

    <?php
    function corAleatoria() {
        static $corAnterior = 0;
        static $cor = array( '#CFF', '#9FF', '#600', '#FF0', '#C69', '#0F0' );

        $aleatorio = rand( $corAnterior?1:0, count( $cor ) - 1 );
        if( $aleatorio >= $corAnterior ) $aleatorio++;
        $corAnterior = $aleatorio;
        return $cor[$aleatorio - 1];
    }
    ?>

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>PMA - Projetos</title>
        <link href="../../util/projectTable.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                  <h2>Listagem de Projetos</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
            </div>
            <table>
                <tbody>
        <?php
        
        include_once '../../controller/ProjetoControle.php';
        include_once '../../controller/ClienteControle.php';
        
        $projetoControle = new ProjetoControle();
        $clienteControle = new ClienteControle();
        $data = $projetoControle->findProjeto();
        echo '<tr>';
        
        foreach ($data as $row)
        {
            $cli = $clienteControle->readCliente($row['cliente_id']);
            echo '<td id="postit" style="border-top-left-radius: 0px;">'.$cli['nome'].'</td>';
        }
        echo '</tr>';
        echo '<tr >';
        foreach ($data as $row)
        {
            echo '<td id="postit">'.$row['data_entrada'].'</td>';
        }
        echo '</tr>';
        
        ?>
                    
                </tbody>
            </table>
        </div>
    </body>
</html>