<?php
$conexao = new PDO("mysql: host=localhost; dbname=sistema_cadastro", "root", "");
$comando = $conexao->prepare("SELECT * FROM produto");
    while($itens = mysql_fetch_array($comando)) {
        echo $itens['nome']."<br>".$itens['categoria']."<br>".$itens['nome_fornecedor']."<br>";

}
