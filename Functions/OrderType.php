<?php

include_once __DIR__ . '/Database.php';

class OrderTypeClass{
    private $table = 'order_type';
    private $database;

    public function __construct()
    {
        $db = new DB();
        $this->database = $db->getConnection(true);
    }

    public function getAllOrderType(){
        $sql = $this->database->query("SELECT * FROM $this->table WHERE active = 'Y'");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        return false;
    }
}