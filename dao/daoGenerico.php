<?php
include_once('../model/conectadb.php');
include_once('../model/Pessoa.php');

class daoGenerico
{
    public $conn;

    function inserir(Pessoa $p)
    {
        $conn = new Conecta();
        if ($conn == true) {
            $sql = "insert into Pessoa value (null, '" . $p->getNome() .
                "','" . $p->getDtNasc() . "','" . $p->getLogin() . "','" .
                $p->getSenha() . "','" . $p->getPerfil() . "','" .
                $p->getEmail() . "','" . $p->getCpf() . "')";
            if (mysqli_query($conn->conectadb(), $sql))
                $msg = "Dados cadastrados com sucesso";
            else
                $msg = "Erro no cadastramento";
            mysqli_close($conn->conectadb());
            return $msg;
        }
    }
}
