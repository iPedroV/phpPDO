<?php

require_once 'C:/xampp/htdocs/PHPMatutino01/bd/Conecta.php';
require_once 'C:/xampp/htdocs/PHPMatutino01/model/Pessoa.php';

class daoPessoa {

    public $conn;

    function inserir(Pessoa $p) {
        $msg = "Dados cadastrados com sucesso!";
        $conn = new Conecta();
        if ($conn->conectadb()) {
            $sql = "insert into pessoa values (null,'" . $p->getNome() .
                    "','" . $p->getDtNasc() . "','" . $p->getLogin() . "','" .
                    $p->getSenha() . "','" . $p->getPerfil() . "','" .
                    $p->getEmail() . "','" . $p->getCpf() . "')";
            if(mysqli_query($conn->conectadb(), $sql) != 1){
                $msg = "Erro de sintaxe. <br>";
            }
        } else
            $msg = "Erro na conexão com Banco de Dados!";
        mysqli_close($conn->conectadb());
        return $msg;
    }

}
