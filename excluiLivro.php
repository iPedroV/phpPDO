<?php
include_once 'C:/xampp/htdocs/php01/controller/LivroController.php';

$id = $_REQUEST['ide'];
$lc = new LivroController();

$lc->excluirLivro($id);

?>