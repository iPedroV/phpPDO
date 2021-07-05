<?php
include_once 'C:/xampp/htdocs/php01/dao/daoProduto.php';
include_once 'C:/xampp/htdocs/php01/model/produto.php';

class ProdutoController{
    public function inserirProduto($nome, $vlrCompra, $vlrVenda, $qtdEstoque ){

        $produto = new Produto();
        $produto->setNomeProduto($nome);
        $produto->setVlrCompra($vlrCompra);
        $produto->setVlrVenda($vlrVenda);
        $produto->setQtdEstoque($qtdEstoque);

        $daoPessoa = new daoProduto();
        return $daoPessoa->inserir($produto);
    }
}