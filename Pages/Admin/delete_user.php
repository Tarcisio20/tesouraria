<?php
session_start();

if(!isset($_SESSION['token_crednosso']) && $_SESSION['token_crednosso'] === null ){
    header("Location: ./Pages/Login/index.php");
}

include_once '../../Functions/Admin.php';

$adm = new AdminClass(); 

$data = $adm->verifyUser($_SESSION['id_crednosso'], 
    $_SESSION['username_crednosso'], $_SESSION['token_crednosso']);
    if($data['error'] !== ''){
        $_SESSION['id_crednosso'] = null;
        $_SESSION['token_crednosso'] = null;
        $_SESSION['username_crednosso'] = null;
        header("Location: ./Pages/Login/login.php");
}

if(
    !isset($_GET['id']) && $_GET['id'] === null &&
    !isset($_GET['status']) && $_GET['status'] === null 
    ){
    header("Location: ./admin.php?error='Preciso de um usuario para essa ação!'");
}

if($adm->deleteUser($_GET['id'], $_GET['status'])){
    header("Location: ./admin.php?success='Usuario bloqueado com sucesso'");
}else{
    header("Location: ./admin.php?error='Houve problemas em bloquear o usuario!'");
}