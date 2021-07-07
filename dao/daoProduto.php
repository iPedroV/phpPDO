<?php
include_once 'C:/xampp/htdocs/php01/bd/conecta02.php';
include_once('C:/xampp/htdocs/php01/model/produto.php');

class daoProduto
{
    public function inserir(Produto $p)
    {
        $conn = new Conecta();
        if ($conn->conectadb()) {
            $sql = "insert into produto value (null, '" .
                $p->getNomeProduto() . "','" .
                $p->getVlrCompra() . "','" .
                $p->getVlrVenda() . "','" .
                $p->getQtdEstoque() . "')";
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

    //método para carregar lista de produtos do banco de dados do banco

    public function listarProdutosDAO(){
        $conn = new Conecta();
        if ($conn->conectadb()) {
            $sql = "select * from produto";
            $query = mysqli_query($conn->conectadb(), $sql);
            $result = mysqli_fetch_array($query);
            $lista = array();
            $a = 0;
            do{
                $produto = new Produto();
                $produto->setIdProduto($result['id']);
                $produto->setNomeProduto($result['nome']);
                $produto->setVlrCompra($result['vlrCompra']);
                $produto->setVlrVenda($result['vlrVenda']);
                $produto->setQtdEstoque($result['qtdEstoque']);
                $lista[$a] = $produto;
                $a++;
            }while($result = mysqli_fetch_array($query));
            mysqli_close($conn->conectadb());
            return $lista;
        }
    }
}
