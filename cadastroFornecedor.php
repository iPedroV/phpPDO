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

        .table{

            width: 50px;
        }
    </style>
    <script>
        function mascara(t, mask) {
            var i = t.value.length;
            var saida = mask.substring(1, 0);
            var texto = mask.substring(i)
            if (texto.substring(0, 1) != saida) {
                t.value += texto.substring(0, 1);
            }
        }
    </script>
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
                        $nomeFornecedor = trim($_POST['nomeFornecedor']);
                        if ($nomeFornecedor != "") {
                            $idfornecedor = $_POST['idfornecedor'];
                            $logradouro = $_POST['Logradouro'];

                            $complemento = $_POST['Complemento'];
                            $bairro = $_POST['Bairro'];
                            $cidade = $_POST['Cidade'];
                            $uf = $_POST['UF'];
                            $cep = $_POST['CEP'];
                            $representante = $_POST['Representante'];
                            $email = $_POST['Email'];
                            $telFixo = $_POST['TelFixo'];
                            $telCel = $_POST['TelCel'];

                            $pc = new FornecedorController();
                            unset($_POST['atualizarFornecedor']);
                            $msg = $pc->atualizarFornecedor($idfornecedor, $nomeFornecedor, $logradouro, 
                            $complemento, $bairro, $cidade, $uf, $cep, $representante,
                            $email, $telFixo, $telCel);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                URL='cadastroFornecedor.php'\">";
                        }
                    }

                    if (isset($_POST['Excluir'])) {
                        if ($pr != null) {
                            $id = $_POST['ide'];
                            
                            $fc = new FornecedorController();
                            unset($_POST['Excluir']);
                            $msg = $fc->excluirFornecedor($id);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                URL='cadastroFornecedor.php'\">";
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
                        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                URL='cadastroFornecedor.php'\">";
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
                                <input type="text" class="form-control" name="nomeFornecedor" value="<?php echo $pr->getnomeFornecedor(); ?>" >
                                <!-- COLOCAR O VALUE AI EM CIMA value=""-->
                                <label>CEP</label><label id="cepErro" style="color: red;" ></label>
                                <input class="form-control" type="text" id="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" value="<?php echo $pr->getCep(); ?>" name="CEP">
                                <label>Logradouro</label>
                                <input type="text" class="form-control" name="Logradouro" id="rua" value="<?php echo $pr->getLogradouro(); ?>" >
                                <label>Bairro</label>
                                <input type="text" class="form-control" name="Bairro" id="bairro" value="<?php echo $pr->getBairro(); ?>" >
                                <label>Cidade</label>
                                <input type="text" class="form-control" name="Cidade" id="cidade" value="<?php echo $pr->getCidade(); ?>" >
                                <label>UF</label>
                                <input type="text" class="form-control" name="UF" id="uf" value="<?php echo $pr->getUf(); ?>" maxlength="2" >
                                <label>Complemento</label>
                                <input type="text" class="form-control" name="Complemento" value="<?php echo $pr->getComplemento(); ?>" >
                                <label>Representante</label>
                                <input type="text" class="form-control" name="Representante" value="<?php echo $pr->getRepresentante(); ?>" >
                                <label>E-mail</label>
                                <input type="text" class="form-control" name="Email" value="<?php echo $pr->getEmail(); ?>" >
                                <label>Telefone Fixo</label>
                                <input type="text" class="form-control" name="TelFixo" onkeypress="mascara(this, '## ####-####')" maxlength="12" value="<?php echo $pr->getTelFixo(); ?>" >
                                <label>Telefone Celular</label>
                                <input type="text" class="form-control" name="TelCel" onkeypress="mascara(this, '## #####-####')" maxlength="13" value="<?php echo $pr->getTelCel(); ?>" >
                                <input type="submit" name="cadastrarFornecedor" class="btn btn-success btInput" value="Enviar">
                                <input type="submit" name="atualizarFornecedor" class="btn btn-light btInput" value="Atualizar">
                                <input type="submit" name="excluirFornecedor" class="btn btn-warning btInput" value="Excluir">
                                &nbsp; &nbsp;
                                <input type="submit" name="limpar" class="btn btn-danger btInput" value="Limpar">
                            </div>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

    <table class="table">
                    <thead class="thead-light bg-dark text-white">
                        <tr>
                            <th scope="col">ID Fornecedor</th>
                            <th scope="col">Nome do Fornecedor</th>
                            <th scope="col">Logradouro</th>

                            <th scope="col">Complemento</th>
                            <th scope="col">Bairro</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">UF</th>
                            <th scope="col">CEP</th>
                            <th scope="col">Representante</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Telefone Fixo</th>
                            <th scope="col">Telefone Celular</th>
                            <th scope="col">Ações</th>
                            
                            
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
                                                <form method="post" action="">
                                                    <label><strong>Deseja excluir o fornecedor <?php echo $ll->getNomeFornecedor(); ?>?</strong></label>
                                                    <input type="hidden" name="ide" value="<?php echo $ll->getIdFornecedor(); ?>">


                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="Excluir" class="btn btn-primary">Sim</button>
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
    <script src="js/JQuery.js"></script>
    <script src="js/JQuery.min.js"></script>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
    <!-- Adicionando Javascript controle de endereço via cep-->
    <script>
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#cepErro").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");


                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);

                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'CEP não encontrado'
                                })

                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'CEP Inválido'

                        })
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</body>

</html>