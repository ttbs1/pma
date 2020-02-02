<?php
if(!empty($_POST)) {
    $nome = $_REQUEST['nome'];
    include '../../controller/clientecontrole.php';
    $clienteControle = new ClienteControle();
    $data = $clienteControle->pesquisarPorNome($nome);
    header("Location: detail_cliente.php?id=".$data['id']);
}
?>
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
        <title>PMA - Pesquisar Cliente</title>
        <script src="../../util/SpryValidationTextField.js" type="text/javascript"></script> 
        <link href="../../util/SpryValid.css" rel="stylesheet" type="text/css" />
        <link href="../../util/sizes.css" rel="stylesheet" type="text/css" />
        <link type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    </head>
    <body>
        <script type="text/javascript">
            $(document).ready(function() {

                // Captura o retorno do retornaCliente.php
                $.getJSON('retornaCliente.php', function(data){
                    var dados = [];

                    // Armazena na array capturando somente o nome do cliente
                    $(data).each(function(key, value) {
                        dados.push(value.nome);
                    });

                    // Chamo o Auto complete do JQuery ui setando o id do input, array com os dados e o mínimo de caracteres para disparar o AutoComplete
                    $('#nome').autocomplete({ source: dados, minLength: 1});
                });
            });
        </script>
        
        <div class="container">
            <div class="jumbotron">
                    <h2>Pesquisa de Clientes</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="read_cliente.php?" method="post">
                    <fieldset>
                    <legend>Pesquisar cliente por nome</legend>
                    <label for="nome">Nome: </label>
                            <span id="nome1" class="textfieldHintState">
                                <input type="text" class="iNome" name="nome" id="nome" placeholder="Nome" value="" /><br>
                                <span class="textfieldMaxCharsMsg">Esse campo tem limite de 150 caracteres.</span>
                                   <span class="textfieldRequiredMsg">Esse campo é obrigatório</span>
                            </span>

                    <script>
                        var nome1 = new Spry.Widget.ValidationTextField("nome1", "custom", {validateOn:["blur"], maxChars: 150});
                    </script>

                    </fieldset>

                    <button type="submit" class="btn btn-success">Pesquisar</button>
                    <a href="list_cliente.php" type="btn" class="btn btn-default">Voltar</a>
                    <a href="../../index.php" type="btn" class="btn btn-default">Menu Principal</a>
                </form>
            </div>
        </div>
        
    </body>
</html>
