<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjetoControle
 *
 * @author Thiago
 */

require_once '../../util/conexao.php';

class ProjetoControle {
    function listProjeto () {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'SELECT * FROM projeto';
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
    
    function inserirProjeto ($projeto) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO projeto (cliente_id, usuario_id, tipoprojeto_id, data_entrada, data_prevista, descricao, valor) VALUES (?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($projeto->getCliente_id(), $projeto->getUsuario_id(), $projeto->getTipoprojeto_id(), $projeto->getData_entrada(), $projeto->getData_prevista(), $projeto->getDescricao(), $projeto->getValor()));
            $id = $pdo->query("SELECT MAX(id) FROM projeto");
            $id = $id->fetchColumn();
            $pdo = conexao::desconectar();
            return $id;
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function readProjeto ($id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM projeto WHERE id = ?";
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
