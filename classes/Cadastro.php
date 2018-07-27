<?php
require '../vendor/autoload.php';
$nomeProduto = $_POST['nomeProduto'];
$Categoria = $_POST['categoria'];
$fornecedor = $_POST['nomeFornecedor'];

if (empty($nomeProduto) || empty($Categoria) || empty($fornecedor)) {
        echo "<p>Dados inválidos!</p>".PHP_EOL;
        echo "<a href='http://localhost/html/cadastro.html'>voltar</p>";
        exit;
}

try {
    $conexao = new Conexao();
    $conexao->cadastar($nomeProduto, $Categoria, $fornecedor);

    echo "<p>Dados salvos com sucesso!</p>".PHP_EOL;
    echo "<a href='http://localhost/classes/Listagem.php'>Ver produtos</p>";
} catch (\Exception $e) {
    throw new \Exception("Cadastro feito com sucesso", 1);

}
