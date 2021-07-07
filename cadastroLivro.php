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
            <div class="col-4 offset-4">
                <div class="card-header bg-light text-center">
                    Cadastro de Produto
                </div>
                <div class="card-body border">
                    <form method="post" action="">
                        <div class="row g-3">
                            <div class="col-md-6 offset-md-3">
                                <label>Código</label><br>
                                <label>Titulo</label>
                                <input type="text" class="form-control" name="titulo" required>
                                <label>Autor</label>
                                <input type="text" class="form-control" name="autor" required>
                                <label>Editora</label>
                                <input type="text" class="form-control" name="editora" required>
                                <label>qtdEstoque</label>
                                <input type="number" class="form-control" name="qtdEstoque" required>
                                <input type="submit" name="cadastrarLivro" class="btn btn-success btInput" value="Enviar">
                                &nbsp; &nbsp;
                                <input type="reset" class="btn btn-danger btInput" value="Limpar">
                            </div>
                        </div>
                    </form>
                    <?php
                    include_once('../php01/controller/LivroController.php');
                    //envio dos dados para o banco
                    if (isset($_POST['cadastrarLivro'])) {
                        $titulo = $_POST['titulo'];
                        $autor = $_POST['autor'];
                        $editora = $_POST['editora'];
                        $qtdEstoque = $_POST['qtdEstoque'];

                        $pc = new LivroController();
                        echo "<p>" . $pc->inserirLivro(
                            $titulo,
                            $autor,
                            $editora,
                            $qtdEstoque
                        ) . "</p>";
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid ">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <table class="table">
                <thead class="thead-light bg-dark text-white">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Editora</th>
                        <th scope="col">Estoque</th>
                        <th scope="col-md-6">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pcTable = new LivroController();
                    $listaLivros = $pcTable->listarLivros();

                    foreach ($listaLivros as $li) {
                    ?>
                        <tr>
                            <td><?php print_r($li->getIdLivro()); ?></td>
                            <td><?php print_r($li->getTitulo()); ?></td>
                            <td><?php print_r($li->getAutor()); ?></td>
                            <td><?php print_r($li->getEditora()); ?></td>
                            <td><?php print_r($li->getQtdEstoque()); ?></td>
                            <td><a class="btn btn-outline-dark" href="#?idlivro=<?php echo $lp->getIdLivro(); ?>"><button type="button" 
                                            class="btn btn-light" data-bs-toggle="modal" 
                                            data-bs-target="#exampleModal<?php echo $a;?>">
                                <a class="btn btn-outline-danger" href="?idlivro">Excluir</a>
                            </td>
                        </tr>
                        <td><a class="btn btn-light" 
                                       href="#?id=<?php echo $lp->getIdLivro(); ?>">
                                        
                                    <button type="button" 
                                            class="btn btn-light" data-bs-toggle="modal" 
                                            data-bs-target="#exampleModal<?php echo $a;?>">
                                        </td>
                            </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $a;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Contexto....<?php echo $lp->getIdLivro(); ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Sim</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
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