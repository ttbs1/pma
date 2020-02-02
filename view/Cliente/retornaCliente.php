<?php

require_once '../../util/conexao.php';

$pdo = conexao::conectar();
$dados = $pdo->prepare("SELECT nome FROM cliente ORDER BY nome ASC");
$dados->execute();
echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));
conexao::desconectar();
?>