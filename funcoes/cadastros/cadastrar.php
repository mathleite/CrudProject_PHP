<?php
require '../../vendor/autoload.php';
$lista = new Listar();
$arrayCategoria = $lista->receberCategoria();
$arrayFornecedor = $lista->receberFornecedor();
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
                        <a class="nav-link" href="../listagem/listagem.php">
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
                <h1 class="h2">Cadastrar Produto</h1>

            </div>
            <h4>Forneça os dados necessários</h4>

            <h6 style="color: #dd0000;">Todos os campos devem ser preenchidos*</h6>
            <br>
            <br>
            <form id="formulario" action="cadastroUpdate.php" method="post">
                <div class="form-row">
                    <div class="col">
                        <span><strong>Nome</strong></span><input type="text" name="nomeProduto" class="form-control" placeholder="Nome">
                    </div>

                    <div class="col">

                        <span><strong>Categoria</strong></span><select class="form-control" name="categoria">
                            <?php foreach ($arrayCategoria as $categoria) { ?>

                                <option value="<?= $categoria['id'] ?>"><?= $categoria['descricao'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col">
                        <span><strong>Fornecedor</strong></span><select class="form-control" name="fornecedor">
                            <?php foreach ($arrayFornecedor as $fornecedores) { ?>

                                <option value="<?= $fornecedores['id'] ?>"><?= $fornecedores['nome'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col">
                        <span><strong>Dia do Lançamento</strong></span><input type="date" name="diaLancamento" class="form-control">
                    </div>
                    <div class="col">
                        <span><strong>Preço de Venda</strong></span><input type="number" name="precoVenda" step="any" class="form-control" placeholder="Preço de Venda R$">
                    </div>
                    <div class="col">
                        <span><strong>Preço Unitário</strong></span><input type="number" name="precoUnitario" step="any" class="form-control" placeholder="Preço Unitário R$">
                    </div>
                </div>
                <br>
                <br>
                <button style="margin-left: 930px; " type="submit" class="btn btn-success">Cadastrar</button>
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
