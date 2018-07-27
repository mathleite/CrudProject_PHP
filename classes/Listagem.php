<?php
require '../vendor/autoload.php';

$comando = new Conexao();
$arrayProdutos = $comando->listar();

?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
    <link rel="stylesheet" href="../css/listagem.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">


    <title>Listagem de Produtos</title>
</head>
<header id="cabecalho-topo">
    <h1 id="nome-projeto"><a id="link-projeto" href="../index.html">Projeto Sistema</a> <i class="material-icons">wb_cloudy</i>
    </h1>

</header>
<body>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Categoria</th>
        <th scope="col">Fornecedor</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach ($arrayProdutos as $value){?>
        <tr>
            <th scope="row"><?= $value['id'];?></th>
            <td><?= $value['nome'];?></td>
            <td><?= $value['categoria'];?></td>
            <td><?= $value['nome_fornecedor'];?></td>
        </tr>
    <?php }?>

    </tbody>
</table>

<a href="../index.html">
    <button type="button" class="btn btn-dark">Voltar</button>
</a>

<script src="../js/jquery-3.0.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>

</html>
