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


switch ($_POST['metodo']) {
    case 'excluir':
        $id = (int)$_POST['id'];
        $fornecedor->excluir($id);
        break;

    case 'updateFornecedor':
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $fornecedor->updateFornecedor($id, $nome);
        break;

    case 'cadastrarFornecedor':
        $novoFornecedor = $_POST['novoFornecedor'];
        $fornecedor->cadastrarFornecedor($novoFornecedor);
        break;
}




