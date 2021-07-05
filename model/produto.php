<?php

class Produto{

    private $idProduto;
    private $nomeProduto;
    private $vlrCompra;
    private $vlrVenda;
    private $qtdEstoque;

    /**
     * Get the value of idProduto
     */ 
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * Set the value of idProduto
     *
     * @return  self
     */ 
    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;

        return $this;
    }

    /**
     * Get the value of nomeProduto
     */ 
    public function getNomeProduto()
    {
        return $this->nomeProduto;
    }

    /**
     * Set the value of nomeProduto
     *
     * @return  self
     */ 
    public function setNomeProduto($nomeProduto)
    {
        $this->nomeProduto = $nomeProduto;

        return $this;
    }

    /**
     * Get the value of vlrCompra
     */ 
    public function getVlrCompra()
    {
        return $this->vlrCompra;
    }

    /**
     * Set the value of vlrCompra
     *
     * @return  self
     */ 
    public function setVlrCompra($vlrCompra)
    {
        $this->vlrCompra = $vlrCompra;

        return $this;
    }

    /**
     * Get the value of vlrVenda
     */ 
    public function getVlrVenda()
    {
        return $this->vlrVenda;
    }

    /**
     * Set the value of vlrVenda
     *
     * @return  self
     */ 
    public function setVlrVenda($vlrVenda)
    {
        $this->vlrVenda = $vlrVenda;

        return $this;
    }

    /**
     * Get the value of qtdEstoque
     */ 
    public function getQtdEstoque()
    {
        return $this->qtdEstoque;
    }

    /**
     * Set the value of qtdEstoque
     *
     * @return  self
     */ 
    public function setQtdEstoque($qtdEstoque)
    {
        $this->qtdEstoque = $qtdEstoque;

        return $this;
    }
}