<?php

include_once 'LivroController.php';

$id = $_REQUEST['id'];
$lc = new LivroController();

$lc->pesquisarLivroID($id);

header("Location: ../cadastroLivro.php");

?>