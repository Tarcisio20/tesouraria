<?php 
    session_start();
    if(!isset($_SESSION['token_crednosso']) && $_SESSION['token_crednosso'] === null ){
        header("Location: ./Pages/Login/login.php");
    }

    require_once './../../Functions/Admin.php';
    require_once './../../Functions/Atm.php';

    $adm = new AdminClass();
    $atm = new AtmClass();

    $data = $adm->verifyUser($_SESSION['id_crednosso'], 
    $_SESSION['username_crednosso'], $_SESSION['token_crednosso']);
    if($data['error'] !== ''){
        $_SESSION['id_crednosso'] = null;
        $_SESSION['token_crednosso'] = null;
        $_SESSION['username_crednosso'] = null;
        header("Location: ./Pages/Login/login.php");
    }

    if(
        !isset($_POST['id_atm']) && empty($_POST['id_atm']) &&
        !isset($_POST['id_treasury']) && empty($_POST['id_treasury']) &&
        !isset($_POST['name_atm']) && empty($_POST['name_atm']) &&
        !isset($_POST['shortened_name_atm']) && empty($_POST['shortened_name_atm']) )
    {
            header("Location: ./add_atm.php?error='Inserir todos os dados'");
    }

    if($atm->addAtm($_POST)){
        header("Location: ./atm.php?success='ATM cadastrado com sucesso!'");
    }else{
        header("Location: ./atm.php?error='Erro ao cadastrar o ATM!'"); 
    }

    //$dt = $atm->setAtm($_POST['id_atm'], $_POST['id_treasury'], $_POST['name_atm'],$_POST['shortened_name_atm']);
