<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

include_once '../../domain/usuario.php';
include_once '../../domain/permissao.php';
include_once '../../controller/usuariocontrole.php';
include_once '../../controller/PermissaoControle.php';

if(!empty($_GET['id'])) {
    {
        $id = $_REQUEST['id'];
    }
}

if(!empty($_POST)) {
    $usuario = new Usuario();
    $usuario->setPermissao_id(new permissao());
    
    $id = $_REQUEST['id'];
    
    $usuario->setUsuario($_POST['usuario']);
    $usuario->setSenha($_POST['senha']);
    if (isset($_POST['ler_usuario'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_usuario'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_usuario'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_usuario'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setUsuario($permissao);
    
    if (isset($_POST['ler_empresa'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_empresa'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_empresa'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_empresa'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setEmpresa($permissao);
    
    if (isset($_POST['ler_cliente'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_cliente'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_cliente'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_cliente'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setCliente($permissao);
    
    if (isset($_POST['ler_endereco'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_endereco'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_endereco'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_endereco'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setEndereco($permissao);
    
    if (isset($_POST['ler_projeto'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_projeto'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_projeto'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_projeto'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setProjeto($permissao);
    
    if (isset($_POST['ler_iteracao'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_iteracao'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_iteracao'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_iteracao'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setIteracao($permissao);
    
    if (isset($_POST['ler_tipo'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_tipo'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_tipo'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_tipo'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setTipoprojeto($permissao);
    
    if (isset($_POST['ler_tarefa'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_tarefa'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_tarefa'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_tarefa'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setTarefa($permissao);
    $permissao_id = $_REQUEST['permissao_id'];
    
    $usuarioControle = new UsuarioControle();
    $usuarioControle->updateUsuario($usuario, $id);
    $permissaoControle = new PermissaoControle();
    $permissaoControle->updatePermissao($usuario->getPermissao_id(), $permissao_id);
    
    header("Location: list_usuario.php");
} else {
    $usuarioControle = new UsuarioControle();
    $data = $usuarioControle->readUsuario($id);
    $permissaoControle = new PermissaoControle();
    $data_fk = $permissaoControle->readPermissao($data['permissao_id']);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="../../util/SpryValidationTextField.js" type="text/javascript"></script> 
        <link href="../../util/SpryValid.css" rel="stylesheet" type="text/css" />
        <link href="../../util/sizes.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                    <h2>Atualização de Usuários</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
            </div>
            
            <div clas="span10 offset1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="well"> Atualizar Usuário </h3>
                    </div>
                    <div class="card-body">
                    <form class="form-horizontal" action="update_usuario.php" method="post">

                        <table>
                            <tr>
                                <td style="width: 300px;">
                                    <fieldset>
                                        <legend>Usuário</legend>
                                        
                                        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                                        <input type="hidden" name="permissao_id" id="permissao_id" value="<?php echo $data['permissao_id']; ?>" />
                                        
                                        <label for="usuario">Nome de usuário: </label><br>
                                                    <span id="usuario1" class="textfieldHintState">
                                                        <input type="text" class="iUser" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $data['usuario']?>" /><br>
                                                        <span class="textfieldMaxCharsMsg">Esse campo tem limite de 85 caracteres.</span>
                                                        <span class="textfieldRequiredMsg">Esse campo é obrigatório</span><br>
                                                    </span>
                                        <script>
                                            var user = new Spry.Widget.ValidationTextField("user", "custom", {validateOn:["blur"], maxChars: 85});
                                        </script>

                                        <label for="senha" >Senha: </label><br>
                                                    <span id="senha" class="textfieldHintState">
                                                        <input type="password" class="iSenha" name="senha" id="senha" placeholder="Senha" value="" /><br>
                                                        <span class="textfieldMaxCharsMsg">Esse campo tem limite de 12 caracteres.</span>
                                                        <span class="textfieldRequiredMsg">Esse campo é obrigatório</span><br>
                                                    </span>
                                        <script>
                                            var senha = new Spry.Widget.ValidationTextField("senha", "custom", {validateOn:["blur"], maxChars: 12});
                                        </script>



                                    </fieldset>
                                </td>
                                
                                <td style="padding-left: 10px;">
                                    <fieldset>
                                        <legend>Permissões do usuário</legend>
                                        <table class="table-striped">
                                            <tr>
                                                <th style="width: 150px;"></th>
                                                <th style="width: 100px;">Leitura</th>
                                                <th style="width: 100px;">Cadastro</th>
                                                <th style="width: 100px;">Alteração</th>
                                                <th style="width: 100px;">Exclusão</th>
                                                <td style="width: 100px;">Marcar todos</td>
                                            </tr>
                                            <tr>
                                                <td><label>Usuarios</label></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="ler_usuario" id="ler_usuario" <?php if(substr($data_fk['usuario'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_usuario" id="cadastrar_usuario" <?php if(substr($data_fk['usuario'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="alterar_usuario" id="alterar_usuario" <?php if(substr($data_fk['usuario'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="excluir_usuario" id="excluir_usuario" <?php if(substr($data_fk['usuario'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="marcar_usuario" id="marcar_usuario" onclick="marcarUsuarios();"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Empresas</label></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="ler_empresa" id="ler_empresa" <?php if(substr($data_fk['empresa'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_empresa" id="cadastrar_empresa" <?php if(substr($data_fk['empresa'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="alterar_empresa" id="alterar_empresa" <?php if(substr($data_fk['empresa'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="excluir_empresa" id="excluir_empresa" <?php if(substr($data_fk['empresa'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="marcar_empresa" id="marcar_empresa" onclick="marcarEmpresas();"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Clientes</label></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="ler_cliente" id="ler_cliente" <?php if(substr($data_fk['cliente'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_cliente" id="cadastrar_cliente" <?php if(substr($data_fk['cliente'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="alterar_cliente" id="alterar_cliente" <?php if(substr($data_fk['cliente'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="excluir_cliente" id="excluir_cliente" <?php if(substr($data_fk['cliente'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="marcar_cliente" id="marcar_cliente" onclick="marcarClientes();"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Endereços</label></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="ler_endereco" id="ler_endereco" <?php if(substr($data_fk['endereco'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_endereco" id="cadastrar_endereco" <?php if(substr($data_fk['endereco'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="alterar_endereco" id="alterar_endereco" <?php if(substr($data_fk['endereco'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="excluir_endereco" id="excluir_endereco" <?php if(substr($data_fk['endereco'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="marcar_endereco" id="marcar_endereco" onclick="marcarEnderecos();"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Projetos</label></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="ler_projeto" id="ler_projeto" <?php if(substr($data_fk['projeto'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_projeto" id="cadastrar_projeto" <?php if(substr($data_fk['projeto'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="alterar_projeto" id="alterar_projeto" <?php if(substr($data_fk['projeto'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="excluir_projeto" id="excluir_projeto" <?php if(substr($data_fk['projeto'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="marcar_projeto" id="marcar_projeto" onclick="marcarProjetos();"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Iterações</label></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="ler_iteracao" id="ler_iteracao" <?php if(substr($data_fk['iteracao'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_iteracao" id="cadastrar_iteracao" <?php if(substr($data_fk['iteracao'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="alterar_iteracao" id="alterar_iteracao" <?php if(substr($data_fk['iteracao'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="excluir_iteracao" id="excluir_iteracao" <?php if(substr($data_fk['iteracao'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="marcar_iteracao" id="marcar_iteracao" onclick="marcarIteracoes();"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Tipos de Projeto</label></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="ler_tipo" id="ler_tipo" <?php if(substr($data_fk['tipoprojeto'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_tipo" id="cadastrar_tipo" <?php if(substr($data_fk['tipoprojeto'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="alterar_tipo" id="alterar_tipo" <?php if(substr($data_fk['tipoprojeto'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="excluir_tipo" id="excluir_tipo" <?php if(substr($data_fk['tipoprojeto'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="marcar_tipo" id="marcar_tipo" onclick="marcarTipos();"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Tarefas</label></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="ler_tarefa" id="ler_tarefa" <?php if(substr($data_fk['tarefa'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_tarefa" id="cadastrar_tarefa" <?php if(substr($data_fk['tarefa'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="alterar_tarefa" id="alterar_tarefa" <?php if(substr($data_fk['tarefa'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="excluir_tarefa" id="excluir_tarefa" <?php if(substr($data_fk['tarefa'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                                <td style="padding-left: 5%;"><input type="checkbox" name="marcar_tarefa" id="marcar_tarefa" onclick="marcarTarefas();"></td>
                                            </tr>
                                            
                                            <script>
                                                function marcarUsuarios() {
                                                    if(document.getElementById("marcar_usuario").checked == true) {
                                                        document.getElementById("ler_usuario").checked = true;
                                                        document.getElementById("cadastrar_usuario").checked = true;
                                                        document.getElementById("alterar_usuario").checked = true;
                                                        document.getElementById("excluir_usuario").checked = true;
                                                    } else {
                                                        document.getElementById("ler_usuario").checked = false;
                                                        document.getElementById("cadastrar_usuario").checked = false;
                                                        document.getElementById("alterar_usuario").checked = false;
                                                        document.getElementById("excluir_usuario").checked = false;
                                                    }
                                                }
                                                
                                                function marcarEmpresas() {
                                                    if(document.getElementById("marcar_empresa").checked == true) {
                                                        document.getElementById("ler_empresa").checked = true;
                                                        document.getElementById("cadastrar_empresa").checked = true;
                                                        document.getElementById("alterar_empresa").checked = true;
                                                        document.getElementById("excluir_empresa").checked = true;
                                                    } else {
                                                        document.getElementById("ler_empresa").checked = false;
                                                        document.getElementById("cadastrar_empresa").checked = false;
                                                        document.getElementById("alterar_empresa").checked = false;
                                                        document.getElementById("excluir_empresa").checked = false;
                                                    }
                                                }
                                                
                                                function marcarClientes() {
                                                    if(document.getElementById("marcar_cliente").checked == true) {
                                                        document.getElementById("ler_cliente").checked = true;
                                                        document.getElementById("cadastrar_cliente").checked = true;
                                                        document.getElementById("alterar_cliente").checked = true;
                                                        document.getElementById("excluir_cliente").checked = true;
                                                    } else {
                                                        document.getElementById("ler_cliente").checked = false;
                                                        document.getElementById("cadastrar_cliente").checked = false;
                                                        document.getElementById("alterar_cliente").checked = false;
                                                        document.getElementById("excluir_cliente").checked = false;
                                                    }
                                                }
                                                
                                                function marcarEnderecos() {
                                                    if(document.getElementById("marcar_endereco").checked == true) {
                                                        document.getElementById("ler_endereco").checked = true;
                                                        document.getElementById("cadastrar_endereco").checked = true;
                                                        document.getElementById("alterar_endereco").checked = true;
                                                        document.getElementById("excluir_endereco").checked = true;
                                                    } else {
                                                        document.getElementById("ler_endereco").checked = false;
                                                        document.getElementById("cadastrar_endereco").checked = false;
                                                        document.getElementById("alterar_endereco").checked = false;
                                                        document.getElementById("excluir_endereco").checked = false;
                                                    }
                                                }
                                                
                                                function marcarProjetos() {
                                                    if(document.getElementById("marcar_projeto").checked == true) {
                                                        document.getElementById("ler_projeto").checked = true;
                                                        document.getElementById("cadastrar_projeto").checked = true;
                                                        document.getElementById("alterar_projeto").checked = true;
                                                        document.getElementById("excluir_projeto").checked = true;
                                                    } else {
                                                        document.getElementById("ler_projeto").checked = false;
                                                        document.getElementById("cadastrar_projeto").checked = false;
                                                        document.getElementById("alterar_projeto").checked = false;
                                                        document.getElementById("excluir_projeto").checked = false;
                                                    }
                                                }
                                                
                                                function marcarIteracoes() {
                                                    if(document.getElementById("marcar_iteracao").checked == true) {
                                                        document.getElementById("ler_iteracao").checked = true;
                                                        document.getElementById("cadastrar_iteracao").checked = true;
                                                        document.getElementById("alterar_iteracao").checked = true;
                                                        document.getElementById("excluir_iteracao").checked = true;
                                                    } else {
                                                        document.getElementById("ler_iteracao").checked = false;
                                                        document.getElementById("cadastrar_iteracao").checked = false;
                                                        document.getElementById("alterar_iteracao").checked = false;
                                                        document.getElementById("excluir_iteracao").checked = false;
                                                    }
                                                }
                                                
                                                function marcarTipos() {
                                                    if(document.getElementById("marcar_tipo").checked == true) {
                                                        document.getElementById("ler_tipo").checked = true;
                                                        document.getElementById("cadastrar_tipo").checked = true;
                                                        document.getElementById("alterar_tipo").checked = true;
                                                        document.getElementById("excluir_tipo").checked = true;
                                                    } else {
                                                        document.getElementById("ler_tipo").checked = false;
                                                        document.getElementById("cadastrar_tipo").checked = false;
                                                        document.getElementById("alterar_tipo").checked = false;
                                                        document.getElementById("excluir_tipo").checked = false;
                                                    }
                                                }
                                                
                                                function marcarTarefas() {
                                                    if(document.getElementById("marcar_tarefa").checked == true) {
                                                        document.getElementById("ler_tarefa").checked = true;
                                                        document.getElementById("cadastrar_tarefa").checked = true;
                                                        document.getElementById("alterar_tarefa").checked = true;
                                                        document.getElementById("excluir_tarefa").checked = true;
                                                    } else {
                                                        document.getElementById("ler_tarefa").checked = false;
                                                        document.getElementById("cadastrar_tarefa").checked = false;
                                                        document.getElementById("alterar_tarefa").checked = false;
                                                        document.getElementById("excluir_tarefa").checked = false;
                                                    }
                                                }
                                            </script>
                                        </table>
                                    </fieldset>
                                </td>
                            </tr>
                        </table>
                        
                        <div class="form-actions">
                            <br/>

                            <button type="submit" class="btn btn-success">Atualizar</button>
                            <a href="../../index.php" type="btn" class="btn btn-default">Menu Principal</a>
                            <a href="list_usuario.php" type="btn" class="btn btn-default">Voltar</a>
                        </div>
                        
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
