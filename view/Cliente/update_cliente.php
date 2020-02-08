<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
session_start(); 
if((substr_compare($_SESSION['permissao']['cliente'], '0', 2, 1)) == 0) {
    header("Location: ../Erro/permissao.php");
}
?>

<html>
    <head>
        <title>PMA - Atualizar Cliente</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <script src="../../util/SpryValidationTextField.js" type="text/javascript"></script> 
        <link href="../../util/SpryValid.css" rel="stylesheet" type="text/css" />
        <link href="../../util/sizes.css" rel="stylesheet" type="text/css" />
        <link href="../../util/styles.css" rel="stylesheet" type="text/css" />
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        
            include '../../domain/cliente.php';
            include '../../domain/endereco.php';
            include '../../controller/clientecontrole.php';
            include '../../controller/enderecocontrole.php';
            
            
	$id = null;
	if ( !empty($_GET['id']))
            {
		$id = $_REQUEST['id'];
            }
        if ( null==$id )
            {
		header("Location: list_cliente.php");
            }
	if (!empty($_POST)) {
            $cliente = new Cliente();
            $id = ($_POST['id']);
            $cliente->setNome($_POST['nome']);
            $cliente->setCpf_cnpj($_POST['cpf_cnpj']);
            $cliente->setTelefone1($_POST['telefone1']);
            $cliente->setTelefone2($_POST['telefone2']);
            $cliente->setEmail($_POST['email']);
            if ($cliente->getEmail()=="")
                    $cliente->setEmail(NULL);
            
            $clienteControle = new ClienteControle();
            $clienteControle->updateCliente($cliente, $id);
            
	} else {
            $clienteControle = new ClienteControle();
            $data = $clienteControle->readCliente($id);
	}
	
    ?>
        <div class="container">
            <div class="jumbotron row">
                <div>
                    <h2>Atualização de Clientes</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
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
            <form class="form-horizontal" action="update_cliente.php" method="post">
            <fieldset>
                    <legend>Atualizar Cliente</legend>

                    <input type="hidden" name="id" id="id" placeholder="id" value="<?php echo $id ?>" /><br>

                    <div class="form-group col-md-8">
                        <label for="nome">Nome: </label>
                            <span id="nome1" class="textfieldHintState">
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?php echo $data['nome']?>" />
                                <span class="textfieldMaxCharsMsg">Esse campo tem limite de 150 caracteres.</span>
                                   <span class="textfieldRequiredMsg">Esse campo é obrigatório</span>
                            </span>
                    </div>

                    <script>
                        var nome1 = new Spry.Widget.ValidationTextField("nome1", "custom", {validateOn:["blur"], maxChars: 150});
                    </script>

                    <div class="form-group col-md-3">
                        <input type="radio" name="document" value="CPF" id="cpf" onclick="changeDocType()" <?php if(strlen($data['cpf_cnpj'])==14){echo 'checked';} ?>> CPF 
                        <input type="radio" name="document" value="CNPJ" id="cnpj" onclick="changeDocType()" <?php if(strlen($data['cpf_cnpj'])>14){echo 'checked';} ?>> CNPJ <br>
                        <div id="documentfield"></div>
                    </div>
                    
                    <script type="text/javascript">
                        if (<?php echo strlen($data['cpf_cnpj']) ?> >= 14){
                            changeDocType();
                            document.getElementById("cpf_cnpj_field").value= "<?php echo $data['cpf_cnpj'] ?>";
                        }

                        function changeDocType() {
                            var cpf = document.getElementById("cpf").checked;
                            var cnpj = document.getElementById("cnpj").checked;

                            document.getElementById("documentfield").innerHTML = '<label>CPF/CNPJ</label>'
                        + '<span id="cpf_cnpj" class="textfieldHintState">'
                        +    '<input class="form-control" size="20" name="cpf_cnpj" id="cpf_cnpj_field" type="text" placeholder="" >'
                        +    '<span class="textfieldInvalidFormatMsg">Formato inválido de entrada</span>'
                        +'</span>';

                            if (cpf) {
                                document.getElementById("cpf_cnpj_field").placeholder = "000.000.000-00";
                                var cpf_cnpj = new Spry.Widget.ValidationTextField("cpf_cnpj", "custom", {format:"custom", pattern: "000.000.000-00", validateOn:["blur"], useCharacterMasking: true, isRequired:false});
                            } if (cnpj) {
                                document.getElementById("cpf_cnpj_field").placeholder = "00.000.000/0000-00";
                                var cpf_cnpj = new Spry.Widget.ValidationTextField("cpf_cnpj", "custom", {format:"custom", pattern: "00.000.000/0000-00", validateOn:["blur"], useCharacterMasking: true, isRequired:false});
                            }
                        }
                    </script>

                    <div class="form-group col-md-2">
                        <label for="telefone">Telefone 01: </label>
                        <select id=tipo1 onchange="changeTelType(1)">
                            <option> </option>
                            <option>Celular</option>
                            <option>Fixo</option>
                        </select>
                        <div id="tel1field"></div>    
                    </div>

                    <div class="form-group col-md-2">
                        <label for="telefone">Telefone 02: </label>
                        <select id=tipo2 onchange="changeTelType(2)">
                            <option> </option>
                            <option>Celular</option>
                            <option>Fixo</option>
                        </select>
                        <div id="tel2field"></div>  
                    </div>

                    <script type="text/javascript">

                        if (<?php echo strlen($data['telefone1']) ?> >= 13) {
                            if (<?php echo strlen($data['telefone1']) ?> > 13)
                                document.getElementById("tipo1").value = "Celular";
                            else
                                document.getElementById("tipo1").value = "Fixo";
                            changeTelType(1);
                            document.getElementById("telefone1").value = "<?php echo $data['telefone1'] ?>";
                        }
                        if (<?php echo strlen($data['telefone2']) ?> >= 13) {
                            if (<?php echo strlen($data['telefone2']) ?> > 13)
                                document.getElementById("tipo2").value = "Celular";
                            else
                                document.getElementById("tipo2").value = "Fixo";
                            changeTelType(2);
                            document.getElementById("telefone2").value = "<?php echo $data['telefone2'] ?>";
                        }

                        function changeTelType(i) {

                            var tipo = document.getElementById("tipo"+i).value;

                            document.getElementById("tel"+i+"field").innerHTML = '<span id="telefone1'+i+'" class="textfieldHintState">'
                            +       '<input class="form-control" type="text" name="telefone'+i+'" id="telefone'+i+'" />'
                            +       '<span class="textfieldInvalidFormatMsg">Formato inválido de entrada</span>'
                            +'</span>';

                            if(tipo == 'Celular'){
                                document.getElementById("telefone"+i+"").placeholder = "(00)00000-0000";
                                var telefone = new Spry.Widget.ValidationTextField("telefone1"+i, "custom", {format:"custom", pattern: "(00)90000-0000", validateOn:["blur"], useCharacterMasking: true, isRequired:false});
                            }else if(tipo == 'Fixo') {
                                document.getElementById("telefone"+i+"").placeholder = "(00)0000-0000";
                                var telefone = new Spry.Widget.ValidationTextField("telefone1"+i, "custom", {format:"custom", pattern: "(00)0000-0000", validateOn:["blur"], useCharacterMasking: true, isRequired:false});
                            } else document.getElementById("tel"+i+"field").innerHTML = "";
                        }
                    </script>

                    <div class="form-group col-md-6">
                        <label for="email">E-Mail: </label>
                            <span id="email1" class="textfieldHintState">
                                <input type="text" class="form-control" name="email" id="email" placeholder="exemplo@meudominio.com" value="<?php echo $data['email']?>" />
                            </span>
                    </div>

                    <script>
                        var email1 = new Spry.Widget.ValidationTextField("email1", "email", {validateOn:["blur"], maxChars: 85, isRequired: false});
                    </script>


                    </fieldset>



                    <div class="control-group">
                            <label class="control-label">Endereço(s):</label>
                            <div class="controls">
                                <label class="carousel-inner">
                        <?php

                            echo '<table class="table table-striped">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            echo '<th scope="col"></th>';
                                            echo '<th scope="col">Rua</th>';
                                            echo '<th scope="col">Número</th>';
                                            echo '<th scope="col">Bairro</th>';
                                            echo '<th scope="col">Cidade</th>';
                                            echo '<th scope="col">Estado</th>';
                                            echo '<th scope="col">CEP</th>';
                                            echo '<th scope="col"></th>';
                                        echo '</tr>';
                                    echo '</thead>';

                                    include_once '../../controller/enderecocontrole.php';
                            $enderecoControle = new EnderecoControle();
                            $data_fk = $enderecoControle->list_enderecosCliente($data['id']);
                            if ($data_fk != NULL) {
                                foreach($data_fk as $row) if($row['ativo']) {
                                //echo $row['rua'];


                                    echo '<tbody>';
                                        echo '<tr>';
                                                          echo '<th scope="row">'. $row['id'] . '</th>';
                                        echo '<td>'. $row['rua'] . '</td>';
                                        echo '<td>'. $row['numero'] . '</td>';
                                        echo '<td>'. $row['bairro'] . '</td>';
                                        echo '<td>'. $row['cidade'] . '</td>';
                                        echo '<td>'. $row['estado'] . '</td>';
                                        echo '<td>'. $row['CEP'] . '</td>';
                                        echo '<td width=250>';
                                        echo '<a class="btn btn-warning" href="../Endereco/update_endereco.php?id='.$row['id'].'&cliente='.$data['id'].'">Atualizar</a>';
                                        echo ' ';
                                        echo '<a class="btn btn-danger" href="../Endereco/delete_endereco.php?id='.$row['id'].'&cliente='.$data['id'].'">Excluir</a>';
                                        echo '</td>';
                                        echo '</tr>';        
                                    echo '</tbody>';

                                }
                            }


                                echo '</table>';

                        ?>
                                </label>

                        <div class="form-actions" align="right">
                            <?php echo '<a class="btn btn-default" href="../Endereco/create_endereco.php?cliente='.$data['id'].'">Adicionar Endereço</a>' ?>
                        </div>

                        <br/>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Atualizar</button>
                            <a href="list_cliente.php" type="btn" class="btn btn-default">Voltar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
