<?php
include_once '../dao/daoGenerico.php';

class PessoaController{
    public function inserirPessoa($nome, $dtNasc, $login, $senha, $perfil, $email, $cpf ){
        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setDtNasc($dtNasc);
        $pessoa->setLogin($login);
        $pessoa->setSenha($senha);
        $pessoa->setPerfil($perfil);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);

        $daoPessoa = new daoGenerico();
        $daoPessoa->inserir($pessoa);
    }
}