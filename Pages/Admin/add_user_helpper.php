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
    !isset($_POST['name'])  && $_POST['name'] === null &&
    !isset($_POST['username'])  && $_POST['username'] === null &&
    !isset($_POST['email'])  && $_POST['email'] === null &&
    !isset($_POST['nivel'])  && $_POST['nivel'] === null &&
    !isset($_POST['active'])  && $_POST['active'] === null 

){
    header("Location: ./add_user.php?error='Insira todos os dados para continuar!'");
}

if($adm->addUser($_POST)){
    header("Location: ./admin.php?success='Usuario adicionado com sucesso!'");
}else{
    header("Location: ./add_user.php?error='Erro ao inserir usuario!'");
}