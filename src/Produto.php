<?php

class Produto
{
    private $id;
    public function setId($id): void
    {
        $this->id = $id;
    }

    private $conexao;

    public function __construct()
    {
        $this->conexao = new PDO("mysql:host=database;dbname=sistema_cadastro","root","secret");
    }

    public function cadastar($nomeProduto, $categoria, $fornecedor, $diaLancamento, $precoVenda, $precoUnitario)
    {
        if (
            empty($nomeProduto) ||
            empty($categoria) ||
            empty($fornecedor) ||
            empty($diaLancamento) ||
            empty($precoVenda) ||
            empty($precoUnitario)
        ) {
            echo json_encode([
                'tipo' => 'error',
                'message' => 'Sem dados !'
            ]);
            exit;
        }
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
        $comando->bindParam(":CATEGORIA", $categoria);
        $comando->bindParam(":FORNECEDOR", $fornecedor);
        $comando->bindParam(":LANCAMENTO", $diaLancamento);
        $comando->bindParam(":VENDA", $precoVenda);
        $comando->bindParam(":UNIDADE", $precoUnitario);
        if ($comando->execute()) {
            echo json_encode([
                'tipo' => 'sucesso',
                'message' => 'Cadastrado com sucesso!'
            ]);
            exit;
        }

        echo json_encode([
            'tipo' => 'error',
            'message' => 'Não foi possivel realizar o cadastro.'
        ]);
    }

    public function atualizar($id, $nome, $categoria, $fornecedor, $diaLancamento, $precoVenda, $precoUnitario)
    {
        if (
            empty($id)
            || empty($nome)
            || empty($categoria)
            || empty($fornecedor)
            || empty($diaLancamento)
            || empty($precoVenda)
            || empty($precoUnitario)
        ) {
            echo json_encode([
                'tipo' => 'erro',
                'message' => 'Sem DADOS!'
            ]);
            exit;
        }
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

        if ($comando->execute()) {
            echo json_encode([
                'tipo' => 'sucesso',
                'message' => 'Editado com sucesso!'
            ]);
            exit;
        }

        echo json_encode([
            'tipo' => 'erro',
            'message' => 'Nao foi possivel realizar a edicao.'
        ]);
    }

    public function excluir(int $id)
    {
        if(empty($id)){
            echo json_encode([
                'tipo' => 'error',
                'message' => 'sem dados'
            ]);
        }
        $sql = "
            DELETE FROM 
                produtos 
            WHERE  
                id = $id
             ";
        $comando = $this->conexao->prepare($sql);
        if ($comando->execute()) {
            echo json_encode([
                'tipo' => 'sucesso',
                'message' => 'Excluida com sucesso!'
            ]);
            exit;
        }

        echo json_encode([
            'tipo' => 'error',
            'message' => 'Não foi possivel realizar a exclusão.'
        ]);

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

    public function getId(): array
    {
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
            p.id = $this->id
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();
        return $comando->fetch();
    }

}