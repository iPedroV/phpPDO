<?php
include_once 'C:/xampp/htdocs/php01/bd/conectaCasa.php';
include_once 'C:/xampp/htdocs/php01/model/livro.php';

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

    public function listarLivrosDAO(){
        $conn = new Conecta();
        if ($conn->conectadb()) {
            $sql = "select * from livro";
            $query = mysqli_query($conn->conectadb(), $sql);
            $result = mysqli_fetch_array($query);
            $lista = array();
            $a = 0;
            do{
                $livro = new Livro();
                $livro->setIdLivro($result['idlivro']);
                $livro->setTitulo($result['titulo']);
                $livro->setAutor($result['autor']);
                $livro->setEditora($result['editora']);
                $livro->setQtdEstoque($result['qtdEstoque']);
                $lista[$a] = $livro;
                $a++;
            }while($result = mysqli_fetch_array($query));
            mysqli_close($conn->conectadb());
            return $lista;
        }
    }
}
