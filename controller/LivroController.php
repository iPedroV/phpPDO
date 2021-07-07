<?php
include_once 'C:/xampp/htdocs/php01/dao/daoLivro.php';
include_once 'C:/xampp/htdocs/php01/model/livro.php';

class LivroController{
    public function inserirLivro($titulo, $autor, $editora, $qtdEstoque ){

        $livro = new Livro();
        $livro->setTitulo($titulo);
        $livro->setAutor($autor);
        $livro->setEditora($editora);
        $livro->setQtdEstoque($qtdEstoque);

        $daoLivro = new daoLivro();
        return $daoLivro->inserir($livro);
    }

    public function listarLivros(){
        $daoLivro = new daoLivro();
        return $daoLivro->listarLivrosDAO();
    }
}