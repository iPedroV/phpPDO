<?php

require_once 'C:/xampp/htdocs/phpPDO/bd/Conecta.php';
require_once 'C:/xampp/htdocs/phpPDO/model/Pessoa.php';

class daoPessoa {

    public $conn;
                                                    ARRUMAR DPS
    private $idpessoa;
    private $nome;
    private $dtNasc;
    private $login;
    private $senha;
    private $perfil;
    private $email;
    private $cpf;

    public function inserir(Pessoa $produto){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            $nomePessoa = $produto->getNome();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $qtdEstoque = $produto->getQtdEstoque();
            try {
                $stmt = $conecta->prepare("insert into produto values "
                        . "(null,?,?,?,?)");
                $stmt->bindParam(1, $nomePessoa);
                $stmt->bindParam(2, $vlrCompra);
                $stmt->bindParam(3, $vlrVenda);
                $stmt->bindParam(4, $qtdEstoque);
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

}
