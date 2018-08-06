<?php

class Deletar
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new PDO("mysql: host=localhost; dbname=sistema_cadastro", "root", "");
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

    public function deletarFornecedor()
    {
        foreach ($_POST['selecionado'] as $selecionados) {
            $sql = "
            DELETE FROM 
                fornecedores 
            WHERE  
                id = $selecionados
             ";
            $comando = $this->conexao->prepare($sql);
            $comando->execute();
        }
    }

    public function deletarCategoria()
    {
        foreach ($_POST['selecionado'] as $selecionados) {
            $sql = "
            DELETE FROM 
                categoria 
            WHERE  
                id = $selecionados
             ";
            $comando = $this->conexao->prepare($sql);
            $comando->execute();
        }
    }
}
