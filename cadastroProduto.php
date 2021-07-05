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
            margin-top: 20px;
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
            <div class="col-4 offset-4">
                <div class="card-header bg-light text-center">
                    Cadastro de Produto
                </div>
                <div class="card-body border">
                    <form method="post" action="">
                        <div class="row g-3">
                            <div class="col-md-6 offset-md-3">
                                <label>Código</label><br>
                                <label>Produto</label>
                                <input type="text" class="form-control" name="nomeProduto" required>
                                <label>Valor de compra</label>
                                <input type="text" class="form-control" name="vlrCompra" required>
                                <label>Valor de venda</label>
                                <input type="text" class="form-control" name="vlrVenda" required>
                                <label>Qtde de venda</label>
                                <input type="number" class="form-control" name="qtdEstoque" required>
                                <input type="submit" name="cadastrarProduto" class="btn btn-success btInput" value="Enviar">
                                &nbsp; &nbsp;
                                <input type="reset" class="btn btn-danger btInput" value="Limpar">
                            </div>
                        </div>
                    </form>
                    <?php
                    include_once ('../php01/controller/ProdutoController.php');
                    //envio dos dados para o banco
                    if (isset($_POST['cadastrarProduto'])) {
                        $nomeProduto = $_POST['nomeProduto'];
                        $vlrCompra = $_POST['vlrCompra'];
                        $vlrVenda = $_POST['vlrVenda'];
                        $qtdEstoque = $_POST['qtdEstoque'];

                        $pc = new ProdutoController();
                        echo "<p>" . $pc->inserirProduto(
                            $nomeProduto,
                            $vlrCompra,
                            $vlrVenda,
                            $qtdEstoque
                        ) . "</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>