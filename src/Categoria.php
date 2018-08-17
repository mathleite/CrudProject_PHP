<?php


class Categoria
{
    private $id;
    public function setId($id)
    {
        $this->id = $id;
    }
    private $conexao;
    public function __construct()
    {
        $this->conexao = new PDO("mysql:host=database;dbname=sistema_cadastro","root","secret");
    }

    public function cadastrarCategoria($novaCategoria)
    {
        if (empty($novaCategoria)) {
            echo json_encode([
                'tipo' => 'erro',
                'message' => 'Nome vazio!'
            ]);
            exit;
        }
        $sql = "
        INSERT INTO 
            categoria (
            descricao
            ) 
        VALUE 
            ('$novaCategoria')
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

    public function atualizarCategoria($id, $descricao)
    {
        if(empty($id) || empty($descricao)){
            echo json_encode([
                'tipo' => 'error',
                'message' => 'Sem dados !'
            ]);
            exit;
        }

        $sql = "
        UPDATE
            categoria
        SET 
            descricao = :descricao
        WHERE
            id= :id
            ";
        $comando = $this->conexao->prepare($sql);
        $comando->bindParam(":descricao", $descricao);
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
        if (empty($id)) {
            echo json_encode([
                'tipo' => 'error',
                'message' => 'Sem ID'
            ]);
            exit;
        }

        $sql = "
            DELETE FROM 
                categoria 
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

    public function idCategoria()
    {
        $sql = "
        SELECT 
            id,
            descricao
        FROM
            categoria
        WHERE id = $this->id
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function receberCategoria(): array
    {

        $sql = "
        SELECT 
            c.id,
            c.descricao
        FROM 
            categoria c
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();

        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarCategoria(): array
    {
        $sql = "
        SELECT 
            id,
            descricao
        FROM 
            categoria 
        ORDER BY
            id  ASC
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();

        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }
}