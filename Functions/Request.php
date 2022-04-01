<?php

include_once __DIR__ . '/Database.php';
include_once __DIR__ . '/Batch.php';

class RequestClass{
    private $table = 'requests';
    private $database;
    private $batch;

    public function __construct()
    {
        $db = new DB();
        $this->database = $db->getConnection(true);
        $this->batch = new BatchClass();
    }

    public function getAllRequests(){
        $sql = $this->database->query("SELECT * FROM $this->table");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        return false;
    }

    public function getRequestById($idRequest){
        $sql = $this->database->query("SELECT * FROM $this->table WHERE id = '".$idRequest."'");
        if($sql->rowCount() > 0){
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        return false;
    }

    public function addRequest($array){
        if($array['lote'] === ''){
           $idBatch = $this->batch->generateBatch();       
        }else{
            $idBatch = $this->batch->getIdByBatch($array['lote']);
        }

        $sql = $this->database->prepare("INSERT INTO $this->table 
        (id_batch, id_operation_type, id_order_type, id_origin, id_destiny, date_request, qt_10, qt_20, qt_50, qt_100, note) 
        VALUES 
        (:id_batch, :id_operation_type, :id_order_type, :id_origin, :id_destiny, :date_request, :qt_10, :qt_20, :qt_50, :qt_100, :note)");
        $sql->bindValue(":id_batch", $idBatch);
        $sql->bindValue(":id_operation_type", $array['id_operation_type']);
        $sql->bindValue(":id_order_type", $array['id_order_type']);
        $sql->bindValue(":id_origin", $array['id_shipping_origin']);
        $sql->bindValue(":id_destiny", $array['id_shipping_destiny']);
        $sql->bindValue(":date_request", date('Y-m-d'));
        $sql->bindValue(":qt_10", $array['value_10']);
        $sql->bindValue(":qt_20", $array['value_20']);
        $sql->bindValue(":qt_50", $array['value_50']);
        $sql->bindValue(":qt_100", $array['value_100']);
        $sql->bindValue(":note", $array['note']);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $this->batch->getBatchById($idBatch);
        }else{
            return false;
        }
    }

}