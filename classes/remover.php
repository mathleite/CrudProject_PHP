<?php
require '../vendor/autoload.php';
$conexao = new Conexao();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initual-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../css/remover.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<title>Exclusão de produto</title>
</head>

<body>
	<header id="cabecalho-topo">
        <h1 id="nome-projeto"><a id "nomeProjeto" href="../index.html">Projeto Sistema</a> <i class="material-icons">wb_cloudy</i></h1>

	</header>

	<main id="principal">
        <form id="formulario">
         <h2 id="remover">Remover</h2>
          <input type="text" placeholder="ID">
          <br>
          <small>Coloque o ID do item a ser removido</small>
        </div>
        <br>
        <button type="submit">Remover</button>
        </form>
        <br>
        <a  id="voltar" href="../index.html">Voltar</a>
	</main>
</body>
</html>
