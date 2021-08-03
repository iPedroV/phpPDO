<?php

require_once 'C:/xampp/htdocs/phpPDO/bd/Conecta.php';
require_once 'C:/xampp/htdocs/phpPDO/model/Pessoa.php';
require_once 'C:/xampp/htdocs/phpPDO/model/Endereco.php';
include_once 'C:/xampp/htdocs/phpPDO/model/Mensagem.php';

class daoPessoa {

    public function inserir(Pessoa $pessoa, Endereco $endereco){
        
            $conn = new Conecta();
            $msg = new Mensagem();
            $conecta = $conn->conectadb();
            if($conecta){
            
                $nome = $pessoa->getNome();
                $dtNasc = $pessoa->getDtNasc();
                $login = $pessoa->getLogin();
                $senha = $pessoa->getSenha();
                $perfil = $pessoa->getPerfil();
                $email = $pessoa->getEmail();
                $cpf = $pessoa->getCpf();

                $cep = $endereco->getCep();
                $logradouro = $endereco->getLogradouro();
                $complemento = $endereco->getComplemento();
                $bairro = $endereco->getBairro();
                $cidade = $endereco->getCidade();
                $uf = $endereco->getUf();

                try {
                    $stmt = $conecta->prepare("insert into pessoa values "
                            . "(null,?,?,?,?,?,?,?)");
                    
                    $stmt->bindParam(1, $nome);
                    $stmt->bindParam(2, $dtNasc);
                    $stmt->bindParam(3, $login);
                    $stmt->bindParam(4, $senha);
                    $stmt->bindParam(5, $perfil);
                    $stmt->bindParam(6, $email);
                    $stmt->bindParam(7, $cpf);
                    $stmt->execute();
                    
                    $st = $conecta->prepare("select idendereco "
                        . "from endereco where cep = ? and "
                        . "logradouro = ? limit 1");
                    $st->bindParam(1, $cep);
                    $st->bindParam(2, $logradouro);
                    $linhaEndereco = $st->execute();
                    if($linhaEndereco){

                    }

                    

                    $stmt = $conecta->prepare("insert into endereco values "
                            . "(null,?,?,?,?,?,?)");

                    $stmt->bindParam(1, $cep);
                    $stmt->bindParam(2, $logradouro);
                    $stmt->bindParam(3, $complemento);
                    $stmt->bindParam(4, $bairro);
                    $stmt->bindParam(5, $cidade);
                    $stmt->bindParam(6, $uf);
                            

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
