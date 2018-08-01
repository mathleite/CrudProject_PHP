<?php
require '../vendor/autoload.php';

$comando = new Conexao();
$arrayProdutos = $comando->listar();
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
    <link rel="icon" href="../cloud.ico/favicon.ico">

    <title>Projeto - Sistema </title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php">Projeto Cadastro</a>


</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="../index.php">
                            <i class="material-icons">
                                home
                            </i>HOME

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../site/cadastro.php">
                            <i class="material-icons">
                                shopping_basket
                            </i>
                            Cadastrar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tabela.php">
                            <i class="material-icons">
                                format_align_left
                            </i>
                            Deletar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listagem.php">
                            <i class="material-icons">
                                border_color
                            </i>
                            Editar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../site/espacoFornecedor.php">
                            <i class="material-icons">
                                face
                            </i>
                            Fornecedor
                        </a>
                    <li class="nav-item">
                        <a class="nav-link" href="../site/espacoCategoria.php">
                            <i class="material-icons">
                                shopping_cart
                            </i>
                            Categoria
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            </div>
            <h4>Tabela de Produtos</h4>
            <h6 style="color: #dd0000">Selecione os 'Check-boxes' para deletar um produto.</h6>

            <br>

            <form method="post">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>nome</th>
                        <th>Categoria</th>
                        <th>Fornecedor</th>
                        <th>Lançamento</th>
                        <th>Venda</th>
                        <th>Unidade</th>
                        <th>&nbsp;</th>
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
                            <td>
                                <a href="editar.php?id=<?= $value['id'] ?>">Editar</a>
                                <div class="form-check">
                                </div>
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

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../js/bootstrap.min.js"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

<!-- Graphs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

</body>
</html>

