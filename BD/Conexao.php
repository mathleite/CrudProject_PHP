<?php

class Conexao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new PDO("mysql: host=localhost; dbname=sistema_cadastro", "root", "");
    }

    public function cadastar($nomeProduto, $Categoria, $fornecedor, $diaLancamento, $precoVenda, $precoUnitario)
    {
        $sql = "
        INSERT INTO 
            produtos(
            nome, 
            categoria, 
            fornecedor, 
            diaLancamento, 
            precoVenda, 
            precoUnitario) 
        VALUES
            (:NOME, 
            :CATEGORIA,
            :FORNECEDOR, 
            :LANCAMENTO, 
            :VENDA, 
            :UNIDADE)
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->bindParam(":NOME", $nomeProduto);
        $comando->bindParam(":CATEGORIA", $Categoria);
        $comando->bindParam(":FORNECEDOR", $fornecedor);
        $comando->bindParam(":LANCAMENTO", $diaLancamento);
        $comando->bindParam(":VENDA", $precoVenda);
        $comando->bindParam(":UNIDADE", $precoUnitario);
        $comando->execute();
    }

    public function listar(): array
    {
        $sql = "
        SELECT
            p.id,
            p.nome,
            p.categoria,
            p.fornecedor,
            p.precoVenda,
            p.precoUnitario,
            DATE_FORMAT(diaLancamento, '%d/%c/%Y')
        AS 
            diaLancamento

            
        FROM 
            produtos p
        ORDER BY 
            p.id ASC
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();

        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarId(): array
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $sql = "
        SELECT
            p.id,
            p.nome,
            p.categoria,
            p.fornecedor,
            p.precoVenda,
            p.precoUnitario,
            p.diaLancamento

            
        FROM 
            produtos p
        WHERE 
            id = $id
        ORDER BY 
            p.id ASC
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();

        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletar()
    {
        foreach ($_POST['selecionado'] as $selecionados) {
            $sql = "
            DELETE FROM 
                produtos 
            WHERE  
                id = $selecionados
             ";
            $comando = $this->conexao->prepare($sql);
            $comando->execute();
        }


    }

    public function editar($nome, $categoria, $fornecedor, $precoVenda, $precoUnitario)
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $sql ="
        UPDATE
            produtos p
        SET
            p.nome = :nome,
            p.categoria = :categoria,
            p.fornecedor = :fornecedor,
            p.precoVenda = :precoVenda,
            p.precoUnitario = :precoUnitario
        WHERE
            p.id = :id
        ";

        $comando = $this->conexao->prepare($sql);
        $comando->bindParam(":nome", $nome);
        $comando->bindParam(":categoria", $categoria);
        $comando->bindParam(":fornecedor", $fornecedor);
        $comando->bindParam(":precoVenda", $precoVenda);
        $comando->bindParam(":precoUnitario", $precoUnitario);
        $comando->bindParam(":id", $id);

        $comando->execute();
    }




}
