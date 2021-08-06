<?php
require_once "C:/xampp/htdocs/phpPDO/dao/daoPessoa.php";
require_once 'C:/xampp/htdocs/phpPDO/model/Pessoa.php';
require_once 'C:/xampp/htdocs/phpPDO/model/Endereco.php';
class PessoaController
{

    public function inserirPessoa(
        $nome,
        $dtNasc,
        $login,
        $senha,
        $perfil,
        $email,
        $cpf,
        $cep,
        $logradouro,
        $uf,
        $bairro,
        $cidade,
        $complemento
    ) {

        $endereco = new Endereco();
        $endereco->setCep($cep);
        $endereco->setLogradouro($logradouro);
        $endereco->setComplemento($complemento);
        $endereco->setBairro($bairro);
        $endereco->setCidade($cidade);
        $endereco->setUf($uf);

        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setDtNasc($dtNasc);
        $pessoa->setLogin($login);
        $pessoa->setSenha($senha);
        $pessoa->setPerfil($perfil);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);

        $pessoa->setFkEndereco($endereco);

        $daoPessoa = new daoPessoa();
        return $daoPessoa->inserir($pessoa);
    }

    public function listarPessoas()
    {
        $daoPessoa = new daoPessoa();
        return $daoPessoa->listarPessoasDAO();
    }

    public function atualizarPessoa(
        $id,
        $nome,
        $dtNasc,
        $login,
        $senha,
        $perfil,
        $email,
        $cpf,
        $cep,
        $logradouro,
        $complemento,
        $bairro,
        $cidade,
        $uf
    ) {
        $endereco = new Endereco();
        $endereco->setCep($cep);
        $endereco->setLogradouro($logradouro);
        $endereco->setComplemento($complemento);
        $endereco->setBairro($bairro);
        $endereco->setCidade($cidade);
        $endereco->setUf($uf);
        $pessoa = new Pessoa();

        $pessoa->setIdPessoa($id);
        $pessoa->setNome($nome);
        $pessoa->setDtNasc($dtNasc);
        $pessoa->setLogin($login);
        $pessoa->setSenha($senha);
        $pessoa->setPerfil($perfil);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);

        $pessoa->setFkEndereco($endereco);


        $daoPessoa = new daoPessoa();
        return $daoPessoa->atualizarPessoaDAO($pessoa);
    }

    public function pesquisarPessoaID($id)
    {
        $daoProduto = new daoPessoa();
        return $daoProduto->pesquisarPessoaIdDAO($id);
    }

    public function excluirPessoa($id){
        $daoP = new DaoPessoa();
        return $daoP->excluirPessoaDAO($id);
    }
}
