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
            return $data;
        }
        return false;
        
    }


    public function getAtmById($idAtm){
        $sql = $this->database->query("SELECT * FROM $this->table WHERE id = $idAtm");
        if($sql->rowCount() > 0){
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        return false;
    }

    public function addAtm($array){
       
        $sql = $this->database->prepare("INSERT INTO $this->table 
        (id_atm, id_treasury, name_atm, shortened_name_atm, cass_A, cass_B, cass_C, cass_D, status)
        VALUES (:id_atm, :id_treasury, :name_atm, :shortened_name_atm, :cass_A, :cass_B, :cass_C, :cass_D, :status)");

        $sql->bindValue(":id_atm", $_POST['id_atm']);
        $sql->bindValue(":id_treasury", $_POST['id_treasury']);
        $sql->bindValue(":name_atm", $_POST['name_atm']);
        $sql->bindValue(":shortened_name_atm", $_POST['shortened_name_atm']);
        $sql->bindValue(":cass_A", $_POST['cass_A']);
        $sql->bindValue(":cass_B", $_POST['cass_B']);
        $sql->bindValue(":cass_C", $_POST['cass_C']);
        $sql->bindValue(":cass_D", $_POST['cass_D']);
        $sql->bindValue(":status", 'Y');
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }
        return false;
    }

    public function updateAtm($array){
        $sql = $this->database->prepare("UPDATE $this->table SET 
        id_treasury = :id_treasury, name_atm = :name_atm, shortened_name_atm = :shortened_name_atm, cass_A = :cass_A,
        cass_B = :cass_B, cass_C = :cass_C, cass_D = :cass_D, status = :status 
        WHERE id = :id");
        $sql->bindValue(":id_treasury", $_POST['id_treasury']);
        $sql->bindValue(":name_atm", $_POST['name_atm']);   
        $sql->bindValue(":shortened_name_atm", $_POST['shortened_name_atm']);
        $sql->bindValue(":cass_A", $_POST['cass_A']);
        $sql->bindValue(":cass_B", $_POST['cass_B']);
        $sql->bindValue(":cass_C", $_POST['cass_C']);
        $sql->bindValue(":cass_D", $_POST['cass_D']);
        $sql->bindValue(":status", $_POST['status']);
        $sql->bindValue(":id", $_POST['id_atm']);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }
        return false;
    }

    public function deleteAtm($idAtm, $status){

        if($status === 'Y'){
            $sql = $this->database->query("UPDATE $this->table SET status = 'N' WHERE id_atm = $idAtm");
            if($sql->rowCount() > 0){
                return true;
            }
        }elseif($status === 'N'){
            $sql = $this->database->query("UPDATE $this->table SET status = 'Y' WHERE id_atm = $idAtm");
            if($sql->rowCount() > 0){
                return true;
            }
        }
        
        return false;
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