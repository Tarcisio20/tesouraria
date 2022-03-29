<?php
include_once 'Database.php';

class TreasuryClass {
    private $table = 'treasury';
    private $database;

    public function __construct()
    {
        $db = new DB();
        $this->database = $db->getConnection();
    }

    public function getAllTreasury(){

    }

    public function getTreasury($idShipping){

        $array['balance'] = 0;
        $sql = $this->database->query("SELECT balance FROM $this->table WHERE id_shipping = ".$idShipping);
        if($sql->rowCount() > 0){
            $array = $sql->fetch(PDO::FETCH_ASSOC);
        }
        $data = $array['balance'];
        return $data;
       // $this->database->closeConnection();
        //return $data;
    }

    public function moveBalanceTreasury($idShipping, $action, $value){
        $sql = $this->database->query("SELECT balance FROM $this->table WHERE id_shipping = $idShipping");
        if($sql->rowCount() > 0){
            $array = $sql->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
        if($action === 'add'){
           $v = $array['balance'] + $value;    
        }elseif($action === 'sub'){
            $v = $array['balance'] - $value;
        }
        $sql = $this->database->query("UPDATE $this->table SET balance = $v WHERE id_shipping = $idShipping");
    }


}