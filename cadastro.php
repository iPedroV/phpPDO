<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Teste</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        .espaco {
            padding: 24px;
        }
        .btInput {
            padding-left: 10px;
            padding-right: 10px;
        }
        
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid ">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card-header bg-light text-center">
                    Cadastro do Cliente
                </div>
                <div class="card-body border">
                    <form method="post" action="">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Código</label><br>
                                <label>Nome completo</label>
                                <input type="text" class="form-control" name="nome" required>
                                <label>Data de Nacimento</label>
                                <input type="date" class="form-control" name="dtNasc" required>
                                <label>Perfil</label>
                                
                                <select name="perfil" class="form-control">
                                    <option>[--SELECT--]</option>
                                    <option>Cliente</option>
                                    <option>Funcionário</option>
                                </select>
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-md-6 espaco">
                                <label>Login</label>
                                <input type="text" class="form-control" name="login">
                                <label>Senha</label>
                                <input type="password" class="form-control" name="senha" required>
                                <label>Confirmar Senha</label>
                                <input type="password" class="form-control" name="senha2" required>
                                <label>CPF</label>
                                <input type="text" class="form-control" name="cpf" required>
                            </div> 

                            
                        </div>
                      
                        <div class="col-md-6 offset-5">
                                <input type="submit" name="cadastrar" class="btn btn-success btInput" value="Enviar">
                                &nbsp; &nbsp;
                                <input type="reset" class="btn btn-danger btInput" value="Limpar">
                            </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
        <?php
            //envio dos dados para o banco
            if(isset($_POST['cadastrar'])){
                $nome = $_POST['nome'];
                $dtNasc = $_POST['dtNasc'];
                $login = $_POST['login'];
                $senha = $_POST['senha'];
                $perfil = $_POST['perfil'];
                $cpf = $_POST['cpf'];
                $email = $_POST['email'];
                $pc = PessoaControler();
                $pc->inserirPessoa()
            }
        ?>

    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>