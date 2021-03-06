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

if(!isset($_GET['id']) && $_GET['id'] === ''){
    header("Location: ./admin.php?error='Preciso de um usuario'");
}

if($adm->generateDefaultPassword($_GET['id'])){
    header("Location: ./admin.php?success='Senha do sistema gerada com sucesso!'");
}else{
    header("Location: ./admin.php?error='Erro ao gerar senha padrão!'");
}

