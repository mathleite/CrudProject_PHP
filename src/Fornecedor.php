<?php

class Fornecedor
{
    private $conexao;
    public function __construct()
    {
        $this->conexao = new PDO("mysql: host=localhost; dbname=sistema_cadastro", "root", "");
    }


    public function cadastrarFornecedor($novoFornecedor)
    {
        if (empty($novoFornecedor)) {
            echo json_encode([
                'tipo' => 'error',
                'message' => 'Nome vazio!'
            ]);
            exit;
        }
        $sql = "
        INSERT INTO 
            fornecedores (
            nome
            ) 
        VALUE 
            ('$novoFornecedor')
        ";
        $comando = $this->conexao->prepare($sql);

        if ($comando->execute()) {
            echo json_encode([
                'tipo' => 'sucesso',
                'message' => 'Cadastrado com sucesso!'
            ]);
            exit;
        }

        echo json_encode([
            'tipo' => 'erro',
            'message' => 'Não foi possivel realizar o cadastro.'
        ]);
    }
    public function listarFornecedor()
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

    public function receberFornecedor()
    {
        $id = $_GET['id'];
        $sql = " 
        SELECT 
            p.id,
            f.nome AS nome_fornecedores
        FROM 
            produtos p 
            INNER JOIN fornecedores f ON f.id = p.fornecedores_id
        ORDER BY 
             p.id = $id DESC
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function idFornecedor()
    {
        $id = $_GET['id'];
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

    public function updateFornecedor($id, $nome)
    {
        if (
            empty($id) ||
            empty($nome)
        ) {
            echo json_encode([
                'tipo' => 'error',
                'message' => 'Não há dados'
            ]);
            exit;
        }
        $sql = "
        UPDATE
            fornecedores
        SET 
            nome = :nome
        WHERE
            id= :id
            ";
        $comando = $this->conexao->prepare($sql);
        $comando->bindParam(":nome", $nome);
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
            'message' => 'Não foi possivel realizar a edição.'
        ]);
    }

    public function excluir($id)
    {
        if (
        empty($id)
        ) {
            echo json_encode([
                'tipo' => 'error',
                'message' => 'Sem id !'
            ]);
            exit;
        }

        $sql = "
            DELETE FROM 
                fornecedores 
            WHERE  
                id = $id 
             ";
        $comando = $this->conexao->prepare($sql);
        if ($comando->execute()) {
            echo json_encode([
                'tipo' => 'sucesso',
                'message' => 'Excluido com sucesso!'
            ]);
            exit;
        }

        echo json_encode([
            'tipo' => 'error',
            'message' => 'Não foi possivel realizar a exclusão.'
        ]);
    }

}