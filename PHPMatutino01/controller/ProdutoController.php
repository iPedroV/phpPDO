<?php
include_once 'C:/xampp/htdocs/PHPMatutino01/dao/DaoProduto.php';
include_once 'C:/xampp/htdocs/PHPMatutino01/model/Produto.php';

class ProdutoController {
    
    public function inserirProduto($nomeProduto, $vlrCompra, 
            $vlrVenda, $qtdEstoque){
        $produto = new Produto();
        $produto->setNomeProduto($nomeProduto);
        $produto->setVlrCompra($vlrCompra);
        $produto->setVlrVenda($vlrVenda);
        $produto->setQtdEstoque($qtdEstoque);
        
        $daoProduto = new DaoProduto();
        return $daoProduto->inserir($produto);
    }
    
    //método para carregar a lista de produtos que vem da DAO
    public function listarProdutos(){
        $daoProduto = new DaoProduto();
        return $daoProduto->listarProdutosDAO();
    }
    
    //método para excluir produto
    public function excluirProduto($id){
        $daoProduto = new DaoProduto();
        $daoProduto->excluirProdutoDAO($id);
    }
    
    //método para retornar objeto produto com os dados do BD
    public function pesquisarProdutoId($id){
        $daoProduto = new DaoProduto();
        return $daoProduto->pesquisarProdutoIdDAO($id);
    }
    
    //método para editar produto
    public function editarProduto($id){
        $daoProduto = new DaoProduto();
        return $daoProduto->editarProdutoDAO($id);
    }
    
    //método para limpar formulário
    public function limpar(){
        return $pr = new Produto();
    }
}