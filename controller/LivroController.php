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

    public function excluirLivro($id){
        $daoLivro = new daoLivro();
        $daoLivro->excluirLivroDAO($id);
    }

    public function pesquisarLivroID($id){
        $daoLivro = new daoLivro();
        return $daoLivro->pesquisarLivroDAO($id);
    }

    /*public function editaLivro($id){
        $daoLivro = new daoLivro();
        $daoLivro->editaLivroDAO($id);
    }*/

    public function limpar(){

    }
}