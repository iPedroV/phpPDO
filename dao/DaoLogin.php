<?php
require_once 'C:/xampp/htdocs/phpPDO/bd/Conecta.php';
require_once 'C:/xampp/htdocs/phpPDO/model/Mensagem.php';
require_once 'C:/xampp/htdocs/phpPDO/model/Pessoa.php';

class DaoLogin
{
    public function validarLogin($login, $senha)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        $pessoa = new Pessoa();
        if ($conecta) {
            try {
                $st = $conecta->prepare(" select * from pessoa where login = ?"
                    . "and senha = ? limit 1");
                $st->bindParam(1, $login);
                $st->bindParam(2, $senha);
                
                if ($st->execute()) {
                    if ($st->rowCount() > 0) {
                    while ($linha = $st->fetch(PDO::FETCH_OBJ)) {
                        $pessoa->setIdPessoa($linha->idpessoa);
                        $pessoa->setNome($linha->nome);
                        $pessoa->setLogin($linha->login);
                        $pessoa->setPerfil($linha->perfil);
                    }
                }else{
                    $msg->setMsg("<p style='color: red;'>"
                . "Usuário inexistente.</p>");
                }
                return $pessoa;
            } 
            } catch (PDOException $ex) {
                return "" . $ex;
            }
        } else {
            $msg->setMsg("<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>");
        }
       
    }
}
