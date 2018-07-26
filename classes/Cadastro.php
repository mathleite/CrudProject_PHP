<?php

$nomeProduto = $_POST['nomeProduto'];
$Categoria = $_POST['categoria'];
$fornecedor = $_POST['nomeFornecedor'];

if (empty($nomeProduto) || empty($Categoria) || empty($fornecedor)) {
        echo "<p>Dados inválidos!</p>".PHP_EOL;
        echo "<a href='http://localhost/html/cadastro.html'>voltar</p>";
        exit;
}

try {
    $conexao = new PDO("mysql: host=localhost; dbname=sistema_cadastro", "root", "");
    $comando = $conexao->prepare("INSERT INTO produto(nome, categoria, nome_fornecedor) VALUES(:NOME, :CATEGORIA,
    :NOME_FORNECEDOR)");
    $comando->bindParam(":NOME", $nomeProduto);
    $comando->bindParam(":CATEGORIA", $Categoria);
    $comando->bindParam(":NOME_FORNECEDOR", $fornecedor);
    $comando->execute();

    echo "<p>Dados salvos com sucesso!</p>".PHP_EOL;
    echo "<a href='http://localhost/classes/Listagem.php'>voltar</p>";
} catch (\Exception $e) {
    throw new \Exception("Cadastro feito com sucesso", 1);

}
