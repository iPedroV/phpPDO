<?php
require_once('C:/xampp/htdocs/php01/bd/conecta.php');
require_once('C:/xampp/htdocs/php01/model/pessoa.php');

class daoGenerico
{
    public $conn;

    function inserir(Pessoa $p)
    {
        $msg = "Dados cadastrados com sucesso";
        $conn = new Conecta();
        if ($conn->conectadb()) {
            $sql = "insert into Pessoa value (null, '" . $p->getNome() .
                "','" . $p->getDtNasc() . "','" . $p->getLogin() . "','" .
                $p->getSenha() . "','" . $p->getPerfil() . "','" .
                $p->getEmail() . "','" . $p->getCpf() . "')";
            if (mysqli_query($conn->conectadb(), $sql) != 1) {
                $msg = "Erro de sintaxe" . mysqli_error($conn->conectadb());
            }
        } else
            $msg = "Erro no cadastramento";
        mysqli_close($conn->conectadb());
        return $msg;
    }
}
