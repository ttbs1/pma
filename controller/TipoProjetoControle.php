<?php

require_once '../../util/conexao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoProjetoControle
 *
 * @author Thiago
 */
class TipoProjetoControle {
    
    function inserirTipoProjeto($tipoProjeto) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tipoprojeto (descricao) VALUE (?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($tipoProjeto->getDescricao()));
            $pdo = conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function listTipoProjeto () {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'SELECT * FROM tipoprojeto';
            $q = $pdo->prepare($sql);
            $q->execute();
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
    
    function readTipoProjeto ($id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM tipoprojeto WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            conexao::desconectar();
            return $data;
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function pesquisarTipoProjeto ($id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM tipoprojeto WHERE descricao = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            conexao::desconectar();
            return $data;
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function updateTipoProjeto ($tipoProjeto, $id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tipoprojeto SET descricao = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($tipoProjeto->getDescricao(), $id));
            $pdo = conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function deleteTipoProjeto ($id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql_fk = "DELETE FROM tarefa WHERE tipoprojeto_id = ?";
            $sql = "DELETE FROM tipoprojeto WHERE id = ?";
            $q = $pdo->prepare($sql_fk);
            $q->execute(array($id));
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
}
