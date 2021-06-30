<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Teste</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css">

    <style>
        .espaco
        {
            padding: 10px;
        }
    </style>
</head>

<body>
<div class="container">
        <div class="row espaco ">
            <div class="col-xl-8 col-md-10 offset-md-2  "
                style="margin-top: 12%;">
                <form method="POST" action="conecta.php">
                <div class="mb-3">
                    <label for="inputAddress" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                </div>
                <div class="mb-3">
                    <label for="inputAddress2" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required>
                </div>
                <div class="mb-3">
                    <label for="nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="nascimento" name="nascimento" required>
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">Telefone: </label>
                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="Telefone" required>
                </div>
                <div class="mb-3">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label for="inputSenha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                </div>

                <div class="mb-3">
                    <label for="inputSexo" class="form-label">Sexo</label>
                    <input type="text" class="form-control" id="sexo" name="sexo" placeholder="Sexo" required>
                </div>
 
            </div>
        </div>
    </div>
</body>

</html>