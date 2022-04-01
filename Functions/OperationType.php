<?php

include_once __DIR__ . '/Database.php';

class OperationTypeClass{
    private $table = 'operation_type';
    private $database;

    public function __construct()
    {
        $db = new DB();
        $this->database = $db->getConnection(true);
    }

    public function getAllOperationType(){
        $sql = $this->database->query("SELECT * FROM $this->table WHERE active = 'Y'");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        return false;
    }

}