<?php
include_once 'controller/ProdutoController.php';
include_once './model/Produto.php';
$pr = new Produto();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            .btInput{
                padding: 10px 20px 10px 20px;
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .pad15{
                padding-bottom: 15px; padding-top: 15px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown link
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row" style="margin-top: 30px;">
                <div class="col-md-4">
                    <div class="card-header bg-dark text-center border
                         text-white"><strong>Cadastro de Produto</strong>
                    </div>
                    <div class="card-body border">
                        <?php
                        //envio dos dados para o BD
                        if (isset($_POST['cadastrarProduto'])) {
                            $nomeProduto = trim($_POST['nomeProduto']);
                            if ($nomeProduto != "") {
                                $vlrCompra = $_POST['vlrCompra'];
                                $vlrVenda = $_POST['vlrVenda'];
                                $qtdEstoque = $_POST['qtdEstoque'];

                                $pc = new ProdutoController();
                                unset($_POST['cadastrarProduto']);
                                echo $pc->inserirProduto($nomeProduto, $vlrCompra, $vlrVenda, $qtdEstoque);
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroProduto.php'\">";
                            }
                        }
                        if(isset($_POST['limpar'])){
                            $pc2 = new ProdutoController();
                            $pr = $pc2->limpar();
                            unset($_POST['limpar']);
                            $_GET = null;
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
                                    URL='cadastroProduto.php'\">";
                        }
                        if (isset($_GET)) {
                            $id = $_REQUEST['id'];
                            $pc = new ProdutoController();
                            $pr = $pc->pesquisarProdutoId($id);
                        }
                        ?>
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Código: </label> <br> 
                                    <label>Produto</label>  
                                    <input class="form-control" type="text" 
                                           name="nomeProduto" value="<?php echo $pr->getNomeProduto();?>">
                                    <label>Valor de Compra</label>  
                                    <input class="form-control" type="text" 
                                           value="<?php echo $pr->getVlrCompra();?>" name="vlrCompra">  
                                    <label>Valor de Venda</label>  
                                    <input class="form-control" type="text" 
                                           value="<?php echo $pr->getVlrVenda();?>" name="vlrVenda"> 
                                    <label>Qtde em Estoque</label>  
                                    <input class="form-control" type="number" 
                                           value="<?php echo $pr->getQtdEstoque();?>" name="qtdEstoque">
                                    <input type="submit" name="cadastrarProduto"
                                           class="btn btn-success btInput" value="Enviar">
                                    &nbsp;&nbsp;
                                    <input type="submit" 
                                           class="btn btn-light btInput" name="limpar" value="Limpar">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                    <table class="table table-striped table-responsive"
                           style="border-radius: 3px; overflow:hidden;">
                        <thead class="table-dark">
                            <tr><th>Código</th>
                                <th>Nome</th>
                                <th>Compra (R$)</th>
                                <th>Venda (R$)</th>
                                <th>Estoque</th>
                                <th>Ações</th></tr>
                        </thead>
                        <tbody>
                            <?php
                            $pcTable = new ProdutoController();
                            $listaProdutos = $pcTable->listarProdutos();
                            $a = 0;
                            if ($listaProdutos != null) {
                                foreach ($listaProdutos as $lp) {
                                    $a++;
                                    ?>
                                    <tr>
                                        <td><?php print_r($lp->getIdProduto()); ?></td>
                                        <td><?php print_r($lp->getNomeProduto()); ?></td>
                                        <td><?php print_r($lp->getVlrCompra()); ?></td>
                                        <td><?php print_r($lp->getVlrVenda()); ?></td>
                                        <td><?php print_r($lp->getQtdEstoque()); ?></td>
                                        <td><a href="cadastroProduto.php?id=<?php echo $lp->getIdProduto(); ?>"
                                                class="btn btn-light">
                                                <img src="img/edita.png" width="32"></a>
                                            </form>
                                            <button type="button" 
                                                    class="btn btn-light" data-bs-toggle="modal" 
                                                    data-bs-target="#exampleModal<?php echo $a; ?>">
                                                <img src="img/delete.png" width="32"></button></td>
                                    </tr>
                                    <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?php echo $a; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" 
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="get" action="excluiProduto.php">
                                                    <label><strong>Deseja excluir o produto 
                                                            <?php echo $lp->getNomeProduto(); ?>?</strong></label>
                                                    <input type="hidden" name="ide" 
                                                           value="<?php echo $lp->getIdProduto(); ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Sim</button>
                                                <button type="reset" class="btn btn-secondary" 
                                                        data-bs-dismiss="modal">Não</button>
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
        </div>     
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
        })
    </script> 
</body>
</html>

