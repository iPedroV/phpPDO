<?php

class Conecta{

    
    private  static $url = 'localhost';
    private static $usuario = 'root';
    private static $senha = 'senac';
    private static $banco = 'dbphp01';
    public $db;

    public function __construct()
    {
        $db = $this->conectadb;
    }
   

    public function conectadb(){
        $link = mysqli_connect ($this->getUrl(), $this->getUsuario(),
        $this->getSenha(), $this->getBanco()) or die(mysqli_errno($link));
        
        return $link;
    }

    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Get the value of banco
     */ 
    public function getBanco()
    {
        return $this->banco;
    }
}


?>