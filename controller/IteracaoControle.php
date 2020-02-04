<?php

require_once '../../util/conexao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IteracaoControle
 *
 * @author Thiago
 */
class IteracaoControle {
    function list_iteracoesProjeto ($projeto_id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM iteracao WHERE projeto_id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($projeto_id));
            $data = NULL;
            while($row = $q->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            conexao::desconectar();
            return $data;
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function novaIteracao_Projeto ($usuario_id, $projeto_id, $descricao, $dataHora) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO iteracao (usuario_id, projeto_id, descricao, datahora) VALUES (?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($usuario_id, $projeto_id, $descricao, $dataHora));
            $pdo = conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
}
