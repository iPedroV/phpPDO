<?php

class Pessoa {
    
    private $idPessoa;
    private $nome;
    private $dtNasc;
    private $login;
    private $senha;
    private $perfil;
    private $email;
    private $cpf;
    
    public function getIdPessoa()
    {
        return $this->idPessoa;
    }

    function getNome() {
        return $this->nome;
    }

    function getDtNasc() {
        return $this->dtNasc;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function getEmail() {
        return $this->email;
    }

    function getCpf() {
        return $this->cpf;
    }


    function setIdPessoa($idPessoa)
    {
        $this->idPessoa = $idPessoa; 
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDtNasc($dtNasc) {
        $this->dtNasc = $dtNasc;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }


    /**
     * Get the value of idPessoa
     */ 
    

    /**
     * Set the value of idPessoa
     *
     * @return  self
     */ 

}
