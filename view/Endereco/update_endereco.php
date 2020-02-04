<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>PMA - Cadastrar Endereço</title>
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
                
            include_once '../../domain/Endereco.php';
            include_once '../../controller/EnderecoControle.php';
            
            $id = null;
            if(!empty($_GET['id'])) 
            {
                $id = $_REQUEST['id'];
            }
            if(!empty($_GET['cliente'])) 
            {
                $cliente_id = $_REQUEST['cliente'];
                $tipo = "cliente";
            }
            if(!empty($_GET['empresa'])) 
            {
                $empresa_id = $_REQUEST['empresa'];
                $tipo = "empresa";
            }
            if(!empty($_POST))
            {
                $endereco = new Endereco();
                
                $endereco->setCEP($_POST['cep']);
                $endereco->setRua($_POST['rua']);
                $endereco->setNumero($_POST['numero']);
                $endereco->setBairro($_POST['bairro']);
                $endereco->setCidade($_POST['cidade']);
                $endereco->setEstado($_POST['uf']);
                $id = $_POST['id'];
                $tipo = $_POST['tipo'];
                
                $enderecoControle = new EnderecoControle();
                $enderecoControle->updateEndereco($id, $endereco);
                
                if ($tipo == "cliente") {
                    $cliente_id = $_POST['cliente'];
                    header("Location: ../Cliente/detail_cliente.php?id=".$cliente_id);
                } else if ($tipo == "empresa") {
                    $empresa_id = $_POST['empresa'];
                    header("Location: ../Empresa/detail_empresa.php?id=".$empresa_id);
                }
            } else {
                $enderecoControle = new EnderecoControle();
                $data = $enderecoControle->readEndereco($id);
            }
            

        ?>
        
        <div class="container">
            
            <div class="jumbotron row">
                <div>
                    <h2>Cadastro de Endereços</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
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
    
            <form class="form-horizontal" action="update_endereco.php" method="post">



                <!-- Adicionando JQuery -->
                <script src="https://code.jquery.com/jquery-3.4.1.min.js"
                        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                        crossorigin="anonymous"></script>

                <!-- Adicionando Javascript -->
                <script type="text/javascript" >

                    $(document).ready(function() {

                        function limpa_formulário_cep() {
                            // Limpa valores do formulário de cep.
                            $("#rua").val("");
                            $("#bairro").val("");
                            $("#cidade").val("");
                            $("#uf").val("");
                            $("#rua").removeAttr("readonly");
                            $("#bairro").removeAttr("readonly");
                            $("#cidade").removeAttr("readonly");
                            $("#uf").removeAttr("readonly");
                            $("#rua").focus();
                            $("#rua").blur();
                            $("#cidade").focus();
                            $("#cidade").blur();
                            $("#uf").focus();
                            $("#uf").blur();
                        }

                        //Quando o campo cep perde o foco.

                        $("#cep").blur(function() {

                            //Nova variável "cep" somente com dígitos.
                            var cep = $(this).val().replace(/\D/g, '');

                            //Verifica se campo cep possui valor informado.
                            if (cep != "") {

                                //Expressão regular para validar o CEP.
                                var validacep = /^[0-9]{8}$/;

                                //Valida o formato do CEP.
                                if(validacep.test(cep)) {

                                    //Preenche os campos com "..." enquanto consulta webservice.
                                    $("#rua").val("...");
                                    $("#bairro").val("...");
                                    $("#cidade").val("...");
                                    $("#uf").val("...");

                                    //Consulta o webservice viacep.com.br/
                                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                                        if (!("erro" in dados)) {
                                            //Atualiza os campos com os valores da consulta.
                                            $("#rua").val(dados.logradouro);
                                            $("#bairro").val(dados.bairro);
                                            $("#cidade").val(dados.localidade);
                                            $("#uf").val(dados.uf);

                                            //Campos encontrados deixam de ser editáveis
                                            if(dados.logradouro.toString()=="")
                                                 $("#rua").removeAttr("readonly");
                                            else {
                                                $("#rua").focus();
                                                $("#rua").blur();
                                                $("#rua").attr("readonly", "true");
                                            }
                                            if(dados.bairro.toString()=="")
                                                 $("#bairro").removeAttr("readonly");
                                            else {
                                                $("#bairro").focus();
                                                $("#bairro").blur();
                                                $("#bairro").attr("readonly", "true");
                                            }
                                            if(dados.localidade.toString()=="")
                                                 $("#cidade").removeAttr("readonly");
                                            else {
                                                $("#cidade").focus();
                                                $("#cidade").blur();
                                                $("#cidade").attr("readonly", "true");
                                            }
                                            if(dados.uf.toString()=="")
                                                 $("#uf").removeAttr("readonly");
                                            else {
                                                $("#uf").focus();
                                                $("#uf").blur();
                                                $("#uf").attr("readonly", "true");
                                            }
                                        } //end if.
                                        else {
                                            //CEP pesquisado não foi encontrado.
                                            limpa_formulário_cep();
                                            alert("CEP não encontrado.");
                                        }
                                    });
                                } //end if.
                                else {
                                    //cep é inválido.
                                    limpa_formulário_cep();
                                    alert("Formato de CEP inválido.");
                                }
                            } //end if.
                            else {
                                //cep sem valor, limpa formulário.
                                limpa_formulário_cep();
                            }
                        });
                    });

                </script>
                <fieldset>
                <legend>Endereço</legend>
                <div id="endereco">
                    
                    <input type="hidden" name="cliente" id="cliente" value="<?php echo $cliente_id ?>" />
                    <input type="hidden" name="empresa" id="empresa" value="<?php echo $empresa_id ?>" />
                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                    <input type="hidden" name="tipo" value="<?php echo $tipo;?>" />
                    
                <label for="cep">CEP: </label>
                    <span id="cep1" class="textfieldHintState">
                        <input type="text" class="iCEP" name="cep" id="cep" placeholder="CEP" value="<?php echo $data['CEP'] ?>" />
                        <span class="textfieldMaxCharsMsg">Esse campo tem limite de 9 caracteres.</span>
                    </span>
                <label for="rua">Rua: </label>
                    <span id="rua1" class="textfieldHintState">
                        <input type="text" class="iRua" name="rua" id="rua" placeholder="Rua" value="<?php echo $data['rua'] ?>" />
                        <span class="textfieldMaxCharsMsg">Esse campo tem limite de 85 caracteres.</span>
                        <span class="textfieldRequiredMsg">Esse campo é obrigatório</span><br>
                    </span>

                <label for="numero">Numero: </label>
                    <span id="numero1" class="textfieldHintState">
                        <input type="text" class="iNumero" name="numero" id="numero" placeholder="Numero" value="<?php echo $data['numero'] ?>" />
                        <span class="textfieldMaxCharsMsg">Esse campo tem limite de 7 caracteres.</span>
                    </span>

                <label for="bairro">Bairro: </label>
                    <span id="bairro1" class="textfieldHintState">
                        <input type="text" class="iBairro" name="bairro" id="bairro" placeholder="Bairro" value="<?php echo $data['bairro'] ?>" />
                        <span class="textfieldMaxCharsMsg">Esse campo tem limite de 40 caracteres.</span>
                    </span>

                <label for="cidade">Cidade: </label>
                    <span id="cidade1" class="textfieldHintState">
                        <input type="text" class="iCidade" name="cidade" id="cidade" placeholder="Cidade" value="<?php echo $data['cidade'] ?>" />
                        <span class="textfieldMaxCharsMsg">Esse campo tem limite de 40 caracteres.</span>
                        <span class="textfieldRequiredMsg">Esse campo é obrigatório</span><br>
                    </span>

                <label for="uf">Estado: </label>
                    <span id="uf1" class="textfieldHintState">
                        <input type="text" class="iEstado" name="uf" id="uf" placeholder="UF" value="<?php echo $data['estado'] ?>" />
                        <span class="textfieldMaxCharsMsg">Esse campo tem limite de 2 caracteres.</span>
                        <span class="textfieldRequiredMsg">Esse campo é obrigatório</span><br>
                    </span>
                <script>
                    var cep1 = new Spry.Widget.ValidationTextField("cep1", "custom", {format:"custom", pattern: "00000-000", validateOn:["blur"], useCharacterMasking: true, isRequired: false});
                    var rua1 = new Spry.Widget.ValidationTextField("rua1", "custom", {validateOn:["blur"], maxChars: 85});
                    var numero1 = new Spry.Widget.ValidationTextField("numero1", "custom", {validateOn:["blur"], maxChars: 7, isRequired: false});
                    var bairro1 = new Spry.Widget.ValidationTextField("bairro1", "custom", {validateOn:["blur"], maxChars: 40, isRequired: false});
                    var cidade1 = new Spry.Widget.ValidationTextField("cidade1", "custom", {validateOn:["blur"], maxChars: 40});
                    var uf1 = new Spry.Widget.ValidationTextField("uf1", "custom", {format:"custom", pattern: "AA", validateOn:["blur"], useCharacterMasking: true});
                </script>
                </div>
                </fieldset>




                <div class="form-actions">

                    <button type="submit" class="btn btn-success">Atualizar</button>
                    <?php 
                        if($tipo=="cliente") {
                            echo '<a href="../Cliente/detail_cliente.php?id='.$cliente_id.'" type="btn" class="btn btn-default">Não</a>';
                        } else if ($tipo=="empresa") {
                            echo '<a href="../Empresa/detail_empresa.php?id='.$empresa_id.'" type="btn" class="btn btn-default">Não</a>';
                        }   
                    ?>

                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
