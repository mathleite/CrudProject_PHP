<?php
require '../../vendor/autoload.php';
$lista = new Produto();
$lista->setId($_GET['id']);
$produto = $lista->getId();

$fornecedor = new Fornecedor();
$fornecedor->setId($_GET['id']);
$fornecedorId = $fornecedor->receberFornecedor();

$categoria = new Categoria();
$categoria->setId($_GET['id']);
$categoriaId = $categoria->receberCategoria();
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
                <h1 class="h2">Editar Produto</h1>
            </div>
            <h4>Forneça os dados necessários</h4>
            <br>
            <h6 style="color: #dd0000;">Todos os campos devem ser preenchidos*</h6>
            <br>

            <form id="formularioEdicao">
                <div class="form-row">
                    <div class="col-sm-3">
                        <span style="margin-left: 10px"><strong>Nome</strong></span>
                        <input type="text" name="nome" class="form-control" placeholder="Nome"
                               value="<?= $produto['nome'] ?>">
                    </div>
                    <br>
                    <div class="col-sm-3">
                        <span style="margin-left: 10px"><strong>Categoria</strong></span>
                        <select class="form-control" name="categoria">
                            <?php foreach ($categoriaId as $novaCategoria) {
                                $selected = ($produto['categoria_id'] == $novaCategoria['id']) ? 'selected' : '';
                                ?>
                                <option value="<?= $novaCategoria['id'] ?>" <?= $selected ?>><?= $novaCategoria['descricao'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <br>
                    <div class="col-sm-3">
                        <span style="margin-left: 10px"><strong>Fornecedor</strong></span>
                        <select class="form-control" name="fornecedor">
                            <?php foreach ($fornecedorId as $novoFornecedor) {
                                $selected = ($produto['fornecedores_id'] == $novoFornecedor['id']) ? 'selected' : '';
                                ?>
                                <option value="<?= $novoFornecedor['id'] ?>" <?= $selected ?>><?= $novoFornecedor['nome'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <br>
                    <div class="col-sm-2">
                        <span style="margin-left: 10px"><strong>Data</strong></span>
                        
                        <input type="date" name="diaLancamento" class=" form-control"
                               value="<?= $produto['diaLancamento'] ?>">
                    </div>
                    <br>
                    <div class="col-sm-3">
                        <span style="margin-left: 10px"><strong>Preço Venda R$</strong></span>
                        <input type="number" name="precoVenda" step="any" class="form-control"
                               placeholder="Preço de Venda R$" value="<?= $produto['precoVenda'] ?>">
                    </div>
                    <br>
                    <div class="col-sm-3">
                        <span style="margin-left: 10px"><strong>Preço Unitário R$</strong></span>
                        <input type="number" name="precoUnitario" step="any" class="form-control"
                               placeholder="Preço Unitário R$" value="<?= $produto['precoUnitario'] ?>">
                    </div>
                    <div class="col">
                        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                    </div>
                </div>
                <br>
                <br>
                <button style="margin-left: 930px; width: 100px;" type="submit" id="salvar" class="btn btn-info">Salvar</button>
            </form>
        </main>
    </div>
</div>
<script src="/js/jquery-3.0.0.min.js"></script>
<script src="/js/editarProduto.js"></script>
</body>
</html>
