<?php


class Inserir
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