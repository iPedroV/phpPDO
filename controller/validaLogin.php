<?php
require_once 'C:/xampp/htdocs/phpPDO/dao/DaoLogin.php';
require_once 'C:/xampp/htdocs/phpPDO/model/Pessoa.php';
require_once 'C:/xampp/htdocs/phpPDO/model/Mensagem.php';

$login = $_REQUEST['login'];
$senha = $_REQUEST['senha'];

$daoLogin = new DaoLogin();
$resp = new Pessoa();

$resp = $daoLogin->validarLogin($login, $senha);


if (gettype($resp) == "object") {

    if (!isset($_SESSION['login'])) {
        if($login == "" || $senha == "" ){
            $resp = "teste";
            header("Location: ../login.php");
            exit;
        }else{
        $_SESSION['loginp'] = $resp->getLogin();
        $_SESSION['nomep'] = $resp->getIdPessoa();
        $_SESSION['nomep'] = $resp->getNome();
        $_SESSION['perfilp'] = $resp->getPerfil();
        header("Location: ../pagina_botoes.php"); // Vou criar ainda
        exit;
        }
    }
} else {
    $_SESSION['msg'] = ($resp . "</p>");
    header("Location: ../login.php");
    exit;

    
}
