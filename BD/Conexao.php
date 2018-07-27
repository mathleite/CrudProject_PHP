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
        $comando = $this->conexao->prepare("INSERT INTO produto(nome, categoria, nome_fornecedor) VALUES(:NOME, :CATEGORIA,
        :NOME_FORNECEDOR)");
        $comando->bindParam(":NOME", $nomeProduto);
        $comando->bindParam(":CATEGORIA", $Categoria);
        $comando->bindParam(":NOME_FORNECEDOR", $fornecedor);
        $comando->execute();
    }

    public function listar()
    {
        $comando = $this->conexao->prepare('SELECT * FROM produto ORDER BY  id ASC ');
        $comando->execute();


            if ($comando->rowCount() > 0) {
                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                print_r($resultado);
            }


    }

}
