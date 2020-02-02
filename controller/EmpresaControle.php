<?php

require_once '../../util/conexao.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmpresaControle
 *
 * @author Thiago
 */
class EmpresaControle {
    function inserirEmpresa ($empresa) {
        try {
            $pdo = conexao::conectar();
            $enderecoControle = new EnderecoControle();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO empresa (nome, cnpj, telefone) VALUES (?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($empresa->getNome(), $empresa->getCnpj(), $empresa->getTelefone()));
            $pdo = conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function listEmpresa ( ) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'SELECT * FROM empresa ORDER BY nome ASC';
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
    
    function deleteEmpresa ($id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql_fk = "DELETE FROM endereco WHERE empresa_id = ?";
            $sql = "DELETE FROM empresa WHERE id = ?";
            $q = $pdo->prepare($sql_fk);
            $q->execute(array($id));
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function readEmpresa ($id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM empresa WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            conexao::desconectar();
            return $data;
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function updateEmpresa ($empresa, $id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE empresa SET nome = ?, cnpj = ?, telefone = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($empresa->getNome(), $empresa->getCnpj(), $empresa->getTelefone(), $id));
            $pdo = conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
}
