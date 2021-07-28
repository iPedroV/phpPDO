<?php
include_once 'C:/xampp/htdocs/phpPDO/dao/DaoFornecedor.php';
include_once 'C:/xampp/htdocs/phpPDO/model/Fornecedor.php';

class FornecedorController {
    
    public function inserirFornecedor($nomeFornecedor, $Logradouro, 
            $Numero, $Complemento, $Bairro, $Cidade, $Uf, $Cep, $Representante,
            $Email, $TelFixo, $TelCel){
        $fornecedor = new Fornecedor();
        $fornecedor->setNomeFornecedor($nomeFornecedor);
        $fornecedor->setLogradouro($Logradouro);
        $fornecedor->setNumero($Numero);
        $fornecedor->setComplemento($Complemento);
        $fornecedor->setBairro($Bairro);
        $fornecedor->setCidade($Cidade);
        $fornecedor->setUf($Uf);
        $fornecedor->setCep($Cep);
        $fornecedor->setRepresentante($Representante);
        $fornecedor->setEmail($Email);
        $fornecedor->setTelFixo($TelFixo);
        $fornecedor->setTelCel($TelCel);
        
        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->inserir($fornecedor);
    }
    
    //método para atualizar dados de fornecedor no BD
    public function atualizarFornecedor($idfornecedor, $nomeFornecedor, $logradouro, 
    $numero, $complemento, $bairro, $cidade, $uf, $cep, $representante,
    $email, $telFixo, $telCel){
        $fornecedor = new Fornecedor();
        $fornecedor->setIdFornecedor($idfornecedor);
        $fornecedor->setNomeFornecedor($nomeFornecedor);
        $fornecedor->setLogradouro($logradouro);
        $fornecedor->setNumero($numero);
        $fornecedor->setComplemento($complemento);
        $fornecedor->setBairro($bairro);
        $fornecedor->setCidade($cidade);
        $fornecedor->setUf($uf);
        $fornecedor->setCep($cep);
        $fornecedor->setRepresentante($representante);
        $fornecedor->setEmail($email);
        $fornecedor->setTelFixo($telFixo);
        $fornecedor->setTelCel($telCel);
        
        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->atualizarFornecedorDAO($fornecedor);
    }
    
    //método para carregar a lista de fornecedors que vem da DAO
    public function listarFornecedores(){
        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->listarFornecedoresDAO();
    }
    
    //método para excluir fornecedor
    public function excluirFornecedor($id){
        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->excluirFornecedorDAO($id);
    }
    
    //método para retornar objeto fornecedor com os dados do BD
    public function pesquisarFornecedorId($id){
        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->pesquisarFornecedorIdDAO($id);
    }
    
    //método para editar fornecedor
    public function editarFornecedor($id){
        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->atualizarFornecedorDAO($id); //
    }
    
    //método para limpar formulário
    public function limpar(){
        return $pr = new Fornecedor();
    }
}
