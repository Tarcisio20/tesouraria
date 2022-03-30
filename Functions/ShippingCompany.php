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

    public function getAllShippingCompany(){
      $data = [];
      $sql = $this->database->query("SELECT id, id_shipping, name_shipping FROM $this->table");
      if($sql->rowCount() > 0){
        $dt = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($dt as $d){
          $data[] = $d;
        }
      }else{
        $data['error'] = 'Erro ao salvar';
      }
      return $data;
    }

    public function getNameShippingCompanyById($idShipping){
        $sql = $this->database->query("SELECT name_shipping FROM $this->table WHERE id = $idShipping");
        if($sql->rowCount() > 0){
          $data = $sql->fetch(PDO::FETCH_ASSOC);
          return $data['name_shipping'];
        }
        return false;
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

    public function setShippingCompany($idShipping, $nameShipping){
      $data = [];
      if(!isset($idShipping) && empty($idShipping) && !isset($nameShipping) && empty($nameShipping)){
        $data['error'] = 'Inserir todos os dados';
      }
      $sql = $this->database->query("INSERT INTO $this->table (id_shipping, name_shipping) VALUES ($idShipping, '".$nameShipping."') ");
      if($sql->rowCount() > 0){
        $data['error'] = '';
      }
      return $data;
    }

}