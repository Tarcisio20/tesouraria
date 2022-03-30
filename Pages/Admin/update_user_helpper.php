<?php
session_start();

if(!isset($_SESSION['token_crednosso']) && $_SESSION['token_crednosso'] === null ){
    header("Location: ./Pages/Login/index.php");
}

$data = $adm->verifyUser($_SESSION['id_crednosso'], 
    $_SESSION['username_crednosso'], $_SESSION['token_crednosso']);
    if($data['error'] !== ''){
        $_SESSION['id_crednosso'] = null;
        $_SESSION['token_crednosso'] = null;
        $_SESSION['username_crednosso'] = null;
        header("Location: ./Pages/Login/login.php");
}

include_once '../../Functions/Admin.php';

if(!isset($_POST['id_user']) && $_POST['id_user'] === null){
    header("Location: ./admin.php?error='Preciso de um usuario para continuar!'");
}elseif(
    !isset($_POST['name']) && $_POST['name'] === null &&
    !isset($_POST['username']) && $_POST['username'] === null &&
    !isset($_POST['nivel']) && $_POST['nivel'] === null &&
    !isset($_POST['action']) && $_POST['action'] === null 
){
    header("Location: ./admin.php?id=".$_POST['id_user']."&error='Preencha todos os campos!'");
}

$adm = new AdminClass();

if($adm->updateUser($_POST)){
    header("Location: ./admin.php?id=".$_POST['id_user']."&success='usuario alterado com sucesso!'");
}else{
    header("Location: ./admin.php?id=".$_POST['id_user']."&error='Erro ao alterar usuario, tente novamente!'");
}
