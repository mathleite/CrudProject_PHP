<?php


class Categoria
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new PDO("mysql: host=localhost; dbname=sistema_cadastro", "root", "");
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

    public function receberCategoria(): array
    {
        $id = $_GET['id'];
        $sql = "
        SELECT 
            p.id,
            c.descricao AS descricao_categoria
        FROM 
            produtos p 
            INNER JOIN categoria c ON c.id = p.categoria_id
        ORDER BY
            p.id = $id DESC
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