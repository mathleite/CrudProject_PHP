<?php
require '../vendor/autoload.php';
$nomeProduto = $_POST['nomeProduto'];
$Categoria = $_POST['categoria'];
$fornecedor = $_POST['nomeFornecedor'];
?>
<!doctype html>
<html lang="pt_br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="../cloud.ico/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css">

    <title>Projeto - Sistema </title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php">Projeto Cadastro</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">

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
                        <a class="nav-link" href="../site/cadastro.html">
                            <i class="material-icons">
                                shopping_basket
                            </i>
                            Produtos
                        </a>
                    </li>
                </ul>

                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Cadastrar Produto</h1>

            </div>
            <?php
            if (empty($nomeProduto) || empty($Categoria) || empty($fornecedor)) {
                echo "<p>Dados inválidos!</p>" . PHP_EOL;
                echo "<a href='http://localhost/Projeto-SistemaCadastro/site/cadastro.html'>
    <button type=\"submit\" class=\"btn btn-success\">Voltar</button></a>";
                exit;
            }

            try {
                $conexao = new Conexao();
                $conexao->cadastar($nomeProduto, $Categoria, $fornecedor);

                echo "<p>Dados salvos com sucesso!</p>" . PHP_EOL;
                echo "<a href='listagem.php'><button type=\"submit\" class=\"btn btn-success\">Ver Produtos</button></a>";
                echo "</form>";
            } catch (\Exception $e) {
                throw new \Exception("Cadastro feito com sucesso", 1);

            }
            ?>

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

