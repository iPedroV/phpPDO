<?php
include_once 'C:/xampp/htdocs/phpPDO/bd/Conecta.php';
include_once 'C:/xampp/htdocs/phpPDO/model/Produto.php';
include_once 'C:/xampp/htdocs/phpPDO/model/Mensagem.php';
include_once 'C:/xampp/htdocs/phpPDO/model/Fornecedor.php';

class DaoProduto {

    public function inserir(Produto $produto){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            $nomeProduto = $produto->getNomeProduto();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $qtdEstoque = $produto->getQtdEstoque();
            $fkFornecedor = $produto->getFkFornecedor();
            try {
                $stmt = $conecta->prepare("insert into produto values "
                        . "(null,?,?,?,?,?)");
                $stmt->bindParam(1, $nomeProduto);
                $stmt->bindParam(2, $vlrCompra);
                $stmt->bindParam(3, $vlrVenda);
                $stmt->bindParam(4, $qtdEstoque);
                $stmt->bindParam(5, $fkFornecedor);
                $stmt->execute();
                $msg->setMsg("<p style='color: green;'>"
                        . "Dados Cadastrados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        }else{
            $msg->setMsg("<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }
    
    //método para atualizar dados da tabela produto
    public function atualizarProdutoDAO(Produto $produto){
        $conn = new Conecta();
        $msg = new Mensagem();
        
        $conecta = $conn->conectadb();
        if($conecta){
            $id = $produto->getIdProduto();
            $nomeProduto = $produto->getNomeProduto();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $qtdEstoque = $produto->getQtdEstoque();
            $fkFornecedor = $produto->getFkFornecedor();
            try{
                $stmt = $conecta->prepare("update produto set "
                        . "nome = ?,"
                        . "vlrCompra = ?,"
                        . "vlrVenda = ?, "
                        . "qtdEstoque = ?, "
                        . "fkFornecedor = ? "
                        . "where id = ?");
                $stmt->bindParam(1, $nomeProduto);
                $stmt->bindParam(2, $vlrCompra);
                $stmt->bindParam(3, $vlrVenda);
                $stmt->bindParam(4, $qtdEstoque);
                $stmt->bindParam(5, $fkFornecedor);
                $stmt->bindParam(6, $id);
                $stmt->execute();
                $msg->setMsg("<p style='color: blue;'>"
                        . "Dados atualizados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        }else{
            $msg->setMsg("<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }
    
    //método para carregar lista de produtos do banco de dados
    public function listarProdutosDAO(){
        $msg = new Mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if($conecta){
            try {
                $rs = $conecta->query("SELECT * FROM produto inner join fornecedor "
                . "on produto.fkFornecedor = fornecedor.idfornecedor");
                $lista = array();
                $a = 0;
                if($rs->execute()){
                    if($rs->rowCount() > 0){
                        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
                            $produto = new Produto();
                            $produto->setIdProduto($linha->id);
                            $produto->setNomeProduto($linha->nome);
                            $produto->setVlrCompra($linha->vlrCompra);
                            $produto->setVlrVenda($linha->vlrVenda);
                            $produto->setQtdEstoque($linha->qtdEstoque);
                            
                            $forn = new Fornecedor();
                            $forn->setIdFornecedor($linha->idfornecedor);
                            $forn->setNomeFornecedor($linha->nomeFornecedor);
                            $forn->setLogradouro($linha->logradouro);
                            
                            $forn->setComplemento($linha->complemento);
                            $forn->setBairro($linha->bairro);
                            $forn->setCidade($linha->cidade);
                            $forn->setUf($linha->uf);
                            $forn->setCep($linha->cep);
                            $forn->setRepresentante($linha->representante);
                            $forn->setEmail($linha->email);
                            $forn->setTelCel($linha->telFixo);
                            $forn->setTelFixo($linha->telCel);

                            $produto->setFkFornecedor($forn);

                            $lista[$a] = $produto;
                            $a++;
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }  
            $conn = null;           
            return $lista;
        }
    }
    
    //método para excluir produto na tabela produto
    public function excluirProdutoDAO($id){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if($conecta){
             try {
                $stmt = $conecta->prepare("delete from produto "
                        . "where id = ?");
                $stmt->bindParam(1, $id);
                $stmt->execute();
                $msg->setMsg("<p style='color: #d6bc71;'>"
                        . "Dados excluídos com sucesso.</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        }else{
            $msg->setMsg("<p style='color: red;'>'Banco inoperante!'</p>"); 
        }
        $conn = null;
        return $msg;
    }
    
    //método para os dados de produto por id
    public function pesquisarProdutoIdDAO($id){
        $msg = new Mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $produto = new Produto();
        if($conecta){
            try {
                $rs = $conecta->prepare("SELECT * FROM produto inner join fornecedor "
                . "on produto.fkFornecedor = fornecedor.idfornecedor ");
                $rs->bindParam(1, $id);
                if($rs->execute()){
                    if($rs->rowCount() > 0){
                        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
                            $produto->setIdProduto($linha->id);
                            $produto->setNomeProduto($linha->nome);
                            $produto->setVlrCompra($linha->vlrCompra);
                            $produto->setVlrVenda($linha->vlrVenda);
                            $produto->setQtdEstoque($linha->qtdEstoque);

                            $forn = new Fornecedor();
                            $forn->setIdFornecedor($linha->idfornecedor);
                            $forn->setNomeFornecedor($linha->nomeFornecedor);
                            $forn->setLogradouro($linha->logradouro);
                       
                            $forn->setComplemento($linha->complemento);
                            $forn->setBairro($linha->bairro);
                            $forn->setCidade($linha->cidade);
                            $forn->setUf($linha->uf);
                            $forn->setCep($linha->cep);
                            $forn->setRepresentante($linha->representante);
                            $forn->setEmail($linha->email);
                            $forn->setTelCel($linha->telFixo);
                            $forn->setTelFixo($linha->telCel);
                            
                            $produto->setFkFornecedor($forn);
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }  
            $conn = null;
        }else{
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
			 URL='../PHPMatutino01/cadastroProduto.php'\">"; 
        }
        return $produto;
    }
}
