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

if(
    !isset($_POST['name_atm']) && $_POST['name_atm'] === null && 
    !isset($_POST['shortened_name_atm']) && $_POST['shortened_name_atm'] === null && 
    !isset($_POST['status']) && $_POST['status'] === null && 
    !isset($_POST['id_treasury']) && $_POST['id_treasury'] === null && 
    !isset($_POST['cass_A']) && $_POST['cass_A'] === null && 
    !isset($_POST['cass_B']) && $_POST['cass_B'] === null && 
    !isset($_POST['cass_C']) && $_POST['cass_C'] === null && 
    !isset($_POST['cass_D']) && $_POST['cass_D'] === null  
){
    header("Location: ./edit_atm.php?id=".$_POST['id_atm']."&error='Preeencha todos os campos!'");
}


if($atm->updateAtm($_POST)){
    header("Location: ./atm.php?success='Terminal alterado!'");
}else{
    header("Location: ./edit_atm.php?id=".$_POST['id_atm']."&error='Erro ao editar ATM favor tentar mais tarde!'");
}

