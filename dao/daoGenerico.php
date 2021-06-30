<?php
include_once ('../model/conectadb.php');
include_once ('../model/Pessoa.php');

class daoGenerico{
    public $conn;

    function inserir(Pessoa $p){
        $conn = new Conecta();
        if ($conn == true){
           $sql = "insert into pessoa values (null, '".$p->getNome()."','".$p->getDtNasc()."','".$p->getLogin()."','".$p->getSenha()."','".
           $p->getPerfil()."','".$p->getEmail()."','".$p->getCpf()."')";
           if(mysqli_query($conn->conectadb(),$sql))
           return "Dados cadastrados com sucesso";
           else
           return "Erro no cadastro ";
           mysqli_close($conn->conectadb());

        }else
        return "Erro com o Guilherme.";
    }
}