<?php
require '../../vendor/autoload.php';
$lista = new Categoria();
$arrayCategorias = $lista->receberCategoria();
 ?>

<!doctype html>
<html lang="pt_br">
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
                        <a class="nav-link" href="espacoFornecedor.php">
                            <i class="material-icons">
                                face
                            </i>
                            Fornecedor
                        </a>
                    <li class="nav-item">
                        <a class="nav-link" href="espacoCategoria.php">
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
            <h4>Espaço das Categorias</h4>


            <br>

            <form action="../cadastros/cadastroCategoria.php" method="get">
                <div class="form-row">
                    <div class="col">
                        <span><strong>Cadastrar - categoria:</strong></span><input type="text" name="novaCategoria"
                                                                                   class="form-control"
                                                                                   placeholder="Nome">
                        <br>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>

                </div>
            </form>

            <hr style="background-color: #007bff">
            <h4>Editar - Categorias: </h4>
            <h6 style="color: #dd0000">Selecione o 'Check-box' para deletar um produto.</h6>
            <br>
            <form id="formularioCategoria" method="post">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Categorias</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($arrayCategorias

                    as $categoria){ ?>
                    <tr>
                        <th scope="row"><?= $categoria['id'] ?></th>
                        <td><?= $categoria['descricao'] ?></td>
                        <td><a href="../editar/editarCategoria.php?id=<?= $categoria['id'] ?>">Editar</a>
                            <a style="color: #dd0000" href="javascript:void(0)"
                               onclick="excluir('<?= $categoria['id'] ?>')">Deletar</a>
                        </td>
                    </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </form>
            <br>
            <br>


        </main>
    </div>
</div>
<script src="/js/jquery-3.0.0.min.js"></script>
<script>
    function excluir(id) {
        alert('Categoria excluida com sucesso!!');
        $.ajax({
            url: '/control/categoriaControl.php',
            type: 'POST',
            data: {
                'id': id
            },
            success: function (data) {
                window.location.reload();
            }
        });
    }
</script>
</body>
</html>
