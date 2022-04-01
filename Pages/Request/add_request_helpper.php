<?php
    session_start();
    include_once './../../Functions/Admin.php';
    include_once './../../Functions/Request.php';

    $adm = new AdminClass();
    $request = new RequestClass();

    $dataAdmin = $adm->verifyUser($_SESSION['id_crednosso'], 
    $_SESSION['username_crednosso'], $_SESSION['token_crednosso']);
    if($dataAdmin['error'] !== ''){
        $_SESSION['id_crednosso'] = null;
        $_SESSION['token_crednosso'] = null;
        $_SESSION['username_crednosso'] = null;
        header("Location: ./Pages/Login/login.php");
    }

    if(
        !isset($_POST['id_operation_type']) && $_POST['id_operation_type'] !== null &&
        !isset($_POST['id_order_type']) && $_POST['id_order_type'] !== null &&
        !isset($_POST['id_shipping_origin']) && $_POST['id_shipping_origin'] !== null &&
        !isset($_POST['value_10']) && $_POST['value_10'] !== null &&
        !isset($_POST['value_20']) && $_POST['value_20'] !== null &&
        !isset($_POST['value_50']) && $_POST['value_50'] !== null &&
        !isset($_POST['value_100']) && $_POST['value_100'] !== null 
    ){
        header("Location: ./add_request.php?error='Preencha todos os campos obrigatorios'");
    }

    $lote = $request->addRequest($_POST);
   
    if($lote !== false){
        header("Location: ./add_request.php?lote=".$lote."&success='Solicitação salva!'");
    }else{
        header("Location: ./add_request.php?error='Erro ao adicionar pedido!'".(isset($_POST['lote']) && $_POST['lote'] !== false) ? '&lote='.$_POST['lote'] : '' );
    }

