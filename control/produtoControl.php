<?php
require '../vendor/autoload.php';
$produto = new Produto();
if (empty($_POST['metodo'])) {
    echo "error: metodo inválido !";
    exit;
}
$produto->{$_POST['metodo']}();
