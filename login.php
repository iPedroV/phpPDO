<?php
include_once 'controller/PessoaController.php';
include_once './model/Pessoa.php';
include_once './model/Mensagem.php';
$pe = new Pessoa();
$msg = new Mensagem();
?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <title>Página de Login</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="css/login.css" rel="stylesheet">
</head>

<body class="text-center bg-dark">
<?php
        if (isset($_POST['enviar'])){
            include_once './dao/daoPessoa.php';
            
            $login = trim($_POST['login']);
            $senha = $_POST['senha'];
            //$senha = md5($senhaSemCriptografia);
            echo "Senha:".$senhaSemCriptografia."<br>";
            
            $dp = new daoPessoa();
           echo "Check:".$check = $dp->procurarsenha($login,$senha)."<br>";
            if ($check == 1){
                echo "Logado";
                header("Location: cadastro.php");
                
            }else{
                
                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
                URL='login.php'\">";
            }

        }
        
        
        ?>
  <main class="form-signin">
    <form  method="post" action=""> <!-- Não pode faltar o método POST --> 
      <img class="mb-4" src="img/Ícone-Carrinho-de-Compras-PNG.png" alt="" width="62" height="57">
      <h1 class="h3 mb-3 fw-normal text-white">Login</h1>

      <div class="form-floating">
        <input type="text" class="form-control"  name="login" >
        <label for="floatingInput">Login</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control"  name="senha" >
        <label for="floatingPassword">Senha</label>
      </div>

      <div class="checkbox mb-3 text-white">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar-me
        </label>
      </div>
      <input class="btn btn-success" type="submit" name="enviar" value="Enviar"> 
      <p class="mt-5 mb-3 text-muted">&copy; 2020–2021</p>
    </form>
  </main>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>