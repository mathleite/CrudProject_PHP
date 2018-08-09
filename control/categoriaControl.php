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
    echo "Error: sem metodo";
    exit;
}

switch ($_POST['metodo']) {
    case 'cadastrarCategoria':
        $novaCategoria = $_POST['novaCategoria'];
        $categoria->cadastrarCategoria($novaCategoria);
        break;

    case 'excluir':
        $id = $_POST['id'];
        $categoria->excluir($id);
        break;

    case 'atualizarCategoria':
        $id = $_POST['id'];
        $descricao = $_POST['descricao'];
        $categoria->atualizarCategoria($id, $descricao);
        break;
}
