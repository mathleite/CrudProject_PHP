<?php

class Listar
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new PDO("mysql: host=localhost; dbname=sistema_cadastro", "root", "");
    }

    public function listarTabela(): array
    {
        $sql = "
        SELECT
	     	p.id,
	        p.nome,
	        p.categoria_id,
            p.fornecedores_id,
	        p.precoVenda,
	        p.precoUnitario,
	        DATE_FORMAT(diaLancamento, '%d/%c/%Y') AS diaLancamento,
	        c.descricao AS descricao_categoria,
            f.nome AS nome_fornecedores
        FROM 
	        produtos p
	        INNER JOIN categoria c ON c.id = p.categoria_id
            INNER JOIN fornecedores f ON f.id = p.fornecedores_id
	    ORDER BY
	        p.id ASC;
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
            p.categoria_id,
            p.fornecedores_id,
            p.precoVenda,
            p.precoUnitario,
            p.diaLancamento,
			c.descricao AS descricao_categoria,
            f.nome AS nome_fornecedor
        FROM 
	        produtos p
	        INNER JOIN categoria c ON c.id = p.categoria_id
            INNER JOIN fornecedores f ON f.id = p.fornecedores_id
        WHERE
            p.id = $id
        ORDER BY 
            p.id ASC
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function receberCategoria(): array
    {
        $sql = "
        SELECT 
            id,
            descricao 
        FROM 
            categoria
        ORDER BY
            descricao ASC
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();

        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function idCategoria()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $sql = "
        SELECT 
            id,
            descricao
        FROM
            categoria
        WHERE id = $id
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function receberFornecedor()
    {
        $sql = " 
        SELECT 
            id,
            nome
        FROM 
            fornecedores 
        ORDER BY 
            id ASC
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function idFornecedor()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $sql = "
        SELECT 
            id,
            nome
        FROM
            fornecedores
        WHERE id = $id
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }


}