<?php

include_once __DIR__ . '/Database.php';

class AtmClass{
    private $table = 'atms';
    private $database;

    public function __construct()
    {
        $db = new DB();
        $this->database = $db->getConnection(true);
    }

    public function getAllAtms(){
        $sql = $this->database->query("SELECT * FROM $this->table");
        if($sql->rowCount() > 0){
            $el = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($el as $item){
                $data[] = $item;
            }
        }else{
            $data['error'] = 'Nada a mostrar!';
        }
        return $data;
    }

    public function getAtmByID($idAtm){

    }
    public function setAtm($idAtm, $idTreasury, $nameAtm, $shortenedNameAtm){
        $sql = $this->database->query("INSERT INTO $this->table 
        (id_atm, id_treasury, name_atm, shortened_name_atm) VALUES ($idAtm, $idTreasury, $nameAtm, $shortenedNameAtm)");
        if($sql->rowCount() > 0){
            $data['error'] = '';
        }else{
            $data['error'] = 'Erro ao inserir!';
        }
        return $data;
    }
}