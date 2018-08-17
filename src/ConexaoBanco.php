<?php

/**
 * Created by PhpStorm.
 * User: matheus.leite
 * Date: 17/08/2018
 * Time: 11:53
 */
class ConexaoBanco
{
    private $pdo;

    public function conectaBanco()
    {
        try {
            $this->pdo = new PDO("mysql:host=database;dbname=sistema_cadastro", "root", "secret");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            echo 'Error ao conectar ao DB: '. $e->getMessage();
            exit;
        }
    }
}