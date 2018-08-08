<?php
/**
 * Created by PhpStorm.
 * User: matheus.leite
 * Date: 07/08/2018
 * Time: 11:55
 */
require '../vendor/autoload.php';
$categoria = new Categoria();

if (empty($_POST['metodo'])) {
    echo "error: metodo não encontrado";
    exit;
}
$categoria->{$_POST['metodo']}();

if (empty($_POST['id'])) {
    echo "Não foi possivel obter um ID";
    exit;
}

$categoria->{$_POST['']}();
