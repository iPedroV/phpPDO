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
}
