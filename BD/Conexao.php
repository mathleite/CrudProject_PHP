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
            categoria_id, 
            fornecedores_id, 
            diaLancamento, 
            precoVenda, 
            precoUnitario) 
        VALUES
            (:NOME, 
            :CATEGORIA,
            :FORNECEDOR, 
            :LANCAMENTO, 
            :VENDA, 
            :UNIDADE  )
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

        $sql = "
        UPDATE
            produtos p
        SET
            p.nome = :nome,
            p.categoria_id = :categoria_id,
            p.fornecedores_id = :fornecedores_id,
            p.precoVenda = :precoVenda,
            p.precoUnitario = :precoUnitario
        WHERE
            p.id = :id
        ";

        $comando = $this->conexao->prepare($sql);
        $comando->bindParam(":nome", $nome);
        $comando->bindParam(":categoria_id", $categoria);
        $comando->bindParam(":fornecedores_id", $fornecedor);
        $comando->bindParam(":precoVenda", $precoVenda);
        $comando->bindParam(":precoUnitario", $precoUnitario);
        $comando->bindParam(":id", $id);

        $comando->execute();
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

    public function cadastrarFornecedor()
    {
        $nomeFornecedor = filter_input(INPUT_GET, 'novoFornecedor', FILTER_SANITIZE_STRING);
        $sql = "
        INSERT INTO 
            fornecedores (
            nome
            ) 
        VALUE 
            ('$nomeFornecedor')
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();
    }

    public function cadastrarCategoria()
    {
        $nomeCategoria = filter_input(INPUT_GET, 'novaCategoria', FILTER_SANITIZE_STRING);
        $sql = "
        INSERT INTO 
            categoria (
            descricao
            ) 
        VALUE 
            ('$nomeCategoria')
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();
    }


}
