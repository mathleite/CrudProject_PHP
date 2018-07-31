<?php
require '../vendor/autoload.php';
$inserir = new Conexao();
$arrayLista = $inserir->listarId();
$arrayCategoria = $inserir->receberCategoria();
$arrayFornecedor = $inserir->receberFornecedor();
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
                        <a class="nav-link" href="listagem.php">
                            <i class="material-icons">
                                format_align_left
                            </i>
                            Tabela
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
                </ul>

                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Editar Produto</h1>

            </div>
            <h4>Forneça os dados necessários</h4>
            <br>
            <h6 style="color: #dd0000;">Todos os campos devem ser preenchidos*</h6>
            <br>
            <?php foreach ($arrayLista as $value) { ?>

                <form id="formulario" action="update.php" method="get">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="nome" class="form-control"
                                   placeholder="Nome" value="<?= $value['nome'] ?>">
                        </div>
                        <div class="col">
                            <select class="form-control" name="categoria">
                                <?php foreach ($arrayCategoria as $categoria) { ?>

                                    <option value="<?= $categoria['id'] ?>"><?= $categoria['descricao'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control" name="fornecedor">
                                <?php foreach ($arrayFornecedor as $fornecedores) { ?>

                                    <option value="<?= $fornecedores['id'] ?>"><?= $fornecedores['nome'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col">
                            <input type="date" name="diaLancamento"
                                   class=" form-control" value="<?= $value['diaLancamento'] ?>">
                        </div>
                        <div class="col">
                            <input type="number" name="precoVenda" step="any" class="form-control"
                                   placeholder="Preço de Venda R$" value="<?= $value['precoVenda'] ?>">
                        </div>
                        <div class="col">
                            <input type="number" name="precoUnitario" step="any" class="form-control"
                                   placeholder="Preço Unitário R$" value="<?= $value['precoUnitario'] ?>">
                        </div>
                        <div class="col">
                            <input type="hidden" name="id" value="<?= $value['id'] ?>">
                        </div>
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </form>
            <?php } ?>


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

