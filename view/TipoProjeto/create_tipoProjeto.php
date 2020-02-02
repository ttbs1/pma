<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if(!empty($_POST)) {
    include_once '../../domain/tipoProjeto.php';
    include_once '../../controller/TipoProjetoControle.php';
    $tipoProjeto = new TipoProjeto();
    $tipoProjeto->setDescricao($_POST['descricao']);
    
    
    $tipoProjetoControle = new TipoProjetoControle();
    $tipoProjetoControle->inserirTipoProjeto($tipoProjeto);
    
    header("Location: list_tipoProjeto.php");
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>PMA - Cadastrar Modelo</title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="../../util/SpryValidationTextField.js" type="text/javascript"></script> 
        <link href="../../util/SpryValid.css" rel="stylesheet" type="text/css" />
        <link href="../../util/sizes.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                    <h2>Cadastro de Modelos</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
            </div>
            
            <div clas="span10 offset1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="well"> Adicionar Modelo de Projeto </h3>
                    </div>
                    <div class="card-body">
                    <form class="form-horizontal" action="create_tipoProjeto.php" method="post">

                        <table>
                            <tr>
                                <td>
                                    <fieldset>
                                        <legend>Descrição</legend>
                                        <label for="descricao">Descrição: </label><br>
                                                    <span id="descricao1" class="textfieldHintState">
                                                        <input style="width: 380px;" type="text" class="iDescricao" name="descricao" id="descricao" placeholder="Descrição" value="" /><br>
                                                        <span class="textfieldMaxCharsMsg">Esse campo tem limite de 85 caracteres.</span>
                                                        <span class="textfieldRequiredMsg">Esse campo é obrigatório</span><br>
                                                    </span>
                                        <script>
                                            var user = new Spry.Widget.ValidationTextField("descricao", "custom", {validateOn:["blur"], maxChars: 85});
                                        </script>
                                    </fieldset>
                                </td>
                            </tr>
                        </table>
                        <div class="form-actions">
                            <br/>

                            <button type="submit" class="btn btn-success">Adicionar</button>
                            <a href="../home/home.php" type="btn" class="btn btn-default">Menu Principal</a>
                            <a href="list_tipoProjeto.php" type="btn" class="btn btn-default">Voltar</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>