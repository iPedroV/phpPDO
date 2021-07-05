<?php
include_once 'C:/xampp/htdocs/projeto-php/bd/conectaCasa.php';
include_once ('C:/xampp/htdocs/projeto-php/model/livro.php');

class daoLivro
{
    public function inserir(Livro $l)
    {
        $conn = new Conecta();
        if ($conn->conectadb()) {
            $sql = "insert into livro value (null, '" .
                $l->getTitulo() . "','" .
                $l->getAutor() . "','" .
                $l->getEditora() . "','" .
                $l->getQtdEstoque() . "')";
            if (mysqli_query($conn->conectadb(), $sql)) {
                $msg = "<p style='color:green'>  Dados cadastrados com sucesso </p>";
            } else {
                $msg = "<p> failed </p>";
            }
        } else {
            $msg = "<p> Erro na conexão </p>";
        }
        mysqli_close($conn->conectadb());
        return $msg;
    }
}
