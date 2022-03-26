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

    public function getFullTreasury(){

    }

    public function getTreasury($idShipping){

        $array['balance'] = 0;
        $sql = $this->database->query("SELECT balance FROM treasury WHERE id_shipping = ".$idShipping);
        if($sql->rowCount() > 0){
            $array = $sql->fetch(PDO::FETCH_ASSOC);
        }
        $data = $array['balance'];
        return $data;
       // $this->database->closeConnection();
        //return $data;
    }


}