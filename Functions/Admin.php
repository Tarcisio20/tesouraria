<?php

include_once __DIR__ . '/Database.php';

class AdminClass{
    private $table = 'users';
    private $database;

    public function __construct()
    {
        $db = new DB();
        $this->database = $db->getConnection(true);
    }

    public function getAllUsers(){
        $sql = $this->database->query("SELECT id, name, email, username, nivel, active FROM $this->table");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        return false;
          
    }

    public function getUser($username, $password){
        $data = [];
        $sql = $this->database->query("SELECT * FROM $this->table WHERE username = '".$username."'");
        if($sql->rowCount() > 0){
            $dataFull = $sql->fetch(PDO::FETCH_ASSOC);

            $data['id'] = $dataFull['id'];
            $data['name'] = $dataFull['name'];
            $data['username'] = $dataFull['username'];
            $data['nivel'] = $dataFull['nivel'];
            $data['active'] = $dataFull['active'];

            if($this->validatePassword($dataFull['password'], $password)){
                $data['token'] = $this->setToken($data['id'], $data['username']);
                $this->database->query("UPDATE $this->table SET 
                token = '".$data['token']."' WHERE id = ".$data['id']);
                $data['error'] = '';
                return $data;
            }
        }
        return $data['error'] = 'Usuario não localizado';
    }

    public function verifyUser($id, $username,  $token){

        $token = password_hash($id.'-'.$username, PASSWORD_DEFAULT);

        if(password_verify($id.'-'.$username, $token)){
            $sql = $this->database->query("SELECT * FROM $this->table WHERE id = ".$id);
            if($sql->rowCount() > 0){
                $dataFull = $sql->fetch(PDO::FETCH_ASSOC);
                if(password_verify($id.'-'.$username, $dataFull['token'])){
                    $data['id'] = $dataFull['id'];
                    $data['name'] = $dataFull['name'];
                    $data['username'] = $dataFull['username'];
                    $data['nivel'] = $dataFull['nivel'];
                    $data['active'] = $dataFull['active'];;
                    $data['error'] = '';
                    return $data;
                }
            }
        }
        return $data['error'] = 'Erro no login';
        
    }

    public function generateDefaultPassword($idUser){
        $pass = password_hash('jgv@12345', PASSWORD_DEFAULT);

        $sql = $this->database->query("UPDATE $this->table SET password = '".$pass."' WHERE id = ".$idUser);
        if($sql->rowCount() > 0){
            return true;
        }
        return false;

    }


    private function validatePassword($passDB, $passUser){
        if(password_verify($passUser, $passDB)){
            return true;
        }
        return false;
    }

    private function setToken($idUser, $username){
        if(isset($idUser) && $idUser !== null && isset($username) && $username !== null){
            return password_hash($idUser.'-'.$username, PASSWORD_DEFAULT);
        }
        return false;
        
    }
}