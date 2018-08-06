<?php

class Atualizar
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new PDO("mysql: host=localhost; dbname=sistema_cadastro", "root", "");
    }

    public function editar($nome, $categoria, $fornecedor, $diaLancamento, $precoVenda, $precoUnitario)
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $sql = "
        UPDATE
            produtos p
        SET
            p.nome = :nome,
            p.categoria_id = :categoria_id,
            p.fornecedores_id = :fornecedores_id,
            p.diaLancamento = :diaLancamento,
            p.precoVenda = :precoVenda,
            p.precoUnitario = :precoUnitario
        WHERE
            p.id = :id
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->bindParam(":nome", $nome);
        $comando->bindParam(":categoria_id", $categoria);
        $comando->bindParam(":fornecedores_id", $fornecedor);
        $comando->bindParam(":diaLancamento", $diaLancamento);
        $comando->bindParam(":precoVenda", $precoVenda);
        $comando->bindParam(":precoUnitario", $precoUnitario);
        $comando->bindParam(":id", $id);

        $comando->execute();
    }

    public function updateCategoria($categoria)
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $sql = "
        UPDATE
            categoria
        SET 
            descricao = :descricao
        WHERE
            id= :id
            ";
        $comando = $this->conexao->prepare($sql);
        $comando->bindParam(":descricao", $categoria);
        $comando->bindParam(":id", $id);
        $comando->execute();

    }

    public function updateFornecedor($fornecedor)
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $sql = "
        UPDATE
            fornecedores
        SET 
            nome = :nome
        WHERE
            id= :id
            ";
        $comando = $this->conexao->prepare($sql);
        $comando->bindParam(":nome", $fornecedor);
        $comando->bindParam(":id", $id);
        $comando->execute();

    }
}