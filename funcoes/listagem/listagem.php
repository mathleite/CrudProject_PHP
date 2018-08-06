<?php
require '../../vendor/autoload.php';

$comando = new Listar();
$arrayProdutos = $comando->listarTabela();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="icon" href="../../cloud.ico/favicon.ico">

    <title>Projeto - Sistema </title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../../index.php">Projeto Cadastro</a>


</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="listagem.php">
                            <i class="material-icons">
                                monetization_on
                            </i>
                            <span>Produtos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../espacos/espacoFornecedor.php">
                            <i class="material-icons">
                                face
                            </i>
                            Fornecedor
                        </a>
                    <li class="nav-item">
                        <a class="nav-link" href="../espacos/espacoCategoria.php">
                            <i class="material-icons">
                                shopping_cart
                            </i>
                            Categoria
                        </a>
                    </li>
                </ul>
                <hr style="background-color: #0062cc">
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            </div>
            <h4>Tabela de Produtos</h4>
            <h6 style="color: #dd0000">Selecione 'Editar' para poder editar o Lançamento</h6>
            <a href="../cadastros/cadastrar.php"><button style="width: 100px; margin-left: 865px;" type="button" class="btn btn-info">Novo</button></a>

            <br>

            <form method="post">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Fornecedor</th>
                        <th>Lançamento</th>
                        <th>Venda</th>
                        <th>Unidade</th>
                        <th>Ações</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($arrayProdutos as $value) { ?>
                        <tr>
                            <th scope="row"><?= $value['id']; ?></th>
                            <td><?= $value['nome']; ?></td>
                            <td><?= $value['descricao_categoria']; ?></td>
                            <td><?= $value['nome_fornecedores']; ?></td>
                            <td><?= $value['diaLancamento']; ?></td>
                            <td>R$ <?= $value['precoVenda']; ?></td>
                            <td>R$ <?= $value['precoUnitario']; ?></td>
                            <td><a  href="../editar/editar.php?id=<?= $value['id'] ?>">Editar</a>
                                <a  style="color: #dd0000;" href="listagemDeletar.php">Deletar</a>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                    <br>
                </table>
            </form>


        </main>
    </div>
</div>

<script src="../../js/popper.min.js"></script>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../js/bootstrap.min.js"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

<!-- Graphs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

</body>
</html>
