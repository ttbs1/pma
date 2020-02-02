<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empresa
 *
 * @author Thiago
 */
class Empresa {
    private $nome;
    private $cnpj;
    private $telefone;
    
    function getNome() {
        return $this->nome;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    
}
