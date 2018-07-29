<?php

class Conexao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new PDO("mysql: host=localhost; dbname=sistema_cadastro", "root", "");
    }

    public function cadastar($nomeProduto, $Categoria, $fornecedor)
    {
        $comando = $this->conexao->prepare("INSERT INTO produto(nome, categoria, fornecedor) VALUES(:NOME, :CATEGORIA,
        :FORNECEDOR)");
        $comando->bindParam(":NOME", $nomeProduto);
        $comando->bindParam(":CATEGORIA", $Categoria);
        $comando->bindParam(":FORNECEDOR", $fornecedor);
        $comando->execute();
    }

    public function listar(): array
    {
        $sql = "
        SELECT
            p.id,
            p.nome,
            p.categoria,
            p.fornecedor
        FROM 
            produto p
        ORDER BY 
            p.id ASC
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();

        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletar ()
    {
        foreach($_POST['selecionado'] as $selecionados){
            $sql = "
            DELETE FROM 
                produto 
            WHERE  
                id = $selecionados
             ";
            $comando = $this->conexao->prepare($sql);
            $comando->execute();
        }



    }


}
