<?php
session_start();
if(!isset($_SESSION['token_crednosso']) && $_SESSION['token_crednosso'] === null ){
    header("Location: ./Pages/Login/login.php");
}


include_once '../../Functions/Admin.php';
include_once '../../Functions/Atm.php';

$adm = new AdminClass();
$atm = new AtmClass();

$dataAdmin = $adm->verifyUser($_SESSION['id_crednosso'], 
    $_SESSION['username_crednosso'], $_SESSION['token_crednosso']);
    if($dataAdmin['error'] !== ''){
        $_SESSION['id_crednosso'] = null;
        $_SESSION['token_crednosso'] = null;
        $_SESSION['username_crednosso'] = null;
        header("Location: ./Pages/Login/login.php");
}

if(!isset($_GET['id']) && $_GET['id'] === null){
    header("Location: ./atm.php?error='Preciso de um ATM para proseguir!'");
}

if($atm->deleteAtm($_GET['id'], $_GET['status'])){
    header("Location: ./atm.php?success='ATM bloqeuado!'");
}else{
    header("Location: ./atm.php?error='Erro ao bloquear ATM!'");
}

