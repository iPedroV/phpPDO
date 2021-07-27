<?php
include_once 'controller/FornecedorController.php';
include_once './model/Fornecedor.php';
$pr = new Fornecedor();
$btEnviar = FALSE;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Fornecedores</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        .espaco {
            padding: 24px;
        }

        .btInput {
            margin-top: 20px;
            padding-left: 10px;
            padding-right: 10px;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
            text-align: center;

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
            <div class="col-md-6 offset-md-3">
                <div class="card-header bg-light text-center">
                    Cadastro de Fornecedor
                </div>
                <div class="card-body border">
                    <?php
                    include_once('../phpPDO/controller/FornecedorController.php');
                    //envio dos dados para o banco
                    if (isset($_POST['cadastrarFornecedor'])) {
                        $nomeFornecedor = trim($_POST['nomeFornecedor']);
                        if ($nomeFornecedor != "") {
                            $Logradouro = $_POST['Logradouro'];
                            $Numero = $_POST['Numero'];
                            $Complemento = $_POST['Complemento'];
                            $Bairro = $_POST['Bairro'];
                            $Cidade = $_POST['Cidade'];
                            $Uf = $_POST['UF'];
                            $Cep = $_POST['CEP'];
                            $Representante = $_POST['Representante'];
                            $Email = $_POST['Email'];
                            $TelFixo = $_POST['TelFixo'];
                            $TelCel = $_POST['TelCel'];

                            $pc = new FornecedorController();
                            unset($_POST['cadastrarFornecedor']);
                            $msg =  $pc->inserirFornecedor(
                                $nomeFornecedor,
                                $Logradouro,
                                $Numero,
                                $Complemento,
                                $Bairro,
                                $Cidade,
                                $Uf,
                                $Cep,
                                $Representante,
                                $Email,
                                $TelFixo,
                                $TelCel
                                );
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                URL='cadastroFornecedor.php'\">";
                        }
                    }

                    //método para atualizar dados do produto no BD
                    if (isset($_POST['atualizarFornecedor'])) {
                        $nomeFornecedor = trim($_POST['cadastrarFornecedor']);
                        if ($nomeFornecedor != "") {
                            $Logradouro = $_POST['Logradouro'];
                            $Numero = $_POST['Numero'];
                            $Complemento = $_POST['Complemento'];
                            $Bairro = $_POST['Bairro'];
                            $Cidade = $_POST['Cidade'];
                            $Uf = $_POST['UF'];
                            $Cep = $_POST['CEP'];
                            $Representante = $_POST['Representante'];
                            $Email = $_POST['Email'];
                            $TelFixo = $_POST['TelFixo'];
                            $TelCel = $_POST['TelCel'];

                            $pc = new FornecedorController();
                            unset($_POST['atualizarFornecedor']);
                            $msg = $pc->atualizarFornecedor($id, $nomeFornecedor, $Logradouro, 
                            $Numero, $Complemento, $Bairro, $Cidade, $Uf, $Cep, $Representante,
                            $Email, $TelFixo, $TelCel);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                URL='../cadastroFornecedor.php'\">";
                        }
                    }

                    if (isset($_POST['excluirFornecedor'])) {
                        if ($pr != null) {
                            $id = $_POST['idfornecedor']; 
                            $lc = new FornecedorController();
                            $lc->excluirFornecedor($id);
                            #$id = $pr->getIdFornecedor();
                        }
                    }
                    if (isset($_POST['limpar'])) {
                        $pr = null;
                        unset($_GET['id']);
                        header("Location: cadastroFornecedor.php");
                    }
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $pc = new FornecedorController();
                        $pr = $pc->pesquisarFornecedorID($id);
                    }
                    ?>
                    <form method="post" action="">
                        <div class="row g-3">
                            <div class="col-md-6 offset-md-3">
                                <strong>Código: <label>
                                        <?php
                                        if ($pr != null) {
                                            echo $pr->getIdFornecedor();
                                        }
                                        ?>
                                    </label></strong>
                                <input type="hidden" name="idfornecedor" value="<?php echo $pr->getIdFornecedor(); ?>">
                                <br>
                                <label>Nome do Fornecedor</label>
                                <input type="text" class="form-control" name="nomeFornecedor" value="<?php echo $pr->getnomeFornecedor(); ?>" required>
                                <!-- COLOCAR O VALUE AI EM CIMA value=""-->
                                <label>Logradouro</label>
                                <input type="text" class="form-control" name="Logradouro" value="<?php echo $pr->getLogradouro(); ?>" required>
                                <label>Número</label>
                                <input type="text" class="form-control" name="Numero" value="<?php echo $pr->getNumero(); ?>" required>
                                <label>Complemento</label>
                                <input type="text" class="form-control" name="Complemento" value="<?php echo $pr->getComplemento(); ?>" required>
                                <label>Bairro</label>
                                <input type="text" class="form-control" name="Bairro" value="<?php echo $pr->getBairro(); ?>" required>
                                <label>Cidade</label>
                                <input type="text" class="form-control" name="Cidade" value="<?php echo $pr->getCidade(); ?>" required>
                                <label>UF</label>
                                <input type="text" class="form-control" name="UF" value="<?php echo $pr->getUf(); ?>" required>
                                <label>CEP</label>
                                <input type="text" class="form-control" name="CEP" value="<?php echo $pr->getCep(); ?>" required>
                                <label>Representante</label>
                                <input type="text" class="form-control" name="Representante" value="<?php echo $pr->getRepresentante(); ?>" required>
                                <label>E-mail</label>
                                <input type="text" class="form-control" name="Email" value="<?php echo $pr->getEmail(); ?>" required>
                                <label>Telefone Fixo</label>
                                <input type="text" class="form-control" name="TelFixo" value="<?php echo $pr->getTelFixo(); ?>" required>
                                <label>Telefone Celular</label>
                                <input type="text" class="form-control" name="TelCel" value="<?php echo $pr->getTelCel(); ?>" required>
                                <input type="submit" name="cadastrarFornecedor" class="btn btn-success btInput" value="Enviar">
                                <input type="submit" name="atualizarFornecedor" class="btn btn-light btInput" value="Atualizar">
                                <input type="submit" name="excluirFornecedor" class="btn btn-warning btInput" value="Excluir">
                                &nbsp; &nbsp;
                                <input type="submit" name="limpar" class="btn btn-danger btInput" value="Limpar">
                            </div>
                        </div>
                    </form>

                </div>
                <table class="table">
                    <thead class="thead-light bg-dark text-white">
                        <tr>
                            <th scope="col">ID Fornecedor</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Editora</th>
                            <th scope="col">Estoque</th>
                            <th scope="col text-center">Ações</th>
                            <th scope="col text-center">Ações</th>
                            <th scope="col text-center">Ações</th>
                            <th scope="col text-center">Ações</th>
                            <th scope="col text-center">Ações</th>
                            <th scope="col text-center">Ações</th>
                            <th scope="col text-center">Ações</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $lcTable = new FornecedorController();
                        $listaFornecedores = $lcTable->listarFornecedores();
                        $a = 0;
                        if ($listaFornecedores != null) {
                            foreach ($listaFornecedores as $ll) {
                                $a++;

                                /* print_r("<tr><td>" . $lp->getIdProduto() . "</td>");
                            print_r("<td>" . $lp->getNomeProduto() . "</td>");
                            print_r("<td>" . $lp->getVlrCompra(). "</td>");
                            print_r("<td>" . $lp->getVlrVenda() . "</td>");
                            print_r("<td>" . $lp->getQtdEstoque() . "</td></tr>");*/


                        ?>
                                <tr>
                                    <td><?php print_r($ll->getIdFornecedor()); ?></td>
                                    <td><?php print_r($ll->getNomeFornecedor()); ?></td>
                                    <td><?php print_r($ll->getLogradouro()); ?></td>
                                    <td><?php print_r($ll->getNumero()); ?></td>
                                    <td><?php print_r($ll->getComplemento()); ?></td>
                                    <td><?php print_r($ll->getBairro()); ?></td>
                                    <td><?php print_r($ll->getCidade()); ?></td>
                                    <td><?php print_r($ll->getUf()); ?></td>
                                    <td><?php print_r($ll->getCep()); ?></td>
                                    <td><?php print_r($ll->getRepresentante()); ?></td>
                                    <td><?php print_r($ll->getEmail()); ?></td>
                                    <td><?php print_r($ll->getTelFixo()); ?></td>
                                    <td><?php print_r($ll->getTelCel()); ?></td>
                                    <td>
                                        <a class="btn btn-outline-dark" href="cadastroFornecedor.php?id=<?php echo $ll->getIdFornecedor(); ?>">Editar</a>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $a; ?>">Excluir</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal<?php echo $a; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="get" action="controller/excluiFornecedor.php">
                                                    <label><strong>Deseja excluir o fornecedor <?php echo $ll->getTitulo(); ?>?</strong></label>
                                                    <input type="hidden" name="ide" value="<?php echo $ll->getIdFornecedor(); ?>">


                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Sim</button>
                                                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>




                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>