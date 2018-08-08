<?php
/**
 * Created by PhpStorm.
 * User: matheus.leite
 * Date: 07/08/2018
 * Time: 13:44
 */
require '../vendor/autoload.php';
$fornecedor = new Fornecedor();

if (empty($_POST['metodo'])) {
    echo 'error: método não existe!';
    exit;
}
$fornecedor->{$_POST['metodo']}();

if(empty($_POST['id'])){
    echo 'Fornecedor não possui ID';
    exit;
}
$fornecedor->{$_POST['metodo']}();




