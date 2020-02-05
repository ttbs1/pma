<?php
if(!empty($_POST)) {
    include_once '../../domain/Projeto.php';
    include_once '../../controller/clientecontrole.php';
    include_once '../../controller/enderecocontrole.php';
    include_once '../../controller/ProjetoControle.php';
    include_once '../../controller/TipoProjetoControle.php';
    include_once '../../controller/TarefaControle.php';
    
    $projeto = new Projeto();
    
    $clienteControle = new ClienteControle();
    $cliente = $clienteControle->pesquisarCliente($_POST['nome']);
    $projeto->setCliente_id($cliente['id']);
    $tipoProjetoControle = new TipoProjetoControle();
    $tipoProjeto = $tipoProjetoControle->pesquisarTipoProjeto($_POST['tipoprojeto']);
    $projeto->setTipoprojeto_id($tipoProjeto['id']);
    $projeto->setData_entrada($_POST['data_entrada']);
    $projeto->setData_prevista($_POST['data_prevista']);
    $projeto->setDescricao($_POST['descricao']);
    $projeto->setValor($_POST['valor']);
    $projeto->setUsuario_id(1);
    
    $projetoControle = new ProjetoControle();
    $id = $projetoControle->inserirProjeto($projeto);
    
    $tarefaControle = new TarefaControle();
    $tarefas = $tarefaControle->list_tarefasTipoProjeto($tipoProjeto['id']);
    foreach ($tarefas as $row)
    {
        $tarefaControle->novaTarefa_Projeto($row, $id);
    }
    
    header("Location: list_projeto.php");
}
?>

<html>
    <head>
        <title>PMA - Cadastrar Projeto</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="../../util/SpryValidationTextField.js" type="text/javascript"></script> 
        <link href="../../util/SpryValid.css" rel="stylesheet" type="text/css" />
        <link href="../../util/sizes.css" rel="stylesheet" type="text/css" />
        <link href="../../util/styles.css" rel="stylesheet" type="text/css" />
        <link href="../../util/currencyStyle.css" rel="stylesheet" type="text/css" />
        
        <link type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        
        <script type="text/javascript" src="../../util/jquery.mask.js"></script>
    </head>
    <body>
    <div class="container">
        <div class="jumbotron row">
            <div>
                <h2>Cadastro de Projetos</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
            </div>
            <div class="header-user">
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../../util/user.png" width="30px" height="30px">
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#"><?php session_start(); 
                                                                if(isset($_SESSION['usuario'])) {
                                                                    echo 'Usuário: '. $_SESSION['usuario'];
                                                                } else {
                                                                    header("Location: ../login/login.php");
                                                                } ?></a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="../Home/logout.php">Sair</a>
                    </div>
                </div>
            </div>
          </div>
        
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Projeto </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="create_projeto.php" method="post">

                <fieldset>
                <legend>Novo Projeto</legend>
                
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
        
                    <div class="form-group col-md-6">
                        <label for="nome">Selecionar Cliente: </label><br>
                            <span id="nome1" class="textfieldHintState">
                                <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome" value="" />
                                <span class="textfieldMaxCharsMsg">Esse campo tem limite de 150 caracteres.</span>
                                   <span class="textfieldRequiredMsg">Esse campo é obrigatório</span>
                            </span>
                    </div>
                    <script>
                        var nome1 = new Spry.Widget.ValidationTextField("nome1", "custom", {validateOn:["blur"], maxChars: 150});
                    </script>
                    
                    <div class="form-group col-md-4">
                        <label for="tipoprojeto">Modelos de projeto: </label><br>
                        <select class="form-control" name="tipoprojeto" id="tipoprojeto">
                            <option></option>
                            <?php
                                include_once '../../controller/TipoProjetoControle.php';

                                $tipoProjetoControle = new TipoProjetoControle();
                                $data = $tipoProjetoControle->listTipoProjeto();
                                foreach($data as $row) 
                                {
                                    echo '<option>'.$row['descricao'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="data_entrada">Data de entrada: </label>
                        <input class="form-control" type="date" name="data_entrada" id="data_entrada" value="<?php echo date('Y-m-d') ?>">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="data_prevista">Estimativa de Conclusão: </label>
                        <input class="form-control" type="date" name="data_prevista" id="data_prevista" value="<?php echo date('Y-m-d') ?>">
                    </div>
                    
                    <div class="form-group col-md-8">
                        <label for="descricao">Descrição: </label>
                        <textarea maxlength="450" class="form-control" rows="3" name="descricao" id="descricao"></textarea>
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="valor">Valor Estipulado: </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">R$</span>
                            </div>
                            <input name="valor" id="valor" class="valor" type="text">
                        </div>
                    </div>
                    
                
                </fieldset>
                
                <div class="form-actions">
                    <br/>

                    <button type="submit" class="btn btn-success">Adicionar</button>
                    <a href="../Home/home.php" type="btn" class="btn btn-default">Menu Principal</a>
                    <a href="list_projeto.php" type="btn" class="btn btn-default">Voltar</a>

                </div>
            </form>
          </div>
        </div>
        </div>
    </div>
        
        
        
        
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('.valor').mask('000.000.000.000.000,00', {reverse: true});
                        });
                    </script>
        

  </body>
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
