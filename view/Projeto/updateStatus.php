<?php

if(!empty($_POST))
{
    include_once '../../controller/TarefaControle.php';

    $id = $_POST['id'];
    $status = $_POST['status'];
    
    $tarefaControle = new TarefaControle();
    $tarefaControle->updateStatus($id, $status);
    //header("Location: ../detail_projeto.php?id=".$id);
}
?>