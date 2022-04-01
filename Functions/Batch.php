<?php

include_once __DIR__ . '/Database.php';

class BatchClass{
    private $table = 'batchs';
    private $database;

    public function __construct()
    {
        $db = new DB();
        $this->database = $db->getConnection(true);
    }

    public function generateBatch(){
       $batch = time(); 
       $sql = $this->database->query("SELECT id FROM $this->table WHERE batch = '$batch'");
       if($sql->rowCount() > 0){    
          $data = $sql->fetch(PDO::FETCH_ASSOC);
          return $data['id'];
       } else{
          return false;
       }
    }

    public function getIdByBatch($batch){
        $sql = $this->database->query("SELECT id FROM $this->table WHERE batch = '$batch'");
        if($sql->rowCount() > 0){
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            return $data['id'];
        }
        return false;
    }

    public function getBatchById($idBatch){
        $sql = $this->database->query("SELECT batch FROM $this->table WHERE id = '$idBatch'");
        if($sql->rowCount() > 0){
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            return $data['batch'];
        }
    }

    public function insertBatch($batch){

    }

    
}