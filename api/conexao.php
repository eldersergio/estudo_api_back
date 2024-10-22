<?php

class Conexao {
    private $host = "localhost";
    private $dbname = "db_cadastro_api";
    private $username = "root";
    private $password = "";


    public function conectar() {

        try {
            return new PDO('mysql:dbname=' . $this->dbname . ';host=' . $this->host . ';charset=UTF8', $this->username, $this->password);
          } catch (PDOException $e) {
              echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
          }
    }
}

