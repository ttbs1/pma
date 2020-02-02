<?php

require_once '../../util/conexao.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnderecoControle
 *
 * @author Thiago
 */
class EnderecoControle {
    function inserirEnderecoClienteSemId ($cliente,$endereco) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO endereco (cliente_id, rua, numero, bairro, CEP, cidade, estado) VALUES (?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $clienteControle = new ClienteControle();
            $result = $clienteControle->pesquisarPorNome($cliente->getNome());
            $q->execute(array($result['id'],$endereco->getRua(), $endereco->getNumero(), $endereco->getBairro(), $endereco->getCEP(), $endereco->getCidade(), $endereco->getEstado()));
            $pdo = conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function inserirEndereco ($endereco,$tipo) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (strcmp($tipo, "empresa") == 0) {
                $id = $pdo->query("SELECT MAX(id) FROM empresa");
                $id = $id->fetchColumn();
                $sql = "INSERT INTO endereco (empresa_id, rua, numero, bairro, CEP, cidade, estado) VALUES (?,?,?,?,?,?,?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($id,$endereco->getRua(), $endereco->getNumero(), $endereco->getBairro(), $endereco->getCEP(), $endereco->getCidade(), $endereco->getEstado()));
            } else if (strcmp($tipo, "cliente") == 0) {
                $id = $pdo->query("SELECT MAX(id) FROM cliente");
                $id = $id->fetchColumn();
                $sql = "INSERT INTO endereco (cliente_id, rua, numero, bairro, CEP, cidade, estado) VALUES (?,?,?,?,?,?,?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($id,$endereco->getRua(), $endereco->getNumero(), $endereco->getBairro(), $endereco->getCEP(), $endereco->getCidade(), $endereco->getEstado()));
            }
            $pdo = conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function inserirEnderecoCliente ($cliente_id,$endereco) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO endereco (cliente_id, rua, numero, bairro, CEP, cidade, estado) VALUES (?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($cliente_id,$endereco->getRua(), $endereco->getNumero(), $endereco->getBairro(), $endereco->getCEP(), $endereco->getCidade(), $endereco->getEstado()));
            $pdo = conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function inserirEnderecoEmpresa ($empresa_id,$endereco) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO endereco (empresa_id, rua, numero, bairro, CEP, cidade, estado) VALUES (?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($empresa_id,$endereco->getRua(), $endereco->getNumero(), $endereco->getBairro(), $endereco->getCEP(), $endereco->getCidade(), $endereco->getEstado()));
            $pdo = conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function updateEndereco ($id, $endereco) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE endereco SET rua = ?, numero = ?, bairro = ?, CEP = ?, cidade = ?, estado = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($endereco->getRua(), $endereco->getNumero(), $endereco->getBairro(), $endereco->getCEP(), $endereco->getCidade(), $endereco->getEstado(), $id));
            $pdo = conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function readEndereco ($id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM endereco WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            conexao::desconectar();
            return $data;
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }    
    
    function list_enderecosCliente ($cliente_id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM endereco WHERE cliente_id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($cliente_id));
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
    
    function list_enderecosEmpresa ($empresa_id) {
        try {
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM endereco WHERE empresa_id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($empresa_id));
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
    
    function deleteEndereco ($id) {
        try{
            $pdo = conexao::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM endereco WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            conexao::desconectar();
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
}
