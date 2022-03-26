<?php

class DB{

    private $pdo;

    public function __construct()
    {
        $this->setConnection(true);
    }

    private function ConexaoBanco(){
    
        try{
            $conn = new PDO('mysql:host=localhost;dbname=crednosso', 'root', '');
            return $conn;
        }catch(Exception $e){
            return "Erro: {$e->getMessage()}";
        }
    }

    public function setConnection($conn){
        if($conn  === true){
            $this->pdo = $this->ConexaoBanco();
        }elseif($conn === false){
            $this->pdo = null;
        }
    }

    public function getConnection(){
        return $this->pdo;
    }

    public function closeConnection(){
        $this->setConnection(false);
    }
}


