<?php

require_once '../../util/conexao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TarefaControle
 *
 * @author Thiago
 */
class TarefaControle {
    function list_tarefasTipoProjeto ($tipoProjeto_id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM tarefa WHERE tipoprojeto_id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($tipoProjeto_id));
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
    
    function list_tarefasProjeto ($projeto_id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM tarefa WHERE projeto_id = ?";
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
    
    function novaTarefa_TipoProjeto ($tarefa,$tipoProjeto_id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tarefa (tipoprojeto_id, descricao, peso) VALUES (?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($tipoProjeto_id,$tarefa->getDescricao(), $tarefa->getPeso()));
            $pdo = conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function novaTarefa_Projeto ($tarefa,$projeto_id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tarefa (projeto_id, descricao, peso) VALUES (?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($projeto_id,$tarefa['descricao'], $tarefa['peso']));
            $pdo = conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function updateTarefa ($id, $tarefa) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tarefa SET descricao = ?, peso = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($tarefa->getDescricao(), $tarefa->getPeso(), $id));
            $pdo = conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function updateStatus ($id, $status) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tarefa SET status = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($status, $id));
            $pdo = conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function deleteTarefa ($id) {
        //Delete do banco:
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM tarefa WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function readTarefa ($id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM tarefa WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            conexao::desconectar();
            return $data;
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
}
