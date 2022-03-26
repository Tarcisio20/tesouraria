<?php
include_once 'Database.php';
include_once 'Treasury.php';

class ShippingCompanyClass{
    private $table = 'shipping_company';
    private $database;

    public function __construct()
    {
        $db = new DB();
        $this->database = $db->getConnection(true);
    }

    public function getShippingCompanyAndBalance(){
      $sql = $this->database->query("SELECT * FROM ". $this->table);

      if($sql->rowCount() > 0){
        $elements = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($elements as $value){
          $array[] = $value;
        }
      }
      $data = $array;

      $treasury = new TreasuryClass();

      foreach($data as  $d){
        $saldo = $treasury->getTreasury($d['id_shipping']);
      
      }
     // $this->database->closeConnection();
      return $data;

    }

    public function getShippingByID($idShipping){
      $sql = $this->database->query(" SELECT * FROM ".$this->table." WHERE id_shipping = ".$idShipping);
      if($sql->rowCount() > 0){
        $data = $sql->fetch(PDO::FETCH_ASSOC);

        $balance = new TreasuryClass();

        $data['balance'] = $balance->getTreasury($idShipping);
        return $data;
      }
      return false;
    }

}