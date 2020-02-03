<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>PMA - Atualizar Empresa</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <script src="../../util/SpryValidationTextField.js" type="text/javascript"></script> 
        <link href="../../util/SpryValid.css" rel="stylesheet" type="text/css" />
        <link href="../../util/sizes.css" rel="stylesheet" type="text/css" />
        <link href="../../util/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        
            include '../../domain/Empresa.php';
            include '../../controller/EmpresaControle.php';
            include '../../controller/enderecocontrole.php';
            
            
	$id = null;
	if ( !empty($_GET['id']))
            {
		$id = $_REQUEST['id'];
            }
        if ( null==$id )
            {
		header("Location: list_empresa.php");
            }
	if (!empty($_POST)) {
            $empresa = new Empresa();
            $id = ($_POST['id']);
            $empresa->setNome($_POST['nome']);
            $empresa->setCnpj($_POST['cnpj']);
            $empresa->setTelefone($_POST['telefone']);
            
            $empresaControle = new EmpresaControle();
            $empresaControle->updateEmpresa($empresa, $id);
            
	} else {
            $empresaControle = new EmpresaControle();
            $data = $empresaControle->readEmpresa($id);
	}
	
    ?>
        <div class="container">
            <div class="jumbotron row">
                <div>
                    <h2>Atualização de Empresas</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
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
                            <a class="dropdown-item" href="../home/logout.php">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
            <form class="form-horizontal" action="update_empresa.php" method="post">
            <fieldset>
                    <legend>Atualizar Empresa</legend>

                    <input type="hidden" name="id" id="id" placeholder="id" value="<?php echo $id ?>" /><br>

                    <div class="form-group col-md-6">
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
                        <label for="cnpj">CNPJ: </label>
                        <span id="cnpj1" class="textfieldHintState">
                            <input class="form-control" name="cnpj" id="cnpj" type="text" placeholder="00.000.000/0000-00" value="<?php echo $data ['cnpj']?>">
                            <span class="textfieldInvalidFormatMsg">Formato inválido de entrada</span>
                        </span>
                    </div>
                    
                    <script>
                        var cnpj1 = new Spry.Widget.ValidationTextField("cnpj1", "custom", {format:"custom", pattern: "00.000.000/0000-00", validateOn:["blur"], useCharacterMasking: true, isRequired:false});
                    </script>

                    <div class="form-group col-md-2">
                        <label for="telefone">Telefone: </label>
                        <select id=tipo1 onchange="changeTelType(1)">
                            <option> </option>
                            <option>Celular</option>
                            <option>Fixo</option>
                        </select>
                        <div id="tel1field"></div>
                    </div>

                    <script type="text/javascript">

                        if (<?php echo strlen($data['telefone']) ?> >= 13) {
                            if (<?php echo strlen($data['telefone']) ?> > 13)
                                document.getElementById("tipo1").value = "Celular";
                            else
                                document.getElementById("tipo1").value = "Fixo";
                            changeTelType(1);
                            document.getElementById("telefone1").value = "<?php echo $data['telefone'] ?>";
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
                            $data_fk = $enderecoControle->list_enderecosEmpresa($data['id']);
                            if ($data_fk != NULL) {
                                foreach($data_fk as $row) {
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
                                        echo '<a class="btn btn-warning" href="../Endereco/update_endereco.php?id='.$row['id'].'&empresa='.$data['id'].'">Atualizar</a>';
                                        echo ' ';
                                        echo '<a class="btn btn-danger" href="../Endereco/delete_endereco.php?id='.$row['id'].'&empresa='.$data['id'].'">Excluir</a>';
                                        echo '</td>';
                                        echo '</tr>';        
                                    echo '</tbody>';

                                }
                            }


                                echo '</table>';

                        ?>
                                </label>

                                
                        <div class="form-actions" align="right">
                            <?php echo '<a class="btn btn-default" href="../Endereco/create_endereco.php?empresa='.$data['id'].'">Adicionar Endereço</a>' ?>
                        </div>

                        <br/>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Atualizar</button>
                            <a href="list_empresa.php" type="btn" class="btn btn-default">Voltar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
