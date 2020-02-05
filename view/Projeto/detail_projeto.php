<?php

include_once '../../controller/ProjetoControle.php';
include_once '../../controller/ClienteControle.php';
include_once '../../controller/TarefaControle.php';
include_once '../../controller/IteracaoControle.php';
include_once '../../controller/UsuarioControle.php';

if(!empty($_GET['id']))
{
    $id = $_REQUEST['id'];
    
    $projetoControle = new ProjetoControle();
    $data = $projetoControle->readProjeto($id);
    $clienteControle = new ClienteControle();
    $cliente = $clienteControle->readCliente($data['cliente_id']);
}

?>

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>PMA - Detalhar Projeto</title>
        <link href="../../util/projectTable.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../../util/styles.css">
        <link rel="stylesheet" href="../../util/kanban.css">
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <link type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script src="https://kit.fontawesome.com/c0930358e4.js" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="container">
            <div class="jumbotron row">
                <div>
                    <h2>Detalhamento do Projeto</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
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
            <div class="span10 offset1">
                <div class="pbuttons" align="right" style="padding-bottom: 15px;">
                        <?php

                            echo ' ';
                            echo '<a class="btn btn-outline-warning" href="update_projeto.php?id='.$data['id'].'">Atualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-outline-danger" href="delete_projeto.php?id='.$data['id'].'">Excluir</a>';

                        ?>
                </div>
                
                <?php 

                $tarefaControle = new TarefaControle();
                $tarefas = $tarefaControle->list_tarefasProjeto($data['id']);

                $peso_total = 0;
                $peso_total_todo = 0;
                $peso_total_doing = 0;

                if ($tarefas) foreach($tarefas as $row) {
                    $peso_total = $peso_total + $row['peso'];
                    if ($row['status'] == 'a') {
                        $peso_total_todo = $peso_total_todo + $row['peso'];
                    } else if ($row['status'] == 'b') {
                        $peso_total_doing = $peso_total_doing + $row['peso'];
                    }
                        
                }

                ?>
                
                <div class="row" style="width: 100%; height: 25px; margin: 0px 0px 8px 8px"> 
                    
                    <?php 
                    if ($tarefas) foreach($tarefas as $row) {
                        if ($row['status'] == 'a') { $cor = 'rgb(250,128,114)'; } elseif ($row['status'] == 'b') { $cor = 'rgb(255,247,190)'; } elseif ($row['status'] == 'c') { $cor = 'rgb(40,180,50)';}
                        echo '<div style="width: '.floor((($row['peso']/$peso_total)*100)-1) .'%; height: 25px; margin-right: 4px; background-color: '. $cor .'"></div>';
                    }
                    ?>
                    
                </div>
            
                <div class="card">
                    <div class="card-header">
                        <h3 class="well">Informações do Projeto</h3> 
                    </div>
                    <div class="container info-detail" style="padding: 15px;">
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <label class="control-label">Cliente: </label>
                                        <div class="controls">
                                            <label class="carousel-inner">
                                                <?php echo $cliente['nome']; ?>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Descrição: </label>
                                        <div class="controls">
                                            <label class="carousel-inner">
                                                <?php echo $data['descricao']; ?>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label">Tempo decorrido: </label>
                                        <div class="controls">
                                            <label class="carousel-inner">
                                                <?php //DIA QUE FOI CADASTRADO NÃO ENTRA
                                                $start = new DateTime($data['data_entrada']);
                                                $end = new DateTime();
                                                // otherwise the  end date is excluded (bug?)
                                                $end->modify('+0 day');

                                                $interval = $end->diff($start);

                                                // total days
                                                $days = $interval->days;

                                                // create an iterateable period of date (P1D equates to 1 day)
                                                $period = new DatePeriod($start, new DateInterval('P1D'), $end);

                                                // best stored as array, so you can add more than one
                                                //$holidays = array('2012-09-07');

                                                foreach($period as $dt) {
                                                    $curr = $dt->format('D');

                                                    // substract if Saturday or Sunday
                                                    if ($curr == 'Sat' || $curr == 'Sun') {
                                                        $days--;
                                                    }

                                                    /* (optional) for the updated question
                                                    elseif (in_array($dt->format('Y-m-d'), $holidays)) {
                                                        $days--;
                                                    }*/
                                                }

                                                if ($days < 0)
                                                    $days = 0;
                                                echo $days . ' dia(s)';
                                                ?>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Tempo restante: </label>
                                        <div class="controls">
                                            <label class="carousel-inner">
                                                <?php //DIA ATUAL CONTA COMO DIA DE TRABALHO

                                                $start = new DateTime();
                                                $end = new DateTime($data['data_prevista']);
                                                // otherwise the  end date is excluded (bug?)
                                                $end->modify('+2 day');

                                                $interval = $end->diff($start);

                                                // total days
                                                $days = $interval->days;

                                                // create an iterateable period of date (P1D equates to 1 day)
                                                $period = new DatePeriod($start, new DateInterval('P1D'), $end);

                                                // best stored as array, so you can add more than one
                                                //$holidays = array('2012-09-07');

                                                foreach($period as $dt) {
                                                    $curr = $dt->format('D');

                                                    // substract if Saturday or Sunday
                                                    if ($curr == 'Sat' || $curr == 'Sun') {
                                                        $days--;
                                                    }

                                                    /* (optional) for the updated question
                                                    elseif (in_array($dt->format('Y-m-d'), $holidays)) {
                                                        $days--;
                                                    }*/
                                                }

                                                if ($days < 0)
                                                    $days = 0;
                                                else if ($start > $end)
                                                    $days = 0;
                                                echo $days . ' dia(s)';

                                                ?> <img name="info" id="info" class="info" src="https://cdn.pixabay.com/photo/2012/04/02/17/46/signs-25066_960_720.png" alt="A contagem considera o dia atual como dia de trabalho, exceto para fins de semana!" title="A contagem considera o dia atual como dia de trabalho, exceto para fins de semana!" width="13px" height="13px">
                                            </label>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Valor: </label>
                                        <div class="controls">
                                            <label class="carousel-inner">
                                                <?php echo 'R$ '. $data['valor']; ?>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label">Coeficiente de urgência: </label>
                                        <div class="controls">
                                            <label class="carousel-inner">
                                                <?php 
                                                
                                                if ($days > 0) { 
                                                    $coef = number_format((($peso_total_todo + ($peso_total_doing/2)) / $days ), 2, ',', ''); 
                                                } elseif (($peso_total_todo + ($peso_total_doing/2)) > 0) {
                                                    $coef = 'Atrasado';
                                                } else {
                                                    $coef = '0';
                                                }
                                                
                                                echo $coef ?>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label">Percentual de conclusão: </label>
                                        <div class="controls">
                                            <label class="carousel-inner">
                                                <?php echo number_format((($peso_total - ($peso_total_todo + ($peso_total_doing/2))) / $peso_total * 100), 1, ',', '') .'%' ?>
                                            </label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="card" style="margin-bottom: 1em">
                                        <div class="card-header">
                                            <h4 class="well" >Observações e comentários </h4> 
                                        </div>
                                        <div class="container" style="padding: 15px; min-height: 15em">
                                                        
                                            <?php 

                                            $iteracaoControle = new IteracaoControle();
                                            $iteracoes = $iteracaoControle->list_iteracoesProjeto($data['id']);
                                            $usuarioControle = new UsuarioControle();

                                            if($iteracoes) foreach ($iteracoes as $row) {
                                                $usuario = $usuarioControle->readUsuario($row['usuario_id']);
                                                $datahora = new DateTime($row['datahora']);
                                                echo '<div class="iteration">';
                                                    echo '<input type="hidden" class="iteracao_id" value="'.$row['id'].'">';
                                                    echo '<div class="iteration-content">'.$row['descricao'].'</div>';
                                                    echo '<div class="" style="text-align: right; font-size: smaller">'.$usuario['usuario'].' às '.$datahora->format('H:i:s').' em '.$datahora->format('d/m/Y').'</div>';
                                                    if ($usuario['usuario'] == $_SESSION['usuario']) {
                                                        echo '<div style="text-align: right;">';
                                                        echo '<a href="../Iteracao/update_iteracao.php?id='.$row['id'].'&projeto='.$data['id'].'" style="font-size: smaller">Atualizar</a> <a href="../Iteracao/delete_iteracao.php?id='.$row['id'].'&projeto='.$data['id'].'" style="font-size: smaller">Excluir</a>';
                                                        echo '</div>';
                                                    }
                                                echo '</div>';
                                            }

                                            ?>
                                            <div class="form-actions" align="right">
                                                <?php echo '<a class="btn btn-default" href="../Iteracao/create_iteracao.php?id='.$data['id'].'">Novo comentário</a>' ?>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                                <div class="card" style="width: 95%; margin-left: 2.5%">
                                <div class="card-header">
                                    <h3 class="well">Kanban de Tarefas</h3> 
                                </div>
                                
                                <div class="scrumboard row">
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="header">
                                                    <h5>A fazer</h5>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="header">
                                                    <h5>Em andamento</h5>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="header">
                                                    <h5>Concluído</h5>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="column flex" id="a">
                                                 <!-- todo -->


                                                        <?php 

                                                        if($tarefas) foreach ($tarefas as $row) {
                                                            if ($row['status'] == 'a') {
                                                                echo '<div class="portlet">';
                                                                    echo '<input type="hidden" class="tarefa_id" value="'.$row['id'].'">';
                                                                    echo '';
                                                                    echo '<div class="portlet-header">Peso: '.$row['peso'].'</div>';
                                                                    echo '<div class="portlet-content">'.$row['descricao'].'</div>';
                                                                    echo '<div style="text-align: right; background-color: rgb(255,255,218); padding: 8px;"><a href="../Tarefa/update_tarefa.php?id='.$row['id'].'&projeto_id='.$data['id'].'"><i class="fas fa-edit"></i></a> <a href="../Tarefa/delete_tarefa.php?id='.$row['id'].'&projeto_id='.$data['id'].'"><i class="fas fa-trash"></i></a></div>';
                                                                echo '</div>';
                                                            }
                                                        }

                                                        ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="column flex" id="b">
                                                  <!-- ongoing -->


                                                        <?php 

                                                        if($tarefas) foreach ($tarefas as $row) {
                                                            if ($row['status'] == 'b') {
                                                                echo '<div class="portlet">';
                                                                    echo '<input type="hidden" class="tarefa_id" value="'.$row['id'].'">';
                                                                    echo '';
                                                                    echo '<div class="portlet-header">Peso: '.$row['peso'].'</div>';
                                                                    echo '<div class="portlet-content">'.$row['descricao'].'</div>';
                                                                    echo '<div style="text-align: right; background-color: rgb(255,255,218); padding: 8px;"><a href="../Tarefa/update_tarefa.php?id='.$row['id'].'&projeto_id='.$data['id'].'"><i class="fas fa-edit"></i></a> <a href="../Tarefa/delete_tarefa.php?id='.$row['id'].'&projeto_id='.$data['id'].'"><i class="fas fa-trash"></i></a></div>';
                                                                echo '</div>';
                                                            }
                                                        }

                                                        ?>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="column flex" id="c">
                                                   <!-- done -->


                                                        <?php 

                                                        if($tarefas) foreach ($tarefas as $row) {
                                                            if ($row['status'] == 'c') {
                                                                echo '<div class="portlet">';
                                                                    echo '<input type="hidden" class="tarefa_id" value="'.$row['id'].'">';
                                                                    echo '';
                                                                    echo '<div class="portlet-header">Peso: '.$row['peso'].'</div>';
                                                                    echo '<div class="portlet-content">'.$row['descricao'].'</div>';
                                                                    echo '<div style="text-align: right; background-color: rgb(255,255,218); padding: 8px;"><a href="../Tarefa/update_tarefa.php?id='.$row['id'].'&projeto_id='.$data['id'].'"><i class="fas fa-edit"></i></a> <a href="../Tarefa/delete_tarefa.php?id='.$row['id'].'&projeto_id='.$data['id'].'"><i class="fas fa-trash"></i></a></div>';
                                                                echo '</div>';
                                                            }
                                                        }

                                                        ?>

                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                    
                                    <div class="form-actions" align="right">
                                        <?php echo '<a class="btn btn-default" href="../Tarefa/create_tarefa.php?projeto_id='.$data['id'].'">Adicionar Tarefa</a>' ?>
                                    </div>
                                    
                                </div>



                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <a href="../Home/home.php" type="btn" class="btn btn-default">Menu Principal</a>
                <a href="list_projeto.php" type="btn" class="btn btn-default">Voltar</a>
            </div>
        </div>
        
        
        
        
        <script src="../../util/kanban.js"></script>
    </body>
</html>